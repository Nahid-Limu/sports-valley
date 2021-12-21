
<!-- Modal start -->
<div class="modal fade " id="viewBuyProductsModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInLeft">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true" style="color: red"></i> Sale Product Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Price B</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="salesItem">
                      {{-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                        <td>111</td>
                        <td><button>Remove</button></td>
                      </tr> --}}
                      
                    </tbody>
                    <tbody id="rseTbody" hidden style="background:#f0ad4e; text-align: center; font-style: bold;">
                      <tr >
                          <td>&nbsp</td>
                          <td>&nbsp</td>
                          <td><b> Sub Total</b></td>
                          <td><b>:</b></td>
                          <td ><b id="result" ><b></b></td>
                          <td class ="testaction"></td>
                      </tr>
                      <tr >
                          <td>&nbsp</td>
                          <td>&nbsp</td>
                          <td><b> Discount</b></td>
                          <td><b>:</b></td>
                          <td ><b id="discountAmount" ><b></b></td>
                          <td class ="testaction"><input type="hidden" class="form-control w-50 p-3 float-right" placeholder="Discount Amount" onkeyup="calculateSum()" id="discount" name="discount" value="" disabled="disabled"> </td>
                      </tr>
                      <tr >
                          <td>&nbsp</td>
                          <td>&nbsp</td>
                          <td><b> Total</b></td>
                          <td><b>:</b></td>
                          <td ><b id="discountResult" ><b></b></td>
                          <td class ="testaction"><input type="hidden" class="form-control w-50 p-3 float-right" > </td>
                      </tr>
                  </tbody> 
                  </table>
            </div>

            <!-- Modal footer  class="modal-footer"-->
            <div class="modal-footer" style="display: inline">
                {{-- <button onclick="addCategoryDetails()" type="button" id="con" class="btn btn-sm btn-success float-right">Confirm</button> --}}
                <button disabled="disabled" class="btn btn-sm btn-success float-right" type="submit" id="con" onclick="userRegModal()"><i class="fas fa-sign-out-alt"></i> Confirm</button>
                <button onclick="onCloseModal('AddCategorieForm')" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                {{-- <button onclick="testfun()" type="button" class="btn btn-danger">test</button> --}}
            </div>

        </div>
    </div>
</div>
<!-- Modal end -->
<script>


</script>