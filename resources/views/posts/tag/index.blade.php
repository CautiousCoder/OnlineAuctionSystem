@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Tags | List Page
@endsection

<!-- Navbar (Page navbar) -->
@section('navbar')
@include('backend.layouts.inc.buyerNavbar')
@endsection

<!-- Side Bar (Page sidebar) -->
@section('navbarSection')
@include('backend.layouts.inc.buyersideBar')
@endsection

<!-- Main Content (Page content) -->

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tag</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('seller.sellerDashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Tag</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="tagindex p-2">
  <!-- Card content -->
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-item-center">
        <h2 class="card-title">Tag List</h2>
        <a href="{{ route('seller.tag.create') }}" class="btn btn-lg btn-primary">Create Tag</a>
      </div>
    </div>

    <div class="card-body p-0">
      <!-- Table -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10px">No.</th>
            <th>Name</th>
            <th>slug</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if ($tags->count() > 0)
          @foreach ($tags as $tag)
          <tr>
            <td>{{ $tag->id }}.</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->slug }}</td>
            <td>{{ $tag->description }}</td>
            <td class="d-flex">
              <a href="{{ route('seller.tag.edit',[$tag->id]) }}" class="btn btn-sm btn-info mr-1"><i
                  class="far fa-edit"></i></a>
              <form action="{{ route('seller.tag.destroy',[$tag->id]) }}" method="POST" class="mr-1">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
              </form>
              <a href="{{ route('seller.tag.show',[$tag->id]) }}" class="btn btn-sm btn-primary mr-1"><i
                  class="far fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="5">
              <h2 class="text-center">No Tags Found..!</h2>
            </td>
          </tr>
          @endif
        </tbody>
      </table>
      <!-- /.Table -->
    </div>
  </div>
  <!--/.Card content -->
</div>
<!-- /.content -->
@endsection