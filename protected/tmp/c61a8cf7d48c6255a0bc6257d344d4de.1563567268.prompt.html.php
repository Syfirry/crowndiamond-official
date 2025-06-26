<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en-gb" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en-gb" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en-gb" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
<title>信息提示 | Mannabook Store - 天糧書室</title>
<?php include $_view_obj->compile('frontend/default/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($common['cssfolder'], ENT_QUOTES, "UTF-8"); ?>/general.css">
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($common['cssfolder'], ENT_QUOTES, "UTF-8"); ?>/iconfont/iconfont.css">
<!-- jQuery -->
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/bootstrap.min.js"></script>
<script type="text/javascript">
var countdown = <?php echo htmlspecialchars($rs['time'], ENT_QUOTES, "UTF-8"); ?>;
$(function(){
  $('#countdown').text(countdown);
  window.setInterval(redirect, 1000); 
})  

function redirect(){
  if(countdown <= 0) {window.clearInterval();return;}
  countdown --;
  $('#countdown').text(countdown);
  if (countdown == 0){
    window.location.href = '<?php echo $rs['redirect']; ?>';
  }
}
</script>
<style type="text/css">
div.prompt_outer{margin:50 auto;height:auto;text-align:center;}
div.banner {width:100%;margin:0 auto;text-align:center;}
div.banner .logo{display:block;width:200px;height:90px;margin:0 auto;font-size:0;background:url('<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/images/logo.png') no-repeat center 0;}
</style>
</head>
<body id="default" class="default">
<div class="prompt_outer">
  <div class="banner">
    <div class="logo">Mannabook Store</div>
    <h2 style="margin-top:10px;">天糧書室</h2>
    <p style="margin-top:8px;">MANNABOOK STORE</p>
  </div>
  <div>
    <h1 style="color:#000;">系统提示</h1>
    <h3 class="<?php echo htmlspecialchars($rs['type'], ENT_QUOTES, "UTF-8"); ?>"><font style="color:#f00;"><?php if (is_array($rs['text'])) : ?><?php $_foreach_v_counter = 0; $_foreach_v_total = count($rs['text']);?><?php foreach( $rs['text'] as $v ) : ?><?php $_foreach_v_index = $_foreach_v_counter;$_foreach_v_iteration = $_foreach_v_counter + 1;$_foreach_v_first = ($_foreach_v_counter == 0);$_foreach_v_last = ($_foreach_v_counter == $_foreach_v_total - 1);$_foreach_v_counter++;?><?php echo htmlspecialchars($v, ENT_QUOTES, "UTF-8"); ?><br />
        <?php endforeach; ?><?php else : ?><?php echo htmlspecialchars($rs['text'], ENT_QUOTES, "UTF-8"); ?><?php endif; ?></font>
    </h3>
    <br />
    <p class="c999 mt15">系统将在 <span id="countdown"><?php echo htmlspecialchars($rs['time'], ENT_QUOTES, "UTF-8"); ?></span> 秒后自动跳转到系统指定页面</p>
    <p class="mt15"><a href="<?php echo $rs['redirect']; ?>">如果浏览器没有自动跳转，请点击这里</a></p>
  </div>
</div>
</body>
</html>