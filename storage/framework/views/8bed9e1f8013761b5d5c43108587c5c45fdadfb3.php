<table border="1px" style="width: 100%">
	<tr>
		<th>Asset Name</th>
		<th>Assign Date</th>
		<th>Item Serial No</th>
		<th>Item Price</th>
	</tr>
	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($key->AssetCategoryName); ?></td>
		<td><?php echo e($key->AssignDate); ?></td>
		<td><?php echo e($key->ItemSerialNo); ?></td>
		<td><?php echo e($key->ItemPrice); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/engineermaster/view_asset.blade.php ENDPATH**/ ?>