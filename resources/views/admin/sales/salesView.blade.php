@extends('layouts.appAdmin')
@section('title', 'Sales')
@section('css')
<style>

  .product_img {
    width: 200px;
    height: 200px;
  }
</style>
<style>
  .searchbar{
  margin-bottom: auto;
  margin-top: auto;
  height: 60px;
  background-color: #353b48;
  border-radius: 30px;
  padding: 10px;
  }

  .search_input{
  color: white;
  border: 0;
  outline: 0;
  background: none;
  width: 0;
  caret-color:transparent;
  line-height: 40px;
  transition: width 0.4s linear;
  color:white; 
  font-size: 20px;
  font: bold;
  }

  .searchbar:hover > .search_input{
  padding: 0 10px;
  width: 450px;
  caret-color:red;
  transition: width 0.4s linear;
  }

  .searchbar:hover > .search_icon{
  background: white;
  color: #e74c3c;
  text-decoration: none;
  }

  .search_icon{
  height: 40px;
  width: 40px;
  float: right;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  color:white;
  }

  .plistul {
  list-style-type: none;
  margin-left: 80px;
  width: 530px;
  position: absolute;
  text-align: center;
  background:yellow;
  font-size: 20px;
  font-style: bold;
  border-radius: 25px;
  }
  .plistli:hover{
      background: ;
      border: 3px solid black;
      margin-left: 80px;
      border-radius: 0px 50px 50px 0px;
      /* animation: shake 0.5s; */
      animation-iteration-count: infinite;
      color: black;
      font-weight: bold;
  }
  @keyframes shake {
      0% { transform: translate(1px, 1px) rotate(0deg); }
      10% { transform: translate(-1px, -2px) rotate(-1deg); }
      20% { transform: translate(-3px, 0px) rotate(1deg); }
      30% { transform: translate(3px, 2px) rotate(0deg); }
      40% { transform: translate(1px, -1px) rotate(1deg); }
      50% { transform: translate(-1px, 2px) rotate(-1deg); }
      60% { transform: translate(-3px, 1px) rotate(0deg); }
      70% { transform: translate(3px, 1px) rotate(-1deg); }
      80% { transform: translate(-1px, -1px) rotate(1deg); }
      90% { transform: translate(1px, 2px) rotate(0deg); }
      100% { transform: translate(1px, -2px) rotate(-1deg); }
  }

  /* img {
      border-radius: 50%;
      border: 3px solid black;
      background-color: white;
  } */

  /* #nav{
      background-image: url("img/DCMS-Banar.png");
      
      background-repeat: no-repeat;
      background-size:cover;
  } */

  .ErrorMsg{
      color: red;
  }

  .errorInputBox {
      border: 1px solid red !important;
  }
  
</style>
@endsection

