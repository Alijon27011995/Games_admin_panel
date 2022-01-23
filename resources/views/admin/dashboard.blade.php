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
            <h5>User Hostory</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$user_history?? ""}} </h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Users</p>
                </div>
                <h6 class="text-muted font-weight-normal">the number of players involved in the game</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-account-multiple-minus text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5> New Users</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$user_active?? ""}}</h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Users</p>
                </div>
                <h6 class="text-muted font-weight-normal"> number of new players</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-account-plus text-success ml-auto"></i>

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


