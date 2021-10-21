
<!-- Modal start -->
<div class="modal fade" id="AddCategoryDetailsModal">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInLeft">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true" style="color: red"></i> New Categories Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form id="AddCategoryDetailsForm" enctype="multipart/form-data">  
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="business_cat_id">Business Categories</label>
                        </div>
                        <div class="form-group col-md-7">
                            <select id="business_cat_id" name="business_cat"  class="form-control">
                                <option value="">Select Business Cat</option>
                                @foreach ($Business as $B)
                                    <option value="{{ $B->id }}">{{ $B->cat_name }}</option>
                                @endforeach
                                
                            </select>
                            <span id="business_catError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="categorie_name">Product Name</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Categorie Name [EX: sports ware] ">
                            <span id="product_nameError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="categorie_name">Image</label>
                        </div>
                        <div class="form-group col-md-7">
                            {{-- <input type="text" class="form-control" id="categorie_name" name="categorie_name" placeholder="Categorie Name [EX: sports ware] "> --}}
                            <input type="file" class="form-control" id="image" name="image">
                            <span id="imageError"></span>
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