
@extends('layouts.index')

@section('title')
  dashboard
@endsection

<style>
 .selection{
  /* background-color: lightblue;
  width: 110px;
  height: 110px; */
  overflow: auto !important;
}
.img{
    width: 100px !important;
    height: 100px !important;
}
</style>
@section('content')
<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      </ol>
    </nav>
</div>
<div class="row " >
    <div class="col-12 grid-margin">
      <div class="card selection">
        <div class="card-body">
          <h4 class="card-title">Orders Table History</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Order Id</th>
                    <th>Product Name</th>
                    <th>Product Foto</th>
                    <th>Quantity</th>
                    <th>User Name</th>
                    <th>user phone</th>
                    <th>address</th>
                    <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @if ($list)

                @foreach($list as $key => $order)
                    @if ($order != null)
                    {{-- @dd($order['code']) --}}
                        <tr>
                            <td>{{ ($key+1)}}</td>
                            <td>{{$order['code']}}</td>
                            <td>{{$order['product_name']}}</td>
                            <td>
                                <div >
                                    <img class="img"  src="{{ url('uploads/fotos/'.$order['product_foto']) }}">
                                    {{-- <img style="width: 40px; height:40px" class="language_selected" src="{{asset('uploads/fotos/rus.jpg')}}" alt="" > --}}
                                    {{-- {{}} --}}
                                </div>
                            </td>
                            <td>{{$order['product_quantity']}}</td>
                            <td>{{$order['user_name']}}</td>
                            <td>{{$order['user_phone']}}</td>
                            <td>{{$order['adrress']}}</td>
                            <td>{{$order['date']}}</td>
                            {{-- <td>
                                <div class="badge badge-outline-warning">{{$order->status}}</div>
                            </td> --}}
                        </tr>
                    @endif
                @endforeach

                @endif



              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection

