
<!-- Modal start -->
<div class="modal fade" id="AddProductDetailsModal">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInLeft">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true" style="color: red"></i> New Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form id="AddProductDetailsForm" enctype="multipart/form-data">  
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="business_cat_id">Categories Name</label>
                        </div>
                        <div class="form-group col-md-7">
                            <select id="cd_id" name="cd_name"  class="form-control">
                                <option value="">Select Categories</option>
                                @foreach ($Category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->cat_product }}</option>
                                @endforeach
                                
                            </select>
                            <span id="cat_nameError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="business_cat_id">Brand</label>
                        </div>
                        <div class="form-group col-md-7">
                            <select id="brand_id" name="brand_name"  class="form-control">
                                <option value="">Select Brand</option>
                                @foreach ($Brand as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                @endforeach
                            </select>
                            <span id="brand_nameError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="product_name">Product Name</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name [EX: BAS] ">
                            <span id="product_nameError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="quantity">Quantity</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="number" class="form-control" id="quantity" name="quantity" min="0" placeholder="Product Quantity [EX: 101] ">
                            <span id="quantityError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="buying_price">Buying Price (1 Piece)</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="number" class="form-control" id="buying_price" name="buying_price" min="0" placeholder="Buying Price [EX: 101] ">
                            <span id="buying_priceError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="selling_price">Selling Price (1 Piece)</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="number" class="form-control" id="selling_price" name="selling_price" min="0" placeholder="Selling Price [EX: 101] ">
                            <span id="selling_priceError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-control bg-warning text-center" for="categorie_name">Uplode Product Image</label>
                        </div>
                        <div class="form-row" id="imgDiv">
                            <div class="form-group col-md-4">
                                <input type="file" class="form-control" id="image1" name="image[]" >
                                <span id="image1Error"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="file" class="form-control" id="image2" name="image[]">
                                <span id="image2Error"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="file" class="form-control" id="image3" name="image[]">
                                <span id="image3Error"></span>
                            </div>
                        </div>
                        <span id="imgError"></span>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-control bg-warning text-center" for="product_description">Product Short Description</label>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea class="form-control"id="product_description" name="product_description"  cols="100" rows="5"></textarea>
                                <span id="product_descriptionError"></span>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>

            <!-- Modal footer  class="modal-footer"-->
            <div class="modal-footer" style="display: inline">
                <button onclick="addCategoryDetails()" type="button" class="btn btn-sm btn-success float-right">Add</button>
                <button onclick="onCloseModal('AddCategorieForm')" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                {{-- <button onclick="testfun()" type="button" class="btn btn-danger">test</button> --}}
            </div>

        </div>
    </div>
</div>
<!-- Modal end -->
<script>


</script>