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
 	       					<a class="btn btn-success" href="{{ url('/service-master/create') }}">Add Service Master</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Task Number</th>
			                        <th>Railways Zone</th>
			                        <th>Division Name</th>
			                        <th>Service Location</th>
			                        <th>Remarks</th>
			                        <th>Letter Receiving Date</th>
			                        <th>Service Letter</th>
			                        <th>Budget Approval</th>
			                        <th>Assign</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($service as $key)
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>{{$key->TaskNumber}}</td>
			                        <td>{{$key->RailwaysZone}}</td>
			                        <td>{{$key->DevisionName}}</td>
			                        <td>{{$key->ServiceLocation}}</td>
			                        <td>{{$key->Remark}}</td>
			                        <td>{{$key->LetterReceivingDate}}</td>
			                        <td>
			                        	@if(env('APP_ENV') == 'local')
			                        	<a href="{{ asset('images/ServiceLetter') }}/{{$key->ServiceLetter}}" target="_blank">View Docs</a>
			                        	@else
			                        	<a href="{{ asset('public/images/ServiceLetter') }}/{{$key->ServiceLetter}}" target="_blank">View Docs</a>
			                        	@endif
			                        </td>
			                        <td>
			                        	@if($key->UserRequest == 1)
			                        	<select class="form-control" id="{{$key->ServiceId}}" onchange="updatestatus(this)" name="AdminApprovalBudget" style="color: red;width: 123px;background-color: <?php if($key->AdminApprovalBudget == '0'){ ?> white <?php } else { ?> blue <?php } ?>">
		                              		<option value="1" {{($key->AdminApprovalBudget == '1') ? 'selected' : ''}} >Verify</option>
			                              	<option value="0" {{($key->AdminApprovalBudget == '0') ? 'selected' : ''}} >Non Verify</option>
			                            </select>
			                        	@else
			                        	@endif

			                        </td>
			        
			                        <td >
			                        	@if($key->ServiceStatusId == 1)
			                        		<button type="button" name="{{$key->ServiceId}}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="myBtn" onclick="engineer(this)">Assign</button>

			                        	@elseif($key->ServiceStatusId == '2')
			                        	    Assigned To <b>{{$key->EngineerName}}</b>
			                        	

			                        	@elseif($key->ServiceStatusId == '3')
			                            <p style="cursor: pointer;color: #3c8dbc;" data-toggle="modal" data-target="#comment" onclick="comment('{{$key->EngineerComment}}')">Rejected</p>

			                            <button type="button" name="{{$key->ServiceId}}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" id="myBtn" onclick="engineer(this)">Re Assign</button>
			                        	

			                        	@elseif($key->ServiceStatusId == '4')
			                        	    Under Process To <b>{{$key->EngineerName}}</b>
			                        	

			                        	@elseif($key->ServiceStatusId == '5')
			                        	
			                        	<button type="button" name="{{$key->EngineerId}}" id="{{$key->ServiceId}}" class="btn btn-info btn-sm" data-target="#ownModal" onclick="performance(this)">Final Submit</button><b>{{$key->EngineerName}}</b>
			                        	@elseif($key->ServiceStatusId == '6')
			                        	    Service Completed By <b>{{$key->EngineerName}}</b>
			                        	
			                        	@endif
			                      
			                        </td>
			                        <td style="float: left;padding: 0;">
			                         	<a href="{{ url('/service-master') }}/{{$key->ServiceId}}/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         	<form method="Post" action="{{url('service-master')}}/{{$key->ServiceId}}">
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

    	<!--final submit model start -->
    	 <div class="modal fade" id="ownModal" role="dialog">
			<div class="modal-dialog">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"><b>Engineer Performance Appraisal Form</b></p>
			        </div>
			        
			        <div class="box-body" id="points" style="min-height: 100px">
			        	
			        </div>
			   
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!--final submit model end -->

    	<!-- comment model start -->
    	<div class="modal fade" id="comment" role="dialog">
			<div class="modal-dialog">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Reason for Rejected</p>
			        </div>
			        <div class="box-body">
			            <p id="comment1"></p>
			        </div>
			        <div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			  	</div>
			</div>
		</div>
	<!-- comment model end -->
    	<!--assign model start -->
    	<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title">Assign Service to Engineer</p>
			        </div>
			        <div class="box-body">
			          	<form role="form" method="post" action="{{ url('/service-master/assign')}}">
			          	@csrf
			            <div class="row">	
					         <div class="modal-body">
					          	<div class="form-group col-md-6">
			                       <label for="EngineerId" style="float: left;">Engineer List</label>
			                       <select class="form-control @error('EngineerId') is-invalid @enderror" id="EngineerId" name="EngineerId">
			                          <option value="">Select Engineers</option>
			                       </select>
			                       @error('EngineerId')
			                         <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
			                       @enderror
			                   	</div>
			                	<input type="hidden" name="ServiceId" id="ServiceId">
			                 </div>
			            </div>
			            <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
			        	</form>
			  		</div>
				  	<div class="modal-footer">
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
			 	</div>
				</div>
			</div>
	<!--assign model end -->
    </section>
  </div>
 
 
@include('layouts.footer')
@include('layouts.datatable')
<script type="text/javascript">
	function engineer(e) 
   {
       var ServiceId = e.name;
       document.getElementById('ServiceId').value = ServiceId;
       $.ajax({
         url: "/service-master/select_engineer",
         type:'POST',
         data:{ServiceId : ServiceId}, 
         success: function(result)
         {
           var innerHtml = `<option value = "">Select Engineers</option>`;
             result.forEach(element=>{
                 innerHtml+=`<option value = "${element.EngineerId}">${element.EngineerName} (${element.EngineerLeaveStatus ? 'OnLeave' : element.EngineerSiteStatus ? 'OnSite' : 'Available'})</option>`;
             });
               
             $('#EngineerId').html(innerHtml);
         }
         });
   }

   function comment(comment)
   {
   		$('#comment1').html(comment);
   }

   function performance(e)
   {
   	var EngineerId = e.name;
       var ServiceId = e.id;

   	$.ajax({
	         url: "/service-master/performance_point",
	         type:'POST',
	         data:{EngineerId : EngineerId,ServiceId : ServiceId}, 
	         success: function(result)
	         {  
	         	$('#points').html(result);

	         }
         });
       $('#ownModal').modal();

   }

    function total()
    {
   		var one = $("input[name='QuestionOne']:checked").val();
   		var two = $("input[name='QuestionTwo']:checked").val();
   		var three = $("input[name='QuestionThree']:checked").val();
   		var four = $("input[name='QuestionFour']:checked").val();
   		var five = $("input[name='QuestionFive']:checked").val();
   		var total = parseInt(one ? one : 0) + parseInt(two ? two : 0) + parseInt(three ? three : 0) + parseInt(four ? four : 0) + parseInt(five ? five : 0);
   		document.getElementById('Total_Marks').value = total;
    }

    function updatestatus(e)
	{
		var ServiceId = e.id;
		var AdminApprovalBudget = e.value;
		
		$.ajax({
         		url: "/service-master/budgetapproval",
         		type:'POST',
         		data:{ServiceId : ServiceId, AdminApprovalBudget : AdminApprovalBudget}, 
         		success: function(result)
         		{
             		alert(result);
             		//window.location.reload();
         		}
         	});
		
	}
	
</script>

