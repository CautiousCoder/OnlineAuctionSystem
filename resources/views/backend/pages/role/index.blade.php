@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Role | index page
@endsection

<!-- Navbar (Page navbar) -->
@section('navbar')
@include('backend.layouts.inc.navbar')
@endsection

<!-- Side Bar (Page sidebar) -->
@section('navbarSection')
@include('backend.layouts.inc.sideBar')
@endsection

<!-- Main Content (Page content) -->
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Role</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Role</li>
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
        <h2 class="card-title">Role List</h2>
        @if (Auth::guard('admin')->user()->can('role.create'))
        <a href="{{ route('admin.role.create') }}" class="btn btn-lg btn-primary">Create Role</a>
        @endif
      </div>
    </div>

    <div class="card-body p-0">
      <!-- Table -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 5% !important">No.</th>
            <th>Name</th>
            <th style="width: 70% !important">Permission</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if ($roles->count() > 0)
          @foreach ($roles as $Role)
          <tr>
            <td>{{ $loop->index+1 }}.</td>
            <td>{{ $Role->name }}</td>
            {{-- Role permission --}}
            <td style="width: 60% !important">@foreach ($Role->permissions as $item)
                <span class="badge badge-info mr-1">{{$item->name}}</span>
            @endforeach
            </td>
            <td class="d-flex">
              {{-- checking whether you have permission or not to access role edit --}}
              @if (Auth::guard('admin')->user()->can('role.edit'))
              <a href="{{ route('admin.role.edit',[$Role->id]) }}" class="btn btn-sm btn-info mr-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                class="far fa-edit"></i></a>
              @endif
              {{-- checking whether you have permission or not to access role delete --}}
              @if (Auth::guard('admin')->user()->can('role.delete'))
              <form action="{{ route('admin.role.destroy',[$Role->id]) }}" method="POST" class="mr-1">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></i></button>
              </form>
              @endif
              {{-- checking whether you have permission or not to access role show --}}
              @if (Auth::guard('admin')->user()->can('role.show'))
              <a href="{{ route('admin.role.show',[$Role->id]) }}" class="btn btn-sm btn-primary mr-1 " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show"><i
                class="far fa-eye"></i></a>
              @endif
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="4">
              <h2 class="text-center">No Roles Found..!</h2>
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