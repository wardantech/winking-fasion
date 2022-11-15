<?php

namespace App\Http\Controllers;

use App\Export;
use App\Account;
use App\ForwaringLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForwardingLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts= Account::all();
        $exports= Export::all();
        // dd($accounts);
        return view('forwarding_letter.create', compact('accounts', 'exports'));
    }

    public function getExport(Request $request){
        $export= Export::find($request->exportId);
        // dd($export);
        // $exportId= $request->exportId;
        // dd($exportId);
        return response()->json($export);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forwardingLetter= new ForwaringLetter();

        $forwardingLetter->date = $request->date;
        $forwardingLetter->account_id = $request->account_id;
        $forwardingLetter->export_id = $request->export_id;

        $forwardingLetter->save();
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
