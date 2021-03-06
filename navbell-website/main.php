<?php
  error_reporting(0);
  session_start();// i commented all these pages //session_start()
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
      <nav class="navbar navi navbar-expand-md navbar-light fixed-top py-1" role="navigation" style="background-color:white;">
        <div class="container ">
          <a href="index.php" class="navbar-brand" style="text-decoration: none;">
              <img src="img/navlogo.png" width="70" height="35" />
              <h5 class="d-inline align-middle" style="color:black;">NavBel</h5>
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
                <a href="main.php" class="nav-link active" style="text-decoration: none;">Main</a>
              </li>
              <li class="nav-item px-2">
                <a href="rewards.php" class="nav-link active" style="text-decoration: none;">Rewards</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown mr-3">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="text-decoration: none;">
                  <i class="fas fa-user"></i> Welcome user

                </a>
                <div class="dropdown-menu">
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- <a href="" class="dropdown-item"> -->
                      <!-- <i class="fas fa-user-circle"></i> -->
                      <button type="submit" name="get_profile_info" class="dropdown-item" >Profile</button>
                    <!-- </a> -->
                  </form>

                  <a href="settings.php" class="dropdown-item" style="text-decoration: none;">
                      <i class="fas fa-cog">
                      </i> Settings
                    </a>
                </div>
              </li>
              <li class="nav-item">
                <a href="index.php" class="nav-link" style="text-decoration: none;">
                  <i class="fas fa-user-times"></i> Log out
                </a>
              </li>
            </ul>


          </div>


        </div>
      </nav>


<!-- MAIN NAVBAR -->       






