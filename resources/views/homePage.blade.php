@extends('layouts.app')
@section('title', 'Home')
@section('css')
<style>
	.fixed-img-size {
		width: 200px; 
		height: 200px;
		margin-top: 20px;
    	/* object-fit: cover; */
}
</style>
@endsection
@section('content')
{{-- @include('includes.nav') --}}
<div class="container">

    <div id="page">
		
		{{-- <h2 style="text-align: center;color: gray">ALL Category</h2> --}}
		<div class="colorlib-intro">
		
			<h2 class="intro" style="text-align: center;color: gray">ALL Category</h2>
			<div class="row bg-warning text-dark">
				<div class="col partner-col text-center">
					<a href="http://"> <img src="system_img/cat1.jpeg" class="img-fluid rounded-circle" alt="Free html4 bootstrap 4 template">
					<span class="text-center "> <kbd>Sports Accessories</kbd> </span> </a>
				</div>
				<div class="col partner-col text-center">
					<a href="http://"> <img src="system_img/cat2.png" class="img-fluid rounded-circle" alt="Free html4 bootstrap 4 template">
					<span class="text-center "> <kbd>Sports Wear</kbd> </span> </a>
				</div>
				<div class="col partner-col text-center">
					<a href="http://"><img src="system_img/cat3.png" class="img-fluid rounded-circle" alt="Free html4 bootstrap 4 template">
					<span class="text-center "> <kbd>Fitness</kbd> </span> </a> 
				</div>			
			</div>

		</div>

		<div class="colorlib-product">
			<div class="container">
				<h2 class="text-center text-danger "><ins>Sports Accessories</ins></h2>
				<div class="row row-pb-md">
					<div class="w-100"></div>

					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/bat.jpg" class="img-fluid fixed-img-size"  alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">BAT</a></h2>
								<span class="price"><kbd>Price:</kbd> s555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/racket.jpg" class="img-fluid fixed-img-size"  alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">racket</a></h2>
								<span class="price"><kbd>Price:</kbd> s555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/ball.png" class="img-fluid fixed-img-size" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">ball</a></h2>
								<span class="price"><kbd>Price:</kbd> s555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/Shuttle-Cock.jpg" class="img-fluid fixed-img-size" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">Shuttle-Cock</a></h2>
								<span class="price"><kbd>Price:</kbd> s555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<span style="margin-left: 20px"><a href="#" class="btn btn-primary btn-sm">See More </a></span>
				</div>

				<h2 class="text-center text-info"><ins>Sports Wear</ins></h2>
				<div class="row row-pb-md">
					<div class="w-100"></div>

					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/item-9.jpg" class="img-fluid fixed-img-size" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">Shoes</a></h2>
								<span class="price"><kbd>Price:</kbd> 555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="system_img/No-Image.png" class="img-fluid fixed-img-size" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">TruckShot</a></h2>
								<span class="price"><kbd>Price:</kbd> 555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/trouser-man.jpg" class="img-fluid fixed-img-size" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">trouser</a></h2>
								<span class="price"><kbd>Price:</kbd> 555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="#" class="prod-img">
								<img src="images/jersey.jpg" class="img-fluid fixed-img-size" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2 class="text-uppercase"><a href="#">jersey</a></h2>
								<span class="price"><kbd>Price:</kbd> 555 Tk</span>
								<span class="price bg-success">In Stock 10 piece</span>
							</div>
						</div>
					</div>
					<span style="margin-left: 20px"><a href="#" class="btn btn-primary btn-sm">See More </a></span>
					
				</div>
            <hr>

		</div>

		
	</div>
	
    
</div>

@endsection

