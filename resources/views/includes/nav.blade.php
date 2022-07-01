<style>
  .displayed {
    display: block;
    margin-left: auto;
    margin-right: auto 
  }
    
  ul li a:hover {
    background-color: yellow;
    text-decoration: none;
  }
  .center-block {
    display: block;
    margin-left: auto;
    margin-right: auto;
 }
</style>
<nav class="colorlib-nav bg-info" role="navigation">
  <div class="">
    
    <div class="container ">
      <div class=" ">
        
        <img class="displayed" src="{{ asset('system_img').'/'.'logo.png' }}" style="height: 100px; width: 50px;;" alt="">
        <div class="">
          <div style="text-align: center" id="colorlib-logo"><a href="{{ route('home') }}">Sports Valley</a></div>
          <marquee width="100%" direction="left" ><span style="text-align: center" class="text-danger">Let's play The Game</span></marquee>
        </div>
        {{-- <div class="col-sm-5 col-md-3">
          <form action="#" class="search-wrap">
              <div class="form-group">
                <input type="search" class="form-control search" placeholder="Search">
                <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
              </div>
          </form>
        </div> --}}
      </div>
      <div class="row">
        <div class="col-sm-12 text-left menu-1">
          <ul>
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            @php
                $Business= App\BusinessCategory::get();
            @endphp
            @foreach ($Business as $b)
              <li><a href="{{ route('categoryDetails', [base64_encode($b->id)]) }}">{{ $b->cat_name }}</a></li>   
            @endforeach
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li class="cart"><a href="cart.html"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
          </ul>
        </div>
      </div>
      <br>
    </div>
  </div>

  {{-- one time event section --}}

  {{-- <div class="sale bg-danger">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <marquee width="100%" behavior="alternate" ><span  class="text-warning"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <b style="color:orange;">Good</b> <b style="color: orange">News</b> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span></marquee>
        </div>
        <div class="col-md-12">
          <h3><a href="{{ route('pbcevent') }}">  <img class="center-block" src="{{ asset('system_img').'/'.'pbcLogo.png' }}"   style="width: 210px; height: 155px;"> <img class="center-block" src="{{ asset('system_img').'/'.'register-button.png' }}" style="height: 60px"></a></h3>
        </div>
        
        
      </div>
    </div>
  </div> --}}

  {{-- one time event section --}}
</nav>