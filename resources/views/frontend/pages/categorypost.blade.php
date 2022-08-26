@extends('layouts.app')

@section('ftitle')
		Online Auction
@endsection

@section('content')

	<div id="carouselExampleCaptions" class="carousel slide mb-3" data-bs-ride="carousel">
		<div class="carousel-indicators d-none">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
			@foreach ($slidebid as $fst)
				<img src="{{ $fst->image }}" class="d-block w-100" style="max-height: 480px" alt="Slide-01">
				<div class="carousel-caption d-none d-md-block">
					<h3>{{ $fst->title }}</h3>
					<p class="subtitle">{{ $fst->sort_description }}</p>
					<p class="sale-info">Price: <span class="price">${{ $fst->regular_prize }}</span></p>
					<a href="#" class="btn btn-primary">Bid Now</a>
				</div>
				@endforeach
			</div>
			<div class="carousel-item">
				@foreach ($slidebid1 as $snd)
				<img src="{{ $snd->image }}" class="d-block w-100" style="max-height: 480px" alt="Slide-02">
				<div class="carousel-caption d-none d-md-block">
					<h3>{{ $snd->title }}</h3>
					<p class="subtitle">{{ $snd->sort_description }}</p>
					<p class="sale-info">Price: <span class="price">${{ $snd->regular_prize }}</span></p>
					<a href="#" class="btn btn-success">Bid Now</a>
				</div>
				@endforeach
			</div>
			<div class="carousel-item">
				@foreach ($slidebid2 as $trd)
				<img src="{{ $trd->image }}" class="d-block w-100" style="max-height: 480px" alt="Slid3-03">
				<div class="carousel-caption d-none d-md-block">
					<h3>{{ $trd->title }}</h3>
					<p class="subtitle">{{ $trd->sort_description }}</p>
					<p class="sale-info">Price: <span class="price">${{ $trd->regular_prize }}</span></p>
					<a href="#" class="btn btn-info">Bid Now</a>
				</div>
				@endforeach
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon d-none" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon d-none" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

		<div class="container">
			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="row">
					<div class="col-6 dfix">
						@foreach ($fstbidigngpost as $it)
						<div class="banner-item1" style="background-image: url('{{ $it->image }}');background-repeat: no-repeat;background-position: center; background-size: cover;height:200px;">
							<h4 class="text-black">{{ $it->title }}</h4>
							<h4 class="text-black">Current Prize : <i class="fa-solid fa-dollar-sign"></i> {{ $it->regular_prize }}</h4>
							@if ($it->end_date)
									<h5>{{ $it->end_date }}</h5>
							@endif
							<a href="#" class="btn btn-success">Bid Now</a>
						</div>
				@endforeach
					</div>
					<div class="col-6 dfix">
						@foreach ($scdbidigngpost as $it1)
						<div class="banner-item1" style="background-image: url('{{ $it1->image }}');background-repeat: no-repeat;background-position: center; background-size: cover;height:200px;">
							<h4 class="text-black">{{ $it1->title }}</h4>
							<h4 class="text-black">Current Prize : <i class="fa-solid fa-dollar-sign"></i>{{ $it1->regular_prize }}</h4>
							@if ($it1->end_date)
									<h5>{{ $it1->end_date }}</h5>
							@endif
							<a href="#" class="btn btn-success float-left">Bid Now</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box" style="padding: 30px 20px !important; font-size:28px;">Product Categories</h3>
				{{-- <div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="{{ asset('frontend') }}/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div> --}}
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control text-center">
							@foreach ($categories as $cat)
									<a href="{{ route('buyer.showcategory', ['slug' => $cat->slug]) }}" class="btn btn-primary mx-1 my-4">{{ $cat->name }}</a>
							{{-- <a href="#fashion_1a" class="tab-control-item active">Smartphone</a> --}}
							@endforeach
						</div>
						<div class="tab-contents">
							
							<div class="tab-content-item active" id="fashion_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
								
									@foreach ($products as $post)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{ route('buyer.showproduct', ['slug' => $post->slug]) }}" title="{{ $post->title }}">
												<figure><img src="{{ $post->image }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
													<span class="flash-item new-label"> @if ( date('Y-m-d') >= $post->start_date && date('Y-m-d') <= $post->end_date )Bid Running @else Bid Ended @endif</span>
											</div>
											<div class="wrap-btn">
												<a href="{{ route('buyer.showproduct', ['slug' => $post->slug]) }}" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="{{ route('buyer.showproduct', ['slug' => $post->slug]) }}" class="product-name"><span>{{ $post->title }}</span></a>
											<div class="wrap-price"><span class="product-price">${{ $post->regular_prize }}</span></div>
											@if ($post->end_date)
												<h5>{{ $post->end_date }}</h5>
											@endif
											<a href="{{ route('buyer.bidcategory', ['slug' => $post->slug]) }}" class="btn btn-success text-center" target="_blank" rel="noopener noreferrer">Bid Now</a>
										</div>
									</div>
									@endforeach	



								</div>
							</div>
							{{-- <div class="tab-content-item" id="fashion_1b">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('frontend') }}/images/products/fashion_03.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item bestseller-label">Bestseller</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
											<div class="wrap-price"><span class="product-price">$250.00</span></div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-content-item" id="fashion_1c">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('frontend') }}/images/products/fashion_02.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
											<div class="wrap-price"><span class="product-price">$250.00</span></div>
										</div>
									</div>

								</div>
							</div>

							<div class="tab-content-item" id="fashion_1d">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('frontend') }}/images/products/fashion_05.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
											<div class="product-rating">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
											<div class="wrap-price"><span class="product-price">$250.00</span></div>
										</div>
									</div>

								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</div>

			<!--Latest Products-->
			{{-- <div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box"  style="padding: 30px 20px !important; font-size:28px;">Latest Products</h3>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="row mx-2">
									@foreach ($allbidpost as $bidpost)
									<div class="col-4 my-2">
										<div class="product product-style-2 equal-elem" style="box-shadow: 1px 2px 5px">
											<div class="product-thumnail">
												<a href="{{ route('buyer.showproduct', ['slug' => $bidpost->slug]) }}" title="{{ $bidpost->title }}">
													<figure><img style="max-height: 262px !important" src="{{ $bidpost->image }}" width="800" max-height="800" alt="{{ $bidpost->title }}"></figure>
												</a>
												<div class="group-flash">
													<span class="flash-item new-label">new</span>
												</div>
												<div class="wrap-btn">
													<a href="{{ route('buyer.showproduct', ['slug' => $bidpost->slug]) }}" class="function-link">quick view</a>
												</div>
											</div>
											<div class="product-info bg-secondary text-white">
												<a href="{{ route('buyer.showproduct', ['slug' => $bidpost->slug]) }}" class="product-name"><span class="text-white" style="font-size: 16px">{{ $bidpost->title }}</span></a>
												<div class="card card-primary bg-info p-3 mt-2">
													<form action="{{ route('buyer.bidstore', ['slug' => $bidpost->slug]) }}" method="POST">
        										@csrf
														<div class="card-body pb-0">
															<div class="form-group">
																<input type="number" min="{{ $bidpost->regular_prize }}+10" class="form-control" id="inputbid{{ $bidpost->id }}" name="regular_prize" placeholder="Enter Your Amount">
															</div>
														</div>
														<div class="btn-bid d-flex justify-content-between mstartbidy-2">
															<b class="wrap-price"><span style="font-size: 22px" class="product-price text-black">Current Prize : ${{ $bidpost->regular_prize }}</span></b>
															
															<button type="submit" class="btn btn-success text-white">Bid Now</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									</div>
							</div>							
						</div>
					</div>
				</div>
			</div> --}}

			<!--On Sale-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">On Biding</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

					@foreach ($allbid as $bp)
							<div class="product product-style-2 equal-elem bbox">
						<div class="product-thumnail">
							<a href="{{ route('buyer.showproduct', ['slug' => $bp->slug]) }}" title="{{ $bp->title }}">
								<figure><img src="{{ $bp->image }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">{{ $bp->stock_status }}</span>
							</div>
							<div class="wrap-btn">
								<a href="{{ route('buyer.showproduct', ['slug' => $bp->slug]) }}" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="{{ route('buyer.showproduct', ['slug' => $bp->slug]) }}" class="product-name"><span>{{ $bp->title }}</span></a>
							<div class="wrap-price"><span class="product-price">Current Prize : <i class="fa-solid fa-dollar-sign"></i> {{ $bp->regular_prize }}</span></div>
							@if ($bp->end_date)
								<h5>{{ $bp->end_date }}</h5>
							@endif
							<a href="#" class="btn btn-success text-center" target="_blank" rel="noopener noreferrer">Bid Now</a>
						</div>
					</div>
					@endforeach

					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{ asset('frontend') }}/images/products/kidtoy_05.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
							<div class="wrap-btn">
								<a href="#" class="function-link">quick view</a>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
							<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
						</div>
					</div>

				</div>
			</div>
			

		</div>
@endsection


{{-- Page style --}}

@section('frontStyle')
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/animate.css">
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/font-awesome.min.css"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/color-01.css">
@endsection

{{-- Page Script --}}

@section('frontScript')
	<script src="{{ asset('frontend') }}/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{ asset('frontend') }}/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery.flexslider.js"></script>
	<script src="{{ asset('frontend') }}/js/chosen.jquery.min.js"></script>
	<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
	<script src="{{ asset('frontend') }}/js/jquery.sticky.js"></script>
	<script src="{{ asset('frontend') }}/js/functions.js"></script>
	<script>
		let poppup = document.getElementById('popup');
			function openPopUp48() {
				//poppup.css('display':'none');
				document.querySelector(".popup").css('display':'none');
			}
	</script>
@endsection

