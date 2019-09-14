<?php
  error_reporting(0);
  session_start();
  include 'functions/functions.php';
  include 'pages/main/get_profile_info.php';
  include 'pages/rewards/rewards.php';
  include 'pages/settings/get_profile_info.php';// the reward page wont appear untill i have profile info because i need the ponts to tell the user if he can buy a reward or not
  include 'pages/rewards/sendReward.php';
  // include 'pages/rewards/fakeData.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Rewards</title>

    <script src="jquery-3.3.1.js"></script>
    <!--<script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
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
    <style>
      .carousel{
        margin-left: 100px;
    margin-right: 100px;
    margin-top: 70px;
    margin-bottom: 10px;
    
      }
    .carousel-item{
    background-color: #ffffff; 
    color: rgb(63, 63, 63); 
    /*min-height: 220px;*/
    border-radius: 10px;
    
    


  }


    .carousel-control-prev,
    .carousel-control-next {
    align-items: flex-end;/* Aligns it at the bottom */
    margin-bottom: 10px; 

    }
    .carousel-control-next{
      margin-right: 50%;
    }
    </style>
  </head>


  <body class="marg" style="background-color: #b4e2dc;  ">



   <!-- MAIN NAVBAR --> 
   <nav class="navbar navi navbar-expand-md navbar-light fixed-top py-1" role="navigation">
      <div class="container ">
        <a href="index.php" class="navbar-brand">
            <img src="img/navlogo.png" width="70" height="35" />
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
          <ul class="navbar-nav">
            <li class="nav-item px-2">
              <a href="main.php" class="nav-link ">Main</a>
            </li>
            <li class="nav-item px-2">
                <a href="rewards.php" class="nav-link active">Rewards</a>
              </li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mr-3">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-user"></i> Welcome user

              </a>
             

              <div class="dropdown-menu">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               
                  <button class="dropdown-item" type="submit" name ="get_profile_info">Profile</button>
               
              </form>


                <a href="settings.php" class="dropdown-item">
                    <i class="fas fa-cog">
                    </i> Settings
                  </a>
              </div>
            </li>
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="fas fa-user-times"></i> Log out
              </a>
            </li>
          </ul>


        </div>


      </div>
    </nav>


<!-- MAIN NAVBAR -->    























<div id="carouselExample" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators " style="bottom:-50px;"
      
    >
        <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExample" data-slide-to="1"></li>
        <li data-target="#carouselExample" data-slide-to="2"></li>
      </ol>
  <div class="carousel-inner ">

    <?php for($i = 0; $i < count($rewards); $i++) : ?>
    <div class="carousel-item <?php if($i == 0) echo 'active'; ?> ">
      <div class="row">
        <div class="col-6">
          <img class="d-inline-block " style=" width:100%; height: 560px!important; background-color: #999b9b; border-radius: 10px 0px 0px 10px; " src="<?php echo $rewards[$i]->image; ?> " alt="First slide">
        </div>
        <div class="col-6 d-flex align-items-center">
          <div>
            <p style="font-weight: 300; font-size: 2.8em; font-family: 'Roboto', sans-serif; color: rgb(122, 122, 122); ">Reward <?php echo ($i+1); ?></p>
            <p class="lead" style="color: rgb(122, 122, 122); "><?php echo $rewards[$i]->description; ?></p>
                
               
                 <div class="input-group mb-3">
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <input type="hidden" name="userId" value="<?php echo $_SESSION['user_profile_info']->id; ?>">
                  <input type="hidden" name="rewardId" value="<?php echo $rewards[$i]->id ?>">
                  <input type="hidden" name="rewardPoint" value="<?php echo $rewards[$i]->point ?>">
                  <button type="submit" name="sendReward"class="btn btn-primary btn-lg  px-5  mt-5 ">Get it Now</button> 
                  </form>

               <h2 class="mt-5 ml-5 px-5 text-primary" ><?php echo $rewards[$i]->point; ?></h2>
                </div>
                <p style="color: rgb(122, 122, 122); ">Taken by : <?php echo $rewards[$i]->takenby; ?></p>
            </div>
        </div>
      </div>
    </div>
    <?php endfor; ?>

  </div>



    

    
  
  <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev" >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>



  <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>


</body>
</html>
