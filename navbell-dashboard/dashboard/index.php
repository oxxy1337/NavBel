<?php
session_start();
error_reporting(0);
/////////////////////////////
// SOME TESTES BEFORE WE BEGING :) (js cant bypass this ;) root-me nah ? ) 
/////////////////////////////
if($_GET["page"]=="logout") unset($_SESSION["logged"]);
if ($_SESSION["logged"] !== 1) die(print("<script>window.location.replace('..');</script>"));

include("../core/fusioncharts.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Nav bell | Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>



<body>

      <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="hidden" name="search"  />

                            </form>
                           
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src='<?php echo $_SESSION["prof_data"]->image;?>' />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION["prof_data"]->fname;?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src='<?php echo $_SESSION["prof_data"]->image;?>'alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION["prof_data"]->fname;?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION["prof_data"]->email;?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                
                                                <div class="account-dropdown__item">
                                                    <a href="?page=settings">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                       ROLE : <?php 
                                                            if ($_SESSION["prof_data"]->isAdmin == true) {
                                                                print "ADMINSTRATOR";
                                                            }else{
                                                                print "ENSIGNANT";
                                                            }
                                                        ?></a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="?page=logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </header>

    <div class="page-wrapper">

        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="?page=main">
                    <img src="images/icon/logo.png"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">

                    <ul class="list-unstyled navbar__list">

    <?php
    if ($_SESSION["prof_data"]->isAdmin == true) {
        print('                        <li class="active has-sub">

<a class="js-arrow" href="#"><i class="fas fa-desktop"></i>Esi Students</a>
<ul class="list-unstyled navbar__sub-list js-sub-list">
<li>
<a href="?page=allstudent">All Students</a>
</li>
<li>
<a href="?page=addstudents">Add Student</a>
</li>
</ul>
</li> <li class="active has-sub"><li>
                            <a href="?page=chlnglist">
                                <i class="far fa-check-square"></i>Challenge List</a>
                        </li>');
                        }
                        ?>
                            <li>
                            <a href="?page=chlngadd">
                                <i class="fas fa-table"></i>Add Challenge</a>
                        </li>
                        
                       
                       
                     
                         <?php
                        if ($_SESSION["prof_data"]->isAdmin == true) {
                            print ('<li>
                            <a href="?page=addemployer">
                                <i class="fa fa-user"></i>Add Employer</a>
                        </li><li>
                            <a href="?page=addreward">
                                <i class="fas fa-calendar-alt"></i>Rewards</a>
                        </li>

                             <li>
                            <a href="?page=mailer">
                                <i class="fa fa-envelope"></i>Send Emails</a>
                        </li>');
                        }
                        ?>
                                  
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-container">


            <?php
                $page = $_GET["page"];
                include("../core/functions/functions.php");
                 
                switch ($page) {
                    case 'chlnglist':
                        include('../core/pages/chlnglist.php');
                        break;
                    case 'chlngadd':
                       include('../core/pages/chlngadd.php');
                        break;
                    case 'qstadd':
                         include('../core/pages/qstadd.php');
                        break;
                    case 'addemployer':
                         include('../core/pages/addemployer.php');
                        break;
                    case 'allstudent':
                        include('../core/pages/allstudent.php');
                        break;
                    case 'addstudents':
                        include('../core/pages/addstudent.php');
                        break;
                    case 'settings':
                        include('../core/pages/settings.php');
                        break;
                    case 'addreward':
                        include('../core/pages/reward.php');
                        break;
                    case 'mailer':
                         include('../core/pages/mailer.php');
                        break;
                    default:
                        include('../core/pages/main.php');
                        break;
                }

 


            ?>
        </div></div></div>
</body>
           





    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>


    <!-- Main JS-->
    <script src="js/main.js"></script>




<!-- end document-->
