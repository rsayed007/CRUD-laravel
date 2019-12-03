@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard <span class="btn btn-success float-right" data-toggle="modal" data-target="#addNewUser">Add new</span>
                </div>
                <div class="card-body">
                    <div class="container">
                        
                        <form action="{{route('import')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

    
@endsection