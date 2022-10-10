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
                        <h4>Update Service Sale</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => ['service.sale.update', $lims_sale_data->id], 'method' => 'put', 'files' => true, 'id' => 'payment-form']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.reference')}}</label>
                                            <p><strong>{{ $lims_sale_data->reference_no }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.customer')}} *</label>
                                            <input type="hidden" name="customer_id_hidden"  value="{{ $lims_sale_data->customer_id }}"/>
                                            <select required name="customer_id" class="selectpicker form-control" data-live-search="true" id="customer_id" data-live-search-style="begins" title="Select customer...">
                                                @foreach($lims_customer_list as $customer)
                                                   <option value="{{$customer->id}}">{{$customer->name . ' (' . $customer->phone_number . ')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.Biller')}} *</label>
                                            <input type="hidden" name="biller_id_hidden"  value="{{$lims_sale_data->biller_id}}" />
                                            <select required name="biller_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Biller...">
                                                @foreach($lims_biller_list as $biller)
                                                    <option value="{{$biller->id}}">{{$biller->name . ' (' . $biller->company_name . ')'}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label>Select Service</label>
                                        <div class="search-box input-group">
                                            <button type="button" class="btn btn-secondary btn-lg"><i class="fa fa-qrcode"></i></button>
                                            <input type="text" name="service_code_name" id="lims_servicecodeSearch" placeholder="Please type service code and select..." class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <h5>{{trans('file.Order Table')}} *</h5>
                                        <div class="table-responsive mt-3">
                                            <table id="myTable" class="table table-hover order-list">
                                                <thead>
                                                    <tr>
                                                        <th>{{trans('file.name')}}</th>
                                                        <th>{{trans('file.Code')}}</th>
                                                        <th>{{trans('file.Quantity')}}</th>
                                                        <th>{{trans('file.Net Unit Price')}}</th>
                                                        <th>{{trans('file.Discount')}}</th>
                                                        <th>{{trans('file.Tax')}}</th>
                                                        <th>{{trans('file.Subtotal')}}</th>
                                                        <th><i class="dripicons-trash"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($lims_service_sale_data as $service_sale)
                                                      <tr>
                                                          <?php
                                                             if($service_sale->product->tax_method == 1){
                                                                $service_price = $service_sale->unit_price;
                                                            }
                                                            elseif ($service_sale->product->tax_method == 2) {
                                                                $service_price = $service_sale->unit_price;
                                                            }
                                                            $tax = DB::table('taxes')->where('rate',$service_sale->tax_rate)->first();
                                                          ?>
                                                          <td>{{$service_sale->product->name}} <button type="button" class="edit-service btn btn-link" data-toggle="modal" data-target="#editModal"> <i class="dripicons-document-edit"></i></button> <input type="hidden" class="product-type" value="" /></td>
                                                          <td>{{$service_sale->product->code}}</td>
                                                          <td><input type="number" class="form-control qty" name="qty[]" value="{{$service_sale->qty}}" step="any" required/></td>
                                                          <td class="net_unit_price">{{ number_format((float)$service_sale->unit_price, 2, '.', '') }} </td>
                                                          <td class="discount">{{ number_format((float)$service_sale->discount, 2, '.', '') }}</td>
                                                          <td class="tax">{{ number_format((float)$service_sale->tax, 2, '.', '') }}</td>
                                                          <td class="sub-total">{{ number_format((float)$service_sale->total, 2, '.', '') }}</td>
                                                          <td><button type="button" class="ibtnDel btn btn-md btn-danger">{{trans("file.delete")}}</button></td>

                                                        <input type="hidden" class="service-code" name="service_code[]" value="{{$service_sale->product->code}}"/>
                                                        <input type="hidden" name="service_id[]" value="{{$service_sale->product->id}}"/>

                                                        <input type="hidden" class="service-price" name="service_price[]" value="{{$service_price}}"/>

                                                        <input type="hidden" class="net_unit_price" name="net_unit_price[]" value="{{$service_sale->unit_price}}" />
                                                        <input type="hidden" class="discount-value" name="discount[]" value="{{$service_sale->discount}}" />
                                                        <input type="hidden" class="tax-rate" name="tax_rate[]" value="{{$service_sale->tax_rate}}"/>
                                                        @if($tax)
                                                        <input type="hidden" class="tax-name" value="{{$tax->name}}" />
                                                        @else
                                                        <input type="hidden" class="tax-name" value="No Tax" />
                                                        @endif
                                                        <input type="hidden" class="tax-method" value="{{$service_sale->product->tax_method}}"/>
                                                        <input type="hidden" class="tax-value" name="tax[]" value="{{$service_sale->tax}}" />
                                                        <input type="hidden" class="subtotal-value" name="subtotal[]" value="{{$service_sale->total}}" />
                                                      </tr>
                                                   @endforeach
                                                </tbody>
                                                <tfoot class="tfoot active">
                                                    <th colspan="2">{{trans('file.Total')}}</th>
                                                    <th id="total-qty">{{$lims_sale_data->total_qty}}</th>
                                                    <th></th>
                                                    <th id="total-discount">{{ number_format((float)$lims_sale_data->total_discount, 2, '.', '') }}</th>
                                                    <th id="total-tax">{{ number_format((float)$lims_sale_data->total_tax, 2, '.', '')}}</th>
                                                    <th id="total">{{ number_format((float)$lims_sale_data->total_price, 2, '.', '') }}</th>
                                                    <th><i class="dripicons-trash"></i></th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_qty"  value="{{$lims_sale_data->total_qty}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_discount" value="{{$lims_sale_data->total_discount}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_tax" value="{{$lims_sale_data->total_tax}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="total_price" value="{{$lims_sale_data->total_price}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="item"  value="{{$lims_sale_data->item}}"/>
                                            <input type="hidden" name="order_tax" value="{{$lims_sale_data->order_tax}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="grand_total" value="{{$lims_sale_data->grand_total}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="order_tax_rate_hidden" value="{{$lims_sale_data->order_tax_rate}}">
                                            <label>{{trans('file.Order Tax')}}</label>
                                            <select class="form-control" name="order_tax_rate">
                                                <option value="0">No Tax</option>
                                                @foreach($lims_tax_list as $tax)
                                                <option value="{{$tax->rate}}">{{$tax->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                <strong>{{trans('file.Order Discount')}}</strong>
                                            </label>
                                            <input type="number" name="order_discount" class="form-control" value="{{$lims_sale_data->order_discount}}" step="any" min="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                <strong>{{trans('file.Shipping Cost')}}</strong>
                                            </label>
                                            <input type="number" name="shipping_cost" class="form-control" value="{{$lims_sale_data->shipping_cost}}" step="any" min="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('file.Attach Document')}}</label> <i class="dripicons-question" data-toggle="tooltip" title="Only jpg, jpeg, png, gif, pdf, csv, docx, xlsx and txt file is supported"></i>
                                            <input type="file" name="document" class="form-control" />
                                            @if($errors->has('extension'))
                                                <span>
                                                   <strong>{{ $errors->first('extension') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{trans('file.Sale Status')}} *</label>
                                            <input type="hidden" name="sale_status_hidden"  value="{{$lims_sale_data->sale_status}}"/>
                                            <select name="sale_status" class="form-control">
                                                <option value="1">{{trans('file.Completed')}}</option>
                                                <option value="2">{{trans('file.Pending')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="payment_status" value="{{$lims_sale_data->payment_status}}"/>
                                            <input type="hidden" name="paid_amount" value="{{$lims_sale_data->paid_amount}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.Sale Note')}}</label>
                                            <textarea rows="5" class="form-control" name="sale_note" >{{ $lims_sale_data->sale_note }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{trans('file.Staff Note')}}</label>
                                            <textarea rows="5" class="form-control" name="staff_note">{{ $lims_sale_data->staff_note }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary" id="submit-button">
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-bordered table-condensed totals">
            <td><strong>{{trans('file.Items')}}</strong>
                <span class="pull-right" id="item">0.00</span>
            </td>
            <td><strong>{{trans('file.Total')}}</strong>
                <span class="pull-right" id="subtotal">0.00</span>
            </td>
            <td><strong>{{trans('file.Order Tax')}}</strong>
                <span class="pull-right" id="order_tax">0.00</span>
            </td>
            <td><strong>{{trans('file.Order Discount')}}</strong>
                <span class="pull-right" id="order_discount">0.00</span>
            </td>
            <td><strong>{{trans('file.Shipping Cost')}}</strong>
                <span class="pull-right" id="shipping_cost">0.00</span>
            </td>
            <td><strong>{{trans('file.grand total')}}</strong>
                <span class="pull-right" id="grand_total">0.00</span>
            </td>
        </table>
    </div>

    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modal_header" class="modal-title"></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>{{trans('file.Quantity')}}</label>
                            <input type="number" name="edit_qty" class="form-control" step="any" readonly>
                        </div>
                        <div class="form-group">
                            <label>{{trans('file.Unit Discount')}}</label>
                            <input type="number" name="edit_discount" class="form-control" step="any">
                        </div>
                        <div class="form-group">
                            <label>{{trans('file.Unit Price')}}</label>
                            <input type="number" name="edit_unit_price" class="form-control" step="any">
                        </div>
                        <?php
                            $tax_name_all[] = 'No Tax';
                            $tax_rate_all[] = 0;
                            foreach($lims_tax_list as $tax) {
                                $tax_name_all[] = $tax->name;
                                $tax_rate_all[] = $tax->rate;
                            }
                        ?>
                        <div class="form-group">
                            <label>{{trans('file.Tax Rate')}}</label>
                            <select name="edit_tax_rate" class="form-control selectpicker">
                                @foreach($tax_name_all as $key => $name)
                                <option value="{{$key}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="button" name="update_btn" class="btn btn-primary">{{trans('file.update')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">

    $("ul#service").siblings('a').attr('aria-expanded','true');
    $("ul#service").addClass("show");
    $("ul#service #service-sale-list-menu").addClass("active");

    $(".card-element").hide();
    $("#cheque").hide();

    // array data depend on warehouse
    var service_code = [];
    var service_name = [];
    var service_qty = [];
    var service_type = [];
    var service_id = [];

    // array data with selection
    var service_price = [];
    var service_discount = [];
    var tax_rate = [];
    var tax_name = [];
    var tax_method = [];

    var exist_qty = [];
    var rowindex;


    var rownumber = $('table.order-list tbody tr:last').index();

    for(rowindex  =0; rowindex <= rownumber; rowindex++){

        service_price.push(parseFloat($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.service-price').val()));
        var total_discount = parseFloat($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(5)').text());
        var quantity = parseFloat($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val());
        exist_qty.push(quantity);
        service_discount.push((total_discount / quantity).toFixed(2));
        tax_rate.push(parseFloat($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-rate').val()));
        tax_name.push($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-name').val());
        tax_method.push($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-method').val());
    }

    //assigning value
    $('select[name="customer_id"]').val($('input[name="customer_id_hidden"]').val());
    $('select[name="biller_id"]').val($('input[name="biller_id_hidden"]').val());
    $('select[name="sale_status"]').val($('input[name="sale_status_hidden"]').val());
    $('select[name="order_tax_rate"]').val($('input[name="order_tax_rate_hidden"]').val());
    $('.selectpicker').selectpicker('refresh');

    $('#item').text($('input[name="item"]').val() + '(' + $('input[name="total_qty"]').val() + ')');
    $('#subtotal').text(parseFloat($('input[name="total_price"]').val()).toFixed(2));
    $('#order_tax').text(parseFloat($('input[name="order_tax"]').val()).toFixed(2));
    if(!$('input[name="order_discount"]').val())
        $('input[name="order_discount"]').val('0.00');
    $('#order_discount').text(parseFloat($('input[name="order_discount"]').val()).toFixed(2));
    if(!$('input[name="shipping_cost"]').val())
        $('input[name="shipping_cost"]').val('0.00');
    $('#shipping_cost').text(parseFloat($('input[name="shipping_cost"]').val()).toFixed(2));
    $('#grand_total').text(parseFloat($('input[name="grand_total"]').val()).toFixed(2));

    //Change quantity
    $("#myTable").on('input', '.qty', function() {
        rowindex = $(this).closest('tr').index();
        if($(this).val() < 1 && $(this).val() != '') {
        $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(1);
        alert("Quantity can't be less than 1");
        }
        calculateRowProductData($(this).val(), true);
    });

    //Delete product
    $("table.order-list tbody").on("click", ".ibtnDel", function(event) {
        rowindex = $(this).closest('tr').index();
        service_price.splice(rowindex, 1);
        service_discount.splice(rowindex, 1);
        tax_rate.splice(rowindex, 1);
        tax_name.splice(rowindex, 1);
        tax_method.splice(rowindex, 1);
        $(this).closest("tr").remove();
        calculateTotal();
    });
    //Edit product
    $("table.order-list").on("click", ".edit-service", function() {
        rowindex = $(this).closest('tr').index();
        //alert(rowindex);
        edit();
    });

    //alert(service_price);
    <?php $serviceArray = []; ?>
    var service_code = [ @foreach($services as $service)
        <?php
            $serviceArray[] = $service->code . ' (' . $service->name . ')';
        ?>
         @endforeach
            <?php
              echo  '"'.implode('","', $serviceArray).'"';
            ?> ];

$('#lims_servicecodeSearch').on('input', function(){
    var customer_id = $('#customer_id').val();

    temp_data = $('#lims_servicecodeSearch').val();
    if(!customer_id){
        $('#lims_servicecodeSearch').val(temp_data.substring(0, temp_data.length - 1));
        alert('Please select Customer!');
    }
});

    var lims_servicecodeSearch = $('#lims_servicecodeSearch');

   lims_servicecodeSearch.autocomplete({
    source: function(request, response) {
        var matcher = new RegExp(".?" + $.ui.autocomplete.escapeRegex(request.term), "i");
        response($.grep(service_code, function(item) {
            return matcher.test(item);
        }));
    },
    select: function(event, ui) {
        var data = ui.item.value;
        $.ajax({
            type: 'GET',
            url: '../service_search_sale',
            data: {
                data: data
            },
            success: function(data) {
                //alert(data);
                var flag = 1;
            $(".service-code").each(function() {
                if ($(this).text() == data[1]) {
                    alert('duplicate input is not allowed!')
                    flag = 0;
                }
            });
            $("input[name='service_code_name']").val('');
            if(flag){
                var newRow = $("<tr>");
                var cols = '';
                cols += '<td>' + data[0] + '<button type="button" class="edit-service btn btn-link" data-toggle="modal" data-target="#editModal"> <i class="dripicons-document-edit"></i></button></td>';
                cols += '<td class="service-code">' + data[1] + '</td>';
                cols += '<td><input type="number" class="form-control qty" name="qty[]" value="1" step="any" required /></td>';
                cols += '<td class="net_unit_price"><input type="number" class="form-control price" name="net_unit_price[]" value="'+data[2]+'" step="any" required readonly/></td>';
                cols += '<td class="discount">0.00</td>';
                cols += '<td class="tax"></td>';
                cols += '<td class="sub-total"></td>';
                cols += '<td><button type="button" class="ibtnDel btn btn-md btn-danger">{{trans("file.delete")}}</button></td>';
                cols += '<input type="hidden" class="service-code" name="service_code[]" value="' + data[1] + '"/>';
                cols += '<input type="hidden" class="service-id" name="service_id[]" value="' + data[6] + '"/>';
                cols += '<input type="hidden" class="discount-value" name="discount[]" />';
                cols += '<input type="hidden" class="tax-rate" name="tax_rate[]" value="' + data[3] + '"/>';
                cols += '<input type="hidden" class="tax-value" name="tax[]" />';
                cols += '<input type="hidden" class="subtotal-value" name="subtotal[]" />';

                newRow.append(cols);
                $("table.order-list tbody").append(newRow);

                service_price.push(parseFloat(data[2]));
                service_discount.push('0.00');
                tax_rate.push(parseFloat(data[3]));
                tax_name.push(data[4]);
                tax_method.push(data[5]);
                rowindex = newRow.index();
                //alert(tax_rate);
                calculateRowProductData(1);
            }
            }
        });
    }
 });

 function edit()
{
    var row_service_name = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(1)').text();
    var row_service_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(2)').text();
    $('#modal_header').text(row_service_name + '(' + row_service_code + ')');

    var qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val();
    $('input[name="edit_qty"]').val(qty);

    var tax_name_all = <?php echo json_encode($tax_name_all) ?>;
    tex = tax_name_all.indexOf(tax_name[rowindex]);
    $('select[name="edit_tax_rate"]').val(tex);
    $('input[name="edit_discount"]').val(parseFloat(service_discount[rowindex]).toFixed(2));
    row_service_price = service_price[rowindex];

    $('input[name="edit_unit_price"]').val(row_service_price.toFixed(2));
    $('.selectpicker').selectpicker('refresh');
}

$('button[name="update_btn"]').on("click", function() {

    var edit_discount = $('input[name="edit_discount"]').val();
    var edit_qty = $('input[name="edit_qty"]').val();
    var edit_unit_price = $('input[name="edit_unit_price"]').val();

    if (parseFloat(edit_discount) > parseFloat(edit_unit_price)) {
        alert('Invalid Discount Input!');
        return;
    }

    if(edit_qty < 1) {
        $('input[name="edit_qty"]').val(1);
        edit_qty = 1;
        alert("Quantity can't be less than 1");
    }

    var tax_rate_all = <?php echo json_encode($tax_rate_all) ?>;

    tax_rate[rowindex] = parseFloat(tax_rate_all[$('select[name="edit_tax_rate"]').val()]);
    tax_name[rowindex] = $('select[name="edit_tax_rate"] option:selected').text();
    service_discount[rowindex] = $('input[name="edit_discount"]').val();
    service_price[rowindex] = edit_unit_price;

    calculateRowProductData(edit_qty,false);

    $('#editModal').modal('hide');
});

 function calculateRowProductData(quantity) {
    var row_service_tax_rate = tax_rate[rowindex];
    var row_service_price = service_price[rowindex];
    if (tax_method[rowindex] == 1) {
        var net_unit_price = row_service_price - service_discount[rowindex];
        var tax = net_unit_price * quantity * (tax_rate[rowindex] / 100);
        var sub_total = (net_unit_price * quantity) + tax;

    }else{
        var net_unit_price = row_service_price - service_discount[rowindex];
        var tax = net_unit_price * quantity * (tax_rate[rowindex] / 100);
        var sub_total = (net_unit_price * quantity);
    }

    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(4)').text(service_price[rowindex]);
    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.net_unit_price').val(service_price[rowindex]);

    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(5)').text((service_discount[rowindex] * quantity).toFixed(2));
    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.discount-value').val((service_discount[rowindex] * quantity).toFixed(2));

    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(6)').text(tax.toFixed(2));
    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-value').val(tax.toFixed(2));
    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('td:nth-child(7)').text(sub_total.toFixed(2));
    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.subtotal-value').val(sub_total.toFixed(2));

    calculateTotal();
 }
 function calculateTotal(){
    //Sum of discount
    var total_discount = 0;
    $(".discount").each(function() {
        total_discount += parseFloat($(this).text());
    });
    $("#total-discount").text(total_discount.toFixed(2));
    $('input[name="total_discount"]').val(total_discount.toFixed(2));

    //Sum of tax
    var total_tax = 0;
    $(".tax").each(function() {
        total_tax += parseFloat($(this).text());
    });
    $("#total-tax").text(total_tax.toFixed(2));
    $('input[name="total_tax"]').val(total_tax.toFixed(2));

    //total qty
    var total_qty = 0;
    $(".qty").each(function() {
        total_qty += parseFloat($(this).val());
    });
    $("#total-qty").text(total_qty.toFixed(2));
    $('input[name="total_qty"]').val(total_qty.toFixed(2));
    //alert(total_qty);
    //Sum of subtotal
    var total = 0;
    $(".sub-total").each(function() {
        total += parseFloat($(this).text());
    });
    $("#total").text(total.toFixed(2));
    $('input[name="total_price"]').val(total.toFixed(2));

    calculateGrandTotal();
 }
 function calculateGrandTotal(){
    var item = $('table.order-list tbody tr:last').index();

    var total_qty = parseFloat($('#total-qty').text());

    var subtotal = parseFloat($('#total').text());
    var order_tax = parseFloat($('select[name="order_tax_rate"]').val());
    var order_discount = parseFloat($('input[name="order_discount"]').val());
    var shipping_cost = parseFloat($('input[name="shipping_cost"]').val());

    //alert(subtotal);
    if (!order_discount)
        order_discount = 0.00;
    if (!shipping_cost)
        shipping_cost = 0.00;

    item = ++item + '(' + total_qty + ')';
    order_tax = (subtotal - order_discount) * (order_tax / 100);
    var grand_total = (subtotal + order_tax + shipping_cost) - order_discount;

    $('#item').text(item);
    $('input[name="item"]').val($('table.order-list tbody tr:last').index() + 1);
    $('#subtotal').text(subtotal.toFixed(2));
    $('#order_tax').text(order_tax.toFixed(2));
    $('input[name="order_tax"]').val(order_tax.toFixed(2));
    $('#order_discount').text(order_discount.toFixed(2));
    $('#shipping_cost').text(shipping_cost.toFixed(2));
    $('#grand_total').text(grand_total.toFixed(2));
    if( $('select[name="payment_status"]').val() == 4 ){
        $('#paying-amount').val('');
        $('#paid-amount').val(grand_total.toFixed(2));
    }
    $('input[name="grand_total"]').val(grand_total.toFixed(2));

}
    $('input[name="order_discount"]').on("input", function() {
        calculateGrandTotal();
    });

    $('input[name="shipping_cost"]').on("input", function() {
        calculateGrandTotal();
    });

    $('select[name="order_tax_rate"]').on("change", function() {
        calculateGrandTotal();
    });

    $(document).on('submit', '#payment-form', function(e) {
    var rownumber = $('table.order-list tbody tr:last').index();
    if ( rownumber < 0 ) {
        alert("Please insert product to order table!")
        e.preventDefault();
    }
    else
    $("#paid-amount").prop('disabled',false);
});
</script>
@endsection @section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>

@endsection

