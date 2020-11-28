<style>
        table {
            text-align: center;
            border-collapse: collapse;
        }
        table td,th {
            border: 1px solid black;
            /*background-color: #0000ff66;*/
        }
        .rowspan {
            border-left-width: 10px;
        }
    </style>
<?php $__currentLoopData = $billdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<table style="width: 100%;" >
  <tr>
    <th colspan="7" style="text-align: center;border: none;">

      <h4>(<?php echo e($key->CompanyName); ?>)</h4>
      <p><?php echo e($key->CompanyAddress); ?></p>
      <h4>Purchase Order</h4>
    </th>
  </tr>
  <tr>
    <th colspan="7" style="text-align: right;border: none;">
      Date : - <b><?php echo e(date('d-m-Y', strtotime($key->PODate))); ?></b>
    </th>
  </tr>
  <tr>
    <th colspan="7" style="text-align: left;width: 50%;border: none;">
      <h5><b>PO No :- <?php echo e($key->PONumber); ?></b><b style="text-align: left;float: right;">GST No.:- <?php echo e($key->GSTNumber); ?></b></h5>
      
      <h5><b>Reference No.:- <?php echo e($key->ReferenceNumber); ?></b><b style="text-align: left;float: right;">Contact No.:- <?php echo e($key->CompanyNumber); ?></b></h5>
            
      <h5><b>To,</b></h5>
      <h5><b>Vendor Name:-<?php echo e($key->PartyName); ?></b><b style="text-align: left;float: right;">Vendor GST.:- <?php echo e($key->gstnumber); ?></b></h5>
      <h5><b>Vendor Address:- <?php echo e($key->RailwaysZone); ?>/<?php echo e($key->DevisionName); ?> <?php echo e($key->Company); ?>/<?php echo e($key->OurAddress); ?></b><b style="text-align: left;float: right;">Vendor Email.:- <?php echo e($key->PartyEmail); ?></b></h5>
      <h5><b>Vendor Contact Name:-<?php echo e($key->VendorContactName); ?></b></h5>
      <h5><b>Vendor Contact Number:- <?php echo e($key->PartyMobile); ?></b></h5> 
    </th>
  </tr>
</table>
<table style="width: 100%;">
  <tr>
    <th>Sr.No.</th>
    <th>Item Description</th>
    <th>Quantity</th>
    <th>Rate</th>
    <th>Unit</th>
    <th>Total value without GST</th>
    <th>GST(%)</th>
    <th>Total Value with GST</th>
  </tr>
  <?php $i = 1; ?>
  <?php $__currentLoopData = $key->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($i++); ?></td>
      <td><?php echo e($p->ItemDescription); ?></td>
      <td><?php echo e($p->Quantity); ?></td>
      <td><?php echo e($p->Rate); ?></td>
      <td><?php echo e($p->Unit); ?></td>
      <td><?php echo e($p->TotalValueWithoutGST); ?></td>
      <td><?php echo e($p->GST); ?> %</td>
      <td><?php echo e($p->TotalValueWithGST); ?></td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <th colspan="7"  style="text-align: left;">Total Amount</th>
    <td colspan="1"><?php echo e($key->TotalAmount); ?></td>
  </tr>
  <tr>
    <th colspan="7" style="text-align: left;">Total GST Amount</th>
    <td colspan="1"><?php echo e($key->TotalGstAmount); ?></td>
  </tr>
  <tr>
    <th colspan="7" style="text-align: left;">Grand Total<b style="float: right;"><?php echo e($key->TotalinWords); ?></b></th>
    <td colspan="1"><?php echo e($key->GrandTotal); ?></td>
  </tr>
</table>
<table style="width: 100%;">
  <tr><th colspan="7">Terms & Conditions</th></tr>
  <tr>
    <th colspan="2">Payment</th>
    <td colspan="5">100% of the total amount value will pe paid before dispatch of goods as per proforma Invoice</td>
  </tr>
  <tr>
    <th colspan="2">Delivery</th>
    <td colspan="5">Delivery must be made at the KOLKATA PORT/ HALDIA PORT whichever is informed you at the time of delivery. Transportation and loading and unloading charges will be paid extra as actual.</td>
  </tr>
  <tr>
    <th colspan="2">Packing</th>
    <td colspan="5">To be packed in strong case(s), suitable for long distance transportation by sea and well protected against moisture and shocks with wooden cases. Manufacturer certificate that the wooden packing materials have been heat treated and the IPPC mark stamped on the wooden case or pallet according to the international rule or the seller’s certificate certifying that the solid wood packing material in this shipment is not coniferous wood or the manufacturer certificate certifying that this shipment does not contain any wood packing material.</td>
  </tr>
  <tr>
    <th colspan="2">Shipping</th>
    <td colspan="5">KEEP AWAY FROM MOISTURE, HANDLE WITH CARE, THIS SIDE UP</td>
  </tr>
  <tr>
    <th colspan="2">Mark</th>
    <td colspan="5">The manufacture shall mark on each package with fadeless paint the package number, gross weight, net weight, measurement and the wordings: KEEP AWAY FROM MOISTURE, HANDLE WITH CARE, THIS SIDE UP etc. and the shipping mark.
    Shipping mark: CRCCE-PUC-2019-0009HARB, KUNMIMG CHINA</td>
  </tr>
  <tr>
    <th colspan="2">Terms of Delivery</th>
    <td colspan="5">For delivery of goods you will be given an advance intimation before 30 days for preparing the order. The minimum pieces per order will be in between 1 to 10. All the material will pe purchased till 2021 to 2022.</td>
  </tr>
  <tr>
    <th colspan="2">GST</th>
    <td colspan="5">As applicable,</td>
  </tr>
  <tr>
    <th colspan="2">Inspection</th>
    <td colspan="5">Self under Work Test Certificate issued by Manufacturer along with certificate of quality control. The manufacturer guarantees that the products hereof is made of excellent materials with first class workmanship brand new and unused and complies in all respects with the quality and specification and performance stipulated in this contract.</td>
  </tr>
  <tr>
    <th colspan="2">Late Delivery and Penalty </th>
    <td colspan="5">If Manufacturer fail to make delivery on time as stipulated in the contract, with exception the buyer shall agree to postpone the delivery on condition that the seller agree to pay a penalty. The penalty, however shall not exceed 5% of the total value of the commodities involved in the late delivery. The rate of penalty is charged at 0.5 % for every 7 days, odd days less than 7 days should be counted as 7 days if there is any delay in payment by buyer than it will be not in supplier account.</td>
  </tr>
  <tr>
    <th colspan="2">Quantity Variation</th>
    <td colspan="5">If Purchaser required, then QTY may be increased by 30%+ with same terms and condition.</td>
  </tr>
  <tr>
    <th colspan="2">Jurisdiction</th>
    <td colspan="5">All disputes are subject to Kolkata Jurisdiction only</td>
  </tr>
  <tr>
    <th colspan="7" style="text-align: left;">Warranty</th>
  </tr>
  <tr>
    <th colspan="7" style="text-align: left;">Non-Performance</th>
  </tr>
  <tr>
    <th colspan="7" style="text-align: left;">
      <p>Please share Performa Invoice to release the payment before dispatch along with account detail and GST certificate.</p>
      <p>Thanking You</p>
      <p>Yours Faithfully</p>
      <p>For <?php echo e($key->CompanyName); ?></p><br><br>
      <p style="text-align: right;">Authorized Signatory</p>
    </th>
  </tr>
</table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/PO_Bill/bill_format.blade.php ENDPATH**/ ?>