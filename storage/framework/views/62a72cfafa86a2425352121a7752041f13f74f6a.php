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
      <h1><a class="btn btn-success" href="<?php echo e(url('/service-master')); ?>">Back</a></h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
              <?php if(Session::has('message')): ?>
                <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
               <div class="box-header with-border">
                  <h3 class="box-title">Add New Service</h3>
               </div>
               <form role="form" method="post" action="<?php echo e(url('/service-master')); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="box-body">
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="MachineSerialNumber">Machine Name</label>
                           <input list="MachineSerialNumber" autocomplete="off" name="MachineSerialNumber" class="form-control" placeholder="Enter Machine Sr. no." onchange="GetRailways(this)">
                            <datalist id="MachineSerialNumber">
                              <?php $__currentLoopData = $Machines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Machine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($Machine->MachineSerialNumber); ?>"></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                            <input type="hidden" name="MId" id="MId">
                           <?php $__errorArgs = ['MachineSerialNumber'];
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
                           <label for="RailwaysZone">Railways Zone</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['RailwaysZone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="RailwaysZone" name="RailwaysZone" readonly value="<?php echo e(old('RailwaysZone')); ?>">
                           <?php $__errorArgs = ['RailwaysZone'];
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
                           <label for="DevisionName">Division Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['DevisionName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="DevisionName" name="DevisionName" value="<?php echo e(old('DevisionName')); ?>" readonly>
                           <?php $__errorArgs = ['DevisionName'];
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
                           <label for="ServiceLocation">Service Location</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['ServiceLocation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ServiceLocation" name="ServiceLocation" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="<?php echo e(old('ServiceLocation')); ?>">
                           <?php $__errorArgs = ['ServiceLocation'];
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
                      <div class="row">
                        
                        <div class="form-group col-md-3">
                           <label for="LetterReceivingDate">Letter Receiving Date</label>
                           <input type="Date" class="form-control <?php $__errorArgs = ['LetterReceivingDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="LetterReceivingDate" name="LetterReceivingDate" value="<?php echo e(old('LetterReceivingDate')); ?>">
                           <?php $__errorArgs = ['LetterReceivingDate'];
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
                           <label for="ServiceLetter">Service Letter</label>
                           <input type="file" class="form-control <?php $__errorArgs = ['ServiceLetter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ServiceLetter" name="ServiceLetter" value="<?php echo e(old('ServiceLetter')); ?>" accept=".pdf">
                           <?php $__errorArgs = ['ServiceLetter'];
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
                           <label for="Remark">Remark</label>
                           <textarea class="form-control <?php $__errorArgs = ['Remark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Remark" name="Remark"><?php echo e(old('Remark')); ?></textarea>
                           <?php $__errorArgs = ['Remark'];
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
  function GetRailways(e)
   {
      var machinenumber = e.value;
       $.ajax({
         url: "/service-master/get-railways",
         type:'POST',
         data:{machinenumber : machinenumber}, 
         success: function(result)
         {
            document.getElementById('RailwaysZone').value = result['RailwaysZone'] ? result['RailwaysZone'] : '';
            document.getElementById('DevisionName').value = result['DevisionName'] ? result['DevisionName'] : '';
         }
         });
   }
</script><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/servicemaster/add_service_master.blade.php ENDPATH**/ ?>