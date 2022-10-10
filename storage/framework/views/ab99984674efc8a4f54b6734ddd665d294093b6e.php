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
        <?php if(in_array("cost-sheet-add", $all_permission)): ?>
        <a href="<?php echo e(route('cost_sheet.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i> Add Cost Sheet </a>&nbsp;
        <?php endif; ?>
    </div>

    <div class="container-fluid" style="margin-top:20px;">
        <div class="card">
            <?php echo Form::open(['route' => 'cost.filtering', 'method' => 'post']); ?>

            <div class="row mb-3">

                <div class="col-md-10 mt-4">
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
                    <th>Style No</th>
                    <th>Customer</th>
                    <th>Season</th>
                    <th>Brand/Label</th>
                    <th>Item Description</th>
                    <th>Target Price</th>
                    <th>Size Scale</th>
                    <th>Order Quantity</th>
                    <th>Cost Per pcs</th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $lims_cost_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-id="<?php echo e($cost->id); ?>">
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e($cost->style_no); ?></td>
                        <td><?php echo e($cost->customer->name); ?></td>
                        <td><?php echo e($cost->season); ?></td>
                        <td><?php echo e($cost->brand); ?></td>
                        <td><?php echo e($cost->item_description); ?></td>
                        <td>$<?php echo e(number_format((float)$cost->target_price, 2, '.', '')); ?></td>
                        <td><?php echo e($cost->size_scale); ?></td>
                        <td><?php echo e($cost->order_quantity); ?> pcs</td>
                        <td>$<?php echo e(number_format((float)$cost->cost_per_pc, 2, '.', '')); ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                   <?php if(in_array("cost-sheet-edit", $all_permission)): ?>
                                    <li><a href="<?php echo e(route('cost_sheet.edit',$cost->id)); ?>" style="text-transform: capitalize;" class="btn btn-link">  <i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></a></li>
                                   <?php endif; ?>
                                   <?php if(in_array("cost-sheet-index", $all_permission)): ?>
                                    <li><a href="<?php echo e(route('cost_sheet.show',$cost->id)); ?>" style="text-transform: capitalize;" class="btn btn-link">  <i class="fa fa-eye"></i> <?php echo e(trans('View')); ?></a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(route('cost_sheet.duplicate',$cost->id)); ?>" style="text-transform: capitalize;" class="btn btn-link">  <i class="fa fa-files-o" aria-hidden="true"></i> <?php echo e(trans('Duplicate')); ?></a></li>
                                    <?php if(in_array("cost-sheet-delete", $all_permission)): ?>
                                    <li class="divider"></li>
                                    <?php echo e(Form::open(['route' => ['cost_sheet.destroy', $cost->id], 'method' => 'DELETE'] )); ?>

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
         </table>
        </table>
    </div>
</section>




<script type="text/javascript">

    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #cost-sheet-list-menu").addClass("active");


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
                title: 'Cost Sheet List',
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
                title: 'Cost Sheet List',
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
                title: 'Cost Sheet List',
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
            $( dt_selector.column( 6 ).footer() ).html('$'+dt_selector.cells( rows, 6, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 8 ).footer() ).html(dt_selector.cells( rows, 8, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 9 ).footer() ).html('$'+dt_selector.cells( rows, 9, { page: 'current' } ).data().sum().toFixed(2));
        }
        else {
            $( dt_selector.column( 6 ).footer() ).html('$'+dt_selector.cells( rows, 6, { page: 'current' } ).data().sum().toFixed(2));
            $( dt_selector.column( 8 ).footer() ).html(dt_selector.cells( rows, 8, { page: 'current' } ).data().sum()+' pcs');
            $( dt_selector.column( 9 ).footer() ).html('$'+dt_selector.cells( rows, 9, { page: 'current' } ).data().sum().toFixed(2));
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\wingking-fasion\resources\views/cost_sheet/list.blade.php ENDPATH**/ ?>