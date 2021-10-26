
<!-- Modal start -->
<div class="modal fade" id="AddBrandModal">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInLeft">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true" style="color: red"></i> New Brand</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form id="AddBrandForm">  
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="brand_name">Brand Name</label>
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Categorie Name [EX: sports ware] ">
                            <span id="brand_nameError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control bg-warning" for="image">Brand Image</label>
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
                <button onclick="addbrand()" type="button" class="btn btn-sm btn-success float-right">Add</button>
                <button onclick="onCloseModal('AddBrandForm')" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                {{-- <button onclick="testfun()" type="button" class="btn btn-danger">test</button> --}}
            </div>

        </div>
    </div>
</div>
<!-- Modal end -->
<script>

</script>