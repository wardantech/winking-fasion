 <?php $__env->startSection('content'); ?>

<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<style>
    td{
        vertical-align: text-top !important;
    }
    .table,th{
        vertical-align: text-top !important;
    }
</style>
<section>
    <div class="container-fluid">
        <!-- Trigger the modal with a button -->
        <a href="<?php echo e(route('cost_breakdowns.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i> Create Cost Breakdown </a>&nbsp;
    </div>

    <div class="container-fluid" style="margin-top:20px;">
        <div class="card">
            <?php echo Form::open(['route' => 'breakdown.filtering', 'method' => 'post']); ?>

            <div class="row mb-3">

                <div class="col-md-3 mt-4">
                    <div class="form-group<?php echo e($errors->has('customer_id') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Choose Customer</strong> &nbsp;</label>
                        <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select customer name...">
                            <?php $__currentLoopData = $lims_customer_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($customerId)): ?>
                                     <option value="<?php echo e($customer->id); ?>" <?php echo e(($customer->id ==  $customerId)?'selected':''); ?>><?php echo e($customer->name); ?></option>
                                <?php else: ?>
                                     <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('customer_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('customer_id')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <div class="form-group<?php echo e($errors->has('invoice_to_id') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Choose Vendor</strong> &nbsp;</label>
                        <select name="vendor_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select vendor ...">
                            <?php $__currentLoopData = $lims_vendor_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php if(!empty($vendorId)): ?>
                                   <option value="<?php echo e($vendor->id); ?>" <?php echo e(($vendor->id ==  $vendorId)?'selected':''); ?>><?php echo e($vendor->name); ?></option>
                               <?php else: ?>
                                   <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                               <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('vendor_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('vendor_id')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2 mt-4">
                    <div class="form-group<?php echo e($errors->has('invoice_to_id') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Choose Account Of</strong> &nbsp;</label>
                        <select name="account_of" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Account ...">
                            <?php if(!empty($accountId)): ?>
                                <option value="1" <?php echo e(($accountId == 1)?'selected':''); ?>>Winking</option>
                                <option value="2" <?php echo e(($accountId == 2)?'selected':''); ?>>Artisan</option>
                            <?php else: ?>
                                <option value="1">Winking</option>
                                <option value="2">Artisan</option>
                            <?php endif; ?>
                        </select>
                        <?php if($errors->has('account_of')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('account_of')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                     <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Order Status </strong> &nbsp;</label>
                        <?php if(isset($status)): ?>
                        <select name="status" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select status...">
                            <option value="Running" <?php echo e(($status == 'Running') ? 'selected':''); ?>>Running</option>
                            <option value="Delivered" <?php echo e(($status == 'Delivered') ? 'selected':''); ?>>Delivered</option>
                        </select>
                        <?php else: ?>
                        <select name="status" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select status...">
                            <option value="Running">Running</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                        <?php endif; ?>

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
        <table id="category-table" class="table" style="width: 100%">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>Account Of</th>
                    <th>Season</th>
                    <th>Customer</th>
                    <th>Vendor</th>
                    <th>LC/Contract No</th>
                    <th>Order Quantity</th>
                    <th>Order Value (Customer)</th>
                    <th>Order Value (Vendor)</th>
                    <th>Difference Amount</th>
                    <th style="padding-right:50px;">Delivery Date</th>
                    <th>Order Status</th>

                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $breakdown_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$breakdown): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-id=<?php echo e($breakdown->id); ?> style="<?php echo e(($breakdown->status == 'Running')?'background-color: #E7E7E7;':'background-color: #F3FFEB'); ?>">
                        <td><?php echo e($key); ?></td>
                        <td>
                            <?php if($breakdown->account_of == 1): ?>
                                Winking
                            <?php elseif($breakdown->account_of == 2): ?>
                                Artisan
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($breakdown->season); ?></td>
                        <td><?php echo e($breakdown->customer->name); ?></td>
                        <td><?php echo e($breakdown->vendor->name); ?></td>
                        <td><?php echo e($breakdown->lc_number); ?></td>
                        <td><?php echo e($breakdown->order_qty); ?> pcs</td>
                        <td>$<?php echo e(number_format((float)$breakdown->order_value_customer, 2, '.', '')); ?></td>
                        <td>$<?php echo e(number_format((float)$breakdown->order_value_vendor, 2, '.', '')); ?></td>
                        <td>$<?php echo e(number_format((float)$breakdown->order_value_customer - $breakdown->order_value_vendor, 2, '.', '')); ?></td>
                        <td><?php echo e(date('d-M-Y', strtotime($breakdown->delivery_date))); ?></td>
                        <td>
                            <?php if($breakdown->status == 'Running'): ?>
                              <span class="badge badge-danger"><?php echo e($breakdown->status); ?></span>
                            <?php else: ?>
                              <span class="badge badge-warning"><?php echo e($breakdown->status); ?></span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                    <li><a href="<?php echo e(route('cost_breakdowns.edit',$breakdown->id)); ?>" class="btn btn-link">  <i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></a></li>
                                    <li><a href="public/documents/master_contract/<?php echo e($breakdown->document); ?>" class="btn btn-link">  <i class="dripicons-download"></i> <?php echo e(trans('Download Cost Breakdown')); ?></a></li>
                                    <li class="divider"></li>

                                    <?php echo e(Form::open(['route' => ['cost_breakdowns.destroy', $breakdown->id], 'method' => 'DELETE'] )); ?>

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
            <tfoot class="tfoot active">
                <th></th>
                <th><?php echo e(trans('file.Total')); ?></th>
                <th></th>
                <th></th>
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




<script type="text/javascript">

    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #cost-breakdown-menu").addClass("active");


    var category_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;


    $('#category-table').DataTable( {
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
                'targets': [0, 3, 4, 5, 6, 7, 8]
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
                title:'Cost Breakdown',
                text: '<?php echo e(trans("file.PDF")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
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
                title:'Cost Breakdown',
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
                title:'Cost Breakdown',
                text: '<?php echo e(trans("file.Print")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true,
                customize: function ( win ) {
                    $(win.document.body).find('td,th').css( 'text-align', 'center' );
                    $(win.document.body).find('td:first-child').css( 'text-align', 'left' );
                    $(win.document.body).find('td:last-child').css( 'text-align', 'right' );
                    $(win.document.body).find('th:first-child').css( 'text-align', 'left' );
                    $(win.document.body).find('th:last-child').css( 'text-align', 'right' );
                    $(win.document.body).find('td,th').css( 'border', '1px solid #A8A8A8' );
                    $(win.document.body).css( 'margin', '50px' );
                },
            },
            {
                text: '<?php echo e(trans("file.delete")); ?>',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                    //if(user_verified == '1') {
                        category_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                category_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(category_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'categories/deletebyselection',
                                data:{
                                    categoryIdArray: category_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!category_id.length)
                            alert('No interest is selected!');
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
            console.log(api);
            datatable_sum(api, false);
        }
    } );

    function datatable_sum(dt_selector, is_calling_first) {
        if (dt_selector.rows( '.selected' ).any() && is_calling_first) {
            var rows = dt_selector.rows( '.selected' ).indexes();
            $( dt_selector.column( 6 ).footer() ).html(dt_selector.cells( rows, 6, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 7 ).footer() ).html('$'+dt_selector.cells( rows, 7, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 8 ).footer() ).html('$'+dt_selector.cells( rows, 8, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 9 ).footer() ).html('$'+dt_selector.cells( rows, 9, { page: 'current' } ).data().sum().toFixed(2));
        }
        else {
            $( dt_selector.column( 6 ).footer() ).html(dt_selector.cells( rows, 6, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 7 ).footer() ).html('$'+dt_selector.cells( rows, 7, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 8 ).footer() ).html('$'+dt_selector.cells( rows, 8, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 9 ).footer() ).html('$'+dt_selector.cells( rows, 9, { page: 'current' } ).data().sum().toFixed(2));
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/cost_breakdown/index.blade.php ENDPATH**/ ?>