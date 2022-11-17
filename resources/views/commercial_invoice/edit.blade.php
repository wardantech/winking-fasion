@extends('layout.main')
@section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Commercial Invoice Edit</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => ['commercial-invoice.update', $data->id ], 'method' => 'post']) !!}
                        @csrf
                        @method('put')
                        <input type="hidden" id="up_id" name="id">
                        <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Date *</label>
                                    <input type="date" value="{{$data->date}}" name="date" class="form-control" >

                                    @error('date')
                                      <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label>Invoice Number *</label>
                                    <select name="export_id" id="export-id" class="form-control" required>
                                            <option value="">Select Invoice Number</option>
                                        @foreach ($exports as $export)
                                            <option  @if($data->export_id == $export->id ) selected @endif value="{{ $export->id }}">{{ $export->invoice_no }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('export_id')
                                      <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice amount *</label>
                                    <input type="number" name="value" id="value" value="{{$data->export->invoice_value}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Lc No *</label>
                                    <input type="text" value="{{$data->export->lc_number}}" name="invoice_no" id="invoice-no" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Invoice Date *</label>
                                    <input type="date" name="invoice_date" value="{{$data->export->date}}" id="invoice-date" class="form-control" readonly>
                                </div>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{trans('file.update')}}</button>
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
                        $('#invoice-no').val(data.lcNumber);
                        $('#invoice-date').val(data.invoiceDate);
                    }

                });
            }
        });
    });
</script>

@endsection
