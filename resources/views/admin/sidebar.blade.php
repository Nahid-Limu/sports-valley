
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">WelCome <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="sbicn fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-warning">
      Sales Area
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('sales') }}">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Sales </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-warning">
      Product Details
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('productSettings') }}">
        <i class="fab fa-product-hunt"></i>
        <span>Products </span></a>
    </li>

    {{-- @if(Auth::user()->is_role == 'admin' || Auth::user()->is_role == 'superadmin') --}}
    
    {{-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-users"></i>
        <span>Setting User</span></a>
    </li> --}}
    {{-- @endif --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
      Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="far fa-money-bill-alt"></i>
        <span>Expense</span></a>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Expense Module:</h6>
          <a class="collapse-item" href="">Daily Expense</a>
          <a class="collapse-item" href="">Expense History</a>
          <a class="collapse-item" href="">Expense Settings</a>
        </div>
      </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-warning">
      Seetings
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Seetings</span></a>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Seetings Module:</h6>
          <a class="collapse-item" href="{{ route ('businessSettings') }}">Business Categorie</a>
          <a class="collapse-item" href="{{ route ('categorySettings') }}">Categorie Details</a>
          <a class="collapse-item" href="{{ route ('brandSettings') }}">Brands</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-warning">
      Event
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('eventDataView') }}">
        <i class="fas fa-calendar-alt"></i>
        <span>Event Details</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    {{-- @if(Auth::user()->is_role == 'admin' || Auth::user()->is_role == 'superadmin') --}}
        
    {{-- <li class="nav-item">
      <a class="nav-link" href="">
        <i class="fas fa-file-csv"></i>
        <span>Report</span></a>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    {{-- @endif --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->