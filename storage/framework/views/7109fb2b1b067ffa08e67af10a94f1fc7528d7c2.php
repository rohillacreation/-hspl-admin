<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style type="text/css">
  strong{
    color: red;
  }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="<?php echo e(url('/purchase_order')); ?>">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add PO Details</h3>
            </div>
            <form role="form" method="post" action="<?php echo e(url('/purchase_order')); ?>" >
              <?php echo csrf_field(); ?>

              <div class="box-body">
                <div class="row">
                        

                        <div class="form-group col-md-3">
                           <label for="CompanyName">Company Name</label>
                           <select class="form-control <?php $__errorArgs = ['CompanyName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="CompanyName" name="CompanyName" onchange="ponumber(this)">
                              <option value="">Select Company Name</option>
                              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($key->CompanyId); ?>-<?php echo e($key->CompanyCode); ?>" <?php echo e(($key->CompanyId == old('CompanyId'))? 'selected' : ''); ?>><?php echo e($key->NameShown); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php $__errorArgs = ['CompanyName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                             <label for="OrganisationId">Organisation</label>
                             <select class="form-control <?php $__errorArgs = ['OrganisationId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="OrganisationId" name="OrganisationId" onchange="showrailwayorprivate(this)">
                             <option value="">Select Organisation</option>
                             <?php $__currentLoopData = $Organisation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $OrganisationData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($OrganisationData->OrganisationId); ?>" <?php echo e(($OrganisationData->OrganisationId == old('OrganisationId'))?'selected':''); ?> ><?php echo e($OrganisationData->OrganisationName); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select>
                             <?php $__errorArgs = ['OrganisationId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                             <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>


                           <div  id="organisationselect" style="display: none;">

                               <div class="form-group col-md-3">
                               <label for="Company">Company</label>
                               <input type="text" class="form-control <?php $__errorArgs = ['Company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Company" name="Company" value="<?php echo e(old('Company')); ?>">
                               <?php $__errorArgs = ['Company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="Address">Address</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['Address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Address" name="Address" value="<?php echo e(old('Address')); ?>">
                                 <?php $__errorArgs = ['Address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                 <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                           </div>


                        <div id="railway" style=" display: none;">
                        <div class="form-group col-md-3">
                           <label for="RailwaysId">Railways Zone</label>
                           <select class="form-control <?php $__errorArgs = ['RailwaysId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="RailwaysId" name="RailwaysId" onchange="GetDivision(this)">
                              <option value="">Select Railways Zone</option>
                              <?php $__currentLoopData = $Railways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Railway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($Railway->RailwaysId); ?>" <?php echo e(($Railway->RailwaysId == old('RailwaysId')) ? 'selected':''); ?> ><?php echo e($Railway->RailwaysZone); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php $__errorArgs = ['RailwaysId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span> 
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group col-md-3">
                           <label for="DevisionId">Division</label>
                           <select class="form-control <?php $__errorArgs = ['DevisionId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="DevisionId" name="DevisionId">
                              <option value="">Select Devision</option>
                           </select>
                           <?php $__errorArgs = ['DevisionId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>


                        <div class="form-group col-md-3">
                           <label for="ReferenceNumber">Reference Number</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['ReferenceNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ReferenceNumber" name="ReferenceNumber" value="<?php echo e(old('ReferenceNumber')); ?>">
                           <?php $__errorArgs = ['ReferenceNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3" hidden>
                           <label for="PONumber">PO Number</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['PONumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="PONumber" name="PONumber" value="<?php echo e(old('PONumber')); ?>">
                           <?php $__errorArgs = ['PONumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="PODate">PO Date</label>
                           <input type="Date" class="form-control <?php $__errorArgs = ['PODate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="PODate" name="PODate" value="<?php echo e(old('PODate')); ?>">
                           <?php $__errorArgs = ['PODate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="VendorName">Vendor Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['VendorName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="VendorName" name="VendorName" value="<?php echo e(old('VendorName')); ?>">
                           <?php $__errorArgs = ['VendorName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="VendorContactName">Vendor Contact Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['VendorContactName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="VendorContactName" name="VendorContactName" value="<?php echo e(old('VendorContactName')); ?>">
                           <?php $__errorArgs = ['VendorContactName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="VendorMobile">Vendor Mobile</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['VendorMobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="VendorMobile" name="VendorMobile" value="<?php echo e(old('VendorMobile')); ?>">
                           <?php $__errorArgs = ['VendorMobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="VendorEmail">Vendor Email</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['VendorEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="VendorEmail" name="VendorEmail" value="<?php echo e(old('VendorEmail')); ?>">
                           <?php $__errorArgs = ['VendorEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="GSTNumber">Vendor GST Number</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['GSTNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="GSTNumber" name="GSTNumber" value="<?php echo e(old('GSTNumber')); ?>">
                           <?php $__errorArgs = ['GSTNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div></div>
                        <div class="row">
                        <div class="form-group col-md-2">
                           <label for="ItemDescription">Item Description</label>
                           <input type="text" class="form-control" id="ItemDescription" name="ItemDescription[]">
                          
                         </div>
                        <div class="form-group col-md-1">
                           <label for="Quantity">Quantity</label>
                           <input type="text" class="form-control" id="Quantity_0" name="Quantity[]" oninput="calculate(this);">
                           </div>

                           <div class="form-group col-md-1">
                           <label for="Rate">Rate</label>
                           <input type="text" class="form-control" id="Rate_0" name="Rate[]" oninput="calculate(this);">
                           </div>

                           <div class="form-group col-md-1">
                           <label for="Unit">Unit</label>
                           <input type="text" class="form-control" id="Unit_0" name="Unit[]" oninput="calculate(this);">
                           </div>

                           <div class="form-group col-md-3">
                           <label for="TotalValueWithoutGST">Total Value Without GST</label>
                           <input type="text" class="form-control" id="TotalValueWithoutGST_0" name="TotalValueWithoutGST[]" readonly>
                           </div>

                           <div class="form-group col-md-1">
                           <label for="GST">GST%</label>
                           <input type="text" class="form-control" id="GST_0" name="GST[]" oninput="calculate(this);" value="0">
                           </div>
                      
                      

                          <div class="form-group col-md-2">
                           <label for="TotalValueWithGST">Total Value With GST</label>
                           <input type="text" class="form-control" id="TotalValueWithGST_0" name="TotalValueWithGST[]" readonly>
                          </div>

                        <div class="col-md-1">
                          <button type="button" style="margin-top: 24px;" onclick="add_row()" class="btn btn-info">Add</button>
                        </div>
                        <div id="addval">
                          
                        </div>
                      </div>
                        <div class="row">
                        <div class="form-group col-md-3">
                           <label for="TotalAmount">Total Amount Without GST</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['TotalAmount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="TotalAmount" name="TotalAmount" value="<?php echo e(old('TotalAmount')); ?>" readonly>
                           <?php $__errorArgs = ['TotalAmount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="TotalGstAmount">Total Gst Amount</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['TotalGstAmount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="TotalGstAmount" name="TotalGstAmount" value="<?php echo e(old('TotalGstAmount')); ?>" readonly>
                           <?php $__errorArgs = ['TotalGstAmount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group col-md-3">
                           <label for="GrandTotal">Grand Total</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['GrandTotal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="GrandTotal" name="GrandTotal" value="<?php echo e(old('GrandTotal')); ?>" readonly>
                           <?php $__errorArgs = ['GrandTotal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-md-3">
                           <label for="TotalInWord">Total In Words</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['TotalInWord'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="TotalInWord" name="TotalInWord" value="<?php echo e(old('TotalInWord')); ?>" readonly>
                           <?php $__errorArgs = ['TotalInWord'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                           <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                           </span>
                           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      </div>
                   
                  </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>

  var No = 1;
  var Num = 3;
  function add_row()
  {
    $('#addval').append(
        `<div id="result`+No+`">
                
              <div class="form-group col-md-2">
                           <label for="ItemDescription">Item Description</label>
                           <input type="text" class="form-control" id="ItemDescription" name="ItemDescription[]">
                          
                         </div>
                        <div class="form-group col-md-1">
                           <label for="Quantity">Quantity</label>
                           <input type="text" class="form-control" id="Quantity_`+No+`" name="Quantity[]" oninput="calculate(this);">
                           </div>

                           <div class="form-group col-md-1">
                           <label for="Rate">Rate</label>
                           <input type="text" class="form-control" id="Rate_`+No+`" name="Rate[]" oninput="calculate(this);">
                           </div>

                           <div class="form-group col-md-1">
                           <label for="Unit">Unit</label>
                           <input type="text" class="form-control" id="Unit_`+No+`" name="Unit[]" oninput="calculate(this);">
                           </div>

                           <div class="form-group col-md-3">
                           <label for="TotalValueWithoutGST">Total Value Without GST</label>
                           <input type="text" class="form-control" id="TotalValueWithoutGST_`+No+`" name="TotalValueWithoutGST[]" readonly>
                           </div>

                           <div class="form-group col-md-1">
                           <label for="GST">GST%</label>
                           <input type="text" class="form-control" id="GST_`+No+`" name="GST[]" oninput="calculate(this);" value="0">
                           </div>
                      
                      

                          <div class="form-group col-md-2">
                           <label for="TotalValueWithGST">Total Value With GST</label>
                           <input type="text" class="form-control" id="TotalValueWithGST_`+No+`" name="TotalValueWithGST[]" readonly>
                          </div>
              
                          <div class="col-md-1">
                          <button type="button" style="margin-top: 24px;" onclick="remove_row(`+No+`)" class="btn btn-danger">Remove</button>
                          </div>
                      
          
        </div>`
      );
    No++;
    Num++;
  }

  function remove_row(id)
  {
    $('#result'+id).remove();
    finalcount();
  }

  function GetDivision(e)
   {
      var RailwaysId = e.value;
       $.ajax({
         url: "/purchase_order/get-division",
         type:'POST',
         data:{RailwaysId : RailwaysId}, 
         success: function(result)
         {
           var innerHtml = `<option value = "">Select Devision</option>`;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.DevisionId}">${element.DevisionName}</option>`;
             });
               
             $('#DevisionId').html(innerHtml);
         }
         });
   }

  function ponumber(e)
  {
    var code = e.value.split("-")[1];
    $('#PONumber').val(code);
  }


  function showrailwayorprivate(e)
   {
    if(e.value=='1')
    {
      $('#organisationselect').hide();
      $('#railway').show();
    }
    else
    {
       $('#organisationselect').show();
      $('#railway').hide();

    }
  }

  function calculate(e)
  {
    id = e.id.split("_")
    var quantity = document.getElementById('Quantity_'+id[1]).value; 
    var rate = document.getElementById('Rate_'+id[1]).value; 
    var myResult = quantity * rate;
    var gst = document.getElementById('GST_'+id[1]).value;
    document.getElementById('TotalValueWithoutGST_'+id[1]).value = myResult;
    total = myResult * (parseInt(100) + parseInt(gst ? gst : 0))/parseInt(100);
    document.getElementById('TotalValueWithGST_'+id[1]).value = total;
    finalcount();
  }

  function finalcount()
  {
    
    var ngst = $("input[name='TotalValueWithoutGST[]']")
              .map(function(){return $(this).val();}).get();
    var wgst = $("input[name='TotalValueWithGST[]']")
              .map(function(){return $(this).val();}).get();

    var total = 0;
    var gst = 0;
    var tgst = 0;
    for(var i = 0; i < ngst.length; i++)
    {
      total += parseFloat(ngst[i]);
      tgst += parseFloat(wgst[i]);
      gst += parseFloat(wgst[i]) - parseFloat(ngst[i]);
    }
    document.getElementById('TotalAmount').value = total;
    document.getElementById('TotalGstAmount').value = Math.round(gst * 100)/100;
    document.getElementById('GrandTotal').value = tgst;
    document.getElementById('TotalInWord').value = inWords(Math.ceil(tgst));
  }

  var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
  var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

  function inWords (num) {
      if ((num = num.toString()).length > 9) return 'overflow';
      n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
      if (!n) return; var str = '';
      str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
      str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
      str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
      str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
      str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
      return str;
  }


</script><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/PO_Bill/add_detail.blade.php ENDPATH**/ ?>