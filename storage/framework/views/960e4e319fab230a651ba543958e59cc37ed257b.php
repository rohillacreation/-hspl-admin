 <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
 <style type="text/css">
	th,td
	{
		text-align: center;
	}
	.modal-header
	{
		background-color: #3c8dbc;
	}
	.modal-footer
	{
		background-color: #a29f9d38;
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
 	       					<a class="btn btn-success" href="<?php echo e(url('/engineer-master/create')); ?>">Add Engineer Master</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Profile Pic</th>
			                        <th>Employee Id</th>
			                        <th>Name</th>
			                        <th>Designation</th>
			                        <th>Qualification</th>
			                        <th>Mobile</th>
			                        <th>Email</th>
			                        <th>CurrentAddress</th>
			                        <th>Engineer Asset</th>
			                        <th>Documents</th>
			                        <th>Performance</th>
			                        <!-- <th>DocumentDescription</th> -->
			                        <th>Total Leaves</th>
			                        <th>Earning Leave</th>
			                        <th>Sick Leave</th>
			                        <th>Personal Leave</th>
			                        <th>CL</th>
			                        <th>Current Location</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td><?php if(env('APP_ENV') == 'local'): ?>
			                        	<a href="#" id="<?php echo e($key->EngineerId); ?>" onclick="image(this)"><img src="<?php echo e(asset('images/ProfilePic')); ?>/<?php echo e($key->ProfilePic); ?>" style="width: 100%;height: 8%"></a>
			                        	
			                        	<?php else: ?>
			                        	<a href="#" id="<?php echo e($key->EngineerId); ?>" onclick="image(this)"><img src="<?php echo e(asset('public/images/ProfilePic')); ?>/<?php echo e($key->ProfilePic); ?>" style="width: 100%;height: 8%"></a>
			                        	<?php endif; ?>
			                        </td>
			                        <td><?php echo e($key->EmployeeId); ?></td>
			                        <td><?php echo e($key->EngineerName); ?></td>
			                        <td><?php echo e($key->EngineerDesignationName); ?></td>
			                        <td><?php echo e($key->EngineerQualification); ?></td>
			                        <td><?php echo e($key->EngineerMobile); ?></td>
			                        <td><?php echo e($key->EngineerEmail); ?></td>
			                        <td><?php echo e($key->EngineerCurrentAddress); ?></td>
			                        <td>
			                        	<a href="#"  id="<?php echo e($key->EngineerId); ?>" onclick="asset(this)">View Assets</a>
			                        </td>
			                        <td>
			                        	<?php if(env('APP_ENV') == 'local'): ?>
			                        	<a href="<?php echo e(asset('images/EngineerDocuments')); ?>/<?php echo e($key->EngineerDocuments); ?>" target="_blank">View Docs</a>
			                        	<?php else: ?>
			                        	<a href="<?php echo e(asset('public/images/EngineerDocuments')); ?>/<?php echo e($key->EngineerDocuments); ?>" target="_blank">View Docs</a>
			                        	<?php endif; ?>
			                        </td>
			                        <td><a href="#" id="<?php echo e($key->EngineerId); ?>" onclick="performances(this)"><?php echo e($key->Performance); ?></a></td>
			                        <!-- <td><?php echo e($key->DocumentDescription); ?></td> -->
			                        <td><?php echo e($key->EngineerTotalLeaves); ?></td>
			                        <td><?php echo e($key->EL); ?></td>
			                        <td><?php echo e($key->SL); ?></td>
			                        <td><?php echo e($key->PL); ?></td>
			                        <td><?php echo e($key->CL); ?></td>
			                        <td><a target="_blank" href="http://maps.google.com/maps?q=<?php echo e($key->Latitude); ?>,<?php echo e($key->Longitude); ?>"><i class="fa fa-location-arrow btn btn-info"></i></a></td>
			                        <td style="float: left;padding: 0;">
			                         <a href="<?php echo e(url('/engineer-master')); ?>/<?php echo e($key->EngineerId); ?>/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         <form method="Post" action="<?php echo e(url('engineer-master')); ?>/<?php echo e($key->EngineerId); ?>">
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

    	
    	<!-- model start -->
    	<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Engineer Assets</p>
			        </div>
			        <div class="box-body" id="assets" style="min-height: 150px">
			        </div>
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!-- model end -->

	<!-- model start -->
    	<div class="modal fade" id="performancemodel" role="dialog">
			<div class="modal-dialog" style="width: 92%;">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Total Performances</p>
			        </div>
			        <div class="box-body" id="performance" style="min-height: 150px">
			        </div>
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!-- model end -->


	<!-- model start -->
    	 <div class="modal fade" id="ownModal" role="dialog">
			<div class="modal-dialog">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Profile Pic</p>
			        </div>
			        
			        <div class="box-body" id="images" style="min-height: 100px">
			        	
			        </div>
			   
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!-- model end -->


    </section>
  </div>
 
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
	function asset(e) 
   {
       var EngineerId = e.id;

       $.ajax({
	         url: "/engineer-master/view_asset",
	         type:'POST',
	         data:{EngineerId : EngineerId}, 
	         success: function(result)
	         {
	         	$('#assets').html(result);
	         }
         });
       $('#myModal').modal();
   }

   function image(e)
   {
   	var EngineerId = e.id;
   	$.ajax({
	         url: "/engineer-master/view_profile",
	         type:'POST',
	         data:{EngineerId : EngineerId}, 
	         success: function(result)
	         {  
	         	$('#images').html(result);

	         }
         });
       $('#ownModal').modal();

   }

   function performances(e) 
   {
       var EngineerId = e.id;

       $.ajax({
	         url: "/engineer-master/view_performance",
	         type:'POST',
	         data:{EngineerId : EngineerId}, 
	         success: function(result)
	         {
	         	$('#performance').html(result);
	         }
         });
       $('#performancemodel').modal();
   }

</script><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/engineermaster/index.blade.php ENDPATH**/ ?>