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
      <h1><a class="btn btn-success" href="{{ url('/gatepass') }}">Back</a></h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Details</h3>
               </div>
               <form role="form" method="post" action="{{ url('/gatepass') }}" >
                  @csrf
                  <div class="box-body">
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="CompanyName">Company Name</label>
                           <select class="form-control @error('CompanyName') is-invalid @enderror" id="CompanyName" name="CompanyName" onchange="sinumber(this)">
                              <option value="">Select Company Name</option>
                              @foreach($data as $key)
                              <option value="{{$key->CompanyId}}-{{$key->CompanyCode}}" {{($key->CompanyId == old('CompanyId'))? 'selected' : ''}}>{{$key->NameShown}}</option>
                              @endforeach
                           </select>
                           @error('CompanyName')
                           <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                           @enderror
                        </div>
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
                              <label for="Company">Company</label>
                              <input type="text" class="form-control @error('Company') is-invalid @enderror" id="Company" name="Company" value="{{ old('Company') }}">
                              @error('Company')
                              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                              @enderror
                           </div>
                           <div class="form-group col-md-3">
                              <label for="Address">Address</label>
                              <input type="text" class="form-control @error('Address') is-invalid @enderror" id="Address" name="Address" value="{{ old('Address') }}">
                              @error('Address')
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
                        <div class="form-group col-md-3" hidden>
                           <label for="SINumber">Company Code</label>
                           <input type="text" class="form-control @error('SINumber') is-invalid @enderror" id="SINumber" name="SINumber" readonly>
                           @error('SINumber')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="GatePassType">Gate Pass Type</label>
                           <select class="form-control @error('GatePassType') is-invalid @enderror" id="GatePassType" name="GatePassType">
                              <option value="">Select Company</option>
                              <option value="RETURNABLE">RETURNABLE</option>
                              <option value="NON-RETURNABLE">NON-RETURNABLE</option>
                           </select>
                           @error('GatePassType')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="PersonName">Person Name</label>
                           <input type="text" class="form-control @error('PersonName') is-invalid @enderror" id="PersonName" name="PersonName" value="{{ old('PersonName') }}">
                           @error('PersonName')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="VendorDesignation">Vendor Designation</label>
                           <input type="text" class="form-control @error('VendorDesignation') is-invalid @enderror" id="VendorDesignation" name="VendorDesignation" value="{{ old('VendorDesignation') }}">
                           @error('VendorDesignation')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="Department">Department</label>
                           <input type="text" class="form-control @error('Department') is-invalid @enderror" id="Department" name="Department" value="{{ old('Department') }}" >
                           @error('Department')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="ModeofDespatch">Mode of Dispatch</label>
                           <input type="text" class="form-control @error('ModeofDespatch') is-invalid @enderror" id="ModeofDespatch" name="ModeofDespatch" value="{{ old('ModeofDespatch') }}">
                           @error('ModeofDespatch')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="SupplyFrom">Supply Will be From</label>
                           <input type="text" class="form-control @error('SupplyFrom') is-invalid @enderror" id="SupplyFrom" name="SupplyFrom" value="{{ old('SupplyFrom') }}">
                           @error('SupplyFrom')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="SupplyTo">Supply To</label>
                           <input type="text" class="form-control @error('SupplyTo') is-invalid @enderror" id="SupplyTo" name="SupplyTo" value="{{ old('SupplyTo') }}">
                           @error('SupplyTo')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="ClientNo">Client No.</label>
                           <input type="text" class="form-control @error('ClientNo') is-invalid @enderror" id="ClientNo" name="ClientNo" value="{{ old('ClientNo') }}">
                           @error('ClientNo')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="CC">CC</label>
                           <input type="text" class="form-control @error('CC') is-invalid @enderror" id="CC" name="CC" value="{{ old('CC') }}">
                           @error('CC')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="Office">Office</label>
                           <input type="text" class="form-control @error('Office') is-invalid @enderror" id="Office" name="Office" value="{{ old('Office') }}">
                           @error('Office')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="Consignee">Consignee Name</label>
                           <input type="text" class="form-control @error('Consignee') is-invalid @enderror" id="Consignee" name="Consignee" value="{{ old('Consignee') }}">
                           @error('Consignee')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="Date">Date</label>
                           <input type="Date" class="form-control @error('Date') is-invalid @enderror" id="Date" name="Date" value="{{ old('Date') }}">
                           @error('Date')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group col-md-3">
                           <label for="TimeOut">Time Out</label>
                           <input type="text" class="form-control @error('TimeOut') is-invalid @enderror" id="TimeOut" name="TimeOut" value="{{ old('TimeOut') }}">
                           @error('TimeOut')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-3">
                           <label for="Descriptionofmaterial">Description of Material</label>
                           <input type="text" class="form-control" id="Descriptionofmaterial" name="Descriptionofmaterial[]">
                        </div>
                        <div class="form-group col-md-2">
                           <label for="PartNumber">Part Number</label>
                           <input type="text" class="form-control" id="PartNumber" name="PartNumber[]">
                        </div>
                        <div class="form-group col-md-1">
                           <label for="Quantity">Quantity</label>
                           <input type="text" class="form-control" id="Quantity_0" name="Quantity[]" oninput="calculate(this);">
                        </div>
                        <div class="form-group col-md-1">
                           <label for="UnitRate">Unit Rate</label>
                           <input type="text" class="form-control" id="UnitRate_0" name="UnitRate[]" oninput="calculate(this);">
                        </div>
                        <div class="form-group col-md-1">
                           <label for="NetPrice">Net Price</label>
                           <input type="text" class="form-control" id="NetPrice_0" name="NetPrice[]" readonly>
                        </div>
                        <div class="form-group col-md-2">
                           <label for="Remarks">Remark</label>
                           <input type="text" class="form-control" id="Remarks" name="Remarks[]">
                        </div>
                        <div class="col-md-2">
                           <button type="button" style="margin-top: 24px;" onclick="add_row()" class="btn btn-info">Add</button>
                        </div>
                        <div id="addval">
                        </div>
                     </div>
                     <div class="form-group col-md-2">
                        <label for="TotalAmount">Total</label>
                        <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" readonly>
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
<script>
   var No = 1;
   var Num = 3;
   function add_row()
   {
     $('#addval').append(
         `<div id="result`+No+`">
               
               <div class="form-group col-md-3">
                            <label for="Descriptionofmaterial">Description of Material</label>
                            <input type="text" class="form-control" id="Descriptionofmaterial" name="Descriptionofmaterial[]">
                            
                           </div>
   
                           <div class="form-group col-md-2">
                            <label for="PartNumber">Part Number</label>
                            <input type="text" class="form-control" id="PartNumber" name="PartNumber[]">
                            
                           </div>
   
                           <div class="form-group col-md-1">
                            <label for="Quantity">Quantity</label>
                            <input type="text" class="form-control" id="Quantity_" name="Quantity[]" oninput="calculate(this);">
                           
                           </div>
   
                           <div class="form-group col-md-1">
                            <label for="UnitRate">Unit Rate</label>
                            <input type="text" class="form-control" id="UnitRate_" name="UnitRate[]" oninput="calculate(this);">
                           
                           </div>
   
                           <div class="form-group col-md-1">
                            <label for="NetPrice">Net Price</label>
                            <input type="text" class="form-control" id="NetPrice_" name="NetPrice[]" readonly>
                           
                           </div>
   
                           <div class="form-group col-md-2">
                            <label for="Remarks">Remark</label>
                            <input type="text" class="form-control" id="Remarks" name="Remarks[]">
                           
                           </div>
               
                           <div class="col-md-2">
                           <button type="button" style="margin-top: 24px;" onclick="remove_row(`+No+`)" class="btn btn-danger">Remove</button>
                           </div>
                       
           
         </div>`
       );
     No++;
     Num++;
   }
   
   function remove_row(id)
   {
     $('#result'+id).remove();
     finalcount();
   }
   
   function GetDivision(e)
    {
       var RailwaysId = e.value;
        $.ajax({
          url: "/gatepass/get-division",
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
   
   
   function sinumber(e)
   {
     var code = e.value.split("-")[1];
     $('#SINumber').val(code);
   }
   
   function calculate(e)
   {
     id = e.id.split("_")
     var quantity = document.getElementById('Quantity_'+id[1]).value; 
     var rate = document.getElementById('UnitRate_'+id[1]).value; 
     var myResult = quantity * rate;
     //var gst = document.getElementById('GST_'+id[1]).value;
     document.getElementById('NetPrice_'+id[1]).value = myResult;
     finalcount();
   }
   
   function finalcount()
   {
     
     var ngst = $("input[name='NetPrice[]']")
               .map(function(){return $(this).val();}).get();
     
   
     var total = 0;
   
     
     for(var i = 0; i < ngst.length; i++)
     {
       total += parseFloat(ngst[i]);
     }
     document.getElementById('TotalAmount').value = total;
   }
</script>