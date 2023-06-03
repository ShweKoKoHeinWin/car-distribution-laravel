<x-backend-layout>
  
<a href="{{url('/backend/vehicles/')}}" class="btn btn-warning my-4">Back</a>


<div class="row">
    <div class="col-12 col-md-8 offset-md-2 p-3">

      {{-- edit buttom --}}
      @if(auth()->user()->hasAnyRole(['Ceo', 'Manager', 'Vehicle expert']))
        <div class="d-flex justify-content-end">
          <a href="{{url('/backend/vehicles/' . $vehicle->id . '/edit')}}" class="btn btn-warning mx-2">Edit</a>
        </div>
      @endif

        <h3 class="h3 text-center">{{$vehicle->brand->title . ' ' . $vehicle->model}}</h3>
        <div class="card w-100" >
            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide card-img-top border">
                    <div class="carousel-indicators bg-info">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>

                    {{-- Images --}}
                    <div class="carousel-inner">
                      <div class="carousel-item active" style="height: 30vw">
                        <img src="{{asset('/image/vehicles/' . $vehicle->front_img)}}" class="d-block w-100" style="object-fit: contain;
                        height: 100%;" alt="...">
                      </div>

                      <div class="carousel-item" style="height: 30vw">
                        <img src="{{asset('/image/vehicles/' . $vehicle->side_img)}}" class="d-block w-100" style="object-fit: contain;
                        height: 100%;" alt="...">
                      </div>

                      <div class="carousel-item" style="height: 30vw">
                        <img src="{{asset('/image/vehicles/' . $vehicle->back_img)}}" class="d-block w-100" style="object-fit: contain;
                        height: 100%;" alt="...">
                      </div>

                      <div class="carousel-item" style="height: 30vw">
                        <img src="{{asset('/image/vehicles/' . $vehicle->inside_img)}}" class="d-block w-100" style="object-fit: contain;
                       height: 100%;" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
              
                  <table class="table">
                    <tr>
                      <th class="w-25">Purpose</th>
                      <th style="width:50px"> : </th>
                      <td class="w-50">{{$vehicle->purpose}}</td>
                    </tr>
                    <tr>
                        <th>Engine</th>
                        <th> : </th>
                        <td>{{$vehicle->engine}}</td>
                    </tr>
                    <tr>
                        <th>Transmission</th>
                        <th> : </th>
                        <td>{{$vehicle->transmission}}</td>
                    </tr>
                    <tr>
                        <th>Fuel</th>
                        <th> : </th>
                        <td>{{$vehicle->fuel}}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th> : </th>
                        <td>$ {{$vehicle->price}}</td>
                    </tr>
                  </table>
              
            </div>
          </div>
        

          
    </div>
</div>
</x-backend-layout>