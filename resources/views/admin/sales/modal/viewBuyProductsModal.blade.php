
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
            
            <input type="text" value="" id="t_data" name="t_data" hidden>
            <div class="modal-body">
                <table class="table" id="tableData">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col" class ="priceBuy">Price B</th>
                        <th scope="col" class="actionCol">Action</th>
                      </tr>
                    </thead>
                    <tbody id="salesItem">
                      
                      
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
                          <td class ="testaction"><input type="hidden" pattern="[0-9]{1,5}" class="form-control w-50 p-3 float-right" placeholder="Discount Amount" onkeyup="calculateSum()" id="discount" name="discount" value="" disabled="disabled"> </td>
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
                <button disabled="disabled" class="btn btn-sm btn-success float-right" type="submit" id="con" onclick="confirm()" data-toggle="modal" data-target="#print"><i class="fas fa-sign-out-alt"></i> Confirm</button>
                <button onclick="onCloseModal('AddCategorieForm')" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                {{-- <button onclick="testfun()" type="button" class="btn btn-danger">test</button> --}}
            </div>

        </div>
    </div>
</div>
<!-- Modal end -->
<script>


</script>