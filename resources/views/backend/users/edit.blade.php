<x-backend-layout>
    <x-flash-message />

    <a href="{{url('/backend/users')}}" class="btn btn-warning">Back</a>

    <form action="{{url('/backend/users/' . $user->id . '/edit')}}" class="form w-75 mx-auto py-3" method="POST">
        @csrf

        {{-- Labeling a user a role --}}
        <legend class="h3 text-center">Define Staff A Role</legend>

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" value="{{$user->name}}" disabled>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="" id="email" class="form-control" value="{{$user->email}}" disabled>
        </div>

        <div class="form-group mb-3">
            {{-- Fetch all roles --}}
            <label for="roles">Roles</label>
            <select name="roles[]" id="roles" class="form-select" multiple>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}"
                        @if (in_array($role->id, $seletedRoles))
                            selected
                        @endif
                        >{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-center">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</x-backend-layout>