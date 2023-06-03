@section('title', 'Vehicles')
{{-- Filter Title --}}
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

<x-layout :phone="$data->phone">

  <div class="container-fluid">
    {{-- Filter Bar --}}
      <ul class="list-group m-2" id="myList">

        {{-- ALL --}}
        <li class="list-group-item list-group-item-secondary">
          <a href="{{url('/vehicles')}}" class="btn btn-primary">All</a>
        </li>

        {{-- By Brand --}}
        <li class="list-group-item list-group-item-secondary">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Select Brand
                </button>
                <ul class="dropdown-menu">
                  @foreach($brands as $brand)
                  <li>
                    <a class="dropdown-item" href="/vehicles/?brand={{$brand->id}}">
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
                  Select Category
                </button>
                <ul class="dropdown-menu">
                  @foreach($categories as $category)
                  <li>
                    <a class="dropdown-item" href="/vehicles/?category={{$category->id}}">
                    <img src="{{asset('image/categories/' . $category->logo)}}" style="width:30px" alt="">
                    <span>{{$category->title}}</span>
                    </a>
                </li>   
                  @endforeach
                </ul>
            </div>
        </li>

        {{-- By price --}}
        <li class="list-group-item list-group-item-secondary">
          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Under Price
              </button>

              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="/vehicles/?price=20000">
                  <span>$ 20000</span>
                  </a>
                </li>   
                <li>
                  <a class="dropdown-item" href="/vehicles/?price=30000">
                  <span>$ 30000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/vehicles/?price=40000">
                  <span>$ 40000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/vehicles/?price=50000">
                  <span>$ 50000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/vehicles/?price=60000">
                  <span>$ 60000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/vehicles/?price=70000">
                  <span>$ 70000</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="/vehicles/?price=80000">
                  <span>$ 80000</span>
                  </a>
              </li>
              <li>
                <a class="dropdown-item" href="/vehicles/?price=90000">
                <span>$ 90000</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/vehicles/?price=100000">
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
      </ul>

    <div class="row p-3">
      <h3 class="text-center bg-warning p-3">{{$title}}</h3>
      @foreach($vehicles as $vehicle)
      <div class="col-sm-6 col-md-4 col-lg-3 p-2 mb-3">
          <div class="card" style="width:100%;">
              <img src="{{asset('/image/vehicles/' . $vehicle->front_img)}}" class="card-img-top p-2" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$vehicle->brand->title . " " . $vehicle->model}}</h5>
                <p class="card-text">{{$vehicle->purpose}}</p>
                <td class="text-center"><a href="{{url('/backend/vehicles/' . $vehicle->id . '/show')}}" class="btn btn-warning">More</a></td>
                
              </div>
            </div>
      </div> 
      @endforeach
    </div>
 
  
  
  <div class="mt-6 py-3">
    {{$vehicles->links()}}
</div>
</div>


</x-layout>
<script>
  function updateListLayout() {
   var listGroup = document.getElementById('myList');
   if (window.innerWidth < 992) {
     listGroup.classList.remove('list-group-horizontal');
   } else {
     listGroup.classList.add('list-group-horizontal');
   }
 }
  // Call the function on page load
  updateListLayout();

  // Call the function on window resize
  window.addEventListener('resize', updateListLayout);

  
</script>