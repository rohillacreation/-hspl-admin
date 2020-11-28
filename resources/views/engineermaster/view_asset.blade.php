<table border="1px" style="width: 100%">
	<tr>
		<th>Asset Name</th>
		<th>Assign Date</th>
		<th>Item Serial No</th>
		<th>Item Price</th>
	</tr>
	@foreach($data as $key)
	<tr>
		<td>{{$key->AssetCategoryName}}</td>
		<td>{{$key->AssignDate}}</td>
		<td>{{$key->ItemSerialNo}}</td>
		<td>{{$key->ItemPrice}}</td>
	</tr>
	@endforeach
</table>