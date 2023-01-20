
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
</style>
@section('content')
<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{route('user.create')}}" class="badge badge-outline-success">Create New Product</a></li>
      </ol>
    </nav>
</div>
<div class="row " >
    <div class="col-12 grid-margin">
      <div class="card selection">
        <div class="card-body">
          <h4 class="card-title">Products</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Slug</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @if ($products)

                @foreach($products as $key => $product)
                    @if ($product != null)
                    {{-- @dd($product['code']) --}}
                        <tr>
                            <td>{{ ($key+1)}}</td>
                            <td>{{$product->slug}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->created_at}}</td>
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

