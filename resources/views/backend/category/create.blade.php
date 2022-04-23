@extends('backend.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">New Category</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
          <li class="breadcrumb-item active">New Category</li>
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
        <h2 class="card-title">Add Category</h2>
        <a href="{{ route('category.index') }}" class="btn btn-lg btn-primary">Back</a>
      </div>
    </div>

    {{-- <div class="card-body p-0"> --}}
      <!-- form start -->
      <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
      <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="card-body">
          @include('backend.inc.error')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name">
          </div>
          <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control" name="des" id="desc"  rows="4" placeholder="Descriptions"></textarea>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer mb-2 d-flex justify-content-between">
          <button type="submit" class="btn btn-lg btn-primary m-auto">Submit</button>
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