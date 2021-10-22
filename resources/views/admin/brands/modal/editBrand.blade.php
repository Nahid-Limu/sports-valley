
<!-- Modal start -->
<div class="modal fade" id="EditBrandModal">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-edit" aria-hidden="true" style="color: red"></i> Edit Brand</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form id="EditBrandForm">  
                    @csrf
                    <input type="hidden" id="edit_brand_id" name="id">
                    
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control badge-danger" for="ebrand_name">Brand Name</label>
                        </div>
                        <div class="form-group col-md-97">
                            <input type="text" class="form-control" id="ebrand_name" name="ebrand_name" placeholder="">
                            <span id="ebrand_nameError"></span>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label class="form-control bg-warning" for="categorie_name">Brand Image</label>
                            </div>
                            <div class="form-group col-md-7">
                                {{-- <input type="text" class="form-control" id="categorie_name" name="categorie_name" placeholder="Categorie Name [EX: sports ware] "> --}}
                                <input type="file" class="form-control" id="eimage" name="eimage">
                                <span id="eimageError"></span>
                            </div>
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