
        
    <table class="table" id="showAllData">
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
    {{-- {{ $users->links() }} --}}