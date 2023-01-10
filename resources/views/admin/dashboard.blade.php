@extends('layouts.index')

@section('title')
dashboard
@endsection

@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Order Hostory</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$user_history?? ""}} </h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Orders</p>
                </div>
                <h6 class="text-muted font-weight-normal">number of orders so far</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="fa-solid fa-box  icon-lg  text-primary ml-auto"></i>
                <i class="icon-lg mdi mdi-account-multiple-minus text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Today's orders</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$user_active?? ""}}</h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Orders</p>
                </div>
                <h6 class="text-muted font-weight-normal"> Today's orders</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-account-plus text-success ml-auto"></i>
                {{-- <i class="icon-lg fas fa-user-plus text-success ml-auto fa-3x"></i> --}}


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Line chart</h4>
              <canvas id="lineChart" style="height:250px"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Bar chart</h4>
              <canvas id="barChart" style="height:230px"></canvas>
            </div>
          </div>
        </div>
      </div>



</div>


@endsection


