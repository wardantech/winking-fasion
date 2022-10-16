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
                        <h4>Add Export</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                        <?php echo Form::open(['route' => 'export.store', 'method' => 'post', 'files' => true, 'id' => 'purchase-form']); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Invoice No *</label>
                                            <input type="text" name="invoice_no" class="form-control" required>
                                            <?php if($errors->has('invoice_no')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('invoice_no')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date *</label>
                                            <input type="text" name="date" class="datepicker form-control" placeholder="" required>
                                            <?php if($errors->has('date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>LC/Contract No *</label>
                                            <input type="text" name="lc_number" class="form-control" required>
                                            <?php if($errors->has('lc_number')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('lc_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>BL No *</label>
                                            <input type="text" name="contact_number" class="form-control" required>
                                            <?php if($errors->has('contact_number')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('contact_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Shipper *</label>
                                            <select name="shipper_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select shipper..." required>
                                                <?php $__currentLoopData = $lims_shipper_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($shipper->id); ?>"><?php echo e($shipper->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('shipper_id')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('shipper_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ship To *</label>
                                            <select name="ship_to_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select ship to..." required>
                                                <?php $__currentLoopData = $lims_ship_to_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($shipper->id); ?>"><?php echo e($shipper->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('ship_to_id')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('ship_to_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Account Of *</label>
                                            <select name="account_of" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select account of..." required>
                                                <option value="1">Winking</option>
                                                <option value="2">Artisan</option>
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
                                            <label>Customer *</label>
                                            <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select invoice to..." required>
                                                <?php $__currentLoopData = $lims_customer_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('customer_id')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('customer_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Quantity  (pcs)*</label>
                                            <input type="number" name="quantity_pcs" class="form-control" required>
                                            <?php if($errors->has('quantity_pcs')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('quantity_pcs')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Quantity  (ctn)*</label>
                                            <input type="number" name="quantity_crt" class="form-control" required>
                                            <?php if($errors->has('quantity_crt')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('quantity_crt')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Invoice Value *</label>
                                            <input type="text" name="invoice_value" id="invoice_value" class="form-control invoice_value" required>
                                            <?php if($errors->has('invoice_value')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('invoice_value')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Shipper Invoice Value *</label>
                                            <input type="text" name="shipper_invoice_value" id="shipper_invoice_value" class="form-control shipper_invoice_value" required>
                                            <?php if($errors->has('shipper_invoice_value')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('shipper_invoice_value')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ETD *</label>
                                            <input type="text" name="etd" class="datepicker form-control" required>
                                            <?php if($errors->has('etd')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('etd')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ETA *</label>
                                            <input type="text" name="eta" class="datepicker form-control" required>
                                            <?php if($errors->has('eta')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('eta')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment Due Date *</label>
                                            <input type="text" name="due_date" class="datepicker form-control" required>
                                            <?php if($errors->has('due_date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('due_date')); ?>

                                                </span>
                                            <?php endif; ?>
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
                                            <button type="submit" class="btn btn-primary" id="submit-btn"><?php echo e(trans('file.submit')); ?></button>
                                        </div>
                                    </div>
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

    $("ul#export-summary").siblings('a').attr('aria-expanded','true');
    $("ul#export-summary").addClass("show");
    $("ul#export-summary #export-summary-list-menu").addClass("active");

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/export/create.blade.php ENDPATH**/ ?>