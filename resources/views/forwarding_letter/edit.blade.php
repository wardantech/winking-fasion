@extends('layout.main')
@section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Forwarding Letter Edit</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => ['forwarding-letter.update',$forwardLetter->id ], 'method' => 'post']) !!}
                        @csrf
                        @method('put')
                        <input type="hidden" id="up_id" name="id">      
                        <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Date *</label>
                                    <input type="date" value="{{$forwardLetter->date}}" name="date" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Account *</label>
                                    <select name="account_id" id="" class="form-control">
                                        <option value="">Select Account</option>
                                        @foreach ($accounts as $account)
                                            <option @if($forwardLetter->account_id == $account->id ) selected @endif value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Lc No *</label>
                                    <select name="export_id" id="export-id" class="form-control">
                                            <option value="">Select Lc No</option>
                                        @foreach ($exports as $export)
                                            <option  @if($forwardLetter->export_id == $export->id ) selected @endif value="{{ $export->id }}">{{ $export->lc_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice amount *</label>
                                    <input type="number" name="value" id="value" value="{{$forwardLetter->export->invoice_value}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Number *</label>
                                    <input type="text" value="{{$forwardLetter->export->invoice_no}}" name="invoice_no" id="invoice-no" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Date *</label>
                                    <input type="date" name="invoice_date" value="{{$forwardLetter->export->date}}" id="invoice-date" class="form-control" readonly>
                                </div>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('#export-id').on('change', function(){
            var exportId= $('#export-id').val();
            var url = '{{ route("get-export") }}';

            if(exportId){
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url,
                    data: {
                        exportId: exportId
                    },
                    success: function(data){
                        console.log(data);
                        $('#value').val(data.invoice_value);
                        $('#invoice-no').val(data.invoice_no);
                        $('#invoice-date').val(data.date);
                    }

                });
            }
        });
    });
</script>

@endsection
