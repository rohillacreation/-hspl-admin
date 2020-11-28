<style>
        table {
            border-collapse: collapse;
        }
        table th,td {
            border: 1px solid black;
            /*background-color: #0000ff66;*/
        }
        .rowspan {
            border-left-width: 10px;
        }
    </style>

    <?php $__currentLoopData = $reportsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    
    
    <table style="width: 100%">
	    
    	<tr>
    		<th style="text-align: left;" colspan="10">Date:-<b style="color: #00000087;"><?php echo e($data->ServiceStartDate); ?></b></th>
    	</tr>
    	
	<tr>
		<th style="text-align: left;" colspan="5">Name:-    <b style="color: #00000087;"><?php echo e($data->EngineerName); ?></b> </th>
		<th style="text-align: left;" colspan="5">Department:-<b style="color: #00000087;"><?php echo e($data->Department); ?></b> </th>
	</tr>
	<tr>
		<th style="text-align: left;" colspan="2">Machine Type:-<b style="color: #00000087;"><?php echo e($data->MachineCategoryName); ?></b></th>
		<th style="text-align: left;" colspan="3">Machine Sr. No.:-<b style="color: #00000087;"><?php echo e($data->MachineSerialNumber); ?></b></th>
		<th style="text-align: left;" colspan="5">Ref. No.:-<b style="color: #00000087;"><?php echo e($data->ReferenceNumber); ?></b></th>
	</tr>
	<tr>
		<th style="text-align: left;" colspan="5">Place:-<b style="color: #00000087;"><?php echo e($data->ServiceLocation); ?></b></th>
		<th style="text-align: left;" colspan="5">Warranty:-<b style="color: #00000087;"><?php echo e($data->MachineWarranty); ?></b> </th>
	</tr>
	
    </table>

	<table style="width: 100%">
	
	<tr>
		<th style="text-align: left;" colspan="10">Travelling Details:-</th>
	</tr>
	<tr style="text-align: center;">
		<th colspan="1">Travel By</th>
		<th colspan="1">Arrival/Return</th>
		<th colspan="1">Time From</th>
		<th colspan="1">Time To</th>
		<th colspan="2">Travelling Place From</th>
		<th colspan="1">Travelling Place To</th>
		<th colspan="1">HRS Till</th>
		<th colspan="1">KM Travelled</th>
		<th colspan="1">Train/Flight No.</th>
	</tr>
	<?php $i = 1; ?>
	<?php $__currentLoopData = $data->travel_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr style="text-align: center;">
		<td colspan="1"><?php echo e($info->TravellingBy); ?></td>
		<td colspan="1"><?php echo e($info->arrivalreturn); ?></td>
		<td colspan="1"><?php echo e($info->TravellingTimeFrom); ?></td>
		<td colspan="1"><?php echo e($info->TravellingTimeTo); ?></td>
		<td colspan="1"><?php echo e($info->TravellingPlaceFrom); ?></td>
		<td colspan="2"><?php echo e($info->TravellingPlaceTo); ?></td>
		<td colspan="1"><?php echo e($info->HRSTill); ?></td>
		<td colspan="1"><?php echo e($info->KMTravelled); ?></td>
		<td colspan="1"><?php echo e($info->VehicleNumber); ?></td>
			
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	<tr>
		<th style="text-align: left;color: black;" colspan="10"><b>Nature of Complaint:-</b><b style="color: #00000087;"> <?php echo e($data->ComplaintNature); ?></b></th>
	</tr>

    </table>
    
   
    
	<table style="width: 100%;">
		 <tr>
		<th style="text-align: left;color: black;" colspan="10"><b>Details of Working Time:-</b></th>
	 </tr>
		<tr>
			<th colspan="1">Sr. No.</th>
			<th colspan="2">Service Date</th>
			<th colspan="2">Time From</th>
			<th colspan="2">Time To</th>
			<th colspan="1">Total HRS</th>
			<th colspan="2">Description</th>
		</tr>
		<?php $i = 1; ?>
	    <?php $__currentLoopData = $data->work_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td colspan="1"><?php echo e($i++); ?>.</td>
			<td colspan="2"><?php echo e($key->ServiceWorkDate); ?></td>
			<td colspan="2"><?php echo e($key->TimeFrom); ?></td>
			<td colspan="2"><?php echo e($key->TimeTo); ?></td>
			<td colspan="1"><?php echo e($key->TotalHRS); ?></td>
			<td colspan="2"><?php echo e($key->WorkDescription); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>


	<table style="width: 100%">
    
    

	<tr>
		<th style="text-align: left;" colspan="2">Engine HRS:-<b style="color: #00000087;"><?php echo e($data->EngineHRS); ?></b></th>
		<th style="text-align: left;" colspan="3">KM Reading:-<b style="color: #00000087;"><?php echo e($data->KiloMeterReading); ?></b></th>
		<th style="text-align: left;" colspan="5">Tamping Counter:-<b style="color: #00000087;"><?php echo e($data->TampingCounter); ?></b></th>
	</tr>

	<tr>
		<th style="text-align: left;" colspan="10">CONSUMPTION OF SPARES:-<b style="color: #00000087;"><?php echo e($data->SparesConsuption); ?></b></th>
	</tr>
	<tr>
		<th style="text-align: left;" colspan="10">Remarks:-<b style="color: #00000087;"><?php echo e($data->Remark); ?></b></th>
	</tr>
	
	
	<tr>
		<th style="text-align: left;border: none;padding-top: 50px;" colspan="5">SIGN. INCHARGE OF MACHINE</th>
		<th style="text-align: right;border: none;padding-top: 50px;" colspan="5">SIGN. SERVICE ENGINEER</th>
	</tr>
		
	</table>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/reports/reports_format.blade.php ENDPATH**/ ?>