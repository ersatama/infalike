var dom = {
	ue: function(a) {
		return a.replace(/&amp;/g, "&").replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&quot;/g, "\"").replace(/&#039;/g, "'");
	},
	ap: function(a,b) {
		a.appendChild(b);
		return a;
	},
	c: function(a) {
		return document.createElement(a);
	},
	id: function(a) {
		return document.getElementById(a);
	},
	v: function(a) {
		return a.value;
	},
	ih: function(a,b) {
		a.innerHTML = b;
		return a;
	},
	i: function(a) {
		return a.innerHTML;
	},
	si: function(a,b) {
		a.innerHTML = b;
		return a;
	},
	s: function(a,b,c) {
		a.setAttribute(b,c);
		return a;
	},
	pid: function(a) {
		return window.parent.document.getElementById(a);
	}
}
var htmlExport = {
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
}
htmlExport.start();