 @include('layouts.header')
 @include('layouts.sidebar')
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
		            	@if(Session::has('message'))
		            		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		            	@endif
		              	<div class="col-xs-12">
 	       					<a class="btn btn-success" href="{{ url('/gatepass/create') }}">Add Details</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Gate Pass</th>
			                        <th>SI Number</th>
			                        <th>CompanyName</th>
			                        <th>Organisation Name</th>
			                        <th>Railways Zone</th>
			                        <th>Division Name</th>
			                        <th>Company</th>
			                        <th>Address</th>
			                        <th>Person Name</th>
			                        <th>Vendor Designation</th>
			                        <th>Department</th>
			                        <th>Mode of Dispatch</th>
			                        <th>Supply From</th>
			                        <th>Supply To</th>
			                        <th>Client No</th>
			                        <th>CC</th>
			                        <th>Office</th>
			                        <th>Consignee</th>
			                        <th>Date</th>
			                        <th>TimeOut</th>                      

			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($gatedata as $key)
			                  
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>
			                        	
			                        	<a href="#" id="{{$key->GatePassId}}" name="{{$key->GatePassId}}" onclick="gatepass(this)">View Pass</a>
			                        	<a href="{{ url('/gatepass/pdf') }}/{{$key->GatePassId}}" style="float: left;"><b>Download PDF</b></a>
			                        </td>
			                        <td>{{$key->SINumber}}</td>
			                        <td>{{$key->CompanyName}}</td>
			                        <td>{{$key->OrganisationName}}</td>
			                        <td>{{$key->RailwaysZone}}</td>
			                        <td>{{$key->DevisionName}}</td>
			                        <td>{{$key->Company}}</td>
			                        <td>{{$key->CompanyLocations}}</td>
			                        <td>{{$key->PersonName}}</td>
			                        <td>{{$key->Designation}}</td>
			                        <td>{{$key->Department}}</td>
			                        <td>{{$key->ModeofDespatch}}</td>
			                        <td>{{$key->SupplyFrom}}</td>
			                        <td>{{$key->SupplyTo}}</td>
			                        <td>{{$key->ClientNo}}</td>
			                        <td>{{$key->CC}}</td>
			                        <td>{{$key->Office}}</td>
			                        <td>{{$key->Consignee}}</td>
			                        <td>{{$key->Date}}</td>
			                        <td>{{$key->TimeOut}}</td>
			                        
			                        
			                        
			                    </tr>
			                    @endforeach	
			                  
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
                    
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"></p>
			        </div>
			        
			        <div class="box-body" id="pass">
			        	
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
@include('layouts.footer')
@include('layouts.datatable')

<script>
	function gatepass(e)
   {
   	var GatePassId = e.name;

   	$.ajax({
	         url: "/gatepass/view_pass",
	         type:'POST',
	         data:{GatePassId : GatePassId}, 
	         success: function(result)
	         {  
	         	$('#pass').html(result);

	         }
         });
       $('#ownModal').modal();

   }
</script>



