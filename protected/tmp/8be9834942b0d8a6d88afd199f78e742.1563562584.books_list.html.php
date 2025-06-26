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
    cate_id: $('#cate_id').val(),
    status: $('#status').val(),
    kw: $('#kw').val(),
    sn: $('#sn').val(),
    page: page_id,
    pernum: 20,
  }; 
    
  var filter = {
    filter_cate_id:$('#cate_id').val(),
    filter_status: $('#status').val(),
  };

  setCookie('MANNABOOK_BOOK_LIST_FILTER', JSON.stringify(filter), 3600*24);
    
  $.asynList("<?php echo url(array('m'=>$MOD, 'c'=>'books', 'a'=>'index', 'step'=>'search', ));?>", dataset, function(data){
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
  <div class="loc"><h2><i class="icon"></i><?php echo htmlspecialchars($title, ENT_QUOTES, "UTF-8"); ?></h2></div>
  <div class="box">
    <div class="doacts">
      <a class="ae add btn" href="<?php echo url(array('m'=>$MOD, 'c'=>'books', 'a'=>'add', ));?>"><i></i><font>添加新書籍</font></a>
      <a class="ae btn" onclick="doslvent('<?php echo url(array('m'=>$MOD, 'c'=>'books', 'a'=>'edit', ));?>', 'id')"><i class="edit"></i><font>編輯書籍</font></a>
      <a class="ae btn" onclick="doslvent('<?php echo url(array('m'=>$MOD, 'c'=>'books', 'a'=>'delete', ));?>', 'id')"><i class="remove"></i><font>刪除書籍</font></a>
    </div>
    <div class="stools mt5">
      <select id="cate_id" class="slt">
        <?php $_foreach_cate_counter = 0; $_foreach_cate_total = count($category_list);?><?php foreach( $category_list as $key => $cate ) : ?><?php $_foreach_cate_index = $_foreach_cate_counter;$_foreach_cate_iteration = $_foreach_cate_counter + 1;$_foreach_cate_first = ($_foreach_cate_counter == 0);$_foreach_cate_last = ($_foreach_cate_counter == $_foreach_cate_total - 1);$_foreach_cate_counter++;?>
        <option value="<?php echo htmlspecialchars($key, ENT_QUOTES, "UTF-8"); ?>" <?php if ($cur_category==$key) : ?>selected<?php endif; ?>><?php echo htmlspecialchars($cate, ENT_QUOTES, "UTF-8"); ?></option>
        <?php endforeach; ?>
      </select>
      <select id="status" class="slt">
        <option value="" selected="selected">全部状态</option>
        <option value="1">上架</option>
        <option value="0">下架</option>
      </select>
      <input type="text" class="w200 txt" id="kw" placeholder="輸入書籍名稱關鍵詞" />
      <input type="text" class="w200 txt" id="sn" placeholder="输入書籍货号關鍵詞" />
      <button type="button" class="sbtn btn" onclick="searchRes(1)">搜 索</button>
    </div>
    <div class="module mt5" id="rows"></div>
  </div>
</div>
<script type="text/template" id="table-tpl">
<table class="datalist">
  <tr>
    <th width="60" colspan="2"><input class="list_select_all" name="selectall" type="checkbox"  value="" /> ID</th>
    <th class="ta-l">書籍名稱</th>
    <th width="60">作者</th>
    <th width="60">價格</th>
    <th>所屬類別</th>
  </tr>
  {@each list as v}
  <tr>
    <td width="20"><input name="id" type="checkbox" value="${v.book_id}" /></td>
    <td width="40">${v.book_id}</td>
    <td class="ta-l">
      <a class="blue" href="books_edit.html?m=admin&id=${v.book_id}">${v.book_name}</a>
    </td>
    <td class="red">${v.author}</td>
    <td class="red" id="type_display_price">${v.display_price}</td>
    
    <td class="c888">
      {@if v.newarrival == 1}<span class="sign">新到書籍</span>{@/if}
      {@if v.brother_ni == 1}<span class="sign bg_r">倪柝聲全集</span>{@/if}
      {@if v.brother_jiang == 1}<span class="sign bg_r">江守道著述</span>{@/if}
      {@if v.brother_wang == 1}<span class="sign bg_r">王國顯著述</span>{@/if}
      {@if v.gospel == 1}<span class="sign bg_r">福音小冊子</span>{@/if}
      {@if v.others == 1}<span class="sign bg_r">其他書籍</span>{@/if}
    </td>
  </tr>
  {@/each}
</table>
</script>
<?php include $_view_obj->compile('admin/lib/paging.html'); ?>
<script type="text/javascript" src="<?php echo htmlspecialchars($APP_PATH, ENT_QUOTES, "UTF-8"); ?>/i/js/juicer.js"></script>
</body>
</html>