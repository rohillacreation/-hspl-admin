<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1><a class="btn btn-success" href="<?php echo e(url('/AllUsers')); ?>">Back</a></h1>

    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User Details</h3>
            </div>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <form role="form" method="post" action="<?php echo e(url('/update')); ?>/<?php echo e($key->id); ?>">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                  <div class="row">
                    <!-- <div class="form-group col-md-3">
                      <label for="UserDesignationName">Designation Name</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['UserDesignationName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="UserDesignationName" name="UserDesignationName" value="<?php echo e($key->UserDesignationName); ?>" >
                      <?php $__errorArgs = ['UserDesignationName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                          <strong style="color: red"><?php echo e($message); ?></strong>
                        </span> 
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  </div>
                </div> -->

                <div class="form-group col-md-3">
                           <label for="name">First Name</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e($key->name); ?>"  required>
                           <?php $__errorArgs = ['name'];
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
                           <label for="UserLastName">Last Name</label>
                           <input type="text" class="form-control" id="UserLastName" name="UserLastName" value=" <?php echo e($key->UserLastName); ?> ">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="UserMobile">Mobile No.</label>
                           <input type="text" class="form-control" id="UserMobile" name="UserMobile" value=" <?php echo e($key->UserMobile); ?> ">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="email">Email Id</label>
                           <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($key->email); ?>" required autocomplete="email">
                           <?php $__errorArgs = ['email'];
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
                           <label for="UserDesignationId">Designation
                           </label>
                           <!-- <input type="text" class="form-control" id="UserDesignationId" name="UserDesignationId"> -->
                           <select class="form-control" id="UserDesignationId" name="UserDesignationId" required>
                              <option value="">Select Designation</option>
                               <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                              <option value="<?php echo e($info->UserDesignationId); ?>" <?php echo e(($info->UserDesignationId == $key->UserDesignationId) ? 'selected' : ''); ?>><?php echo e($info->UserDesignationName); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
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
<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/auth/edit_user.blade.php ENDPATH**/ ?>