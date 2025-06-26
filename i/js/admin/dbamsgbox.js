//////////////////////////////////////////////////////////////
//
//  Function : dbaMsgbox(id)
//  Purpose  : Popup a message box with warning sign
//  Parameter: id - id of a div element in html page
//                  此DIV中包括一个“继续”按钮，此按钮的
//                  onclick事件应该设置成真正的操作
//
//////////////////////////////////////////////////////////////
$.dbaMasker = function(sw){
    if(sw){
      var masker = $('<div id="dbamasker" class="dbamasker"></div>');
      masker.css({'width': $(window).width(),'height': Math.max($(window).height(), $('body').height()),
                 'background':'#999',
                 'position':'absolute',
                 'left':'0','top':'0','z-index':'9',
                 'filter':'opacity(50%)',
                 '-moz-opacity':'0.5',
                 '-khtml-opacity':'0.5',
                 '-webkit-opacity':'0.5',
                 'opacity':'0.5'}); 
      $('body').append(masker);
    }else{
      $('div#dbamasker').remove();
    }
}


$.fn.dbaMidst = function(options){
    var defaults = {   
      position: 'fixed', gotop: 0, goleft: 0
    }, opts = $.extend(defaults, options);
		
    this.css({
      'position': opts.position, 
      'top': ($(window).height() - this.outerHeight()) /2 + opts.gotop,
      'left': ($(window).width() - this.outerWidth()) / 2 + opts.goleft,
      'width':'360px','height':'240px',
      'border':'2px solid #fff',
      'background':'#fff',
      'z-index':'9999',
      '-moz-border-radius':'5px',
      '-webkit-border-radius':'5px',
      'border-radius':'5px',
      '-moz-box-shadow':'0 0 10px #666',
      '-webkit-box-shadow':'0 0 10px #666',
      'box-shadow':'0 0 10px #666'
    });
    return this;
}

function closePrompt(id){
    $.dbaMasker(false);
    $('#'+id).hide();
}

function dbaMsgbox(id){
    $.dbaMasker(true);
    $('#'+id).dbaMidst({wrapper:$(window), gotop:-100});
    $('#'+id).show();
}


