@extends('admin.layout.main')
@section('content')

<div class="container mt-3">
    <h2>All Listings</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto nemo totam commodi, dolorem quia quaerat mollitia sint nulla recusandae quam!</p>
    <div class="row">
      <!-- table section -->
      <div class="col-md-12 mb-5">
        <div class="white_shd full margin_bottom_30">
           <div class="full graph_head">
            <div id="success_msg"></div>
            @if (session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
          @endif
          @if (session()->has('success'))
          <div class="alert alert-success">{{session()->get('success')}}</div>
          @endif
              <div class="heading1 margin_0 d-flex justify-content-between mt-3 mb-4">
               <a href="{{route('admin.createlisting')}}" class="btn btn-primary">Create New +</a>
                {{-- <div></div> --}}
                <button class="btn btn-light refreshBtn">Refresh <i class="fa fa-refresh fetch-users"></i></button>
              </div>
           </div>
           
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
                                </p>
                            <td>{{$list->listing_model_year}}</td>
                            <td>{{Custom::cityName($list->listing_city)}}</td>
                            <td>{{$list->listing_register_province}}</td>
                            <td>{{Custom::colorName($list->listing_exterior_color)}}</td>
                            <td>{{$list->listing_car_mileage}}</td>
                            <td>{{$list->listing_car_price}}</td>
                            <td>
                                <div class="switch_box box_1">
                                    <input type="checkbox" class="switch_1 car_status" {{$list->listing_status == true ? 'checked' : "" }} data-id="{{$list->listing_id}}">
                                </div>
                            </td>
                            <td>
                                <a href="{{url('admin/listing/edit')}}/{{$list->listing_id}}" class="btn btn-primary m-1 btn-sm "><i class="fa fa-edit"></i></a>

                                <a href="{{url('admin/listing/delete')}}/{{$list->listing_id}}" class="btn btn-danger m-1 deleteBtn btn-sm "><i class="fa fa-trash"></i></a>
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
     </div>
</div>




@endsection