
@extends('frontend.layouts.index')

@section('title')
  dashboard
@endsection

<style>
</style>
@section('content')
<div class="page-header text-black">
    <h2 class=" text-blue ml-5 "> Tashkent University of Information Technologies </h2>
</div>
<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{route('news.create')}}" class="badge badge-outline-success">Create News</a></li>
      </ol>
    </nav>
</div>
<div class="row" style="color: black !important" >
   <div class="col-md-12" style="border-right: 1px solid">
    {{-- @dd($news) --}}
       @foreach ($news as $user)
       <div class="row">
            {{-- <div class="col-md-5">
                <img class="box" style="width: 150px; height:200px"  src="{{ url('uploads/fotos/'.$user->foto) }}">
            </div> --}}
            <div class="col-md-12">
                <div class="card m-2" style="background-color:white">
                    <b>{{$user->theme}}</b>
                   <span>{{$user->description}}</span>
                </div>


            </div>
       </div>

       @endforeach
   </div>

</div>


@endsection

