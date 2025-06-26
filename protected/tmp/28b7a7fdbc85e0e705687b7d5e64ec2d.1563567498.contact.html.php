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
            <h1 class="mb-4" style="font-size:30px;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">聯絡我們</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="<?php echo url(array('c'=>'main', 'a'=>'index', ));?>" class="btn btn-primary btn-outline-white px-4 py-3">回首頁</a></p>
          </div>
        </div>
      </div>
    </section>
        
    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container bg-light">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">聯絡我們</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> 105-3751 Jacombs Road Richmond, BC V6V 3R4</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">(604)303-1102</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@mannabook.com">info@mannabook.com
</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="<?php echo url(array('c'=>'main', 'a'=>'index', ));?>">mannabook.com</a></p>
          </div>
        </div>
        <div class="row block-9">
            <p style="padding-left:12px;color:#f00;"><strong>如果您需要購買書籍，請填寫下面的表格，包括您的姓名，電郵地址，所需書籍名稱等信息，點擊SendMessage按鈕</strong></p>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form name="contact-form" method="POST" action="<?php echo url(array('c'=>'main', 'a'=>'contact', 'step'=>'submit', ));?>">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" name="message" class="form-control" placeholder="請注明您所需購買的書籍名稱"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6" id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2607.6551745723928!2d-123.08276308431395!3d49.188129579321185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548675a0ab1b8b59%3A0xf8b03e37091e8e6f!2s105+Jacombs+Rd%2C+Richmond%2C+BC+V6V+2R4!5e0!3m2!1sen!2sca!4v1563256327257!5m2!1sen!2sca" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/google-map.js"></script>-->
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/main.js"></script>
    
  </body>
</html>