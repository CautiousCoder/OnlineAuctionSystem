@extends('backend.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-6 offset-3">
        <h1 class="m-0 text-center">Register</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="tagindex p-2">

  <!-- form start -->
  <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
    <!-- Card content -->
    <div class="card">
      @if (Session::has('success'))
      <div class="alert alert-success"> {{ Session::get('success')}} </div>
      @endif
      @if (Session::has('error'))
      <div class="alert alert-danger"> {{ Session::get('error')}} </div>
      @endif
      <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="Enter Full Name">
            @error('name')<span class="text-danger mx-2"> {{ $message}} </span>@enderror
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" placeholder="Enter E-mail">
            @error('email')<span class="text-danger mx-2"> {{ $message}} </span>@enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
            @error('password')<span class="text-danger mx-2"> {{ $message}} </span>@enderror
          </div>
          <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password">
            @error('cpassword')<span class="text-danger mx-2"> {{ $message}} </span>@enderror
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer mb-2 pt-4 text-center">
          <button type="submit" class="btn btn-lg btn-primary m-auto">Submit</button>
          <div class="text-center m-3">
            <h6 class="text-center">Already have an Account. <a href="{{ route('admin.login') }}">Log In here</a></h6>
          </div>
        </div>
      </form>
      <!-- /.form -->
    </div>
  </div>
  <!--/.Card content -->
</div>
<!-- /.content -->
@endsection