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

<div class="container">

    <div>
		<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
			<h2>Business Category</h2>
		</div>

		<div class="row bg-warning text-dark">
			
			@foreach ($Business as $b)
				<div class="col partner-col text-center">
					<a href="{{ route('categoryDetails', [base64_encode($b->id)]) }}"><img src="{{ asset('system_img').'/'.$b->image }}" class="img-fluid rounded-circle" alt="">
					<br>
					<span class="text-center "> <kbd>{{ $b->cat_name }}</kbd> </span> </a> 
				</div>
			@endforeach
			
		</div>

	</div>

	<div class="colorlib-product">
		<div class="container">

			@foreach ($mainArray as $key => $value)
				@if (count($value))
				<h2 class="text-center text-info "><kbd class="bg-info text-dark font-italic">{{ $value[0]->cat_name }}</kbd></h2>
				
				{{-- <div class="row row-pb-md"> --}}
				<div class="row">
					<div class="w-100"></div>
					@php $count = 0; @endphp
					@foreach ($value as $v)

						@if ($count == 4)
							@break
						@endif
					
						<div class="col-lg-3 mb-4 text-center">
							<div class="product-entry border">
								<a href="{{ route('allProducts', [base64_encode($v->id)] ) }}" class="prod-img">
									<img src="{{ asset('category_product_img').'/'.$v->image }}" class="img-fluid fixed-img-size" alt="Free html5 bootstrap 4 template">
								</a>
								<div class="desc">
									<h2 class="text-uppercase"><a href="{{ route('allProducts', [base64_encode($v->id)] ) }}">{{ $v->cat_product }}</a></h2>
									{{-- <span class="price"><kbd>Price:</kbd> 555 Tk</span> --}}
									<span class="price bg-success">In Stock {{ $v->quantity }} piece</span>
								</div>
							</div>
						</div>
						@php $count++; @endphp

					@endforeach
					{{-- <span style="margin-left: 20px"><a href="{{ route('categoryDetails', [base64_encode($value[0]->bc_id)]) }}" class="btn btn-primary btn-sm">See More </a></span> --}}
				</div>
				<span><a href="{{ route('categoryDetails', [base64_encode($value[0]->bc_id)]) }}" class="btn btn-warning btn-sm">See More </a></span>
				
				@endif
				@continue
				
			@endforeach
		<hr>

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
					{{-- <div class="row"> --}}
						<div class="col-md-2" style="margin-bottom: 10px;">
							<img src="{{ asset('images').'/'.$Brand->image }}" class="img-fluid" style="width: 100px; height: 60px;" >
						</div>
						
					{{-- </div> --}}
				@endforeach

			</div>
		</div>
	</div>
	
    
</div>

@endsection

