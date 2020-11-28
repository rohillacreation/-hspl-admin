 <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
 <style type="text/css">
	th,td
	{
		text-align: center;
	}
</style>

 <div class="content-wrapper">
<section class="content">
      	<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	<?php if(Session::has('message')): ?>
		            		<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
		            	<?php endif; ?>
		              	<div class="col-xs-12">
 	       					<a class="btn btn-success" href="<?php echo e(url('/technical-description/create')); ?>">Add Technical Description</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>File Type</th>
			                        <th>Machine Type</th>
			                        <th>Machine Subcategory Name</th>
			                        <th>Machine Number</th>
			                        <th>Description Title</th>
			                        <th>Description File</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td><?php echo e($key->WorkName); ?></td>
			                        <td><?php echo e($key->MachineCategoryName); ?></td>
			                        <td><?php echo e($key->MachineSubcategoryName); ?></td>
			                        <td><?php echo e($key->MachineSerialNumber); ?></td>
			                        <td><?php echo e($key->DescriptionTitle); ?></td>
			                        <td>
			                           <?php if(env('APP_ENV') == 'local'): ?>
			                        	<a href="<?php echo e(asset('images/DescriptionFile')); ?>/<?php echo e($key->DescriptionFile); ?>" target="_blank">View Docs</a>
			                        	<?php else: ?>
			                        	<a href="<?php echo e(asset('public/images/DescriptionFile')); ?>/<?php echo e($key->DescriptionFile); ?>" target="_blank">View Docs</a>
			                        	<?php endif; ?>
			                        </td>

			                        <td style="float: left;padding: 0;">
			                         <a href="<?php echo e(url('/technical-description')); ?>/<?php echo e($key->DescriptionId); ?>/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         <form method="Post" action="<?php echo e(url('technical-description')); ?>/<?php echo e($key->DescriptionId); ?>">
			                         <input type="hidden" name="_method" value="DELETE"><?php echo csrf_field(); ?>
			                         <button style="transform: translate(40px, -28px);" type="submit" class="fa fa-trash btn btn-danger" onclick="return confirm('Are You Sure You Want to Delete This Entry')"></button>
			                          </form>
			                        </td>
			                    </tr>	
			                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </tbody>
              			</table>
		            </div>
          		</div>
	        </div>
    	</div>
    </section>
  </div>
 
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/technicaldescription/index.blade.php ENDPATH**/ ?>