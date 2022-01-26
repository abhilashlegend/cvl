/**************************************************************************************************/
/***
/***	TERNSTYLE'S WORDPRESS THEME JAVASCRIPT DOCUMENT - (ternstyle)
/***	-----------------------------------------------------------------------
/***	Written by Matthew Praetzel. Copyright (c) 2010 Matthew Praetzel.
/***	-----------------------------------------------------------------------
/***	All Rights Reserved. Any use of these functions & scripts without written consent is prohibited.
/***
/**************************************************************************************************/

/*-----------------------
	Initialize
-----------------------*/
var sizes = [],scale = 10,nodes = 'h2,h3,h4,h5,p';

(function ($) {
$(document).ready(function () {
	
	if($.cookie('dark')) {
		$(document.body).addClass('black');
	}
	
	$('.switch').bind('click',function () {
		if($(this).text().toLowerCase() == 'light') {
			$.cookie('dark',null);
			$(document.body).removeClass('black');
			
		} else if($(this).text().toLowerCase() == 'dark') {
			$.cookie('dark',1,{ expires:7 });
			$(document.body).addClass('black');
		}
		return false;
	});
	
	//font size
	$(nodes).each(function () {
		var s = parseInt($(this).css('font-size').replace('px',''));
		var l = parseInt($(this).css('line-height').replace('px',''));
		sizes[sizes.length] = {
			node : this,
			size : s,
			line : l
		};
		if($.cookie('size')) {
			$(this).css({ 'font-size':(s+parseInt($.cookie('size'))),'line-height':(l+parseInt($.cookie('size')))+'px' });
		}
	});
	$('.increaseFont').bind('click',function () { fontSize(1); });
	$('.decreaseFont').bind('click',function () { fontSize(0); });
	$('.resetFont').bind('click',function () { fontSize(); });
	
});

function fontSize(b) {
	var p = $.cookie('size') ? parseInt($.cookie('size')) : 0;
	if(b === 0) {
		p = (p-2) < 0 ? p : (p-2);
	}
	else if(b === 1) {
		p = (p+2) > scale ? p : (p+2);
	}
	else {
		p = 0;
	}
	$(nodes).each(function () {
		for(var i=0;i<sizes.length;i++) {
			if(sizes[i].node == this) {
				var s =  sizes[i].size;
				var l =  sizes[i].line;
				break;
			}
		}
		if(p !== 0) {
			$(this).css({ 'font-size':s+p,'line-height':(l+p)+'px'  });
		}
		else {
			$(this).css({ 'font-size':s,'line-height':l+'px'  });
		}
	});
	$.cookie('size',p,{ expires:7 });
}

})(jQuery)