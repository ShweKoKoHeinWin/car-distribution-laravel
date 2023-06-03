<x-backend-layout>

    <a href="{{url('/backend/vehicles')}}" class="btn btn-primary my-4">Back</a>

    <div class="col-8 offset-2 py-4">

        <x-flash-message />

        <form action="{{url('/backend/vehicles/' . $vehicle->id . '/edit')}}" class="form border p-3" method="POST" enctype="multipart/form-data">

            <legend class="text-center h3">Edit Vehicle</legend>

            @csrf

            {{-- Model --}}
            <div class="form-group mb-3">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control" value="{{$vehicle->model}}">
                @error('model')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Brand --}}
            <div class="form-group mb-3">
                <label for="brand">Brand</label>
                <select name="brand_id" id="brand" class="form-select">
                    <option selected disabled>Select Brand</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}"
                        @if($brand->id == $vehicle->brand->id)
                            selected
                        @endif
                        >{{$brand->title}}</option>
                    @endforeach
                </select>
            </div>

            {{-- Category --}}
            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-select">
                    <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" 
                        @if($category->id == $vehicle->category->id)
                            selected
                        @endif
                        >{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            {{-- Engine --}}
            <div class="form-group mb-3">
                <label for="engine">Engine</label>
                <input type="text" name="engine" id="engine" class="form-control" value="{{$vehicle->engine}}">
                @error('engine')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- TRansmission --}}
            <div class="form-group mb-3">
                <label for="transmission">Transmission</label>
                <input type="text" name="transmission" id="transmission" class="form-control" value="{{$vehicle->transmission}}">
                @error('transmission')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Fuel --}}
            <div class="form-group mb-3">
                <label for="fuel">Fuel</label>
                <input type="text" name="fuel" id="fuel" class="form-control" value="{{$vehicle->fuel}}">
                @error('fuel')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Img Fernt View --}}
            <div class="form-group mb-3">
                <label for="front-img">Front View</label>
                <input type="file" name="front_img" id="front-img" class="form-control">
                <img src="{{asset('/image/vehicles/' . $vehicle->front_img)}}" alt="" class="w-50 m-3" style="min-width:150px">
            </div>

            {{-- Img side view --}}
            <div class="form-group mb-3">
                <label for="side-img">Side View</label>
                <input type="file" name="side_img" id="side-img" class="form-control">
                <img src="{{asset('/image/vehicles/' . $vehicle->side_img)}}" alt="" class="w-50 m-3"  style="width:150px">
            </div>

            {{-- Img Back view --}}
            <div class="form-group mb-3">
                <label for="back-img">Back View</label>
                <input type="file" name="back_img" id="back-img" class="form-control">
                <img src="{{asset('/image/vehicles/' . $vehicle->back_img)}}" alt="" class="w-50 m-3"  style="width:150px">
            </div>

            {{-- Img Inside viwe --}}
            <div class="form-group mb-3">
                <label for="inside-img">Inside View</label>
                <input type="file" name="inside_img" id="inside-img" class="form-control">
                <img src="{{asset('/image/vehicles/' . $vehicle->inside_img)}}" alt="" class="w-50 m-3"  style="width:150px">
            </div>

            {{-- Price --}}
            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{$vehicle->price}}">
                @error('price')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Purpose of vehicle --}}
            <div class="form-group mb-3">
                <label for="purpose">Purpose</label>
                <textarea name="purpose" id="purpose"  class="form-control" cols="30" rows="5">{{$vehicle->purpose}}</textarea>
                @error('purpose')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
        </form>
    </div>
</x-backend-layout>