@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Category | Edit Page
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
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Category</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('seller.category.index') }}">Category List</a></li>
          <li class="breadcrumb-item active">Edit Category</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="categoryindex p-2">
  <!-- Card content -->
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-item-center">
        <h2 class="card-title">Edit Category</h2>
        <a href="{{ route('seller.category.index') }}" class="btn btn-lg btn-primary">Back</a>
      </div>
    </div>

    {{-- <div class="card-body p-0"> --}}
      <!-- form start -->
      <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
      <form action="{{ route('seller.category.update', [$category->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="card-body">
          @include('backend.inc.error')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Enter Category Name">
          </div>
          <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" name="des" id="desc"  rows="4" placeholder="Descriptions">{{ $category->description }}</textarea>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer mb-2 d-flex justify-content-between">
          <button type="submit" class="btn btn-lg btn-primary m-auto">Update Category</button>
        </div>
      </form>
    {{-- </div> --}}
      <!-- /.form -->
    </div>
  </div>
  <!--/.Card content -->
</div>
<!-- /.content -->
@endsection