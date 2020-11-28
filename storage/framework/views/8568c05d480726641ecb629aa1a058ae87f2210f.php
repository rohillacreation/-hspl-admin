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
      <h1><a class="btn btn-success" href="<?php echo e(url('/machine-master')); ?>">Back</a></h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Machine</h3>
               </div>
               <form role="form" method="post" action="<?php echo e(url('/machine-master')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="box-body">
                     
                      
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
                               <label for="CompanyName">Company Name</label>
                               <input type="text" class="form-control <?php $__errorArgs = ['CompanyName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="CompanyName" name="CompanyName" value="<?php echo e(old('CompanyName')); ?>">
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
                                <label for="CompanyLocation">Company Location</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['CompanyLocation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="CompanyLocation" name="CompanyLocation" value="<?php echo e(old('CompanyLocation')); ?>">
                                 <?php $__errorArgs = ['CompanyLocation'];
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
                        <div class="form-group col-md-3">
                           <label for="MachineType">Machine Type</label>
                           <select class="form-control <?php $__errorArgs = ['MachineType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineType" name="MachineType">
                              <option value="">Select Machine Type</option>
                              <?php $__currentLoopData = $MachineCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $machine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($machine->MachineCategoryId); ?>" <?php echo e(($machine->MachineCategoryId == old('MachineCategoryId'))?'selected':''); ?> > <?php echo e($machine->MachineCategoryName); ?> </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php $__errorArgs = ['MachineType'];
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
                           <label for="MachineSubcategoryId">Machine Subcategory Name</label>
                           <select class="form-control <?php $__errorArgs = ['MachineSubcategoryId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineSubcategoryId" name="MachineSubcategoryId">
                              <option value="">Select Machine Subcategory</option>
                           </select>
                           <?php $__errorArgs = ['MachineSubcategoryId'];
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
                           <label for="ClientName">Client Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['ClientName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ClientName" name="ClientName" value="<?php echo e(old('ClientName')); ?>">
                           <?php $__errorArgs = ['ClientName'];
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
                           <label for="MachineName">Machine Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['MachineName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineName" name="MachineName" value="<?php echo e(old('MachineName')); ?>">
                           <?php $__errorArgs = ['MachineName'];
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
                           <label for="MachineSerialNumber">Machine Serial Number</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['MachineSerialNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineSerialNumber" name="MachineSerialNumber" value="<?php echo e(old('MachineSerialNumber')); ?>">
                           <?php $__errorArgs = ['MachineSerialNumber'];
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
                           <label for="MachineOrderNo">Machine Order Number</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['MachineOrderNo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineOrderNo" name="MachineOrderNo" value="<?php echo e(old('MachineOrderNo')); ?>">
                           <?php $__errorArgs = ['MachineOrderNo'];
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
                           <label for="MachineWarranty">Machine Warranty</label>
                           <select class="form-control <?php $__errorArgs = ['MachineWarranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineWarranty" name="MachineWarranty" onchange="ShowHideDiv(this)" >
                              <option value="">Select Machine Warranty</option>
                              <option value="W">Yes</option>
                              <option value="NW">No</option>
                           </select>
                           <?php $__errorArgs = ['MachineWarranty'];
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
                        <div id="Warranty" style="display: none;">
                          <div class="form-group col-md-3">
                             <label for="MachineWarrantyFrom">Machine Warranty From</label>
                             <input type="Date" class="form-control <?php $__errorArgs = ['MachineWarrantyFrom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineWarrantyFrom" name="MachineWarrantyFrom" value="<?php echo e(old('MachineWarrantyFrom')); ?>">
                             <?php $__errorArgs = ['MachineWarrantyFrom'];
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
                             <label for="MachineWarrantyTo">Machine Warranty To</label>
                             <input type="Date" class="form-control <?php $__errorArgs = ['MachineWarrantyTo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineWarrantyTo" name="MachineWarrantyTo" value="<?php echo e(old('MachineWarrantyTo')); ?>">
                             <?php $__errorArgs = ['MachineWarrantyTo'];
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
              
                        <div class="form-group col-md-3">
                           <label for="MachineAllotmentDate">Machine Allotment Date</label>
                           <input type="Date" class="form-control <?php $__errorArgs = ['MachineAllotmentDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineAllotmentDate" name="MachineAllotmentDate" value="<?php echo e(old('MachineAllotmentDate')); ?>">
                           <?php $__errorArgs = ['MachineAllotmentDate'];
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
<!-- Fetch Sub_categories -->
<script>
   $(document).ready(function(){
       $("#MachineType").change(function(e){
         var category_id = e.target.value;
       $.ajax({
         url: "/machine-master/getsubcategory",
         type:'POST',
         data:{category_id : category_id}, 
         success: function(result)
         {
          console.log(result);
           var innerHtml = `<option value = "">Select Machine Sub Category</option>`;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.MachineSubcategoryId}">${element.MachineSubcategoryName}</option>`;
             });
               
             $('#MachineSubcategoryId').html(innerHtml);
         }
         });
       });
   });

   function GetDivision(e)
   {
      var RailwaysId = e.value;
       $.ajax({
         url: "/machine-master/get-division",
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

   function ShowHideDiv(e) 
   {
       if(e.value == 'W')
       {
         $('#Warranty').show();
       }
       else
       {
         $('#Warranty').hide();
       }
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
</script><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/machinemaster/add_machine_master.blade.php ENDPATH**/ ?>