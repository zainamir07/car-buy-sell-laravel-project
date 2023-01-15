@extends('layout.main')
@section('content')

<div class="container">
	<div class="row">
		{{-- <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6 mt-5"> --}}
    	 <div class="d-flex justify-content-between mb-5 mt-5 pb-5">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h2>{{$user->name}}</h2>
                    <p><strong>Email: </strong> {{$user->email}} </p>
                    <p><strong>Contact: </strong>{{$user->contact}} </p>
                    <p><strong>Address: </strong>{{$user->address}} </p>
                </div>             
                <div class="col-xs-12 col-md-4">
                  <figure>
                      <img src="{{url('Backend/img/undraw_rocket.svg')}}" alt="" class=" img-fluid border-primary rounded-circle" style="width: 150px; border:2px solid red;">
                  </figure>
              </div>

                    <div class="col-xs-12 col-md-4 mt-4">
                      {{-- <h2><strong> {{status($user->status)}} </strong></h2>                     --}}
                      <button class="btn btn-success btn-block">
                        {{-- <span class="fa fa-plus-circle"></span> --}}
                        {{status($user->status)}} </button>
                  </div>
                  <div class="col-xs-12 col-md-4 mt-4">
                      {{-- <h2><strong>-</strong></h2>   --}}
                      <button type="button" class="btn btn-info btn-block profile-button" data-toggle="modal" data-target="#profileModal" data-id="{{session()->get('user_id')}}">
                        {{-- <span class="fa fa-user"></span>  --}}
                        Edit Profile </button>

                      {{-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> Edit Profile </button> --}}
                  </div>
                  <div class="col-xs-12 col-md-4 mt-4">
                      {{-- <h2><strong>2</strong></h2>                     --}}
                      <div class="btn-group dropup btn-block">
                        <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Total Ads </button>
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu text-left" role="menu">
                          <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
                          <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
                          <li class="divider"></li>
                          <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
                          <li class="divider"></li>
                          <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                        </ul>
                      </div>
                  </div>
                </div>             
              </div>             
                {{-- <div class="col-xs-12 col-md-4">
                    <figure>
                        <img src="{{url('Backend/img/undraw_rocket.svg')}}" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div> --}}
            </div>            
            {{-- <div class="row mb-5 mt-2 divider text-center">


            </div> --}}
    	 {{-- </div>                 
		</div>--}}
	</div> 
</div>



 <!-- Edit Profile Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="edit_errList"></div>
            <form action="{{url('profile/update')}}/{{session()->get('user_id')}}" method="post" id="profileUpdateForm" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="user_id" id="user_id">
              <div class="mb-3">
                <label for="user_name" class="form-label">Full Name</label>
                <input type="text"
                class="form-control" name="user_name" id="user_name" aria-describedby="helpId" placeholder="Enter Your Name">
                <small id="helpId" class="form-text text-muted">@error('user_name')
                {{$message}} 
                @enderror
                </small>
              </div>

              <div class="mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email"
                  class="form-control" name="user_email" id="user_email" aria-describedby="helpId" placeholder="Enter Your Email">
                <small id="helpId" class="form-text text-muted">@error('user_email')
                  {{$message}} 
                  @enderror
                </small>
                </div> 

                <div class="mb-3">
                <label for="user_contact" class="form-label">Contact</label>
                <input type="text"
                  class="form-control" name="user_contact" id="user_contact" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">@error('user_contact')
                  {{$message}} 
                  @enderror
                </small>
                </div>    
              
                <div class="mb-3">
                <label for="user_address" class="form-label">Address</label>
                <input type="text"
                  class="form-control" name="user_address" id="user_address" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">@error('user_address')
                  {{$message}} 
                  @enderror
                </small>
                </div>

                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-8 col-12">
                      <label for="user_images" class="form-label">Image</label>
                      <input type="file" name="user_image" id="user_image" class="form-control">
                    </div>
                    <div class="col-md-4 col-12">
                      <img src="{{url('Backend/user_images')}}/{{$user->image}}" style="width:70px;" class="img-fluid" alt="User Image">
                    </div>
                  </div>
                  <small id="helpId" class="form-text text-muted">@error('user_image')
                    {{$message}} 
                    @enderror
                  </small>
                  </div>

              </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary updateProfilebtn">Update</button>
                    </div>
                  </form>
    </div>
  </div>
  </div>

  @endsection