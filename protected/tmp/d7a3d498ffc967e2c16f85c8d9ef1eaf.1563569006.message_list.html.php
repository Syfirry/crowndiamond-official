<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include $_view_obj->compile('admin/lib/meta.html'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/admin/vfb2b.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/admin/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/admin/products.css" />
<link rel="stylesheet" type="text/css" href="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/css/admin/poper.css" />
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/admin/vfb2b.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/admin/list.js"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/admin/products.js"></script>
<script type="text/javascript">
$(function(){
    $('#kw').bind('keypress',function(event){
      if(event.keyCode == "13")
          searchRes(1);
    });
    $('#sn').bind('keypress',function(event){
      if(event.keyCode == "13")
          searchRes(1);
    });
    
    var filter = $.parseJSON(getCookie('MANNABOOK_BOOKS_LIST_FILTER')) || {};
    if(filter.hasOwnProperty('filter_cate_id'))
      $('#cate_id').val(filter['filter_cate_id']);
    if(filter.hasOwnProperty('filter_status'))
      $('#status').val(filter['filter_status']);
    searchRes(1);
});
    


    
 
//搜索书籍
function searchRes(page_id){
  var dataset = {
    kw: $('#kw').val(),
    sn: $('#sn').val(),
    page: page_id,
    pernum: 20,
  }; 
    
    
  $.asynList("<?php echo url(array('m'=>$MOD, 'c'=>'message', 'a'=>'index', 'step'=>'search', ));?>", dataset, function(data){
    if(data.status == 'success'){
      juicer.register('format_date', function(v){return formatTimestamp(v, 'y-m-d<br />h:i:s');});
      $('#rows').append(juicer($('#table-tpl').html(), data));
      $('#rows tr').vdsRowHover();
      $('#rows tr:even').addClass('even');
      set_selectAll();
      if(data.paging != null) $('#rows').append(juicer($('#paging-tpl').html(), data));
    }else{
      $('#rows').append("<div class='nors mt5'>未找到相关数据记录...</div>");
    }
  });
}
//翻页
function pageturn(page_id){searchRes(page_id);}
 
</script>
</head>
<body>
<div class="content">
  <div class="loc"><h2><i class="icon"></i>客户消息</h2></div>
  <div class="box">
    <div class="doacts">
      <a class="ae btn" onclick="doslvent('<?php echo url(array('m'=>$MOD, 'c'=>'message', 'a'=>'delete', ));?>', 'id')"><i class="remove"></i><font>刪除消息</font></a>
    </div>
    <div class="stools mt5">
      <input type="text" class="w200 txt" id="kw" placeholder="輸入消息關鍵詞" />
      <button type="button" class="sbtn btn" onclick="searchRes(1)">搜 索</button>
    </div>
    <div class="module mt5" id="rows"></div>
  </div>
</div>
<script type="text/template" id="table-tpl">
<table class="datalist">
  <tr>
    <th width="60" colspan="2"><input class="list_select_all" name="selectall" type="checkbox"  value="" /> ID</th>
    <th  width="60">客户名稱</th>
    <th width="60">客户电邮</th>
    <th class="ta-l">消息内容</th>
    <th width="80">发送时间</th>
  </tr>
  {@each list as v}
  <tr>
    <td width="20"><input name="id" type="checkbox" value="${v.id}" /></td>
    <td width="40">${v.id}</td>
    <td>${v.name}</td>
    <td>${v.email}</td>
    <td class="ta-l">${v.message}</td>
    <td>${v.ts_date}</td>
 </tr>
  {@/each}
</table>
</script>
<?php include $_view_obj->compile('admin/lib/paging.html'); ?>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/juicer.js"></script>
</body>
</html>