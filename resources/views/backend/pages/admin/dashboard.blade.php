@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Admin | Dashboard
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
      <div class="d-flex justify-content-between text-center">
        <h1 class="">Dashboard</h1>
        <form action="{{ route('admin.logout.submit') }}" id="admin-logout" method="POST">
          @csrf <button class="btn btn-sm btn-primary" type="submit">Logout</button> </form>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<!-- /.content -->
@endsection