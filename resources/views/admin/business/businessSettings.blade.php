@extends('layouts.appAdmin')
@section('title', 'Business Categorie Setting')
@section('css')
    
@endsection

@section('content')

<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"> Business Categorie LIST</i></h6>
      <strong id="success_message" class="text-success"></strong>
      
      <div class="dropdown no-arrow">
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#AddBusinessCatModal"><i class="fas fa-plus fa-fw mr-2 text-gray-400"></i>Add New Categorie</button>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <table id="BusinessListTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">#NO</th>
                <th class="text-center">Business Categories</th>
                <th class="text-center">Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

    </table>
    </div>
  </div>
</div>
@include('admin.business.modal.addBusinessCat')
@include('admin.business.modal.editBusinessCat')

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
   $('#BusinessListTable').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      "order": [[ 0, "asc" ]],
      ajax:{
      url: "{{ route('businessSettings') }}",
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

    function addCategorie() {

        if ( $( "#categorie_name" ).val() != '' ) {
            $("#categorie_name").removeClass("errorInputBox");
            $( "#categorie_nameError").text('').removeClass("ErrorMsg");;
            
        } else {
            $("#categorie_name").addClass("errorInputBox");
            $( "#categorie_nameError").text('Categorie Name Is Required').addClass("ErrorMsg");
        }

        if ( $( "#image" ).val() != '' ) {
            $("#image").removeClass("errorInputBox");
            $( "#imageError").text('').removeClass("ErrorMsg");;
            
        } else {
            $("#image").addClass("errorInputBox");
            $( "#imageError").text('Image Is Required').addClass("ErrorMsg");
        }


        if ( $( "#categorie_name" ).val() ) {
            $( "#categorie_nameError").text('');
            $( "#categorie_nameError" ).removeClass("errorInputBox");
          
            var form = $('#AddCategorieForm')[0];
            var formdata = new FormData(form);
            $.ajax({
                    url:"{{ route('addBusinessCat') }}",
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
                      $('#BusinessListTable').DataTable().ajax.reload();
                      $('#AddBusinessCatModal').modal('hide');
                      $("#AddCategorieForm").trigger("reset");
                      
                      SuccessMsg();
                    }

                },error:function(){ 
                    console.log(response);
                }
            });
        }
    }

    function editBusinessCategory(CatId) {
      $.ajax({
          type: 'GET',
          url: "{{url('editBusinessCat')}}"+"/"+CatId,
          success: function (response) {
              console.log(response);
              if (response) {
                
                $('#edit_cat_id').val(response.id);
                $('#ecat_name').val(response.cat_name);
                
              }

          },error:function(){ 
              console.log(response);
          }
      });
    }

    function updateCat(params) {
      
      
      if ( $( "#ecat_name" ).val() != '' ) {
          $("#ecat_name").removeClass("errorInputBox");
          $("#ecat_nameError").text('').removeClass("ErrorMsg");;
          
      } else {
          $("#ecat_name").addClass("errorInputBox");
          $("#ecat_nameError").text('Category Name Is Required').addClass("ErrorMsg");
      }


      if ( $( "#ecat_name" ).val() ) {
          $( "#ecat_nameError").text('');
          $( "#ecat_name").removeClass("errorInputBox");
        
          var myData =  $('#EditCategoryForm').serialize();
          // alert(data);
          $.ajax({
              type: 'POST',
              url: "{{ route('updateBusinessCat') }}",
              data: myData,
              success: function (response) {
                  console.log(response);
                  if (response.success) {
                      
                    $("#success_message").text(response.success);
                    $('#BusinessListTable').DataTable().ajax.reload();
                    $('#EditBusinessCategoryModal').modal('hide');
                    
                    SuccessMsg();
                  }

              },error:function(){ 
                  console.log(response);
              }
          });
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
          url: "{{url('deleteCat')}}"+"/"+CatId,
          success: function (response) {
              console.log(response);
              if (response.success) {
                      
                $("#success_message").text(response.success);
                $('#BusinessListTable').DataTable().ajax.reload();
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