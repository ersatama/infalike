var GLOBAL = {p0:'pk.eyJ1IjoiaW5mYWxpa2UiLCJhIjoiY2l6ZWM0aWI5MDA0czMzbWQ2MTRkaTVteiJ9.cCBE-DG5g1gCcBI7rgU24A'};
var lt = {
	doc: [[0,"doc-text"],[1,"__14b"],[2,"deleted-doc"],[3,"doc-gif"]],
	docS: [[0,"doc-search"]]
}
window.onpopstate = function(event) {
	var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
	a = [event.state];
	if (typeof(a[0])=='object') {
		//{t: 1, m: 1, u: "/audios1", h: "1"}
		if (a[0].t==1) {
			trans.send(a[0]);
		} else if (a[0].t==2) {
			go.send(a[0]);
		}
	}
}
$(document).mousedown(function() {
	$("div .__4u, .__6x, .__4f3, #help-date, #help-info, .__12n, div .__15m,div .__15n, .__17n, .__23k, .hide").fadeOut(100);
	$(".__21q").fadeOut(100).animate({marginTop: "52px"},200);
	go.cv.clearTxt();
	$("#v-option").html('');
});
$(document).scroll(function() {
	if ($(window).scrollTop()>=($(document).height()-$(window).height())*0.65) {
		go.doc.upM(lt.doc);
		go.doc.searchM(lt.docS);
		go.doc.folderUp();
		go.doc.folderListUp();
		go.doc.folderLUp();
		go.audio.update();
		go.audio.pListUp();
	}
	go.audio.control();
});
$(window).keyup(function(event) {
			if (event.keyCode==46) {
				$("#sel-cv-txt").remove();
				$("#cv-sticker").remove();
			} else if (event.ctrlKey&&(event.keyCode==90)) go.paint.back();
});
$.fn.textWidth = function(text, font) {
	var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
    $.fn.textWidth.fakeEl = $('<div class="__12e">').hide().appendTo(document.body).html(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
    a = $.fn.textWidth.fakeEl.width();
	$.fn.textWidth.fakeEl.remove();
    return a;
};
var styles = ['/styles/_3.css','/styles/_4.css'];
var scripts = ['/js/map.js','/js/ct.js'];
var urls = window.location.protocol+"//"+window.location.host;
function start() {
	var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
	a = styles.length;
	d = document.styleSheets;
	f = d.length;
	for (e=0;e<a;e++) {
		g = true;
		for (b=0;b<f;b++) if (urls+styles[e]==d[b].href) g = false;
		if (g) dom.c(document.head,dom.s(dom.e('link'),[['rel','stylesheet'],['href',styles[e]]]));
	}
	a = scripts.length;
	d = document.scripts;
	f = d.length;
	for (e=0;e<a;e++) {
		g = true;
		for (b=0;b<f;b++) if (urls+styles[e]==d[b].src) g = false;
		if (g) dom.c(document.head,dom.s(dom.e('script'),[['src',scripts[e]]]));
	}
}
var go = {
	page: function(a,e) {
		
	},
	pageI: function(a,e) {
		
	},
	send: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		/*
		меняю адрес страницы после клика кнопки историй вперед или назад
		{"t":2,"m":1,"u":"/audios1?section=playlists","h":"1"}
		*/
		http.start({'s':126,'v':a.u}).onreadystatechange = function() {
			if (!http.st(this)) return; else c = http.txt(this);
			if (c.u==0) $(".__13k").html(c.h);
			go.audio.join();
			sortable();
		}
	},
	linkU: '',
	auChange: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.ue(window.location.href),window.document.title,window.history.state,window.location.pathname+window.location.search];//["http://infalike.com/audios1","Мой аудиозаписи",{"t":1,"m":1,"u":"/audios1","h":"1"},"/audios1"]
		if (b[3]!=a.m) {//проверяем не совпадают ли адреса
			if (b[2]==null) {//проверяем обьект на существование
				window.history.replaceState({t:2,m:1,u:b[0],h:dom.id("header-m").dataset.id},b[1],b[0]);
				window.history.pushState({t:2,m:1,u:b[0],h:dom.id("header-m").dataset.id},b[1],b[0]);
			} else window.history.pushState(b[2],b[1],b[0]);
			window.history.replaceState({t:2,m:1,u:a.m,h:dom.id("header-m").dataset.id},a.t,a.m);
		}
		window.document.title = a.t;
		$(".__13k").html(a.h);
		go.audio.join();
		sortable();
	},
	linkM: function(a,e) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		go.p(event);
		b = [dom.g(a,'href'),(window.location.pathname+window.location.search)];
		if (b[0]==null) return; else if (b[0]=='') return; else if (b[0]==b[1]) return; else if (go.linkU==b[0]) return; else go.linkU = b[0];
		http.start({'s':126,'v':go.linkU}).onreadystatechange = function() {
			if (!http.st(this)) return; else alert(this.responseText);c = http.txt(this);
			if (go.linkU!=c.m) return; else if (c.u==0) go.auChange(c);
			go.linkU = '';
		}
		/*
		
		
		
		http.start({'s':94,'v':[a[0],1]}).onreadystatechange = function() {
			if (!http.st(this)) return; else c = http.txt(this);
			$("div #fc-"+c[0]).text(c[2]);
		};
		*/
		//trans.send({'t':2,'m':0,'u':b,'h':dom.id('header-m').dataset.id});
		/*
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.g(a,'href');
		if (b==null) return; else if (b=='') return;
		
		trans.send({'t':1,'m':0,'u':b,'h':dom.id('header-m').dataset.id});
		
		send: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			//{t: 2, m: "0", i: "[0,"1"]", u: "http://infalike.com/audios1", h: "Мой аудиозаписи", q: ""}
			if (dom.id("au-list")) {
				b = [true,JSON.parse(a.i),parseInt(a.m),JSON.parse($("#au-list").attr("data-info")),parseInt($(dom.qs("data-au-p")[0]).attr("data-au-p"))];
				if (b[2]!=b[4]) b[0] = false; else if (b[1][0]!=b[3][0]||b[1][1]!=b[3][1]) b[0] = false;
				if (b[0]) {
					if (a.q!='') {
						if (a.q!=$(".__18x").val()) {
							$(".__18x").val(a.q);
							go.audio.stS();
						}
					} else go.audio.searchClear();
				} else {
					alert("new trans");//new post send
				}
			} else {
				alert("new trans");//new post send
			}
			
		},
		*/
	},
	scrollVW: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		a = dom.qs("data-svw");
		b = a.length;
		for (c=0;c<b;c++) {
			d = a[c];
			(d.dataset.init!=undefined)?go.scrollCNT(d):go.scrollNew(d);
		}
	},
	scrollCNT: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [(a.firstChild.clientHeight/a.firstChild.firstChild.clientHeight)*100];
		if (b[0]>=100) {
			$(a).find(".__25p").css("display","none");
			return;
		} else {
			b[1] = (a.firstChild.clientHeight-20);
			b[2] = (b[1]/100)*b[0];
			b[2] = b[2]<50?50:b[2];
			b[3] = a.firstChild.firstChild.clientHeight-a.firstChild.clientHeight;
			b[4] = dom.eP(a.firstChild)[1]-dom.eP(a.firstChild.firstChild)[1];
			b[5] = (b[4]/b[3])*100;
			b[6] = ((a.lastChild.clientHeight-b[2])/100)*b[5];
			$(a.lastChild).fadeIn(200).find(".__25q").stop().clearQueue().animate({height:b[2]+"px",marginTop: b[6]+"px"},0);
		}
		if (a.dataset.sort!=undefined) $(a).find(".__25r").addClass(a.dataset.sort);
		go.audio.join();
		sortable();
	},
	scrollNew: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [a.clientWidth,a.clientHeight];
		c = [(b[0]-15),go.scrollBar(a,50)];
		c[2] = (b[1]-c[1][2])/2;
		dom.s(dom.i(a,'<div style="position: relative;width: '+b[0]+'px;height: '+b[1]+'px;float: left;"><div class="__25r '+(a.dataset.sort!=undefined?a.dataset.sort:'')+'">'+dom.ih(a)+'</div></div><div class="__25p" style="margin: '+c[2]+'px 0 0 '+(c[0]+15)+'px;height: '+c[1][2]+'px;'+(c[1][3]!=0?'':'display: none;')+'"><div class="__25q" style="height:'+c[1][3]+'px"></div></div>'),[["data-l",c[0]],['data-init',0]]);
		a.addEventListener("mouseenter",go.inV,false);
		a.lastChild.addEventListener("mousedown",go.scrollStart,false);
		a.addEventListener("mousedown",function(event) {
			event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
		},false);
		a.addEventListener("click",function(event) {
			event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
		},false);
		go.audio.join();
		sortable();
	},
	inV: function(e) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		e = e||window.event;
		a = e.currentTarget;
		$(a).find(".__25p").stop().clearQueue().animate({marginLeft: parseInt(a.dataset.l)+"px"},100);
		go.scrollItem = false;
		a.addEventListener("mouseleave",function() {
			go.scrollItem = true;
			if (!go.scrollSt) return;
			$(a).find(".__25p").stop().clearQueue().animate({marginLeft: (parseInt(a.dataset.l)+15)+"px"},100);
		},false);
		document.addEventListener("mouseup",function() {
			if (go.scrollItem) $(a).find(".__25p").stop().clearQueue().animate({marginLeft: (parseInt(a.dataset.l)+15)+"px"},100);
		},false);
		a.addEventListener("wheel",go.wheel,false);
	},
	wheel: function(e) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		e = e||window.event;
		b = e.deltaY||e.detail||e.wheelDelta;
		d = e.currentTarget;
		if ((d.firstChild.firstChild.clientHeight-d.firstChild.clientHeight)>0) {
		c = [go.cut($(d.firstChild.firstChild).css("margin-top"))-b];
		if (c[0]<(d.firstChild.clientHeight-d.firstChild.firstChild.clientHeight)) c[0] = d.firstChild.clientHeight-d.firstChild.firstChild.clientHeight; else if ((go.cut($(d.firstChild.firstChild).css("margin-top"))-b)>0) c[0] = 0;
		c[2] = ((d.lastChild.clientHeight-d.lastChild.lastChild.clientHeight)/100)*(((0-c[0])/(d.firstChild.firstChild.clientHeight-d.firstChild.clientHeight))*100);
		$(d.lastChild.lastChild).stop().clearQueue().animate({marginTop: c[2]+"px"},0);
		c[3] = [(d.lastChild.clientHeight-d.lastChild.lastChild.clientHeight)];
		c[3][1] = (c[2]/c[3][0])*100;
		go.evil([c[3][1],d.dataset.attr,d]);
		$(d.firstChild.firstChild).stop().clearQueue().animate({marginTop: c[0]+"px"},0);
		e.preventDefault ? e.preventDefault() : (e.returnValue = false);
		} 
		go.audio.join();
		sortable();
	},
	scrollBar: function(a,z) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [false,a.clientHeight,a.clientHeight-20,0];
		c = [a.childNodes];
		c[1] = c[0].length;
		c[2] = a.currentStyle || window.getComputedStyle(a);
		c[2] = parseInt(c[2].paddingTop,10)+parseInt(c[2].paddingBottom,10);
		for (d=0;d<c[1];d++) {
			if (c[0][d].nodeType!=1) continue;
			e = c[0][d].currentStyle || window.getComputedStyle(c[0][d]);
			c[2] += parseInt(e.height, 10)+parseInt(e.marginTop, 10)+parseInt(e.marginBottom, 10);
		}
		if (c[2]>b[1]) {
			b[0] = true;
			f = ((b[2]/100)*((b[1]/c[2])*100));
			b[3] = f<z?z:f;
		}
		return b;
	},
	evilCount: 0,
	evilIt: '',
	evilLength: 0,
	evil: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if ($(a[2]).attr("data-s")==undefined) $(a[2]).attr("data-s",0);
		if (a[0]<70) return; else if (a[2].dataset.s!=0) return; else if (a[1]==undefined) return; else b = JSON.parse(a[1]);
			if (typeof(b)!='object') return; else $(a[2]).attr("data-s",1);
			go.evilCount++;
			go.evilIt = a[2];
			go.evilLength = $(a[2]).find(".__25r").children().length;
			if (b[0]==0) go.audio.plUpdate(b[1]); else if (b[0]==1) go.audio.plEdUpdate(b[1]); else if (b[0]==2) go.audio.plEdUp(b[1]);
	},
	scrollSt: true,
	scrollItem: true,
	scrollStIt: '',
	scrollStart: function(event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
		event = event||window.event;
		$(document.body).attr("onselectstart","return false;");
		go.scrollStIt = event.currentTarget;
		c = [/*0*/[dom.eP(go.scrollStIt)[1],go.scrollStIt.clientHeight],
		/*1*/[dom.eP(go.scrollStIt.firstChild)[1],go.scrollStIt.firstChild.clientHeight],
		/*2*/[go.scrollStIt.parentNode],
		/*3*/[dom.client(event)[1]],
		/*4*/[go.scrollStIt.previousSibling.clientHeight,go.scrollStIt.previousSibling.firstChild.clientHeight,go.scrollStIt.previousSibling,go.scrollStIt.previousSibling.firstChild]];
		e = [(c[0][1]-c[1][1]),(c[1][1]/2)];
		if (c[3][0]<c[1][0]||c[3][0]>(c[1][0]+c[1][1])) {
		e[2] = Math.min(Math.max((((e[0]/100)*(((c[3][0]-c[0][0])/e[0])*100))-e[1]),0),e[0]);
		e[3] = ((c[4][1]-c[4][0])/100)*((e[2]/e[0])*100);
		$(c[4][3]).animate({marginTop: "-"+e[3]+"px"},100);
		$(go.scrollStIt.firstChild).animate({marginTop: e[2]+"px"},100);
		go.evil([e[2],go.scrollStIt.parentNode.dataset.attr,go.scrollStIt.parentNode]);
		c[1][0] = c[0][0]+e[2];
		}
		go.scrollSt = false;
		document.addEventListener("mousemove",function(event) {
			if (go.scrollSt) return; else event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
			c[1][1] = go.scrollStIt.firstChild.clientHeight;
			c[4][1] = go.scrollStIt.previousSibling.firstChild.clientHeight;
			e[0] = c[0][1]-c[1][1];
			f = [(dom.client(event)[1]-c[3][0])];
			f[1] = Math.min(Math.max(((c[1][0]-c[0][0])+f[0]),0),e[0]);
			$(c[4][3]).animate({marginTop: "-"+(((c[4][1]-c[4][0])/100)*((f[1]/e[0])*100))+"px"},0);
			$(go.scrollStIt.firstChild).animate({marginTop: f[1]+"px"},0);
			go.evil([((f[1]/e[0])*100),go.scrollStIt.parentNode.dataset.attr,go.scrollStIt.parentNode]);
		},false);
		document.addEventListener("mouseup",function(event) {
			go.scrollSt = true;
			$(document.body).removeAttr("onselectstart");
		},false);
	},
	storage: {
		get: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (window.localStorage) return JSON.parse(localStorage.getItem(a))==null?'':JSON.parse(localStorage.getItem(a)); else return JSON.parse(go.storage.cookieG(a));
		},
		cookieG: function(a) {
			var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
			return matches ? decodeURIComponent(matches[1]) : '';
		},
		clear: function() {
			localStorage.clear();
			var cookies = document.cookie.split(";");
			for (var i = 0; i < cookies.length; i++)
			eraseCookie(cookies[i].split("=")[0]);
			function eraseCookie(name) {
				var date = new Date();
				date.setTime(date.getTime()+(-1*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
				document.cookie = name+"="+''+expires+"; path=/";
			}
		},
		set: function(a,b) {
			if (window.localStorage) localStorage.setItem(a,JSON.stringify(b)); else setCookie(a,JSON.stringify(b));
		}
	},
	follow: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$("div #f0-"+a[0]).replaceWith('<button class="__21g0" onmouseover="return go.unf(this)" id="f0-'+a[0]+'" onclick="return go.unfollow('+dom.es(JSON.stringify(a))+')"><span>Following</span><span class="invisible">Unfollow</span></button>');
		$("div #f1-"+a[0]).replaceWith('<button class="__22u0" id="f1-'+a[0]+'" onmouseover="return go.unf(this)" onclick="return go.unfollow('+dom.es(JSON.stringify(a))+')"><span>Following</span><span class="invisible">Unfollow</span></button>');
		http.start({'s':94,'v':[a[0],0]}).onreadystatechange = function() {
			if (!http.st(this)) return; else c = http.txt(this);
			$("div #fc-"+c[0]).text(c[2]);
		};
	},
	unfollow: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$("div #f0-"+a[0]).replaceWith('<button class="__21g" id="f0-'+a[0]+'" onclick="return go.follow('+dom.es(JSON.stringify(a))+')">Follow</button>');
		$("div #f1-"+a[0]).replaceWith('<button class="__22u" id="f1-'+a[0]+'" onclick="return go.follow('+dom.es(JSON.stringify(a))+')">Follow</button>');
		http.start({'s':94,'v':[a[0],1]}).onreadystatechange = function() {
			if (!http.st(this)) return; else c = http.txt(this);
			$("div #fc-"+c[0]).text(c[2]);
		};
	},
	unf: function(a) {
		$(a.firstChild).addClass('invisible');
		$(a.lastChild).removeClass('invisible');
		a.addEventListener("mouseleave",function() {
			$(a.firstChild).removeClass('invisible');
			$(a.lastChild).addClass('invisible');
		},false);
	},
	up: function(a,b) {
		$(a.lastChild).animate({marginTop: b[0]+"px"},50);
		a.addEventListener("mouseleave",function() {
			$(a.lastChild).animate({marginTop: b[1]+"px"},50);
		},false);
	},
	vw: function(a,b) {
		var a,b;
		$(a).fadeIn(200);
		b.addEventListener("mouseleave",function() {
			$(a).fadeOut(200);
		},false);
	},
	ss: function(a) {
		var a,b,c;
		http.start({'s':a.s,'v':a.v}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (c.f==0) go.audio.rEP(c);
		}
	},
	audio: {
		change: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			c = [a.parentNode.dataset.id,a.dataset.id];
			if (c[0]==c[1]) return; else if (a.dataset.id==0) {
				$("div .__27s").removeClass("__27r0");
				$(a.parentNode).attr("data-id",0).children().eq(0).addClass("__27r0");
				c[2] = 0;
			} else {
				$("div .__27s").removeClass("__27r0");
				$(a.parentNode).attr("data-id",1).children().eq(1).addClass("__27r0");
				c[2] = 1;
			}
			http.start({'s':128,'v':c[2]}).onreadystatechange = function() {
				if (!http.st(this)) return; else $(".__13k").html(this.responseText);
				sortable();
				go.audio.join();
			}
		},
		plList: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (b.dataset.id==0) {
				$(".__27j"+a[0]).attr("data-id",1).find(".__27k").css({marginTop: 0});
				$(".__27m"+a[0]).attr("data-id",1).find(".__27n").css({marginTop: 0});
			} else {
				$(".__27j"+a[0]).attr("data-id",0).find(".__27k").css({marginTop: "-16px"});
				$(".__27m"+a[0]).attr("data-id",0).find(".__27n").css({marginTop: "-37px"});
			}
			http.start({'s':127,'v':[a[0],$(b).attr("data-id")]});
		},
		wUp: function(a) {
			$(a).parent().find(".__27d0").css({marginTop: "-10px"});
			a.addEventListener("blur",function() {
				if (dom.v(a)=='') $(a).parent().find(".__27d0").css({marginTop: "9px"});
			},false);
		},
		createPL: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.vl(["_pl-n"])) return; else if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
			http.start({'s':125,'v':{'n':dom.v(dom.id("_pl-n")),'t':dom.v(dom.id("_pl-t")),id:1}}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
					if ($(".__19ba").length!=0&&c['s']==1){
					if ($(".__19b0").length==0) $(".__19ba").html('<div class="__19b0"></div>');
					$(".__19b0").prepend(c['p']);
					$(".__24lb").html(c['c']);
					$("#box").html('<div class="_2i" onclick="return load.marginOff()"></div><div class="_2j" id="load-box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" style="background: white; width: 500px; margin-top: 30px; height: 623px;">'+c['h']+'</div>').find("#_box").animate({'opacity':1},100);
					sortable();
					} else $("#box").html('<div class="_2i" onclick="return load.marginOff()"></div><div class="_2j" id="load-box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" style="background: white; width: 500px; margin-top: 209.5px; height: 181px;">'+c['h']+'</div>').find("#_box").animate({'opacity':1},100);
			}
		},
		newPList: function() {
			go.loadInit(124);
		},
		pListUp: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if ($(".__19b0").length==0) return; else if ($(".__19b0").attr("data-s")==1) return; else $(".__19b0").attr("data-s",1);
			http.start({'s':123,'v':$(".__19b0").children().length}).onreadystatechange = function() {
				if (!http.st(this)) return; else if ($(".__19b0").attr("data-s")!=1) return; else c = this.responseText;
				if (c=='') return; else $(".__19b0").append(c).attr("data-s",0);
			}
		},
		delPt: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("#load-box").fadeOut(100);
			$("#box").append('<div class="_2b" id="op-add" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_2h" onclick="return go.audio.delPLB()"></div><div class="_2c">Удаление плейлиста</div><div class="_2d"><div class="_2e">Вы действительно хотите удалить плейлист <span style="font-weight: bold; color: black;">'+a+'</span>?<br>Плейлист будет удален при следующем обновлений страницы.</div><div class="_2f"><div class="_2g bt" onclick="return go.audio.delPList()">YES, DELETE</div></div></div></div>').find("#op-add").fadeIn(100);
		},
		delPList: function() {
			$(".playlist-"+$(".__24q3").attr("data-id")).remove();
			if ($(".__19b0").children().length < 1) $(".__19b").html('<div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">Объединяйте аудиозаписи в плейлисты по жанрам или по настроению. <span class="__22o0">добавить плейлист</span>.</div>');
			http.start({'s':117,'v':[$(".__24q3").attr("data-id"),1]});//id
			load.marginOff();
			go.viewSuccess('Плейлист удален');
		},
		plOpV: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			clearTimeout(go.audio.tmr);
			$(a).find(".__26g").stop().clearQueue().fadeIn(100).animate({marginTop: "15px"},100);
			a.addEventListener("mouseleave",function() {
				clearTimeout(go.audio.tmr);
				go.audio.tmr = setTimeout(function() {
				clearTimeout(go.audio.tmr);
				$(a).find(".__26g").stop().clearQueue().fadeOut(100).animate({marginTop: "20px"},100);
				},100);
			},false);
		},
		scroll: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if ($(".__24q3").length==0) return; else if ($(".__24q3").attr("data-s")==1) return; else $(".__24q3").attr("data-s",1);
			http.start({'s':122,'v':[$(".__24q3").attr("data-id"),$(".__24q3").children().length]}).onreadystatechange = function() {
					if (!http.st(this)) return; if ($(".__24q3").length==0) return; else c = http.txt(this);
					if ($(".__24q3").attr("data-id")!=c[0]) return; else if (c[1]!='') {
						$(".__24q3").append(c[1]).attr("data-s",0);
						$("#load-box").css("height",$("#_box").height());
						go.audio.join();
					}
			}
		},
		selPt: function(a) {
			go.loadInitV(121,a);
		},
		plistPLAY: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (typeof a != "object") return; else {
				http.start({'s':119,'v':b}).onreadystatechange = function() {
					if (!http.st(this)) return; c = http.txt(this);
					if (c[0]==0) return; else go.audio.clear();
					go.audio.au = c[1];
					go.audio.init(c[0]);
					go.audio.infoC(c[2]);
					go.audio.play();
					go.audio.playGo(c[1].dt.src);
				}
			}
		},
		delPLB: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("#op-add").remove();
			$("#load-box").fadeIn(100);
		},
		delPlaylist: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("#load-box").fadeOut(100);
			$("#box").append('<div class="_2b" id="op-add" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_2h" onclick="return go.audio.delPLB()"></div><div class="_2c">Удаление плейлиста</div><div class="_2d"><div class="_2e">Вы действительно хотите удалить плейлист <span style="font-weight: bold; color: black;">'+dom.id("pl-m").dataset.v+'</span>?<br>Он пропадёт у всех пользователей, которые добавили его к себе.</div><div class="_2f"><div class="_2g bt" onclick="return go.audio.delPL()">YES, DELETE</div></div></div></div>').find("#op-add").fadeIn(100);
		},
		plDel: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
			$(".playlist-"+$("#_box").attr("data-id")).remove();
			if ($(".__19b0").children().length < 1) $(".__19ba").html('<div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">Объединяйте аудиозаписи в плейлисты по жанрам или по настроению. <span class="__22o0" onclick="return go.audio.newPList()">добавить плейлист</span>.</div>');
			http.start({'s':117,'v':[$("#_box").attr("data-id"),1]}).onreadystatechange = function() {
				if (!http.st(this)) return; else $(".__24lb").html(this.responseText);
			};
			load.marginOff();
			go.viewSuccess('Плейлист удален');
		},
		delPL: function() {
			$(".playlist-"+$(".__24u").attr("data-id")).remove();
			if ($(".__19b0").children().length < 1) $(".__19ba").html('<div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">Объединяйте аудиозаписи в плейлисты по жанрам или по настроению. <span class="__22o0" onclick="return go.audio.newPList()">добавить плейлист</span>.</div>');
			http.start({'s':117,'v':[$(".__24u").attr("data-id"),1]}).onreadystatechange = function() {
				if (!http.st(this)) return; else $(".__24lb").html(this.responseText);
			};
			load.marginOff();
			go.viewSuccess('Плейлист удален');
		},
		rEP: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(".playlist-"+a.id).find(".__23z").html(a.m).end().find(".__24h").html(a.d[0]).end().find(".__23y").children(0).first().replaceWith(a.i);
			load.marginOff();
			go.viewSuccess('Изменения сохранены');
		},
		saveEditPlst: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
			if (!dom.vl(["pl-m"])) return; else if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
			go.ss({'s':116,'v':{'f':0,'id':$(".__24u").attr("data-id"),'m':dom.v(dom.id("pl-m")),'t':dom.v(dom.id("pl-t")),'i':dom.v(dom.id("hid_pic"))}});
		},
		vPO2: function(a,event,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
			c = [($(b).offset().top - $(window).scrollTop()),true];
			if (c[0]<210) {
				if (b.hasChildNodes()) if (b.firstChild.dataset.id==0) c[1] = false; 
				if (c[1]) $(b).html('<div class="__23f" data-id="0" style="margin: 25px 0 0 -132px;"><div class="__7a" style="margin: -16px 0 0 128px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0;"></div></div><div class="__4y __6z" onclick="return go.audio.delPl('+dom.es(JSON.stringify(a))+')">Удалить</div><div class="__4y __6z">Поделиться</div></div>').children(0).stop().clearQueue().fadeIn(100).animate({marginTop: "30px"},100); else $(b.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "30px"},100);
			} else {
				if (b.hasChildNodes()) if (b.firstChild.dataset.id==1) c[1] = false;
				if (c[1]) $(b).html('<div class="__23g" data-id="1" style="margin: -76px 0 0 -132px;"><div class="__4y __6z" onclick="return go.audio.delPl('+dom.es(JSON.stringify(a))+')">Удалить</div><div class="__4y __6z" style="margin-bottom: 5px;">Поделиться</div><div class="__7a" style="margin: 0 0 0 128px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0; margin: -16px 0 0 5px;"></div></div></div>').stop().clearQueue().children(0).fadeIn(100).animate({marginTop: "-71px"},100); else  $(b.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "-71px"},100);
			}
			b.addEventListener("mouseleave",function() {
				if ($(b).children(0).attr("data-id")==0) $(b).children(0).stop().clearQueue().fadeOut(100).animate({marginTop: "25px"},100); else $(b).children(0).stop().clearQueue().fadeOut(100).animate({marginTop: "-76px"},100);
			},false);
		},
		vPO: function(a,event,b) {//["32"],event,this
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
			c = [($(b).offset().top - $(window).scrollTop()),true];
			if (c[0]<210) {
				if (b.hasChildNodes()) if (b.firstChild.dataset.id==0) c[1] = false; 
				if (c[1]) $(b).html('<div class="__23f" data-id="0" style="margin: 25px 0 0 -132px;"><div class="__7a" style="margin: -16px 0 0 128px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0;"></div></div><div class="__4y __6z"  onclick="return go.audio.plistEdit(this,'+dom.es(JSON.stringify(a))+')">Редактировать</div><div class="__4y __6z" onclick="return go.audio.delPl('+dom.es(JSON.stringify(a))+')">Удалить</div><div class="__4y __6z">Поделиться</div></div>').children(0).stop().clearQueue().fadeIn(100).animate({marginTop: "30px"},100); else $(b.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "30px"},100);
			} else {
				if (b.hasChildNodes()) if (b.firstChild.dataset.id==1) c[1] = false;
				if (c[1]) $(b).html('<div class="__23g" data-id="1" style="margin: -112px 0 0 -132px;"><div class="__4y __6z" onclick="return go.audio.plistEdit(this,'+dom.es(JSON.stringify(a))+')">Редактировать</div><div class="__4y __6z" onclick="return go.audio.delPl('+dom.es(JSON.stringify(a))+')">Удалить</div><div class="__4y __6z" style="margin-bottom: 5px;">Поделиться</div><div class="__7a" style="margin: 0 0 0 128px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0; margin: -16px 0 0 5px;"></div></div></div>').stop().clearQueue().children(0).fadeIn(100).animate({marginTop: "-107px"},100); else  $(b.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "-107px"},100);
			}
			b.addEventListener("mouseleave",function() {
				if ($(b).children(0).attr("data-id")==0) $(b).children(0).stop().clearQueue().fadeOut(100).animate({marginTop: "25px"},100); else $(b).children(0).stop().clearQueue().fadeOut(100).animate({marginTop: "-112px"},100);
			},false);
		},
		delPl: function(a) {
			go.loadInitV(118,a);
		},
		viewPListOp: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
			$(a).fadeIn(200);
			a.addEventListener("mouseleave",function() {
			$(a).fadeOut(200);
			},false);
		},
		pLBack: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if ($(".__24v").attr("data-id")==1) {
				$(".__24v").attr("data-id",0);
				http.start({'s':112,'v':[0,$(".__24u").attr("data-id")]}).onreadystatechange = function() {
					if (!http.st(this)) return; else if ($(".__24v").attr("data-id")==0) {
						$(".__26o").removeClass("__26o1").html('');
						$(".__24v").html(this.responseText);
						$(".__26j1").fadeOut(200).removeAttr('onclick');
						go.scrollVW();
						sortable();
					}
				}
			}
		},
		plSCh: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(".__26n").attr("data-attr",JSON.stringify(a));
			return go.audio.plReturn();
		},
		plReturn: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!$(".__26l").length) return; else $(".__26l").val("");
			$(".__26l0").fadeOut(200);
			$(go.evilIt).attr("data-s",0);
			$(".pl-au-l").parent().parent().removeAttr("data-search");
			http.start({'s':113,'v':[0,JSON.parse($(".__26n").attr("data-attr"))[1]]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (c[0][0]==0) {
					d = ['',c[1].length,true,0];
					for (d[3];d[3]<d[1];d[3]++) d[0] += go.audio.conPlItem(c[1][d[3]]);
					$(".pl-au-l").removeAttr("style").html(d[0]);
				} else {
					$(".pl-au-l").removeAttr("style").html((c[1]!=''?c[1]:'<div class="__27a">'+(c[0][0]==2?'Плейлист пустой':'У вас нет плейлиста')+'</div>'));
				}
					go.scrollVW();
			}
		},
		plST: '',
		plSTxt: '',
		plS: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			clearTimeout(go.audio.plST);
			if (dom.v(a)!='') {
				go.audio.plST = setTimeout(function() {
					go.audio.getPlList([dom.v(a),b[0],0,25]);
				},500);
			} else {
				clearTimeout(go.audio.plST);
				go.audio.plReturn();
			}
		},
		getPlList: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(".__26l0").fadeIn(200);
			$(".pl-au-l").parent().parent().attr("data-search",JSON.stringify(a));
			go.audio.plSTxt = a[0];
			http.start({'s':114,'v':a}).onreadystatechange = function() {
					if (!http.st(this)) return; else if (!$(".__26l").length) return; else c = http.txt(this);
					if (go.audio.plSTxt!=c[2]) return; else if (c[0]==0) {
						$(".pl-au-l").removeAttr("style").html(c[1]);
					} else {
						b = [c[1].length,''];
						for (b[2]=0;b[2]<b[0];b[2]++) b[1] += go.audio.conPlItem(c[1][b[2]]);
						$(".pl-au-l").removeAttr("style").html(b[1]);
						$(go.evilIt).attr("data-s",0);
					}
					go.scrollVW();
			}
		},
		pLAdd: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if ($(".__24v").attr("data-id")==0) {
				$(".__24v").attr("data-id",1);
				http.start({'s':112,'v':[1,$(".__24u").attr("data-id")]}).onreadystatechange = function() {
					if (!http.st(this)) return; else if ($(".__24v").attr("data-id")==1) {
						$(".__26o").addClass("__26o1").html(this.responseText);
						$(".__26j1").fadeIn(200).attr('onclick','return go.audio.pLBack()');
						go.scrollVW();
					}
				}
			}
		},
		conPlItem: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			//[$c[3],musicIcon($c[3][0]),$a[1][1],1];
		/*
$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
$info[2][43] = ['_audio_u','id','own','au','ct','ss','dt'];//audio user
$info[2][44] = ['_audio_lk','id','au','own','ss'];//audio like
$info[2][45] = ['_audio_al','id','own','src','nm','dt','ss'];//audio album
$info[2][46] = ['_audio_al_lt','id','al','au','ct','ss'];//audio album list
$info[2][47] = ['_audio_al_add','id','own','al','ct','ss'];//audio album user
$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
$info[2][49] = ['_audio_playlist_add','id','plst','own','ss','ct'];//audio playlist add
$info[2][50] = ['_audio_playlist_list','id','plst','au','ss','ct'];//audio playlist list
		*/		//`a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][3]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][9]."`
		// onclick="return go.audio.sel('.htmlspecialchars(json_encode([[$b[0],$b[3],$b[4],$b[5],$b[6],$b[1],musicIcon($b[0])],[1,$a]])).')"
			return '<div class="__25j" id="playlist-'+a[0][0]+'" data-pl'+a[0][0]+' data-id="'+a[0][0]+'"><div class="__25d" onclick="return go.audio.sel('+dom.es(JSON.stringify([[a[0][0],a[0][3],a[0][4],a[0][5],a[0][6],a[0][1],a[1]],a[4]]))+')"><div class="__25e __25e0"></div><div class="__25f"><div class="__25g __25g0"><div class="__25k"><div class="__25m">'+a[0][4]+'</div><div class="__25n">'+a[0][3]+'</div></div><div class="__25l"><div class="__25l1">'+a[0][5]+'</div><div class="__25l0">0:00</div></div></div><div class="__25ha"></div></div></div>'+(a[3]==0?'<div class="__25i __25i0" onclick="return go.audio.pLSel(this,'+dom.es(JSON.stringify([a[2],a[0][0]]))+')" data-id="0"></div>':'<div class="__25i" onclick="return go.audio.pLSel(this,'+dom.es(JSON.stringify([a[2],a[0][0]]))+')" data-id="1"></div>')+'</div>';
		},
		plEdUpdate: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = $(".pl-au-l").parent().parent().attr('data-search');
			if (b!=undefined) {
				b = JSON.parse(b);
				go.audio.plSTxt = b[0];
				b[2] = $(".pl-au-l").children().length;
				http.start({'s':114,'v':b}).onreadystatechange = function() {
					if (!http.st(this)) return; else c = http.txt(this);
					if (go.audio.plSTxt!=c[2]) return; else if (c[0]!=0) {
						b = [c[1].length,''];
						for (b[2]=0;b[2]<b[0];b[2]++) b[1] += go.audio.conPlItem(c[1][b[2]]);
						$(".pl-au-l").append(b[1]);
						$(go.evilIt).attr("data-s",0);
					}
					go.scrollVW();
			}
			} else {
				http.start({'s':113,'v':[$(".pl-au-l").children().length,a]}).onreadystatechange = function() {
					if (!http.st(this)) return; else if (!$(".pl-au-l")[0]) return; else c = http.txt(this);
					if (c[1].length==0&&c[1]!='') return; else if (c[0][0]==1) {
						$(".pl-au-l").append(c[1]);
						$(go.evilIt).attr("data-s",0);
						go.scrollVW();
					} else {
						d = ['',$(".pl-au-l").children().length,c[1].length];
					for (d[3]=0;d[3]<d[2];d[3]++) {
						d[4] = true;
						for (d[5]=0;d[5]<d[1];d[5]++) if ($(".pl-au-l").children().eq(d[5]).attr("data-id")==c[1][d[3]][0][0]) d[4] = false;
						if (d[4]) d[0] += go.audio.conPlItem(c[1][d[3]]);
					}
					$(".pl-au-l").append(d[0]);
					$(go.evilIt).attr("data-s",0);
					go.scrollVW();
					}
				}
			}
		},
		plEdUp: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			http.start({'s':115,'v':[a,go.evilLength,go.evilCount]}).onreadystatechange = function() {
					if (!http.st(this)) return; else c = http.txt(this);
					if (go.evilCount!=c[2]) return; else if (c[3]=='') return; else $(go.evilIt).attr("data-s",0).find(".__25r").append(c[3]);
					$(go.evilIt).attr("data-s",0);
					go.scrollVW();
				}
		},
		plUpdate: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			http.start({'s':110,'v':[a,go.evilLength,go.evilCount]}).onreadystatechange = function() {
					if (!http.st(this)) return; else c = http.txt(this);
					if (go.evilCount!=c[2]) return; else if (c[3]=='') return; else $(go.evilIt).attr("data-s",0).find(".__25r").append(c[3]);
					$(go.evilIt).attr("data-s",0);
					go.scrollVW();
				}
		},
		pLSel: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			http.start({'s':109,'v':[a.dataset.id,b]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (c[0]==0) $("div #playlist-"+c[1][1]).find(".__25i").addClass("__25i0").attr("data-id",c[0]); else $("div #playlist-"+c[1][1]).find(".__25i").removeClass("__25i0").attr("data-id",c[0]);
				$(".__25a").html(c[2][0]+" аудиозапис"+(c[2][0]>1?"ей":"ь"));
				$("._"+c[1][0]).html(c[2][0]);
				$(".__25a0").html(c[2][1]);
				};
		},
		plIconAbort: function(a) {
			$(".__24q").html('<div class="__24q0"></div>');
			$("#hid_pic").attr("value",'');
		},
		plIcon: function(a) {
			$(".__24q").html('<img src="'+a.responseText+'" class="photo" width="90" height="90" onclick="return go.stop(event);"  onclick="return go.stop(event);"><div class="__24y" onclick="return go.audio.plIconAbort(this,go.stop(event));"></div>');
			$("#hid_pic").attr("value",a.responseText);
		},
		pICU: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("#up").remove();
			b = [a.files[0]];
			b[1] = b[0].type;
			if (b[0].size>104857600) return;else if (b[1]=='image/jpeg'||b[1]=='image/png'||b[1]=='image/gif'||b[1]=='image/jpg') {
			b[2] = new FormData();
			b[2].append("img",a.files[0]);
			b[2].append("id",1);
			b[2].append("up",1);
			http.imgUp(b[2]);
			}
		},
		pIC: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("#up").remove();
			a = dom.s(dom.e("input"),[["class","invisible"],["type","file"],["accept","image/x-png,image/gif,image/jpeg,image/jpg,image/png"],["onchange","go.audio.pICU(this)"],["id","up"]]);
			$(document.body).append(a);
			a.click();
		},
		plistEdit: function(a,b) {
			go.loadInitV(108,b);
		},
		edit: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.loadInitV(64,b);
		},
		opConSV: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(a.firstChild).animate({backgroundColor: "rgb(240,245,250)"},100);
			a.addEventListener("mouseleave",function() {
				$(a.firstChild).animate({backgroundColor: "white"},100);
			},false);
		},
		opSel: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			c = [dom.qs("data-op-sel")];
			for (c[1]=0;c[1]<c[0].length;c[1]++) dom.i(c[0][c[1]].firstChild,'');
			$(a.firstChild).html('<div class="__23v"></div>');
			go.audio.sOp.t = b;
			go.audio.stS();
		},
		opBox: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.audio.sOp.txt==0) {
				go.audio.sOp.txt = 1;
				$(a.firstChild).html('<div class="__23v"></div>');
			} else {
				go.audio.sOp.txt = 0;
				$(a.firstChild).html('');
			}
			go.audio.stS();
		},
		viewL: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(a.lastChild).fadeIn(0);
			a.addEventListener("mouseleave",function() {
				$(a.lastChild).fadeOut(0);
			},false);
		},
		opDS: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.audio.sOp.d = (a>=0)?a:0;
			if (go.audio.sOp.d==0) $(b.parentNode.previousSibling).html("По популярности"); else $(b.parentNode.previousSibling).html("По длительности");
			go.audio.stS();
		},
		opCon: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			a = '<div class="__23k" onclick="return go.stop(event);"><div class="__7a" style="margin: -21px 0 0 97px;"><div class="__7b"></div></div><div class="__23l"><div class="__23m">Поиск музыки</div><div class="__23n"><div class="__23o" onmouseenter="return go.audio.opConSV(this)" onclick="return go.audio.opSel(this,0)" data-op-sel><div class="__23p">'+(go.audio.sOp.t==0?'<div class="__23v"></div>':'')+'</div><div class="__23q">По композициям</div></div><div class="__23o" onmouseenter="return go.audio.opConSV(this)" onclick="return go.audio.opSel(this,1)" data-op-sel><div class="__23p">'+(go.audio.sOp.t==1?'<div class="__23v"></div>':'')+'</div><div class="__23q">По исполнителям</div></div></div></div><div class="__23m">Сортировать по</div><div class="__23r" onmouseenter="return go.audio.viewL(this,event)"><div class="__23t">'+(go.audio.sOp.d==0?'По популярности':'По длительности')+'</div><div class="__23u"><div class="__23t __23s" onclick="return go.audio.opDS(0,this)">По популярности</div><div class="__23t __23s" onclick="return go.audio.opDS(1,this)">По длительности</div></div></div><div class="__23n"><div class="__23o" onmouseenter="return go.audio.opConSV(this)" onclick="return go.audio.opBox(this)"><div class="__23p">'+(go.audio.sOp.txt==0?'':'<div class="__23v"></div>')+'</div><div class="__23q">Только с текстом</div></div></div></div>';
			return a;
		},
		sOpV: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!a.hasChildNodes()) dom.i(a,go.audio.opCon());
			$(a.firstChild).fadeToggle(200);
		},
		sOp: {t: 0,d: 0,txt: 0},
		stS: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.id("au-list")) return; else if ($(".__18x").val()=='') return; else http.start({'s':106,'v':[$(".__18x").val(),go.audio.sOp,0]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				$(dom.qs("data-au-p")[0]).children(0).removeClass("__19j");
				$(".__23h").fadeIn(0);
				$("#au-list").html(c[1]).removeAttr("data-id");
				d = [window.location.search.replace('?',''),true];
				d[2] = d[0].split("&");
				d[3] = d[2].length;
				for (d[5]=0;d[5]<d[3];d[5]++) {
					d[6] = d[2][d[5]].split("=");
					if (d[6][0]=='search') if (d[6][1]==undefined) continue; else if (d[6][1]==c[0][0]) d[1] = false;
				}
				if (d[1]) {
					e = [false,'',''];
					e[3] = ''; 
					for (d[5]=0;d[5]<d[3];d[5]++) {
						d[6] = d[2][d[5]].split("=");
						if (d[6][0]=='search') {
							if (!e[0]) {
								e[0] = true;
								e[1] += e[1]==''?"search="+c[0][0]:"&search="+c[0][0];
								e[3] = decodeURI(d[6][1]);
							} else e[1] += e[1]==''?d[2][d[5]]:'&'+d[2][d[5]];
						} else e[1] += e[1]==''?d[2][d[5]]:'&'+d[2][d[5]];
					}
					if (e[3]!=c[0][0]) {
					e[2] = e[0]?"?"+e[1]:"?search="+c[0][0]+e[1];
					window.history.replaceState({t:2,m:$(dom.qs("data-au-p")[0]).attr("data-au-p"),i:$("#au-list").attr("data-info"),u:window.document.location.href,h:window.document.title,q:(e[0]?e[3]:'')},window.document.title,window.document.location.href);
					window.history.pushState({t:2,m:$(dom.qs("data-au-p")[0]).attr("data-au-p"),i:$("#au-list").attr("data-info"),u:e[2],h:window.document.title,q:c[0][0]},window.document.title,e[2]);
					}
				}
				/*
				[["asd",{"t":0,"d":0,"txt":0},0],"<div class=\"__23w\">\u041f\u043e \u0437\u0430\u043f\u0440\u043e\u0441\u0443 <span style=\"font-weight: bold;white-space: normal;word-wrap: break-word;max-width: 418px;display: inline;\">asd<\/span> \u043d\u0435 \u043d\u0430\u0439\u0434\u0435\u043d\u043e \u043d\u0438 \u043e\u0434\u043d\u043e\u0439 \u0430\u0443\u0434\u0438\u043e\u0437\u0430\u043f\u0438\u0441\u0438<\/div>",""]
				*/
			}
		},
		searchClear: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			http.start({'s':107,'v':[$(".__18x").val(),JSON.parse(dom.id("au-list").dataset.info)]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = [http.txt(this),JSON.parse(dom.id("au-list").dataset.info)];
				if (c[0][0][1][0]!=c[1][0]) return; else if (c[0][0][1][1]!=c[1][1]) return;
				/*
				go.audio.init(c[0]);
				go.audio.infoC(c[2]);
				*/
				dom.s(dom.i(dom.id("au-list"),c[0][1]),[["data-id",dom.id("au-list").dataset.info]]);
				go.audio.init1();
				$(".__23h").fadeOut(0);
				$(".__23j").html("");
				$(".__18x").val("");
				$(dom.qs("data-au-p")[0]).children(0).addClass("__19j");
				go.audio.cUrl([c[0][0][0],0]);
			}
		},
		cUrl: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [window.location.href,window.location.search.replace('?','')];//http://infalike.com/audios1
		//["iseedeadpeople", 0]
		//?search=asdasd
		if (b[1]!='') {
			c = [''];
			b[2] = b[1].split("&");
			b[3] = b[2].length;
			for (b[4]=0;b[4]<b[3];b[4]++) {
				b[5] = b[2][b[4]].split("=");
				if (b[5][0]=='search') if (b[5][1]==undefined) continue; else if (decodeURI(b[5][1])==a[0]) c[0] = a[0];
			}
		if (c[0]!='') window.history.pushState({t:2,m:$(dom.qs("data-au-p")[0]).attr("data-au-p"),i:$("#au-list").attr("data-info"),u:window.document.location.href,h:window.document.title,q:c[0]},window.document.title,window.document.location.href);
		}
		if (a[1]==0) {
			c = '';
			b[2] = b[1].split("&");
			b[3] = b[2].length;
			b[6] = false;
			for (b[4]=0;b[4]<b[3];b[4]++) {
				b[5] = b[2][b[4]].split("=");
				if (b[5][0]!='search') c += c==''?'?'+b[2][b[4]]:'&'+b[2][b[4]]; else b[6] = true;
			}
			if (b[6]) {
			d = window.location.protocol+"//"+window.location.host+window.document.location.pathname+c;
			window.history.replaceState({t:2,m:$(dom.qs("data-au-p")[0]).attr("data-au-p"),i:$("#au-list").attr("data-info"),u:d,h:window.document.title,q:''},window.document.title,d);
			}
			sortable();
		}
		//window.parent.history.pushState({t:2,m:1,u:b[0],h:window.document.title,q:a[0]},window.document.title,b[0]);
		//window.parent.history.replaceState({t:1,m:1,u:b[1],h:a[2]},b[2],b[1]);
		//window.parent.history.pushState({t:1,m:1,u:b[1],h:a[2]},b[2],b[1]);
		//["sdasd", 0]
			/*
			start: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		a = [dom.i(dom.id('body')),dom.pid('refresh'),dom.pid("header-m").dataset.id,dom.id('body')];
		b = [JSON.parse(dom.i(dom.id('header'))),dom.ue(window.parent.location.href),window.parent.document.title,window.history.state,window.parent.location.pathname+window.parent.location.search];
		b[0].u = dom.ue(b[0].u);
		if (b[0]['h']==a[2]) {
			setTimeout(function() {
				a[3] = [a[3].childNodes,a[3].childNodes.length,document.createDocumentFragment()];
				for (a[4]=0;a[4]<a[3][1];a[4]++) dom.ap(a[3][2],a[3][0][a[4]]);
				a[4] = [a[1].childNodes,a[1].childNodes.length];
				for (a[5]=3;a[5]<a[4][1];a[5]++) a[1].removeChild(a[4][0][a[5]]);
				dom.ap(a[1],a[3][2]);
			},1);
		} else dom.si(a[1],a[0]);
		if (b[0].u!=b[4]) {
			if (b[0]['m']!=1) {
		if (b[3]==null) {
			window.parent.history.replaceState({t:1,m:1,u:b[1],h:a[2]},b[2],b[1]);
			window.parent.history.pushState({t:1,m:1,u:b[1],h:a[2]},b[2],b[1]);
		} else window.parent.history.pushState(b[3],b[2],b[1]);
		}
			window.parent.history.replaceState({t:1,m:1,u:b[0].u,h:a[2]},b[0].tt,b[0].u);
		}
		window.parent.document.title = b[0].tt;
	}
			*/
		},
		tmr: '',
		searchStart: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			clearTimeout(go.audio.tmr);
			if ($(".__18x").val()!='') {
				go.audio.tmr = setTimeout(function() {
					clearTimeout(go.audio.tmr);
					go.audio.stS();
				},500);
			} else go.audio.searchClear();
		},
		add: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (typeof(a)!='object') return; else if (go.audio.au.id==a[0]) $("div #__19t").attr({'onclick':'return go.audio.rem('+JSON.stringify(a)+',go.stop(event))','onmouseover':'return go.audio.help(this,0,\'Убрать аудиозапись\',event)'}).html('').prev().children(":first").animate({marginTop: 0},200);
			$("#__26f4").attr({"onclick":'return go.audio.rem('+JSON.stringify(a)+',go.stop(event))'}).find(".__26f4a").animate({marginTop: "-10px"},200);
			$("div #audio"+a[0]).children().not('.__20p,.__20q').css('opacity',1);
			$("div #audio"+a[0]).find(".__20n").attr({'class':'__20n __20n0','onclick':'return go.audio.rem('+JSON.stringify(a)+',go.stop(event))','onmouseover':'return go.audio.help1(this,\'Убрать аудиозапись\',event)'}).html('');
			http.start({'s':105,'v':[1,a[0]]}).onreadystatechange = function() {
						if (!http.st(this)) return; else c = http.txt(this);
						if (c=='') return; else if (c[0]==0) return; else if (dom.id("au-list")) {
							d = [go.audio.con(c[1],0),JSON.parse(dom.id("au-list").dataset.id)];
							if (d[1][0]==c[1]['lt'][0]&&d[1][1]==c[1]['lt'][1]) {
								d[2] = dom.id("au-list").firstChild;
								if (d[2].firstChild.dataset.id==undefined) $(d[2]).html('');
								d[3] = [d[2].childNodes,d[2].childNodes.length,true];
								for (d[4]=0;d[4]<d[3][1];d[4]++) if (d[3][0][d[4]].dataset.id==c[1].id) d[3][2] = false;
								if (d[3][2]) dom.ib(d[2],d[0]);
							}
						}
						/*
						[0,{"id":"76","lt":[0,"1"],"nm":"Despacito (pasito - suavecito)","au":"Luis Fonsi Ft. Daddy Yankee","dr":"03:47","gr":"0","cv":"\/sources\/def.png","dt":{"bt":0,"src":"http:\/\/au.infalike.com\/list\/629e\/e6fd\/1\/629ee6fdce1a40d9b17bbb0514650f06.mp3","tm":"2017-08-05 16:48:57"},"add":"1"}]
						*/
			}
		},
		rem: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (typeof(a)!='object') return; else if (go.audio.au.id==a[0]) $("div #__19t").attr({'onclick':'return go.audio.add('+JSON.stringify(a)+',go.stop(event))','onmouseover':'return go.audio.help(this,0,\'Добавить аудиозапись\',event)'}).html('').prev().children(":first").animate({marginTop: "-24px"},200);
			$("div #audio"+a[0]).find(".__20n").attr({'class':'__20n __20n1','onclick':'return go.audio.add('+JSON.stringify(a)+',go.stop(event))','onmouseover':'return go.audio.help1(this,\'Добавить аудиозапись\',event)'}).html('');
			$("#__26f4").attr({"onclick":'return go.audio.add('+JSON.stringify(a)+',go.stop(event))'}).find(".__26f4a").animate({marginTop: "-27px"},200);
			http.start({'s':105,'v':[0,a[0]]});
		},
		upR: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			load.marginOff();
			if (!dom.id("au-list")) return; else b = [JSON.parse($("#au-list").attr("data-id")),http.txt(a)];
			if (b[0][0]!=0) return; else if (b[0][1]!=1) return; else b[2] = go.audio.con(b[1],0);
			if (dom.id("au-list").firstChild.firstChild.dataset.id==undefined) {
				$("#au-list").first().html('');
				dom.c(dom.id("au-list").firstChild,b[2]);
			} else $(".__19b").prepend(b[2]);
		},
		aCon: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			return '<div class="__19c'+(a[0][9]==0?' ui-sortable-handle':'')+'" id="audio'+a[0][0]+'" onmouseenter="return go.audio.view(this)" onclick="return go.audio.sel('+dom.es(JSON.stringify([[a[0][0],a[0][2],a[0][3],a[0][4],a[0][5],a[0][7].bt,a[0][8],a[0][9]],[a[1].st,a[1].i]]))+')" data-id="'+a[0][0]+'"><div class="__20p" style="display: none;"><div class="__20s" onmouseover="return go.audio.opView(this,'+dom.es(JSON.stringify([a[0][0]]))+',event)"></div></div><div class="__20q">'+a[0][4]+'</div><div class="__19d" style="background-image: url('+a[0][8]+');">'+(a[0][7].bt!=1?'<div class="__20j"></div>':'')+'<div class="__20u"><div class="__20v"></div></div></div><div class="__19e"><div '+(a[0][6]==''?'class="__19f"':'class="__19f __19f0" onclick="return go.audio.txt(this,'+dom.es(JSON.stringify([a[0][0]]))+',go.stop(event));"')+'>'+a[0][2]+'</div><div class="__19g" onclick="return go.audio.authorS(this,'+dom.es(JSON.stringify([a[0][0],a[0][3]]))+')">'+a[0][3]+'</div></div><div class="__19f1"><div class="__19f2"></div></div></div>';
			/*
			<div class="__20n" onmouseover="return go.audio.help1(this,\'Удалить аудиозапись\',event)" onclick="return go.audio.del([&quot;123&quot;])"></div><div class="__20o" onmouseover="return go.audio.help1(this,\'Редактировать\',event)" onclick="return go.audio.edit([&quot;123&quot;],go.stop(event))"></div>
			[["95","1","unknown","unknown","02:06","0","",{"bt":1,"src":"http://au.infalike.com/list/46ee/44da/1/46ee44dac79d356174c469d8150d3975.mp3","tm":"2017-09-10 13:51:14"},"/sources/def.png",0],{"st":0,"i":"1"}]
			*/
		},
		update: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.id("m-up")) return; else if ($("#m-up").attr("data-s")==1) return; else $("#m-up").attr("data-s",1);
			$(".__27q").find(".__27q1").fadeOut(0).end().find(".__27q0").fadeIn(0);
			b = [[JSON.parse($("#m-up").attr("data-id")),$("#m-up").children().length],[]];
			if (b[0][0].t==0) b[1] = b[0]; else {
				b[3] = [1];
				for (b[2]=0;b[2]<b[0][1];b[2]++) {
					if ($("#m-up").children().eq(b[2]).attr("data-s")==0) {
						b[3] = [0,[$("#m-up").children().eq(b[2]).attr("data-id"),$("#m-up").children().eq(b[2]).find(".__27u").children().length]];
						break;
					}
				}
				if (b[3][0]==1) return; else b[1] = [b[0][0],b[3][1]];
			}
			http.start({'s':101,'v':b[1]}).onreadystatechange = function() {
				if (!http.st(this)) return; else $(".__27q").find(".__27q1").fadeIn(0).end().find(".__27q0").fadeOut(0);
				if (this.responseText=='') return; else if (!dom.id("m-up")) return; else c = [JSON.parse($("#m-up").attr("data-id")),http.txt(this),''];
				c[3] = c[1][2].length;
				if (!(c[0].st==c[1][0].st&&c[0].i==c[1][0].i&&c[0].t==c[1][0].t)) return; else if (c[3]!=0) {
					if (c[0].t==0) {
						for (c[4]=0;c[4]<c[3];c[4]++) c[2] += go.audio.aCon([c[1][2][c[4]],c[1][0]]);
						$("#m-up").append(c[2]).attr("data-s",0);
					} else {
						c[5] = [$("#m-up").children().length,0,''];
						for (c[5][1];c[5][1]<c[5][0];c[5][1]++) {
							for (c[6]=0;c[6]<c[3];c[6]++) {
								c[7] = $("#m-up").children().eq(c[5][1]).attr("data-id");
								if (c[7]==c[1][2][c[6]][0]) {
									if ($("#m-up").children().eq(c[5][1]).html()=='') $("#m-up").children().eq(c[5][1]).html('<div class="__27v">'+$("#m-up").children().eq(c[5][1]).attr("data-id")+'</div><div class="__27u"></div>');
									$("#m-up").children().eq((c[5][1]!=0?(c[5][1]-1):0)).attr("data-s",1);
									c[7] = [0,$("#m-up").children().eq(c[5][1]).find(".__27u").children().length,true];
									for (c[7][3]=0;c[7][3]<c[7][1];c[7][3]++) if ($("#m-up").children().eq(c[5][1]).find(".__27u").children().eq(c[7][3]).attr("data-id")==c[1][2][c[6]][1][0]) c[7][2] = false;
									if (c[7][2]) $("#m-up").children().eq(c[5][1]).find(".__27u").append(go.audio.aCon([c[1][2][c[6]][1],c[1][0]]));
									if (c[6]==(c[3]-1)) $("#m-up").children().eq(c[5][1]).attr("data-s",0);
								} else if (c[7]==c[1][1][0]) $("#m-up").children().eq(c[5][1]).attr("data-s",1);
							}
						}
						$("#m-up").attr("data-s",0);
					}
					go.audio.join();
				} else $(".__27q").fadeOut(200);
				/*
				[{"st":0,"i":"1","t":"1"},["E",23],[["E",["18","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["17","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["16","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["15","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["14","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["13","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["12","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["11","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["10","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["9","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["8","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["7","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["6","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["5","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["4","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["3","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["2","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["E",["1","1","Shape of you","Ed Sheeran","3:53","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/5c7a\/7ad5\/1\/5c7a7ad5a393f7d7ea96902317813920.mp3","tm":"2017-07-21 17:10:02"},"\/sources\/def.png",0]],["U",["59","1","By Seemx","unknown","03:32","0","",{"bt":1,"src":"http:\/\/au.infalike.com\/list\/6c98\/b495\/1\/6c98b495f2c936200323e2e46572fbd1.mp3","tm":"2017-08-05 16:13:15"},"\/sources\/def.png",0]],["U",["55","1","unknown","unknown","03:21","0","",{"bt":0,"src":"http:\/\/au.infalike.com\/list\/06ac\/b340\/1\/06acb3400965ddaffb0b37de4f1d76bf.mp3","tm":"2017-08-05 16:04:43"},"\/sources\/def.png",0]]]]
				*/
			}
		},
		vt: true,
		vc: false,
		volC: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.audio.mu!='') go.audio.mu.volume = go.audio.ob.vl;
		},
		vol: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.audio.vt) return; else go.audio.vt = false;
			c = [a.clientWidth,dom.eP(a)[0]];
			c[2] = Math.min(Math.max((dom.client(event)[0]-c[1]),0),c[0]);
			$(a).find(".__23c").css("left",(c[2]-$(a).find(".__23c").innerWidth()/2)+"px");
			c[3] = c[2]/c[0];
			go.audio.ob.vl = c[3];
			go.audio.volC();
			$("div .__19z0").css("width",(c[3]*100)+"%");
			$(a).find(".__19z1").fadeIn(100).addClass("__19r2");
			$(document.body).attr("onselectstart","return false;");
			document.addEventListener("mousemove",function(event) {
				if (go.audio.vt) return; else c[2] = Math.min(Math.max((dom.client(event)[0]-c[1]),0),c[0]);
				$(a).find(".__23c").stop().clearQueue().css("left",(c[2]-$(a).find(".__23c").innerWidth()/2)+"px");
				c[3] = c[2]/c[0];
				go.audio.ob.vl = c[3];
				go.audio.volC();
				$("div .__19z0").stop().clearQueue().css("width",(c[3]*100)+"%");
			},false);
			document.addEventListener("mouseup",function(event) {
				if (go.audio.vt) return; else go.audio.vt = true;
				$(a).find(".__19z1").removeClass("__19r2");
				if (!go.audio.vc) {
					$(a).find(".__19z1").stop().clearQueue().fadeOut(100);
					$(a).find(".__23c").animate({marginTop: "-24px"},100).fadeOut(200);
				}
				$(document.body).removeAttr("onselectstart");
			},false);
		},
		tmb: false,
		rewIt: '',
		rew: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.audio.st) return; else go.audio.st = false;
			go.audio.rewIt = [a.clientWidth,dom.eP(a)[0]];
			go.audio.rewIt[2] = Math.min(Math.max((dom.client(event)[0]-go.audio.rewIt[1]),0),go.audio.rewIt[0]);
			go.audio.rewIt[3] = a;
			$(go.audio.rewIt[3]).find(".__19r0, .__26c, .__19r0").stop().clearQueue().css("width",go.audio.rewIt[2]+"px");
			$(go.audio.rewIt[3]).find(".__19r1").addClass("__19r2");
			$(document.body).attr("onselectstart","return false;");
			document.addEventListener("mousemove",function(event) {
				if (go.audio.st) return; else go.audio.rewIt[2] = Math.min(Math.max((dom.client(event)[0]-go.audio.rewIt[1]),0),go.audio.rewIt[0]);
				$(go.audio.rewIt[3]).find(".__19r0, .__26c, .__19r0").stop().clearQueue().css("width",go.audio.rewIt[2]+"px");
			},false);
			document.addEventListener("mouseup",function(event) {
				if (go.audio.st) return; else {
					if (go.audio.mu!='') go.audio.mu.currentTime = (go.audio.mu.duration/100)*((Math.min(Math.max((dom.client(event)[0]-go.audio.rewIt[1]),0),go.audio.rewIt[0])/go.audio.rewIt[0])*100);
					go.audio.st = true;
				}
				$(go.audio.rewIt[3]).find(".__19r1").removeClass("__19r2");
				if (!go.audio.tmb) {
					$(go.audio.rewIt[3]).find(".__19r1").stop().clearQueue().fadeOut(100);
					$("div .__23c0").animate({marginTop: "-24px"},100).fadeOut(200);
				}
				$(document.body).removeAttr("onselectstart");
			},false);
		},
		tmV: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = [parseInt(a)];
				b[1] = Math.floor(b[0]/3600);
				b[0] = b[0]-b[1]*3600;
				b[2] = Math.floor(b[0]/60);
				b[3] = Math.floor(b[0]%60);
				if (b[1]!=0) c = b[1]+':'; else c = '';
				if (b[2]!=0) c += c!=''?(b[2].toString().length<2?'0'+b[2]:b[2]+':'):b[2]+':'; else c += b[2]+':';
				c += b[3].toString().length<2?'0'+b[3]:b[3];
				return c;
		},
		tmS: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.audio.mu=='') return; else if (go.audio.mu.readyState!=4) return; else go.audio.tmb = true;
			b = [a.clientWidth,dom.eP(a)[0]];
			b[2] = Math.min(Math.max((dom.client(event)[0]-b[1]),0),b[0]);
			b[3] = (go.audio.mu.duration/100)*((b[2]/b[0])*100);
			$(a).find(".__19r1").fadeIn(100);
			$(a.firstChild).html(go.audio.tmV(b[3])).stop().clearQueue().css("left",(b[2]-$(a.firstChild).innerWidth()/2)+"px").fadeIn(100).animate({marginTop: "-28px"},100);
			document.addEventListener("mousemove",function(event) {
				if (go.audio.mu=='') return; else b[2] = Math.min(Math.max((dom.client(event)[0]-b[1]),0),b[0]);
				b[3] = (go.audio.mu.duration/100)*((b[2]/b[0])*100);
				$(a.firstChild).html(go.audio.tmV(b[3])).css("left",(b[2]-$(a.firstChild).innerWidth()/2)+"px");
			},false);
			a.addEventListener("mouseleave",function(event) {
				go.audio.tmb = false;
				if (go.audio.st) {
					$(a).find(".__19r1").stop().clearQueue().removeClass("__19r2").fadeOut(100);
					$(a.firstChild).animate({marginTop: "-24px"},100).fadeOut(200);
				}
			},false);
		},
		volIt: [],
		volS: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.audio.vc = true;
			$(a).find(".__19z1").stop().clearQueue().fadeIn(100);
			go.audio.volIt = [a.clientWidth,dom.eP(a)[0]];
			go.audio.volIt[2] = Math.min(Math.max((dom.client(event)[0]-go.audio.volIt[1]),0),go.audio.volIt[0]);
			$(a).find(".__23d").text(parseInt((go.audio.volIt[2]/go.audio.volIt[0])*100));
			$(a).find(".__23c").stop().clearQueue().css("left",(go.audio.volIt[2]-$(a).find(".__23c").innerWidth()/2)+"px").fadeIn(100).animate({marginTop: "-28px"},100);
			document.addEventListener("mousemove",function(event) {
				go.audio.volIt[2] = Math.min(Math.max((dom.client(event)[0]-go.audio.volIt[1]),0),go.audio.volIt[0]);
				$(a).find(".__23d").text(parseInt((go.audio.volIt[2]/go.audio.volIt[0])*100));
				$(a).find(".__23c").css("left",(go.audio.volIt[2]-$(a).find(".__23c").innerWidth()/2)+"px");
			},false);
			a.addEventListener("mouseleave",function(event) {
				go.audio.vc = false;
				if (go.audio.vt) {
					$(a).find(".__19z1").stop().clearQueue().fadeOut(100);
					$(a).find(".__23c").animate({marginTop: "-24px"},100).fadeOut(200);
				}
			},false);
		},
		mode: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = [dom.id("_au_mode")];
			b[1] = b[0].dataset.id;
			if (b[1]==0) {
				$(b[0]).attr({'class':'__19s2','data-id':1}).html('').next().attr("onmouseenter","return go.audio.help(this,1,\'Repeat mode\',event)").html('');
				$(".__26f4b").css("marginTop","2px");
				go.audio.ob.lp = 1;
			} else if (b[1]==1) {
				$(b[0]).attr({'class':'__19s3','data-id':2}).html('<div class="__19s4"></div>').next().attr("onmouseenter","return go.audio.help(this,1,\'Random mode\',event)").html('');
				$(".__26f4b").css("marginTop","-26px");
				go.audio.ob.lp = 2;
			} else if (b[1]==2) {
				$(b[0]).attr({'class':'__19s1','data-id':0}).html('').next().attr("onmouseenter","return go.audio.help(this,1,\'Normal mode\',event)").html('');
				go.audio.ob.lp = 0;
				$(".__26f4b").css("marginTop","-12px");
			}
		},
		clear: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.storage.get('au')!='') {
			$(".__8h0").fadeOut(0);
			$(".__18l").fadeIn(0);
			$("#__7a").css("marginLeft","215px");
			$(".__18n").html(go.audio.au.au+" - "+go.audio.au.nm).attr('title',go.audio.au.au+" - "+go.audio.au.nm);
			}
			$(".__20a,.__26e").html('0:00');
			$(".__19a,.__25x0").css("background-image",go.audio.au.cv).html((go.audio.au.bt==0?'<div class="__20j"></div>':''));
			$(".__25x0").css("background-image",go.audio.au.cv);
			$(".__19p").html('<span style="font-weight: bold;color: black;" class="__23a">'+go.audio.au.au+'</span><span class="__23a" style="margin: 0 6px 0 6px;"> – </span><span>'+go.audio.au.nm+'</span>');
			$(".__19u").attr({"onclick":"return go.audio.same("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+")"});
			$(".__19r0, .__23b,.__26c0").animate({"width":0},200);
			a = [dom.qs("data-play")];
			a[1] = a[0].length;
			for (a[2]=0;a[2]<a[1];a[2]++) {
				$(a[0][a[2]]).removeClass("__19c0").removeAttr("data-play").find(".__20u").removeClass("__20u0 __20u1").children(0).attr("class","__20v");
			}
			$("[data-plistp]").removeAttr("data-plistp").removeClass("__25d0").find(".__25e").removeClass("__25e1").addClass("__25e0").end().find(".__24q17a").html('').end().find(".__25g").addClass("__25g0").end().find(".__25l1").css("display","block").end().find(".__25l0").removeClass("__25l2");
			$("[data-plistplay]").removeAttr("data-plistplay").removeClass("__25d0").end().find(".__25e").removeClass("__25e1").addClass("__25e0").end().find(".__25ha").html('').end().find(".__25g").addClass("__25g0").end().find(".__25l1").css("display","block").end().find(".__25l0").removeClass("__25l2");
			if (go.audio.mu!='') go.audio.mu.pause("plistplay");
			go.audio.mu = '';
			$("div #audio"+go.audio.au.id).addClass("__19c0").attr("data-play","").find(".__20u").removeClass("__20u0").removeClass("__20u1").children(0).attr("class","__20v");
			$(".plm-cur").attr("onclick","return go.audio.plistPLAY(this,"+JSON.stringify([$(".plm-cur").attr("data-id")])+",go.stop(event))").removeClass("plm-cur __24e0").addClass("__24e");
			$(".plm-cur").attr("onclick","return go.audio.plistPLAY(this,"+JSON.stringify([$(".plm-cur").attr("data-id")])+",go.stop(event))").removeClass("plm-cr __24q11a").addClass("__24q11");
		},
		playGo: function(b,a=0) {
			go.audio.mu = new Audio();
			go.audio.mu.src = b;
			go.audio.mu.volume = go.audio.ob.vl;
			go.audio.mu.preload = 'auto';
			go.audio.mu.onended = function() {
				go.audio.end();
			}
			go.audio.mu.ontimeupdate = function() {
				go.audio.tm();
			}
			go.audio.mu.onprogress = function() {
				go.audio.progress();
			}
			if (a!=1) go.audio.mu.oncanplay = function() {
				if (go.audio.ob.ps==1) go.audio.mu.play();
			}
		},
		sel: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (typeof a != "object") return; else if (go.audio.au.id!=undefined) {
				if (go.audio.au.id==a[0][0]) {
					if (go.audio.ob.ps==0) go.audio.play(); else go.audio.pause();
					return;
				} else {
					go.audio.au = {id: a[0][0],lt: a[1],nm: a[0][1],au: a[0][2],dr: a[0][3],gr: a[0][4],cv: a[0][6],bt: a[0][5]};
					go.audio.clear();
					http.start({'s':99,'v':[a[0][0],a[1]]}).onreadystatechange = function() {
						if (!http.st(this)) return; else c = http.txt(this);
						go.audio.au = c[1];
						go.audio.init(c[0]);
						go.audio.infoC(c[2]);
						go.audio.play();
						go.audio.playGo(c[1].dt.src);
					}
				}
			}
		},
		join: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			a = [go.audio.mu.duration,go.audio.mu.currentTime];
			go.audio.init(0);
			$("[data-pl"+go.audio.au.id+"]").find(".__25d").addClass("__25d0").attr('data-plistplay','').end().find(".__25g").removeClass("__25g0").end().find(".__25ha").html('<div class="__25hb" onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c0"></div><div class="__25hc"><div class="__25hd"></div><div class="__19r0" style="width: '+((a[1]/a[0])*100)+'%;"><div class="__19r1"></div></div></div></div><div class="__25he" onmouseenter="return go.audio.volS(this,event,0)" onmousedown="return go.audio.vol(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c"><div class="__23d"></div></div><div class="__25hf"><div class="__19z0"><div class="__19z1"></div></div></div></div>').end().find(".__25l1").css("display","none").end().find(".__25l0").addClass("__25l2");
			$(".__24q16-"+go.audio.au.id).addClass("__25d0").attr('data-plistp','').find(".__25g").removeClass("__25g0").end().find(".__24q17a").html('<div class="__25hb __24q18" onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c0"></div><div class="__25hc"><div class="__25hd"></div><div class="__19r0" style="width: '+((a[1]/a[0])*100)+'%;"><div class="__19r1"></div></div></div></div><div class="__25he __24q19" onmouseenter="return go.audio.volS(this,event,0)" onmousedown="return go.audio.vol(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c"><div class="__23d"></div></div><div class="__25hf"><div class="__19z0"><div class="__19z1"></div></div></div>').end().find(".__25l1").css("display","none").end().find(".__25l0").addClass("__25l2");
			$(".plm-cur").attr("onclick","return go.audio.plistPLAY(this,"+JSON.stringify([$(".plm-cur").attr("data-id")])+",go.stop(event))").removeClass("plm-cur __24e0").addClass("__24e");
			$(".plm-cr").attr("onclick","return go.audio.plistPLAY(this,"+JSON.stringify([$(".plm-cr").attr("data-id")])+",go.stop(event))").removeClass("plm-cr").children().eq(0).attr("class","__24q11");
			if (go.audio.ob.ps==0) {
				$(".__19l").removeClass("__19m0").addClass("__19m").attr("onclick","return go.audio.play(go.stop(event));");
				$(".__19r0,.__26c").css("width",((a[1]/a[0])*100)+"%");
				if (go.audio.au.lt[1][0]==1) {
				$(".plM-"+go.audio.au.lt[1][1]).removeClass("__24e0").addClass("__24e plm-cur").attr("onclick","return go.audio.play(go.stop(event));");
				$(".__24q10-"+go.audio.au.lt[1][1]).addClass("plm-cr").attr("onclick","return go.audio.play(go.stop(event));").children().eq(0).attr("class","__24q11");
				}
			} else {
				$(".__19l").removeClass("__19m").addClass("__19m0").attr("onclick","return go.audio.pause(go.stop(event));");
				$("[data-pl"+go.audio.au.id+"],.__25d0").find(".__25e").removeClass("__25e0").addClass("__25e1");
				$("div #audio"+go.audio.au.id).find(".__20u").removeClass("__20u1").addClass("__20u0");
				if (go.audio.au.lt[1][0]==1) {
				$(".plM-"+go.audio.au.lt[1][1]).removeClass("__24e").addClass("__24e0 plm-cur").attr("onclick","return go.audio.pause(go.stop(event));");
				$(".__24q10-"+go.audio.au.lt[1][1]).addClass("plm-cr").attr("onclick","return go.audio.pause(go.stop(event));").children().eq(0).attr("class","__24q11a");
				}
			}
			go.audio.tm();
			a[2] = (go.audio.ob.vl/1)*100;
			$("div .__19z0").css("width",a[2]+"%");
			$("[data-pl"+go.audio.au.id+"]").find(".__19z0").css("width",a[2]+"%");
			if (go.audio.mu.buffered.length>0) {
				a[2] = (go.audio.mu.buffered.end(go.audio.mu.buffered.length-1)/a[0])*100;
				$(".__23b,.__26c0,.__25hd").css("width",a[2]+"%");
			}
			http.start({'s':99,'v':[go.audio.au.id,go.audio.au.lt]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (typeof(c)!='object') return; else if (c[0]==0) return;
				go.audio.infoC(c[2]);
			}
		},
		pause: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(".__18r").removeClass("__18s0").addClass("__18s");
			$("#__18o, .__25x").attr("onclick",'return go.audio.play(go.stop(event));');
			$(".__19l").removeClass("__19m0").addClass("__19m").attr("onclick","return go.audio.play(go.stop(event));");
			$(".plm-cur").removeClass("__24e0").addClass("__24e").attr("onclick","return go.audio.play(go.stop(event));");
			$(".plm-cr").attr("onclick","return go.audio.play(go.stop(event));").children(":first").attr("class","__24q11");
			go.audio.ob.ps = 0;
			$("div #audio"+go.audio.au.id).find(".__20u").addClass("__20u1").removeClass("__20u0").children(0).attr("class","__20v");
			$("[data-pl"+go.audio.au.id+"],.__25d0").find(".__25e").removeClass("__25e1").addClass("__25e0");
			if (go.audio.mu!='') {
				$(go.audio.mu).stop().clearQueue().animate({volume: 0}, 500,function() {
					go.audio.mu.pause();
				});
			}
		},
		tm: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			a = ['',Math.floor(go.audio.mu.currentTime)];
			if (a[1]==0) return; else a[2] = parseInt(a[1]/60);
			if (a[2]>59) a[0] = parseInt(a[2]/60)+':';
			if (a[2]>59) {
				a[3] = a[2]%60;
				a[0] += a[3]>=10?a[3]+':':'0'+a[3]+':';
			} else a[0] += a[2]+':';
			a[2] = Math.floor(a[1]%60);
			a[0] += a[2]>=10?a[2]:'0'+a[2];
			if (isNaN(a[2])) return; else $(".__20a,.__26e,.__25l2").html(a[0]);
			if (go.audio.st) {
				a[3] = (go.audio.mu.currentTime/go.audio.mu.duration)*100;
				$(".__19r0,.__26c").css("width",a[3]+"%");
			}
		},
		progress: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!(go.audio.mu.buffered.length>0)) return; else $(".__23b,.__26c0").animate({width: ((go.audio.mu.buffered.end(go.audio.mu.buffered.length-1)/go.audio.mu.duration)*100)+"%"},200);
		},
		play: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			//if (a.id==undefined) return; else if (a.dt!=undefined) {
				$(".__18r").removeClass("__18s").addClass("__18s0");
				$("#__18o, .__25x").attr("onclick",'return go.audio.pause(go.stop(event));');
				$(".__19l").removeClass("__19m").addClass("__19m0").attr("onclick","return go.audio.pause(go.stop(event));");
				$(".plm-cur").removeClass("__24e").addClass("__24e0").attr("onclick","return go.audio.pause(go.stop(event));");
				$(".plm-cr").attr("onclick","return go.audio.pause(go.stop(event));").children(":first").attr("class","__24q11a");
				go.audio.ob.ps = 1;
				if (go.audio.mu!='') {
					go.audio.mu.play();
					$(go.audio.mu).stop().clearQueue().animate({volume: go.audio.ob.vl}, 500);
					if (go.storage.get('au')=='') {
						$(".__8h0").fadeOut(0);
						$(".__18l").fadeIn(0);
						$("#__7a").css("marginLeft","215px");
						$(".__18n").html(go.audio.au.au+" - "+go.audio.au.nm).attr('title',go.audio.au.au+" - "+go.audio.au.nm);
						go.storage.set("au",go.audio.au.lt);
					}
				}
				$("div #audio"+go.audio.au.id).find(".__20u").removeClass("__20u1").addClass("__20u0").children(0).attr("class","__20v0");
				$("[data-pl"+go.audio.au.id+"],.__25d0").find(".__25e").removeClass("__25e0").addClass("__25e1");
		},
		tmr: '',
		opConV: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			clearTimeout(go.audio.tmr);
			$(".__26g").stop().clearQueue().fadeIn(100).animate({marginTop: "20px"},100);
			a.addEventListener("mouseleave",function() {
				clearTimeout(go.audio.tmr);
				go.audio.tmr = setTimeout(function() {
				clearTimeout(go.audio.tmr);
				$(".__26g").stop().clearQueue().fadeOut(100).animate({marginTop: "25px"},100);
				},100);
			},false);
		},
		opView: function(a,b,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			clearTimeout(go.audio.tmr);
			c = [($(a).offset().top - $(window).scrollTop()),true];
			if (c[0]<210) {
				if (a.hasChildNodes()) if (a.firstChild.dataset.id==0) c[1] = false; 
				if (c[1]) $(a).html('<div class="__23f" data-id="0"><div class="__7a" style="margin: -16px 0 0 134px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0;"></div></div><div class="__4y __6z">Поделиться</div><div class="__4y __6z">Добавить в плейлист</div><div class="__4y __6z">Найти похожие</div></div>').children(0).stop().clearQueue().fadeIn(100).animate({marginTop: "30px"},100); else $(a.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "30px"},100);
			} else {
				if (a.hasChildNodes()) if (a.firstChild.dataset.id==1) c[1] = false;
				if (c[1]) $(a).html('<div class="__23g" data-id="1"><div class="__4y __6z">Поделиться</div><div class="__4y __6z">Добавить в плейлист</div><div class="__4y __6z" style="margin-bottom: 5px;">Найти похожие</div><div class="__7a" style="margin: 0 0 0 134px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0;margin: -16px 0 0 5px;"></div></div></div>').stop().clearQueue().children(0).fadeIn(100).animate({marginTop: "-124px"},100); else  $(a.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "-124px"},100);
			}
			a.addEventListener("mouseleave",function() {
				clearTimeout(go.audio.tmr);
				go.audio.tmr = setTimeout(function() {
				clearTimeout(go.audio.tmr);
				if ($(a).children(0).attr("data-id")==0) $(a).children(0).stop().clearQueue().fadeOut(100).animate({marginTop: "25px"},100); else $(a).children(0).stop().clearQueue().fadeOut(100).animate({marginTop: "-110px"},100);
				},100);
			},false);
		},
		txt: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (typeof(b)!='object') return; else c = [a.parentNode.nextSibling];
			$(a.parentNode.parentNode).find(".__19f1").attr("data-svw","scroll-vw");
			$(c[0]).fadeToggle(100);
			if ($(c[0]).attr("data-s")==1) return; else $(c[0]).attr("data-s",1); 
			http.start({'s':103,'v':b}).onreadystatechange = function() {
				if (!http.st(this)) return; $(c[0]).html(dom.br(this.responseText));
				setTimeout(function() {
					go.scrollVW();
				},1);
			}
		},
		prev: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.audio.au=='') return; else http.start({'s':102,'v':[go.audio.au.lt,1]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (c=='') {
					go.audio.pause();
					return;
				}
				go.audio.au = c[0];
				go.audio.clear();
				go.audio.init(1);
				go.audio.infoC(c[1]);
				go.audio.play();
				go.audio.playGo(c[0].dt.src);
			}
		},
		next: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.audio.au=='') return; else http.start({'s':102,'v':[go.audio.au.lt,0]}).onreadystatechange = function() {
				if (!http.st(this)) return; else console.log(this.responseText);c = http.txt(this);
				if (c=='') {
					go.audio.pause();
					return;
				}
				go.audio.au = c[0];
				go.audio.clear();
				go.audio.init(1);
				go.audio.infoC(c[1]);
				go.audio.play();
				go.audio.playGo(c[0].dt.src);
			}
		},
		end: function() {
			if (go.audio.ob.lp==1) {
				go.audio.mu.currentTime = 0;
				go.audio.play();
			} else if (go.audio.ob.lp==0) {
				go.audio.next();
			} else {
				prompt();
			}
		},
		infoC: function(a) {
			if (!dom.id('audio-right')) return; else if (!dom.id('audio-info')) $('#audio-right').prepend('<div class="__3n" id="audio-info"></div>');
			if ($(window).scrollTop()>75) $(".__25w").fadeIn(200);
			$("#audio-info").html(a[1]);
			if (a[0]==0) {
				$("#__19w").removeClass("__19w0").attr("onclick","return go.audio.lk("+dom.es(JSON.stringify([parseInt(a[2])]))+")");
				$("#_au-l").attr("onclick","return go.audio.lk("+dom.es(JSON.stringify([parseInt(a[2])]))+")").html("Мне нравиться");
			} else if (a[0]==1) {
				$("#__19w").addClass("__19w0").attr("onclick","return go.audio.unlk("+dom.es(JSON.stringify([parseInt(a[2])]))+")");
				$("#_au-l").attr("onclick","return go.audio.unlk("+dom.es(JSON.stringify([parseInt(a[2])]))+")").html("Мне не нравиться");
			}
		},
		init: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a==1) {
				$(".__8h0").fadeOut(0);
				$(".__18l").fadeIn(0);
				$("#__7a").css("marginLeft","215px");
				$(".__18n").html(go.audio.au.au+" - "+go.audio.au.nm).attr('title',go.audio.au.au+" - "+go.audio.au.nm);
				go.storage.set("au",go.audio.au.lt);
			}
			if (go.audio.au.lt[1][0]==1) {
				$(".plM-"+go.audio.au.lt[1][1]).addClass("plm-cur").attr("onclick","return go.audio.play(go.stop(event));");
				$(".__24q10-"+go.audio.au.lt[1][1]).addClass("plm-cr").attr("onclick","return go.audio.play(go.stop(event));");
			}
				$(".__24q16-"+go.audio.au.id).addClass("__25d0").attr('data-plistp','').find(".__25g").removeClass("__25g0").end().find(".__24q17a").html('<div class="__25hb __24q18" onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c0"></div><div class="__25hc"><div class="__25hd"></div><div class="__19r0" style="width: '+((a[1]/a[0])*100)+'%;"><div class="__19r1"></div></div></div></div><div class="__25he __24q19" onmouseenter="return go.audio.volS(this,event,0)" onmousedown="return go.audio.vol(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c"><div class="__23d"></div></div><div class="__25hf"><div class="__19z0"><div class="__19z1"></div></div></div>').end().find(".__25l1").css("display","none").end().find(".__25l0").addClass("__25l2");
				$("[data-pl"+go.audio.au.id+"]").find(".__25d").addClass("__25d0").attr('data-plistplay','').end().find(".__25g").removeClass("__25g0").end().find(".__25ha").html('<div class="__25hb" onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c0"></div><div class="__25hc"><div class="__25hd"></div><div class="__19r0" style="width: '+((a[1]/a[0])*100)+'%;"><div class="__19r1"></div></div></div></div><div class="__25he" onmouseenter="return go.audio.volS(this,event,0)" onmousedown="return go.audio.vol(this,go.stop(event),0)" onclick="return go.stop(event);"><div class="__23c"><div class="__23d"></div></div><div class="__25hf"><div class="__19z0" style="width:'+((go.audio.ob.vl/1)*100)+'%;"><div class="__19z1"></div></div></div></div>').end().find(".__25l1").css("display","none").end().find(".__25l0").addClass("__25l2");
				$(".__20a,.__26e,.__26e").html('0:00');
				$(".__25x").attr("id","audio"+go.audio.au.id);
				$(".__19a,.__25x0").css("background-image",go.audio.au.cv).html((go.audio.au.dt.bt==0?'<div class="__20j"></div>':''));
				$(".__19p").html('<span style="font-weight: bold;color: black;" class="__23a">'+go.audio.au.au+'</span><span class="__23a" style="margin: 0 6px 0 6px;"> – </span><span>'+go.audio.au.nm+'</span>');
				$(".__25z").html(go.audio.au.au);
				$(".__26a").html(go.audio.au.nm);
				$(".__19u").attr({"onclick":"return go.audio.same("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+")"});
				$("#_au_mode").attr("class",(go.audio.ob.lp==0?'__19s1':(go.audio.ob.lp==1?'__19s2':'__19s3')));
				if (go.audio.au.add==2) {
					$("#__19t").attr({"onmouseenter":"return go.audio.help(this,0,\'Delete audio\',event)","onclick":"return go.audio.del("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+",go.stop(event))"}).prev().children(":first").animate({marginTop: "-48px"},200);
					$("#__26f4").attr({"onclick":"return go.audio.del("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+",go.stop(event))"}).find(".__26f4a").animate({marginTop: "5px"},200);
				} else if (go.audio.au.add==1) {
					$("#__19t").attr({"onmouseenter":"return go.audio.help(this,0,\'Remove audio\',event)","onclick":"return go.audio.rem("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+",go.stop(event))"}).prev().children(":first").animate({marginTop: 0},200);
					$("#__26f4").attr({"onclick":"return go.audio.rem("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+",go.stop(event))"}).find(".__26f4a").animate({marginTop: "-10px"},200);
				} else {
					$("#__19t").attr({"onmouseenter":"return go.audio.help(this,0,\'Add audio\',event)","onclick":"return go.audio.add("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+",go.stop(event))"}).prev().children(":first").animate({marginTop: "-24px"},200);
					$("#__26f4").attr({"onclick":"return go.audio.rem("+dom.es(JSON.stringify([parseInt(go.audio.au.id)]))+",go.stop(event))"}).find(".__26f4a").animate({marginTop: "-27px"},200);
				}
				go.audio.init1();
		},
		init1: function() {
			if (go.audio.ob.ps==0) {
					$("div #audio"+go.audio.au.id).addClass("__19c0").attr("data-play","").find(".__20u").removeClass("__20u0").addClass("__20u1").children(0).attr("class","__20v");
				} else {
					$("div #audio"+go.audio.au.id).addClass("__19c0").attr("data-play","").find(".__20u").removeClass("__20u1").addClass("__20u0").children(0).attr("class","__20v0");
				}
		},
		start: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			http.start({'s':99,'v':go.storage.get('au')}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (typeof(c)!='object') return; else if (c[0]==0) return go.audio.infoC(c[2]);
				go.audio.au = c[1];
				if (c[0]==2) go.audio.clear();
				go.audio.init(c[0]);
				go.audio.infoC(c[2]);
				go.audio.playGo(c[1].dt.src,1);
				go.audio.stS();
			}
		},
		mu: '',
		au: '',
		ob: {vl: 1,lp: 0,ct: 0,ps: 0},
		st: true,
		lk: function(a) {
			$("div #__19w").addClass("__19w0").attr("onclick","return go.audio.unlk("+JSON.stringify(a)+")");
			$("#_au-l").attr("onclick","return go.audio.unlk("+JSON.stringify(a)+")").html("Мне не нравиться");
			http.start({'s':98,'v':[0,a[0]]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				$("div #l-au-"+c[0]).html(c[1]);
			}
		},
		unlk: function(a) {
			$("div #__19w").removeClass("__19w0").attr("onclick","return go.audio.lk("+JSON.stringify(a)+")");
			$("#_au-l").attr("onclick","return go.audio.lk("+JSON.stringify(a)+")").html("Мне нравиться");
			http.start({'s':98,'v':[1,a[0]]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				$("div #l-au-"+c[0]).html(c[1]);
			}
		},
		status: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		},
		like: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (typeof(a)!='object') return; else go.loadInitV(97,a);
		},
		bl: false,
		control: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.id("au-con")) return;
			if ($(window).scrollTop()>75) {
				$("#audio-right").addClass("__13f0");
				$(".__25w").fadeIn(100);
			} else {
				$("#audio-right").removeClass("__13f0");
				$(".__25w").fadeOut(100);
			}
			/*
			if ($(window).scrollTop()>145) {
				if (go.audio.bl) return; else go.audio.bl = true;
				$("#au-con").stop().clearQueue().addClass("__22v").animate({top: "44px"},250);
				$(".__13f").stop().clearQueue().css({"position":"fixed","top":($(".__13f").offset().top-$(window).scrollTop())+"px"}).animate({top: "41px"},250);
			} else {
				if (!go.audio.bl) return; go.audio.bl = false;
				$("#au-con").stop().clearQueue().animate({top: ($("#au-con-m").offset().top-$(window).scrollTop())+"px"},150,function() {
					$("#au-con").removeClass("__22v")
				});
				$(".__13f").stop().clearQueue().css({"position":"absolute","top":"auto"});
			}
			*/
		},
		up: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a.files[0].type!='audio/mp3') {
				go.doc.mvE(1);
				return;
			} else if (a.files[0].size>104857600) {
				go.doc.mvE(0);
				return;
			}
			http.audioUp({'i':1},a.files[0]);
		},
		upload: function() {
			go.loadInit(96);
		},
		menu: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(".__21q").fadeIn(200).animate({marginTop: "48px"},100);
			if ($("#audio-list").attr("data-status")==1) return; else $("#audio-list").attr("data-status",1);
			http.start({'s':95,'v':[]}).onreadystatechange = function() {
				if (!http.st(this)) return; else $(".__21r").html(this.responseText);
			}
		},
		help1: function(a,b,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a.hasChildNodes()) $(a.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "-32px"},100); else {
				$(dom.i(a,'<div class="__20r"><div class="__20x"></div>'+b+'</div>'));
				$(a.firstChild).stop().clearQueue().css("marginLeft","-"+($(a.firstChild).innerWidth()/2-10)+"px").fadeIn(100).animate({marginTop: "-32px"},100);
			}
			a.addEventListener("mouseleave",function() {
				$(a.firstChild).stop().clearQueue().fadeOut(100).animate({marginTop: "-25px"},100);
			},false);
		},
		help: function(a,b,c,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a.hasChildNodes()) $(a.firstChild).stop().clearQueue().fadeIn(100).animate({marginTop: "36px"},100); else {
				$(dom.i(a,'<div class="__20y"><div class="__20x"></div>'+c+'</div>'));
				$(a.firstChild).stop().clearQueue().css("left","-"+($(a.firstChild).innerWidth()/2-12)+"px").fadeIn(100).animate({marginTop: "36px"},100);
			}
			a.addEventListener("mouseleave",function() {
				$(a.firstChild).stop().clearQueue().fadeOut(100).animate({marginTop: "32px"},100);
			},false);
		},
		miniView: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(a.childNodes[1].firstChild).fadeIn(0);
			a.addEventListener("mouseleave",function() {
				$(a.childNodes[1].firstChild).fadeOut(0);
			},false);
		},
		view: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = [a.childNodes[0],a.childNodes[1],a.childNodes[2].lastChild,a.childNodes[2].lastChild.lastChild];
			$(b[0]).fadeIn(200);
			$(b[1]).fadeOut(200);
			$(b[2]).fadeIn(0);
			$(b[3]).fadeIn(0);
			a.addEventListener("mouseleave",function() {
			$(b[1]).fadeIn(200);
			$(b[0]).fadeOut(200);
			$(b[2]).fadeOut(0);
			$(b[3]).fadeOut(0);
			},false);
		}
	},
	checkbox: function(a) {
		if (a[0].dataset.id==1) {
			dom.s(a[0],[["data-id",0]]);
			$(a[1]).addClass(a[2]);
		} else {
			dom.s(a[0],[["data-id",1]]);
			$(a[1]).removeClass(a[2]);
		}
	},
	select: function(a,c) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [a.parentNode];
		b[1] = b[0].childNodes;
		b[2] = b[1].length;
		for (b[3]=0;b[3]<b[2];b[3]++) $(b[1][b[3]]).removeAttr("style");
		$(a).css({"font-weight":"bold","backgroundColor":"#f9faf6"});
		$(b[0]).attr("data-id",c);
	},
	hideMe: function(a) {
		$(a).animate({marginTop: "-50px"},200);
	},
	sts: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!navigator.onLine) {
				load.destruct();
				load.marginOn();
				return false;
			} else return true;
	},
	time: function(a) {
		return a;
	},
	linkOut: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.s(dom.e("a"),[["id","link"],["class","invisible"],["href",a.href],["target","_blank"]]);
		dom.c(document.body,b);
		b.click();
		$("div #link").remove();
	},
	scroll: function() {
		if ($("#box").scrollTop()>=($("#load-box").height()-$("#box").height())*0.65) {
		go.doc.scroll();
		go.audio.scroll();
		}
	},
	doc: {
		con: function(a) {
			if (parseInt(a.lt)!==0) $(".__13q").text(a.lt).removeClass("invisible"); else $(".__13q").addClass("invisible");
			if ($(".__13u").attr("data-id")==0) return dom.i(dom.s(dom.e("a"),[["href","/doc"+a.own+"_"+a.id],["class","__14c ui-sortable-handle"],["onmouseover","return go.doc.vw(this,event)"],["target","_blank"],["data-doct",JSON.stringify([a.own,a.id])],["data-id",a.own+"-"+a.id],["id","doc"+a.own+"_"+a.id]]),'<div class="__14d0"><div class="__14j"></div><div class="__14d" style="'+(a.src!=''?'background-image: url('+a.src[0]+')':'background-color: '+a.clr)+'">'+a.tp+'</div></div><div class="__14e">'+a.nm+'</div><div class="__14f" data-time="'+a.tm+'">'+go.time(a.tm)+'</div><div class="__14g">'+a.sz+'</div><div class="__14h __14h1 '+(a.lck==0?'__14h0':'__14p')+'" data-doc-l="'+a.own+"-"+a.id+'" data-id="'+a.lck+'" onclick="return go.doc.l(this,go.p(event))" onmouseover="return go.audio.help1(this,\''+(a.lck==0?'Разблокировать документ':'Заблокировать документ')+'\',event)"></div><div class="__14i" onclick="return go.doc.'+(a.dl==0?'viewOp':(a.dl==1?'viewDOp':'viewFOp'))+'('+dom.es(JSON.stringify([a.own,a.id]))+',this,go.p(event))"></div>'); else return dom.i(dom.s(dom.e("a"),[["target","_blank"],["href","/doc"+a.own+"_"+a.id],["class","__14k ui-sortable-handle"],["data-doct",JSON.stringify([a.own,a.id])],["data-id",a.own+"-"+a.id],["onmouseover","return go.doc.vw(this,event)"],["id","doc"+a.own+"_"+a.id]]),'<div class="__14l" style="'+(a.src!=''?'background-image: url('+a.src[0]+')':'background-color: '+a.clr)+'"><div class="__14q"></div>'+a.tp+'</div><div class="__14m">'+a.nm+'</div><div class="__14o" data-time="'+a.tm+'">'+go.time(a.tm)+'</div><div class="__14n">'+a.sz+'</div><div class="__14h '+(a.lck==0?'__14h0':'__14p')+'" data-doc-l="'+a.own+"-"+a.id+'" data-id="'+a.lck+'" onclick="return go.doc.l(this,go.p(event))" onmouseover="return go.audio.help1(this,\''+(a.lck==0?'Разблокировать документ':'Заблокировать документ')+'\',event)"></div><div class="__15q" onclick="return go.doc.'+(a.dl==0?'viewOp':(a.dl==1?'viewDOp':'viewFOp'))+'('+dom.es(JSON.stringify([a.own,a.id]))+',this,go.p(event))"></div>');
			//,["onmouseover","return go.audio.help1(this,'Разблокировать документ',event)"]
		},
		supOb: {},
		cSup: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = [a.length];
			for (b[1]=0;b[1]<b[0];b[1]++) {
				if (dom.v(a[b[1]][0])!='') go.doc.supOb[a[b[1]][1]] = dom.v(a[b[1]][0]); else {
					a[b[1]][0].focus();
					return false;
				}
			}
			return true;
		},
		cCheck: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = [a.length];
			for (b[1]=0;b[1]<b[0];b[1]++) {
				if (a[b[1]].dataset.id!=1) continue; else $(dom.s(a[b[1]],[["style","background-color: #fdf2f4;"]])).animate({backgroundColor: "white"},1000);
					return false;
			}
			return true;
		},
		supSend: function(b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.doc.supOb = {'title':$(".__18b").attr("data-id")};
			a = [dom.qs("data-input"),dom.qs("data-box"),dom.qs("data-select")];
			if (dom.st(b)==1) return; else if (!go.doc.cSup([[a[0][0],"url"],[a[0][1],"name"],[a[0][2],"owner"],[a[0][3],"phone"],[a[0][4],"full_name"],[a[0][5],"mail"],[a[0][6],"position"],[a[0][7],"address"],[a[0][8],"signature"],[a[0][9],"pass"]])) return; else if (!go.doc.cCheck([a[1][0],a[1][1],a[1][2]])) return;
			dom.s(dom.id("_pass"),[["style","background-color: white"]])
			go.f(dom.s(b,[['data-status',1]]),0);
			http.start({'s':93,'v':go.doc.supOb}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id("_pass")) return; else c = http.txt(this);
				if (c[0]==0) {
					load.marginOff();
					go.viewSuccess(c[1]);
				} else {
					go.f(dom.s(b,[['data-status',0]]),1);
					dom.s(dom.id("_pass"),[["style","background-color: #fdf2f4;"]])
				}
			}
		},
		support: function() {
			go.loadInit(92);
		},
		dl: function(a) {
			dom.c(document.body,dom.s(dom.e("iframe"),[["frameborder",0],["class","invisible"],["src","/fdownload"+a[0]+"_"+a[1]]]));
		},
		frT: '',
		frSE: function(a) {
			http.start({'s':91,'v':a}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!$(".__17n").length) return; else a = http.txt(this);
				if ($(".__13n").val()!=a[0]) return; else $(".__17n").html(a[1]);
			}
		},
		frSearch: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (dom.v(a)!='') {
				$(".__13p").fadeOut(200);
				clearTimeout(go.doc.frt);
				go.doc.frt = setTimeout(function() {
					go.doc.frSE(dom.v(a));
				},500);
			} else {
				clearTimeout(go.doc.frt);
				$(".__13p").fadeIn(200);
				$(".__17n").html('<div class="__17v"><div class="__17w"></div></div><div class="__17x">Docs &amp; Folders</div>');
			}
		},
		frS: function(a,b) {
			$(".__17n").fadeIn(100);
		},
		saveMoveFolder: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.vl(["n-folder"])) return; else if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
			http.start({'s':86,'v':[b,dom.v(dom.id("n-folder")),$(".__5t").attr('data-id')]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (parseInt(c.lt)!==0) $(".__13q").text(c.lt).removeClass("invisible"); else $(".__13q").addClass("invisible");
				go.doc.remove(c.id[0],'Папка добавлена');
			}
		},
		moveNewFolder: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (dom.st(a)=='close') return; else dom.s(a,[['data-status','close']]);
			http.start({'s':85,'v':b}).onreadystatechange = function() {
				if (!http.st(this)) return; load.change(http.txt(this));
			}
		},
		saveEditFolder: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.vl(["n-folder"])) return; else if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
			http.start({'s':84,'v':[b,dom.v(dom.id("n-folder")),$(".__5t").attr('data-id')]}).onreadystatechange = function() {
				if (!http.st(this)) return; c = http.txt(this);
				if (dom.id("folder-main")) {
					d = [dom.id("folder-main").childNodes,dom.id("folder-main").childNodes.length];
					for (d[2]=0;d[2]<d[1];d[2]++) if (d[0][d[2]].dataset.id==c.own+"_"+c.id) dom.id("folder-main").replaceChild(go.doc.fCon(c),d[0][d[2]]);
				}
				$(".__16r").text(c.nm);
				load.marginOff();
				go.viewSuccess('Папка редактирована');
			}
		},
		editFolder: function(a) {
			go.loadInitV(83,a);
		},
		saveNewFolder: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.vl(["n-folder"])) return; else if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
			http.start({'s':82,'v':[dom.v(dom.id("n-folder")),$(".__5t").attr('data-id')]}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id("folder-main")) return; else if (dom.id("folder-main").firstChild.dataset.id==undefined) dom.i(dom.id("folder-main"),'');
				dom.ib(dom.id("folder-main"),go.doc.fCon(http.txt(this)));
				load.marginOff();
				go.viewSuccess('Папка добавлена');
			}
		},
		newFolder: function() {
			go.loadInit(81);
		},
		delFolder: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.valCheck()) return; else if (dom.st(b)==1) return; else go.f(dom.s(b,[['data-status',1]]),0);
			$("#pcf").fadeOut(200);
			http.start({'s':89,'v':[a,dom.v(dom.id("cp")),$("#fol-del-st").attr("data-id")]}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id("fol-del-st")) return; else c = http.txt(this);
				if (parseInt(c[4])!=0) $(".__13q").text(c[4]).fadeIn(200); else $(".__13q").addClass("invisible");
				if (c[3]==1) {
					go.f(dom.s(b,[['data-status','open']]),1);
					$("#pcf").fadeIn(200);
					return;
				}
				$("#folder"+c[0][0]+"_"+c[0][1]).remove();
				go.doc.pre(1);
				load.marginOff();
				go.viewSuccess('Папка удалена');
			}
		},
		deleteFolder: function(a) {
			go.loadInitV(88,a);
		},
		folderOption: function(a,b,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.p(event);
			c = [((event.clientY + document.body.scrollTop)-10),((event.clientX + document.body.scrollLeft)-10)];
			$("#v-option").html('<div class="__16x" style="top: '+c[0]+'px; left: '+c[1]+'px;" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__4y __6z" onclick="return go.doc.infoFolder('+dom.es(JSON.stringify(a))+')">Информация</div><a href="/folder'+a[0]+'_'+a[1]+'" target="_blank" class="no-link"><div class="__4y __6z">Скачать</div></a><div class="__4y __6z" onclick="return go.doc.editFolder('+dom.es(JSON.stringify(a))+')">Редактировать</div><div class="__4y __6z" onclick="return go.doc.deleteFolder('+dom.es(JSON.stringify(a))+')">Удалить</div></div>');
		},
		infoFolder: function(a) {
			go.loadInitV(87,a);
		},
		update: function() {
			go.doc.upM(lt.doc);
		},
		tm: null,
		search: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = dom.v(a);
			if (b!='') {
				$(".__13p").fadeOut(100);
				if (!navigator.onLine) return; else clearTimeout(go.doc.tm);
				go.doc.tm = setTimeout(function() {
					go.doc.tSearch(b);
				},500);
			} else {
				clearTimeout(go.doc.tm);
				$(".__13p,#__14b").fadeIn(100);
				$(".__13o0").fadeOut(200);
				$("#doc-search").html('').attr("data-ds",1);
				$("#doc-mn").removeClass("invisible");
				$("#doc-res,#__16a0").addClass("invisible");
				go.doc.loop(1);
			}
		},
		loop: function(a) {
			$((a==0?'.__16a :first-child,.__16a0 :first-child':'.__16a :last-child,.__16a0 :last-child')).fadeOut(0);
			$((a==0?'.__16a :last-child,.__16a0 :last-child':'.__16a :first-child,.__16a0 :first-child')).fadeIn(0);
		},
		tSearch: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(".__13o0").fadeIn(200);
			http.start({'s':71,'v':[0,a,0,"doc-search"]}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (!dom.id(c[3])) return; else if ($(".__13n").val()!=c[1]) return; else $("#__14b").fadeOut(0);
				if (c[4][0]==0) {
					d = [c[4][1].length];
					$("#"+c[3]).html('');
					for (d[1]=0;d[1]<d[0];d[1]++) dom.c(dom.id(c[3]),go.doc.con(c[4][1][d[1]]));
					if (d[0]==30) {
						$("#__16a0").removeClass("invisible");
						$("#"+c[3]).attr("data-ds",0);
					}
					go.doc.loop(1);
				} else $("#"+c[3]).html(c[4][1]).attr("data-ds",1);
				$(".__13o0").fadeOut(200);
				$("#doc-mn").addClass("invisible");
				$("#doc-res").removeClass("invisible");
			}
		},
		searchM: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			for (c=0;c<a.length;c++) if (!dom.id(a[c][1])) continue; else b = a[c];
			if (!navigator.onLine) return; else if (b==undefined) return; else if ($('#'+b[1]).attr('data-ds')==1) return; else $("#"+b[1]).attr("data-ds",1);
				go.doc.loop(0);
				http.start({'s':71,'v':[0,$(".__13n").val(),dom.l(dom.id(b[1])),b[1]]}).onreadystatechange = function() {
					if (!http.st(this)) return; else c = [http.txt(this)];
					if (!dom.id(c[0][3])) return; else if (parseInt(c[0][4][0])==1) return; else c[1] = [dom.id(c[0][3]).childNodes,dom.id(c[0][3]).childNodes.length,c[0][4][1].length];
					go.doc.loop(1);
					if (c[1][2]==30) {
						$("#__16a0").removeClass("invisible");
						$("#"+c[0][3]).attr("data-ds",0);
					} else $("#__16a0").addClass("invisible");
					for (c[2]=0;c[2]<c[1][2];c[2]++) {
						c[3] = true;
						c[4] = c[0][4][1][c[2]];
						for (c[5]=0;c[5]<c[1][1];c[5]++) if (c[1][0][c[5]].dataset.id==c[4].own+"-"+c[4].id)c[3] = false;
						if (c[3]) dom.c(dom.id(c[0][3]),go.doc.con(c[4])); 
					}
				}
		},
		folderUp: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.id("folder-main")) return; else if (dom.id("folder-main").dataset.s==1) return; else dom.s(dom.id("folder-main"),[["data-s",1]]);
			go.f(dom.id("folder-m"),1);
			http.start({'s':77,'v':dom.l(dom.id("folder-main"))}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id("folder-main")) return; else c = [http.txt(this)];
				if (c[0].length==30) {
					dom.s(dom.id("folder-main"),[["data-s",0]]);
					go.f(dom.id('folder-m'),0);
				} else $('#folder-m').addClass("invisible");
				c[1] = [dom.id("folder-main").childNodes,dom.l(dom.id("folder-main"))];
				for (c[2]=0;c[2]<c[0].length;c[2]++) {
					c[3] = [true,c[0][c[2]]];
					for (c[5]=0;c[5]<c[1][1];c[5]++) if (c[1][0][c[5]].dataset.id==c[3][1].own+"_"+c[3][1].id) c[3][0] = false;
					if (c[3][0]) dom.c(dom.id("folder-main"),go.doc.fCon(c[3][1])); 
				}
			}
		},
		fdcon: function(a) {
			return dom.i(dom.s(dom.e("a"),[["class","__17e"],["onmouseover","return go.doc.vw(this,event)"],["href","/doc"+a.own+"_"+a.id],["target","_blank"]]),'<div class="__14l" style="'+(a.src[0]!=undefined?'background-image: url('+a.src[0]+')':'background: '+a.clr)+';"><div class="__14q"></div>'+a.tp+'</div><div class="__17f"><div class="__14m __17g">'+a.nm+'</div><div class="__14o __17h" data-time="'+a.tm+'">'+a.tm+'</div><div class="__14n __17h">'+a.sz+'</div></div>');
		},
		folderLUp: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.id("fr-list")) return; else if (dom.id("fr-list").dataset.s==1) return; else dom.s(dom.id("fr-list"),[["data-s",1]]);
			http.start({'s':75,'v':[JSON.parse(dom.id("fr-list").dataset.id),dom.l(dom.id("fr-list"))]}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id("fr-list")) return; else c = [http.txt(this)];
				c[1] = JSON.parse(dom.id("fr-list").dataset.id);
				if (c[1][0]+'_'+c[1][1]!=c[0][3]+'_'+c[0][2]) return; else if (c[0][4].length==30) dom.s(dom.id("fr-list"),[["data-s",0]]);
				c[1] = [dom.id("fr-list").childNodes,dom.id("fr-list").childNodes.length];
				for (c[2]=0;c[2]<c[0][4].length;c[2]++) {
					c[3] = [true,c[0][4][c[2]]];
					for (c[4]=0;c[4]<c[1][1];c[4]++) if (c[1][0][c[4]].dataset.id==c[3][1].own+"_"+c[3][1].id) c[3][0] = false;
					if (c[3][0]) dom.c(dom.id("fr-list"),go.doc.fdcon(c[3][1]));
				}
			}
		},
		folderListUp: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.id("folder-list")) return; else if (dom.id("folder-list").dataset.s==1) return; else dom.s(dom.id("folder-list"),[["data-s",1]]);
			go.doc.loop(0);
			http.start({'s':75,'v':[JSON.parse(dom.id("folder-list").dataset.id),dom.l(dom.id("folder-list"))]}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id("folder-list")) return; else c = [http.txt(this)];
				c[1] = JSON.parse(dom.id("folder-list").dataset.id);
				if (c[1][0]+'_'+c[1][1]!=c[0][3]+'_'+c[0][2]) return; else if (c[0][4].length==30) {
					dom.s(dom.id("folder-list"),[["data-s",0]]);
					go.doc.loop(1);
				} else $('.__16a').addClass("invisible");
				c[1] = [dom.id("folder-list").childNodes,dom.id("folder-list").childNodes.length];
				for (c[2]=0;c[2]<c[0][4].length;c[2]++) {
					c[3] = [true,c[0][4][c[2]]];
					for (c[4]=0;c[4]<c[1][1];c[4]++) if (c[1][0][c[4]].dataset.id==c[3][1].own+"_"+c[3][1].id) c[3][0] = false;
					if (c[3][0]) dom.c(dom.id("folder-list"),go.doc.con(c[3][1]));
				}
			}
		},
		fCon: function(a) {
			return dom.i(dom.s(dom.e("a"),[["href","/folder"+a.own+"_"+a.id],["data-href",'/documents?section=folders&folder='+a.own+"_"+a.id],["onclick","return go.linkOp(this,event)"],["class","__16i ui-sortable-handle"],["id","folder"+a.own+"_"+a.id],["data-id",a.own+"_"+a.id],["oncontextmenu","return go.doc.folderOption("+JSON.stringify([a.own,a.id])+",this,event)"]]),a.fo+'<div class="__16j"><div class="__16l"></div></div><div class="__16k">'+a.nm+'</div>');
		},
		upM: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			for (c=0;c<a.length;c++) if (!dom.id(a[c][1])) continue; else b = a[c];
			if (navigator.onLine) {
				if (b==undefined) return; else if ($('#'+b[1]).attr('data-ds')==1) return; else $("#"+b[1]).attr("data-ds",1);
				go.doc.loop(0);
				http.start({'s':68,'v':[b[0],dom.id(b[1]).childNodes.length,b[1]]}).onreadystatechange = function() {
					if (!http.st(this)) return; else c = [http.txt(this)];
					if (!dom.id(c[0][2])) return; else if (parseInt(c[0][3])!=1) $("#"+c[0][2]).attr("data-ds",0); else $(".__16a").addClass("invisible");
					c[1] = [c[0][4].length,dom.id(c[0][2]).childNodes,dom.id(c[0][2]).childNodes.length];
					for (c[2]=0;c[2]<c[1][0];c[2]++) {
						c[3] = true;
						c[4] = c[0][4][c[2]];
						for (c[5]=0;c[5]<c[1][2];c[5]++) if (c[1][1][c[5]].dataset.id==c[4].own+"-"+c[4].id) c[3] = false;
						if (c[3]) dom.c(dom.id(c[0][2]),go.doc.con(c[4]));
					}
				}
				return;
			}
			for (c=0;c<a.length;c++) $("#"+a[c][1]).attr("data-ds",0);
			go.doc.loop(1);
		},
		formC: function(d) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.sts()) return; else a = lt.doc;
			go.doc.loop(1);
			for (c=0;c<a.length;c++) if (!dom.id(a[c][1])) continue; else b = a[c];
			if (!navigator.onLine) return; else if (b==undefined) return; else http.start({'s':62,'v':[(d.dataset.id==0?1:0),b]}).onreadystatechange = function() {
				if (!http.st(this)) return; c = http.txt(this);
				if (!dom.id(c.mt[1])) return; else if (c.s==1) $(".__13u").attr("data-id",1).addClass("__13u0"); else $(".__13u").attr("data-id",0).removeClass("__13u0");
				$("#"+c.mt[1]).html(c.html).attr("data-ds",0);
			}
		},
		l: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.sts()) return;
			b = [dom.qs("data-doc-l"),a.dataset.docL,a.dataset.id];
			for (b[3]=0;b[3]<b[0].length;b[3]++) {
				if (b[0][b[3]].dataset.docL!=b[1]) continue;
				else if (b[0][b[3]].dataset.id==0) $(dom.s(b[0][b[3]],[["data-id",1],["onmouseover","return go.audio.help1(this,'Заблокировать документ',event)"]])).addClass("__14p").removeClass("__14h0").html("");
				else $(dom.s(b[0][b[3]],[["data-id",0],["onmouseover","return go.audio.help1(this,'Разблокировать документ',event)"]])).addClass("__14h0").removeClass("__14p").html("");
			}
			http.start({'s':61,'v':[(b[2]==0?1:0),a.dataset.docL]});
		},
		newD: function(a) {
			go.doc.pre(0);
			dom.ib(dom.id("__14b"),go.doc.con(a));
		},
		remove: function(a,b) {
			load.marginOff();
			go.viewSuccess(b);
			$("div #doc"+a[0]+"_"+a[1]).remove();
			if (parseInt(a[2])!=0) $(".__13q").text(a[2]).fadeIn(200); else $(".__13q").addClass("invisible");
			go.doc.pre(1);
		},
		pre: function(a) {
			if (dom.id("__14b")) if (a==0&&dom.id("__14b").firstChild.dataset.id==undefined) $("#__14b").html('');if (a==1&&$("#__14b").html()=='') $("#__14b").html('<div class="__16c ui-sortable-handle" onclick="return go.doc.nw();"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g __13v"></div><div class="__13w">Empty</div></div>');
			if (dom.id("deleted-doc")) if ($("#deleted-doc").html()=='') $("#deleted-doc").html('<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g"></div><div class="__13w">Empty Trash</div></div>');
			if (dom.id("doc-search")) if ($("#doc-search").html()=='') $("#doc-search").html('<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16h"></div><div class="__13w">No results found</div></div>');
			if (dom.id("folder-list")) if ($("#folder-list").html()=='') $("#folder-list").html('<div class="__16c ui-sortable-handle"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -100px;"></div><div class="__13w">Folder empty</div></div>'); 
			if (dom.id("folder-main")) if ($("#folder-main").html()=='') $("#folder-main").html('<div class="__16c ui-sortable-handle" onclick="return go.doc.newFolder()"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -100px;"></div><div class="__13w">No Folder</div></div>');
		},
		restoreCheck: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.valCheck()) return; else if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
			$("#pcf").fadeOut(200);
			b = JSON.parse(dom.id("_box").dataset.id);
			b[2] = dom.v(dom.id("cp"));;
			http.start({'s':72,'v':b}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
				c = http.txt(this);
				if (c.s==1) {
					a.focus();
					$("#pcf").fadeIn(200);
				} else go.doc.remove(c.id,'Документ восстановлен');
			}
		},
		delCheck: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.valCheck()) return; else if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
			$("#pcf").fadeOut(200);
			b = JSON.parse(dom.id("_box").dataset.id);
			b[2] = dom.v(dom.id("cp"));;
			http.start({'s':67,'v':b}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
				c = http.txt(this);
				if (c.s==1) {
					a.focus();
					$("#pcf").fadeIn(200);
				} else go.doc.remove(c.id,'Документ удален');
			}
		},
		re: function(a) {
			$("div #doc"+a.own+"_"+a.id).replaceWith(go.doc.con(a));;
		},
		saveEdit: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.vl(["d_r_name"])) return; else if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
			http.start({'s':60,'v':[dom.v(dom.id("d_r_name")),JSON.parse(dom.qs("data-doc_i")[0].dataset.doc_i)]}).onreadystatechange = function() {
				if (!http.st(this)) return; else go.doc.re(http.txt(this));
				load.marginOff();
				go.viewSuccess('Изменения сохранены');
			}
		},
		delD: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			http.start({'s':66,'v':b}).onreadystatechange = function() {
				if (!http.st(this)) return; else c = http.txt(this);
				if (c.s==0) load.con(c); else go.doc.remove(c.id,'Документ удален');
			}
		},
		del: function(a,b) {
			go.loadInitV(65,b);
		},
		restore: function(a,b) {
			go.loadInitV(70,b);
		},
		delEnd: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.valCheck()) return; else if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
			$("#pcf").fadeOut(200);
			b = JSON.parse(dom.id("_box").dataset.id);
			b[2] = dom.v(dom.id("cp"));;
			http.start({'s':74,'v':b}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
				c = http.txt(this);
				if (c.s==1) {
					a.focus();
					$("#pcf").fadeIn(200);
				} else go.doc.remove(c.id,'Документ удален');
			}
		},
		delE: function(a,b) {
			go.loadInitV(73,b);
		},
		delDE: function(a,b) {
			go.loadInitV(69,b);
		},
		edit: function(a,b) {
			go.loadInitV(64,b);
		},
		scroll: function() {
			go.doc.folderList();
		},
		folderME: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			http.start({'s':78,'v':[JSON.parse(a.dataset.i),JSON.parse(dom.id("__16u").dataset.id)]}).onreadystatechange = function() {
				if (!http.st(this)) return; c = http.txt(this);
				go.viewSuccess(c[2]);
				if (c[4]==0) $("div #doc"+c[1][0]+"_"+c[1][1]).remove();
				if (parseInt(c[3])!==0) $(".__13q").text(c[3]).removeClass("invisible"); else $(".__13q").addClass("invisible");
				go.doc.pre(1);
			}
			return load.marginOff();
		},
		folderList: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!dom.id("__16u")) return; else if (dom.id("__16u").dataset.s==1) return; else dom.s(dom.id("__16u"),[["data-s",1]]); 
			http.start({'s':77,'v':dom.l(dom.id("__16u"))}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (!dom.id("__16u")) return; c = http.txt(this);
				d = [c.length,dom.id("__16u").childNodes,dom.l(dom.id("__16u"))];
				for (d[4]=0;d[4]<d[0];d[4]++) {
					d[3] = [true,c[d[4]]];
					for (d[6]=0;d[6]<d[2];d[6]++) if (d[1][d[6]].dataset.id==d[3][1].own+'-'+d[3][1].id) d[3][0] = false;
					if (d[3][0]) dom.c(dom.id("__16u"),go.doc.folderCon(d[3][1]));
				}
				if (d[0]==30) dom.s(dom.id("__16u"),[["data-s",0]]);
				$("#load-box").css("height",$("#_box").height());
			}
		},
		folderCon: function(a) {
			return dom.i(dom.s(dom.e("div"),[["class","__16v"],["data-id",a.own+'-'+a.id],["data-i",JSON.stringify([a.own,a.id])],["onclick","return go.doc.folderME(this)"]]),'<div class="__16w"></div>'+a.nm);
		},
		docMove: function(a,b) {
			go.loadInitV(76,b);
		},
		removeMove: function(a,b) {
			$("div #doc"+b[0]+"_"+b[1]).remove();
			http.start({'s':90,'v':b}).onreadystatechange = function() {
				if (!http.st(this)) return; else if (parseInt(this.responseText)!==0) $(".__13q").text(this.responseText).removeClass("invisible"); else $(".__13q").addClass("invisible");
			}
			go.doc.pre(1);
		},
		viewDOp: function(a,b,event) {
			if (b.hasChildNodes()) $(b.firstChild).fadeIn(200); else $(dom.i(b,'<div class="__15m" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false" style="margin-top: -29px;"><div class="__7a" style="margin: 22px 0 0 150px; width: 16px;height: 30px;"><div class="__7b" style="margin: 5px 0 0 -10px"></div></div><div class="__6y"><div class="__4y __6z" onclick="return go.doc.restore(this,'+dom.es(JSON.stringify(a))+')">Востановить</div><div class="__4y __6z" onclick=\"return go.doc.delDE(this,'+dom.es(JSON.stringify(a))+')\">Удалить</div></div></div>').firstChild).fadeIn(200);
		},
		viewOp: function(a,b,event) {
			if (b.hasChildNodes()) $(b.firstChild).fadeIn(200); else $(dom.i(b,'<div class="__15m" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false"><div class="__7a" style="margin: 36px 0 0 150px; width: 16px;height: 30px;"><div class="__7b" style="margin: 5px 0 0 -16px"></div></div><div class="__6y"><div class="__4y __6z" onclick=\"return go.doc.edit(this,'+dom.es(JSON.stringify(a))+')\">Редактировать</div><div class="__4y __6z" onclick=\"return go.doc.docMove(this,'+dom.es(JSON.stringify(a))+')\">Переместить</div><div class="__4y __6z" onclick=\"return go.doc.del(this,'+dom.es(JSON.stringify(a))+')\">Удалить</div></div></div>').firstChild).fadeIn(200);
		},
		viewFOp: function(a,b,event) {
			if (b.hasChildNodes()) $(b.firstChild).fadeIn(200); else $(dom.i(b,'<div class="__15m" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false"><div class="__7a" style="margin: 36px 0 0 150px; width: 16px;height: 30px;"><div class="__7b" style="margin: 5px 0 0 -10px"></div></div><div class="__6y"><div class="__4y __6z" onclick=\"return go.doc.edit(this,'+dom.es(JSON.stringify(a))+')\">Редактировать</div><div class="__4y __6z" onclick=\"return go.doc.removeMove(this,'+dom.es(JSON.stringify(a))+')\">Убрать из папки</div><div class="__4y __6z" onclick=\"return go.doc.del(this,'+dom.es(JSON.stringify(a))+')\">Удалить</div></div></div>').firstChild).fadeIn(200);
		},
		saveSett: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = [dom.qs("data-ds"),[]];
			b[2] = b[0].length;
			for (b[3]=0;b[3]<b[2];b[3]++) b[1].push(b[0][b[3]].dataset.id);
			go.loadInitV(59,b[1]);
		},
		rem: function() {
			$("#info-alert").remove();
			$("#load-box").fadeIn(200);
		},
		alt: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a==1) c = '<div class="_m1">Something went wrong</div><div class="_2d"><div class="_2e">There was a problem uploading your document file. Please try again.</div>'; else c = '<div class="_m1">Недопустимый формат</div><div class="_2d"><div class="_2e">Загружаемый файл имеет недопустимый формат.</div>';
			dom.no(dom.id("load-box"));
			dom.c(dom.id("box"),dom.i(dom.s(dom.e("div"),[["class","_2b"],["ondblclick","event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"],["onselectstart","return false;"],["id","info-alert"]]),'<div class="_2h" onclick="return load.marginOff()"></div>'+c+'<div class="_2f"><div class="_2g bt" onclick="return go.doc.rem()">OK</div></div></div>'));
			return false;
		},
		upRSs: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = true;
			if (a.f!=0) b = go.doc.alt(0); else if (a.err!=0) b = go.doc.alt(1); else if (a.lm!=0) {
				go.doc.mvE(1);
				b = false;
			}
			if (!b) {
				$(".__14z").fadeIn(100);
				$(".__15h").fadeOut(100);
				$(".__14v").attr("onclick","return go.click()").removeAttr("style");
			}
			return b;
		},
		html: function(a) {
			if (!dom.id("load-box")) return; else dom.i(dom.id("load-box"),a.html);
		},
		upR: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;		
			b = http.txt(a);
			go.doc.newD(b);
			if (!go.doc.upRSs(b)) return; else go.doc.html(b);
		},
		up: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a.files[0].size>13107200) {
				go.doc.mvE(1);
				return;
			}
			http.docUp({'i':0,'id':1},a.files[0]);
		},
		mvE: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("div .__15b").addClass("invisible");
			$("div .__15d").removeClass("__15e");
			$(".__15f,.__15g").attr("data-id",a);
			b = [dom.cls("__15b"),dom.cls("__15d")];
			for (b[2]=0;b[2]<3;b[2]++) {
				if (a!=b[2]) continue;
					$(b[0][b[2]]).removeClass("invisible"); 
					$(b[1][b[2]]).addClass("__15e"); 
			}
		},
		mv: function(a,b,c) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			d = [a.dataset.id];
			if (b==0) {
				if (d[0]==0) d[1] = 2; else if (d[0]==1) d[1] = 0; else if (d[0]==2) d[1] = 1;
			} else if (b==1) {
				if (d[0]==0) d[1] = 1; else if (d[0]==1) d[1] = 2; else if (d[0]==2) d[1] = 0
			}
			go.doc.mvE(d[1]);
		},
		ss: '',
		vw: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = a.firstChild.firstChild;
			$(b).css("opacity",1);
			a.addEventListener("mouseout",function(event) {
				$(b).css("opacity",0);
			},false);
		},
		nw: function() {
			go.loadInit(58);
		}
	},
	wp: true,
	strm: '',
	wpChange: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		dom.ri(dom.id("_password"),a.html);
		$("#_password").animate({opacity: 1},100);
	},
	swpTP: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
		if (go.strm!='') go.strm.getTracks()[0].stop();
		http.cvStart({'i':2,'v':dom.id("__13x0").toDataURL('image/jpeg',1),'id':1}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (dom.id("_password")) go.wpChange(http.txt(this)); else load.change(http.txt(this));
		}
	},
	wpB: function() {
		$("#wp-1,#__13x").removeClass("invisible");
		$("#wp-2,#__13x0").addClass("invisible");
	},
	wpTP: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.id("__13x"),dom.id("__13x0")];
		b[2] = b[0].videoHeight / (b[0].videoWidth / b[0].width);
		b[1].getContext('2d').drawImage(b[0],0,0,b[0].width,b[2]);
		b[2] = b[1].toDataURL('image/jpeg', 1);
		$("#wp-1").addClass("invisible");
		$("#wp-2").removeClass("invisible");
		$(b[0]).addClass("invisible");
		$(b[1]).removeClass("invisible");
	},
	wpStream: function(a=0) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.id("__13x");
		c = false;
		navigator.getMedia = (navigator.getUserMedia||navigator.webkitGetUserMedia||navigator.mozGetUserMedia||navigator.msGetUserMedia);
		navigator.getMedia({video: true,audio: false},function(stream) {
		if (navigator.mozGetUserMedia) b.mozSrcObject = stream; else {
        var vendorURL = window.URL || window.webkitURL;
		go.strm = stream;
        b.src = vendorURL.createObjectURL(go.strm);
		}
		$(".wpTp").removeClass("invisible");
		b.play();
		},
		function(err) {
			$(".__14a").removeClass("invisible");
		}
		);
	},
	webPhoto: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!go.wp) return; else go.wp = false;
		http.start({'s':57}).onreadystatechange = function() {
				if (!http.st(this)) return; else load.change(http.txt(this));
				go.wp = true;
				go.wpStream(0);
			}
	},
	profileC: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (a.dataset.ti==0) dom.i(a,'<img class="photo" src="'+b[2][2]+'" width="'+a.dataset.h+'" height="'+a.dataset.h+'">'); else if (a.dataset.ti==1) dom.i(a,'<img class="photo" src="'+b[3][2]+'" width="'+a.dataset.w+'" height="'+a.dataset.h+'">'); else if (a.dataset.ti==2) dom.i(a,'<img class="photo" src="'+b[4][2]+'" width="'+a.dataset.w+'" height="'+a.dataset.h+'">'); else if (a.dataset.ti==3) dom.i(a,'<img class="photo" src="'+b[5][2]+'" width="'+a.dataset.w+'" height="'+a.dataset.h+'">');
	},
	profileLC: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.qs("data-qi");
		c = b.length;
		for (d=0;d<c;d++) if (b[d].dataset.qi==a[0][3]) go.profileC(b[d],a);
	},
	back: function() {
		$(".__12s").fadeIn(0);
		$(".__12t").fadeOut(0);
	},
	iTMS: true,
	iTMR: true,
	iTM: '',
	imgThumbRes: function(a,b,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = [[go.cut($(".__12z").css("margin-left")),go.cut($(".__12z").css("margin-top")),go.cut($(".__12z").css("width")),go.cut($(".__12z").css("height"))],dom.client(event),b,[go.cut($("#_img_thumb_res").css("margin-left")),go.cut($("#_img_thumb_res").css("margin-top"))]];
		c[4] = [(c[0][0]+c[0][2]),(c[0][1]+c[0][3])];
		c[5] = [go.cut($(".__12v").css("width")),go.cut($(".__12v").css("height"))];
		if (!go.iTMR) return; else go.iTMR = false;
		document.addEventListener("mousemove",function(event) {
			if (go.iTMR) return; else d = [dom.client(event)];
			if (c[2]==0) {
				d[1] = Math.max((c[1][0]-d[0][0]),(c[1][1]-d[0][1]));
				d[2] = [(c[0][2]+d[1]),(c[0][3]+d[1])];
				if (d[2][0]<100) d[2] = [100,100];
				d[2][2] = c[4][0]-d[2][0];
				d[2][3] = c[4][1]-d[2][1];
				if (d[2][2]<0) {
					d[2][1] = d[2][0] = c[4][0];
					d[2][2] = 0;
					d[2][3] = c[4][1]-c[4][0];
				}
				if (d[2][3]<0) {
					d[2][1] = d[2][0] = c[4][1];
					d[2][2] = c[4][0]-c[4][1];
					d[2][3] = 0;
				}
				d[2][4] = c[3][0]+(c[0][0]-d[2][2]);
				d[2][5] = c[3][1]+(c[0][1]-d[2][3]);
			} else if (c[2]==1) {
				d[1] = Math.max((d[0][0]-c[1][0]),(c[1][1]-d[0][1]));
				d[2] = [(c[0][2]+d[1]),(c[0][3]+d[1])];
				if (d[2][0]<100) d[2] = [100,100];
				d[2][2] = c[0][0];
				d[2][3] = c[4][1]-d[2][1];
				if (d[2][3]<0) {
					d[2][1] = d[2][0] = c[4][1];
					d[2][3] = 0;
				}
				if ((c[0][0]+d[2][0])>c[5][0]) {
					d[2][1] = d[2][0] = c[5][0]-c[0][0];
					d[2][3] = c[4][1]-d[2][1];
				}
				d[2][4] = c[3][0]+(c[0][0]-d[2][2]);
				d[2][5] = c[3][1]+(c[0][1]-d[2][3]);
			} else if (c[2]==2) {
				d[1] = Math.max((c[1][0]-d[0][0]),(d[0][1]-c[1][1]));
				d[2] = [(c[0][2]+d[1]),(c[0][3]+d[1])];
				if (d[2][0]<100) d[2] = [100,100];
				d[2][2] = c[4][0]-d[2][1];
				d[2][3] = c[0][1];
				if (d[2][2]<0) {
					d[2][1] = d[2][0] = c[4][0];
					d[2][2] = 0;
				}
				if ((c[0][1]+d[2][1])>c[5][1]) {
					d[2][1] = d[2][0] = c[5][1]-c[0][1];
					d[2][2] = c[4][0]-d[2][0];
				}
				d[2][4] = c[3][0]+(c[0][0]-d[2][2]);
				d[2][5] = c[3][1]+(c[0][1]-d[2][3]);
			} else if (c[2]==3) {
				d[1] = Math.max((d[0][0]-c[1][0]),(d[0][1]-c[1][1]));
				d[2] = [(c[0][2]+d[1]),(c[0][3]+d[1])];
				if (d[2][0]<100) d[2] = [100,100];
				d[2][2] = c[0][0];
				d[2][3] = c[0][1];
				d[2][4] = c[3][0];
				d[2][5] = c[3][1];
				d[2][0] = d[2][1] = Math.min(d[2][1],(c[5][1]-c[0][1]));
				d[2][1] = d[2][0] = Math.min(d[2][0],(c[5][0]-c[0][0]));
			}
			$(".__13e").css({width:d[2][0],height:d[2][1]});
			$(".__12z").css({width:d[2][0],height:d[2][1],marginLeft:d[2][2],marginTop:d[2][3]});
			$(".__13ab").css({marginLeft:(d[2][0]-5)});
			$(".__13ac").css({marginTop:(d[2][0]-5)});
			$(".__13ad").css({marginLeft:(d[2][0]-5),marginTop:(d[2][0]-5)});
			$("#_img_thumb_res").css({marginLeft:d[2][4],marginTop:d[2][5]});
			go.thumbRM([d[2][0],d[2][1],d[2][2],d[2][3],c[5][0],c[5][1],go.cut($("#_img_thumb").css("margin-left")),go.cut($("#_img_thumb").css("margin-top")),go.cut($("#_img_thumb").css("width")),go.cut($("#_img_thumb").css("height"))]);
		},false);
		document.addEventListener("mouseup",function(event) {
			if (go.iTMR) return; else go.iTMR = true;
		},false);
	},
	thumbRM: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		//[200(width),200(height),0(left),0(top),200(main width),250 (main height),-124.033(img left),0 (img top),400.59375 (img width),250 (img height)]
		b = [((a[8]/100)*((100/a[0])*100)),((a[9]/100)*((100/a[1])*100))];//percent width of normal and height of normal
		$("#_img_thumb_res_norm").css({width: b[0],height: b[1],marginLeft: parseInt((b[0]/100)*(((a[6]-a[2])/a[8])*100)),marginTop: parseInt((b[1]/100)*(((a[7]-a[3])/a[9])*100))});
		b = [b[0]/2,b[1]/2];//percent width of mini and height of mini
		$("#_img_thumb_res_mini").css({width: b[0],height: b[1],marginLeft: parseInt((b[0]/100)*(((a[6]-a[2])/a[8])*100)),marginTop: parseInt((b[1]/100)*(((a[7]-a[3])/a[9])*100))});
	},
	imgThumbMove: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.client(event),a.getBoundingClientRect(),go.cut($(a).css("margin-left")),go.cut($(a).css("margin-top")),JSON.parse(a.dataset.i)];
		go.iTM = a;
		if (!go.iTMS) return; else go.iTMS = false;
		document.addEventListener("mousemove",function(event) {
			if (go.iTMS) return; else c = [dom.client(event)];
				c[1] = [Math.min(Math.max(((c[0][0]-b[0][0])+b[2]),0),(200-b[1].width)),Math.min(Math.max(((c[0][1]-b[0][1])+b[3]),0),(b[4][2]-b[1].height))];
				$(go.iTM).css({marginLeft:c[1][0],marginTop:c[1][1]});
				$("#_img_thumb_res").css({marginLeft: parseInt(b[4][0]-c[1][0]),marginTop: parseInt(b[4][1]-c[1][1])});
				go.thumbRM([b[1].width,b[1].height,c[1][0],c[1][1],go.cut($(".__12v").css("width")),go.cut($(".__12v").css("height")),go.cut($("#_img_thumb").css("margin-left")),go.cut($("#_img_thumb").css("margin-top")),go.cut($("#_img_thumb").css("width")),go.cut($("#_img_thumb").css("height"))]);
		},false);
		document.addEventListener("mouseup",function(event) {
			if (!go.iTMS) go.iTMS = true; else return;
		},false);
	},
	cropR: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (dom.st(a)=='close') return; else go.f(dom.s(a,[['data-status','close']]),0);
		http.cvStart({'i':1,'v':JSON.stringify([JSON.parse($("._box-profile").attr("data-i")),[go.cut($("#_img_thumb").css("width")),go.cut($("#_img_thumb").css("height")),go.cut($("#_img_thumb").css("margin-left")),go.cut($("#_img_thumb").css("margin-top"))],[go.cut($(".__12v").css("width")),go.cut($(".__12v").css("height"))],[go.cut($(".__12z").css("width")),go.cut($(".__12z").css("height")),go.cut($(".__12z").css("margin-left")),go.cut($(".__12z").css("margin-top"))]]),'id':1}).onreadystatechange = function() {
				if (!http.st(this)) return; else go.profileLC(http.txt(this));
				return load.marginOff();
		}
	},
	cropI: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.id("_2t").getBoundingClientRect(),JSON.parse($("._box-profile").attr("data-i")),go.cut(dom.id("_2t").style.marginLeft),go.cut(dom.id("_2t").style.marginTop),dom.id("__9t")];
		b[5] = [b[4].getBoundingClientRect(),go.cut(b[4].style.marginLeft),go.cut(b[4].style.marginTop),dom.id("__9t").getBoundingClientRect(),dom.id("__9s").getBoundingClientRect()];
		$(".__12s").fadeOut(0);
		$(".__12t").fadeIn(0);
		b[6] = [(0-(178-b[2])),(0-(b[5][4].height-b[3]))];
		$("#_img_thumb,#_img_thumb_res,#_img_thumb_res_norm, #_img_thumb_res_mini").attr("src",$("#_2t").attr("src"));
		$("#_img_thumb").css({width: b[0].width,height: b[0].height,marginLeft: b[6][0]+"px",marginTop: b[6][1]+"px"});
		$("#_img_thumb_res,#_img_thumb_res_norm").css({width: b[0].width,height: b[0].height,marginLeft: (b[6][0]-50)+"px",marginTop: (b[6][1]-50)+"px"});
		$("#_img_thumb_res_mini").css({width: (b[0].width/2),height: (b[0].height/2),marginLeft: ((b[6][0]-50)/2)+"px",marginTop: ((b[6][1]-50)/2)+"px"});
		$(".__13e").css({width:100,height:100});
		$(".__13ab").css({marginLeft: 95});
		$(".__13ac").css({marginTop: 95});
		$(".__13ad").css({marginLeft: 95,marginTop: 95});
		$(".__12v,.__12w").css({height: b[5][3].height,marginTop: (30-(0-(200-b[5][3].height)/2))+"px"});
		$(".__12z").css({marginLeft: 50,marginTop: 50,width: 100,height: 100}).attr("data-i",JSON.stringify([b[6][0],b[6][1],b[5][3].height]));
	},
	viewThumb: function(b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		a = b.dataset.id;
		if (a==0) $("div .__12x,div .__12y").animate({borderRadius:0}, 200); else if (a==1) $("div .__12x,div .__12y").animate({borderRadius:50}, 100); else if (a==2) $("div .__12x,div .__12y").animate({borderRadius:5}, 100);
		$("div .__13c").removeClass("__13d");
		$(b).addClass("__13d");
	},
	effStat: false,
	tm: null,
	canvasTT: function(a,y,z) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = a.getContext('2d');
		c = dom.cls("__11y");
		d = c.length;
		f = [JSON.parse($("._2r").attr("data-i")),[go.cut($("#i-filter").css("width")),go.cut($("#i-filter").css("height"))]];
		h = [JSON.parse(dom.id("i-filter-hidden").dataset.i),false];
		ct = new CanvasText;
		for (e=0;e<d;e++) {
			f[2] = [$(c[e]).children("textarea")];
			if (f[2][0].val()=='') continue;
			f[3] = [f[2][0].val(),c[e].childNodes[2].style.fontSize,c[e].childNodes[2].style.fontFamily,(($(c[e]).css("margin-left").replace(/[^-\d\.]/g, '')*1)+5),($(c[e]).css("margin-top").replace(/[^-\d\.]/g, '')*1)];
			ct.config({
			canvasId: a,
			fontFamily: c[e].childNodes[2].style.fontFamily,
			fontSize: c[e].childNodes[2].style.fontSize,
			fontWeight: "normal",
			fontColor: dom.toHex(c[e].childNodes[2].style.color),
			lineHeight: "15",
			textBaseline: "top"
			});
			ct.drawText({
			text:f[2][0].val().replace(/\n/g, "<br />"),
			x: f[3][3],
			y: (f[3][4]+5)
			});
			//+((c[e].childNodes[2].style.height.replace(/[^-\d\.]/g, '')*1)/2)
			
			/*
			f[2] = [$(c[e]).children("textarea")];
			if (f[2][0].val()=='') continue;
				f[3] = [f[2][0].val(),c[e].childNodes[2].style.fontSize,c[e].childNodes[2].style.fontFamily,(($(c[e]).css("margin-left").replace(/[^-\d\.]/g, '')*1)+5),($(c[e]).css("margin-top").replace(/[^-\d\.]/g, '')*1)];
				f[2][1] = dom.s(dom.e("canvas"),[["width",f[1][0]],["height",f[1][1]]]);
				f[2][2] = f[2][1].getContext("2d");
				f[2][2].font = f[3][1]+" "+f[3][2];
				f[2][2].fillStyle = c[e].childNodes[2].style.color;
				f[2][2].textBaseline = "middle";
				f[2][2].textAlign = "start";
				f[2][2].fillText(f[3][0],f[3][3],(f[3][4]+((c[e].childNodes[2].style.height.replace(/[^-\d\.]/g, '')*1)/2)+5));
				b.drawImage(f[2][1],0,0,f[1][0],f[1][1],0,0,h[0][0],h[0][1]);
				h[0][1] = true;
			*/
		}
		return h[0][1];
	},
	canvasST: function(a,y,z) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = a.getContext('2d');
		c = dom.cls("__12h");
		d = c.length;
		f = [JSON.parse($("._2r").attr("data-i")),[go.cut($("#i-filter").css("width")),go.cut($("#i-filter").css("height"))]];
		for (e=0;e<d;e++) {
			f[2] = [((go.cut($(c[e]).css("width"))/f[1][0])*100),((go.cut($(c[e]).css("height"))/f[1][1])*100),((go.cut($(c[e]).css("margin-left"))/f[1][0])*100),((go.cut($(c[e]).css("margin-top"))/f[1][1])*100)];
			f[3] = [((y/100)*f[2][0]),((z/100)*f[2][1]),((y/100)*f[2][2]),((z/100)*f[2][3])];
			g = dom.s(dom.e("canvas"),[["width",512],["height",512]]);
			g.getContext("2d").drawImage(c[e].childNodes[1],0,0);
			b.drawImage(g,0,0,512,512,f[3][2],f[3][3],f[3][0],f[3][1]);
		}
	},
	saveCV: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (dom.st(a)=="close") return; else dom.s(a,[['data-status','close']]);
		go.f(a,0);
		i = false;
		b = [go.canvas,dom.id("i-filter-hidden"),go.paint.list];
		if (b[0].filter!=undefined&&b[0].filter!=0) i = true;
		if (b[0].effect!=undefined&&b[0].effect!=0) i = true;
		b[6] = JSON.parse(b[1].dataset.i);
		b[7] = [dom.id("i-filter").width,dom.id("i-filter").height];
		c = dom.s(dom.e("canvas"),[["width",b[6][0]],["height",b[6][1]]]);
		d = c.getContext('2d');
		d.drawImage(dom.id("i-filter"),0,0,b[6][0],b[6][1]);
		go.canvasST(c,b[6][0],b[6][1]);
		i = go.canvasTT(c,b[6][0],b[6][1]);
		if (dom.cls('__12h').length!=0) i = true;
		if (b[2].length!=0) {
			i = true;
			b[3] = b[2].length;
			e = dom.s(dom.e("canvas"),[["width",b[7][0]],["height",b[7][1]]]);
			f = e.getContext('2d');
			for (b[4]=0;b[4]<b[3];b[4]++) {
				b[5] = b[2][b[4]];
				d.globalAlpha = b[5].g;
				f.putImageData(b[5].i,0,0);
				d.drawImage(e,0,0,b[6][0],b[6][1]);
			}
		}
		if (!i) load.check(); else http.cvStart({'i':0,'v':c.toDataURL('image/jpeg',1),'id':1}).onreadystatechange = function() {
				if (!http.st(this)) return; else g = http.txt(this);
				h = [dom.id("_2t")];
				h[1] = [h[0].style.marginLeft,h[0].style.marginTop,h[0].offsetWidth,h[0].offsetHeight];
				h[2] = dom.s(dom.e("img"),[["id","_2t"],["class","photo _2t"],["src",g.src.o[2]],["style",$(h[0]).attr("style")]]);
				$("._box-profile").attr("data-i",JSON.stringify([g.id,g.user]));
				h[0].parentNode.replaceChild(h[2],h[0]);
				load.check();
				};
	},
	stop: function(event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
		return event;
	},
	cv: {
		ss: false,
		stEl: '',
		stickerMove: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
			go.cv.clearTxt();
			$(a).attr("id","cv-sticker").css("cursor","move").removeClass("_nb");
			b = a.childNodes;
			c = b.length;
			for (d=0;d<c;d++) $(b[d]).fadeIn(100);
			if (!go.cv.ss) go.cv.ss = true; else return;
			e = [[go.cut(a.style.marginLeft),go.cut(a.style.marginTop)],dom.client(event)];
			go.cv.stEl = a;
			document.addEventListener("mousemove",function(event) {
				if (!go.cv.ss) return;
				e[2] = dom.client(event);
				e[3] = [(e[0][0]+(e[2][0]-e[1][0])),(e[0][1]+(e[2][1]-e[1][1]))];
				$(go.cv.stEl).animate({marginLeft: e[3][0]+"px",marginTop: e[3][1]+"px"},0);
			},false);
			document.addEventListener("mouseup",function() {
				if (go.cv.ss) go.cv.ss = false; else return;
			},false);
			document.addEventListener("click",function() {
				if (go.cv.ss) go.cv.ss = false; else return;
			},false);
		},
		stRsz: false,
		stRtt: false,
		angle: 0,
		stickerRsz: function(a,event,d,e) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.cv.stRsz) go.cv.stRsz = true; else return;
			go.cv.stEl = a.parentNode;
			b = [dom.client(event),go.cv.stEl.getBoundingClientRect(),[go.cut(go.cv.stEl.style.marginLeft),go.cut(go.cv.stEl.style.marginTop)]];
			document.addEventListener("mousemove",function(event) {
				if (!go.cv.stRsz) return;
				b[5] = dom.client(event);
				b[3] = d==0?(e==0?(b[0][0]-b[5][0]):(b[0][1]-b[5][1])):(e==0?(b[5][0]-b[0][0]):(b[5][1]-b[0][1]));
				b[4] = (b[1].width+(b[3]*2))<100?0:b[3];
				b[6] = [(b[1].width+(b[4]*2)),(b[1].height+(b[4]*2)),(b[2][0]-b[4]),(b[2][1]-b[4])];
				c = go.cv.stEl.childNodes;
				$(go.cv.stEl).css({"width":b[6][0]+"px","height":b[6][1]+"px","marginLeft":b[6][2],"marginTop":b[6][3]});
				$(c[0]).css({"width":b[6][0]+"px","height":b[6][1]+"px"});
				$(c[1]).css({"width":b[6][0]+"px","height":b[6][1]+"px"});
				$(c[2]).css({"marginLeft":(b[6][0]-7)+"px","marginTop":(b[6][1]-7)+"px"});
				$(c[4]).css({"marginLeft":(b[6][0]-7)+"px"});
				$(c[5]).css({"marginTop":(b[6][1]-7)+"px"});
				$(c[6]).css({"marginTop":((b[6][1]/2)-6)+"px"});
				$(c[7]).css({"marginLeft":((b[6][0]/2)-6)+"px"});
				$(c[8]).css({"marginLeft":((b[6][0]/2)-6)+"px","marginTop":(b[6][1]-7)+"px"});
				$(c[9]).css({"marginLeft":(b[6][0]-6)+"px","marginTop":((b[6][1]/2)-7)+"px"});
			},false);
			document.addEventListener("mouseup",function(event) {
				if (go.cv.stRsz) go.cv.stRsz = false; else return;
			},false);
			document.addEventListener("click",function(event) {
				if (go.cv.stRsz) go.cv.stRsz = false; else return;
			},false);
		},
		sticker: function(a,e,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.cv.clearTxt();
			c = dom.id("__11x");
			d = JSON.parse(c.dataset.i);
			e = dom.i(dom.s(dom.e("div"),[["class","__12h"],["style","width: "+b[2]+"px; height: "+b[3]+"px;margin: "+((d[1]-b[3])/2)+"px 0 0 "+((d[0]-b[2])/2)+"px;z-index: "+go.cv.addCt],["onmousedown","return go.cv.stickerMove(this,event)"],["id","cv-sticker"],["data-r",0],"onselectstart","return false;"]),"<div class=\"__10z\"></div><img class=\"photo\" style=\"position: absolute;\" src=\""+b[0]+"\" width=\""+b[2]+"\" height=\""+b[3]+"\"><div class=\"__12i hidd\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\" onselectstart=\"return false;\"></div><div class=\"__12i __12k hidd\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\" onselectstart=\"return false;\"></div><div class=\"__12i __12l hidd\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\" onselectstart=\"return false;\"></div><div class=\"__12i __12m hidd\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\" onselectstart=\"return false;\"></div><div class=\"__12n\" onmousedown=\"return go.cv.stickerRsz(this,go.stop(event),0,0)\" onselectstart=\"return false;\"></div><div class=\"__12n __12o\" onmousedown=\"return go.cv.stickerRsz(this,go.stop(event),0,1)\" onselectstart=\"return false;\"></div><div class=\"__12n __12p\" onmousedown=\"return go.cv.stickerRsz(this,go.stop(event),1,1)\" onselectstart=\"return false;\"></div><div class=\"__12n __12q\" onmousedown=\"return go.cv.stickerRsz(this,go.stop(event),1,0)\" onselectstart=\"return false;\"></div>");
			dom.c(c,e);
			go.cv.addCt++;
		},
		stickerRtt: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.cv.stRtt) go.cv.stRtt = true; else return;
			go.cv.stEl = a.parentNode;
			go.cv.angle = 0;
			b = [dom.eP(go.cv.stEl),[go.cv.stEl.clientWidth,go.cv.stEl.clientHeight],[go.cut(go.cv.stEl.style.marginLeft),go.cut(go.cv.stEl.style.marginTop)],dom.client(event)];
			c = [go.cv.stEl,[parseFloat(go.cv.stEl.dataset.r),0,0,[0,0],(180/Math.PI)],go.cv.stEl.getBoundingClientRect()];
			c[1][3] = [(c[2].left+(c[2].width/2)),(c[2].top+(c[2].height/2))];
			c[3] = [(b[3][0]-c[1][3][0]),(b[3][1]-c[1][3][1])];
			c[1][2] = c[1][4]*Math.atan2(c[3][1],c[3][0]);
			document.addEventListener("mousemove",function(event) {
				if (!go.cv.stRtt) return;
					b[4] = dom.client(event);
					d = [[(b[4][0]-c[1][3][0]),(b[4][1]-c[1][3][1])]];
					d[1] = c[1][4]*Math.atan2(d[0][1],d[0][0]);
					go.cv.angle = c[1][0]+(d[1]-c[1][2]);
					$(go.cv.stEl).css({"webkitTransform":"translateY(0) rotate("+go.cv.angle+"deg)","mozTransform":"translateY(0) rotate("+go.cv.angle+"deg)","oTransform":"translateY(0) rotate("+go.cv.angle+"deg)","msTransform":"translateY(0) rotate("+go.cv.angle+"deg)","transform":"translateY(0) rotate("+go.cv.angle+"deg)"});
					
			},false);
			document.addEventListener("mouseup",function(event) {
				if (go.cv.stRtt) {
					go.cv.stRtt = false;
					$(go.cv.stEl).attr({"data-r":go.cv.angle});
				} else return;
			},false);
			document.addEventListener("click",function(event) {
				if (go.cv.stRtt) {
					go.cv.stRtt = false;
					$(go.cv.stEl).attr({"data-r":go.cv.angle});
				} else return;
			},false);
		},
		txtClr: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("div .__11o1").removeClass("__11p");
			$(b).addClass("__11p");
			dom.s(b.parentNode,[["data-id",a]]);
			c = b.parentNode;
			if (c.dataset.f!=undefined) eval(c.dataset.f+"("+a+")");
		},
		clrChange: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = a==0?'#FF9300':(a==1?'#FFCB00':(a==2?'#00AEF9':(a==3?'#62DA37':(a==4?'#CC74E1':(a==5?'#E64646':(a==6?'#000':'#fff'))))));
			$("#sel-cv-txt textarea").css({'color':b});
			$("#sel-cv-txt").attr("data-i",go.cv.txtInfo()[3]);
		},
		sel: function(a,b) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			c = b.parentNode;
			d = c.childNodes;
			e = d.length;
			for (f=0;f<e;f++) $(d[f]).removeClass("__11k");
			$(b).addClass("__11k");
			dom.s(c,[["data-id",a]]);
			if (c.dataset.f!=undefined) eval(c.dataset.f+"("+a+")");
		},
		pst: false,
		txtsz: function(a) {
			$("#sel-cv-txt textarea").css({'font-size':a+"px"});
			$("#sel-cv-txt").attr("data-i",go.cv.txtInfo()[3]);
			$('div .__11z').each(function () {
			go.cv.h(this);
			}).on('input', function () {
			go.cv.h(this);
			});
		},
		addCt: 1,
		txtInfo: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			a = [];
			b = dom.id("txt-cv").dataset.id;
			if (b==0) a[0] = "arial"; else if (b==1) a[0] = "impact"; else if (b==2) a[0] = "courier"; else if (b==3) a[0] = "lobster";
			b = dom.id("color-cv").dataset.id;
			if (b==0) a[1] = "#FF9300"; else if (b==1) a[1] = "#FFCB00"; else if (b==2) a[1] = "#00AEF9"; else if (b==3) a[1] = "#62DA37"; else if (b==4) a[1] = "#CC74E1"; else if (b==5) a[1] = "#E64646"; else if (b==6) a[1] = "#000"; else if (b==7) a[1] = "#fff";
			a[2] = dom.id("size-cv").dataset.id+"px";
			a[3] = [dom.id("txt-cv").dataset.id,dom.id("color-cv").dataset.id,dom.id("size-cv").dataset.id];
			return a;
		},
		txtMcS: false,
		txtEl: '',
		txtIR: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = a.split(",");
			c = dom.s(dom.id("txt-cv"),[["data-id",b[0]]]);
			d = c.childNodes;
			e = d.length;
			for (f=0;f<e;f++) if (f==b[0]) $(d[f]).addClass("__11k"); else $(d[f]).removeClass("__11k");
			c = dom.s(dom.id("color-cv"),[["data-id",b[1]]]);
			d = c.childNodes;
			e = d.length;
			for (f=0;f<e;f++) if (d[f].dataset.id==b[1]) $(d[f]).addClass("__11p"); else $(d[f]).removeClass("__11p");
			$(dom.s(dom.id("size-cv"),[["data-id",b[2]]]).firstChild).animate({width: ((176/100)*b[2])+"px"},200);
		},
		txtMvS: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = a.parentNode;
			$(b).removeClass("__12f").attr("id","sel-cv-txt");
			$(b).children("div").removeClass("invisible");
			$(b).children("textarea").removeClass("__12g");
		},
		txtMv: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
			go.cv.clearTxt();
			go.cv.txtIR(a.dataset.i);
			$(a).removeClass("__12f").attr("id","sel-cv-txt");
			$(a).children("div").removeClass("invisible");
			$(a).children("textarea").removeClass("__12g");
			if (!go.cv.txtMcS) go.cv.txtMcS = true; else return;
			b = [[go.cut(a.style.marginLeft),go.cut(a.style.marginTop)],dom.client(event)];
			go.cv.txtEl = a;
			document.addEventListener("mousemove",function(event) {
				if (!go.cv.txtMcS) return;
				b[2] = dom.client(event);
				b[3] = [(b[0][0]+(b[2][0]-b[1][0])),(b[0][1]+(b[2][1]-b[1][1]))];
				$(go.cv.txtEl).animate({marginLeft: b[3][0]+"px",marginTop: b[3][1]+"px"},0);
			},false);
			document.addEventListener("mouseup",function() {
				if (go.cv.txtMcS) go.cv.txtMcS = false; else return;
			},false);
			document.addEventListener("click",function() {
				if (go.cv.txtMcS) go.cv.txtMcS = false; else return;
			},false);
		},
		clearTxt: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$("div .__11y").addClass("__12f").removeAttr("id");
			$(".__11y div").addClass("invisible");
			$(".__11y textarea").addClass("__12g");
			$("div .hidd, .__12n").fadeOut(1);
			$("div .__12h").css("cursor","default").removeAttr("id").addClass("_nb");
			go.cv.rtt();
		},
		rtte: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(a.parentNode).css({"webkitTransform":"translateY(0) rotate(0deg)","mozTransform":"translateY(0) rotate(0deg)","oTransform":"translateY(0) rotate(0deg)","msTransform":"translateY(0) rotate(0deg)","transform":"translateY(0) rotate(0deg)"});
		},
		rtt: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = $("div .__11y");
			c = b.length;
			for (d=0;d<c;d++) $(b[d]).css({"webkitTransform":"translateY(0) rotate("+b[d].dataset.r+"deg)","mozTransform":"translateY(0) rotate("+b[d].dataset.r+"deg)","oTransform":"translateY(0) rotate("+b[d].dataset.r+"deg)","msTransform":"translateY(0) rotate("+b[d].dataset.r+"deg)","transform":"translateY(0) rotate("+b[d].dataset.r+"deg)"});
		},
		efChange: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.canvas.effect = a;
			go.canvasInit();
		},
		ffChange: function(a) {
			$("#sel-cv-txt textarea").css({'font-family':(a==0?'arial':(a==1?'impact':(a==2?'courier':'lobster')))});
			$("#sel-cv-txt").attr("data-i",go.cv.txtInfo()[3]);
			$('div .__11z').each(function () {
			go.cv.h(this);
			}).on('input', function () {
			go.cv.h(this);
			});
		},
		addTxt: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.cv.clearTxt();
			a = dom.id("__11x");
			b = JSON.parse(a.dataset.i);
			d = [((b[0]-200)/2),(((b[1]-200)/2)+110),go.cv.txtInfo()];
			c = dom.i(dom.s(dom.e("div"),[["class","__11y"],["style","z-index: "+go.cv.addCt+";margin: "+d[1]+"px 0 0 "+d[0]+"px"],["onmousedown","return go.cv.txtMv(this,event)"],["id","sel-cv-txt"],["data-i",d[2][3]],["data-r",0]]),"<div class=\"__12a\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\"></div><div class=\"__12b\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\"></div><textarea rows=\"1\" class=\"__11z\" style=\"font-family: "+d[2][0]+"; color: "+d[2][1]+"; font-size: "+d[2][2]+";\" onfocus=\"return go.cv.rtte(this)\" onmousedown=\"return go.cv.txtMvS(this,go.stop(event));\">Abcd</textarea><div class=\"__12c\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\"></div><div class=\"__12d\" onmousedown=\"return go.cv.stickerRtt(this,go.stop(event))\"></div>");
			go.cv.addCt++;
			dom.c(a,c);
			$('div .__11z').each(function () {
			go.cv.h(this);
			}).on('input', function () {
			go.cv.h(this);
			});
		},
		update: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a.dataset.st=="open"||a.dataset.st==undefined) dom.s(a,[["data-st","close"]]); else return;
			http.start({'s':56,'v':dom.l(dom.id("st-l"))}).onreadystatechange = function() {
				if (!http.st(this)) return; b = http.txt(this);
				if (b[0]!='') dom.s(dom.i(dom.id("st-l"),dom.ih(dom.id("st-l"))+b[0]),[["data-st","open"]]);
			}
		},
		h: function(e) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = $(e).textWidth();
			$(e).css({'height':'auto','width':b}).height(e.scrollHeight);
			$(e.nextSibling).css({'marginTop':(e.scrollHeight+2)});
			$(e.nextSibling.nextSibling).css({'marginTop':(e.scrollHeight+2),'marginLeft': (b+2)+"px"});
			$(e.previousSibling).css({'marginLeft': (b+2)+"px"});
		},
		ptCt: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (a[1]<0) a[1] = 0; else if (a[1]>176) a[1] = 176; else a[1] = parseInt(a[1]);
			a[0].firstChild.style.width = a[1]+"px";
			b = parseInt((a[1]/176)*100);
			dom.s(a[0],[["data-id",b]]);
			if (a[0].dataset.f!=undefined) eval(a[0].dataset.f+"("+b+")");
		},
		ptI: '',
		pt: function(a,event) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (!go.cv.pst) go.cv.pst = true; else return;
			b = [dom.eP(a)[0],(dom.client(event)[0]+2)];
			go.cv.ptCt([a,(b[1]-b[0])]);
			go.cv.ptI = a;
			document.addEventListener("mousemove",function(event) {
				if (!go.cv.pst) return; else go.cv.ptCt([go.cv.ptI,((dom.client(event)[0]+2)-b[0])]);
			},false);
			document.addEventListener("mouseup",function(event) {
				if (go.cv.pst) go.cv.pst = false; else return;
			},false);
			document.addEventListener("mouseup",function(event) {
				if (go.cv.pst) go.cv.pst = false; else return;
			},false);
		},
	},
	canvas: {},
	canvasОbj: '',
	canvasInit: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$(".__11w").fadeIn(1);
		go.canvasFI(go.canvas.filter);
		setTimeout(function() {
			if (go.canvas.effect!=undefined) setTimeout(go.canvasEI(go.canvas.effect),1); else dom.id("i-filter").parentNode.replaceChild(go.canvasОbj,dom.id("i-filter"));
			$(".__11w").fadeOut(1);
		},500);
	},
	mirror: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$(".__12j").fadeIn(200);
		a = [go.canvasОbj];
		a[1] = JSON.parse(a[0].dataset.i);
		$(".__12j").fadeOut(200);
	},
	lowPoly: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$(".__12j").fadeIn(200);
		c = [go.canvasОbj];
		c[1] = JSON.parse(c[0].dataset.i);
		triangulate({accuracy:0,blur:99,vertexCount:2000,threshold: 0, stroke:0,strokeWidth: 0, lineJoin:'round'}).fromImage(c[0]).toImageData().then(function (e) {
				b = dom.s(dom.e('canvas'),[["width",c[1][0]],["height",c[1][1]]]);
				b.getContext('2d').putImageData(e,0,0);
					go.canvasОbj = dom.s(dom.e("img"),[["width",go.canvasОbj.width],["height",go.canvasОbj.height],["data-i",c[0].dataset.i],["src",b.toDataURL('image/jpeg',1)],["style","margin: "+c[0].style.marginTop+" 0 0 "+c[0].style.marginLeft],["id","i-filter"],["class","photo"]]);
					dom.id("i-filter").parentNode.replaceChild(go.canvasОbj,dom.id("i-filter"));
					$(".__12j").fadeOut(200);
			});
	},
	canvasEI: function(a) {
		if (a==1) go.lowPoly(); else if (a==2) go.mirror();else dom.id("i-filter").parentNode.replaceChild(go.canvasОbj,dom.id("i-filter"));
	},
	canvasFI: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		go.canvasОbj = dom.id("i-filter-hidden");
		b = [dom.e("canvas"),go.canvasОbj];
		b[4] = JSON.parse(b[1].dataset.i);
		b[0].width = b[4][0];
		b[0].height = b[4][1];
		b[2] = b[0].getContext("2d");
		b[2].drawImage(b[1],0,0);
		if (a!=0&&a!=undefined) {
			b[3] = b[2].getImageData(0,0,b[4][0],b[4][1]);
			f = b[3].data;
			i = f.length
			for (g = 0;g < i; g += 4) {
			if (a==1) {
				j = f[g]*.3+f[g+1]*.59+f[g+2]*.11;
				f[g] = j;
				f[g+1] = j;
				f[g+2] = j;
			} else if (a==2) {
				f[g] = 255-f[g];
				f[g+1] = 255-f[g+1];
				f[g+2] = 255-f[g+2];
			} else if (a==3) {
				f[g] = f[g]*.3;
				f[g+1] = f[g+1]*.6;
				f[g+2] = f[g+2]*.9;
			} else if (a==4) {
				f[g] = f[g]*.9;
				f[g+1] = f[g+1]*.6;
				f[g+2] = f[g+2]*.3;
			} else if (a==5) {
				f[g] = f[g]*.3;
				f[g+1] = f[g+1]*.9;
				f[g+2] = f[g+2]*.3;
			} else if (a==6) {
				j = f[g]*.5+f[g+1]*.9+f[g+2]*.7;
				f[g] = j;
				f[g+1] = j;
				f[g+2] = j;
			} else if (a==7) {
				f[g] = f[g]*.393+f[g+1]*.769+f[g+2]*.189;
				f[g+1] = f[g]*.349+f[g+1]*.686+f[g+2]*.168;
				f[g+2] = f[g]*.272+f[g+1]*.534+f[g+2]*.131;
			}
			}
			b[2].putImageData(b[3],0,0);
		}
		go.canvasОbj = dom.s(dom.e("img"),[["class","photo"],["width",b[1].width],["height",b[1].height],["src",b[0].toDataURL('image/jpeg', 1)],["id","i-filter"],["data-i",b[1].dataset.i],["style","margin: "+b[1].style.marginTop+" 0 0 "+b[1].style.marginLeft]]);
	},
	filterBack: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = a.parentNode.parentNode.previousSibling;
		$(b).animate({marginLeft: 0},200);
		$(".__12r").css({"pointer-events":"none"});
		
	},
	changeFilter: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = a.parentNode;
		$(c).animate({marginLeft: "-201px"},200);
		d = c.nextSibling;
		e = d.childNodes;
		f = e.length;
		for (g=0;g<f;g++) if (e[g].dataset.id==b) $(e[g]).removeClass("invisible"); else $(e[g]).addClass("invisible");
		if (b==5) go.paint.init();
	},
	paint: {
		cv: '',
		cvh: '',
		offset: {},
		obj: {},
		init: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			$(".__12r").css({"pointer-events":""});
			a = [dom.id("img_cv-hd"),dom.id("img_cv")];
			go.paint.obj.m = a[0];
			go.paint.obj.w = a[0].width;
			go.paint.obj.h = a[0].height;
			a[2] = a[0].getBoundingClientRect();
			go.paint.offset = {'l':a[2].left,'t':a[2].top};
			go.paint.cv = a[0].getContext("2d");
			go.paint.cvh = a[1].getContext("2d");
			a[0].addEventListener("mouseup",function(e) {
				go.paint.up(e);
			},false);
			a[0].addEventListener("mousedown",function(e) {
				go.paint.down(e);
			},false);
			a[0].addEventListener("mousemove",function(e) {
				go.paint.move(e);
			},false);
		},
		ss: true,
		move: function(e) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.paint.ss) return;
			a = [dom.client(e)];
			go.paint.cv.beginPath();
			go.paint.cv.moveTo(go.paint.psn.x,go.paint.psn.y);
			go.paint.cv.lineTo(a[0][0]-go.paint.offset.l,a[0][1]-go.paint.offset.t);
			go.paint.cv.stroke();
			go.paint.psn.x = a[0][0]-go.paint.offset.l;
			go.paint.psn.y = a[0][1]-go.paint.offset.t;
		},
		color: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			a = [dom.id("color-cv-ln").dataset.id,''];
			if (a[0]==7) a[1] = "#fff"; else if (a[0]==6) a[1] = "#000"; else if (a[0]==5) a[1] = "#E64646"; else if (a[0]==4) a[1] = "#CC74E1"; else if (a[0]==3) a[1] = "#62DA37"; else if (a[0]==2) a[1] = "#00AEF9"; else if (a[0]==1) a[1] = "#FFCB00"; else if (a[0]==0) a[1] = "#FF9300";
			return a[1];
		},
		gA: 1,
		gAS: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			b = a*.01;
			go.paint.gA = b;
			$("#img_cv-hd").css({"opacity":b});
		},
		psn: {},
		down: function(e) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (go.paint.ss) {
				go.paint.ss = false;
				a = [dom.client(e)];
				go.paint.cvh.globalAlpha = go.paint.gA; 
				go.paint.cv.lineJoin = go.paint.cv.lineCap = "round";
				go.paint.cv.strokeStyle = go.paint.color();
				go.paint.cv.lineWidth = dom.id("cv-lw").dataset.id;
				go.paint.cv.beginPath();
				go.paint.cv.moveTo(a[0][0]-go.paint.offset.l,a[0][1]-go.paint.offset.t);
				go.paint.cv.lineTo(a[0][0]-go.paint.offset.l,a[0][1]-go.paint.offset.t);
				go.paint.cv.stroke();
				go.paint.psn = {'x':(a[0][0]-go.paint.offset.l),'y':(a[0][1]-go.paint.offset.t)};
			} else return;
		},
		list: [],
		back: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.paint.list.pop();
			a = go.paint.list.length;
			go.paint.cvh.clearRect(0,0,go.paint.obj.w,go.paint.obj.h);
			if (a!='') {
				d = dom.s(dom.e("canvas"),[["width",go.paint.obj.w],["height",go.paint.obj.h]]);
				e = d.getContext('2d');
				for (b=0;b<a;b++) {
					c = go.paint.list[b];
					go.paint.cvh.globalAlpha = c.g;
					e.putImageData(c.i,0,0);
					go.paint.cvh.drawImage(d,0,0);
				}
				go.paint.cvh.globalAlpha = go.paint.gA; 
			} else go.paint.cv.clearRect(0,0,go.paint.obj.w,go.paint.obj.h);
		},
		remove: function() {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			go.paint.list = [];
			go.paint.cv.clearRect(0,0,go.paint.obj.w,go.paint.obj.h);
			go.paint.cvh.clearRect(0,0,go.paint.obj.w,go.paint.obj.h);
		},
		up: function(e) {
			if (!go.paint.ss) {
				go.paint.ss = true;
				go.paint.list.push({'i':go.paint.cv.getImageData(0,0,go.paint.obj.w,go.paint.obj.h),'g':go.paint.gA});
				go.paint.cvh.drawImage(go.paint.obj.m,0,0);
				go.paint.cv.clearRect(0,0,go.paint.obj.w,go.paint.obj.h);
			} else return;
		},
	},
	filterChange: function(a,z) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$("div .__10h1").removeClass("__10h3");
		$(z).addClass("__10h3");
		go.canvas.filter = a;
		go.canvasInit();
	},
	addNew: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (dom.id("box")) {
			dom.no(dom.id("box").lastChild);
			dom.api(dom.id("box"),'<div class="_box _box-profile _box-profile-filter" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" id="canv-ct"><div class="__11w"></div><div class="_m2 __10l" onclick="return load.check()"></div><div class="_m1">Edit Photo</div><div class="_2d" id="filter"><div class="_box-filter-loading"></div></div></div>');
			dom.c(dom.id("canv-ct"),dom.s(dom.e("script"),[["src","/js/low_poly.js"]]));
		}
	},
	pFilter: function() {
		if (dom.id("filter")) return;
		go.addNew();
		go.canvas = {};
		go.paint.list = [];
		http.start({'s':55,'v':JSON.parse(dom.id("_password").dataset.i)}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id("filter")) return; else dom.i(dom.id("filter"),this.responseText);
			
		}
	},
	is: true,
	imgSizeF: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = a[1]<0?0:(a[1]>170?170:a[1]);
		dom.id("__10a").style.marginLeft = (b-8)+"px";
		c = parseInt((b/170)*100);
		$("#_2u").text(c);
		b = [dom.id("_2s"),dom.id("_2t")];
		a[2][2] = parseInt(a[2][0]+(((a[2][0]/100)*c)*4));
		a[2][3] = parseInt(a[2][1]+(((a[2][1]/100)*c)*4));
		e = [(a[0][0]-((a[2][2]-a[3][0])/2)),(a[0][1]-((a[2][3]-a[3][1])/2))];
			if ((e[0]+a[2][2])<a[4][0]) e[0] = a[4][0]-a[2][2]; else if (e[0]>a[4][2]) e[0] = a[4][2];
			if ((e[1]+a[2][3])<a[4][1]) e[1] = a[4][1]-a[2][3]; else if (e[1]>a[4][3]) e[1] = a[4][3];
		$("#_2s, #_2t").animate({marginLeft: e[0]+"px",marginTop: e[1]+"px",width: a[2][2]+"px",height: a[2][3]+"px"},0);
	},
	pis: true,
	imgPsizeF: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		a[4] = [dom.id("_2s").clientWidth,dom.id("_2s").clientHeight,go.cut(dom.id("_2s").style.marginLeft),go.cut(dom.id("_2s").style.marginTop),(dom.id("_2s").clientHeight+go.cut(dom.id("_2s").style.marginTop))];
		b = a[2]<0?0:(a[2]>170?170:a[2]);
		$(a[3][0]).animate({marginTop: (b-8)+"px"},0);
		c = 100-parseInt((b/170)*100);
		$("._2u").text(c);
		d = [(200+(c/2))];
		d[1] = (350-d[0])/2;
		d[2] = d[0]+d[1];
		if (d[1]<a[4][3]) {
		$("#_2s, #_2t").animate({marginTop: d[1]+"px"},0);
		if (a[4][1]<d[0]) {
			d[3] = [(a[4][0]+((a[4][0]/100)*(100-((a[4][1]/d[0])*100))))];
			d[3][1] = a[4][2]-((d[3]-a[4][0])/2);
			$("#_2s, #_2t").animate({height: d[0]+"px",width: d[3][0]+"px", marginLeft: d[3][1]+"px"},0);
		}
		} else if (a[4][4]<(d[0]+d[1])) {
			if (a[4][1]>d[0]) $("#_2s, #_2t").animate({marginTop: ((d[0]+d[1])-a[4][1])+"px"},0); else  {
				d[3] = [(a[4][0]+((a[4][0]/100)*(100-((a[4][1]/d[0])*100))))];
				d[3][1] = a[4][2]-((d[3]-a[4][0])/2);
				$("#_2s, #_2t").animate({height: d[0]+"px",marginTop: d[1]+"px",width: d[3][0]+"px", marginLeft: d[3][1]+"px"},0);
			}
		}
		$(".__9r5").animate({marginTop: d[2]+"px"},0);
		$(".__9s, .__9r5").animate({height: d[1]+"px"},0);
		$("#__9t").animate({height: d[0]+"px",marginTop: d[1]+"px"},0);
	},
	imgPSize: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (go.pis) go.pis = false; else return;
		b = [dom.eP(a)[1],dom.client(event)[1]];
		b[2] = b[1]-b[0];
		b[3] = [dom.id("__10d")];
		$("._2u").fadeIn(200);
		go.imgPsizeF(b);
		document.addEventListener("mousemove",function(event) {
			if (go.pis) return;
			b[2] = dom.client(event)[1]-b[0];
			go.imgPsizeF(b);
		},false);
		document.addEventListener("mouseup",function(event) {
			if (!go.pis) {
				go.pis = true;
				$("._2u").fadeOut(200);
			}
		},false);
		document.addEventListener("click",function(event) {
			if (!go.pis) {
				go.pis = true;
				$("._2u").fadeOut(200);
			}
		},false);
	},
	imgSize: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (go.is) go.is = false;
		$(".__10d").animate({marginTop: "162px"},0);
		$(".__9r5").animate({marginTop: "275px",height: "75px"},0);
		$("#__9t").animate({marginTop: "75px",height: "200px"},0);
		$("#__9s").animate({height: "75px"},0);
		$("#_2u").fadeIn(200);
		b = [dom.eP(a)[0],dom.client(event)[0]];
		f = [[go.cut(dom.id("_2s").style.marginLeft),go.cut(dom.id("_2s").style.marginTop)],(b[1]-b[0]),[Math.round(dom.id("_2s").dataset.w),Math.round(dom.id("_2s").dataset.h)],[go.cut(dom.id("_2s").style.width),go.cut(dom.id("_2s").style.height)],[(dom.id("__9t").clientWidth+178),(dom.id("__9t").clientHeight+dom.id("__9s").clientHeight),178,dom.id("__9s").clientHeight,dom.id("__9t").clientWidth,dom.id("__9t").clientHeight]];
		go.imgSizeF(f);
		document.addEventListener("mousemove",function(event) {
			if (go.is) return;
			f[1] = dom.client(event)[0]-b[0];
			go.imgSizeF(f);
		},false);
		document.addEventListener("mouseup",function(event) {
			if (!go.is) go.is = true;
			$("#_2u").fadeOut(200);
			},false);
		document.addEventListener("click",function(event) {
			if (!go.is) go.is = true;
			$("#_2u").fadeOut(200);
		},false);
	},
	si: true,
	moveI: function(a) {
		$("#_2s,#_2t").css({marginLeft:Math.min(Math.max((a.l-a.fx),(378-a.w)),178)+"px",marginTop:Math.min(Math.max((a.t-a.fy),(a.mh-a.h)),a.hm)+"px"});
	},
	cut: function(a) {
		return Number(a.substr(0, a.length-2));
	},
	sizeImage: function(a,event) {
		if (go.si) go.si = false;
		b = {};
		b.o = a;
		b.x = event.clientX;
		b.y = event.clientY;
		b.l = go.cut(b.o.style.marginLeft);
		b.t = go.cut(b.o.style.marginTop);
		b.w = go.cut(b.o.style.width);
		b.h = go.cut(b.o.style.height);
		b.mh =  dom.id("__9s").clientHeight+dom.id("__9t").clientHeight;
		b.hm = dom.id("__9s").clientHeight;
		document.addEventListener("mousemove",function(event){
			if (!go.si) {
				b.fx = b.x-event.clientX;
				b.fy = b.y-event.clientY;
				go.moveI(b);
			}
		},false);
		document.addEventListener("mouseup",function(event) {
			if (go.si) return; else go.si = true;
		},false);
	},
	ajaxLoad: function(a) {
		$("#bt3").fadeIn(0);
		$("._2o").fadeOut(0);
		load.change(http.txt(a));
	},
	ajaxAbort: function(a) {
		$("#bt3").fadeIn(0);
		$("._2o").fadeOut(0);
		a.abort();
	},
	newProfile: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!(a.files[0].type=='image/jpeg'||a.files[0].type=='image/jpg'||a.files[0].type=='image/png'||a.files[0].type=='image/gif'||a.files[0].type=='image/x-png')) return;
		$("#bt3, #_2q1").fadeOut(0);
		$("._2o, ._2q").fadeIn(0);
		$("._2p").css({width: 0});
		$(http.op[2]).fadeIn(200);
		http.up([[["up",0],["id",1]],[["img",a.files[0]]],[0,dom.id("_2q"),[dom.id("_2p"),438],dom.id("_2q1")]]);
		/*
		a[0] = [];
		a[1] = [['name',file],['name',file],[name,file]];
		a[2] = [method(0->img),(id inner percentage)];
		*/
	},
	click: function() {
		if (dom.id("file")) dom.id("file").click();
	},
	profilePicture: function() {
		go.loadInit(54);
	},
	cancelInfo: function() {
		http.start({'s':53}).onreadystatechange = function() {
			if (!http.st(this)) return; else dom.i(dom.id("info-change"),"");
		};
	},
	saveInfo: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.qs("data-edit"),[]];
		b[2] = b[0].length;
		for (b[3]=0;b[3]<b[2];b[3]++) {
			if (b[3]==0||b[3]==1||b[3]==2) {
				if ((b[3]==0||b[3]==1)&&(dom.v(b[0][b[3]])=='')) {
					b[0][b[3]].focus();
					return;
				}
				b[1].push(dom.v(b[0][b[3]]));
			} else b[1].push(b[0][b[3]].dataset.id);
		}
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else dom.s(dom.id('bt2'),[['data-status','close']]);
		go.f(dom.id('bt2'),0);
		b[4] = [dom.qs("data-edit")];
		b[4][1] = b[4][0].length;
		for (b[4][2]=0;b[4][2]<b[4][1];b[4][2]++) $(b[4][0][b[4][2]]).animate({backgroundColor: "white"},100);
		http.start({'s':52,'v':b[1]}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt2')) return; else dom.s(dom.id('bt2'),[['data-status','open']]);
			go.f(dom.id('bt2'),1);
			go.checkInfo(http.txt(this));
		}
	},
	checkInfo: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [a[7]];
		c = [dom.qs("data-edit")];
		b[1] = b[0].length;
		if (b[1]!=0) {
			for (b[2]=0;b[2]<b[1];b[2]++) {
				$(c[0][b[0][b[2]]]).animate({backgroundColor: '#ffeaee'},500);
				if (b[0][b[2]]==0||b[0][b[2]]==1||b[0][b[2]]==2) go.viewInfo();
				if (b[0][b[2]]==4)  $("#help-date").fadeIn(200);
			}
		} else {
			if (a[8]!=undefined) if (a[8][0]==1) dom.i(dom.id("info-change"),a[8][1]);
			go.viewSuccess(1);
		}
	},
	vI: null,
	viewInfo: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		clearTimeout(go.vI);
		$("#help-info").fadeIn(200);
	},
	hideInfo: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		clearTimeout(go.vI);
		go.vI = setTimeout(function() {$("#help-info").fadeOut(200);},500);
	},
	txtTimer: null,
	searchTxt: function(a) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			clearTimeout(go.txtTimer);
			b = a.parentNode.nextSibling;
			c = b.nextSibling;
			if (dom.v(a)!='') {
			go.txtTimer = setTimeout(function() {
			clearTimeout(go.txtTimer);
			d = c.childNodes;
			e = d.length;
			$(b).html('');
			h = new RegExp("("+dom.v(a)+")","i");
			for (f=0;f<e;f++) if (h.test(d[f].dataset.txt)) dom.c(b,dom.i(d[f].cloneNode(true),d[f].dataset.txt.replace(h,"<span class=\"__4w4\">$1</span>")));
			if (dom.ih(b)=='') dom.i(b,'<div class="__4w5">Ничего не найдено</div>');
			$(b).removeClass("invisible"); 
			dom.no(c);
			},500);
			} else {
			$(b).html('').addClass("invisible");
			dom.bl(c);
			}
	},
	f: function(a,b = 0) {
		if (b==0) {
			dom.no(a.lastChild);
			dom.bl(a.firstChild);
		} else {
			dom.bl(a.lastChild);
			dom.no(a.firstChild);
		}
	},
	changeV: function(a) {
		if (!dom.id("box")) return;
		dom.i(dom.id("box"),dom.ih(dom.id("box"))+a);
			$("#load-box").fadeOut(1);
			if (dom.id("_password")) $("#_password").animate({'opacity':1},50);
	},
	fEE: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (a.s!=0) {
		b = [dom.qs("data-edu-rdy")[a.t]];
		b[1] = b[0].childNodes.length;
		for (b[2]=0;b[2]<b[1];b[2]++) if (b[0].childNodes[b[2]].dataset.id==a.i) dom.ri(b[0].childNodes[b[2]],a.h);
		}
	},
	finalEduEdit: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (a.s==0) go.changeV(a.html); else {
			go.fEE(a.f);
			go.viewSuccess(1);
			load.marginOff();
		}
	},
	saveEditMilitary: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = dom.qs("data-military");
		d = c.length;
		e = [b];
		for (f=0;f<d;f++) {
			if (f==0||f==3||f==4) {
				if (f==0&&c[f].dataset.id==0) {
					$(c[f].parentNode.nextSibling).fadeIn(200);
					return;
				} else e.push(c[f].dataset.id);
			} else {
				if (dom.v(c[f])=='') {
					c[f].focus();
					return;
				} else e.push(dom.v(c[f]));
			}
		}
		if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else dom.s(dom.id('bt3'),[['data-status','close']]);
		go.f(dom.id('bt3'),0);
		http.start({'s':50,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else dom.s(dom.id('bt3'),[['data-status','open']]);
			go.f(dom.id('bt3'),1);
			go.finalMilitaryEdit(http.txt(this));
		}
	},
	finalMilitaryEdit: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (a.s==0) go.changeV(a.html); else {
			go.fME(a.f);
			go.viewSuccess(1);
			load.marginOff();
		}
	},
	fME: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (a.s!=0) {
		b = [dom.id("military")];
		b[1] = b[0].childNodes.length;
		for (b[2]=0;b[2]<b[1];b[2]++) if (b[0].childNodes[b[2]].dataset.id==a.i) dom.ri(b[0].childNodes[b[2]],a.h);
		}
	},
	saveEditEdu: function(a,b,b1) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = b==0?dom.qs("data-eds"):dom.qs('data-edu');
		d = [c.length];
		f = [b,b1];
		for (e=0;e<d[0];e++) {
			if (e==0||e==1||e==2) {
				if (c[e].dataset.id==0) {
				$(c[e].parentNode.nextSibling).fadeIn(200);
				return;
				}
			}
			f.push((b==0?(e!=6?c[e].dataset.id:dom.v(c[e])):c[e].dataset.id));
		}
		if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else dom.s(dom.id('bt3'),[['data-status','close']]);
		go.f(dom.id('bt3'),0);
		http.start({'s':44,'v':f}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else dom.s(dom.id('bt3'),[['data-status','open']]);
			go.f(dom.id('bt3'),1);
			go.finalEduEdit(http.txt(this));
		}
	},
	txt: '',
	clear: function(a,event) {
		a.innerHTML = a.innerText;
	},
	saveDel: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.v(dom.id("cp"));
		if (b=='') {
			dom.id("cp").focus();
			return;
		}
		$("#pcf").fadeOut(1);
		if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else dom.s(dom.id('bt3'),[['data-status','close']]);
		go.f(dom.id('bt3'),0);
		c = JSON.parse(dom.id("_password").dataset.q);
		c.p = dom.v(dom.id("cp"));
		http.start({'s':40,'v':c}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else dom.s(dom.id('bt3'),[['data-status','open']]);
			go.f(dom.id('bt3'),1);
			d = http.txt(this);
			if (d[0]==1) {
				$(".__6l").fadeIn(200);
				return load.end(d[1]);
			} else $("#pcf").fadeIn(200);
		}
	},
	rM: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.id("military")];
		b[1] = b[0].childNodes.length;
		for (b[2]=0;b[2]<b[1];b[2]++) if (b[0].childNodes[b[2]].dataset.id==a.i) dom.r(b[0],b[0].childNodes[b[2]]);
		go.viewSuccess("Информация удалена");
	},
	delM: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt1')) return; else if (dom.st(dom.id('bt1'))=='close') return; else dom.s(dom.id('bt1'),[['data-status','close']]);
		http.start({'s':48,'v':a}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt1')) return; else dom.s(dom.id('bt1'),[['data-status','open']]);
			b = http.txt(this);
			if (b.s!=0) load.change(b); else {
				load.marginOff();
				go.rM(b.f);
			}
		};
	},
	delQ: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt1')) return; else if (dom.st(dom.id('bt1'))=='close') return; else dom.s(dom.id('bt1'),[['data-status','close']]);
		http.start({'s':39,'v':a}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt1')) return; else dom.s(dom.id('bt1'),[['data-status','open']]);
			b = http.txt(this);
			if (b.s!=0) load.change(b); else {
				load.marginOff();
				go.rEdu(b.f);
			}
		};
	},
	loadInitV: function(a,b) {
		load.start();
		http.start({'s':a,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else load.con(http.txt(this));
			go.audio.join();
		}
	},
	editEdu: function(a,b,event) {
		go.loadInitV(41,a);
	},
	removeEdu: function(a,b,event) {
		a.m = 0;
		go.loadInitV(38,a);
	},
	viewList: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.cl("__8d"),dom.cl("list-h"),a.dataset.id];
		$("div .__8d").removeClass("__8e");
		$("div .list-h").addClass("invisible");
		c = [b[0].length,b[1].length];
		for (d=0;d<c[0];d++) if (b[0][d].dataset.id===b[2]) $(b[0][d]).addClass("__8e");
		for (d=0;d<c[1];d++) if (b[1][d].dataset.id===b[2]) $(b[1][d]).removeClass("invisible");
		go.viewAdd(b[2]);
	},
	viewAdd: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.qs("data-edu-rdy");
		c = b.length;
		for (d=0;d<c;d++) if (b[d].dataset.id==a) $(b[d]).removeClass("invisible"); else $(b[d]).addClass("invisible");
	},
	saveContacts: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else dom.s(dom.id('bt2'),[['data-status','close']]);
		go.f(dom.id('bt2'),0);
		e = [];
		b = dom.qs("data-t");
		c = b.length;
		for (d=0;d<c;d++) e[d] = [b[d].dataset.id,dom.str(dom.v(b[d].previousSibling))];
		http.start({'s':32,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else dom.s(dom.id('bt2'),[['data-status','open']]);
			go.f(dom.id('bt2'),1);
			a = http.txt(this);
			if (a.s==0) {
				load.start();
				load.con(a);
			} else go.viewSuccess(0);
		}
	},
	selV: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = b.parentNode.parentNode.previousSibling;
		dom.i(dom.s(c,[['data-id',a.i]]),a.v);
	},
	accessibility: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		e = [];
		b = dom.qs("data-t");
		c = b.length;
		for (d=0;d<c;d++) e.push(b[d].dataset.id);
		http.start({'s':29,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			a = http.txt(this);
			if (a.s==0) {
				load.start();
				load.con(a);
			} else go.viewSuccess(0);
		}
	},
	inpCheck: function(a = 0) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		a = true;
		b = a==0?dom.qs("data-t"):dom.qs("data-q");
		c = b.length;
		for (d=0;d<c;d++) {
			if (dom.v(b[d])!='') continue;
				b[d].focus();
				a = false;
				break;
		}
		return a;
	},
	securityQS: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!go.inpCheck(1)) return;else if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		e = [];
		b = dom.qs("data-q");
		c = b.length;
		for (d=0;d<c;d++) e.push([b[d].dataset.id,dom.v(b[d])]);
		http.start({'s':28,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			load.marginOff();
			go.viewSuccess(0);
		}
		
	},
	updateQN: function(a) {
		if (dom.id("refresh-list")) dom.i(dom.id("refresh-list"),a);
	},
	updateQ: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		e = [];
		b = dom.qs("data-t");
		c = b.length;
		for (d=0;d<c;d++) e.push(b[d].dataset.id);
		http.start({'s':27,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return; else go.updateQN(this.responseText);
		}
	},
	secureQ: function() {
		go.loadInit(25);
	},
	viewB: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (a.nextSibling.firstChild) $(a.nextSibling.firstChild).fadeToggle(200);
		if (a.lastChild) $(a.lastChild).toggleClass("__6v1");
	},
	goVS: null,
	viewSuccess: function(a = 0) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		clearTimeout(go.goVS);
		clearTimeout(go.goEnd);
		go.goVS = setTimeout(function() {
			clearTimeout(go.goVS);
			$("div .__c1").animate({marginTop: "-50px"},200);
			if (a==0) dom.i(dom.id("a"),'Настройки сохранены'); else if (a==1) dom.i(dom.id("a"),'Информация сохранена'); else if (a==2) dom.i(dom.id("a"),go.txt); else dom.i(dom.id("a"),a);
			$("#a").animate({marginTop: 0},200);
		},500);
		go.goEnd = setTimeout(function() {
			clearTimeout(go.goVS);
			$("div .__c1").animate({marginTop: "-50px"},200);
		},3000);
	},
	notifications: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		e = [];
		b = dom.qs("data-tn");
		c = b.length;
		for (d=0;d<c;d++) e.push(b[d].dataset.id);
		http.start({'s':24,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			go.viewSuccess(0);
		}
	},
	privacy: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		e = [];
		b = dom.qs("data-t");
		c = b.length;
		for (d=0;d<c;d++) e.push(b[d].dataset.id);
		http.start({'s':20,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			a = http.txt(this);
			if (a.s==0) {
				load.start();
				load.con(a);
			} else go.viewSuccess(0);
		}
	},
	security: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		e = [];
		b = dom.qs("data-t");
		c = b.length;
		for (d=0;d<c;d++) e.push(b[d].dataset.id);
		http.start({'s':18,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			a = http.txt(this);
			if (a.s==0) {
				load.start();
				load.con(a);
			} else go.viewSuccess(0);
		}
	},
	settingsSave: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.v(dom.id("cp"));
		if (b=='') {
			dom.id("cp").focus();
			return;
		}
		$("#pcf").fadeOut(1);
		if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
		c = JSON.parse(dom.id("_password").dataset.q);
		c.push(dom.v(dom.id("cp")));
		http.start({'s':17,'v':c}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
			d = http.txt(this)[0];
			if (d==1) {
				$(".__6l").fadeIn(200);
				return load.check();
			} else $("#pcf").fadeIn(200);
		}
	},
	initF: function(a,event) {
		if (typeof(a)=="object") eval(a.b+"("+JSON.stringify({'v':a.c,'f':a.b})+")");
	},
	valCheck: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		a = dom.id("cp");
		if (dom.v(a)!='') return true; else a.focus();
		return false;
	},
	switchV: function(a) {
		dom.i(dom.id("box"),dom.ih(dom.id("box"))+a.html);
		$("#load-box").fadeOut(1);
		$("#_bv").animate({'opacity':1},200);
	},
	initC: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!go.valCheck()) return; else if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
		$("#pcf").fadeOut(200);
		http.start({'s':26,'v':dom.v(dom.id("cp"))}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
			c = http.txt(this);
			if (c.s!=0) $("#pcf").fadeIn(200); else go.switchV(c);
		}
	},
	rEdu: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.qs("data-edu-rdy")[a.t]];
		b[1] = b[0].childNodes.length;
		for (b[2]=0;b[2]<b[1];b[2]++) if (b[0].childNodes[b[2]].dataset.id==a.i) dom.r(b[0],b[0].childNodes[b[2]]);
		go.viewSuccess("Информация удалена");
	},
	initD: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!go.valCheck()) return; else if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
		$("#pcf").fadeOut(200);
		b = JSON.parse(dom.id("_password").dataset.q);
		b.v = dom.v(dom.id("cp"));
		http.start({'s':19,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
			c = http.txt(this);
			if (c[0]==0) {
				a.focus();
				$("#pcf").fadeIn(200);
			} else {
				load.marginOff();
				if (c[0]==2) go.viewSuccess(0); else go.viewSuccess(c[0]);
				if (c[1]!=undefined) go.rEdu(c[1]);
			}
		}
	},
	initE: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!go.valCheck()) return; else if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
		$("#pcf").fadeOut(200);
		b = JSON.parse(dom.id("_password").dataset.q);
		b.v = dom.v(dom.id("cp"));
		http.start({'s':19,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
			c = http.txt(this);
			if (c[0]==0) {
				a.focus();
				$("#pcf").fadeIn(200);
			} else {
				load.marginOff();
				go.viewSuccess(1);
				go.fEE(c[1]);
			}
		}
	},
	initM: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!go.valCheck()) return; else if (!dom.id('bt3')) return; else if (dom.st(dom.id('bt3'))=='close') return; else go.f(dom.s(dom.id('bt3'),[['data-status','close']]),0);
		$("#pcf").fadeOut(200);
		b = JSON.parse(dom.id("_box").dataset.q);
		b.v = dom.v(dom.id("cp"));
		http.start({'s':19,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt3')) return; else go.f(dom.s(dom.id('bt3'),[['data-status','open']]),1);
			c = http.txt(this);
			if (c[0]==0) {
				a.focus();
				$("#pcf").fadeIn(200);
			} else {
				load.marginOff();
				go.viewSuccess(0);
			}
		}
	},
	settingsPRChange: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt1')) return; else if (dom.st(dom.id('bt1'))=='close') return; else go.f(dom.s(dom.id('bt1'),[['data-status','close']]),0);
		$(".__6l").fadeOut(1);
		b = [[a.f,a.v]];
		c = dom.qs("data-s");
		d = c.length;
		for (e=0;e<d;e++) b.push(c[e].dataset.id);
		http.start({'s':16,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('bt1')) return; else go.f(dom.s(dom.id('bt1'),[['data-status','open']]),1);
			load.change(http.txt(this));
		};
	},
	loadInit: function(a) {
		load.start();
		http.start({'s':a}).onreadystatechange = function() {
			if (!http.st(this)) return; else load.con(http.txt(this));
		}
	},
	settingsCode: function() {
		go.loadInit(14);
	},
	eventType: function() {
		go.loadInit(22);
	},
	settingsPR: function() {
		go.loadInit(15);
	},
	viewMenuOption: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$(".__6x").fadeToggle(100);
	},
	
	saveMilitary: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		e = [];
		b = dom.qs("data-m");
		c = b.length;
		for (d=0;d<c;d++) {
		if ((d!=1)&&(d!=2)) {
			if (d==0&&b[d].dataset.id==0) {
				$(b[d].parentNode.nextSibling).fadeIn(200);
				return;
			} else e.push(b[d].dataset.id);
		} else {
			if (dom.v(b[d])=='') {
				b[d].focus();
				return;
			} else e.push(dom.v(b[d]));
		}
		}
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		http.start({'s':46,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			a = http.txt(this);
			if (a[0]!=0) dom.ins(dom.id("military"),a[1]); else go.viewSuccess('Можно указать максимум 5 военную службу');
			go.clearMilitary();
		}
	},
	editMilitary: function(a,b,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		go.loadInitV(49,a);
	},
	removeMilitary: function(a,b,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		go.loadInitV(47,a);
	},
	clearMilitary: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.qs("data-m");
		c = b.length;
		for (d=0;d<c;d++) if (d!=1&&d!=2) dom.i(dom.s(b[d],[["data-id",0]]),'Not selected'); else b[d].value = '';
	},
	saveInterests: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		e = [];
		b = dom.qs("data-t");
		c = b.length;
		for (d=0;d<c;d++) e.push(dom.str(dom.v(b[d]),2,1));
		http.start({'s':31,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			a = http.txt(this);
			if (a.s==0) {
				load.start();
				load.con(a);
			} else go.viewSuccess(0);
		}
	},
	saveViews: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		e = [[],[]];
		b = dom.qs("data-t");
		c = b.length;
		for (d=0;d<c;d++) e[0].push(b[d].dataset.id);
		b = dom.qs("data-s");
		c = b.length;
		for (d=0;d<c;d++) e[1].push(b[d].dataset.id);
		http.start({'s':30,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			a = http.txt(this);
			if (a.s==0) {
				load.start();
				load.con(a);
			} else go.viewSuccess(0);
		}
	},
	saveEducation: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = [dom.cl("__8e")[0].dataset.id];
		b[1] = b[0]==0?dom.qs('data-x'):(b[0]==1?dom.qs('data-z'):dom.qs('data-z_a'));
		d = [b[0]];
		if (b[0]==0) {
			b[2] = b[1].length<3?3:b[1].length;
			for (b[3]=0;b[3]<b[2];b[3]++) {
				if (b[3]!=6) {
					if (b[1][b[3]]!=undefined) {
						if (b[3]<3) {
						if (b[1][b[3]].dataset.id!=0) d.push(b[1][b[3]].dataset.id); else {
						$(b[1][b[3]].parentNode.nextSibling).fadeIn(200);
						return;
						}
						} else d.push(b[1][b[3]].dataset.id);
					} else {
						$(b[1][(b[3]-1)].parentNode.nextSibling).fadeIn(200);
						return;
					}
				} else d.push(dom.v(b[1][b[3]]));
			}
		} else if (b[0]==1) {
			b[2] = b[1].length<3?3:b[1].length;
			for (b[3]=0;b[3]<b[2];b[3]++) {
					if (b[1][b[3]]!=undefined) {
						if (b[3]<3) {
						if (b[1][b[3]].dataset.id!=0) d.push(b[1][b[3]].dataset.id); else {
						$(b[1][b[3]].parentNode.nextSibling).fadeIn(200);
						return;
						}
						} else d.push(b[1][b[3]].dataset.id);
					} else {
						$(b[1][(b[3]-1)].parentNode.nextSibling).fadeIn(200);
						return;
					}
			}
		} else {
			b[2] = dom.qs('data-z_a')[0];
			if (b[2].dataset.id==0) {
				$(b[2].parentNode.nextSibling).fadeIn(200);
				return;
			}
			d.push(b[2].dataset.id);
		}
		if (!dom.id('bt2')) return; else if (dom.st(dom.id('bt2'))=='close') return; else go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		http.start({'s':37,'v':d}).onreadystatechange = function() {
			if (!http.st(this)) return;else if (!dom.id('bt2')) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			a = http.txt(this);
			b = [dom.qs("data-edu-rdy")];
			if (b[0].length!=0) {
			b[1] = b[0][a[0]];
			if (a[1]==1) {
				dom.i(b[1],a[2]+dom.ih(b[1]));
				$(b[1].firstChild).animate({backgroundColor: "white"},2000);
				if (a[0]==0) {
					dom.rAll(dom.qs('data-ct-lt'));
					dom.rAll(dom.qs('data-ct-school'));
					dom.rAll(dom.qs('data-ct-school-add'));
				} else if (a[0]==1) {
					dom.rAll(dom.qs('data-ct-sc'));
					dom.rAll(dom.qs('data-ct-uni'));
					dom.rAll(dom.qs('data-ct-uni-add'));
				}
				go.viewSuccess(1);
			} else go.viewSuccess(a[2]);
			}
		}
	},
	saveSettings: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (dom.st(a)=='close') return; else b = {'d':dom.id('d1').dataset.id,'l':dom.id('d2').dataset.id,'t':dom.id('d3').dataset.id,'c':dom.id('d4').dataset.id};
		go.f(dom.s(dom.id('bt2'),[['data-status','close']]),0);
		http.start({'s':13,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else go.f(dom.s(dom.id('bt2'),[['data-status','open']]),1);
			b = http.txt(this);
			if (b.s==1) window.location.reload(true);
		}
	},
	init: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		try {
			c = b.dataset.id;
			if (c==0) {
				$(dom.s(b,[['data-id',1]])).addClass("__5x").children().addClass("__5y");
			} else {
				$(dom.s(b,[['data-id',0]])).removeClass("__5x").children().removeClass("__5y");
			}
			if (typeof(a)=="object") eval(a.f+"("+a.v+")");
		} catch (e) {
			console.log(e);
		}
	},
	p: function(event) {
		if (event.preventDefault) event.preventDefault(); else event.returnValue = false;
	},
	colourSel: function(a,b) {
		if (dom.id('d1')) $(dom.i(dom.s(dom.id('d1'),[['data-id',b.i]]),b.v).previousSibling).css("background-color",b.c);
	},
	citySel: function(a,b) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
		if (b.t==0) {
			dom.rAll(dom.qs('data-ct-school'));
			dom.rAll(dom.qs('data-ct-school-add'));
		} else if (b.t==1) {
			dom.rAll(dom.qs('data-ct-uni'));
			dom.rAll(dom.qs('data-ct-uni-add'));
		}
		http.start({'s':35,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else a = http.txt(this);
			d = dom.cl("list-h");
			e = d.length;
			for (f=0;f<e;f++) if (d[f].dataset.id!=a.i) continue; else dom.api(d[f],a.html);
		}
	},
	eduSel: function(a,b) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
		if (b.t==0) dom.rAll(dom.qs('data-ct-school-add')); else if (b.t==1) dom.rAll(dom.qs('data-ct-uni-add'));
		if (b.i==0) return;
		if (b.t==1) b.c = dom.id('uni-country').dataset.id;
		http.start({'s':36,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else a = http.txt(this);
			d = dom.cl("list-h");
			e = d.length;
			for (f=0;f<e;f++) if (d[f].dataset.id!=a.i) continue; else dom.api(d[f],a.html);
		}
	},
	citySelL: function(a,b) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
		dom.ri(dom.qs((b.m==0?'data-school-list':'data-uni-list'))[0],'<div class="__4c" '+(b.m==0?'data-school-list':'data-uni-list')+'="0"><div class="__4d">'+(b.m==0?'School':'University')+'</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '+(b.m==0?'data-eds':'data-edu')+'="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.citySelL(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;,&quot;m&quot;:0,&quot;t&quot;:1})">Not selected</div></div></div></div></div>');
		if (b.m==1) dom.ri(dom.id("box-body-out").childNodes[3],'<div class="__4c"><div class="__4d">Факультет</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '+(b.m==0?'data-eds':'data-edu')+'="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;,&quot;m&quot;:1,&quot;t&quot;:1})">Not selected</div></div></div></div></div>');
		go.cityEducationAll(b);
	},
	cityEducationAll: function(a) {
		http.start({'s':43,'v':a}).onreadystatechange = function() {
			if (!http.st(this)) return; else a = http.txt(this);
			b = dom.qs(a.i)[0];
			dom.ri(b,a.html);
		}
	},
	countrySelOp: function(a,b,c) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
			dom.ri(dom.qs((c==0?'data-school-list':'data-uni-list'))[0],'<div class="__4c" '+(c==0?'data-school-list':'data-uni-list')+'="0"><div class="__4d">'+(c==0?'School':'University')+'</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '+(c==0?'data-eds':'data-edu')+'="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.citySelL(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;,&quot;m&quot;:0,&quot;t&quot;:1})">Not selected</div></div></div></div></div>');
			if (c==1) dom.ri(dom.id("box-body-out").childNodes[3],'<div class="__4c"><div class="__4d">Факультет</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '+(b.m==0?'data-eds':'data-edu')+'="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;,&quot;m&quot;:1,&quot;t&quot;:1})">Not selected</div></div></div></div></div>');
		go.countrySelC(b.i,c);
	},
	countrySelC: function(a,b) {
		http.start({'s':42,'v':{'m':b,'i':a}}).onreadystatechange = function() {
			if (!http.st(this)) return; else a = http.txt(this);
			b = dom.qs(a.i)[0];
			dom.ri(b,a.html);
		}
	},
	countrySelectOp: function(a,b,c) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
		if (c==0) {
			dom.rAll(dom.qs('data-ct-lt'));
			dom.rAll(dom.qs('data-ct-school'));
			dom.rAll(dom.qs('data-ct-school-add'));
		} else if (c==1) {
			dom.rAll(dom.qs('data-ct-sc'));
			dom.rAll(dom.qs('data-ct-uni'));
			dom.rAll(dom.qs('data-ct-uni-add'));
		}
		if (b.i!=0) go.countrySelCity(b,c);
	},
	countrySelCity: function(b,c) {
		http.start({'s':34,'v':{'m':b,'i':c}}).onreadystatechange = function() {
			if (!http.st(this)) return; else a = http.txt(this);
			d = dom.cl("list-h");
			e = d.length;
			for (f=0;f<e;f++) if (d[f].dataset.id!=a.i) continue; else dom.api(d[f],a.html);
		}
	},
	countrySelect: function(a,b) {
		if (dom.id('d4')) dom.i(dom.s(dom.id('d4'),[['data-id',b.i]]),b.v);
	},
	timeSel: function(a,b) {
		if (dom.id('d3')) dom.i(dom.s(dom.id('d3'),[['data-id',b.i]]),b.v);
	},
	langSelect: function(a,b) {
		if (dom.id('d2')) dom.i(dom.s(dom.id('d2'),[['data-id',b.i]]),b.v);
	},
	stEdu: function(a,b) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
		dom.ri(dom.id("box-body-out").childNodes[3],'<div class="__4c"><div class="__4d">Факультет</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '+(b.m==0?'data-eds':'data-edu')+'="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;,&quot;m&quot;:1,&quot;t&quot;:1})">Not selected</div></div></div></div></div>');
		if (b.i!=0) go.eduFacultyUpdate(b);
	},
	eduFacultyUpdate: function(a) {
		a.ct = dom.qs("data-edu")[0].dataset.id;
		http.start({'s':45,'v':a}).onreadystatechange = function() {
			if (!http.st(this)) return; else dom.ri(dom.id("box-body-out").childNodes[3],http.txt(this).html);
		}
	},
	monthChange: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		dom.ri(dom.id("month-list"),a[1]);
	},
	yst: function(a,b) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
		http.start({'s':51,'v':b.i}).onreadystatechange = function() {
			if (!http.st(this)) return; go.monthChange(http.txt(this));
		}
	},
	sst: function(a,b) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
		if (b.i==0) $("#info-sex").addClass("__4c1"); else $("#info-sex").removeClass("__4c1");
	},
	st: function(a,b) {
		if (a.parentNode.parentNode.parentNode.previousSibling.firstChild) dom.i(dom.s(a.parentNode.parentNode.parentNode.previousSibling.firstChild,[['data-id',b.i]]),b.v);
	},
	linkOp: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = $(a).attr('data-href');
		if (b==null) return; else if (b=='') return; else go.p(event);
		trans.send({'t':1,'m':0,'u':b,'h':dom.id('header-m').dataset.id});
	},
	link: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.g(a,'href');
		if (b==null) return; else if (b=='') return; else go.p(event);
		trans.send({'t':1,'m':0,'u':b,'h':dom.id('header-m').dataset.id});
	},
	profileEmail: function() {
		go.loadInit(21);
	},
	profileAddress: function() {
		go.loadInit(10);
	},
	profileTime: null,
	profileAddrClear: function() {
		$("#bt1").addClass('__4t').removeAttr('onclick');
	},
	profileAddrTurn: function(a=0) {
		if (a==0) go.f(dom.id('bt1'),0); else go.f(dom.id('bt1'),1);
	},
	profileAddressRequest: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.st(a);
		clearTimeout(go.profileTime);
		if (b=="close") return;
		go.profileAddrTurn(0);
		dom.s(a,[['data-status','close']]);
		http.start({'s':11,'v':dom.v(a)}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (dom.id('cp'));
			go.profileAddrTurn(1);
			dom.s(a,[['data-status','open']]);
			c = http.txt(this);
			if (c.v!=dom.v(a)) return;
			$("#bt1").addClass('__4t').removeAttr('onclick');
			if (c.t==1||c.t==4) dom.i(dom.id('bt1').lastChild,lg.p11); else if (c.t==2) dom.i(dom.id('bt1').lastChild,lg.p12); else if (c.t==3) dom.i(dom.id('bt1').lastChild,lg.p13); else if (c.t==0) {
				dom.i(dom.id('bt1').lastChild,lg.p14);
				$("#bt1").removeClass('__4t').attr('onclick','return go.pAChange(this)').attr('data-status','open');
			}
		}
		go.profileAddrClear();
	},
	pAChange: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.st(a);
		if (b=='close') return; else dom.s(a,[['data-status','close']]);
		go.profileAddrTurn(0);
		http.start({'s':12,'v':dom.v(dom.id('cp'))}).onreadystatechange = function() {
			if (!http.st(this)) return;
			go.profileAddrTurn(1);
			dom.s(a,[['data-status','open']]);
			c = http.txt(this);
			dom.i(dom.id('__3h'),c.m);
			if (c.s==1) {
				go.profileAddrClear();
				dom.i(dom.id('bt1').lastChild,lg.p11);
				return;
			}
			$(".__6l").fadeIn(200);
			$("#url ,.__3x2").text(c.v);
			$("#bt1").addClass('__4t').removeAttr('onclick');
			dom.i(dom.id('bt1').lastChild,lg.p13);
		}
	},
	profileAddressChange: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		clearTimeout(go.profileTime);
		go.profileAddrClear();
		$(".__6l").fadeOut(200);
		if (dom.v(a)!='') {
			go.profileTime = setTimeout(function() {
			clearTimeout(go.profileTime);
			go.profileAddressRequest(a);
		},500);
		} else {
			dom.no(dom.id('bt1').firstChild);
			dom.bl(dom.i(dom.id('bt1').lastChild,lg.p13));
			dom.s(a,[['data-status','open']]);
		}
	},
	profileHome: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		load.start();
		http.start({'s':33}).onreadystatechange = function() {
			if (!http.st(this)) return; else load.con(http.txt(this));
			L.mapbox.accessToken = GLOBAL.p0;
			var map = L.mapbox.map('map', 'mapbox.streets').setView([40, -74.50], 15);
		}
	},
	profileSettings: function() {
		go.loadInit(5);
	},
	passwordSettings: function() {
		go.loadInit(8);
	},
	passwordChange: function(a,event) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (dom.st(a)=='close') return;
		b = {c:dom.v(dom.id('cp')),n:dom.v(dom.id('np')),v:dom.v(dom.id('vp'))};
		if (b.c=='') {
		dom.id('cp').focus();
		return;		
		} else if (b.n=='') {
		dom.id('np').focus();
		return;		
		} else if (b.v=='') {
		dom.id('vp').focus();
		return;		
		}
		dom.s(a,[["data-status","close"]]);
		go.profileAddrTurn(0);
		http.start({'s':9,'v':b}).onreadystatechange = function() {
			if (!http.st(this)) return; else if (!dom.id('cp')) return;
			if (dom.id('cp')) go.passAlert(http.txt(this));
			dom.s(a,[["data-status","open"]]);
			go.profileAddrTurn(1);
		}
	},
	alertTime: null,
	alert: function(a = '') {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		clearTimeout(go.alertTime);
		go.alertTime = setTimeout(function() {
			clearTimeout(go.alertTime);
			$("#__6e,#__6e_1,#__6e_2,#__6e_3").animate({opacity: 0},200);
		if (a==0) $("#__6e").animate({opacity: 1},200); else if (a==1) $("#__6e_1").animate({opacity: 1},200); else if (a==2) $("#__6e_2").animate({opacity: 1},200); else if (a==3) $("#__6e_3").animate({opacity: 1},200);
		},500);
	},
	passAlert: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (a!=4) go.alert(a); else if (a==4) {
			dom.bl(dom.id('p2'));
			dom.no(dom.id('p1'));
		}
	},
	eT: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.qs("data-s");
		c = b.length;
		e = [];
		for (d=0;d<c;d++) e[d] = b[d].dataset.id;
		http.start({'s':23,'v':e});
	},
	pS: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.qs("data-qp");
		c = b.length;
		e = [];
		for (d=0;d<c;d++) e[d] = b[d].dataset.id;
		http.start({'s':6,'v':e});
	},
	menuIt: function() {
		go.loadInit(4);
	},
	mS: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = dom.qs("data-qm");
		c = b.length;
		e = [[],[]];
		for (d=0;d<c;d++) {
			f = JSON.parse(b[d].dataset.qm);
			f[0] = b[d].dataset.id;
			e[0][d] = f;
		}
		g = dom.qs("data-rm");
		h = g.length;
		for (i=0;i<h;i++) {
			j = JSON.parse(g[i].dataset.rm);
			j[0] = g[i].dataset.id;
			e[1][i] = j;
		}
		http.start({'s':7,'v':e}).onreadystatechange = function() {
			if (!http.st(this)) return; else dom.i(dom.id('__3h'),this.responseText);
		}
	}
}
var http = {
imgUp: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		http.upload = http.ajax();
		http.upload.upload.addEventListener("progress",http.progressD,false);
		http.upload.addEventListener("load",http.imgUpReturn,false);
		http.upload.addEventListener("error",http.error,false);
		http.upload.addEventListener("abort",http.abort,false);
		http.upload.open("POST","//img.infalike.com");
		http.upload.send(a);
		$(".__26h").fadeIn(100);
	},
	imgUpReturn: function(a) {
		go.audio.plIcon(a.target);
		$(".__26h").fadeOut(100);
},
audioUp: function(a,c) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
$(".__14z0").fadeOut(100);
$(".__15h").fadeIn(100);
$(".__14v").removeAttr("onclick").css("opacity",1);
b = new FormData();
b.append("d",JSON.stringify(a));
b.append("a",c);
http.upload = http.ajax();
http.upload.upload.addEventListener("progress",http.progressD,false);
http.upload.addEventListener("load",http.loadA,false);
http.upload.addEventListener("error",http.error,false);
http.upload.addEventListener("abort",http.abort,false);
http.upload.open("POST","//au.infalike.com");
http.upload.send(b);
},
docUp: function(a,c) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
$(".__14z").fadeOut(100);
$(".__15h").fadeIn(100);
$(".__14v").removeAttr("onclick").css("opacity",1);
b = new FormData();
b.append("d",JSON.stringify(a));
b.append("f",c);
http.upload = http.ajax();
http.upload.upload.addEventListener("progress",http.progressD,false);
http.upload.addEventListener("load",http.loadD,false);
http.upload.addEventListener("error",http.error,false);
http.upload.addEventListener("abort",http.abort,false);
http.upload.open("POST","//doc.infalike.com");
http.upload.send(b);
},
loadA: function(a) {
go.audio.upR(a.target);
},
loadD: function(e) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
go.doc.upR(e.target);
},
progressD: function(e) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
b = parseInt((e.loaded/e.total)*100);
$(".__15i").text(b);
$(".__15l,.__26i").animate({width: b+"%"},100);
},
op: [],
up: function(a) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
/*
a[0] = [];
a[1] = [['name',file],['name',file],[name,file]];
a[2] = [method(0->img),(id inner percentage)];
*/
b = [a[0]];
b[1] = b[0].length;
b[3] = new FormData();
for (b[2]=0;b[2]<b[1];b[2]++) b[3].append(b[0][b[2]][0],b[0][b[2]][1]);
b[5] = a[1];
b[1] = b[5].length;
for (b[2]=0;b[2]<b[1];b[2]++) b[3].append(b[5][b[2]][0],b[5][b[2]][1]);
http.op = [a[2],b[3],a[2][3]];
http.ajaxUp();
},
upload: '',
ajaxUp: function() {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
http.upload = http.ajax();
http.upload.upload.addEventListener("progress",http.progress,false);
http.upload.addEventListener("load",http.load,false);
http.upload.addEventListener("error",http.error,false);
http.upload.addEventListener("abort",http.abort,false);
http.upload.open("POST","//img.infalike.com");
http.upload.send(http.op[1]);
},
progress: function(e) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
b = (e.loaded/e.total)*100;
if (b==100) {
$(http.op[0][1]).fadeOut(200);
$(http.op[2]).fadeIn(200);
} else $(http.op[0][1]).html(parseInt(b));
c = parseInt(((http.op[0][2][1]/100)*b));
$(http.op[0][2][0]).animate({width: (c<28?28:c)+"px"},100);
},
load: function(e) {
go.ajaxLoad(e.target);
},
error: function(e) {
console.log(JSON.stringify(e));
},
abort: function(e) {
go.ajaxAbort(e);
},
ajax: function() {
 try{
	return new XMLHttpRequest()
  }
  catch(e){
	try{
	  return new ActiveXObject('Msxml2.XMLHTTP')
	}
	catch(e){
	  try{
		return new ActiveXObject('Microsoft.XMLHTTP')
	  }
	  catch(e){
		return null;
	  }
	}
  }
},
cvStart: function(a) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
a = encodeURIComponent(JSON.stringify(a));
b = http.ajax();
b.open("POST","//img.infalike.com",true);
b.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
b.send("a="+a);
return b;
},
start: function(a) {
var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
a = encodeURIComponent(JSON.stringify(a));
b = http.ajax();
b.open("POST","/ajax.php",true);
b.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
b.send("a="+a);
return b;
},
st: function(a) {
	if (a.readyState==4&&a.status==200) return true; else return false;
},
txt: function(a) {
    return JSON.parse(a.responseText);
}
}
var dom = {//manipulating with html element
	ue: function(a) {
		return a.replace(/&amp;/g, "&").replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&quot;/g, "\"").replace(/&#039;/g, "'");
	},
	br: function(a) {
		return a.replace(/\r\n|\n|\r/g, '<br />');
	},
	comHex: function(a) {
		var b = a.toString(16);
		return b.length==1?"0"+b:b;
	},
	toHex: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,pq,r,s,t,u,v,w,x,y,z;
		b = a.replace('rgb(','').replace(')','').split(",");
		return "#" + ((1 << 24) + (parseInt(b[0].trim()) << 16) + (parseInt(b[1].trim()) << 8) + parseInt(b[2].trim())).toString(16).slice(1);
	},
	cls: function(a) {
		return document.getElementsByClassName(a);
	},
	l: function(a) {
		return a.childNodes.length;
	},
	client: function(a) {
		return [a.clientX,a.clientY];
	},
	eP: function(a) {
		return [a.getBoundingClientRect().left,a.getBoundingClientRect().top];
	},
	ins: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = dom.i(dom.e("div"),b);
		d = c.childNodes;
		e = d.length;
		for (f=0;f<e;f++) dom.ib(a,d[f]);
	},
	ib: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		a.insertBefore(b,a.firstChild);
	},
	api: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = dom.i(dom.e("div"),b);
		d = c.childNodes;
		e = d.length;
		for (f=0;f<e;f++) dom.c(a,d[f]);
		return a;
	},
	ri: function(a,b) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		c = dom.i(dom.e("div"),b).firstChild;
		b = a.parentNode;
		b.replaceChild(c,a);
	},
	rAll: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = a.length;
		for (c=0;c<b;c++) {
			d = a[c].parentNode;
			d.removeChild(a[c]);
		}
	},
	cl: function(a) {
		return document.getElementsByClassName(a);
	},
	str: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		return a.replace(/ {2,}/g,' ').replace(/[\n\r]{2,}/g,'\n\r');
	},
	qs: function(a) {
		return document.querySelectorAll("["+a+"]");
	},
	dd: function(a) {
		$("div .__4u, .__4f3").fadeOut(100);
		if (a.nextSibling) $(a.nextSibling).fadeToggle(100);
	},
	vw: function(a,b) {
		if (a.nextSibling) $(a.nextSibling).toggle(100);
	},
	g: function(a,b) {
		return a.getAttribute(b);
	},
	st: function(a) {
		return a.dataset.status;
	},
	no: function(a) {
		a.style.display = "none";
		return a;
	},
	bl: function(a) {
		a.style.display = "block";
		return a;
	},
	dF: function() {
		return window.document.createDocumentFragment();
	},
	e: function(a) {
		return window.document.createElement(a);
	},
	id: function(a) {
		return window.document.getElementById(a);
	},
	s: function(a,b) {
		for (c in b) a.setAttribute(b[c][0],b[c][1]);
		return a;
	},
	c: function(a,b) {
		a.appendChild(b);
		return a;
	},
	ih: function(a) {
		return a.innerHTML;
	},
	i: function(a,b) {
		a.innerHTML = b;
		return a;
	},
	r: function(a,b) {
		a.removeChild(b);
		return a;
	},
	rA: function(a,b) {
		a.removeAttribute(b);
		return a;
	},
	v: function(a) {
		return a.value.trim();
	},
	es: function(a) {
		return a.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
	},
	vl: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		b = a.length;
		for (c=0;c<b;c++) {
			d = dom.id(a[c]);
			if (d) {
				if (dom.v(d)!='') continue; else {
					d.focus();
					return false;
				}
			} else return false;
		}
		return true;
	}
}
start();
var load = {
	end: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		load.marginOff();
		if (a[2]==0) {
			b = dom.qs("data-edu-rdy");
			if (b.length==0) return;
			c = [b[a[0]],b[a[0]].childNodes.length];
			for (d=0;d<c[1];d++) if (b[0].childNodes[d].dataset.id==a[1]) dom.r(b[0],b[0].childNodes[d]);
		}
	},
	check: function() {
		if (dom.id("load-box")) {
			$(dom.id("box").lastChild).fadeOut(50);
			$(dom.id("box").lastChild.previousSibling).fadeIn(1);
			dom.r(dom.id("box"),dom.id("box").lastChild);
			if (go.strm!='') {
				var track = go.strm.getTracks()[0];
				track.stop();
			}
		} else load.marginOff();
	},
	change: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id("box")) return; else if (a.s==0) $(".__6l").fadeIn(50); else if (a.s==1) {
			dom.i(dom.id("box"),dom.ih(dom.id("box"))+a.html);
			$("#load-box").fadeOut(1);
			if (dom.id("_password")) $("#_password").animate({'opacity':1},50);
		}
	},
	init: function() {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		$(".__5w,#__5x").sortable({appendTo: document.body,stop: function() {
			go.mS();
		}
		});
	},
	con: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (!dom.id("load-box")) return; else dom.i(dom.s(dom.id("load-box"),[["style","background: white;"]]),a.html);
			b = dom.id("_box").clientHeight;
			c = (b-50)/2;
			d = (260-c)<30?230:c;
			$("#load-box").animate({width: a.w+"px",marginTop: "-="+d+"px",height: b+"px"},300,function() {
				$("#_box").animate({opacity: 1},100);
				$('.box-body').jScrollPane();
				load.init();
			});
			go.scrollVW();
	},
	start: function() {
		if (navigator.onLine) load.construct(); else load.destruct();
		load.marginOn();
	},
	marginOn: function() {
		dom.s(window.document.body,[['style','overflow-y: hidden;padding-right: 17px;']]);
		$(".__b").css("right","17px");
		$(".__c3").css("padding-right","17px");
	},
	construct: function(a = system.a2) {
		load.ct(a);
	},
	ct: function(a) {
		var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
		if (dom.id("box")) return; else a = dom.i(dom.s(dom.e("div"),[['class','_2a'],['id','box'],['ondblclick','return load.marginOff()'],["onscroll","return go.scroll();"]]),a);
		dom.c(document.body,a);
		$(a).fadeIn(100);
	},
	destruct: function() {
			load.ct(system.a1);
	},
	marginOff: function() {
		$(".__b").css("right","0");
		$(".__c3").css("padding-right","0");
			$("#box").fadeOut(1,function() {
				dom.r(window.document.body,dom.id("box"));
				dom.rA(window.document.body,'style');
			});
			if (go.strm!='') {
				var track = go.strm.getTracks()[0];
				track.stop();
			}
	},
}
var system = {
	a1: '<div class="_2i" onclick="return load.marginOff()"></div><div class="_2b" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_2h" onclick="return load.marginOff()"></div><div class="_2c">'+lg.p1+'</div><div class="_2d"><div class="_2e">'+lg.p2+'</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff()">'+lg.p3+'</div></div></div></div>',
	a2: '<div class="_2i" onclick="return load.marginOff()"></div><div class="_2j" id="load-box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"></div>'
}
function setCookie(name, value, options) {
  options = options || {};
  var expires = options.expires;
  if (typeof expires == "number" && expires) {
    var d = new Date();
    d.setTime(d.getTime() + expires * 1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) options.expires = expires.toUTCString();
  value = encodeURIComponent(value);
  var updatedCookie = name + "=" + value;
  for (var propName in options) {
    updatedCookie += "; " + propName;
    var propValue = options[propName];
    if (propValue !== true) updatedCookie += "=" + propValue;
  }
  document.cookie = updatedCookie;
}
function deleteCookie(name) {
  setCookie(name, "", {
    expires: -1
  })
}
