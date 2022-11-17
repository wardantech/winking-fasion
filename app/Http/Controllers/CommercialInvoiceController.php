<?php

namespace App\Http\Controllers;

use App\Bank;
use App\CommercialInvoice;
use App\Export;
use App\ForwaringLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommercialInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CommercialInvoice::with('export')->get();
        return view('commercial_invoice.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exports = Export::all();
        return view('commercial_invoice.create', compact('exports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'export_id'=>'required',
        ]);

        $data = new CommercialInvoice();
        $data->date = $request->date;
        $data->export_id = $request->export_id;
        $data->save();

        return redirect('commercial-invoice')->with('message', 'Commercial Invoice Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CommercialInvoice::with('export')->find($id);
        return view('commercial_invoice.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exports = Export::all();
        $data = CommercialInvoice::with('export')->find($id);
        return view('commercial_invoice.edit', compact('data','exports'));
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
        $request->validate([
            'date'=>'required',
            'export_id'=>'required',
        ]);

        $data = CommercialInvoice::find($id);
        $data->date = $request->date;
        $data->export_id = $request->export_id;
        $data->update();

        return redirect('commercial-invoice')->with('message', 'Commercial Invoice Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CommercialInvoice::find($id);
        $delete->delete();
        return redirect('commercial-invoice')->with('message', 'Data Deleted Successfully');
    }
}
