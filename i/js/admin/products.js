/********** 相册图片 **********/
function addAlbum(){ //添加
  var tpl = $('#add-album-tpl').html();
  $('#album').append(tpl).find('a.blue').click(function(){$(this).parent().remove()});
}
function removeAlbumImg(e, id){ //删除
  var removed_ids = $('#album_removed').val();
  removed_ids = removed_ids + id + ',';
  $(e).closest('dl').remove();
  $('#album_removed').val(removed_ids);
}

/********** 商品可选项 **********/
function selectedOptType(e){
  var type_id = $('#opt-type').val(),
      type_name = $('#opt-type option:selected').text(),
      container = $('#opt-container'),
      exist = 0;
  if(type_id != 0){
    container.find('dt font').each(function(){
      if($(this).data('id') == type_id){
        exist = 1;
        return false;
      }
    });
    if(exist == 0){
      var tpl = $('#opt-tpl').html();
      tpl = tpl.replace(/{{type_id}}/g, type_id);
      tpl = tpl.replace(/{{type_name}}/, type_name);
      container.append(tpl);
    }else{
      $('body').vdsAlert({msg:'已存在此选项, 请直接在该选项下添加可选值!', time:2}); 
    }
  }
  else{
    $('body').vdsAlert({msg:'请选择一个选项类型', time:1});
  }
}
function removeOpt(e){ //删除选项
  $(e).closest('dl').remove();
}
function addOptVal(e){ //增加选项内容
  var type_id = $(e).prev('font').data('id'), tpl = $('#opt-val-tpl').html();
  tpl = tpl.replace(/{{type_id}}/, type_id);
  $(e).closest('dl').append(tpl);
}
function removeOptVal(e){ //删除选项内容
  $(e).parent().remove();
}
function MinusStockQty(obj){ //库存减一
    $('span.stockQty_msg').html('');
    var $this = $(obj);
    var qty = parseInt($this.next("input").val());
    if( qty > 0 )
        qty = qty -1;
    $this.next("input").val(qty);
}
function PlusStockQty(obj){ //库存加一
    $('span.stockQty_msg').html('');
    var $this = $(obj);
    var qty = parseInt($this.prev("input").val());
    if( qty < 9999 )
        qty = qty +1;
    $this.prev("input").val(qty);
}
function updateStockQty(productsId,obj,url){
    $this = $(obj);
    var typeId = $this.next('input#type_id').val();
    var qty = parseInt($this.prev().prev("input").val());
    url = url + "&id=" + productsId + "&stock_qty=" + qty + "&type_id=" + typeId; 
    $.getJSON(url, function(data){
        if($(obj).parent().siblings('td.stock_log').length == 1)
        {
            $(obj).parent().siblings('td.stock_log').addClass('red').text(data.msg);
        }
    });
}
function updateStockThreshold(productsId,obj,url){
    $this = $(obj);
    var threshold = parseInt($this.prev().prev("input").val());
    url = url + "&id=" + productsId + "&stock_threshold=" + threshold;
    $.getJSON(url, function(data){
        if($(obj).parent().siblings('td.stock_log').length == 1)
        {
            $(obj).parent().siblings('td.stock_log').addClass('red').text(data.msg);
        }
    });
}
function updateDiscountAmount(merchantId,productsId,obj,url){
    $this = $(obj);
    var typeId = parseInt($this.next("input").val());
    var discountAmount = parseFloat($this.prev("input.discountPrice_amount").val());
    var dataset = {
    merchant_id: merchantId,
    products_id: productsId,
    type_id: typeId,
    discount_amount: discountAmount,
    token_val: $("#token").val(),
    token_name: $("#token").attr('name'),
  }; 

  $.ajax({
      type: 'post',
      dataType: 'json',
      url: url,
      data: dataset,
      beforeSend: function(){$.vdsLoadingBar(true)},
      success: function(data){
          $.vdsLoadingBar(false);
          if(data.status != "errortoken")
              $this.parent().siblings('td.type_discount_price').text(data.discount_price);
          $('body').vdsAlert({msg:data.msg});
//          $('span.discountPrice_msg').html(data.msg);
      },
      error: function(data){ 
        $.vdsLoadingBar(false);
        $('body').vdsAlert({msg:'处理请求时发生错误'});
      }
    });
}

