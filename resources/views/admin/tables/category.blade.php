
@extends('layouts.index')

@section('title')
  dashboard
@endsection

<style>
 .selection{
  /* background-color: lightblue;
  width: 110px;
  height: 110px; */
  /* overflow: auto !important; */
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
        <li class="breadcrumb-item"><a  href="{{route('category.create')}}" class="badge badge-outline-success">Create New Category</a></li>
      </ol>
    </nav>
</div>
<div class="row " >
    <div class="col-12 grid-margin">
      <div class="card selection">
        <div class="card-body">
          <h4 class="card-title">Categories</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Category Name</th>
                    <th>Date</th>
                    <th>Options </th>
                </tr>
              </thead>
              <tbody>
                @if ($categories)
                @foreach($categories as $key => $category)
                    @if ($category != null)
                    {{-- @dd($category['code']) --}}
                        <tr>
                            <td>{{ ($key+1)}}</td>
                            <td>
                                <img class="img" src="{{ url('uploads/fotos/'.$category->foto) }}">
                                {{-- {{$category->slug}} --}}
                            </td>
                            <td>{{$category->category_name_ru}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="Reject Refund Request">
                                    <i  class="icon-md mdi mdi-table-edit  text-primary "></i>
                                </a>
                                <a href="{{route('category.destroy', $category->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm"  title="Reject Refund Request">
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

