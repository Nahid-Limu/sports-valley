@extends('layouts.app')
@section('title', 'Product')
@section('css')
<style>

    /* Make the image fully responsive */
    .carousel-inner img {
        width:740px;
        height:360px;
    }

    .carousel-indicators li {
    background-color:aqua;
    }
    .carousel-indicators .active {
        background-color: #fa0000;
    }
</style>
@endsection
@section('content')

<div id="page">

    <div class="breadcrumbs bg-warning">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home') }}">Home</a></span> / <span>Category Details</span> / <span>All Products</span> / <span>Product Details</span></p>
                </div>
            </div>
        </div>
    </div>


    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg product-detail-wrap">
                <div class="col-sm-8">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                          <li data-target="#demo" data-slide-to="0" class="active"></li>
                          <li data-target="#demo" data-slide-to="1"></li>
                          <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            @foreach ($images as $key => $image)
                                <div class="carousel-item {{ ($key == 0 ) ? "active" : "" }} ">
                                    <img src="{{ asset('product_img').'/'.$image }}" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev" >
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                      </div>
                </div>
                <div class="col-sm-4 bg-warning">
                    <div class="product-desc">
                        <br>
                        <table class="table table-sm table-bordered table-light">
                            <tbody>
                                <tr>
                                    <kbd class="d-flex justify-content-center">Details</kbd>
                                  </tr>
                              <tr>
                                <td colspan="2"><kbd>Product Name:</kbd></td>
                                <td><h5>{{ $product->name }}</h5></td>
                              </tr>
                              <tr>
                                <td colspan="2"><kbd>Code:</kbd></td>
                                <td><h5>{{ $product->code }}</h5></td>
                              </tr>
                              <tr>
                                <td colspan="2"><kbd>Brand:</kbd></td>
                                <td><h5>{{ $product->barnd }}</h5></td>
                              </tr>
                              <tr>
                                <td colspan="2"><kbd>Price:</kbd></td>
                                <td><h5>{{ $product->selling_price }}Tk</h5></td>
                              </tr>
                              <tr>
                                <td colspan="2"><kbd>In Stock:</kbd></td>
                                <td><h5>{{ $product->quantity }} piece</h5></td>
                              </tr>
                            </tbody>
                          </table>
                        <br>
                        <p>
                            {{-- <span class="text-info">Brand: xyz</span><br> --}}
                            
                        </p>
                        {{-- <div class="size-wrap">
                            <div class="block-26 mb-2">
                                <h4>Size</h4>
                                <ul>
                                    <li><a href="#">7</a></li>
                                    <li><a href="#">7.5</a></li>
                                    <li><a href="#">8</a></li>
                                    <li><a href="#">8.5</a></li>
                                    <li><a href="#">9</a></li>
                                    <li><a href="#">9.5</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#">10.5</a></li>
                                    <li><a href="#">11</a></li>
                                    <li><a href="#">11.5</a></li>
                                    <li><a href="#">12</a></li>
                                    <li><a href="#">12.5</a></li>
                                    <li><a href="#">13</a></li>
                                    <li><a href="#">13.5</a></li>
                                    <li><a href="#">14</a></li>
                                </ul>
                            </div>
                            <div class="block-26 mb-4">
                                    <h4>Width</h4>
                            <ul>
                                <li><a href="#">M</a></li>
                                <li><a href="#">W</a></li>
                            </ul>
                            </div>
                        </div> --}}
                        {{-- <div class="input-group mb-4">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                            <i class="icon-minus2"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-1">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="icon-plus2"></i>
                                </button>
                            </span>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                {{-- <p class="addtocart"><a href="cart.html" class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart</a></p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12 pills">
                            <div class="bd-example bd-example-tabs">
                              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                  <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Full Description</a>
                                </li>
                                {{-- <li class="nav-item">
                                  <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Manufacturer</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li> --}}
                              </ul>

                              <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                        <div class="col-md-6"> 
                                            <div class="desc-title">
                                                {{-- <h4 class="font-weight-bolder">Name: {{ $product->name }} </h4>
                                                <h5 class="font-weight-bolder">Brand: {{ $product->barnd }}</h5> --}}
                                                <span class="text-success">Description:</span>
                                                <p>{{ $product->product_description }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                                    </div> --}}

                                    {{-- <div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="head">23 Reviews</h3>
                                                <div class="review">
                                                    <div class="user-img" style="background-image: url(images/person1.jpg)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left">Jacob Webb</span>
                                                            <span class="text-right">14 March 2018</span>
                                                        </h4>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-half"></i>
                                                                <i class="icon-star-empty"></i>
                                                            </span>
                                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                                    </div>
                                                </div>
                                                <div class="review">
                                                    <div class="user-img" style="background-image: url(images/person2.jpg)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left">Jacob Webb</span>
                                                            <span class="text-right">14 March 2018</span>
                                                        </h4>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-half"></i>
                                                                <i class="icon-star-empty"></i>
                                                            </span>
                                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                                    </div>
                                                </div>
                                                <div class="review">
                                                    <div class="user-img" style="background-image: url(images/person3.jpg)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left">Jacob Webb</span>
                                                            <span class="text-right">14 March 2018</span>
                                                        </h4>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-half"></i>
                                                                <i class="icon-star-empty"></i>
                                                            </span>
                                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="rating-wrap">
                                                    <h3 class="head">Give a Review</h3>
                                                    <div class="wrap">
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                (98%)
                                                            </span>
                                                            <span>20 Reviews</span>
                                                        </p>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (85%)
                                                            </span>
                                                            <span>10 Reviews</span>
                                                        </p>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (70%)
                                                            </span>
                                                            <span>5 Reviews</span>
                                                        </p>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (10%)
                                                            </span>
                                                            <span>0 Reviews</span>
                                                        </p>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (0%)
                                                            </span>
                                                            <span>0 Reviews</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                              </div>
                            </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection