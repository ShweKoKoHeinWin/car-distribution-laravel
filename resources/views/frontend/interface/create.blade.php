<x-backend-layout>

    <x-flash-message />

    <a href="{{url('/frontend/interface')}}" class="btn btn-primary">Back</a>

    <div class="row">  
        <div class="col-md-8 offset-md-2 mx-auto">
            <form action="{{url('/frontend/interface/create')}}" class="form border p-4" method="POST" enctype="multipart/form-data">

                <legend class="h3 text-center mb-3">
                    Create New Interface
                </legend>

                @csrf

                {{-- Banner Video --}}
                <div class="form-group mb-3">
                    <label for="banner_video">Banner Video</label>
                    <input type="file" name="banner_video" id="banner_video" class="form-control">
                    @error('banner_video')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                {{-- Banner Text --}}
                <div class="form-group mb-3">
                    <label for="banner_text">Banner Text</label>
                    <input type="text" name="banner_text" id="banner_text" class="form-control">
                    @error('banner_text')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- About Main Img --}}
                <div class="form mb-3">
                    <label for="about_img">About Image</label>
                    <input type="file" name="about_img" id="about_img" class="form-control">
                    @error('about_img')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- About Text --}}
                <div class="form-group mb-3">
                    <label for="about_text">About Text</label>
                    <textarea name="about_text" id="about_text" cols="30" rows="5" class="form-control"></textarea>
                    @error('about_text')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- About Brands Img --}}
                <div class="form-group mb-3">
                    <label for="about_imgs">About Brand Logos</label>
                    <input type="file" name="about_imgs[]" id="about_imgs" class="form-control" multiple>
                    @error('about_imgs')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Location --}}
                <div class="form-group mb-3">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control">
                    @error('location')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control">
                    @error('phone')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
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