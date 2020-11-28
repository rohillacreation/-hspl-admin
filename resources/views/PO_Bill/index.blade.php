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
 	       					<a class="btn btn-success" href="{{ url('/purchase_order/create') }}">Add PO Details</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Bill</th>
			                        <th>Company Name</th>
			                        <th>Organisation Name</th>
			                        <th>Railways Zone</th>
			                        <th>Devision Name</th>
			                        <th>Company</th>
			                        <th>Addres</th>
			                        <th>PO Number</th>
			                        <th>PO Date</th>
			                        <th>Vendor Name</th>
			                        <th>Vendor Contact Name</th>
			                        <th>Party Mobile</th>
			                        <th>Party Email</th>
			                        <th>GST Number</th>
			                        <th>Total Amount</th>
			                        <th>Total Gst Amount</th>
			                        <th>Grand Total</th>
			                        <th>Total in Words</th>
			                        

			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($podata as $key)
			                  
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>
			                        	<a href="#" id="{{$key->PoId}}" name="{{$key->PoId}}" onclick="bill(this)">View Bill</a>
			                        	<a href="{{ url('/purchase_order/pdf') }}/{{$key->PoId}}" style="float: left;"><b>Download PDF</b></a>
			                        </td>

			                        <td>{{$key->NameShown}}</td>
			                        <td>{{$key->OrganisationName}}</td>
			                        <td>{{$key->RailwaysZone}}</td>
			                        <td>{{$key->DevisionName}}</td>
			                        <td>{{$key->Company}}</td>
			                        <td>{{$key->OurAddress}}</td>
			                        <td>{{$key->PONumber}}</td>
			                        <td>{{$key->PODate}}</td>
			                        <td>{{$key->PartyName}}</td>
			                        <td>{{$key->VendorContactName}}</td>
			                        <td>{{$key->PartyMobile}}</td>
			                        <td>{{$key->PartyEmail}}</td>
			                        <td>{{$key->gstnumber}}</td>
			                        <td>{{$key->TotalAmount}}</td>
			                        <td>{{$key->TotalGstAmount}}</td>
			                        <td>{{$key->GrandTotal}}</td>
			                        <td>{{$key->TotalinWords}}</td>
			                        
			                        
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
			  		 
                      <!-- <a href="{{ url('/purchase_order/view_bill') }}" style="float: left;color: black;"><b>Download PDF</b></a> -->
                      
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"></p>
			        </div>
			        
			        <div class="box-body" id="Bill" style="min-height: 100px">
			        	
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
	function bill(e)
	   {
	   	var PoId = e.name;

	   	$.ajax({
		         url: "/purchase_order/view_bill",
		         type:'POST',
		         data:{PoId : PoId}, 
		         success: function(result)
		         {  
		         	$('#Bill').html(result);

		         }
	         });
	       $('#ownModal').modal();

	   }

</script>


