 <?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<style>
    .table,th{
        vertical-align: text-top !important;
    }
    .table,td{
        vertical-align: text-top !important;
    }
    .daterangepicker.opened{
        display: block !important;
    }
</style>
<section>
    <div class="container-fluid">
      <?php if(in_array('expenses-add', $all_permission)): ?>
        <button class="btn btn-info" data-toggle="modal" data-target="#expense-modal"><i class="dripicons-plus"></i> <?php echo e(trans('file.Add Expense')); ?></button>
      <?php endif; ?>
    </div>
    <div class="container-fluid" style="margin-top:20px;">
        <div class="card">
            <?php echo Form::open(['route' => 'expense.filter', 'method' => 'post']); ?>

            <div class="row pl-3 pr-3 mb-3">
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="form-group">
                        <div class="d-tc">
                            <div class="form-group">
                                <label class="d-tc mt-2"><strong>Choose Your Date</strong> &nbsp;</label>
                                <input type="text" name="date_range" class="daterangepicker-field form-control" value="<?php echo e(isset($date_range) ? $date_range:''); ?>" placeholder="Please select your date range" autocomplete="off"/>
                                <input type="hidden" name="start_date" value="<?php echo e(isset($start_date) ? $start_date:''); ?>"/>
                                <input type="hidden" name="end_date" value="<?php echo e(isset($end_date) ? $end_date:''); ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 mt-4">
                    <div class="form-group">
                        <div class="d-tc">
                            <div class="form-group">
                                <label class="d-tc mt-2"><strong>Choose Your Payment Date</strong> &nbsp;</label>
                                <input type="text" name="payment_date_range" class="payment_daterangepicker-field form-control" value="<?php echo e(isset($payment_date_range) ? $payment_date_range:''); ?>" placeholder="Please select your date range" autocomplete="off"/>
                                <input type="hidden" name="payment_start_date" value="<?php echo e(isset($payment_start_date) ? $payment_start_date:''); ?>"/>
                                <input type="hidden" name="payment_end_date" value="<?php echo e(isset($payment_end_date) ? $payment_end_date:''); ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-3 mt-4">
                    <div class="form-group has-feedback">
                        <label class="d-tc mt-2"><strong>Choose Expense Category</strong> &nbsp;</label>
                        <select name="expense_category_id" id="expense_category_id" class="form-control">
                            <option value="">Select Expense Category</option>
                            <?php $__currentLoopData = $lims_expense_category_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($expense_category_id)): ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(($category->id == $expense_category_id) ? 'selected':''); ?>><?php echo e($category->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 mt-4">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" style="margin-top:40px;"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
    </div>
    <div class="table-responsive">
        <table id="expense-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th style="min-width: 65px !important;"><?php echo e(trans('file.Date')); ?></th>
                    <th style="min-width: 65px !important;"><?php echo e(trans('Billing Date')); ?></th>
                    <th style="min-width: 65px !important;"><?php echo e(trans('Payment Date')); ?></th>
                    <th ><?php echo e(trans('file.category')); ?></th>
                    <th><?php echo e(trans('file.Amount')); ?> (BDT)</th>
                    <th><?php echo e(trans('file.Note')); ?></th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $lims_expense_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $warehouse = DB::table('warehouses')->find($expense->warehouse_id);
                    $expense_category = DB::table('expense_categories')->find($expense->expense_category_id);
                ?>
                <tr data-id="<?php echo e($expense->id); ?>">
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(date('d-M-Y', strtotime($expense->created_at->toDateString()))); ?></td>
                    <td><?php echo e(date('d-M-Y',strtotime($expense->billing_date))); ?></td>
                    <td>
                        <?php if($expense->payment_date): ?>
                        <?php echo e(date('d-M-Y',strtotime($expense->payment_date))); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($expense_category->name); ?></td>
                    <td><?php echo e(number_format((float)$expense->amount, 2, '.', '')); ?></td>
                    <td><?php echo e($expense->note); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <?php if(in_array("expenses-edit", $all_permission)): ?>
                                <li><button type="button" data-id="<?php echo e($expense->id); ?>" class="open-Editexpense_categoryDialog btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></button></li>
                                <?php endif; ?>
                                <?php if(in_array("expenses-delete", $all_permission)): ?>
                                <li class="divider"></li>
                                <?php echo e(Form::open(['route' => ['expenses.destroy', $expense->id], 'method' => 'DELETE'] )); ?>

                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></button>
                                </li>
                                <?php echo e(Form::close()); ?>

                                <?php endif; ?>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot class="tfoot active">
                <th></th>
                <th><?php echo e(trans('file.Total')); ?></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</section>

<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Update Expense')); ?></h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
              <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                <?php echo Form::open(['route' => ['expenses.update', 1], 'method' => 'put']); ?>

                <?php
                    $lims_expense_category_list = DB::table('expense_categories')->where('is_active', true)->get();
                    if(Auth::user()->role_id > 2)
                        $lims_warehouse_list = DB::table('warehouses')->where([
                            ['is_active', true],
                            ['id', Auth::user()->warehouse_id]
                        ])->get();
                    else
                        $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                ?>
                  <div class="form-group">
                      <input type="hidden" name="expense_id">
                      <label><?php echo e(trans('file.reference')); ?></label>
                      <p id="reference"><?php echo e('er-' . date("Ymd") . '-'. date("his")); ?></p>
                  </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label><?php echo e(trans('file.Expense Category')); ?> *</label>
                            <select name="expense_category_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Expense Category...">
                                <?php $__currentLoopData = $lims_expense_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($expense_category->id); ?>"><?php echo e($expense_category->name . ' (' . $expense_category->code. ')'); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    
                        <div class="col-md-4 form-group">
                            <label><?php echo e(trans('Billing Date')); ?> *</label>
                            <input type="text" name="billing_date" required class="datepicker form-control">
                        </div>
                        <div class="col-md-4 form-group">
                            <label><?php echo e(trans('Payment Date')); ?> *</label>
                            <input type="text" name="payment_date" required class="datepicker form-control">
                        </div>

                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Amount')); ?> *</label>
                            <input type="number" name="amount" step="any" required class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label> <?php echo e(trans('file.Account')); ?></label>
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
                    </div>
                  <div class="form-group">
                      <label><?php echo e(trans('file.Note')); ?></label>
                      <textarea name="note" rows="3" class="form-control"></textarea>
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

    $("ul#expense").siblings('a').attr('aria-expanded','true');
    $("ul#expense").addClass("show");
    $("ul#expense #exp-list-menu").addClass("active");

    var expense_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;
    var all_permission = <?php echo json_encode($all_permission) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.open-Editexpense_categoryDialog').on('click', function() {
        var url = "expenses/"
        var id = $(this).data('id').toString();
        url = url.concat(id).concat("/edit");
        $.get(url, function(data) {
            $('#editModal #reference').text(data['reference_no']);
            $("#editModal select[name='warehouse_id']").val(data['warehouse_id']);
            $("#editModal select[name='expense_category_id']").val(data['expense_category_id']);
            $("#editModal select[name='account_id']").val(data['account_id']);
            $("#editModal input[name='amount']").val(data['amount']);
            $("#editModal input[name='expense_id']").val(data['id']);

            $("#editModal input[name='billing_date']").val( moment(data['billing_date']).format('D - MMM - YYYY'));

            $("#editModal input[name='payment_date']").val( moment(data['payment_date']).format('D - MMM - YYYY'));
            $("#editModal textarea[name='note']").val(data['note']);
            $('.selectpicker').selectpicker('refresh');
        });
    });


