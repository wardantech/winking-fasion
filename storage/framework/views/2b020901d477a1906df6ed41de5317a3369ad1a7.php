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
         <?php if(in_array("purchase-contract-add", $all_permission)): ?>
        <!-- Trigger the modal with a button -->
        <a href="<?php echo e(route('purchase_contract.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i>New Purchase Contract </a>&nbsp;
        <?php endif; ?>
    </div>

    <div class="container-fluid" style="margin-top:20px;">
        <div class="card">
            <?php echo Form::open(['route' => 'contract.filtering', 'method' => 'post']); ?>

            <div class="row mb-3">
                <div class="col-md-5 mt-4">
                    <div class="form-group<?php echo e($errors->has('vendor_id') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Choose vendor</strong> &nbsp;</label>
                        <select name="vendor_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select vendor...">
                            <?php $__currentLoopData = $lims_vendor_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($vendorId)): ?>
                                     <option value="<?php echo e($vendor->id); ?>" <?php echo e(($vendorId == $vendor->id)?'selected':''); ?>><?php echo e($vendor->name); ?></option>
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
                <div class="col-md-5 mt-4">
                    <div class="form-group<?php echo e($errors->has('notify_id') ? ' has-error' : ''); ?> has-feedback">
                        <label class="d-tc mt-2"><strong>Choose consignee party & notify party</strong> &nbsp;</label>
                        <select name="notify_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select consignee and notify party to...">
                            <?php $__currentLoopData = $notify_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($notifyId)): ?>
                                     <option value="<?php echo e($notify->id); ?>" <?php echo e(($notifyId == $notify->id)?'selected':''); ?>><?php echo e($notify->name); ?></option>
                                <?php else: ?>
                                     <option value="<?php echo e($notify->id); ?>"><?php echo e($notify->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('notify_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('notify_id')); ?></strong>
                        </span>
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
        <table id="category-table" class="table table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>Account Of</th>
                    <th>Master Contract No</th>
                    <th style="padding-right:50px;">Master Contract Date</th>
                    <th style="padding-right:50px;">Delivery Date</th>
                    <th>Consignee & Notify Party</th>
                    <th>Customer</th>
                    <th>Order Quantity</th>
                    <th>Order Value (Master)</th>

                    <th>Vendor Contract No</th>
                    <th style="padding-right:50px;">Vendor Contract Date</th>
                    <th style="padding-right:50px;">Delivery Date</th>
                    <th>Vendor</th>
                    <th>Order Quantity</th>
                    <th>Order Value (Vendor)</th>
                    <th>Difference Amount</th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $lims_contract_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-id="<?php echo e($contract->id); ?>">
                        <td><?php echo e($key); ?></td>
                        <td>
                            <?php if($contract->account_of == 1): ?>
                              Winking
                            <?php elseif($contract->account_of == 2): ?>
                              Artisan
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($contract->master_contract_no); ?></td>
                        <td>
                            <?php if($contract->master_date !== null): ?>
                            <?php echo e(date('d-M-Y', strtotime($contract->master_date))); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($contract->delivery_date_master !== null): ?>
                            <?php echo e(date('d-M-Y', strtotime($contract->delivery_date_master))); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e($contract->notifyInfo->name); ?></td>
                        <td><?php echo e($contract->customer->name); ?></td>
                        <td><?php echo e($contract->total_qty); ?> pcs</td>
                        <td>$<?php echo e(number_format((float)$contract->total_amount_master, 2, '.', '')); ?> </td>
                        <td><?php echo e($contract->contract_no); ?></td>
                        <td>
                            <?php if($contract->vendor_date !== null): ?>
                            <?php echo e(date('d-M-Y', strtotime($contract->vendor_date))); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($contract->delivery_date !== null): ?>
                            <?php echo e(date('d-M-Y', strtotime($contract->delivery_date))); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e($contract->vendor->name); ?></td>
                        <td><?php echo e($contract->total_qty); ?> pcs</td>
                        <td>$<?php echo e(number_format((float)$contract->total_amount, 2, '.', '')); ?> </td>
                        <td>$<?php echo e(number_format((float)$contract->total_amount_master -  $contract->total_amount, 2, '.', '')); ?> </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">

                                    <li><a href="public/documents/master_contract/<?php echo e($contract->master_doc); ?>" class="btn btn-link">  <i class="dripicons-download"></i> <?php echo e(trans('Download Master Contract')); ?></a></li>
                                    
                                    <?php if(in_array("purchase-contract-edit", $all_permission)): ?>
                                    <li><a href="<?php echo e(route('purchase_contract.edit',$contract->id)); ?>" class="btn btn-link">  <i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></a></li>
                                    <?php endif; ?>
                                     
                                    <li><a href="public/documents/purchase_contract/<?php echo e($contract->contract_doc); ?>" class="btn btn-link">  <i class="dripicons-download"></i> <?php echo e(trans('Download Purchase Contract')); ?></a></li>

                                    <?php if(in_array("purchase-contract-delete", $all_permission)): ?>
                                    <li class="divider"></li>
                                    <?php echo e(Form::open(['route' => ['purchase_contract.destroy', $contract->id], 'method' => 'DELETE'] )); ?>

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
            </tfoot>
         </table>
        </table>
    </div>
</section>




<script type="text/javascript">

    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #purchase-contract-list").addClass("active");


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
                'targets': [0, 3, 4, 5, 6, 9, 10]
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
                title: 'Purchase Contract List',
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
                title: 'Purchase Contract List',
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
                title: 'Purchase Contract List',
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
                }
            },
            {
                text: '<?php echo e(trans("file.delete")); ?>',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                    if(user_verified == '1') {
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
                    }
                    else
                        alert('This feature is disable for demo!');
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
            $( dt_selector.column( 7 ).footer() ).html(dt_selector.cells( rows, 7, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 8 ).footer() ).html('$'+dt_selector.cells( rows, 8, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 13 ).footer() ).html('$'+dt_selector.cells( rows, 13, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 14 ).footer() ).html('$'+dt_selector.cells( rows, 14, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 15 ).footer() ).html('$'+dt_selector.cells( rows, 15, { page: 'current' } ).data().sum().toFixed(2));
        }
        else {
            $( dt_selector.column( 7 ).footer() ).html(dt_selector.cells( rows, 7, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 8 ).footer() ).html('$'+dt_selector.cells( rows, 8, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 13 ).footer() ).html(dt_selector.cells( rows, 13, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 14 ).footer() ).html('$'+dt_selector.cells( rows, 14, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 15 ).footer() ).html('$'+dt_selector.cells( rows, 15, { page: 'current' } ).data().sum().toFixed(2));
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/purchase_contract/index.blade.php ENDPATH**/ ?>