@section('content')
<div class="col-xl-12 col-lg-8">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"> Product For Sales LIST</i></h6>
        <strong id="success_message" class="text-success"></strong>
        
        <div class="dropdown no-arrow">
          <button type="button" id="ViewSaleItemsBtn" class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewBuyProductsModal" disabled><i class="fa fa-eye" aria-hidden="true"></i> View Sale Items</button>
        </div>
      </div>
  
      <!-- Card Body -->
      <div class="card-body">
        <table id="ProductDetailsListTable" class="table table-sm table-bordered table-striped" style="width:100%; ">
            <thead>
                <tr>
                    <th class="text-center">Code</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Brand</th>
                    <th class="text-center">Price(BUY)</th>
                    <th class="text-center">Price(SALE)</th>
                    <th class="text-center">Images</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            {{-- {!! $output !!} --}}
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->barnd }}</td>
                    <td>{{ $product->buying_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                
                    <td>
                        @php
                            $img = explode("@",$product->image);
                        @endphp
                        @foreach ($img as $key => $item)
                        <img src="{{ asset('product_img').'/'.$img[$key] }}" style='widows: 40px; height: 40px; margin-bottom: 10px;'><br>
                        @endforeach
                        
                    </td>
                    <td>
                      <button type="button" onclick="buyNow( {{ $product->id }})" name="edit" id="'.$data->id.'" class="btn btn-sm edit" data-toggle="modal" data-target="#buyNowModal" data-placement="top" title="Edit"><i class="fa fa-cart-plus" aria-hidden="true" style="color: darkorange"> BuY </i></button>
                    </td>
                    
                </tr>
                @endforeach
            
        </tbody>

        </table>
    </div>
    </div>
  </div>
@include('admin.sales.modal.buyNowModal')
@include('admin.sales.modal.viewBuyProductsModal')
@include('admin.sales.modal.print')

@endsection

@section('script')
<script>

  function productsearch() {

      $('#noTest').prop('hidden', true);

      // var _token = '{{ csrf_token() }}';
      var search = $("#search").val();
      var SearchedTestIds = $("#testIds").val();
      var form = $('#autosearch')[0];
      var formdata = new FormData(form);
      // alert(search);
      if(search != ''){

          $.ajax({
            url:"{{ route('autoSearch') }}",
            method:"POST",
            data:formdata,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
              {
                    console.log(response);
                    // if (response.output !=0) {
                    //   $("#salesProductlist").append(response.output);
                    //   // $('#salesProductlist').append( $(response) );

                    // }else{
                    //   e.preventDefault();
                    //   $(this).parent().remove();
                    // }
                    $("#testlist").fadeOut();
                    if (response == 0) {
                            $('#noTest').prop('hidden', false);
                            $("#noTest").text('No Data Found or Already Used');
                        }else{
                            // $('#noTest').prop('hidden', true);
                            $("#testlist").fadeIn();
                            $("#testlist").html(response);
                        }
              }
            });
          
      }
      
  }


  $(document).ready(function() {
    $('#ProductDetailsListTable').DataTable();
  });

  //---Buy Button Function in sale page---//
  function buyNow(id) {
      $('#buying_quantity').val(0);
      $('#cost').val(0);
      $.ajax({
            type: 'GET',
            url: "{{url('sealProductDetails')}}"+"/"+id,
            success: function (response) {
                // console.log(response);
                if (response) {
                  $('#id').val(response.id);
                  $('#image').attr("src", "product_img"+"/"+response.image);
                  $('#code').val(response.code);
                  $('#name').val(response.name);
                  $('#quantity').val(response.quantity+" Piece");
                  $('#sale_price').val(response.selling_price+" TK");
                  $('#buy_price').val(response.buying_price+" TK");
                  
                  $('#buying_quantity').prop('max',response.quantity);
                  
                  // if (response.show_status == 1) {
                  //   $('#eshow_status').prop('checked', true);
                  // }else{
                  //   $('#eshow_status').prop('checked', false);
                  // }
                  // alert(id);
                
                  
                }

            },error:function(){ 
                console.log(response);
            }
      });
  }
  //---Buy Button Function in sale page---//

  //add button in sale product details disabe/enable
  $("#buying_quantity").bind('keyup mouseup', function () {
      // alert("changed");    
      if ( $("#buying_quantity").val()> 0) {
        $("#addBtn").prop('disabled', false);
      } else {
        $("#addBtn").prop('disabled', true);
      }

      var sale_price=$('#sale_price').val();  
      sale_price=parseInt(sale_price);
      $('#cost').val(sale_price* $("#buying_quantity").val());

      var buy_price=$('#buy_price').val();  
      buy_price=parseInt(buy_price);
      $('#totalBuyPrice').val(buy_price* $("#buying_quantity").val());

  });
  //add button in sale product details disabe/enable


  //---add product from sale product details modal to viewBuyProduct modal---//
  function addToViewSale() {
    var pid = $('#id').val();
    // var obj = {};
    // obj[pid] = $('#buying_quantity').val();
    
    var data ='<tr id='+pid+'><th class ="salePid" scope="row">'+$('#id').val()+'</th>'
              +'<td>'+$('#code').val()+'</td>'
              +'<td>'+$('#name').val()+'</td>'
              +'<td class ="salePQuentity">'+$('#buying_quantity').val()+'</td>'
              +'<td class ="price">'+$('#cost').val()+'</td>'
              +'<td class ="priceBuy">'+$('#totalBuyPrice').val()+'</td>'
              +'<td class="actionCol">'+'<button class="btn btn-sm btn-danger" onclick="removeRow('+pid+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+'</td></tr>';
    $("#salesItem").append(data);
    $('#buyNowModal').modal('hide');
    calculateSum();
    // console.log(obj);
    // alert(obj);
  };
  //---add product from sale product details modal to viewBuyProduct modal---//

  //---Price Calculation Function start---//
  function calculateSum() {
              //-- coloum sum [start]
                var sum = 0;
                // iterate through each td based on class and add the values
                $(".price").each(function() {

                    var value = $(this).text();
                    // add only if the value is number
                    if(!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });    
              //-- coloum sum [end]

              //--total buy price calculate---//
                var totalBuyPrice = 0;
                $(".priceBuy").each(function() {

                  var value = $(this).text();
                  // add only if the value is number
                  if(!isNaN(value) && value.length != 0) {
                    totalBuyPrice += parseFloat(value);
                  }
                }); 
              //--total buy price calculate---//

              $('#result').text( ( sum )+' TK');
              $('#discountAmount').text( ( $('#discount').val() )+' TK');
              $('#discountResult').text( ( sum - $('#discount').val() )+' TK');
              $('#con').prop('disabled', false);

              $('#buyingPrice').val(totalBuyPrice)
              $('#saleingPrice').val(sum)
              $('#lessAmount').val()

              //---discount [start]---//
                if ($('#discount').val()) {
                  if ( ( sum - totalBuyPrice ) > $('#discount').val() ) {
                    $('#con').prop('disabled', false);
                    $('#result').text( ( sum )+' TK');
                    $('#discountAmount').text( ( $('#discount').val() )+' TK');
                    $('#discountResult').text( ( sum - $('#discount').val() )+' TK');
                    
                    $('#buyingPrice').val(totalBuyPrice)
                    $('#saleingPrice').val(sum)
                    $('#lessAmount').val($('#discount').val())
                  }else{
                      $('#con').prop('disabled', true);
                      $('#result').text( ( sum )+' TK');
                      $('#discountAmount').text( ( 0 )+' TK');
                      $('#discountResult').text( ( sum )+' TK');

                      $('#buyingPrice').val(totalBuyPrice)
                      $('#saleingPrice').val(sum)
                      $('#lessAmount').val($('#discount').val())
                      // alert('loss')
                  }
                }   
              //---discount [end]----//

              // $('#result').text( ( sum )+' TK');
              // $('#discountAmount').text( ( $('#discount').val() )+' TK');
              // $('#discountResult').text( ( sum - $('#discount').val() )+' TK');
              // $('#test_price').val(sum);

              // if ($('#discount').val() > sum ) {
              //     $('#con').prop('disabled', true);
              // }

              //---count table row---//
                var tr = $('#salesItem tr').length;
                // alert(rowCount);
                if(tr >= 1){
                    // $('#con').prop('disabled', false);
                    // $('#dis').prop('disabled', false);
                    $('#discount').prop('disabled', false);
                    $('#discount').prop('type', 'text');
                    $('#rseTbody').prop('hidden', false);
                    $('#ViewSaleItemsBtn').prop('disabled', false);
                }else{
                    // $('#con').prop('disabled', true);
                    // $('#dis').prop('disabled', true);
                    $('#discount').prop('disabled', true);
                    $('#discount').prop('type', 'hidden');
                    $('#rseTbody').prop('hidden', true);
                    $('#ViewSaleItemsBtn').prop('disabled', true);
                }
              //---count table row---//
              

  }
  //---Price Calculation Function end---//

  //---Remove Table Row---//
  function removeRow(rowId) {
      // alert(rowId+' delete me');
      $('#'+rowId).remove();

      calculateSum();

      // var t = $('#tableData').prop('outerHTML');
      
      // $("#t_data").val(t);


      //----count table row---//
      var tr = $('#salesItem tr').length;
      // alert(rowCount);
      if(tr >= 1){
        
          $('#ViewSaleItemsBtn').prop('disabled', false);
          $('#con').prop('disabled', false);
          // $('#dis').prop('disabled', false);
          $('#discount').prop('disabled', false);
          $('#discount').prop('type', 'number');
          $('#rseTbody').prop('hidden', false);
      }else{
          $('#ViewSaleItemsBtn').prop('disabled', true);
          $('#con').prop('disabled', true);
          // $('#dis').prop('disabled', true);
          $('#discount').prop('disabled', true);
          $('#discount').prop('type', 'hidden');
          $('#rseTbody').prop('hidden', true);
      }
      //----count table row---//
  }
  //---Remove Table Row---//

  //---Confirm button action in viewBuyProduct Modal---//
  function confirm() {

    $("#discount").remove();

    idsQunantity()
    // console.log( $("#pIds").val() );
    // console.log( $("#pQuantity").val() );

    var t = $('#tableData').prop('outerHTML');
    // alert(t);
  
    $("#t_data").val(t);
    $("#tableDataPrint").html(t);
    
    $("#viewBuyProductsModal").modal("hide");
    $('table#tableData th.actionCol ').remove();
    $('table#tableData td.actionCol ').remove();

    $('table#tableData th.priceBuy ').remove();
    $('table#tableData td.priceBuy ').remove();
    
  }
  //---Confirm button action in viewBuyProduct Modal---//

  //---store ids and quantity of sale---//
  function idsQunantity() {
    $("#pIds").val('');
    $(".salePid").each(function() {
      var salePid = $(this).text();
      $("#pIds").val(function() {
          if (this.value == '') {
              return salePid;
          } else {
              return this.value +',' + salePid;
          }
      });
      
    });
    
    $("#pQuantity").val('');
    $(".salePQuentity").each(function() {
        var salePQuentity = $(this).text();
        $("#pQuantity").val(function() {
            if (this.value == '') {
                return salePQuentity;
            } else {
                return this.value +',' + salePQuentity;
            }
        });
        
    });   
    
  }
  //---store ids and quantity of sale---//


  //---current date time i print page---//
  $(document).ready(function () {
      var d = new Date(),
          date = ((d.getMonth()+1) + '/' + (d.getDate()) + '/' + d.getFullYear());
      $('#date').text(date);       
  });
  //---current date time i print page---//

</script>
@endsection