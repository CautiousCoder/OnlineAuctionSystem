
@extends('layouts.app')

@section('title')
		Contact Us
@endsection

@section('content')
		
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Contact us</span></li>
				</ul>
			</div>
			<div class="row">
				<div class=" main-content-area">
					<div class="wrap-contacts ">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-form">
								<h2 class="box-title">Leave a Message</h2>
								<form action="#" method="get" name="frm-contact">

									<label for="name">Name<span>*</span></label>
									<input type="text" value="" id="name" name="name" >

									<label for="email">Email<span>*</span></label>
									<input type="text" value="" id="email" name="email" >

									<label for="phone">Number Phone</label>
									<input type="text" value="" id="phone" name="phone" >

									<label for="comment">Comment</label>
									<textarea name="comment" id="comment"></textarea>

									<input type="submit" name="ok" value="Submit" >
									
								</form>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-info">
								<div class="wrap-map">
									<div class="mercado-google-maps"
										 id="az-google-maps57341d9e51968"
										 data-hue=""
										 data-lightness="1"
										 data-map-style="2"
										 data-saturation="-100"
										 data-modify-coloring="false"
										 data-title_maps="Kute themes"
										 data-phone="088-465 9965 02"
										 data-email="kutethemes@gmail.com"
										 data-address="Z115 TP. Thai Nguyen"
										 data-longitude="-0.120850"
										 data-latitude="51.508742"
										 data-pin-icon=""
										 data-zoom="16"
										 data-map-type="ROADMAP"
										 data-map-height="263">
									</div>
								</div>
								<h2 class="box-title">Contact Detail</h2>
								<div class="wrap-icon-box">

									<div class="icon-box-item">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<div class="right-info">
											<b>Email</b>
											<p>Support1@Mercado.com</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div class="right-info">
											<b>Phone</b>
											<p>0123-465-789-111</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<div class="right-info">
											<b>Mail Office</b>
											<p>Sed ut perspiciatis unde omnis<br />Street Name, Los Angeles</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

			</div><!--end row-->

		</div><!--end container-->

@endsection

@section('frontStyle')
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/animate.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/color-01.css">
@endsection

@section('frontScript')
	<script src="{{ asset('frontend') }}/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
	<script src="{{ asset('frontend') }}/js/chosen.jquery.min.js"></script>
	<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery.sticky.js"></script>
	<script src="{{ asset('frontend') }}/js/functions.js"></script>
@endsection