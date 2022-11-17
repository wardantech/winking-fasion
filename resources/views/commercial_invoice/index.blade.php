@extends('layout.main') @section('content')

@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif

<section>
    <div class="container-fluid">
        <a href="{{route('commercial-invoice.create')}}" class="btn btn-info"><i class="dripicons-plus"></i> Add Commercial-Invoice</a>
    </div>
    <div class="table-responsive proTable">
        <table id="employee-table" class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>LC No</th>
                    <th>Amount</th>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->date}}</td>
                    <td>{{$value->export->lc_number}}</td>
                    <td>{{$value->export->invoice_value}}</td>
                    <td>{{$value->export->invoice_no}}</td>
                    <td>{{$value->export->date}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <a href="{{route('commercial-invoice.show', $value->id)}}" class="btn btn-link"><i class="fa fa-eye"></i> View</a>
                                </li>
                                <li><a  class=" btn btn-link"  href="{{route('commercial-invoice.edit', $value->id)}}"><i class="dripicons-document-edit"></i> Edit</a></li>
                                <li class="divider"></li>
                                {{ Form::open(['route' => ['commercial-invoice.destroy', $value->id], 'method' => 'DELETE'] ) }}
                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</button>
                                </li>
                                {{ Form::close() }}
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@endsection
