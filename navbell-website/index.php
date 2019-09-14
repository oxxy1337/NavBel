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

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    
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
  
  <body  data-spy="scroll" data-target=".fixed-top">
   <!-- Body of  the webPage-->

    <!-- Preloader -->
	  <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
     <!--  Navigation Logo-->
      <a class="navbar-brand logo-image" href="index.php">
        <img src="img/navlogo_min.png"  alt="alternative"></a>
        <!--- Mobile Menu Toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
          
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#features">FEATURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#preview">PREVIEW</a>
                </li>
                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="index.html#details" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">DETAILS</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->
                <li class="nav-item ">
                    <a class="nav-link page-scroll" href="#contact">CONTACT</a>
                </li>
                <li class="nav-item">
              <a  href="#loginModal"  class="nav-link" data-toggle="modal" data-target="#loginModal" >Log in</a>
            </li>
            <li class="nav-item">
              <a href="#signupModal" class="nav-link" data-toggle="modal" data-target="#signupModal">Sign up</a>
            </li>
                 
            </ul>
            
        </div>
    
    </nav>
   <!-- End Of the nav Bar -->

<!-- Header -->
<header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1>MOBILE APP <br>FOR <span id="js-rotating">STUDENTS , TEACHERS , ESISTES</span></h1>
                            <p class="p-large">Navbel is an application designed for esi students and teachers , if you want to be successful in esi just download it</p>
                            <a class="btn-solid-lg page-scroll" href="#your-link"><i class="fab fa-google-play"></i>PLAY STORE</a>
                        </div>
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="img/navbel-header.png" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


 <!-- Testimonials -->
 <div class="slider-1">

        <div class="container">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>CREW MEMBERS</h2>
                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="img/akram.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-author">Akram Boutouchent - Android developer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="img/sifo.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-author">Hasnaoui Seyfeddine - Designer & Business Manager  </p>
                                        </div>
                                    </div>        
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="img/slamat.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-author">Slamat Mohamed Souhaib - Backend Developer & Security analysit</p>
                                        </div>
                                    </div>        
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="img/moussa.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-author">Khodja Moussa - Web Developer</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="img/djawed.jpeg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-author">Benahmed Djawed - Android Developer</p>
                                        </div>
                                    </div>        
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="img/testimonial-6.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-author">Sara Hasbellaoui - Web Developer</p>
                                        </div>
                                    </div>        
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
                            
                            </div> <!-- end of swiper-wrapper -->
        
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
        
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of testimonials -->



     <!-- Features -->
     <div id="features" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>FEATURES</h2>
                    <div class="p-heading p-large">Leno was designed based on input from students from esi and teachers</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">

                <!-- Tabs Links -->
                <ul class="nav nav-tabs" id="lenoTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-cog"></i>LEARNING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-binoculars"></i>CHALLENGING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-search"></i>WINNING</a>
                    </li>
                </ul>
                <!-- end of tabs links -->


                <!-- Tabs Content-->
                <div class="tab-content" id="lenoTabsContent">
                    
                    <!-- Tab -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                        <div class="container">
                            <div class="row">
                                
                                <!-- Icon Cards Pane -->
                                <div class="col-lg-4">
                                    <div class="card left-pane first">
                                        <div class="card-body">
                                            <div class="text-wrapper">
                                                <h4 class="card-title">Goal Setting</h4>
                                                <p>Like any self improving process, everything starts with setting your goals and committing to them</p>
                                            </div>
                                            <div class="card-icon">
                                                <i class="far fa-compass"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card left-pane">
                                        <div class="card-body">
                                            <div class="text-wrapper">
                                                <h4 class="card-title">Visual Editor</h4>
                                                <p>Leno provides a well designed and ergonomic visual editor for you to edit your notes and input data</p>
                                            </div>
                                            <div class="card-icon">
                                                <i class="far fa-file-code"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card left-pane">
                                        <div class="card-body">
                                            <div class="text-wrapper">
                                                <h4 class="card-title">Refined Options</h4>
                                                <p>Each option packaged in the app's menus is provided in order to improve your personal development status</p>
                                            </div>
                                            <div class="card-icon">
                                                <i class="far fa-gem"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of icon cards pane -->

                                <!-- Image Pane -->
                                <div class="col-lg-4">
                                    <img class="img-fluid" src="img/5.png" alt="alternative">
                                </div>
                                <!-- end of image pane -->
                                
                                <!-- Icon Cards Pane -->
                                <div class="col-lg-4">
                                    <div class="card right-pane first">
                                        <div class="card-body">
                                            <div class="card-icon">
                                                <i class="far fa-calendar-check"></i>
                                            </div>
                                            <div class="text-wrapper">
                                                <h4 class="card-title">Calendar Input</h4>
                                                <p>Schedule your appointments, meetings and periodical evaluations using the provided in-app calendar option</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card right-pane">
                                        <div class="card-body">
                                            <div class="card-icon">
                                                <i class="far fa-bookmark"></i>
                                            </div>
                                            <div class="text-wrapper">
                                                <h4 class="card-title">Easy Reading</h4>
                                                <p>Reading focus mode for long form articles, ebooks and other materials which involve large text areas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card right-pane">
                                        <div class="card-body">
                                            <div class="card-icon">
                                                <i class="fas fa-cube"></i>
                                            </div>
                                            <div class="text-wrapper">
                                                <h4 class="card-title">Good Foundation</h4>
                                                <p>Get a solid foundation for your self development efforts. Try Leno mobile app for any mobile platform</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of icon cards pane -->

                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                    <!-- Tab -->
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                        <div class="container">
                            <div class="row">

                                <!-- Image Pane -->
                                <div class="col-md-4">
                                    <img class="img-fluid" src="img/6.png" alt="alternative">
                                </div>
                                <!-- end of image pane -->
                                
                                <!-- Text And Icon Cards Area -->
                                <div class="col-md-8">
                                    <div class="text-area">
                                        <h3>Track Result Based On Your</h3>
                                        <p>After you've configured the app and settled on the data gathering techniques you can not start the information trackers and start collecting those <a class="turquoise" href="#your-link">interesting details</a>. You can always change them.</p>
                                    </div> <!-- end of text-area -->
                                    
                                    <div class="icon-cards-area">
                                            <div class="card">
                                                <div class="card-icon">
                                                    <i class="fas fa-cube"></i>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title">Good Foundation</h4>
                                                    <p>Get a solid foundation for your self development efforts. Try Leno mobile app for any mobile platform</p>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-icon">
                                                    <i class="far fa-bookmark"></i>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title">Easy Reading</h4>
                                                    <p>Reading focus mode for long form articles, ebooks and other materials which involve large text areas</p>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-icon">
                                                    <i class="far fa-calendar-check"></i>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title">Calendar Input</h4>
                                                    <p>Schedule your appointments, meetings and periodical evaluations using the provided in-app calendar option</p>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-icon">
                                                    <i class="far fa-file-code"></i>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title">Visual Editor</h4>
                                                    <p>Leno provides a well designed and ergonomic visual editor for you to edit your notes and input data</p>
                                                </div>
                                            </div>
                                    </div> <!-- end of icon cards area -->
                                </div> <!-- end of col-md-8 -->
                                <!-- end of text and icon cards area -->

                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                    <!-- Tab -->
                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                        <div class="container">
                            <div class="row">

                                <!-- Text And Icon Cards Area -->
                                <div class="col-md-8">
                                    <div class="icon-cards-area">
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="far fa-calendar-check"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Calendar Input</h4>
                                                <p>Schedule your appointments, meetings and periodical evaluations using the provided in-app calendar option</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="far fa-file-code"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Visual Editor</h4>
                                                <p>Leno provides a well designed and ergonomic visual editor for you to edit your notes and input data</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="fas fa-cube"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Good Foundation</h4>
                                                <p>Get a solid foundation for your self development efforts. Try Leno mobile app for any mobile platform</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="far fa-bookmark"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Easy Reading</h4>
                                                <p>Reading focus mode for long form articles, ebooks and other materials which involve large text areas</p>
                                            </div>
                                        </div>
                                    </div> <!-- end of icon cards area -->
                                    
                                    <div class="text-area">
                                        <h3>Monitoring Tools Evaluation</h3>
                                        <p>Monitor the evolution of your finances and health state using tools integrated in Leno. The generated real time reports can be filtered based on any <a class="turquoise" href="#your-link">desired criteria</a>.</p>
                                    </div> <!-- end of text-area -->
                                </div> <!-- end of col-md-8 -->
                                <!-- end of text and icon cards area -->

                                <!-- Image Pane -->
                                <div class="col-md-4">
                                    <img class="img-fluid" src="img/9.png" alt="alternative">
                                </div>
                                <!-- end of image pane -->
                                    
                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div><!-- end of tab-pane -->
                    <!-- end of tab -->

                </div> <!-- end of tab-content -->
                <!-- end of tabs content -->

            </div> <!-- end of row --> 
        </div> <!-- end of container --> 
    </div> <!-- end of tabs -->
    <!-- end of features -->

    <!-- Video -->
    <div id="preview" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>PREVIEW</h2>
                    <div class="p-heading p-large">Target the right customers for your business with the help of Leno's patented segmentation technology</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Video Preview -->
                    <div class="image-container">
                        <div class="video-wrapper">
                            <a class="popup-youtube" href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-effect="fadeIn">
                                <img class="img-fluid" src="img/video-frame.jpg" alt="alternative">
                                <span class="video-play-button">
                                    <span></span>
                                </span>
                            </a>
                        </div> <!-- end of video-wrapper -->
                    </div> <!-- end of image-container -->
                    <!-- end of video preview -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of video -->


    <!-- Details 1 -->
    <div id="details" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-fluid" src="img/details-1-iphone.png" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h3>Goals Setting</h3>
                        <p>Leno can easily help you track your personal development evolution if you take the time to properly setup your goals at the beginning of the training process. Check out the details</p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">LIGHTBOX</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->


    <!-- Details 2 -->
    <div class="basic-3">
        <div class="second">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h3>Calendar Input</h3>
                            <p>The calendar input function enables the user to setup training, meditation and relaxation sessions with ease. Just open the feature and start setting up your time as you desire</p>
                            <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-2">LIGHTBOX</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <img class="img-fluid" src="img/details-2-iphone.png" alt="alternative">
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of second -->
    </div> <!-- end of basic-3 -->    
    <!-- end of details 2 -->

      <!-- Details Lightboxes -->
	<!-- Lightbox -->
	<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-lg-6">
				<img class="img-fluid" src="img/details-lightbox-1.png" alt="alternative">
			</div>
			<div class="col-lg-6">
				<h3>Goals Setting</h3>
				<hr>
                <p>Leno can easily help you track your personal development evolution if you take the time to set it up.</p>
                <h4>User Feedback</h4>
                <p>This is a great app which can help you save time and make your live easier. And it will help improve your productivity levels.</p>
                <p>You should definitely give it a try when you need a good app.</p>
				<table>
					<tr><td class="icon-cell"><i class="fas fa-desktop"></i></td><td>Responsive layout</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-bullhorn"></i></td><td>Distinctive CTAs</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-image"></i></td><td>Image gallery slider</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-envelope"></i></td><td>Contact forms</td></tr>
					<tr><td class="icon-cell"><i class="fab fa-font-awesome-flag"></i></td><td>FontAwesome icons</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-code"></i></td><td>Well-structured code</td></tr>
				</table>
				<a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#details">BACK</a> 
			</div>
		</div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->



    <!-- Lightbox -->
    <div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
		<div class="row">
			<button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
			<div class="col-lg-6">
				<img class="img-fluid" src="img/details-lightbox-2.png" alt="alternative">
			</div>
			<div class="col-lg-6">
				<h3>Calendar Input</h3>
				<hr>
                <p>The calendar input function enables the user to setup training, meditation and relaxation sessions with ease.</p>
                <h4>User Feedback</h4>
                <p>This is a great app which can help you save time and make your live easier. And it will help improve your productivity levels.</p>
                <p>You should definitely give it a try when you need a good app.</p>
				<table>
					<tr><td class="icon-cell"><i class="fas fa-desktop"></i></td><td>Responsive layout</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-bullhorn"></i></td><td>Distinctive CTAs</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-image"></i></td><td>Image gallery slider</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-envelope"></i></td><td>Contact forms</td></tr>
					<tr><td class="icon-cell"><i class="fab fa-font-awesome-flag"></i></td><td>FontAwesome icons</td></tr>
					<tr><td class="icon-cell"><i class="fas fa-code"></i></td><td>Well-structured code</td></tr>
				</table>
				<a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#details">BACK</a>
			</div>
		</div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
    <!-- end of details lightboxes -->



 <!-- Screenshots -->
 <div class="slider-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-1.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/1.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-2.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/2.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-3.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/3.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-4.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/4.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-5.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/5.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-6.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/6.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-7.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/7.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-8.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/8.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <a href="img/screenshot-9.png" class="popup-link" data-effect="fadeIn">
                                        <img class="img-fluid" src="img/9.png" alt="alternative">
                                    </a>
                                </div>
                                <!-- end of slide -->
                                
                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-2 -->
    <!-- end of screenshots -->

        <!-- Download -->
    <div class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h2>Download <span class="blue">Leno</span></h2>
                        <p class="p-large">Target the right customers for your business with the help of Leno's patented technology and increase conversion figures in less than 2 weeks</p>
                        <a class="btn-solid-lg" href="#your-link"><i class="fab fa-google-play"></i>PLAY STORE</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src="img/download.png" alt="alternative">
                    </div> <!-- end of img-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of download -->


    <!-- Statistics -->
    <div class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Counter -->
                    <div id="counter">
                        <div class="cell">
                            <div class="counter-value number-count" data-count="231">1</div>
                            <p class="counter-info">Happy Users</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="85">1</div>
                            <p class="counter-info">Issues Solved</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="59">1</div>
                            <p class="counter-info">Good Reviews</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="127">1</div>
                            <p class="counter-info">Case Studies</p>
                        </div>
                    </div>
                    <!-- end of counter -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of statistics -->


    <!-- Contact -->
    <div id="contact" class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>CONTACT</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">Don't hesitate to give us a call or just use the contact form below</li>
                        <li><i class="fas fa-map-marker-alt"></i>École Supérieure en Informatique, BP 73, Bureau de poste EL WIAM, 22016 Sidi Bel Abbés, Algérie</li>
                        <li><i class="fas fa-phone"></i><a class="blue" href="tel:003024630820">+213 779 82 37 56</a></li>
                        <li><i class="fas fa-envelope"></i><a class="blue" href="mailto:office@leno.com">a.boutouchent@esi-sba.dz</a></li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    
                    <!-- Contact Form -->
                    <form id="contactForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">Name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Your message</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I have read and agree to Leno's stated conditions in <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a> 
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form -->
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col">
                        <h4>About Navbel</h4>
                        <p>We want to extract the miraculous abilities that made you come to esi</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Important Links</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Read our <a class="turquoise" href="terms-conditions.html">Terms & Conditions</a>, <a class="turquoise" href="privacy-policy.html">Privacy Policy</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Social Media</h4>
                        <span class="fa-stack">
                            <a href="https://www.facebook.com/akram.boutouchent">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://twitter.com/AkramBoutou">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-google-plus-g fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


<!--
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
      </div>  -->
    
              
    <!-- Login Modal -->
    <div class="modal" tabindex="-1" id="loginModal">
        <div class="modal-dialog">
          <div class="modal-content" id="login-modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="color:black;">Log in</h5>
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
                  <a id="FPModal" href="javascript:void(0)" style="color:blue;">Forgot password?</a>
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
              <h5 class="modal-title" style="color:black;">Log in</h5>
  
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <div class="modal-body">
              <p style="color:black;">
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
              <h5 class="modal-title" style="color:black;">Log in</h5>
  
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
  
            <div class="modal-body">
              <p style="color:black;">
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
              <h5 class="modal-title" style="color:black;">Sign up</h5>
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

                      <!-- the year is returned to you by the API , remove the year choice is an anti cheat stuff -->
                    <!-- <div class="form-group mb-4">
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
                    </div> -->

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
            

    


      <script src="js/jquery.min.js"></script>


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
          <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
  </body>
</html>
