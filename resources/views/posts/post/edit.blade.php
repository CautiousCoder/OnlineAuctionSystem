@extends('backend.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Post</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
          <li class="breadcrumb-item active">Edit Post</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="postindex p-2">
  <!-- Card content -->
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-item-center">
        <h2 class="card-title">Edit Post</h2>
        <a href="{{ route('post.index') }}" class="btn btn-lg btn-primary">Back</a>
      </div>
    </div>

    {{-- <div class="card-body p-0"> --}}
      <!-- form start -->
      <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
        <form action="{{ route('post.update', [$post->id]) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="card-body">
            @include('backend.inc.error')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ $post->name }}"
                placeholder="Enter Post Name">
            </div>
            <!-- select -->
            <div class="form-group">
              <label for="postcat">Post Category</label>
              <select class="custom-select form-control" id="postcat" name="category">
                @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @if ($post->id == $cat->id)
                  selected
                @endif>{{ $cat->name }}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="desc">Image</label>
              <!-- <label for="customFile">Custom File</label> -->
              <div class="row">
                <div class="col-md-9">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
                <div class="col-md-3 ml-auto text-center">
                  <img style="max-height:80px; max-width: 100px" src="{{ $post->image }}" alt="Loading...">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" name="description" id="desc" rows="4"
                placeholder="Descriptions">{{ $post->description }}</textarea>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer mb-2 d-flex justify-content-between">
            <button type="submit" class="btn btn-lg btn-primary m-auto">Update Post</button>
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