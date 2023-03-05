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
            {{-- @dd(Auth::id) --}}
            <h4 class="card-title">Create Product</h4>
            <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                  <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Name </label>
                            <input name="full_name"  type="text" class="form-control" id="exampleInputName1" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> login </label>
                            <input name="login"  type="text" class="form-control" id="exampleInputName1" placeholder="Create login" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{-- @dd($user) --}}
                            <label for="exampleInputName1"> Password </label>
                            <input name="password"  type="password" class="form-control" id="exampleInputName1" placeholder=" password" required>
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


