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
        <?php if(in_array("export-add", $all_permission)): ?>
        <a href="<?php echo e(route('export.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i> New Export </a>&nbsp;
        <?php endif; ?>
    </div>

    <div class="container-fluid" style="margin-top:20px;">
        <div class="card">
            <?php echo Form::open(['route' => 'export.filtering', 'method' => 'post']); ?>

            <div class="row mb-3">

                <div class="col-md-3 mt-4">
                    <div class="form-group<?php echo e($errors->has('customer_id') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Choose Customer</strong> &nbsp;</label>
                        <?php if(isset($customerId)): ?>
                        <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select customer name...">
                            <?php $__currentLoopData = $lims_customer_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($customer->id); ?>" <?php echo e(($customerId == $customer->id) ? 'selected':''); ?>><?php echo e($customer->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php else: ?>
                         <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select customer name...">
                            <?php $__currentLoopData = $lims_customer_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>
                        <?php if($errors->has('customer_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('customer_id')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="form-group<?php echo e($errors->has('ship_to_id') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Ship To</strong> &nbsp;</label>
                        <?php if(isset($shipId)): ?>
                        <select name="ship_to_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select ship to...">
                            <?php $__currentLoopData = $lims_shipper_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($shipper->id); ?>" <?php echo e(($shipId == $shipper->id) ? 'selected':''); ?>><?php echo e($shipper->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php else: ?>
                        <select name="ship_to_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select ship to...">
                            <?php $__currentLoopData = $lims_shipper_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($shipper->id); ?>"><?php echo e($shipper->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>

                        <?php if($errors->has('ship_to_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('ship_to_id')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-2 mt-4">
                     <div class="form-group<?php echo e($errors->has('account_of') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Account Of </strong> &nbsp;</label>
                        <?php if(isset($accountOf)): ?>
                        <select name="account_of" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select account of...">
                            <option value="1" <?php echo e(($accountOf == '1') ? 'selected':''); ?>>Winking</option>
                            <option value="2" <?php echo e(($accountOf == '2') ? 'selected':''); ?>>Artisan</option>
                        </select>
                        <?php else: ?>
                        <select name="account_of" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select account of...">
                            <option value="1">Winking</option>
                            <option value="2">Artisan</option>
                        </select>
                        <?php endif; ?>

                        <?php if($errors->has('account_of')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('account_of')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-2 mt-4">
                     <div class="form-group<?php echo e($errors->has('account_of') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Payment Status </strong> &nbsp;</label>
                        <?php if(isset($status)): ?>
                        <select name="payment_status" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select payment status...">
                            <option value="Pending" <?php echo e(($status == 'Pending') ? 'selected':''); ?>>Pending</option>
                            <option value="Received" <?php echo e(($status == 'Received') ? 'selected':''); ?>>Received</option>
                        </select>
                        <?php else: ?>
                        <select name="payment_status" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select payment status...">
                            <option value="Pending">Pending</option>
                            <option value="Received">Received</option>
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
                    <th>Invoice Number</th>
                    <th style="padding-right:70px;">Date</th>
                    <th>Shipper</th>
                    <th>Ship To</th>
                    <th>Customer</th>
                    <th>LC/Contract No</th>
                    <th>BL No</th>
                    <th>Quantity</th>
                    <th>Quantity</th>
                    <th>Invoice Value</th>
                    <th>Shipper Invoice Value</th>
                    <th>Difference Amount</th>
                    <th style="padding-right:70px;">ETD</th>
                    <th style="padding-right:70px;">ETA</th>
                    <th style="padding-right:50px;">Payment Due Date</th>
                    <th>Payment Status</th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $total_siv = 0; $total_iv = 0; $total_div = 0; ?>
                <?php $__currentLoopData = $lims_export_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$export): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-id="<?php echo e($export->id); ?>" style="<?php echo e(($export->export_status == 'Pending')?'background-color: #E7E7E7;':'background-color: #F3FFEB'); ?>">
                    <td><?php echo e($key); ?></td>
                    <td>
                        <?php if($export->account_of == 1): ?>
                          Winking
                        <?php elseif($export->account_of == 2): ?>
                          Artisan
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($export->invoice_no); ?></td>
                    <td><?php echo e(date('d-M-Y', strtotime($export->date))); ?></td>
                    <?php if($export->vendor): ?>
                       <td><?php echo e($export->vendor->name); ?></td>
                    <?php endif; ?>

                    <?php if($export->customer): ?>
                       <td><?php echo e($export->shipper->name); ?></td>
                    <?php endif; ?>

                    <?php if($export->customer): ?>
                       <td><?php echo e($export->customer->name); ?></td>
                    <?php endif; ?>
                    <td><?php echo e($export->lc_number); ?></td>
                    <td><?php echo e($export->contact_number); ?></td>
                    <td><?php echo e($export->quantity_pcs); ?> pcs</td>
                    <td><?php echo e($export->quantity_crt); ?> ctn</td>

                    <td>$<?php echo e(number_format((float)$export->invoice_value, 2, '.', '')); ?></td>
                    <td>$<?php echo e(number_format((float)$export->shipper_invoice_value, 2, '.', '')); ?></td>
                    <td>$<?php echo e(number_format((float)$export->invoice_value - $export->shipper_invoice_value, 2, '.', '')); ?></td>
                    <td><?php echo e(date('d-m-Y', strtotime($export->etd))); ?></td>
                    <td><?php echo e(date('d-m-Y', strtotime($export->eta))); ?></td>
                    <td><?php echo e(date('d-m-Y', strtotime($export->due_date))); ?></td>
                    <td>
                        <?php if($export->export_status == 'Pending'): ?>
                          <span class="badge badge-danger"><?php echo e($export->export_status); ?></span>
                        <?php else: ?>
                          <span class="badge badge-warning"><?php echo e($export->export_status); ?></span>
                        <?php endif; ?>

                    </td>
                    <?php
                        $total_siv += $export->shipper_invoice_value;
                        $total_iv += $export->invoice_value;
                        $total_div += $export->shipper_invoice_value-$export->invoice_value;
                    ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                            <?php if(in_array("export-edit", $all_permission)): ?>
                                <li><a href="<?php echo e(route('export.edit',$export->id)); ?>" class="btn btn-link">  <i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></a></li>
                            <?php endif; ?>
                            <?php if(in_array("export-edit", $all_permission)): ?>
                                <li class="divider"></li>
                                <?php echo e(Form::open(['route' => ['export.destroy', $export->id], 'method' => 'DELETE'] )); ?>

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
                <th></th>
                <th></th>
                <th></th>
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
        </table>
    </div>
</section>




<script type="text/javascript">

    $("ul#export-summary").siblings('a').attr('aria-expanded','true');
    $("ul#export-summary").addClass("show");
    $("ul#export-summary #export-summary-list-menu").addClass("active");


    var export_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;


    function confirmDelete() {
    if (confirm("Are you sure want to delete?")) {
        return true;
    }
    return false;
}

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
                title: 'Export List',
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
                title: 'Export List',
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
                title: 'Export List',
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
                    $(win.document.body).find('th:last-child').css( 'width', '30%' );
                    $(win.document.body).find('td:last-child').css( 'width', '30%' );
                }
            },
            {
                text: '<?php echo e(trans("file.delete")); ?>',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                   // if(user_verified == '1') {
                        export_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                export_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(export_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'exports/deletebyselection',
                                data:{
                                    exportIdArray: export_id
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
            $( dt_selector.column( 9 ).footer() ).html(dt_selector.cells( rows, 9, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 10 ).footer() ).html(dt_selector.cells( rows, 10, { page: 'current' } ).data().sum()+' ctn');
            $( dt_selector.column( 11 ).footer() ).html('$'+dt_selector.cells( rows, 11, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 12 ).footer() ).html('$'+dt_selector.cells( rows, 12, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 13 ).footer() ).html('$'+dt_selector.cells( rows, 12, { page: 'current' } ).data().sum().toFixed(2));
        }
        else {
            $( dt_selector.column( 9 ).footer() ).html(dt_selector.cells( rows, 9, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 10 ).footer() ).html(dt_selector.cells( rows, 10, { page: 'current' } ).data().sum()+' ctn');
            $( dt_selector.column( 11 ).footer() ).html('$'+dt_selector.cells( rows, 11, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 12 ).footer() ).html('$'+dt_selector.cells( rows, 12, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 13 ).footer() ).html('$'+dt_selector.cells( rows, 13, { page: 'current' } ).data().sum().toFixed(2));
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\wingking-fasion\resources\views/export/index.blade.php ENDPATH**/ ?>