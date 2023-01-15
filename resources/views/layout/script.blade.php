<!-- JAVASCRIPTS -->
{{-- <script src="{{url('Frontend/plugins/jquery/dist/jquery.min.js')}}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
{{-- <script src="{{url('Frontend/plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
<script src="{{url('Frontend/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{url('Frontend/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{url('Frontend/plugins/bootstrap/dist/js/popper.min.js')}}"></script>
<script src="{{url('Frontend/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('Frontend/plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>
<script src="{{url('Frontend/plugins/slick-carousel/slick/slick.min.js')}}"></script>
{{-- <script src="{{url('Frontend/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script> --}}
<script src="{{url('Frontend/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{url('Frontend/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="{{url('Frontend/js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
 <!-- Images loader -->
 <script src="{{url('Backend/js/jquery.imagesloader-1.0.1.js')}}"></script>


  <script>
$(document).ready(function () {
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    //For User registeration 
  $(document).on('click', '.register-btn', function(e){
        e.preventDefault();

        $.ajax({
    type: "POST",
    url: "{{route('register_check')}}",
    data: $("#registerform").serialize(),
    dataType: "json",
    success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#register_errList').html("");
        $('#register_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_values){
          $('#register_errList').append('<li>'+arr_values+'</li>')
        })
      }else{
        Swal.fire( 
              'Registered!',
              'You have been register successfully.',
              'success'
            )
        console.log(response);
        $('#registerModal').modal('hide');
        $('#loginModal').modal('show');
         $('#save_errList').html("");
        $('#save_errList').addClass("alert alert-success");
        $('#save_errList').append('<p>You have beed registered successfully. Login Now</p>');
      }
    }
  });
});


    //For User Login 
    $(document).on('click', '.login-btn', function(e){
        e.preventDefault();

        $.ajax({
    type: "POST",
    url: "{{route('login_check')}}",
    data: $("#loginform").serialize(),
    dataType: "json",
    success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#login_errList').html("");
        $('#login_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_values){
         $('#login_errList').append('<li>'+arr_values+'</li>')
        })
        // $('#login_errList').html(response.errors);
      }else{
        // $('#login-msg').html("");
        // $('#login-msg').addClass("alert alert-success text-black ");
        // $('#login-msg').append('<p>You have beed Loggedin successfully.</p> ');
        
        Swal.fire(
              'Logged in!',
              'You have been logged in successfully.',
              'success'
            )
        $('#loginModal').modal('hide');
        setTimeout(() => {
          window.location.reload();
        }, 1000);
      }
    }
  });
});


//For User Password Update 
$(document).on('click', '.confirmPassword-btn', function(e){
        e.preventDefault();
        $.ajax({
    type: "POST",
    url: "{{route('changePassword')}}",
    data: $("#passwordform").serialize(),
    dataType: "json",
    success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#save_errList').html("");
        $('#save_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_values){
         $('#save_errList').append('<li>'+arr_values+'</li>')
        })
        $('#save_errList').append('<li>'+response.errors+'</li>')
      }else{      
        console.log(response);
        Swal.fire(
              'Password Updated!',
              'Your Password has been updated successfully.',
              'success'
            )
        $('#passwordModal').modal('hide');
        setTimeout(() => {
          window.location.href = '{{route("logout")}}';
        }, 1000);
      }
    }
  });
});

//For Model Details edit 
$(document).on('click', '.profile-button', function(e){
    var user_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: "{{route('profile_edit')}}",
      data: {'user_id': user_id},
      dataType: "json",
      success: function(response){
        if(response.errors){
          console.log(response.errors);
        }else{
          console.log(response);
          $('#user_id').val(response.user.id);
          $('#user_name').val(response.user.name);
          $('#user_email').val(response.user.email);
          $('#user_contact').val(response.user.contact);
          $('#user_address').val(response.user.address);
          $('#user_image').val(response.user.image);
          
        }
      }
    });
  });
  
  //For Profile details Update 
  $(document).on('click', '.updateProfilebtn', function(e){
       id = $('#user_id').val();
        e.preventDefault();
        $.ajax({
    type: "POST",
    url: "{{url('profile/update')}}"+"/"+id,
    data: $("#profileUpdateForm").serialize(),
    dataType: "json",
    success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#edit_errList').html("");
        $('#edit_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_errors){
          $('#edit_errList').append('<li>'+arr_errors+'</li>')
        })
      }else{
            Swal.fire(
              'Updated!',
              'Model has been updated.',
              'success'
              )
              console.log(response);
            }
            setTimeout(() => {
          window.location.reload();
        });
          }
        });
      });
  
          //----------------------
    //Delete Listing Images Start 
    //----------------------
    $(document).on('click', '.deleteImageBtn', function(e){
    var image_id = $(this).data('id');
           e.preventDefault();
           Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) { 
        $.ajax({
      type: "GET",
      url: "{{url('carAd/edit/image')}}"+"/"+image_id,
      dataType: "json",
      success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#edit_errList').html("");
        $('#edit_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_errors){
          $('#edit_errList').append('<li>'+arr_errors+'</li>')
    })
        }
      }
    })
    $(this).parents('.image-container').hide();
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
          )
        }
    })
  });
  
  //----------------------
  //Delete Listing Images End 
  //----------------------

  
    //Allow only 4 images While Editing Listing
    $('body').change(function(event){
        var numItems = $('.ratio-images').length;
              if(numItems > 4){
                $('.ratio-img').hide();
                $('.addNew-buttons').hide();
                
              }
        });
        

      //Get Car Model By Changing The Car Cmpany Name 
      $("#company_name").on('change', function(){
      let id = $("#company_name").val();
      $.ajax({
  type: "POST",
  url: "{{route('admin.getModelsName')}}",
  data: {'id': id},
    dataType: "json", 
  success: function(response){
    $.each(response, function() {
      $('.model_name_div').removeAttr('hidden');
      $('#model_name').html("");
    $.each(this, function(key, value) {
      $('#model_name').append('<option value="'+value.model_id+'">'+value.model_name+'</option>');
          console.log(value.model_name);
          // $("#model_name+div>ul.list").append('<li class="class="option" data-value="'+value.model_id+'">'+value.model_name+'<li>');
        });
      });
        }
      });
    });

         // Sweet Alert JQuery 
         $('.deleteBtn').on('click', function (event) {
          event.preventDefault();
      const url = $(this).attr('href');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {  
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
          )
          setTimeout(function() { 
            window.location.href = url;
          }, 500);
        }
      })
    });
    
    // If user login true then store and publish their ads 
    $('.userLoginCheck').on('click', function(event){
   event.preventDefault();
   const url = $(this).attr('href');
   $.ajax({
  type: "POST",
  url: "{{route('loginCheckForListing')}}",
    dataType: "json", 
  success: function(response){
    console.log(response.errors);
       if(response.errors){
        $('.loginform-button').click();
        $('#login_errList').html("");
        $('#login_errList').addClass("alert alert-danger");
        $('#login_errList').html('<li>'+response.errors+'</li>');
       }else{
        console.log(response);
        $(this).unbind(event);
        $('.userLoginCheck').click();
       }
        }
      });   
    });
    

        });

     
  </script>

</body>
</html>