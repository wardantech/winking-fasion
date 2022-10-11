<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Warehouse;
use App\Biller;
use App\Employee;
use App\User;
use App\Department;
use Auth;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{

    public function index()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_employee_all = Employee::where('is_active', true)->get();
            $lims_department_list = Department::where('is_active', true)->get();
            return view('employee.index', compact('lims_employee_all', 'lims_department_list', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_warehouse_list = Warehouse::where('is_active', true)->get();
            $lims_biller_list = Biller::where('is_active', true)->get();
            $lims_department_list = Department::where('is_active', true)->get();

            return view('employee.create', compact('lims_role_list', 'lims_warehouse_list', 'lims_biller_list', 'lims_department_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function store(Request $request)
    {

        $data = $request->except('image','image_cv');
        $data['joining_date'] = date("Y-m-d", strtotime($request->joining_date));

        $message = 'Employee created successfully';
        if(isset($data['user'])){
            $this->validate($request, [
                'name' => [
                    'max:255',
                        Rule::unique('users')->where(function ($query) {
                        return $query->where('is_deleted', false);
                    }),
                ],
                'email' => [
                    'email',
                    'required',
                    'max:255',
                        Rule::unique('users')->where(function ($query) {
                        return $query->where('is_deleted', false);
                    }),
                ],
            ]);

            $data['is_active'] = true;
            $data['is_deleted'] = false;
            $data['password'] = bcrypt($data['password']);
            $data['phone'] = $data['phone_number'];

            User::create($data);
            $user = User::latest()->first();
            $data['user_id'] = $user->id;
            $message = 'Employee created successfully and added to user list';
        }
        //validation in employee table
        $this->validate($request, [
            // 'email' => [
            //     'max:255',
            //         Rule::unique('employees')->where(function ($query) {
            //         return $query->where('is_active', true);
            //     }),
            // ],
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
            // 'image_cv' => 'image|mimes:doc,docx,pdf|max:100000',
        ]);

        $image = $request->image;
        if ($image) {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $request['employee_name']);
            $imageName = $imageName . '.' . $ext;
            $image->move('public/images/employee', $imageName);
            $data['image'] = $imageName;
        }

        $cn_doc = $request->image_cv;
        if ($cn_doc) {
            $ext = pathinfo($cn_doc->getClientOriginalName(), PATHINFO_EXTENSION);
            $docName = preg_replace('/[^a-zA-Z0-9]/', '', uniqid('cv',13));
            $docName = $docName . '.' . $ext;
            $cn_doc->move('public/images/employee/cv', $docName);
            $data['image_cv'] = $docName;
        }
        $data['status'] = "active";
        $data['name'] = $data['employee_name'];
        $data['is_active'] = true;


        //\dd($data);
        Employee::create($data);

        return redirect('employees')->with('message', $message);
    }

    public function show($id){
        $employee = Employee::find($id);
        return view('employee.profile',compact('employee'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $lims_employee_data = Employee::find($request['employee_id']);
        if($lims_employee_data->user_id){
            $this->validate($request, [
                'name' => [
                    'max:255',
                    Rule::unique('users')->ignore($lims_employee_data->user_id)->where(function ($query) {
                        return $query->where('is_deleted', false);
                    }),
                ],
                'email' => [
                    'email',
                    'max:255',
                        Rule::unique('users')->ignore($lims_employee_data->user_id)->where(function ($query) {
                        return $query->where('is_deleted', false);
                    }),
                ],
            ]);
        }
        //validation in employee table
        $this->validate($request, [
            // 'email' => [
            //     'email',
            //     'max:255',
            //         Rule::unique('employees')->ignore($lims_employee_data->id)->where(function ($query) {
            //         return $query->where('is_active', true);
            //     }),
            // ],
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:100000',
            // 'image_cv' => 'image|mimes:doc,docx,pdf|max:100000',
        ]);

        $data = $request->except('image','image_cv');
        $data['joining_date'] = date("Y-m-d", strtotime($request->joining_date));
        $image = $request->image;
        if ($image) {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $request['name']);
            $imageName = $imageName . '.' . $ext;
            $image->move('public/images/employee', $imageName);
            $data['image'] = $imageName;
        }

        $cn_doc = $request->file('image_cv');

        if ($cn_doc) {
            $ext = pathinfo($cn_doc->getClientOriginalName(), PATHINFO_EXTENSION);
            //dd($cn_doc);
            $docName = preg_replace('/[^a-zA-Z0-9]/', '', uniqid('cv',13));
            $docName = $docName . '.' . $ext;
            $cn_doc->move('public/images/employee/cv', $docName);
            $data['image_cv'] = $docName;
        }
        if($data['status'] == "in-active"){
            $data['is_active'] = false;
        }


        $lims_employee_data->update($data);
        return redirect('employees')->with('message', 'Employee updated successfully');
    }

    public function deleteBySelection(Request $request)
    {
        $employee_id = $request['employeeIdArray'];
        foreach ($employee_id as $id) {
            $lims_employee_data = Employee::find($id);
            if($lims_employee_data->user_id){
                $lims_user_data = User::find($lims_employee_data->user_id);
                $lims_user_data->is_deleted = true;
                $lims_user_data->save();
            }
            $lims_employee_data->is_active = false;
            $lims_employee_data->save();
        }
        return 'Employee deleted successfully!';
    }
    public function destroy($id)
    {
        $lims_employee_data = Employee::find($id);
        if($lims_employee_data->user_id){
            $lims_user_data = User::find($lims_employee_data->user_id);
            $lims_user_data->is_deleted = true;
            $lims_user_data->save();
        }
        $lims_employee_data->is_active = false;
        $lims_employee_data->save();
        return redirect('employees')->with('not_permitted', 'Employee deleted successfully');
    }
}
