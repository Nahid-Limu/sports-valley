<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  
  {{-- <a type="button" class="btn btn-info" href="{{ route('home') }}"><i class="fas fa-home"> Back to Home</i></a> --}}
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->
  <form id="autosearch" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    @csrf
    <div class="input-group">
      <input onkeyup="productsearch()" type="text" name="search" id="search" class="search_input form-control bg-light border-0 small" placeholder="Search for Products..." aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form>
  <p id="noTest" style="text-align: center" hidden></p>
  <div  id="testlist" style="margin: auto; position: absolute;">
  </div>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
        <img class="img-profile rounded-circle" src="{{ asset('system_img/admin.png' )}}">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        {{-- <a class="btn btn-primary" href="login.html">Logout</a> --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit"><i class="fa fa-sign-out"> Logout</i></button>
        </form>
      </div>
    </div>
  </div>
</div>

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
                  // if (response) {
                    
                    if (response == 0) {
                            $('#noTest').prop('hidden', false);
                            $("#noTest").text('No Data Found or Already Used');
                        }else{
                            // $('#noTest').prop('hidden', true);
                            $("#testlist").fadeIn();
                            $("#testlist").html(ret);
                        }

              },error:function(){ 
                  console.log(response);
              }
      });
          
      }
      
    }

  

  // Price Calculation Function start
  

</script>