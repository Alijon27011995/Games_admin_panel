
@extends('layouts.index')

@section('title')
  Users
@endsection

<style>
 .selection{
  /* background-color: lightblue;
  width: 110px; */
  height: 500px;
  overflow: auto !important;
}
.img{
    width: 100px !important;
    height: 100px !important;
}
</style>
@section('content')
<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{route('user.create')}}" class="badge badge-outline-success">Create New User</a></li>
      </ol>
    </nav>
</div>
<div class="row " >
    <div class="col-12 grid-margin">
      <div class="card selection">
        <div class="card-body ">
          <h4 class="card-title">Users</h4>
          <div class="table-responsive">
            <table class="table " >
              <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Group</th>
                    <th>User Name</th>
                    <th>Phone Number</th>
                    <th>Inn</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Options </th>
                </tr>
              </thead>
              <tbody>
                @if ($users)

                @foreach($users as $key => $user)
                    @if ($user != null)
                    {{-- @dd($user) --}}
                        <tr>
                            <td>{{ ($key+1)}}</td>
                            <td>
                                <img class="img"  src="{{ url('uploads/fotos/'.$user->foto) }}">
                                {{-- {{$user->slug}} --}}
                            </td>
                            <td>
                                {{$user->group_id}}
                                <span >- group</span>

                            </td>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->inn}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{route('product.show', $user->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="show">
                                    <i  class="icon-md mdi mdi-eye text-primary "></i>
                                </a>
                                <a href="{{route('product.edit', $user->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="edit">
                                    <i  class="icon-md mdi mdi-table-edit  text-primary "></i>
                                </a>
                                <a href="{{route('product.destroy', $user->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="delete">
                                    <i  class="icon-md mdi mdi-delete text-danger "></i>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach

                @endif

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection

