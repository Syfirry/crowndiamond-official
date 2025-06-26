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

    
    <!--<link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/flaticon.css">-->
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/icomoon.css">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/frontend/wisdom/style.css">
      
    <script type="text/javascript">
        var url = window.location.href; 
        if (url.indexOf("https") < 0 && !<?php echo htmlspecialchars($is_localhost, ENT_QUOTES, "UTF-8"); ?>) { 
            url = url.replace("http:", "https:"); 
            window.location.replace(url); 
        }
    </script>
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
            <h1 class="mb-4" style="font-size:30px;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">我們的服事<br />提供中英文屬靈書籍，服事各地聖徒、慕道朋友｡</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="<?php echo url(array('c'=>'main', 'a'=>'categoryView', 'id'=>'1', ));?>" class="btn btn-primary btn-outline-white px-4 py-3">新書介紹</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-bible-study">
        <div class="container-wrap">
            <div class="col-md-12 wrap">
              <div class="container">
				<div class="row">
				  <div class="col-md-12 d-md-flex">
					 <div class="one-forth ftco-animate">
				        <h3 style="font-size:25px;">2019美加西岸基督徒追求大会</h3>
				        <p>2019.7.25 ～ 2019.7.28</p>
				     </div>
				     <div class="one-half d-md-flex align-items-md-center ftco-animate">
				        <div class="countdown-wrap">
				          <p class="countdown d-flex">
                            主题：凡愛慕祂顯現的人
                            <br />子题：凡愛慕祂顯現的人(提後四8b) - 江守道弟兄 
