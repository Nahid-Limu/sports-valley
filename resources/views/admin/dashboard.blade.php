@extends('layouts.appAdmin')
@section('title', 'Dashbord')
@section('css')

@endsection

@section('content')

<script>
  window.onload = function () {


  var chart = new CanvasJS.Chart("chartContainerPie", {
    animationEnabled: true,
    title:{
      text: "",
      horizontalAlign: "left"
    },
    data: [{
      type: "doughnut",
      startAngle: 60,
      //innerRadius: 60,
      indexLabelFontSize: 17,
      indexLabel: "{label} - #percent%",
      toolTipContent: "<b>{label}:</b> {y} (#percent%)",
      dataPoints: [
        
        
        
      ]
    }]
  });
  chart.render();
  
  }
</script>




<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Total)</div>
              {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{$TotakIncome}} TK</div> --}}
            </div>
            <div class="col-auto" style="color: green">
              <i class="fas fa-dollar-sign fa-2x " style="color:green"></i>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Expense (Total)</div>
              {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{$TotalExpense}} TK</div> --}}
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x fa-2x " style="color:red"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Discount (Total)</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$TotalDiscount}}</div> --}}
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x fa-2x " style="color:red"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Clints</div>
              {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ToatalClint}}</div> --}}
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x fa-2x " style="color:royalblue"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <!-- Content Row  details-->
  <div class="row">

    <!-- Content Column Income -->
    <div class="col-lg-6 mb-4">
      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Income Details</h6>
        </div>
        <div class="card-body">
          <!-- Color System -->
          <div class="row">
            <div class="col-lg-6 mb-4">
              <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                  Daily Income
                  {{-- <div class="text-white font-weight-bold">{{$DailyIncome}} TK</div> --}}
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                  Monthly Income
                  {{-- <div class="text-white font-weight-bold">{{$MonthlyIncome}} TK</div> --}}
                </div>
              </div>
            </div>
            <div class="col-lg-12 mb-8">
              <div class="card bg-info text-white shadow">
                <div class="card-body text-center">
                  Yearly Income
                  {{-- <div class="text-white font-weight-bold">{{$YearlyIncome}} TK</div> --}}
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>

    <!-- Content Column Expense -->
    <div class="col-lg-6 mb-4">
      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Expense Details</h6>
        </div>
        <div class="card-body">
          <!-- Color System -->
          <div class="row">
            <div class="col-lg-6 mb-4">
              <div class="card bg-primary text-white shadow">
                <div class="card-body text-center">
                  Daily Income
                  {{-- <div class="text-white font-weight-bold">{{$DailyExpense}} TK</div> --}}
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card bg-success text-white shadow">
                <div class="card-body text-center">
                  Monthly Income
                  {{-- <div class="text-white font-weight-bold">{{$MonthlyExpense}} TK</div> --}}
                </div>
              </div>
            </div>
            <div class="col-lg-12 mb-8">
              <div class="card bg-info text-white shadow">
                <div class="card-body text-center">
                  Yearly Income
                  {{-- <div class="text-white font-weight-bold">{{$YearlyExpense}} TK</div> --}}
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>

  </div>

    <div class="row">
        <div class="col-lg-12 mb-8">
            <!-- Invoice Details -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Invoice Details Out Of 100</h6>
            </div>
            <div class="card-body">

                {{-- <h4 class="small font-weight-bold">To Days Invoice <span class="float-right">{{$ToDaysInvoice}}</span></h4> --}}
                <div class="progress mb-4">
                {{-- <div class="progress-bar bg-danger" role="progressbar" style="width: {{$ToDaysInvoice}}%" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100"></div> --}}
                </div>

                {{-- <h4 class="small font-weight-bold">This Months Invoice<span class="float-right">{{$ThisMonthsInvoice}}</span> --}}
                </h4>
                <div class="progress mb-4">
                {{-- <div class="progress-bar bg-warning" role="progressbar" style="width: {{$ThisMonthsInvoice}}%"
                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div> --}}
                </div>

                {{-- <h4 class="small font-weight-bold">This Years Invoice <span class="float-right">{{$ThisYearsInvoice}}</span> --}}
                </h4>
                <div class="progress mb-4">
                {{-- <div class="progress-bar bg-info" role="progressbar" style="width: {{$ThisYearsInvoice}}%" aria-valuenow="60"
                    aria-valuemin="0" aria-valuemax="100"></div> --}}
                </div>

                {{-- <h4 class="small font-weight-bold">Total Invoice <span class="float-right">{{$ThisYearsInvoice}}</span> --}}
                </h4>
                <div class="progress mb-4">
                    {{-- <div class="progress-bar bg-success" role="progressbar" style="width: {{$ToatalInvoice}}%" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100">
                    </div> --}}
                </div>
                
            </div>
            </div>



        </div>
    </div>
  
  <!-- Content Row  details-->

  <!-- Content Row chart -->
  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            {{-- <canvas id="myAreaChart"></canvas> --}}
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            {{--<canvas id="myPieChart"></canvas>--}}
            <div id="chartContainerPie" style="height: 300px; width: 100%;"></div>
          </div>
          <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-primary"></i> Direct
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-success"></i> Social
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-info"></i> Referral
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row chart -->

  

</div>

@endsection

@section('script')
// <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection