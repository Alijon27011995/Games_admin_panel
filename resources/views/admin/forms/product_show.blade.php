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
            <h4 class="card-title"> Show user</h4>

            {{-- <form method="POST"  action="{{ route('product.update') }}" enctype="multipart/form-data">
                @csrf
                @method('POST') --}}
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> User Name  </label>
                            <input name="name_ru" value="{{$user->full_name?? "not nime"}}"  type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1"> Phone Number </label>
                            <input name="name_uz" value="{{$product_ru->product_name_ru?? "not nime"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Email  </label>
                            <input name="email" value="{{$user->full_name?? "not nime"}}"  type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1"> INN </label>
                            <input name="name_uz" value="{{$user->inn?? "not nime"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> GroupID  </label>
                            <input name="email" value="{{$user->group_id?? "not nime"}}"  type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName1"> Login </label>
                            <input name="name_uz" value="{{$user->login?? "not nime"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName1"> Password </label>
                            <input name="name_uz" value="{{$user->password?? "not nime"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Address</label>
                            <input name="price" value="{{$user->address?? "not fount address"}}"  type="text" class="form-control" id="exampleInputEmail3" placeholder="product price" required>
                        </div>
                   </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Description  </label>
                            <textarea id="description_uz"  name="description_uz" class="form-control" style="height: 80px">
                                {{$user->description?? "not discription"}}
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

                            <img class="box"  src="{{ url('uploads/fotos/'.$user->foto) }}">

                        </div>
                    </div>
                  </div>

                {{-- <button type="submit" class="btn btn-primary float-right mr-2">Save</button> --}}
                {{-- <button class="btn btn-dark">Cancel</button> --}}
            {{-- </form> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