追求得公義的冠冕（提後四8a） - 孫國鐸弟兄
直等到基督成形在你們心裏（加四19） - 彭廣純弟兄 
作貴重的器皿(提後二21） - 康登弟兄 
作得勝者(啟二、三章) - 郭定強弟兄
						  </p>
						</div><!--
						<div class="button">
				          <p><a href="#" class="btn btn-primary p-3">书展详情</a></p>
						</div> -->
				     </div>
				  </div>
				</div>
              </div>
            </div>
        </div>
      </section>
<!--
		<section class="ftco-section-2">
      <div class="container-fluid">
        <div class="section-2-blocks-wrapper d-flex row no-gutters">
          <div class="img col-md-6 ftco-animate" style="background-image: url('images/about.jpg');">
            <a href="https://vimeo.com/45830194" class="button popup-vimeo"><span class="ion-ios-play"></span></a>
          </div>
          <div class="text col-md-6 ftco-animate">
            <div class="text-inner align-self-start">
              
              <h3>Loving God, Loving Others and Serving the World</h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
 --> 
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-6 text-center heading-section ftco-animate">
            <span class="subheading">我們的服事</span>
            <h2 class="mb-4">提供中英文屬靈書籍，服事各地聖徒、慕道朋友｡</h2>
          </div>
        </div>
        <div class="row">
          <?php $_foreach_na_counter = 0; $_foreach_na_total = count($newarrival);?><?php foreach( $newarrival as $na ) : ?><?php $_foreach_na_index = $_foreach_na_counter;$_foreach_na_iteration = $_foreach_na_counter + 1;$_foreach_na_first = ($_foreach_na_counter == 0);$_foreach_na_last = ($_foreach_na_counter == $_foreach_na_total - 1);$_foreach_na_counter++;?>
          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon d-flex justify-content-center mb-3"><img src="<?php if (!empty($na['book_image'])) : ?><?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/upload/books/prime/0/<?php echo htmlspecialchars($na['book_image'], ENT_QUOTES, "UTF-8"); ?><?php else : ?><?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/images/default_book.png<?php endif; ?>" style="width:100%;" /><!--<span class="align-self-center flaticon-planet-earth"></span>--></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading"><?php echo htmlspecialchars($na['book_name'], ENT_QUOTES, "UTF-8"); ?></h3>
                <p style="text-align:left;height:200px;"><?php echo strip_tags($na['book_brief']);?></p>
                <p style="text-align:left;">作者：<?php echo htmlspecialchars($na['author'], ENT_QUOTES, "UTF-8"); ?></p>
                <p style="text-align:left;">定價：$<?php echo htmlspecialchars($na['display_price'], ENT_QUOTES, "UTF-8"); ?> CAD</p>
              </div>
            </div>      
          </div>
          <?php endforeach; ?>
        </div>
      </div>
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
                  <form action="<?php echo url(array('c'=>'main', 'a'=>'subscription', 'step'=>'submit', ));?>" method="POST" class="subscribe-form">
                    <div class="form-group">
                      <span class="icon icon-paper-plane"></span>
                      <input type="text" class="form-control" name="email" placeholder="Enter email address">
                    </div>
                    <div class="form-group" style="margin-top:10px;">
                        <input type="submit" value="提 交" class="btn btn-primary form-control py-2 px-5" >
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">書目</span>
            <h2 class="mb-4">查看書目清单</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-4 ftco-animate">
        		<div class="sermons">
                    <div class="text">
        				<h3><a href="#">倪柝聲全集</a></h3>
        				<span class="position">出版：天糧書室</span>
        			</div>
        			<ul>
                        <li>倪柝聲著述全集（卷一）大喜的信息</li>
                        <li>倪柝聲著述全集（卷二）福音真理</li>
                        <li>倪柝聲著述全集（卷三）隱藏的嗎哪</li>
                        <li>倪柝聲著述全集（卷四）在神的家中</li>                     
                        <li>倪柝聲著述全集（卷五）為主而活</li>
                        <li>倪柝聲著述全集（卷六）基督的眾教會</li>
                        <li>倪柝聲著述全集（卷七）基督與教會</li>                    
                        <li>倪柝聲著述全集（卷八）家中當怎樣行</li>                  
                        <li>倪柝聲著述全集（卷九）無愧的工人</li>
                        <li>倪柝聲著述全集（卷十）話語的職事</li> 
                    </ul>
        		</div>
        	</div>
        	<div class="col-md-4 ftco-animate">
        		<div class="sermons">
                    <div class="text">
        				<h3><a href="#">江守道著作</a></h3>
        				<span class="position">出版：天糧書室</span>
        			</div>
        			<ul>
                        <li>主啊,教我們禱告 (四版)</li>
                        <li>神對家庭的旨意 (三版)</li>
                        <li>照著山上的樣式</li>
                        <li>榮美基督的一生</li>                     
                        <li>榮耀教會的見証</li>
                        <li>生命成長藍圖</li>
                        <li>新約啟示的基督</li>                    
                        <li>神前有能– 倪柝聲禱告信息精華選</li>                  
                        <li>靈程指引 – 倪柝聲名著「屬靈人」撮要精選</li>
                        <li>聖徒生活秘訣一倪柝聲信息精選</li> 
                    </ul>
        		</div>
        	</div>
        	<div class="col-md-4 ftco-animate">
        		<div class="sermons">
                    <div class="text">
        				<h3><a href="#">王國顯著作</a></h3>
        				<span class="position">出版：天糧書室</span>
        			</div>
        			<ul>
                        <li>All The Building fitted Together in Him</li>
                        <li>活了....就死了----創世記講經記錄</li>
                        <li>容我的百姓去(上) - 出埃及記講經記錄</li>
                        <li>容我的百姓去(下) - 出埃及記講經記錄</li>                     
                        <li>願袮吸引我- 雅歌</li>
                        <li>在耶和華面前蒙悅納(上) - 利未記講經記錄</li>
                        <li>在耶和華面前蒙悅納(下) - 利未記講經記錄</li>                    
                        <li>得著兒子的名分 - 加拉太書講經記錄</li>                  
                        <li>The Filling of the Holy Spirit in the Bible</li>
                        <li>我必快來 - 啟示錄講經記錄</li> 
                    </ul>
        		</div>
        	</div>
        </div>
        <div class="row mt-5">
        	<div class="col text-center">
        		<p><a href="#" class="btn btn-primary btn-outline-primary p-3">所有書目</a></p>
        	</div>
        </div>
      </div>
    </section>
<!--
    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Read, Get Inspired, and Share Your Story</span>
            <h2 class="mb-4">Testimonies</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Member</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Volunteer</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Pastor</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Guest</span>
                  </div>
                </div>
              </div>
              <div class="item text-center">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Dennis Green</p>
                    <span class="position">Pastor</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-counter" id="section-counter">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2>Church Achievements</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="20254">0</strong>
                <span>Churches around the world</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="4200000">0</strong>
                <span>Members around the globe</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="8600000">0</strong>
                <span>Save life &amp; Donations</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section-2 bg-light">
    	<div class="container-fluid">
    		<div class="row no-gutters d-flex">
    			<div class="col-md-6 img d-flex justify-content-end align-items-center" style="background-image: url(images/event.jpg);">
    				<div class="col-md-7 heading-section text-sm-center text-md-right heading-section-white ftco-animate mr-md-5 mt-md-5">
	            <h2>Our latest events</h2>
	            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
	            <p><a href="#" class="btn btn-primary py-3 px-4">View Events</a></p>
	          </div>
    			</div>
    			<div class="col-md-6">
    				<div class="event-wrap">
	    				<div class="event-entry d-flex ftco-animate">
	    					<div class="meta mr-4">
	    						<p>
	    							<span>07</span>
	    							<span>Aug 2018</span>
	    						</p>
	    					</div>
	    					<div class="text">
	    						<h3 class="mb-2"><a href="events.html">Saturday's Bible Reading</a></h3>
	    						<p class="mb-4"><span>9:00am at 456 NC USA</span></p>
	    						<a href="events.html" class="img" style="background-image: url(images/event-1.jpg);"></a>
	    					</div>
	    				</div>
	    				<div class="event-entry d-flex ftco-animate">
	    					<div class="meta mr-4">
	    						<p>
	    							<span>07</span>
	    							<span>Aug 2018</span>
	    						</p>
	    					</div>
	    					<div class="text">
	    						<h3 class="mb-2"><a href="events.html">Wednesday Gospel Singing</a></h3>
	    						<p class="mb-4"><span>9:00am at 456 NC USA</span></p>
	    						<a href="events.html" class="img" style="background-image: url(images/event-2.jpg);"></a>
	    					</div>
	    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <div><a href="#">July 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="100">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text p-4">
                <div class="meta mb-3">
                  <div><a href="#">July 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="200">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text p-4">
                <div class="meta mb-3">
                  <div><a href="#">July 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
-->
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
<!--
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/google-map.js"></script>
-->
  <script src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/frontend/wisdom/main.js"></script>
    
  </body>
</html>