@extends('layouts.appAdmin')
@section('title', 'Event Details')
@section('css')
    
@endsection

@section('content')

<div class="col-xl-12 col-lg-8">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"> Registration LIST</i></h6>
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
                <th class="text-center">Team Name</th>
                <th class="text-center">Team Manager</th>
                <th class="text-center">Team Location</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

    </table>
    </div>
  </div>
</div>

@include('admin.eventView.modal.viewData')

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
      <div class="modal-body">Select "Delete" below if you are <strong>Sure</strong> to <strong>Delete</strong> this <strong id="dtn"></strong> Team. </div>
      <div class="modal-footer" style="display: inline">
        <input type="hidden" id="delete_data_id" value="">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button onclick="deleteBrand($('#delete_data_id').val())" class="btn btn-danger float-right" type="button">Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

<script>
  //  $('#TestListTable').DataTable();
   $('#BrandListTable').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      "order": [[ 0, "asc" ]],
      ajax:{
      url: "{{ route('eventDataView') }}",
      },
      columns:[
        { 
            data: 'DT_RowIndex', 
            name: 'DT_RowIndex' 
        },
        {
            data: 'teamName',
            name: 'teamName'
        },
        {
            data: 'teamManagerName',
            name: 'teamManagerName'
        },
        {
            data: 'teamLocation',
            name: 'teamLocation'
        },
        {
            data: 'category',
            name: 'category'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false
        }
      ]
  });


    function viewDetails(id) {
      $.ajax({
          type: 'GET',
          url: "{{url('viewSingleData')}}"+"/"+id,
          success: function (response) {
              console.log(response);
              if (response) {
                
                $('#teamName').text(response.teamName);
                $('#teamManagerName').text(response.teamManagerName);
                
                $('#p1name').text(response.p1name);
                $('#p1nid').text(response.p1nid);
                $('#p1dob').text(response.p1dob);
                $('#p1city').text(response.p1city);
                $('#p1district').text(response.p1district);
                $('#p1post').text(response.p1post);
                $('#p1village').text(response.p1village);

                $('#p2name').text(response.p2name);
                $('#p2nid').text(response.p2nid);
                $('#p2dob').text(response.p2dob);
                $('#p2city').text(response.p2city);
                $('#p2district').text(response.p2district);
                $('#p2post').text(response.p2post);
                $('#p2village').text(response.p2village);

                $('#teamLocation').text(response.teamLocation);
                $('#category').text(response.category);
                
              }

          },error:function(){ 
              console.log(response);
          }
      });
    }

    function deleteModal(id,name) {
      $("#dtn").text('[ '+name+' ]');
      $("#delete_data_id").val(id);
    }

    function deleteBrand(id) {
      // alert(TestId);
      $.ajax({
          type: 'GET',
          url: "{{url('deleteTeam')}}"+"/"+id,
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