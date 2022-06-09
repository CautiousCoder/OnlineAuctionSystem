@extends('backend.layouts.layout')

<!-- Title (Page title) -->
@section('title')
Post | Create Page
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
        <h1 class="m-0">New Post</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('seller.post.index') }}">Post List</a></li>
          <li class="breadcrumb-item active">New Post</li>
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
        <h2 class="card-title">Add Post</h2>
        <a href="{{ route('seller.post.index') }}" class="btn btn-lg btn-primary">Back</a>
      </div>
    </div>

    {{-- <div class="card-body p-0"> --}}
      <!-- form start -->
      <div class="col-12">
        <form action="{{ route('seller.post.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            @include('backend.inc.error')
            <div class="row">
              <div class="col-12 col-md-8">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                    placeholder="Enter Post Name">
                </div>
                <!-- select -->

                <div class="form-group">
                  <label for="desc">Description</label>
                  <textarea class="form-control" name="description" id="desc" rows="4"
                    placeholder="Descriptions">{{ old('description') }}</textarea>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <div class="form-group" style="margin-bottom: -8px !important">
                  <label>Category</label>
                  <select class="select2 select2-hidden-accessible js-example-basic-multiple" name="categories[]"
                    multiple="multiple" data-placeholder="Select Category" style="width: 100%;" data-select2-id="7"
                    tabindex="-1" aria-hidden="true">
                    @foreach ($categories as $category)
                    <option data-select2-id="7{{$category->id}}" value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                  </select>
                  <span class="select2 select2-container select2-container--default select2-container--above" dir="ltr"
                    data-select2-id="8" style="width: 100%;">
                    <span class="selection d-none">
                      <span class="select2-selection select2-selection--multiple" category="combobox"
                        aria-haspopup="false" aria-expanded="false" tabindex="-1" aria-disabled="false">
                        <ul class="select2-selection__rendered">
                          <li class="select2-search select2-search--inline">
                            <input class="select2-search__field " type="search" tabindex="0" autocomplete="off"
                              autocorrect="off" autocapitalize="none" spellcheck="false" category="searchbox"
                              aria-autocomplete="list" style="width: 474px;">
                          </li>
                        </ul>
                      </span>
                    </span>
                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                  </span>
                </div>
                <div class="form-group" style="margin-bottom: -8px !important">
                  <label>Tags</label>
                  <select class="select2 select2-hidden-accessible js-example-basic-multiply" name="tags[]"
                    multiple="multiple" data-placeholder="Select Tag" style="width: 100%;" data-select2-id="4"
                    tabindex="-1" aria-hidden="true">
                    @foreach ($tags as $tag)
                    <option data-select2-id="4{{$tag->id}}" value="{{ $tag->id }}">{{$tag->name}}</option>
                    @endforeach
                  </select>
                  <span class="select2 select2-container select2-container--default select2-container--above" dir="ltr"
                    data-select2-id="8" style="width: 100%;">
                    <span class="selection d-none">
                      <span class="select2-selection select2-selection--multiple" category="combobox"
                        aria-haspopup="false" aria-expanded="false" tabindex="-1" aria-disabled="false">
                        <ul class="select2-selection__rendered">
                          <li class="select2-search select2-search--inline">
                            <input class="select2-search__field " type="search" tabindex="0" autocomplete="off"
                              autocorrect="off" autocapitalize="none" spellcheck="false" category="searchbox"
                              aria-autocomplete="list" style="width: 474px;">
                          </li>
                        </ul>
                      </span>
                    </span>
                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                  </span>
                </div>
                <div class="form-group">
                  <label for="desc">Image</label>
                  <!-- <label for="customFile">Custom File</label> -->
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" value="{{ old('image') }}"
                      id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
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

