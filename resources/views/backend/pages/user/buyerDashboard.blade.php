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
@include('backend.layouts.inc.buyersideBar')
@endsection

<!-- Main Content (Page content) -->

@section('content')
<!-- Content Header (Page header) -->
{{-- checking whether admin have permission or not to access --}}
@if (Auth::guard('web')->user()->can('buyer.dashboard'))
@include('backend.layouts.inc.buyerDashboard')
@endif

<!-- /.content-header -->

<!-- Main content -->

<!-- /.content -->
@endsection