var _lang = {
	change: function() {
		load.start();
		http.start({'s':0}).onreadystatechange = function() {
			if (!http.st(this)) return; else load.con(http.txt(this));
		}
	},
	langSel: function(a) {
		http.start({'s':1,'v':a}).onreadystatechange = function() {
			if (!http.st(this)) return; else window.location.reload(true);
		}
	}
}
function sortable() {
	$( "#__14b" ).sortable({revert: 50,start: function(e,ui) {
		 $(this).attr('data-previndex', ui.item.index());
	},stop: function(event,ui){
		var a = ui.item.index(),b = $(this).attr('data-previndex');
        $(this).removeAttr('data-previndex');
		if (a!=b) http.start({'s':63,'v':[$(ui.item).attr("data-doct"),(a-b),$(ui.item).prev().attr("data-doct"),$(ui.item).next().attr("data-doct")]});
	}});
	$("#folder-main").sortable({revert: 50,start: function(event, ui) {
        ui.item[0].oldclick = ui.item[0].onclick;
        ui.item[0].onclick = null; 
		$(this).attr('data-previndex', ui.item.index());
    },
    stop: function(event, ui) {
       ui.item[0].onclick = ui.item[0].oldclick;
	   var a = ui.item.index(),b = $(this).attr('data-previndex');
        $(this).removeAttr('data-previndex');
		if (a!=b) http.start({'s':79,'v':[$(ui.item).attr("data-id"),(a-b),$(ui.item).prev().attr("data-id"),$(ui.item).next().attr("data-id")]});
    }});
	$("#folder-list").sortable({revert: 50,start: function(e,ui) {
		 $(this).attr('data-previndex', ui.item.index());
	},stop: function(event,ui){
		var a = ui.item.index(),b = $(this).attr('data-previndex');
        $(this).removeAttr('data-previndex');
		if (a!=b) http.start({'s':80,'v':[$(ui.item).attr("data-doct"),(a-b),$(ui.item).prev().attr("data-doct"),$(ui.item).next().attr("data-doct"),dom.id("folder-list").dataset.id]});
	}});
	$(".__19b").sortable({start: function(e,ui) {
		 $(this).attr('data-previndex', ui.item.index());
	},stop: function(event,ui){
		var a = ui.item.index(),b = $(this).attr('data-previndex');
        $(this).removeAttr('data-previndex');
		if (a!=b) http.start({'s':104,'v':[$(ui.item).attr("data-id"),(a-b),$(ui.item).prev().attr("data-id"),$(ui.item).next().attr("data-id")]});
	},items: '> div:not(.__19f1)'});
	$(".__19b0").sortable({start: function(e,ui) {
		 $(this).attr('data-previndex', ui.item.index());
	},stop: function(event,ui){
		var a = ui.item.index(),b = $(this).attr('data-previndex');
        $(this).removeAttr('data-previndex');
		if (a!=b) http.start({'s':120,'v':[$(ui.item).attr("data-id"),(a-b),$(ui.item).prev().attr("data-id"),$(ui.item).next().attr("data-id")]});
	},items: '> div:not(.__19f1)'});
	$(".__25c0").sortable({start: function(e,ui) {
		 $(this).attr('data-previndex', ui.item.index());
	},stop: function(event,ui){
		var a = ui.item.index(),b = $(this).attr('data-previndex');
		$(this).removeAttr('data-previndex');
		if (a!=b) http.start({'s':111,'v':[$(ui.item).attr("data-id"),(a-b),$(ui.item).prev().attr("data-id"),$(ui.item).next().attr("data-id"),$(ui.item).attr("data-plt")]});
		/*
		var a = ui.item.index(),b = $(this).attr('data-previndex');
        $(this).removeAttr('data-previndex');
		if (a!=b) http.start({'s':104,'v':[$(ui.item).attr("data-id"),(a-b),$(ui.item).prev().attr("data-id"),$(ui.item).next().attr("data-id")]});
		*/
	}});
	$("#__14b, #folder-main, #folder-list").disableSelection();
}

$(function() {
sortable();
});
var trans = {
	clear: function() {
		$("#trans, #form").remove();
	},
	send: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		trans.clear();
		b = [dom.s(dom.e('div'),[['id','trans']])];
		b[1] = dom.s(dom.e('iframe'),[['name','my_frame'],['class','invisible'],['frameborder',0],['src','/frame.php']]);
		c = dom.i(dom.s(dom.e('form'),[['class','invisible'],['action','/frame.php'],['method','post'],['target','my_frame'],['id','form']]),'<input type="hiden" name="package" value="'+dom.es(JSON.stringify(a))+'">');
		dom.c(document.body,c);
		dom.c(document.body,dom.c(b[0],b[1]));
		c.submit();
		b[1].onload = function() {
			setTimeout(function() {
				trans.clear();
				sortable();
				go.audio.join();
			},1);
		}
	}
}
var login = {
	stat: true,
	checkbox: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.st(a,"status"),dom.id('check-view')];
		if (b[0]==0) {
			dom.s(b[1],[['style','display: block;']]);
			dom.s(a,[['data-status',1]]);
		} else {
			dom.s(b[1],[['style','display: none;']]);
			dom.s(a,[['data-status',0]]);
		}
	},
	hide: function(a) {
		dom.no(a.lastChild);
		dom.bl(a.firstChild);
	},
	show: function(a) {
		dom.bl(a.lastChild);
		dom.no(a.firstChild);
	},
	start: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.vl(['i-1','i-2'])) return;
		b = {};
		b.t = 0;
		b.m = 0;
		b.p = 0;
		b.u = window.document.location.pathname;
		b.v = {};
		b.v.lg = dom.v(dom.id('i-1'));
		b.v.pw = dom.v(dom.id('i-2'));
		b.v.rb = '';
		trans.send(b);
		/*
		if (!dom.vl(['i-1','i-2'])) return; else if (!login.stat) return;
		login.stat = false;
		login.hide(a);
		b = {};
		b.lg = dom.v(dom.id('i-1'));
		b.pw = dom.v(dom.id('i-2'));
		b.rb = '';
		http.start({'s':2,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return;
			login.show(a);
			console.log(this.responseText);
			login.stat = true;
			c = http.txt(this);
			window.location.href = c.v;
		}
		*/
	},
	out: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		http.start({'s':3}).onreadystatechange = function() {
			if (!http.st(this)) return; else a = http.txt(this);
			window.location.href = a.v;
		}
	}
}