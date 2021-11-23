@extends('layouts.app')
@section('title', 'About')
@section('css')
<style>
   blockquote {
        margin: 0;
    }

    blockquote p {
        padding: 15px;
        background: #eee;
        border-radius: 5px;
    }

    blockquote p::before {
        content: '\201C';
    }

    blockquote p::after {
        content: '\201D';
    }
 
</style>
@endsection
@section('content')

    <div class="breadcrumbs bg-warning">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>About</span></p>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('message'))
    <div id="successMessage" class="alert alert-dismissible alert-success" style="display: inline-block; float: right; ">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong> {{ Session::get('message') }} </strong>
    </div>
    @endif

    <div class="colorlib-about">
        <div class="container">
            <h3 class="text-center bg-warning font-italic">The Company</h3>
            <div class="row row-pb-lg">
                <div class="col-sm-6 mb-3">
                    <div class="video colorlib-video" style="background-image: url(system_img/soprtsvalley.jpg);">
                        <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-play3"></i></a>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="about-wrap">
                        <h2> <kbd>Sports Valley</kbd> the leading eCommerce Store around the Globe</h2>
                        <p>Where We Provide Sports Accessories, Sports Good, Sports Wear, Fitness Equipment and Other Sports related product.</p>
                        <p>We Provide our Customers with the best Satisfaction for Sustainable competivtive advantage.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-about">
        <div class="container">
            <h3 class="text-center bg-warning font-italic">The CEO</h3>
            <div class="row row-pb-lg">
                <div class="col-sm-6 mb-3">
                    <div class="video colorlib-video" style="background-image: url(system_img/ceo.jpg);">
                        {{-- <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-play3"></i></a> --}}
                        {{-- <div class="overlay"></div> --}}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="about-wrap">
                        <h2> <kbd>Abdullah Al Noman</kbd></h2>
                        <h5>Chief Executive Officer (CEO) & Founder at SportsValley</h5>
                        <figure>
                            <blockquote cite="https://www.huxley.net/bnw/four.html">
                                <p>
                                    I AM NOT PERFECT <br>
                                    I AM NOT IMPERFECT <br>
                                    I AM GROWING UP <br>
                                    EVERYDAY IS A CHANCE <br>
                                    TO BE BETTER.......
                                </p>
                            </blockquote>
                            <figcaption>—Abdullah Al Noman, <cite>SportsValley CEO</cite></figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


@endsection
