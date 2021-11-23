@extends('layouts.app')
@section('title', 'All Category')
@section('css')
<style>

  /* Make the image fully responsive */
  /* .carousel-inner img {
    width: 100%;
    height: 100%;
  } */
</style>
@endsection
@section('content')
<div class="contenton">
    <div id="page">

        <div class="breadcrumbs bg-warning">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Category Details</span></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="colorlib-featured">
            <div class="container">
                @if (count($cat_details))
                    <div class="row">
                        @foreach ($cat_details as $cd)
                            <div class="col-sm-4 text-center">
                                <div class="featured">
                                    <div class="featured-img featured-img-2" style="background-image: url(  {{ asset('category_product_img').'/'.$cd->image }}  );">
                                        <h2 class="font-weight-bold" style="color: aqua"> {{ $cd->cat_product }} </h2>
                                        <p><a href="{{ route('allProducts', [base64_encode($cd->id)] ) }}" class="btn btn-primary btn-md">Click To See All</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h1 class="text-danger font-italic d-flex justify-content-center">Sorry No Product available</h1>
                @endif
                <span class="d-flex justify-content-center">{{ $cat_details->links() }}</span>
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
                        {{-- <div class="col partner-col text-center">
                            <img src="{{ asset('images').'/'.$Brand->image }}" class="img-fluid" alt="Free html4 bootstrap 4 template">
                        </div> --}}
                        <div class="col-md-2" style="margin-bottom: 10px;">
                            <img src="{{ asset('images').'/'.$Brand->image }}" class="img-fluid" style="width: 100px; height: 60px;" >
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    
    </div>
</div>


@endsection