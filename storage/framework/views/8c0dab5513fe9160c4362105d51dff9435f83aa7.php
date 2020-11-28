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
 	       					<a class="btn btn-success" href="<?php echo e(url('/gatepass/create')); ?>">Add Details</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Gate Pass</th>
			                        <th>SI Number</th>
			                        <th>CompanyName</th>
			                        <th>Organisation Name</th>
			                        <th>Railways Zone</th>
			                        <th>Division Name</th>
			                        <th>Company</th>
			                        <th>Address</th>
			                        <th>Person Name</th>
			                        <th>Vendor Designation</th>
			                        <th>Department</th>
			                        <th>Mode of Dispatch</th>
			                        <th>Supply From</th>
			                        <th>Supply To</th>
			                        <th>Client No</th>
			                        <th>CC</th>
			                        <th>Office</th>
			                        <th>Consignee</th>
			                        <th>Date</th>
			                        <th>TimeOut</th>                      

			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $gatedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                  
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td>
			                        	
			                        	<a href="#" id="<?php echo e($key->GatePassId); ?>" name="<?php echo e($key->GatePassId); ?>" onclick="gatepass(this)">View Pass</a>
			                        	<a href="<?php echo e(url('/gatepass/pdf')); ?>/<?php echo e($key->GatePassId); ?>" style="float: left;"><b>Download PDF</b></a>
			                        </td>
			                        <td><?php echo e($key->SINumber); ?></td>
			                        <td><?php echo e($key->CompanyName); ?></td>
			                        <td><?php echo e($key->OrganisationName); ?></td>
			                        <td><?php echo e($key->RailwaysZone); ?></td>
			                        <td><?php echo e($key->DevisionName); ?></td>
			                        <td><?php echo e($key->Company); ?></td>
			                        <td><?php echo e($key->CompanyLocations); ?></td>
			                        <td><?php echo e($key->PersonName); ?></td>
			                        <td><?php echo e($key->Designation); ?></td>
			                        <td><?php echo e($key->Department); ?></td>
			                        <td><?php echo e($key->ModeofDespatch); ?></td>
			                        <td><?php echo e($key->SupplyFrom); ?></td>
			                        <td><?php echo e($key->SupplyTo); ?></td>
			                        <td><?php echo e($key->ClientNo); ?></td>
			                        <td><?php echo e($key->CC); ?></td>
			                        <td><?php echo e($key->Office); ?></td>
			                        <td><?php echo e($key->Consignee); ?></td>
			                        <td><?php echo e($key->Date); ?></td>
			                        <td><?php echo e($key->TimeOut); ?></td>
			                        
			                        
			                        
			                    </tr>
			                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			                  
			                </tbody>
              			</table>
		            </div>
          		</div>
	        </div>
    	</div>

    	<!--final submit model start -->
    	 <div class="modal fade" id="ownModal" role="dialog">
			<div class="modal-dialog" style="width: 60%;">
			  	<div class="modal-content">
			  		<div class="modal-header">
                    
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"></p>
			        </div>
			        
			        <div class="box-body" id="pass">
			        	
			        </div>
			   
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!--final submit model end -->
    </section>
  </div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
	function gatepass(e)
   {
   	var GatePassId = e.name;

   	$.ajax({
	         url: "/gatepass/view_pass",
	         type:'POST',
	         data:{GatePassId : GatePassId}, 
	         success: function(result)
	         {  
	         	$('#pass').html(result);

	         }
         });
       $('#ownModal').modal();

   }
</script>



<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/gatepass/index.blade.php ENDPATH**/ ?>