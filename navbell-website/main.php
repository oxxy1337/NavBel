<?php
  include('./functions/functions.php');
  include('pages/main/get_profile_info.php');
  include 'pages/main/challenges.php';// i should include get_challenges not challenges.php this is fake data
  include('./pages/main/start.php');//start the challenge and get the questions from api
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Main</title>

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
  <body class="marg" style="background-color: #f5f5f5;">





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
                <a href="main.php" class="nav-link active">Main</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown mr-3">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-user"></i> Welcome user

                </a>
                <div class="dropdown-menu">
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- <a href="" class="dropdown-item"> -->
                      <i class="fas fa-user-circle">
                      </i> <button type="submit" name="get_profile_info" >Profile</button>
                    <!-- </a> -->
                  </form>

                  <a href="settings.html" class="dropdown-item">
                      <i class="fas fa-cog">
                      </i> Settings
                    </a>
                </div>
              </li>
              <li class="nav-item">
                <a href="login.html" class="nav-link">
                  <i class="fas fa-user-times"></i> Log out
                </a>
              </li>
            </ul>


          </div>


        </div>
      </nav>


<!-- MAIN NAVBAR -->       






<!-- FILTER NAVBAR -->
    <nav class="navbar navi navbar-expand-sm  navbar-light">
      <div class="container">
         <a href="" class="navbar-brand text-monospace mr-5">Filter by: </a>
          
        <form class="form-row" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

          
              <label class="my-2 col-xl-1 text-monospace" for="inlineFormCustomSelectMod text-muted">Module </label>
             
              <select class="my-3 custom-select mr-2 col-xl-1" id="inlineFormCustomSelectMod" name="module">
                <option selected value="all">None</option>
                <option value="math">Math</option>
                <option value="physics">Physics</option>
                <option value="poo">Poo</option>
              </select>
            
          
            
              
            <label for="" class="my-2 col-xl-1 text-monospace text-muted" >Minimum points </label>
            <input class="form-control my-3 mr-2 col-xl-1" type="text" id="minpoints"name="min_points" value=0 >
          
          

           
              <label for="" class="my-2 col-xl-1 text-monospace text-muted" >Maximum points </label>
              <input class="form-control my-3 mr-2 col-xl-1" type="text" id="maxpoints" name="max_points" value=1000>
            

              
                <label for="" class="my-2 mr-3 col-xl-1 text-monospace text-muted" >Minimum questions </label>
                <input class="form-control my-3 mr-2 col-xl-1" type="text" id="minquestions" name="min_questions" value=1>
              

              
                  <label for="" class="my-2 mr-3 col-xl-1 text-monospace text-muted">Maximum questions </label>
                  <input class="form-control my-3 mr-3 col-xl-1" type="text" id="maxquestions" name="max_questions" value=50>
             
    
                  <div class="my-3 col-xl-1">
          <button class="btn btn-light " type="submit" name="filter">Apply</button>
        </div>
        

      </form>
          
          
      </div>
  </nav>
<!-- FILTER NAVBAR -->






