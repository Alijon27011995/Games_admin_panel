
@extends('frontend.layouts.index')

@section('title')
  dashboard
@endsection

<style>
</style>
@section('content')
<div class=" text-black " style="text-align: center !important">
    <h2 class=" text-blue"> Tashkent University of Information Technologies </h2>
</div>
<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{route('user.login')}}" class="badge badge-outline-success">Admin panel</a></li>
      </ol>
    </nav>
</div>
<div class="row mt-4" style="color: black !important" >
   <div class="col-md-4" style="border-right: 1px solid">
    {{-- @dd($users) --}}
       @foreach ($users as $user)

       <div class="row ml-2 mt-2">
            <div class="col-md-5">
                <img class="box" style="width: 150px; height:200px"  src="{{ url('uploads/fotos/'.$user->foto) }}">
            </div>
            <div class="col-md-7">
             <b>{{$user->group_id}} -Group</b><br>
             <span>{{$user->name}} </span> <br>

             <span>{{$user->full_name}}</span>

            </div>
       </div>

       @endforeach
   </div>
   <div class="col-md-8">
    {{-- @dd($news) --}}
      @foreach ($news as $new)
        <div class="card m-2" style="background-color:white">
            <b>{{$new->theme}}</b>
           <span>{{$new->description}}</span>
        </div>
      @endforeach
   </div>
</div>


@endsection

