<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Content Row -->
	<div class="container">
			 
	  {{-- <div class="row row-pb-md" id="salesProductlist">
		  <div class="w-100"></div>
		  
		  
		  
	  </div>
	  <span class="d-flex justify-content-center"></span> --}}
  
	  <div class="row" >
		  <div class="col-md-2"></div>
  
		  {{-- <div class="col-md-8">
			  <div class="container h-100">
				  <form id="autosearch" method="post" class="table ">
					@csrf
					  <div class="d-flex justify-content-center h-100">
						  <div class="searchbar">
						  <input onkeyup="productsearch()" class="search_input" type="text" name="search" id="search" placeholder="Search Product Here....">
						  <a href="#" class="search_icon"><i class="fa fa-search-plus"></i></a>
						  </div>
					  </div>
				  </form>
				  <p id="noTest" style="text-align: center" hidden></p>
				  <div  id="testlist" style="margin: auto; position: absolute;">
					
				  </div>
			  </div>
		  </div> --}}
  
		  <div class="col-md-2"></div>
	  </div>
  
	  {{-- <div class="table-responsive table-hover" style="overflow: auto; height: 300px;">
		<table class="table" id="tableData">
			<thead style="background: aqua; text-align: center; font-style: bold;">
			<tr>
				<th>No</th>
				<th>Test Name</th>
				<th>Test Code</th>
				<th>Test Price</th>
				<th class="testaction">Action</th>
				
			</tr>
			</thead>
  
			<tbody  id="testTable" style="text-align: center; font-style: bold;">         
			</tbody>
  
			<tbody id="rseTbody" hidden style="background:steelblue; text-align: center; font-style: bold;">
				<tr >
					<td>&nbsp</td>
					<td><b> Sub Total</b></td>
					<td><b>:</b></td>
					<td ><b id="result" ><b></b></td>
					<td class ="testaction"></td>
				</tr>
				<tr >
					<td>&nbsp</td>
					<td><b> Discount</b></td>
					<td><b>:</b></td>
					<td ><b id="discountAmount" ><b></b></td>
					<td class ="testaction"><input type="hidden" class="form-control w-50 p-3 float-right" placeholder="Discount Amount" onkeyup="calculateSum()" id="discount" name="discount" value="" disabled="disabled"> </td>
				</tr>
				<tr >
					<td>&nbsp</td>
					<td><b> Total</b></td>
					<td><b>:</b></td>
					<td ><b id="discountResult" ><b></b></td>
					<td class ="testaction"><input type="hidden" class="form-control w-50 p-3 float-right" > </td>
				</tr>
			</tbody> 
		</table>
		<div style=" display: flex; justify-content: center;">
			<button disabled="disabled" class="btn btn-primary" type="submit" id="con" onclick="userRegModal()"><i class="fas fa-sign-out-alt"></i> Confirm</button>
			<button disabled="disabled" type="button" class="btn btn-danger" id="dis" style="margin-left: 10px;">Discard</button>
		</div>
	</div> --}}
  
		  <div class="card-body">
			  <table id="ProductDetailsListTable" class="table table-sm table-bordered table-striped" style="width:100%; ">
				  <thead>
					  <tr>
						  
						  {{-- <th class="text-center">#NO</th> --}}
						  <th class="text-center">Code</th>
						  <th class="text-center">Product Name</th>
						  <th class="text-center">Quantity</th>
						  <th class="text-center">Brand</th>
						  <th class="text-center">Price(BUY)</th>
						  <th class="text-center">Price(SALE)</th>
						  <th class="text-center">Images</th>
						  <th class="text-center">Action</th>
					  
					  </tr>
				  </thead>
				  <tbody>
					  {{-- {!! $output !!} --}}
					  @foreach ($products as $product)
					  <tr>
						  <td>{{ $product->code }}</td>
						  <td>{{ $product->name }}</td>
						  <td>{{ $product->quantity }}</td>
						  <td>{{ $product->barnd }}</td>
						  <td>{{ $product->buying_price }}</td>
						  <td>{{ $product->selling_price }}</td>
					  
						  <td>
							  @php
								  $img = explode("@",$product->image);
							  @endphp
							  @foreach ($img as $key => $item)
							  <img src="{{ asset('product_img').'/'.$img[$key] }}" style='widows: 40px; height: 40px; margin-bottom: 10px;'><br>
							  @endforeach
							  
						  </td>
						  <td>
							  <div class="d-flex justify-content-center"><button type="button" onclick="buyNow( {{ $product->id }})" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#buyNowModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> BUY</i></button>
							  <button type="button" onclick="deleteModal('.$data->id.',\''.$data->name.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>
						  </td>
						  
					  </tr>
					  @endforeach
					  
				  </tbody>
  
			  </table>
		  </div>
  </div>
  
	<!-- Content Row -->
  
	<!-- Content Row  details-->
	<div class="row">
  
  
	</div>
  
	
  
  </div>