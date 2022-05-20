@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Admin | Index page
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
        <h1 class="m-0">Admin</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Admin</li>
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
        <h2 class="card-title">Admin List</h2>
        <a href="{{ route('admin.admin.create') }}" class="btn btn-lg btn-primary">Create Admin</a>
      </div>
    </div>

    <div class="card-body p-0">
      <!-- Table -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 6% !important">No.</th>
            <th style="width: 12% !important">Email</th>
            <th style="width: 12% !important">Name</th>
            <th style="width: 12% !important">Username</th>
            <th style="width: 12% !important">Phone</th>
            <th style="width: 34% !important">Roles</th>
            <th style="width: 12% !important">Action</th>
          </tr>
        </thead>
        <tbody>
          @if ($admins->count() > 0)
          @foreach ($admins as $admin)
          <tr>
            <td>{{ $loop->index+1 }}.</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->username }}</td>
            <td>{{ $admin->phone }}</td>
            <td style="width: 60% !important">
              @foreach ($admin->roles as $item)
                <span class="badge badge-info mr-1">{{$item->name}}</span>
              @endforeach
          </td>
            <td class="d-flex">
              <a href="{{ route('admin.admin.edit',[$admin->id]) }}" class="btn btn-sm btn-info mr-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                  class="far fa-edit"></i></a>
              <form action="{{ route('admin.admin.destroy',[$admin->id]) }}" method="POST" class="mr-1">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></button>
              </form>
              <a href="{{ route('admin.admin.show',[$admin->id]) }}" class="btn btn-sm btn-primary mr-1 " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show"><i
                  class="far fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="4">
              <h2 class="text-center">No admins Found..!</h2>
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