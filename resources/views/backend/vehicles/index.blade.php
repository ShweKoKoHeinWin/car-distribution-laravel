{{-- Title For Filter --}}
@php
     $title = null;
    if($filterTitleCategory) {
          $title = $filterTitleCategory->title;
          $logo = $filterTitleCategory->logo;
        } else if($filterTitleBrand) {
          $title = $filterTitleBrand->title;
          $logo = $filterTitleBrand->logo;
        } else if ($filterTitle) {
          $title = $filterTitle;
        }
@endphp

<x-backend-layout>
  <x-flash-message />
  <div class="row">

      <ul class="list-group col-12 col-lg-3" id="myList">

        {{-- All cars --}}
        <li class="list-group-item list-group-item-secondary">
          <a href="{{url('/backend/vehicles')}}" class="btn btn-primary">All</a>
        </li>

        {{-- By Brands --}}
        <li class="list-group-item list-group-item-secondary">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Brand
                </button>
                <ul class="dropdown-menu">
                  @foreach($brands as $brand)
                  <li>
                    <a class="dropdown-item" href="/backend/vehicles/?brand={{$brand->id}}">
                    <img src="{{asset('image/brands/' . $brand->logo)}}" style="width:30px" alt="">
                    <span>{{$brand->title}}</span>
                    </a>
                </li>   
                  @endforeach
                </ul>
              </div>
        </li>

        {{-- By Category --}}
        <li class="list-group-item list-group-item-secondary">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </button>
                <ul class="dropdown-menu">
                  @foreach($categories as $category)
                  <li>
                    <a class="dropdown-item" href="/backend/vehicles/?category={{$category->id}}">
                    <img src="{{asset('image/categories/' . $category->logo)}}" style="width:30px" alt="">
                    <span>{{$category->title}}</span>
                    </a>
                </li>   
                  @endforeach
                </ul>
              </div>
        </li>

        {{-- By Price --}}
        <li class="list-group-item list-group-item-secondary">
          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Under Price
              </button>

              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=20000">
                  <span>$ 20000</span>
                  </a>
                </li>   
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=30000">
                    <span>$ 30000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=40000">
                  <span>$ 40000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=50000">
                    <span>$ 50000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=60000">
                  <span>$ 60000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=70000">
                  <span>$ 70000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=80000">
                  <span>$ 80000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=90000">
                    <span>$ 90000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/backend/vehicles/?price=100000">
                  <span>$ 100000</span>
                  </a>
                </li>
              </ul>
            </div>
        </li>

        {{-- By Searching --}}
        <li class="list-group-item list-group-item-secondary">
            <form action="">
                <div class="input-group">
                    <input type="text" name="search" class="form-control">
                    <input type="submit" value="search" class="input-group-text">

                </div>
            </form>
        </li>

        {{-- Create New Vehicle --}}
        <li class="list-group-item list-group-item-secondary">
          <a href="{{url('/backend/vehicles/create')}}" class="btn btn-warning">Create Vehicle</a>
        </li>
      </ul>

    {{-- Vehicle list --}}
    <div class="col-12 col-lg-9">
        <h3 class="text-center">{{$title}}</h3>
      <table class="table table-striped table-dark table-bordered align-middle">
        <thead>
            <tr>
                <th>Id</th>
                <th>Model</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Image</th>
                <th>Price</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        
        @foreach($vehicles as $vehicle)
          <tr>
            <td>{{$vehicle->id}}</td>
            <td>{{$vehicle->model}}</td>
            <td>{{$vehicle->brand->title}}</td>
            <td>{{$vehicle->category->title}}</td>
            <td><img src="{{asset('/image/vehicles/' . $vehicle->front_img)}}" alt="" style="width:100px;"></td>
            <td>{{$vehicle->price}}</td>
            <td class="text-center"><a href="{{url('/backend/vehicles/' . $vehicle->id . '/show')}}" class="btn btn-warning">More</a></td>
            <td  class="text-center"><a href="{{url('/backend/vehicles/' . $vehicle->id . '/delete')}}" class="btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-backend-layout>

<script>
   function updateListLayout() {
   var listGroup = document.getElementById('myList');
   if (window.innerWidth < 992 && window.innerWidth > 800) {
     listGroup.classList.add('list-group-horizontal');
   } else{
     listGroup.classList.remove('list-group-horizontal');
   }
 }
  // Call the function on page load
  updateListLayout();

  // Call the function on window resize
  window.addEventListener('resize', updateListLayout);
</script>