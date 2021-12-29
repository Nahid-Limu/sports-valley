<style>
    .modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;

    
}
</style>
<!-- Modal start -->
<div class="modal fade" id="print">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInLeft">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true" style="color: red"></i> Print Invoice</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="printableArea" style="min-width: 600px">

                <div class="container-fluid">
                    <div id="ui-view" data-select2-id="ui-view">
                        <div>
                            <div class="card">
                                <div class="card-header">Invoice
                                    <strong class="invoiceNo"></strong>
                                    <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="printDiv('printableArea')" data-abc="true">
                                        <i class="fa fa-print"></i> Print</a>
                                    <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                                        <i class="fa fa-save"></i> Save</a>
                                </div>
                                <form id="invoiceData">  
                                @csrf
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            
                                            <div class="col-sm-4">
                                                {{-- <h6 class="mb-3">From:</h6> --}}
                                                <div>
                                                    <strong>SportsValley</strong>
                                                </div>
                                                <div>Cinema Hall Road, Hazi Ibrahim Market, Panchagarh</div>
                                                <div>Email: info@sportsvalley.in</div>
                                                <div>Phone: +88 01625836160</div>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" value="" id="pIds" name="pIds" hidden >
                                                <input type="text" value="" id="pQuantity" name="pQuantity" hidden >
                                                <input type="text" value="" id="buyingPrice" name="buyingPrice" hidden >
                                                <input type="text" value="" id="saleingPrice" name="saleingPrice" hidden >
                                                <input type="text" value="0" id="lessAmount" name="lessAmount" hidden >
                                            </div>
                                            <div class="col-sm-6">
                                                {{-- <h6 class="mb-3">Details:</h6> --}}
                                                <div>Invoice
                                                    <strong class="invoiceNo"></strong>
                                                </div>
                                                <div>Date: <span id="date"></span></div>
                                                <div>Name &nbsp;&nbsp; : <input type="text" id="bnameinp" name="bnameinp"> <span id="bname"></span></div>
                                                <div>Address:  <input type="text" id="baddressinp" name="baddressinp"> <span id="baddress"></span></div>
                                            </div>
                                            
                                        </div>
                                        <div class="table-responsive-sm">
                                            <div id="tableDataPrint">

                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer  class="modal-footer"-->
            {{-- <div class="modal-footer" style="display: inline">
                <button onclick="addToViewSale()" type="button" class="btn btn-sm btn-success float-right">Add</button>
                <button onclick="onCloseModal('AddCategorieForm')" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            </div> --}}

        </div>
    </div>
</div>
<!-- Modal end -->
<script>
    
    //print Div//
    function printDiv(divName) {
        
        $('#bname').text($('#bnameinp').val()); 
        $('#bnameinp').prop('hidden', true);
        $('#baddress').text($('#baddressinp').val()); 
        $('#baddressinp').prop('hidden', true);

        var _token = '{{ csrf_token() }}';
        var myData =  $('#invoiceData').serialize();

        $.ajax({
            type: 'POST', //THIS NEEDS TO BE GET
            url: "{{ route('printInvoice') }}",
            // data: {_token: _token, clintName: clintName,age: age,sex: sex,address: address,ref_dr: ref_dr},
            // data: {_token: _token, myData: myData},
            data: myData,
            // dataType: 'json',
            success: function (response) {
                console.log(response.InvoiceID);
                if (response.InvoiceID) {
                    $('.invoiceNo').text(response.InvoiceID); 

                    $("#print").modal("hide");

                    //---print dive code---//
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;
                        document.title = response.InvoiceID;
                        window.print();

                        document.body.innerHTML = originalContents;

                        window.location.href = "{{ route('dashboard') }}";
                    //---print dive code---//
                }
                
                
                // $("#ClintRegistationForm").trigger("reset");
                
            },error:function(){ 
                console.log(response);
            }
        });

        
    }

</script>