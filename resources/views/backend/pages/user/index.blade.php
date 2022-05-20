@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    User | Index page
@endsection

<!-- Navbar (Page navbar) -->
@section('navbar')
@include('backend.layouts.inc.navbar')
@endsection

<!-- Main Content (Page content) -->


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="Roleindex p-2">
  <!-- Card content -->
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-item-center">
        <h2 class="card-title">User List</h2>
        <a href="{{ route('admin.user.create') }}" class="btn btn-lg btn-primary">Create User</a>
      </div>
    </div>

    <div class="card-body p-0">
      <!-- Table -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 6% !important">No.</th>
            <th style="width: 15% !important">Name</th>
            <th style="width: 19% !important">Email</th>
            <th style="width: 45% !important">Roles</th>
            <th style="width: 15% !important">Action</th>
          </tr>
        </thead>
        <tbody>
          @if ($users->count() > 0)
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->index+1 }}.</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td style="width: 60% !important">@foreach ($user->roles as $item)
                <span class="badge badge-info mr-1">{{$item->name}}</span>
            @endforeach</td>
            <td class="d-flex">
              <a href="{{ route('admin.user.edit',[$user->id]) }}" class="btn btn-sm btn-info mr-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                  class="far fa-edit"></i></a>
              <form action="{{ route('admin.user.destroy',[$user->id]) }}" method="POST" class="mr-1">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></button>
              </form>
              <a href="{{ route('admin.user.show',[$user->id]) }}" class="btn btn-sm btn-primary mr-1 " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show"><i
                  class="far fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="4">
              <h2 class="text-center">No users Found..!</h2>
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