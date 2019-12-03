@extends('app')


@section('main-content')

<section class="create-data container">
	<div class="col-sm-offset-3 col-sm-6">
		<form action="{{ route('store') }}" method="post" data-parsley-validate>
			{{ csrf_field() }}

		  <div class="form-group">
		    <label for="name">Name:</label>
		    <input type="text" class="form-control" name="name" id="name" required>
		  </div>
		  <div class="form-group">
		    <label for="reg_number">Registration Number:</label>
		    <input type="text" class="form-control" name="reg_number" id="reg_number" required>
		  </div>
		  
		  <div class="form-group">
		    <label for="depertment">Depertment:</label>
		    <input type="text" class="form-control" name="depertment" id="depertment" required>
		  </div>

		  <div class="form-group">
		    <label for="info">Information</label>
		    <textarea class="form-control" name="info" id="info" rows="3"></textarea>
		  </div>
		  
		  <button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
	
</section>


@endsection