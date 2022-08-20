@extends('layouts.app') 
@section('ftitle') 
	{{ $product->title }} 
@endsection 
@section('content') 
<div class="container">
	<div class="wrap-breadcrumb">
		<ul>
			<li class="item-link"><a href="#" class="link">home</a></li>
			<li class="item-link"><span>detail</span></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
			<div class="wrap-product-detail">
				<div class="detail-media">
					<div class="product-gallery">
						<ul class="slides">
							@php
									$pid = -1;
									foreach($images as $idi)
										$pid = $idi->post_id
									
							@endphp
							@if ($pid >= 0)
									@foreach ($images as $imggallery)
									<li data-thumb="{{ $imggallery->images }}">
										<img style="max-height: 500px" src="{{ $imggallery->images }}" />
									</li>
									@endforeach
							@else
									<li data-thumb="{{ $product->image }}">
										<img src="{{ $product->image }}" alt="product thumbnail" />
									</li>
							@endif

							{{-- <li data-thumb="{{ asset('frontend') }}/images/products/digital_17.jpg">
								<img src="{{ asset('frontend') }}/images/products/digital_17.jpg" alt="product thumbnail" />
							</li> --}}
						</ul>
					</div>
				</div>
				<div class="detail-info">
					<div class="product-rating">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<a href="#" class="count-review">(05 review)</a>
					</div>
					<h2 class="product-name">{{ $product->title }}</h2>
					<div class="short-desc pb-4">
						<ul> {!! $product->sort_description !!} </ul>
					</div>
					{{-- <div class="wrap-social">
						<a class="link-socail" href="#"><img src="{{ asset('frontend') }}/images/social-list.png" alt=""></a>
					</div> --}}
					<div class="stock-info in-stock">
						@if ($product->bit_status == 1)
								<p class="availability">Status: <b>Bid Running</b></p>
						@else
							<p class="availability">Status: <b>Bid Ended</b></p>
						@endif
					</div> 
					<div class="wrap-price"><span class="product-price"><b>Current Prize:</b> ${{ $product->regular_prize }}</span></div>
					
					{{-- <div class="quantity">
						<span>Quantity:</span>
						<div class="quantity-input">
							<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*">
							<a class="btn btn-reduce" href="#"></a>
							<a class="btn btn-increase" href="#"></a>
						</div>
					</div> --}} 
					
					<form action="{{ route('buyer.bidstore', ['slug' => $product->slug]) }}" method="POST"> 
						@csrf 
						<div class="card-body pb-0">
							<div class="form-group">
								<input type="number" min="{{ $product->regular_prize }}+10" class="form-control"
									id="inputbid{{ $product->id }}" name="regular_prize" placeholder="Enter Your Amount">
							</div>
						</div>
						<div class="wrap-butons">
							<button type="submit" class="add-to-cart">Submit</button>
							<div class="wrap-btn">
								<a href="#" class="btn btn-compare">Add Compare</a>
								<a href="#" class="btn btn-wishlist">Add Wishlist</a>
							</div>
					</div>
						<div class="btn-bid mstartbidy-2">
							
						</div>
					</form>
				</div>
				<div class="advance-info">
					<div class="tab-control normal">
						<a href="#description" class="tab-control-item active">description</a>
						<a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
						<a href="#review" class="tab-control-item">Reviews</a>
					</div>
					<div class="tab-contents">
						<div class="tab-content-item active" id="description"> {!! $product->description !!} </div>
						<div class="tab-content-item " id="add_infomation">
							<table class="shop_attributes">
								<tbody>
									<tr>
										<th>Weight</th>
										<td class="product_weight">1 kg</td>
									</tr>
									<tr>
										<th>Dimensions</th>
										<td class="product_dimensions">12 x 15 x 23 cm</td>
									</tr>
									<tr>
										<th>Color</th>
										<td>
											<p>Black, Blue, Grey, Violet, Yellow</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-content-item " id="review">
							<div class="wrap-review-form">
								<div id="comments">
									<h2 class="woocommerce-Reviews-title">01 review for <span>Radiant-360 R6 Chainsaw Omnidirectional
											[Orage]</span></h2>
									<ol class="commentlist">
										<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
											id="li-comment-20">
											<div id="comment-20" class="comment_container">
												<img alt="" src="{{ asset('frontend') }}/images/author-avata.jpg" height="80" width="80">
												<div class="comment-text">
													<div class="star-rating">
														<span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
													</div>
													<p class="meta">
														<strong class="woocommerce-review__author">admin</strong>
														<span class="woocommerce-review__dash">–</span>
														<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00">Tue, Aug 15,
															2017</time>
													</p>
													<div class="description">
														<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
															egestas.</p>
													</div>
												</div>
											</div>
										</li>
									</ol>
								</div><!-- #comments -->
								<div id="review_form_wrapper">
									<div id="review_form">
										<div id="respond" class="comment-respond">
											<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
												<p class="comment-notes">
													<span id="email-notes">Your email address will not be published.</span> Required fields are
													marked <span class="required">*</span>
												</p>
												<div class="comment-form-rating">
													<span>Your rating</span>
													<p class="stars">
														<label for="rated-1"></label>
														<input type="radio" id="rated-1" name="rating" value="1">
														<label for="rated-2"></label>
														<input type="radio" id="rated-2" name="rating" value="2">
														<label for="rated-3"></label>
														<input type="radio" id="rated-3" name="rating" value="3">
														<label for="rated-4"></label>
														<input type="radio" id="rated-4" name="rating" value="4">
														<label for="rated-5"></label>
														<input type="radio" id="rated-5" name="rating" value="5" checked="checked">
													</p>
												</div>
												<p class="comment-form-author">
													<label for="author">Name <span class="required">*</span></label>
													<input id="author" name="author" type="text" value="">
												</p>
												<p class="comment-form-email">
													<label for="email">Email <span class="required">*</span></label>
													<input id="email" name="email" type="email" value="">
												</p>
												<p class="comment-form-comment">
													<label for="comment">Your review <span class="required">*</span>
													</label>
													<textarea id="comment" name="comment" cols="45" rows="8"></textarea>
												</p>
												<p class="form-submit">
													<input name="submit" type="submit" id="submit" class="submit" value="Submit">
												</p>
											</form>
										</div><!-- .comment-respond-->
									</div><!-- #review_form -->
								</div><!-- #review_form_wrapper -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end main products area-->
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
			<div class="widget widget-our-services ">
				<div class="widget-content">
					<ul class="our-services">
						<li class="service">
							<a class="link-to-service" href="#">
								<i class="fa fa-truck" aria-hidden="true"></i>
								<div class="right-content">
									<b class="title">Free Shipping</b>
									<span class="subtitle">On Oder Over $99</span>
									<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
								</div>
							</a>
						</li>
						<li class="service">
							<a class="link-to-service" href="#">
								<i class="fa fa-gift" aria-hidden="true"></i>
								<div class="right-content">
									<b class="title">Special Offer</b>
									<span class="subtitle">Get a gift!</span>
									<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
								</div>
							</a>
						</li>
						<li class="service">
							<a class="link-to-service" href="#">
								<i class="fa fa-reply" aria-hidden="true"></i>
								<div class="right-content">
									<b class="title">Order Return</b>
									<span class="subtitle">Return within 7 days</span>
									<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div><!-- Categories widget-->
			<div class="widget mercado-widget widget-product">
				<h2 class="widget-title">Popular Products</h2>
				<div class="widget-content">
					<ul class="products">
						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('frontend') }}/images/products/digital_01.jpg" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('frontend') }}/images/products/digital_17.jpg" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('frontend') }}/images/products/digital_18.jpg" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>
						<li class="product-item">
							<div class="product product-widget-style">
								<div class="thumbnnail">
									<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
										<figure><img src="{{ asset('frontend') }}/images/products/digital_20.jpg" alt=""></figure>
									</a>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
									<div class="wrap-price"><span class="product-price">$168.00</span></div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--end sitebar-->
		<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="wrap-show-advance-info-box style-1 box-in-site">
				<h3 class="title-box">Related Products</h3>
				<div class="wrap-products">
					<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false"
						data-nav="true" data-dots="false"
						data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
						@foreach ($products as $post) <div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="{{ route('buyer.showproduct', ['slug' => $post->slug]) }}" title="{{ $post->title }}">
									<figure><img src="{{ $post->image }}" width="800" height="800"
											alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item new-label"> @if ( date('Y-m-d') >= $post->start_date && date('Y-m-d') <=
											$post->end_date )Bid Running @else Bid Ended @endif</span>
								</div>
								<div class="wrap-btn">
									<a href="{{ route('buyer.showproduct', ['slug' => $post->slug]) }}" class="function-link">quick
										view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="{{ route('buyer.showproduct', ['slug' => $post->slug]) }}" class="product-name"><span>{{
										$post->title }}</span></a>
								<div class="wrap-price"><span class="product-price">${{ $post->regular_prize }}</span></div> 
								@if($post->end_date) <h5>{{ $post->end_date }}</h5> @endif 
								<a href="{{ route('buyer.bidcategory', ['slug' => $post->slug]) }}" class="btn btn-success text-center"
									target="_blank" rel="noopener noreferrer">Bid Now</a>
							</div>
						</div> @endforeach {{-- <div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
									<figure><img src="{{ asset('frontend') }}/images/products/digital_04.jpg" width="214" height="214"
											alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
								</a>
								<div class="group-flash">
									<span class="flash-item new-label">new</span>
								</div>
								<div class="wrap-btn">
									<a href="#" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
										[White]</span></a>
								<div class="wrap-price"><span class="product-price">$250.00</span></div>
							</div>
						</div> --}} </div>
				</div>
				<!--End wrap-products-->
			</div>
		</div>
	</div>
	<!--end row-->
</div>
<!--end container--> @endsection @section('frontStyle')
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/images/favicon.ico">
<link
	href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
	rel="stylesheet">
<link
	href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
	rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/animate.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/flexslider.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/chosen.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/color-01.css"> @endsection
@section('frontScript') <script src="{{ asset('frontend') }}/js/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
<script src="{{ asset('frontend') }}/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4"></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.flexslider.js"></script>
<script src="{{ asset('frontend') }}/js/chosen.jquery.min.js"></script>
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.sticky.js"></script>
<script src="{{ asset('frontend') }}/js/functions.js"></script> @endsection