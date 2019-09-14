<?php
include 'pages/profile_info.php';
    include 'fusioncharts.php';
  include './functions/functions.php';
  $op="solvedChallenge";
  $data  = array("id" => $user_profile_info->id);
  $result = postapi($url ,$op , $data ) ;
$arrChartConfig = array(
    "chart" => array(
        "caption" => "Countries With Most Oil Reserves [2017-18]",
        "subCaption" => "In MMbbl = One Million barrels",
        "xAxisName" => "Country",
        "yAxisName" => "Reserves (MMbbl)",
        "numberSuffix" => "K",
        "theme" => "fusion"
    )
);
// An array of hash objects which stores data
$arrChartData = array(
    ["Venezuela", "290"],
    ["Saudi", "260"],
    ["Canada", "180"],
    ["Iran", "140"],
    ["Russia", "115"],
    ["UAE", "100"],
    ["US", "30"],
    ["China", "30"]
);

$arrLabelValueData = array();

// Pushing labels and values
for($i = 0; $i < count($arrChartData); $i++) {
    array_push($arrLabelValueData, array(
        "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
    ));
}

$arrChartConfig["data"] = $arrLabelValueData;

// JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
$jsonEncodedData = json_encode($arrChartConfig);

// chart object
$Chart = new FusionCharts("column2d", "MyFirstChart" , "700", "400", "chart-container", "json", $jsonEncodedData);

// Render the chart
$Chart->render();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Profile</title>

    <script src="jquery-3.3.1.js"></script>
      <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
      <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
   

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
  <body > <!--Previously: class="body-profile"-->
    <!-- Start Here -->

    <div class="container">

      <!-- MAIN NAVBAR --> 
      <nav class="navbar navi navbar-expand-md navbar-light fixed-top py-1" role="navigation">
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
                  <a href="index.html" class="nav-link">
                    <i class="fas fa-user-times"></i> Log out
                  </a>
                </li>
              </ul>
  
  
            </div>
  
  
          </div>
        </nav>
  
  
  <!-- MAIN NAVBAR -->       

  
      <div class="row profile">
        <div class="col-md-3">
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
              <img
                src="<?php echo $user_profile_info->picture; ?>"
                class="img-responsive"
                alt=""
              />
            </div>
            <!-- END SIDEBAR USERPIC -->

            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                <!-- John Doe -->
                <?php echo $user_profile_info->fname." ".$user_profile_info->lname; ?>
              </div>
              <div class="profile-usertitle-year">
                <!-- 2 CPI -->
                <?php
                  if($user_profile_info->year <= 2) {
                    echo $user_profile_info->year; echo " CPI";
                  } else {
                    echo $user_profile_info->year%3+1; echo " CS"; 
                  } 
                ?>
              </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->

            <!-- SIDEBAR BUTTONS 
            <div class="profile-userbuttons">
              <button type="button" class="btn btn-success btn-sm">
                Follow
              </button>
              <button type="button" class="btn btn-danger btn-sm">
                Message
              </button>
            </div>
             SIDEBAR BUTTONS -->
          </div>
        </div>

        <div class="col-md-9">
          <div class="profile-content">
            <div class="card">
              <div class="card-header text-white bg-primary font-weight-bold">
                Overview
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card p-3 ">
                      <h2>
                        <i class="fas fa-dice"> </i>
                        <!-- 6 -->
                        <?php echo $user_profile_info->nbsolved; ?>
                      </h2>
                      <h4>Challenges</h4>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card p-3">
                      <h2>
                        <i class="fas fa-crown"> </i>
                        <!-- 1200 -->
                        <?php echo $user_profile_info->point; ?>
                      </h2>
                      <h4>Points</h4>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card p-3">
                      <h2>
                        <i class="fas fa-chart-bar "> </i>
                        <!-- 14 -->
                        <?php echo $user_profile_info->currentrank; ?>
                      </h2>
                      <h4>Rank</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">
              With supporting text below as a natural lead-in to additional
              content.
            </p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
      </div>

    </div>
  <div class="container">
      <div id="chart-container">Chart will render here!</div>
  </div>


  <script>
      // Get the current year for the copyright
      $('#year').text(new Date().getFullYear());
    </script>
  </body>
</html>
