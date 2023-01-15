@extends('layout.main')

@section('content')

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
			{{-- <div id="login-msg" class="alert alert-info text-dark d-flex justify-content-between align-item-center "></div> --}}
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy, Sell & Rent Your Cars</h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>

					<!-- Advance Search -->
				<div class="advance-search">
					<form action="{{route('ads')}}" method="GET">
						<div class="row">
							<!-- Store Search -->
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="location" name="location" placeholder="Search By Location (Islamabad)">
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" name="search" placeholder="Search By Car Model and Brand Name">
									<!-- Search Button -->
									<button class="btn btn-main">SEARCH</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>
				
					{{-- <div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href=""><i class="fa fa-bed"></i> Hotel</a></li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-grav"></i> Fitness</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-car"></i> Cars</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-cutlery"></i> Restaurants</a>
							</li>
							<li class="list-inline-item">
								<a href=""><i class="fa fa-coffee"></i> Cafe</a>
							</li>
						</ul>
					</div> --}}
					
				</div>

				<div class="short-popular-category-list text-center">
					<h2>Popular Category</h2>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href=""><i class="fa fa-bed"></i> Hotel</a></li>
						<li class="list-inline-item">
							<a href=""><i class="fa fa-grav"></i> Fitness</a>
						</li>
						<li class="list-inline-item">
							<a href=""><i class="fa fa-car"></i> Cars</a>
						</li>
						<li class="list-inline-item">
							<a href=""><i class="fa fa-cutlery"></i> Restaurants</a>
						</li>
						<li class="list-inline-item">
							<a href=""><i class="fa fa-coffee"></i> Cafe</a>
						</li>
					</ul>
				</div>
				{{-- <!-- Advance Search -->
				<div class="advance-search">
					<form action="#">
						<div class="row">
							<!-- Store Search -->
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Search for store">
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Search for store">
									<!-- Search Button -->
									<button class="btn btn-main">SEARCH</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>
				 --}}
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Trending Ads</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
				</div>
			</div>
		</div>
					
	<div class="row">
		@foreach ($ads as $list)
		<div class="col-sm-12 col-lg-3 col-md-3">
				
			<div class="product-item bg-light">
				<div class="card p-2">
			<div class="thumb-content border m-1 text-center">
				<a href="{{url('used-cars')}}/{{$list->listing_slug}}">
					<img class="card-img-top img-fluid p-2" src="{{url( Custom::listingImagePath($list->listing_id) )}}" alt="Card image cap" style="width: auto;height: 145px;">
				</a>
			</div>
			<div class="card-body p-2 mt-3 mb-1">
				<h4 class="card-title small-title"><a href="">
					{{Custom::carModelName($list->listing_car_model)}} {{$list->listing_model_year}}</a></h4>
				<ul class="list-inline product-meta">
					<li class="list-inline-item">
						<a href=""><i class="fa fa-money"></i>PKR: {{$list->listing_car_price}}</a>
					</li>
					<li class="list-inline-item">
						<a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>{{Custom::cityName($list->listing_city)}}</a>
					</li>
				</ul>
			</div>
				<a href="{{url('used-cars')}}/{{$list->listing_slug}}" class="btn btn-outline-dark">View Details</a>
		</div>
	</div>
</div>
	@endforeach
</div>

<div class="container text-center mt-4 mb-4">
	<a href="{{route('ads')}}" class="btn btn-outline-dark">View All</a>
</div> 
</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

  @endsection