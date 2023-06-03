{{-- Navigation --}}
<nav class="navbar navbar-expand-lg bg-success navbar-dark fixed-top">
    <div class="container-fluid">

      {{-- LOgo --}}
      <a class="navbar-brand" href="#">
        <img src="{{asset('image\cars\app\brand-logo-removebg-preview.png')}}" alt="Brand Logo" style="width:50px; height: 50px;">
        <h5 class="h5 d-inline text-sucess">Shwe</h5>
      </a>

      {{-- For Backend side --}}
@if (auth()->check())
  @if(auth()->user()->hasAnyRole(['Ceo', 'Manager', 'Content Writer', 'Vehicle expert']))
      <a href="{{url('/backend')}}" class="d-block">
        <button type="button" class="btn btn-success position-relative">
            <i class="fa-solid fa-house-laptop"></i> Admin
      </button>
      </a>      
  @endif

  @php
      $unreadCount = auth()->user()->unreadNotifications->count();
  @endphp

  <a href="{{url('/noti')}}" class="mx-3">
    <button type="button" class="btn btn-success position-relative border border-danger">
        <i class="fa-solid fa-bell"></i>
        @if($unreadCount > 0)
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $unreadCount }}
                    </span>
        @endif
    </button>
  </a>
 
@endif




     

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse main-nav me-2" id="navbarSupportedContent">
        <ul class="navbar-nav text-center ms-auto mb-2 mb-lg-0 me-2">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}#about">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}#contact">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/vehicles')}}">Vehicles</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/services')}}">Services</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              @if (auth()->check())
                    {{-- {{auth()->user()->getAllPermissions()->pluck('name')->toArray()}} --}} 
                    {{auth()->user()->name}}
                  @else
                    MemberShip
              @endif
            </a>

            <ul class="dropdown-menu">
              @if (!auth()->check())
                <li><a class="dropdown-item" href="{{url('/register')}}">Register</a></li>
                <li><a class="dropdown-item" href="{{url('/login')}}">Log In</a></li>
              @else
                <li><a class="dropdown-item" href="{{url('/logout')}}">Log Out</a></li>
              @endif
            </ul>
          </li>

        </ul>

      </div>
    </div>
  </nav>