<!-- CARD SLIDER/CAROUSEL -->
<!-- The resources are links that I haven't styled yet, because there aren't any yet-->
<!-- The info about the challenge is probably going to be styled differently than the current one which isn't styled at all-->
<!--the padding is controlled using: py in .container-fluid and ml in .card-->
<div class="container-fluid py-5">
<div class="row ">
  <div class="col-sm-12 ">
    <div id="inam" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">






        <?php if(isset($_POST['filter'])) {
          if($_POST['module'] == 'all') {
            $i = 0;// the first position in the $challenges array
            $stop = false;
            while(!$stop) :
          ?>
            <div class="carousel-item <?php if($i == 0) echo 'active'; ?>">
              <div class="container">
                <div class="row">



                  <?php
                    $k = 0;
                    while($k < 3 && $i < count($challenges)) : // untill showing 3 challenges or reaching the end of the array
                  ?>
                  
                    <?php 
                      if($challenges[$i]->point >= $_POST['min_points'] && $challenges[$i]->point <= $_POST['max_points'] && $challenges[$i]->nbOfQuestions >= $_POST['min_questions'] && $challenges[$i]->nbOfQuestions <= $_POST['max_questions']) : 
                    ?>


                      <div class="col-sm-12 col-lg-4">
                        <div class="card ml-4" style="width: 20rem; height: 27rem;">
                          <img src="img/mcomp.jpg" class=" card-img-top"alt="" style="width: 318px; height: 153px;">
                          <div class="card-body">
                            <h4 class="card-title">
                              <?php echo $challenges[$i]->module; ?>
                            </h4>
                            <p class="card-text">
                              <?php 
                                if(strlen($challenges[$i]->story) <= 30) {
                                  echo $challenges[$i]->story;
                                }
                               ?>
                            </p>
                            
                            <p class="text-center text-muted text-monospace "><?php echo $challenges[$i]->point; ?> points | <?php echo $challenges[$i]->nbPersonSolved; ?>/5  | <?php echo $challenges[$i]->nbOfQuestions; ?> questions </p>
                            
                          </div>
                          <div class="card-footer ">
                            <form action="challenge_discription.php" method="post">
                              <!-- <button type="button" class="btn btn-outline-primary"><a href="<?php echo $challenges[$i]->resource[0]->url; ?>">Resources</a></button> --> 
                              <input type="hidden" name="id" value="<?php echo $challenges[$i]->id; ?>"> 
                          <!-- <button type="submit" name="start" class="btn btn-primary " style="margin-left: 117px;">Start</button> -->
                          <button type="submit" class="btn btn-outline-primary">Show discription</button> 
                            </form>
                          </div>

                        </div>
                      </div> <!--class="col-sm-12 col-lg-4"-->


                    <?php
                      $k++; // a challenge have been displayed
                      endif; 
                    ?>
                  
                    <?php 
                      $i++;
                      endwhile; 

                      // determine if there is more challenges which satisfies the filter condition to not create an empty slide
                      $j = $i;
                      $there_is_more = false;
                      while($j < count($challenges) && !$there_is_more) {
                        if($challenges[$j]->point >= $_POST['min_points'] && $challenges[$j]->point <= $_POST['max_points'] && $challenges[$j]->nbOfQuestions >= $_POST['min_questions'] && $challenges[$j]->nbOfQuestions <= $_POST['max_questions']){
                          $there_is_more = true;
                        }
                        $j++;
                      }

                      if($i >= count($challenges) || !$there_is_more) {// gets out of the outer boucle while
                        $stop = true;
                      }
                    ?>
                  



                  
                </div>
              </div>
            </div>
          <?php 
            endwhile;
            } else {// $_POST['module'] != 'all'
              $i = 0;// the first position in the $challenges array
              $stop = false;
              while(!$stop) :
            ?>
            <div class="carousel-item <?php if($i == 0) echo 'active'; ?>">
              <div class="container">
                <div class="row">



                  <?php
                    $k = 0;
                    while($k < 3 && $i < count($challenges)) : // untill showing 3 challenges or reaching the end of the array
                  ?>
                  
                    <?php 
                      if($challenges[$i]->point >= $_POST['min_points'] && $challenges[$i]->point <= $_POST['max_points'] && $challenges[$i]->nbOfQuestions >= $_POST['min_questions'] && $challenges[$i]->nbOfQuestions <= $_POST['max_questions'] && $challenges[$i]->module == $_POST['module']) : 
                    ?>


                      <div class="col-sm-12 col-lg-4">
                        <div class="card ml-4" style="width: 20rem; height: 27rem;">
                          <img src="img/mcomp.jpg" class=" card-img-top"alt="" style="width: 318px; height: 153px;">
                          <div class="card-body">
                            <h4 class="card-title">
                              <?php echo $challenges[$i]->module; ?> 
                            </h4>
                            <p class="card-text">
                              <?php 
                                if(strlen($challenges[$i]->story) <= 30) {
                                  echo $challenges[$i]->story;
                                }
                               ?>
                            </p>
                            
                            <p class="text-center text-muted text-monospace "><?php echo $challenges[$i]->point; ?> points | <?php echo $challenges[$i]->nbPersonSolved; ?>/5  | <?php echo $challenges[$i]->nbOfQuestions; ?> questions </p>
                            
                          </div>
                          <div class="card-footer ">
                            <form action="challenge_discription.php" method="post">
                              <!-- <button type="button" class="btn btn-outline-primary"><a href="<?php echo $challenges[$i]->resource[0]->url; ?>">Resources</a></button>  -->
                              <input type="hidden" name="id" value="<?php echo $challenges[$i]->id; ?>"> 
                          <!-- <button type="submit" name="start" class="btn btn-primary " style="margin-left: 117px;">Start</button> -->
                          <button type="submit" class="btn btn-outline-primary">Show discription</button>
                            </form>
                          </div>

                        </div>
                      </div> <!--class="col-sm-12 col-lg-4"-->


                    <?php
                      $k++; // a challenge have been displayed
                      endif; 
                    ?>
                  
                    <?php 
                      $i++;
                      endwhile; 

                      // determine if there is more challenges which satisfies the filter condition to not create an empty slide
                      $j = $i;
                      $there_is_more = false;
                      while($j < count($challenges) && !$there_is_more) {
                        if($challenges[$j]->point >= $_POST['min_points'] && $challenges[$j]->point <= $_POST['max_points'] && $challenges[$j]->nbOfQuestions >= $_POST['min_questions'] && $challenges[$j]->nbOfQuestions <= $_POST['max_questions'] && $challenges[$j]->module == $_POST['module']){
                          $there_is_more = true;
                        }
                        $j++;
                      }

                      if($i >= count($challenges) || !$there_is_more) {// gets out of the outer boucle while
                        $stop = true;
                      }
                    ?>
                  



                  
                </div>
              </div>
            </div>
          <?php 
            endwhile;
            }  
          } else {// the filter is not submitted which means display every challenge
        
          
            $j = 0;
            while($j < count($challenges)) :
            ?>
            <div class="carousel-item <?php if($j == 0) echo 'active'; ?>">
              <div class="container">
                <div class="row">




                  <?php
                    $i = $j;
                    while($i < $j+3) :
                  ?>
                  <?php if(isset($challenges[$i])) : ?> 
                  <div class="col-sm-12 col-lg-4">
                    <div class="card ml-4" style="width: 20rem; height: 27rem;">
                      <img src="img/mcomp.jpg" class=" card-img-top"alt="" style="width: 318px; height: 153px;">
                      <div class="card-body">
                        <h4 class="card-title">
                          <?php echo $challenges[$i]->module; ?>
                        </h4>
                        <p class="card-text">
                          <?php 
                            if(strlen($challenges[$i]->story) <= 30) {
                              echo $challenges[$i]->story;
                            }
                          ?>
                        </p>
                        
                        <p class="text-center text-muted text-monospace "><?php echo $challenges[$i]->point; ?> points | <?php echo $challenges[$i]->nbPersonSolved; ?>/5  | <?php echo $challenges[$i]->nbOfQuestions; ?> questions </p>
                        
                      </div>
                      <div class="card-footer ">
                        
                        <form action="challenge_discription.php" method="post"> 
                          <!-- <button type="button" class="btn btn-outline-primary"><a href="<?php echo $challenges[$i]->resource[0]->url; ?>">Resources</a></button> --> 
                          <input type="hidden" name="id" value="<?php echo $challenges[$i]->id; ?>"> 
                          <!-- <button type="submit" name="start" class="btn btn-primary " style="margin-left: 117px;">Start</button> -->
                          <button type="submit" class="btn btn-outline-primary">Show discription</button>
                        </form> 
                      </div>

                    </div>
                  </div> <!--class="col-sm-12 col-lg-4"-->
                  <?php endif; ?>
                  <?php
                    $i++;
                    endwhile;
                  ?>



                  
                </div>
              </div>
            </div>
          <?php
            $j += 3;
            endwhile;
            }
          ?>

        

      




























      </div> <!--carousel inner-->

      <a href="#inam" class="carousel-control-prev" data-slide="prev">
        <img src="img/lchevron.png" alt="" style="height:20px; width:20px;">
      </a>

      <a href="#inam" class="carousel-control-next" data-slide="next">
        <img src="img/rchevron.png" alt="" style="height:20px; width:20px;">
      </a>
    </div> <!--class="carousel slide "-->
  </div> <!--col-sm-12-->


</div>
</div>
<!-- CARD SLIDER/CAROUSEL -->







    <script>
      // Get the current year for the copyright
      $('#year').text(new Date().getFullYear());
    </script>
  </body>
</html>
