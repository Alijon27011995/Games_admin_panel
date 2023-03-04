@extends('layouts.index')


@section('title')
   Edit Product
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



      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"> Edit Product</h4>

            <form method="POST"  action="{{ route('product.update') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="product_id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> User Name  </label>
                            <input name="full_name" value="{{$user->full_name?? "not nime"}}"  type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1"> Phone Number </label>
                            <input name="phone_number" value="{{$user->phone_number?? "not nime"}}" type="number" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Email  </label>
                            <input name="email" value="{{$user->email?? "not email"}}"  type="email" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1"> INN </label>
                            <input name="inn" value="{{$user->inn?? "not inn"}}" type="number" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> GroupID  </label>
                            <input name="group_id" value="{{$user->group_id?? "not groupID"}}"  type="number" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName1"> Login </label>
                            <input name="login" value="{{$user->login?? "not login"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName1"> Password </label>
                            <input name="password" value="{{$user->password?? "not nime"}}" type="password" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail3">Address</label>
                            <input name="address" value="{{$user->address?? "not fount address"}}"  type="text" class="form-control" id="exampleInputEmail3" placeholder="address" required>
                        </div>
                   </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Description  </label>
                            <textarea id="description_uz"  name="description" class="form-control" style="height: 80px">
                                {{$user->description?? "not discription"}}
                              </textarea>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="exampleInputPassword4" class="m-2">Fotos</label>
                            {{-- <input type="" name=""  style="display:none"> --}}
                            {{-- <input name="fotos"  type="file" enctype="multipart/form-data" required> --}}

                            <img class="box"  src="{{ url('uploads/fotos/'.$user->foto) }}">

                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleInputPassword4" class="m-2"> New Photo</label>
                            {{-- <input type="" name=""  style="display:none"> --}}
                            <input name="fotos"  type="file" enctype="multipart/form-data" required>
                    </div>
                    </div>
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


