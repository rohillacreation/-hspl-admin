<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="<?php echo e(url('/leave-management')); ?>">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Leaves</h3>
            </div>
            <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <form role="form" method="post" action="<?php echo e(url('/leave-management')); ?>/<?php echo e($key->LeaveId); ?>">
                <input type="hidden" name="Source" value="Web">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="box-body">
                  <div class="row">

                        <div class="form-group col-md-3">
                           <label for="EngineerId">Engineer Name</label>
                           <select class="form-control <?php $__errorArgs = ['EngineerId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="EngineerId" name="EngineerId">
                              <option value="">Select Engineer Name</option>
                              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($info->EngineerId); ?>" <?php echo e(($info->EngineerId==$key->EngineerId) ? 'selected' : ''); ?>><?php echo e($info->EngineerName); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php $__errorArgs = ['EngineerId'];
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
                           <label for="LeaveType">Leave Type</label>
                           <select class="form-control <?php $__errorArgs = ['LeaveType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="LeaveType" name="LeaveType" >
                              <option value="">Select Type</option>
                              <option value="EL" <?php echo e(($key->LeaveType == 'EL') ? 'selected' : ''); ?>>Earning Leave</option>
                              <option value="SL" <?php echo e(($key->LeaveType == 'SL') ? 'selected' : ''); ?>>Sick Leave</option>
                              <option value="PL" <?php echo e(($key->LeaveType == 'PL') ? 'selected' : ''); ?>>Personal Leave</option>
                        
                           </select>
                           <?php $__errorArgs = ['LeaveType'];
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
                           <label for="FromDate">From Date</label>
                           <input type="Date" class="form-control <?php $__errorArgs = ['FromDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="FromDate" name="FromDate" value="<?php echo e($key->FromDate); ?>"  >
                           
                           <?php $__errorArgs = ['FromDate'];
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
                           <label for="ToDate">To Date</label>
                           <input type="Date" class="form-control <?php $__errorArgs = ['ToDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ToDate" name="ToDate" value="<?php echo e($key->ToDate); ?>"  >                          
                           <?php $__errorArgs = ['ToDate'];
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
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/leavemanagement/edit_leavemanagement.blade.php ENDPATH**/ ?>