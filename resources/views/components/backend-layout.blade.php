@props(['phone'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="img/png" href="{{asset('image\cars\app\brand-logo-removebg-preview.png')}}" sizes="16x16" >
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('/bootstrap/dist/css/bootstrap.min.css')}}">

    {{-- Bootswatch --}}
    <link rel="stylesheet" href="{{asset('/bootswatch/dist/United/bootstrap.min.css')}}">

    {{-- Fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom  Css --}}
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body >

  {{-- Backend navigation --}}
    <nav class="navbar navbar-expand-lg bg-success navbar-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{asset('image\cars\app\brand-logo-removebg-preview.png')}}" alt="Brand Logo" style="width:50px; height: 50px;">
            <h5 class="h5 d-inline text-sucess">Shwe</h5>
          </a>
@if(auth()->check())
          @if (auth()->user()->hasAnyRole(['Ceo', 'Manager', 'Vehicle expert', 'Content Writer']))

          <a href="/" class="d-block">
            <button type="button" class="btn btn-success position-relative">
                <i class="fa-solid fa-house"></i> FrontEnd
          </button>
          </a>
          <a href="{{url('/backend')}}" class="d-block">
            <button type="button" class="btn btn-success position-relative">
                <i class="fa-solid fa-house-laptop"></i> DashBoard
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
    
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse main-nav me-2" id="navbarSupportedContent">
            <ul class="navbar-nav text-center ms-auto mb-2 mb-lg-0 me-2">
              
              @if(auth()->user()->hasAnyRole(['Ceo', 'Manager', 'Vehicle expert']))

              <li class="nav-item">
                <a class="nav-link" href="{{url('/backend/brands')}}">Brands</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('/backend/categories')}}">Categories</a>
              </li>
              @endif

              @if(auth()->user()->hasAnyRole(['Ceo']))
              <li class="nav-item">
                <a class="nav-link" href="{{url('/backend/roles')}}">Roles</a>
              </li>
              @endif

            @if(auth()->user()->hasAnyRole(['Ceo', 'Manager', 'Content Writer']))
              <li class="nav-item">
                <a class="nav-link" href="{{url('/frontend/interface')}}">MainPage</a>
              </li>
            @endif

            @if(auth()->user()->hasAnyRole(['Ceo', 'Manager', 'Vehicle expert']))
              <li class="nav-item">
                <a class="nav-link" href="{{url('/backend/vehicles')}}">Vehicles</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="{{url('/backend/services')}}">Services</a>
              </li>
            @endif

            @if(auth()->user()->hasAnyRole(['Ceo', 'Manager']))
              <li class="nav-item">
                <a class="nav-link" href="{{url('/backend/users')}}">Users</a>
              </li>
            @endif

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @if (auth()->check())
                        {{auth()->user()->name}}
                      @else
                        MemberShip
                  @endif
                  
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{url('/logout')}}">Log Out</a></li>
                </ul>
              </li>
            </ul>
          
          </div>
            @endif
        </div>
      </nav>
    <div class="container-fluid px-2" style="padding-top:90px">

  
  {{$slot}}
    </div>
  


    <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>