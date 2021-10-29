<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
</style>

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
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label class="form-control badge-danger" for="eshow_status">Show In Home</label>
                        </div>
                        <div class="form-group col-md-97">
                            <label class="switch">
                                <input type="checkbox" id="eshow_status" name="eshow_status" value="" >
                                <span class="slider round"></span>
                              </label>
                            <span id="eshow_statusError"></span>
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