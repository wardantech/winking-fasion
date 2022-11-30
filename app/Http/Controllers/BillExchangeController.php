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
        $bankNames = Bank::all();
        $exports= Export::all();
       $bill_exchanges = BillExchange::all(); 
       return view('bill_exchange.index', compact('bill_exchanges','bankNames','exports'));
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
            'export_id'=>'required',
            'export_date'=>'required',
            'invoice_no'=>'required',
            'invoice_date'=>'required',
            'amount'=>'required'
        ]);
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
        $bill_exchange = BillExchange::with('bank')->find($id);
        // dd($bill_exchange);
        return view('bill_exchange.show', compact('bill_exchange'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = BillExchange::find($id);
        $bankNames = Bank::all();
        $exports= Export::all();
       return view('bill_exchange.edit', compact('bankNames','exports','bill'));
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
        $data = $request->validate([
            'drawn_under'=>'required',
            'export_id'=>'required',
            'export_date'=>'required',
            'invoice_no'=>'required',
            'invoice_date'=>'required',
            'amount'=>'required'
        ]);
        $response = BillExchange::find($id);
        $response->update($data);
       return redirect()->route('bill-exchange.index')->with('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BillExchange::find($id);
        $data->delete();
        return redirect()->route('bill-exchange.index')->with('successfully deleted');  
    }
}
