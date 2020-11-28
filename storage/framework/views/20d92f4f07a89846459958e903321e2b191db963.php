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
 	       					<a class="btn btn-success" href="<?php echo e(url('/purchase_order/create')); ?>">Add PO Details</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Bill</th>
			                        <th>Company Name</th>
			                        <th>Organisation Name</th>
			                        <th>Railways Zone</th>
			                        <th>Devision Name</th>
			                        <th>Company</th>
			                        <th>Addres</th>
			                        <th>PO Number</th>
			                        <th>PO Date</th>
			                        <th>Vendor Name</th>
			                        <th>Vendor Contact Name</th>
			                        <th>Party Mobile</th>
			                        <th>Party Email</th>
			                        <th>GST Number</th>
			                        <th>Total Amount</th>
			                        <th>Total Gst Amount</th>
			                        <th>Grand Total</th>
			                        <th>Total in Words</th>
			                        

			                    </tr>
			                </thead>
			                <tbody>
			                  <?php $i = 1 ?>
			                  <?php $__currentLoopData = $podata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                  
			                    <tr>
			                        <td><?php echo e($i++); ?></td>
			                        <td>
			                        	<a href="#" id="<?php echo e($key->PoId); ?>" name="<?php echo e($key->PoId); ?>" onclick="bill(this)">View Bill</a>
			                        	<a href="<?php echo e(url('/purchase_order/pdf')); ?>/<?php echo e($key->PoId); ?>" style="float: left;"><b>Download PDF</b></a>
			                        </td>

			                        <td><?php echo e($key->NameShown); ?></td>
			                        <td><?php echo e($key->OrganisationName); ?></td>
			                        <td><?php echo e($key->RailwaysZone); ?></td>
			                        <td><?php echo e($key->DevisionName); ?></td>
			                        <td><?php echo e($key->Company); ?></td>
			                        <td><?php echo e($key->OurAddress); ?></td>
			                        <td><?php echo e($key->PONumber); ?></td>
			                        <td><?php echo e($key->PODate); ?></td>
			                        <td><?php echo e($key->PartyName); ?></td>
			                        <td><?php echo e($key->VendorContactName); ?></td>
			                        <td><?php echo e($key->PartyMobile); ?></td>
			                        <td><?php echo e($key->PartyEmail); ?></td>
			                        <td><?php echo e($key->gstnumber); ?></td>
			                        <td><?php echo e($key->TotalAmount); ?></td>
			                        <td><?php echo e($key->TotalGstAmount); ?></td>
			                        <td><?php echo e($key->GrandTotal); ?></td>
			                        <td><?php echo e($key->TotalinWords); ?></td>
			                        
			                        
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
			  		 
                      <!-- <a href="<?php echo e(url('/purchase_order/view_bill')); ?>" style="float: left;color: black;"><b>Download PDF</b></a> -->
                      
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"></p>
			        </div>
			        
			        <div class="box-body" id="Bill" style="min-height: 100px">
			        	
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
	function bill(e)
	   {
	   	var PoId = e.name;

	   	$.ajax({
		         url: "/purchase_order/view_bill",
		         type:'POST',
		         data:{PoId : PoId}, 
		         success: function(result)
		         {  
		         	$('#Bill').html(result);

		         }
	         });
	       $('#ownModal').modal();

	   }

</script>


<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/PO_Bill/index.blade.php ENDPATH**/ ?>