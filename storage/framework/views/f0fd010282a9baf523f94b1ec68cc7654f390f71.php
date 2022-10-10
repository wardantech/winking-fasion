 <?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
<?php endif; ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>

<section>
    <div class="container-fluid">
        <button class="btn btn-info" data-toggle="modal" data-target="#income-modal"><i class="dripicons-plus"></i> Add Income </button>
    </div>
    <div class="table-responsive">
        <table id="expense-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(trans('file.Date')); ?></th>
                    <th><?php echo e(trans('Source')); ?></th>
                    <th><?php echo e(trans('Income Date')); ?></th>
                    <th><?php echo e(trans('file.Amount')); ?> (BDT)</th>
                    <th><?php echo e(trans('file.Note')); ?></th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $lims_income_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $warehouse = DB::table('warehouses')->find($income->warehouse_id);
                    $source = DB::table('income_sources')->find($income->income_source_id);
                ?>
                <tr data-id="<?php echo e($income->id); ?>">
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e(date('d-M-Y', strtotime($income->created_at->toDateString()))); ?></td>
                    <td><?php echo e($source->name); ?></td>
                    <td><?php echo e(date('d-M-Y', strtotime($income->income_date))); ?></td>
                    <td><?php echo e(number_format((float)$income->amount, 2, '.', '')); ?></td>
                    <td><?php echo e($income->note); ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(trans('file.action')); ?>

                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">

                                <!--<li><button type="button" data-id="<?php echo e($income->id); ?>" class="open-EditincomeDialog btn btn-link" data-toggle="modal" data-target="#editModal"><i class="dripicons-document-edit"></i> <?php echo e(trans('file.edit')); ?></button></li>-->
                                <li>
                                    <button type="button" data-id="<?php echo e($income->id); ?>" class="editModal btn btn-link"><i class="dripicons-document-edit"></i> Edit</button>
                                </li>

                                <li class="divider"></li>
                                <?php echo e(Form::open(['route' => ['incomes.destroy', $income->id], 'method' => 'DELETE'] )); ?>

                                <li>
                                    <button type="submit" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> <?php echo e(trans('file.delete')); ?></button>
                                </li>

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
            </tfoot>
        </table>
    </div>
</section>

<div id="editModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Update Income</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
              <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
              <?php echo Form::open(['route' => ['incomes.update', 1], 'method' => 'put']); ?>

                <?php
                    $lims_income_source_list = DB::table('income_sources')->where('is_active', true)->get();
                    if(Auth::user()->role_id > 2)
                        $lims_warehouse_list = DB::table('warehouses')->where([
                          ['is_active', true],
                          ['id', Auth::user()->warehouse_id]
                        ])->get();
                      else
                        $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                ?>
                  <div class="form-group">
                      <input type="hidden" name="income_id">
                      <label><?php echo e(trans('file.reference')); ?></label>
                      <p id="reference"><?php echo e('er-' . date("Ymd") . '-'. date("his")); ?></p>
                  </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Expense Category')); ?> *</label>
                            <select name="income_source_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Income Source...">
                                <?php $__currentLoopData = $lims_income_source_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income_source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($income_source->id); ?>"><?php echo e($income_source->name . ' (' . $income_source->code. ')'); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Warehouse')); ?> *</label>
                            <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                                <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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

<div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Update Income</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
              <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                <?php echo Form::open(['route' => ['incomes.update',1], 'method' => 'put']); ?>

                <?php
                  $lims_income_source_list = DB::table('income_sources')->where('is_active', true)->get();
                  if(Auth::user()->role_id > 2)
                    $lims_warehouse_list = DB::table('warehouses')->where([
                      ['is_active', true],
                      ['id', Auth::user()->warehouse_id]
                    ])->get();
                  else
                    $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                    $lims_account_list = \App\Account::where('is_active', true)->get();

                ?>
                    <div class="form-group">
                        <input type="hidden" name="income_id">
                        <label><?php echo e(trans('file.reference')); ?></label>
                        <p id="reference"><?php echo e('er-' . date("Ymd") . '-'. date("his")); ?></p>
                    </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Income Source *</label>
                        <select name="income_source_id" id="edit_income_source_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Income Source...">
                            <?php $__currentLoopData = $lims_income_source_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income_source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($income_source->id); ?>"><?php echo e($income_source->name . ' (' . $income_source->code. ')'); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><?php echo e(trans('Income Date')); ?> *</label>
                        <input type="text" name="income_date" required class="datepicker form-control">
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

    $("ul#income").siblings('a').attr('aria-expanded','true');
    $("ul#income").addClass("show");
    $("ul#income #income-list-menu").addClass("active");

    var income_source_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(document).ready(function() {
    //     $('.open-EditincomeDialog').on('click', function() {
    //         var url = "incomes/"
    //         var id = $(this).data('id').toString();
    //         url = url.concat(id).concat("/edit");
    //         $.get(url, function(data) {
    //             $('#editModal #reference').text(data['reference_no']);
    //             $("#editModal select[name='warehouse_id']").val(data['warehouse_id']);
    //             $("#editModal select[name='income_source_id']").val(data['income_source_id']);
    //             $("#editModal select[name='account_id']").val(data['account_id']);
    //             $("#editModal input[name='amount']").val(data['amount']);
    //             $("#editModal input[name='income_id']").val(data['id']);
    //             $("#editModal textarea[name='note']").val(data['note']);
    //             $("#editModal input[name='income_date']").val(data['income_date']);
    //             $('.selectpicker').selectpicker('refresh');
    //         });
    //     });
    // });

    $(".editModal").on("click",function(){
        var id = $(this).closest('tr').attr('data-id');
        $.get('incomes/' + id +'/edit', function (data) {
            console.log(data);
            $('#editModal').modal('show');
                $('#editModal #reference').text(data['reference_no']);
                $("#edit_income_source_id").val(data['warehouse_id']);
                $("#editModal select[name='income_source_id']").val(data['income_source_id']);
                $("#editModal select[name='account_id']").val(data['account_id']);
                $("#editModal input[name='amount']").val(data['amount']);
                $("#editModal input[name='income_id']").val(data['id']);
                $("#editModal textarea[name='note']").val(data['note']);
                $("#editModal input[name='income_date']").val( moment(data['income_date']).format('D - MMM - YYYY'));
                //$("#editModal input[name='income_date']").val(data['income_date']);
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
                'targets': [0, 3]
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
                title: 'Income List',
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
                footer:true,
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
                title: 'Income List',
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
                action: function(e, dt, button, config) {
                    datatable_sum(dt, true);
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                    datatable_sum(dt, false);
                },
                footer:true
            },
            {
                extend: 'print',
                title: 'Income List',
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
        drawCallback: function () {
            var api = this.api();
            console.log(api);
            datatable_sum(api, false);
        }
    } );
    function datatable_sum(dt_selector, is_calling_first) {
        if (dt_selector.rows( '.selected' ).any() && is_calling_first) {
            var rows = dt_selector.rows( '.selected' ).indexes();
            $( dt_selector.column( 4 ).footer() ).html(dt_selector.cells( rows, 4, { page: 'current' } ).data().sum().toFixed(2));
        }
        else {
            $( dt_selector.column( 4 ).footer() ).html(dt_selector.cells( rows, 4, { page: 'current' } ).data().sum().toFixed(2));
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\wingking-fasion\resources\views/income/index.blade.php ENDPATH**/ ?>