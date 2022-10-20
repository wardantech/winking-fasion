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
                        <h4>Add Cost Breakdown</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                        <?php echo Form::open(['route' => 'cost_breakdowns.store', 'method' => 'post', 'files' => true, 'id' => 'purchase-form']); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Of *</label>
                                            <select name="account_of" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select account of...">
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
                                            <label>Season *</label>
                                            <input type="text" name="season" class="form-control" placeholder="Enter Season" required>
                                            <?php if($errors->has('season')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('season')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Customer *</label>
                                            <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Customer">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Vendor *</label>
                                            <select required name="vendor_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select vendor ..." required>
                                                <?php $__currentLoopData = $lims_vendor_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('vendor_id')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('vendor_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>LC/Contract Number *</label>
                                            <input type="text" name="lc_number" class="form-control" placeholder="Enter LC/Contract Number " required>
                                            <?php if($errors->has('lc_number')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('lc_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Order Quantity *</label>
                                            <input type="text" name="order_qty" min="0" id="order_qty" placeholder="Enter Order Quantity"  class="form-control" required>
                                            <?php if($errors->has('order_qty')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('order_qty')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order Value (Customer) *</label>
                                            <input type="text" name="order_value_customer" id="order_value_customer" class="form-control" placeholder="Enter Order Value (Customer)" required>
                                            <?php if($errors->has('order_value_customer')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('order_value_customer')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order Value (Vendor) *</label>
                                            <input type="text" name="order_value_vendor" id="order_value_vendor" class="form-control" placeholder="Enter Order Value (Vendor)" required>
                                            <?php if($errors->has('order_value_vendor')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('order_value_vendor')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order Status *</label>
                                            <select name="status" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select status...">
                                                <option value="Running">Running</option>
                                                <option value="Delivered">Delivered</option>
                                            </select>
                                            <?php if($errors->has('status')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('status')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Delivery Date *</label>
                                            <input type="text" name="delivery_date" class="datepicker form-control"
                                            placeholder="Enter Delivery Date " required>
                                            <?php if($errors->has('delivery_date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('delivery_date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Upload Cost Breakdown *</label>
                                            <input type="file" name="document" class="form-control"/>
                                            <?php if($errors->has('document')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('document')); ?>

                                                </span>
                                            <?php endif; ?>
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
    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #cost-breakdown-menu").addClass("active");
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/cost_breakdown/create.blade.php ENDPATH**/ ?>