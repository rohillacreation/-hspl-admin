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
	 <section class="content">
      	<div class="row">
	        <div class="col-xs-12">
	          	<div class="box">
		            <div class="box-header">
		            	@if(Session::has('message'))
		            		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		            	@endif
		              	<div class="col-xs-12">
 	       					<a class="btn btn-success" href="{{ url('/machine-master/create') }}">Add Machine</a>
        				</div>
		            </div>
		            <div class="box-body">
		              	<table id="example" class="table table-striped table-bordered" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Machine Type</th>
			                        <th>Machine Subcategory Name</th>
			                        <th>Organisation</th>
			                        <th>Company</th>
			                        <th>Company Location</th>
			                        <th>Railways Zone</th>
			                        <th>Division Name</th>
			                        <th>Client Name</th>
			                        <th>Machine Name</th>
			                        <th>Machine Serial Number</th>
			                        <th>Machine Order Number</th>
			                        <th>Machine Warranty</th>
			                        <th>Machine Warranty From</th>
			                        <th>Machine Warranty To</th>
			                        <th>Machine Allotment Date</th>
			                        <th>Action</th>

			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($data as $key)
			                    <tr>
			                        <td>{{$i++}}</td>

			                        <td>{{$key->MachineCategoryName}}</td>
			                        <td>{{$key->MachineSubcategoryName}}</td>
			                        <td>{{$key->OrganisationName}}</td>
			                        <td>{{$key->Company}}</td>
			                        <td>{{$key->CompanyLocation}}</td>
			                        <td>{{$key->RailwaysZone}}</td>
			                        <td>{{$key->DevisionName}}</td>
			                        <td>{{$key->ClientName}}</td>
			                        <td>{{$key->MachineName}}</td>
			                        <td>{{$key->MachineSerialNumber}}</td>
			                        <td>{{$key->MachineOrderNo}}</td>
			                        <td>{{$key->MachineWarranty}}</td>
			                        <td>{{$key->MachineWarrantyFrom}}</td>
			                        <td>{{$key->MachineWarrantyTo}}</td>
			                        <td>{{$key->MachineAllotmentDate}}</td>
			                       
			                        <td>
			                         <a href="{{ url('/machine-master') }}/{{$key->MachineId}}/edit"><i class="fa fa-pencil btn btn-info" style="float: left;"></i></a>
			                         <form method="Post" action="{{url('machine-master')}}/{{$key->MachineId}}">
			                          	<input type="hidden" name="_method" value="DELETE">@csrf
			                          	<button style="transform: translate(36px, -28px);float: left;" type="submit" class="fa fa-trash btn btn-danger" onclick="return confirm('Are You Sure You Want to Delete This Entry')"></button>
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



