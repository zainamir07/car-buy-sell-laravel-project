@extends('layout.main')

@section('content')
<style>
    .list-img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox; 
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

/*# sourceMappingURL=style.css.map */
</style>

<div class="container mb-5">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="container">
                {{-- @foreach ($features as $feature)
                {{$feature}}
                    @endforeach --}}
                </div>
                <div class="preview col-md-6">
                    {{-- <img class="d-block w-100" src="{{url('Backend/listing_images')}}/{{$image->images_path}}" /> --}}
                   

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        @foreach($images as $key => $image)
                        <div class="{{$key == 0 ? 'active' : '' }} carousel-item" >
                            <img src="{{url('Backend/listing_images')}}/{{$image->images_path}}" class="img-fluid" alt="slider-listing" >
                        </div>       
                      @endforeach
                      
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                   
                    
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{-- {{Custom::carCompanyName($list->listing_company_name)}}  --}}
                        {{Custom::carModelName($list->listing_car_model)}} {{$list->listing_model_year}}</h3>
                    {{-- <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div> --}}
                    <p class="product-description">{{$list->listing_car_description}}</p>
                    <h4 class="price">Rs: <span>{{$list->listing_car_price}}</span></h4>
                    <p class="price"><strong>Mileage: </strong><span>{{$list->listing_car_mileage}}</span></p>
                    <h5 class="">{{$list->listing_car_assembly}} - {{$list->listing_car_transmission}}  
                       
                    </h5>
                    <h5 class="">Color:
                       <span>{{$list->listing_exterior_color}}</span>
                    </h5>
                    <h5 class="">Contact:
                      <span>{{$list->listing_car_contact}}</span>
                   </h5>
                   <h5 class="">WhatsApp:
                    <span>{{$list->listing_car_whatsApp}}</span>
                   </h5>
                    <div class="action">
                        {{-- <button class="add-to-cart btn" type="button">Send Message</button> --}}
                        {{-- <button class="like btn btn-default" type="button"><span class="fa fa-whatsApp"></span></button> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="container">
              <div class="row">
                <div class="col-md-10 m-auto">
                  <h5>Features</h5>
                  
                  <table class="table">
                    <thead>
                      
                      @foreach ($features as $feature)
                      <tr>
                        @if($feature->abs != "" || $feature->abs != NULL)
                        <th scope="row">AbS</th>
                        @endif
                        @if($feature->airBags != "" || $feature->airBags != NULL)
                        <th scope="row">Air Bags</th>
                        @endif 
                        @if($feature->airConditioning != "" || $feature->airConditioning != NULL)
                        <th scope="row">Air Conditioning</th>
                        @endif 
                        @if($feature->alloyRims != "" || $feature->alloyRims != NULL)
                        <th scope="row">Alloy Rims</th>
                        @endif 
                        @if($feature->fmRadio != "" || $feature->fmRadio != NULL)
                        <th scope="row">FM Radio</th>
                        @endif 
                        @if($feature->cdPlayer != "" || $feature->cdPlayer != NULL)
                        <th scope="row">CD Player</th>
                        @endif 
                        @if($feature->cassettePlayer != "" || $feature->cassettePlayer != NULL)
                        <th scope="row">Cassette Player</th>
                        @endif 
                        @if($feature->coolBox != "" || $feature->coolBox != NULL)
                        <th scope="row">Cool Box</th>
                        @endif 
                        @if($feature->cruiseControl != "" || $feature->cruiseControl != NULL)
                        <th scope="row">Cruise Control</th>
                        @endif 
                        @if($feature->climateControl != "" || $feature->climateControl != NULL)
                        <th scope="row">Climate Control</th>
                        @endif 
                        @if($feature->dvdPlayer != "" || $feature->dvdPlayer != NULL)
                        <th scope="row">DVD Player</th>
                        @endif 
                        @if($feature->frontSpeakers != "" || $feature->frontSpeakers != NULL)
                        <th scope="row">Front Speakers</th>
                        @endif 
                        @if($feature->frontCamera != "" || $feature->frontCamera != NULL)
                        <th scope="row">Front Camera</th>
                        @endif 
                        @if($feature->heatedSeats != "" || $feature->heatedSeats != NULL)
                        <th scope="row">Heated Seats</th>
                        @endif 
                        @if($feature->immobilizerKey != "" || $feature->immobilizerKey != NULL)
                        <th scope="row">Immobilizer Key</th>
                        @endif 
                        @if($feature->keylessEntry != "" || $feature->keylessEntry != NULL)
                        <th scope="row">Keyless Entry</th>
                        @endif 
                        @if($feature->navigationSystem != "" || $feature->navigationSystem != NULL)
                        <th scope="row">Navigation System</th>
                        @endif 
                        @if($feature->powerLocks != "" || $feature->powerLocks != NULL)
                        <th scope="row">Power Locks</th>
                        @endif 
                        @if($feature->powerMirrors != "" || $feature->powerMirrors != NULL)
                        <th scope="row">Power Mirrors</th>
                        @endif 
                        @if($feature->powerSteering != "" || $feature->powerSteering != NULL)
                        <th scope="row">Power Steering</th>
                        @endif 
                        @if($feature->powerWindows != "" || $feature->powerWindows != NULL)
                        <th scope="row">Power Windows</th>
                        @endif 
                        @if($feature->rearSeatEntertainment != "" || $feature->rearSeatEntertainment != NULL)
                        <th scope="row">Rear Seat Entertainment</th>
                        @endif 
                        @if($feature->rearAcVents != "" || $feature->rearAcVents != NULL)
                        <th scope="row">Rear Ac Vents</th>
                        @endif 
                        @if($feature->rearSpeakers != "" || $feature->rearSpeakers != NULL)
                        <th scope="row">Rear Speakers</th>
                        @endif 
                        @if($feature->rearCamera != "" || $feature->rearCamera != NULL)
                        <th scope="row">Rear Camera</th>
                        @endif 
                        @if($feature->sunRoof != "" || $feature->sunRoof != NULL)
                        <th scope="row">Sun Roof</th>
                        @endif 
                        @if($feature->steeringSwitches != "" || $feature->steeringSwitches != NULL)
                        <th scope="row">Steering Switches</th>
                        @endif
                        @if($feature->USBCable != "" || $feature->USBCable != NULL)
                        <th scope="row">USB Cable</th>
                        @endif 
                    
                      </tr>
                      @endforeach
                    </thead>
                    <tbody>
                    
                    </tbody>
                  </table>


                </div>
              </div>
            </div>
          @endsection