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

{{-- @section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css">
@endsection --}}

@section('scriptArea')
<!-- select2 -->
<script src="{{ asset('backEnd') }}/plugins/chart.js/Chart.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('backEnd') }}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('backEnd') }}/dist/js/pages/dashboard.js"></script>

@endsection