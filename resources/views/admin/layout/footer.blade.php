 <!-- Footer -->
 <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<script>
$(document).ready(function () { 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
          // --------------------------------
          // User CRUD Operatrions Start Here
          // -------------------------------- 
    
       //For User registeration 
       $(document).on('click', '.register-btn', function(e){
            e.preventDefault();
            $.ajax({
        type: "POST",
        url: "{{route('admin_user_register')}}",
        data: $("#form").serialize(),
        dataType: "json",
        success: function(response){
          if(response.errors){
            console.log(response.errors);
            $('.modalBtn').click();
            $('#save_errList').html("");
            $('#save_errList').addClass("alert alert-danger");
            $.each(response.errors, function(key, arr_values){
             $('#save_errList').append('<li>'+arr_values+'</li>')
            })
          }else{
            $('.modalBtn').hide();
            Swal.fire(
                  'Registered!',
                  'User has been registered successfully.',
                  'success'
                )
            console.log(response);
          }
        }
      });
    });
    
      //For User Details edit 
      $(document).on('click', '.editmodalbtn', function(e){
       var user_id = $(this).data('id');
            $.ajax({
        type: "POST",
        url: "{{route('admin_user_edit')}}",
        data: {'user_id': user_id},
        dataType: "json",
        success: function(response){
          if(response.errors){
            console.log(response.errors);
            $('#save_errList').html("");
            $('#save_errList').addClass("alert alert-danger");
            $.each(response.errors, function(key, arr_values){
             $('#save_errList').append('<li>'+arr_values+'</li>')
            //  $(this).click();
            })
          }else{
            console.log(response);
           $('#user_id').val(response.user.id);
           $('#editname').val(response.user.name);
           $('#editemail').val(response.user.email);
           $('#editcontact').val(response.user.contact);
           $('#editaddress').val(response.user.address);
          }
        }
      });
    });
    
       //For User details Update 
       $(document).on('click', '.updateBtn', function(e){
           id = $('#user_id').val();
            e.preventDefault();
        $.ajax({
        type: "POST",
        url: "{{url('admin/users/update')}}"+"/"+id,
        data: $("#updateform").serialize(),
        dataType: "json",
        success: function(response){
          if(response.errors){
             console.log(response.errors);
             $('#edit_errList').html("");
             $('#edit_errList').addClass("alert alert-danger");
             $.each(response.errors, function(key, arr_errors){
                $('#edit_errList').append('<li>'+arr_errors+'</li>')
             })
             $('.editmodalbtn').click();
          }else{
            Swal.fire(
                  'Updated!',
                  'User has been updated successfully.',
                  'success'
                )
            console.log(response);
          }
        }
      });
    });
    
    //  Chnage User Status 
    $('.user_status').on('change', function(){
       var status = $(this).prop('checked') == true ? 1 : 0;
       var user_id = $(this).data('id');
       $.ajax({
              type: 'POST',
              url: "{{route('status_check')}}",
              data: {'status':status, 'user_id': user_id},
              success: function(response){
                if(response.errors){
                   $('#save_errList').html("");
                   $('#save_errList').addClass("alert alert-danger");
                   $.each(response.errors, function(key, arr_values){
                   $('#save_errList').append('<li>'+arr_values+'</li>')
            })
                }
                Swal.fire(
                  'Updated!',
                  'User status has been updated.',
                  'success'
                )}
    });
    });
    
          // --------------------------------
          // User CRUD Operatrions End 
          // -------------------------------- 
   // --------------------------------
      // City CRUD Operatrions Start Here
      // -------------------------------- 

    //For City Addition 
    $(document).on('click', '.city-btn', function(e){
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "{{route('admin.createCity')}}",
        data: $("#cityForm").serialize(),
        dataType: "json",
      success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#save_errList').html("");
        $('#save_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_values){
          $('#save_errList').append('<li>'+arr_values+'</li>')
          // $('.modalBtn').click();
        })
      }else{
        $('#save_errList').html("");
        $('#save_errList').removeClass("alert alert-danger");
        Swal.fire(
          'Added!',
          'City has been created successfully.',
          'success'
          )
          console.log(response);
        }
      }
    });
  });
  
  //For City Details edit 
  $(document).on('click', '.editcitymodalbtn', function(e){
    var city_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: "{{route('admin.editCity')}}",
      data: {'city_id': city_id},
      dataType: "json",
      success: function(response){
        if(response.errors){
          console.log(response.errors);
          $('#save_errList').html("");
          $('#save_errList').addClass("alert alert-danger");
          $.each(response.errors, function(key, arr_values){
            $('#save_errList').append('<li>'+arr_values+'</li>')
          })
        }else{
          console.log(response);
          $('#city_id').val(response.city.id);
          $('#editcity_name').val(response.city.city);
        }
      }
    });
  });
  
  //For City details Update 
  $(document).on('click', '.updatecityBtn', function(e){
       id = $('#city_id').val();
        e.preventDefault();
        $.ajax({
    type: "POST",
    url: "{{url('admin/city/update')}}"+"/"+id,
    data: $("#updatecategoryform").serialize(),
    dataType: "json",
    success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#edit_errList').html("");
        $('#edit_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_errors){
          $('#edit_errList').append('<li>'+arr_errors+'</li>')
        })
         $('.editcategorymodalbtn').click();
      }else{
            Swal.fire(
              'Updated!',
              'Category has been updated.',
              'success'
              )
              console.log(response);
            }
          }
        });
      });
      // --------------------------------
      // City CRUD Operatrions End Here
      // -------------------------------- 
      // --------------------------------
      // Brand CRUD Operatrions Starts Here
      // -------------------------------- 
      
      //For Brand Addition 
      $(document).on('click', '.brand-btn', function(e){
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "{{route('admin_brand_create')}}",
        data: $("#brandForm").serialize(),
        dataType: "json",
      success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#save_errList').html("");
        $('#save_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_values){
          $('#save_errList').append('<li>'+arr_values+'</li>')
          $('.modalBtn').click();
        })
      }else{
        $('#save_errList').html("");
        $('#save_errList').removeClass("alert alert-danger");
        Swal.fire(
          'Added!',
          'Brand has been created successfully.',
          'success'
          )
          console.log(response);
        }
      }
    });
  });
  
  //For Brands Details edit 
  $(document).on('click', '.editbrandmodalbtn', function(e){
    var brand_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: "{{route('admin_brand_edit')}}",
      data: {'brand_id': brand_id},
      dataType: "json",
      success: function(response){
        if(response.errors){
          console.log(response.errors);
          // $('#save_errList').html("");
          // $('#save_errList').addClass("alert alert-danger");
          // $.each(response.errors, function(key, arr_values){
          //   $('#save_errList').append('<li>'+arr_values+'</li>')
          // })
        }else{
          console.log(response);
          $('#brand_id').val(response.brand.brand_id);
          $('#editbrand_name').val(response.brand.brand_name);
        }
      }
    });
  });
  
  //For Brand details Update 
  $(document).on('click', '.updatebrandBtn', function(e){
       id = $('#brand_id').val();
        e.preventDefault();
        $.ajax({
    type: "POST",
    url: "{{url('admin/brands/update')}}"+"/"+id,
    data: $("#updatebrandform").serialize(),
    dataType: "json",
    success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#edit_errList').html("");
        $('#edit_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_errors){
          $('#edit_errList').append('<li>'+arr_errors+'</li>')
        })
        //  $('.editbrandmodalbtn').click();
      }else{
            Swal.fire(
              'Updated!',
              'Brand has been updated.',
              'success'
              )
              console.log(response);
            }
          }
        });
      });

      //  Chnage Brand Status 
