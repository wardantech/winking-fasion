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
                        <h4><?php echo e(trans('file.Add Customer')); ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                        <?php echo Form::open(['route' => 'customer.store', 'method' => 'post', 'files' => true]); ?>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Customer Name')); ?> *</strong> </label>
                                    <input type="text" id="name" name="name" required class="form-control" onkeyup='saveValue(this);' placeholder="Enter Customer Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Contract Person')); ?> *</label>
                                    <input type="text" name="contract_person" class="form-control" placeholder="Enter Contract Person">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Address')); ?> *</label>
                                    <input type="text" name="address" required class="form-control" placeholder="Enter Address">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Phone Number')); ?> *</label>
                                    <input type="text" name="phone_number" required class="form-control" placeholder="Enter Phone Number">
                                    <?php if($errors->has('phone_number')): ?>
                                   <span>
                                       <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Email')); ?> </label>
                                    <input type="email" name="email" placeholder="example@example.com" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.City')); ?> *</label>
                                    <input type="text" name="city" required class="form-control" placeholder="Enter City">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.State')); ?></label>
                                    <input type="text" name="state" class="form-control" placeholder="Enter State">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Postal Code')); ?> *</label>
                                    <input type="text" name="postal_code" class="form-control" placeholder="Enter Postal Code"  required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Country')); ?> *</label>
                                    <input type="text" name="country" class="form-control" placeholder="Enter Country" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('Fax')); ?></label>
                                    <input type="text" name="fax" class="form-control" placeholder="Enter Customer Fax">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category / Interest</label>
                                    <select class="form-control" id="interest_id" name="interest_id">
                                        <option value="" >No Interest Selected</option>
                                        <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($interest->id); ?>"><?php echo e($interest->topic); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            

                            
                            
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="pos" value="0">
                            <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $("ul#people").siblings('a').attr('aria-expanded','true');
    $("ul#people").addClass("show");
    $("ul#people #customer-create-menu").addClass("active");


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\wingking-fasion\resources\views/customer/create.blade.php ENDPATH**/ ?>