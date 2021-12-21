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
          <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewBuyProductsModal"><i class="fas fa-plus fa-fw mr-2 text-gray-400"></i>View Sale Items</button>
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
                        <div class="d-flex justify-content-center"><button type="button" onclick="buyNow( {{ $product->id }})" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#buyNowModal" data-placement="top" title="Edit"><i class="fa fa-edit" style="color: aqua"> BUY</i></button>
                        <button type="button" onclick="deleteModal('.$data->id.',\''.$data->name.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>
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

  

  // Price Calculation Function start

  $(document).ready(function() {
    $('#ProductDetailsListTable').DataTable();
} );


function buyNow(id) {
    $('#buying_quantity').val(0);
      $('#cost').val(0);
     $.ajax({
          type: 'GET',
          url: "{{url('sealProductDetails')}}"+"/"+id,
          success: function (response) {
              console.log(response);
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


$("#buying_quantity").on('change', function(){
  var sale_price=$('#sale_price').val();  
  sale_price=parseInt(sale_price);
  $('#cost').val(sale_price* $("#buying_quantity").val());

  var buy_price=$('#buy_price').val();  
  buy_price=parseInt(buy_price);
  $('#totalBuyPrice').val(buy_price* $("#buying_quantity").val());
});


function addToViewSale() {
  var pid = $('#id').val();
  var data ='<tr id='+pid+'><th scope="row">'+$('#id').val()+'</th>'
            +'<td>'+$('#code').val()+'</td>'
            +'<td>'+$('#name').val()+'</td>'
            +'<td>'+$('#buying_quantity').val()+'</td>'
            +'<td class ="price">'+$('#cost').val()+'</td>'
            +'<td class ="priceBuy">'+$('#totalBuyPrice').val()+'</td>'
            +'<td>'+'<button onclick="removeRow('+pid+')">Remove</button>'+'</td></tr>';
  $("#salesItem").append(data);
  $('#buyNowModal').modal('hide');
  calculateSum();
};



// Price Calculation Function start
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

            //-- discount [start]
            var totalBuyPrice = 0;
            $(".priceBuy").each(function() {

              var value = $(this).text();
              // add only if the value is number
              if(!isNaN(value) && value.length != 0) {
                totalBuyPrice += parseFloat(value);
              }
            }); 
            $('#result').text( ( sum )+' TK');
            $('#discountAmount').text( ( $('#discount').val() )+' TK');
            $('#discountResult').text( ( sum - $('#discount').val() )+' TK');
            $('#con').prop('disabled', false);
            
            //-- discount [start]
            if ($('#discount').val()) {
              if ( ( sum - totalBuyPrice ) > $('#discount').val() ) {
                $('#con').prop('disabled', false);
                $('#result').text( ( sum )+' TK');
                $('#discountAmount').text( ( $('#discount').val() )+' TK');
                $('#discountResult').text( ( sum - $('#discount').val() )+' TK');
              }else{
                  $('#con').prop('disabled', true);
                  $('#result').text( ( sum )+' TK');
                  $('#discountAmount').text( ( $('#discount').val() )+' TK');
                  $('#discountResult').text( ( sum )+' TK');
                  // alert('loss')
              }
            }   
            
            //-- discount [end]

            // $('#result').text( ( sum )+' TK');
            // $('#discountAmount').text( ( $('#discount').val() )+' TK');
            // $('#discountResult').text( ( sum - $('#discount').val() )+' TK');
            // $('#test_price').val(sum);

            // if ($('#discount').val() > sum ) {
            //     $('#con').prop('disabled', true);
            // }

            // count table row //
            var tr = $('#salesItem tr').length;
            // alert(rowCount);
            if(tr >= 1){
                    // $('#con').prop('disabled', false);
                    // $('#dis').prop('disabled', false);
                    $('#discount').prop('disabled', false);
                    $('#discount').prop('type', 'number');
                    $('#rseTbody').prop('hidden', false);
                }else{
                    // $('#con').prop('disabled', true);
                    // $('#dis').prop('disabled', true);
                    $('#discount').prop('disabled', true);
                    $('#discount').prop('type', 'hidden');
                    $('#rseTbody').prop('hidden', true);
                }
            

        }
        // Price Calculation Function end

// function remove(rowId) {
//   alert(rowId);
// }
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
        // $('#con').prop('disabled', false);
        // $('#dis').prop('disabled', false);
        $('#discount').prop('disabled', false);
        $('#discount').prop('type', 'number');
        $('#rseTbody').prop('hidden', false);
    }else{
        // $('#con').prop('disabled', true);
        // $('#dis').prop('disabled', true);
        $('#discount').prop('disabled', true);
        $('#discount').prop('type', 'hidden');
        $('#rseTbody').prop('hidden', true);
    }
}
  

</script>
@endsection