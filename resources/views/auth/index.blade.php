@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>Dashboard<small>Control panel</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      	<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	<div class="confirm-div col-md-12" style="background-color: #f39c12;min-height: 30px;color:white;text-align: center;display: none;"></div>
		              	<div class="col-xs-12">
 	       					<a class="btn btn-success" href="{{ url('/register') }}">Add New User</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>User Name</th>
			                        <th>User Email</th>
			                        <th>User Mobile</th>
			                        <th>Designation Name</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($data as $key)
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>{{$key->name.' '.$key->UserLastName}}</td>
			                        <td>{{$key->email}}</td>
			                        <td>{{$key->UserMobile}}</td>
			                        <td>{{$key->UserDesignationName}}</td>
			                        <td>
			                          <a href="{{ url('/Users') }}/{{$key->id}}/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                          <a href="{{ url('/Users') }}/{{$key->id}}/delete" onclick="return confirm('Are You Sure You Want to Delete This Entry')"><i class="fa fa-trash btn btn-danger"></i></a>
			                        </td>
			                    </tr>	
			                  @endforeach
			                </tbody>
			                <tfoot>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>User Name</th>
			                        <th>User Email</th>
			                        <th>User Mobile</th>
			                        <th>Action</th>
			                    </tr>
			                </tfoot>
              			</table>
		            </div>
          		</div>
	        </div>
    	</div>
    </section>
  </div>
@include('layouts.footer')
@include('layouts.datatable')
