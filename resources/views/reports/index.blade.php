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
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Reports</th>
			                        <th>Task Number</th>
			                        <th>Engineer Name</th>
			                        <th>Machine Serial Number</th>
			                        <th>Date</th>			                        

			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($data as $key)
			                  
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>
			                        	<a href="#" id="{{$key->ServiceId}}" name="{{$key->ServiceId}}" onclick="report(this)">View Reports</a>
			                        	<a href="{{ url('/reports/pdffile') }}/{{$key->ServiceId}}" style="float: left;"><b>Download PDF</b></a>
			                        </td>

			                        <td>{{$key->TaskNumber}}</td>
			                        <td>{{$key->EngineerName}}</td>
			                        <td>{{$key->MachineSerialNumber}}</td>
			                        <td>{{$key->ServiceCompeleteDate}}</td>
			                        
			                        
			                        
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
			<div class="modal-dialog" style="width: 70%;">
			  	<div class="modal-content">
			  		<div class="modal-header">
			  		 
                                     
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"></p>
			        </div>
			        
			        <div class="box-body" id="myreport" style="min-height: 100px">
			        	
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
	function report(e)
   {
   	var ServiceId = e.name;

   	$.ajax({
	         url: "/reports/view_report",
	         type:'POST',
	         data:{ServiceId : ServiceId}, 
	         success: function(result)
	         {  

	         	$('#myreport').html(result);

	         }
         });
       $('#ownModal').modal();

   }
</script>



