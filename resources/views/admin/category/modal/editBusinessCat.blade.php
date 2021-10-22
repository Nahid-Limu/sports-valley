
<!-- Modal start -->
<div class="modal fade" id="EditBusinessCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-edit" aria-hidden="true" style="color: red"></i> Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form id="EditCategoryDetailsForm" enctype="multipart/form-data">  
                    @csrf
                    <input type="hidden" id="edit_categorie_id" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="business_cat_id">Business Categories</label>
                        </div>
                        <div class="form-group col-md-7">
                            <select id="ebusiness_cat_id" name="ebusiness_cat"  class="form-control">
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
                            <label class="form-control bg-warning" for="eproduct_name">Product Name</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" id="eproduct_name" name="eproduct_name" placeholder="Categorie Name [EX: sports ware] ">
                            <span id="eproduct_nameError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="ecategorie_name">Image</label>
                        </div>
                        <div class="form-group col-md-7">
                            {{-- <input type="text" class="form-control" id="categorie_name" name="categorie_name" placeholder="Categorie Name [EX: sports ware] "> --}}
                            <input type="file" class="form-control" id="eimage" name="eimage">
                            <span id="imageError"></span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer  class="modal-footer"-->
            <div class="modal-footer" style="display: inline">
                <button onclick="updateCat()" type="button" class="btn btn-sm btn-success float-right">Update</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                {{-- <button onclick="testfun()" type="button" class="btn btn-danger">test</button> --}}
            </div>

        </div>
    </div>
</div>
<!-- Modal end -->
<script>

</script>