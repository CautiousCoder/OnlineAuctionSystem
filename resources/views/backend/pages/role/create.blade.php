@extends('backend.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Create Role</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Role List</a></li>
          <li class="breadcrumb-item active">New Role</li>
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
        <h2 class="card-title">Add Tag</h2>
        <a href="{{ route('admin.role.index') }}" class="btn btn-lg btn-primary">Back</a>
      </div>
    </div>

    {{-- <div class="card-body p-0"> --}}
      <!-- form start -->
      <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
        <form action="{{ route('admin.role.store') }}" method="POST">
          @csrf
          <div class="card-body">
            @include('backend.inc.error')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter tag Name">
            </div>
            <div class="form-group">
              <label class="d-block" for="Permission">Permissions</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkboxall" value="1">
                <label class="form-check-label" for="checkboxall">All</label>
              </div>
              <hr>

              <div class="form-group">
                @foreach ($permissions_group as $item)
                <div class="form-check col-6">
                  <input name="permissions[]" id="checkbox{{$item->name}}" class="form-check-input" type="checkbox" value="{{$item->name}}">
                  <label for="checkbox{{$item->name}}" class="form-check-label">{{$item->name}}</label>
                </div>
                @endforeach
              </div>
              {{-- <div class="row">
                @foreach ($permissions as $p)
                <div class="form-check col-6">
                  <input name="permissions[]" id="checkbox{{$p->id}}" class="form-check-input" type="checkbox" value="{{$p->name}}">
                  <label for="checkbox{{$p->id}}" class="form-check-label">{{$p->name}}</label>
                </div>
                @endforeach
              </div> --}}

              {{-- <div class="form-check">
                <input class="form-check-input" type="checkbox" checked="">
                <label class="form-check-label">Checkbox checked</label>
              </div> --}}

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

@section('scriptArea')
    <script>
      $("#checkboxall").click(function(){
        if ($(this).is(':checked')) {
        // All checkbox checked
        $('input[type=checkbox]').prop('checked', true);
      }else {
        $('input[type=checkbox]').prop('checked', false);
      }
      });
    </script>
@endsection