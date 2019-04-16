<?php
include("./functions/functions.php");
$falg= 1337;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <title>NavBel</title>
  </head>

  <body>

    <!-- Start Here -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top py-2" role="navigation">
      <div class="container">
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
              <div class="modal" id="loginModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Log in</h5>
                      <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="post">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <i class="input-group-text fas fa-envelope"></i>
                            </div>
                          
                          <input type="email" name="login" class="form-control" placeholder="E-mail"> 
                        </div>
                      </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <i class="input-group-text fas fa-unlock"></i>
                                </div>

                                <input type="password" name="password" class="form-control" placeholder="Password">
                             </div>   
                          </div>

                          <input name="signin" type="submit" value="Log in" class="btn btn-primary btn-block">
                          <p class="text-center mt-4"><a href="#">Forgot password?</a></p>
                          <!--
                            this link is not necessary and is turned off because there's a bug in it. To fix later either with bootstarp or, if necessary, with jQuery.
                          <p class="text-center mt-1">Don't have an account?<a href="#signupModal1" data-toggle="modal" data-target="#signupModal1"> Sign up in seconds</a></p>
                          -->
                      </form>
                      <?php 
                          include("./pages/login.php");
                      ?>
                    </div>
                    
                  </div>
                </div>
              </div>
     
     <!-- Sign up Modal -->   
     <div class="modal" id="signupModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Sign up</h5>
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
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
                        <select name ="year" class="form-control" id="syear">
                          <option>
                            ...
                          </option>
                          <option value="1 CPI">
                            1 CPI
                          </option>
                          <option value="2 CPI">  
                              2 CPI
                          </option>
                          <option value="1 CS">
                              1 CS
                          </option>
                          <option value="2 CS">
                              2 CS
                          </option>
                          <option value="3 CS">
                              3 CS
                          </option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                          <input name="img" type="file" id="myfile">
                          <label class="custom-file-label" for="myfile">Upload Profile Picture</label>
                        </div>
                    </div>

                  <input type="submit" name="submit" value="Sign up" class="btn btn-primary btn-block mt-4">
                  </form>

                  <?php
                  include('./pages/signup.php');
                  ?>
            </div>
          </div>
        </div>
      </div>
            

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
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

    <script>
      // Get the current year for the copyright
      // I haven't used this line yet, it's for later
      $('#year').text(new Date().getFullYear());
    </script>
  </body>
</html>
