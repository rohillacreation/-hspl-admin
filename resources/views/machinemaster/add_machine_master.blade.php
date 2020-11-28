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
               <form role="form" method="post" action="{{ url('/machine-master') }}">
                  @csrf
                  <div class="box-body">
                     
                      
                          <div class="form-group col-md-3">
                             <label for="OrganisationId">Organisation</label>
                             <select class="form-control @error('OrganisationId') is-invalid @enderror" id="OrganisationId" name="OrganisationId" onchange="showrailwayorprivate(this)">
                             <option value="">Select Organisation</option>
                             @foreach($Organisation as $OrganisationData)
                             <option value="{{$OrganisationData->OrganisationId}}" {{($OrganisationData->OrganisationId == old('OrganisationId'))?'selected':''}} >{{$OrganisationData->OrganisationName}}</option>
                             @endforeach
                             </select>
                             @error('OrganisationId')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                             @enderror
                           </div>


                           <div  id="organisationselect" style="display: none;">

                               <div class="form-group col-md-3">
                               <label for="CompanyName">Company Name</label>
                               <input type="text" class="form-control @error('CompanyName') is-invalid @enderror" id="CompanyName" name="CompanyName" value="{{ old('CompanyName') }}">
                               @error('CompanyName')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                               @enderror
                              </div>
                              <div class="form-group col-md-3">
                                <label for="CompanyLocation">Company Location</label>
                                <input type="text" class="form-control @error('CompanyLocation') is-invalid @enderror" id="CompanyLocation" name="CompanyLocation" value="{{ old('CompanyLocation') }}">
                                 @error('CompanyLocation')
                                 <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                 @enderror
                                 </div>
                              </div>


                        <div id="railway" style=" display: none;">
                        <div class="form-group col-md-3">
                           <label for="RailwaysId">Railways Zone</label>
                           <select class="form-control @error('RailwaysId') is-invalid @enderror" id="RailwaysId" name="RailwaysId" onchange="GetDivision(this)">
                              <option value="">Select Railways Zone</option>
                              @foreach($Railways as $Railway)
                                <option value="{{$Railway->RailwaysId}}" {{($Railway->RailwaysId == old('RailwaysId')) ? 'selected':''}} >{{$Railway->RailwaysZone}}</option>
                              @endforeach
                           </select>
                           @error('RailwaysId')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> 
                           @enderror
                        </div>
                        
                        <div class="form-group col-md-3">
                           <label for="DevisionId">Division</label>
                           <select class="form-control @error('DevisionId') is-invalid @enderror" id="DevisionId" name="DevisionId">
                              <option value="">Select Division</option>
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
                                <option value="{{$machine->MachineCategoryId}}" {{($machine->MachineCategoryId == old('MachineCategoryId'))?'selected':''}} > {{ $machine->MachineCategoryName }} </option>
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
                           <input type="text" class="form-control @error('ClientName') is-invalid @enderror" id="ClientName" name="ClientName" value="{{ old('ClientName') }}">
                           @error('ClientName')
                             <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="MachineName">Machine Name</label>
                           <input type="text" class="form-control @error('MachineName') is-invalid @enderror" id="MachineName" name="MachineName" value="{{ old('MachineName') }}">
                           @error('MachineName')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="MachineSerialNumber">Machine Serial Number</label>
                           <input type="text" class="form-control @error('MachineSerialNumber') is-invalid @enderror" id="MachineSerialNumber" name="MachineSerialNumber" value="{{ old('MachineSerialNumber') }}">
                           @error('MachineSerialNumber')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="MachineOrderNo">Machine Order Number</label>
                           <input type="text" class="form-control @error('MachineOrderNo') is-invalid @enderror" id="MachineOrderNo" name="MachineOrderNo" value="{{ old('MachineOrderNo') }}">
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
                              <option value="W">Yes</option>
                              <option value="NW">No</option>
                           </select>
                           @error('MachineWarranty')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
                        <div id="Warranty" style="display: none;">
                          <div class="form-group col-md-3">
                             <label for="MachineWarrantyFrom">Machine Warranty From</label>
                             <input type="Date" class="form-control @error('MachineWarrantyFrom') is-invalid @enderror" id="MachineWarrantyFrom" name="MachineWarrantyFrom" value="{{ old('MachineWarrantyFrom') }}">
                             @error('MachineWarrantyFrom')
                             <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                          </div>
                          <div class="form-group col-md-3">
                             <label for="MachineWarrantyTo">Machine Warranty To</label>
                             <input type="Date" class="form-control @error('MachineWarrantyTo') is-invalid @enderror" id="MachineWarrantyTo" name="MachineWarrantyTo" value="{{ old('MachineWarrantyTo') }}">
                             @error('MachineWarrantyTo')
                             <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                          </div>
                        </div>
              
                        <div class="form-group col-md-3">
                           <label for="MachineAllotmentDate">Machine Allotment Date</label>
                           <input type="Date" class="form-control @error('MachineAllotmentDate') is-invalid @enderror" id="MachineAllotmentDate" name="MachineAllotmentDate" value="{{ old('MachineAllotmentDate') }}">
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
            </div>
         </div>
      </div>
   </section>
</div>
@include('layouts.footer')
<!-- Fetch Sub_categories -->
<script>
   $(document).ready(function(){
       $("#MachineType").change(function(e){
         var category_id = e.target.value;
       $.ajax({
         url: "/machine-master/getsubcategory",
         type:'POST',
         data:{category_id : category_id}, 
         success: function(result)
         {
          console.log(result);
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
           var innerHtml = `<option value = "">Select Division</option>`;
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
         $('#Warranty').hide();
       }
   }

   function showrailwayorprivate(e)
   {
    if(e.value=='1')
    {
      $('#organisationselect').hide();
      $('#railway').show();
    }
    else
    {
       $('#organisationselect').show();
      $('#railway').hide();

    }
   }
</script>