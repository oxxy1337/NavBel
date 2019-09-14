<?php
  session_start();
  include('./functions/functions.php');
  include('pages/main/get_profile_info.php');// the botton in the navbar
  include('pages/settings/get_profile_info.php');// to fill the form inputs with default values
  include('pages/settings/update_profile.php');// to request the update
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Profile</title>

    <script src="jquery-3.3.1.js"></script>

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lexend+Deca|Roboto:400,500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />

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
    <!--Previously: class="body-profile"-->
    <!-- Start Here -->
    <!-- Container -->

    <!-- MAIN NAVBAR -->
    <nav
      class="navbar navi navbar-expand-md navbar-light fixed-top py-1"
      role="navigation"
    >
      <div class="container ">
        <a href="index.php" class="navbar-brand">
          <img src="img/navlogo.png" width="70" height="35" />
          <h5 class="d-inline align-middle">NavBel</h5>
        </a>

        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav">
            <li class="nav-item px-2">
              <a href="main.php" class="nav-link active">Main</a>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mr-3">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
              >
                <i class="fas fa-user"></i> Welcome user
              </a>
              <div class="dropdown-menu">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- <a href="" class="dropdown-item"> -->
                      <!-- <i class="fas fa-user-circle"></i> -->
                      <button type="submit" name="get_profile_info" class="dropdown-item">Profile</button>
                    <!-- </a> -->
                  </form>

                <a href="settings.php" class="dropdown-item">
                  <i class="fas fa-cog"> </i> Settings
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a href="index.html" class="nav-link">
                <i class="fas fa-user-times"></i> Log out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- MAIN NAVBAR -->

    <div class="container">
      <div class="row">
        <!-- PROFILE PICTURE-->
        <div class="col-md-4 order-md-4 order-1 bg-light">
          <br />
          <br />
          <div class="profile-userpic">
            <!-- a static default image -->
            <!-- https://static.change.org/profile-img/default-user-profile.svg -->
            <img
              src="<?php echo $result->picture; ?>"
              class="img-responsive"
              alt=""
            />
          </div>
          <!-- Form -->
          <br />
          <br />
          <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="custom-file">
              <input type="file" id="profile-pic" class="custom-file-input" />
              <label class="custom-file-label" for="profile-pic"
                >Upload Picture
              </label>
            </div>
          </form> -->
          <br />
          <!-- Form -->
        </div>
        <!-- PROFILE PICTURE-->
        <!-- PROFILE INFO-->
        <div class="col-md-8 order-2 bg-primary">
          <!-- Form -->

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <!-- TEXT FIELD GROUPS: form-control-lg or form-control-sm 
            <small class="form-text text-muted">Your email will not ever be shared</small>
            btn-block
            -->
            <br />
            <br />
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $result->id; ?>" />
              <input type="hidden" name="ispublic" value="<?php echo $result->ispublic; ?>" />
              <label
                for="first name"
                style="color: white;  font-size: 19px; font-family: 'Lexend Deca', sans-serif;"
                >First name</label
              >
              <input
                class="form-control"
                type="text"
                id="fname"
                placeholder="<?php echo $result->fname; ?>"
                value="<?php echo $result->fname; ?>"
                name="fname"
              />
            </div>
            <div class="form-group">
              <label
                for="last name"
                style="color: white;  font-size: 19px; font-family: 'Lexend Deca', sans-serif;"
                >Last name</label
              >
              <input
                class="form-control "
                type="text"
                id="lname"
                placeholder="<?php echo $result->lname; ?>"
                value="<?php echo $result->lname; ?>"
                name="lname"
              />
            </div>
            <!-- <div class="form-group">
              <label
                for="email"
                style="color: white;  font-size: 19px; font-family: 'Lexend Deca', sans-serif;"
                >Email address</label
              >
              <input
                class="form-control "
                type="email"
                id="email"
                placeholder="Enter your email"
              />
            </div>
 -->
            <div class="form-group">
              <label
                for="password"
                style="color: white;  font-size: 19px; font-family: 'Lexend Deca', sans-serif;"
                >Password</label
              >
              <input
                class="form-control"
                type="password"
                id="password"
                placeholder="Password"
                name="password"
              />
            </div>
            <div class="form-group">
              <label
                for="cpassword"
                style="color: white;  font-size: 19px; font-family: 'Lexend Deca', sans-serif;"
                >Confirm password</label
              >
              <input
                class="form-control"
                type="password"
                id="cpassword"
                placeholder="Confirm password"
                name="confirm-password"
              />
            </div>
            <div class="custom-file">
              <input type="file" id="profile-pic" class="custom-file-input" name="img"/>
              <label class="custom-file-label" for="profile-pic"
                >Upload Picture
              </label>
            </div>
            

            <br />

            <button
              class="btn btn-outline-light px-4"
              style="font-size:20px;"
              type="submit"
              name="update-profile"
            >
              Save
            </button>
          </form>

          <br />
          <!-- Form -->
        </div>
        <!-- PROFILE INFO-->
      </div>
      <br />
    </div>

    <!-- Container -->
  </body>
</html>
