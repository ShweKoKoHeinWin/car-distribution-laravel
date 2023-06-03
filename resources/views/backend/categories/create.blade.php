<x-backend-layout>
    {{-- Back to all Categoties list --}}
    <a href="{{url('/backend/categories')}}" class="btn btn-primary">Back</a>

    <div class="row">  
        <div class="col-md-8 offset-md-2 mx-auto">

            <x-flash-message />

            <form action="{{url('/backend/categories/create')}}" class="form border p-4" method="POST" enctype="multipart/form-data">
                <legend class="h3 text-center mb-3">
                    Create Category
                </legend>

                @csrf

                {{-- Title --}}
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Logo --}}
                <div class="form mb-3">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                    @error('logo')
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