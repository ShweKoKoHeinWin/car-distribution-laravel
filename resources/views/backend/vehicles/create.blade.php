<x-backend-layout>

    <a href="{{url('/backend/vehicles')}}" class="btn btn-primary my-4">Back</a>

    <div class="col-8 offset-2 py-4">
        
        <x-flash-message />

        <form action="{{url('/backend/vehicles/create')}}" class="form border p-3" method="POST" enctype="multipart/form-data">

            <legend class="text-center h3">Create Vehicle</legend>

            @csrf

            {{-- Car Model code --}}
            <div class="form-group mb-3">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control">
                @error('model')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- All Brands --}}
            <div class="form-group mb-3">
                <label for="brand">Brand</label>
                <select name="brand_id" id="brand" class="form-select">
                    <option selected disabled>Select Brand</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                    @endforeach
                </select>
            </div>

            {{-- All Categories --}}
            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-select">
                    <option selected disabled>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            
            {{-- Engine type --}}
            <div class="form-group mb-3">
                <label for="engine">Engine</label>
                <input type="text" name="engine" id="engine" class="form-control">
                @error('engine')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Transmission --}}
            <div class="form-group mb-3">
                <label for="transmission">Transmission</label>
                <input type="text" name="transmission" id="transmission" class="form-control">
                @error('transmission')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Fuel Type --}}
            <div class="form-group mb-3">
                <label for="fuel">Fuel</label>
                <input type="text" name="fuel" id="fuel" class="form-control">
                @error('fuel')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Img Front view --}}
            <div class="form-group mb-3">
                <label for="front-img">Front View</label>
                <input type="file" name="front_img" id="front-img" class="form-control">
            </div>

            {{-- Img Side View --}}
            <div class="form-group mb-3">
                <label for="side-img">Side View</label>
                <input type="file" name="side_img" id="side-img" class="form-control">
            </div>

            {{-- Img Back View --}}
            <div class="form-group mb-3">
                <label for="back-img">Back View</label>
                <input type="file" name="back_img" id="back-img" class="form-control">
            </div>

            {{-- Img Inside View --}}
            <div class="form-group mb-3">
                <label for="inside-img">Inside View</label>
                <input type="file" name="inside_img" id="inside-img" class="form-control">
            </div>

            {{-- Price --}}
            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control">
                @error('price')
                <p class="text-danger">{{$message}}</p>
            @enderror
            </div>

            {{-- Purpose of product --}}
            <div class="form-group mb-3">
                <label for="purpose">Purpose</label>
                <textarea name="purpose" class="form-control" id="purpose" cols="30" rows="5"></textarea>
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