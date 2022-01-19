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

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
            <p class="card-description"> Basic form elements </p>
            <form method="POST" action="{{ route('user.create') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Phone number</label>
                    <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Date</label>
                    <input type="date" class="form-control" name="data"  required>
                </div>
                {{-- <div class="form-group">
                    @php
                    //   $value_1=date("10:30");
                        $value_1=date("10:00");
                        $value_2=date("11:15");
                        $value_3=date("12:30");
                        $value_4=date("13:45");
                        $value_5=date("15:00");
                        $value_6=date("16:15");
                        $value_7=date("17:30");
                        $value_8=date("18:45");
                        $value_9=date("20:00");
                        $value_10=date("21:15");
                        $value_11=date("12:30");
                        $value_12=date("23:45");
                        $value_13=date("01:00");
                    @endphp
                    <select id="times" class="form-control">
                        <option value="{{$value_1}}"  class="form-control">{{$value_1}}</option>
                        <option value="{{$value_2}}" class="form-control">{{$value_2}}</option>
                        <option value="{{$value_3}}" class="form-control">{{$value_3}}</option>
                        <option value="{{$value_4}}"  class="form-control">{{$value_4}}</option>
                        <option value="{{$value_5}}"  class="form-control">{{$value_5}}</option>
                        <option value="{{$value_6}}" class="form-control">{{$value_6}}</option>
                        <option value="{{$value_7}}" class="form-control">{{$value_7}}</option>
                        <option value="{{$value_8}}"  class="form-control">{{$value_8}}</option>
                        <option value="{{$value_9}}"  class="form-control">{{$value_9}}</option>
                        <option value="{{$value_10}}" class="form-control">{{$value_10}}</option>
                        <option value="{{$value_11}}" class="form-control">{{$value_11}}</option>
                        <option value="{{$value_12}}"  class="form-control">{{$value_12}}</option>
                        <option value="{{$value_13}}"  class="form-control">{{$value_13}}</option>
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="exampleInputPassword4">time</label>
                    <input type="time" name="start" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Players</label>
                    <select id="times" class="form-control">
                        <option value="1"  class="form-control">1 Players</option>
                        <option value="2" class="form-control">2 Players</option>
                        <option value="3" class="form-control">3 Players</option>
                        <option value="4"  class="form-control">4 Players</option>
                        <option value="5"  class="form-control">5 Players</option>
                        <option value="6" class="form-control">6 Players</option>
                        <option value="7" class="form-control">7 Players</option>
                        <option value="8"  class="form-control">8 Players</option>
                        <option value="9"  class="form-control">9 Players</option>
                        <option value="10" class="form-control">10 Players</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Games</label>
                    <select id="games" class="form-control">
                        <option value="game_one"  class="form-control">game_one</option>
                        <option value="game_two" class="form-control">game_two</option>
                    </select>
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


