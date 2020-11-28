<table border="1px" style="width: 100%">
	<tr>
		<th>Sr. No.</th>
		<th>Task Number</th>
		<th>Customer Orientation-Business Generation</th>
		<th>Self-Learning Qualities</th>
		<th>Problem Solving Skills</th>
		<th>Functional Knowledge</th>
		<th>Initiative & Drive</th>
		<th>Total Marks</th>
	</tr>
	<?php $i = 1 ?>
	<?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($i++); ?></td>
		<td><?php echo e($key1->TaskNumber); ?></td>
		<td><?php echo e($key1->QuestionOne); ?></td>
		<td><?php echo e($key1->QuestionTwo); ?></td>
		<td><?php echo e($key1->QuestionThree); ?></td>
		<td><?php echo e($key1->QuestionFour); ?></td>
		<td><?php echo e($key1->QuestionFive); ?></td>
		<td><?php echo e($key1->Total_Marks); ?></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/engineermaster/view_performance.blade.php ENDPATH**/ ?>