$('.brand_status').on('change', function(){
   var status = $(this).prop('checked') == true ? 1 : 0;
   var id = $(this).data('id');
   $.ajax({
          type: 'POST',
          url: "{{route('brand_status_check')}}",
          data: {'status':status, 'id':id},
          success: function(response){
            if(response.errors){
              console.log(response.errors);
              $('#save_errList').html("");
              $('#save_errList').addClass("alert alert-danger");
              $.each(response.errors, function(key, arr_values){
                $('#save_errList').append('<li>'+arr_values+'</li>')
              });
            }
            console.log(response);
            Swal.fire(
              'Updated!',
              'User Status has been updated.',
              'success'
              )}
});
});

      // --------------------------------
      // Brand CRUD Operatrions End Here
      // -------------------------------- 
    // --------------------------------
      // Color CRUD Operatrions Start Here
      // -------------------------------- 
      
      //For Color Addition 
      $(document).on('click', '.color-btn', function(e){
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "{{route('admin_color_create')}}",
        data: $("#colorForm").serialize(),
        dataType: "json",
      success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#save_errList').html("");
        $('#save_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_values){
          $('#save_errList').append('<li>'+arr_values+'</li>')
          $('.modalBtn').click();
        })
      }else{
        $('#save_errList').html("");
        $('#save_errList').removeClass("alert alert-danger");
        Swal.fire(
          'Added!',
          'Color has been created successfully.',
          'success'
          )
          console.log(response);
        }
      }
    });
  });
  
  //For Color Details edit 
  $(document).on('click', '.editcolormodalbtn', function(e){
    var color_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: "{{route('admin_color_edit')}}",
      data: {'color_id': color_id},
      dataType: "json",
      success: function(response){
        if(response.errors){
          console.log(response.errors);
        }else{
          console.log(response);
          $('#color_id').val(response.color.color_id);
          $('#editcolor_name').val(response.color.color_name);
        }
      }
    });
  });
  
  //For Color details Update 
  $(document).on('click', '.updateeditcolorBtn', function(e){
       id = $('#color_id').val();
        e.preventDefault();
        $.ajax({
    type: "POST",
    url: "{{url('admin/colors/update')}}"+"/"+id,
    data: $("#updatecolorform").serialize(),
    dataType: "json",
    success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#edit_errList').html("");
        $('#edit_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_errors){
          $('#edit_errList').append('<li>'+arr_errors+'</li>')
        })
        //  $('.editbrandmodalbtn').click();
      }else{
            Swal.fire(
              'Updated!',
              'Color has been updated.',
              'success'
              )
              console.log(response);
            }
          }
        });
      });

      // --------------------------------
      // Color CRUD Operatrions End Here
      // -------------------------------- 
      // --------------------------------
      // Model CRUD Operatrions Start Here
      // -------------------------------- 
      
      //For Model Addition 
      $(document).on('click', '.model-btn', function(e){
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "{{route('admin_model_create')}}",
        data: $("#modelForm").serialize(),
        dataType: "json",
      success: function(response){
      if(response.errors){
        console.log(response.errors);
        $('#save_errList').html("");
        $('#save_errList').addClass("alert alert-danger");
        $.each(response.errors, function(key, arr_values){
          $('#save_errList').append('<li>'+arr_values+'</li>')
          $('.modalBtn').click();
        })
      }else{
        $('#save_errList').html("");
        $('#save_errList').removeClass("alert alert-danger");
        Swal.fire(
          'Added!',
          'Model has been created successfully.',
          'success'
          )
          console.log(response);
        }
      }
    });
  });
  
  //For Model Details edit 
  $(document).on('click', '.editmodelsbtn', function(e){
    var model_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: "{{route('admin_model_edit')}}",
      data: {'model_id': model_id},
      dataType: "json",
      success: function(response){
        if(response.errors){
          console.log(response.errors);
        }else{
          console.log(response);
          $('#model_id').val(response.model.model_id);
          $('#editmodel_name').val(response.model.model_name);
          $('#editbrand_name').val(response.model.model_brand_name);
          
        }
      }
    });
  });
  
  //For Model details Update 
  $(document).on('click', '.updatemodelBtn', function(e){
       id = $('#model_id').val();
        e.preventDefault();
        $.ajax({
    type: "POST",
    url: "{{url('admin/models/update')}}"+"/"+id,
    data: $("#updatemodelform").serialize(),
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
          }
        });
      });
      
      //Update Listing Status
          //  Chnage Brand Status 
