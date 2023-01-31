@extends('layouts.index')


@section('title')
   SHow Product
@endsection
<style>
     .box{
        box-sizing: border-box !important;
        width:300px;
        height:200px;
     }
</style>

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
            <h4 class="card-title"> Show Product</h4>

            <form method="POST"  action="{{ route('product.update') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Product Name Ru </label>
                            <input name="name_ru" value="{{$product_ru->name?? "not nime"}}"  type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Product Name Uz </label>
                            <input name="name_uz" value="{{$product_uz->name?? "not nime"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Price</label>
                            <input name="price" value="{{$product_ru->price?? "not nime"}}"  type="number" class="form-control" id="exampleInputEmail3" placeholder="product price" required>
                        </div>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label for="exampleInputEmail3">Select Category</label>
                            {{-- <input type="text" value="{{$category->name?? "not nime"}}" name="" id=""> --}}
                            <input name="text" value="{{$category->name?? "not nime"}}"  type="text" class="form-control" id="exampleInputEmail3" placeholder="product price" required>
                         </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Description Ru </label>
                            <textarea id="description_uz"  name="description_uz" class="form-control" style="height: 80px">
                                {{$product_ru->description?? "not nime"}}
                              </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Description Uz </label>
                           <textarea id="description_uz"  name="description_uz" class="form-control" style="height: 80px">
                             {{$product_uz->description?? "not nime"}}
                           </textarea>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword4" class="m-2">Fotos</label>
                            {{-- <input type="" name=""  style="display:none"> --}}
                            {{-- <input name="fotos"  type="file" enctype="multipart/form-data" required> --}}

                            <img class="box"  src="{{ url('uploads/fotos/'.$product_ru->foto) }}">

                        </div>
                    </div>
                  </div>

                {{-- <button type="submit" class="btn btn-primary float-right mr-2">Save</button> --}}
                {{-- <button class="btn btn-dark">Cancel</button> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