function confirmDelete() {
    if (confirm("Are you sure want to delete?")) {
        return true;
    }
    return false;
}

    $('#expense-table').DataTable( {
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
                'targets': [0, 6]
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
                extend: 'pdf',
                title:'Expense List',
                text: '<?php echo e(trans("file.PDF")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
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
                title:'Expense List',
                text: '<?php echo e(trans("file.CSV")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
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
                title:'Expense List',
                text: '<?php echo e(trans("file.Print")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
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
                    // if(user_verified == '1') {
                        expense_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                expense_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(expense_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'expenses/deletebyselection',
                                data:{
                                    expenseIdArray: expense_id
                                },
                                success:function(data){
                                    //alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!expense_id.length)
                            alert('No expense is selected!');
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

    if(all_permission.indexOf("expenses-delete") == -1)
        $('.buttons-delete').addClass('d-none');

        $(".daterangepicker-field").daterangepicker({
            callback: function(startDate, endDate, period){
            var start_date = startDate.format('YYYY-MM-DD');
            var end_date = endDate.format('YYYY-MM-DD');
            var title = start_date + ' To ' + end_date;
            $('input[name="date_range"]').val(title);
            $('input[name="start_date"]').val(start_date);
            $('input[name="end_date"]').val(end_date);
        }
    });



    if(all_permission.indexOf("expenses-delete") == -1)
        $('.buttons-delete').addClass('d-none');

        $(".payment_daterangepicker-field").daterangepicker({
            callback: function(startDate, endDate, period){
                var start_date = startDate.format('YYYY-MM-DD');
                var end_date = endDate.format('YYYY-MM-DD');
                var title = start_date + ' To ' + end_date;
                $('input[name="payment_date_range"]').val(title);
                $('input[name="payment_start_date"]').val(start_date);
                $('input[name="payment_end_date"]').val(end_date);
            }
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\wingking-fasion\resources\views/expense/index.blade.php ENDPATH**/ ?>