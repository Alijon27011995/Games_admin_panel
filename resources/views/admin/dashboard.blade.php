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
            <h5>Product Hostory</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$count_history?? ""}} </h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Products</p>
                </div>
                <h6 class="text-muted font-weight-normal">product quantity histories</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                {{-- <i class="fa-solid fa-box  icon-lg  text-primary ml-auto"></i>/ --}}
                <i class="icon-lg mdi mdi-dropbox text-primary ml-auto"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5>Today's Products</h5>
            <div class="row">
              <div class="col-8 col-sm-12 col-xl-8 my-auto">
                <div class="d-flex d-sm-block d-md-flex align-items-center">
                  <h2 class="mb-0">{{$count_day?? ""}}</h2>
                  <p class="text-success ml-2 mb-0 font-weight-medium">Products</p>
                </div>
                <h6 class="text-muted font-weight-normal"> product quantity in Orders Today</h6>
              </div>
              <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                <i class="icon-lg mdi mdi-dropbox text-primary ml-auto"></i>
                {{-- <i class="icon-lg fas fa-user-plus text-success ml-auto fa-3x"></i> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        @foreach ($list as $item)
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$item['product_name_ru']}}</h4>
                <h4 class="card-title">{{$item['product_name_uz']}}</h4>
                <h4 class="card-title">{{$item['price']}}</h4>
                <h4 class="card-title">{{$item['created_at']}}</h4>
              </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{$item['old_product_name_ru']}}</h4>
                <h4 class="card-title">{{$item['old_product_name_uz']}}</h4>
                <h4 class="card-title">{{$item['old_price']}}</h4>
                <h4 class="card-title">{{$item['old_created_at']}}</h4>
              </div>
            </div>
        </div>
        @endforeach
    </div>



</div>


@endsection


