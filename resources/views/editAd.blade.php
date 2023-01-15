@extends('layout.main')
@section('content')

<div class="container mt-4">
  <h2>Edit Your Ad</h2>
  <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto nemo totam commodi, dolorem quia quaerat mollitia sint nulla recusandae quam!</p>
         <div class="container-fluid ">
            {{-- {{Custom::slug('New Honda Civic')}} --}}
          <form action="{{url('carAd/update')}}/{{$listing->listing_id}}" method="post" enctype="multipart/form-data">
              @csrf
      <div class="row section_1 bg-light pt-4 pb-4 rounded">      
          <div class="mb-3 col-md-6">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control">
              <option value="Select The Category"></option>
                <option value="S" @if ($listing->listing_car_category == 'S') selected @endif >Sell</option>
                <option value="R" @if ($listing->listing_car_category == 'R') selected @endif>Rent</option>
            </select>
            <small id="helpId" class="form-text text-danger">@error('category')
                {{$message}}
            @enderror</small>
          </div>            
          <div class="mb-3 col-md-6 form-group">
              {{-- <div class=" mb-3"> --}}
                  <label for="city">City</label>
                  <select name="city" id="city" class="form-control" value="{{old('city')}}">
                      <option value="">Select The City</option>
                    @foreach ($cities as $city)
                      <option value="{{$city->id}}"  @if ($listing->listing_city == $city->id) selected @endif >{{$city->city}}</option>
                      @endforeach
                    </select>
                  <small id="helpId" class="form-text text-danger">@error('city')
                      {{$message}}
                  @enderror</small>
              {{-- </div> --}}
          </div>

          <div class="mb-3 col-md-6">
              
              <label for="model_year" class="form-label">Car Model Year</label>
              <select id="model_year" name="model_year" class="form-control" value="{{old('model_year')}}">
                  @php $years = range(date('Y'), 1940);  @endphp
                  <option>Select Year</option>
                  @foreach ($years as $year)
                <option value="{{$year}}" @if ($listing->listing_model_year == $year) selected @endif>{{$year}}</option>
                @endforeach
            </select>
              <small id="helpId" class="form-text text-danger">@error('model_year')
                  {{$message}}
              @enderror</small>
            </div>

            <div class="mb-3 col-md-6">
              <label for="company_name" class="form-label">Car Company Name</label>
             <select name="company_name" id="company_name" class="form-control" value="{{old('company_name')}}">
              <option value="">Select Car Company</option>
              @foreach ($company as $comp)
              <option value="{{$comp->brand_id}}" @if ($listing->listing_company_name == $comp->brand_id) selected @endif>{{$comp->brand_name}}</option>
              @endforeach
             </select>
              <small id="helpId" class="form-text text-danger">@error('company_name')
                  {{$message}}
              @enderror</small>
            </div>

            <div class="mb-3 col-md-6 model_name_div">
              <label for="model_name" class="form-label">Car Model Name</label>
             <select name="model_name" id="model_name" class="form-control">
              <option value="">Select Car Model</option>
              <option value="{{$listing->listing_car_model}}" selected>{{Custom::carModelName($listing->listing_car_model)}}</option>
             </select>
              <small id="helpId" class="form-text text-danger">@error('model_name')
                  {{$message}}
              @enderror</small>
            </div>

            <div class="mb-3 col-md-6">
              <label for="car_condition" class="form-label">Registered in:</label>
             <select name="registered" class="form-control" id="registered" value="{{old('registered')}}">
              <option value="">Select...</option>
              <optgroup label="Registered in:">
                <option value="Unregistered"  @if ($listing->listing_register_province == 'Unregistered') selected @endif>Unregistered</option>
              </optgroup>
              <optgroup label="Provinces">
                <option value="Punjab"  @if ($listing->listing_register_province == 'Punjab') selected @endif>Punjab</option>
                <option value="Sindh"  @if ($listing->listing_register_province == 'Sindh') selected @endif>Sindh</option>
              </optgroup>
              <optgroup label="Popular Cities">
                @foreach ($cities as $city)
                <option value="{{$city->id}}"  @if ($listing->listing_register_province == $city->id) selected @endif>{{$city->city}}</option>
                @endforeach
              </optgroup>
             </select>
              <small id="helpId" class="form-text text-danger">@error('registered')
                {{$message}} 
                @enderror
              </small>
            </div>    

            <div class="mb-3 col-md-6">
              <label for="exteriorColor" class="form-label">Exterior Color</label>
              <select name="exteriorColor" id="exteriorColor" class="form-control" value="{{old('exteriorColor')}}">
                <option value="">Select The Exterior Color</option>
                @foreach ($colors as $color)
                <option value="{{$color->color_id}}"  @if ($listing->listing_exterior_color == $color->color_id) selected @endif>{{$color->color_name}}</option>
                @endforeach
              </select>
              <small id="helpId" class="form-text text-danger">@error('exteriorColor')
                {{$message}} 
                @enderror
              </small>
            </div> 

            <div class="mb-3 col-md-6">
              <label for="mileage" class="form-label">Mileage (km)</label>
             <input type="text" class="form-control" name="mileage" id="mileage" value="{{$listing->listing_car_mileage}}">
              <small id="helpId" class="form-text text-danger">@error('mileage')
                {{$message}} 
                @enderror
              </small>
            </div> 

            <div class="mb-3 col-md-6">
              <label for="price" class="form-label">Price (PKR)</label>
             <input type="text" class="form-control" name="price" id="price" value="{{$listing->listing_car_price}}">
              <small id="helpId" class="form-text text-danger">@error('price')
                {{$message}} 
                @enderror
              </small>
            </div> 

          </div> <!-- Section_1 End -->

         

          <div class="row mt-2 bg-light pt-4 mt-4 pb-4 rounded">
            <div class="mb-3 col-md-12">
              <label for="description" class="form-label">Ad Description</label>
             <textarea class="form-control" name="description" id="description" cols="30" rows="20" >{{$listing->listing_car_description}}</textarea>
              <small id="helpId" class="form-text text-danger">@error('description')
                {{$message}} 
                @enderror
              </small>
            </div> 
          </div> 

          <div class="row mt-2 bg-light pt-4 mt-4 pb-4 rounded">
            <div class="container mt-2 mb-3">
              <h3>Additional Information</h3>
            </div>
            <div class="mb-3 col-md-6">
              <label for="price" class="form-label">Engine Type</label>
              <select name="engineType" id="engineType" class="form-control">
                <option value="">Engine Type</option>
                <option value="Petrol" @if ($listing->listing_car_engineType == "Petrol") selected @endif>Petrol</option>
                <option value="Diesel" @if ($listing->listing_car_engineType == "Diesel") selected @endif>Diesel</option>
                <option value="LPG" @if ($listing->listing_car_engineType == "LPG") selected @endif>LPG</option>
                <option value="CNG" @if ($listing->listing_car_engineType == "CNG") selected @endif>CNG</option>
                <option value="Hybrid" @if ($listing->listing_car_engineType == "Hybrid") selected @endif>Hybrid</option>
                <option value="Electric" @if ($listing->listing_car_engineType == "Electric") selected @endif>Electric</option>
              </select>
              <small id="helpId" class="form-text text-danger">@error('engineType')
                {{$message}} 
                @enderror
              </small>
            </div> 
            <div class="mb-3 col-md-6">
              <label for="transmission" class="form-label">Transmission</label>
              <select name="transmission" id="transmission" class="form-control">
                <option value="">Select Transmission</option>
                <option value="Manual" @if ($listing->listing_car_transmission == "Manual") selected @endif>Manual</option>
                <option value="Automatic" @if ($listing->listing_car_transmission == "Automatic") selected @endif>Automatic</option>
                </select>
              <small id="helpId" class="form-text text-danger">@error('transmission')
                {{$message}} 
                @enderror
              </small>
            </div> 
            <div class="mb-3 col-md-6">
              <label for="assembly" class="form-label">Assembly</label>
              <select name="assembly" id="assembly" class="form-control">
                <option value="">Select Assembly</option>
                <option value="Local" @if ($listing->listing_car_assembly == "Local") selected @endif>Local</option>
                <option value="Imported" @if ($listing->listing_car_assembly == "Imported") selected @endif>Imported</option>
                </select>
              <small id="helpId" class="form-text text-danger">@error('assembly')
                {{$message}} 
                @enderror
              </small>
            </div> 
            <div class="mb-3 col-md-6 pb-3">
              <label for="engineCapacity" class="form-label" class="form-control">Engine Capacity (cc)</label>
             <input type="text" class="form-control" name="engineCapacity" id="engineCapacity" value="{{$listing->listing_car_engineCapacity}}">
              <small id="helpId" class="form-text text-danger">@error('engineCapacity')
                {{$message}} 
                @enderror
              </small>
            </div> 
             <hr>
            <div class="mb-3 col-md-12 mt-3">
            <div class="container pb-4">
              <h4>Features</h4>
            </div>
              <div class="container">
                <div class="row m-auto">

                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="abs" name="abs"  @if ($features->abs == 1) checked @endif>
                    <label class="form-check-label" for="abs">
                      ABS
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="airBags" name="airBags" @if ($features->airBags == 1) checked @endif>
                    <label class="form-check-label" for="airBag">
                      Air Bag
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="airConditioning" name="airConditioning" @if ($features->airConditioning == 1) checked @endif>
                    <label class="form-check-label" for="airConditioning">
                      Air Conditioning
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="alloyRims" name="alloyRims" @if ($features->alloyRims == 1) checked @endif>
                    <label class="form-check-label" for="alloyRims">
                      Alloy Rims
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="fmRadio" name="fmRadio" @if ($features->fmRadio == 1) checked @endif>
                    <label class="form-check-label" for="fmRadio">
                      AM/FM Radio
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="cdPlayer" name="cdPlayer" @if ($features->cdPlayer == 1) checked @endif>
                    <label class="form-check-label" for="cdPlayer">
                      CD Player
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="cassettePlayer" name="cassettePlayer" @if ($features->cassettePlayer == 1) checked @endif>
                    <label class="form-check-label" for="cassettePlayer">
                      Cassette Player
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="coolBox" name="coolBox" @if ($features->coolBox == 1) checked @endif>
                    <label class="form-check-label" for="coolBox">
                      Cool Box
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="cruiseControl" name="cruiseControl" @if ($features->cruiseControl == 1) checked @endif>
                    <label class="form-check-label" for="cruiseControl">
                      Cruise Control
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="climateControl" name="climateControl" @if ($features->climateControl == 1) checked @endif>
                    <label class="form-check-label" for="climateControl">
                      Climate Control
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="dvdPlayer" name="dvdPlayer" @if ($features->dvdPlayer == 1) checked @endif>
                    <label class="form-check-label" for="dvdPlayer">
                      DVD Player
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="frontSpeakers" name="frontSpeakers" @if ($features->frontSpeakers == 1) checked @endif>
                    <label class="form-check-label" for="frontSpeakers">
                      Front Speakers
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="frontCamera" name="frontCamera" @if ($features->frontCamera == 1) checked @endif>
                    <label class="form-check-label" for="frontCamera">
                      Front Camera
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="heatedSeats" name="heatedSeats" @if ($features->heatedSeats == 1) checked @endif>
                    <label class="form-check-label" for="heatedSeats">
                      Heated Seats
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="immobilizerKey" name="immobilizerKey" @if ($features->immobilizerKey == 1) checked @endif>
                    <label class="form-check-label" for="immobilizerKey">
                      Immobilizer Key
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="keylessEntry" name="keylessEntry" @if ($features->keylessEntry == 1) checked @endif>
                    <label class="form-check-label" for="keylessEntry">
                      Keyless Entry
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="navigationSystem" name="navigationSystem" @if ($features->navigationSystem == 1) checked @endif>
                    <label class="form-check-label" for="navigationSystem">
                      Navigation System
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="powerLocks" name="powerLocks" @if ($features->powerLocks == 1) checked @endif>
                    <label class="form-check-label" for="powerLocks">
                      Power Locks
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="powerMirrors" name="powerMirrors" @if ($features->powerMirrors == 1) checked @endif>
                    <label class="form-check-label" for="powerMirrors">
                      Power Mirrors
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="powerSteering" name="powerSteering" @if ($features->powerSteering == 1) checked @endif>
                    <label class="form-check-label" for="powerSteering">
                      Power Steering
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="powerWindows" name="powerWindows" @if ($features->powerWindows == 1) checked @endif>
                    <label class="form-check-label" for="powerWindows">
                      Power Windows
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="rearSeatEntertainment" name="rearSeatEntertainment" @if ($features->rearSeatEntertainment == 1) checked @endif>
                    <label class="form-check-label" for="rearSeatEntertainment">
                      Rear Seat Entertainment
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="rearAcVents" name="rearAcVents" @if ($features->rearAcVents == 1) checked @endif>
                    <label class="form-check-label" for="rearAcVents">
                      Rear AC Vents
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="rearSpeakers" name="rearSpeakers" @if ($features->rearSpeakers == 1) checked @endif>
                    <label class="form-check-label" for="rearSpeakers">
                      Rear Speakers
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="rearCamera" name="rearCamera" @if ($features->rearCamera == 1) checked @endif>
                    <label class="form-check-label" for="rearCamera">
                      Rear Camera
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="sunRoof" name="sunRoof" @if ($features->sunRoof == 1) checked @endif>
                    <label class="form-check-label" for="sunRoof">
                      Sun Roof
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="steeringSwitches" name="steeringSwitches" @if ($features->steeringSwitches == 1) checked @endif>
                    <label class="form-check-label" for="steeringSwitches">
                      Steering Switches
                    </label>
                  </div>
                  <div class="form-check m-2 col-md-3 ">
                    <input class="form-check-input" type="checkbox" value="1" id="usbCable" name="usbCable" @if ($features->usbCable == 1) checked @endif>
                    <label class="form-check-label" for="usbCable">
                      USB and Auxillary Cable
                    </label>
                  </div>
                  

                {{-- </div> --}}
              </div>
            </div> 

          </div> 
        </div> 
          
          <div class="row image_section bg-light pt-4 pb-4 mt-4 mb-4 rounded text-center">
              {{-- Image Uploading --}}
                   <div class="container">
                             <h3>Upload Images</h3>
                             <p>Upload Only 4 Images</p>
                    </div>
                    <div class="container col-md-11 col-12 pt-5 ">

                      {{-- <div class=""> --}}
                        {{-- <div class="container" >
                          <div class="d-flex">
                            @foreach ($images as $img)

                          <div class="image-container">
                           <div class="img-preview">
                             <img data-id="{{$img->images_id}}" src="{{url('Backend/listing_images')}}/{{$img->images_path}}" alt="" class="img-fluid" style="width:90px;">
                           </div>
                           <div class="img-button">
                             <button type="button" class="deleteImageBtn btn btn-outline-danger" id="deleteImageBtn"  data-id="{{$img->images_id}}" >Delete</button>
                           </div>
                          </div>

                          @endforeach
                        </div>
                      </div> --}}
                      {{-- </div> --}}

                      <div class="row"
                           data-type="imagesloader"
                           data-errorformat="Accepted file formats"
                           data-errorsize="Maximum size accepted"
                           data-errorduplicate="File already loaded"
                           data-errormaxfiles="Maximum number of images you can upload"
                           data-errorminfiles="Minimum number of images to upload"
                           data-modifyimagetext="Modify immage">
                
                           <div class="d-flex">
                            @foreach ($images as $img)
                            
                          <div class="image-container m-2">
                           {{-- <div class="img-preview"> --}}
                             <img data-id="{{$img->images_id}}" src="{{url('Backend/listing_images')}}/{{$img->images_path}}" alt="" class="img-fluid img-display mb-2 ratio-images" style="max-width:200px;">
                           {{-- </div> --}}
                           <br>
                           {{-- <div class="img-button"> --}}
                             <button type="button" class="deleteImageBtn btn btn-outline-danger" id="deleteImageBtn"  data-id="{{$img->images_id}}" >Delete</button>
                           {{-- </div> --}}
                          </div>

                          @endforeach
                        </div>

                        <!-- Progress bar -->
                        <div class="col-12 order-1 mt-2">
                          <div data-type="progress" class="progress" style="height: 25px; display:none;">
                            <div data-type="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;">Load in progress...</div>
                          </div>
                        </div>
                        <!-- Model -->
                        <div data-type="image-model" class="col-4 pl-2 pr-2 pt-2 m-auto" style="max-width:200px; display:none;">
                
                          <div class="ratio-box text-center" data-type="image-ratio-box">
                            {{-- //Image Upload here --}}
                            <img data-type="noimage" class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded" src="{{url('/uploadfile.svg')}}" style="cursor:pointer;">
                            <div data-type="loading" class="img-loading" style="color:#218838; display:none;">
                              <span class="fa fa-2x fa-spin fa-spinner"></span>
                            </div>
                            <img data-type="preview" class="btn btn-light ratio-img ratio-images img-fluid p-2 image border dashed rounded" src="" style="display: none; cursor: default;">
                            <span class="badge badge-pill badge-success p-2 w-50 main-tag" style="display:none;">Main</span>
                          </div>
                
                          <!-- Buttons -->
                          <div data-type="image-buttons" class="row justify-content-center mt-2">
                            <button data-type="add" class="btn btn-outline-success addNew-buttons" type="button"><span class="fa fa-camera mr-2"></span>Add</button>
                            <button data-type="btn-modify" type="button" class="btn btn-outline-success m-0" data-toggle="popover" data-placement="right" style="display:none;">
                              <span class="fa fa-pencil-alt mr-2"></span>Modify
                            </button>
                          </div>
                        </div>                       
                        <!-- Popover operations -->
                        <div data-type="popover-model" style="display:none">
                          <div data-type="popover" class="ml-3 mr-3" style="min-width:150px;">
                            <div class="row">
                              <div class="col p-0">
                                <button data-operation="main" class="btn btn-block btn-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-double-up mr-2"></span>Main</button>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-6 p-0 pr-1">
                                <button data-operation="left" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-left mr-2"></span>Left</button>
                              </div>
                              <div class="col-6 p-0 pl-1">
                                <button data-operation="right" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Right<span class="fa fa-angle-right ml-2"></span></button>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-6 p-0 pr-1">
                                <button data-operation="rotateanticlockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fas fa-undo-alt mr-2"></span>Rotate</button>
                              </div>
                              <div class="col-6 p-0 pl-1">
                                <button data-operation="rotateclockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Rotate<span class="fas fa-redo-alt ml-2"></span></button>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <button data-operation="remove" class="btn btn-outline-danger btn-sm btn-block" type="button"><span class="fa fa-times mr-2"></span>Remove</button>
                            </div>
                          </div>
                        </div>
                
                      </div>
                
                      <div class="form-group row">
                        <div class="input-group">
                          <!--Hidden file input for images-->
                          <input id="files" type="file" name="files[]" id="files[]" class="files" data-button="" accept="image/jpeg, image/png, image/gif," style="display:none;">
                        </div>
                      </div>
                    @error('files')
                        {{$message}}
                    @enderror
                </div>
                          <!-- Image section End -->
                      </div>


                    <div class="row mt-2 bg-white pt-4 mt-4 mb-4 pb-4 rounded">
                      <div class="container">
                        <h4>Contact Details</h4>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" value="{{$listing->listing_car_contact}}">
                        <small id="helpId" class="form-text text-danger">@error('contact')
                          {{$message}} 
                          @enderror
                        </small>
                      </div> 
                      <div class="mb-3 col-md-6">
                        <label for="whatsApp" class="form-label">WhatsApp</label>
                        <input type="text" class="form-control" name="whatsApp" id="whatsApp" value="{{$listing->listing_car_whatsApp}}">
                        <small id="helpId" class="form-text text-danger">@error('whatsApp')
                          {{$message}} 
                          @enderror
                        </small>
                      </div> 
                    </div> 

          <div class="row image_section mt-2 bg-white pt-4 pb-4 mb-5 rounded ">
            <div class="container">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div> 
          </form>
          </div>
          </div>
      </div>
    </div>


@endsection