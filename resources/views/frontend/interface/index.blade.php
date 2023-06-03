<x-backend-layout>

    <ul class="list-group list-group-horizontal mt-3">
        <li class="list-group-item list-group-item-secondary">
            <a href="{{url('/frontend/interface/create')}}">Create Interface</a>
        </li>
    </ul>

    <x-flash-message />
    
    <h3 class="h3 text-center">All Interface</h3>

    <table class="table table-striped table-dark table-border text-center align-middle my-3">
      <thead>
          <tr>
              <th>Id</th>
              <th></th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          @foreach ($assets as $asset)
              <tr>
                  <td>{{$asset->id}}</td>
                  <td><a href="{{url('/frontend/interface/edit/' . $asset->id)}}" class="btn btn-info">Edit</a></td>
                  <td><a href="{{url('/frontend/interface/delete/' . $asset->id)}}" class="btn btn-danger">Delete</a></td>
              </tr>
          @endforeach
      </tbody>
    </table>

</x-backend-layout>
