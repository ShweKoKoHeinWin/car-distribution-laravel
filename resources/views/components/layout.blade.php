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

  {{-- Navigation --}}
    <x-navigation />
<div  style="padding-top:70px">

</div>
    {{$slot}}

     <!-- FOOTER SECTION -->
     {{-- Add space --}}
    <div style="padding-bottom:70px"></div>

   <footer class="fixed-bottom bg-success text-light px-3 py-2">
    <div class="row align-items-center gx-2 gy-2">
      <h5 class="col-lg-7 col-12 order-lg-1 order-md-2 order-sm-2 order-xs-2">&copy; <span>2022</span> Created By Shwe Ko Ko Hein Win</h5>
      <div class="col-lg-5 col-12 d-flex justify-content-between align-items-center order-lg-2 order-md-1 order-sm-1 order-xs-1">
        <a href="tel:{{$phone}}" class="btn btn-light mx-3"><i class="fa-solid fa-phone"></i> {{$phone}}</a>
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          </li>
          <li class="list-group-item">
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
          </li>
          <li class="list-group-item">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
          </li>
          <li class="list-group-item">
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
          </li>
        </ul>
      </div>
      
    </div>
    
</footer>

    <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>