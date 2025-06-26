<?php if(!class_exists("View", false)) exit("no direct access allowed");?><style>
    .scrolled.awake div#logo{
        background-image:url(<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/images/logo.png);
        background-repeat: no-repeat;
        background-size: 50px 22px;
    }
    .ftco-navbar-light div#logo{
        background-image:url(<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/images/logo_white.png);
        background-repeat: no-repeat;
        background-size: 50px 22px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
            <a class="navbar-brand" style="padding-left:5px;" href="index.html"><!--<i class="flaticon-cross"></i>--> <div id="logo" style="position:absolute;top:5px;left:0px;margin-top:2px;width:50px;height:22px;" ></div><span style="font-size:16px;margin-left:50px;">天糧書室</span> <span style="font-size:12px;margin-left:50px;">Manna Book Store</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?php if ($cur_nav==0) : ?>active<?php endif; ?>"><a href="index.html" class="nav-link">主頁</a></li>
	          <li class="nav-item <?php if ($cur_nav==1) : ?>active<?php endif; ?>"><a href="<?php echo url(array('c'=>'main', 'a'=>'categoryView', 'id'=>'1', ));?>" class="nav-link">新書介紹</a></li>
	          <li class="nav-item <?php if ($cur_nav==2) : ?>active<?php endif; ?>"><a href="<?php echo url(array('c'=>'main', 'a'=>'categoryView', 'id'=>'2', ));?>" class="nav-link">倪柝聲弟兄</a></li>
	          <li class="nav-item <?php if ($cur_nav==3) : ?>active<?php endif; ?>"><a href="<?php echo url(array('c'=>'main', 'a'=>'categoryView', 'id'=>'3', ));?>" class="nav-link">江守道弟兄</a></li>
	          <li class="nav-item <?php if ($cur_nav==4) : ?>active<?php endif; ?>"><a href="<?php echo url(array('c'=>'main', 'a'=>'categoryView', 'id'=>'4', ));?>" class="nav-link">王國顯弟兄</a></li>
              <li class="nav-item <?php if ($cur_nav==5) : ?>active<?php endif; ?>"><a href="<?php echo url(array('c'=>'main', 'a'=>'categoryView', 'id'=>'5', ));?>" class="nav-link">福音小冊子</a></li>
              <li class="nav-item <?php if ($cur_nav==6) : ?>active<?php endif; ?>"><a href="<?php echo url(array('c'=>'main', 'a'=>'categoryView', 'id'=>'6', ));?>" class="nav-link">其他</a></li>
	          <li class="nav-item <?php if ($cur_nav==7) : ?>active<?php endif; ?>"><a href="<?php echo url(array('c'=>'main', 'a'=>'contact', ));?>" class="nav-link">聯絡我們</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>