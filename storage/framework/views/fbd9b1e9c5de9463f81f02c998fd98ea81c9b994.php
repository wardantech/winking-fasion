 <?php $__env->startSection('content'); ?>
    <?php if(session()->has('not_permitted')): ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
    <?php endif; ?>
    <?php $__env->startPush('css'); ?>

    <?php $__env->stopPush(); ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Purchase Order</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>

                                    .</small></p>
                            <?php echo Form::open(['route' => 'purchase_order.store', 'method' => 'post', 'files' => true, 'id' => 'purchase-form']); ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>PO Number*</label>
                                                <input type="text" name="po_number" class="form-control"
                                                       placeholder="Enter PO Number">
                                                <?php if($errors->has('po_number')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('po_number')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Revised</label>
                                                <input type="text" name="rivision_no" class="datepicker form-control "
                                                       placeholder="Enter Last Revised">
                                                <?php if($errors->has('rivision_no')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('rivision_no')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Shipper/Vendor *</label>
                                                <select required name="vendor" class="selectpicker form-control"
                                                        data-live-search="true" data-live-search-style="begins"
                                                        title="Select vendor or shipper...">
                                                    <?php $__currentLoopData = $lims_vendor_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-6">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <label>LC/SC No</label>-->
                                        <!--        <input type="text" name="lc_no" class="form-control" required>-->
                                        <!--        <?php if($errors->has('lc_no')): ?>-->
                                        <!--            <span class="text-danger">-->
                                        <!--                <?php echo e($errors->first('lc_no')); ?>-->
                                        <!--            </span>-->
                                        <!--        <?php endif; ?>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ship To*</label>
                                                <select name="ship_to" class="selectpicker form-control"
                                                        data-live-search="true" data-live-search-style="begins"
                                                        title="Select ship to...">
                                                    <?php $__currentLoopData = $lims_ship_to_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ship->id); ?>"><?php echo e($ship->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('ship_to')): ?>
                                                    <span class="text-danger">
                                                    <?php echo e($errors->first('ship_to')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Customer*</label>
                                                <select name="customer_id" class="selectpicker form-control"
                                                        data-live-search="true" data-live-search-style="begins"
                                                        title="Select customer...">
                                                    <?php $__currentLoopData = $lims_customer_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('customer_id')): ?>
                                                    <span class="text-danger">
                                                    <?php echo e($errors->first('customer_id')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label>Invoice To*</label>
                                                <select name="invoice_to" class="form-control" data-live-search="true"
                                                        data-live-search-style="begins" title="Select invoice to..."
                                                        required>
                                                    <?php $__currentLoopData = $lims_invoice_to_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($invoice->id); ?>"><?php echo e($invoice->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('invoice_to')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('invoice_to')); ?>

                                                </span>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Season*</label>
                                                <input type="text"
                                                       placeholder="Enter Season"
                                                       name="season" class="form-control" required>
                                                <?php if($errors->has('season')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('season')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Order date*</label>
                                                <input type="text" name="order_date" class="datepicker form-control"
                                                       placeholder="Enter Order Date" required>
                                                <?php if($errors->has('order_date')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('order_date')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-6">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <label>Cancel date</label>-->
                                        <!--        <input type="date" name="cancel_date" class="form-control" required>-->
                                        <!--        <?php if($errors->has('cancel_date')): ?>-->
                                        <!--            <span class="text-danger">-->
                                        <!--               <?php echo e($errors->first('cancel_date')); ?>-->
                                        <!--            </span>-->
                                        <!--        <?php endif; ?>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>X-Country Date*</label>
                                                <input type="text" name="ship_exp_date" class="datepicker form-control"
                                                       placeholder="Enter X-Country Date"
                                                       required>
                                                <?php if($errors->has('ship_exp_date')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('ship_exp_date')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Terms*</label>
                                                <input type="text" name="ship_terms" class="form-control"
                                                       placeholder="Enter Terms " required>
                                                <?php if($errors->has('ship_terms')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('ship_terms')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment / Draft at*</label>
                                                <input type="text" name="payment_terms" class="form-control"
                                                       placeholder="Enter Payment / Draft at " required>
                                                <?php if($errors->has('payment_terms')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('payment_terms')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fabric Ref*</label>
                                                <input type="text" name="febric_ref" class="form-control"
                                                       placeholder="Enter Fabric Ref"
                                                       required>
                                                <?php if($errors->has('febric_ref')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('febric_ref')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Brand/Label*</label>
                                                <input type="text" name="brand" class="form-control"
                                                       placeholder="Enter Brand/Label">
                                                <?php if($errors->has('brand')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('brand')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ship Via*</label>
                                                <input type="text" name="ship_via" class="form-control"
                                                       placeholder="Enter Ship Via">
                                                <?php if($errors->has('ship_via')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('ship_via')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label>Style No</label>
                                                <input type="text" name="style_no" class="form-control"
                                                       placeholder="Enter Style No" required>

                                                <label>Style No<span class="text-red">*</span></label>
                                                <input type="text" name="style_no" class="form-control" placeholder="Enter Style No" required>

                                                <?php if($errors->has('style_no')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('style_no')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CA/RN*</label>
                                                <input type="text" name="ca" class="form-control"
                                                       placeholder="Enter CA/RN" required>
                                                <?php if($errors->has('ca')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('ca')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Quantity*</label>
                                                <input type="text" id="total_quantity" name="total_quantity"
                                                       id="total_quantity" value="0" class="form-control total_quantity"
                                                       required readonly>
                                                <?php if($errors->has('total_quantity')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('total_quantity')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Amount*</label>
                                                <input type="text" id="total_amount" name="total_amount" value="0.00"
                                                       class="form-control total_amount" required readonly>
                                                <?php if($errors->has('amount')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('amount')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Item Description</label>
                                                <input type="text" name="description" class="form-control"
                                                       id="description" placeholder="Enter Description">
                                                <?php if($errors->has('description')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('description')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fabrication</label>
                                                <input type="text" name="fabrication" class="form-control"
                                                       id="description" placeholder="Enter Febrication">
                                                <?php if($errors->has('fabrication')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('fabrication')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Special Instruction</label>
                                                <textarea name="instruction_notes" class="form-control" id="ins_notes"
                                                          rows="5"></textarea>
                                                <?php if($errors->has('ins_notes')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('ins_notes')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Packing Instruction</label>
                                                <textarea name="packing_instruction" class="form-control"
                                                          id="packing_instruction" rows="5"></textarea>
                                                <?php if($errors->has('packing_instruction')): ?>
                                                    <span class="text-danger">
                                                   <?php echo e($errors->first('packing_instruction')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="break_down">
                                        <label>BREAK DOOWN</label>
                                        
                                    </div>


                                    <div class="color_box">
                                        <div class="row">
                                            <div class="col-md-12" style="margin:30px 0px;">
                                                <table id="colorSection" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Color Name <a id="add_size" class="btn btn-info btn-sm"
                                                                          style="color:white;margin-left:10px;">+</a>
                                                        </th>
                                                        <th>Code</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><input type="text" name="color[]" class="form-control"
                                                                   placeholder="Enter Color Name"></td>
                                                        <td><input type="text" name="color_code[]" class="form-control"
                                                                   placeholder="Enter Color Code"></
                                                        ></td>
                                                        <td><input type="number" min="0" step="any"
                                                                   name="color_wise_quantity[]" value="0"
                                                                   id="color_wise_quantity1"
                                                                   class="form-control color_wise_quantity1 color_wise_quantity" readonly>
                                                        </td>
                                                        <td><input type="number" min="0" step="any"
                                                                   name="color_unit_price[]" id="color_unit_price1"
                                                                   class="form-control color_unit_price1"
                                                                   placeholder="Enter Unit Price "></
                                                        ></td>
                                                        <td><input type="number" min="0" step="any" name="sub_total[]"
                                                                   id="sub_total1" value="0.00"
                                                                   class="form-control sub_total1" readonly></td>
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
                                                    <tbody id="t_body_id_1">
                                                    <tr class="row-concat1" id="row-concat_1">
                                                        <td><input type="text" name="size1[]" class="form-control" placeholder="Enter Size"></td>
                                                        <td><input type="text" name="prepack1[]" class="form-control" placeholder="Enter Prepack"></td>
                                                        <td><input type="number" min="0" step="any" name="quantity1[]" id="quantity1" class="form-control quantity1" oninput="calculateQuantity(1, 1)" placeholder="Enter Quantity"></td>
                                                        <td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow(1, 1)">-</a></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <a class="btn btn-success btn-sm" id="add_contact_1" onclick="addRow(1)"
                                                           style="color: white; ">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </tr>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"
                                                id="submit-btn"><?php echo e(trans('file.submit')); ?></button>
                                    </div>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        // $(".dateFormate").val(new Date().toISOString().substring(0, 10));
        $("ul#order-summary").siblings('a').attr('aria-expanded', 'true');
        $("ul#order-summary").addClass("show");
        $("ul#order-summary #purchase-order-menu").addClass("active");

        var y = 1;
        $(document).ready(function () {
            var max_field = 7;
            console.log(max_field);
            var concatMaxField = 13;
            var wrapper = $(".color_box");
            var x = 1;
            // var y= 1;
            // $('#add_contact').click(function () {
            //     if (y < concatMaxField) {
            //         y++;
            //         $('#t_body_id_1').append('<tr class="row-concat1" id="row-concat_' + y + '"><td><input type="text" name="size' + y + '[]" class="form-control" placeholder="Enter Size"></td><td><input type="text" name="prepack' + y + '[]" class="form-control" placeholder="Enter Prepack"></td><td><input type="number" min="0" step="any" name="quantity' + y + '[]" id="quantity' + y + '" class="form-control quantity1" oninput="calculateQuantity(1, '+y+')" placeholder="Enter Quantity"></td><td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow(' + y + ', 1)">-</a></td></tr>');
            //     }
            // });

            // onclick="addRow('+x+','+y+')"

            $("#add_size").click(function () {
                if (x < max_field) {
                    x++;
                    // y=1;
                    $('#color_number').val(x);
                    $(wrapper).append('<div class="row">\
                                    <div class="col-md-12" style="margin: 30px 0px;">\
                                        <table id="colorSection">\
                                             <thead>\
                                                 <tr>\
                                                     <th>Color Name <a id="remove_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">-</a></th>\
                                                     <th>Code</th>\
                                                     <th>Quantity</th>\
                                                     <th>Unit Price</th>\
                                                     <th>Total Price</th>\
                                                     <th>\
                                                        <a class="btn btn-success btn-sm" id="add_contact_' + x + '" onclick="addRow(' + x + ')" style="color: white; ">\
                                                            <i class="fa fa-plus"></i>\
                                                        </a>\
                                                    </th>\
                                                 </tr>\
                                             </thead>\
                                             <tbody>\
                                                 <tr>\
                                                     <td><input type="text" name="color[]" class="form-control"></td>\
                                                     <td><input type="text" name="color_code[]" class="form-control"></td>\
                                                     <td><input type="number" min="0" step="any" name="color_wise_quantity[]" value="0" id="color_wise_quantity' + x + '" class="form-control color_wise_quantity' + x + ' color_wise_quantity" readonly></td>\
                                                     <td><input type="number" min="0" step="any" name="color_unit_price[]" id="color_unit_price' + x + '" class="form-control color_unit_price' + x + '"></td>\
                                                     <td><input type="number" min="0" step="any" name="sub_total[]" id="sub_total' + x + '" value="0.00" class="form-control sub_total' + x + '" readonly></td>\
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
                                            <tbody id="t_body_id_' + x + '">\
                                                <tr class="row-concat' + x + '" id="row-concat_1">\
                                                    <td><input type="text" name="size1[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack1[]" class="form-control"></td>\
                                                    <td><input type="number" oninput="calculateQuantity('+x+', 1)" min="0" step="any" name="quantity1[]" id="quantity1" class="form-control quantity' + x + '"></td>\
                                                    <td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow(1, ' + x + ')">-</a></td>\
                                                </tr>\
                                            </tbody>\
                                       </table>\
                                    </div>\
                                </div>');

                    // var concatCount= x-1;
                    //     $('#add_contact').hide();
                    //     $('#add_contact_'+concatCount).hide();

                    // function addRow(x){
                    //     if(y<concatMaxField){
                    //         y++;
                    //         $('#t_body_id_'+x).append('<tr><td><input type="text" name="size'+y+'[]" class="form-control" placeholder="Enter Size"></td><td><input type="text" name="prepack'+y+'[]" class="form-control" placeholder="Enter Prepack"></td><td><input type="number" min="0" step="any" name="quantity'+y+'[]" id="quantity'+y+'" class="form-control quantity1" placeholder="Enter Quantity"></td></tr>');
                    //     }
                    // }

                    // $('#add_contact_'+x).click(function(){
                    //     console.log($('#add_contact_'+x));
                    //     if(y<concatMaxField){
                    //         y++;
                    //         $('#t_body_id_'+x).append('<tr><td><input type="text" name="size'+y+'[]" class="form-control" placeholder="Enter Size"></td><td><input type="text" name="prepack'+y+'[]" class="form-control" placeholder="Enter Prepack"></td><td><input type="number" min="0" step="any" name="quantity'+y+'[]" id="quantity'+y+'" class="form-control quantity1" placeholder="Enter Quantity"></td></tr>');
                    //     }
                    // });
                } else {
                    alert('you can not add more than 7 field');
                }
            });

            $(wrapper).on("click", "#remove_size", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('th').parent('tr').parent('thead').parent('table').parent('div').parent('div').remove();
                x--;
                calculate_total_quantity();
                calculate_total_amount();
            });



            // $(document).on('keyup change', '#quantity1', function () {
            //     var sum = 0;
            //     $(".quantity1").each(function () {
            //         sum += +$(this).val();
            //     });
            //     $('.color_wise_quantity1').val(sum);
            //     var quantity = $('.color_wise_quantity1').val();
            //     var unitprice = $('.color_unit_price1').val();
            //     var total_price = parseFloat(quantity * unitprice).toFixed(2);
            //     $('.sub_total1').val(total_price);
            //     calculate_total_quantity();
            //     calculate_total_amount();
            // });
            $(document).on('keyup change', '#quantity2', function () {
                var sum = 0;
                $(".quantity2").each(function () {
                    sum += +$(this).val();
                });
                $('.color_wise_quantity2').val(sum);
                var quantity = $('.color_wise_quantity2').val();
                var unitprice = $('.color_unit_price2').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total2').val(total_price);
                calculate_total_quantity();
                calculate_total_amount();
            });
            $(document).on('keyup change', '#quantity3', function () {
                var sum = 0;
                $(".quantity3").each(function () {
                    sum += +$(this).val();
                });
                $('.color_wise_quantity3').val(sum);
                var quantity = $('.color_wise_quantity3').val();
                var unitprice = $('.color_unit_price3').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total3').val(total_price);
                calculate_total_quantity();
                calculate_total_amount();
            });
            $(document).on('keyup change', '#quantity4', function () {
                var sum = 0;
                $(".quantity4").each(function () {
                    sum += +$(this).val();
                });
                $('.color_wise_quantity4').val(sum);
                var quantity = $('.color_wise_quantity4').val();
                var unitprice = $('.color_unit_price4').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total4').val(total_price);
                calculate_total_quantity();
                calculate_total_amount();
            });
            $(document).on('keyup change', '#quantity5', function () {
                var sum = 0;
                $(".quantity5").each(function () {
                    sum += +$(this).val();
                });
                $('.color_wise_quantity5').val(sum);
                var quantity = $('.color_wise_quantity5').val();
                var unitprice = $('.color_unit_price5').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total5').val(total_price);
                calculate_total_quantity();
                calculate_total_amount();
            });
            $(document).on('keyup change', '#quantity6', function () {
                var sum = 0;
                $(".quantity6").each(function () {
                    sum += +$(this).val();
                });
                $('.color_wise_quantity6').val(sum);
                var quantity = $('.color_wise_quantity6').val();
                var unitprice = $('.color_unit_price6').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total6').val(total_price);
                calculate_total_quantity();
                calculate_total_amount();
            });
            $(document).on('keyup change', '#quantity7', function () {
                var sum = 0;
                $(".quantity7").each(function () {
                    sum += +$(this).val();
                });
                $('.color_wise_quantity7').val(sum);
                var quantity = $('.color_wise_quantity7').val();
                var unitprice = $('.color_unit_price7').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total7').val(total_price);
                calculate_total_quantity();
                calculate_total_amount();
            });
            $(document).on('keyup change', '#color_unit_price1', function () {
                var quantity = $('.color_wise_quantity1').val();
                var unitprice = $('.color_unit_price1').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total1').val(total_price);
                calculate_total_amount();
            });
            $(document).on('keyup change', '#color_unit_price2', function () {
                var quantity = $('.color_wise_quantity2').val();
                var unitprice = $('.color_unit_price2').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total2').val(total_price);
                calculate_total_amount();
            });
            $(document).on('keyup change', '#color_unit_price3', function () {
                var quantity = $('.color_wise_quantity3').val();
                var unitprice = $('.color_unit_price3').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total3').val(total_price);
                calculate_total_amount();
            });
            $(document).on('keyup change', '#color_unit_price4', function () {
                var quantity = $('.color_wise_quantity4').val();
                var unitprice = $('.color_unit_price4').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total4').val(total_price);
                calculate_total_amount();
            });
            $(document).on('keyup change', '#color_unit_price5', function () {
                var quantity = $('.color_wise_quantity5').val();
                var unitprice = $('.color_unit_price5').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total5').val(total_price);
                calculate_total_amount();
            });
            $(document).on('keyup change', '#color_unit_price6', function () {
                var quantity = $('.color_wise_quantity6').val();
                var unitprice = $('.color_unit_price6').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total6').val(total_price);
                calculate_total_amount();
            });
            $(document).on('keyup change', '#color_unit_price7', function () {
                var quantity = $('.color_wise_quantity7').val();
                var unitprice = $('.color_unit_price7').val();
                var total_price = parseFloat(quantity * unitprice).toFixed(2);
                $('.sub_total7').val(total_price);
                calculate_total_amount();
            });

            function calculate_total_quantity() {
                var quantity1 = $('.color_wise_quantity1').val();
                if (isNaN(quantity1)) quantity1 = 0;
                var quantity2 = $('.color_wise_quantity2').val();
                if (isNaN(quantity2)) quantity2 = 0;
                var quantity3 = $('.color_wise_quantity3').val();
                if (isNaN(quantity3)) quantity3 = 0;
                var quantity4 = $('.color_wise_quantity4').val();
                if (isNaN(quantity4)) quantity4 = 0;
                var quantity5 = $('.color_wise_quantity5').val();
                if (isNaN(quantity5)) quantity5 = 0;
                var quantity6 = $('.color_wise_quantity6').val();
                if (isNaN(quantity6)) quantity6 = 0;
                var quantity7 = $('.color_wise_quantity7').val();
                if (isNaN(quantity7)) quantity7 = 0;
                var total = parseInt(quantity1) + parseInt(quantity2) + parseInt(quantity3) + parseInt(quantity4) + parseInt(quantity5) + parseInt(quantity6) + parseInt(quantity7);
                if (isNaN(total)) total = 0;
                $('.total_quantity').val(total);
            }

            function calculate_total_amount() {
                var sub1 = $('.sub_total1').val();
                if (isNaN(sub1)) sub1 = 0;
                var sub2 = $('.sub_total2').val();
                if (isNaN(sub2)) sub2 = 0;
                var sub3 = $('.sub_total3').val();
                if (isNaN(sub3)) sub3 = 0;
                var sub4 = $('.sub_total4').val();
                if (isNaN(sub4)) sub4 = 0;
                var sub5 = $('.sub_total5').val();
                if (isNaN(sub5)) sub5 = 0;
                var sub6 = $('.sub_total6').val();
                if (isNaN(sub6)) sub6 = 0;
                var sub7 = $('.sub_total7').val();
                if (isNaN(sub7)) sub7 = 0;
                var total_amount = parseFloat(sub1) + parseFloat(sub2) + parseFloat(sub3) + parseFloat(sub4) + parseFloat(sub5) + parseFloat(sub6) + parseFloat(sub7);
                if (isNaN(total_amount)) total_amount = 0;
                $('.total_amount').val(parseFloat(total_amount).toFixed(2));
            }
        });

        function calculateQuantity(rowNo, qty){
            // alert($(this).val());
                var count= 0;
                var totalCount= 0;
                $('.row-concat'+rowNo+ ' .quantity'+rowNo).each(function(){
                    count += parseInt($(this).val());
                    // console.log($('.row-concat_'+rowNo+'.quantity'+qty));
                });
                // console.log(count);
                $('#color_wise_quantity'+rowNo).val(count);
                $('.color_wise_quantity').each(function(){
                    totalCount += parseInt($('#color_wise_quantity'+rowNo).val());
                });
                $('#total_quantity').val(totalCount);
            }

        function addRow(x) {
            // console.log($('.dd_'+x).length+2);
            var counter = $('.row-concat' + x).length+x;
            // if (counter - 2 < 13) {
                // y++;
                $('#t_body_id_' + x).append('<tr class="row-concat' + x + '" id="row-concat_' + counter + '"><td><input type="text" name="size' + counter + '[]" class="form-control" placeholder="Enter Size"></td><td><input type="text" name="prepack' + counter + '[]" class="form-control" placeholder="Enter Prepack"></td><td><input type="number" min="0" step="any" name="quantity' + counter + '[]" id="quantity' + counter + '" oninput="calculateQuantity('+x+','+counter+')" class="form-control quantity'+x+'" placeholder="Enter Quantity"></td><td><a id="remove_concat" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;" onclick="removeRow(' + counter + ',' + x + ')">-</a></td></tr>');
            // } else {
            //     alert("Maximum row is 13");
            // }
        }

        function removeRow(counter, x) {
            // console.log(counter);
            $('.row-concat' + x + '#row-concat_' + counter).remove();
            this.calculateQuantity(x, counter);
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
            branding: false
        });



        function quantityCalc(pram){
            console.log(this.value)
            // let sum = 0;
            // console.log('.quantity'+pram);
            //
            // $('.quantity'+pram).each(function(){
            //     console.log($(this).val());
            //     //sum += parseFloat($(this).text());
            // });
            //console.log('sum=' + sum);

            //$('#color_wise_quantity2').val(sum);
            //('#color_wise_quantity'+pram).val(sum);
        }


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/purchase/order.blade.php ENDPATH**/ ?>