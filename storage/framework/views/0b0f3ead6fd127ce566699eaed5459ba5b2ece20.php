<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>Dashboard<small>Control panel</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      	<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	<div class="confirm-div col-md-12" style="background-color: #f39c12;min-height: 30px;color:white;text-align: center;display: none;"></div>
		              	<div class="col-xs-12">
 	       					<a class="btn btn-success" href="<?php echo e(url('/register')); ?>">Add New User</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>User Name</th>
			                        <th>User Email</th>
			                        <th>User Mobile</th>
			                        <th>Designation Name</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td><?php echo e($key->name.' '.$key->UserLastName); ?></td>
			                        <td><?php echo e($key->email); ?></td>
			                        <td><?php echo e($key->UserMobile); ?></td>
			                        <td><?php echo e($key->UserDesignationName); ?></td>
			                        <td>
			                          <a href="<?php echo e(url('/Users')); ?>/<?php echo e($key->id); ?>/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                          <a href="<?php echo e(url('/Users')); ?>/<?php echo e($key->id); ?>/delete" onclick="return confirm('Are You Sure You Want to Delete This Entry')"><i class="fa fa-trash btn btn-danger"></i></a>
			                        </td>
			                    </tr>	
			                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </tbody>
			                <tfoot>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>User Name</th>
			                        <th>User Email</th>
			                        <th>User Mobile</th>
			                        <th>Action</th>
			                    </tr>
			                </tfoot>
              			</table>
		            </div>
          		</div>
	        </div>
    	</div>
    </section>
  </div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/auth/index.blade.php ENDPATH**/ ?>