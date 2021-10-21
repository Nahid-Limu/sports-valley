
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

                <form id="EditCategoryForm">  
                    @csrf
                    <input type="hidden" id="edit_cat_id" name="id">
                    
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control badge-danger" for="ecat_name">Category Name</label>
                        </div>
                        <div class="form-group col-md-97">
                            <input type="text" class="form-control" id="ecat_name" name="cat_name" placeholder="Category Name [EX: Sport Ware] ">
                            <span id="ecat_nameError"></span>
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