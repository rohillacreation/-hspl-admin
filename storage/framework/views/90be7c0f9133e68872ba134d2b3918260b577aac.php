<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('bower_components/select2/dist/css/select2.min.css')); ?>">
<style type="text/css">
   strong{
   color: red;
   }
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1><a class="btn btn-success" href="<?php echo e(url('/catalog-master')); ?>">Back</a></h1>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Add New Catalog</h3>
            </div>
            <form role="form" method="post" action="<?php echo e(url('/catalog-master')); ?>" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <div class="box-body">
                  <div class="row">
                    
                    <div class="form-group col-md-3">
                        <label for="MachineType">Machine Type</label>
                        <select class="form-control <?php $__errorArgs = ['MachineType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineType" name="MachineType">
                           <option value="">Select Machine Type</option>
                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($info->MachineCategoryId); ?>" <?php echo e(($info->MachineCategoryId == old('MachineCategoryId')) ? 'selected' : ''); ?>><?php echo e($info->MachineCategoryName); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['MachineType'];
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

                     <div class="form-group col-md-3">
                           <label for="MachineSubcategoryId">Machine Subcategory Name</label>
                           <select class="form-control <?php $__errorArgs = ['MachineSubcategoryId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="MachineSubcategoryId" name="MachineSubcategoryId">
                              <option value="">Select Machine Subcategory</option>
                           </select>
                           <?php $__errorArgs = ['MachineSubcategoryId'];
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

                        <div class="form-group col-md-3">
                           <label for="MachineId">Railways Order No</label>
                           <select class="form-control select2 <?php $__errorArgs = ['MachineId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple="multiple" data-placeholder="Select a Machine Order" id="MachineId" name="MachineId[]" >
                              <option value="">Select Machine Order</option>
                           </select>
                           <?php $__errorArgs = ['MachineId'];
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
                      
                      <div class="form-group col-md-3">
                        <label for="CatalogDescription">Catalog Description</label>
                        <textarea class="form-control <?php $__errorArgs = ['CatalogDescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="CatalogDescription" name="CatalogDescription"><?php echo e(old('CatalogDescription')); ?></textarea>
                        <?php $__errorArgs = ['CatalogDescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>
                   </div>

                  <div class="row">

                     <div class="form-group col-md-3">
                        <label for="CatalogFile">Catalog File</label>
                        <input type="file" class="form-control <?php $__errorArgs = ['CatalogFile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="CatalogFile" name="CatalogFile" accept=".pdf" >
                        <?php $__errorArgs = ['CatalogFile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>

                  </div>
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
            </div>
         </div>
      </div>
</section>
</div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>
<script>
   $(document).ready(function(){
    $('.select2').select2();
       $("#MachineType").change(function(e){
         var category_id = e.target.value;
       $.ajax({
         url: "/catalog-master/getsubcategory",
         type:'POST',
         data:{category_id : category_id}, 
         success: function(result)
         {
           var innerHtml = `<option value = "">Select Machine Sub Category</option>`;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.MachineSubcategoryId}">${element.MachineSubcategoryName}</option>`;
             });
               
             $('#MachineSubcategoryId').html(innerHtml);
         }
         });
       });
   });

    $(document).ready(function(){
       $("#MachineSubcategoryId").change(function(e){
         var subcategory_id = e.target.value;
       $.ajax({
         url: "/catalog-master/getmachinecategory",
         type:'POST',
         data:{subcategory_id : subcategory_id}, 
         success: function(result)
         {
           var innerHtml = ``;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.MachineId}">${element.MachineOrderNo}</option>`;
             });
               
             $('#MachineId').html(innerHtml);
             
         }
         });
       });
   });  

   
</script><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/catalogmaster/add_catalog_master.blade.php ENDPATH**/ ?>