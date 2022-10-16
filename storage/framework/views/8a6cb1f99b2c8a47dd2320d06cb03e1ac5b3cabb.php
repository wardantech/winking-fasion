 <?php $__env->startSection('content'); ?>

<?php if($errors->has('name')): ?>
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e($errors->first('name')); ?></div>
<?php endif; ?>
<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<style>
    .company-info h2{
        margin-top: 10px;
        font-weight: bold;
        font-family: Tahoma;
        text-align: right;
    }
    .vendor h2, .ship h2{
        font-weight: bold;
        font-family: Tahoma;
        font-size:12px;
    }
    .custom_table th, .custom_table td{
            border: 1px solid #dee2e6;
            padding: .30rem;
    }
    .table td, .table th{
            padding: .50rem;
        }
    .logo img{
        width: 30%;
       float: left;
    }
    .company-info p, .vendor p, .ship p{
        margin: 0px;
        padding: 0px;
        font-size: 12px;
        text-transform: uppercase;
    }
    .details th{
        text-transform: uppercase;
        font-weight: bold;
        font-family: Tahoma;
        font-size:12px;
    }
    .details td{
        text-transform: uppercase;
        font-size: 12px;
    }
    .purchase{
        background-color: #dad7d7;
        padding: 5px;
        font-weight: bold;
        font-family: Tahoma;
        text-align: center;
        border-radius: 5px;
    }
    .description{
        padding: 0px;
        text-align: justify;
        min-height: 80px;
        border: 1px solid #dee2e6;
        padding: 5px;
        text-transform: uppercase;
        font-size: 12px;
    }

    .packing{
        padding: 0px;
        text-align: justify;
        min-height: 60px;
        border: 1px solid #dee2e6;
        padding: 5px;
        text-transform: uppercase;
        font-size: 12px;
    }

