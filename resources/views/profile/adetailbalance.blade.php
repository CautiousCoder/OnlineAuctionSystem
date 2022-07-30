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
              </ol>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb mb-0 float-right">
                <li class="breadcrumb-item"><a style="border-bottom: 2px solid #000;padding:5px 8px;" href="{{ route('buyer.buyerDashboard') }}">${{ $user->balance->total_bal ?? 'None' }}</a></li>
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
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Balance Details</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Balance</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->balance->new_bal ?? 'None' }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">TnxID</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->balance->tnxid ?? 'None' }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Status</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->balance->tnx_status ?? 'None' }}</p>
                </div>
              </div>
              <hr>
              {{-- <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Description</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->balance->des ?? 'None' }}</p>
                </div>
              </div>
              <hr> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-header --> 
@endsection 
@section('styleArea')
<link rel="stylesheet" href="{{ asset('backEnd') }}/plugins/select2/css/select2.min.css"> @endsection
@section('scriptArea')
<!-- select2 -->
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ asset('backEnd') }}/plugins/select2/js/select2.min.js"></script>
<script>
  $('.js-example-basic-multiple').select2();
</script> @endsection