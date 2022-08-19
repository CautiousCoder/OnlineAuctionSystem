@extends('backend.layouts.layout')
<!-- Title (Page title) --> @section('title') Product | Create Page @endsection
<!-- Navbar (Page navbar) --> @section('navbar') @include('backend.layouts.inc.buyerNavbar') @endsection
<!-- Side Bar (Page sidebar) --> @section('navbarSection') @include('backend.layouts.inc.buyersideBar') @endsection
<!-- Main Content (Page content) --> @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    {{-- <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">New Product</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('seller.sellerDashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('seller.post.index') }}">Product List</a></li>
          <li class="breadcrumb-item active">New Product</li>
        </ol>
      </div><!-- /.col -->
    </div> --}}
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="postindex p-2">
  <!-- Card content -->
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between align-item-center">
        <h1 class="card-title">Create Product</h1>
        <a href="{{ route('seller.post.index') }}" class="btn btn-lg btn-primary">Back</a>
      </div>
    </div> {{-- <div class="card-body p-0"> --}}
      <!-- form start -->
      <div class="col-12">
        <form action="{{ route('seller.post.store') }}" method="POST" enctype="multipart/form-data"> @csrf <div
            class="card-body"> @include('backend.inc.error') <div class="row">
              <div class="col-12 col-md-8">
                <div class="form-group">
                  <label for="name">Product Title</label>
                  <input type="text" name="title" class="form-control" id="name" value="{{ old('title') }}"
                    placeholder="Enter Product Name">
                </div>
                <div class="form-group mb-5">
                  <label for="sort_description">Short Description</label>
                  <textarea class="form-control" name="sort_description" id="sort_description" rows="10"
                    placeholder="Short Descriptions">{{ old('sort_description') }}</textarea>
                </div>
                <div class="form-group mb-5">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" rows="10"
                    placeholder="Descriptions">{{ old('description') }}</textarea>
                </div>
                <div class="card-footer mb-2 d-flex justify-content-between">
                  <button type="submit" class="btn btn-lg btn-primary m-auto">Submit</button>
                </div>
              </div>
              <div class="col-12 col-md-4 bg-dark pl-3 py-4">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" data-placeholder="Publish" name="post_status">
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                  </select>
                </div>
                <div class="form-group" style="margin-bottom: 15px !important">
                  <label for="name">Product SKU Code</label>
                  <div class="input-group mb-3">
                  <input type="text" min="10" name="SKU" class="form-control" placeholder="SKU code">
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 15px !important">
                  <label for="desc">Regular Prize</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="number" min="10" name="regular_prize" class="form-control" placeholder="Regular Prize">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 15px !important">
                  <label for="desc">Sale Prize</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="number" min="10" name="sale_prize" class="form-control" placeholder="Sale Prize">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Start Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" name="start_date" class="form-control datetimepicker-input" placeholder="yyyy-mm-dd" data-target="#reservationdate">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  </div>
                </div>
                {{-- <div class="form-group">
                  <label>Start Date</label>
                  <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                  <input type="text" name="start_date" class="form-control datetimepicker-input" placeholder="yyyy-mm-dd" data-target="#reservationdatetime">
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  </div>
                </div> --}}
                <div class="form-group">
                  <label>End Date</label>
                    <div class="input-group date" id="reservationdatee" data-target-input="nearest">
                      <input type="text" name="end_date" class="form-control datetimepicker-input" placeholder="yyyy-mm-dd" data-target="#reservationdatee">
                    <div class="input-group-append" data-target="#reservationdatee" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: -8px !important">
                  <label>Category</label>
                  <select class="select2 select2-hidden-accessible js-example-basic-multiple" name="categories_id[]"
                    multiple="multiple" data-placeholder="Select Category" style="width: 100%;" data-select2-id="7"
                    tabindex="-1" aria-hidden="true"> @foreach ($categories as $category) <option
                      data-select2-id="7{{ $category->id }}" value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach </select>
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
                    tabindex="-1" aria-hidden="true"> @foreach ($tags as $tag) <option data-select2-id="4{{ $tag->id }}"
                      value="{{ $tag->id }}"> {{ $tag->name }}</option> @endforeach </select>
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
                <div class="card pb-3 pt-2 px-2">
                  <div class="form-group">
                    <label class="text-black" style="color: black !important" for="multiplee">Image Gallery</label>
                    <div class="custom-file">
                      <input type="file" name="images[]" accept="image/*" class="custom-file-input" value="{{ old('image') }}" id="customFile1" multiple>
                      <label class="custom-file-label" for="customFile1">Choose Multiple file</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </form> {{--
      </div> --}}
      <!-- /.form -->
    </div>
  </div>
  <!--/.Card content -->
</div>
<!-- /.content --> 
@endsection {{-- Additional script --}} 
@section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('backEnd') }}/dist/css/summernote.min.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection 
@section('scriptArea')
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{ asset('backEnd') }}/dist/js/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js" integrity="sha512-x/vqovXY/Q4b+rNjgiheBsA/vbWA3IVvsS8lkQSX1gQ4ggSJx38oI2vREZXpTzhAv6tNUaX81E7QBBzkpDQayA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('.js-example-basic-multiple').select2();
        $('.js-example-basic-multiply').select2();
</script>
<script>
  $(function() {
            bsCustomFileInput.init();
        });
</script>
<script>
 $('#sort_description').summernote({
        placeholder: 'Write Product Description',
        tabsize: 4,
        height: 200
      });
  $('#description').summernote({
        placeholder: 'Write Product Description',
        tabsize: 4,
        height: 350
      });
   //Date picker
    $('#reservationdate').datepicker({
        format: 'yyyy-mm-dd',
    });
    $('#reservationdatee').datepicker({
        format: 'yyyy-mm-dd',
    });
</script> @endsection