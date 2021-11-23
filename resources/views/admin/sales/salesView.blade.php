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



<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="container">
           
    {{-- <div class="row row-pb-md" id="salesProductlist">
        <div class="w-100"></div>
        
        
        
    </div>
    <span class="d-flex justify-content-center"></span> --}}

    <div class="row" >
        <div class="col-md-2"></div>

        <div class="col-md-8">
            <div class="container h-100">
                <form id="autosearch" method="post" class="table ">
                  @csrf
                    <div class="d-flex justify-content-center h-100">
                        <div class="searchbar">
                        <input onkeyup="productsearch()" class="search_input" type="text" name="search" id="search" placeholder="Search Product Here....">
                        <a href="#" class="search_icon"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                </form>
                <p id="noTest" style="text-align: center" hidden></p>
                <div  id="testlist" style="margin: auto; position: absolute;">
                  
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>
    </div>

    <div class="table-responsive table-hover" style="overflow: auto; height: 300px;">
      <table class="table" id="tableData">
          <thead style="background: aqua; text-align: center; font-style: bold;">
          <tr>
              <th>No</th>
              <th>Test Name</th>
              <th>Test Code</th>
              <th>Test Price</th>
              <th class="testaction">Action</th>
              
          </tr>
          </thead>

          <tbody  id="testTable" style="text-align: center; font-style: bold;">         
          </tbody>

          <tbody id="rseTbody" hidden style="background:steelblue; text-align: center; font-style: bold;">
              <tr >
                  <td>&nbsp</td>
                  <td><b> Sub Total</b></td>
                  <td><b>:</b></td>
                  <td ><b id="result" ><b></b></td>
                  <td class ="testaction"></td>
              </tr>
              <tr >
                  <td>&nbsp</td>
                  <td><b> Discount</b></td>
                  <td><b>:</b></td>
                  <td ><b id="discountAmount" ><b></b></td>
                  <td class ="testaction"><input type="hidden" class="form-control w-50 p-3 float-right" placeholder="Discount Amount" onkeyup="calculateSum()" id="discount" name="discount" value="" disabled="disabled"> </td>
              </tr>
              <tr >
                  <td>&nbsp</td>
                  <td><b> Total</b></td>
                  <td><b>:</b></td>
                  <td ><b id="discountResult" ><b></b></td>
                  <td class ="testaction"><input type="hidden" class="form-control w-50 p-3 float-right" > </td>
              </tr>
          </tbody> 
      </table>
      <div style=" display: flex; justify-content: center;">
          <button disabled="disabled" class="btn btn-primary" type="submit" id="con" onclick="userRegModal()"><i class="fas fa-sign-out-alt"></i> Confirm</button>
          <button disabled="disabled" type="button" class="btn btn-danger" id="dis" style="margin-left: 10px;">Discard</button>
      </div>
  </div>
</div>

  <!-- Content Row -->

  <!-- Content Row  details-->
  <div class="row">


  </div>

  

</div>

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
  

</script>
@endsection