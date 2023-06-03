<x-backend-layout>

  {{-- Category nav- --}}
    <ul class="list-group list-group-horizontal mt-3">
        <li class="list-group-item list-group-item-secondary">
          <a href="{{url('/backend/categories')}}">All Categories</a>
        </li>
        <li class="list-group-item list-group-item-secondary">
          <a href="{{url('/backend/categories/create')}}">Create Categories</a>
        </li>
      </ul>

      <x-flash-message />

      <h3 class="h3 text-center">All Categories</h3>

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
          
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td><img src="{{asset('image/categories/' . $category->logo)}}" alt="" style="width:70px;"></td>
                    <td><a href="{{url('/backend/categories/delete/' . $category->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach

        </tbody>
      </table>
</x-backend-layout>