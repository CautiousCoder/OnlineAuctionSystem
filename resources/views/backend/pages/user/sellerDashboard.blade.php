@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Buyer | Dashboard
@endsection

<!-- Navbar (Page navbar) -->
@section('navbar')
@include('backend.layouts.inc.buyerNavbar')
@endsection

<!-- Side Bar (Page sidebar) -->
@section('navbarSection')
@include('backend.layouts.inc.buyerSideBar')
@endsection

<!-- Main Content (Page content) -->

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="d-flex justify-content-between text-center">
        <h1 class="">Dashboard</h1>
        <form action="{{ route('user.dologout') }}" id="user-logout" method="POST">
          @csrf <button class="btn btn-sm btn-primary" type="submit">Logout</button> </form>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<!-- /.content -->
@endsection