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
                        <form action="{{ route('bill-exchange.update', $bill->id )}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Drawn Under *</label>
                                    <input type="text" name="drawn_under" value="{{$bill->drawn_under}}"  class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                <label>Invoice No *</label>
                                    <select name="export_id" id="export-id" class="form-control" required>
                                        <option value="">Select Invoice No</option>
                                        @foreach ($exports as $export)
                                            <option  @if ($bill->export_id == $export->id) selected @endif value="{{ $export->id }}">{{ $export->invoice_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice amount *</label>
                                    <input type="number" name="value" value="{{$bill->export->invoice_value}}" id="value" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Lc Number *</label>
                                    <input type="text" name="lc_number" value="{{$bill->export->lc_number}}" id="lc_number" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Date *</label>
                                    <input type="date" name="invoice_date" value="{{$bill->export->date}}" id="invoice-date" class="form-control" readonly>
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
                        $('#value').val(data.invoiceAmount);
                        $('#lc_number').val(data.lcNumber);
                        $('#invoice-date').val(data.invoiceDate);
                    }
                });
            }
        });
    });
</script>

@endsection
