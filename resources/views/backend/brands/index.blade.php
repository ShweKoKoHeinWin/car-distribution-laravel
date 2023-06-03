<x-backend-layout>
  {{-- nav for brands --}}
    <ul class="list-group list-group-horizontal mt-3">
        <li class="list-group-item list-group-item-secondary">
          <a href="{{url('/backend/brands')}}">All Brands</a>
        </li>
        <li class="list-group-item list-group-item-secondary">
          <a href="{{url('/backend/brands/create')}}">Create Brands</a>
        </li>
      </ul>

      <x-flash-message />

      <h3 class="h3 text-center">All Brands</h3>

      <table class="table table-striped table-dark table-border text-center align-middle my-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th class="w-50">Logo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->title}}</td>
                    <td><img src="{{asset('image/brands/' . $brand->logo)}}" alt="" style="width:70px;"></td>
                    <td><a href="{{url('/backend/brands/delete/' . $brand->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>

</x-backend-layout>