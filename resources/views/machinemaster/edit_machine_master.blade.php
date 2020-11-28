@include('layouts.header')
@include('layouts.sidebar')
<style type="text/css">
   strong{
   color: red;
   }
</style>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1><a class="btn btn-success" href="{{ url('/machine-master') }}">Back</a></h1>
      
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Machine</h3>
               </div>
               @foreach($data as $key)
               <form role="form" method="post" action="{{ url('/machine-master') }}/{{$key->MachineId}}">
                  @csrf
                  @method('PUT')
                  <div class="box-body">
                     <div class="form-group col-md-3">
                        <label for="OrganisationId">Organisation</label>
                        <select class="form-control @error('OrganisationId') is-invalid @enderror" id="OrganisationId" name="OrganisationId" onchange="showrailwayorprivate(this);">
                        <option value="">Select Organisation</option>
                        @foreach($Organisation as $OrganisationData)
                        <option value="{{$OrganisationData->OrganisationId}}" {{($OrganisationData->OrganisationId == $key->OrganisationId) ? 'selected' : ''}}>{{$OrganisationData->OrganisationName}}</option>
                        @endforeach
                        </select>
                        @error('OrganisationId')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                      </div>

                      <div  id="organisationselect" style="display: none;">
                       <div class="form-group col-md-3">
                         <label for="CompanyName">Company Name</label>
                         <input type="text" class="form-control @error('CompanyName') is-invalid @enderror" id="CompanyName" name="CompanyName" value="{{ $key->Company }}">
                         @error('CompanyName')
                         <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                         @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="CompanyLocation">Company Location</label>
                            <input type="text" class="form-control @error('CompanyLocation') is-invalid @enderror" id="CompanyLocation" name="CompanyLocation" value="{{ $key->CompanyLocation }}">
                            @error('CompanyLocation')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                      </div>

                      <div id="railway" style=" display: none;">
                        <div class="form-group col-md-3">
                           <label for="RailwaysId">Railways Zone</label>
                           <select class="form-control @error('RailwaysId') is-invalid @enderror" id=  "RailwaysId" name="RailwaysId" onchange="GetDivision(this)">
                           <option value="">Select Railways Zone</option>
                           @foreach($Railways as $Railway)
                           <option value="{{$Railway->RailwaysId}}" {{($Railway->RailwaysId == $key->RailwaysId) ? 'selected' : ''}}>{{$Railway->RailwaysZone}}</option>
                           @endforeach
                           </select>
                            @error('RailwaysId')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="DevisionId">Division</label>
                           <select class="form-control @error('DevisionId') is-invalid @enderror" id="DevisionId" name="DevisionId">
                              <option value="">Select Devision</option>
                           </select>
                           @error('DevisionId')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                      </div>

                      <div class="form-group col-md-3">
                         <label for="MachineType">Machine Type</label>
                         <select class="form-control @error('MachineType') is-invalid @enderror" id="MachineType" name="MachineType">
                         <option value="">Select Machine Type</option>
                         @foreach($MachineCategory as $machine)
                         <option value="{{$machine->MachineCategoryId}}" {{($machine->MachineCategoryId == $key->MachineCategoryId) ? 'selected' : ''}}> {{ $machine->MachineCategoryName }} </option>
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
                           <label for="ClientName">Client Name</label>
                           <input type="text" class="form-control @error('ClientName') is-invalid @enderror" id="ClientName" name="ClientName" value="{{ $key->ClientName }}">
                           @error('ClientName')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="MachineName">Machine Name</label>
                           <input type="text" class="form-control @error('MachineName') is-invalid @enderror" id="MachineName" name="MachineName" value="{{$key->MachineName}}">
                           @error('MachineName')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="MachineSerialNumber">Machine Serial Number</label>
                           <input type="text" class="form-control @error('MachineSerialNumber') is-invalid @enderror" id="MachineSerialNumber" name="MachineSerialNumber" value="{{$key->MachineSerialNumber}}">
                           @error('MachineSerialNumber')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                        <div class="form-group col-md-3">
                           <label for="MachineOrderNo">Machine Order Number</label>
                           <input type="text" class="form-control @error('MachineOrderNo') is-invalid @enderror" id="MachineOrderNo" name="MachineOrderNo" value="{{$key->MachineOrderNo}}">
                           @error('MachineOrderNo')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>

                    
                  
                        <div class="form-group col-md-3">
                           <label for="MachineWarranty">Machine Warranty</label>
                           <select class="form-control @error('MachineWarranty') is-invalid @enderror" id="MachineWarranty" name="MachineWarranty" onchange="ShowHideDiv(this)" >
                              <option value="">Select Machine Warranty</option>
                              <option value="W"  {{($key->MachineWarranty == 'W') ? 'selected' : ''}}>Yes</option>
                              <option value="NW"  {{($key->MachineWarranty == 'NW') ? 'selected' : ''}}>No</option>
                           </select>
                           @error('MachineCategoryId')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>

                        <div id="Warranty" style="display: none;">
                          <div class="form-group col-md-3">
                             <label for="MachineWarrantyFrom">Machine Warranty From</label>
                             <input type="Date" class="form-control @error('MachineWarrantyFrom') is-invalid @enderror" id="MachineWarrantyFrom" name="MachineWarrantyFrom" value="{{$key->MachineWarrantyFrom}}">
                             @error('MachineWarrantyFrom')
                             <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                          </div>

                          <div class="form-group col-md-3">
                             <label for="MachineWarrantyTo">Machine Warranty To</label>
                             <input type="Date" class="form-control @error('MachineWarrantyTo') is-invalid @enderror" id="MachineWarrantyTo" name="MachineWarrantyTo" value="{{ $key->MachineWarrantyTo }}">
                             @error('MachineWarrantyTo')
                             <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                          </div>

                        </div>

                        <div class="form-group col-md-3">
                           <label for="MachineAllotmentDate">Machine Allotment Date</label>
                           <input type="Date" class="form-control @error('MachineAllotmentDate') is-invalid @enderror" id="MachineAllotmentDate" name="MachineAllotmentDate" value="{{ $key->MachineAllotmentDate }}">
                           @error('MachineAllotmentDate')
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
<!-- Fetch Sub_categories -->
<script>
   $(document).ready(function(){
      var category_id = $('#MachineType').val();
       $.ajax({
         url: "/machine-master/getsubcategory",
         type:'POST',
         data:{category_id : category_id},
         success: function(result)
         {
           var innerHtml = `<option value = "">Select Machine Sub Category</option>`;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.MachineSubcategoryId}" ${(element.MachineSubcategoryId == <?php echo $data[0]->MachineSubcategoryId?>) ? 'Selected' : ''}>${element.MachineSubcategoryName}</option>`;
             });
               
             $('#MachineSubcategoryId').html(innerHtml);
         }
         });

      var RailwaysId = $('#RailwaysId').val();
       $.ajax({
            url: "/machine-master/get-division",
            type:'POST',
            data:{RailwaysId : RailwaysId},
            success: function(result)
            {
              var innerHtml = `<option value = "">Select Devision</option>`;
                result.forEach(element=>{
                    innerHtml+=`<option value = "${element.DevisionId}" ${(element.DevisionId == <?php echo $data[0]->DevisionId ? $data[0]->DevisionId : 0?> ) ? 'Selected' : ''}>${element.DevisionName}</option>`;
                });
                 
                $('#DevisionId').html(innerHtml);
            }
         });

       var e = $('#MachineWarranty').val();
       if(e == 'W')
       {
         $('#Warranty').show();
       }
       else
       {
         $('#Warranty').hide();
       }

      var r = $('#OrganisationId').val();
      if(r=='1')
      {
        
        $('#organisationselect').hide();
        $('#railway').show();
      }
      else
      {
         $('#organisationselect').show();
        $('#railway').hide();

      }

   });

   
   $(document).ready(function(){
       $("#MachineType").change(function(e){
         var category_id = e.target.value;
       $.ajax({
         url: "/machine-master/getsubcategory",
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

   function GetDivision(e)
   {
      var RailwaysId = e.value;
       $.ajax({
         url: "/machine-master/get-division",
         type:'POST',
         data:{RailwaysId : RailwaysId},
         success: function(result)
         {
           var innerHtml = `<option value = "">Select Devision</option>`;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.DevisionId}">${element.DevisionName}</option>`;
             });
               
             $('#DevisionId').html(innerHtml);
         }
         });
   }

   function ShowHideDiv(e)
   {
       if(e.value == 'W')
       {
         $('#Warranty').show();
       }
       else
       {
        document.getElementById('MachineWarrantyTo').value ='';
        document.getElementById('MachineWarrantyFrom').value ='';
         $('#Warranty').hide();
       }
   }


   function showrailwayorprivate(e)
   {
    if(e.value=='1')
    {
       document.getElementById('CompanyName').value='';
        document.getElementById('CompanyLocation').value='';
      $('#organisationselect').hide();
      $('#railway').show();
    }
    else
    {
       $('#organisationselect').show();
       document.getElementById('RailwaysId').value='';
       document.getElementById('DevisionId').value='';
      $('#railway').hide();

    }
   }
</script>