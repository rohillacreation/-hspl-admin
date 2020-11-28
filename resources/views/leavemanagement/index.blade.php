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
 	       					<a class="btn btn-success" href="{{ url('/leave-management/create') }}">Add Leaves</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Engineer Name</th>
			                        <th>From Date</th>
			                        <th>To Date</th>
			                        <th>Leave Type</th>
			                        <th>Approval</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($data as $key)
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>{{$key->EngineerName}}</td>
			                        <td>{{$key->FromDate}}</td>
			                        <td>{{$key->ToDate}}</td>
			                        <td>{{$key->LeaveType}}</td>
			                        <td>
			                        	<select class="form-control" id="{{$key->LeaveId}}" onchange="updatestatus(this)" name="LeaveApproval" style="color: white;background-color: <?php if($key->LeaveApproval == 'Pending'){ ?> red <?php } elseif($key->LeaveApproval == 'Approved') { ?> green <?php }else { ?> blue <?php } ?>">
		                              		<option value="Pending" {{($key->LeaveApproval == 'Pending') ? 'selected' : ''}} >Pending</option>
			                              	<option value="Approved" {{($key->LeaveApproval == 'Approved') ? 'selected' : ''}}>Approved</option>
			                              	<option value="Disapproved" {{($key->LeaveApproval == 'Disapproved') ? 'selected' : ''}} >Rejected</option>
			                            </select>
			                        </td>
			                   
			                        <td style="float: left;padding: 0;">
			                         <a href="{{ url('/leave-management') }}/{{$key->LeaveId}}/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         <form method="Post" action="{{url('leave-management')}}/{{$key->LeaveId}}">
			                         <input type="hidden" name="_method" value="DELETE">@csrf
			                         <input type="hidden" name="EngineerId" value="{{$key->EngineerId}}">
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

    	<!-- disapproved model start -->

    	<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" style="width: 92%;">
			  	<div class="modal-content">
			  		<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <p class="modal-title"><b>Remarks for Disapproved</b></p>
			        </div>
			        
			        <div class="box-body">
			          	<form role="form" method="post" action="{{ url('/leave-management/rejectleave')}}">
			          	@csrf
			            <div class="row">	
					         <div class="modal-body">
					          	<div class="form-group col-md-6">
			                       <label for="Remarks" style="float: left;">Remarks</label>
			                       <textarea class="form-control @error('Remarks') is-invalid @enderror" id="Remarks" name="Remarks" style="width: 100%;"></textarea>
			                       
			                       @error('Remarks')
			                         <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
			                       @enderror
			                   	</div>
			                   
			                	<input type="hidden" name="LeaveId" id="LeaveId">
			                	
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

		<!-- disapproved model end -->
    </section>
  </div>
 
@include('layouts.footer')
@include('layouts.datatable')

<script>
	function updatestatus(e)
	{
		var LeaveId = e.id;
		var LeaveApproval = e.value;
		if(LeaveApproval == 'Disapproved')
		{
			$('#LeaveId').val(LeaveId);
			$('#myModal').modal();
		}
		else
		{
			$.ajax({
         		url: "/leave-management/approval",
         		type:'POST',
         		data:{LeaveId : LeaveId, LeaveApproval : LeaveApproval}, 
         		success: function(result)
         		{
             		alert(result);
             		//window.location.reload();
         		}
         	});
		}
		
	}
	
</script>

