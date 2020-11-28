<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if(env('APP_ENV') == 'local'): ?>
<img src="<?php echo e(asset('images/ProfilePic')); ?>/<?php echo e($key->ProfilePic); ?>" style="width: 100%;height: 8%">

<?php else: ?>
<img src="<?php echo e(asset('public/images/ProfilePic')); ?>/<?php echo e($key->ProfilePic); ?>" style="width: 100%;height: 8%">
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/engineermaster/image.blade.php ENDPATH**/ ?>