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
    </div>
    <div class="row">
       <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">


                <table class="table">
                    <thead>
                      <tr>
                          {{-- <th>#</th> --}}
                          <th>Product name</th>
                          <th>Options </th>
                          <th>date </th>

                      </tr>
                    </thead>
                    <tbody>
                          {{-- @if ($orders) --}}

                          @foreach ($list as $item)
                              <tr>
                                <td>
                                     {{$item['product_name_ru']}}
                                </td>
                                @if ($item['old_product_name_ru']!=$item['product_name_ru'] && $item['old_price']!=$item['price'] )
                                    <td>
                                        <span class="mx-1">product  name:</span> {{$item['old_product_name_ru']}} <span class="mx-2"> updated </span> {{$item['product_name_ru']}} <span class="mx-2"> and </span> <span class="mx-2">product  price:</span> {{$item['old_price']}} sum<span class="mx-2">updated</span>   {{$item['price']}} sum

                                    </td>
                                @elseif ($item['old_product_name_ru']!=$item['product_name_ru'] && $item['old_price']=$item['price'] )
                                    <td>
                                        <span class="mx-1">product  name:</span> {{$item['old_product_name_ru']}}<span class="mx-2"> updated </span>  {{$item['product_name_ru']}}
                                    </td>
                                @elseif ($item['old_product_name_ru']=$item['product_name_ru'] && $item['old_price']!=$item['price'] )
                                    <td>
                                        <span class="mx-1">product  price:</span> {{$item['old_price']}} sum<span class="mx-2"> updated </span>  {{$item['price']}} sum
                                    </td>
                                @endif
                                <td>
                                    {{$item['created_at']}}

                               </td>
                              </tr>




                          @endforeach


                    </tbody>
                  </table>





            </div>

        </div>


    </div>



</div>


@endsection


