@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
<style type="text/css">
  strong{
    color: red;
  }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/technical-description') }}">Back</a></h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Technical Description</h3>
            </div>
            <form role="form" method="post" action="{{ url('/technical-description') }}" enctype="multipart/form-data">
              @csrf

              <div class="box-body">
                <div class="row">

                        <div class="form-group col-md-3">
                           <label for="FileType">File Type</label>
                           <select class="form-control @error('FileType') is-invalid @enderror" id="FileType" name="FileType">
                              <option value="">Select File Type</option>
                              @foreach($WorkMaster as $work)
                              <option value="{{$work->WorkId}}">{{$work->WorkName}}</option>
                              @endforeach
                           </select>
                           @error('FileType')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                        
                        <div class="form-group col-md-3">
                        <label for="MachineType">Machine Type</label>
                        <select class="form-control @error('MachineType') is-invalid @enderror" id="MachineType" name="MachineType">
                           <option value="">Select Machine Type</option>
                           @foreach($MachineCategory as $Machine)
                           <option value="{{$Machine->MachineCategoryId}}">{{$Machine->MachineCategoryName}}</option>
                           @endforeach
                        </select>
                        @error('MachineType')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                     </div>

                     <div class="form-group col-md-3">
                           <label for="MachineSubcategoryId">Machine Subcategory Name</label>
                           <select class="form-control @error('MachineSubcategoryId') is-invalid @enderror" id="MachineSubcategoryId" name="MachineSubcategoryId">
                              <option value="">Select Machine Subcategory</option>
                           </select>
                           @error('MachineSubcategoryId')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="MachineId">Machine Number</label>
                           <select class="form-control select2 @error('MachineId') is-invalid @enderror" multiple="multiple" data-placeholder="Select a Machine" id="MachineId" name="MachineId[]">
                              <option value="">Select Machine</option>
                           </select>
                           @error('MachineId')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                      </div>

              <div class="row">

                        <div class="form-group col-md-3">
                           <label for="DescriptionFile">Description File</label>
                           <input type="file" class="form-control @error('DescriptionFile') is-invalid @enderror" id="DescriptionFile" name="DescriptionFile" accept=".pdf">
                           @error('DescriptionFile')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="DescriptionTitle">Description Title</label>
                           
                           <textarea class="form-control @error('DescriptionTitle') is-invalid @enderror" id="DescriptionTitle" name="DescriptionTitle">{{ old('DescriptionTitle') }}</textarea>
                           @error('DescriptionTitle')
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
          </div>
        </div>
      </div>
    </section>
  </div>
@include('layouts.footer')
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Fetch Sub_categories -->
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
                 innerHtml+=`<option value = "${element.MachineId}">${element.MachineSerialNumber}</option>`;
             });
               
             $('#MachineId').html(innerHtml);
         }
         });
       });
   });
</script>