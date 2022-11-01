<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalarySheetController extends Controller
{
    function salarySheetCreate(){
        return view('salary_sheet.salarySheetCreate');
    }

    function salarySheetGenerate(Request $request){
        return view("salary_sheet.salary_sheet");
    }
}
