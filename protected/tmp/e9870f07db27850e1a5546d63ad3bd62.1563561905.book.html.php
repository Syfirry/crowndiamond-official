<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include $_view_obj->compile('admin/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/admin/vfb2b.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/admin/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/admin/products.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/datetimepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/umeditor/themes/default/css/umeditor.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/webupload/webuploader.css" />
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/admin/vfb2b.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/admin/products.js"></script>
<script type="text/javascript">
$(function(){
  $('#tabs').vdsTabsSwitch();
  UM.getEditor('book_brief', {
    textarea:'book_brief', toolbar:['source | fontfamily fontsize forecolor bold link unlink | removeformat']
  });
  
  $('#gim').find('a i').on('click', function(){
    $('#gim').hide().find('img').attr('src', '');
    $('#gimbtns').show();
    $('#gim input[name="products_image"]').val('');
  });
 
});

function submitForm(){ 
  $('#book_name').dbaFieldChecker({rules: {required:[true, '請輸入書籍名稱'], maxlen:[180, '書籍名稱不能超过180个字符']}});
  $('#book_sn').dbaFieldChecker({rules: {maxlen:[20, '書籍货号不能超过20个字符']}});
  $('#display_price').dbaFieldChecker({rules: {required:[true, '请输入展示价格'], decimal:[true, '展示价格不符合格式要求']}});
  $('#goods-form').dbaFormChecker();
}
    
</script>
</head>
<body>
<?php if ($_GET['a'] == 'add') : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>添加新書籍</h2></div>
  <form method="post" enctype="multipart/form-data" action="<?php echo url(array('m'=>$MOD, 'c'=>'books', 'a'=>'add', 'step'=>'submit', ));?>" id="goods-form">
    <input type="hidden" name="<?php echo htmlspecialchars($_SESSION['ADMIN_FORM_TOKEN']['KEY'], ENT_QUOTES, "UTF-8"); ?>" value="<?php echo htmlspecialchars($_SESSION['ADMIN_FORM_TOKEN']['VAL'], ENT_QUOTES, "UTF-8"); ?>" />
    <div class="box">
      <div class="tabs mt5">
        <ul id="tabs">
          <li class="cur">基本信息</li>
          <li>書籍圖片</li>
        </ul>
      </div>
      <!-- 基本信息开始 -->
      <div class="module swcon mt5">
        <table class="dataform">
          <tr>
            <th width="110">書籍名称</th>
            <td><input class="w400 txt" name="book_name" id="book_name" type="text" /></td>
          </tr>
          <tr>
            <th width="110">書籍作者</th>
            <td><input class="w400 txt" name="author" id="author" type="text" /></td>
          </tr>
          <tr>
            <th>書籍货号</th>
            <td><input class="w200 txt" name="book_sn" type="text" /><p class="c999 mt10">长度不应超过20个字符, 留空则系统会按约定规则自动生成货号</p></td>
          </tr>
          <tr>
            <th>新到書籍</th>
            <td><input name="newarrival" type="checkbox" value="1" /><p class="c999 mt10">如果是新到書籍，請打勾</p></td>
          </tr>
          <tr>
            <th>倪柝聲全集</th>
            <td><input name="brother_ni" type="checkbox" value="1" /><p class="c999 mt10">如果属于倪柝聲全集，請打勾</p></td>
          </tr>
          <tr>
            <th>江守道著述</th>
            <td><input name="brother_jiang" type="checkbox" value="1" /><p class="c999 mt10">如果属于江守道著述，請打勾</p></td>
          </tr>
          <tr>
            <th>王國顯著述</th>
            <td><input name="brother_wang" type="checkbox" value="1" /><p class="c999 mt10">如果属于王國顯著述，請打勾</p></td>
          </tr>
          <tr>
            <th>福音小册子</th>
            <td><input name="gospel" type="checkbox" value="1" /><p class="c999 mt10">如果属于福音小册子，請打勾</p></td>
          </tr>
          <tr>
            <th>其他書籍</th>
            <td><input name="others" type="checkbox" value="1" /><p class="c999 mt10">如果属于其他書籍，請打勾</p></td>
          </tr>
          <tr>
            <th>展示价格</th>
            <td><input class="w200 txt" name="display_price" id="display_price" type="text" /><p class="c999 mt10">价格请按此格式填写, 如: "188.00" 或 "8.99"</p></td>
          </tr>
          <tr>
            <th>GST</th>
            <td>
              <div class="pad5">
                <label><input type="radio" name="gst" value="1" /><font class="green ml5">需要收取GST</font></label>
                <label class="ml20"><input type="radio" name="gst" value="0" checked="checked" /><font class="red ml5">无GST</font></label>
              </div>
            </td>
          </tr>
          <tr>
            <th>PST</th>
            <td>
              <div class="pad5">
                <label><input type="radio" name="pst" value="1" /><font class="green ml5">需要收取PST</font></label>
                <label class="ml20"><input type="radio" name="pst" value="0" checked="checked" /><font class="red ml5">无PST</font></label>
              </div>
            </td>
          </tr>
          <tr>
            <th>內容簡介</th>
            <td><script type="text/plain" id="book_brief" style="width:100%;height:100px;"></script></td>
          </tr>
          
          <tr>
            <th>狀態</th>
            <td>
              <div class="pad5">
                <label><input type="radio" name="status" value="1" checked="checked" /><font class="green ml5">上架</font></label>
                <label class="ml20"><input type="radio" name="status" value="0" /><font class="red ml5">下架</font></label>
                <p class="c999 mt10">如狀態選擇下架，前台則不會顯示該書籍</p>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <!-- 基本信息结束 -->
      <!-- 产品图片开始 -->
      <div class="module swcon mt5 hide">
        <table class="dataform">
          <tr>
            <th width="110">主要图片</th>
            <td>
              <div class="gim pad5 unslt cut hide" id="gim"><a><img src="" /><i>×</i></a><input type="hidden" name="products_image" value="" /></div>
              <div class="pad5 cut" id="gimbtns">
                <a class="dashedbtn" onclick="popUploadImg()">+上传新图片</a>
                <span class="sep20"></span>
                <a class="dashedbtn" onclick="popImgList('prime')">选择图库中已有图片</a>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <!-- 商品图片结束 -->
      <div class="submitbtn">
        <button type="button" class="ubtn btn" onclick="submitForm()">保存并提交</button>
        <button type="reset" class="fbtn btn">重置表单</button>
      </div>
    </div>
  </form>
</div>
<?php else : ?>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>編輯書籍信息</h2></div>
  <form method="post" enctype="multipart/form-data" action="<?php echo url(array('m'=>$MOD, 'c'=>'books', 'a'=>'edit', 'step'=>'update', 'id'=>$rs['book_id'], ));?>" id="goods-form">
    <input type="hidden" name="<?php echo htmlspecialchars($_SESSION['ADMIN_FORM_TOKEN']['KEY'], ENT_QUOTES, "UTF-8"); ?>" value="<?php echo htmlspecialchars($_SESSION['ADMIN_FORM_TOKEN']['VAL'], ENT_QUOTES, "UTF-8"); ?>" />
    <div class="box">
      <div class="tabs mt5">
        <ul id="tabs">
          <li class="cur">基本信息</li>
          <li>書籍圖片</li>
        </ul>
      </div>
      <!-- 基本信息开始 -->
      <div class="module swcon mt5">
        <table class="dataform">
          <tr>
            <th width="110">書籍名称</th>
            <td><input class="w400 txt" name="book_name" id="book_name" type="text" value="<?php echo htmlspecialchars($rs['book_name'], ENT_QUOTES, "UTF-8"); ?>" /></td>
          </tr>
          <tr>
            <th width="110">書籍作者</th>
            <td><input class="w400 txt" name="author" id="author" type="text" value="<?php echo htmlspecialchars($rs['author'], ENT_QUOTES, "UTF-8"); ?>" /></td>
          </tr>
          <tr>
            <th>書籍货号</th>
            <td><input class="w200 txt" name="book_sn" type="text"  value="<?php echo htmlspecialchars($rs['book_sn'], ENT_QUOTES, "UTF-8"); ?>" /><p class="c999 mt10">长度不应超过20个字符, 留空则系统会按约定规则自动生成货号</p></td>
          </tr>
          <tr>
            <th>新到書籍</th>
            <td><input name="newarrival" type="checkbox" value="1" <?php if ($rs['newarrival']==1) : ?>checked<?php endif; ?> /><p class="c999 mt10">如果是新到書籍，請打勾</p></td>
          </tr>
          <tr>
            <th>倪柝聲全集</th>
            <td><input name="brother_ni" type="checkbox" value="1" <?php if ($rs['brother_ni']==1) : ?>checked<?php endif; ?> /><p class="c999 mt10">如果属于倪柝聲全集，請打勾</p></td>
          </tr>
          <tr>
            <th>江守道著述</th>
            <td><input name="brother_jiang" type="checkbox" value="1" <?php if ($rs['brother_jiang']==1) : ?>checked<?php endif; ?> /><p class="c999 mt10">如果属于江守道著述，請打勾</p></td>
          </tr>
          <tr>
            <th>王國顯著述</th>
            <td><input name="brother_wang" type="checkbox" value="1" <?php if ($rs['brother_wang']==1) : ?>checked<?php endif; ?> /><p class="c999 mt10">如果属于王國顯著述，請打勾</p></td>
          </tr>
          <tr>
            <th>福音小册子</th>
            <td><input name="gospel" type="checkbox" value="1" <?php if ($rs['gospel']==1) : ?>checked<?php endif; ?> /><p class="c999 mt10">如果属于福音小册子，請打勾</p></td>
          </tr>
          <tr>
            <th>其他書籍</th>
            <td><input name="others" type="checkbox" value="1" <?php if ($rs['others']==1) : ?>checked<?php endif; ?> /><p class="c999 mt10">如果属于其他書籍，請打勾</p></td>
          </tr>
          <tr>
            <th>展示价格</th>
            <td><input class="w200 txt" name="display_price" id="display_price" type="text" value="<?php echo htmlspecialchars($rs['display_price'], ENT_QUOTES, "UTF-8"); ?>" /><p class="c999 mt10">价格请按此格式填写, 如: "188.00" 或 "8.99"</p></td>
          </tr>
          <tr>
            <th>GST</th>
            <td>
              <div class="pad5">
                <label><input type="radio" name="gst" value="1" <?php if ($rs['gst']==1) : ?>checked<?php endif; ?> /><font class="green ml5">需要收取GST</font></label>
                <label class="ml20"><input type="radio" name="gst" value="0" <?php if ($rs['gst']==0) : ?>checked<?php endif; ?> /><font class="red ml5">无GST</font></label>
              </div>
            </td>
          </tr>
          <tr>
            <th>PST</th>
            <td>
              <div class="pad5">
                <label><input type="radio" name="pst" value="1" <?php if ($rs['pst']==1) : ?>checked<?php endif; ?> /><font class="green ml5">需要收取PST</font></label>
                <label class="ml20"><input type="radio" name="pst" value="0"  <?php if ($rs['pst']==0) : ?>checked<?php endif; ?> /><font class="red ml5">无PST</font></label>
              </div>
            </td>
          </tr>
          <tr>
            <th>內容簡介</th>
            <td><script type="text/plain" id="book_brief" style="width:100%;height:100px;"><?php echo $rs['book_brief']; ?></script></td>
          </tr>
          
          <tr>
            <th>狀態</th>
            <td>
              <div class="pad5">
                <label><input type="radio" name="status" value="1" <?php if ($rs['status']==1) : ?>checked<?php endif; ?> /><font class="green ml5">上架</font></label>
                <label class="ml20"><input type="radio" name="status" value="0" <?php if ($rs['status']==0) : ?>checked<?php endif; ?> /><font class="red ml5">下架</font></label>
                <p class="c999 mt10">如狀態選擇下架，前台則不會顯示該書籍</p>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <!-- 基本信息结束 -->
      <!-- 产品图片开始 -->
      <div class="module swcon mt5 hide">
        <table class="dataform">
          <tr>
            <th width="110">主要图片</th>
            <td>
              <?php if (!empty($rs['book_image'])) : ?>
              <div class="gim pad5 unslt cut" id="gim"><a><img src="../upload/books/prime/0/<?php echo htmlspecialchars($rs['book_image'], ENT_QUOTES, "UTF-8"); ?>" /><i>×</i></a><input type="hidden" name="products_image" value="<?php echo htmlspecialchars($rs['book_image'], ENT_QUOTES, "UTF-8"); ?>" /></div>
              <div class="pad5 cut hide" id="gimbtns">
                <a class="dashedbtn" onclick="popUploadImg()">+上传新图片</a>
                <span class="sep20"></span>
                <a class="dashedbtn" onclick="popImgList('prime')">选择图库中已有图片</a>
              </div>
              <?php else : ?>
              <div class="gim pad5 unslt cut hide" id="gim"><a><img src="" /><i>×</i></a><input type="hidden" name="products_image" value="" /></div>
              <div class="pad5 cut" id="gimbtns">
                <a class="dashedbtn" onclick="popUploadImg()">+上传新图片</a>
                <span class="sep20"></span>
                <a class="dashedbtn" onclick="popImgList('prime')">选择图库中已有图片</a>
              </div>
              <?php endif; ?>
            </td>
          </tr>
        </table>
      </div>
      <!-- 商品图片结束 -->
      <div class="submitbtn">
        <button type="button" class="ubtn btn" onclick="submitForm()">保存并提交</button>
        <button type="reset" class="fbtn btn">重置表单</button>
      </div>
    </div>
  </form>
</div>
<?php endif; ?>
<?php include $_view_obj->compile('admin/books/products_upload.html'); ?>

<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/umeditor/umeditor.config.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/umeditor/umeditor.min.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/datetimepicker.js"></script>
</body>
</html>