</style>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                    </div>
                    <div class="card-body">
                         <div class="row">
                            <div class="col-md-6">
                                <div class="logo">
                                    <img src="<?php echo e(url('public/logo', $general_setting->site_logo)); ?>" alt="Side Image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="company-info">
                                    <h2>PURCHASE ORDER</h2>
                                    <p style="text-align:right;"><?php echo e(date('d-M-Y',strtotime($order->order_date))); ?></p>
                                </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-md-12">
                                <table class="custom_table" width="100%" style="margin-bottom: 2px;">
                                    <thead>
                                        <th width="20%">
                                            <div class="vendor">
                                                <h2>VENDOR / SHIPPER</h2>
                                            </div>
                                        </th>
                                        <th width="20%">
                                            <div class="vendor">
                                                <h2>SHIP TO</h2>
                                            </div>
                                        </th>
                                        <th width="20%">
                                            <div class="vendor">
                                                <h2>INVOICE TO</h2>
                                            </div>
                                        </th>
                                        <th width="20%">
                                            <div class="vendor">
                                                <h2>CUSTOMER</h2>
                                            </div>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <td>
                                            <div class="vendor">
                                                <p><b><?php echo e($order->vendorInfo->name); ?></b></p>
                                                <p><?php echo e($order->vendorInfo->address); ?>, <?php echo e($order->vendorInfo->city); ?>-<?php echo e($order->vendorInfo->state); ?>. <?php echo e($order->vendorInfo->country); ?>  </p>
                                                <p>Tel:
                                                <?php echo e($order->vendorInfo->phone); ?>

                                                    <?php if($order->vendorInfo->mobile !== null): ?>
                                                          ,
                                                    <?php endif; ?>
                                                <?php echo e($order->vendorInfo->mobile); ?> </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="vendor">
                                                <p><b><?php echo e($order->shipTo->name); ?></b></p>
                                                <p><?php echo e($order->shipTo->address); ?>, <?php echo e($order->shipTo->city); ?>, <?php echo e($order->shipTo->state); ?>, <?php echo e($order->shipTo->zip); ?>, <?php echo e($order->shipTo->country); ?>  </p>
                                                <p>Tel:
                                                <?php echo e($order->shipTo->phone); ?>

                                                    <?php if($order->shipTo->mobile !== null): ?>
                                                          ,
                                                    <?php endif; ?>
                                                <?php echo e($order->shipTo->mobile); ?>

                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="vendor">
                                                <p><b><?php echo e($order->invoiceTo->name); ?></b></p>
                                                <p><?php echo e($order->invoiceTo->address); ?>, <?php echo e($order->invoiceTo->city); ?>-<?php echo e($order->invoiceTo->state); ?>, <?php echo e($order->invoiceTo->country); ?>  </p>
                                                <p>Tel:
                                                    <?php echo e($order->invoiceTo->phone); ?>

                                                        <?php if($order->invoiceTo->mobile !== null): ?>
                                                          ,
                                                        <?php endif; ?>
                                                    <?php echo e($order->invoiceTo->mobile); ?>

                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="vendor">
                                                <p><b><?php echo e($order->customer->name); ?></b></p>
                                                <p><?php echo e($order->customer->address); ?>, <?php echo e($order->customer->city); ?>, <?php echo e($order->customer->state); ?>, <?php echo e($order->customer->postal_code); ?>, <?php echo e($order->customer->country); ?>  </p>
                                                <p>Tel:

                                                      <?php echo e($order->customer->phone_number); ?>

                                                </p>
                                            </div>
                                        </td>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <table class="custom_table details" width="100%" style="margin-bottom: 2px;">
                                    <thead>
                                        <tr>
                                            <th width="10%">PO Number</th>
                                            <th width="10%">X-country date</th>
                                            <th width="10%">ship via</th>
                                            <th width="10%">Terms</th>
                                            <th width="25%">Payment/Draft At</th>
                                            <th width="10%">Brand</th>
                                            <th width="12%">Season</th>
                                            <th width="13%">Last Revised</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                         <tr>
                                             <td><?php echo e($order->po_number); ?></td>
                                             <td><?php echo e(date('d-M-Y',strtotime($order->ship_exp_date))); ?></td>
                                             <td><?php echo e($order->ship_via); ?></td>
                                             <td><?php echo e($order->ship_terms); ?></td>
                                             <td><?php echo e($order->payment_terms); ?></td>
                                             <td><?php echo e($order->brand); ?></td>
                                             <td><?php echo e($order->season); ?></td>
                                             <td>
                                                 <?php if($order->rivision_no != null): ?>
                                                     <?php echo e(date('d-M-Y',strtotime($order->rivision_no))); ?>

                                                 <?php endif; ?>
                                             </td>
                                         </tr>
                                     </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <table class="custom_table details" width="100%" style="margin-bottom: 2px;">
                                    <thead>
                                        <tr>
                                            <th width="10%">Style</th>
                                            <th width="10%">CA/RN</th>
                                            <th width="45%">ITEM Description</th>
                                            <th width="10%">Fabric Ref</th>
                                            <th width="25%">Fabrication</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                         <tr>
                                             <td><?php echo e($order->style_no); ?></td>
                                             <td><?php echo e($order->ca); ?></td>
                                             <td><?php echo e($order->description); ?></td>
                                             <td><?php echo e($order->febric_ref); ?></td>
                                             <td><?php echo e($order->fabrication); ?></td>
                                         </tr>
                                     </tbody>
                                </table>
                            </div>
                         </div>

                    <div class="row">
                         <div class="col-md-12">
                            <table class="custom_table details" width="100%">
                                <thead>
                                    <tr>
                                        <th width="10%">Color</th>
                                        <th width="10%">Code</th>
                                        <th width="10%">PRE PACK</th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size1); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size2); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size3); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size4); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size5); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size6); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size7); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size8); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size9); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size10); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size11); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size12); ?></th>
                                        <th style="text-align:center;"><?php echo e($lim_sizes->size13); ?></th>
                                        <th style="text-align:center;" width="10%">Total Units</th>
                                        <th style="text-align:center;" width="12%">Unit Price</th>
                                        <th style="text-align:center;" width="13%">Total Amount</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $lim_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($detail->color); ?></td>
                                                <td><?php echo e($detail->color_code); ?></td>
                                                <td>
                                                    <?php echo e($detail->prepack1); ?>

                                                    <?php if($detail->prepack2 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack2); ?>

                                                    <?php if($detail->prepack3 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack3); ?>

                                                    <?php if($detail->prepack4 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack4); ?>

                                                    <?php if($detail->prepack5 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack5); ?>

                                                    <?php if($detail->prepack6 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack6); ?>

                                                    <?php if($detail->prepack7 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack7); ?>

                                                    <?php if($detail->prepack8 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack8); ?>

                                                    <?php if($detail->prepack9 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack9); ?>

                                                    <?php if($detail->prepack10 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack10); ?>

                                                    <?php if($detail->prepack11 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack11); ?>

                                                    <?php if($detail->prepack12 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack13); ?>

                                                    <?php if($detail->prepack10 !== null): ?>
                                                       ,
                                                    <?php endif; ?>
                                                    <?php echo e($detail->prepack13); ?>

                                                </td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity1); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity2); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity3); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity4); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity5); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity6); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity7); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity8); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity9); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity10); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity11); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity12); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->quantity13); ?></td>
                                                <td style="text-align:center;"><?php echo e($detail->color_wise_quantity); ?></td>
                                                <td style="text-align:center;">$ <?php echo e(number_format((float)$detail->color_unit_price, 2, '.', '')); ?></td>
                                                <td style="text-align:center;">$ <?php echo e(number_format((float)$detail->sub_total, 2, '.', '')); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="16" style="text-align: right;">Total</th>
                                            <th style="text-align:center;"><?php echo e($order->total_quantity); ?></th>
                                            <th></th>
                                            <th style="text-align:center;">$<?php echo e(number_format((float)$order->total_amount, 2, '.', '')); ?></th>
                                        </tr>
                                    </tfoot>
                            </table>
                         </div>

                        <div class="col-md-12">
                            <div class="vendor">
                                <h2 style="margin-top:10px;">PACKING INSTRUCTION</h2>
                                <div class="packing">
                                    <?php echo $order->packing_instruction; ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:10px;">
                            <div class="vendor">
                                <h2>SPECIAL INSTRUCTION</h2>
                                <div class="description">
                                        <?php echo $order->instruction_notes; ?>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(url('purchase_order/print',$order->id)); ?>" class="btn btn-success btn-md">Print Order</a>
            </div>
        </div>
    </div>

</section>




<script type="text/javascript">

    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #purchase-order-menu-list").addClass("active");

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
                text: '<?php echo e(trans("file.PDF")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
            },
            {
                extend: 'csv',
                text: '<?php echo e(trans("file.CSV")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                },
            },
            {
                extend: 'print',
                text: '<?php echo e(trans("file.Print")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
            },
            {
                text: '<?php echo e(trans("file.delete")); ?>',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                   // if(user_verified == '1') {
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
    } );

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/purchase/order_view.blade.php ENDPATH**/ ?>