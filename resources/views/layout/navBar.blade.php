<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg  navigation">
					<a class="navbar-brand" href="{{url('/')}}">
						<img src="{{url('Frontend/images/logo.png')}}" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="{{url('/')}}">Home</a>
							</li>
						
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{route('ads')}}">New Ads</a>
									<a class="dropdown-item" href="#">Sell Cars</a>
									<a class="dropdown-item" href="#">Rent Cars</a>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								@if (session()->has('user_id'))
								<li class="nav-item">
								@if (session()->get('user_id') == 1)
								<a href="{{route('admin')}}" class="nav-link login-button">Dashboard</a>
								@else	
								<li class="nav-item dropdown dropdown-slide">
									<a class="nav-link dropdown-toggle login-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Welcome! {{session()->get('user_name')}}
										<span><i class="fa fa-angle-down"></i></span>
									</a>
									<!-- Dropdown list -->
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="{{route('profile')}}">Profile</a>
										<a class="dropdown-item" href="{{route('myAds')}}">My Ads</a>
										<a href="Javascript:;" type="button" class="nav-link " data-toggle="modal" data-target="#passwordModal">Change Password </a>
										{{-- <a class="dropdown-item" href="{{route('changePassword')}}">Change Password</a> --}}
									</div>
								</li>
								@endif
							</li>
							<li class="nav-item">
							<a class="nav-link login-button" href="{{route('logout')}}">Logout</a>
							</li>
							@else
							<li class="nav-item">								
							<button type="button" class="nav-link login-button loginform-button" data-toggle="modal" data-target="#loginModal">Login </button>
							</li>
							<li class="nav-item">								
							<button type="button" class="nav-link login-button register-modal-btn btn-dark" data-toggle="modal" data-target="#registerModal">Register </button>
							</li>
							
							@endif
							<li class="nav-item">
								<a class="nav-link nav-link add-button" href="{{route('userCarAd')}}"><i class="fa fa-plus-circle"></i>
									Add Listing 
								</a>
								<!-- Dropdown list -->
								{{-- <div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{route('userCarAd')}}">Sell My Car</a>
									<a class="dropdown-item" href="{{route('userCarAd')}}">Rent My Car</a>
								</div> --}}
							</li>

						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>