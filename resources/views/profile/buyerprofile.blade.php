@extends('backend.layouts.balancelayout')
<!-- Title (Page title) --> 
@section('title') 
  Profile - {{ Auth::guard('web')->user()->username }}
@endsection 

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="col" style="margin-top: -30px">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <div class="row">
            <div class="col-md-6">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('buyer.buyerDashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                <div class="float-right d-block ml-3"><a href="{{ route('buyer.editprofile') }}" role="button" class="btn btn-success btn-sm">Edit Profile</a></div>
              </ol>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('buyer.buyerDashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                <div class="float-right d-block ml-3"><a href="{{ route('buyer.editprofile') }}" role="button" class="btn btn-success btn-sm">Edit Profile</a></div>
              </ol>
            </div>
          </div>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-4">
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
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush d-flex rounded-3">
                <li class="list-group-item s-icon p-3">
                  <a href="#"> <i class="fas fa-globe fa-lg text-warning"></i></a>
                </li>
                <li class="list-group-item s-icon p-3">
                  <a href="#"><i class="fab fa-github fa-lg" style="color: #333333;"></i></i></a>
                </li>
                <li class="list-group-item s-icon p-3">
                  <a href="#"> <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i></a>
                </li>
                <li class="list-group-item s-icon p-3">
                  <a href="#">  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i></i></a>
                </li>
                <li class="list-group-item s-icon p-3">
                  <a href="#"><i class="fab fa-facebook fa-lg" style="color: #3b5998;"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->profile->phone ?? 'None' }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Zip Code</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->profile->zip_code ?? 'None' }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">NID Number</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->profile->nid_number ?? 'None' }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Licence Number</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->profile->license_number ?? 'None' }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->profile->road_num ?? '' }} {{ $user->profile->city ?? '' }} {{ $user->profile->state ?? '' }} {{ $user->profile->country ?? 'None' }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="row">
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </section> {{-- <div class="row mb-2">
    <div class="col-12 col-md-9">
      <h1 class="m-0">Edit Profile - {{ Auth::guard('web')->user->name }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Profile List</a></li>
        <li class="breadcrumb-item active">Edit Profile</li>
      </ol>
    </div>
  </div> --}}
</div>
<!-- /.content-header --> @endsection @section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css"> @endsection
@section('scriptArea')
<!-- select2 -->
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.min.js"></script>
<script>
  $('.js-example-basic-multiple').select2();
</script> @endsection