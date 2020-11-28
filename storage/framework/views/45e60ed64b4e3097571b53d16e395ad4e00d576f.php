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
      <h1><a class="btn btn-success" href="<?php echo e(url('/gatepass')); ?>">Back</a></h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Details</h3>
               </div>
               <form role="form" method="post" action="<?php echo e(url('/gatepass')); ?>" >
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
unset($__errorArgs, $__bag); ?>" id="CompanyName" name="CompanyName" onchange="sinumber(this)">
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
                                 <option value="">Select Division</option>
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
                        <div class="form-group col-md-3" hidden>
                           <label for="SINumber">Company Code</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['SINumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="SINumber" name="SINumber" readonly>
                           <?php $__errorArgs = ['SINumber'];
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
                           <label for="GatePassType">Gate Pass Type</label>
                           <select class="form-control <?php $__errorArgs = ['GatePassType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="GatePassType" name="GatePassType">
                              <option value="">Select Company</option>
                              <option value="RETURNABLE">RETURNABLE</option>
                              <option value="NON-RETURNABLE">NON-RETURNABLE</option>
                           </select>
                           <?php $__errorArgs = ['GatePassType'];
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
                           <label for="PersonName">Person Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['PersonName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="PersonName" name="PersonName" value="<?php echo e(old('PersonName')); ?>">
                           <?php $__errorArgs = ['PersonName'];
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
                           <label for="VendorDesignation">Vendor Designation</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['VendorDesignation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="VendorDesignation" name="VendorDesignation" value="<?php echo e(old('VendorDesignation')); ?>">
                           <?php $__errorArgs = ['VendorDesignation'];
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
                           <label for="Department">Department</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['Department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Department" name="Department" value="<?php echo e(old('Department')); ?>" >
                           <?php $__errorArgs = ['Department'];
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
                           <label for="ModeofDespatch">Mode of Dispatch</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['ModeofDespatch'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ModeofDespatch" name="ModeofDespatch" value="<?php echo e(old('ModeofDespatch')); ?>">
                           <?php $__errorArgs = ['ModeofDespatch'];
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
                           <label for="SupplyFrom">Supply Will be From</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['SupplyFrom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="SupplyFrom" name="SupplyFrom" value="<?php echo e(old('SupplyFrom')); ?>">
                           <?php $__errorArgs = ['SupplyFrom'];
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
                           <label for="SupplyTo">Supply To</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['SupplyTo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="SupplyTo" name="SupplyTo" value="<?php echo e(old('SupplyTo')); ?>">
                           <?php $__errorArgs = ['SupplyTo'];
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
                           <label for="ClientNo">Client No.</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['ClientNo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ClientNo" name="ClientNo" value="<?php echo e(old('ClientNo')); ?>">
                           <?php $__errorArgs = ['ClientNo'];
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
                           <label for="CC">CC</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['CC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="CC" name="CC" value="<?php echo e(old('CC')); ?>">
                           <?php $__errorArgs = ['CC'];
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
                           <label for="Office">Office</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['Office'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Office" name="Office" value="<?php echo e(old('Office')); ?>">
                           <?php $__errorArgs = ['Office'];
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
                           <label for="Consignee">Consignee Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['Consignee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Consignee" name="Consignee" value="<?php echo e(old('Consignee')); ?>">
                           <?php $__errorArgs = ['Consignee'];
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
                           <label for="Date">Date</label>
                           <input type="Date" class="form-control <?php $__errorArgs = ['Date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Date" name="Date" value="<?php echo e(old('Date')); ?>">
                           <?php $__errorArgs = ['Date'];
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
                           <label for="TimeOut">Time Out</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['TimeOut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="TimeOut" name="TimeOut" value="<?php echo e(old('TimeOut')); ?>">
                           <?php $__errorArgs = ['TimeOut'];
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
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="Descriptionofmaterial">Description of Material</label>
                           <input type="text" class="form-control" id="Descriptionofmaterial" name="Descriptionofmaterial[]">
                        </div>
                        <div class="form-group col-md-2">
                           <label for="PartNumber">Part Number</label>
                           <input type="text" class="form-control" id="PartNumber" name="PartNumber[]">
                        </div>
                        <div class="form-group col-md-1">
                           <label for="Quantity">Quantity</label>
                           <input type="text" class="form-control" id="Quantity_0" name="Quantity[]" oninput="calculate(this);">
                        </div>
                        <div class="form-group col-md-1">
                           <label for="UnitRate">Unit Rate</label>
                           <input type="text" class="form-control" id="UnitRate_0" name="UnitRate[]" oninput="calculate(this);">
                        </div>
                        <div class="form-group col-md-1">
                           <label for="NetPrice">Net Price</label>
                           <input type="text" class="form-control" id="NetPrice_0" name="NetPrice[]" readonly>
                        </div>
                        <div class="form-group col-md-2">
                           <label for="Remarks">Remark</label>
                           <input type="text" class="form-control" id="Remarks" name="Remarks[]">
                        </div>
                        <div class="col-md-2">
                           <button type="button" style="margin-top: 24px;" onclick="add_row()" class="btn btn-info">Add</button>
                        </div>
                        <div id="addval">
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <label for="TotalAmount">Total</label>
                        <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" readonly>
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
               
               <div class="form-group col-md-3">
                            <label for="Descriptionofmaterial">Description of Material</label>
                            <input type="text" class="form-control" id="Descriptionofmaterial" name="Descriptionofmaterial[]">
                            
                           </div>
   
                           <div class="form-group col-md-2">
                            <label for="PartNumber">Part Number</label>
                            <input type="text" class="form-control" id="PartNumber" name="PartNumber[]">
                            
                           </div>
   
                           <div class="form-group col-md-1">
                            <label for="Quantity">Quantity</label>
                            <input type="text" class="form-control" id="Quantity_" name="Quantity[]" oninput="calculate(this);">
                           
                           </div>
   
                           <div class="form-group col-md-1">
                            <label for="UnitRate">Unit Rate</label>
                            <input type="text" class="form-control" id="UnitRate_" name="UnitRate[]" oninput="calculate(this);">
                           
                           </div>
   
                           <div class="form-group col-md-1">
                            <label for="NetPrice">Net Price</label>
                            <input type="text" class="form-control" id="NetPrice_" name="NetPrice[]" readonly>
                           
                           </div>
   
                           <div class="form-group col-md-2">
                            <label for="Remarks">Remark</label>
                            <input type="text" class="form-control" id="Remarks" name="Remarks[]">
                           
                           </div>
               
                           <div class="col-md-2">
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
          url: "/gatepass/get-division",
          type:'POST',
          data:{RailwaysId : RailwaysId}, 
          success: function(result)
          {
            var innerHtml = `<option value = "">Select Division</option>`;
              result.forEach(element=>{
                  innerHtml+=`<option value = "${element.DevisionId}">${element.DevisionName}</option>`;
              });
                
              $('#DevisionId').html(innerHtml);
          }
          });
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
   
   
   function sinumber(e)
   {
     var code = e.value.split("-")[1];
     $('#SINumber').val(code);
   }
   
   function calculate(e)
   {
     id = e.id.split("_")
     var quantity = document.getElementById('Quantity_'+id[1]).value; 
     var rate = document.getElementById('UnitRate_'+id[1]).value; 
     var myResult = quantity * rate;
     //var gst = document.getElementById('GST_'+id[1]).value;
     document.getElementById('NetPrice_'+id[1]).value = myResult;
     finalcount();
   }
   
   function finalcount()
   {
     
     var ngst = $("input[name='NetPrice[]']")
               .map(function(){return $(this).val();}).get();
     
   
     var total = 0;
   
     
     for(var i = 0; i < ngst.length; i++)
     {
       total += parseFloat(ngst[i]);
     }
     document.getElementById('TotalAmount').value = total;
   }
</script><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/gatepass/add_gate_detail.blade.php ENDPATH**/ ?>