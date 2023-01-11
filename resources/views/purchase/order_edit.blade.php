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
                        <h4>Add Purchase Order</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => ['purchase_order.update',$lim_order_data->id], 'method' => 'put', 'files' => true, 'id' => 'purchase-form']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PO Number</label>
                                            <input type="text" name="po_number" class="form-control"
                                            placeholder="Enter PO Number"
                                            value="{{$lim_order_data->po_number}}">
                                            @if($errors->has('po_number'))
                                                <span class="text-danger">
                                                   {{ $errors->first('po_number') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Revised</label>
                                            <input type="text" name="rivision_no" class="datepicker form-control"
                                            placeholder="Enter Last Revised"
                                            value="{{ date('d-M-Y',strtotime($lim_order_data->rivision_no)) }}">
                                            @if($errors->has('rivision_no'))
                                                <span class="text-danger">
                                                   {{ $errors->first('rivision_no') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Shipper/Vendor *</label>
                                            <select required name="vendor" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select vendor or shipper...">
                                                  @foreach ($lims_vendor_all as $vendor)
                                                      <option value="{{ $vendor->id }}" <?php echo($vendor->id == $lim_order_data->vendor )? 'selected':'' ?>>{{ $vendor->name }}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label>LC/SC No</label>-->
                                    <!--        <input type="text" name="lc_no" class="form-control" required value={{$lim_order_data->lc_no}} >-->
                                    <!--        @if($errors->has('lc_no'))-->
                                    <!--            <span class="text-danger">-->
                                    <!--                {{ $errors->first('lc_no') }}-->
                                    <!--            </span>-->
                                    <!--        @endif-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ship To*</label>
                                            <select name="ship_to" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select ship to...">
                                                @foreach ($lims_ship_to_all as $ship)
                                                     <option value="{{ $ship->id }}" <?php echo($ship->id == $lim_order_data->ship_to )? 'selected':'' ?>>{{ $ship->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('ship_to'))
                                                <span class="text-danger">
                                                    {{ $errors->first('ship_to') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Customer*</label>
                                            <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select customer...">
                                                @foreach ($lims_customer_all as $customer)
                                                     <option value="{{ $customer->id }}" <?php echo($customer->id == $lim_order_data->customer_id )? 'selected':'' ?>>{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('customer_id'))
                                                <span class="text-danger">
                                                    {{ $errors->first('customer_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Invoice To*</label>
                                                <select name="invoice_to" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select invoice to..." required>
                                                    @foreach ($lims_invoice_to_all as $invoice)
                                                         <option value="{{ $invoice->id }}" <?php echo($invoice->id == $lim_order_data->invoice_to )? 'selected':'' ?>>{{ $invoice->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('invoice_to'))
                                                <span class="text-danger">
                                                   {{ $errors->first('invoice_to') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Season*</label>
                                            <input type="text" name="season" class="form-control"
                                            placeholder="Enter Season"
                                            value="{{$lim_order_data->season}}" required>
                                            @if($errors->has('season'))
                                                <span class="text-danger">
                                                   {{ $errors->first('season') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Order Date*</label>
                                            <input type="text" name="order_date" class="datepicker form-control"
                                            placeholder="Enter Order Date"
                                            value="{{ date('d-M-Y',strtotime($lim_order_data->order_date)) }}" required>
                                            @if($errors->has('order_date'))
                                                <span class="text-danger">
                                                   {{ $errors->first('order_date') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label>Cancel date</label>-->
                                    <!--        <input type="date" name="cancel_date" class="form-control" value={{$lim_order_data->cancel_date}} required>-->
                                    <!--        @if($errors->has('cancel_date'))-->
                                    <!--            <span class="text-danger">-->
                                    <!--               {{ $errors->first('cancel_date') }}-->
                                    <!--            </span>-->
                                    <!--        @endif-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>X-Country Date*</label>
                                            <input type="text" name="ship_exp_date" class="datepicker form-control"
                                            placeholder="Enter X-Country Date"value="{{ date('d-M-Y',strtotime($lim_order_data->ship_exp_date)) }}" required>
                                            @if($errors->has('ship_exp_date'))
                                                <span class="text-danger">
                                                   {{ $errors->first('ship_exp_date') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Terms*</label>
                                            <input type="text" name="ship_terms" class="form-control"
                                            placeholder="Enter Terms"
                                            value="{{$lim_order_data->ship_terms}}" required>
                                            @if($errors->has('ship_terms'))
                                                <span class="text-danger">
                                                   {{ $errors->first('ship_terms') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment / Draft at*</label>
                                            <input type="text" name="payment_terms" class="form-control"
                                            placeholder="Enter Payment / Draft at"
                                            value="{{$lim_order_data->payment_terms}}" required>
                                            @if($errors->has('payment_terms'))
                                                <span class="text-danger">
                                                   {{ $errors->first('payment_terms') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fabric Ref*</label>
                                            <input type="text" name="febric_ref" class="form-control"
                                            placeholder="Enter Fabric Ref"
                                            value="{{$lim_order_data->febric_ref}}" required>
                                            @if($errors->has('febric_ref'))
                                                <span class="text-danger">
                                                   {{ $errors->first('febric_ref') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Brand/Label*</label>
                                            <input type="text" name="brand" class="form-control"
                                            placeholder="Brand/Label"
                                             value="{{$lim_order_data->brand}}">
                                            @if($errors->has('brand'))
                                                <span class="text-danger">
                                                   {{ $errors->first('brand') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ship Via*</label>
                                            <input type="text" name="ship_via" class="form-control"
                                            placeholder="Enter Ship Via"
                                            value="{{$lim_order_data->ship_via}}">
                                            @if($errors->has('ship_via'))
                                                <span class="text-danger">
                                                   {{ $errors->first('ship_via') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Style No*</label>
                                            <input type="text" name="style_no" class="form-control"
                                            placeholder="Enter Style No"
                                            required value="{{$lim_order_data->style_no}}">
                                            @if($errors->has('style_no'))
                                                <span class="text-danger">
                                                   {{ $errors->first('style_no') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CA/RN*</label>
                                            <input type="text"
                                            placeholder="Enter CA/RN"
                                            name="ca" class="form-control" value="{{$lim_order_data->ca}}" required>
                                            @if($errors->has('ca'))
                                                <span class="text-danger">
                                                   {{ $errors->first('ca') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Quantity*</label>
                                            <input type="text" id="total_quantity" name="total_quantity" id="total_quantity"
                                            placeholder="Enter Total Quantity"
                                            value="{{$lim_order_data->total_quantity}}" class="form-control total_quantity" required readonly>
                                            @if($errors->has('total_quantity'))
                                                <span class="text-danger">
                                                   {{ $errors->first('total_quantity') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Amount*</label>
                                            <input type="text" id="total_amount" name="total_amount"
                                            placeholder="Enter Total Amount"
                                            value="{{$lim_order_data->total_amount}}" class="form-control total_amount" required readonly>
                                            @if($errors->has('amount'))
                                                <span class="text-danger">
                                                   {{ $errors->first('amount') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Item Description*</label>
                                            <input type="text" name="description" class="form-control" id="description"
                                            placeholder="Enter Item Description" value="{{$lim_order_data->description}}">
                                            @if($errors->has('description'))
                                                <span class="text-danger">
                                                   {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fabrication*</label>
                                            <input type="text" name="fabrication" class="form-control" id="description"  placeholder="Enter Fabrication"value="{{$lim_order_data->fabrication}}">
                                            @if($errors->has('fabrication'))
                                                <span class="text-danger">
                                                   {{ $errors->first('fabrication') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Special Instruction*</label>
                                            <textarea name="instruction_notes" class="form-control" id="ins_notes" rows="5">{!! $lim_order_data->instruction_notes !!}</textarea>
                                            @if($errors->has('ins_notes'))
                                                <span class="text-danger">
                                                   {{ $errors->first('ins_notes') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Packing Instruction*</label>
                                            <textarea name="packing_instruction" class="form-control" id="packing_instruction" rows="5">{!! $lim_order_data->packing_instruction !!}</textarea>
                                            @if($errors->has('packing_instruction'))
                                                <span class="text-danger">
                                                   {{ $errors->first('packing_instruction') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="break_down">
                                    <label>BREAK DOOWN</label>
                                    {{-- <a id="add_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">Add Color</a> --}}
                                </div>


                            <div class="color_box">
                            @foreach($lim_details as $key => $value)
                            {{-- {{ dd($value) }} --}}
                                <div class="row">
                                    <div class="col-md-12" style="margin:30px 0px;">
                                        <table id="colorSection" width="100%">
                                             <thead>
                                                 <tr>
                                                     @if($key == 0)
                                                         <th>Color Name <a id="add_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">+</a></th>
                                                     @else
                                                         <th>Color Name <a id="remove_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">-</a></th>
                                                     @endif
                                                     <th>Code</th>
                                                     <th>Quantity</th>
                                                     <th>Unit Price</th>
                                                     <th>Sub Total</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr>
                                                     <td><input type="text" name="color[]" class="form-control" value="{{$value->color}}" placeholder="Enter Color Name"></td>
                                                     <td><input type="text" name="color_code[]" class="form-control" placeholder="Enter Color Code " value="{{$value->color_code}}"></td>
                                                     <td><input type="number" min="0" step="any" name="color_wise_quantity[]" value="{{$value->color_wise_quantity}}" id="color_wise_quantity{{ $key+1 }}" class="form-control color_wise_quantity{{ $key+1 }}" readonly></td>
                                                     <td><input type="number" min="0" step="any" name="color_unit_price[]" id="color_unit_price{{ $key+1 }}" value="{{$value->color_unit_price}}" class="form-control color_unit_price color_unit_price{{ $key+1 }}" oninput="getAmount({{ $key+1 }})"></td>
                                                     <td><input type="number" min="0" step="any" name="sub_total[]" id="sub_total{{ $key+1 }}" value="{{$value->sub_total}}" class="form-control sub_total{{ $key+1 }} sub_total" readonly></td>
                                                 </tr>
                                             </tbody>
                                        </table>

                                        <table id="sizeSection" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Size</th>
                                                    <th>Prepack</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody id="t_body_id_{{ $key }}">
                                                @for ($i=1; $i<=$sizeCount; $i++)
                                                    @if($value['size'.$i] != null)
                                                    <tr class="row-concat{{ $key }}" id="row-concat_{{ $i }}">
                                                        <td><input type="text" name="size{{ $i }}[]" class="form-control" value="{{$value['size'.$i]}}" placeholder="Enter Size"></td>
                                                        <td><input type="text" name="prepack{{ $i }}[]" class="form-control" value="{{$value['prepack'.$i]}}" placeholder="Enter prepack"></td>
                                                        <td><input type="number" min="0" step="any" name="quantity{{ $i }}[]" value="{{$value['quantity'.$i]}}" id="quantity{{ $key+1 }} color_wise_quantity1_qty_{{ $key+1 }}" class="form-control quantity{{ $key+1 }} color_wise_quantity1_qty_{{ $key+1 }}" oninput="calculateQuantity({{ $key+1 }}), getAmount({{ $key+1 }})" placeholder="Enter quantity"></td>
                                                        <td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow({{ $i }}, {{ $key }})">-</a></td>
                                                    </tr>
                                                    @endif
                                                @endfor
                                                <?php
                                                    $rowCount=0;
                                                    for($j=1; $j<=13; $j++){
                                                        if($value['size'.$j] != null){
                                                            $rowCount++;
                                                        }
                                                    }
                                                ?>
                                                <tr>
                                                    <a class="btn btn-success btn-sm" id="add_contact_{{ $key }}" style="color: white; " onclick="addRow({{ $key }})">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </tr>
                                                {{-- <tr>
                                                    <td><input type="text" name="size1[]" class="form-control" value="{{$value->size1}}" placeholder="Enter Size"></td>
                                                    <td><input type="text" name="prepack1[]" class="form-control" value="{{$value->prepack1}}" placeholder="Enter prepack"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity1[]" value="{{$value->quantity1}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}" placeholder="Enter quantity"></td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <td><input type="text" name="size2[]" class="form-control" value="{{$value->size2}}"></td>
                                                    <td><input type="text" name="prepack2[]" class="form-control" value="{{$value->prepack2}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity2[]" value="{{$value->quantity2}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size3[]" class="form-control" value="{{$value->size3}}"></td>
                                                    <td><input type="text" name="prepack3[]" class="form-control" value="{{$value->prepack3}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity3[]" value="{{$value->quantity3}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size4[]" class="form-control" value="{{$value->size4}}"></td>
                                                    <td><input type="text" name="prepack4[]" class="form-control" value="{{$value->prepack4}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity4[]" value="{{$value->quantity4}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size5[]" class="form-control" value="{{$value->size5}}"></td>
                                                    <td><input type="text" name="prepack5[]" class="form-control" value="{{$value->prepack5}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity5[]" value="{{$value->quantity5}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size6[]" class="form-control" value="{{$value->size6}}"></td>
                                                    <td><input type="text" name="prepack6[]" class="form-control" value="{{$value->prepack6}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity6[]" value="{{$value->quantity6}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size7[]" class="form-control" value="{{$value->size7}}"></td>
                                                    <td><input type="text" name="prepack7[]" class="form-control" value="{{$value->prepack7}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity7[]" value="{{$value->quantity7}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size8[]" class="form-control" value="{{$value->size8}}"></td>
                                                    <td><input type="text" name="prepack8[]" class="form-control" value="{{$value->prepack8}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity8[]" value="{{$value->quantity8}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size9[]" class="form-control" value="{{$value->size9}}"></td>
                                                    <td><input type="text" name="prepack9[]" class="form-control" value="{{$value->prepack9}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity9[]" value="{{$value->quantity9}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size10[]" class="form-control" value="{{$value->size10}}"></td>
                                                    <td><input type="text" name="prepack10[]" class="form-control" value="{{$value->prepack10}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity10[]" value="{{$value->quantity10}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size11[]" class="form-control" value="{{$value->size11}}"></td>
                                                    <td><input type="text" name="prepack11[]" class="form-control" value="{{$value->prepack11}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity11[]" value="{{$value->quantity11}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size12[]" class="form-control" value="{{$value->size12}}"></td>
                                                    <td><input type="text" name="prepack12[]" class="form-control" value="{{$value->prepack12}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity12[]" value="{{$value->quantity12}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size13[]" class="form-control" value="{{$value->size13}}"></td>
                                                    <td><input type="text" name="prepack13[]" class="form-control" value="{{$value->prepack13}}"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity13[]" value="{{$value->quantity13}}" id="quantity{{ $key+1 }}" class="form-control quantity{{ $key+1 }}"></td>
                                                </tr> --}}
                                            </tbody>
                                       </table>
                                    </div>
                                </div>
                            @endforeach
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="submit-btn">{{trans('file.submit')}}</button>
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

    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #purchase-order-menu-list").addClass("active");

    var y= '<?php $rowCount ?>';

    function aFucc(){
        console.log(85);
            // if(y<concatMaxField){
            //         y++;
            //         $('#t_body_id_'+p).append('<tr class="row-concat1" id="row-concat_'+y+'"><td><input type="text" name="size'+y+'[]" class="form-control" placeholder="Enter Size"></td><td><input type="text" name="prepack'+y+'[]" class="form-control" placeholder="Enter Prepack"></td><td><input type="number" min="0" step="any" name="quantity'+y+'[]" id="quantity'+y+'" class="form-control quantity1" placeholder="Enter Quantity"></td><td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">-</a></td></tr>');
            //     }
        }

    $(document).ready(function(){
        var max_field = 4;
        // console.log(max_field);
        var concatMaxField= 13;
        var wrapper = $(".color_box");
        var x = '<?php $lim_details->count() ?>';



        // $('#add_contact').click(function(){

        //     });

        $("#add_size").click(function(){
            if(x < max_field){
                x++;
                $('#color_number').val(x);
                $(wrapper).append('<div class="row">\
                                    <div class="col-md-12" style="margin: 30px 0px;">\
                                        <table id="colorSection">\
                                             <thead>\
                                                 <tr>\
                                                     <th>Color Name <a id="remove_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">-</a></th>\
                                                     <th>\
                                                        <a class="btn btn-success btn-sm" id="add_contact_'+x+'" onclick="addRow('+x+')" style="color: white; ">\
                                                            <i class="fa fa-plus"></i>\
                                                        </a>\
                                                    </th>\
                                                     <th>Code</th>\
                                                     <th>Quantity</th>\
                                                     <th>Unit Price</th>\
                                                     <th>Total Price</th>\
                                                 </tr>\
                                             </thead>\
                                             <tbody>\
                                                 <tr>\
                                                     <td><input type="text" name="color[]" class="form-control"></td>\
                                                     <td><input type="text" name="color_code[]" class="form-control"></td>\
                                                     <td><input type="number" min="0" step="any" name="color_wise_quantity[]" value="0" id="color_wise_quantity'+x+'" class="form-control color_wise_quantity'+x+'" readonly></td>\
                                                     <td><input type="number" min="0" step="any" name="color_unit_price[]" id="color_unit_price' + x + '" class="form-control color_unit_price color_unit_price' + x + '" oninput="getAmount('+x+')"></td>\
                                                     <td><input type="number" min="0" step="any" name="sub_total[]" id="sub_total' + x + '" value="0.00" class="form-control sub_total' + x + ' sub_total" readonly></td>\
                                                 </tr>\
                                             </tbody>\
                                        </table>\
                                        <table id="sizeSection" width="100%">\
                                            <thead>\
                                                <tr>\
                                                    <th>Size</th>\
                                                    <th>Prepack</th>\
                                                    <th>Quantity</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="t_body_id_'+x+'">\
                                                <tr class="row-concat'+x+'" id="row-concat_1">\
                                                    <td><input type="text" name="size1[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack1[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity1[]" id="quantity1 color_wise_quantity'+x+'_qty_'+x+'" class="color_wise_quantity1_qty_'+x+' form-control quantity' + x + '" oninput="calculateQuantity('+x+', 1), getAmount('+x+')"></td>\
                                                    <td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow(1, '+x+')">-</a></td>\
                                                </tr>\
                                            </tbody>\
                                       </table>\
                                    </div>\
                                </div>');
            }else{
                alert('you can not add more than 4 field');
            }
        });
    });

    function addRow(x){
            var counter= $('.row-concat'+x).length+2;
                if(counter-1<13){
                    // y++;
                    $('#t_body_id_'+x).append('<tr class="row-concat'+x+'" id="row-concat_'+counter+'"><td><input type="text" name="size'+counter+'[]" class="form-control" placeholder="Enter Size"></td><td><input type="text" name="prepack'+counter+'[]" class="form-control" placeholder="Enter Prepack"></td><td><input type="number" min="0" step="any" name="quantity'+counter+'[]" id="quantity'+counter+'" class="form-control quantity1" placeholder="Enter Quantity"></td><td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow('+counter+','+x+')">-</a></td></tr>');
                }else{
                    alert("Maximum row is 13");
                }
            }

    function removeRow(counter, x){
        // console.log(counter);
        $('.row-concat'+x+ '#row-concat_'+counter).remove();
    }

    function getAmount(x){
            var subTotalAmount= 0;
            var totalAmount= 0;
            var qty=0;
            var price=0;
            qty = parseFloat($('#color_wise_quantity'+x).val());
            price = parseFloat($('#color_unit_price'+x).val());
            subTotalAmount= parseFloat(qty*price);
            $('#sub_total'+x).val(subTotalAmount);
            $('.sub_total').each(function(){
                totalAmount += parseFloat($(this).val());
            });
            $('#total_amount').val(totalAmount);
        }

        function addRow(x) {
            // console.log($('.dd_'+x).length+2);
            y++;
            var counter = $('.row-concat' + x).length+x;
            // if (counter - 2 < 13) {
                // y++;
                $('#t_body_id_' + x).append('<tr class="row-concat' + x + '" id="row-concat_' + counter + '"><td><input type="text" name="size' + counter + '[]" class="form-control" placeholder="Enter Size"></td><td><input type="text" name="prepack' + counter + '[]" class="form-control" placeholder="Enter Prepack"></td><td><input type="number" min="0" step="any" name="quantity' + counter + '[]" id="color_wise_quantity'+x+'_qty_'+ counter + '" oninput="calculateQuantity('+x+'), getAmount('+x+')" class="form-control color_wise_quantity1_qty_'+x+' quantity'+x+'" placeholder="Enter Quantity"></td><td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow('+x+','+counter+')">-</a></td></tr>');
            // } else {
            //     alert("Maximum row is 13");
            // }
        }

    tinymce.init({
      selector: 'textarea',
      height: 150,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code wordcount'
      ],
      toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
      branding:false
    });
</script>
@endsection
