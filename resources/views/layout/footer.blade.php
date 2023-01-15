  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div id="login_errList"></div>
                <div id="errors"></div>
                  <form action="{{route('home')}}" method="post" id="loginform">
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email"
                            class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter Your Email">
                          <small id="helpId" class="form-text text-muted">@error('email')
                            {{$message}} 
                            @enderror
                          </small>
                        </div>
  
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password"
                            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter Your Passwrord">
                          <small id="helpId" class="form-text text-muted">@error('password')
                            {{$message}} 
                            @enderror
                          </small>
                        </div>               
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary login-btn">Login</button>
                      </div>
                    </form>
      </div>
    </div>
    </div>
  
  
     <!-- Register Modal -->
     <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Now</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <div id="register_errList"></div>
        <form action="{{route('home')}}" method="post" id="registerform">
             @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text"
            class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Enter Your Name">
            <small id="helpId" class="form-text text-muted">@error('name')
            {{$message}} 
            @enderror
            </small>
          </div>
  
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"
              class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Enter Your Email">
            <small id="helpId" class="form-text text-muted">@error('email')
              {{$message}} 
              @enderror
            </small>
            </div> 
  
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password"
              class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter Your Passwrord">
            <small id="helpId" class="form-text text-muted">@error('password')
              {{$message}} 
              @enderror
            </small>
            </div>    
          
            <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password"
              class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="helpId" placeholder="Confirm Passwrord">
            <small id="helpId" class="form-text text-muted">@error('password_confirmation')
              {{$message}} 
              @enderror
            </small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary register-btn" >Register</button>
          </div>
        </div>
      </form>
    </div>
    </div>

    
     <!-- Change Password Modal -->
  <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <div id="save_errList"></div>
                {{-- <div id="errors"></div> --}}
                  <form action="{{route('home')}}" method="post" id="passwordform">
                      <div class="mb-3">
                          <label for="oldPassword" class="form-label">Old Password</label>
                          <input type="password"
                            class="form-control" name="oldPassword" id="oldPassword" aria-describedby="helpId" placeholder="Enter Your Old Password">
                          <small id="helpId" class="form-text text-muted">@error('oldPassword')
                            {{$message}} 
                            @enderror
                          </small>
                        </div>
  
                        <div class="mb-3">
                          <label for="password" class="form-label">New Password</label>
                          <input type="password"
                            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter Your New Passwrord">
                          <small id="helpId" class="form-text text-muted">@error('password')
                            {{$message}} 
                            @enderror
                          </small>
                        </div>   
                        
                        <div class="mb-3">
                          <label for="password_confirmation" class="form-label">Confirm Password</label>
                          <input type="password"
                            class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="helpId" placeholder="Enter Confirm Passwrord">
                          <small id="helpId" class="form-text text-muted">@error('password_confirmation')
                            {{$message}} 
                            @enderror
                          </small>
                        </div>   

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary confirmPassword-btn">Login</button>
                      </div>
                    </form>
      </div>
    </div>
    </div>
 

<!--============================
=            Footer            =
=============================-->

<!-- Footer Bottom -->
<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-12">
          <!-- Copyright -->
          <div class="copyright">
            <p>Copyright © 2016. All Rights Reserved</p>
          </div>
        </div>
        <div class="col-sm-6 col-12">
          <!-- Social Icons -->
          <ul class="social-media-icons text-right">
              <li><a class="fa fa-facebook" href=""></a></li>
              <li><a class="fa fa-twitter" href=""></a></li>
              <li><a class="fa fa-pinterest-p" href=""></a></li>
              <li><a class="fa fa-vimeo" href=""></a></li>
            </ul>
        </div>
      </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
      <a id="top" class="" href=""><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
