<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BillExchange;
use App\Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bill_exchanges = BillExchange::all(); 
       return view('bill_exchange.index', compact('bill_exchanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bankNames = Bank::all();
        $exports= Export::all();
       return view('bill_exchange.create', compact('bankNames','exports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'drawn_under'=>'required',
            'export'=>'required',
            'export_date'=>'required',
            'invoice_no'=>'required',
            'invoice_date'=>'required',
            'amount'=>'required'
        ]);
        // dd($data);
        BillExchange::create($data);
        return redirect('bill-exchange');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
