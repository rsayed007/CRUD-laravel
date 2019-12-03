@extends('app')


@section('main-content')		
	<section class="student-info">
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-3 col-sm-12" >
					<h3 style="display: inline-block;" >Student information</h3>
					<a class="btn btn-danger" href="{{ route('create')}}"> Add New Data</a>
				</div>
				<table class="table table-responsive table-striped">
					<tr>
						<th>S.No</th>
						<th>Name</th>
						<th>Reg. No</th>
						<th>Depertment</th>
						<th>Info</th>
						<th>Action</th>
					</tr>
				@foreach( $students as $student)
					<tr>
						<td>{{ $loop->index +1}}</td>
						<td>{{ $student->name}}</td>
						<td>{{ $student->reg_id}}</td>
						<td>{{ $student->department_name}}</td>
						<td>{{ $student->info}}</td>
						<td>
							<a href="{{ route('edit',$student->id )}}" class="btn btn-warning glyphicon glyphicon-edit"></a>

							<form class="" id="from-delete-{{$student->id}}" action="{{ route('delete',$student->id) }}" method="post" style="display: none;">
								{{ csrf_field() }}
							</form>
							<a href=""
							onclick="
		                  	if (confirm('Are you sure, You eant to delete this?')) {event.preventDefault();
		                  		document.getElementById('from-delete-{{$student->id}}').submit();

		                  	}else{
		                  		event.preventDefault();
		                  	}" class="btn btn-danger glyphicon glyphicon-trash"></a>
						</td>
					</tr>
					
				@endforeach
				</table>
			</div>
		</div>
		
	</section>	
				
@endsection