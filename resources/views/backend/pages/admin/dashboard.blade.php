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

<!-- Main content -->
{{-- checking whether admin have permission or not to access --}}
@if (Auth::guard('admin')->user()->can('admin.dashboard'))
@include('backend.layouts.inc.adminDashboard')
@endif

<!-- /.content -->
@endsection