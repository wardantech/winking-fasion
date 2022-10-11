 <?php $__env->startSection('content'); ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Update Purchase Contract</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                        <?php echo Form::open(['route' => ['purchase_contract.update',$lims_contract_data->id], 'method' => 'put', 'files' => true, 'id' => 'purchase-form']); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row" style="margin-bottom:30px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Purchase Contract No *</label>
                                            <input type="text" name="contract_no" class="form-control" placeholder="Enter Purchase Contract No " required value="<?php echo e($lims_contract_data->contract_no); ?>">
                                            <?php if($errors->has('contract_no')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('contract_no')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Master Purchase Contract No *</label>
                                            <input type="text" name="master_contract_no" class="form-control" value="<?php echo e($lims_contract_data->master_contract_no); ?>" placeholder="Enter Master Purchase Contract No  " required>
                                            <?php if($errors->has('master_contract_no')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('master_contract_no')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vendor Contract Date *</label>
                                            <input type="text" name="vendor_date" class="datepicker form-control" placeholder="Enter Vendor Contract Date" value="<?php echo e(date("d-M-Y", strtotime($lims_contract_data->vendor_date))); ?>" required>
                                            <?php if($errors->has('vendor_date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('vendor_date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Master Contract Date *</label>
                                            <input type="text" name="master_date" class="datepicker form-control" placeholder="Enter Master Contract Date"  value="<?php echo e(date("d-M-Y", strtotime($lims_contract_data->master_date))); ?>" required>
                                            <?php if($errors->has('master_date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('master_date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Vendor *</label>
                                            <select required name="vendor_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select vendor or shipper...">
                                                <?php $__currentLoopData = $lims_vendor_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($vendor->id); ?>" <?php echo($vendor->id == $lims_contract_data->vendor_id) ? 'selected' : ''; ?>><?php echo e($vendor->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('vendor_id')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('vendor_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Customer *</label>
                                            <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Customer..." required>
                                                <?php $__currentLoopData = $lims_customer_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($customer->id); ?>" <?php echo($customer->id == $lims_contract_data->customer_id) ? 'selected' : ''; ?>><?php echo e($customer->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('customer_id')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('customer_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Account Of *</label>
                                            <select name="account_of" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select account of..." required>
                                                <option value="1" <?php echo e(($lims_contract_data->account_of == 1) ? 'selected' : ''); ?>>Winking</option>
                                                <option value="2" <?php echo e(($lims_contract_data->account_of == 2) ? 'selected' : ''); ?>>Artisan</option>
                                            </select>
                                            <?php if($errors->has('account_of')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('account_of')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vendor Delivery Date *</label>
                                            <input type="text" name="delivery_date" class="datepicker form-control"  placeholder="Enter Vendor Delivery Date" value="<?php echo e(date("d-M-Y", strtotime($lims_contract_data->delivery_date))); ?>" required>
                                            <?php if($errors->has('delivery_date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('delivery_date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Consignee & Notify Party *</label>
                                            <select name="notify_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Consignee & Notify Party..." required>
                                                <?php $__currentLoopData = $notify_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($notify->id); ?>" <?php echo($notify->id == $lims_contract_data->notify_id) ? 'selected' : ''; ?>><?php echo e($notify->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('notify_id')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('notify_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label>Season</label>-->
                                    <!--        <input type="text" name="season" class="form-control" required value="<?php echo e($lims_contract_data->season); ?>">-->
                                    <!--        <?php if($errors->has('season')): ?>-->
                                    <!--            <span class="text-danger">-->
                                    <!--               <?php echo e($errors->first('season')); ?>-->
                                    <!--            </span>-->
                                    <!--        <?php endif; ?>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label>Revised Date *</label>-->
                                    <!--        <input type="date" name="revised_date" class="form-control" value="<?php echo e($lims_contract_data->revised_date); ?>">-->
                                    <!--        <?php if($errors->has('revised_date')): ?>-->
                                    <!--            <span class="text-danger">-->
                                    <!--               <?php echo e($errors->first('revised_date')); ?>-->
                                    <!--            </span>-->
                                    <!--        <?php endif; ?>-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Quantity *</label>
                                            <input type="number" name="total_qty" id="total_qty" class="form-control total_qty" placeholder="Enter Total Quantity " value="<?php echo e($lims_contract_data->total_qty); ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Master Delivery Date *</label>
                                            <input type="text" name="delivery_date_master" class="datepicker form-control"
                                            placeholder="Enter Master Delivery Date"  value="<?php echo e(date("d-M-Y", strtotime($lims_contract_data->delivery_date_master))); ?>" required>
                                            <?php if($errors->has('delivery_date_master')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('delivery_date_master')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Amount (Vendor)*</label>
                                            <input type="number" name="total_amount" id="total_amount" class="form-control total_amount"
                                            placeholder="Enter Total Amount (Vendor)"
                                            value="<?php echo e($lims_contract_data->total_amount); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Amount (Master)*</label>
                                            <input type="number" name="total_amount_master" id="total_amount" class="form-control total_amount"
                                            placeholder="Enter Total Amount (Master)"
                                            value="<?php echo e($lims_contract_data->total_amount_master); ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Upload Purchase Contract *</label>
                                            <input type="file" name="contract_doc" class="form-control"/>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Upload Mastract Contract *</label>
                                            <input type="file" name="master_doc" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Old Purchase Contract Document</label>
                                            <p style="color: red;"><?php echo e($lims_contract_data->contract_doc); ?></p>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Old Mastract Contract Document</label>
                                            <p style="color: red;"><?php echo e($lims_contract_data->master_doc); ?></p>
                                        </div>
                                    </div>

                                </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="submit-btn"><?php echo e(trans('file.submit')); ?></button>
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

    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #purchase-contract-menu").addClass("active");

    $('.selectpicker').selectpicker('refresh');


    $(document).ready(function(){
        var max_field = 20;
        var wrapper = $("#dynamicSection");
        var x = 1;
        $("#add_description").click(function(){
            if(x < max_field){
                x++;
                $(wrapper).append('<tr>\
                                    <td width="12%"><input type="text" name="vpo[]" class="form-control" required></td>\
                                    <td width="13%"><input type="text" name="style[]" class="form-control"></td>\
                                    <td width="30%"><input type="text" name="item_description[]" class="form-control"></td>\
                                    <td width="10%"><input type="text" name="color[]" class="form-control"></td>\
                                    <td width="10%"><input type="number" name="quantity[]" id="quantity" min="0" step="any" class="form-control quantity" required></td>\
                                    <td width="12%"><input type="number" name="unit_price[]" id="unit_price" min="0" step="0.01" class="form-control unit_price" required></td>\
                                    <td width="12%"><input type="text" name="total_value[]" id="total_value" class="form-control total_value" readonly required></td>\
                                    <td><a id="remove" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">-</a></td>\
                                </tr>');
            }else{
                alert('you can not add more than 20 field');
            }
        });

        $(document).on('click', '#remove', function(){
            $(this).parents('tr').remove();
                var sum = 0;
                var totqty = 0;
                var sum_client = 0;
                $(".total_value").each(function(){
                    sum += +$(this).val();
                });
                $(".total_value_client").each(function(){
                    sum_client += +$(this).val();
                });
                $(".quantity").each(function(){
                    totqty += +$(this).val();
                });
                $("#total_qty").val(totqty);
                $("#total_amount").val(parseFloat(sum).toFixed(2));
                $("#total_amount_client").val(parseFloat(sum_client).toFixed(2));
        });
    });
    $(document).ready(function () {

        $(document).on('keyup change', '#quantity, #unit_price, #unit_price_client', function() {

        var quantity = $(this).closest('tr').find('.quantity').val();
        var unit_price = $(this).closest('tr').find('.unit_price').val();
        var unit_price_client = $(this).closest('tr').find('.unit_price_client').val();
        var subtotal = parseFloat(quantity * unit_price).toFixed(2);
        var subtotal_client = parseFloat(quantity * unit_price_client).toFixed(2);

        $(this).closest('tr').find('.total_value').val(subtotal);
        $(this).closest('tr').find('.total_value_client').val(subtotal_client);

    });


    $(document).on("change keyup", "#unit_price , #quantity, #unit_price_client", function() {
        var sum = 0;
        var sum_client = 0;
        var totqty = 0;
        $(".total_value").each(function(){
            sum += +$(this).val();
        });
        $(".total_value_client").each(function(){
            sum_client += +$(this).val();
        });
        $(".quantity").each(function(){
            totqty += +$(this).val();
        });
        $("#total_qty").val(totqty);
        $("#total_amount").val(parseFloat(sum).toFixed(2));
        $("#total_amount_client").val(parseFloat(sum_client).toFixed(2));
        //$(".total").val(sum);
    });


});

tinymce.init({
    selector: 'textarea',
    height: 130,
    plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code wordcount'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
    branding:false
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\wingking-fasion\resources\views/purchase_contract/edit.blade.php ENDPATH**/ ?>