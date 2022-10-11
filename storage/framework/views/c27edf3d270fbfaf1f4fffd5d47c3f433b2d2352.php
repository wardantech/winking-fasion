 <?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo session()->get('message'); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<section>
    <div class="container-fluid">
        <button class="btn btn-info" data-toggle="modal" data-target="#createModal"><i class="dripicons-plus"></i> <?php echo e(trans('file.Add Salary Sheet')); ?> </button>
    </div>
    <div class="container-fluid" style="margin-top:20px;">
        <div class="card">
            <?php echo Form::open(['route' => 'payroll.filter', 'method' => 'post']); ?>

            <div class="row pl-3 mb-3">
                <div class="col-md-5 mt-4">
                    <div class="form-group">
                        <div class="d-tc">
                            <div class="form-group">
                                <label class="d-tc mt-2"><strong>Choose Month</strong> &nbsp;</label>
                                <input type="month" name="search_month" value="<?php echo e(isset($month) ? $month:''); ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-4">
                    <div class="form-group has-feedback">
                        <label class="d-tc mt-2"><strong>Choose Employee</strong> &nbsp;</label>
                        <select class="form-control selectpicker" name="employee_id" data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                            <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($employee_id)): ?>
                                     <option value="<?php echo e($employee->id); ?>" <?php echo e(($employee->id == $employee_id) ? 'selected':''); ?>><?php echo e($employee->name); ?></option>
                                <?php else: ?>
                                     <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" style="margin-top:40px;"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
    </div>
    <div class="table-responsive">
        <table id="payroll-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(trans('file.date')); ?></th>
                    
                    <th><?php echo e(trans('Paying Date')); ?></th>
                    <th><?php echo e(trans('file.Employee')); ?></th>
                    <th><?php echo e(trans('Month')); ?></th>
                    <th><?php echo e(trans('file.Amount')); ?> (BDT)</th>
                    <th><?php echo e(trans('file.Method')); ?></th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $lims_payroll_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$payroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $employee = \App\Employee::find($payroll->employee_id);
                    $account = \App\Account::find($payroll->account_id);
                ?>
                <tr data-id="<?php echo e($payroll->id); ?>">
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(date($general_setting->date_format, strtotime($payroll->created_at->toDateString()))); ?></td>
                    
                    <td><?php echo e(date($general_setting->date_format, strtotime($payroll->paying_date))); ?></td>
                    <td><?php echo e($employee->name); ?></td>
                    <td><?php echo e(date('F, Y', strtotime($payroll->month))); ?></td>
                    <td><?php echo e(number_format((float)$payroll->amount, 2, '.', '')); ?></td>
                    <?php if($payroll->paying_method == 1): ?>
                        <td>Cash</td>
                    <?php elseif($payroll->paying_method == 2): ?>
                       <?php if($payroll->reference): ?>
                             <td>Cheque - [<?php echo e($payroll->reference); ?>]</td>
                       <?php endif; ?>
                    <?php else: ?>
                        <?php if($payroll->reference): ?>
                             <td>Transfer - [<?php echo e($payroll->reference); ?>]</td>
                        <?php endif; ?>
                    <?php endif; ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <button type="button" data-id="<?php echo e($payroll->id); ?>" data-reference="<?php echo e($payroll->reference_no); ?>"  data-employee="<?php echo e($payroll->employee_id); ?>" data-account="<?php echo e($payroll->account_id); ?>" data-amount="<?php echo e($payroll->amount); ?>" data-date="<?php echo e($payroll->paying_date); ?>" data-month="<?php echo e($payroll->month); ?>" data-note="<?php echo e($payroll->note); ?>" data-paying_method="<?php echo e($payroll->paying_method); ?>" class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></button>
                                </li>
                                <li class="divider"></li>
                                <?php echo e(Form::open(['route' => ['payroll.destroy', $payroll->id], 'method' => 'DELETE'] )); ?>

                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></button>
                                </li>
                                <?php echo e(Form::close()); ?>

                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total:</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<div id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Add Salary Sheet')); ?></h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
              <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                <?php echo Form::open(['route' => 'payroll.store', 'method' => 'post', 'files' => true]); ?>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('file.Employee')); ?> *</label>
                        <select class="form-control selectpicker" name="employee_id" required data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                            <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label> <?php echo e(trans('file.Account')); ?> *</label>
                        <select class="form-control selectpicker" name="account_id">
                        <?php $__currentLoopData = $lims_account_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($account->is_default): ?>
                            <option selected value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                            <?php else: ?>
                            <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('Month')); ?> *</label>
                        <input type="month" name="month" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('Paying Date')); ?> *</label>
                        <input type="date" name="paying_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('file.Method')); ?> *</label>
                        <select class="form-control selectpicker" name="paying_method" required>
                            <option value="1">Cash</option>
                            <option value="2">Cheque</option>
                            <option value="3">Transfer</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('file.Amount')); ?> *</label>
                        <input type="number" step="any" name="amount" class="form-control" placeholder="Enter Amount" required>
                    </div>
                    <div class="col-md-12 form-group" id="reference_section">
                        <label><?php echo e(trans('Reference')); ?> *</label>
                        <input type="text" name="reference" class="form-control" placeholder="Enter reference e.g. Transaction ID, Check No">
                    </div>
                    <div class="col-md-12 form-group">
                        <label><?php echo e(trans('file.Note')); ?></label>
                        <textarea name="note" rows="3" placeholder="Enter Note" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>

