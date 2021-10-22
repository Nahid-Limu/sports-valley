@extends('layouts.appAdmin')
@section('title', 'Brands Setting')
@section('css')
    
@endsection

@section('content')

<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"> Brands LIST</i></h6>
      <strong id="success_message" class="text-success"></strong>
      
      <div class="dropdown no-arrow">
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#AddBrandModal"><i class="fas fa-plus fa-fw mr-2 text-gray-400"></i>Add New Brand</button>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <table id="BrandListTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">#NO</th>
                <th class="text-center">Brand</th>
                <th class="text-center">Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

    </table>
    </div>
  </div>
</div>
@include('admin.brands.modal.addBrand')
@include('admin.brands.modal.editBrand')

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
        <input type="hidden" id="delete_brand_id" value="">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button onclick="deleteBrand($('#delete_brand_id').val())" class="btn btn-danger float-right" type="button">Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
{{-- <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js" ></script> --}}
<script>
  //  $('#TestListTable').DataTable();
   $('#BrandListTable').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      "order": [[ 0, "asc" ]],
      ajax:{
      url: "{{ route('brandSettings') }}",
      },
      columns:[
        { 
            data: 'DT_RowIndex', 
            name: 'DT_RowIndex' 
        },
        {
            data: 'name',
            name: 'name'
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

    function addbrand() {

        if ( $( "#brand_name" ).val() != '' ) {
            $("#brand_name").removeClass("errorInputBox");
            $( "#brand_nameError").text('').removeClass("ErrorMsg");;
            
        } else {
            $("#brand_name").addClass("errorInputBox");
            $( "#brand_nameError").text('Brand Name Is Required').addClass("ErrorMsg");
        }

        if ( $( "#image" ).val() != '' ) {
            $("#image").removeClass("errorInputBox");
            $( "#imageError").text('').removeClass("ErrorMsg");;
            
        } else {
            $("#image").addClass("errorInputBox");
            $( "#imageError").text('Image Is Required').addClass("ErrorMsg");
        }


        if ( $( "#brand_name" ).val() && $( "#image" ).val() ) {
          $( "#brand_nameError","#imageError").text('');
          $( "#brand_nameError","#imageError").removeClass("errorInputBox");
          
          var form = $('#AddBrandForm')[0];
          var formdata = new FormData(form);
          $.ajax({
                  url:"{{ route('addBrand') }}",
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
                      $('#BrandListTable').DataTable().ajax.reload();
                      $('#AddBrandModal').modal('hide');
                      $("#AddBrandForm").trigger("reset");
                      
                      SuccessMsg();
                    }
                  },
                  error: function(response) {
                      // console.log(response);
                  }
          })
        }
    }

    function editBrand(BrandId) {
      $.ajax({
          type: 'GET',
          url: "{{url('editBrand')}}"+"/"+BrandId,
          success: function (response) {
              console.log(response);
              if (response) {
                
                $('#edit_brand_id').val(response.id);
                $('#ebrand_name').val(response.name);
                
              }

          },error:function(){ 
              console.log(response);
          }
      });
    }

    function updateCat(params) {
      
      
      if ( $( "#ebrand_name" ).val() != '' ) {
          $("#ebrand_name").removeClass("errorInputBox");
          $("#ecat_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#ebrand_name").addClass("errorInputBox");
          $("#ecat_nameError").text('Category Name Is Required').addClass("ErrorMsg");
      }


      if ( $( "#ebrand_name" ).val() ) {
          $( "#ebrand_name").text('');
          $( "#ebrand_name").removeClass("errorInputBox");
        
          var form = $('#EditBrandForm')[0];
          var formdata = new FormData(form);
          $.ajax({
                  url:"{{ route('updateBrand') }}",
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
                      $('#BrandListTable').DataTable().ajax.reload();
                      $('#EditBrandModal').modal('hide');
                      
                      SuccessMsg();
                    }
                  },
                  error: function(response) {
                      // console.log(response);
                  }
          })
      }
    }

    function deleteModal(BrandId,BrandName) {
      $("#dtn").text('[ '+BrandName+' ]');
      $("#delete_brand_id").val(BrandId);
    }

    function deleteBrand(BrandId) {
      // alert(TestId);
      $.ajax({
          type: 'GET',
          url: "{{url('deleteBrand')}}"+"/"+BrandId,
          success: function (response) {
              console.log(response);
              if (response.success) {
                      
                $("#success_message").text(response.success);
                $('#BrandListTable').DataTable().ajax.reload();
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