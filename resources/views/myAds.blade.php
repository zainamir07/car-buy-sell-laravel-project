@extends('layout.main')

@section('content')
<style>

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}


</style>
<div class="container mt-5 mb-3">
    <h2>My Total Ads</h2>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate iste illo, dolorem pariatur libero possimus nihil omnis distinctio nostrum ducimus id quidem aliquid unde eius sed eaque facere quod odit!</p>
</div>
<div class="container bootstrap snippet bg-light p-4 rounded ">
    <div class="row justify-content-around">
      <div class="col-lg-2 col-sm-6">
        <div class="circle-tile ">
          <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
          <div class="circle-tile-content dark-blue">
            <div class="circle-tile-description text-faded"> Total Ads</div>
            <div class="circle-tile-number text-faded ">{{$totalListing}}</div>
            <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div>
       
      <div class="col-lg-2 col-sm-6">
        <div class="circle-tile ">
          <a href="#"><div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
          <div class="circle-tile-content green">
            <div class="circle-tile-description text-faded"> Active Ads </div>
            <div class="circle-tile-number text-faded ">{{$activeListing}}</div>
            <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div> 

      <div class="col-lg-2 col-sm-6">
        <div class="circle-tile ">
          <a href="#"><div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
          <div class="circle-tile-content red">
            <div class="circle-tile-description text-faded"> In Active Ads </div>
            <div class="circle-tile-number text-faded ">{{$blockListing}}</div>
            <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div> 

      <div class="col-lg-2 col-sm-6">
        <div class="circle-tile ">
          <a href="#"><div class="circle-tile-heading bg-dark"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
          <div class="circle-tile-content bg-dark">
            <div class="circle-tile-description text-faded"> Completed Ads </div>
            <div class="circle-tile-number text-faded ">10</div>
            <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
          </div>
        </div>
      </div> 
    </div> 
  </div>  
    
  </div>
  </div>

  <div class="container mt-5 mb-5 pb-5">
  <div class="table_section padding_infor_info">
    <div class="table-responsive-sm">
       <table class="table">
          <thead>
             <tr>
                <th>#</th>
                <th>Image/Name</th>
                <th>Model Year</th>
                <th>City</th>
                <th>Registered in:</th>
                <th>Color</th>
                <th>Mileage (KM)</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach ($listing as $list)
              <tr>
                  <td>{{$i}}</td>
                  <td class="text-center fw-bold">
                      <span>
                      <img src="{{url( Custom::listingImagePath($list->listing_id) )}}" width="70px" class="img-fluid rounded-circle mb-1" alt=""> </span>
                      <p>
                          {{Custom::carCompanyName($list->listing_company_name)}} 
                          {{Custom::carModelName($list->listing_car_model)}}
                          <br>
                         <strong>Purpose:</strong> {{categoryName($list->listing_car_category)}}
                      </p>
                  <td>{{$list->listing_model_year}}</td>
                  <td>{{Custom::cityName($list->listing_city)}}</td>
                  <td>{{$list->listing_register_province}}</td>
                  <td>{{Custom::colorName($list->listing_exterior_color)}}</td>
                  <td>{{$list->listing_car_mileage}}</td>
                  <td>Rs: {{$list->listing_car_price}}</td>
                  <td> @if ($list->listing_status == 1)
                      <span class="badge badge-primary p-2">Active</span>
                      @elseif($list->listing_status == 0)
                      <span class="badge badge-danger p-2">In Active</span>
                        @endif </td>
                  <td>
                    <a href="{{url('carAd/edit/')}}/{{$list->listing_id}}" class="btn btn-primary m-1 btn-sm "><i class="fa fa-edit"></i></a>

                      <a href="{{url('carAd/delete/')}}/{{$list->listing_id}}" class="btn btn-danger m-1 deleteBtn btn-sm "><i class="fa fa-trash"></i></a>
                  </td>
              </tr>
              @php
                   $i++;
              @endphp
              @endforeach
                
          </tbody>
       </table>
    </div>
 </div>
</div>
@endsection