<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Update Salary Sheet')); ?></h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
              <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                <?php echo Form::open(['route' => ['payroll.update', 1], 'method' => 'put', 'files' => true]); ?>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="hidden" name="payroll_id">
                        <label><?php echo e(trans('file.Employee')); ?> *</label>
                        <select class="form-control selectpicker" name="employee_id" required data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                            <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label> <?php echo e(trans('file.Account')); ?> *</label>
                        <select class="form-control selectpicker" name="account_id">
                        <?php $__currentLoopData = $lims_account_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($account->is_default): ?>
                            <option selected value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                            <?php else: ?>
                            <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('Month')); ?> *</label>
                        <input type="month" name="month" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('Paying Date')); ?> *</label>
                        <input type="date" name="paying_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('file.Method')); ?> *</label>
                        <select class="form-control selectpicker" name="paying_method" required>
                            <option value="1">Cash</option>
                            <option value="2">Cheque</option>
                            <option value="3">Transfer</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('file.Amount')); ?> *</label>
                        <input type="number" step="any" name="amount" class="form-control" required>
                    </div>
                    <div class="col-md-12 form-group" id="edit_reference_section">
                        <label><?php echo e(trans('Reference')); ?> *</label>
                        <input type="text" name="reference" class="form-control" placeholder="Enter reference e.g. Transaction ID, Check No">
                    </div>

                    <div class="col-md-12 form-group">
                        <label><?php echo e(trans('file.Note')); ?></label>
                        <textarea name="note" rows="3" placeholder="Enter Note" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $("ul#hrm").siblings('a').attr('aria-expanded','true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #payroll-menu").addClass("active");
    $("#reference_section").hide();

    var payroll_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function confirmDelete() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        }
        return false;
    }

    $('.edit-btn').on('click', function() {
        $("#editModal input[name='payroll_id']").val( $(this).data('id') );
        $("#editModal select[name='employee_id']").val( $(this).data('employee') );
        $("#editModal select[name='account_id']").val( $(this).data('account') );
        $("#editModal input[name='amount']").val( $(this).data('amount') );
        $("#editModal input[name='month']").val( $(this).data('month') );
        $("#editModal input[name='paying_date']").val( $(this).data('date') );
        $("#editModal select[name='paying_method']").val( $(this).data('paying_method') );
        $("#editModal textarea[name='note']").val( $(this).data('note') );
        $('.selectpicker').selectpicker('refresh');
    });

    $('select[name="paying_method"]').on('change', function() {
        if($(this).val() >= 2){
            $("#reference_section").show(500);
        }else{
            $("#reference_section").hide(500);
        }
    });

    $('#payroll-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ <?php echo e(trans("file.records per page")); ?>',
             "info":      '<small><?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)</small>',
            "search":  '<?php echo e(trans("file.Search")); ?>',
            'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': [0, 1, 6]
            },
            {
                'render': function(data, type, row, meta){
                    if(type === 'display'){
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                   return data;
                },
                'checkboxes': {
                   'selectRow': true,
                   'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                },
                'targets': [0]
            }
        ],
        'select': { style: 'multi',  selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                title: 'Employee Salary List',
                text: '<?php echo e(trans("file.PDF")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'csv',
                title: 'Employee Salary List',
                text: '<?php echo e(trans("file.CSV")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'print',
                title: 'Employee Salary List',
                text: '<?php echo e(trans("file.Print")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                },
                customize: function ( win ) {
                    $(win.document.body).find('td,th').css( 'text-align', 'center' );
                    $(win.document.body).find('td:first-child').css( 'text-align', 'left' );
                    $(win.document.body).find('td:last-child').css( 'text-align', 'right' );
                    $(win.document.body).find('th:first-child').css( 'text-align', 'left' );
                    $(win.document.body).find('th:last-child').css( 'text-align', 'right' );
                    $(win.document.body).find('td,th').css( 'border', '1px solid #A8A8A8' );
                    $(win.document.body).css( 'margin', '50px' );
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                text: '<?php echo e(trans("file.delete")); ?>',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                    //if(user_verified == '1') {
                        payroll_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                payroll_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(payroll_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'payroll/deletebyselection',
                                data:{
                                    payrollIdArray: payroll_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!payroll_id.length)
                            alert('No payroll is selected!');
                    // }
                    // else
                    //     alert('This feature is disable for demo!');
                }
            },
            {
                extend: 'colvis',
                text: '<?php echo e(trans("file.Column visibility")); ?>',
                columns: ':gt(0)'
            },
        ],
        drawCallback: function () {
            var api = this.api();
            datatable_sum(api, false);
        }
    } );

    function datatable_sum(dt_selector, is_calling_first) {
        if (dt_selector.rows( '.selected' ).any() && is_calling_first) {
            var rows = dt_selector.rows( '.selected' ).indexes();

            $( dt_selector.column( 5 ).footer() ).html(dt_selector.cells( rows, 5, { page: 'current' } ).data().sum().toFixed(2));
        }
        else {
            $( dt_selector.column( 5 ).footer() ).html(dt_selector.cells( rows, 5, { page: 'current' } ).data().sum().toFixed(2));
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\wingking-fasion\resources\views/payroll/index.blade.php ENDPATH**/ ?>