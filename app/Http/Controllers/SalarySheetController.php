<?php

namespace App\Http\Controllers;

use App\Employee;
use App\SalarySheet;
use App\Helper\DateTime;
use App\SalarySheetDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalarySheetController extends Controller
{
    public function index(){
        $salarySheets= SalarySheet::all();
        return view('salary_sheet.index', compact('salarySheets'));
    }

    public function salarySheetCreate(){
        $years= DateTime::getYear();
        $months= DateTime::allMonths();
        // dd($months);
        return view('salary_sheet.salarySheetCreate', compact('years', 'months'));
    }

    public function salarySheetGenerate(Request $request){
        // dd($request->all());
        $employees= Employee::with('user', 'user.holiday')->get();
        $requests= $request->all();
        // dd($requests);

        // $salarySheet= SalarySheet::create([
        //     'date' => $request->date,
        //     'h_rent' => $request->h_rent,
        //     'medical' => $request->medical,
        //     't_port' => $request->t_port,
        //     'allowed_leave' => $request->allowed_leave,
        //     'status' => $request->status,
        //     'year' => $request->year,
        //     'month' => $request->month
        // ]);

        // SalarySheetDetails::create([
        //     'salary_sheet_id' => $salarySheet->id,
        //     'employee_name'   => $request->
        // ]);

        return view("salary_sheet.salary_sheet", compact('employees', 'requests'));
    }

    public function salarySheetConfirm(Request $request){
        // dd($request->all());
        $salarySheet= SalarySheet::create([
            'date' => $request->date,
            'h_rent' => $request->h_rent_percent,
            'medical' => $request->medical_percent,
            't_port' => $request->t_port_percent,
            'allowed_leave' => $request->allowed_leave,
            'status' => $request->status,
            'year' => $request->year,
            'month' => $request->month
        ]);

        foreach($request->employee_id as $key=>$employee)
        SalarySheetDetails::create([
            'salary_sheet_id' => $salarySheet->id,
            'employee_id'   => $request->employee_id[$key],
            'basic_pay'   => $request->basic_pay[$key],
            'h_rent'   => $request->h_rent[$key],
            'medical'   => $request->medical[$key],
            't_port'   => $request->t_port[$key],
            'net_pay'   => $request->net_pay[$key],
        ]);

        return redirect()->route('salary-sheet-index')->with('message', 'Salary Sheet generated successfully.');
    }

    public function show($id){
        $salarySheet=SalarySheet::find($id);
        $salarySheetDetails=SalarySheetDetails::with('employee')->where('salary_sheet_id', $id)->get();

        return view("salary_sheet.show", compact('salarySheet', 'salarySheetDetails'));
    }
}
