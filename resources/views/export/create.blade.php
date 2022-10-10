@extends('layout.main') @section('content')
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Add Export</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => 'export.store', 'method' => 'post', 'files' => true, 'id' => 'purchase-form']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Invoice No *</label>
                                            <input type="text" name="invoice_no" class="form-control" required>
                                            @if($errors->has('invoice_no'))
                                                <span class="text-danger">
                                                    {{ $errors->first('invoice_no') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date *</label>
                                            <input type="text" name="date" class="datepicker form-control" placeholder="" required>
                                            @if($errors->has('date'))
                                                <span class="text-danger">
                                                   {{ $errors->first('date') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>LC/Contract No *</label>
                                            <input type="text" name="lc_number" class="form-control" required>
                                            @if($errors->has('lc_number'))
                                                <span class="text-danger">
                                                    {{ $errors->first('lc_number') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>BL No *</label>
                                            <input type="text" name="contact_number" class="form-control" required>
                                            @if($errors->has('contact_number'))
                                                <span class="text-danger">
                                                    {{ $errors->first('contact_number') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Shipper *</label>
                                            <select name="shipper_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select shipper..." required>
                                                @foreach ($lims_shipper_all as $shipper)
                                                    <option value="{{ $shipper->id }}">{{ $shipper->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('shipper_id'))
                                                <span class="text-danger">
                                                    {{ $errors->first('shipper_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ship To *</label>
                                            <select name="ship_to_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select ship to..." required>
                                                @foreach ($lims_ship_to_all as $shipper)
                                                    <option value="{{ $shipper->id }}">{{ $shipper->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('ship_to_id'))
                                                <span class="text-danger">
                                                    {{ $errors->first('ship_to_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Account Of *</label>
                                            <select name="account_of" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select account of..." required>
                                                <option value="1">Winking</option>
                                                <option value="2">Artisan</option>
                                            </select>
                                            @if($errors->has('account_of'))
                                                <span class="text-danger">
                                                    {{ $errors->first('account_of') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Customer *</label>
                                            <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select invoice to..." required>
                                                @foreach ($lims_customer_all as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('customer_id'))
                                                <span class="text-danger">
                                                   {{ $errors->first('customer_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Quantity  (pcs)*</label>
                                            <input type="number" name="quantity_pcs" class="form-control" required>
                                            @if($errors->has('quantity_pcs'))
                                                <span class="text-danger">
                                                   {{ $errors->first('quantity_pcs') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Quantity  (ctn)*</label>
                                            <input type="number" name="quantity_crt" class="form-control" required>
                                            @if($errors->has('quantity_crt'))
                                                <span class="text-danger">
                                                   {{ $errors->first('quantity_crt') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Invoice Value *</label>
                                            <input type="text" name="invoice_value" id="invoice_value" class="form-control invoice_value" required>
                                            @if($errors->has('invoice_value'))
                                                <span class="text-danger">
                                                   {{ $errors->first('invoice_value') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Shipper Invoice Value *</label>
                                            <input type="text" name="shipper_invoice_value" id="shipper_invoice_value" class="form-control shipper_invoice_value" required>
                                            @if($errors->has('shipper_invoice_value'))
                                                <span class="text-danger">
                                                   {{ $errors->first('shipper_invoice_value') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ETD *</label>
                                            <input type="text" name="etd" class="datepicker form-control" required>
                                            @if($errors->has('etd'))
                                                <span class="text-danger">
                                                   {{ $errors->first('etd') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ETA *</label>
                                            <input type="text" name="eta" class="datepicker form-control" required>
                                            @if($errors->has('eta'))
                                                <span class="text-danger">
                                                   {{ $errors->first('eta') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment Due Date *</label>
                                            <input type="text" name="due_date" class="datepicker form-control" required>
                                            @if($errors->has('due_date'))
                                                <span class="text-danger">
                                                   {{ $errors->first('due_date') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status *</label>
                                            <select name="export_status" id="" class="form-control" required>
                                                <option>Select Status</option>
                                                <option value="Received">Received</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                        </div>
                                    </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" id="submit-btn">{{trans('file.submit')}}</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    $("ul#export-summary").siblings('a').attr('aria-expanded','true');
    $("ul#export-summary").addClass("show");
    $("ul#export-summary #export-summary-list-menu").addClass("active");

</script>
@endsection