<!-- FILTER NAVBAR -->
    <nav class="navbar navi navbar-expand-sm  navbar-light" style="background-color:white;border-bottom: 1px solid black;">
      <div class="container">
         <a href="" class="navbar-brand text-monospace mr-5" style="text-decoration: none;">Filter by: </a>
          
        <form class="form-row" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

          
              <label class="my-2 col-xl-1 text-monospace" for="inlineFormCustomSelectMod text-muted" style="color:black;">Module </label>
              <!-- show modules in filter according to the year -->
             <?php
                if(isset($_SESSION['user_signup_info'])) {
                    $year = $_SESSION['user_signup_info']->year;
                } else if(isset($_SESSION['user_login_info'])) {
                    $year = $_SESSION['user_login_info']->year;
                }
                if($year == 1) :
             ?>
              <select class="my-3 custom-select mr-2 col-xl-1" id="inlineFormCustomSelectMod" name="module">
                <option selected value="all">None</option>
                <option selected value="SYST1">Syst1</option>
                <option selected value="ANGLAIS1">Anglais1</option>
                <option selected value="ALGO1">Algo1</option>
                <option selected value="ELECTRO1">Electro1</option>
                
              </select>
              <?php else : ?>
                <select class="my-3 custom-select mr-2 col-xl-1" id="inlineFormCustomSelectMod" name="module">
                <option selected value="all">None</option>
                <option selected value="ANGLAIS2">Anglais2</option>
                <option selected value="ELECTRO2">Electro2</option>
                <option selected value="POO">Poo</option>
                
              </select>
              <?php endif ;?>
            
          
            
              
            <label for="" class="my-3 col-xl-1 text-monospace text-muted" >Minimum points </label>
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
                      <div
                        class="card ml-1 "
                        style="width: 20rem; height: 28rem;"
                      >
                        <img
                          src="<?php echo $challenges[$i]->url; ?>"
                          class=" card-img-top"
                          alt=""
                          style="width: 318px; height: 153px;"
                        />
                        <div class="card-body">
                          <h4 class="card-title" style="color:black;">
                            <?php echo $challenges[$i]->module; ?>
                          </h4>
                          
                          <p class="text-center text-muted text-monospace ">
                            <?php echo $challenges[$i]->point; ?> points | <?php echo $challenges[$i]->nbPersonSolved; ?>/5 | <?php echo $challenges[$i]->nbOfQuestions; ?> questions
                          </p>
                        </div>
                        <div class="card-footer ">
                          <button
                            onclick="load('<?php echo $challenges[$i]->story; ?>', <?php echo $challenges[$i]->id; ?>)"
                            type="button"
                            class="btn btn-outline-primary"
                            data-toggle="modal"
                            data-target="#moreInfo"
                          >
                            More Info
                          </button>
                          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $challenges[$i]->id;?>">
                          <button
                            name="start"
                            type="submit"
                            class="btn btn-primary "
                            style="margin-left: 105px;"
                          >
                            Start
                          </button>
                          </form>

                          <!-- Make a pop up here to access when clicking on "More Info" containing: 1. Full decription 2. Resources-->

                          <!-- ### Modal ###-->

                          <!-- ### Modal ### -->

                        </div>
                      </div>
                    </div>
                       <!--class="col-sm-12 col-lg-4"-->


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
                      <div
                        class="card ml-1 "
                        style="width: 20rem; height: 28rem;"
                      >
                        <img
                          src="<?php echo $challenges[$i]->url; ?>"
                          class=" card-img-top"
                          alt=""
                          style="width: 318px; height: 153px;"
                        />
                        <div class="card-body">
                          <h4 class="card-title" style="color:black;">
                            <?php echo $challenges[$i]->module; ?>
                          </h4>
                          
                          <p class="text-center text-muted text-monospace ">
                            <?php echo $challenges[$i]->point; ?> points | <?php echo $challenges[$i]->nbPersonSolved; ?>/5 | <?php echo $challenges[$i]->nbOfQuestions; ?> questions
                          </p>
                        </div>
                        <div class="card-footer ">
                          <button
                            onclick="load('<?php echo $challenges[$i]->story; ?>', <?php echo $challenges[$i]->id; ?>)"
                            type="button"
                            class="btn btn-outline-primary"
                            data-toggle="modal"
                            data-target="#moreInfo"
                          >
                            More Info
                          </button>

                          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <input type="hidden" name="id" value="<?php echo $challenges[$i]->id;?>">
                          <button
                            name="start"
                            type="submit"
                            class="btn btn-primary "
                            style="margin-left: 105px;"
                          >
                            Start
                          </button>
                          </form>

                          <!-- Make a pop up here to access when clicking on "More Info" containing: 1. Full decription 2. Resources-->

                          <!-- ### Modal ###-->

                          <!-- ### Modal ### -->

                        </div>
                      </div>
                    </div>
                       <!--class="col-sm-12 col-lg-4"-->


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
                      <div
                        class="card ml-1 "
                        style="width: 20rem; height: 28rem;"
                      >
                        <img
                          src="<?php echo $challenges[$i]->url; ?>"
                          class=" card-img-top"
                          alt=""
                          style="width: 318px; height: 153px;"
                        />
                        <div class="card-body">
                          <h4 class="card-title" style="color:black;">
                            <?php echo $challenges[$i]->module; ?>
                          </h4>
                          
                          <p class="text-center text-muted text-monospace ">
                            <?php echo $challenges[$i]->point; ?> points | <?php echo $challenges[$i]->nbPersonSolved; ?>/5 | <?php echo $challenges[$i]->nbOfQuestions; ?> questions
                          </p>
                        </div>
                        <div class="card-footer ">
                          <button
                            onclick="load('<?php echo $challenges[$i]->story; ?>', <?php echo $challenges[$i]->id; ?>)"
                            type="button"
                            class="btn btn-outline-primary"
                            data-toggle="modal"
                            data-target="#moreInfo"
                          >
                            More Info
                          </button>
                          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $challenges[$i]->id;?>">
                            <button
                              name="start"
                              type="submit"
                              class="btn btn-primary "
                              style="margin-left: 105px;"
                            >
                              Start
                              <!-- the button type  was "button" before i added the form -->
                            </button>
                          </form>

                          <!-- Make a pop up here to access when clicking on "More Info" containing: 1. Full decription 2. Resources-->

                          <!-- ### Modal ###-->

                          <!-- ### Modal ### -->

                        </div>
                      </div>
                    </div>
                   <!--class="col-sm-12 col-lg-4"-->
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

        

      

          <!-- ### More info Modal ###-->

                          <div class="modal" id="moreInfo">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" style="color:blue;">More Info</h3>
                                  <button class="close" data-dismiss="modal">
                                    &times;
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h4>
                                    <strong style="color:black;">
                                      Challenge Description
                                    </strong>
                                  </h4>
                                  <p id="challengeStory" style="color:black;">
                                    the challenge discription
                                  </p>
                                  <hr />
                                  <h4>
                                    <strong style="color:black;">
                                      Resources
                                    </strong>
                                  </h4>
                                  <p style="color:black;" >
                                    Here you can find some useful resources to
                                    not miss out on if you want to have a better
                                    chance at winning the challenge!
                                    <p id="resources" style="color:blue;"></p>
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <button
                                    class="btn btn-outline-primary"
                                    data-dismiss="modal"
                                  >
                                    Close
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <br />
                          <br />

            <!-- ### More info Modal ###-->


            <!-- the script to handle the more info modal -->
            <script type="text/javascript">
              function load(story, id) {
                document.getElementById('challengeStory').innerHTML = story;
                var x = new XMLHttpRequest();
                x.open('GET', './pages/main/get_challenge_resources.php?id='+id);
                x.send();
                x.onreadystatechange = function() {
                  if(this.readyState == 4 && this.status == 200) {
                    var resources = JSON.parse(this.responseText);
                    var i;
                    var resourcesString = '';
                    for(i = 0; i < resources.length; i++) {
                      resourcesString += '<br><a style="color:blue;" href='+resources[i].url+'>'+resources[i].name+'</a>';
                     
                    }
                    document.getElementById('resources').innerHTML = resourcesString;

                  }
                }
              }
            </script>
            <!-- the script to handle the more info modal -->
























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
