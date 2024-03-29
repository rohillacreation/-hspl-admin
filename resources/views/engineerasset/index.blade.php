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
 	       					<a class="btn btn-success" href="{{ url('/engineer-asset/create') }}">Add Engineer Asset</a>
        				</div>
		            </div>
		            <div class="box-body" >
		              	<table id="example" class="table table-striped table-bordered " >
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Engineer Name</th>
			                        <th>Asset Category Name</th>
			                        <th>Assign Date</th>
			                        <th>Item SerialNo</th>
			                        <th>Item Description</th>
			                        <th>Item Price</th>
			                        <th>Action</th>
			                        
			                    </tr>
			                </thead>
			                <tbody>
			                  @php $i = 1 @endphp
			                  @foreach($data as $key)
			                    <tr>
			                        <td>{{$i++}}</td>
			                        <td>{{$key->EngineerName}}</td>
			                        <td>{{$key->AssetCategoryName}}</td>
			                        <td>{{$key->AssignDate}}</td>
			                        <td>{{$key->ItemSerialNo}}</td>
			                        <td>{{$key->ItemDescription}}</td>
			                        <td>{{$key->ItemPrice}}</td>
			                        
			                        <td style="float: left;padding: 0;">
			                         <a href="{{ url('/engineer-asset') }}/{{$key->AssetId}}/edit"><i class="fa fa-pencil btn btn-info"></i></a>
			                         <form method="Post" action="{{url('engineer-asset')}}/{{$key->AssetId}}">
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

