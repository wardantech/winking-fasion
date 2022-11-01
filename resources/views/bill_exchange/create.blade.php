@extends('layout.main')
@section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Bill Exchange</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => ['bill-exchange.store'], 'method' => 'post']) !!}
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Drawn Under *</label>
                                    <select name="drawn_under" id="" class="form-control">
                                        <option value="">Select Account</option>
                                        @foreach($bankNames as $bankName)
                                        <option value="{{$bankName->id}}">{{$bankName->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Export L/C No *</label>
                                    <select name="export" class="form-control">
                                            <option value="">Select Lc No</option>
                                            @foreach($exports as $export)
                                        <option value="{{$export->id}}">{{$export->lc_number}}</option>
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Export Date *</label>
                                    <input type="date" name="export_date"  class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice No *</label>
                                    <input type="text" name="invoice_no" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Date *</label>
                                    <input type="date" name="invoice_date"  class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Amount</label>
                                    <input type="number" name="amount"  class="form-control">
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
