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
{{-- @section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css">
@endsection --}}

@section('scriptArea')
<!-- select2 -->
<script src="{{ asset('backEnd') }}/plugins/chart.js/Chart.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('backEnd') }}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('backEnd') }}/dist/js/demo.js"></script>
<script src="{{ asset('backEnd') }}/dist/js/pages/dashboard.js"></script>

@endsection