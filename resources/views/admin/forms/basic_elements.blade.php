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
            <h4 class="card-title">Create user</h4>
            <p class="card-description"> Basic form elements </p>
            <form method="POST" action="{{ route('user.create') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    {{-- @dd($user) --}}
                    <label for="exampleInputName1">Name</label>
                    <input name="name"  type="text" class="form-control" id="exampleInputName1" placeholder=" Full Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input name="email"  type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Phone number</label>
                    <input name="phone_number"  type="phone" class="form-control" id="exampleInputPassword4" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Date</label>
                    <input name="date"   type="date" class="form-control" placeholder="YYYY-dd-mm" name="data"  required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">time</label>
                    <input name="time"  type="time" name="start" class="form-control" placeholder="HH:mm"  >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Players</label>
                    <select id="times" name="players" class="form-control">
                        <option name="players_1" id="players_1" value="1 Players"  class="form-control">1 Players</option>
                        <option name="players_2" id="players_2" value="2 Players" class="form-control">2 Players</option>
                        <option name="players_3" id="players_3" value="3 Players" class="form-control">3 Players</option>
                        <option name="players_4" id="players_4" value="4 Players"  class="form-control">4 Players</option>
                        <option name="players_5" id="players_5" value="5 Players"  class="form-control">5 Players</option>
                        <option name="players_6" id="players_6" value="6 Players" class="form-control">6 Players</option>
                        <option name="players_7" id="players_7" value="7 Players" class="form-control">7 Players</option>
                        <option name="players_8" id="players_8" value="8 Players"  class="form-control">8 Players</option>
                        <option name="players_9" id="players_9" value="9 Players"  class="form-control">9 Players</option>
                        <option name="players_10" id="players_10" value="10 Players" class="form-control">10 Players</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Games</label>
                    <select id="games" name="games" class="form-control">
                        <option name="game_one"   value="game_one" id="game_one"  value="game_one"  class="form-control">game_one</option>
                        <option name="game_two"   value="game_two" id="game_two" value="game_two" class="form-control">game_two</option>
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


