@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    User | create page
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
      <div class="col-sm-6">
        <h1 class="m-0">Create User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User List</a></li>
          <li class="breadcrumb-item active">Add User</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="tagindex p-2">
  <!-- Card content -->
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-item-center">
        <h2 class="card-title">Add User</h2>
        <a href="{{ route('admin.user.index') }}" class="btn btn-lg btn-primary">Back</a>
      </div>
    </div>

    {{-- <div class="card-body p-0"> --}}
      <!-- form start -->
      <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
        <form action="{{ route('admin.user.store') }}" method="POST">
          @csrf
          <div class="card-body">
            @include('backend.inc.error')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password"
                placeholder="Enter New Password">
            </div>
            <div class="form-group">
              <label for="cpassword">Confirm Password</label>
              <input type="password" name="cpassword" class="form-control" id="cpassword"
                placeholder="Enter Conform Password">
            </div>
            <div class="form-group" style="margin-bottom: -8px !important">
              <label>Roles</label>
              <select class="select2 select2-hidden-accessible js-example-basic-multiple" name="roles[]" multiple="multiple" data-placeholder="Select Role"
                style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                @foreach ($roles as $role)
                <option data-select2-id="7{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select><span class="select2 select2-container select2-container--default select2-container--above"
                dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection d-none"><span
                    class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="false"
                    aria-expanded="false" tabindex="-1" aria-disabled="false">
                    <ul class="select2-selection__rendered">
                      <li class="select2-search select2-search--inline"><input class="select2-search__field"
                        type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none"
                        spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select Roles"
                        style="width: 474px;"></li>
                    </ul>
                  </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

            </div>


          </div>
          <!-- /.card-body -->

          <div class="card-footer mb-2 d-flex justify-content-between">
            <button type="submit" class="btn btn-lg btn-primary m-auto">Submit</button>
          </div>
        </form>
        {{--
      </div> --}}
      <!-- /.form -->
    </div>
  </div>
  <!--/.Card content -->
</div>
<!-- /.content -->
@endsection
@section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css">
@endsection

@section('scriptArea')
<!-- select2 -->
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.min.js"></script>
<script>
  $('.js-example-basic-multiple').select2();
</script>

@endsection