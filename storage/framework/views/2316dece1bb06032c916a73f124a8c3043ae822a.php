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
 	       					<a class="btn btn-success" href="<?php echo e(url('/engineer-asset/create')); ?>">Add Engineer Asset</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Engineer Name</th>
			                        <th>Asset Category Name</th>
			                        <th>Assign Date</th>
			                        <th>Item SerialNo</th>
			                        <th>Item Description</th>
			                        <th>Item Price</th>
			                        <th>Action</th>
			                        
			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td><?php echo e($key->EngineerName); ?></td>
			                        <td><?php echo e($key->AssetCategoryName); ?></td>
			                        <td><?php echo e($key->AssignDate); ?></td>
			                        <td><?php echo e($key->ItemSerialNo); ?></td>
			                        <td><?php echo e($key->ItemDescription); ?></td>
			                        <td><?php echo e($key->ItemPrice); ?></td>
			                        
			                        <td style="float: left;padding: 0;">
			                         <a href="<?php echo e(url('/engineer-asset')); ?>/<?php echo e($key->AssetId); ?>/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         <form method="Post" action="<?php echo e(url('engineer-asset')); ?>/<?php echo e($key->AssetId); ?>">
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

<?php /**PATH E:\public_html\hspl-admin\resources\views/engineerasset/index.blade.php ENDPATH**/ ?>