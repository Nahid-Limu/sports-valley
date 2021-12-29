
<!-- Modal start -->
<div class="modal fade" id="buyNowModal">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInLeft">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true" style="color: red"></i> Sale Product Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form id="saleProductForm" enctype="multipart/form-data">  
                    @csrf
                    <input type="text" name="id" id="id" hidden>
                    <input type="text" name="totalBuyPrice" id="totalBuyPrice" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label class="form-control text-warning" for="code">CODE:</label>
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="code" name="code" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label class="form-control text-warning" for="name">PRODUCT:</label>
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="name" name="name" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label class="form-control text-warning" for="quantity">AVAILABLE:</label>
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="quantity" name="quantity" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label class="form-control text-warning" for="sale_price">Price(Sale):</label>
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="sale_price" name="sale_price" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label class="form-control text-warning" for="buy_price">Price(Buy):</label>
                                </div>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="buy_price" name="buy_price" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label class="form-control text-warning" for="buying_quantity">Buying Quentity</label>
                                    <input type="number"  min="0" max="5" class="form-control" id="buying_quantity" name="buying_quantity">
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control text-warning" for="cost">Total Cost</label>
                                    <input type="text" class="form-control" id="cost" name="cost" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5 border border-warning">
                            <label class="form-control bg-warning text-center" for="product_name">Product Image</label>
                            <img id="image" src="" class="img-fluid fixed-img-size" style="width: 198px; height: 348px;">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer  class="modal-footer"-->
            <div class="modal-footer" style="display: inline">
                <button onclick="addToViewSale()" type="submit" id="addBtn" class="btn btn-sm btn-success float-right" disabled> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add</button>
                <button onclick="onCloseModal('AddCategorieForm')" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                {{-- <button onclick="testfun()" type="button" class="btn btn-danger">test</button> --}}
            </div>

        </div>
    </div>
</div>
<!-- Modal end -->
<script>


</script>