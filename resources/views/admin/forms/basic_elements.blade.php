@extends('layouts.index')


@section('title')
   Create user
@endsection


@section('content')

<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Form elements </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Forms</a></li>
          <li class="breadcrumb-item active" aria-current="page">Form elements</li>
        </ol>
      </nav>
    </div>
    <div class="row">

        {{-- <input class="form-control" type="number" value="{{$information[$key]['value']?? "kemadi"}}" name="{{($element->label)}}" required> --}}
        {{-- <option @if($information[$key]['value']=="OАО") selected @endif value="OАО">OАО</option> --}}


      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Create Product</h4>
            <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    {{-- @dd($user) --}}
                    <label for="exampleInputName1"> Product Name</label>
                    <input name="name"  type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input name="price"  type="number" class="form-control" id="exampleInputEmail3" placeholder="product price" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Fotos</label>
                    {{-- <input type="" name=""  style="display:none"> --}}
                    <input name="fotos"  type="file" enctype="multipart/form-data" required>
                </div>

                <button type="submit" class="btn btn-primary float-right mr-2">Save</button>
                {{-- <button class="btn btn-dark">Cancel</button> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


