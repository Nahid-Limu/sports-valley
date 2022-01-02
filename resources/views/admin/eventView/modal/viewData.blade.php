<style>
    .uppercase {
    text-transform: uppercase;
}
</style>
<!-- Modal start -->
<div class="modal fade" id="viewDataModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-eye" aria-hidden="true" style="color: red"></i> Team Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="row container">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="text-success">Team Name : <strong id="teamName" class="text-dark uppercase"></strong></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="text-success">Manager Name : <strong id="teamManagerName" class="text-dark uppercase"></strong></h4>
                    </div>
                </div>
                <div class="w-100"></div>

                <div class="col-md-5 border border-danger" style="margin-left: 20px;">
                    <h5 class="text-center font-weight-bold"><kbd>PLAYER 1 DETAILS</kbd></h5>
                    <div class="form-group">
                        <label class="text-success">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p1name" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">National ID No : <strong id="p1nid" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">Birth Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p1dob" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p1city" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">District &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p1district" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">Post &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p1post" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">Village &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p1village" class="text-dark  uppercase"></strong></label>
                    </div>
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-5 border border-success">
                    <h5 class="text-center font-weight-bold"><kbd>PLAYER 2 DETAILS</kbd></h5>
                    <div class="form-group">
                        
                        <label class="text-success">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p2name" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">National ID No : <strong id="p2nid" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">Birth Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p2dob" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p2city" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">District &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p2district" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">Post &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p2post" class="text-dark  uppercase"></strong></label>
                        <br>
                        <label class="text-success">Village &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong id="p2village" class="text-dark  uppercase"></strong></label>
                    </div>
                </div>

                <div class="w-100"></div>
                <br>
                <div class="col-md-5 border border-danger" style="margin-left: 20px;">
                    <h5 class="text-dark text-center"><u><strong>TEAM LOCATION</strong></u></h5>
                    <h5 class="text-center uppercase" id="teamLocation">bbb</h5>
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-5 border border-success">
                    <h5 class="text-dark text-center"><u><strong>CATEGORY</strong></u></h5>
                    <h5 class="text-center text-dark uppercase" id="category">bbb</h5>
                </div>

            </div>

            <!-- Modal footer  class="modal-footer"-->
            <div class="modal-footer" style="display: inline">
                {{-- <button onclick="updateCat()" type="button" class="btn btn-sm btn-success float-right">Update</button> --}}
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                {{-- <button onclick="testfun()" type="button" class="btn btn-danger">test</button> --}}
            </div>

        </div>
    </div>
</div>
<!-- Modal end -->
<script>

</script>