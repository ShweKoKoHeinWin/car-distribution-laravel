@section('title', 'Home')

<x-layout :phone="$data->phone">
  {{-- Banner --}}
    <section class="container-fluid position-relative p-0" style="min-height: auto">    
        <div class="position-relative">
            <video class="banner-mp4" autoplay muted loop style="width:100%;max-height: 1000px;">
                <source src="{{asset('video/' . $data->banner_video)}}" alt="banner video">
            </video>
            <div class="text-warning position-absolute top-50 start-50 translate-middle text-center p-3  w-75" style="background: rgba(2,2,2,0.4)">
                <h2 class="h5 text-start ms-3 mb-3">Welcome To Our Community.</h2>
                <h1 class="h4 mb-3">Our <em class="text-secondary">Shwe Automobile</em> is the best luxally car distributor <br> in Myanmar.</h1>
                <h3 class="h5 mb-3">{{$data->banner_text}}</h3>
                <a href="" class="btn btn-success">Click to become one of us.</a>
            </div>
        </div>  
    </section>

  {{-- About --}}
    <section id="about" class="container-fluid bg-info p-5">
      <h3 class="h4 text-center text-light mb-5">About Us</h3>
      <div class="row g-4">
        <div class="col-lg-6 col-12 order-lg-1 order-sm-2 order-xs-2">
          <h4 class="h5">{{htmlspecialchars_decode($data->about_text, ENT_QUOTES | ENT_HTML5);}}</h4>

          <h5 class="h5 mb-4">
            We have a large community with many brands as shown below
          </h5>

          <div class="row  justify-content-center align-items-center  gy-3 brands">
            @php
                $imgs = json_decode($data->about_imgs);
            @endphp
            {{-- BRands  Logos --}}
            @foreach ($imgs as $img)
              <div class="col-3">
                <img src="{{asset('image/cars/logos/' . $img)}}" alt="">
              </div>
            @endforeach 
          </div>
        </div>

        <div class="col-12 col-lg-6 order-lg-2 order-sm-1 order-xs-1">
          {{-- Main About img --}}
          <img src="{{asset('image/cars/app/' . $data->about_img)}}" alt="">
        </div>
      </div>
    </section>

      <!-- START CONTACT SECTION -->
      <section id="contact" class="container-fluid py-5">
        <h4 class="h4 text-center mb-4 text-light">Contact Us</h4>
            <div class="row">
              <div class="col-lg-9 col-md-7">
                <table class="table w-75 m-auto text-warning">
                  <tr>
                      <th colspan="3"><a href="#" class="nav-link">
                          <img style="width:80px" src="{{asset('image\cars\app\brand-logo-removebg-preview.png')}}" alt="brand logo">
                          <span class="h4"><b class="h3">SHWE</b> Automobile</span>
                      </a></th>
                  </tr>
                  <tr>
                      <th class="w-25">Location</th>
                      <td class="w-25">=></td>
                      <td class="w-50">{{$data->location}}</td>
                  </tr>
                  <tr>
                      <th>Phones</th>
                      <td>=></td>
                      <td>{{$data->phone}}</td>
                  </tr>
                  <tr>
                      <th>Email Address</th>
                      <td>=></td>
                      <td>{{$data->email}}</td>
                  </tr>
                  <tr>
                      <th>FaceBook Page</th>
                      <td>=></td>
                      <td><a href="#">To Facebook page</a></td>
                  </tr>
              </table>
              </div>
            </div>
        
    </section>
  <!-- END CONTACT SECTION -->

  

</x-layout>