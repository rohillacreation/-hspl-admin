<style type="text/css">
  table {
    border-left: 0.01em solid black;
    border-right: 0;
    border-top: 0.01em solid black;
    border-bottom: 0;
    
}
table td,
table th {
    border-left: 0;
    border-right: 0.01em solid black;
    border-top: 0;
    border-bottom: 0.01em solid black;
}
</style>
   <?php $__currentLoopData = $passdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(!$key->CompanyLocations): ?>
      <table width="100%;" style="border-color: white;">
         <tr>
            <th style="text-align: left;float: left;border-color: white;">Railway Zone:- <?php echo e($key->RailwaysZone); ?></th>
            <th style="text-align: center;float: right;border-color: white;"><b><?php echo e($key->CompanyName); ?></b></th>

            
         </tr>
         <tr style="border: hidden;">
            <th style="text-align: left;float: left;border-color: white;">Devision Name:- <?php echo e($key->DevisionName); ?></th>
            <th style="text-align: center;float: right;border-color: white;"><b><?php echo e($key->CompanyAddress); ?></b></th>

         </tr>
         <tr style="border: hidden;">
            <th style="text-align: left;float: left;border-color: white;">Address:- <?php echo e($key->CompanyLocation); ?></th>
            <th style="text-align: center;float: right;border-color: white;"><b>Challan Cum Packing List</b></th>
         </tr>
         <tr>
            <th style="text-align: left;float: left;border-color: white;">GST:- <?php echo e($key->GSTNumber); ?></th>
            
         </tr>

          

         </table>

         <table style="float: right;width: 70%;text-align: center;">
           <tr>
             <th>Number </th>
             <th>Date </th>
             <th>Time Out</th>
           </tr>
           <tr>
             <td><?php echo e($key->SINumber); ?></td>
             <td><?php echo e($key->Date); ?></td>
             <td><?php echo e($key->TimeOut); ?></td>
           </tr>
           
           
           
          </table>
      
      <?php else: ?>
      <table style="width: 100%;border-color: white;">
         <tr>
            <th style="text-align: left;float: left;border-color: white;">Company Name:- <?php echo e($key->Company); ?></th>
            <th style="text-align: center;float: right;border-color: white;"><b><?php echo e($key->CompanyName); ?></b></th>
         </tr>
         <tr>
            <th style="text-align: left;float: left;border-color: white;">Location:- <?php echo e($key->CompanyLocations); ?></th>
            <th style="text-align: center;float: right;border-color: white;"><b><?php echo e($key->CompanyAddress); ?></b></th>
         </tr>
         <tr style="border: none;">
           <th style="text-align: left;float: left;border-color: white;"></th>
           <th style="text-align: center;float: right;border-color: white;"><b>Challan Cum Packing List</b></th>
         </tr>

          
         
      </table>

      <table style="float: right;text-align: center;width: 70%;">
           <tr>
             <th>Number </th>
             <th>Date </th>
             <th>Time Out</th>
           </tr>
           <tr>
             <td><?php echo e($key->SINumber); ?></td>
             <td><?php echo e($key->Date); ?></td>
             <td><?php echo e($key->TimeOut); ?></td>
           </tr>
          </table>
      <?php endif; ?>

      <table style="width: 40%;margin-top: 50px;border-color: white;">
           <tr>
          </tr>
           
      </table>

      <table style="float: right;width: 50%;margin-top: 10px;text-align: center;">
           <tr>
             <th>Client No</th>
             <th>CC</th>
             <th>Office</th>
             <!-- <th style="width: 40%;"></th> -->
           </tr>
           <tr>
             <td><?php echo e($key->ClientNo); ?></td>
             <td><?php echo e($key->CC); ?></td>
             <td><?php echo e($key->Office); ?></td>
           </tr>
           
      </table>
      
      
      <table style="margin-top: 20px;border-color: white;">
         <tr>
            <th style="text-align: left;border-color: white;"><b>Person Name:-<?php echo e($key->PersonName); ?></b></th>
         </tr>
      </table>
      <table style="width: 50%;">
         <tr>
            <th style="text-align: left;">Designation:-<?php echo e($key->Designation); ?></th>
            <th style="text-align: left;">Department:-<?php echo e($key->Department); ?></th>
         </tr>
      </table>
      <table style="float: right;width: 40%;border-color: white;">
      <tr>
      <th style="text-align: center; font-size: 20px;border-color: white; "><b><?php echo e($key->GatePassType); ?></b></th></tr>
      </table>


      <table style="width: 100%;margin-top: 50px;">
         <tr>
            <th style="text-align: left;"><b>Supply will be From:<?php echo e($key->SupplyFrom); ?></b><b style="margin-left: 300px;" >To:<?php echo e($key->SupplyTo); ?></b></th>
          
         </tr>
         <tr>
            <th style="text-align: left;">Consignee:<?php echo e($key->Consignee); ?></th>
          
         </tr>
         <tr>
            <th style="text-align: left;">Mode of despatch : <?php echo e($key->ModeofDespatch); ?></th>
            
         </tr>
      </table>
      <table style="width: 100%;">
         <tr>
            <th class="col-sm-1" style="text-align: center;" >S.No.</th>
            <th class="col-sm-4" style="text-align: center;">Description</th>
            <th class="col-sm-2" style="text-align: center;">Part Number</th>
            <th class="col-sm-1" style="text-align: center;">Qty</th>
            <th class="col-sm-2" style="text-align: center;">Unit Price</th>
            <th class="col-sm-2" style="text-align: center;">Total Net Price</th>
         </tr>
         <?php $i = 1; ?>
         <?php $__currentLoopData = $key->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td class="col-sm-1"><?php echo e($i++); ?>.</td>
            <td class="col-sm-4"><?php echo e($p->Descriptionofmaterial); ?></td>
            <td class="col-sm-2"><?php echo e($p->PartNumber); ?></td>
            <td class="col-sm-1" style="text-align: center;"><?php echo e($p->Quantity); ?></td>
            <td class="col-sm-2" style="text-align: center;"><?php echo e($p->UnitPrice); ?></td>
            <td class="col-sm-2" style="text-align: right;"><?php echo e($p->NetPrice); ?></td>
         </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php if($key->RailwaysId): ?>

         
         <tr>
          <td class="col-sm-1"></td>
           <td class="col-sm-7"><b>Notes:- The material is NOT FOR SALE. The material will be used for INDIAN RAILWAYS. There is no commercial value involved. There is no Commercial value involved in this.</b></td>
           <td class="col-sm-1"></td>
           <td class="col-sm-1"></td>
           <td class="col-sm-1"></td>
           <td class="col-sm-1"></td>
         </tr>

         <?php else: ?>

          <tr>
          <td class="col-sm-1"></td>
           <td class="col-sm-7"><b>Notes:- The material is NOT FOR SALE. The material will be used for <?php echo e($key->Company); ?>. There is no Commercial value involved in this.</b></td>
           <td class="col-sm-1"></td>
           <td class="col-sm-1"></td>
           <td class="col-sm-1"></td>
           <td class="col-sm-1"></td>
         </tr>

         <?php endif; ?>

         <tr>
           <td class="col-sm-1"></td>
           <td class="col-sm-4"></td>
           <td class="col-sm-2"></td>
           <td class="col-sm-1"></td>
           <td class="col-sm-2"><b>Total</b></td>
           <td class="col-sm-2" style="text-align: right;"><b><?php echo e($key->TotalAmount); ?></b></td>

         </tr>
         
         
      </table>
      <table style="width: 100%;margin-top: 4%;border-color: white;">
        <tr>
          <th style="text-align: left;border-color: white;">Signature of Store Incharge</th>
          <th style="text-align: right;border-color: white;">Signature of Consignee</th>
        </tr>
      </table>
      <table style="width: 100%;margin-top: 3%;border-color: white;">
        <tr>
          <th style="text-align: left;border-color: white;">
            <b>Registered Office:</b> <?php echo e($key->CompanyAddress); ?>         
          <td style="text-align: right; margin-top: 5%;border-color: white;"><b><?php echo e($key->NameShown); ?></b></td>
          </th>
        </tr>
        
          
      
      </table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/gatepass/gatepass_format.blade.php ENDPATH**/ ?>