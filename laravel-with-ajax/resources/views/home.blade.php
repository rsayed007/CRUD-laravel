@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard <span class="btn btn-success float-right" data-toggle="modal" data-target="#addNewUser">Add new</span>
                </div>
                
                <div class="card-body" id="showAllData">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{url('/view/user/data')}}" data-id="{{$user->id}}" id="view" class="btn btn-info">view</a>
                                    <a href="{{url('/edit/user/data')}}" data-id="{{$user->id}}" id="edit" class="btn btn-success">edit</a>
                                    <a href="{{url('/delete/user/data')}}" data-id="{{$user->id}}" id="delete" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
{{-- <div class="lodgingImg">
    <img src="{{asset('svg/loding.gif')}}" class=" img-fluid loding">
</div> --}}
<!-- Button trigger modal -->

      
      <!-- Modal for send user data -->
      <div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              
            <form action="{{route('create.user')}}" method="POST" id="adduser">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">N</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="name"  aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" name="email" placeholder="email"  aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">P</span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="password"  aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal for edit user data -->
      <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="{{route('update.user')}}" method="POST" id="updateUser">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="userLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">N</span>
                        </div>
                        <input type="text" id="username" class="form-control" name="name"  aria-describedby="basic-addon1">
                    </div>

                    <input type="hidden" id="id" class="form-control" name="id">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" id="email" class="form-control" name="email" placeholder="email"  aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">P</span>
                        </div>
                        <input type="password" id="password" class="form-control" name="password" placeholder="password"  aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal for view user data -->
      <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">Name: <span class="userName"></span></li>
                        <li class="list-group-item">Email: <span class="userEmail"></span> </li>
                        <li class="list-group-item">Create: <span class="createTime"></span></li>
                        
                    </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
          </div>
        </div>
      </div>

    
@endsection

@push('extraJs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript" >
   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function(){
                $('#adduser').on("submit", function(e){
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var type = form.attr('method');
                    var data = form.serialize();

                    $.ajax({
                        url: url,
                        data:data,
                        type: type,

                        beforeSend: function(){
                            Toast.fire({
                                icon: 'info',
                                title: 'Data sending'
                            })
                        },
                        success: function(data){
                            if (data == 'success') {
                                $('#addNewUser').modal('hide');
                                
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Data add successfully'
                                });
                                getUserData();
                            } 
                        },
                        complete:function(){
                            
                        },
                    });
                    
                });
            });
// viw user data 
            $(document).on('click','#view', function(e){
                e.preventDefault();
                var url= $(this).attr('href');
                var id = $(this).data('id');
                // console.log(url+' --'+id);

                $.ajax({
                    url: url,
                    data: {id:id},
                    type:'GET',
                    dataType:'JSON',
                    success: function(response){
                        // console.log(response);
                        if ($.isEmptyObject(response) != null) {
                             $("#viewUser").modal("show");
                             $('.userName').text(response.name)
                             $('.userEmail').text(response.email)
                             $('.createTime').text(response.created_at)
                        }
                    }
                });
            });

// edit user data
            $(document).on('click', '#edit', function(e){
                e.preventDefault();
                var url= $(this).attr('href');
                var id = $(this).data('id');
                // console.log(url+'ads '+id);

                $.ajax({
                    url: url,
                    data: {id:id},
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        if ($.isEmptyObject(response != null)) {
                            $('#editUser').modal('show');
                            $('#username').val(response.name);
                            $('#id').val(response.id);
                            $('#email').val(response.email);
                            $('#password').val(response.password);
                        }
                        console.log(response)
                    }
                });
            });
// update user data
            $(function(){
                $('#updateUser').on('submit', function(el){
                el.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                var type = form.attr('method');
                var data = form.serialize();

                $.ajax({
                    url: url,
                    type: type,
                    dataType: 'json',
                    data: data,
                    success: function(response){
                        if (response == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Data add successfully'
                            });
                            $('#editUser').modal('hide');
                            getUserData();
                        }
                    }
                });
                
                console.log(url+'ad'+id);
            });
            })

// delete user data 

            $(document).on('click', '#delete', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                var id = $(this).data('id');
                // console.log(url+' '+id);

                $.ajax({
                    url: url,
                    data: {id:id},
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        if (response == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Data add successfully'
                            });
                            getUserData();
                        }
                        
                    }
                });

            });

    // ajax data lode  
            function getUserData(){
                var url2 = '/get/user/data'
                // console.log(url2)
                $.ajax({
                    url: url2,
                    type: 'get',
                    dataType: 'html',
                    success: function(response){
                        $("#showAllData").html(response);
        
                    }
                });
            }
            // alert script
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

    </script>
@endpush