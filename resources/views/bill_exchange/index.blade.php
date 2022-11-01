@extends('layout.main') @section('content')
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<style>
    .table,th{
        vertical-align: text-top !important;
    }
    .table,td{
        vertical-align: text-top !important;
    }
    .daterangepicker.opened{
        display: block !important;
    }
</style>
<section>
    <div class="table-responsive">
        <table id="expense-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported">Sl</th>
                    <th style="min-width: 65px !important;"> Drwan Under</th>
                    <th style="min-width: 65px !important;">Export L/C</th>
                    <th style="min-width: 65px !important;">Export Date</th>
                    <th >Invoice No</th>
                    <th>Invoice Date</th>
                    <th>Amount</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bill_exchanges as $bill_exchange)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bill_exchange->drawn_under}}</td>
                    <td>{{$bill_exchange->export}}</td>
                    <td>{{$bill_exchange->export_date}}</td>
                    <td>{{$bill_exchange->invoice_no}}</td>
                    <td>{{$bill_exchange->invoice_date}}</td>
                    <td>{{$bill_exchange->amount}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li><button type="button" data-id="5" class="open-Editexpense_categoryDialog btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> Edit</button></li>
                                <li>
                                    <button type="submit" class="btn btn-link"><i class="fa fa-eye"></i> View</button>
                                </li>
                                                          
                                                                <li class="divider"></li>
                                <form method="POST" action="#" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="SWo30cvOeDRtEMvOgNXUIaMbxVAubeQRDg8Z3GRI">
                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> Delete</button>
                                </li>
                                </form>
                             </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="tfoot active">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</section>

@endsection
