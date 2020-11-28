<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="<?php echo e(url('/engineer-designation-master')); ?>">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Engineer Designation</h3>
            </div>
            <form role="form" method="post" action="<?php echo e(url('/engineer-designation-master')); ?>">
              <?php echo csrf_field(); ?>
              <div class="box-body">
                <div class="row">

                  <div class="form-group col-md-3">
                    <label for="EngineerDesignationName">Engineer Designation Name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['EngineerDesignationName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="EngineerDesignationName" name="EngineerDesignationName" onkeypress="return /[A-Za-z ]/i.test(event.key)" value="<?php echo e(old('EngineerDesignationName')); ?>" >
                    <?php $__errorArgs = ['EngineerDesignationName'];
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

                  <div class="form-group col-md-3">
                    <label for="EngineerDesignationTA">Engineer Designation TA</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['EngineerDesignationTA'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="EngineerDesignationTA" name="EngineerDesignationTA" onkeypress="return /[0-9.]/i.test(event.key)" value="<?php echo e(old('EngineerDesignationTA')); ?>" >
                    <?php $__errorArgs = ['EngineerDesignationTA'];
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
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/engineerdesignationmaster/add_engineer_designation_master.blade.php ENDPATH**/ ?>