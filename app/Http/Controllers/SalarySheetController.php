<?php

namespace App\Http\Controllers;

use App\Employee;
use App\SalarySheet;
use App\Helper\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalarySheetController extends Controller
{
    public function index(){
        return view('salary_sheet.index');
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

        SalarySheet::create([
            'h_rent' => $request->h_rent,
            'medical' => $request->medical,
            't_port' => $request->t_port,
            'allowed_leave' => $request->allowed_leave,
            'status' => $request->status,
            'year' => $request->year,
            'month' => $request->month
        ]);

        return view("salary_sheet.salary_sheet", compact('employees', 'requests'));
    }
}
