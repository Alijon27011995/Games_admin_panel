
@extends('layouts.index')

@section('title')
  dashboard
@endsection

@section('content')
<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{route('user_table.create')}}" class="badge badge-outline-success">Create New User</a></li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Basic tables</li> --}}
      </ol>
    </nav>
</div>
<div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Order Status</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Games type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Full Name </th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th> Options </th>
                </tr>
              </thead>
              <tbody>
                @foreach($customers as $key => $customer)
                @if ($customer != null)
                    <tr>
                        <td>{{ ($key+1)     }}</td>
                        <td>{{$customer->games_type}}</td>
                        <td>{{$customer->date}}</td>
                        <td>{{$customer->time}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->status}}</td>
                        <td>
                            <a class="btn btn-soft-primary  btn-circle btn-sm" title="View Reason">
                                <i class="icon-md  mdi mdi-table-edit text-warning"></i>
                              </a>
                              <a class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="Reject Refund Request">
                                <i class="icon-md mdi mdi-delete text-danger "></i>
                            </a>
                        </td>

                    </tr>
                @endif
            @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

