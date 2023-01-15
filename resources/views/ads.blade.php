@extends('layout.main')
@section('content')
    

<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form>
						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" class="form-control" id="inputtext4" placeholder="What are you looking for">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control" id="inputCategory4" placeholder="Category">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control" id="inputLocation4" placeholder="Location">
							</div>
							<div class="form-group col-md-2">
								
								<button type="submit" class="btn btn-primary">Search Now</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2> @if ($search != "")
						Search: {{'('. ($search). ')'}}  
						@else
						Explore All Ads
					@endif  
				</h2>
					<p>123 Results on 12 December, 2017</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
	<h4 class="widget-header">All Category</h4>
	<ul class="category-list">
		<form action="{{url('ads')}}" method="get"  data-aos="fade-up" data-aos-delay="200">
		@csrf
		{{-- @foreach ($categories as $category)
		<li><a href="#" value="{{$category->category_id}}" class="category_filter" name="category_filter" id="category_filter" onclick='this.form.submit()'>{{$category->category_name}} 
			<span>{{Custom::totalCategoryListings($category->category_id)}}</span>
		</a></li>
		@endforeach --}}
	</form>
	</ul>
</div>

<div class="widget category-list">
	<h4 class="widget-header">Nearby</h4>
	<ul class="category-list">
		<li><a href="category.html">New York <span>93</span></a></li>
		<li><a href="category.html">New Jersy <span>233</span></a></li>
		<li><a href="category.html">Florida  <span>183</span></a></li>
		<li><a href="category.html">California <span>120</span></a></li>
		<li><a href="category.html">Texas <span>40</span></a></li>
		<li><a href="category.html">Alaska <span>81</span></a></li>
	</ul>
</div>

<div class="widget filter">
	<h4 class="widget-header">Show Produts</h4>
	<select>
		<option>Popularity</option>
		<option value="1">Top rated</option>
		<option value="2">Lowest Price</option>
		<option value="4">Highest Price</option>
	</select>
</div>

<div class="widget price-range">
	<h4 class="widget-header">Price Range</h4>
	<div class="block">
		<b>$10</b>
		<input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
		<b>$5000</b>
	</div>
</div>

<div class="widget product-shorting">
	<h4 class="widget-header">By Condition</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Brand New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Almost New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Gently New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Havely New
	  </label>
	</div>
</div>

				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<form
							action="{{url('ads')}}" method="get"
							class="narrow-w form-search d-flex align-items-stretch mb-3"
							data-aos="fade-up"
							data-aos-delay="200"
							>
							@csrf
							<strong>Sort</strong>
							<select class="category_filter" name="category_filter" id="category_filter" onchange='this.form.submit()'>
							<option value="">All</option>
							{{-- @foreach ($categories as $category)
							<option value="{{$category->category_id}}" @if ($search != "" && $search == $category->category_id)
								{{'selected'}}
							@endif>{{$category->category_name}}</option>
							@endforeach --}}
						</select>
							{{-- <button type="submit" class="btn btn-primary">Search</button> --}}
						  </form>

							{{-- <form action="{{route('ads')}}" method="get">
								@csrf
								
							</form> --}}
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">

                        @foreach ($ads as $list)
						<div class="col-sm-12 col-lg-4 col-md-4">
							<!-- product card -->
                                
                            <div class="product-item bg-light">
                                <div class="card">
                            <div class="thumb-content">
                                <!-- <div class="price">$200</div> -->
                                <a href="{{url('used-cars')}}/{{$list->listing_slug}}">
                                    <img class="img-responsive" src="{{url( Custom::listingImagePath($list->listing_id) )}}" alt="Card image cap" width="100%" height="200px">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title small-title"><a href="">{{Custom::carModelName($list->listing_car_model)}} {{$list->listing_model_year}}...</a></h4>
                                <ul class="list-inline product-meta">
                                    <li class="list-inline-item">
                                        <a href=""><i class="fa fa-money"></i>PKR: {{$list->listing_car_price}}</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><i class="fa fa-map-marker" aria-hidden="true"></i>{{Custom::cityName($list->listing_city)}}</a>
                                    </li>
                                </ul>
                                {{-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p> --}}
                                {{-- <div class="product-ratings">
                                    <ul class="list-inline">
                                        <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    </ul>
                                </div> --}}
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
				</div>
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection