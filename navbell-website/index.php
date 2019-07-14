<?php
  include("./functions/functions.php");
  $flag = 1337;
  // include is in the top because session_start  must be before any html tag
  include("./pages/login.php");
  include("./pages/signup.php");
  include('./pages/resetpwd/r1.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>NavBel</title>

    
    <script src="jquery-3.3.1.js"></script>
    <!--<script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>-->

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />

    
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    
    
  </head>

  <body>

    <!-- Start Here -->
    <!--<div class="container"> add a closing div tag for this one, maybe?!!!--> 

    <nav class="navbar navbar-expand-md navbar-light fixed-top py-2" role="navigation">
      
      <div class="container">
        <a href="index.html" class="navbar-brand">
          <img src="img/navlogo.png" width="80" height="37" />
          <h5 class="d-inline align-middle">NavBel</h3>
        </a>
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a  href="#loginModal"  class="nav-link" data-toggle="modal" data-target="#loginModal" >Log in</a>
            </li>
            <li class="nav-item">
              <a href="#signupModal" class="nav-link" data-toggle="modal" data-target="#signupModal">Sign up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
              
    <!-- Login Modal -->
    <div class="modal" tabindex="-1" id="loginModal">
        <div class="modal-dialog">
          <div class="modal-content" id="login-modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Log in</h5>
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <div class="modal-body">
              <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <i class="input-group-text fas fa-envelope"></i>
                    </div>
  
                    <input
                      type="text"
                      name="login"
                      class="form-control"
                      placeholder="E-mail"
                    />
                  </div>
                </div>
  
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <i class="input-group-text fas fa-unlock"></i>
                    </div>
  
                    <input
                      type="password"
                      name="password"
                      class="form-control"
                      placeholder="Password"
                    />
                  </div>
                </div>
  
                <input
                  type="submit"
                  value="Log in"
                  class="btn btn-primary btn-block"
                  name="signin"
                />
                <p class="text-center mt-4">
                  <a id="FPModal" href="javascript:void(0)">Forgot password?</a>
                </p>
                <!--
  
                  data-toggle="modal"
                      this link is not necessary and is turned off because there's a bug in it. To fix later either with bootstarp or, if necessary, with jQuery.
                    <p class="text-center mt-1">Don't have an account?<a id="signupModal" href="#" data-toggle="modal" data-target="#signupModal1"> Sign up in seconds</a></p> -->
              </form>
              <?php
                //include("./pages/login.php");
              ?>
            </div>
          </div>
  <!-- Login Modal -->
  
  <!-- Forgot Password Modal -->
          <div class="modal-content" id="fp-modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Log in</h5>
  
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <div class="modal-body">
              <p>
                To reset your password, enter the e-mail address of your NavBel
                account.
              </p>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <i class="input-group-text fas fa-envelope"></i>
                    </div>
  
                    <input
                      type="text"
                      name="email"
                      class="form-control"
                      placeholder="E-mail"
                    />
                  </div>
                </div>
  
                <input
                  type="submit"
                  value="Submit"
                  class="btn btn-primary btn-block"
                  id="FPFinal"
                  name="reset-password"
                />
                
              </form>
            </div>
          </div>
  <!-- Forgot Password Modal -->
  
  <!-- Forget Password Final Modal -->
          <div class="modal-content" id="fpf-modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Log in</h5>
  
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <div class="modal-body">
              <p>
                The instructions to reset your password have been sent to you by
                e-mail.
              </p>
            </div>
          </div>
        </div>
      </div>
  <!-- Forget Password Final Modal -->    
  
     <!-- Sign up Modal -->   
     <div class="modal" id="signupModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Sign up</h5>
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="input-group mb-4 mt-3">
                        <div class="input-group-prepend">
                          <i class="input-group-text fas fa-user"></i>
                        </div>
                      
                        <input type="text" name="fname" class="form-control " placeholder="First Name"> 
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group mb-4 mt-3">
                        <div class="input-group-prepend">
                          <i class="input-group-text fas fa-user"></i>
                        </div>
                      
                        <input type="text" name="lname" class="form-control " placeholder="Last Name"> 
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <i class="input-group-text fas fa-envelope"></i>
                          </div>
                        
                          <input type="text" name="email" class="form-control" placeholder="E-mail"> 
                        </div>
                      </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <i class="input-group-text fas fa-unlock"></i>
                            </div>

                            <input type="password" name="sgpassword"class="form-control" placeholder="Password">
                         </div>   
                      </div>

                      <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <i class="input-group-text fas fa-redo"></i>
                            </div>

                            <input type="password" name="confirmSgpassword" class="form-control" placeholder="Confirm Password">
                         </div>   
                      </div>

                    <div class="form-group mb-4">
                        <div class="input-group mb-4 mt-3">
                            <div class="input-group-prepend">
                                <i class="input-group-text "> <span class="no-italics">School Year</span></i>
                            
                            </div> 
                        <select class="form-control" id="syear" name="year">
                          <option value="">
                            ...
                          </option>
                          <option value="1">
                            1 CPI
                          </option>
                          <option value="2">  
                              2 CPI
                          </option>
                          <option value="3">
                              1 CS
                          </option>
                          <option value="4">
                              2 CS
                          </option>
                          <option value="5">
                              3 CS
                          </option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                          <input type="file" id="myfile" name="img">
                          <label class="custom-file-label" for="myfile">Upload Profile Picture</label>
                        </div>
                    </div>

                  <input type="submit" value="Sign up" class="btn btn-primary btn-block mt-4" name="submit">
                  </form>
                  <?php
                    //include("./pages/signup.php");
                  ?>
            </div>
          </div>
        </div>
      </div>
            

    





    <script>
        
  $(document).ready(function(){
        // Get the current year for the copyright
        // I haven't used this line yet, it's for later
        //$('#year').text(new Date().getFullYear());
        


    $('#FPModal').on('click', function() {
          $('#login-modal-content').hide(function() {
            $('#fp-modal-content').show();
          });
        });

        $('#FPFinal').on('click', function() {
          $('#fp-modal-content').hide(function() {
            $('#fpf-modal-content').show();
          });
        });

  });



 
        
     
      </script>
    
  </body>
</html>
