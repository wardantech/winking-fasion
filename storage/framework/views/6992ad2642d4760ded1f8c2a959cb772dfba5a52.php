<?php $__env->startSection('content'); ?>
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4><?php echo e(trans('file.Group Permission')); ?></h4>
                    </div>
                    <?php echo Form::open(['route' => 'role.setPermission', 'method' => 'post']); ?>

                    <div class="card-body">
                    	<input type="hidden" name="role_id" value="<?php echo e($lims_role_data->id); ?>" />
						<div class="table-responsive">
						    <table class="table table-bordered permission-table">
						        <thead>
						        <tr>
						            <th colspan="5" class="text-center"><?php echo e($lims_role_data->name); ?> <?php echo e(trans('file.Group Permission')); ?></th>
						        </tr>
						        <tr>
						            <th rowspan="2" class="text-center">Module Name</th>
						            <th colspan="4" class="text-center">
						            	<div class="checkbox">
						            		<input type="checkbox" id="select_all">
						            		<label for="select_all"><?php echo e(trans('file.Permissions')); ?></label>
						            	</div>
						            </th>
						        </tr>
						        <tr>
						            <th class="text-center"><?php echo e(trans('file.View')); ?></th>
						            <th class="text-center"><?php echo e(trans('file.add')); ?></th>
						            <th class="text-center"><?php echo e(trans('file.edit')); ?></th>
						            <th class="text-center"><?php echo e(trans('file.delete')); ?></th>
						        </tr>
						        </thead>
						        <tbody>
						        
						        <tr>
						            <td><?php echo e(trans('Purchase Contract')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("purchase-contract-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="purchase-contract-index" name="purchase-contract-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="purchase-contract-index" name="purchase-contract-index">
								                <?php endif; ?>
								                <label for="purchase-contract-index"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("purchase-contract-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="purchase-contract-add" name="purchase-contract-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="purchase-contract-add" name="purchase-contract-add">
								                <?php endif; ?>
								                <label for="purchase-contract-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("purchase-contract-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="purchase-contract-edit" name="purchase-contract-edit" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="purchase-contract-edit" name="purchase-contract-edit">
								                <?php endif; ?>
								                <label for="purchase-contract-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("purchase-contract-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="purchase-contract-delete" name="purchase-contract-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="purchase-contract-delete" name="purchase-contract-delete">
								                <?php endif; ?>
								                <label for="purchase-contract-delete"></label>
							            	</div>
						            	</div>
						            </td>
						        </tr>
						        
						        <tr>
						            <td><?php echo e(trans('Cost Sheet')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-sheet-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-sheet-index" name="cost-sheet-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-sheet-index" name="cost-sheet-index">
								                <?php endif; ?>
								                <label for="cost-sheet-index"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-sheet-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-sheet-add" name="cost-sheet-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-sheet-add" name="cost-sheet-add">
								                <?php endif; ?>
								                <label for="cost-sheet-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-sheet-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-sheet-edit" name="cost-sheet-edit" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-sheet-edit" name="cost-sheet-edit">
								                <?php endif; ?>
								                <label for="cost-sheet-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-sheet-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-sheet-delete" name="cost-sheet-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-sheet-delete" name="cost-sheet-delete">
								                <?php endif; ?>
								                <label for="cost-sheet-delete"></label>
							            	</div>
						            	</div>
						            </td>
						        </tr>
						        
						        <tr>
						            <td><?php echo e(trans('PO')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("po-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="po-index" name="po-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="po-index" name="po-index">
								                <?php endif; ?>
								                <label for="po-index"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("po-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="po-add" name="po-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="po-add" name="po-add">
								                <?php endif; ?>
								                <label for="po-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("po-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="po-edit" name="po-edit" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="po-edit" name="po-edit">
								                <?php endif; ?>
								                <label for="po-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("po-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="po-delete" name="po-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="po-delete" name="po-delete">
								                <?php endif; ?>
								                <label for="po-delete"></label>
							            	</div>
						            	</div>
						            </td>
						        </tr>
						        
						        <tr>
						            <td><?php echo e(trans('Cost Breakdown')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-breakdown-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-breakdown-index" name="cost-breakdown-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-breakdown-index" name="cost-breakdown-index">
								                <?php endif; ?>
								                <label for="cost-breakdown-index"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-breakdown-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-breakdown-add" name="cost-breakdown-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-breakdown-add" name="cost-breakdown-add">
								                <?php endif; ?>
								                <label for="cost-breakdown-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-breakdown-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-breakdown-edit" name="cost-breakdown-edit" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-breakdown-edit" name="cost-breakdown-edit">
								                <?php endif; ?>
								                <label for="cost-breakdown-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("cost-breakdown-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="cost-breakdown" name="cost-breakdown-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="cost-breakdown-delete" name="cost-breakdown-delete">
								                <?php endif; ?>
								                <label for="cost-breakdown-delete"></label>
							            	</div>
						            	</div>
						            </td>
						        </tr>
						        
						        <tr>
						            <td><?php echo e(trans('Proforma Invoice')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("proforma-invoice-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="proforma-invoice-index" name="proforma-invoice-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="proforma-invoice-index" name="proforma-invoice-index">
								                <?php endif; ?>
								                <label for="proforma-invoice-index"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("proforma-invoice-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="proforma-invoice-add" name="proforma-invoice-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="proforma-invoice-add" name="proforma-invoice-add">
								                <?php endif; ?>
								                <label for="proforma-invoice-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("proforma-invoice-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="proforma-invoice-edit" name="proforma-invoice-edit" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="proforma-invoice-edit" name="proforma-invoice-edit">
								                <?php endif; ?>
								                <label for="proforma-invoice-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("proforma-invoice-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="proforma-invoice-delete" name="proforma-invoice-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="proforma-invoice-delete" name="proforma-invoice-delete">
								                <?php endif; ?>
								                <label for="proforma-invoice-delete"></label>
							            	</div>
						            	</div>
						            </td>
						        </tr>
						        
						        <tr>
						            <td><?php echo e(trans('file.Expense')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-index" name="expenses-index" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-index" name="expenses-index">
								                <?php endif; ?>
								                <label for="expenses-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-add" name="expenses-add" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-add" name="expenses-add">
								                <?php endif; ?>
								                <label for="expenses-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-edit" name="expenses-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-edit" name="expenses-edit">
								                <?php endif; ?>
								                <label for="expenses-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("expenses-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="expenses-delete" name="expenses-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="expenses-delete" name="expenses-delete">
								                <?php endif; ?>
								                <label for="expenses-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						        
						        <tr>
						            <td><?php echo e(trans('Export')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("export-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="export-index" name="export-index" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="export-index" name="export-index">
								                <?php endif; ?>
								                <label for="export-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("export-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="export-add" name="export-add" checked />
								                <?php else: ?>
								                <input type="checkbox" value="1" id="export-add" name="export-add">
								                <?php endif; ?>
								                <label for="export-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("export-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="export-edit" name="export-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="export-edit" name="export-edit">
								                <?php endif; ?>
								                <label for="export-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("export-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="export-delete" name="export-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="export-delete" name="export-delete">
								                <?php endif; ?>
								                <label for="export-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>

						        <tr>
						            <td><?php echo e(trans('file.Employee')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-index" name="employees-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-index" name="employees-index">
								                <?php endif; ?>
								                <label for="employees-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-add" name="employees-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-add" name="employees-add">
								                <?php endif; ?>
								                <label for="employees-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-edit" name="employees-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-edit" name="employees-edit">
								                <?php endif; ?>
								                <label for="employees-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("employees-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="employees-delete" name="employees-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="employees-delete" name="employees-delete">
								                <?php endif; ?>
								                <label for="employees-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						        <tr>
						            <td><?php echo e(trans('file.User')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-index" name="users-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-index" name="users-index">
								                <?php endif; ?>
								                <label for="users-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-add" name="users-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-add" name="users-add">
								                <?php endif; ?>
								                <label for="users-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-edit" name="users-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-edit" name="users-edit">
								                <?php endif; ?>
								                <label for="users-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("users-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="users-delete" name="users-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="users-delete" name="users-delete">
								                <?php endif; ?>
								                <label for="users-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						        <tr>
						            <td><?php echo e(trans('file.customer')); ?></td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-index", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-index" name="customers-index" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-index" name="customers-index">
								                <?php endif; ?>
								                <label for="customers-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-add", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-add" name="customers-add" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-add" name="customers-add">
								                <?php endif; ?>
								                <label for="customers-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-edit", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-edit" name="customers-edit" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-edit" name="customers-edit">
								                <?php endif; ?>
								                <label for="customers-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                <?php if(in_array("customers-delete", $all_permission)): ?>
								                <input type="checkbox" value="1" id="customers-delete" name="customers-delete" checked>
								                <?php else: ?>
								                <input type="checkbox" value="1" id="customers-delete" name="customers-delete">
								                <?php endif; ?>
								                <label for="customers-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>


						        <tr>
						            <td><?php echo e(trans('file.Accounting')); ?></td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("account-index", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="account-index" name="account-index" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="account-index" name="account-index">
							                    	<?php endif; ?>
								                    <label for="account-index" class="padding05"><?php echo e(trans('file.Account')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("money-transfer", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="money-transfer" name="money-transfer" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="money-transfer" name="money-transfer">
							                    	<?php endif; ?>
								                    <label for="money-transfer" class="padding05"><?php echo e(trans('file.Money Transfer')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("balance-sheet", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="balance-sheet" name="balance-sheet" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="balance-sheet" name="balance-sheet">
							                    	<?php endif; ?>
								                    <label for="balance-sheet" class="padding05"><?php echo e(trans('file.Balance Sheet')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	<?php if(in_array("account-statement", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="account-statement-permission" name="account-statement" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="account-statement-permission" name="account-statement">
							                    	<?php endif; ?>
								                    <label for="account-statement-permission" class="padding05"><?php echo e(trans('file.Account Statement')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	<?php if(in_array("account-deposit", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="account-deposit-permission" name="account-deposit" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="account-deposit-permission" name="account-deposit">
							                    	<?php endif; ?>
								                    <label for="account-deposit-permission" class="padding05"><?php echo e(trans('Account Deposit')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	<?php if(in_array("account-withdraw", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="account-withdraw-permission" name="account-withdraw" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="account-withdraw-permission" name="account-withdraw">
							                    	<?php endif; ?>
								                    <label for="account-withdraw-permission" class="padding05"><?php echo e(trans('Account Withdraw')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr>
						        
						        
						        <tr>
						            <td>HRM</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("department", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="department" name="department" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="department" name="department">
							                    	<?php endif; ?>
								                    <label for="department" class="padding05"><?php echo e(trans('file.Department')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("attendance", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="attendance" name="attendance" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="attendance" name="attendance">
							                    	<?php endif; ?>
								                    <label for="attendance" class="padding05"><?php echo e(trans('file.Attendance')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("payroll", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="payroll" name="payroll" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="payroll" name="payroll">
							                    	<?php endif; ?>
								                    <label for="payroll" class="padding05"><?php echo e(trans('file.Payroll')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr>
						        
						        <tr>
						            <td>Income</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("income-source", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="income-source" name="income-source" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="income-source" name="income-source">
							                    	<?php endif; ?>
								                    <label for="income-source" class="padding05"><?php echo e(trans('Income Source')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("income-list", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="income-list" name="income-list" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="income-list" name="income-list">
							                    	<?php endif; ?>
								                    <label for="income-list" class="padding05"><?php echo e(trans('Income List')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                
						            </td>
						        </tr>
						        
						        <tr>
						            <td>Trimming Item</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("trimming-index", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="trimming-index" name="trimming-index" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="trimming-index" name="trimming-index">
							                    	<?php endif; ?>
								                    <label for="trimming-index" class="padding05"><?php echo e(trans('Trimming')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr>
						        
						  
						        <tr>
						            <td><?php echo e(trans('file.settings')); ?></td>
						            <td class="report-permissions" colspan="5">
						            	
                                        <span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("interest", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="interest" name="interest" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="interest" name="interest">
							                    	<?php endif; ?>
								                    <label for="interest" class="padding05">Interest &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("general_setting", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="general_setting" name="general_setting" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="general_setting" name="general_setting">
							                    	<?php endif; ?>
								                    <label for="general_setting" class="padding05"><?php echo e(trans('file.General Setting')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	<?php if(in_array("uesr-profile", $all_permission)): ?>
							                    	<input type="checkbox" value="1" id="uesr-profile" name="uesr-profile" checked>
							                    	<?php else: ?>
							                    	<input type="checkbox" value="1" id="uesr-profile" name="uesr-profile">
							                    	<?php endif; ?>
								                    <label for="uesr-profile" class="padding05"><?php echo e(trans('User Profile')); ?> &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                
						            </td>
						        </tr>
						        </tbody>
						    </table>
						</div>
						<div class="form-group">
	                        <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
	                    </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

	$("ul#setting").siblings('a').attr('aria-expanded','true');
    $("ul#setting").addClass("show");
    $("ul#setting #role-menu").addClass("active");

	$("#select_all").on( "change", function() {
	    if ($(this).is(':checked')) {
	        $("tbody input[type='checkbox']").prop('checked', true);
	    }
	    else {
	        $("tbody input[type='checkbox']").prop('checked', false);
	    }
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\wingking-fasion\resources\views/role/permission.blade.php ENDPATH**/ ?>