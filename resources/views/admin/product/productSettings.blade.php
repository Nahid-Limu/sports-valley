@extends('layouts.appAdmin')
@section('title', 'Product Details')
@section('css')

@endsection

@section('content')

<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"> Product Details LIST</i></h6>
      <strong id="success_message" class="text-success"></strong>
      
      <div class="dropdown no-arrow">
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#AddProductDetailsModal"><i class="fas fa-plus fa-fw mr-2 text-gray-400"></i>Add Product Details</button>
      </div>
    </div>

    <!-- Card Body -->
    <div class="card-body">
      <table id="ProductDetailsListTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">#NO</th>
                <th class="text-center">Category</th>
                <th class="text-center">Brand</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Buying Price</th>
                <th class="text-center">Selling Price</th>
                <th class="text-center">Images</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

    </table>
    </div>
  </div>
</div>
@include('admin.product.modal.addProductDetails')
{{-- @include('admin.product.modal.editBusinessCat') --}}

<!-- Delete Confirmation Modal-->
<div class="modal fade" id="DeleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Delete" below if you are <strong>Sure</strong> to <strong>Delete</strong> this <strong id="dtn"></strong> Business Categorie. </div>
      <div class="modal-footer" style="display: inline">
        <input type="hidden" id="delete_cat_id" value="">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button onclick="deleteCat($('#delete_cat_id').val())" class="btn btn-danger float-right" type="button">Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
{{-- <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js" ></script> --}}
<script>
  //  $('#TestListTable').DataTable();
   $('#ProductDetailsListTable').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      "order": [[ 0, "asc" ]],
      ajax:{
      url: "{{ route('categorySettings') }}",
      },
      columns:[
        { 
            data: 'DT_RowIndex', 
            name: 'DT_RowIndex' 
        },
        {
            data: 'cat_name',
            name: 'cat_name'
        },
        {
            data: 'cat_product',
            name: 'cat_product'
        },
        {
            data: 'image',
            name: 'image'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false
        }
      ]
  });

    function addCategoryDetails() {

      if ( $( "#cd_id" ).val() != '' ) {
          $("#cd_id").removeClass("errorInputBox");
          $("#cat_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#cd_id").addClass("errorInputBox");
          $("#cat_nameError").text('Select Categories Name').addClass("ErrorMsg");
      }

      if ( $( "#brand_id" ).val() != '' ) {
          $("#brand_id").removeClass("errorInputBox");
          $("#brand_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#brand_id").addClass("errorInputBox");
          $("#brand_nameError").text('Select Brand').addClass("ErrorMsg");
      }

      if ( $( "#product_name" ).val() != '' ) {
          $("#product_name").removeClass("errorInputBox");
          $("#product_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#product_name").addClass("errorInputBox");
          $("#product_nameError").text('Product Name Is Required').addClass("ErrorMsg");
      }

      if ( $( "#quantity" ).val() != '' ) {
          $("#quantity").removeClass("errorInputBox");
          $("#quantityError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#quantity").addClass("errorInputBox");
          $("#quantityError").text('Quantity Required').addClass("ErrorMsg");
      }

      if ( $( "#buying_price" ).val() != '' ) {
          $("#buying_price").removeClass("errorInputBox");
          $("#buying_priceError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#buying_price").addClass("errorInputBox");
          $("#buying_priceError").text('Buying Price Is Required').addClass("ErrorMsg");
      }

      if ( $( "#selling_price" ).val() != '' ) {
          $("#selling_price").removeClass("errorInputBox");
          $("#selling_priceError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#selling_price").addClass("errorInputBox");
          $("#selling_priceError").text('Selling Price Is Required').addClass("ErrorMsg");
      }

      if ( $( "#image1" ).val() && $( "#image2" ).val() && $( "#image3" ).val() != '' ) {
            $("#imgDiv").removeClass("errorInputBox");
            $( "#imgError").text('').removeClass("ErrorMsg");;
            
        } else {
            $("#imgDiv").addClass("errorInputBox");
            $( "#imgError").text('Image Is Required').addClass("ErrorMsg");
        }

        if ( $( "#product_description" ).val() != '' ) {
          $("#product_description").removeClass("errorInputBox");
          $("#product_descriptionError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#product_description").addClass("errorInputBox");
          $("#product_descriptionError").text('Product Description Is Required').addClass("ErrorMsg");
      }

      
      if ( $( "#cd_id" ).val() && $( "#brand_id" ).val() && $( "#product_name" ).val() && $( "#quantity" ).val() && $( "#buying_price" ).val() && $( "#selling_price" ).val() && $( "#image1" ).val() && $( "#image2" ).val() && $( "#image3" ).val() && $( "#product_description" ).val() ) {
          $( "#cat_nameError","#brand_nameError","#product_nameError","#quantityError","#buying_priceError","#selling_priceError","#imgError","#product_descriptionError").text('');
          $( "#cat_nameError","#brand_nameError","#product_nameError","#quantityError","#buying_priceError","#selling_priceError","#imgError","#product_descriptionError").removeClass("errorInputBox");
            
            // var myData =  $('#AddCategorieForm').serialize();
            var form = $('#AddProductDetailsForm')[0];
            var formdata = new FormData(form);
            $.ajax({
                    url:"{{ route('addProduct') }}",
                    method:"POST",
                    data:formdata,
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(response)
                    {
                      console.log(response);
                      if (response.success) {
                        console.log(response);
                        $("#success_message").text(response.success);
                        $('#ProductDetailsListTable').DataTable().ajax.reload();
                        $('#AddProductDetailsModal').modal('hide');
                        $("#AddProductDetailsForm").trigger("reset");
                        
                        SuccessMsg();
                      }
                    },
                    error: function(response) {
                        // console.log(response);
                    }
                })


        }
    }

    function editBusinessCategory(CatId) {
      $.ajax({
          type: 'GET',
          url: "{{url('editCategory')}}"+"/"+CatId,
          success: function (response) {
              console.log(response);
              if (response) {
                
                $('#edit_categorie_id').val(response.id);
                $('#eproduct_name').val(response.cat_product);
                $('#ebusiness_cat_id').val(response.bid).attr("selected", "selected");
                
              }

          },error:function(){ 
              console.log(response);
          }
      });
    }

    function updateCat(params) {
      
      
      if ( $( "#cd_id" ).val() != '' ) {
          $("#cd_id").removeClass("errorInputBox");
          $("#cat_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#cd_id").addClass("errorInputBox");
          $("#cat_nameError").text('Select Categories Name').addClass("ErrorMsg");
      }

      if ( $( "#brand_id" ).val() != '' ) {
          $("#brand_id").removeClass("errorInputBox");
          $("#brand_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#brand_id").addClass("errorInputBox");
          $("#brand_nameError").text('Select Brand').addClass("ErrorMsg");
      }

      if ( $( "#product_name" ).val() != '' ) {
          $("#product_name").removeClass("errorInputBox");
          $("#product_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#product_name").addClass("errorInputBox");
          $("#product_nameError").text('Product Name Is Required').addClass("ErrorMsg");
      }

      if ( $( "#quantity" ).val() != '' ) {
          $("#quantity").removeClass("errorInputBox");
          $("#quantityError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#quantity").addClass("errorInputBox");
          $("#quantityError").text('Quantity Required').addClass("ErrorMsg");
      }

      if ( $( "#buying_price" ).val() != '' ) {
          $("#buying_price").removeClass("errorInputBox");
          $("#buying_priceError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#buying_price").addClass("errorInputBox");
          $("#buying_priceError").text('Buying Price Is Required').addClass("ErrorMsg");
      }

      if ( $( "#selling_price" ).val() != '' ) {
          $("#selling_price").removeClass("errorInputBox");
          $("#selling_priceError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#selling_price").addClass("errorInputBox");
          $("#selling_priceError").text('Selling Price Is Required').addClass("ErrorMsg");
      }


      if ( $( "#ebusiness_cat_id" ).val() && $( "#eproduct_name" ).val() ) {
          $( "#business_catError","#eproduct_nameError").text('');
          $( "#ebusiness_cat_id","#eproduct_name").removeClass("errorInputBox");
        
          var form = $('#EditCategoryDetailsForm')[0];
          var formdata = new FormData(form);
          $.ajax({
                  url:"{{ route('updateCategory') }}",
                  method:"POST",
                  data:formdata,
                  dataType:'JSON',
                  contentType: false,
                  cache: false,
                  processData: false,
                  success:function(response)
                  {
                    console.log(response);
                    if (response.success) {
                      
                      $("#success_message").text(response.success);
                      $('#CategoryDetailsListTable').DataTable().ajax.reload();
                      $('#EditBusinessCategoryModal').modal('hide');
                      
                      SuccessMsg();
                    }
                  },
                  error: function(response) {
                      // console.log(response);
                  }
          })
      }
    }

    function deleteModal(CatId,CatName) {
      $("#dtn").text('[ '+CatName+' ]');
      $("#delete_cat_id").val(CatId);
    }

    function deleteCat(CatId) {
      // alert(TestId);
      $.ajax({
          type: 'GET',
          url: "{{url('deleteCategory')}}"+"/"+CatId,
          success: function (response) {
              console.log(response);
              if (response.success) {
                      
                $("#success_message").text(response.success);
                $('#CategoryDetailsListTable').DataTable().ajax.reload();
                $('#DeleteConfirmationModal').modal('hide');

                SuccessMsg();
              }

          },error:function(){ 
              console.log(response);
          }
      });
    }

    //flash msg
    function SuccessMsg() {
        $("#success_message").fadeTo(3000, 500).slideUp(500, function(){
            $("#success_message").alert('close');
        });
    }
    

</script>

@endsection