<x-backend-layout>
      <x-flash-message />

      <div class="row">
        <div class="col-md-6 py-3 gx-5">
            <h3 class="h3 text-center">All Roles</h3>

            <table class="table table-striped table-dark table-border text-center align-middle my-3">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($roles as $role)
                      <tr>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td><a href="{{url('/backend/roles/delete/' . $role->id)}}" class="btn btn-danger">Delete</a></td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>

        <div class="col-md-6 py-3">
            <form action="{{url('/backend/roles/create')}}" class="form border p-4" method="POST" enctype="multipart/form-data">
                <legend class="h3 text-center mb-3">
                    Create Role
                </legend>

                @csrf
                
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
      </div>

     
</x-backend-layout>