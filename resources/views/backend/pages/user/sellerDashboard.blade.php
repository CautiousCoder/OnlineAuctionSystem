@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Seller | Dashboard
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
{{-- checking whether seller have permission or not to access --}}
@if (Auth::guard('web')->user()->can('seller.dashboard'))
@include('backend.layouts.inc.sellerDashboard')
@endif

<!-- Main content -->

<!-- /.content -->
@endsection