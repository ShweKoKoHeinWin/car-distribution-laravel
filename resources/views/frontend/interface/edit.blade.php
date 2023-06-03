<x-backend-layout>
    <x-flash-message />

    <a href="{{url('/frontend/interface')}}" class="btn btn-primary">Back</a>

    <div class="row">  
        <div class="col-md-8 offset-md-2 mx-auto">
            <form action="{{url('/frontend/interface/edit/' . $interface->id)}}" class="form border p-4" method="POST" enctype="multipart/form-data">

                <legend class="h3 text-center mb-3">
                    Create New Interface
                </legend>

                @csrf

                {{-- Banner Video --}}
                <div class="form-group mb-3">
                    <label for="banner_video">Banner Video</label>
                    <input type="file" name="banner_video" id="banner_video">

                    {{-- Previous video --}}
                    <video src="{{asset('/video/' . $interface->banner_video)}}" class="w-100 mt-3" controls muted autoplay></video>
                </div>
                
                {{-- Banner Text --}}
                <div class="form-group mb-3">
                    <label for="banner_text">Banner Text</label>
                    <input type="text" name="banner_text" id="banner_text" class="form-control" value="{{$interface->banner_text}}">
                    @error('banner_text')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- About Img --}}
                <div class="form mb-3">
                    <label for="about_img">About Image</label>
                    <input type="file" name="about_img" id="about_img" class="form-control">
                    {{-- Old img --}}
                    <img src="{{asset('/image/cars/app/' . $interface->about_img)}}" class="w-50 mt-3" alt="">
                </div>

                {{-- ABout Text --}}
                <div class="form-group mb-3">
                    <label for="about_text">About Text</label>
                    <textarea name="about_text" id="about_text" cols="30" rows="5" class="form-control">
                        {{$interface->about_text}}
                    </textarea>

                    @error('about_text')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- About Brands Logos --}}
                <div class="form-group mb-3">
                    <label for="about_imgs">About Brand Logos</label>
                    <input type="file" name="about_imgs[]" id="about_imgs" class="form-control" multiple>
                    <div class="row my-2">
                        @php
                            $images = json_decode($interface->about_imgs, true) ;
                        @endphp
                        {{-- Show All Old Logos --}}
                        @foreach($images as $image)
                        <div class="col-md-4 col-sm-6 mt-3">
                            <img src="{{asset('/image/cars/logos/' . $image)}}" class="border" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- location --}}
                <div class="form-group mb-3">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control" value="{{$interface->location}}">
                    @error('location')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control" value="{{$interface->phone}}">
                    @error('phone')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$interface->email}}">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" value="Edit" class="btn btn-primary">
                    @error('about_img')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</x-backend-layout>