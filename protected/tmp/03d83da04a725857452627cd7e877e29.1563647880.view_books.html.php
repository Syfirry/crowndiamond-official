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

    <section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/images/store_bg.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
			<div class="overlay js-fullheight"></div>
			<a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=5m--ptwd_iII',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:false, startAt:0, opacity:1, quality:'default'}"></a>
			<div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" style="font-size:30px;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo htmlspecialchars($cate_name, ENT_QUOTES, "UTF-8"); ?></h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="<?php echo url(array('c'=>'main', 'a'=>'index', ));?>" class="btn btn-primary btn-outline-white px-4 py-3">返回首頁</a></p>
          </div>
        </div>
      </div>
    </section>

    
	
 
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-6 text-center heading-section ftco-animate">
            <span class="subheading">我們的服事</span>
            <h2 class="mb-4">提供中英文屬靈書籍，服事各地聖徒、慕道朋友｡</h2>
            <!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>-->
          </div>
        </div>
        <?php $_foreach_row_counter = 0; $_foreach_row_total = count($rows);?><?php foreach( $rows as $row ) : ?><?php $_foreach_row_index = $_foreach_row_counter;$_foreach_row_iteration = $_foreach_row_counter + 1;$_foreach_row_first = ($_foreach_row_counter == 0);$_foreach_row_last = ($_foreach_row_counter == $_foreach_row_total - 1);$_foreach_row_counter++;?>
        <div class="row">
            <?php $_foreach_col_counter = 0; $_foreach_col_total = count($row);?><?php foreach( $row as $col ) : ?><?php $_foreach_col_index = $_foreach_col_counter;$_foreach_col_iteration = $_foreach_col_counter + 1;$_foreach_col_first = ($_foreach_col_counter == 0);$_foreach_col_last = ($_foreach_col_counter == $_foreach_col_total - 1);$_foreach_col_counter++;?>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="media-body p-2 mt-3" style="text-align:left;">
                <img src="<?php if (!empty($col['book_image'])) : ?><?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/upload/books/prime/0/<?php echo htmlspecialchars($col['book_image'], ENT_QUOTES, "UTF-8"); ?><?php else : ?><?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/images/default_book.png<?php endif; ?>" style="width:100%;height:250px;" />
                <p style="margin-top:5px;margin-bottom:0px;padding-left:2px;">作者：<?php echo htmlspecialchars($col['author'], ENT_QUOTES, "UTF-8"); ?></p>
                <p style="margin-top:0px;padding-left:2px;">价格：<?php echo htmlspecialchars($col['display_price'], ENT_QUOTES, "UTF-8"); ?></p>
              </div>
            </div>      
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </section>

    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2 style="font-size:25px;">訂閱我們的最新消息</h2>
              <p>如果您希望收到我們最新出版的書籍以及在世界各地的屬靈書籍展覽活動，請填寫您的電郵地址：</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-6">
                  <form action="#" class="subscribe-form">
                    <div class="form-group">
                      <span class="icon icon-paper-plane"></span>
                      <input type="text" class="form-control" placeholder="Enter email address">
                    </div>
                  </form>
                </div>
              </div>
            </div>
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