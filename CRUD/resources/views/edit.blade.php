@extends('app')


@section('main-content')

<section class="create-data container">
	<div class="col-sm-offset-3 col-sm-6">
		@if(count($errors) > 0)
{{-- 		  @foreach($errors->all() as $error)
 --}}		    <p class="alert-danger"> * mark fild must be requered </p>
{{-- 		  @endforeach
 --}}		@endif
		<form action="{{ route('update', $student->id) }}" method="post">
			{{ csrf_field() }}


		  <div class="form-group">
		    <label for="name">Name:</label>
		    <input type="text" class="form-control" name="name" id="name" value="{{$student->name}}">
		  </div>
		  <div class="form-group">
		    <label for="reg_number">Registration Number:</label>
		    <input type="text" class="form-control" name="reg_number" id="reg_number" value="{{$student->reg_id}}">
		  </div>
		  
		  <div class="form-group">
		    <label for="depertment">Depertment:</label>
		    <input type="text" class="form-control" name="depertment" id="depertment" value="{{$student->department_name}}"> 
		  </div>

		  <div class="form-group">
		    <label for="info">Information</label>
		    <textarea class="form-control" name="info" id="info" rows="3">{{$student->info}}</textarea>
		  </div>
		  
		  <button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
	
</section>


@endsection