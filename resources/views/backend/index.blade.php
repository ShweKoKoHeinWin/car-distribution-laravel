<x-backend-layout>
    <div class="card w-50 mx-auto my-5 p-3" style="max-width:400px">
        <img src="{{asset('/image/cars/app/brand-logo-removebg-preview.png')}}" alt="" class="w-100 border">
        <ul class="list-group">
            @php
                $roles = auth()->user()->getRoleNames();
            @endphp
            <li class="list-group-item">
                @foreach ($roles as $role)
                    {{$role}},
                @endforeach
            </li>
            <li class="list-group-item">Name : {{$user->name}}</li>
            <li class="list-group-item">Email : {{$user->email}}</li>
        </ul>
    </div>
</x-backend-layout>