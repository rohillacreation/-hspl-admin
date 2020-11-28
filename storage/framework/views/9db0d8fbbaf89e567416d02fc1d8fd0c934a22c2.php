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
 	       					<a class="btn btn-success" href="<?php echo e(url('/machine-master/create')); ?>">Add Machine</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Machine Type</th>
			                        <th>Machine Subcategory Name</th>
			                        <th>Organisation</th>
			                        <th>Company</th>
			                        <th>Company Location</th>
			                        <th>Railways Zone</th>
			                        <th>Division Name</th>
			                        <th>Client Name</th>
			                        <th>Machine Name</th>
			                        <th>Machine Serial Number</th>
			                        <th>Machine Order Number</th>
			                        <th>Machine Warranty</th>
			                        <th>Machine Warranty From</th>
			                        <th>Machine Warranty To</th>
			                        <th>Machine Allotment Date</th>
			                        <th>Action</th>

			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                    <tr>
			                        <td><?php echo e($i++); ?></td>

			                        <td><?php echo e($key->MachineCategoryName); ?></td>
			                        <td><?php echo e($key->MachineSubcategoryName); ?></td>
			                        <td><?php echo e($key->OrganisationName); ?></td>
			                        <td><?php echo e($key->Company); ?></td>
			                        <td><?php echo e($key->CompanyLocation); ?></td>
			                        <td><?php echo e($key->RailwaysZone); ?></td>
			                        <td><?php echo e($key->DevisionName); ?></td>
			                        <td><?php echo e($key->ClientName); ?></td>
			                        <td><?php echo e($key->MachineName); ?></td>
			                        <td><?php echo e($key->MachineSerialNumber); ?></td>
			                        <td><?php echo e($key->MachineOrderNo); ?></td>
			                        <td><?php echo e($key->MachineWarranty); ?></td>
			                        <td><?php echo e($key->MachineWarrantyFrom); ?></td>
			                        <td><?php echo e($key->MachineWarrantyTo); ?></td>
			                        <td><?php echo e($key->MachineAllotmentDate); ?></td>
			                       
			                        <td>
			                         <a href="<?php echo e(url('/machine-master')); ?>/<?php echo e($key->MachineId); ?>/edit"><i class="fa fa-pencil btn btn-info" style="float: left;"></i></a>
			                         <form method="Post" action="<?php echo e(url('machine-master')); ?>/<?php echo e($key->MachineId); ?>">
			                          	<input type="hidden" name="_method" value="DELETE"><?php echo csrf_field(); ?>
			                          	<button style="transform: translate(36px, -28px);float: left;" type="submit" class="fa fa-trash btn btn-danger" onclick="return confirm('Are You Sure You Want to Delete This Entry')"></button>
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



<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/machinemaster/index.blade.php ENDPATH**/ ?>