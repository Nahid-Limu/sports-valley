<style>
  .displayed {
    display: block;
    margin-left: auto;
    margin-right: auto }
</style>
<nav class="colorlib-nav bg-warning" role="navigation">
  <div class="">
  {{-- <div class="top-menu"> --}}
    <div class="container ">
      <div class=" ">
        {{-- <div class="col-sm-1 col-md-1">
          <img src="{{ asset('system_img').'/'.'logo.png' }}" style="height: 100px; width: 50px;;" alt="">
        </div> --}}
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
            {{-- <li class="has-dropdown">
              <a href="men.html">Men</a>
              <ul class="dropdown">
                <li><a href="product-detail.html">Product Detail</a></li>
                <li><a href="cart.html">Shopping Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="order-complete.html">Order Complete</a></li>
                <li><a href="add-to-wishlist.html">Wishlist</a></li>
              </ul>
            </li> --}}
            @php
                $Business= App\BusinessCategory::get();
            @endphp
            @foreach ($Business as $b)
              <li><a href="{{ route('categoryDetails', [base64_encode($b->id)]) }}">{{ $b->cat_name }}</a></li>   
            @endforeach
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li class="cart"><a href="cart.html"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="sale">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 offset-sm-2 text-center">
          <div class="row">
            <div class="owl-carousel2">
              <div class="item">
                <div class="col">
                  <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
                </div>
              </div>
              <div class="item">
                <div class="col">
                  <h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</nav>