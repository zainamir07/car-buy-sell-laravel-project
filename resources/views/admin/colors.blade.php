@extends('admin.layout.main')
@section('content')

<div class="container mt-3">
    <h2>All Colors</h2>
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
          <div id="edit_errList"></div>
              <div class="heading1 margin_0 d-flex justify-content-between mt-3 mb-4">
               <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary modalBtn" data-toggle="modal" data-target="#exampleModal" >
                    Add Color+
                  </button>
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
                          <th>Name</th>
                          <th>Created at</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($colors as $color)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$color->color_name}}</td>
                            <td>{{$color->created_at}}</td>
                           
                            <td>
                                <button type="button" class="btn btn-primary m-1 editcolormodalbtn" data-toggle="modal" data-target="#editModal" data-id="{{$color->color_id}}">
                                    <i class="fa fa-edit"></i>
                                  </button>
                                <a href="{{url('admin/colors/delete')}}/{{$color->color_id}}" class="btn btn-danger m-1  deleteBtn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @php
                             $i++;
                        @endphp
                        @endforeach
                          
                    </tbody>
                 </table>
                 {{ $colors->links('pagination::bootstrap-5') }} 
              </div>
           </div>
        </div>
     </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div id="save_errList"></div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('admin_color_create')}}" method="post" id="colorForm">
                        @csrf
                    <div class="mb-3">
                      <label for="color_name" class="form-label">Name</label>
                      <input type="text"
                        class="form-control" name="color_name" id="color_name" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">@error('color_name')
                          {{$message}}
                      @enderror</small>
                    </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button"   class="btn btn-primary color-btn">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Edit  Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Color</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div id="save_errList"></div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('admin_color_edit')}}" method="post" id="updatecolorform">
                        @csrf
                    <div class="mb-3">
                        <input type="hidden" value="" id="color_id">
                      <label for="editcolor_name" class="form-label">Name</label>
                      <input type="text"
                        class="form-control" name="editcolor_name" id="editcolor_name" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">@error('editcolor_name')
                          {{$message}}
                      @enderror</small>
                    </div>

                    </div>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updateeditcolorBtn">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
 



<!--Create Brand Modal -->
{{-- <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Add New Color</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container">
                        <div id="save_errList"></div>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('admin.colors')}}" method="post" id="colorForm">
                        @csrf
                    <div class="mb-3">
                      <label for="color_name" class="form-label">Name</label>
                      <input type="text"
                        class="form-control" name="color_name" id="color_name" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">@error('color_name')
                          {{$message}}
                      @enderror</small>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  data-bs-dismiss="modal" class="btn btn-primary color-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}


<!--Update Brand Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Edit Color Name</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="container">
                        <div id="save_errList"></div>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('admin.colors')}}" method="post" id="updatecolorform">
                        @csrf
                    <div class="mb-3">
                        <input type="hidden" value="" id="color_id">
                      <label for="editcolor_name" class="form-label">Name</label>
                      <input type="text"
                        class="form-control" name="editcolor_name" id="editcolor_name" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">@error('editcolor_name')
                          {{$message}}
                      @enderror</small>
                    </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit"  data-bs-dismiss="modal" class="btn btn-primary updateeditcolorBtn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection