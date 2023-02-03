@extends('layouts.index')


@section('title')
   Update Category
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
            <h4 class="card-title">Update Category</h4>
            <p class="card-description"> Basic form elements </p>
            <form method="POST" action="{{ route('category.update') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <input type="hidden" name="category_id" value="{{ $category_ru->id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Category Name Ru </label>
                            <input name="name_ru" value="{{$category_ru->category_name_ru?? "not nime"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Category Name Ru" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- @dd($category) --}}
                            <label for="exampleInputName1"> Categoory Name Uz </label>
                            <input name="name_uz" value ="{{$category_ru->category_name_uz?? "not nime"}}" type="text" class="form-control" id="exampleInputName1" placeholder=" Category Name Uz" required>
                        </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="exampleInputPassword4" class="m-2">Fotos</label>
                            {{-- <input type="" name=""  style="display:none"> --}}
                            {{-- <input name="fotos"  type="file" enctype="multipart/form-data" required> --}}

                            <img class="box"  src="{{ url('uploads/fotos/'.$category_ru->foto) }}">

                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleInputPassword4" class="m-2"> New Fotos</label>
                            {{-- <input type="" name=""  style="display:none"> --}}
                            <input name="fotos"  type="file" enctype="multipart/form-data" required>
                    </div>
                    </div>
              </div>



{{--
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword4" class="m-2">Fotos</label>

                            <input name="fotos"  type="file" enctype="multipart/form-data" required>
                        </div>
                    </div>
                  </div> --}}


                <button type="submit" class="btn btn-primary float-right mr-2">Save</button>
                {{-- <button class="btn btn-dark">Cancel</button> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


