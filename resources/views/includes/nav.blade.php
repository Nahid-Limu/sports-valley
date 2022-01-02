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
  <div class="sale bg-danger">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center">
          <div class="row">
            <div class="owl-carousel2">
              <div class="item">
                <div class="col">
                  <marquee width="100%" behavior="alternate" ><span style="text-align: center" class="text-warning"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <b style="color:orange;">Good</b> <b style="color: orange">News</b> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span></marquee>
                  <h3><a href="{{ route('pbcevent') }}">Click Here For Badminton Tournament Registation <img src="{{ asset('system_img').'/'.'register-button.png' }}" style="height: 60px"></a></h3>
                </div>
              </div>
              {{-- <div class="item">
                <div class="col">
                  <h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div style="width:100%"><div style="height:0;padding-bottom:85.5072463768116%;position:relative;width:100%"><iframe allowfullscreen="" frameBorder="0" height="100%" src="https://giphy.com/embed/p57qQtbABJ411xjEhC/video" style="left:0;position:absolute;top:0" width="100%"></iframe></div></div> --}}
</nav>