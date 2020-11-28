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
 	       					<a class="btn btn-success" href="{{ url('/engineer-master/create') }}">Add Engineer Master</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Profile Pic</th>
			                        <th>Employee Id</th>
			                        <th>Name</th>
			                        <th>Designation</th>
			                        <th>Qualification</th>
			                        <th>Mobile</th>
			                        <th>Email</th>
			                        <th>CurrentAddress</th>
			                        <th>Engineer Asset</th>
			                        <th>Documents</th>
			                        <th>Performance</th>
			                        <!-- <th>DocumentDescription</th> -->
			                        <th>Total Leaves</th>
			                        <th>Earning Leave</th>
			                        <th>Sick Leave</th>
			                        <th>Personal Leave</th>
			                        <th>CL</th>
			                        <th>Current Location</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($data as $key)
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>@if(env('APP_ENV') == 'local')
			                        	<a href="#" id="{{$key->EngineerId}}" onclick="image(this)"><img src="{{ asset('images/ProfilePic') }}/{{$key->ProfilePic}}" style="width: 100%;height: 8%"></a>
			                        	
			                        	@else
			                        	<a href="#" id="{{$key->EngineerId}}" onclick="image(this)"><img src="{{ asset('public/images/ProfilePic') }}/{{$key->ProfilePic}}" style="width: 100%;height: 8%"></a>
			                        	@endif
			                        </td>
			                        <td>{{$key->EmployeeId}}</td>
			                        <td>{{$key->EngineerName}}</td>
			                        <td>{{$key->EngineerDesignationName}}</td>
			                        <td>{{$key->EngineerQualification}}</td>
			                        <td>{{$key->EngineerMobile}}</td>
			                        <td>{{$key->EngineerEmail}}</td>
			                        <td>{{$key->EngineerCurrentAddress}}</td>
			                        <td>
			                        	<a href="#"  id="{{$key->EngineerId}}" onclick="asset(this)">View Assets</a>
			                        </td>
			                        <td>
			                        	@if(env('APP_ENV') == 'local')
			                        	<a href="{{ asset('images/EngineerDocuments') }}/{{$key->EngineerDocuments}}" target="_blank">View Docs</a>
			                        	@else
			                        	<a href="{{ asset('public/images/EngineerDocuments') }}/{{$key->EngineerDocuments}}" target="_blank">View Docs</a>
			                        	@endif
			                        </td>
			                        <td><a href="#" id="{{$key->EngineerId}}" onclick="performances(this)">{{$key->Performance}}</a></td>
			                        <!-- <td>{{$key->DocumentDescription}}</td> -->
			                        <td>{{$key->EngineerTotalLeaves}}</td>
			                        <td>{{$key->EL}}</td>
			                        <td>{{$key->SL}}</td>
			                        <td>{{$key->PL}}</td>
			                        <td>{{$key->CL}}</td>
			                        <td><a target="_blank" href="http://maps.google.com/maps?q={{$key->Latitude}},{{$key->Longitude}}"><i class="fa fa-location-arrow btn btn-info"></i></a></td>
			                        <td style="float: left;padding: 0;">
			                         <a href="{{ url('/engineer-master') }}/{{$key->EngineerId}}/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         <form method="Post" action="{{url('engineer-master')}}/{{$key->EngineerId}}">
			                         <input type="hidden" name="_method" value="DELETE">@csrf
			                         <button style="transform: translate(40px, -28px);" type="submit" class="fa fa-trash btn btn-danger" onclick="return confirm('Are You Sure You Want to Delete This Entry')"></button>
			                          </form>
			                        </td>
			                    </tr>	
			                  @endforeach
			                </tbody>
              			</table>
		            </div>
          		</div>
	        </div>
    	</div>

    	
    	<!-- model start -->
    	<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Engineer Assets</p>
			        </div>
			        <div class="box-body" id="assets" style="min-height: 150px">
			        </div>
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!-- model end -->

	<!-- model start -->
    	<div class="modal fade" id="performancemodel" role="dialog">
			<div class="modal-dialog" style="width: 92%;">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Total Performances</p>
			        </div>
			        <div class="box-body" id="performance" style="min-height: 150px">
			        </div>
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!-- model end -->


	<!-- model start -->
    	 <div class="modal fade" id="ownModal" role="dialog">
			<div class="modal-dialog">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Profile Pic</p>
			        </div>
			        
			        <div class="box-body" id="images" style="min-height: 100px">
			        	
			        </div>
			   
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!-- model end -->


    </section>
  </div>
 
@include('layouts.footer')
@include('layouts.datatable')

<script>
	function asset(e) 
   {
       var EngineerId = e.id;

       $.ajax({
	         url: "/engineer-master/view_asset",
	         type:'POST',
	         data:{EngineerId : EngineerId}, 
	         success: function(result)
	         {
	         	$('#assets').html(result);
	         }
         });
       $('#myModal').modal();
   }

   function image(e)
   {
   	var EngineerId = e.id;
   	$.ajax({
	         url: "/engineer-master/view_profile",
	         type:'POST',
	         data:{EngineerId : EngineerId}, 
	         success: function(result)
	         {  
	         	$('#images').html(result);

	         }
         });
       $('#ownModal').modal();

   }

   function performances(e) 
   {
       var EngineerId = e.id;

       $.ajax({
	         url: "/engineer-master/view_performance",
	         type:'POST',
	         data:{EngineerId : EngineerId}, 
	         success: function(result)
	         {
	         	$('#performance').html(result);
	         }
         });
       $('#performancemodel').modal();
   }

</script>