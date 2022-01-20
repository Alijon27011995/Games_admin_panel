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
                    <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Phone number</label>
                    <input name="phone_number" type="number" class="form-control" id="exampleInputPassword4" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Date</label>
                    <input name="date" type="date" class="form-control" name="data"  required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">time</label>
                    <input name="time" type="time" name="start" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Players</label>
                    <select id="times" class="form-control">
                        <option name="" value="1"  class="form-control">1 Players</option>
                        <option name="" value="2" class="form-control">2 Players</option>
                        <option name="" value="3" class="form-control">3 Players</option>
                        <option name="" value="4"  class="form-control">4 Players</option>
                        <option name="" value="5"  class="form-control">5 Players</option>
                        <option name="" value="6" class="form-control">6 Players</option>
                        <option name="" value="7" class="form-control">7 Players</option>
                        <option name="" value="8"  class="form-control">8 Players</option>
                        <option name="" value="9"  class="form-control">9 Players</option>
                        <option name="" value="10" class="form-control">10 Players</option>
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


