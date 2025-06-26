<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>天糧書室 -- Mannabook store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/animate.css">
    
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/aos.css">

    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/flaticon.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/icomoon.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/style.css">
  </head>
  <body>
    <!-- Start of Nav -->
    <?php include $_view_obj->compile("frontend/default/lib/nav.html"); ?>
    <!-- END nav -->

    <section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/images/default_bg.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
			<div class="overlay js-fullheight"></div>
			<div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" style="font-size:30px;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">此頁面正在設計中</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="<?php echo url(array('c'=>'main', 'a'=>'index', ));?>" class="btn btn-primary btn-outline-white px-4 py-3">回首頁</a></p>
          </div>
        </div>
      </div>
    </section>

    <?php include $_view_obj->compile("frontend/default/lib/footer.html"); ?>
        
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/popper.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/bootstrap.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.easing.1.3.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.waypoints.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.stellar.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/owl.carousel.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/aos.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.animateNumber.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/bootstrap-datepicker.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.timepicker.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/google-map.js"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/main.js"></script>
    
  </body>
</html>