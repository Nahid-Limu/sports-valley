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

<div id="page">

    <div class="breadcrumbs bg-warning">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="index.html">Home</a></span> / <span>Category Details</span></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="colorlib-featured">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="featured">
                        <div class="featured-img featured-img-2" style="background-image: url( {{ asset('images/img_bg_2.jpg') }} );">
                            <h2>Casuals</h2>
                            <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="featured">
                        <div class="featured-img featured-img-2" style="background-image: url( {{ asset('images/women.jpg') }} );">
                            <h2>Dress</h2>
                            <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="featured">
                        <div class="featured-img featured-img-2" style="background-image: url( {{ asset('images/item-11.jpg') }} );">
                            <h2>Sports</h2>
                            <p><a href="#" class="btn btn-primary btn-lg">Shop now</a></p>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="col partner-col text-center">
                    <img src="{{ asset('images/brand-1.jpg') }}" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
                <div class="col partner-col text-center">
                    <img src="{{ asset('images/brand-2.jpg') }}" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
                <div class="col partner-col text-center">
                    <img src="{{ asset('images/brand-3.jpg') }}" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
                <div class="col partner-col text-center">
                    <img src="{{ asset('images/brand-4.jpg') }}" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
                <div class="col partner-col text-center">
                    <img src="{{ asset('images/brand-5.jpg') }}" class="img-fluid" alt="Free html4 bootstrap 4 template">
                </div>
            </div>
        </div>
    </div>

</div>

@endsection