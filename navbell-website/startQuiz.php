<?php
  error_reporting(0);
  session_start();
  $_SESSION ['refreshCount']++;
  if($_SESSION['refreshCount'] != 1) {
    header('location: main.php');
  }
  include('./functions/functions.php');
  include('pages/main/get_profile_info.php');
  include('pages/startQuiz/makeQuestionsTable.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Quiz</title>

    <script src="jquery-3.3.1.js"></script>

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
  </head>

  <body>
    <!-- MAIN NAVBAR -->
       <nav class="navbar navi navbar-expand-md navbar-light fixed-top py-1" role="navigation">
          <div class="container ">
            <a href="index.php" class="navbar-brand">
                <img src="img/navlogo.png" width="70" height="35" />
                <h3 class="d-inline align-middle">NavBel</h3>
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
                    <!-- <a href="" class="dropdown-item"> -->
                      <!-- <i class="fas fa-user-circle"></i> -->
                      <button type="submit" name="get_profile_info" class="dropdown-item">Profile</button>
                    <!-- </a> -->
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


    <div id="container">
      <div id="start">Start</div>

      
      <div id="quiz" style="display: none">
        <div id="question"></div>
        <div id="qImg"></div>


        <div id="choices">
          <!-- <div class="choice" id="A" onclick="checkAnswer('A')"></div>
          <div class="choice" id="B" onclick="checkAnswer('B')"></div>
          <div class="choice" id="C" onclick="checkAnswer('C')"></div> -->
        </div>


        <div id="timer">
          <div id="counter"></div>
          <div id="btimeGauge"></div>
          <div id="timeGauge"></div>
        </div>
        

        <div id="progress"></div>
      </div>


      <div id="scoreContainer" style="display: none"></div>
    </div>
    <!-- <script src="quiz.js"></script> -->
    <?php
      include 'quiz.php';
    ?>


  </body>
</html>
