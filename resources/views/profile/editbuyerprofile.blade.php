@extends('backend.layouts.layout')
<!-- Title (Page title) --> 
@section('title') 
  Profile - {{ Auth::guard('web')->user()->username }}
@endsection 

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col" style="margin-top: -30px">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('buyer.buyerDashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ $user->profile->image_name ?? 'https://i.postimg.cc/fbP26sDD/user.png' }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->username }}</h5>
              <p class="text-muted mb-1">{{ $user->profile->designation ?? '' }}</p>
              <p class="text-muted mb-4">{{ $user->profile->bio ?? '' }}</p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary mr-2">Follow</button>
                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <form action="{{ route('buyer.storeprofile') }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                <div class="card-body">
                  @include('backend.inc.error')
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="Enter Full Name">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ $user->profile->phone ?? '' }}" class="form-control" id="phone" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" value="{{ $user->profile->designation ?? '' }}" class="form-control" id="designation" placeholder="Enter Full Name">
                  </div>
                  <div class="form-group">
                    <label for="bio">Bio</label>
                    <input type="text" name="bio" value="{{ $user->profile->bio ?? '' }}" class="form-control" id="bio" placeholder="Write Your Bio...">
                  </div>
                  <div class="form-group">
                    <label for="road_num">Street Name</label>
                    <input type="text" name="road_num" value="{{ $user->profile->road_num ?? '' }}" class="form-control" id="road_num" placeholder="Street Name">
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" value="{{ $user->profile->city ?? '' }}" class="form-control" id="city" placeholder="City">
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" value="{{ $user->profile->state ?? '' }}" class="form-control" id="state" placeholder="State">
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" value="{{ $user->profile->country ?? '' }}" class="form-control" id="country" placeholder="Country">
                  </div>
                  <div class="form-group">
                    <label for="zip_code">ZIP Code</label>
                    <input type="text" name="zip_code" value="{{ $user->profile->zip_code ?? '' }}" class="form-control" id="designation" placeholder="ZIP Code">
                  </div>
                  <div class="form-group">
                    <label for="nid_number">NID Number</label>
                    <input type="text" name="nid_number" value="{{ $user->profile->nid_number ?? '' }}" class="form-control" id="nid_number" placeholder="NID Number">
                  </div>
                  <div class="form-group">
                    <label for="license_number">License Number</label>
                    <input type="text" name="license_number" value="{{ $user->profile->license_number ?? '' }}" class="form-control" id="license_number" placeholder="License Number">
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
                <!-- /.card-body -->

                <div class="card-footer mb-2 d-flex justify-content-between">
                  <button type="submit" class="btn btn-lg btn-primary m-auto">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
</div>
<!-- /.content-header --> @endsection @section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css"> @endsection
@section('scriptArea')
<!-- select2 -->
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.min.js"></script>
<script>
  $('.js-example-basic-multiple').select2();
  $(function() {
      bsCustomFileInput.init();
  });
</script> @endsection