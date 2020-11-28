<table border="1px" style="width: 100%">
	<tr>
		<th>Sr. No.</th>
		<th>Task Number</th>
		<th>Customer Orientation-Business Generation</th>
		<th>Self-Learning Qualities</th>
		<th>Problem Solving Skills</th>
		<th>Functional Knowledge</th>
		<th>Initiative & Drive</th>
		<th>Total Marks</th>
	</tr>
	@php $i = 1 @endphp
	@foreach($data1 as $key1)
	<tr>
		<td>{{$i++}}</td>
		<td>{{$key1->TaskNumber}}</td>
		<td>{{$key1->QuestionOne}}</td>
		<td>{{$key1->QuestionTwo}}</td>
		<td>{{$key1->QuestionThree}}</td>
		<td>{{$key1->QuestionFour}}</td>
		<td>{{$key1->QuestionFive}}</td>
		<td>{{$key1->Total_Marks}}</td>
	</tr>
	@endforeach
</table>