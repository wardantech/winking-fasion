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
                                    <input type="date" value="{{$forwardLetter->date}}" name="date" class="form-control" >

                                    @error('date')
                                      <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label> Reference Bank *</label>
                                    <input type="text" name="reference_bank" value="{{$forwardLetter->reference_bank}}" class="form-control" placeholder="Enter Reference Bank" required>

                                    @error('reference_bank')
                                      <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label> Reference No *</label>
                                    <input type="text" name="reference_no" value="{{$forwardLetter->reference_no}}" class="form-control" placeholder="Enter Reference No" required>
                                    @error('reference_no')
                                        <p style="color: red">{{ $message }}</p>
                                     @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label> Bank *</label>
                                    <select name="bank_id" id="bank_id" class="form-control" required>
                                        <option value=""> Select Bank </option>
                                        @foreach ($banks as $bank)
                                        <option  @if($forwardLetter->bank_id == $bank->id ) selected @endif value="{{ $bank->id }}">{{ $bank->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('bank_id')
                                        <p style="color: red">{{ $message }}</p>
                                     @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label> Bank Branch *</label>
                                    <select name="branch_id" id="branch_id" class="form-control selectpicker" required>
                                        <option value="">Select Branch</option>
                                        @foreach ($branches as $branch)

                                        <option  @if($forwardLetter->branch_id == $branch->id ) selected @endif value="{{ $branch->id }}">
                                            {{ $branch->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('branch_id')
                                        <p style="color: red">{{ $message }}</p>
                                     @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label>Lc No *</label>
                                    <select name="export_id" id="export-id" class="form-control" required>
                                            <option value="">Select Lc No</option>
                                        @foreach ($exports as $export)
                                            <option  @if($forwardLetter->export_id == $export->id ) selected @endif value="{{ $export->id }}">{{ $export->lc_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('export_id')
                                      <p style="color: red">{{ $message }}</p>
                                    @enderror
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

    $('#bank_id').on('change', function(){
        $('#branch_id').empty();
        var bank_id = $("#bank_id").val();
        var url = "{{route('all.bank.branches')}}";
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    bank_id: bank_id
                },
                success: function(data){
                 $('#branch_id').append("<option value=''> Select Branch </option>");
                $.each(data, function(key, value){
                    $('#branch_id').append("<option value="+value.id+">"+value.name+"</option>");
                });
                $('.selectpicker').selectpicker('refresh');
            },
        });
    });

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
                        $('#invoice-no').val(data.invoiceNumber);
                        $('#invoice-date').val(data.invoiceDate);
                    }

                });
            }
        });
    });
</script>

@endsection
