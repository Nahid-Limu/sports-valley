@extends('layouts.appAdmin')
@section('title', 'Sales')
@section('css')
<style>

  .product_img {
    width: 200px;
    height: 200px;
  }
</style>
@endsection

@section('content')



<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="container">
           
    <div class="row row-pb-md">
        <div class="w-100"></div>
        <div class="col-lg-3 mb-4 text-center">
          <div class="product-entry border">
              <a href="" class="prod-img">
                  <button class="btn-sm btn-info">View Details</button>
                  <img src="{{ asset('product_img').'/'.'1635245034-aaa0.jpg' }}" class="img-fluid fixed-img-size product_img">
              </a>
              <div class="desc">
                  <h2 class="text-uppercase"><a href="#">bbs</a></h2>
                  <span class="price"><kbd>Brand:</kbd> xxx</span>
                  <span class="price bg-success">In Stock  piece</span>
              </div>
          </div>
      </div>
        
    </div>
    <span class="d-flex justify-content-center"></span>
</div>

  <!-- Content Row -->

  <!-- Content Row  details-->
  <div class="row">


  </div>

  

</div>

@endsection

@section('script')
// <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection