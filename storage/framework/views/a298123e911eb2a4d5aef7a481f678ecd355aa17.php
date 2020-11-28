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
 	       					<a class="btn btn-success" href="<?php echo e(url('/leave-management/create')); ?>">Add Leaves</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Engineer Name</th>
			                        <th>From Date</th>
			                        <th>To Date</th>
			                        <th>Leave Type</th>
			                        <th>Approval</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td><?php echo e($key->EngineerName); ?></td>
			                        <td><?php echo e($key->FromDate); ?></td>
			                        <td><?php echo e($key->ToDate); ?></td>
			                        <td><?php echo e($key->LeaveType); ?></td>
			                        <td>
			                        	<select class="form-control" id="<?php echo e($key->LeaveId); ?>" onchange="updatestatus(this)" name="LeaveApproval" style="color: white;background-color: <?php if($key->LeaveApproval == 'Pending'){ ?> red <?php } elseif($key->LeaveApproval == 'Approved') { ?> green <?php }else { ?> blue <?php } ?>">
		                              		<option value="Pending" <?php echo e(($key->LeaveApproval == 'Pending') ? 'selected' : ''); ?> >Pending</option>
			                              	<option value="Approved" <?php echo e(($key->LeaveApproval == 'Approved') ? 'selected' : ''); ?>>Approved</option>
			                              	<option value="Disapproved" <?php echo e(($key->LeaveApproval == 'Disapproved') ? 'selected' : ''); ?> >Rejected</option>
			                            </select>
			                        </td>
			                   
			                        <td style="float: left;padding: 0;">
			                         <a href="<?php echo e(url('/leave-management')); ?>/<?php echo e($key->LeaveId); ?>/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         <form method="Post" action="<?php echo e(url('leave-management')); ?>/<?php echo e($key->LeaveId); ?>">
			                         <input type="hidden" name="_method" value="DELETE"><?php echo csrf_field(); ?>
			                         <input type="hidden" name="EngineerId" value="<?php echo e($key->EngineerId); ?>">
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

    	<!-- disapproved model start -->

    	<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" style="width: 92%;">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"><b>Remarks for Disapproved</b></p>
			        </div>
			        
			        <div class="box-body">
			          	<form role="form" method="post" action="<?php echo e(url('/leave-management/rejectleave')); ?>">
			          	<?php echo csrf_field(); ?>
			            <div class="row">	
					         <div class="modal-body">
					          	<div class="form-group col-md-6">
			                       <label for="Remarks" style="float: left;">Remarks</label>
			                       <textarea class="form-control <?php $__errorArgs = ['Remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Remarks" name="Remarks" style="width: 100%;"></textarea>
			                       
			                       <?php $__errorArgs = ['Remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
			                         <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
			                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
			                   	</div>
			                   
			                	<input type="hidden" name="LeaveId" id="LeaveId">
			                	
			                 </div>
			            </div>
			            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
			        	</form>
			  		</div>
			   
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>

		<!-- disapproved model end -->
    </section>
  </div>
 
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
	function updatestatus(e)
	{
		var LeaveId = e.id;
		var LeaveApproval = e.value;
		if(LeaveApproval == 'Disapproved')
		{
			$('#LeaveId').val(LeaveId);
			$('#myModal').modal();
		}
		else
		{
			$.ajax({
         		url: "/leave-management/approval",
         		type:'POST',
         		data:{LeaveId : LeaveId, LeaveApproval : LeaveApproval}, 
         		success: function(result)
         		{
             		alert(result);
             		//window.location.reload();
         		}
         	});
		}
		
	}
	
</script>

<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/leavemanagement/index.blade.php ENDPATH**/ ?>