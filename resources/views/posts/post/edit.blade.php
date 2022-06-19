@extends('backend.layouts.layout')
<!-- Title (Page title) --> @section('title') Product | Edit Page @endsection
<!-- Navbar (Page navbar) --> @section('navbar') @include('backend.layouts.inc.buyerNavbar') @endsection
<!-- Side Bar (Page sidebar) --> @section('navbarSection') @include('backend.layouts.inc.buyersideBar') @endsection
<!-- Main Content (Page content) --> @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		{{-- <div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Edit Product</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('seller.sellerDashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ route('seller.post.index') }}">Product List</a></li>
					<li class="breadcrumb-item active">Edit Product</li>
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
				<h2 class="card-title">Edit Product</h2>
				<a href="{{ route('seller.post.index') }}" class="btn btn-lg btn-primary">Back</a>
			</div>
		</div> {{-- <div class="card-body p-0"> --}}
			<!-- form start -->
			<div class="col-12">
				<form action="{{ route('seller.post.update', [$post->id]) }}" method="POST"> @method('PUT') @csrf <div
						class="card-body"> @include('backend.inc.error') <div class="row">
							<div class="col-12 col-md-9">
								<div class="form-group">
									<label for="title">Product Title</label>
									<input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}"
										placeholder="Enter Product Name">
								</div>
								<div class="form-group mb-5">
                  <label for="sort_description">Short Description</label>
                  <textarea class="form-control" name="sort_description" id="sort_description" rows="10"
                    placeholder="Short Descriptions">{{ old('sort_description') }}</textarea>
                </div>
								<div class="form-group">
									<label for="description">Description</label>
									<textarea class="form-control" name="description" id="description" rows="4"
										placeholder="Descriptions">{{ $post->description }}</textarea>
								</div>
							</div>
							<div class="col-12 col-md-3 bg-dark py-4 pl-2">
								<div class="form-group">
                  <label>Status</label>
                  <select class="form-control" data-placeholder="Publish" name="post_status">
                    <option value="publish" @if ($post->post_status == 'publish	') selected @endif >Publish</option>
                    <option value="draft" @if ($post->post_status == 'draft	') selected @endif >Draft</option>
                  </select>
                </div>
								<div class="form-group" style="margin-bottom: -8px !important">
									<label>Category</label>
									<select class="select2 select2-hidden-accessible js-example-basic-multiple" name="categories_id[]"
										multiple="multiple" data-placeholder="Select Category" style="width: 100%;" data-select2-id="7"
										tabindex="-1" aria-hidden="true"> @foreach ($categories as $category) <option
											data-select2-id="7{{ $category->id }}" value="{{ $category->id }}" @foreach ($post->categories as
											$c) @if ($category->id == $c->id) selected @endif @endforeach > {{ $category->name }}</option>
										@endforeach </select>
									<span class="select2 select2-container select2-container--default select2-container--above" dir="ltr"
										data-select2-id="8" style="width: 100%;">
										<span class="selection d-none">
											<span class="select2-selection select2-selection--multiple" category="combobox"
												aria-haspopup="false" aria-expanded="false" tabindex="-1" aria-disabled="false">
												<ul class="select2-selection__rendered">
													<li class="select2-search select2-search--inline">
														<input class="select2-search__field" type="search" tabindex="0" autocomplete="off"
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
											value="{{ $tag->id }}" @foreach ($post->tags as $t) @if ($tag->id == $t->id) selected @endif
											@endforeach > {{ $tag->name }}</option> @endforeach </select>
									<span class="select2 select2-container select2-container--default select2-container--above" dir="ltr"
										data-select2-id="8" style="width: 100%;">
										<span class="selection d-none">
											<span class="select2-selection select2-selection--multiple" category="combobox"
												aria-haspopup="false" aria-expanded="false" tabindex="-1" aria-disabled="false">
												<ul class="select2-selection__rendered">
													<li class="select2-search select2-search--inline">
														<input class="select2-search__field" type="search" tabindex="0" autocomplete="off"
															autocorrect="off" autocapitalize="none" spellcheck="false" category="searchbox"
															aria-autocomplete="list" style="width: 474px;">
													</li>
												</ul>
											</span>
										</span>
										<span class="dropdown-wrapper" aria-hidden="true"></span>
									</span>
								</div>
								<div class="form-group" style="margin-bottom: 15px !important">
                  <label for="desc">Regular Prize</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">$</span>
                    </div>
                    <input type="number" min="10" name="regular_priz" class="form-control" placeholder="Regular Prize">
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
                    <input type="number" min="10" name="sale_priz" class="form-control" placeholder="Sale Prize">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
								<div class="form-group">
									<label for="img">Image</label>
									<!-- <label for="customFile">Custom File</label> -->
									<div class="bg-light p-2" style="min-height: 150px">
										<div class="ml-auto mb-2 text-center">
											<img style="max-height:120px; max-width: 150px" src="{{ $post->image }}" alt="Loading...">
										</div>
										<div class="custom-file">
											<input type="file" name="image" class="custom-file-input" id="customFile">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer d-flex justify-content-between mb-2">
						<button type="submit" class="btn btn-lg btn-primary m-auto">Update Product</button>
					</div>
				</form> {{--
			</div> --}}
			<!-- /.form -->
		</div>
	</div>
	<!--/.Card content -->
</div>
<!-- /.content --> 

{{-- Additional script --}}
@endsection @section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('backEnd') }}/dist/css/summernote.min.css"> @endsection @section('scriptArea')
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{ asset('backEnd') }}/dist/js/summernote.min.js"></script>
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
        height: 150
      });
	$('#description').summernote({
        placeholder: 'Write Product Description',
        tabsize: 4,
        height: 350
      });
</script> @endsection