$('.car_status').on('change', function(){
   var status = $(this).prop('checked') == true ? 1 : 0;
   var id = $(this).data('id');
   $.ajax({
          type: 'POST',
          url: "{{route('car_status_check')}}",
          data: {'status':status, 'id':id},
          success: function(response){
            if(response.errors){
              console.log(response.errors);
              $('#save_errList').html("");
              $('#save_errList').addClass("alert alert-danger");
              $.each(response.errors, function(key, arr_values){
                $('#save_errList').append('<li>'+arr_values+'</li>')
              });
            }
            console.log(response);
            Swal.fire(
              'Updated!',
              'Listing Status has been updated.',
              'success'
              )}
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
      $('#model_name').append('<option value="'+value.model_id+'">'+value.model_name+'</option>')
          console.log(value.model_name);
        });
      });
        }
      });
    });
    
    $('.refreshBtn').on('click', function(){
      window.location.reload();
    });


    //Allow only 4 images While Editing Listing
      $('body').change(function(event){
        var numItems = $('.ratio-images').length;
              if(numItems > 4){
                $('.ratio-img').hide();
                $('.addNew-buttons').hide();
                
              }
        });
   
// $('#fileupload').change(function(){
//    //get the input and the file list
//    var input = document.getElementById('fileupload');
//    if(input.files.length>4){
//        $('.validation').css('display','block');
//    }else{
//        $('.validation').css('display','none');
//    }
// });

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



});  //Document Ready Function End
</script>    