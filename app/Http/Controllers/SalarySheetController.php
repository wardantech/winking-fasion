<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalarySheetController extends Controller
{
    function salarySheetCreate(){
        return view('salary_sheet.salarySheetCreate');
    }

    function salarySheetGenerate(Request $request){
        $employees= Employee::with('user', 'user.holiday')->get();
        $requests= $request->all();
        // dd($employees);
        return view("salary_sheet.salary_sheet", compact('employees', 'requests'));
    }
}
