@extends('layouts.index')

@section('title')
  dashboard
@endsection

<style>
 .selection{
  /* background-color: lightblue;
  width: 110px;
  height: 110px; */
  overflow: auto !important;
}
</style>
@section('content')
<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      </ol>
    </nav>
</div>
<div class="row " >
    <div class="col-12 grid-margin">
      <div class="card selection">
        <div class="card-body">
          <h4 class="card-title">Orders Table History</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Order_id</th>
                    <th>User Name</th>
                    <th>user phone</th>
                    <th>Date</th>
                    <th>Options </th>
                </tr>
              </thead>
              <tbody>
                    @if ($orders)

                        @foreach($orders as $key => $order)
                            @if ($order != null)
                            @php
                                $user=\App\Models\User::where('telegram_id',$order->telegram_id)->first();
                                // dd($user)
                            @endphp
                                <tr>
                                    <td>{{ ($key+1)}}</td>
                                    <td>{{$order->code}}</td>
                                    {{-- <td>{{$order->created_at}}</td> --}}
                                    {{-- <td>{{$order->date}}</td> --}}
                                    {{-- <td>{{$order->time}}</td> --}}
                                    <td>{{$user->full_name ?? ""}} </td>
                                    <td>{{$user->phone_number ?? ""}} </td>
                                    {{-- <td>{{$order->email}}</td> --}}
                                    <td>{{$order->created_at}}</td>
                                    {{-- <td>
                                        <div class="badge badge-outline-warning">{{$order->status}}</div>
                                    </td> --}}
                                    <td>
                                        <a href="{{route('order.show', $order->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="Reject Refund Request">
                                            <i  class="icon-md mdi mdi-eye text-primary "></i>
                                        </a>
                                        {{-- <a href="{{route('customer_history.destroy', $order->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="Reject Refund Request">
                                            <i  class="icon-md mdi mdi-delete text-danger "></i>
                                        </a> --}}
                                    </td>

                                </tr>
                            @endif
                        @endforeach

                    @endif

              </tbody>

            </table>
            <div >
                {{$orders->links()}}
            </div>
          </div>
        </div>

      </div>
    </div>
</div>


@endsection

