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
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Reports</th>
			                        <th>Task Number</th>
			                        <th>Engineer Name</th>
			                        <th>Machine Serial Number</th>
			                        <th>Date</th>			                        

			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                  
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td>
			                        	<a href="#" id="<?php echo e($key->ServiceId); ?>" name="<?php echo e($key->ServiceId); ?>" onclick="report(this)">View Reports</a>
			                        	<a href="<?php echo e(url('/reports/pdffile')); ?>/<?php echo e($key->ServiceId); ?>" style="float: left;"><b>Download PDF</b></a>
			                        </td>

			                        <td><?php echo e($key->TaskNumber); ?></td>
			                        <td><?php echo e($key->EngineerName); ?></td>
			                        <td><?php echo e($key->MachineSerialNumber); ?></td>
			                        <td><?php echo e($key->ServiceCompeleteDate); ?></td>
			                        
			                        
			                        
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
			<div class="modal-dialog" style="width: 70%;">
			  	<div class="modal-content">
			  		<div class="modal-header">
			  		 
                                     
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"></p>
			        </div>
			        
			        <div class="box-body" id="myreport" style="min-height: 100px">
			        	
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
	function report(e)
   {
   	var ServiceId = e.name;

   	$.ajax({
	         url: "/reports/view_report",
	         type:'POST',
	         data:{ServiceId : ServiceId}, 
	         success: function(result)
	         {  

	         	$('#myreport').html(result);

	         }
         });
       $('#ownModal').modal();

   }
</script>



<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/reports/index.blade.php ENDPATH**/ ?>