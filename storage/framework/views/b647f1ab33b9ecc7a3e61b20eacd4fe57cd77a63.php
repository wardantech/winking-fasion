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
                        <h4>Add Purchase Order</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                        <?php echo Form::open(['route' => ['purchase_order.update',$lim_order_data->id], 'method' => 'put', 'files' => true, 'id' => 'purchase-form']); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PO Number</label>
                                            <input type="text" name="po_number" class="form-control" value="<?php echo e($lim_order_data->po_number); ?>">
                                            <?php if($errors->has('po_number')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('po_number')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Revised</label>
                                            <input type="text" name="rivision_no" class="datepicker form-control" value="<?php echo e(date('d-M-Y',strtotime($lim_order_data->rivision_no))); ?>">
                                            <?php if($errors->has('rivision_no')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('rivision_no')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Shipper/Vendor *</label>
                                            <select required name="vendor" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select vendor or shipper...">
                                                  <?php $__currentLoopData = $lims_vendor_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <option value="<?php echo e($vendor->id); ?>" <?php echo($vendor->id == $lim_order_data->vendor )? 'selected':'' ?>><?php echo e($vendor->name); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label>LC/SC No</label>-->
                                    <!--        <input type="text" name="lc_no" class="form-control" required value=<?php echo e($lim_order_data->lc_no); ?> >-->
                                    <!--        <?php if($errors->has('lc_no')): ?>-->
                                    <!--            <span class="text-danger">-->
                                    <!--                <?php echo e($errors->first('lc_no')); ?>-->
                                    <!--            </span>-->
                                    <!--        <?php endif; ?>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ship To*</label>
                                            <select name="ship_to" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select ship to...">
                                                <?php $__currentLoopData = $lims_ship_to_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <option value="<?php echo e($ship->id); ?>" <?php echo($ship->id == $lim_order_data->ship_to )? 'selected':'' ?>><?php echo e($ship->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('ship_to')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('ship_to')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Customer*</label>
                                            <select name="customer_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select customer...">
                                                <?php $__currentLoopData = $lims_customer_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <option value="<?php echo e($customer->id); ?>" <?php echo($customer->id == $lim_order_data->customer_id )? 'selected':'' ?>><?php echo e($customer->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('customer_id')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('customer_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>Invoice To*</label>
                                                <select name="invoice_to" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select invoice to..." required>
                                                    <?php $__currentLoopData = $lims_invoice_to_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($invoice->id); ?>" <?php echo($invoice->id == $lim_order_data->invoice_to )? 'selected':'' ?>><?php echo e($invoice->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('invoice_to')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('invoice_to')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Season*</label>
                                            <input type="text" name="season" class="form-control" value="<?php echo e($lim_order_data->season); ?>" required>
                                            <?php if($errors->has('season')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('season')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Order Date*</label>
                                            <input type="text" name="order_date" class="datepicker form-control" value="<?php echo e(date('d-M-Y',strtotime($lim_order_data->order_date))); ?>" required>
                                            <?php if($errors->has('order_date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('order_date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label>Cancel date</label>-->
                                    <!--        <input type="date" name="cancel_date" class="form-control" value=<?php echo e($lim_order_data->cancel_date); ?> required>-->
                                    <!--        <?php if($errors->has('cancel_date')): ?>-->
                                    <!--            <span class="text-danger">-->
                                    <!--               <?php echo e($errors->first('cancel_date')); ?>-->
                                    <!--            </span>-->
                                    <!--        <?php endif; ?>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>X-Country Date*</label>
                                            <input type="text" name="ship_exp_date" class="datepicker form-control" value="<?php echo e(date('d-M-Y',strtotime($lim_order_data->ship_exp_date))); ?>" required>
                                            <?php if($errors->has('ship_exp_date')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('ship_exp_date')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Terms*</label>
                                            <input type="text" name="ship_terms" class="form-control" value="<?php echo e($lim_order_data->ship_terms); ?>" required>
                                            <?php if($errors->has('ship_terms')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('ship_terms')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Payment / Draft at*</label>
                                            <input type="text" name="payment_terms" class="form-control" value="<?php echo e($lim_order_data->payment_terms); ?>" required>
                                            <?php if($errors->has('payment_terms')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('payment_terms')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Fabric Ref*</label>
                                            <input type="text" name="febric_ref" class="form-control" value="<?php echo e($lim_order_data->febric_ref); ?>" required>
                                            <?php if($errors->has('febric_ref')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('febric_ref')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Brand/Label*</label>
                                            <input type="text" name="brand" class="form-control" value="<?php echo e($lim_order_data->brand); ?>">
                                            <?php if($errors->has('brand')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('brand')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ship Via*</label>
                                            <input type="text" name="ship_via" class="form-control" value="<?php echo e($lim_order_data->ship_via); ?>">
                                            <?php if($errors->has('ship_via')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('ship_via')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Style No*</label>
                                            <input type="text" name="style_no" class="form-control" required value="<?php echo e($lim_order_data->style_no); ?>">
                                            <?php if($errors->has('style_no')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('style_no')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CA/RN*</label>
                                            <input type="text" name="ca" class="form-control" value="<?php echo e($lim_order_data->ca); ?>" required>
                                            <?php if($errors->has('ca')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('ca')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Quantity*</label>
                                            <input type="text" id="total_quantity" name="total_quantity" id="total_quantity" value="<?php echo e($lim_order_data->total_quantity); ?>" class="form-control total_quantity" required readonly>
                                            <?php if($errors->has('total_quantity')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('total_quantity')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total Amount*</label>
                                            <input type="text" id="total_amount" name="total_amount" value="<?php echo e($lim_order_data->total_amount); ?>" class="form-control total_amount" required readonly>
                                            <?php if($errors->has('amount')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('amount')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Item Description*</label>
                                            <input type="text" name="description" class="form-control" id="description" value="<?php echo e($lim_order_data->description); ?>">
                                            <?php if($errors->has('description')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('description')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fabrication*</label>
                                            <input type="text" name="fabrication" class="form-control" id="description" value="<?php echo e($lim_order_data->fabrication); ?>">
                                            <?php if($errors->has('fabrication')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('fabrication')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Special Instruction*</label>
                                            <textarea name="instruction_notes" class="form-control" id="ins_notes" rows="5"><?php echo $lim_order_data->instruction_notes; ?></textarea>
                                            <?php if($errors->has('ins_notes')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('ins_notes')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Packing Instruction*</label>
                                            <textarea name="packing_instruction" class="form-control" id="packing_instruction" rows="5"><?php echo $lim_order_data->packing_instruction; ?></textarea>
                                            <?php if($errors->has('packing_instruction')): ?>
                                                <span class="text-danger">
                                                   <?php echo e($errors->first('packing_instruction')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="break_down">
                                    <label>BREAK DOOWN</label>
                                    
                                </div>


                            <div class="color_box">
                            <?php $__currentLoopData = $lim_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-md-12" style="margin:30px 0px;">
                                        <table id="colorSection" width="100%">
                                             <thead>
                                                 <tr>
                                                     <?php if($key == 0): ?>
                                                         <th>Color Name <a id="add_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">+</a></th>
                                                     <?php else: ?>
                                                         <th>Color Name <a id="remove_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">-</a></th>
                                                     <?php endif; ?>
                                                     <th>Code</th>
                                                     <th>Quantity</th>
                                                     <th>Unit Price</th>
                                                     <th>Sub Total</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <tr>
                                                     <td><input type="text" name="color[]" class="form-control" value="<?php echo e($value->color); ?>"></td>
                                                     <td><input type="text" name="color_code[]" class="form-control" value="<?php echo e($value->color_code); ?>"></td>
                                                     <td><input type="number" min="0" step="any" name="color_wise_quantity[]" value="<?php echo e($value->color_wise_quantity); ?>" id="color_wise_quantity<?php echo e($key+1); ?>" class="form-control color_wise_quantity<?php echo e($key+1); ?>" readonly></td>
                                                     <td><input type="number" min="0" step="any" name="color_unit_price[]" id="color_unit_price<?php echo e($key+1); ?>" value="<?php echo e($value->color_unit_price); ?>" class="form-control color_unit_price<?php echo e($key+1); ?>"></td>
                                                     <td><input type="number" min="0" step="any" name="sub_total[]" id="sub_total<?php echo e($key+1); ?>" value="<?php echo e($value->sub_total); ?>" class="form-control sub_total<?php echo e($key+1); ?>" readonly></td>
                                                 </tr>
                                             </tbody>
                                        </table>

                                        <table id="sizeSection" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Size</th>
                                                    <th>Prepack</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="size1[]" class="form-control" value="<?php echo e($value->size1); ?>"></td>
                                                    <td><input type="text" name="prepack1[]" class="form-control" value="<?php echo e($value->prepack1); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity1[]" value="<?php echo e($value->quantity1); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size2[]" class="form-control" value="<?php echo e($value->size2); ?>"></td>
                                                    <td><input type="text" name="prepack2[]" class="form-control" value="<?php echo e($value->prepack2); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity2[]" value="<?php echo e($value->quantity2); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size3[]" class="form-control" value="<?php echo e($value->size3); ?>"></td>
                                                    <td><input type="text" name="prepack3[]" class="form-control" value="<?php echo e($value->prepack3); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity3[]" value="<?php echo e($value->quantity3); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size4[]" class="form-control" value="<?php echo e($value->size4); ?>"></td>
                                                    <td><input type="text" name="prepack4[]" class="form-control" value="<?php echo e($value->prepack4); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity4[]" value="<?php echo e($value->quantity4); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size5[]" class="form-control" value="<?php echo e($value->size5); ?>"></td>
                                                    <td><input type="text" name="prepack5[]" class="form-control" value="<?php echo e($value->prepack5); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity5[]" value="<?php echo e($value->quantity5); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size6[]" class="form-control" value="<?php echo e($value->size6); ?>"></td>
                                                    <td><input type="text" name="prepack6[]" class="form-control" value="<?php echo e($value->prepack6); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity6[]" value="<?php echo e($value->quantity6); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size7[]" class="form-control" value="<?php echo e($value->size7); ?>"></td>
                                                    <td><input type="text" name="prepack7[]" class="form-control" value="<?php echo e($value->prepack7); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity7[]" value="<?php echo e($value->quantity7); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size8[]" class="form-control" value="<?php echo e($value->size8); ?>"></td>
                                                    <td><input type="text" name="prepack8[]" class="form-control" value="<?php echo e($value->prepack8); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity8[]" value="<?php echo e($value->quantity8); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size9[]" class="form-control" value="<?php echo e($value->size9); ?>"></td>
                                                    <td><input type="text" name="prepack9[]" class="form-control" value="<?php echo e($value->prepack9); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity9[]" value="<?php echo e($value->quantity9); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size10[]" class="form-control" value="<?php echo e($value->size10); ?>"></td>
                                                    <td><input type="text" name="prepack10[]" class="form-control" value="<?php echo e($value->prepack10); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity10[]" value="<?php echo e($value->quantity10); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size11[]" class="form-control" value="<?php echo e($value->size11); ?>"></td>
                                                    <td><input type="text" name="prepack11[]" class="form-control" value="<?php echo e($value->prepack11); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity11[]" value="<?php echo e($value->quantity11); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size12[]" class="form-control" value="<?php echo e($value->size12); ?>"></td>
                                                    <td><input type="text" name="prepack12[]" class="form-control" value="<?php echo e($value->prepack12); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity12[]" value="<?php echo e($value->quantity12); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="size13[]" class="form-control" value="<?php echo e($value->size13); ?>"></td>
                                                    <td><input type="text" name="prepack13[]" class="form-control" value="<?php echo e($value->prepack13); ?>"></td>
                                                    <td><input type="number" min="0" step="any" name="quantity13[]" value="<?php echo e($value->quantity13); ?>" id="quantity<?php echo e($key+1); ?>" class="form-control quantity<?php echo e($key+1); ?>"></td>
                                                </tr>
                                            </tbody>
                                       </table>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="submit-btn"><?php echo e(trans('file.submit')); ?></button>
                            </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">

    $("ul#order-summary").siblings('a').attr('aria-expanded','true');
    $("ul#order-summary").addClass("show");
    $("ul#order-summary #purchase-order-menu-list").addClass("active");


    $(document).ready(function(){
        var max_field = 4;
        var wrapper = $(".color_box");
        var x = '<?php $lim_details->count() ?>';
        $("#add_size").click(function(){
            if(x < max_field){
                x++;
                $('#color_number').val(x);
                $(wrapper).append('<div class="row">\
                                    <div class="col-md-12" style="margin: 30px 0px;">\
                                        <table id="colorSection">\
                                             <thead>\
                                                 <tr>\
                                                     <th>Color Name <a id="remove_size" class="btn btn-danger btn-sm" style="color:white;margin-left:10px;">-</a></th>\
                                                     <th>Code</th>\
                                                     <th>Quantity</th>\
                                                     <th>Unit Price</th>\
                                                     <th>Total Price</th>\
                                                 </tr>\
                                             </thead>\
                                             <tbody>\
                                                 <tr>\
                                                     <td><input type="text" name="color[]" class="form-control"></td>\
                                                     <td><input type="text" name="color_code[]" class="form-control"></td>\
                                                     <td><input type="number" min="0" step="any" name="color_wise_quantity[]" value="0" id="color_wise_quantity'+x+'" class="form-control color_wise_quantity'+x+'" readonly></td>\
                                                     <td><input type="number" min="0" step="any" name="color_unit_price[]" id="color_unit_price'+x+'" class="form-control color_unit_price'+x+'"></td>\
                                                     <td><input type="number" min="0" step="any" name="sub_total[]" id="sub_total'+x+'" value="0.00" class="form-control sub_total'+x+'" readonly></td>\
                                                 </tr>\
                                             </tbody>\
                                        </table>\
                                        <table id="sizeSection" width="100%">\
                                            <thead>\
                                                <tr>\
                                                    <th>Size</th>\
                                                    <th>Prepack</th>\
                                                    <th>Quantity</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody>\
                                                <tr>\
                                                    <td><input type="text" name="size1[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack1[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity1[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size2[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack2[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity2[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size3[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack3[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity3[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size4[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack4[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity4[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size5[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack5[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity5[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size6[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack6[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity6[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size7[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack7[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity7[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size8[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack8[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity8[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size9[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack9[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity9[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size10[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack10[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity10[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size11[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack11[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity11[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size12[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack12[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity12[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                                <tr>\
                                                    <td><input type="text" name="size13[]" class="form-control"></td>\
                                                    <td><input type="text" name="prepack13[]" class="form-control"></td>\
                                                    <td><input type="number" min="0" step="any" name="quantity13[]" id="quantity'+x+'" class="form-control quantity'+x+'"></td>\
                                                </tr>\
                                            </tbody>\
                                       </table>\
                                    </div>\
                                </div>');
            }else{
                alert('you can not add more than 4 field');
            }
        });

    $(wrapper).on("click","#remove_size", function(e){ //user click on remove text
	     e.preventDefault();
	     $(this).parent('th').parent('tr').parent('thead').parent('table').parent('div').parent('div').remove(); x--;
         calculate_total_quantity();
         calculate_total_amount();
    });


    $(document).on('keyup change', '#quantity1', function() {
        var sum = 0;
        $(".quantity1").each(function(){
                sum += +$(this).val();
        });
        $('.color_wise_quantity1').val(sum);

        var quantity = $('.color_wise_quantity1').val();
        var unitprice = $('.color_unit_price1').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total1').val(total_price);

        calculate_total_quantity();
        calculate_total_amount();
    });

    $(document).on('keyup change', '#quantity2', function() {
        var sum = 0;
        $(".quantity2").each(function(){
                sum += +$(this).val();
        });
        $('.color_wise_quantity2').val(sum);

        var quantity = $('.color_wise_quantity2').val();
        var unitprice = $('.color_unit_price2').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total2').val(total_price);
        calculate_total_quantity();
        calculate_total_amount();
    });

    $(document).on('keyup change', '#quantity3', function() {
        var sum = 0;
        $(".quantity3").each(function(){
                sum += +$(this).val();
        });
        $('.color_wise_quantity3').val(sum);

        var quantity = $('.color_wise_quantity3').val();
        var unitprice = $('.color_unit_price3').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total3').val(total_price);
        calculate_total_quantity();
        calculate_total_amount();
    });

    $(document).on('keyup change', '#quantity4', function() {
        var sum = 0;
        $(".quantity4").each(function(){
                sum += +$(this).val();
        });
        $('.color_wise_quantity4').val(sum);

        var quantity = $('.color_wise_quantity4').val();
        var unitprice = $('.color_unit_price4').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total4').val(total_price);
        calculate_total_quantity();
        calculate_total_amount();
    });

    $(document).on('keyup change', '#color_unit_price1', function() {

        var quantity = $('.color_wise_quantity1').val();
        var unitprice = $('.color_unit_price1').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total1').val(total_price);
        calculate_total_amount();
    });

    $(document).on('keyup change', '#color_unit_price2', function() {

        var quantity = $('.color_wise_quantity2').val();
        var unitprice = $('.color_unit_price2').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total2').val(total_price);
        calculate_total_amount();
    });

    $(document).on('keyup change', '#color_unit_price3', function() {

        var quantity = $('.color_wise_quantity3').val();
        var unitprice = $('.color_unit_price3').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total3').val(total_price);
        calculate_total_amount();
    });

    $(document).on('keyup change', '#color_unit_price4', function() {

        var quantity = $('.color_wise_quantity4').val();
        var unitprice = $('.color_unit_price4').val();
        var total_price = parseFloat(quantity*unitprice).toFixed(2);
        $('.sub_total4').val(total_price);
        calculate_total_amount();
    });


    function calculate_total_quantity(){
        var quantity1 = $('.color_wise_quantity1').val();
        if (isNaN(quantity1)) quantity1 = 0;
        var quantity2 = $('.color_wise_quantity2').val();
        if (isNaN(quantity2)) quantity2 = 0;
        var quantity3 = $('.color_wise_quantity3').val();
        if (isNaN(quantity3)) quantity3 = 0;
        var quantity4 = $('.color_wise_quantity4').val();
        if (isNaN(quantity4)) quantity4 = 0;

        var total = parseInt(quantity1) + parseInt(quantity2) + parseInt(quantity3) + parseInt(quantity4);
        if (isNaN(total)) total = 0;
        $('.total_quantity').val(total);
    }

    function calculate_total_amount(){
        var sub1 = $('.sub_total1').val();
        if (isNaN(sub1)) sub1 = 0;
        var sub2 = $('.sub_total2').val();
        if (isNaN(sub2)) sub2 = 0;
        var sub3 = $('.sub_total3').val();
        if (isNaN(sub3)) sub3 = 0;
        var sub4 = $('.sub_total4').val();
        if (isNaN(sub4)) sub4 = 0;

        var total_amount = parseFloat(sub1) + parseFloat(sub2) + parseFloat(sub3) + parseFloat(sub4);
        if (isNaN(total_amount)) total_amount = 0;
        $('.total_amount').val(parseFloat(total_amount).toFixed(2));
    }

    });

    tinymce.init({
      selector: 'textarea',
      height: 150,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code wordcount'
      ],
      toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
      branding:false
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\salepro\winking-fasion\resources\views/purchase/order_edit.blade.php ENDPATH**/ ?>