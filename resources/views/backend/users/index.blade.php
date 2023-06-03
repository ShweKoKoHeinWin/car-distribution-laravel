<x-backend-layout>
    <x-flash-message>
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/backend/users/?members=1" class="btn btn-primary">Users</a>
                </li>
                <li class="list-group-item">
                    <a href="/backend/users/?staffs=1" class="btn btn-primary">Staffs</a>
                </li>
                <li class="list-group-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Roles
                        </button>
                        <ul class="dropdown-menu">
                          @foreach($roles as $role)
                          <li>
                            <a href="/backend/users/?roles={{$role->name}}" class="btn btn-success">{{$role->name}}</a>
                        </li>   
                          @endforeach
                        </ul>
                      </div>
                  
                </li>

                <li class="list-group-item">
                    <form action="">
                        <div class="input-group">
                    <input type="text" name="search" class="form-control">
                    <input type="submit" value="search" class="input-group-text">

                </div>
                    </form>
                </li>
            </ul>
        </div>

        <div class="col-12 col-md-8 col-lg-9">
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    {{$role->name}} ,
                                @endforeach
                            </td>
                            <td><a href="{{url('/backend/users/'.$user->id.'/edit')}}" class="btn btn-warning">Edit</a></td>
                            <td><a href="{{url('/backend/users/'.$user->id.'/delete')}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</x-backend-layout>