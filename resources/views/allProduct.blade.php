@extends('layouts.app')
@section('title', 'All Category')
@section('css')
<style>

  /* Make the image fully responsive */
  /* .carousel-inner img {
    width: 100%;
    height: 100%;
  } */

  .product_img {
    width: 250px;
    height: 250px;
  }
</style>
@endsection
@section('content')

<div id="page">

    <div class="breadcrumbs bg-warning">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Category Details</span> / <span>All Products</span></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="colorlib-featured">
        <div class="container">
           
            <div class="row row-pb-md">
                <div class="w-100"></div>
                @if (count($products))
                    
                    @foreach ($products as $product)
                        <div class="col-lg-3 mb-4 text-center">
                            <div class="product-entry border">
                                <a href="{{ route('productDetails', [base64_encode($product->id)] ) }}" class="prod-img">
                                    <button class="btn-sm btn-info">View Details</button>
                                    <img src="{{ asset('product_img').'/'.$product->image }}" class="img-fluid fixed-img-size product_img">
                                </a>
                                <div class="desc">
                                    <h2 class="text-uppercase"><a href="#">{{ $product->name }}</a></h2>
                                    <span class="price"><kbd>Brand:</kbd> {{ $product->barnd }}</span>
                                    <span class="price bg-success">In Stock {{ $product->quantity }} piece</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                @else
                    <h1 class="text-danger font-italic d-flex justify-content-center">Sorry No Product available !!!</h1>
                @endif
                
            </div>
            <span class="d-flex justify-content-center">{{ $products->links() }}</span>
        </div>
    </div>

    <div class="colorlib-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                    <h2>Brandes We Provide</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($Brands as $Brand)
                    @if ($Brand->id==99)
                        @continue
                    @endif
                    <div class="col partner-col text-center">
                        <img src="{{ asset('images').'/'.$Brand->image }}" class="img-fluid" alt="Free html4 bootstrap 4 template">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection