 <?php $__env->startSection('content'); ?>
<?php if($errors->has('code')): ?>
<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e($errors->first('code')); ?></div>
<?php endif; ?>
<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>

<section>
    <div class="container-fluid">
        <button class="btn btn-info" data-toggle="modal" data-target="#createModal"><i class="dripicons-plus"></i> Add Tream Item</button>&nbsp;
        
    </div>
    <div class="table-responsive">
        <table id="expense_category-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(trans('file.name')); ?></th>
                    <th><?php echo e(trans('Item Code')); ?></th>
                    <th><?php echo e(trans('Description')); ?></th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $lim_treams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-id="<?php echo e($item->id); ?>">
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e($item->trimming); ?></td>
                        <td><?php echo e($item->code); ?></td>
                        <td><?php echo e($item->description); ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">


                                    <li>
                                         <button type="button" data-id="<?php echo e($item->id); ?>" class="editModal btn btn-link"><i class="dripicons-document-edit"></i> Edit</button>
                                    </li>
                                    <li class="divider"></li>
                                    <?php echo e(Form::open(['route' => ['treams.destroy', $item->id], 'method' => 'DELETE'] )); ?>

                                    <li>
                                        <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></button>
                                    </li>
                                    <?php echo Form::close(); ?>

                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</section>

<div id="createModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <?php echo Form::open(['route' => 'treams.store', 'method' => 'post', 'files' => true]); ?>

        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">Add Payment Term</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
        </div>
        <div class="modal-body">
          <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
            <div class="form-group">
                <label><?php echo e(trans('Payment Term')); ?> *</label>
                <?php echo e(Form::text('payment_term',null,array('required' => 'required', 'class' => 'form-control', 'placeholder' => 'Type payment term name...'))); ?>

            </div>
            <input type="hidden" name="is_active" value="1">
            <div class="form-group">
              <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
            </div>
        </div>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
</div>

<div id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <?php echo Form::open(['route' => 'treams.store', 'method' => 'post', 'files' => true]); ?>

        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title">Add Trimming Item</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
        </div>
        <div class="modal-body">
            <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo e(trans('Trimming')); ?> *</label>
                        <?php echo e(Form::text('trimming',null,array('required' => 'required', 'class' => 'form-control', 'placeholder' => 'Type trimming item name...'))); ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><?php echo e(trans('Item Code')); ?> *</label>
                        <?php echo e(Form::text('code',null,array('class' => 'form-control', 'placeholder' => 'Type item codee...'))); ?>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label><?php echo e(trans('Description')); ?> *</label>
                        <?php echo e(Form::text('description',null,array('class' => 'form-control', 'placeholder' => 'Type item description...'))); ?>

                    </div>
                </div>
            </div>

            <input type="hidden" name="is_active" value="1">
            <div class="form-group">
              <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
            </div>
        </div>
        <?php echo e(Form::close()); ?>

      </div>
    </div>
</div>


<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog">
    <div class="modal-content">
        <?php echo e(Form::open(['route' => ['treams.update', 1], 'method' => 'PUT', 'files' => true] )); ?>

      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title"> <?php echo e(trans('Update Payment Term')); ?></h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
      </div>
      <div class="modal-body">
        <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(trans('Trimming')); ?> *</label>
                    <?php echo e(Form::text('trimming',null,array('required' => 'required','id'=>'edit_trimming', 'class' => 'form-control', 'placeholder' => 'Type trimming item name...'))); ?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo e(trans('Item Code')); ?> *</label>
                    <?php echo e(Form::text('code',null,array('class' => 'form-control', 'placeholder' => 'Type item codee...'))); ?>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label><?php echo e(trans('Description')); ?> *</label>
                    <?php echo e(Form::text('description',null,array('class' => 'form-control', 'placeholder' => 'Type item description...'))); ?>

                </div>
            </div>
        </div>

        <input type="hidden" name="tream_id">
        <div class="form-group">
          <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

  </div>
</div>


<script type="text/javascript">

    $("ul#items").siblings('a').attr('aria-expanded','true');
    $("ul#items").addClass("show");
    $("ul#items #trimming-list").addClass("active");

    var income_source_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.editModal').on('click', function() {
       var id = $(this).closest('tr').attr('data-id');
        $.get('treams/' + id +'/edit', function (data) {
            $('#editModal').modal('show');
            $("#editModal input[name='trimming']").val(data.trimming);
            $("#editModal input[name='code']").val(data['code']);
            $("#editModal input[name='description']").val(data['description']);
            $("#editModal input[name='tream_id']").val(data['id']);
        });
    });


    function confirmDelete() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        }
        return false;
    }

    $('#expense_category-table').DataTable( {
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
                'targets': [0, 4]
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
                title: 'Trimming List',
                text: '<?php echo e(trans("file.PDF")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
                customize: function(doc) {
                    for (var i = 1; i < doc.content[1].table.body.length; i++) {
                        if (doc.content[1].table.body[i][0].text.indexOf('<img src=') !== -1) {
                            var imagehtml = doc.content[1].table.body[i][0].text;
                            var regex = /<img.*?src=['"](.*?)['"]/;
                            var src = regex.exec(imagehtml)[1];
                            var tempImage = new Image();
                            tempImage.src = src;
                            var canvas = document.createElement("canvas");
                            canvas.width = tempImage.width;
                            canvas.height = tempImage.height;
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(tempImage, 0, 0);
                            var imagedata = canvas.toDataURL("image/png");
                            delete doc.content[1].table.body[i][0].text;
                            doc.content[1].table.body[i][0].image = imagedata;
                            doc.content[1].table.body[i][0].fit = [30, 30];
                        }
                    }
                },
            },
            {
                extend: 'csv',
                title: 'Trimming List',
                text: '<?php echo e(trans("file.CSV")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    format: {
                        body: function ( data, row, column, node ) {
                            if (column === 0 && (data.indexOf('<img src=') !== -1)) {
                                var regex = /<img.*?src=['"](.*?)['"]/;
                                data = regex.exec(data)[1];
                            }
                            return data;
                        }
                    }
                },
            },
            {
                extend: 'print',
                title: 'Trimming List',
                text: '<?php echo e(trans("file.Print")); ?>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
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
                   // if(user_verified == '1') {
                        income_source_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                income_source_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(income_source_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'expense_categories/deletebyselection',
                                data:{
                                    expense_categoryIdArray: income_source_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!income_source_id.length)
                            alert('No expense category is selected!');
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\wingking-fasion\resources\views/trimming/index.blade.php ENDPATH**/ ?>