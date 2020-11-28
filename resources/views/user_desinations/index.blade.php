@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<style type="text/css">
	th,td
	{
		text-align: center;
	}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
		<h1>Dashboard<small>Control panel</small></h1>
    </section> -->

    <!-- Main content -->
    <section class="content">
      	<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	@if(Session::has('message'))
		            		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		            	@endif
		              	<div class="col-xs-12">
 	       					<a class="btn btn-success" href="{{ url('/user-designations/create') }}">Add User Designation</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Designation Name</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($data as $key)
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>{{$key->UserDesignationName}}</td>
			                        <td>
			                          <a href="{{ url('/user-designations') }}/{{$key->UserDesignationId}}/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                          <form method="Post" action="{{url('user-designations')}}/{{$key->UserDesignationId}}">
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
    </section>
  </div>
@include('layouts.footer')
@include('layouts.datatable')
