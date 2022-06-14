@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
    Post | List Page
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
        <h1 class="m-0">Post</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('seller.sellerDashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Post</li>
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
        <h2 class="card-title">Post List</h2>
        <a href="{{ route('seller.post.create') }}" class="btn btn-lg btn-primary">New Post</a>
      </div>
    </div>

    <div class="card-body p-0">
      <!-- Table -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th>Category</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          @if ($posts->count() > 0)
          @foreach ($posts as $post)
          <tr>
            <td style="max-width: 7px">{{ $loop->index+1 }}.</td>
            <td style="max-width: 200px;">
              <div class="name">{{ $post->title }}</div>
              <div class="action d-flex pt-2">
                  <a href="{{ route('seller.post.edit',[$post->id]) }}" class="btn btn-sm btn-info mr-1"><i
                      class="far fa-edit"></i></a>
                  <form action="{{ route('seller.post.destroy',[$post->id]) }}" method="POST" class="mr-1">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                  </form>
                  <a href="{{ route('seller.post.show',[$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i
                      class="far fa-eye"></i></a>
              </div>
            </td>
            <td><div class="img"><img style="max-height: 80px; max-width:100px;" src="{{ $post->image }}" alt="Loading..."></div></td>
            <td>{!! Str::words($post->description, 10, '<a class="btn btn-info btn-sm text-white ml-2" href="#">Read More</a>') !!}</td>
            <td>{{ $post->id }}</td>
            <td>{{ $post->user->name }}</td>
            {{-- <td class="d-flex">
              <a href="{{ route('seller.post.edit',[$post->id]) }}" class="btn btn-sm btn-info mr-1"><i
                  class="far fa-edit"></i></a>
              <form action="{{ route('seller.post.destroy',[$post->id]) }}" method="POST" class="mr-1">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
              </form>
              <a href="{{ route('seller.post.show',[$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i
                  class="far fa-eye"></i></a>
            </td> --}}
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="7">
              <h2 class="text-center">No Posts Found..!</h2>
            </td>
          </tr>
          @endif
        </tbody>
      </table>
      <!-- /.Table -->
    </div>
  </div>
  <!--/.Card content -->
</div>
<!-- /.content -->
@endsection