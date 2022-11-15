@extends('layout.main') @section('content')

@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif

<section>
    <div class="container-fluid">
        <a href="{{route('forwarding-letter.create')}}" class="btn btn-info"><i class="dripicons-plus"></i> Add forwarding-letter</a>
    </div>
    <div class="table-responsive proTable">
        <table id="employee-table" class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Bank Name</th>
                    <th>LC No</th>
                    <th>Amount</th>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($forwardLetters as $forwardLetter)
                <tr>
                    <td>{{$forwardLetter->date}}</td>
                    <td>{{$forwardLetter->bank->name}}</td>
                    <td>{{$forwardLetter->export->lc_number}}</td>
                    <td>{{$forwardLetter->export->invoice_value}}</td>
                    <td>{{$forwardLetter->export->invoice_no}}</td>
                    <td>{{$forwardLetter->export->date}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <a href="{{route('forwarding-letter.show',$forwardLetter->id)}}" class="btn btn-link"><i class="fa fa-eye"></i> View</a>
                                </li>
                                <li><a  class=" btn btn-link"  href="{{route('forwarding-letter.edit',$forwardLetter->id)}}"><i class="dripicons-document-edit"></i> Edit</a></li>
                                <li class="divider"></li>
                                {{ Form::open(['route' => ['forwarding-letter.destroy', $forwardLetter->id], 'method' => 'DELETE'] ) }}
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
