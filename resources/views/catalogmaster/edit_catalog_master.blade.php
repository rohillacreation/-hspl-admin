@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1><a class="btn btn-success" href="{{ url('/catalog-master') }}">Back</a></h1>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Catalog Master</h3>
            </div>
            @foreach($data as $key)
            <form role="form" method="post" action="{{ url('/catalog-master') }}/{{$key->CatalogId}}" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="box-body">
                  <div class="row">
                     
                     <div class="form-group col-md-3">
                        <label for="MachineType">Machine Type</label>
                        <select class="form-control @error('MachineType') is-invalid @enderror" id="MachineType" name="MachineType" >
                           <option value="">Select Machine Type</option>
                           @foreach($data1 as $info)
                           <option value="{{$info->MachineCategoryId}}" {{($info->MachineCategoryId == $key->MachineCategoryId) ? 'selected' : ''}}>{{$info->MachineCategoryName}}</option>
                           @endforeach
                        </select>
                        @error('MachineType')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                     </div>

                     <div class="form-group col-md-3">
                           <label for="MachineSubcategoryId">Machine Subcategory Name</label>
                           <select class="form-control @error('MachineSubcategoryId') is-invalid @enderror" id="MachineSubcategoryId" name="MachineSubcategoryId" >
                              <option value="">Select Machine Subcategory</option>
                           </select>
                           @error('MachineSubcategoryId')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                     <div class="form-group col-md-3">
                        <label for="MachineId">Machine Number</label>
                        <select class="form-control select2 @error('MachineId') is-invalid @enderror" multiple="multiple" data-placeholder="Select a Machine" id="MachineId" name="MachineId" >
                           <option value="">Select Machine Number</option>
                        </select>
                        @error('MachineId')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                     </div>

                     <div class="form-group col-md-3">
                        <label for="CatalogDescription">Catalog Description</label>
                        <textarea class="form-control @error('CatalogDescription') is-invalid @enderror" id="CatalogDescription" name="CatalogDescription" >{{$key->CatalogDescription}}</textarea>
                        @error('CatalogDescription')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                   </div>

                  <div class="row">

                     <div class="form-group col-md-3">
                        <label for="CatalogFile">Catalog File</label>
                        <input type="file" class="form-control @error('CatalogFile') is-invalid @enderror" id="CatalogFile" name="CatalogFile" accept=".pdf" value="{{ $key->CatalogFile }}">
                        @error('CatalogFile')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                  </div>
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
            @endforeach
            </div>
         </div>
      </div>
</section>
</div>
@include('layouts.footer')
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
   $(document).ready(function(){
    $('.select2').select2();
      var category_id = $('#MachineType').val();
       $.ajax({
         url: "/catalog-master/getsubcategory",
         type:'POST',
         data:{category_id : category_id}, 
         success: function(result)
         {
           var innerHtml = `<option value = "">Select Machine Sub Category</option>`;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.MachineSubcategoryId}" ${(element.MachineSubcategoryId == <?php echo $data[0]->MachineSubcategoryId?>) ? 'Selected' : ''}>${element.MachineSubcategoryName}</option>`;
             });
              
             $('#MachineSubcategoryId').html(innerHtml);
             get_machine(); 
         }
         });
    });

       $(document).ready(function(){
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

      function get_machine()
      {
    
         var subcategory_id = $('#MachineSubcategoryId').val();
       $.ajax({
         url: "/catalog-master/getmachinecategory",
         type:'POST',
         data:{subcategory_id : subcategory_id}, 
         success: function(result)
         {
           var innerHtml = ``;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.MachineId}" ${(element.MachineId == <?php echo $data[0]->MachineId?>) ? 'Selected' : ''}>${element.MachineSerialNumber}</option>`;
             });
               
             $('#MachineId').html(innerHtml);
         }
         });
      }    
      

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
                 innerHtml+=`<option value = "${element.MachineId}">${element.MachineSerialNumber}</option>`;
             });
               
             $('#MachineId').html(innerHtml);
         }
         });
       });
   });
</script>