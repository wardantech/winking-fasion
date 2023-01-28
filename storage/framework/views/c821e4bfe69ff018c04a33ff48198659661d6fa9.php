 <?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo session()->get('message'); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<section>
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="card card-primary card-outline">
                      <img class="card-img-top" src="<?php echo e(url('public/images/employee',$employee->image)); ?>" alt="Card image cap" width="180px !importent;">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo e($employee->name); ?></h5></h5>
                        <?php if($employee->leave_job == 0): ?>
                        <form action="<?php echo e(route('employees.leave-job',$employee->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="submit" class="btn btn-primary" value="Leave Job">
                        </form>
                        <?php elseif($employee->leave_job == 1): ?>
                        <form action="<?php echo e(route('employees.cancel-leave-job',$employee->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="submit" class="btn btn-primary" value="Cancel Leave Job">
                        </form>
                        <?php endif; ?>
                      </div>
                      
                </div>
           </div>

           <div class="col-md-9">
                <div class="card card-primary card-outline">
                  <div class="card-body" style="padding-top:0px;">
                       <table id="example1" class="table table-bordered table-striped">
                           <tbody>
                                <tr>
                                    <td width="25%">Employee Name</td>
                                    <td width="75%"><?php echo e($employee->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo e($employee->email); ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td><?php echo e($employee->phone_number); ?></td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td><?php echo e(isset($employee->department->name) ? $employee->department->name : 'No department found'); ?></td>
                                </tr>
                                <tr>
                                    <td>Present Address</td>
                                    <td><?php echo e($employee->address); ?>

                                        <?php if($employee->city): ?><?php echo e(', '.$employee->city); ?><?php endif; ?>
                                        <?php if($employee->state): ?><?php echo e(', '.$employee->state); ?><?php endif; ?>
                                        <?php if($employee->postal_code): ?><?php echo e(', '.$employee->postal_code); ?><?php endif; ?>
                                        <?php if($employee->country): ?><?php echo e(', '.$employee->country); ?><?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Permanent Address</td>
                                    <td><?php echo e($employee->address2); ?></td>
                                </tr>
                                <tr>
                                    <td>NID Number</td>
                                    <td><?php echo e($employee->nid_number); ?></td>
                                </tr>
                                <tr>
                                    <td>Joining Date</td>
                                    <td><?php echo e($employee->joining_date); ?></td>
                                </tr>
                                <tr>
                                    <td>Joining Salary</td>
                                    <td><?php echo e($employee->joining_salary); ?> BDT</td>
                                </tr>
                                <tr>
                                    <td>Present Salary</td>
                                    <td><?php echo e($employee->present_salary); ?> BDT</td>
                                </tr>
                                <?php if($employee->leave_job_date != null): ?>
                                <tr>
                                    <td>Job Left Date</td>
                                    <td><?php echo e($employee->leave_job_date); ?></td>
                                </tr>
                                <?php endif; ?>

                            </tbody>
                       </table>
                  </div>

                </div>
           </div>
        </div>
    </div>
</section>



<script type="text/javascript">

    $("ul#hrm").siblings('a').attr('aria-expanded','true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #employee-menu").addClass("active");

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/employee/profile.blade.php ENDPATH**/ ?>