<?php
class db {
public $sql = '';
public $a = '';
public $img = '';
function __construct() {
	$this->a = mysqli_connect('localhost','root','','infalike');
    mysqli_query($this->a,'set names utf8');
	$b = [$this->q("SELECT `".$GLOBALS['info'][2][31][4]."` FROM `".$GLOBALS['info'][2][31][0]."` WHERE `".$GLOBALS['info'][2][31][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][31][5]."`='0' ORDER BY `".$GLOBALS['info'][2][31][1]."` DESC LIMIT 1")];
	if ($this->n($b[0])!=0) $this->img = json_decode($this->f($b[0])[0]);
}
function q($a) {
	return mysqli_query($this->a,$a);
}
function c($a) {
    $b = mysqli_query($this->a,$a);
	$c = mysqli_fetch_row($b);
	return $c[0];
}
function n($a) {
    return mysqli_num_rows($a);
}
function f($a) {
	return mysqli_fetch_row($a);
}
function s($a) {
	return mysqli_real_escape_string($this->a,$a);
}
function p($a) {
	return md5($a);
}
}
$DB = new db();//create GLOBAL db var
$CLR = '';
$CNT = '';
if (isset($_SESSION['id'])) {
		$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][9][5]."` FROM `".$GLOBALS['info'][2][9][0]."` WHERE `".$GLOBALS['info'][2][9][1]."`='".$_SESSION['id']."' LIMIT 1"));
		if ($GLOBALS['DB']->n($b[0])!=0) {
			$b[1] = $GLOBALS['DB']->f($b[0])[0];
			$GLOBALS['info'][1]['lang'] = $b[1];
		} elseif (isset($_COOKIE['glang'])) $GLOBALS['info'][1]['lang'] = $_COOKIE['glang'];//setting language

} elseif (isset($_COOKIE['glang'])) $GLOBALS['info'][1]['lang'] = $_COOKIE['glang'];//setting language
$GLOBALS['info'][1]['ip'] = $_SERVER['REMOTE_ADDR'];
class login {
var $status = false;
var $url = '/';
function __construct() {
	$this->url = $GLOBALS['info'][13][0];
	if (isset($_SESSION['id'])) {
		$this->status = true;
	} elseif (isset($_COOKIE['a'])) {
		$_SESSION['id'] = urldecode($_COOKIE['a']);
		$this->status = true;
	}
}
function out() {
echo json_encode(array('v'=>$this->url,'s'=>$this->status));
}
function check($a) {
if (!$this->status) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][3][1]."`) FROM `".$GLOBALS['info'][2][3][0]."` WHERE `".$GLOBALS['info'][2][3][2]."`=INET_ATON('".$GLOBALS['info'][1]['ip']."') AND `".$GLOBALS['info'][2][3][4]."` BETWEEN TIMESTAMPADD(SECOND, -10, NOW()) AND NOW()");
if ($b!=0) {
	$GLOBALS['DB']->q('START TRANSACTION');
	$GLOBALS['DB']->q('INSERT INTO `'.$GLOBALS['info'][1][0][0].'` values(NULL,0,now())');
	$GLOBALS['DB']->q('UPDATE `'.$GLOBALS['info'][1][0][0].'` SET `'.$GLOBALS['info'][1][0][2].'`=INET_ATON(\''.$GLOBALS['info'][1]['ip'].'\') ORDER BY `'.$GLOBALS['info'][1][0][1].'` DESC LIMIT 1');
	$GLOBALS['DB']->q('COMMIT');
} else {
	$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][1]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][4]."`='".$GLOBALS['DB']->p($a['pw'])."' AND (`".$GLOBALS['info'][2][1][2]."`='".$GLOBALS['DB']->s($a['lg'])."' OR `".$GLOBALS['info'][2][1][3]."`='".$GLOBALS['DB']->s($a['lg'])."') LIMIT 1"));
	$b[1] = $GLOBALS['DB']->n($b[0]);
	if ($b[1]!=0) {
	$b[2] = $GLOBALS['DB']->f($b[0]);
		$this->url = '/feed';
		$_SESSION['id'] = $b[2][0];
		$_SESSION['alias'] = 'Anonymous2743';
	} else $this->url = '/?login='.$a['lg'];
}
}
}
function init($a) {
$this->check($a);
$this->out($a);
}
}
function head($a = [0]) {
if (!$_SESSION['id']) {
if ($a[0]==0) {
return '<div class="__b" id="header-m" data-id="0"><div class="__c"><a onclick="return go.link(this,event)" href="/"><div class="__d"></div></a><div class="search"><div class="s-i"></div><input type="text" class="s-in" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][49].'"></div><div class="__e"><div class="__3f"><div class="__f"></div></div><div class="__g"><div class="__h" onclick="return _lang.change()">'.$GLOBALS['info'][3][$GLOBALS['info'][1]['lang']].'</div></div><div class="__g"><div class="__h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][39].'</div></div></div></div></div><div class="__a"><div id="v-option"></div></div>';	
} else {




}
} else {
if ($a['h']==1) {
return '';
} else {
if (is_array($GLOBALS['DB']->img)) $b = '<img class="photo" src="'.$GLOBALS['DB']->img[5][2].'" width="60" height="60">'; 
return '<div class="__b" id="header-m" data-id="1"><div class="__c"><div class="__d"></div><div class="search"><div class="s-i"></div><input type="text" class="s-in" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][49].'"></div><div class="__3c"><a href="/edit" class="no-link" onclick="return go.link(this,event)"><div class="__3d" data-qi="'.$_SESSION['id'].'" data-ti="3" data-w="26" data-h="26">'.(is_array($GLOBALS['DB']->img)?'<img class="photo" src="'.$GLOBALS['DB']->img[5][2].'" width="26" height="26">':'<div class="__3e"></div>').'</div></a></div><div id="audio-list" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__8h0" onclick="return go.audio.menu();"><div class="__8h"></div></div>
<div class="__18l" onselectstart="return false;" onclick="return go.audio.menu();"><div class="__18m"><div class="__18o" onclick="return go.audio.prev(go.stop(event));"><div class="__18p"><div class="__18q"></div></div></div><div class="__18o" id="__18o" onclick="return go.audio.play(go.stop(event));"><div class="__18r __18s"></div></div><div class="__18o" onclick="return go.audio.next(go.stop(event));"><div class="__18p __18u"><div class="__18t"></div></div></div></div><div class="__18n"></div></div>
<div class="__21q"><div class="__7a" id="__7a" style="margin-left: 200px;"><div class="__7b"></div></div>
<script>go.audio.start();</script>
<div class="__21r"><div class="__21s"></div></div></div>
</div><div class="__e"><div class="__3f" onclick="return login.out()"><div class="__3a"></div></div><div class="__3f" onclick="return go.viewMenuOption()" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__f"></div></div><div class="__3f"><div class="__3b"></div></div><div class="__g"><div class="__h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][73].'</div></div><div class="__g"><div class="__h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][71].'</div></div><div class="__g"><div class="__h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][72].'</div></div></div><div class="__6x" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false"><div class="__7a"><div class="__7b"></div></div><div class="__6y"><div class="__4y __6z">Advertising</div><div class="__4y __6z">Lists</div><div class="__4y __6z">Language</div><a href="/settings" class="no-link" onclick="return go.link(this,event)"><div class="__4y __6z">Settings</div></a><a href="/edit" class="no-link" onclick="return go.link(this,event)"><div class="__4y __6z">Edit</div></a><div class="__4y __6z">Help</div><div class="__4y __6z">Calendar<span class="__7c">96</span></div></div><div class="__6y"><div class="__4y __6z">Keyboard</div><div class="__4y __6z">Shortcuts</div></div><div class="__6y"><div class="__4y __6z">Infalike Group</div><div class="__4y __6z">Er Adam</div></div></div></div></div><div class="__c2"><div class="__c3"><div class="__c1" id="a" onmouseover="return go.hideMe(this)"></div></div></div><div class="__a"><div id="v-option"></div></div>';
}
}

}
function footer() {
$a = '';
$b = date("Y");
foreach ($GLOBALS['info'][10] as $k=>$v) {
$a .= '<a href="/'.$GLOBALS['info'][11][$k].'" class="no-link" onclick="return go.link(this,event)"><span class="op-1">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v].'</span></a>';
}
$a .= '<span class="op-2">© '.$b.' Infalike</span>';
return '<div class="footer">'.$a.'</div>';
}


function meta($a = array()) {
$e = '<link rel="shortcut icon" href="/sources/favicon.ico">';
if (isset($_SESSION['id'])) {
$c = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][9][2]."` FROM `".$GLOBALS['info'][2][9][0]."` WHERE `".$GLOBALS['info'][2][9][1]."`='".$_SESSION['id']."' LIMIT 1");
if ($GLOBALS['DB']->n($c)!=0) {
$d = $GLOBALS['DB']->f($c)[0];
if ($d==1) {
$e = '<link rel="shortcut icon" href="/sources/sky_favicon.ico">';
} else if ($d==2) {
$e = '<link rel="shortcut icon" href="/sources/favicon.ico">';
} else if ($d==3) {
$e = '<link rel="shortcut icon" href="/sources/favicon.ico">';
} else if ($d==4) {
$e = '<link rel="shortcut icon" href="/sources/favicon.ico">';
} else if ($d==5) {
$e = '<link rel="shortcut icon" href="/sources/favicon.ico">';
} else if ($d==6) {
$e = '<link rel="shortcut icon" href="/sources/favicon.ico">';
}
}
}
return '<meta charset="utf-8"><meta name="referrer" content="origin-when-crossorigin" id="meta_referrer">'.$e;
}
function css($a = array()) {
$b = '<link rel="stylesheet" href="/styles/main.css">';
foreach ($a as $k=>$v) $b .= $GLOBALS['info'][8][$v];
$b .= '<!--[if IE]><style>._i {width: 450px;} ._k {width: 450px;}</style><![endif]-->';
if (isset($_SESSION['id'])) {
$c = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][9][2]."` FROM `".$GLOBALS['info'][2][9][0]."` WHERE `".$GLOBALS['info'][2][9][1]."`='".$_SESSION['id']."' LIMIT 1");
if ($GLOBALS['DB']->n($c)!=0) {
$d = $GLOBALS['DB']->f($c)[0];
if ($d==1) {
$b .= '<link rel="stylesheet" href="/styles/1.css">';
} else if ($d==2) {
$b .= '<link rel="stylesheet" href="/styles/2.css">';
} else if ($d==3) {
$b .= '<link rel="stylesheet" href="/styles/3.css">';
} else if ($d==4) {
$b .= '<link rel="stylesheet" href="/styles/4.css">';
} else if ($d==5) {
$b .= '<link rel="stylesheet" href="/styles/5.css">';
} else if ($d==6) {
$b .= '<link rel="stylesheet" href="/styles/6.css">';
}
}
}
return $b;
}
function js($a = array()) {
$b = '<noscript><meta http-equiv="refresh" content="0; URL=/badjs"></noscript>'.langScript().'<script src="/js/jq.js"></script><script src="/js/scroll.js"></script><script src="/js/glang.js"></script><script src="/js/transport.js"></script>';
foreach ($a as $k=>$v) $b .= $GLOBALS['info'][9][$v];
return $b;
}
class browser {
	function browserURL() {
		$a = '<div class="_i">';
		$b = '<div class="_k">';
		foreach ($GLOBALS['info'][7] as $k=>$v) {
			$a .= '<a href="'.$v[1].'" target="_blank" class="_j '.$v[0].'"></a>';
			$b .= '<a href="'.$v[1].'" target="_blank" class="_l">'.$v[0].'</a>';
		}
		$a .= '</div>';
		$b .= '</div>';
		return $a.$b;
	}
	function browserAbort() {
		echo '<!DOCTYPE html><html><head><title>'.$GLOBALS['info'][4][$GLOBALS['info'][1]['lang']][7].'</title>'.meta().css([0=>0,1=>1]).js().'<!--[if IE]><style>._i {width: 450px;} ._k {width: 450px;}</style><![endif]--></head><body><div class="_g"><div class="_h">'.$GLOBALS['info'][4][$GLOBALS['info'][1]['lang']][8].'</div>'.$this->browserURL().'<div class="_d">'.checkLang().'</div></div></body></html>';
		exit();
	}
	function browserVersion($a) {
		preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $a, $b); // регулярное выражение, которое позволяет отпределить 90% браузеров
		list(,$c,$d) = $b; //получаем данные из массива в переменную
		/*
		Google Chrome (начиная с версии 4.0.249.0);
		Apple Safari (начиная с версии 5.0.7533.16);
		Mozilla Firefox (начиная с версии 4);
		Opera (начиная с версии 10.70 9067);
		Internet Explorer (начиная с версии 10);
		*/
		$e = explode('.',$d);
		if ($c=='Chrome') if ($e[0]<4) $this->browserAbort(); elseif($c=='Opera') if ($e[0]<10) $this->browserAbort(); elseif ($c=='MSIE') if ($e[0]<10) $this->browserAbort(); elseif ($c=='Firefox') if ($e[0]<4) $this->browserAbort(); elseif ($c=='Safari') if ($e[0]<5) $this->browserAbort();
	}
function __construct() {
$a = $_SERVER['HTTP_USER_AGENT'];
$b = strpos($a, 'Chrome')!==false?'Chrome':(strpos($a,'Firefox')!==false?'Firefox':(strpos($a,'Opera')!==false?'Opera':(strpos($a,'Safari')!==false?'Safari':false)));
if (!$b) $this->browserAbort();
$this->browserVersion($a);  
}
}
class start {//main class that creates first time
function __construct() {
	$a = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][0][1]."`) FROM `".$GLOBALS['info'][2][0][0]."` WHERE `".$GLOBALS['info'][2][0][2]."`=INET_ATON('".$GLOBALS['info'][1]['ip']."') AND `".$GLOBALS['info'][2][0][4]."`='0' AND `".$GLOBALS['info'][2][0][3]."` >= DATE(NOW()) - INTERVAL 7 DAY ORDER BY `".$GLOBALS['info'][2][0][1]."` DESC LIMIT 1");//checking ip address in database
	if ($a!=0) $GLOBALS['info'][1]['status'] = 1;//set status blocked ip address
	$this->check();//checking for ip address
	$this->url();//checking for url
   }
   function check() {
	   if ($GLOBALS['info'][1]['status']==1) {
		   echo '<!DOCTYPE html><html><head><title>'.$GLOBALS['info'][4][$GLOBALS['info'][1]['lang']][6].'</title>'.meta().css([0=>0,1=>1]).js().'</head><body><div class="_a"><div class="_f"></div><div class="_c">'.$GLOBALS['info'][4][$GLOBALS['info'][1]['lang']][4].'</div><div class="_b">'.$GLOBALS['info'][4][$GLOBALS['info'][1]['lang']][5].'</div><div class="_d">'.checkLang().'</div></div></body></html>';
		   exit();
	   }
   }
   function url() {
	   $a = $_SERVER['REQUEST_URI'];
	   $b = substr($a,1);
	   $GLOBALS['info'][1]['url'] = $b;
   }
}
function checkLang() {
	   $b = date("Y");
	   $a = '© '.$b.' infalike • ';
	   if (isset($_COOKIE['glang'])) $a .= '<span class="_e" onclick="return _lang.change()">'.$GLOBALS['info'][3][$_COOKIE['glang']].'</span>'; else  $a .= '<span class="_e" onclick="return _lang.change()">'.$GLOBALS['info'][3][0].'</span>';
	   return $a;
}
class alertBox {
function saveEventTypes($a) {
	$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][13][1]."`) FROM `".$GLOBALS['info'][2][13][0]."` WHERE `".$GLOBALS['info'][2][13][1]."`='".$_SESSION['id']."' LIMIT 1");
	if ($b!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][13][0]."` SET `".$GLOBALS['info'][2][13][2]."`='".$a[0]."',`".$GLOBALS['info'][2][13][3]."`='".$a[1]."',`".$GLOBALS['info'][2][13][4]."`='".$a[2]."',`".$GLOBALS['info'][2][13][5]."`='".$a[3]."',`".$GLOBALS['info'][2][13][6]."`='".$a[4]."',`".$GLOBALS['info'][2][13][7]."`='".$a[5]."',`".$GLOBALS['info'][2][13][8]."`='".$a[6]."',`".$GLOBALS['info'][2][13][9]."`='".$a[7]."',`".$GLOBALS['info'][2][13][10]."`='".$a[8]."',`".$GLOBALS['info'][2][13][11]."`='".$a[9]."',`".$GLOBALS['info'][2][13][12]."`='".$a[10]."' WHERE `".$GLOBALS['info'][2][7][1]."`='".$_SESSION['id']."'"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][13][0]."` VALUES(".$_SESSION['id'].",'".$a[0]."','".$a[1]."','".$a[2]."','".$a[3]."','".$a[4]."','".$a[5]."','".$a[6]."','".$a[7]."','".$a[8]."','".$a[9]."','".$a[10]."')");
}
function saveProfileSettings($a) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][7][1]."`) FROM `".$GLOBALS['info'][2][7][0]."` WHERE `".$GLOBALS['info'][2][7][2]."`='".$_SESSION['id']."' LIMIT 1");
if ($b!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][7][0]."` SET `".$GLOBALS['info'][2][7][3]."`='".$a[0]."',`".$GLOBALS['info'][2][7][4]."`='".$a[1]."',`".$GLOBALS['info'][2][7][5]."`='".$a[2]."',`".$GLOBALS['info'][2][7][6]."`='".$a[3]."',`".$GLOBALS['info'][2][7][7]."`='".$a[4]."',`".$GLOBALS['info'][2][7][8]."`='".$a[5]."',`".$GLOBALS['info'][2][7][9]."`='".$a[6]."',`".$GLOBALS['info'][2][7][10]."`='".$a[7]."',`".$GLOBALS['info'][2][7][11]."`='".$a[8]."' WHERE `".$GLOBALS['info'][2][7][2]."`='".$_SESSION['id']."'"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][7][0]."` VALUES(NULL,".$_SESSION['id'].",'".$a[0]."','".$a[1]."','".$a[2]."','".$a[3]."','".$a[4]."','".$a[5]."','".$a[6]."','".$a[7]."','".$a[8]."')");
}
function changeLanguage($a) {
		setcookie("glang", $a, time()+604800);
		$GLOBALS['info'][1]['lang'] = $a;
}
function langList() {
	$a = '';
	$b = 0;
	foreach ($GLOBALS['info'][3] as $k=>$v) {
		$a .= '<div class="_m3 '.($b==$GLOBALS['info'][1]['lang']?'_m6':'').'" '.($b==$GLOBALS['info'][1]['lang']?'':'onclick="return _lang.langSel('.$b.')"').'><div class="_m4">'.$v.'</div><div class="_m5">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$b].'</div></div>';
		$b++;
	}
	return $a;
}
function language() {
echo json_encode(array('w'=>550,'html'=>'<div class="_box" id="_box"><div class="_m2" onclick="return load.marginOff()"></div><div class="_m1">'.$GLOBALS['info'][4][$GLOBALS['info'][1]['lang']][3].'</div><div class="box-body-out"><div class="box-body">'.$this->langList().'</div></div></div>'));
}
function saveMenuLeft($a) {
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][8][1]."`) FROM `".$GLOBALS['info'][2][8][0]."` WHERE `".$GLOBALS['info'][2][8][2]."`='".$_SESSION['id']."' LIMIT 1"),1=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][2]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$_SESSION['id']."' LIMIT 1"));
$b[2] = $GLOBALS['DB']->f($b[1])[0];
if ($b[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][8][0]."` SET `".$GLOBALS['info'][2][8][3]."`='".$GLOBALS['DB']->s(json_encode($a))."' WHERE `".$GLOBALS['info'][2][8][2]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][8][0]."` VALUES(NULL,".$_SESSION['id'].",'".$GLOBALS['DB']->s(json_encode($a))."')");
$c = '';
$h = true;
foreach ($a as $d=>$e) {
foreach ($e as $f=>$g) {
if ($g[0]!=1) {
if ($d==1&&$h) {
$c .= '<div class="__3k"></div>';
$h = false;
}
$c .= '<a href="'.menuIdCheck($g[3],$b[2]).'" class="no-link" onclick="return go.link(this,event)"><div class="__3j">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$g[2]].'</div></a>';
}
}
}
echo $c;
}
function menuLeft() {
$b = '';
$c = $GLOBALS['info'][18][1];
$d = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][8][3]."` FROM `".$GLOBALS['info'][2][8][0]."` WHERE `".$GLOBALS['info'][2][8][2]."`='".$_SESSION['id']."' LIMIT 1"));
$d[1] = $GLOBALS['DB']->n($d[0]);
if ($d[1]!=0) {
$d[2] = $GLOBALS['DB']->f($d[0]);
$c = json_decode($d[2][0],true);
}
foreach ($c as $k=>$v) {
if ($k==0) {
$w = '<div id="__5x">';
$x = '';
foreach ($v as $g=>$h) if ($h[1]==1) $x .= '<div class="__5f invisible"><div class="__5g"><div class="__5j '.($g==0?'':($g==1?'__5k':($g==2?'__5l':'__5m'))).'"></div></div><div class="__5h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$h[2]].'</div><div class="__5i __5v"><div class="__5t"  data-id="0" data-qm="'.htmlentities(json_encode($h, JSON_FORCE_OBJECT)).'"><div class="__5u"></div></div></div></div>'; else $w .= '<div class="__5f"><div class="__5g"><div class="__5j '.($g==4?'__5n':($g==5?'__5o':($g==6?'__5z':'__5p'))).'"></div></div><div class="__5h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$h[2]].'</div><div class="__5i">'.($h[0]==0?'<div class="__5t" onclick="return go.init({f:\'go.mS\'},this)" data-id="0" data-qm="'.htmlentities(json_encode($h, JSON_FORCE_OBJECT)).'"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.mS\'},this)" data-id="1" data-qm="'.htmlentities(json_encode($h, JSON_FORCE_OBJECT)).'"><div class="__5u __5y"></div></div>').'</div></div>';
$w .= '</div>';
$b .= '<div class="__5e">'.$x.$w.'</div>';
} else {
if ($l==0) $b .= '<div class="__5w">';
foreach ($v as $l=>$u) $b .= '<div class="__5f"><div class="__5g"><div class="__5j '.($l==0?'__5q':($l==1?'__5r':'__5s')).'"></div></div><div class="__5h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$u[2]].'</div><div class="__5i">'.($u[0]==0?'<div class="__5t" onclick="return go.init({f:\'go.mS\'},this)" data-id="0" data-rm="'.htmlentities(json_encode($u, JSON_FORCE_OBJECT)).'"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.mS\'},this)" data-id="1" data-rm="'.htmlentities(json_encode($u, JSON_FORCE_OBJECT)).'"><div class="__5u __5y"></div></div>').'</div></div>';
if ($l==0) $b .= '</div>';
}
}
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c" id="_box" ><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Menu settings</div><div class="box-body-out">'.$b.'</div></div>')));
}
function notifications($b) {
$a = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][14][1]."`) FROM `".$GLOBALS['info'][2][14][0]."` WHERE `".$GLOBALS['info'][2][14][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($a[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][14][0]."` SET `".$GLOBALS['info'][2][14][2]."`='".$b[0]."',`".$GLOBALS['info'][2][14][3]."`='".$b[1]."',`".$GLOBALS['info'][2][14][4]."`='".$b[2]."' WHERE `".$GLOBALS['info'][2][14][1]."`='".$_SESSION['id']."'"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][14][0]."` VALUES(".$_SESSION['id'].",'".$b[0]."','".$b[1]."','".$b[2]."')");
}
function secureQS($a) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][15][1]."`) FROM `".$GLOBALS['info'][2][15][0]."` WHERE `".$GLOBALS['info'][2][15][1]."`='".$_SESSION['id']."' LIMIT 1");
if ($b!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][15][0]."` SET `".$GLOBALS['info'][2][15][2]."`='".$GLOBALS['info'][1]['lang']."',`".$GLOBALS['info'][2][15][3]."`='".$a[0][0]."',`".$GLOBALS['info'][2][15][4]."`='".$GLOBALS['DB']->s($a[0][1])."',`".$GLOBALS['info'][2][15][6]."`='".$a[1][0]."',`".$GLOBALS['info'][2][15][7]."`='".$GLOBALS['DB']->s($a[1][1])."',`".$GLOBALS['info'][2][15][6]."`='".$a[2][0]."',`".$GLOBALS['info'][2][15][7]."`='".$GLOBALS['DB']->s($a[2][1])."' WHERE `".$GLOBALS['info'][2][15][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][15][0]."` VALUES(".$_SESSION['id'].",".$GLOBALS['info'][1]['lang'].",".$a[0][0].",'".$GLOBALS['DB']->s($a[0][1])."',".$a[1][0].",'".$GLOBALS['DB']->s($a[1][1])."',".$a[2][0].",'".$GLOBALS['DB']->s($a[2][1])."',now())");
}
function secureQC($a) {
$b = secureQLIST($a);
exit('<div class="__6b"><input type="text" class="__4f __6c __6c1" placeholder="'.$b[0][1].'" title="'.$b[0][1].'" maxlength="300" data-q="0" value="" data-id="'.$b[0][0].'"></div><div class="__6b"><input type="text" class="__4f __6c __6c1" placeholder="'.$b[1][1].'" title="'.$b[1][1].'" maxlength="300" data-q="1" value="" data-id="'.$b[1][0].'"></div><div class="__6b"><input type="text" class="__4f __6c __6c1" placeholder="'.$b[2][1].'" title="'.$b[2][1].'" maxlength="300" data-q="2" value="" data-id="'.$b[2][0].'"></div>');
}
function secureC($b) {
$a = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1"));
$a[1] = array('s'=>1);
if ($GLOBALS['DB']->n($a[0])!=0) {
$a[2] = $GLOBALS['DB']->f($a[0])[0];
if (md5($b)==$a[2]) {
$a[1]['s'] = 0;
$a[3] = secureQLIST([]);
$a[1]['html'] = '<div class="_box __5c _box-pass" id="_bv" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__8t" onclick="return go.updateQ()"></div><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Security questions</div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Эти вопросы и ваши ответы будут использованы при сбросе или восстановлении вашего пароля. Если вы хотите сменить вопросы нажмите на значок замка сверху.</div><div id="refresh-list"><div class="__6b"><input type="text" class="__4f __6c __6c1" placeholder="'.$a[3][0][1].'" title="'.$a[3][0][1].'" maxlength="300" data-q="0" value="" data-id="'.$a[3][0][0].'"></div><div class="__6b"><input type="text" class="__4f __6c __6c1" placeholder="'.$a[3][1][1].'" title="'.$a[3][1][1].'" maxlength="300" data-q="1" value="" data-id="'.$a[3][1][0].'"></div><div class="__6b"><input type="text" class="__4f __6c __6c1" placeholder="'.$a[3][2][1].'" title="'.$a[3][2][1].'" maxlength="300" data-q="2" value="" data-id="'.$a[3][2][0].'"></div></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.securityQS(this)" data-status="open"><div class="lg-1"></div><span>Save changes</span></button></div></div></div>';
}
}
exit(json_encode($a[1]));
}
function stickerList($e) {
$a = '';
$b = $GLOBALS['info'][39];
$c = sizeof($b);
$f = ($c-$e)<30?$c:($e+30);
for ($d=$e;$d<$f;$d++) $a .= '<div class="__11q" style="background-image: url('.$b[$d][1].')" onclick="return go.cv.sticker(this,event,[\''.$b[$d][0].'\',\''.$b[$d][1].'\',100,100])"></div>';
echo json_encode(array(0=>$a));	
}
function profilePictureF($a) {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][27][0]."`.`".$GLOBALS['info'][2][27][2]."` FROM `".$GLOBALS['info'][2][27][0]."`,`".$GLOBALS['info'][2][28][0]."` WHERE `".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][1]."`='".$a[0]."' AND `".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][3]."`='".$a[1]."' AND `".$GLOBALS['info'][2][27][0]."`.`".$GLOBALS['info'][2][27][1]."`=`".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][2]."` AND `".$GLOBALS['info'][2][27][0]."`.`".$GLOBALS['info'][2][27][6]."`='0' AND `".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][7]."`='0' ORDER BY `".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][1]."` DESC LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = json_decode($GLOBALS['DB']->f($b[0])[0],true);
$b[2] = array(0=>$b[1]['o'][0],1=>$b[1]['o'][1],2=>((668-$b[1]['o'][0])/2),3=>((430-$b[1]['o'][1])/2));
if ($b[1]['o'][0]>$b[1]['o'][1]) {
if ($b[1]['o'][0]>668) {
if (floor(($b[1]['o'][1]/100)*((668/$b[1]['o'][0])*100))>420) {
$b[2][0] = floor(($b[1]['o'][0]/100)*((420/$b[1]['o'][1])*100));
$b[2][1] = 420;
$b[2][2] = (668-$b[2][0])/2;
$b[2][3] = 5;
} else {
$b[2] = array(0=>668,1=>floor(($b[1]['o'][1]/100)*((668/$b[1]['o'][0])*100)),2=>5);
$b[2][3] = (430-$b[2][1])/2;
}
} else if (floor(($b[1]['o'][1]/100)*((668/$b[1]['o'][0])*100))>420) {
$b[2][0] = floor(($b[1]['o'][0]/100)*((420/$b[1]['o'][1])*100));
$b[2][1] = 420;
$b[2][2] = (668-$b[2][0])/2;
$b[2][3] = 5;	
}
} else if ($b[1]['o'][0]<$b[1]['o'][1]) {
$b[2][0] = floor(($b[1]['o'][0]/100)*((420/$b[1]['o'][1])*100));
$b[2][1] = 420;
$b[2][2] = (668-$b[2][0])/2;
$b[2][3] = 5;
} else if ($b[1]['o'][1]>420) $b[2] = array(0=>420,1=>420,3=>98,4=>10);



/*
Array ( [m] => Array ( [0] => 200 [1] => 355 [2] => http://img.infalike.com/view/05db/872c/i0/05db872c9f5c5a3afd970d6251f64c95.jpeg ) [o] => Array ( [0] => 1080 [1] => 1920 [2] => http://img.infalike.com/view/05db/872c/i3/05db872c9f5c5a3afd970d6251f64c95.jpeg ) [n] => Array ( [0] => 750 [1] => 1333 [2] => http://img.infalike.com/view/05db/872c/i1/05db872c9f5c5a3afd970d6251f64c95.jpeg ) [l] => Array ( [0] => 1000 [1] => 1777 [2] => http://img.infalike.com/view/05db/872c/i2/05db872c9f5c5a3afd970d6251f64c95.jpeg ) )
*/

/*
<div class="__4w __10h">   <div class="ft filter-2 invisible">Times new roman</div><div class="ft filter-3 invisible"></div><div class="ft filter-4 invisible"></div></div>

<div class="ft filter-1"><div class="__10h1 __10n __10h3" onclick="return go.filterChange(0,this);"><div class="__10h2">Original</div></div><div class="__10h1 __10p" onclick="return go.filterChange(7,this);"><div class="__10h2 black">Sepia</div></div><div class="__10h1 __10u" onclick="return go.filterChange(6,this);"><div class="__10h2 black">Black & White</div></div><div class="__10h1 __10o" onclick="return go.filterChange(2,this);"><div class="__10h2">Negative</div></div><div class="__10h1 __10q" onclick="return go.filterChange(1,this);"><div class="__10h2">Grey</div></div><div class="__10h1 __10r" onclick="return go.filterChange(3,this);"><div class="__10h2">Blue</div></div><div class="__10h1 __10s" onclick="return go.filterChange(4,this);"><div class="__10h2">Orange</div></div><div class="__10h1 __10t" onclick="return go.filterChange(5 ,this);"><div class="__10h2">Green</div></div></div>

<div class="__10w"><div class="__10w1"></div></div>


*/
echo '<div class="__10f"><div class="__10g"> 
<div class="__10h"><div class="__10v" onclick="return go.changeFilter(this,0)"><div class="__10x"><div class="__10x1"></div></div><div class="__11d">Фильтры</div><div class="__11e"></div></div><div class="__10v" onclick="return go.changeFilter(this,1)"><div class="__10y"></div><div class="__11d">Текст</div><div class="__11e"></div></div><div class="__10v" onclick="return go.changeFilter(this,2)"><div class="__10y1"></div><div class="__11d">Стикеры</div><div class="__11e"></div></div><div class="__10v" onclick="return go.changeFilter(this,3)"><div class="__10y2"></div><div class="__11d">Эффекты</div><div class="__11e"></div></div><div class="__10v" onclick="return go.changeFilter(this,5)"><div class="__10y3"></div><div class="__11d">Рисовать</div><div class="__11e"></div></div></div><div class="__4w __10w" onscroll="return go.cv.update(this)"><div class="__10w1" data-id="0"><div class="__10v" onclick="return go.filterBack(this)"><div class="__11e __11f"></div><div class="__11d __11d1">Назад</div></div><div class="ft filter-1"><div class="__10h1 __10n __10h3" onclick="return go.filterChange(0,this);"><div class="__10h2">Original</div></div><div class="__10h1 __10p" onclick="return go.filterChange(7,this);"><div class="__10h2">Sepia</div></div><div class="__10h1 __10u" onclick="return go.filterChange(6,this);"><div class="__10h2">Black & White</div></div><div class="__10h1 __10o" onclick="return go.filterChange(2,this);"><div class="__10h2">Negative</div></div><div class="__10h1 __10q" onclick="return go.filterChange(1,this);"><div class="__10h2">Grey</div></div><div class="__10h1 __10r" onclick="return go.filterChange(3,this);"><div class="__10h2">Blue</div></div><div class="__10h1 __10s" onclick="return go.filterChange(4,this);"><div class="__10h2">Orange</div></div><div class="__10h1 __10t" onclick="return go.filterChange(5 ,this);"><div class="__10h2">Green</div></div></div></div><div class="__10w1 invisible" data-id="1"><div class="__10v" onclick="return go.filterBack(this)"><div class="__11e __11f"></div><div class="__11d __11d1">Назад</div></div>
<div onmousedown="event.stopPropagation?event.stopPropagation():(event.cancelBubble=true);">
<div class="__11g" onclick="return go.cv.addTxt()"><div class="__11h"></div><div class="__11i">Добавить текст</div></div>
<div class="__11l">Шрифт</div>
<div class="__11j" id="txt-cv" data-f="go.cv.ffChange" data-id="0"><div class="__11m __11k" onclick="return go.cv.sel(0,this)">Arial</div><div class="__11m" onclick="return go.cv.sel(1,this)" style="font-family: Impact;">IMPACT</div><div class="__11m" onclick="return go.cv.sel(2,this)" style="font-family: courier;">Courie</div><div class="__11m" onclick="return go.cv.sel(3,this)" style="font-family: lobster;">Lobsterr</div></div>
<div class="__11l">Цвет</div>
<div class="__11j __11n" id="color-cv" data-f="go.cv.clrChange" data-id="7"><div class="__11o __11o1" style="background: #FF9300" style="background: white" onclick="return go.cv.txtClr(0,this)" data-id="0"></div><div class="__11o __11o1" style="background: #FFCB00" style="background: white" onclick="return go.cv.txtClr(1,this)" data-id="1"></div><div class="__11o __11o1" style="background: #00AEF9" style="background: white" onclick="return go.cv.txtClr(2,this)" data-id="2"></div><div class="__11o __11o1" style="background: #62DA37" style="background: white" onclick="return go.cv.txtClr(3,this)" data-id="3"></div><div class="__11o __11o1" style="background: #CC74E1" style="background: white" onclick="return go.cv.txtClr(4,this)" data-id="4"></div><div class="__11o __11o1" style="background: #E64646" style="background: white" onclick="return go.cv.txtClr(5,this)" data-id="5"></div><div class="__11o __11o1" style="background: black" style="background: white" onclick="return go.cv.txtClr(6,this)" data-id="6"></div><div class="__11o __11o1 __11p" style="background: white" onclick="return go.cv.txtClr(7,this)" data-id="7"></div></div>
<div class="__11l">Размер</div>
<div class="__11b" id="size-cv" data-id="50" data-f="go.cv.txtsz" onmousedown="return go.cv.pt(this,event)" onselectstart="return false"><div class="__11c"></div></div>
</div>
</div><div class="__10w1" data-id="2">
<div class="__10v" onclick="return go.filterBack(this)"><div class="__11e __11f"></div><div class="__11d __11d1">Назад</div></div><div id="st-l">'.stickerList(50).'</div></div><div class="__10w1" data-id="3">
<div class="__10v" onclick="return go.filterBack(this)"><div class="__11e __11f"></div><div class="__11d __11d1">Назад</div></div>

<div class="__11j" id="effect-cv" data-f="go.cv.efChange" style="margin-top: 10px;" data-id="0"><div class="__11m __11k" onclick="return go.cv.sel(0,this)">Normal</div><div class="__11m" onclick="return go.cv.sel(1,this)">Low poly</div><div class="__11m" onclick="return go.cv.sel(2,this)">Mirror</div><div class="__11m" onclick="return go.cv.sel(3,this)">Blur</div><div class="__11m" onclick="return go.cv.sel(4,this)">Broken glass</div><div class="__11m" onclick="return go.cv.sel(5,this)">Shot</div><div class="__11m" onclick="return go.cv.sel(6,this)">Paper</div></div>
<div class="__11l">Уведомление</div>
<div class="__11v">Применение некоторых видов эффекта могут занимать чуть больше времени.</div>
<div class="__12j"><div id="circle">
	<div id="circleG_1" class="circleG"></div>
	<div id="circleG_2" class="circleG"></div>
	<div id="circleG_3" class="circleG"></div>
</div></div>
</div><div class="__10w1" data-id="5">
<div class="__10v" onclick="return go.filterBack(this)"><div class="__11e __11f"></div><div class="__11d __11d1">Назад</div></div>
<div class="__11j" style="margin-top: 10px;"><div class="__11r" onclick="return go.paint.back();"><div class="__11t"></div></div><div class="__11r" onclick="return go.paint.remove();"><div class="__11u"></div></div></div>
<div class="__11l">Цвет</div>
<div class="__11j __11n" id="color-cv-ln" data-id="7"><div class="__11o __11o1" style="background: #FF9300" onclick="return go.cv.txtClr(0,this)" data-id="0"></div><div class="__11o __11o1" style="background: #FFCB00" onclick="return go.cv.txtClr(1,this)" data-id="1"></div><div class="__11o __11o1" style="background: #00AEF9" onclick="return go.cv.txtClr(2,this)" data-id="2"></div><div class="__11o __11o1" style="background: #62DA37" onclick="return go.cv.txtClr(3,this)" data-id="3"></div><div class="__11o __11o1" style="background: #CC74E1" onclick="return go.cv.txtClr(4,this)" data-id="4"></div><div class="__11o __11o1" style="background: #E64646" onclick="return go.cv.txtClr(5,this)" data-id="5"></div><div class="__11o __11o1" style="background: black" onclick="return go.cv.txtClr(6,this)" data-id="6"></div><div class="__11o __11o1 __11p" style="background: white" onclick="return go.cv.txtClr(7,this)" data-id="7"></div></div>
<div class="__11l">Толщина</div>
<div class="__11b" data-id="50" id="cv-lw" onmousedown="return go.cv.pt(this,event)" onselectstart="return false"><div class="__11c"></div></div>
<div class="__11l">Интенсивность</div>
<div class="__11b" data-id="100" data-f="go.paint.gAS" id="cv-li" onmousedown="return go.cv.pt(this,event)" onselectstart="return false"><div class="__11c" style="width:176px;"></div></div>
</div></div>
</div>   <div class="__10i"><div class="__10j" onselectstart="return false;"><div class="__12r" style="pointer-events: none;"><canvas width="'.$b[2][0].'" height="'.$b[2][1].'" class="photo" style="margin: '.$b[2][3].'px 0 0 '.$b[2][2].'px;" id="img_cv"></canvas><canvas width="'.$b[2][0].'" height="'.$b[2][1].'" class="photo" style="margin: '.$b[2][3].'px 0 0 '.$b[2][2].'px;" id="img_cv-hd"></canvas></div><img id="i-filter-hidden" data-i="'.htmlspecialchars(json_encode($b[1]['o'])).'" src="/outImg?id='.$a[0].'-'.$a[1].'" width="'.$b[2][0].'" height="'.$b[2][1].'" class="photo" style="margin: '.$b[2][3].'px 0 0 '.$b[2][2].'px;"><div class="__11x" id="__11x" data-i="'.htmlspecialchars(json_encode(array(0=>$b[2][0],1=>$b[2][1],2=>$b[2][2],3=>$b[2][3]))).'" style="margin: '.$b[2][3].'px 0 0 '.$b[2][2].'px; width: '.$b[2][0].'px;height: '.$b[2][1].'px;"></div><img id="i-filter" data-i="'.htmlspecialchars(json_encode($b[1]['o'])).'" src="/outImg?id='.$a[0].'-'.$a[1].'" width="'.$b[2][0].'" height="'.$b[2][1].'" class="photo" style="margin: '.$b[2][3].'px 0 0 '.$b[2][2].'px;"></div><div class="__10k" onselectstart="return false;"><button class="__4o __11a" id="bt3" onclick="return go.saveCV(this)" data-status="open"><div class="lg-1"></div><span>Сохранить</span></button></div></div></div>';
} else echo '<div class="__10m">Фотография не найдена! Фотография удалена или не существует.</div>';
}
function saveMoveFolder($a) {
$b = [($GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][37][6]."`) FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][2]."`='".$_SESSION['id']."'")+1),$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][7]."` FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][36][1]."`='".$a[0][1]."' LIMIT 1")];
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][37][0]."` VALUES(NULL,".$_SESSION['id'].",'".$GLOBALS['DB']->s($a[1])."',now(),'0',".$b[0].",'".$a[2]."')");
if ($GLOBALS['DB']->n($b[1])!=0) {
if ($GLOBALS['DB']->f($b[1])[0]==0) {
$b[2] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][1]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][2]."`='".$_SESSION['id']."' ORDER BY `".$GLOBALS['info'][2][37][1]."` DESC LIMIT 1");
$b[3] = $GLOBALS['DB']->f($b[2])[0];
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][7]."`='2',`".$GLOBALS['info'][2][36][8]."`='".$b[3]."' WHERE `".$GLOBALS['info'][2][36][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][36][1]."`='".$a[0][1]."' LIMIT 1");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][6]."`='1' WHERE `".$GLOBALS['info'][2][38][4]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[0][0]."'");
$b[4] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][38][5]."`) FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][3]."`='".$b[3]."' AND `".$GLOBALS['info'][2][38][2]."`='".$_SESSION['id']."'")+1;
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][38][0]."` VALUES(NULL,".$a[0][0].",".$b[3].",".$a[0][1].",".$b[4].",'0')");
}
}
exit(json_encode(array('lt'=>alertBox::CNT(),'id'=>$a)));
}
function moveNewFolder($a) {
exit(json_encode(array('w'=>500,'html'=>'<div class="_box _box-profile _2b" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);" style="width: 500px;opacity: 1;margin-top: 150px;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Новая папка</div><div class="_2d"><div class="__6a" style="margin: 15px 15px 10px 15px;padding: 10px;border: 1px solid rgb(220,220,220);box-shadow: 0 0 0 2px rgba(0,0,0,.1);border-radius: 3px;background: #f9faf6;">Вы можете Ограничить доступ к текущей папке отключив галочку справа от имени файла, однако только вам будет доступно его содержимое.</div><div class="__4c"><div class="__4d">Название папки</div><input type="text" class="__4f" data-eds="0" maxlength="150" id="n-folder" placeholder="New folder"></div><div class="__5e" style="margin: -46px 108px 0 364px;position: absolute;"><div class="__5f"><div class="__5i"><div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-s="0"><div class="__5u" style="margin-left: 20px;"></div></div></div></div></div><div class="__4i __4i1"><button class="__4o" style="margin-top: 8px;" onclick="return go.doc.saveMoveFolder(this,'.htmlspecialchars(json_encode($a)).')" data-status="open"><div class="lg-1"></div><span>Create folder</span></button></div></div></div>','s'=>1)));
}
function webPhoto() {
exit(json_encode(array('w'=>600,'html'=>'<div class="_box _box-profile" id="_password" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);"><div class="_m2 __9x" onclick="return load.check()"></div><div class="_m1">Снимок с веб-камеры</div><div class="box-body-out"><div class="__9q __13z" oncontextmenu="return false;"><video class="__13x photo" id="__13x" width="556" height="417"></video><canvas class="__13x invisible" id="__13x0" width="556" height="417"></canvas><div class="__14a invisible">Infalike не можеть подключиться к вашей веб-камере.</div></div><div class="__4i __4i1 __4i0" id="wp-1"><button class="__9w" onclick="return load.check()">Cancel</button><button class="__4o __9v invisible wpTp" onclick="return go.wpTP(this)" data-status="open"><div class="lg-1"></div><span>Сделать снимок</span></button></div><div class="__4i __4i1 invisible" id="wp-2"><button class="__9w" id="wpB" onclick="return go.wpB()">Заново</button><button class="__4o __9v invisible wpTp" onclick="return go.swpTP(this)" data-status="open"><div class="lg-1"></div><span>Сохранить снимок</span></button></div></div></div>','s'=>1)));
}
function profilePicture() {
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_2n" onclick="return go.webPhoto()"><div class="_2n1"></div></div><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_2c">Загрузка новой фотографии</div><div class="_2d"><div class="_2d1"><div class="_2d2"><img src="http://img.infalike.com/a.jpg" class="photo" width="75" height="75"></div><div class="_2d2 _2d3"><img src="http://img.infalike.com/b.jpg" class="photo" width="84" height="84"></div><div class="_2d2 _2d4"><img src="http://img.infalike.com/c.jpg" class="photo" width="93" height="93"></div><div class="_2d2 _2d5"><img src="http://img.infalike.com/d.jpg" class="photo" width="84" height="84"></div><div class="_2d2 _2d6"><img src="http://img.infalike.com/e.jpg" class="photo" width="75" height="75"></div></div><div class="__6a cent">Советуем загрузить вашу настоящую фотографию.</div><div class="__4i cent">Вы можете сделать моментальную фотографию нажав на кнопку камеры сверху, если Ваше устройство оснащено веб-камерой, или загрузить изображение в формате JPG, GIF или PNG.</div><div class="__4i __4i1"><button class="__4o __4o0" id="bt3" onclick="return go.click()" data-status="open"><div class="lg-1"></div><span>Выбрать файл</span></button><div class="_2o"><div class="_2p" id="_2p"><div class="_2q" id="_2q">0</div><div id="_2q1">Обработка...</div></div></div></div></div><input type="file" id="file" onchange="return go.newProfile(this)" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/png" class="invisible"></div>')));
}
function secureQ($b) {
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c" id="_box"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы измененить настройки.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initC({\'f\':\'go.securtyQC\'},this)" data-status="open"><div class="lg-1"></div><span>Далее</span></button></div></div></div></div></div></div></div>')));
}
function saveContacts($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][2],'w'=>400);
if ($a['s']==1) sContacts($b); else $a['html'] = '<div class="_box __5c" id="_box" data-q="'.htmlspecialchars(json_encode(array('f'=>5,'arg'=>$b))).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initM(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>';
exit(json_encode($a));
}
function saveInterests($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][2],'w'=>400);
if ($a['s']==1) saveInterests($b); else $a['html'] = '<div class="_box __5c" id="_box" data-q="'.htmlspecialchars(json_encode(array('f'=>4,'arg'=>$b))).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initM(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>';
exit(json_encode($a));
}
function saveViews($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][2],'w'=>400);
if ($a['s']==1) saveVw($b); else $a['html'] = '<div class="_box __5c" id="_box" data-q="'.htmlspecialchars(json_encode(array('f'=>3,'arg'=>$b))).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initM(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>';
exit(json_encode($a));
}
function accessibility($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][0],'w'=>400);
if ($a['s']==1) saveAccessSett($b); else $a['html'] = '<div class="_box __5c" id="_box" data-q="'.htmlspecialchars(json_encode(array('f'=>2,'arg'=>$b))).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initM(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>';
exit(json_encode($a));
}
function privacy($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][0],'w'=>400);
if ($a['s']==1) savePrivacy($b); else $a['html'] = '<div class="_box __5c" id="_box" data-q="'.htmlspecialchars(json_encode(array('f'=>1,'arg'=>$b))).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initM(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>';
exit(json_encode($a));
}
function settingsSave($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1")];
$b[2] = [0];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0])[0];
if (md5($a['v'])==$b[1]) {
$b[2][0] = 1;
if ($a['f']==0) saveSettings($a['arg']); else if ($a['f']==1) savePrivacy($a['arg']); else if ($a['f']==2) saveAccessSett($a['arg']); else if ($a['f']==3) saveVw($a['arg']); else if ($a['f']==4) saveInterests($a['arg']); else if ($a['f']==5) sContacts($a['arg']); else if ($a['f']==6) $b[2][1] = saveEduEdit($a['arg']); else if ($a['f']==7) $b[2][1] = delEduInfo($a['arg']); else if ($a['f']==8) $b[2][1] = delMilitaryInfo($a['arg']); else if ($a['f']==9) saveMilitaryEdit($a['arg']); else if ($a['f']==10) {
saveDocSett($a['arg']);
$b[2][0] = 2;
} else if ($a['f']==11) alertBox::docDeleteN($a['arg']);
}
}
exit(json_encode($b[2]));
}
function settings($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][0],'w'=>400);
if ($a['s']==1) saveSettings($b); else $a['html'] = '<div class="_box __5c" id="_box" data-q="'.htmlspecialchars(json_encode(array('f'=>0,'arg'=>$b))).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initM(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>';
exit(json_encode($a));
}
function docDeleteN($a) {
docSett();
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][7]."`='1' WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$a[0]."' LIMIT 1");
$a[2] = alertBox::CNT();
if ($GLOBALS['info'][40][0]==0) {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][39][5]."`,`".$GLOBALS['info'][2][39][6]."` FROM `".$GLOBALS['info'][2][39][0]."` WHERE `".$GLOBALS['info'][2][39][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][39][3]."`='".$a[1]."' LIMIT 1"),1=>$GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][39][6]."`) FROM `".$GLOBALS['info'][2][39][0]."` WHERE `".$GLOBALS['info'][2][39][2]."`='".$a[0]."'"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[2] = $GLOBALS['DB']->f($b[0]);
if ($b[2][0]!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][39][0]."` SET `".$GLOBALS['info'][2][39][6]."`=`".$GLOBALS['info'][2][39][6]."`-1 WHERE `".$GLOBALS['info'][2][39][6]."`>'".$b[2][1]."' AND `".$GLOBALS['info'][2][39][2]."`='".$a[0]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][39][0]."` SET `".$GLOBALS['info'][2][39][5]."`='0',`".$GLOBALS['info'][2][39][6]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][39][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][39][3]."`='".$a[1]."' LIMIT 1");	
}
} else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][39][0]."` VALUES(NULL,".$a[0].",".$a[1].",now(),'0',".($b[1]+1).")");
}
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][6]."`='1' WHERE `".$GLOBALS['info'][2][38][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[1]."' LIMIT 1");
return $a;
}
function docContinue($a) {
$a[3] = 1;
$a[4] = [];
$b = [$GLOBALS['DB']->q(($a[0]==0?"SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."` REGEXP '".alertBox::TYPE()."' ORDER BY `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][6]."` DESC LIMIT ".$a[1].",30":($a[0]==1?"SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='0' ORDER BY `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][6]."` DESC LIMIT ".$a[1].",30":($a[0]==2?"SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][39][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`=`".$GLOBALS['info'][2][39][0]."`.`".$GLOBALS['info'][2][39][2]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='1' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`=`".$GLOBALS['info'][2][39][0]."`.`".$GLOBALS['info'][2][39][3]."` AND `".$GLOBALS['info'][2][39][0]."`.`".$GLOBALS['info'][2][39][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][39][0]."`.`".$GLOBALS['info'][2][39][5]."`='0' AND `".$GLOBALS['info'][2][39][0]."`.`".$GLOBALS['info'][2][39][4]."`>=DATE(NOW()) - INTERVAL 7 DAY ORDER BY `".$GLOBALS['info'][2][39][0]."`.`".$GLOBALS['info'][2][39][6]."` DESC LIMIT ".$a[1].",30":($a[0]==3?"SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."` REGEXP  'gif|png|jpeg|jpg' ORDER BY `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][6]."` DESC LIMIT ".$a[1].",30":($a[0]==4?"SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='2' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][8]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][3]."` AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][2]."` AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][6]."`='0' AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][2]."`='".$a[3]."' AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][3]."`='".$a[2]."'  AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][4]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."` ORDER BY `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][5]."` DESC LIMIT ".$a[1].",30":''))))))];
$b[1] = $GLOBALS['DB']->n($b[0]);
if ($b[1]==30) $a[3] = 0;
$b[6] = [alertBox::CLR(),alertBox::CNT()];
for ($b[4]=0;$b[4]<$b[1];$b[4]++) {
$b[5] = $GLOBALS['DB']->f($b[0]);
array_push($a[4],array('tp'=>$b[5][0],'sz'=>fileSz($b[5][1]),'id'=>$b[5][3],'own'=>$b[5][2],'nm'=>$b[5][4],'tm'=>$b[5][5],'lck'=>$b[5][7],'clr'=>docColor($b[5][0],$b[6][0]),'dl'=>$b[5][6],'lt'=>$b[6][1],'src'=>alertBox::SRC([$b[5][2],$b[5][3]])));
}
return $a;
}
function FO($a) {
$b = '';
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][40][0]."`.`".$GLOBALS['info'][2][40][3]."` FROM `".$GLOBALS['info'][2][40][0]."`,`".$GLOBALS['info'][2][38][0]."`,`".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][35][0]."` WHERE `".$GLOBALS['info'][2][40][0]."`.`".$GLOBALS['info'][2][40][2]."`=`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."` AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][4]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`!='1' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][2]."` AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][3]."`='".$a[1]."' AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][6]."`='0' ORDER BY `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][5]."` DESC LIMIT 3")];
$c[1] = $GLOBALS['DB']->n($c[0]);
for ($c[2]=0;$c[2]<$c[1];$c[2]++) $b .= '<div class="__16n" style="background-image: url('.json_decode($GLOBALS['DB']->f($c[0])[0])[0].')"></div>';
if ($c[1]!=0) $b = '<div class="__16m" style="'.($c[1]==1?'width: 40px; margin-left: 52px;':($c[1]==2?'width: 80px;margin-left: 32px;':'')).'">'.$b.'</div>';
return $b;
}
function SRC($a) {
$c = '';
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][40][0]."`.`".$GLOBALS['info'][2][40][3]."` FROM `".$GLOBALS['info'][2][40][0]."`,`".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."`=`".$GLOBALS['info'][2][40][0]."`.`".$GLOBALS['info'][2][40][2]."` LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])) $c = json_decode($GLOBALS['DB']->f($b[0])[0]);
return $c;
}
function TYPE() {
return 'doc|docx|docm|dotx|dotm|dot|rtf|pdf|xps|mht|mhtml|html|htm|txt|xml|odt';
}
function CNT() {
if ($GLOBALS['CNT']!='') return $GLOBALS['CNT']; else $GLOBALS['CNT'] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][36][1]."`) FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][36][7]."`='0'");
return $GLOBALS['CNT'];
}
function CLR() {
if ($GLOBALS['CLR']!='') return $GLOBALS['CLR']; else $a = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][34][4]."` FROM `".$GLOBALS['info'][2][34][0]."` WHERE `".$GLOBALS['info'][2][34][1]."`='".$_SESSION['id']."' LIMIT 1");
if ($GLOBALS['DB']->n($a)!=0) $GLOBALS['CLR'] = $GLOBALS['DB']->f($a)[0]; else $GLOBALS['CLR'] = 0;
return $GLOBALS['CLR'];
}
function docSearch($a) {
$a[4] = [1,'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16h"></div><div class="__13w">No results found</div></div>'];
$b = array(0=>$GLOBALS['DB']->q(($a[0]==0?"SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."` LIKE '%".$a[1]."%' ORDER BY `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][6]."` DESC LIMIT ".$a[2].",30":'')));
$b[1] = $GLOBALS['DB']->n($b[0]);
if ($b[1]!=0) {
$a[4] = [0,[]];
$b[3] = [alertBox::CLR(),alertBox::CNT()];
for ($b[2]=0;$b[2]<$b[1];$b[2]++) {
$b[4] = $GLOBALS['DB']->f($b[0]);
array_push($a[4][1],array('tp'=>$b[4][0],'sz'=>fileSz($b[4][1]),'id'=>$b[4][3],'own'=>$b[4][2],'nm'=>$b[4][4],'tm'=>$b[4][5],'lck'=>$b[4][7],'clr'=>docColor($b[4][0],$b[3][0]),'dl'=>$b[4][6],'lt'=>$b[3][1],'src'=>alertBox::SRC([$b[4][2],$b[4][3]])));
}
}
exit(json_encode($a));
}
function docList($a) {
$b = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='0' ORDER BY `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][6]."` DESC LIMIT ".$a.",30");
$d = [$GLOBALS['DB']->n($b)];
$c = array('s'=>($d!=30?1:0),'i'=>[]);
if ($d[0]!=0) {
$d[1] = [alertBox::CLR(),alertBox::CNT()];
for ($e=0;$e<$d[0];$e++) {
$f = $GLOBALS['DB']->f($b);
array_push($c['i'],array('tp'=>$f[0],'sz'=>fileSz($f[1]),'id'=>$f[2],'own'=>$f[3],'nm'=>$f[4],'tm'=>$f[5],'lck'=>$f[6],'clr'=>docColor($f[0],$d[1][0]),'lt'=>$d[1][1],'src'=>alertBox::SRC([$f[3],$f[2]])));
}
}
exit(json_encode($c));
}
function docRestoreN($a) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][7]."`='0' WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$a[0]."' LIMIT 1");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][39][0]."` SET `".$GLOBALS['info'][2][39][5]."`='1' WHERE `".$GLOBALS['info'][2][39][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][39][3]."`='".$a[1]."' LIMIT 1");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][6]."`='1' WHERE `".$GLOBALS['info'][2][38][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[1]."' LIMIT 1");
$a[2] = alertBox::CNT();
return $a;
}
function docRestorePass($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) if (md5($a[2])==$GLOBALS['DB']->f($b[0])[0]) exit(json_encode(array('s'=>0,'id'=>alertBox::docRestoreN($a)))); else exit(json_encode(array('s'=>1)));
}
function docRestore($b) {
settPR();
exit(json_encode(array('s'=>$GLOBALS['info'][22][1],'w'=>400,'html'=>'<div class="_box __5c _box-pass"  id="_box" style="margin: 0;" data-id="'.htmlspecialchars(json_encode($b)).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы востановить удаленные данные.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.doc.restoreCheck(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>')));
}
function docDeletePass($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) if (md5($a[2])==$GLOBALS['DB']->f($b[0])[0]) echo json_encode(array('s'=>0,'id'=>alertBox::docDeleteN($a))); else echo json_encode(array('s'=>1));
}
function docDelete($b) {
settPR();
if ($GLOBALS['info'][22][1]==1) exit(json_encode(array('s'=>$GLOBALS['info'][22][1],'id'=>alertBox::docDeleteN($b)))); exit(json_encode(array('s'=>$GLOBALS['info'][22][1],'w'=>400,'html'=>'<div class="_box __5c _box-pass" id="_box" style="margin: 0;" data-id="'.htmlspecialchars(json_encode($b)).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы подтвердить удаление данных.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.doc.delCheck(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>')));
}
function docListDelete($a) {
$b = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][4]."` FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][7]."`='1' LIMIT 1");
if ($GLOBALS['DB']->n($b)!=0) exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Удаление документа</div><div class="_2d"><div class="__6a" style="margin: 15px 15px 10px 15px;padding: 10px;border: 1px solid rgb(220,220,220);box-shadow: 0 0 0 2px rgba(0,0,0,.1);border-radius: 3px;background: #f9faf6;">Вы действительно хотите удалить <span style="font-weight: bold;">'.$GLOBALS['DB']->f($b)[0].'</span>.</div><div class="__4i __4i1"><button class="__4o" style="margin: 8px 0 0 130px;" onclick="return go.doc.delE(this,'.htmlspecialchars(json_encode($a)).')" data-status="open"><div class="lg-1"></div><span>Delete document</span></button></div></div></div></div>'))); else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Документ удален или востановлен.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
}
function docDel($a) {
$b = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][4]."` FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][7]."`!='1' LIMIT 1");
if ($GLOBALS['DB']->n($b)!=0) exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" data-id="'.htmlspecialchars(json_encode($a)).'"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Удаление документа</div><div class="_2d"><div class="__6a" style="margin: 15px 15px 10px 15px;padding: 10px;border: 1px solid rgb(220,220,220);box-shadow: 0 0 0 2px rgba(0,0,0,.1);border-radius: 3px;background: #f9faf6;">Вы действительно хотите удалить <span style="font-weight: bold;">'.$GLOBALS['DB']->f($b)[0].'</span>.</div><div class="__4i __4i1"><button class="__4o" style="margin: 8px 0 0 130px;" onclick="return go.doc.delD(this,'.htmlspecialchars(json_encode($a)).')" data-status="open"><div class="lg-1"></div><span>Delete document</span></button></div></div></div></div>'))); else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Документ удален или не существует.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
}
function docDeleteEN($a) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][7]."`='1' WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$a[0]."' LIMIT 1");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][39][0]."` SET `".$GLOBALS['info'][2][39][5]."`='1' WHERE `".$GLOBALS['info'][2][39][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][39][3]."`='".$a[1]."' LIMIT 1");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][6]."`='1' WHERE `".$GLOBALS['info'][2][38][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[1]."' LIMIT 1");
$a[2] = alertBox::CNT();
return $a;
}
function docDeleteEND($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) if (md5($a[2])==$GLOBALS['DB']->f($b[0])[0]) exit(json_encode(array('s'=>0,'id'=>alertBox::docDeleteEN($a)))); else exit(json_encode(array('s'=>1)));
}
function docDeleteE($b) {
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c _box-pass"  id="_box" style="margin: 0;" data-id="'.htmlspecialchars(json_encode($b)).'"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы удаленные данные из корзины.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.doc.delEnd(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div></div></div></div>')));
}
function folderContinue($a) {
exit(json_encode(alertBox::folderList([$_SESSION['id'],$a])));
}
function fileList($a) {
exit(json_encode(alertBox::docContinue([4,$a[1],$a[0][1],$a[0][0]])));
}
function folderMove($a) {
$b = [$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`) FROM `".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][35][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`!='1' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$a[0]."' LIMIT 1")];
if ($b[0]==0)  exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e" style="font-size: 14px;font-weight: bold;">Документ перемещен в папку или удалена.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>'))); else $b[1] = alertBox::folderList([$_SESSION['id'],0]);
if (sizeof($b[1])!=0) $b[2] = ''; else $b[2] = '<div class="_2e cent" style="font-size: 14px;font-weight: bold; padding: 50px 0 50px 0;">У вас нет папки</div>';
for ($b[3]=0;$b[3]<sizeof($b[1]);$b[3]++) $b[2] .= '<div class="__16v" data-id="'.$b[1][$b[3]]['own'].'-'.$b[1][$b[3]]['id'].'" data-i="'.htmlspecialchars(json_encode([$b[1][$b[3]]['own'],$b[1][$b[3]]['id']])).'" onclick="return go.doc.folderME(this)"><div class="__16w"></div>'.$b[1][$b[3]]['nm'].'</div>';
exit(json_encode(array('w'=>520,'html'=>'<div class="_box __5c __5c1" id="_box"><div class="__13u" style="position: absolute;background-color: white;background-position: 1.5px -101px;border: 1px solid #e6ecf0;margin: 11px 0 0 458px;width: 19px;height: 19px;box-shadow: 0 0 2px 0 #e6ecf0;" onclick="return go.doc.moveNewFolder(this,'.htmlspecialchars(json_encode($a)).')"></div><div class="_m2 __5d __5d1" onclick="return load.marginOff()"></div><div class="_m1">Выберите папку чтобы переместить документ</div><div class="box-body-out" id="box-body-out" style="padding: 0;"><div class="__16u" id="__16u" data-s="'.(sizeof($b[1])==30?0:1).'" data-id="'.htmlspecialchars(json_encode($a)).'">'.$b[2].'</div></div></div>')));
}
function folderSearch($a) {
$b = [$a,''];
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][1]."`,`".$GLOBALS['info'][2][37][3]."`,`".$GLOBALS['info'][2][37][4]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][5]."`='0' AND `".$GLOBALS['info'][2][37][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][37][3]."` LIKE '%".$a."%' LIMIT 3")];
$c[1] = $GLOBALS['DB']->n($c[0]);
$c[4] = '';
for ($c[2]=0;$c[2]<$c[1];$c[2]++) {
$c[3] = $GLOBALS['DB']->f($c[0]);
$c[4] .= '<a class="__17q" href="/folder'.$_SESSION['id'].'_'.$c[3][0].'" data-href="/documents?section=folders&folder='.$_SESSION['id'].'_'.$c[3][0].'" onclick="return go.linkOp(this,event)"><div class="__17r"></div><div class="__17s"><div class="__17t">'.$c[3][1].'</div><div class="__17u" data-time="'.$c[3][2].'">'.$c[3][2].'</div></div></a>';
}
$b[1] = ($c[4]!=''?'<div class="__17o">Folder</div><div class="__17p">'.$c[4].'</div>':'');
$c[4] = '';
$c[0] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][4]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][2]."` AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`!='1' AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][6]."`='0' AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][2]."`='".$_SESSION['id']."' AND`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."` LIKE '%".$a."%' LIMIT 3");
$c[1] = $GLOBALS['DB']->n($c[0]);
for ($c[2]=0;$c[2]<$c[1];$c[2]++) {
$c[3] = $GLOBALS['DB']->f($c[0]);
$c[4] .= '<a href="/doc'.$c[3][1].'_'.$c[3][0].'" target="_blank" class="__17q"><div class="__17r" style="background: url(/sources/d-op.png) -30px 0"></div><div class="__17s"><div class="__17t">'.$c[3][2].'</div><div class="__17u" data-time="'.$c[3][3].'">'.$c[3][3].'<span style="margin: 0 0 0 5px;">'.fileSz($c[3][4]).'</span></div></div></a>';
}
$b[1] .= ($c[4]!=''?'<div class="__17o">Docs</div><div class="__17p">'.$c[4].'</div>':'');
$b[1] = ($b[1]!=''?$b[1]:'<div class="__17v"><div class="__17w"></div></div><div class="__17x">No results found</div>');
exit(json_encode($b));
}
function resFD($a) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][6]."`='1' WHERE `".$GLOBALS['info'][2][38][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[1]."'  AND `".$GLOBALS['info'][2][38][6]."`='0'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][7]."`='0',`".$GLOBALS['info'][2][36][8]."`='0' WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][36][7]."`!='1' LIMIT 1");
exit(alertBox::CNT());
}
function folderReplace($a) {
$a = [explode('_',$a[0]),$a[1],explode('_',$a[2]),explode('_',$a[3])];
if (sizeof($a[2])!=1) {
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][6]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[2][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[2][0]."' LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])==0) exit(); $c[1] = $GLOBALS['DB']->f($c[0])[0];
$c[0] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][6]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' LIMIT 1");
if ($GLOBALS['DB']->n($c[0])==0) exit(); $c[2] = $GLOBALS['DB']->f($c[0])[0];
if ($c[1]>$c[2]) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][6]."`=`".$GLOBALS['info'][2][37][6]."`-1 WHERE `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][37][6]."`>'".$c[2]."' AND `".$GLOBALS['info'][2][37][6]."`<'".$c[1]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][6]."`='".($c[1]-1)."' WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' LIMIT 1");
} else if ($c[1]<$c[2]) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][6]."`=`".$GLOBALS['info'][2][37][6]."`+1 WHERE `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][37][6]."`>='".$c[1]."' AND `".$GLOBALS['info'][2][37][6]."`<'".$c[2]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][6]."`='".$c[1]."' WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' LIMIT 1");
}
} else if (sizeof($a[3])!=1) {
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][6]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])==0) exit(); else $c[2] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][37][6]."`) FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][6]."`=`".$GLOBALS['info'][2][37][6]."`-1 WHERE `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][37][6]."`>'".$GLOBALS['DB']->f($c[0])[0]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][6]."`='".$c[2]."' WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' LIMIT 1");
}
}
function docMove($a) {
$a[2] = 'Документ удален или не существует';
$a[4] = 1;
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][7]."` FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[1][0]."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
if ($GLOBALS['DB']->f($b[0])[0]!=1) {
$b[2] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][37][1]."`) FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][37][5]."`='0' LIMIT 1");
if ($b[2]!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][6]."`='1' WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[1][0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[1][1]."' LIMIT 1");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][7]."`='2',`".$GLOBALS['info'][2][36][8]."`='".$a[0][1]."' WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$a[1][0]."' LIMIT 1");
$b[2] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][38][5]."` FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][2]."`='".$a[1][0]."' AND `".$GLOBALS['info'][2][38][3]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[1][1]."' LIMIT 1");
if ($GLOBALS['DB']->n($b[2])!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`=`".$GLOBALS['info'][2][38][5]."`-1 WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][38][5]."`>'".$GLOBALS['DB']->f($b[2])[0]."'");
$b[2] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][38][5]."`) FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[0][1]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`='".$b[2]."',`".$GLOBALS['info'][2][38][6]."`='0' WHERE `".$GLOBALS['info'][2][38][2]."`='".$a[1][0]."' AND `".$GLOBALS['info'][2][38][3]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[1][1]."' LIMIT 1");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][7]."`='2',`".$GLOBALS['info'][2][36][8]."`='".$a[0][1]."' WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$a[1][0]."' AND `".$GLOBALS['info'][2][36][7]."`!='1'");
} else {
$b[2] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][38][5]."`) FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[0][1]."'")+1;
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][38][0]."` VALUES(NULL,".$a[1][0].",".$a[0][1].",".$a[1][1].",".$b[2].",'0')");
}
$a[2] = 'Документ перемещен в папку';
$a[4] = 0;
} else $a[2] = 'Папка удалена или не существует';
}
}
$a[3] = alertBox::CNT();
exit(json_encode($a));
}
function folderList($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][1]."`,`".$GLOBALS['info'][2][37][3]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][37][5]."`='0' ORDER BY `".$GLOBALS['info'][2][37][6]."` DESC LIMIT ".$a[1].",30"),[]];
$b[2] = $GLOBALS['DB']->n($b[0]);
for ($b[3]=0;$b[3]<$b[2];$b[3]++) {
$b[4] = $GLOBALS['DB']->f($b[0]);
array_push($b[1],array('id'=>$b[4][0],'own'=>$a[0],'nm'=>$b[4][1],'fo'=>alertBox::FO([$a[0],$b[4][0]])));
}
return $b[1];
}
function docEdit($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`='".$a[1]."' ORDER BY `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][6]."` DESC LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" data-doc_i="'.htmlspecialchars(json_encode([$a[1],$a[0]])).'"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Редактирование документа</div><div class="_2d"><div class="__4c"><div class="__4d">Название</div><input type="text" class="__4f" data-eds="0" maxlength="150" value="'.$b[1][4].'" id="d_r_name"></div><div class="__4c"><div class="__4d">Дата загрузки</div><input type="text" class="__4f" data-eds="0" maxlength="150" readonly value="'.$b[1][5].'"></div><div class="__4c"><div class="__4d">Формат</div><input type="text" class="__4f" data-eds="0" maxlength="150" value="'.$b[1][0].'" readonly style="text-transform: uppercase;"></div><div class="__4c"><div class="__4d">Размер</div><input type="text" class="__4f" data-eds="0" maxlength="150" value="'.fileSz($b[1][1]).'" readonly style="text-transform: uppercase;"></div><div class="__4i __4i1"><button class="__4o" style="margin-top: 8px;" onclick="return go.doc.saveEdit(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div></div></div>')));
} else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Документ удален или не существует.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
}
function editMilitary($a) {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][25][2]."`,`".$GLOBALS['info'][2][25][3]."`,`".$GLOBALS['info'][2][25][4]."`,`".$GLOBALS['info'][2][25][5]."`,`".$GLOBALS['info'][2][25][6]."` FROM `".$GLOBALS['info'][2][25][0]."` WHERE `".$GLOBALS['info'][2][25][7]."`='0' AND `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][25][1]."`='".$a['i']."' LIMIT 1"),1=>'',2=>'<div class="_box __5c __5c1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 __5d __5d1" onclick="return load.marginOff()"></div><div class="_2c">Редактирование информации</div><div class="box-body-out"><div class="_2e _2e1">Информация не найдена</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff()">OK</div></div></div></div>');
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$f = date('Y');
$g = 1901;
$h = '<div class="__4y cent" onclick="return go.st(this,{\'i\':0,\'v\':\'Not selected\'})">Not selected</div>';
while ($g<$f) {
$h .= '<div class="__4y cent" onclick="return go.st(this,{\'i\':'.$f.',\'v\':'.$f.'})">'.$f.'</div>';
$f--;
}
$b[2] = '<div class="_box __5c __5c1" id="_box"><div class="_m2 __5d __5d1" onclick="return load.marginOff()"></div><div class="_m1">Редактирование информации</div><div class="box-body-out" id="box-body-out"><div class="__4c"><div class="__4d">Country</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[1][0].'" data-military>'.findCountry($b[1][0]).'</div><div class="__4m"></div></div>'.countryDD(2).'</div><div class="__4c"><div class="__4d">Войсковая часть</div><input type="text" class="__4f" data-military maxlength="150" value="'.$b[1][1].'"></div><div class="__4c"><div class="__4d">Звание</div><input type="text" class="__4f" data-military maxlength="150" value="'.$b[1][2].'"></div><div class="__4c"><div class="__4d">Год начала службы</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[1][4].'" data-military>'.($b[1][4]!=0?$b[1][4]:'Not selected').'</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div><div class="__4c"><div class="__4d">Год окончания службы</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[1][4].'" data-military>'.($b[1][4]!=0?$b[1][4]:'Not selected').'</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div><div class="__4i __4i1"><button class="__4o" id="bt3" onclick="return go.saveEditMilitary(this,'.$a['i'].')" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div></div></div>';
}
exit(json_encode(array('w'=>520,'html'=>$b[2])));
}
function editEdu($a) {
$b = array(0=>($a['t']==0?$GLOBALS['info'][2][22]:$GLOBALS['info'][2][23]));
$b[1] = $GLOBALS['DB']->q("SELECT `".$b[0][2]."`,`".$b[0][3]."`,`".$b[0][4]."`,`".$b[0][5]."`,`".$b[0][6]."`,`".$b[0][7]."`,`".$b[0][8]."` FROM `".$b[0][0]."` WHERE `".$b[0][1]."`='".$a['i']."' AND `".$b[0][10]."`='".$_SESSION['id']."' LIMIT 1");
$b[2] = '<div class="_box __5c __5c1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 __5d __5d1" onclick="return load.marginOff()"></div><div class="_2c">'.($a['t']==0?'Редактирование школы':'Редактирование ВУЗа').'</div><div class="box-body-out"><div class="_2e _2e1">Информация не найдена</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff()">OK</div></div></div></div>';
if ($GLOBALS['DB']->n($b[1])!=0) {
$b[3] = $GLOBALS['DB']->f($b[1]);
$f = date('Y');
$g = 1901;
$h = '<div class="__4y cent" onclick="return go.st(this,{\'i\':0,\'v\':\'Not selected\'})">Not selected</div>';
while ($g<$f) {
$h .= '<div class="__4y cent" onclick="return go.st(this,{\'i\':'.$f.',\'v\':'.$f.'})">'.$f.'</div>';
$f--;
}
$b[2] = '<div class="_box __5c __5c1" id="_box"><div class="_m2 __5d __5d1" onclick="return load.marginOff()"></div><div class="_m1">'.($a['t']==0?'Редактирование школы':'Редактирование ВУЗа').'</div><div class="box-body-out" id="box-body-out"><div class="__4c"><div class="__4d">Country</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][0].'" '.($a['t']==0?'data-eds':'data-edu').'="0">'.findCountry($b[3][0]).'</div><div class="__4m"></div></div>'.countryDD($a['t']).'</div><div class="__4c" '.($a['t']==0?'data-school-ed':'data-uni-ed').'="0"><div class="__4d">City</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][1].'" '.($a['t']==0?'data-eds':'data-edu').'="0">'.$GLOBALS['info'][34][$b[3][0]][$b[3][1]].'</div><div class="__4m"></div></div>'.cityLSel(array('m'=>$a['t'],'i'=>$b[3][0])).'</div><div class="__4c" '.($a['t']==0?'data-school-list':'data-uni-list').'="0"><div class="__4d">'.($a['t']==0?'School':'University').'</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][2].'" '.($a['t']==0?'data-eds':'data-edu').'="0">'.($a['t']==0?$GLOBALS['info'][35][$b[3][0]][$b[3][1]][$b[3][2]]:$GLOBALS['info'][36][$b[3][0]][$b[3][1]][$b[3][2]]).'</div><div class="__4m"></div></div>'.eduLSel(array('m'=>$a['t'],'t'=>$b[3][0],'i'=>$b[3][1])).'</div>'.($a['t']==0?'<div class="__4c"><div class="__4d">Год начала обучения</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][3].'" data-eds="0">'.($b[3][3]!=0?$b[3][3]:'Not selected').'</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div>':'<div class="__4c"><div class="__4d">Факультет</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][3].'" data-edu="0">'.($b[3][3]!=0?$GLOBALS['info'][37][$b[3][0]][$b[3][1]][$b[3][2]][$b[3][3]]:'Not selected').'</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.findFaculty(array(0=>$b[3][0],1=>$b[3][1],2=>$b[3][2])).'</div></div></div></div>').'
'.($a['t']==0?'<div class="__4c"><div class="__4d">Год окончания</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][4].'" data-eds="0">'.($b[3][4]!=0?$b[3][4]:'Not selected').'</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div>':'<div class="__4c"><div class="__4d">Форма обучения</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][4].'" data-edu="0">'.($b[3][4]!=0?($b[3][4]==1?'Очная':($b[3][4]==2?'Очно-заочная':($b[3][4]==3?'Заочная':($b[3][4]==3?'Экстернат':'Дистанционная')))):'Not selected').'</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.eduSel(this,{\'i\':0,\'v\':\'Не выбрана\'})">Не выбрана</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':1,\'v\':\'Очная\'})">Очная</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Очно-заочная\'})">Очно-заочная</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':3,\'v\':\'Заочная\'})">Заочная</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':4,\'v\':\'Экстернат\'})">Экстернат</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Дистанционная\'})">Дистанционная</div></div></div></div></div>').'
'.($a['t']==0?'<div class="__4c"><div class="__4d">Дата выпуска</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][5].'" data-eds="0">'.($b[3][5]!=0?$b[3][5]:'Not selected').'</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div>':'<div class="__4c"><div class="__4d">Статус</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][5].'" data-edu="0">'.($b[3][5]!=0?($b[3][5]==1?'Абитуриент':($b[3][5]==2?'Студент (специалист)':($b[3][5]==3?'Студент (бакалавр)':($b[3][5]==4?'Студент (магистр)':($b[3][5]==5?'Выпускник (специалист)':($b[3][5]==6?'Выпускник (бакалавр)':($b[3][5]==7?'Выпускник (магистр)':($b[3][5]==8?'Аспирант':($b[3][5]==9?'Кандидат наук':($b[3][5]==10?'Доктор наук':($b[3][5]==11?'Интерн':($b[3][5]==12?'Клинический ординатор':($b[3][5]==13?'Соискатель':($b[3][5]==14?'Ассистент-стажёр':($b[3][5]==15?'Докторант':'Адъюнкт'))))))))))))))):'Not selected').'</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.eduSel(this,{\'i\':0,\'v\':\'Не выбрана\'})">Не выбрана</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':1,\'v\':\'Абитуриент\'})">Абитуриент</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Студент (специалист)\'})">Студент (специалист)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':3,\'v\':\'Студент (бакалавр)\'})">Студент (бакалавр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':4,\'v\':\'Студент (магистр)\'})">Студент (магистр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Выпускник (специалист)\'})">Выпускник (специалист)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':6,\'v\':\'Выпускник (бакалавр)\'})">Выпускник (бакалавр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':7,\'v\':\'Выпускник (магистр)\'})">Выпускник (магистр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':8,\'v\':\'Аспирант\'})">Аспирант</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':9,\'v\':\'Кандидат наук\'})">Кандидат наук</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':10,\'v\':\'Доктор наук\'})">Доктор наук</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':11,\'v\':\'Интерн\'})">Интерн</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':12,\'v\':\'Клинический ординатор\'})">Клинический ординатор</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':13,\'v\':\'Соискатель\'})">Соискатель</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':14,\'v\':\'Ассистент-стажёр\'})">Ассистент-стажёр</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':15,\'v\':\'Докторант\'})">Докторант</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':16,\'v\':\'Адъюнкт\'})">Адъюнкт</div></div></div></div></div>').''.($a['t']==0?'<div class="__4c"><div class="__4d">Специализация</div><input type="text" class="__4f" data-eds="0" maxlength="150" value="'.$b[3][6].'"></div>':'<div class="__4c"><div class="__4d">Дата выпуска</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$b[3][6].'" data-edu="0">'.($b[3][6]!=0?$b[3][6]:'Not selected').'</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div>').'<div class="__4i __4i1"><button class="__4o" id="bt3" onclick="return go.saveEditEdu(this,'.$a['t'].','.$a['i'].')" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>
</div>';
}
exit(json_encode(array('w'=>520,'html'=>$b[2])));
}
function saveDel($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1"),0];
if ($GLOBALS['DB']->n($b[0])!=0) if ($GLOBALS['DB']->f($b[0])[0]==md5($a['p'])) $b[1] = 1;
if ($b[1]==1&&$a['t']==0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][22][0]."` SET `".$GLOBALS['info'][2][22][9]."`='1' WHERE `".$GLOBALS['info'][2][22][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][22][10]."`='".$_SESSION['id']."'  LIMIT 1"); else if ($b[1]==1) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][23][0]."` SET `".$GLOBALS['info'][2][23][9]."`='1' WHERE `".$GLOBALS['info'][2][23][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][23][10]."`='".$_SESSION['id']."'  LIMIT 1");
exit(json_encode([$b[2],[$a['t'],$a['i'],$a['m']]]));
}
function savePR($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1"),0];
if ($GLOBALS['DB']->n($b[0])!=0) if ($GLOBALS['DB']->f($b[0])[0]==md5($a[4])) $b[1] = 1;
if ($b[1]==1) {
$b[3] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][10][1]."`) FROM `".$GLOBALS['info'][2][10][0]."` WHERE `".$GLOBALS['info'][2][10][1]."`='".$_SESSION['id']."' LIMIT 1");
if ($b[3]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][10][0]."` SET `".$GLOBALS['info'][2][10][2]."`='".$a[1]."',`".$GLOBALS['info'][2][10][3]."`='".$a[2]."',`".$GLOBALS['info'][2][10][4]."`='".$a[3]."' WHERE `".$GLOBALS['info'][2][10][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][10][0]."` VALUES(".$_SESSION['id'].",'".$a[1]."','".$a[2]."','".$a[3]."')");
}
exit(json_encode([$b[2]]));
}
function delM($b) {
settPR();
$a = array('s'=>0,'w'=>400);//saveEduEdit
if ($GLOBALS['info'][22][2]==1) $a['f'] = delMilitaryInfo($b); else {
$a['s'] = 1;
$a['html'] = '<div class="_box __5c _box-pass" id="_password" data-q="'.htmlspecialchars(json_encode(array('f'=>8,'arg'=>$b))).'" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);"><div class="_m2 __5d" onclick="return load.check()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initD(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div>';	
}
exit(json_encode($a));
}
function delSave($b) {
settPR();
$a = array('s'=>0,'w'=>400);//saveEduEdit
if ($GLOBALS['info'][22][2]==1) $a['f'] = delEduInfo($b); else {
$a['s'] = 1;
$a['html'] = '<div class="_box __5c _box-pass" id="_password" data-q="'.htmlspecialchars(json_encode(array('f'=>7,'arg'=>$b))).'" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);"><div class="_m2 __5d" onclick="return load.check()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initD(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div>';	
}
exit(json_encode($a));
}
function settingsPRChange($a) {
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c _box-pass" id="_password" data-q="'.htmlspecialchars(json_encode($a)).'" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);"><div class="_m2 __5d" onclick="return load.check()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initF({a:this,b:\'go.settingsSave\',c:\'\'},event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div>','s'=>1)));
}
function eventType() {
settEv();
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c" id="_box"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Виды событий<span class="__6l">Настройки сохранены!</span></div><div class="box-body-out"><div class="__5e"><div class="__5f"><div class="__5h">Личные сообщения</div><div class="__5i">'.($GLOBALS['info'][25][0]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="0"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="0"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Заявки в друзья</div><div class="__5i">'.($GLOBALS['info'][25][1]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="1"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="1"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Отметки «Мне нравится»</div><div class="__5i">'.($GLOBALS['info'][25][2]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Поделились Вашей записью</div><div class="__5i">'.($GLOBALS['info'][25][3]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Упоминания и ответы</div><div class="__5i">'.($GLOBALS['info'][25][4]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Записи на стене</div><div class="__5i">'.($GLOBALS['info'][25][5]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Комментарии к записям</div><div class="__5i">'.($GLOBALS['info'][25][6]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Мероприятия и дни рождения</div><div class="__5i">'.($GLOBALS['info'][25][7]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Комментарии к фотографиям</div><div class="__5i">'.($GLOBALS['info'][25][8]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Комментарии к видеозаписям</div><div class="__5i">'.($GLOBALS['info'][25][9]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Подарки</div><div class="__5i">'.($GLOBALS['info'][25][10]==0?'<div class="__5t" onclick="return go.init({f:\'go.eT\'},this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.eT\'},this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div></div></div>')));
}
function saveFolderEdit($a) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][3]."`='".$GLOBALS['DB']->s($a[1])."',`".$GLOBALS['info'][2][37][7]."`='".$a[2]."' WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' LIMIT 1");
exit(json_encode(array('id'=>$a[0][1],'own'=>$a[0][0],'nm'=>$a[1],'lc'=>$a[2],'fo'=>alertBox::FO([$a[0][0],$a[0][1]]))));
}
function delFolC($a) {
$a[3] = 1;
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1")];
if ($GLOBALS['DB']->f($b[0])[0]==md5($a[1])) {
$a[3] = 0;
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][37][0]."` SET `".$GLOBALS['info'][2][37][5]."`='1' WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0][0]."' LIMIT 1");
if ($a[2]==0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."`,`".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`='0',`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][8]."`='0',`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][6]."`='1' WHERE `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][6]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][4]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][2]."` AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][3]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`!='1'");
}
$a[4] = alertBox::CNT();
exit(json_encode($a));
}
function deleteFolder($a) {
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c _box-pass" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);" style="margin: 0;"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1" id="_password">Удаление папки<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div><div class="__5f" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;"><div class="__5h">Извлечь содержимое перед удалением</div><div class="__5i"><div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" id="fol-del-st"><div class="__5u __5y"></div></div></div></div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.doc.delFolder('.htmlspecialchars(json_encode($a)).',this)" data-status="open"><div class="lg-1"></div><span>Удалить файл</span></button></div></div></div></div>')));
}
function infoFolder($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][3]."`,`".$GLOBALS['info'][2][37][4]."`,`".$GLOBALS['info'][2][37][6]."`,`".$GLOBALS['info'][2][37][7]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][37][5]."`='0' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])==0) exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Папка удалена или не существует.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
$b[1] = $GLOBALS['DB']->f($b[0]);
$b[2] = $GLOBALS['DB']->c("SELECT SUM(`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`) FROM `".$GLOBALS['info'][2][35][0]."`,`".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."`=`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][4]."` AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`=`".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][2]."` AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`!='1' AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][3]."`='".$a[1]."' AND `".$GLOBALS['info'][2][38][0]."`.`".$GLOBALS['info'][2][38][6]."`='0'");
$b[3] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][38][1]."`) FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][6]."`='0' AND `".$GLOBALS['info'][2][38][3]."`='".$a[1]."'");
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Информация о папке</div><div class="_2d"><div class="__16y"><div class="__16z">Описание</div></div><div class="__17a"><div class="__17b">Название</div><div class="__17c">'.$b[1][0].'</div></div><div class="__17a"><div class="__17b">Дата создания</div><div class="__17c" data-time="'.$b[1][1].'">'.$b[1][1].'</div></div><div class="__17a"><div class="__17b">Индекс</div><div class="__17c">'.$b[1][2].'</div></div><div class="__16y"><div class="__16z">Содержание</div></div><div class="__17a"><div class="__17b">Размер папки</div><div class="__17c">'.($b[2]==0?'-':fileSz($b[2])).'</div></div><div class="__17a"><div class="__17b">Количество файлов</div><div class="__17c">'.$b[3].'</div></div><div class="__16y"><div class="__16z">Источник</div></div><div class="__17a"><div class="__17b">Общий доступ</div><div class="__17c">'.($b[1][3]==0?'да':'нет').'</div></div><div class="__17a"><div class="__17b">Путь к папке</div><div class="__17c">https://infalike.com/folder'.$a[0].'_'.$a[1].'</div></div></div></div>')));
}
function auPMove($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][49][5]."` FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'AND `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])==0) exit(); else $b[0] = $GLOBALS['DB']->f($b[0])[0];
if ($a[3]!='') {
	$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][49][5]."` FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'AND `".$GLOBALS['info'][2][49][2]."`='".$a[3]."' LIMIT 1");
	if ($GLOBALS['DB']->n($b[1])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[1])[0];
	if ($b[0]<$b[1]) {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`=`".$GLOBALS['info'][2][49][5]."`-1 WHERE `".$GLOBALS['info'][2][49][5]."`>".$b[0]." AND `".$GLOBALS['info'][2][49][5]."`<=".$b[1]." AND `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' LIMIT 1");
	} else {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`=`".$GLOBALS['info'][2][49][5]."`+1 WHERE `".$GLOBALS['info'][2][49][5]."`>".$b[1]." AND `".$GLOBALS['info'][2][49][5]."`<".$b[0]." AND `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`='".$b[1]."'+1 WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' LIMIT 1");
	}
} else if ($a[2]!='') {
	$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][49][5]."` FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'AND `".$GLOBALS['info'][2][49][2]."`='".$a[2]."' LIMIT 1");
	if ($GLOBALS['DB']->n($b[1])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[1])[0];
	if ($b[0]<$b[1]) {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`=`".$GLOBALS['info'][2][49][5]."`-1 WHERE  `".$GLOBALS['info'][2][49][5]."`>".$b[0]." AND `".$GLOBALS['info'][2][49][5]."`<".$b[1]." AND `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`='".$b[1]."'-1 WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' LIMIT 1");
	} else {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`=`".$GLOBALS['info'][2][49][5]."`+1 WHERE `".$GLOBALS['info'][2][49][5]."`>=".$b[1]." AND `".$GLOBALS['info'][2][49][5]."`<".$b[0]." AND `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' LIMIT 1");
	}
}
}
function auMove($a) {
	$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][43][4]."` FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."'AND `".$GLOBALS['info'][2][43][3]."`='".$a[0]."' LIMIT 1")];
	if ($GLOBALS['DB']->n($b[0])==0) exit(); else $b[0] = $GLOBALS['DB']->f($b[0])[0];
	if ($a[3]!='') {
		$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][43][4]."` FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."'AND `".$GLOBALS['info'][2][43][3]."`='".$a[3]."' LIMIT 1");
		if ($GLOBALS['DB']->n($b[1])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[1])[0];
		if ($b[0]<$b[1]) {
			$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`=`".$GLOBALS['info'][2][43][4]."`-1 WHERE `".$GLOBALS['info'][2][43][4]."`>".$b[0]." AND `".$GLOBALS['info'][2][43][4]."`<=".$b[1]." AND `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."'");
			$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[0]."' LIMIT 1");
		} else {
			$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`=`".$GLOBALS['info'][2][43][4]."`+1 WHERE `".$GLOBALS['info'][2][43][4]."`>".$b[1]." AND `".$GLOBALS['info'][2][43][4]."`<".$b[0]." AND `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."'");
			$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`='".$b[1]."'+1 WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[0]."' LIMIT 1");
		}
	} else if ($a[2]!='') {
		$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][43][4]."` FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."'AND `".$GLOBALS['info'][2][43][3]."`='".$a[2]."' LIMIT 1");
		if ($GLOBALS['DB']->n($b[1])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[1])[0];
			if ($b[0]<$b[1]) {
				$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`=`".$GLOBALS['info'][2][43][4]."`-1 WHERE  `".$GLOBALS['info'][2][43][4]."`>".$b[0]." AND `".$GLOBALS['info'][2][43][4]."`<".$b[1]." AND `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."'");
				$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`='".$b[1]."'-1 WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[0]."' LIMIT 1");
			} else {
				$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`=`".$GLOBALS['info'][2][43][4]."`+1 WHERE `".$GLOBALS['info'][2][43][4]."`>=".$b[1]." AND `".$GLOBALS['info'][2][43][4]."`<".$b[0]." AND `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."'");
				$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][4]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[0]."' LIMIT 1");
			}
	}
}
function auText($a) {
//$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][8]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][1]."`='".$a[0]."' AND `".$GLOBALS['info'][2][42][3]."`='0' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])) $c = '<div>'.$GLOBALS['DB']->f($b[0])[0].'</div>'; else $c = '<div class="__20x">Empty</div>';
exit($c);
}
function auNext($a) {
$b = '';
if ($a[1]==0) {
if ($a[0][1][0]==0) {
	$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][43][4]."` FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$a[0][1][1]."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[0][0]."' LIMIT 1")];
	if ($GLOBALS['DB']->n($c[0])!=0) {
		$c[1] = $GLOBALS['DB']->f($c[0])[0];
		$c[2] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][43][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[0][1][1]."' AND `b`.`".$GLOBALS['info'][2][43][4]."`<'".$c[1]."' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT 1");
		if ($GLOBALS['DB']->n($c[2])!=0) {
			$c[3] = $GLOBALS['DB']->f($c[2]);
			$b = [array('lt'=>[$c[3][0],$a[0][1]],'add'=>($c[3][1]!=$_SESSION['id']?alertBox::auAdd($c[3][0]):2),'id'=>$c[3][0],'own'=>$c[3][1],'nm'=>$c[3][2],'au'=>$c[3][3],'dr'=>$c[3][4],'gr'=>$c[3][5],'bt'=>json_decode($c[3][7],true)['bt'],'cv'=>musicIcon($c[3][0]),'txt'=>$c[3][6],'dt'=>json_decode($c[3][7],true)),alertBox::auInfo($c[3][0])];
		}
	}
} else if ($a[0][1][0]==1) {
	$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][50][5]."` FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[0][1][1]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0][0]."' LIMIT 1")];
	if ($GLOBALS['DB']->n($c[0])!=0) {
		$c[1] = $GLOBALS['DB']->f($c[0])[0];
		$c[2] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][50][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][50][3]."` AND `b`.`".$GLOBALS['info'][2][50][2]."`='".$a[0][1][1]."' AND `b`.`".$GLOBALS['info'][2][50][5]."`<'".$c[1]."' AND `b`.`".$GLOBALS['info'][2][50][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][50][5]."` DESC LIMIT 1");
		if ($GLOBALS['DB']->n($c[2])!=0) {
			$c[3] = $GLOBALS['DB']->f($c[2]);
			$b = [array('lt'=>[$c[3][0],$a[0][1]],'add'=>($c[3][1]!=$_SESSION['id']?alertBox::auAdd($c[3][0]):2),'id'=>$c[3][0],'own'=>$c[3][1],'nm'=>$c[3][2],'au'=>$c[3][3],'dr'=>$c[3][4],'gr'=>$c[3][5],'bt'=>json_decode($c[3][7],true)['bt'],'cv'=>musicIcon($c[3][0]),'txt'=>$c[3][6],'dt'=>json_decode($c[3][7],true)),alertBox::auInfo($c[3][0])];
		}
	}
} else if ($a[0][1][0]==2) {
	//[["124",[2,"bel"]],0]
	$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][1]."`,`".$GLOBALS['info'][2][42][2]."`,`".$GLOBALS['info'][2][42][4]."`,`".$GLOBALS['info'][2][42][5]."`,`".$GLOBALS['info'][2][42][6]."`,`".$GLOBALS['info'][2][42][7]."`,`".$GLOBALS['info'][2][42][8]."`,`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][1]."`<".$a[0][0]."  AND `".$GLOBALS['info'][2][42][3]."`='0' AND (`".$GLOBALS['info'][2][42][4]."` LIKE '%".$a[0][1][1]."%' OR `".$GLOBALS['info'][2][42][5]."` LIKE '%".$a[0][1][1]."%') ORDER BY `".$GLOBALS['info'][2][42][1]."` DESC LIMIT 1")];
	if ($GLOBALS['DB']->n($c[0])!=0) {
		$c[3] = $GLOBALS['DB']->f($c[0]);
		$b = [array('lt'=>[$c[3][0],$a[0][1]],'add'=>($c[3][1]!=$_SESSION['id']?alertBox::auAdd($c[3][0]):2),'id'=>$c[3][0],'own'=>$c[3][1],'nm'=>$c[3][2],'au'=>$c[3][3],'dr'=>$c[3][4],'gr'=>$c[3][5],'bt'=>json_decode($c[3][7],true)['bt'],'cv'=>musicIcon($c[3][0]),'txt'=>$c[3][6],'dt'=>json_decode($c[3][7],true)),alertBox::auInfo($c[3][0])];
	}
}
} else {
if ($a[0][1][0]==0) {
	$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][43][4]."` FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$a[0][1][1]."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[0][0]."' LIMIT 1")];
	if ($GLOBALS['DB']->n($c[0])!=0) {
		$c[1] = $GLOBALS['DB']->f($c[0])[0];
		$c[2] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][43][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[0][1][1]."' AND `b`.`".$GLOBALS['info'][2][43][4]."`>'".$c[1]."' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` LIMIT 1");
		if ($GLOBALS['DB']->n($c[2])!=0) {
			$c[3] = $GLOBALS['DB']->f($c[2]);
			$b = [array('lt'=>[$c[3][0],[0,$a[0][1][1]]],'add'=>($c[3][1]!=$_SESSION['id']?alertBox::auAdd($c[3][0]):2),'id'=>$c[3][0],'own'=>$c[3][1],'nm'=>$c[3][2],'au'=>$c[3][3],'dr'=>$c[3][4],'gr'=>$c[3][5],'bt'=>json_decode($c[3][7],true)['bt'],'cv'=>musicIcon($c[3][0]),'txt'=>$c[3][6],'dt'=>json_decode($c[3][7],true)),alertBox::auInfo($c[3][0])];
		}
	}
} else if ($a[0][1][0]==1) {
	$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][50][5]."` FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[0][1][1]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0][0]."' LIMIT 1")];
	if ($GLOBALS['DB']->n($c[0])!=0) {
		$c[1] = $GLOBALS['DB']->f($c[0])[0];
		$c[2] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][50][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][50][3]."` AND `b`.`".$GLOBALS['info'][2][50][2]."`='".$a[0][1][1]."' AND `b`.`".$GLOBALS['info'][2][50][5]."`>'".$c[1]."' AND `b`.`".$GLOBALS['info'][2][50][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][50][5]."` DESC LIMIT 1");
		if ($GLOBALS['DB']->n($c[2])!=0) {
			$c[3] = $GLOBALS['DB']->f($c[2]);
			$b = [array('lt'=>[$c[3][0],$a[0][1]],'add'=>($c[3][1]!=$_SESSION['id']?alertBox::auAdd($c[3][0]):2),'id'=>$c[3][0],'own'=>$c[3][1],'nm'=>$c[3][2],'au'=>$c[3][3],'dr'=>$c[3][4],'gr'=>$c[3][5],'bt'=>json_decode($c[3][7],true)['bt'],'cv'=>musicIcon($c[3][0]),'txt'=>$c[3][6],'dt'=>json_decode($c[3][7],true)),alertBox::auInfo($c[3][0])];
		}
	}
} else if ($a[0][1][0]==2) {
	$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][1]."`,`".$GLOBALS['info'][2][42][2]."`,`".$GLOBALS['info'][2][42][4]."`,`".$GLOBALS['info'][2][42][5]."`,`".$GLOBALS['info'][2][42][6]."`,`".$GLOBALS['info'][2][42][7]."`,`".$GLOBALS['info'][2][42][8]."`,`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][1]."`>".$a[0][0]."  AND `".$GLOBALS['info'][2][42][3]."`='0' AND (`".$GLOBALS['info'][2][42][4]."` LIKE '%".$a[0][1][1]."%' OR `".$GLOBALS['info'][2][42][5]."` LIKE '%".$a[0][1][1]."%') ORDER BY `".$GLOBALS['info'][2][42][1]."` DESC LIMIT 1")];
	if ($GLOBALS['DB']->n($c[0])!=0) {
		$c[3] = $GLOBALS['DB']->f($c[0]);
		$b = [array('lt'=>[$c[3][0],$a[0][1]],'add'=>($c[3][1]!=$_SESSION['id']?alertBox::auAdd($c[3][0]):2),'id'=>$c[3][0],'own'=>$c[3][1],'nm'=>$c[3][2],'au'=>$c[3][3],'dr'=>$c[3][4],'gr'=>$c[3][5],'bt'=>json_decode($c[3][7],true)['bt'],'cv'=>musicIcon($c[3][0]),'txt'=>$c[3][6],'dt'=>json_decode($c[3][7],true)),alertBox::auInfo($c[3][0])];
	}
}
}
exit(json_encode($b));
}
function auCon($a) {
if (gettype($a)!="array") exit(); else $a[2] = [];
$c = [music([$a[0]['i'],$a[1]])];
$c[1] = sizeof($c[0]);
for ($c[2]=0;$c[2]<$c[1];$c[2]++) $a[2][] = $c[0][$c[2]];
exit(json_encode($a));
/*

$c[2] = [music([$_SESSION['id'],0])];
$c[2][1] = sizeof($c[2][0]);


$b[2] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][43][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[0][1]."' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT ".$a[1].",30");
//$b[0] = [$a[0],[]];
if ($a[0][0]=='0') {
$b[2] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][43][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[0][1]."' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT ".$a[1].",30");
$b[1] = $GLOBALS['DB']->n($b[2]);
for ($b[3]=0;$b[3]<$b[1];$b[3]++) {
$b[4] = $GLOBALS['DB']->f($b[2]);
array_push($b[0][1],array('lt'=>$a[0],'add'=>($b[4][1]!=$_SESSION['id']?alertBox::auAdd($b[4][0]):2),'id'=>$b[4][0],'own'=>$b[4][1],'nm'=>$b[4][2],'au'=>$b[4][3],'dr'=>$b[4][4],'gr'=>$b[4][5],'bt'=>json_decode($b[4][7],true)['bt'],'cv'=>musicIcon($b[4][0]),'txt'=>$b[4][6]));
}
}
exit(json_encode($b[0]));
*/
}
function auData($a) {
$b = '';
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][1]."`='".$a."' AND `".$GLOBALS['info'][2][42][3]."`='0' LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])!=0) {
$b = [$a,json_decode($GLOBALS['DB']->f($c[0])[0],true)];
}
exit(json_encode($b));
}
function auInfo($a) {
if ($a!=0) {
$b = [$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][44][1]."`) FROM `".$GLOBALS['info'][2][44][0]."` WHERE `".$GLOBALS['info'][2][44][2]."`='".$a."' AND `".$GLOBALS['info'][2][44][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][44][4]."`='0' LIMIT 1")];
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][2]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][1]."`='".$a."' LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])!=0) {
$c[1] = $GLOBALS['DB']->f($c[0])[0];
if ($c[1]!=$_SESSION['id']) $c[2] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][54][1]."`) FROM `".$GLOBALS['info'][2][54][0]."` WHERE `".$GLOBALS['info'][2][54][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][54][3]."`='".$c[1]."' AND `".$GLOBALS['info'][2][54][4]."`='0' LIMIT 1"); else $c[2] = 2;
$c[3] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][31][4]."` FROM `".$GLOBALS['info'][2][31][0]."` WHERE `".$GLOBALS['info'][2][31][2]."`='".$c[1]."' AND `".$GLOBALS['info'][2][31][5]."`='0' ORDER BY `".$GLOBALS['info'][2][31][1]."` DESC LIMIT 1");
if ($GLOBALS['DB']->n($c[3])!=0) $c[4] = '<img src="'.json_decode($GLOBALS['DB']->f($c[3])[0])[4][2].'" width="34" height="34" class="photo">'; else $c[4] = '<div class="__22w"></div>';
$c[5] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][44][1]."`) FROM `".$GLOBALS['info'][2][44][0]."` WHERE `".$GLOBALS['info'][2][44][2]."`='".$a."' AND `".$GLOBALS['info'][2][44][4]."`='0'");
$b[1] = '<div class="__22r">

<div class="__22s">
<div class="__22t"><img class="photo" src="/sources/es.jpg" height="36" width="36"></div>
<div class="__22t"><img class="photo" src="/sources/tl.jpg" height="36" width="36"></div>
<div class="__22t"><img class="photo" src="/sources/ew.jpeg" height="36" width="36"></div>
</div>

<div class="__22q"  onclick="return go.audio.like('.htmlspecialchars(json_encode([$a])).');">

<div class="__22p" id="l-au-'.$a.'">'.$c[5].'</div><div class="__22p0"><div class="__22p1">People</div><div class="__22p2">Liked</div></div></div>

</div>';
/*
<div class="__22s">
<div class="__22t"><img class="photo" src="/sources/es.jpg" height="34" width="34"></div>
<div class="__22t"><img class="photo" src="/sources/tl.jpg" height="34" width="34"></div>
<div class="__22t"><img class="photo" src="/sources/rg.jpg" height="34" width="34"></div>
<div class="__22t"><img class="photo" src="/sources/es.jpg" height="34" width="34"></div>
<div class="__22t"><img class="photo" src="/sources/b.jpg" height="34" width="34"></div>
<div class="__22t"><img class="photo" src="/sources/ew.jpeg" height="34" width="34"></div>
</div>


<button class="__22u1" onmousedown="return go.stop(event);" onclick="return go.audio.like('.htmlspecialchars(json_encode([$a])).');">Посмотреть</button>



'.($c[2]!=2?($c[2]!=0?'<button class="__22u0" onmousedown="return go.stop(event);" onmouseover="return go.unf(this)" id="f1-'.$c[1].'" onclick="return go.unfollow('.htmlspecialchars(json_encode([$c[1]])).')"><span>Following</span><span class="invisible">Unfollow</span></button>':'<button class="__22u" id="f1-'.$c[1].'" onmousedown="return go.stop(event);" onclick="return go.follow('.htmlspecialchars(json_encode([$c[1]])).')">Follow</button>'):'<a href="/settings?section=privacy" class="no-link" onclick="return go.link(this,event)"><button class="__22u1" onmousedown="return go.stop(event);">Settings</button></a>').'


<div class="__22s">'.$c[4].'</div><div class="__22t"><div class="__22t0"><div class="__22t1">Justin Timberlake</div><div class="__22t2">timberlake</div></div></div>


<div class="__22q" onclick="return go.audio.like('.htmlspecialchars(json_encode([$a])).');" id="l-au-'.$a.'"><span class="__22p">'.$c[5].'</span> '.($c[5]!=1?'Likes':'Like').'</div><div class="__22t"><div class="__22s">'.$c[4].'</div>'.($c[2]!=2?($c[2]!=0?'<button class="__22u0"  onmouseover="return go.unf(this)" id="f1-'.$c[1].'" onclick="return go.unfollow('.htmlspecialchars(json_encode([$c[1]])).')"><span>Following</span><span class="invisible">Unfollow</span></button>':'<button class="__22u" id="f1-'.$c[1].'" onclick="return go.follow('.htmlspecialchars(json_encode([$c[1]])).')">Follow</button>'):'<a href="/settings?section=privacy" class="no-link" onclick="return go.link(this,event)"><button class="__22u1">Settings</button></a>').'</div>
*/
$b[2] = $a;
}
return $b;
} else return [2,'<div class="__23e">Listen unlimited music free</div>',$a];
}
function auPlistI($b,$a,$d,$c=0) {//[['.$b[0].',"Wake Me Up","Avicii","272","0",1,"\/sources\/def.png"],[0,"1"]]
/*
["123","1","0","Burn","Ellie Goulding","238","0","{\"bt\":1,\"src\":\"http:\/\/au.infalike.com\/list\/cf7c\/a053\/1\/cf7ca0531d992b10b8e8a45a61ef569f.mp3\",\"tm\":\"2017-11-12 12:43:24\"}"]

return go.audio.sel([["123","Burn","Ellie Goulding","238","0",1,"\/sources\/def.png"],[0,"1"]])

$b = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][3]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][50][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][50][3]."`=`a`.`".$GLOBALS['info'][2][42][1]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][50][4]."`='0' AND `b`.`".$GLOBALS['info'][2][50][2]."`='".$a[0]."' ORDER BY `b`.`".$GLOBALS['info'][2][50][5]."` DESC LIMIT ".$a[1].",20")];

$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
*/
return '<div class="__25j" id="playlist-'.$b[0].'" data-pl'.$b[0].' data-id="'.$b[0].'" data-plt="'.$a[1].'"><div class="__25d" onclick="return go.audio.sel('.htmlspecialchars(json_encode([[$b[0],$b[3],$b[4],$b[5],$b[6],$b[1],musicIcon($b[0])],$a])).')"><div class="__25e __25e0"></div><div class="__25f"><div class="__25g __25g0"><div class="__25k"><div class="__25m">'.$b[4].'</div><div class="__25n">'.$b[3].'</div></div><div class="__25l"><div class="__25l1">'.$b[5].'</div><div class="__25l0">0:00</div></div></div><div class="__25ha"></div></div></div>'.($c==0?'<div class="__25i __25i0" onclick="return go.audio.pLSel(this,'.htmlspecialchars(json_encode([$d,$b[0]])).')" data-id="0"></div>':'<div class="__25i" onclick="return go.audio.pLSel(this,'.htmlspecialchars(json_encode([$d,$b[0]])).')" data-id="1"></div>').'</div>';
}
function auPlistUpS($a) {
$b = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][3]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][50][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][50][3]."`=`a`.`".$GLOBALS['info'][2][42][1]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][50][4]."`='0' AND `b`.`".$GLOBALS['info'][2][50][2]."`='".$a[0]."' ORDER BY `b`.`".$GLOBALS['info'][2][50][5]."` DESC LIMIT ".$a[1].",20")];
$b[1] = $GLOBALS['DB']->n($b[0]);
$b[2] = [];
for ($c=0;$c<$b[1];$c++) $b[2][] = $GLOBALS['DB']->f($b[0]);
return $b;
}
function pLC($a) {
$b = 1;
if ($a[1]==$_SESSION['id']) $b = 0;
return $b;
}
function auPlistDel($a) {
//$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][48][2]."` FROM `".$GLOBALS['info'][2][48][0]."` WHERE `".$GLOBALS['info'][2][48][1]."`='".$a[0]."' AND `".$GLOBALS['info'][2][48][5]."`='0' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])==0) exit(); $b[1] = alertBox::pLC([$a[0],$GLOBALS['DB']->f($b[0])[0]]);
if ($b[1]==0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][48][0]."` SET `".$GLOBALS['info'][2][48][5]."`='1' WHERE `".$GLOBALS['info'][2][48][1]."`='".$a[0]."' LIMIT 1"); else $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][4]."`='1' WHERE `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][49][3]."`='".$a[1]."' LIMIT 1");
$b[2] = plistC($a[1]);
exit($b[2].' плейлист'.($b[2]!=1?'а':''));
}
function auPlistEdSave($a) {
$b = $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][48][0]."` SET `".$GLOBALS['info'][2][48][3]."`='".$GLOBALS['DB']->s($a['m'])."',`".$GLOBALS['info'][2][48][4]."`='".$a['i']."',`".$GLOBALS['info'][2][48][6]."`='".$a['t']."' WHERE `".$GLOBALS['info'][2][48][1]."`='".$a['id']."' LIMIT 1");
$a['i'] = $a['i']!=''?'<img class="photo" width="130" height="130" src="'.$a['i'].'">':'<div class="__24m"><div class="__24n"></div><div class="__24o"></div></div>';
$a['d'] = [alertBox::auPlistCount($a['id']),alertBox::auPlistSum($a['id'])];
exit(json_encode($a));
}
function auPlistEdUpdate($a) {
$b = ['',alertBox::auPlistUpS([$a[0][2],$a[1]])];
for ($b[3]=0;$b[3]<$b[1][1];$b[3]++) $b[0] .= alertBox::auPlistI($b[1][2][$b[3]],[1,$a[0][2]],$a[0][1],alertBox::checkPlist([$b[1][2][$b[3]][0],$a[0][1]]));
$a[3] = $b[0];
exit(json_encode($a));
}
function auPlistUpdate($a) {
$b = ['',alertBox::auPlistUpS([$a[0],$a[1]])];
for ($b[3]=0;$b[3]<$b[1][1];$b[3]++) $b[0] .= alertBox::auPlistI($b[1][2][$b[3]],[1,$a[0]],$a[0]);
$a[3] = $b[0];
exit(json_encode($a));
}
function muSearch($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][1]."`,`".$GLOBALS['info'][2][42][2]."`,`".$GLOBALS['info'][2][42][3]."`,`".$GLOBALS['info'][2][42][4]."`,`".$GLOBALS['info'][2][42][5]."`,`".$GLOBALS['info'][2][42][6]."`,`".$GLOBALS['info'][2][42][7]."`,`".$GLOBALS['info'][2][42][8]."`,`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][3]."`='0' AND `".$GLOBALS['info'][2][42][4]."` LIKE '%".$a[0]."%' OR `".$GLOBALS['info'][2][42][5]."` LIKE '%".$a[0]."%' ORDER BY `".$GLOBALS['info'][2][42][1]."` DESC LIMIT ".$a[1].",".$a[2])];
$b[1] = $GLOBALS['DB']->n($b[0]);
return $b;
}
function auPlSearch($a) {
//$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
$b = [alertBox::muSearch([$a[0],$a[2],$a[3]])];
if ($b[0][1]!=0) $c = [1,[],$a[0]]; else $c = [0,'<div class="__26q">Ничего не найдено</div>',$a[0]];
for ($b[1]=0;$b[1]<$b[0][1];$b[1]++) {
$b[2] = $GLOBALS['DB']->f($b[0][0]);
$c[1][] = [$b[2],musicIcon($b[2][0]),$a[1],alertBox::checkPlist([$b[2][0],$a[1]]),[2,$a[0]]];
}
exit(json_encode($c));
}
function playList($a) {
$b = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$a[0]."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT ".$a[1].",30")];
$b[1] = $GLOBALS['DB']->n($b[0]);
return $b;
/*
$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT 30")
$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist

$info[2][50] = ['_audio_playlist_list','id','plst','au','ss','ct'];//audio playlist list
*/
}
function playListCount($a) {
return $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][50][1]."`) FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a."' AND `".$GLOBALS['info'][2][50][4]."`='0'");
}
function crt($a=0) {
return ($a>999&&$a<999999)?(number_format(($a/1000),1)+0).'K':(($a>999999&&$a<999999999)?(number_format(($a/1000000),1)+0).'M':(($a>999999999&&$a<999999999999)?(number_format(($a/1000000000),1)+0).'B':$a));
}
function auPlAdd($a) {
$b = [$a[1],[]];
if ($a[1][0]==0) {
$c = [alertBox::aPl([$a[1][2],$a[0]])];
$c[1] = $GLOBALS['DB']->n($c[0]);
for ($c[2]=0;$c[2]<$c[1];$c[2]++) {
$c[3] = $GLOBALS['DB']->f($c[0]);
$b[1][] = [$c[3],musicIcon($c[3][0]),$a[1][1],alertBox::checkPlist([$c[3][0],$a[1][1]]),[0,$_SESSION['id']]];
}
//alertBox::checkPlist([$b[4][0],$a[1]])
} else if ($a[1][0]==1) {
//[0,[1,"2","1"]]
$c = [alertBox::playList([$_SESSION['id'],$a[0]])];
$b[1] = '';
for ($c[1]=0;$c[1]<$c[0][1];$c[1]++) {
$c[2] = $GLOBALS['DB']->f($c[0][0]);
$b[1] .= '<div class="__26x" onclick="return go.audio.plSCh('.htmlspecialchars(json_encode([2,[2,$a[1][1],$c[2][0]]])).')"><div class="__26y">'.($c[2][3]!=''?'<img src="'.json_decode($c[2][3],true)['nm'].'" class="photo" width="130" height="130">':'<div class="__24m"><div class="__24n"></div><div class="__24o"></div></div>').'</div><div class="__26z"><div class="__26z0"><div class="__26z2"></div>'.alertBox::crt(alertBox::playListCount($c[2][0])).'</div><div class="__26z1">'.$c[2][2].'</div></div></div>';
}
} else if ($a[1][0]==2) {
$c = [alertBox::auPlistUpS([$a[1][2],0])];
$b[1] = '';
for ($c[1]=0;$c[1]<$c[0][1];$c[1]++) $b[1] .= alertBox::auPlistI($c[0][2][$c[1]],[1,$a[1][2]],$a[1][1],alertBox::checkPlist([$c[0][2][$c[1]][0],$a[1][1]]));
}
exit(json_encode($b));
}
function aPL($a) {
return $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][3]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][43][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[0]."' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT ".$a[1].",20");
}
function checkPlist($a) {
$c = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][50][1]."`) FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[1]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0]."' AND `".$GLOBALS['info'][2][50][4]."`='0' LIMIT 1");
return $c!=0?0:1;
}
function auPlistSearch($a) {
if ($a[0]==1) {
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
*/
$b = ['<div class="__26q">Вы не добавляли аудиозаписей</div>',alertBox::aPl([$_SESSION['id'],0])];
$b[2] = $GLOBALS['DB']->n($b[1]);
if ($b[2]!=0) $b[0] = '';
for ($b[3]=0;$b[3]<$b[2];$b[3]++) {
$b[4] = $GLOBALS['DB']->f($b[1]);
$b[0] .= alertBox::auPlistI($b[4],[0,1],$a[1],alertBox::checkPlist([$b[4][0],$a[1]]));
}
$b[5] = alertBox::auPlistSum($a[1]);
$b[6] = alertBox::auPlistCount($a[1]);
echo '<div class="__26j"><div class="__26j0"><div class="__26k"><div class="__25u"></div><input type="text" class="__26l" placeholder="Поиск по аудиозаписям" onkeyup="return go.audio.plS(this,'.htmlspecialchars(json_encode([$a[1]])).',event)"><div class="__26l0" onclick="return go.audio.plReturn();"></div></div></div><div class="__26n" data-svw="scroll-vw" data-sort="pl-au-l" data-attr="'.htmlspecialchars(json_encode([1,[0,$a[1],$_SESSION['id']]])).'">'.$b[0].'</div><div class="__26p"><div class="__25a">'.$b[6].' аудиозапис'.($b[6]>1?'ей':'ь').'</div><div class="__25a0">'.$b[5].'</div><button class="__26m" onmouseenter="return go.audio.viewPListOp(this.firstChild,go.stop(event));" onmousedown="return go.stop(event);"><div class="__26m0 hide"><div class="__4y __6z" onclick="return go.audio.plSCh('.htmlspecialchars(json_encode([1,[0,$a[1],$_SESSION['id']]])).',this)">My music</div><div class="__4y __6z" onclick="return go.audio.plSCh('.htmlspecialchars(json_encode([1,[1,$a[1],$_SESSION['id']]])).',this)">Playlists</div><div class="__4y __6z" onclick="return go.audio.delPlaylist()">Delete Playlist</div></div></button></div></div>';
} else {
$b = ['',alertBox::auPlistUpS([$a[1],0])];
for ($b[3]=0;$b[3]<$b[1][1];$b[3]++) $b[0] .= alertBox::auPlistI($b[1][2][$b[3]],[1,$a[1]],$a[1]);
echo '<div class="__25c" data-svw="scroll-vw" data-sort="__25c0" data-attr="'.htmlspecialchars(json_encode([0,$a[1]])).'">'.($b[0]!=''?$b[0]:'<div class="__27b">Здесь пока нет аудиозаписей</div>').'</div>';	
}
}
function auPlistMove($a) {
/*
Array
(
    [0] => 123
    [1] => 2
    [2] => 121   .prev()
    [3] => 120   .next()
	[4] => 2
)

$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
$info[2][43] = ['_audio_u','id','own','au','ct','ss','dt'];//audio user
$info[2][44] = ['_audio_lk','id','au','own','ss'];//audio like
$info[2][45] = ['_audio_al','id','own','src','nm','dt','ss'];//audio album
$info[2][46] = ['_audio_al_lt','id','al','au','ct','ss'];//audio album list
$info[2][47] = ['_audio_al_add','id','own','al','ct','ss'];//audio album user
$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
$info[2][49] = ['_audio_playlist_add','id','plst','own','ss','ct'];//audio playlist add
$info[2][50] = ['_audio_playlist_list','id','plst','au','ss','ct'];//audio playlist list

*/
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][50][5]."` FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[4]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0]."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])==0) exit(); else $b[0] = $GLOBALS['DB']->f($b[0])[0];
if ($a[3]!='') {
	$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][50][5]."` FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[4]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[3]."' LIMIT 1");
	if ($GLOBALS['DB']->n($b[1])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[1])[0];
	if ($b[0]<$b[1]) {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`=`".$GLOBALS['info'][2][50][5]."`-1 WHERE `".$GLOBALS['info'][2][50][5]."`>".$b[0]." AND `".$GLOBALS['info'][2][50][5]."`<=".$b[1]." AND `".$GLOBALS['info'][2][50][2]."`='".$a[4]."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[4]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0]."' LIMIT 1");
	} else {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`=`".$GLOBALS['info'][2][50][5]."`+1 WHERE `".$GLOBALS['info'][2][50][5]."`>".$b[1]." AND `".$GLOBALS['info'][2][50][5]."`<".$b[0]." AND `".$GLOBALS['info'][2][50][2]."`='".$a[4]."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`='".$b[1]."'+1 WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[4]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0]."' LIMIT 1");
	}
} else if ($a[2]!='') {
	$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][50][5]."` FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[4]."'AND `".$GLOBALS['info'][2][50][3]."`='".$a[2]."' LIMIT 1");
	if ($GLOBALS['DB']->n($b[1])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[1])[0];
	if ($b[0]<$b[1]) {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`=`".$GLOBALS['info'][2][50][5]."`-1 WHERE  `".$GLOBALS['info'][2][50][5]."`>".$b[0]." AND `".$GLOBALS['info'][2][50][5]."`<".$b[1]." AND `".$GLOBALS['info'][2][50][2]."`='".$a[4]."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`='".$b[1]."'-1 WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[4]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0]."' LIMIT 1");
	} else {
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`=`".$GLOBALS['info'][2][50][5]."`+1 WHERE `".$GLOBALS['info'][2][50][5]."`>=".$b[1]." AND `".$GLOBALS['info'][2][50][5]."`<".$b[0]." AND `".$GLOBALS['info'][2][50][2]."`='".$a[4]."'");
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][5]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][50][2]."`='".$a[4]."' AND `".$GLOBALS['info'][2][50][3]."`='".$a[0]."' LIMIT 1");
	}
}
}
function auPlistAdd($b) {
if ($b[0]==1) {
$c = [$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][50][1]."`) FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$b[1][0]."' AND `".$GLOBALS['info'][2][50][3]."`='".$b[1][1]."'")];
if ($c[0]==0) {
$c[1] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][50][5]."`) FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$b[1][0]."'")+1;
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][50][0]."` VALUES(NULL,".$b[1][0].",".$b[1][1].",'0',".$c[1].")");
} else $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][4]."`='0' WHERE `".$GLOBALS['info'][2][50][2]."`='".$b[1][0]."' AND `".$GLOBALS['info'][2][50][3]."`='".$b[1][1]."'");
$b[0] = 0;
} else {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][50][0]."` SET `".$GLOBALS['info'][2][50][4]."`='1' WHERE `".$GLOBALS['info'][2][50][2]."`='".$b[1][0]."' AND `".$GLOBALS['info'][2][50][3]."`='".$b[1][1]."' LIMIT 1");
$b[0] = 1;
}
$b[2] = [alertBox::auPlistCount($b[1][0]),alertBox::auPlistSum($b[1][0])];
exit(json_encode($b));
}
function auPlistCount($a) {
return $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][50][1]."`) FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a."' AND `".$GLOBALS['info'][2][50][4]."`='0'");
}
function auPlistSum($a) {
$b = [$GLOBALS['DB']->c("SELECT SUM(`a`.`".$GLOBALS['info'][2][42][6]."`) FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][50][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][50][3]."`=`a`.`".$GLOBALS['info'][2][42][1]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][50][4]."`='0' AND `b`.`".$GLOBALS['info'][2][50][2]."`='".$a."'")];
if ($b[0]!=0) {
$b[1] = $b[0]%60;
$b[2] = number_format(($b[0]/60),0);
$b[3] = $b[2]%60;
$b[4] = number_format(($b[2]/60),0);
return ($b[4]!=0?$b[4].' Час'.($b[4]>1?'a':'').' ':'').($b[3]!=0?$b[3].' Минут ':'').($b[1]!=0?$b[1].' секунд':'');
} else return '';
}
function delPlist($a) {
//$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][48][2]."`,`".$GLOBALS['info'][2][48][3]."` FROM `".$GLOBALS['info'][2][48][0]."` WHERE `".$GLOBALS['info'][2][48][1]."`='".$a[0]."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box" data-id="'.$a[0].'"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Удаление плейлиста</div><div class="_2d"><div class="_2e">Вы действительно хотите удалить плейлист <span style="font-weight: bold; color: black;">'.$b[1][1].'</span>?'.(alertBox::pLC([$a[0],$b[1][0]])!=1?'<br>Он пропадёт у всех пользователей, которые добавили его к себе.':'').'</div><div class="_2f"><div class="_2g bt" onclick="return go.audio.plDel();">YES, DELETE</div></div></div></div>')));
} else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Удаление плейлиста</div><div class="_2d"><div class="_2e">Playlist was deleted or doesn\'t exist.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
}
function plistS($a) {
$b = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$a[0]."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT ".$a[1].",".$a[2])];
$b[1] = $GLOBALS['DB']->n($b[0]);
return $b;
}
function auPC($a) {
$b = [alertBox::plistS([$_SESSION['id'],$a,30])];
$b[3] = '';
for ($b[1]=0;$b[1]<$b[0][1];$b[1]++) {
$b[2] = $GLOBALS['DB']->f($b[0][0]);
$b[3] .= plist([$b[2],0,alertBox::pLC([$b[2][0],$b[2][1]])]);
}
echo $b[3];
}
function auPlistC($a) {
$b = [$a[0],''];
$c = [alertBox::auPlistUpS([$a[0],$a[1]])];
for ($c[1]=0;$c[1]<$c[0][1];$c[1]++) $b[1] .= alertBox::plstC([$c[0][2][$c[1]],$a[0]]);
exit(json_encode($b));
}
function plstC($a) {
return '<div class="__24q16 __24q16-'.$a[0][0].'" onclick="return go.audio.sel('.htmlspecialchars(json_encode([[$a[0][0],$a[0][3],$a[0][4],$a[0][5],$a[0][6],json_decode($a[0][7],true)['bt'],musicIcon($a[0][0])],[1,$a[1]]])).')"><div class="__25e __25e0"></div><div class="__25f __24q17"><div class="__25g __25g0 __24q17"><div class="__25k"><div class="__25m __24q20">'.$a[0][4].'</div><div class="__25n __24q20">'.$a[0][3].'</div></div><div class="__25l"><div class="__25l1">'.$a[0][5].'</div><div class="__25l0">0:00</div></div></div><div class="__24q17 __24q17a"></div></div></div>';
}
function auPlistOwner($a,$d = 0) {
$c = '<span class="color: grey; font-weight: bold;">Deleted</span>';
$b = ['',$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][17][1]."`,`a`.`".$GLOBALS['info'][2][17][2]."`,`a`.`".$GLOBALS['info'][2][17][3]."`,`b`.`".$GLOBALS['info'][2][2][2]."` FROM `".$GLOBALS['info'][2][17][0]."` AS `a`,`".$GLOBALS['info'][2][2][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][17][1]."`='".$a."' AND `a`.`".$GLOBALS['info'][2][17][1]."`=`b`.`".$GLOBALS['info'][2][2][1]."` AND (`b`.`".$GLOBALS['info'][2][2][3]."`='0' OR `b`.`".$GLOBALS['info'][2][2][3]."`='1') LIMIT 1")];
if ($GLOBALS['DB']->n($b[1])!=0) {
$b[2] = $GLOBALS['DB']->f($b[1]);
$c = '<a href="'.$b[2][3].'" data-id="'.$b[2][0].'" title="'.$b[2][1].' '.$b[2][2].'" onclick="return go.page(this,event);" onmouseenter="return go.pageI(this,event)" class="__24q24"><span class="__24q15 '.($d!=0?'__24q15a':'').'">'.$b[2][1].' '.$b[2][2].'</span></a>';
}
return $c;
}
function vPST($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][48][2]."`,`".$GLOBALS['info'][2][48][3]."`,`".$GLOBALS['info'][2][48][4]."`,`".$GLOBALS['info'][2][48][6]."` FROM `".$GLOBALS['info'][2][48][0]."` WHERE `".$GLOBALS['info'][2][48][1]."`='".$a[0]."' AND `".$GLOBALS['info'][2][48][5]."`='0' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$b[2] = alertBox::auPlistUpS([$a[0],0]);
if ($b[2][1]!=0) $b[4] = ''; else $b[4] = '<div class="__24q21">В этом плейлисте нет аудиозаписи</div>';
$b[5] = [alertBox::auPlistSum($a[0]),alertBox::auPlistCount($a[0]),alertBox::auPlistOwner($b[1][0])];
for ($b[3]=0;$b[3]<$b[2][1];$b[3]++) $b[4] .= alertBox::plstC([$b[2][2][$b[3]],$a[0]]);
$b[6] = plChk($a[0]);
exit(json_encode(array('w'=>600,'html'=>'<div class="_2b _2b1" style="width: 600px;" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" style="margin-left: 569px;" onclick="return load.marginOff()"></div><div class="_m1">'.$b[1][1].'</div><div class="_2d"><div class="__24q1"><div class="__24q2">'.($b[1][2]!=''?'<img src="'.$b[1][2].'" class="photo" width="120" height="120">':'<div class="__24q __24q22"><div class="__24q0"></div></div>').'</div><div class="__24q7">'.$b[1][1].'</div><div class="__24q14">'.$b[5][2].'</div><div class="__24q8">'.$b[1][3].'</div><div class="__24q9"><button class="__24q10 __24q10-'.$a[0].'" data-id="'.$a[0].'" onclick="return go.audio.plistPLAY(this,'.htmlspecialchars(json_encode([$a[0]])).',go.stop(event));"><div class="__24q11"></div><span>Слушать весь плейлист</span></button>'.($a[1]==0?'<button class="__24q10 __24q12" onmouseenter="return go.audio.plOpV(this,event)"><div class="__24q13"></div><div class="__26g" style="margin-left: -73px;"><div class="__7a" style="margin: -16px 0 0 76px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0;"></div></div><div class="__4y __6z" id="_au-l" onclick="return go.audio.delPt(\''.htmlspecialchars($b[1][1]).'\');">Удалить</div><div class="__4y __6z">Поделиться</div></div></button>':($b[6]==0?'<div class="__27m __27m'.$a[0].'" onclick="return go.audio.plList('.htmlspecialchars(json_encode([$a[0]])).',this)" data-id="1"><div class="__27n"></div><div class="__27o"></div></div>':($b[6]==1?'<div class="__27m __27m'.$a[0].'" data-c="'.$a[0].'" onclick="return go.audio.plList('.htmlspecialchars(json_encode([$a[0]])).',this)" data-id="0"><div class="__27n" style="margin-top: -37px;"></div><div class="__27o"></div></div>':'')).'<div class="__27m __27p"><div class="__27p0"></div></div>').'</div><div class="__24q4"><button class="__24q5 __24q6">All tracks'.($b[5][1]!=0?' ('.$b[5][1].')':'').'</button><div class="__24q23">'.$b[5][0].'</div></div></div><div id="plst-b"><div class="__24q3" data-id="'.$a[0].'" data-s="'.($b[2][1]==20?0:1).'">'.$b[4].'</div></div></div></div>')));
} else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Playlist was deleted or doesn\'t exist.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
}
function auPB($a,$z) {
$b = [''];
if ($a[0]==4) {
$c = [plistC($_SESSION['id'])];
$c[1] = ['<div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">Объединяйте аудиозаписи в плейлисты по жанрам или по настроению. <span class="__22o0" onclick="return go.audio.newPList()">добавить плейлист</span>.</div>','<div class="__24b"><div class="__24l"><div class="__24la">Music playlist</div><div class="__24lb">'.$c[0].' плейлист'.($c[0]!=1?'а':'').'</div></div> <div class="__24k" onclick="return go.audio.newPList()"></div></div>'];
if ($c[0]!=0) {
$c[2] = [alertBox::plistS([$_SESSION['id'],0,30])];
$c[1][0] = '';
for ($c[2][1]=0;$c[2][1]<$c[2][0][1];$c[2][1]++) {
$c[2][2] = $GLOBALS['DB']->f($c[2][0][0]);
$c[1][0] .= plist([$c[2][2],0,alertBox::pLC([$c[2][2][0],$c[2][2][1]])]);
}
$c[1][0] = '<div class="__19b0">'.$c[1][0].'</div>';
}
return $c[1][1].'<div class="__19ba">'.$c[1][0].'</div>';
} else if ($a[0]==1) {
$c = ['<div class="__21c"><div class="__21c0"></div></div><div class="__22o">Доступ ограничен. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div>','<div class="__24b"><div class="__24l"><div class="__24la">Music playlist</div><div class="__24lb">Доступ ограничен</div></div></div>'];
return $c[1].'<div class="__19ba">'.$c[0].'</div>';
} else if ($a[0]==2) {
$c = ['<div class="__21c"><div class="__21c0"></div></div><div class="__22o">Пользователь ограничил вам доступ. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div>','<div class="__24b"><div class="__24l"><div class="__24la">Music playlist</div><div class="__24lb">Доступ ограничен</div></div></div>'];
return $c[1].'<div class="__19ba">'.$c[0].'</div>';
} else if ($a[0]==3) {
return '<div class="__24b"><div class="__24l"><div class="__24la">Music playlist</div><div class="__24lb">Доступ ограничен</div></div></div><div class="__19ba"><div class="__27f">Пользователь заблокирован</div><div class="__22o">Доступ ограничен. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div></div>';
} else {
$c = ['<div class="__27f">Доступ ограничен</div><div class="__22o">Доступ ограничен. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div>','<div class="__24b"><div class="__24l"><div class="__24la">Music playlist</div><div class="__24lb">Доступ ограничен</div></div></div>'];
$d = [$z];
if ($a[1]==0) {
$d[1] = plistC($a[2]);
$c[1] = '<div class="__24b"><div class="__24l"><div class="__24la">Music playlist</div><div class="__24lb">'.$d[1].' плейлист'.($d[1]!=1?'а':'').'</div></div><div class="__27g"><a href="'.$d[0]['dt']['al'].'" class="no-link" onclick="return go.linkP(this,event)" data-id="'.$d[0]['dt']['id'].'"><div class="__27h">'.$d[0]['dt']['nm'].'</div></a><div class="__27i"><a href="'.$d[0]['dt']['al'].'" class="no-link" onclick="return go.linkP(this,event)" data-id="'.$d[0]['dt']['id'].'">'.($d[0]['i']!=''?'<img src="'.$d[0]['i'][5][2].'" width="30" height="30" class="photo">':'<div class="__27i0"><div class="__27i1"></div></div>').'</a></div></div></div>';
if ($d[1]!=0) {
$c[2] = [alertBox::plistS([$a[2],0,30])];
$c[0] = '';
for ($c[2][1]=0;$c[2][1]<$c[2][0][1];$c[2][1]++) {
$c[2][2] = $GLOBALS['DB']->f($c[2][0][0]);
$c[0] .= plist([$c[2][2],1,alertBox::pLC([$c[2][2][0],$c[2][2][1]])]);
}
} else $c[0] = '<div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">У '.$d[0]['dt']['n'].' нет ни одного плейлиста.</div>';
}
return $c[1].'<div class="__19ba">'.$c[0].'</div>';
}
}
function auMB($a,$z) {
$b = [''];
if ($a[0]==4) {
$c = [audioC($_SESSION['id'])];
$d = audioS($_SESSION['id']);
$c[1] = ['<div class="__19ba"><div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">You haven\'t added any music to your wish list.</div></div>','<div class="__24b"><div class="__24l"><div class="__24la">Wish List</div><div class="__24lb">'.$c[0].' аудиозапис'.($c[0]!=1?'ей':'ь').'</div></div><div class="__27r" onclick="return go.audio.change(this,event)" data-id="'.$d.'"><div class="__27s '.($d==0?'__27r0':'').'"></div><div class="__27s __27t '.($d==1?'__27r0':'').'"></div></div></div>'];
if ($c[0]!=0) {
$c[2] = [music([$_SESSION['id'],0],$d)];
$c[2][1] = sizeof($c[2][0]);
$c[1][0] = '';
if ($d==0) for ($c[2][2]=0;$c[2][2]<$c[2][1];$c[2][2]++) $c[1][0] .= aucon([$c[2][0][$c[2][2]],0,[0,$_SESSION['id']]]); else {
$c[1][3] = [''];
$c[3] = $GLOBALS['info'][41];
foreach ($c[3] as &$c[4]) {
$c[5] = true;
for ($c[2][2]=0;$c[2][2]<$c[2][1];$c[2][2]++) {
$c[1][4] = $c[2][0][$c[2][2]];
if ($c[1][4][0]==$c[4]) {
if ($c[1][3][1]!=''&&$c[1][3][1]!=$c[1][4][0]) {
$c[1][0] .= '<div class="__27w" data-id="'.$c[1][3][1].'" data-s="1"><div class="__27v">'.$c[1][3][1].'</div><div class="__27u">'.$c[1][3][0].'</div></div>';
$c[1][3][0] = '';
}
$c[1][3][0] .= aucon([$c[1][4][1],0,[0,$_SESSION['id']]]);
$c[1][3][1] = $c[1][4][0];
if ($c[2][2]==($c[2][1]-1)) $c[1][0] .= '<div class="__27w" data-id="'.$c[1][4][0].'" data-s="0"><div class="__27v">'.$c[1][3][1].'</div><div class="__27u">'.$c[1][3][0].'</div></div>';
$c[5] = false;
}
}
if ($c[5]) $c[1][0] .= '<div class="__27w" data-id="'.$c[4].'" data-s="1"></div>';
}
}
$c[1][0] = '<div class="'.($d==0?'__19b':'__19ba').'" id="m-up" data-id="'.htmlspecialchars(json_encode(array('st'=>0,'i'=>$_SESSION['id'],'t'=>$d))).'">'.$c[1][0].'</div><button onclick="return go.audio.update();" class="__27q" '.($c[0]!=30?'style="display: none;"':'').'><span class="__27q1">Загрузить ещё</span><div class="__27q0"></div></button>';
}
return $c[1][1].$c[1][0];
} else if ($a[0]==3) {
return '<div class="__24b"><div class="__24l"><div class="__24la">Wish List</div><div class="__24lb">Доступ ограничен</div></div></div><div class="__19ba"><div class="__27f">Пользователь заблокирован</div><div class="__22o">Доступ ограничен. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div></div>';
} else if ($a[0]==2) {
$c = ['<div class="__21c"><div class="__21c0"></div></div><div class="__22o">Пользователь ограничил вам доступ. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div>','<div class="__24b"><div class="__24l"><div class="__24la">Wish List</div><div class="__24lb">Доступ ограничен</div></div></div>'];
return $c[1].'<div class="__19ba">'.$c[0].'</div>';
} else if ($a[0]==1) {
$c = ['<div class="__21c"><div class="__21c0"></div></div><div class="__22o">Доступ ограничен. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div>','<div class="__24b"><div class="__24l"><div class="__24la">Wish List</div><div class="__24lb">Доступ ограничен</div></div></div>'];
return $c[1].'<div class="__19ba">'.$c[0].'</div>';
} else {
$c = ['<div class="__19ba"><div class="__27f">Доступ ограничен</div><div class="__22o">Доступ ограничен. вернуться к <a href="/audios'.$_SESSION['id'].'" onclick="return return go.link(this,event)" class="no-link"><span class="__22o0">моим аудиозаписьям</span></a>.</div></div>','<div class="__24b"><div class="__24l"><div class="__24la">Wish List</div><div class="__24lb">Доступ ограничен</div></div></div>'];
$d = [$z];
if ($a[1]==0) {
$d[1] = audioC($a[2]);
$c[1] = '<div class="__24b"><div class="__24l"><div class="__24la">Wish List</div><div class="__24lb">'.$d[1].' аудиозапис'.($d[1]!=1?'ей':'ь').'</div></div><div class="__27g"><a href="'.$d[0]['dt']['al'].'" class="no-link" onclick="return go.linkP(this,event)" data-id="'.$d[0]['dt']['id'].'"><div class="__27h">'.$d[0]['dt']['nm'].'</div></a><div class="__27i"><a href="'.$d[0]['dt']['al'].'" class="no-link" onclick="return go.linkP(this,event)" data-id="'.$d[0]['dt']['id'].'">'.(sizeof($d[0]['i'])!=0?'<img src="'.$d[0]['i'][5][2].'" width="30" height="30" class="photo">':'<div class="__27i0"><div class="__27i1"></div></div>').'</a></div></div></div>';
if ($d[1]!=0) {
$d[2] = audioS($_SESSION['id']);
$c[2] = [music([$a[2],0],$d[2])];
$c[2][1] = sizeof($c[2][0]);
$c[0] = '';
if ($d[2]==0) for ($c[2][2]=0;$c[2][2]<$c[2][1];$c[2][2]++) $c[0] .= aucon([$c[2][0][$c[2][2]],0,[0,$a[2]]]); else {
$c[2][3] = [''];
$c[3] = $GLOBALS['info'][41];
foreach ($c[3] as &$c[4]) {
$c[5] = true;
for ($c[2][2]=0;$c[2][2]<$c[2][1];$c[2][2]++) {
$c[2][4] = $c[2][0][$c[2][2]];
if ($c[2][4][0]==$c[4]) {
if ($c[2][3][1]!=''&&$c[2][3][1]!=$c[2][4][0]) {
$c[0] .= '<div class="__27w" data-id="'.$c[2][3][1].'" data-s="1"><div class="__27v">'.$c[2][3][1].'</div><div class="__27u">'.$c[2][3][0].'</div></div>';
$c[2][3][0] = '';
}
$c[2][3][0] .= aucon([$c[2][4][1],0,[0,$a[2]]]);
$c[2][3][1] = $c[2][4][0];
if ($c[2][2]==($c[2][1]-1)) $c[0] .= '<div class="__27w" data-id="'.$c[2][4][0].'" data-s="'.($c[2][1]!=30?1:0).'"><div class="__27v">'.$c[2][3][1].'</div><div class="__27u">'.$c[2][3][0].'</div></div>';
$c[5] = false;
}
}
if ($c[5]) $c[0] .= '<div class="__27w" data-id="'.$c[4].'" data-s="1"></div>';
}
}
$c[0] = '<div class="__19ba" id="m-up" data-id="'.htmlspecialchars(json_encode(array('st'=>0,'i'=>$a[2],'t'=>$d[2]))).'">'.$c[0].'</div><button onclick="return go.audio.update();" class="__27q" '.($c[2][1]!=30?'style="display: none;"':'').'><span class="__27q1">Загрузить ещё</span><div class="__27q0"></div></button>';
} else $c[0] = '<div class="__19ba"><div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">У '.$d[0]['dt']['n'].' нет ни одного аудиозапися.</div></div>';
}
return $c[1].$c[0];
}
}
function auP($a) {
$b = [alertBox::bList($a),alertBox::user($a)];
return alertBox::auGB([alertBox::auMenu((($b[0]==4||$b[0]==2)?[0,$_SESSION['id'],'Моя музыка',1]:[1,$a,'Музыка '.$b[1]['dt']['n'],1])),alertBox::auPB([$b[0],alertBox::auConf([$b[0],$a]),$a],$b[1])]);
}
function auM($a) {
$b = [alertBox::bList($a),alertBox::user($a)];
return alertBox::auGB([alertBox::auMenu((($b[0]==4||$b[0]==2)?[0,$_SESSION['id'],'Моя музыка',0]:[1,$a,'Музыка '.$b[1]['dt']['n'],0])),alertBox::auMB([$b[0],alertBox::auConf([$b[0],$a]),$a],$b[1])]);
//<div data-id="'.htmlspecialchars(json_encode([1,$a])).'" data-info="'.htmlspecialchars(json_encode([1,$a])).'" id="au-list"></div>
}
function auGB($a) {
return '<div class="__13r">'.$a[0].'<div class="__18w"><div class="__20m"></div><input type="text" class="__18x" placeholder="Поиск по аудиозаписьям, альбомам, исполнителям" onkeyup="return go.audio.searchStart()" value=""><div class="__18z" onclick="return go.audio.upload()"><div class="__20k"></div></div><div class="__23h"><div class="__23i" onclick="return go.audio.searchClear()"></div><div class="__23j" onclick="return go.audio.sOpV(this,event)" onmousedown="return go.stop(event);"></div></div></div>'.$a[1].'<div id="__19b0"></div></div><div id="__19b1"></div>';
}
function bList($a) {
$b = [0];
if ($a!=$_SESSION['id']) {//$info[2][2] = array(0=>'_login',1=>'id',2=>'alias',3=>'st');//login
$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][3]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$a."' LIMIT 1");
if ($GLOBALS['DB']->n($b[1])!=0) {
$b[2] = $GLOBALS['DB']->f($b[1])[0];
if ($b[2]==0||$b[2]==1) {
$b[1] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][51][1]."`) FROM `".$GLOBALS['info'][2][51][0]."` WHERE `".$GLOBALS['info'][2][51][2]."`='".$a."' AND `".$GLOBALS['info'][2][51][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][51][5]."`='0' LIMIT 1");
if ($b[1]!=0) $b[0] = 1;
} else $b[0] = $b[2];
} else $b[0] = 2;
} else $b[0] = 4;
return $b[0];
/*
0 = доступ есть
1 = черный список
2 = удален
3 = заблокирован
4 = сам
*/
}
function auConf($a) {
$b = [0];
if ($a[0]!=1&&$a[0]!=2&$a[0]!=3) {
$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][12][4]."` FROM `".$GLOBALS['info'][2][12][0]."` WHERE `".$GLOBALS['info'][2][12][1]."`='".$a[1]."' LIMIT 1");
if ($GLOBALS['DB']->n($b[1])!=0) {
$b[0] = 1;//если пользователь А не состоит в клубе
$b[2] = $GLOBALS['DB']->f($b[1])[0];
if ($b[2]==1) {//только друзья и их друзья
$b[1] = ['',$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$a[1]."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10")/*Проверяем список клубов пользователя B*/];
$b[1][2] = $GLOBALS['DB']->n($b[1][1]);
if ($b[1][2]!=0) {
for ($b[1][3]=0;$b[1][3]<$b[1][2];$b[1][3]++) if ($b[1][3]!=0) $b[1][0] .= ','.$GLOBALS['DB']->f($b[1][1])[0]; else $b[1][0] = $GLOBALS['DB']->f($b[1][1])[0];
$b[1][3] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][53][1]."`) FROM `".$GLOBALS['info'][2][53][0]."` WHERE `".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][53][6]."`='0' AND `".$GLOBALS['info'][2][53][2]."` IN (".$b[1][0].") LIMIT 1");
if ($b[1][3]!=0) $b[0] = 0;/*если пользователь А состоит в клубе*/ else {
$b[1][1] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10");/*Проверяем список клубов пользователя A*/
$b[1][2] = $GLOBALS['DB']->n($b[1][1]);
if ($b[1][2]!=0) {
$b[1][4] = '';
for ($b[1][3]=0;$b[1][3]<$b[1][2];$b[1][3]++) if ($b[1][3]!=0) $b[1][4] .= ','.$GLOBALS['DB']->f($b[1][1])[0]; else $b[1][4] = $GLOBALS['DB']->f($b[1][1])[0];
$b[1][3] = $GLOBALS['DB']->c("SELECT COUNT(`a`.`".$GLOBALS['info'][2][53][3]."`) FROM `".$GLOBALS['info'][2][53][0]."` AS `a` INNER JOIN `".$GLOBALS['info'][2][53][0]."` as `b` ON `a`.`".$GLOBALS['info'][2][53][3]."`=`b`.`".$GLOBALS['info'][2][53][3]."` WHERE `a`.`".$GLOBALS['info'][2][53][2]."` IN(".$b[1][0].") AND `b`.`".$GLOBALS['info'][2][53][2]."` IN(".$b[1][4].") LIMIT 1");//проверяем есть ли общие клубы пользователей A и B
if ($b[1][3]!=0) $b[0] = 0;//если есть то присваеваем 0 - да
}
}
}
} elseif ($b[2]==2) {//только друзья
$b[1] = ['',$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$a[1]."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10")/*Проверяем список клубов пользователя B*/];
$b[1][2] = $GLOBALS['DB']->n($b[1][1]);
if ($b[1][2]!=0) {//проверяем состоит ли в клубе пользователь B
for ($b[1][3]=0;$b[1][3]<$b[1][2];$b[1][3]++) if ($b[1][3]!=0) $b[1][0] .= ','.$GLOBALS['DB']->f($b[1][1])[0]; else $b[1][0] = $GLOBALS['DB']->f($b[1][1])[0];
$b[1][3] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][53][1]."`) FROM `".$GLOBALS['info'][2][53][0]."` WHERE `".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][53][6]."`='0' AND `".$GLOBALS['info'][2][53][2]."` IN (".$b[1][0].") LIMIT 1");//проверяем есть ли пользователь A в списке клуба пользователя B
if ($b[1][3]!=0) $b[0] = 0;//если пользователь А состоит в клубе
}
} else if ($b[2]==0) $b[0] = 0;
}
}
return $b[0];//возвращаем открыт ли доступ к пользователю 0 - да, 1 - нет
}
function auMenu($a) {
return '<div class="__19k"><div class="__19h">'.($a[0]==0?'<a href="/audios'.$a[1].'" class="no-link" onclick="return go.linkM(this,event)"><button class="__19i '.($a[3]==0?'__19j':'').'">'.$a[2].'</button></a><a class="no-link" href="/audios'.$a[1].'?section=playlists" onclick="return go.linkM(this,event)"><button class="__19i '.($a[3]==1?'__19j':'').'">Плейлисты</button></a><a href="/audios'.$a[1].'?section=recom" class="no-link" onclick="return go.linkM(this,event)"><button class="__19i '.($a[3]==2?'__19j':'').'">Рекомендации</button></a><a href="/audios'.$a[1].'?section=albums" class="no-link" onclick="return go.linkM(this,event)"><button class="__19i '.($a[3]==3?'__19j':'').'" style="margin: 0;">Альбомы</button></a>':'<a href="/audios'.$a[1].'" class="no-link" onclick="return go.linkM(this,event)"><button class="__19i '.($a[3]==0?'__19j':'').'">'.$a[2].'</button></a><a class="no-link" href="/audios'.$a[1].'?section=playlists" onclick="return go.linkM(this,event)"><button class="__19i '.($a[3]==1?'__19j':'').'">Плейлисты</button></a><a href="/audios'.$a[1].'?section=albums" class="no-link" onclick="return go.linkM(this,event)"><button class="__19i '.($a[3]==2?'__19j':'').'" style="margin: 0;">Альбомы</button></a>').'</div></div>';
}
function data($a) {
$b = [[]];
$b[1] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][2][2]."`,`a`.`".$GLOBALS['info'][2][2][3]."`,`b`.`".$GLOBALS['info'][2][17][2]."`,`b`.`".$GLOBALS['info'][2][17][3]."`,`b`.`".$GLOBALS['info'][2][17][4]."` FROM `".$GLOBALS['info'][2][2][0]."` AS `a`,`".$GLOBALS['info'][2][17][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][2][1]."`=`b`.`".$GLOBALS['info'][2][17][1]."` AND `b`.`".$GLOBALS['info'][2][17][1]."`='".$a."' AND `a`.`".$GLOBALS['info'][2][2][1]."`='".$a."' LIMIT 1");
if ($GLOBALS['DB']->n($b[1])!=0) {
$b[2] = $GLOBALS['DB']->f($b[1]);
$b[0] = array('id'=>$a,'al'=>$b[2][0],'st'=>$b[2][1],'n'=>$b[2][2],'nm'=>$b[2][2].' '.$b[2][3].' '.$b[2][4]);
}
return $b[0];
}
function user($a) {
return array('i'=>profile($a),'dt'=>alertBox::data($a));
}
function audioView($a) {
$b = [parseQ($a[0]['query'])];
preg_match('/audios(\d)/',$a[0]['path'],$b[1]);
if (findURLV([$b[0],'section','playlists'])) {
	$a[0]['h'] = alertBox::auP($b[1][1]);
	$a[0]['t'] = 'Плейлисты';
} elseif (findURLV([$a[0]['query'],'section','recom'])) {
	
} elseif (findURLV([$a[0]['query'],'section','albums'])) {
	
} else {
	$a[0]['h'] = alertBox::auM($b[1][1]);
	$a[0]['t'] = 'My Music';
}
$a[0]['u'] = 0;
$a[0]['m'] = $a[1];
exit(json_encode($a[0]));
}
function url($a) {
$b = [parse_url($a),$a];//preg_match('/audios\d+/',$b['path'])
//;
if (preg_match('/audios\d+/',$b[0]['path'])) alertBox::audioView($b);
/*
Array
(
    [path] => /audios1
    [query] => section=playlists
)
*/
}
function fAuP($a) {
	return '<div class="__3g"><div class="__3h" id="__3h">'.menuLeft().'</div><div class="__3i"><div class="__18v" id="au-con-m"><div id="au-con"><div class="__19a" style="background-image: url(/sources/def.png);"></div><div class="__19l __19m" onclick="return go.audio.play(go.stop(event));"></div><div class="__19n" onclick="return go.audio.prev(go.stop(event));"></div><div class="__19o" onclick="return go.audio.next(go.stop(event));"></div><div class="__19p"></div><div class="__19q"onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,event,0)"><div class="__23c0"></div><div class="__19r" onselectstart="return false;"><div class="__23b"></div><div class="__19r0"><div class="__19r1"></div></div></div></div><div class="__20a"></div><div class="__19t2"><div class="__19t3"><div class="__19t1"></div><div class="__19t"></div><div class="__19t0"></div></div><div id="__19t"></div></div><div class="__19s0" onclick="return go.audio.mode();"><div class="__19s1" data-id="0" id="_au_mode"></div><div class="__19s" onmouseenter="return go.audio.help(this,1,\'Normal mode\',event)"></div></div><div class="__19u0"><div class="__19u" onmouseenter="return go.audio.help(this,2,\'Показать похожие\',event)"></div></div><div class="__19v0"><div class="__19v1"></div><div class="__19v" onmouseover="return go.audio.status(this,event)"></div></div><div class="__19w" id="__19w"><div class="__19x"></div></div><div class="__19y" onmouseenter="return go.audio.volS(this,event,0)" onmousedown="return go.audio.vol(this,event,0)"><div class="__23c"><div class="__23d">12</div></div><div class="__19z"><div class="__19z0"><div class="__19z1"></div></div></div></div></div></div><div class="__13k">'.$a.'</div><div class="__13f" id="audio-right"><div class="__25w"><div class="__26f"><div class="__26f0" onclick="return go.audio.prev(go.stop(event));"></div><div class="__26f1" onclick="return go.audio.next(go.stop(event));"></div><div class="__26f4" onclick="return go.audio.mode();"><div class="__26f4b" style="margin-top: -12px;"><div class="__26f4c"></div></div><div class="__26f4d"></div><div class="__26f4e"><div class="__26f4f"></div></div></div><div class="__26f4" id="__26f4"><div class="__26f4a" style="margin-top: -10px;"></div><div class="__26f4a1"></div><div class="__26f4a0"></div></div><div class="__26f3"></div><div class="__26f2" onmouseenter="return go.audio.opConV(this,event);"><div class="__26g"><div class="__7a" style="margin: -16px 0 0 76px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0;"></div></div><div class="__4y __6z" id="_au-l">Мне нравиться</div><div class="__4y __6z">Поделиться</div><div class="__4y __6z">Транслировать</div></div><div class="__26f20"></div></div></div><div class="__26d" onmouseenter="return go.audio.volS(this,event)" onmousedown="return go.audio.vol(this,event)"><div class="__23c"><div class="__23d"></div></div><div class="__26d0"><div class="__19z0"><div class="__19z1"></div></div></div></div><div class="__25x" id="__18o" onclick="return go.audio.play(go.stop(event));" onmouseenter="return go.audio.miniView(this,event)"><div class="__25x0"></div><div class="__20u"><div class="__20v"></div></div></div><div class="__25y"><div class="__25z"></div><div class="__26a"></div></div><div class="__26e">0:40</div><div class="__26b0" onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,event)"><div class="__23c0">0:00</div><div class="__26b"><div class="__26c0"></div><div class="__26c"><div class="__19r1"></div></div></div></div></div><div class="__3n"><div class="__13h" style="margin-bottom: 0;"><div class="__25t"><div class="__25u"></div><input type="text" class="__25v" placeholder="Search"></div><div class="__20d"><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/es.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Ed Sheeran</span><div class="__22i"></div><span class="__22j">sheeranoffical</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/tl.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Justin Timberlake</span><div class="__22i"></div><span class="__22j">timberlake</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/rg.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Rupert Grint</span><div class="__22i"></div><span class="__22j">grint</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/b.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Jack Halib</span><div class="__22i"></div><span class="__22j">halib</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div></div></div></div>'.menuFooter(0).'</div></div></div>';
}
function savePLIST($a) {
if ($a[1]==0) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][49][4]."`,`".$GLOBALS['info'][2][49][5]."` FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
if ($b[1][0]==0) exit(); 
$b[2] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][49][5]."`) FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`=`".$GLOBALS['info'][2][49][5]."`-1 WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][49][5]."`>".$b[1][1]);
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][5]."`='".$b[2]."',`".$GLOBALS['info'][2][49][4]."`='0' WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' LIMIT 1");
} else {
$b[1] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][49][5]."`) FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."'");
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][49][0]."` VALUES(NULL,".$a[0].",".$_SESSION['id'].",'0',".$b[1].")");
}
} else $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][49][0]."` SET `".$GLOBALS['info'][2][49][4]."`='1' WHERE `".$GLOBALS['info'][2][49][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' LIMIT 1");
}
function createPlist($a) {
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][48][0]."` VALUES(NULL,".$a['id'].",'".$GLOBALS['DB']->s($a['n'])."','','0','".$GLOBALS['DB']->s($a['t'])."')");
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][48][1]."` FROM `".$GLOBALS['info'][2][48][0]."` WHERE `".$GLOBALS['info'][2][48][2]."`='".$a['id']."' ORDER BY `".$GLOBALS['info'][2][48][1]."` DESC LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$b[2] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][49][5]."`) FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][3]."`='".$a['id']."'")+1;
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][49][0]."` VALUES(NULL,".$b[1][0].",".$a['id'].",'0',".$b[2].")");
$b[3] = plistC($a['id']);
exit(json_encode(array('w'=>500,'p'=>'<div class="__23x playlist-'.$b[1][0].' ui-sortable-handle" data-id="'.$b[1][0].'"><div class="__23y" onclick="return go.audio.selPt('.htmlspecialchars(json_encode([$b[1][0]])).')"><div class="__24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__24g"><div class="__24f"></div><div class="__24h _'.$b[1][0].'">0</div></div><div class="__24d __24e plM-'.$b[1][0].'" data-id="'.$b[1][0].'" onclick="return go.audio.plistPLAY(this,'.htmlspecialchars(json_encode([$b[1][0]])).',go.stop(event))"></div></div><div class="__24c"><div class="__24j"></div></div><div class="__24c0" onmouseenter="return go.audio.vPO('.htmlspecialchars(json_encode([$b[1][0]])).',event,this)"></div><div class="__23z" onclick="return go.audio.selPt('.htmlspecialchars(json_encode([$b[1][0]])).')">'.$a['n'].'</div><div class="__24a">'.alertBox::auPlistOwner($a['id'],1).'</div></div>','h'=>alertBox::auPlistCon(['Редактирование плейлиста',$a['n'],$a['t'],'','<div class="__25c" data-svw="scroll-vw" data-sort="__25c0" data-attr="'.htmlspecialchars(json_encode([0,$b[1][0]])).'"><div class="__27b">Здесь пока нет аудиозаписей</div></div>','',0,$b[1][0]]),'c'=>$b[3].' плейлист'.($b[3]!=1?'а':''),'s'=>1)));
} else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box" style="opacity: 1;"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Playlist was deleted or doesn\'t exist.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>','s'=>0)));
}
function newPlist() {
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Создание нового плейлиста</div><div class="_2d"><div class="__27с"><div class="__27d"><div class="__27d0">Название плейлиста</div><input type="text" class="__27e" onfocus="return go.audio.wUp(this)"id="_pl-n"></div><div class="__27d"><div class="__27d0">Описание плейлиста</div><input type="text" class="__27e" onfocus="return go.audio.wUp(this)" id="_pl-t"></div></div><div class="_2f" style="margin: 0 16px 0 16px;"><button class="__4o" id="bt3" onclick="return go.audio.createPL(this)" data-status="open" style="margin: 0 0 10px 114px;"><div class="lg-1"></div><span>Create Playlist</span></button></div></div></div>')));
}
function auPlistEdit($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][48][2]."`,`".$GLOBALS['info'][2][48][3]."`,`".$GLOBALS['info'][2][48][4]."`,`".$GLOBALS['info'][2][48][6]."` FROM `".$GLOBALS['info'][2][48][0]."` WHERE `".$GLOBALS['info'][2][48][1]."`='".$a[0]."' AND `".$GLOBALS['info'][2][48][5]."`='0'")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$b[2] = '';
$b[3] = alertBox::auPlistUpS([$a[0],0]);
for ($b[4]=0;$b[4]<$b[3][1];$b[4]++) $b[2] .= alertBox::auPlistI($b[3][2][$b[4]],[1,$a[0]],$a[0]);
//$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
//$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
//$info[2][50] = ['_audio_playlist_list','id','plst','au','ss','ct'];//audio playlist list
///sources/jt.jpg
$b[8] = alertBox::auPlistSum($a[0]);
$b[9] = alertBox::auPlistCount($a[0]);
exit(json_encode(array('w'=>500,'html'=>alertBox::auPlistCon(['Редактирование плейлиста',$b[1][1],$b[1][3],$b[1][2],'<div class="__25c" data-svw="scroll-vw" data-sort="__25c0" data-attr="'.htmlspecialchars(json_encode([0,$a[0]])).'">'.($b[2]!=''?$b[2]:'<div class="__27b">Здесь пока нет аудиозаписей</div>').'</div>',$b[8],$b[9],$a[0]]))));
} else {
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Playlist was deleted or doesn\'t exist.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
}



/*
 else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Документ удален или не существует.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
*/	
}
function auPlistCon($a) {
	//'.htmlspecialchars(json_encode($a[3])).'
return '<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="__26j1"></div><div class="_2h" onclick="return load.marginOff()"></div><div class="__26h"><div class="__26i"></div></div><div class="_m1">'.$a[0].'</div><div class="_2d"><div class="__26o"></div><div class="__24p"><input type="hidden" value="'.$a[3].'" id="hid_pic"><div class="__24q" onclick="go.audio.pIC();"  onmouseenter="return go.vw(\'.__24y\',this)">'.($a[3]==''?'<div class="__24q0"></div>':'<img src="'.$a[3].'" class="photo" width="90" height="90" onclick="return go.stop(event);"><div class="__24y" onclick="return go.audio.plIconAbort(this,go.stop(event));"></div>').'</div><div class="__24r"><div class="__25o">Название плейлиста</div><input type="text" class="__24s" placeholder="" value="'.$a[1].'" id="pl-m" data-v="'.$a[1].'"></div><div class="__24r" style="margin-top: 84px;"><div class="__25o">Описание плейлиста</div><input type="text" class="__24s" placeholder="" value="'.$a[2].'" id="pl-t"></div></div><div class="__24t"><div class="__25b"><div class="__25a">'.$a[6].' аудиозапис'.($a[6]>1?'ей':'ь').'</div><div class="__25a0">'.$a[5].'</div><div class="__24x0" onclick="return go.audio.delPlaylist()"><div class="__24x" onmouseover="return go.audio.help1(this,\'Удалить плейлист\',event)"></div></div><button class="__24u" onclick="return go.audio.pLAdd()" data-id="'.$a[7].'"><div class="__3w" style="margin: 0 0 0 155px;"></div>Добавить аудиозапись</button><div class="__24v" data-id="0">'.$a[4].'</div><div class="__24w"><button class="__4o" data-status="open" style="margin-left: 130px;" onclick="return go.audio.saveEditPlst(this)"><div class="lg-1"></div><span>Сохранить изменение</span></button></div></div></div></div></div>';
}
function auRes($a) {
$b = [$a,'empty'];
if (intval($a[0])==0) {
	$c = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][43][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[1][1]."' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT 30")];
	$c[1] = $GLOBALS['DB']->n($c[0]);
	if ($c[1]!=0) $b[1] = '';
	for ($c[2]=0;$c[2]<$c[1];$c[2]++) {
		$c[3] = $GLOBALS['DB']->f($c[0]);
		/*
	$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
$info[2][43] = ['_audio_u','id','own','au','ct','ss','dt'];//audio user
	*/		
		$c[4] = musicIcon($c[3][0]);
		$c[5] = json_decode($c[3][7],true)['bt'];
		$b[1] .= '<div class="__19c" id="audio'.$c[3][0].'" onmouseenter="return go.audio.view(this)" onclick="return go.audio.sel('.htmlspecialchars(json_encode([[$c[3][0],$c[3][2],$c[3][3],$c[3][4],$c[3][5],$c[5],$c[4]],$a[1]])).')" data-id="'.$c[3][0].'" data-t="0"><div class="__20p"><div class="__20s" onmouseover="return go.audio.opView(this,'.htmlspecialchars(json_encode([$c[3][0]])).',event)"></div>'.($c[3][1]==$_SESSION['id']?'<div class="__20n" onmouseover="return go.audio.help1(this,\'Удалить аудиозапись\',event)" onclick="return go.audio.del('.htmlspecialchars(json_encode([$c[3][0]])).')"></div><div class="__20o" onmouseover="return go.audio.help1(this,\'Редактировать\',event)" onclick="return go.audio.edit('.htmlspecialchars(json_encode([$c[3][0]])).',go.stop(event))"></div>':'<div class="__20n __20n0" onmouseover="return go.audio.help1(this,\'Убрать аудиозапись\',event)" onclick="return go.audio.rem('.htmlspecialchars(json_encode([$c[3][0]])).',go.stop(event))"></div>').'</div><div class="__20q">'.$c[3][4].'</div><div class="__19d" style="background-image: url('.$c[4].');">'.($c[5]==0?'<div class="__20j"></div>':'').'<div class="__20u"><div class="__20v"></div></div></div><div class="__19e"><div '.($c[3][6]!=''?'class="__19f __19f0" onclick="return go.audio.txt(this,'.htmlspecialchars(json_encode([$c[3][0]])).',go.stop(event));"':'class="__19f"').'>'.$c[3][2].'</div><div class="__19g" onclick="return go.audio.authorS(this,'.htmlspecialchars(json_encode([$c[3][0],$c[3][3]])).')">'.$c[3][3].'</div></div><div class="__19f1"><div class="__19f2"></div></div></div>';
	}
	if ($c[2]!='') $b[1] = '<div class="__19b">'.$b[1].'</div>'; 
}
exit(json_encode($b));
}
function auS($a) {
$b = [$a,'<div class="__23w">По запросу <span style="font-weight: bold;white-space: normal;word-wrap: break-word;max-width: 418px;display: inline;">'.$a[0].'</span> не найдено ни одной аудиозаписи</div>',''];
/*
Array
(
    [0] => sadasdasd
    [1] => Array
        (
            [t] => 0
            [d] => 0
            [txt] => 0
        )

    [2] => 0
)
*/
exit(json_encode($b));
}
function auRem($a) {
if (!is_array($a)) exit(); elseif ($a[0]==0) {
//$info[2][43] = ['_audio_u','id','own','au','ct','ss','dt'];//audio user
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][5]."`='1' WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[1]."' LIMIT 1");
} else if ($a[0]==1) {
$c = [0];
$b = [$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][43][1]."`) FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[1]."'")];
if ($b[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][43][0]."` SET `".$GLOBALS['info'][2][43][5]."`='0' WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a[1]."' LIMIT 1"); else {
$c[0] = 1;
$b[1] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][42][4]."`) FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][2]."`='".$_SESSION['id']."'")+1;
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][42][0]."` VALUES(NULL,".$_SESSION['id'].",".$a[1].",".$b[1].",'0','')");
}
$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][1]."`,`".$GLOBALS['info'][2][42][2]."`,`".$GLOBALS['info'][2][42][4]."`,`".$GLOBALS['info'][2][42][5]."`,`".$GLOBALS['info'][2][42][6]."`,`".$GLOBALS['info'][2][42][7]."`,`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][42][3]."`='0' LIMIT 1");
if ($GLOBALS['DB']->n($b[1])!=0) {
$b[1] = $GLOBALS['DB']->f($b[1]);
$c[1] = array('id'=>$b[1][0],'lt'=>[0,$_SESSION['id']],'nm'=>$b[1][2],'au'=>$b[1][3],'dr'=>$b[1][4],'gr'=>$b[1][5],'cv'=>musicIcon($b[1][0]),'bt'=>json_decode($b[1][6],true)['bt'],'add'=>($b[1][1]!=$_SESSION['id']?alertBox::auAdd($b[1][0]):2));
exit(json_encode($c));
}
}



}
function auAdd($a) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][43][1]."`) FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a."' AND `".$GLOBALS['info'][2][43][5]."`='0' LIMIT 1");
return $b;
}
function pAu($a) {
$b = [0,[]];
$c = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` AS `a`,`".$GLOBALS['info'][2][50][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][50][3]."`=`a`.`".$GLOBALS['info'][2][42][1]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][50][4]."`='0' AND `b`.`".$GLOBALS['info'][2][50][2]."`='".$a[0]."' ORDER BY `b`.`".$GLOBALS['info'][2][50][5]."` DESC LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])!=0) {
$c[1] = $GLOBALS['DB']->f($c[0]);
$b = [1,array('id'=>$c[1][0],'lt'=>[$c[1][0],[1,$a[0]]],'nm'=>$c[1][2],'au'=>$c[1][3],'dr'=>$c[1][4],'gr'=>$c[1][5],'cv'=>musicIcon($c[1][0]),'dt'=>json_decode($c[1][6],true),'add'=>($c[1][1]!=$_SESSION['id']?alertBox::auAdd($c[1][0]):2)),alertBox::auInfo($c[1][0],1)];
}
exit(json_encode($b));
}
function au($a) {
$b = [0,[]];
if ($a!='') {
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][1]."`,`".$GLOBALS['info'][2][42][2]."`,`".$GLOBALS['info'][2][42][4]."`,`".$GLOBALS['info'][2][42][5]."`,`".$GLOBALS['info'][2][42][6]."`,`".$GLOBALS['info'][2][42][7]."`,`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` WHERE `".$GLOBALS['info'][2][42][1]."`='".$a[0]."' AND `".$GLOBALS['info'][2][42][3]."`='0' LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])!=0) {
$c[1] = $GLOBALS['DB']->f($c[0]);
$b = [1,array('id'=>$c[1][0],'lt'=>$a,'nm'=>$c[1][2],'au'=>$c[1][3],'dr'=>$c[1][4],'gr'=>$c[1][5],'cv'=>musicIcon($c[1][0]),'dt'=>json_decode($c[1][6],true),'add'=>($c[1][1]!=$_SESSION['id']?alertBox::auAdd($c[1][0]):2)),alertBox::auInfo($c[1][0],1)];
}
} else {
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][1]."`,`".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][2]."`,`".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][4]."`,`".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][5]."`,`".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][6]."`,`".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][7]."`,`".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."`,`".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][42][0]."`.`".$GLOBALS['info'][2][42][1]."`=`".$GLOBALS['info'][2][43][0]."`.`".$GLOBALS['info'][2][43][3]."` AND `".$GLOBALS['info'][2][43][0]."`.`".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][0]."`.`".$GLOBALS['info'][2][43][5]."`='0' ORDER BY `".$GLOBALS['info'][2][43][0]."`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])!=0) {
$c[1] = $GLOBALS['DB']->f($c[0]);
$b = [2,array('id'=>$c[1][0],'lt'=>[$c[1][0],[0,$_SESSION['id']]],'nm'=>$c[1][2],'au'=>$c[1][3],'dr'=>$c[1][4],'gr'=>$c[1][5],'cv'=>musicIcon($c[1][0]),'dt'=>json_decode($c[1][6],true),'add'=>($c[1][1]!=$_SESSION['id']?alertBox::auAdd($c[1][0]):2)),alertBox::auInfo($c[1][0])];
} else $b[2] = alertBox::auInfo(0);
}
exit(json_encode($b));
}
function auLk($a) {
$b = [$a[1]];
if ($a[0]==0) {
$c = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][44][1]."`) FROM `".$GLOBALS['info'][2][44][0]."` WHERE `".$GLOBALS['info'][2][44][2]."`='".$a[1]."' AND `".$GLOBALS['info'][2][44][3]."`='".$_SESSION['id']."' LIMIT 1");
if ($c!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][44][0]."` SET `".$GLOBALS['info'][2][44][4]."`='0' WHERE `".$GLOBALS['info'][2][44][2]."`='".$a[1]."' AND `".$GLOBALS['info'][2][44][3]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][44][0]."` VALUES(NULL,".$a[1].",".$_SESSION['id'].",'0')");
} else $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][44][0]."` SET `".$GLOBALS['info'][2][44][4]."`='1' WHERE `".$GLOBALS['info'][2][44][2]."`='".$a[1]."' AND `".$GLOBALS['info'][2][44][3]."`='".$_SESSION['id']."' LIMIT 1");
$c = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][44][1]."`) FROM `".$GLOBALS['info'][2][44][0]."` WHERE `".$GLOBALS['info'][2][44][2]."`='".$a[1]."' AND `".$GLOBALS['info'][2][44][4]."`='0'");
$b[1] = $c;
exit(json_encode($b));
}
function audioLike($a) {
$b = ['<div class="__22y"><div class="__22z"></div></div><div class="__22x">Список пуст</div>'];
//<div class="__16y"><div class="__16z">Описание</div></div><div class="__17a"><div class="__17b">Название</div><div class="__17c">'.$b[1][0].'</div></div><div class="__17a"><div class="__17b">Дата создания</div><div class="__17c" data-time="'.$b[1][1].'">'.$b[1][1].'</div></div><div class="__17a"><div class="__17b">Индекс</div><div class="__17c">'.$b[1][2].'</div></div><div class="__16y"><div class="__16z">Содержание</div></div><div class="__17a"><div class="__17b">Размер папки</div><div class="__17c">'.($b[2]==0?'-':fileSz($b[2])).'</div></div><div class="__17a"><div class="__17b">Количество файлов</div><div class="__17c">'.$b[3].'</div></div><div class="__16y"><div class="__16z">Источник</div></div><div class="__17a"><div class="__17b">Общий доступ</div><div class="__17c">'.($b[1][3]==0?'да':'нет').'</div></div><div class="__17a"><div class="__17b">Путь к папке</div><div class="__17c">https://infalike.com/folder'.$a[0].'_'.$a[1].'</div></div>
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Аудиозапись понравился</div><div class="_2d" style="border: 1px solid transparent;background: transparent;">'.$b[0].'</div></div>')));
}
function folderEdit($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][3]."`,`".$GLOBALS['info'][2][37][7]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$a[0]."' AND `".$GLOBALS['info'][2][37][5]."`='0' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])) {
$b[1] = $GLOBALS['DB']->f($b[0]);
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Редактирование папки</div><div class="_2d"><div class="__6a" style="margin: 15px 15px 10px 15px;padding: 10px;border: 1px solid rgb(220,220,220);box-shadow: 0 0 0 2px rgba(0,0,0,.1);border-radius: 3px;background: #f9faf6;">Вы можете Ограничить доступ к текущей папке отключив галочку справа от имени файла, однако только вам будет доступно его содержимое.</div><div class="__4c"><div class="__4d">Название папки</div><input type="text" class="__4f" data-eds="0" maxlength="150" id="n-folder" value="'.$b[1][0].'"></div><div class="__5e" style="margin: -46px 108px 0 364px;position: absolute;"><div class="__5f"><div class="__5i">'.($b[1][1]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-s="0"><div class="__5u" style="margin-left: 20px;"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1"><div class="__5u __5y"></div></div>').'</div></div></div><div class="__4i __4i1"><button class="__4o" style="margin-top: 8px;" onclick="return go.doc.saveEditFolder(this,'.htmlspecialchars(json_encode($a)).')" data-status="open"><div class="lg-1"></div><span>Save edit</span></button></div></div></div>')));
} else exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;" id="_box"><div class="_2h" onclick="return load.marginOff()"></div><div class="_m1">Ошибка</div><div class="_2d"><div class="_2e">Папка удалена или не существует.</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff();">OK</div></div></div></div>')));
}
function createFolder($a) {
$b = [($GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][37][6]."`) FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][2]."`='".$_SESSION['id']."'")+1)];
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][37][0]."` VALUES(NULL,".$_SESSION['id'].",'".$GLOBALS['DB']->s($a[0])."',now(),'0',".$b[0].",'".$a[1]."')");
$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][1]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][2]."`='".$_SESSION['id']."' ORDER BY `".$GLOBALS['info'][2][37][1]."` DESC LIMIT 1");
return array('id'=>$GLOBALS['DB']->f($b[1])[0],'own'=>$_SESSION['id'],'nm'=>$a[0],'fo'=>'');
}
function docSupport() {
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Уведомление о заявленном нарушении</div><div class="_2d"><div class="__6a" style="margin: 15px 15px 10px 15px;padding: 10px;border: 1px solid #e6ecf0;border-radius: 3px;background: #f8fafb;">Чтобы отправить запрос на удаление ссылок Dropbox в соответствии с «Законом о защите авторских прав в цифровую эпоху (DMCA)», воспользуйтесь этой формой.</div><div class="__18b" data-select data-id="0"><div class="__18c" style="background: #f8fafb;font-weight: bold;" onclick="return go.select(this,0);">Нарушает мои авторские права.</div><div class="__18c" onclick="return go.select(this,1);">Нарушает авторские права другого лица, которое я представляю.</div></div><div class="__18e">URL-адреса содержимого с нарушением (один на строку)</div><input type="text" class="__18d" data-input maxlength="150"><div class="__18e">Заявлено о нарушении авторских прав защищенной ими</div><input type="text" class="__18d" data-input maxlength="150"><div class="__18f"><input type="text" class="__18g" placeholder="Имя владельца авторских прав" data-input maxlength="150"><input type="text" class="__18g" placeholder="Телефон" data-input maxlength="150"></div><div class="__18f"><input type="text" class="__18g" placeholder="Мое полное имя" data-input maxlength="150"><input type="text" class="__18g" placeholder="Эл. почта" data-input maxlength="150"></div><div class="__18f"><input type="text" class="__18g" placeholder="Должность" data-input maxlength="150"><input type="text" class="__18g" placeholder="Адрес" data-input maxlength="150"></div><div class="__6a" style="margin: 15px 15px 10px 15px;padding: 10px;border: 1px solid #e6ecf0;border-radius: 3px;background: #f8fafb;">Устанавливая следующие флажки, я, ПОД СТРАХОМ ОТВЕТСТВЕННОСТИ ЗА ЛЖЕСВИДЕТЕЛЬСТВО в соответствии с законом, заявляю следующее:</div><div class="__18h"><div class="__18i" data-box data-id="1" onclick="return go.checkbox([this,this.firstChild,\'__18j0\'])"><div class="__18j"></div><div class="__18k">Я обоснованно предполагаю, что общий доступ к защищенному авторским правом материалу, который находится в указанном выше месте, не разрешен владельцем авторских прав, его агентом или запрещен законом (например, не разрешено его законное использование в целях обзора).</div></div><div class="__18i" data-box data-id="1" onclick="return go.checkbox([this,this.firstChild,\'__18j0\'])"><div class="__18j"></div><div class="__18k">Настоящим я заявляю, под страхом наказания за лжесвидетельство, что информация, содержащаяся в настоящем уведомлении, точна и я являюсь владельцем или имею полномочия действовать от имени владельца авторских или исключительных прав в рамках тех авторских прав, которые предположительно были нарушены.</div></div><div class="__18i" data-box data-id="1" onclick="return go.checkbox([this,this.firstChild,\'__18j0\'])"><div class="__18j"></div><div class="__18k">Я признаю, что в соответствии с положениями раздела 512(f) любое лицо, которое заведомо ложно представляет данный материал либо действия как нарушающие авторское право или законы, может нести ответственность за понесенный в связи с этим ущерб.</div></div></div><div class="__18e">Ввод полного имени в этом поле равносилен цифровой подписи.</div><input type="text" class="__18d" data-input maxlength="150"><div class="__18e">Подтвердите ваши действия вашем паролем.</div><input type="password" class="__18d" id="_pass" data-input maxlength="150"><div class="__4i __4i1"><button class="__4o" style="margin: 8px 0 0 130px;" onclick="return go.doc.supSend(this)" data-status="open"><div class="lg-1"></div><span>Отправить уведомление</span></button></div></div></div>')));
}
function audio($a) {
	//<div class="__22d"><div class="__22e">Justin Timberlake</div><div class="__22f">Suit and tie</div></div>
echo '<div class="__21t"><div class="__21v">
<div class="__19y" style="margin: 25px 0 0 25px;width: 120px;"><div class="__19z" style="width: 120px;"></div></div>
<div class="__21u"><div class="__21z"></div><div class="__21z __21z0" style="background: none;"></div><div class="__21z" style="background-position: -20px 0;"></div></div><div class="__21w"><button class="__21x">Плейлист</button><button class="__21x">Моя музыка</button><button class="__21x">Рекомендации</button><button class="__21x">Альбомы</button></div></div>

<div class="__22a">

<div class="__22b"><div class="__22c"><img src="/sources/tl.jpg" width="50" height="50" class="photo"></div>
<div class="__19l __19m __22g"></div>
<div class="__19n" style="margin-top: 3px;"></div>
<div class="__19o" style="margin-top: 3px;"></div>
<div class="__19q" style="margin: 38px 0 0 160px;width: 396px;"><div class="__19r" style="width: 396px;"></div></div>
<div class="__20a" style="margin: 20px 0 0 532px;">3:06</div>
<div class="__19p" style="margin-top: 20px;"><span style="font-weight: bold;color: black;">Ed sheeran</span> – shape of you</div><div class="__19v" style="margin: 21px 0 0 735px;"></div><div class="__19u" style="margin: 21px 0 0 695px;"></div><div class="__19s" style="margin: 21px 0 0 654px;"></div><div class="__19t" id="__19t" style="margin: 21px 0 0 613px;"></div><div class="__19w" style="margin: 28px 0 0 578px;"><div class="__19x"></div></div></div>
<div class="">

<div class="__18w" style="width: 750px;"><div class="__20m"></div><input type="text" class="__18x" placeholder="Поиск по аудиозаписьям, альбомам, исполнительям" style="width: 686px;background: white;"></div>


<div class="__19b" onselectstart="return false;">
		<div class="__19c"><div class="__20p" style="display: block;margin-left: 600px;"><div class="__20s"></div></div><div class="__20q __20q0">3:14</div><div class="__19d" style="background-image: url(/sources/ed.jpg);"><div class="__20j"></div><div class="__20u __20v" style="display: block;"></div></div><div class="__19e"><div class="__19f">Shape of you</div><div class="__19g">Ed sheeran</div></div></div>
		<div class="__19c"><div class="__20p" style="display: block;margin-left: 600px;"><div class="__20s"></div></div><div class="__20q __20q0" style="">4:36</div><div class="__19d" style="background-image: url(/sources/jt.jpg);"><div class="__20u __20v" style="display: none;"></div></div><div class="__19e"><div class="__19f">Suit and tie</div><div class="__19g">Justin timberlake</div></div></div>
		<div class="__19c"><div class="__20p" style="display: block;margin-left: 600px;"><div class="__20s"></div></div><div class="__20q __20q0" style="">4:36</div><div class="__19d" style="background-image: url(/sources/jt.jpg);"><div class="__20u __20v" style="display: none;"></div></div><div class="__19e"><div class="__19f">What goes around</div><div class="__19g">Justin timberlake</div></div></div>
		<div class="__19c"><div class="__20p" style="display: block;margin-left: 600px;"><div class="__20s"></div></div><div class="__20q __20q0" style="">4:36</div><div class="__19d" style="background-image: url(/sources/jt.jpg);"><div class="__20j"></div><div class="__20u __20v" style="display: none;"></div></div><div class="__19e"><div class="__19f">Cry me a river</div><div class="__19g">Justin timberlake</div></div></div>
		<div class="__19c"><div class="__20p" style="display: block;margin-left: 600px;"><div class="__20s"></div></div><div class="__20q __20q0" style="">4:36</div><div class="__19d" style="background-image: url(/sources/jt.jpg);"><div class="__20u __20v" style="display: none;"></div></div><div class="__19e"><div class="__19f">I think that she knows</div><div class="__19g">Justin timberlake</div></div></div>
		<div class="__19c"><div class="__20p" style="display: block;margin-left: 600px;"><div class="__20s"></div></div><div class="__20q __20q0">4:36</div><div class="__19d" style="background-image: url(/sources/jt.jpg);"><div class="__20u __20v"></div></div><div class="__19e"><div class="__19f">Seniorita</div><div class="__19g">Justin timberlake</div></div></div>
		</div>


</div>


</div>


</div>';
}
function follow($a) {
if ($a[1]==0) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][54][6]."` FROM `".$GLOBALS['info'][2][54][0]."` WHERE `".$GLOBALS['info'][2][54][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][54][3]."`='".$a[0]."' LIMIT 1"),$GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][54][6]."`) FROM `".$GLOBALS['info'][2][54][0]."` WHERE `".$GLOBALS['info'][2][54][2]."`='".$_SESSION['id']."'")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][54][0]."` SET `".$GLOBALS['info'][2][54][6]."`-1 WHERE `".$GLOBALS['info'][2][54][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][54][6]."`>".$GLOBALS['DB']->f($b[0])[0]);
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][54][0]."` SET `".$GLOBALS['info'][2][54][6]."`='".$b[1]."',`".$GLOBALS['info'][2][54][4]."`='0' WHERE `".$GLOBALS['info'][2][54][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][54][3]."`='".$a[0]."' LIMIT 1");
} else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][54][0]."` VALUES(NULL,".$_SESSION['id'].",".$a[0].",'0',now(),".($b[1]+1).")");
} else $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][54][0]."` SET `".$GLOBALS['info'][2][54][4]."`='1' WHERE `".$GLOBALS['info'][2][54][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][54][3]."`='".$a[0]."' LIMIT 1");
$a[2] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][54][1]."`) FROM `".$GLOBALS['info'][2][54][0]."` WHERE `".$GLOBALS['info'][2][54][3]."`='".$a[0]."' AND `".$GLOBALS['info'][2][54][4]."`='0'");
exit(json_encode($a));
}
function docSupportSave($a) {
$b = [1,'Ваша уведомление о нарушении в обработке'];
$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1")];
if ($GLOBALS['DB']->n($c[0])!=0) {
$c[1] = $GLOBALS['DB']->f($c[0])[0];
if (md5($a['pass'])==$c[1]) {
unset($a['pass']);
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][41][0]."` VALUES(NULL,1,".$_SESSION['id'].",'".$GLOBALS['DB']->s(json_encode($a))."',now(),'0')");
$b[0] = 0;
}
}
exit(json_encode($b));
}
function newAudio() {
//Аудиофайл не должен быть в формате MP3
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Выберите аудиозапись на Вашем компьютере</div><div class="_2d"><div class="__14v" onclick="return go.click()"><div class="__14w"></div><div class="__14x"></div><div class="__14y"></div><div class="__14z0"></div><div class="__15h"><div class="__15i">0</div><div class="__15k"><div class="__15l"></div></div><div class="__15j">Загрузка Аудиофайла</div></div></div><div class="__15a"><div class="__15f" onclick="go.doc.mv(this,0,event)" data-id="0"></div><div class="__15g" onclick="go.doc.mv(this,1,event)" data-id="0"></div><div class="__15b" data-id="0"><div class="__14t">Ограничения</div><div class="__14u">Аудиофайл не должен превышать 100 МБ.</div></div><div class="__15b invisible" data-id="1"><div class="__14t">Ограничения</div><div class="__14u">Аудиофайл не должен быть в формате MP3.</div></div><div class="__15b invisible" data-id="2"><div class="__14t">Требования</div><div class="__14u">Аудиофайл не должен нарушать авторские и смежные права.</div></div></div><div class="__15c"><div class="__15d __15e"></div><div class="__15d"></div><div class="__15d"></div></div></div><input type="file" id="file" onchange="return go.audio.up(this)" class="invisible" accept="audio/mp3"></div>')));
}
function newFolder() {
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Новая папка</div><div class="_2d"><div class="__6a" style="margin: 15px 15px 10px 15px;padding: 10px;border: 1px solid rgb(220,220,220);box-shadow: 0 0 0 2px rgba(0,0,0,.1);border-radius: 3px;background: #f9faf6;">Вы можете Ограничить доступ к текущей папке отключив галочку справа от имени файла, однако только вам будет доступно его содержимое.</div><div class="__4c"><div class="__4d">Название папки</div><input type="text" class="__4f" data-eds="0" maxlength="150" id="n-folder" placeholder="New folder"></div><div class="__5e" style="margin: -46px 108px 0 364px;position: absolute;"><div class="__5f"><div class="__5i"><div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-s="0"><div class="__5u" style="margin-left: 20px;"></div></div></div></div></div><div class="__4i __4i1"><button class="__4o" style="margin-top: 8px;" onclick="return go.doc.saveNewFolder(this)" data-status="open"><div class="lg-1"></div><span>Create folder</span></button></div></div></div>')));
}
function newDoc() {
exit(json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_m1">Загрузка документа</div><div class="_2d"><div class="__14v" onclick="return go.click()"><div class="__14w"></div><div class="__14x"></div><div class="__14y"></div><div class="__14z"></div><div class="__15h"><div class="__15i">0</div><div class="__15k"><div class="__15l"></div></div><div class="__15j">Загрузка документа</div></div></div><div class="__15a"><div class="__15f" onclick="go.doc.mv(this,0,event)" data-id="0"></div><div class="__15g" onclick="go.doc.mv(this,1,event)" data-id="0"></div><div class="__15b" data-id="0"><div class="__14t">Ограничения</div><div class="__14u">Поддерживаемые типы файлов: doc, docx, xls, xlsx, ppt, pptx, rtf, pdf, png, jpg, gif, psd, djvu, fb2, ps и другие.</div></div><div class="__15b invisible" data-id="1"><div class="__14t">Ограничения</div><div class="__14u">Файл не должен превышать 100 МБ.</div></div><div class="__15b invisible" data-id="2"><div class="__14t">Требования</div><div class="__14u">Документ не должен нарушать авторские права.</div></div></div><div class="__15c"><div class="__15d __15e"></div><div class="__15d"></div><div class="__15d"></div></div></div><input type="file" id="file" onchange="return go.doc.up(this)" class="invisible"></div>')));
}
function settingsPR() {
settPR();
echo json_encode(array('w'=>400,'html'=>'<div class="_box __5c" id="_box"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password Request<span class="__6l">Настройки сохранены!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Обеспечивает дополнительную защиту при взломе вашей страницы или если вы забудете вашу страницу открытой в чужом месте.</div><div class="__5e"><div class="__5f"><div class="__5h">Запрашивать пароль при изменений настроек</div><div class="__5i">'.($GLOBALS['info'][22][0]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-s="0"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-s="0"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Запрашивать пароль при удалении данных</div><div class="__5i">'.($GLOBALS['info'][22][1]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-s="1"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-s="1"><div class="__5u __5y"></div></div>').'</div></div><div class="__5f"><div class="__5h">Запрашивать пароль при изменений информаций</div><div class="__5i">'.($GLOBALS['info'][22][2]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-s="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-s="2"><div class="__5u __5y"></div></div>').'</div></div></div><div class="__6b"><button class="__4o __8g" id="bt1" onclick="return go.initF({a:this,b:\'go.settingsPRChange\',c:\'\'},event)" data-status="open"><div class="lg-1"></div><span>Save changes</span></button></div></div>'));
}
function settingsCode() {
exit(json_encode(array('w'=>700,'html'=>'<div class="_box __8i" id="_box"><div class="_m2 __8j" onclick="return load.marginOff()"></div><div class="_m1">Code generator</div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Обеспечивает надёжную защиту от взлома: для входа на страницу следует ввести одноразовый код, полученный по SMS или иным подключённым способом.</div><div class="__6a"><div class="__8k"><div class="__8n"><div class="__8l __8o"></div><div class="__8m __8q">Для авторизации нужно использовать специальный код, полученный одним из способов: SMS, мобильное приложение, заранее распечатанный список.</div></div><div class="__8n"><div class="__8l __8p"></div><div class="__8m __8r">Проверка Вас не утомит: для получения доступа к своему аккаунту с нового браузера или устройства достаточно ввести код подтверждения всего один раз.</div></div><div class="__8n"><div class="__8l"></div><div class="__8m">Даже если злоумышленник узнает Ваш логин, пароль и использованный код подтверждения, он не сможет попасть на Вашу страницу со своего компьютера.</div></div></div></div><div class="__8f">Внимание: когда подтверждение входа включено, услуга восстановления пароля по номеру телефона становится недоступной. Поэтому настоятельно рекомендуем привязать к странице актуальный e-mail, указать истинные имя и фамилию и загрузить свои настоящие фотографии в качестве главных, прежде чем продолжить настройку.</div><div class="__6b"><button class="__4o __6d" id="bt1" onclick="return go.passwordChange(this,event)" data-status="open"><div class="lg-1"></div><span>Продолжить</span></button></div></div></div>')));
}
function saveSettingsDesign($a) {
	$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][9][2]."`,`".$GLOBALS['info'][2][9][3]."`,`".$GLOBALS['info'][2][9][4]."`,`".$GLOBALS['info'][2][9][5]."` FROM `".$GLOBALS['info'][2][9][0]."` WHERE `".$GLOBALS['info'][2][9][1]."`='".$_SESSION['id']."' LIMIT 1"),1=>$a);
	$b[1]['s'] = 0;
	if ($GLOBALS['DB']->n($b[0])!=0) {
		$b[2] = $GLOBALS['DB']->f($b[0]);
		if ($b[2][0]!=$a['d']) $b[1]['s'] = 1;
		if ($b[2][1]!=$a['t']) $b[1]['s'] = 1;
		if ($b[2][2]!=$a['c']) $b[1]['s'] = 1;
		if ($b[2][3]!=$a['l']) $b[1]['s'] = 1;
		$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][9][0]."` SET `".$GLOBALS['info'][2][9][2]."`='".$a['d']."',`".$GLOBALS['info'][2][9][3]."`='".$a['t']."',`".$GLOBALS['info'][2][9][4]."`='".$a['c']."',`".$GLOBALS['info'][2][9][5]."`='".$a['l']."' WHERE `".$GLOBALS['info'][2][9][1]."`='".$_SESSION['id']."' LIMIT 1");
	} else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][9][0]."` VALUES(".$_SESSION['id'].",".$a['d'].",".$a['t'].",".$a['c'].",".$a['l'].")");
	exit(json_encode($b[1]));
}
function profileAddressChangeNow($a) {
	$b = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][1]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][2]."`='".$a."' AND `".$GLOBALS['info'][2][2][3]."`='0' LIMIT 1");
	$c = array('v'=>$a,'s'=>0);
	if ($GLOBALS['DB']->n($b)!=0) {
	$d = $GLOBALS['DB']->f($b)[0];
	if ($d==$_SESSION['id']) $b['s'] = 1;
	} else $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][2][0]."` SET `".$GLOBALS['info'][2][2][2]."`='".$a."' WHERE `".$GLOBALS['info'][2][2][1]."`='".$_SESSION['id']."' LIMIT 1");
	$c['m'] = menuLeft();
	exit(json_encode($c));
}
function profileAddressChange($a) {
	$b = array(0=>$GLOBALS['info'][20],1=>0);
	foreach ($b[0] as $c=>$d) if (preg_match("/^".$d."(\d*)?$/",$a)) $b[1] = 1;
	if ($b[1]==0) if (!preg_match("/^[\w\d_]{3,}$/",$a)) $b[1] = 2;
	$b[2] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][1]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][2]."`='".$a."' AND `".$GLOBALS['info'][2][2][3]."`='0' LIMIT 1");
	if ($GLOBALS['DB']->n($b[2])!=0) if ($GLOBALS['DB']->f($b[2])[0]==$_SESSION['id']) $b[1] = 3; else $b[1] = 4;
	exit(json_encode(array('t'=>$b[1],'v'=>$a)));
}
function email() {
/*
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][2]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$_SESSION['id']."' LIMIT 1"),1=>'');
if ($GLOBALS['DB']->n($b[0])!=0) $b[1] = $GLOBALS['DB']->f($b[0])[0];
*/
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][2]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1"),1=>'<div class="__6a">На новый почтовый ящик придёт письмо с подтверждением.</div>');
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[2] = $GLOBALS['DB']->f($b[0])[0];
$b[1] = '<div class="__6a">На новый почтовый ящик придёт письмо с подтверждением. На ваш старый почтовый ящик придёт уведомление об изменений.</div><div class="__6b"><input type="text" class="__4f __6c" placeholder="Current email" id="cp" readonly value="'.$b[2].'"></div>';
}
//$info[2][1] = array(0=>'_authorization',1=>'id',2=>'email',3=>'phone',4=>'password');//authorization
$a = array('w'=>400,'html'=>'<div class="_box __5c" id="_box" onstart="return false;"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Email change<span class="__6l">Адрес изменен!</span></div><div class="box-body-out">'.$b[1].'<div class="__6b"><input type="text" class="__4f __6c" placeholder="New email" id="cp"></div><div class="__6b"><button class="__4o __6d __4t __8s" id="bt1" onclick="return go.passwordChange(this,event)" data-status="open"><div class="lg-1"></div><span>Далее</span></button></div></div>');
echo json_encode($a);
}
function profileAddress() {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][2]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$_SESSION['id']."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) $b[1] = $GLOBALS['DB']->f($b[0])[0];
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c" id="_box" onstart="return false;"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Profile address<span class="__6l">Адрес изменен!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Вы можете изменить Ваш адрес страницы на более удобный и запоминающийся. Для этого введите адрес, состоящее из латинских букв, цифр или знаков «_».</div><div class="__6b"><input type="text" class="__4f __6c" placeholder="id'.$_SESSION['id'].'" id="cp" value="'.$b[1].'" oninput="return go.profileAddressChange(this,event)"></div><div class="__6b"><button class="__4o __6d __4t __8s" id="bt1" onclick="return go.passwordChange(this,event)" data-status="open"><div class="lg-1"></div><span>Текущий адрес</span></button></div></div>')));
}
function folderDocMove($a) {
$a = [json_decode($a[0]),$a[1],json_decode($a[2]),json_decode($a[3]),json_decode($a[4])];
if ($a[2]!='') {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][38][5]."` FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[2][0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[2][1]."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[0])[0];
$b[0] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][38][5]."` FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[0][1]."' LIMIT 1");
if ($GLOBALS['DB']->n($b[0])==0) exit(2); else $b[2] = $GLOBALS['DB']->f($b[0])[0];
if ($b[1]>$b[2]) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`=`".$GLOBALS['info'][2][38][5]."`-1 WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][5]."`>'".$b[2]."' AND `".$GLOBALS['info'][2][38][5]."`<'".$b[1]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`='".($b[1]-1)."' WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[0][1]."' LIMIT 1");
} else if ($b[1]<$b[2]) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`=`".$GLOBALS['info'][2][38][5]."`+1 WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][5]."`>='".$b[1]."' AND `".$GLOBALS['info'][2][38][5]."`<'".$b[2]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`='".$b[1]."' WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[0][1]."' LIMIT 1");
}
} else if ($a[3]!='') {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][38][5]."` FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[0][0]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[0][1]."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])==0) exit(); else $b[1] = $GLOBALS['DB']->f($b[0])[0];
$b[2] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][38][5]."`) FROM `".$GLOBALS['info'][2][38][0]."` WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[0][0]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`=`".$GLOBALS['info'][2][38][5]."`-1 WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][5]."`>'".$b[1]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][38][0]."` SET `".$GLOBALS['info'][2][38][5]."`='".$b[2]."' WHERE `".$GLOBALS['info'][2][38][3]."`='".$a[4][1]."' AND `".$GLOBALS['info'][2][38][4]."`='".$a[0][1]."' AND `".$GLOBALS['info'][2][38][2]."`='".$a[0][0]."' LIMIT 1");
}
}
function docReplace($a) {
$c = array(0=>json_decode($a[0]));
if ($a[2]!='') {
$c[1] = json_decode($a[2]);
$e = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][6]."` FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][1]."`='".$c[1][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$c[1][0]."' LIMIT 1"));
if ($GLOBALS['DB']->n($e[0])==0) exit(); else $e[1] = $GLOBALS['DB']->f($e[0])[0];
$e[0] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][6]."` FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][1]."`='".$c[0][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' LIMIT 1");
if ($GLOBALS['DB']->n($e[0])==0) exit(); else $e[2] = $GLOBALS['DB']->f($e[0])[0];
if ($e[1]>$e[2]) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][6]."`=(`".$GLOBALS['info'][2][36][6]."`-1) WHERE `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' AND `".$GLOBALS['info'][2][36][6]."`>'".$e[2]."' AND `".$GLOBALS['info'][2][36][6]."`<'".$e[1]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][6]."`='".($e[1]-1)."' WHERE `".$GLOBALS['info'][2][36][1]."`='".$c[0][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' LIMIT 1");
} else if ($e[1]<$e[2]) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][6]."`=(`".$GLOBALS['info'][2][36][6]."`+1) WHERE `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' AND `".$GLOBALS['info'][2][36][6]."`>='".$e[1]."' AND `".$GLOBALS['info'][2][36][6]."`<'".$e[2]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][6]."`='".$e[1]."' WHERE `".$GLOBALS['info'][2][36][1]."`='".$c[0][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' LIMIT 1");
}
} elseif ($a[3]!='') {
$c[1] = json_decode($a[3]);
$e = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][6]."` FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][1]."`='".$c[0][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' LIMIT 1"));
if ($GLOBALS['DB']->n($e[0])==0) exit(); else $e[1] = $GLOBALS['DB']->f($e[0])[0];
$e[2] = $GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][36][6]."`) FROM `".$GLOBALS['info'][2][36][0]."` WHERE `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][6]."`=(`".$GLOBALS['info'][2][36][6]."`-1) WHERE `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' AND `".$GLOBALS['info'][2][36][6]."`>'".$e[1]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][6]."`='".$e[2]."' WHERE `".$GLOBALS['info'][2][36][1]."`='".$c[0][1]."' AND `".$GLOBALS['info'][2][36][2]."`='".$c[0][0]."' LIMIT 1");
}
}
function docFormChange($a) {
if (alertBox::CNT()!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][34][0]."` SET `".$GLOBALS['info'][2][34][2]."`='".$a[0]."' WHERE `".$GLOBALS['info'][2][34][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][34][0]."` VALUES(".$_SESSION['id'].",'".$a[0]."',".$GLOBALS['info'][40][0].",'0')");
$GLOBALS['info'][40][1] = $a[0];
$c = array(0=>alertBox::docContinue([$a[1][0],0,$a[1][1]]),1=>($a[1][0]==0?'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -50px;"></div><div class="__13w">Empty</div></div>':($a[1][0]==1?'<div class="__16c" onclick="return go.doc.nw();"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g __13v"></div><div class="__13w">Empty</div></div>':($a[1][0]==2?'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g"></div><div class="__13w">Empty Trash</div></div>':'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -250px;"></div><div class="__13w">Empty</div></div>'))));
$c[2] = sizeof($c[0][4]);
if ($c[2]!=0) $c[1] = '';
for ($c[3]=0;$c[3]<$c[2];$c[3]++) $c[1] .= docType($c[0][4][$c[3]]);
exit(json_encode(array('s'=>$a[0],'html'=>$c[1],'mt'=>$a[1])));
}
function docLock($a) {
$b = explode('-',$a[1]);
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][9]."`='".$a[0]."' WHERE `".$GLOBALS['info'][2][36][2]."`='".$b[0]."' AND `".$GLOBALS['info'][2][36][1]."`='".$b[1]."' LIMIT 1");
}
function docEditSave($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][5]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."` FROM `".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][35][0]."` WHERE `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$a[1][1]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`='".$a[1][0]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."`=`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."` ORDER BY `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."` LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][36][0]."` SET `".$GLOBALS['info'][2][36][4]."`='".$GLOBALS['DB']->s($a[0])."' WHERE `".$GLOBALS['info'][2][36][1]."`='".$a[1][0]."' AND `".$GLOBALS['info'][2][36][2]."`='".$a[1][1]."' LIMIT 1");
$b[1] = $GLOBALS['DB']->f($b[0]);
exit(json_encode(array('id'=>$a[1][0],'own'=>$a[1][1],'nm'=>$a[0],'lt'=>alertBox::CNT(),'sz'=>fileSz($b[1][1]),'tp'=>$b[1][0],'tm'=>$b[1][2],'lck'=>$b[1][4],'ss'=>1,'clr'=>docColor($b[1][0],alertBox::CLR()),'dl'=>$b[1][3],'src'=>alertBox::SRC([$a[1][1],$a[1][0]]))));
} else exit(json_encode(array('ss'=>0)));
}
function docSettings($a) {
exit(json_encode(array('s'=>1,'w'=>400,'html'=>'<div class="_box __5c _box-pass" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);" style="margin: 0;"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1" id="_password" data-q="'.htmlspecialchars(json_encode(array('f'=>10,'arg'=>$a))).'">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initD(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div>')));
}
function passwordChange() {
exit(json_encode(array('w'=>400,'html'=>'<div class="_box __5c" id="_box" onstart="return false;"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Password settings</div><div class="box-body-out"><div id="p1"><div class="__6a">Associate your mobile phone with your Twitter account for enhanced security.</div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Current password" id="cp"><div class="__6e" id="__6e"><div class="__6f"><div class="__6g"></div>Пароль не изменён, так как прежний пароль введён неправильно.</div></div></div><div class="__6b"><input type="password" class="__4f __6c" placeholder="New password" id="np"><div class="__6e" id="__6e_1"><div class="__6f"><div class="__6g"></div><ul class="__6h"><li>Убедитесь что CAPS-Lock выключен.</li><li>Минимальная длина пароля 6 символов.</li><li>Пароль должен состоять из латинских букв и цифр.</li><li>pAssWoRd и password разные пароли.</li></ul></div></div></div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Confirm new password" id="vp"><div class="__6e" id="__6e_2"><div class="__6f"><div class="__6g"></div>Пароли не совпадают. Пожалуйста убедитесь что вы правильно написали ваш пароль.</div></div></div><div class="__6b"><button class="__4o __6d __8s" id="bt1" onclick="return go.passwordChange(this,event)" data-status="open"><div class="lg-1"></div><span>Change Password</span></button><div class="__6e" id="__6e_3"><div class="__6f"><div class="__6g"></div>Вы не можете изменить пароль, так как этот пароль используется в данный момент.</div></div></div></div><div id="p2"><div class="__6i"></div><div class="__6j">Password Changed successfully</div><div class="__6k" onclick="return load.marginOff()">OK</div></div></div></div>')));
}
function passwordChangeSave($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][4]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][1]."`='".$_SESSION['id']."' LIMIT 1")];
$b[2] = [0];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0])[0];
if (md5($a['c'])==$b[1]) {
if (preg_match('/[a-zA-Z0-9]{6,}/',$a['n'],$b[3])) {
if ($a['n']===$a['v']) {
if ($b[1]!=md5($a['n'])) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][1][0]."` SET `".$GLOBALS['info'][2][1][4]."`='".$GLOBALS['DB']->s(md5($a['n']))."'");
$b[2][0] = 4;
} else $b[2][0] = 3;
} else $b[2][0] = 2;
} else $b[2][0] = 1;
}
}
exit(json_encode($b[2]));
}
function educationSave($a) {
$c = [$a[0],0,''];
if ($a[0] == 0) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][22][1]."`) FROM `".$GLOBALS['info'][2][22][0]."` WHERE `".$GLOBALS['info'][2][22][10]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][22][9]."`='0' LIMIT 5");
if ($b!=5) {
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][22][0]."` VALUES(NULL,".$a[1].",".$a[2].",".$a[3].",".$a[4].",".$a[5].",".$a[6].",'".$GLOBALS['DB']->s($a[7])."','0',".$_SESSION['id'].")");
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][22][1]."` FROM `".$GLOBALS['info'][2][22][0]."` WHERE `".$GLOBALS['info'][2][22][10]."`='".$_SESSION['id']."' ORDER BY `".$GLOBALS['info'][2][22][1]."` DESC LIMIT 1"));
$b[1] = $GLOBALS['DB']->f($b[0])[0];
$c[1] = 1;
$c[2] = '<div class="__9p" data-id="'.$b[1].'" style="background-color: rgb(240,240,240);"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editEdu({\'t\':0,\'i\':'.$b[1].'},this,event)"></div><div class="__9o" onclick="return go.removeEdu({\'t\':0,\'i\':'.$b[1].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($a[1]).'" readonly="true"></div><div class="__4c"><div class="__4d">City</div><input type="text" class="__4f" value="'.$GLOBALS['info'][34][$a[1]][$a[2]].'" readonly="true"></div><div class="__4c"><div class="__4d">School</div><input type="text" class="__4f" value="'.$GLOBALS['info'][35][$a[1]][$a[2]][$a[3]].'" readonly="true"></div>'.($a[4]!=0?'<div class="__4c"><div class="__4d">Год начала обучения</div><input type="text" class="__4f" value="'.$a[4].'" readonly="true"></div>':'').($a[5]!=0?'<div class="__4c"><div class="__4d">Год окончания</div><input type="text" class="__4f" value="'.$a[5].'" readonly="true"></div>':'').($a[6]!=0?'<div class="__4c"><div class="__4d">Дата выпуска</div><input type="text" class="__4f" value="'.$a[6].'" readonly="true"></div>':'').($a[7]!=''?'<div class="__4c"><div class="__4d">Специализация</div><input type="text" class="__4f" value="'.$a[7].'" readonly="true"></div>':'').'</div>';
} else $c[2] = 'Можно указать максимум 5 Secondary and further education';
} else if ($a[0]==1) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][23][1]."`) FROM `".$GLOBALS['info'][2][23][0]."` WHERE `".$GLOBALS['info'][2][23][10]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][23][9]."`='0' LIMIT 5");
if ($b!=5) {
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][23][0]."` VALUES(NULL,".$a[1].",".$a[2].",".$a[3].",".$a[4].",".$a[5].",".$a[6].",".$a[7].",'0',".$_SESSION['id'].")");
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][23][1]."` FROM `".$GLOBALS['info'][2][23][0]."` WHERE `".$GLOBALS['info'][2][23][10]."`='".$_SESSION['id']."' ORDER BY `".$GLOBALS['info'][2][23][1]."` DESC LIMIT 1"));
$b[1] = $GLOBALS['DB']->f($b[0])[0];
$c[1] = 1;
$c[2] = '<div class="__9p" data-id="'.$b[1].'" style="background-color: rgb(240,240,240);"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editEdu({\'t\':1,\'i\':'.$b[1].'},this,event)"></div><div class="__9o" onclick="return go.removeEdu({\'t\':1,\'i\':'.$b[1].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($a[1]).'" readonly="true"></div><div class="__4c"><div class="__4d">City</div><input type="text" class="__4f" value="'.$GLOBALS['info'][34][$a[1]][$a[2]].'" readonly="true"></div><div class="__4c"><div class="__4d">University</div><input type="text" class="__4f" value="'.$GLOBALS['info'][36][$a[1]][$a[2]][$a[3]].'" readonly="true"></div>'.($a[4]!=0?'<div class="__4c"><div class="__4d">Факультет</div><input type="text" class="__4f" value="'.$GLOBALS['info'][37][$a[1]][$a[2]][$a[3]][$a[4]].'" readonly="true"></div>':'').($a[5]!=0?'<div class="__4c"><div class="__4d">Форма обучения</div><input type="text" class="__4f" value="'.($a[5]==1?'Очная':($a[5]==2?'Очно-заочная':($a[5]==3?'Заочная':($a[5]==4?'Экстернат':'Дистанционная')))).'" readonly="true"></div>':'').($a[6]!=0?'<div class="__4c"><div class="__4d">Статус</div><input type="text" class="__4f" value="'.($a[6]==1?'Абитуриент':($a[6]==2?'Студент (специалист)':($a[6]==3?'Студент (бакалавр)':($a[6]==4?'Студент (магистр)':($a[6]==5?'Выпускник (специалист)':($a[6]==6?'Выпускник (бакалавр)':($a[6]==7?'Выпускник (магистр)':($a[6]==8?'Аспирант':($a[6]==9?'Кандидат наук':($a[6]==10?'Доктор наук':($a[6]==11?'Интерн':($a[6]==12?'Клинический ординатор':($a[6]==13?'Соискатель':($a[6]==14?'Ассистент-стажёр':($a[6]==15?'Докторант':'Адъюнкт'))))))))))))))).'" readonly="true"></div>':'').($a[7]!=0?'<div class="__4c"><div class="__4d">Дата выпуска</div><input type="text" class="__4f" value="'.$a[7].'" readonly="true"></div>':'').'</div>';
} else $c[2] = 'Можно указать максимум 5 Higher education';
} else if ($a[0]==2) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][24][1]."`) FROM `".$GLOBALS['info'][2][24][0]."` WHERE `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][24][3]."`='0' LIMIT 15");
if ($b!=15) {
$b = [$GLOBALS['DB']->c("SELECT MAX(`".$GLOBALS['info'][2][24][5]."`) FROM `".$GLOBALS['info'][2][24][0]."` WHERE `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."'"),1=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][24][1]."`,`".$GLOBALS['info'][2][24][3]."`,`".$GLOBALS['info'][2][24][5]."` FROM `".$GLOBALS['info'][2][24][0]."` WHERE `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][24][2]."`='".$a[1]."' LIMIT 1")];
$b[0] = $b[0]!=0?$b[0]:1;
$b[2] = $GLOBALS['DB']->n($b[1]);
if ($b[2]!=0) {
$b[3] = $GLOBALS['DB']->f($b[1]);
if ($b[3][1]!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][24][0]."` SET `".$GLOBALS['info'][2][24][5]."`=`".$GLOBALS['info'][2][24][5]."`-1 WHERE `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' AND  `".$GLOBALS['info'][2][24][5]."`>'".$b[3][2]."'");
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][24][0]."` SET `".$GLOBALS['info'][2][24][5]."`='".$b[0]."',`".$GLOBALS['info'][2][24][3]."`='0' WHERE `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][24][2]."`='".$a[1]."' LIMIT 1");
$c[1] = 1;
$c[2] = '<div class="__4c" data-id="'.$b[3][0].'"><div class="__9m"><div class="__9o" onclick="return go.removeEdu({\'t\':2,\'i\':'.$b[3][0].'},this,event)"></div></div><div class="__4d"></div><input type="text" class="__4f" value="'.$GLOBALS['info'][38][$a[1]][0].'" readonly="true"></div>';
} else $c[2] = 'Вы уже указали этот язык.';
} else {
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][24][0]."` VALUES(NULL,".$a[1].",'0',".$_SESSION['id'].",".$b[0].")");
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][24][1]."` FROM `".$GLOBALS['info'][2][24][0]."` WHERE `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][24][2]."`='".$a[1]."'")];
$b[1] = $GLOBALS['DB']->f($b[0])[0];
$c[1] = 1;
$c[2] = '<div class="__4c" data-id="'.$b[1].'" style="background-color:rgb(240,240,240);"><div class="__9m"><div class="__9o" onclick="return go.removeEdu({\'t\':2,\'i\':'.$b[1].'},this,event)"></div></div><div class="__4d"></div><input type="text" class="__4f" value="'.$GLOBALS['info'][38][$a[1]][0].'" readonly="true"></div>';
}
} else $c[2] = 'Можно указать максимум 15 языков.';
}
exit(json_encode($c));
}
function educationAdd($a) {
$f = date('Y');
$g = 1901;
$h = '<div class="__4y cent" onclick="return go.st(this,{\'i\':0,\'v\':\'Not selected\'})">Not selected</div>';
while ($g<$f) {
$h .= '<div class="__4y cent" onclick="return go.st(this,{\'i\':'.$f.',\'v\':'.$f.'})">'.$f.'</div>';
$f--;
}
$f = date('Y')+11;
$i = '<div class="__4y cent" onclick="return go.st(this,{\'i\':0,\'v\':\'Not selected\'})">Not selected</div>';
while ($g<$f) {
$i .= '<div class="__4y cent" onclick="return go.st(this,{\'i\':'.$f.',\'v\':'.$f.'})">'.$f.'</div>';
$f--;
}
$j = '';
if ($a['t']!=0) foreach ($GLOBALS['info'][37][$a['c']][$a['m']][$a['i']] as $k=>$v) $j .= '<div class="__4y" onclick="return go.st(this,{\'i\':'.$k.',\'v\':\''.($v!==0?$v:'Not selected').'\'})">'.($v!==0?$v:'Not selected').'</div>';
exit(json_encode(array('i'=>$a['t'],'html'=>($a['t']===0?'<div data-ct-school-add="0"><div class="__4c __4c2"><div class="__4d">Год начала обучения</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-x="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div><div class="__4c"><div class="__4d">Год окончания</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-x="0">Not selected</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$i.'</div></div></div></div><div class="__4c"><div class="__4d">Дата выпуска</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-x="0">Not selected</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$i.'</div></div></div></div><div class="__4c"><div class="__4d">Специализация</div><input type="text" class="__4f" data-x="0" maxlength="150"></div></div>':'<div data-ct-uni-add="0"><div class="__4c __4c2"><div class="__4d">Факультет</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-z="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$j.'</div></div></div></div><div class="__4c"><div class="__4d">Форма обучения</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-z="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.eduSel(this,{\'i\':0,\'v\':\'Не выбрана\'})">Не выбрана</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':1,\'v\':\'Очная\'})">Очная</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Очно-заочная\'})">Очно-заочная</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':3,\'v\':\'Заочная\'})">Заочная</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':4,\'v\':\'Экстернат\'})">Экстернат</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Дистанционная\'})">Дистанционная</div></div></div></div></div><div class="__4c"><div class="__4d">Статус</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-z="0">Not selected</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.eduSel(this,{\'i\':0,\'v\':\'Не выбрана\'})">Не выбрана</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':1,\'v\':\'Абитуриент\'})">Абитуриент</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Студент (специалист)\'})">Студент (специалист)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':3,\'v\':\'Студент (бакалавр)\'})">Студент (бакалавр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':4,\'v\':\'Студент (магистр)\'})">Студент (магистр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':5,\'v\':\'Выпускник (специалист)\'})">Выпускник (специалист)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':6,\'v\':\'Выпускник (бакалавр)\'})">Выпускник (бакалавр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':7,\'v\':\'Выпускник (магистр)\'})">Выпускник (магистр)</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':8,\'v\':\'Аспирант\'})">Аспирант</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':9,\'v\':\'Кандидат наук\'})">Кандидат наук</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':10,\'v\':\'Доктор наук\'})">Доктор наук</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':11,\'v\':\'Интерн\'})">Интерн</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':12,\'v\':\'Клинический ординатор\'})">Клинический ординатор</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':13,\'v\':\'Соискатель\'})">Соискатель</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':14,\'v\':\'Ассистент-стажёр\'})">Ассистент-стажёр</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':15,\'v\':\'Докторант\'})">Докторант</div><div class="__4y" onclick="return go.eduSel(this,{\'i\':16,\'v\':\'Адъюнкт\'})">Адъюнкт</div></div></div></div></div><div class="__4c"><div class="__4d">Дата выпуска</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-z="0">Not selected</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$i.'</div></div></div></div></div>'))));
}
function educationList($a) {
$b = $a['t']==0?$GLOBALS['info'][35][$a['m']][$a['i']]:$GLOBALS['info'][36][$a['m']][$a['i']];
$c = array('i'=>$a['t'],'html'=>'<div class="__4c" '.($a['t']==0?'data-ct-school':'data-ct-uni').'="0"><div class="__4d">'.($a['t']==0?'School':'University').'</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" id="city-s" data-id="0" '.($a['t']==0?'data-x="0"':'data-z="0"').'>Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w1"><div class="s-i __4w2"></div><input type="text" placeholder="Search" class="__4w3" oninput="return go.searchTxt(this)"></div><div class="__4w __4w0 invisible"></div><div class="__4w __4w0">');
foreach ($b as $k=>$v) {
$d = htmlspecialchars(json_encode(array('i'=>$k,'v'=>($v!==0?$v:'Not selected'),'m'=>$a['i'],'t'=>$a['t'])));
$c['html'] .= '<div class="__4y" onclick="return go.eduSel(this,'.$d.')" data-txt="'.($v!==0?$v:'Not selected').'">'.($v!==0?$v:'Not selected').'</div>';
}
$c['html'] .= '</div></div></div></div>';
exit(json_encode($c));
}
function saveMilitary($a) {
$b = [$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][25][1]."`) FROM `".$GLOBALS['info'][2][25][0]."` WHERE `".$GLOBALS['info'][2][25][7]."`='0' AND `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' LIMIT 3"),[0,'']];
if ($b[0]!=5) {
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][25][0]."` VALUES(NULL,".$a[0].",'".$GLOBALS['DB']->s($a[1])."','".$GLOBALS['DB']->s($a[2])."',".$a[3].",".$a[4].",'0',".$_SESSION['id'].")");
$b[2] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][25][1]."` FROM `".$GLOBALS['info'][2][25][0]."` WHERE `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' ORDER BY `".$GLOBALS['info'][2][25][1]."` DESC LIMIT 1");
$b[3] = $GLOBALS['DB']->f($b[2])[0];
$b[1] = [1,'<div class="__9p" data-id="'.$b[3].'"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editMilitary({\'t\':0,\'i\':'.$b[3].'},this,event)"></div><div class="__9o" onclick="return go.removeMilitary({\'t\':0,\'i\':'.$b[3].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($a[0]).'" readonly="true"></div><div class="__4c"><div class="__4d">Войсковая часть</div><input type="text" class="__4f" value="'.$a[1].'" readonly="true"></div><div class="__4c"><div class="__4d">Звание</div><input type="text" class="__4f" value="'.$a[2].'" readonly="true"></div>'.($a[3]!=0?'<div class="__4c"><div class="__4d">Год начала службы</div><input type="text" class="__4f" value="'.$a[3].'" readonly="true"></div>':'').($a[4]!=0?'<div class="__4c"><div class="__4d">Год окончания службы</div><input type="text" class="__4f" value="'.$a[4].'" readonly="true"></div>':'').'</div>'];
}
exit(json_encode($b[1]));
}
function changeName($a) {
$GLOBALS['DB']->q("REPLACE `".$GLOBALS['info'][2][26][0]."` VALUES(".$_SESSION['id'].",'".$GLOBALS['DB']->s($a[0])."','".$GLOBALS['DB']->s($a[1])."','".($a[3]!=0?$GLOBALS['DB']->s($a[2]):'')."','0',now())");
}
function cancelInfo() {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][26][0]."` SET `".$GLOBALS['info'][2][26][5]."`='1' WHERE `".$GLOBALS['info'][2][26][1]."`='".$_SESSION['id']."' LIMIT 1");
}
function saveInfo($b) {
$b[7] = [];
if (!preg_match('/^[A-Za-z]{0,31}$/',$b[0])) array_push($b[7],0);
if (!preg_match('/^[A-Za-z]{0,31}$/',$b[1])) array_push($b[7],1);
if ($b[3]!=0) if (!preg_match('/^[A-Za-z]{0,31}$/',$b[2])) array_push($b[7],2); else $b[2] = preg_replace('~[^a-zA-Z]+~', '', $b[2]);
$c = [explode('-',$b[4])];
if (!checkdate($c[0][1],$c[0][0],$b[5])) array_push($b[7],4);
if (sizeof($b[7])==0) {
$d = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][17][2]."`,`".$GLOBALS['info'][2][17][3]."`,`".$GLOBALS['info'][2][17][4]."` FROM `".$GLOBALS['info'][2][17][0]."` WHERE `".$GLOBALS['info'][2][17][1]."`='".$_SESSION['id']."' LIMIT 1"),0];
$d[2] = $GLOBALS['DB']->f($d[0]);
if ($d[2][0]!=$b[0]) $d[1] = 1; elseif ($d[2][1]!=$b[1]) $d[1] = 1; elseif ($d[2][2]!=$b[2]) $d[1] = 1;
$b[8] = [0];
if ($d[1]==1) {
$this->changeName([$b[0],$b[1],$b[2],$b[3]]);
$b[8] = [1,'<div class="__8u"><div class="__8v"><div class="__8x"></div></div><div class="__8w"><span class="__8y">We are processing your request.</span><div>Please note that it is customary to use full real names on VK. E.g.: John Smith, Jane Wu. New name (being reviewed by a moderator): <span class="__8y">'.$b[0].' '.$b[1].($b[3]!=0?' '.$b[2]:'').'</span></div></div><div class="__8z0"><div class="__8z" onclick="return go.cancelInfo()">Cancel request</div></div></div>'];
}
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][17][0]."` SET `".$GLOBALS['info'][2][17][5]."`='".$b[3]."',`".$GLOBALS['info'][2][17][6]."`='".$c[0][0]."',`".$GLOBALS['info'][2][17][7]."`='".$c[0][1]."',`".$GLOBALS['info'][2][17][8]."`='".$b[5]."',`".$GLOBALS['info'][2][17][9]."`='".$b[6]."' WHERE `".$GLOBALS['info'][2][17][1]."`='".$_SESSION['id']."' LIMIT 1");
}
exit(json_encode($b));
}
function saveMilitaryChanges($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][2],'w'=>400);
if ($a['s']==1) $a['f'] = saveMilitaryEdit($b); else $a['html'] = '<div class="_box __5c _box-pass" id="_password" data-q="'.htmlspecialchars(json_encode(array('f'=>9,'arg'=>$b))).'" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);"><div class="_m2 __5d" onclick="return load.check()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initE(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div>';
exit(json_encode($a));
}
function saveEduChanges($b) {
settPR();
$a = array('s'=>$GLOBALS['info'][22][2],'w'=>400);
if ($a['s']==1) $a['f'] = saveEduEdit($b); else $a['html'] = '<div class="_box __5c _box-pass" id="_password" data-q="'.htmlspecialchars(json_encode(array('f'=>6,'arg'=>$b))).'" ondblclick="event.stopPropagation ? event.stopPropagation():(event.cancelBubble=true);"><div class="_m2 __5d" onclick="return load.check()"></div><div class="_m1">Password confirm<span class="__6l" id="pcf">неверный пароль!</span></div><div class="box-body-out" style="padding: 0;"><div class="__6a" style="padding: 10px;margin: 15px 15px 10px 15px;border: 1px solid gainsboro;box-shadow: 0 0 0 2px rgba(0,0,0,.1);background: #f8fafb !important;border-radius: 3px;">Введите пароль от вашей учётной записи, чтобы сохранить изменения.</div><div><div class="__6b"><input type="password" class="__4f __6c" placeholder="Password" id="cp" value=""></div><div class="__6b"><button class="__4o __6d __8s" id="bt3" onclick="return go.initE(this,event)" data-status="open"><div class="lg-1"></div><span>Сохранить изменения</span></button></div></div></div></div>';
exit(json_encode($a));
}
function eduFaculty($a) {
exit(json_encode(array('html'=>'<div class="__4c"><div class="__4d">Факультет</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-edu="0">Not selected</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.findFaculty([$a['ct'],$a['t'],$a['i']]).'</div></div></div></div>')));
}
function eduL($a) {
exit(json_encode(array('i'=>($a['m']==0?'data-school-list':'data-uni-list'),'html'=>'<div class="__4c" '.($a['m']==0?'data-school-list':'data-uni-list').'="0"><div class="__4d">'.($a['m']==0?'School':'University').'</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '.($a['m']==0?'data-eds':'data-edu').'="0">Not selected</div><div class="__4m"></div></div>'.eduLSel($a).'</div>')));
}
function cityL($a) {
exit(json_encode(array('i'=>($a['m']==0?'data-school-ed':'data-uni-ed'),'html'=>'<div class="__4c" '.($a['m']==0?'data-school-ed':'data-uni-ed').'="0"><div class="__4d">City</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '.($a['m']==0?'data-eds':'data-edu').'="0">Not selected</div><div class="__4m"></div></div>'.cityLSel($a).'</div>')));
}
function cityList($a) {
exit(json_encode(array('i'=>$a['i'],'html'=>'<div class="__4c" '.($a['i']==0?'data-ct-lt':'data-ct-sc').'="0"><div class="__4d">City</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" '.($a['i']==0?'data-x':'data-z').'="0">Not selected</div><div class="__4m"></div></div>'.cityListSel($a).'</div>')));
}
function profileHome() {
/*
$b = '';
$c = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][7][3]."`,`".$GLOBALS['info'][2][7][4]."`,`".$GLOBALS['info'][2][7][5]."`,`".$GLOBALS['info'][2][7][6]."`,`".$GLOBALS['info'][2][7][7]."`,`".$GLOBALS['info'][2][7][8]."`,`".$GLOBALS['info'][2][7][9]."`,`".$GLOBALS['info'][2][7][10]."`,`".$GLOBALS['info'][2][7][11]."` FROM `".$GLOBALS['info'][2][7][0]."` WHERE `".$GLOBALS['info'][2][7][2]."`='".$_SESSION['id']."' LIMIT 1");
if ($GLOBALS['DB']->n($c)!=0) {
$d = $GLOBALS['DB']->f($c);
$GLOBALS['info'][18][0][0] = array(0=>$d[0],1=>$d[1],2=>$d[2],3=>$d[3],4=>$d[4],5=>$d[5],6=>$d[6],7=>$d[7],8=>$d[8]);
}
foreach ($GLOBALS['info'][18][0][0] as $k=>$v) $b .= '<div class="__5f"><div class="__5h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$GLOBALS['info'][18][0][1][$k]].'</div><div class="__5i">'.($v==0?'<div class="__5t" onclick="return go.init({f:\'go.pS\',v:'.$k.'},this)" data-id="0" data-q="'.$k.'"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.pS\'},this)" data-id="1" data-q="'.$k.'"><div class="__5u __5y"></div></div>').'</div></div>';
*/
$a = array('w'=>700,'html'=>'<div class="_box __9b" id="_box"><div class="_m2 __9c" onclick="return load.marginOff()"></div><div class="_m1">Map view</div><div class="box-body-out __5e1"><div class="__9d" id="map"></div><div class="__9e"><div class="__9f">Места которые вы указали на карте</div><div class="__9g"><div class="__9h"><div class="__9k"></div><div class="__9l"></div></div><div class="__9i"></div><div class="__9j"></div></div></div></div></div>');
$a = json_encode($a);
echo $a;
}
function deleteMilitary($a) {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][25][2]."`,`".$GLOBALS['info'][2][25][3]."`,`".$GLOBALS['info'][2][25][4]."` FROM `".$GLOBALS['info'][2][25][0]."` WHERE `".$GLOBALS['info'][2][25][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' LIMIT 1"),1=>'<div class="_2e _2e1">Информация не найдена</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff()">OK</div></div>');
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[2] = $GLOBALS['DB']->f($b[0]);
$b[1] = '<div class="_2e">Вы действительно хотите удалить данные?</div><div class="_2k"><div class="_2l">'.findCountry($b[2][0]).'</div><div class="_2m"></div><div class="_2l">'.$b[2][1].'</div><div class="_2m"></div><div class="_2l">'.$b[2][2].'</div></div><div class="_2f"><div class="_2g bt _2g1" id="bt1" data-status="open" onclick="return go.delM({\'i\':'.$a['i'].'})">Удалить</div><div class="_2g bt" onclick="return load.marginOff()">Отмена</div></div>';
}
echo json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_2c">Удаление информаций</div><div class="_2d">'.$b[1].'</div></div>'));
}
function del($a) {
$b = array(0=>($a['t']==0?$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][22][2]."`,`".$GLOBALS['info'][2][22][3]."`,`".$GLOBALS['info'][2][22][4]."` FROM `".$GLOBALS['info'][2][22][0]."` WHERE `".$GLOBALS['info'][2][22][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][22][10]."`='".$_SESSION['id']."' LIMIT 1"):($a['t']==1?$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][23][2]."`,`".$GLOBALS['info'][2][23][3]."`,`".$GLOBALS['info'][2][23][4]."` FROM `".$GLOBALS['info'][2][23][0]."` WHERE `".$GLOBALS['info'][2][23][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][23][10]."`='".$_SESSION['id']."' LIMIT 1"):$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][24][2]."` FROM `".$GLOBALS['info'][2][24][0]."` WHERE `".$GLOBALS['info'][2][24][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' LIMIT 1"))),1=>'<div class="_2e _2e1">Информация не найдена</div><div class="_2f"><div class="_2g bt" onclick="return load.marginOff()">OK</div></div>');
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[2] = $GLOBALS['DB']->f($b[0]);
if ($a['t']==0||$a['t']==1) {
$b[1] = '<div class="_2e">Вы действительно хотите удалить данные?</div><div class="_2k"><div class="_2l">'.findCountry($b[2][0]).'</div><div class="_2m"></div><div class="_2l">'.$GLOBALS['info'][34][$b[2][0]][$b[2][1]].'</div><div class="_2m"></div><div class="_2l">'.($a['t']==0?$GLOBALS['info'][35][$b[2][0]][$b[2][1]][$b[2][2]]:$GLOBALS['info'][36][$b[2][0]][$b[2][1]][$b[2][2]]).'</div></div><div class="_2f"><div class="_2g bt _2g1" id="bt1" data-status="open" onclick="return go.delQ('.htmlspecialchars(json_encode($a)).')">Удалить</div><div class="_2g bt" onclick="return load.marginOff()">Отмена</div></div>';
}else $b[1] = '<div class="_2e">Вы действительно хотите удалить данные?</div><div class="_2k"><div class="_2l">'.$GLOBALS['info'][38][$b[2][0]][0].'</div><div class="_2m"></div><div class="_2l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$GLOBALS['info'][38][$b[2][0]][1]].'</div></div><div class="_2f"><div class="_2g bt _2g1" id="bt1" data-status="open" onclick="return go.delQ('.htmlspecialchars(json_encode($a)).')">Удалить</div><div class="_2g bt" onclick="return load.marginOff()">Отмена</div></div>';
}
echo json_encode(array('w'=>500,'html'=>'<div class="_2b _2b1" id="_box" ondblclick="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" onselectstart="return false;"><div class="_m2 _2h" onclick="return load.marginOff()"></div><div class="_2c">'.($a['t']==0?'Удаление школы':($a['t']==1?'Удаление ВУЗа':'Удаление языка')).'</div><div class="_2d">'.$b[1].'</div></div>'));
}
function profileSettings() {
$b = '';
$c = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][7][3]."`,`".$GLOBALS['info'][2][7][4]."`,`".$GLOBALS['info'][2][7][5]."`,`".$GLOBALS['info'][2][7][6]."`,`".$GLOBALS['info'][2][7][7]."`,`".$GLOBALS['info'][2][7][8]."`,`".$GLOBALS['info'][2][7][9]."`,`".$GLOBALS['info'][2][7][10]."`,`".$GLOBALS['info'][2][7][11]."` FROM `".$GLOBALS['info'][2][7][0]."` WHERE `".$GLOBALS['info'][2][7][2]."`='".$_SESSION['id']."' LIMIT 1");
if ($GLOBALS['DB']->n($c)!=0) {
$d = $GLOBALS['DB']->f($c);
$GLOBALS['info'][18][0][0] = array(0=>$d[0],1=>$d[1],2=>$d[2],3=>$d[3],4=>$d[4],5=>$d[5],6=>$d[6],7=>$d[7],8=>$d[8]);
}
foreach ($GLOBALS['info'][18][0][0] as $k=>$v) $b .= '<div class="__5f"><div class="__5h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$GLOBALS['info'][18][0][1][$k]].'</div><div class="__5i">'.($v==0?'<div class="__5t" onclick="return go.init({f:\'go.pS\',v:'.$k.'},this)" data-id="0" data-qp="'.$k.'"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init({f:\'go.pS\'},this)" data-id="1" data-qp="'.$k.'"><div class="__5u __5y"></div></div>').'</div></div>';
echo json_encode(array('w'=>400,'html'=>'<div class="_box __5c" id="_box"><div class="_m2 __5d" onclick="return load.marginOff()"></div><div class="_m1">Profile settings</div><div class="box-body-out"><div class="__5e">'.$b.'</div></div></div>'));
}
}
function menuIdCheck($a,$c) {
$b = $a;
if ($a=='/id') {
$b = $c;
} elseif (($a=='/photos')||($a=='/videos')||($a=='/audios')) {
$b .= $_SESSION['id'];
}
return $b;
}


















function sContacts($a) {
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][21][1]."`) FROM `".$GLOBALS['info'][2][21][0]."` WHERE `".$GLOBALS['info'][2][21][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($b[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][21][0]."` SET `".$GLOBALS['info'][2][21][2]."`='".$GLOBALS['DB']->s(json_encode($a[0]))."',`".$GLOBALS['info'][2][21][3]."`='".$GLOBALS['DB']->s(json_encode($a[1]))."',`".$GLOBALS['info'][2][21][4]."`='".$GLOBALS['DB']->s(json_encode($a[2]))."',`".$GLOBALS['info'][2][21][5]."`='".$GLOBALS['DB']->s(json_encode($a[3]))."' WHERE `".$GLOBALS['info'][2][21][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][21][0]."` VALUES(".$_SESSION['id'].",'".$GLOBALS['DB']->s(json_encode($a[0]))."','".$GLOBALS['DB']->s(json_encode($a[1]))."','".$GLOBALS['DB']->s(json_encode($a[2]))."','".$GLOBALS['DB']->s(json_encode($a[3]))."')");
}
function saveInterests($a) {
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][20][1]."`) FROM `".$GLOBALS['info'][2][20][0]."` WHERE `".$GLOBALS['info'][2][20][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($b[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][20][0]."` SET `".$GLOBALS['info'][2][20][2]."`='".$GLOBALS['DB']->s($a[0])."',`".$GLOBALS['info'][2][20][3]."`='".$GLOBALS['DB']->s($a[1])."',`".$GLOBALS['info'][2][20][4]."`='".$GLOBALS['DB']->s($a[2])."',`".$GLOBALS['info'][2][20][5]."`='".$GLOBALS['DB']->s($a[3])."' WHERE `".$GLOBALS['info'][2][20][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][20][0]."` VALUES(".$_SESSION['id'].",'".$GLOBALS['DB']->s($a[0])."','".$GLOBALS['DB']->s($a[1])."','".$GLOBALS['DB']->s($a[2])."','".$GLOBALS['DB']->s($a[3])."')");
}
function delMilitaryInfo($a) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][25][0]."` SET `".$GLOBALS['info'][2][25][7]."`='1' WHERE `".$GLOBALS['info'][2][25][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' LIMIT 1");
return $a;
}
function delEduInfo($a) {
if ($a['m']==0) {
if ($a['t']==0||$a['t']==1) {
$b = $a['t']==0?$GLOBALS['info'][2][22]:$GLOBALS['info'][2][23];
$GLOBALS['DB']->q("UPDATE `".$b[0]."` SET `".$b[9]."`='1' WHERE `".$b[1]."`='".$a['i']."' AND `".$b[10]."`='".$_SESSION['id']."' LIMIT 1");
} else $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][24][0]."` SET `".$GLOBALS['info'][2][24][3]."`='1' WHERE `".$GLOBALS['info'][2][24][1]."`='".$a['i']."' AND `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' LIMIT 1");
return $a;
}
}
function saveDocSett($a) {
$c = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][34][1]."`) FROM `".$GLOBALS['info'][2][34][0]."` WHERE `".$GLOBALS['info'][2][34][1]."`='".$_SESSION['id']."' LIMIT 1"),1=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][10][1]."`) FROM `".$GLOBALS['info'][2][10][0]."` WHERE `".$GLOBALS['info'][2][10][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($c[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][34][0]."` SET `".$GLOBALS['info'][2][34][3]."`='".$a[1]."',`".$GLOBALS['info'][2][34][4]."`='".$a[0]."' WHERE `".$GLOBALS['info'][2][34][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][34][0]."` VALUES(".$_SESSION['id'].",'0','".$a[1]."','".$a[0]."')");
if ($c[1]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][10][0]."` SET `".$GLOBALS['info'][2][10][3]."`='".$a[2]."' WHERE `".$GLOBALS['info'][2][10][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][10][0]."` VALUES(".$_SESSION['id'].",'".$GLOBALS['info'][22][0]."','".$a[2]."','".$GLOBALS['info'][22][2]."')");
}
function saveMilitaryEdit($a) {
$b = array('s'=>0,'i'=>$a[0],'h'=>'');
//$info[2][25] = array(0=>'_info_military',1=>'id',2=>'ct',3=>'p0',4=>'p1',5=>'by',6=>'ey',7=>'ss',8=>'nm');//military
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][25][0]."` SET `".$GLOBALS['info'][2][25][2]."`='".$a[1]."',`".$GLOBALS['info'][2][25][3]."`='".$GLOBALS['DB']->s($a[2])."',`".$GLOBALS['info'][2][25][4]."`='".$GLOBALS['DB']->s($a[3])."',`".$GLOBALS['info'][2][25][5]."`='".$a[4]."',`".$GLOBALS['info'][2][25][6]."`='".$a[5]."' WHERE `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][25][1]."`='".$a[0]."'");
$c = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][25][1]."`) FROM `".$GLOBALS['info'][2][25][0]."` WHERE `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][25][7]."`='0' AND `".$GLOBALS['info'][2][25][1]."`='".$a[0]."' LIMIT 1");
if ($c!=0) {
$b['s'] = 1;
$b['h'] = '<div class="__9p" data-id="'.$a[0].'"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editMilitary({\'i\':'.$a[0].'},this,event)"></div><div class="__9o" onclick="return go.removeMilitary({\'i\':'.$a[0].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($a[1]).'" readonly="true"></div><div class="__4c"><div class="__4d">Войсковая часть</div><input type="text" class="__4f" value="'.$a[2].'" readonly="true"></div><div class="__4c"><div class="__4d">Звание</div><input type="text" class="__4f" value="'.$a[3].'" readonly="true"></div>'.($a[4]!=0?'<div class="__4c"><div class="__4d">Год начала службы</div><input type="text" class="__4f" value="'.$a[4].'" readonly="true"></div>':'').($a[5]!=0?'<div class="__4c"><div class="__4d">Год окончания службы</div><input type="text" class="__4f" value="'.$a[5].'" readonly="true"></div>':'').'</div>';
}
return $b;
}
function saveEduEdit($a) {
$b = array('t'=>$a[0],'s'=>0,'i'=>$a[1],'h'=>'');
if ($a[0]==0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][22][0]."` SET `".$GLOBALS['info'][2][22][2]."`='".$a[2]."',`".$GLOBALS['info'][2][22][3]."`='".$a[3]."',`".$GLOBALS['info'][2][22][4]."`='".$a[4]."',`".$GLOBALS['info'][2][22][5]."`='".$a[5]."',`".$GLOBALS['info'][2][22][6]."`='".$a[6]."',`".$GLOBALS['info'][2][22][7]."`='".$a[7]."',`".$GLOBALS['info'][2][22][8]."`='".$GLOBALS['DB']->s($a[8])."' WHERE `".$GLOBALS['info'][2][22][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][22][10]."`='".$_SESSION['id']."' LIMIT 1");
$c = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][22][1]."`) FROM `".$GLOBALS['info'][2][22][0]."` WHERE `".$GLOBALS['info'][2][22][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][22][9]."`='0' AND `".$GLOBALS['info'][2][22][10]."`='".$_SESSION['id']."' LIMIT 1");
if ($c!=0) {
$b['s'] = 1;
$b['h'] = '<div class="__9p" data-id="'.$a[1].'"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editEdu({\'t\':0,\'i\':'.$a[1].'},this,event)"></div><div class="__9o" onclick="return go.removeEdu({\'t\':0,\'i\':'.$a[1].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($a[2]).'" readonly="true"></div><div class="__4c"><div class="__4d">City</div><input type="text" class="__4f" value="'.$GLOBALS['info'][34][$a[2]][$a[3]].'" readonly="true"></div><div class="__4c"><div class="__4d">School</div><input type="text" class="__4f" value="'.$GLOBALS['info'][35][$a[2]][$a[3]][$a[4]].'" readonly="true"></div>'.($a[5]!=0?'<div class="__4c"><div class="__4d">Год начала обучения</div><input type="text" class="__4f" value="'.$a[5].'" readonly="true"></div>':'').($a[6]!=0?'<div class="__4c"><div class="__4d">Год окончания</div><input type="text" class="__4f" value="'.$a[6].'" readonly="true"></div>':'').($a[7]!=0?'<div class="__4c"><div class="__4d">Дата выпуска</div><input type="text" class="__4f" value="'.$a[7].'" readonly="true"></div>':'').($a[8]!=''?'<div class="__4c"><div class="__4d">Специализация</div><input type="text" class="__4f" value="'.$a[8].'" readonly="true"></div>':'').'</div>';
}
} else {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][23][0]."` SET `".$GLOBALS['info'][2][23][2]."`='".$a[2]."',`".$GLOBALS['info'][2][23][3]."`='".$a[3]."',`".$GLOBALS['info'][2][23][4]."`='".$a[4]."',`".$GLOBALS['info'][2][23][5]."`='".$a[5]."',`".$GLOBALS['info'][2][23][6]."`='".$a[6]."',`".$GLOBALS['info'][2][23][7]."`='".$a[7]."',`".$GLOBALS['info'][2][23][8]."`='".$a[8]."' WHERE `".$GLOBALS['info'][2][23][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][23][10]."`='".$_SESSION['id']."' LIMIT 1");
$c = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][23][1]."`) FROM `".$GLOBALS['info'][2][23][0]."` WHERE `".$GLOBALS['info'][2][23][1]."`='".$a[1]."' AND `".$GLOBALS['info'][2][23][9]."`='0' AND `".$GLOBALS['info'][2][23][10]."`='".$_SESSION['id']."' LIMIT 1");
if ($c!=0) {
$b['s'] = 1;
$b['h'] = '<div class="__9p" data-id="'.$a[1].'"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editEdu({\'t\':1,\'i\':'.$a[1].'},this,event)"></div><div class="__9o" onclick="return go.removeEdu({\'t\':1,\'i\':'.$a[1].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($a[2]).'" readonly="true"></div><div class="__4c"><div class="__4d">City</div><input type="text" class="__4f" value="'.$GLOBALS['info'][34][$a[2]][$a[3]].'" readonly="true"></div><div class="__4c"><div class="__4d">University</div><input type="text" class="__4f" value="'.$GLOBALS['info'][36][$a[2]][$a[3]][$a[4]].'" readonly="true"></div>'.($a[5]!=0?'<div class="__4c"><div class="__4d">Факультет</div><input type="text" class="__4f" value="'.$GLOBALS['info'][37][$a[2]][$a[3]][$a[4]][$a[5]].'" readonly="true"></div>':'').($a[6]!=0?'<div class="__4c"><div class="__4d">Форма обучения</div><input type="text" class="__4f" value="'.($a[6]==1?'Очная':($a[6]==2?'Очно-заочная':($a[6]==3?'Заочная':($a[6]==4?'Экстернат':'Дистанционная')))).'" readonly="true"></div>':'').($a[7]!=0?'<div class="__4c"><div class="__4d">Статус</div><input type="text" class="__4f" value="'.($a[7]==1?'Абитуриент':($a[7]==2?'Студент (специалист)':($a[7]==3?'Студент (бакалавр)':($a[7]==4?'Студент (магистр)':($a[7]==5?'Выпускник (специалист)':($a[7]==6?'Выпускник (бакалавр)':($a[7]==7?'Выпускник (магистр)':($a[7]==8?'Аспирант':($a[7]==9?'Кандидат наук':($a[7]==10?'Доктор наук':($a[7]==11?'Интерн':($a[7]==12?'Клинический ординатор':($a[7]==13?'Соискатель':($a[7]==14?'Ассистент-стажёр':($a[7]==15?'Докторант':'Адъюнкт'))))))))))))))).'" readonly="true"></div>':'').($a[8]!=0?'<div class="__4c"><div class="__4d">Дата выпуска</div><input type="text" class="__4f" value="'.$a[8].'" readonly="true"></div>':'').'</div>';
}
}
return $b;
}
function saveVw($a) {
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][18][1]."`) FROM `".$GLOBALS['info'][2][18][0]."` WHERE `".$GLOBALS['info'][2][18][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($b[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][18][0]."` SET `".$GLOBALS['info'][2][18][2]."`='".$a[0][0]."',`".$GLOBALS['info'][2][18][3]."`='".$a[0][1]."',`".$GLOBALS['info'][2][18][4]."`='".$a[0][2]."',`".$GLOBALS['info'][2][18][5]."`='".$a[0][3]."',`".$GLOBALS['info'][2][18][6]."`='".$a[0][4]."',`".$GLOBALS['info'][2][18][7]."`='".$a[0][5]."',`".$GLOBALS['info'][2][18][8]."`='".$a[0][6]."',`".$GLOBALS['info'][2][18][9]."`='".$a[0][7]."' WHERE `".$GLOBALS['info'][2][18][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][18][0]."` VALUES(".$_SESSION['id'].",'".$a[0][0]."','".$a[0][1]."','".$a[0][2]."','".$a[0][3]."','".$a[0][4]."','".$a[0][5]."','".$a[0][6]."','".$a[0][7]."')");
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][19][1]."`) FROM `".$GLOBALS['info'][2][19][0]."` WHERE `".$GLOBALS['info'][2][19][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($b[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][19][0]."` SET `".$GLOBALS['info'][2][19][2]."`='".$a[1][0]."',`".$GLOBALS['info'][2][19][3]."`='".$a[1][1]."',`".$GLOBALS['info'][2][19][4]."`='".$a[1][2]."',`".$GLOBALS['info'][2][19][5]."`='".$a[1][3]."',`".$GLOBALS['info'][2][19][6]."`='".$a[1][4]."',`".$GLOBALS['info'][2][19][7]."`='".$a[1][5]."' WHERE `".$GLOBALS['info'][2][19][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][19][0]."` VALUES(".$_SESSION['id'].",'".$a[1][0]."','".$a[1][1]."','".$a[1][2]."','".$a[1][3]."','".$a[1][4]."','".$a[1][5]."',now())");
}
function saveAccessSett($a) {
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][16][1]."`) FROM `".$GLOBALS['info'][2][16][0]."` WHERE `".$GLOBALS['info'][2][16][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($b[0]!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][16][0]."` SET `".$GLOBALS['info'][2][16][2]."`='".$a[0]."',`".$GLOBALS['info'][2][16][3]."`='".$a[1]."' WHERE `".$GLOBALS['info'][2][16][1]."`='".$_SESSION['id']."' LIMIT 1");
} else {
$GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][16][0]."` VALUES(".$_SESSION['id'].",'".$a[0]."','".$a[1]."')");
}
}
function savePrivacy($a) {
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][12][1]."`) FROM `".$GLOBALS['info'][2][12][0]."` WHERE `".$GLOBALS['info'][2][12][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($b[0]!=0) {
$GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][12][0]."` SET `".$GLOBALS['info'][2][12][2]."`='".$a[0]."',`".$GLOBALS['info'][2][12][3]."`='".$a[1]."',`".$GLOBALS['info'][2][12][4]."`='".$a[2]."',`".$GLOBALS['info'][2][12][5]."`='".$a[3]."',`".$GLOBALS['info'][2][12][6]."`='".$a[4]."',`".$GLOBALS['info'][2][12][7]."`='".$a[5]."',`".$GLOBALS['info'][2][12][8]."`='".$a[6]."',`".$GLOBALS['info'][2][12][9]."`='".$a[7]."',`".$GLOBALS['info'][2][12][10]."`='".$a[8]."',`".$GLOBALS['info'][2][12][11]."`='".$a[9]."',`".$GLOBALS['info'][2][12][12]."`='".$a[10]."',`".$GLOBALS['info'][2][12][13]."`='".$a[11]."',`".$GLOBALS['info'][2][12][14]."`='".$a[12]."',`".$GLOBALS['info'][2][12][15]."`='".$a[13]."',`".$GLOBALS['info'][2][12][16]."`='".$a[14]."',`".$GLOBALS['info'][2][12][17]."`='".$a[15]."',`".$GLOBALS['info'][2][12][18]."`='".$a[16]."',`".$GLOBALS['info'][2][12][19]."`='".$a[17]."',`".$GLOBALS['info'][2][12][20]."`='".$a[18]."' WHERE `".$GLOBALS['info'][2][12][1]."`='".$_SESSION['id']."' LIMIT 1");
} else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][12][0]."` VALUES(".$_SESSION['id'].",'".$a[0]."','".$a[1]."','".$a[2]."','".$a[3]."','".$a[4]."','".$a[5]."','".$a[6]."','".$a[7]."','".$a[8]."','".$a[9]."','".$a[10]."','".$a[11]."','".$a[12]."','".$a[13]."','".$a[14]."','".$a[15]."','".$a[16]."','".$a[17]."','".$a[18]."')");
}
function saveSettings($a) {
$b = array(0=>$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][11][1]."`) FROM `".$GLOBALS['info'][2][11][0]."` WHERE `".$GLOBALS['info'][2][11][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($b[0]!=0) $GLOBALS['DB']->q("UPDATE `".$GLOBALS['info'][2][11][0]."` SET `".$GLOBALS['info'][2][11][2]."`='".$a[0]."',`".$GLOBALS['info'][2][11][3]."`='".$a[1]."',`".$GLOBALS['info'][2][11][4]."`='".$a[2]."' WHERE `".$GLOBALS['info'][2][11][1]."`='".$_SESSION['id']."' LIMIT 1"); else $GLOBALS['DB']->q("INSERT INTO `".$GLOBALS['info'][2][11][0]."` VALUES(".$_SESSION['id'].",'".$a[0]."','".$a[1]."','".$a[2]."')");	
}
function settEv() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][13][2]."`,`".$GLOBALS['info'][2][13][3]."`,`".$GLOBALS['info'][2][13][4]."`,`".$GLOBALS['info'][2][13][5]."`,`".$GLOBALS['info'][2][13][6]."`,`".$GLOBALS['info'][2][13][7]."`,`".$GLOBALS['info'][2][13][8]."`,`".$GLOBALS['info'][2][13][9]."`,`".$GLOBALS['info'][2][13][10]."`,`".$GLOBALS['info'][2][13][11]."`,`".$GLOBALS['info'][2][13][12]."` FROM `".$GLOBALS['info'][2][13][0]."` WHERE `".$GLOBALS['info'][2][13][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][25][0] = $b[1][0];
$GLOBALS['info'][25][1] = $b[1][1];
$GLOBALS['info'][25][2] = $b[1][2];
$GLOBALS['info'][25][3] = $b[1][3];
$GLOBALS['info'][25][4] = $b[1][4];
$GLOBALS['info'][25][5] = $b[1][5];
$GLOBALS['info'][25][6] = $b[1][6];
$GLOBALS['info'][25][7] = $b[1][7];
$GLOBALS['info'][25][8] = $b[1][8];
$GLOBALS['info'][25][9] = $b[1][9];
$GLOBALS['info'][25][10] = $b[1][10];
}
}
function secureQLIST($a) {
$b = array(0=>array(),1=>sizeof($GLOBALS['info'][27]));
$b[3] = $a;
$b[5] = array();
for ($b[2]=0;$b[2]<$b[1];$b[2]++) {
$b[4] = rand(0,($b[1]-1));
if (sizeof($b[5])==3) break; else if (in_array($b[4],$b[3])) continue; else if (in_array($b[4],$a)) continue;
$b[3][] = $b[4];
$b[5][] = $b[4];
$b[0][] = array(0=>$b[4],$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$GLOBALS['info'][27][$b[4]]]);
}
return $b[0];
}
function settPR() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][10][2]."`,`".$GLOBALS['info'][2][10][3]."`,`".$GLOBALS['info'][2][10][4]."` FROM `".$GLOBALS['info'][2][10][0]."` WHERE `".$GLOBALS['info'][2][10][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][22][0] = $b[1][0];
$GLOBALS['info'][22][1] = $b[1][1];
$GLOBALS['info'][22][2] = $b[1][2];
}
}
class html {
	function view($a) {
		$b = bodyView($a);
		$a['tt'] = $b[1];
		return '<!DOCTYPE html><html lang="en"><head><title></title></head><meta charset="utf8"><body><div class="bck"></div><div id="header">'.htmlspecialchars(json_encode($a)).'</div><div id="body">'.head($a).$b[0].'</div>'.$GLOBALS['info'][9][0].'</body></html>';
	}
	function init($a) {
		$b = bodyView($a);
		echo '<!DOCTYPE html><html><head><title>'.$b[1].'</title>'.meta().css([0=>0,1=>1,2=>2,3=>3]).js().'</head><body><div class="bck"></div><div id="refresh">'.(($a['f']!=8&&$a['f']!=9)?head():'').$b[0].'</div></body></html>';
		/*
		if ($a['f']==1) {
			echo '<!DOCTYPE html><html><head><title>Infalike • '.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][48].'</title>'.meta().css([0=>0,1=>1,2=>2,3=>3]).js().'</head><body><div id="refresh">'.head().bodyView($a).'</div></body></html>';
		} elseif ($a['f']==4) {
			echo '<!DOCTYPE html><html><head><title>Новости</title>'.meta().css([0=>0,1=>1,2=>2,3=>3]).js().'</head><body><div id="refresh">'.head().bodyView($a).'</div></body></html>';
		} else if ($a['f']==5) {
			echo '<!DOCTYPE html><html><head><title>Settings</title>'.meta().css([0=>0,1=>1,2=>2,3=>3]).js().'</head><body><div id="refresh">'.head().bodyView($a).'</div></body></html>';
		} else if ($a['f']==6) {
			echo '<!DOCTYPE html><html><head><title>Edit</title>'.meta().css([0=>0,1=>1,2=>2,3=>3]).js().'</head><body><div id="refresh">'.head().bodyView($a).'</div></body></html>';
		} else if ($a['f']==7) {
			
		}
		*/
	}
}
function docName($a) {
return 'Document download';
}
function folderName($a) {
return 'folder';
}
function  userName($a) {
return 'My audios';
}
class view {
var $htm = '';
var $attr = '';
function __construct() {
	$this->htm = new html();
	$this->attr = array('f'=>4);
}
function start() {
$a = parse_url($GLOBALS['info'][1]['url']);
if ($a['path']=='badjs') {
$this->badjs();
} elseif (isset($_SESSION['id'])) {
if (in_array($a['path'],$GLOBALS['info'][14])) {
header('Location: /settings');
//default feed
exit;
}
if ($a['path']=='') {
$this->attr['f'] = 1;
$this->htm->init($this->attr);
} elseif ($a['path']=='about') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 0;
$this->htm->init($this->attr);
} elseif ($a['path']=='help') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 1;
$this->htm->init($this->attr);
} elseif ($a['path']=='jobs') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 2;
$this->htm->init($this->attr);
} elseif ($a['path']=='terms') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 3;
$this->htm->init($this->attr);
} elseif ($a['path']=='privacy') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 4;
$this->htm->init($this->attr);
} elseif ($a['path']=='cookies') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 5;
$this->htm->init($this->attr);
} elseif ($a['path']=='developers') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 6;
$this->htm->init($this->attr);
} elseif ($a['path']=='mobile') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 7;
$this->htm->init($this->attr);
} elseif ($a['path']=='advertise') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 8;
$this->htm->init($this->attr);
} elseif ($a['path']=='media') {
$this->attr['f'] = 3;
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 10;
$this->htm->init($this->attr);
} elseif ($a['path']=='feed') {
$this->htm->init($this->attr);
} elseif ($a['path']=='settings') {
$this->attr['f'] = 5;
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif ($a['path']=='edit') {
$this->attr['f'] = 6;
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif ($a['path']=='documents') {
$this->attr['f'] = 7;
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/folder\d+_\d+/',$a['path'])) {
$this->attr['f'] = 8;
$this->attr['d'] = $a['path'];
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/doc\d+_\d+/',$a['path'])) {
$this->attr['f'] = 9;
$this->attr['d'] = $a['path'];
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/fdownload\d+_\d+/',$a['path'])) {
$this->attr['f'] = 10;
$this->attr['d'] = $a['path'];
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/audios\d/',$a['path'])) {
$this->attr['f'] = 11;
$this->attr['d'] = $a['path'];
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/photos\d/',$a['path'])) {
$this->attr['f'] = 12;
$this->attr['d'] = $a['path'];
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} else if ($a['path']=='clubs') {
$this->clubs();
} else if ($a['path']=='outImg') {
$this->attr = parseQ($a['query'])['id'][0];
$this->imgOut();
}

} else {
if ($a['path']=='') {
$this->attr['f'] = 1;
$this->htm->init($this->attr);
}


}
exit();
}

function imgOut() {
$a = explode('-',$this->attr);
$b = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][27][0]."`.`".$GLOBALS['info'][2][27][2]."` FROM `".$GLOBALS['info'][2][27][0]."`,`".$GLOBALS['info'][2][28][0]."` WHERE `".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][1]."`='".$a[0]."' AND `".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][3]."`='".$a[1]."' AND `".$GLOBALS['info'][2][27][0]."`.`".$GLOBALS['info'][2][27][1]."`=`".$GLOBALS['info'][2][28][0]."`.`".$GLOBALS['info'][2][28][2]."` LIMIT 1");
$c = json_decode($GLOBALS['DB']->f($b)[0],true);
$d = imagecreatefromjpeg($c['o'][2]);
header("Content-type: image/jpeg");
imagejpeg($d);
imagedestroy($d);
}

/*
function badjs() {
	echo 'bad';
}
function feed() {

echo '<!DOCTYPE html><html><head><title>Новости</title>'.meta().css([0=>0,1=>1,2=>2,3=>3]).js().'</head><body><div id="refresh">'.head().'</div></body></html>';
}
function body($a = array(0=>0)) {

if ($a[0]==0) {
return '<div class="__i"><div class="__2l"><div class="__2m">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][68].'</div><div class="__2n">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][69].'</div><div class="__2o"><div class="__2p"></div><div class="__2q"></div><div class="__2r"></div><div class="__2s">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][70].'</div><div class="__2t"><a href="'.$GLOBALS['info'][12][0][0].'" target="_blank"><div class="__2u"><div class="wp"></div><div class="__2v">'.$GLOBALS['info'][12][0][1].'</div></div></a><a href="'.$GLOBALS['info'][12][1][0].'" target="_blank"><div class="__2u __2w"><div class="ios"></div><div class="__2v">'.$GLOBALS['info'][12][1][1].'</div></div></a><a href="'.$GLOBALS['info'][12][2][0].'" target="_blank"><div class="__2u __2x"><div class="android"></div><div class="__2v">'.$GLOBALS['info'][12][2][1].'</div></div></a></div></div></div><div class="__j"><div class="__k"><div class="__m"><input type="text" class="__n" id="i-1" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][52].'"></div><div class="__m"><input type="password" autocomplete="off" id="i-2" class="__n __o" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][50].'"><button class="__p" onclick="return login.start(this)"><div class="lg-1"></div><span>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][51].'</span></button></div><div class="__q" onclick="return login.checkbox(this)" data-status="0"><div class="__r"><div class="__r0" id="check-view"></div></div><div class="__s">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][53].' •</div></div><div class="__t">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][54].'</div></div><div class="__l"><div class="__u">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][55].' <span class="__v">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][56].'</span></div><div><div class="__m"><input type="text" class="__n" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][57].'"></div><div class="__m"><input type="text" autocomplete="off" class="__n" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][58].'"></div><div class="__2b">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][59].'</div><div class="__x"><div class="__y"><div class="__w">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][60].'</div><div class="__z"></div></div><div class="__y"><div class="__w __2a">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][61].'</div><div class="__z"></div></div><div class="__y"><div class="__w">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][62].'</div><div class="__z"></div></div></div><div class="__2b">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][63].'</div><div class="__2c"><div class="__2d"><div class="__2e"></div><div class="__2f">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][64].'</div></div><div class="__2d"><div class="__2e"></div><div class="__2f">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][65].'</div></div></div><div class="__m"><button class="__2g">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][66].'</button></div><div class="__2h"><div class="__2i"><div class="__2j"></div><div class="__2k">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][67].'</div></div></div></div></div></div></div>';
} else if ($a[0]==1) {

}


}
function loginMain() {
echo '<!DOCTYPE html><html><head><title>Infalike • '.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][48].'</title>'.meta().css([0=>0,1=>1,2=>2]).js().'</head><body><div id="refresh">'.head(array(0=>0)).$this->body(array(0=>0)).footer().'</div></body></html>';
}
*/
}



/*
$this->attr['f'] = 1;
$this->htm->init($this->attr);
} elseif ($a['path']=='about') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(0);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 0;
$this->htm->init($this->attr);
} elseif ($a['path']=='help') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(1);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 1;
$this->htm->init($this->attr);
} elseif ($a['path']=='jobs') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(2);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 2;
$this->htm->init($this->attr);
} elseif ($a['path']=='terms') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(3);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 3;
$this->htm->init($this->attr);
} elseif ($a['path']=='privacy') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(4);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 4;
$this->htm->init($this->attr);
} elseif ($a['path']=='cookies') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(5);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 5;
$this->htm->init($this->attr);
} elseif ($a['path']=='developers') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(6);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 6;
$this->htm->init($this->attr);
} elseif ($a['path']=='mobile') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(7);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 7;
$this->htm->init($this->attr);
} elseif ($a['path']=='advertise') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(8);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 8;
$this->htm->init($this->attr);
} elseif ($a['path']=='media') {
$this->attr['f'] = 3;
$this->attr['tt'] = menu(10);
$this->attr['q'] = parseQ($a['query']);
$this->attr['p'] = 10;
$this->htm->init($this->attr);
} elseif ($a['path']=='feed') {
$this->htm->init($this->attr);
} elseif ($a['path']=='settings') {
$this->attr['f'] = 5;
$this->attr['q'] = parseQ($a['query']);
$this->attr['tt'] = menu(10);
$this->htm->init($this->attr);
} elseif ($a['path']=='edit') {
$this->attr['f'] = 6;
$this->attr['q'] = parseQ($a['query']);
$this->attr['tt'] = menu(11);
$this->htm->init($this->attr);
} elseif ($a['path']=='documents') {
$this->attr['f'] = 7;
$this->attr['q'] = parseQ($a['query']);
$this->attr['tt'] = menu(12);
$this->htm->init($this->attr);
} elseif (preg_match('/folder\d+_\d+/',$a['path'])) {
$this->attr['f'] = 8;
$this->attr['d'] = $a['path'];
$this->attr['tt'] = folderName($a['path']);
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/doc\d+_\d+/',$a['path'])) {
$this->attr['f'] = 9;
$this->attr['d'] = $a['path'];
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/fdownload\d+_\d+/',$a['path'])) {
$this->attr['f'] = 10;
$this->attr['d'] = $a['path'];
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} elseif (preg_match('/audios\d/',$a['path'])) {
$this->attr['f'] = 11;
$this->attr['d'] = $a['path'];
$this->attr['tt'] = userName($a['path'],0);
$this->attr['q'] = parseQ($a['query']);
$this->htm->init($this->attr);
} else if ($a['path']=='clubs') {
$this->clubs();
} else if ($a['path']=='outImg') {
$this->attr = parseQ($a['query'])['id'][0];
$this->imgOut();
}

} else {
if ($a['path']=='') {
$this->attr['f'] = 1;
$this->htm->init($this->attr);
}

*/
function bodyView($a) {
		$b = ['','My news'];
		if ($a['f']==0) {
			$c = '';
			if (isset($_SESSION['lg'])) $c = $_SESSION['lg'];
			if (isset($a['v']['lg'])) $d = ['<div class="___2a"><div class="___2b">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][74].'</div><div class="___2c">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][75].'</div><div class="___2c">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][76].'</div><div class="___2c">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][77].'</div></div>','']; else $d = ['','___2o'];
			$b = ['<div class="__2y '.$d[1].'">'.$d[0].'<div class="__2z">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][78].'</div><div class="___2d"><div class="___2e"><input type="text" id="i-1" class="__n ___2f" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][52].'" value="'.$c.'"></div><div class="___2e"><input type="password" id="i-2" class="__n ___2f" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][50].'"></div><div class="___2e"><div class="__q" onclick="return login.checkbox(this)" data-status="0"><div class="__r"><div class="__r0" id="check-view"></div></div><div class="__s">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][53].'</div></div><a href="/restore" onclick="return go.link(this,event)" target="_blank"><div class="__t">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][54].'</div></a></div><div class="___2e"><button class="___2g" onclick="return login.start(this)"><div class="lg-1"></div><span>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][51].'</span></button><button class="___2h">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][66].'</button></div></div></div>'.footer(),'About'];
		} else if ($a['f']==1) {
			if (isset($_SESSION['lg'])) $c = $_SESSION['lg']; else $c = '';
			$b = ['<div class="__i"><div class="__2l"><div class="__2m">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][68].'</div><div class="__2n">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][69].'</div><div class="__2o"><div class="__2p"></div><div class="__2q"></div><div class="__2r"></div><div class="__2s">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][70].'</div><div class="__2t"><a href="'.$GLOBALS['info'][12][0][0].'" target="_blank"><div class="__2u"><div class="wp"></div><div class="__2v">'.$GLOBALS['info'][12][0][1].'</div></div></a><a href="'.$GLOBALS['info'][12][1][0].'" target="_blank"><div class="__2u __2w"><div class="ios"></div><div class="__2v">'.$GLOBALS['info'][12][1][1].'</div></div></a><a href="'.$GLOBALS['info'][12][2][0].'" target="_blank"><div class="__2u __2x"><div class="android"></div><div class="__2v">'.$GLOBALS['info'][12][2][1].'</div></div></a></div></div></div><div class="__j"><div class="__k"><div class="__m"><input type="text" class="__n" id="i-1" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][52].'" value="'.$c.'"></div><div class="__m"><input type="password" autocomplete="off" id="i-2" class="__n __o" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][50].'"><button class="__p" onclick="return login.start(this)"><div class="lg-1"></div><span>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][51].'</span></button></div><div class="__q" onclick="return login.checkbox(this)" data-status="0"><div class="__r"><div class="__r0" id="check-view"></div></div><div class="__s">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][53].'</div></div><div class="__t">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][54].'</div></div><div class="__l"><div class="__u">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][55].' <span class="__v">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][56].'</span></div><div><div class="__m"><input type="text" class="__n" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][57].'"></div><div class="__m"><input type="text" autocomplete="off" class="__n" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][58].'"></div><div class="__2b">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][59].'</div><div class="__x"><div class="__y"><div class="__w">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][60].'</div><div class="__z"></div></div><div class="__y"><div class="__w __2a">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][61].'</div><div class="__z"></div></div><div class="__y"><div class="__w">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][62].'</div><div class="__z"></div></div></div><div class="__2b">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][63].'</div><div class="__2c"><div class="__2d"><div class="__2e"></div><div class="__2f">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][64].'</div></div><div class="__2d"><div class="__2e"></div><div class="__2f">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][65].'</div></div></div><div class="__m"><button class="__2g">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][66].'</button></div><div class="__2h"><div class="__2i"><div class="__2j"></div><div class="__2k">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][67].'</div></div></div></div></div></div></div>'.footer(),'Welcome to Infalike'];
		} else if ($a['f']==2) {
			if (isset($_SESSION['lg'])) $c = $_SESSION['lg']; else $c = '';
			$b = ['<div class="__2y ___2j"><div class="__2z">Восстановление доступа к странице</div><div class="___2i">Пожалуйста, укажите Телефон или e-mail, который Вы использовали для входа на сайт. </div><div class="___2d ___2k"><div class="___2e"><input type="text" id="i-1" class="__n ___2f" placeholder="Phone or email" value="'.$c.'"></div><div class="___2e"><button class="___2l">Далее</button></div></div><div class="___2m"><div class="___2i ___2n">Вы можете войти или зарегистрироваться.</div><div class="___2e"><a href="/login" onclick="return go.link(this,event)"><button class="___2g"><div class="lg-1"></div><span>Log in</span></button></a><button class="___2h">Sign up</button></div></div></div>'.footer(),'Восстановление доступа к странице'];
		} else if ($a['f']==3) {
			$b = ['<div class="__3g0"><div class="___2p">'.menuTool($a['p']).'<div class="___2r">'.menuBody($a).'</div><div class="___2s"></div></div>'.footer().'</div>','Developers'];
		} else if ($a['f']==4) {
			$b = ['<div class="__3g">feed</div>','News'];
		} else if ($a['f']==5) {
					if (findURLV([$a['q'],'section','security'])) {
						security();
						$c = ['<div class="__3z">Security Settings</div><div class="__4a">Change your security settings.</div><div class="__4i"><div class="__4c"><div class="__4d">Code generator</div><button class="__4e" id="url" onclick="return go.settingsCode()">Configure</button></div><div class="__4c"><div class="__4d">Password request</div><button class="__4e" id="url" onclick="return go.settingsPR()">Configure</button></div></div><div class="__6u  __4r">Вы можете обезопасить измение настроек подтверждением паролем в разделе Security • Password request.</div><div class="__4i"><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Require personal information to reset my password</div><div class="__6o">'.($GLOBALS['info'][23][0]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-t="0"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-t="0"><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username. If you have a phone number on your account, you may be asked to verify that phone number before you can request a password reset with just your email address.</div></div></div><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Require personal information to reset my password</div><div class="__6o">'.($GLOBALS['info'][23][1]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-t="1"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-t="1"><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username.</div></div></div><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Уведомлять о входе через email.</div><div class="__6o">'.($GLOBALS['info'][23][2]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-t="2"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-t="2"><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username.</div></div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.security(this,event)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',1];
					} else if (findURLV([$a['q'],'section','privacy'])) {
						privacy();
						$e = [($GLOBALS['info'][24][0]==0?'<div class="__4n __6r" data-id="0" data-t="0">All members</div>':($GLOBALS['info'][24][0]==1?'<div class="__4n __6r" data-id="1" data-t="0">Friends and their friends</div>':($GLOBALS['info'][24][0]==2?'<div class="__4n __6r" data-id="2" data-t="0">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="0">Only me</div>'))),($GLOBALS['info'][24][1]==0?'<div class="__4n __6r" data-id="0" data-t="1">All members</div>':($GLOBALS['info'][24][1]==1?'<div class="__4n __6r" data-id="1" data-t="1">Friends and their friends</div>':($GLOBALS['info'][24][1]==2?'<div class="__4n __6r" data-id="2" data-t="1">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="2">Only me</div>'))),($GLOBALS['info'][24][2]==0?'<div class="__4n __6r" data-id="0" data-t="2">All members</div>':($GLOBALS['info'][24][2]==1?'<div class="__4n __6r" data-id="1" data-t="2">Friends and their friends</div>':($GLOBALS['info'][24][2]==2?'<div class="__4n __6r" data-id="2" data-t="2">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="3">Only me</div>'))),($GLOBALS['info'][24][3]==0?'<div class="__4n __6r" data-id="0" data-t="3">All members</div>':($GLOBALS['info'][24][3]==1?'<div class="__4n __6r" data-id="1" data-t="3">Friends and their friends</div>':($GLOBALS['info'][24][3]==2?'<div class="__4n __6r" data-id="2" data-t="3">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="3">Only me</div>'))),($GLOBALS['info'][24][4]==0?'<div class="__4n __6r" data-id="0" data-t="4">All members</div>':($GLOBALS['info'][24][4]==1?'<div class="__4n __6r" data-id="1" data-t="4">Friends and their friends</div>':($GLOBALS['info'][24][4]==2?'<div class="__4n __6r" data-id="2" data-t="4">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="4">Only me</div>'))),($GLOBALS['info'][24][5]==0?'<div class="__4n __6r" data-id="0" data-t="5">All members</div>':($GLOBALS['info'][24][5]==1?'<div class="__4n __6r" data-id="1" data-t="5">Friends and their friends</div>':($GLOBALS['info'][24][5]==2?'<div class="__4n __6r" data-id="2" data-t="5">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="5">Only me</div>'))),($GLOBALS['info'][24][6]==0?'<div class="__4n __6r" data-id="0" data-t="6">All members</div>':($GLOBALS['info'][24][6]==1?'<div class="__4n __6r" data-id="1" data-t="6">Friends and their friends</div>':($GLOBALS['info'][24][6]==2?'<div class="__4n __6r" data-id="2" data-t="6">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="6>Only me</div>'))),($GLOBALS['info'][24][7]==0?'<div class="__4n __6r" data-id="0" data-t="7">All members</div>':($GLOBALS['info'][24][7]==1?'<div class="__4n __6r" data-id="1" data-t="7">Friends and their friends</div>':($GLOBALS['info'][24][7]==2?'<div class="__4n __6r" data-id="2" data-t="7">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="7">Only me</div>'))),($GLOBALS['info'][24][8]==0?'<div class="__4n __6r" data-id="0" data-t="8">All members</div>':($GLOBALS['info'][24][8]==1?'<div class="__4n __6r" data-id="1" data-t="8">Friends and their friends</div>':($GLOBALS['info'][24][8]==2?'<div class="__4n __6r" data-id="2" data-t="8">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="8">Only me</div>'))),($GLOBALS['info'][24][9]==0?'<div class="__4n __6r" data-id="0" data-t="9">All members</div>':($GLOBALS['info'][24][9]==1?'<div class="__4n __6r" data-id="1" data-t="9">Friends and their friends</div>':($GLOBALS['info'][24][9]==2?'<div class="__4n __6r" data-id="2" data-t="9">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="9">Only me</div>'))),($GLOBALS['info'][24][10]==0?'<div class="__4n __6r" data-id="0" data-t="10">All members</div>':($GLOBALS['info'][24][10]==1?'<div class="__4n __6r" data-id="1" data-t="10">Friends and their friends</div>':($GLOBALS['info'][24][10]==2?'<div class="__4n __6r" data-id="2" data-t="10">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="10">Only me</div>'))),($GLOBALS['info'][24][11]==0?'<div class="__4n __6r" data-id="0" data-t="11">All members</div>':($GLOBALS['info'][24][11]==1?'<div class="__4n __6r" data-id="1" data-t="11">Friends and their friends</div>':($GLOBALS['info'][24][11]==2?'<div class="__4n __6r" data-id="2" data-t="11">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="11">Only me</div>'))),($GLOBALS['info'][24][12]==0?'<div class="__4n __6r" data-id="0" data-t="12">All members</div>':($GLOBALS['info'][24][12]==1?'<div class="__4n __6r" data-id="1" data-t="12">Friends and their friends</div>':($GLOBALS['info'][24][12]==2?'<div class="__4n __6r" data-id="2" data-t="12">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="12">Only me</div>'))),($GLOBALS['info'][24][13]==0?'<div class="__4n __6r" data-id="0" data-t="13">All members</div>':($GLOBALS['info'][24][13]==1?'<div class="__4n __6r" data-id="1" data-t="13">Friends and their friends</div>':($GLOBALS['info'][24][13]==2?'<div class="__4n __6r" data-id="2" data-t="13">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="13">Only me</div>'))),($GLOBALS['info'][24][14]==0?'<div class="__4n __6r" data-id="0" data-t="14">All members</div>':($GLOBALS['info'][24][14]==1?'<div class="__4n __6r" data-id="1" data-t="14">Friends and their friends</div>':($GLOBALS['info'][24][14]==2?'<div class="__4n __6r" data-id="2" data-t="14">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="14">Only me</div>'))),($GLOBALS['info'][24][15]==0?'<div class="__4n __6r" data-id="0" data-t="15">All members</div>':($GLOBALS['info'][24][15]==1?'<div class="__4n __6r" data-id="1" data-t="15">Friends and their friends</div>':($GLOBALS['info'][24][15]==2?'<div class="__4n __6r" data-id="2" data-t="15">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="15">Only me</div>'))),($GLOBALS['info'][24][16]==0?'<div class="__4n __6r" data-id="0" data-t="16">All members</div>':($GLOBALS['info'][24][16]==1?'<div class="__4n __6r" data-id="1" data-t="16">Friends and their friends</div>':($GLOBALS['info'][24][16]==2?'<div class="__4n __6r" data-id="2" data-t="16">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="16">Only me</div>'))),($GLOBALS['info'][24][17]==0?'<div class="__4n __6r" data-id="0" data-t="17">All members</div>':($GLOBALS['info'][24][17]==1?'<div class="__4n __6r" data-id="1" data-t="17">Friends and their friends</div>':($GLOBALS['info'][24][17]==2?'<div class="__4n __6r" data-id="2" data-t="17">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="17">Only me</div>'))),($GLOBALS['info'][24][18]==0?'<div class="__4n __6r" data-id="0" data-t="18">All members</div>':($GLOBALS['info'][24][18]==1?'<div class="__4n __6r" data-id="1" data-t="18">Friends and their friends</div>':($GLOBALS['info'][24][18]==2?'<div class="__4n __6r" data-id="2" data-t="18">Only friends</div>':'<div class="__4n __6r" data-id="3" data-t="18">Only me</div>'))),'<div class="__4u __4z __4z1" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{\'i\':0,\'v\':\'All members\'})">All members</div><div class="__4y" onclick="return go.st(this,{\'i\':1,\'v\':\'Friends and their friends\'})">Friends and their friends</div><div class="__4y" onclick="return go.st(this,{\'i\':2,\'v\':\'Only friends\'})">Only friends</div><div class="__4y" onclick="return go.st(this,{\'i\':3,\'v\':\'Only me\'})">Only me</div></div></div></div>','<div class="__4u __4z __4z1 __4z2" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{\'i\':0,\'v\':\'All members\'})">All members</div><div class="__4y" onclick="return go.st(this,{\'i\':1,\'v\':\'Friends and their friends\'})">Friends and their friends</div><div class="__4y" onclick="return go.st(this,{\'i\':2,\'v\':\'Only friends\'})">Only friends</div><div class="__4y" onclick="return go.st(this,{\'i\':3,\'v\':\'Only me\'})">Only me</div></div></div></div>'];
						$c = ['<div class="__3z">Privacy Settings</div><div class="__4a">Change your privacy settings.</div><div class="__6u  __4r">Вы можете обезопасить измение настроек подтверждением паролем в разделе Security • Password request.</div><div class="__4i"><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит основную информацию моей страницы</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;" onclick="return dom.dd(this)">'.$e[0].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит список моих групп</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[1].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит список моих аудиозаписей</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[2].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит список моих подарков</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[3].'<div class="__4m"></div></div>'.$e[19].'</div></div></div></div><div class="__3z __6t" onclick="return go.viewB(this)"><span onclick="">Photo Settings</span><div class="__6v"></div></div><div class="__4i"><div class="__6w"><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит местоположение моих фотографий</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[4].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит фотографии, на которых меня отметили</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[5].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может отмечать меня на фотографиях</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[6].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит список моих сохранённых фотографий</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[7].'<div class="__4m"></div></div>'.$e[19].'</div></div></div></div></div><div class="__3z __6t" onclick="return go.viewB(this)">Video Settings<div class="__6v"></div></div><div class="__4i"><div class="__6w"><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит местоположение моих видеозаписеи</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[8].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит видеозаписи, на которых меня отметили</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[9].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может отмечать меня на видеозаписях</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[10].'<div class="__4m"></div></div>'.$e[19].'</div></div></div></div></div><div class="__3z __6t" onclick="return go.viewB(this)">Записи на странице<div class="__6v"></div></div><div class="__4i"><div class="__6w"><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит чужие записи на моей странице</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[11].'<div class="__4m"></div></div>'.$e[19].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может оставлять записи на моей странице</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[12].'<div class="__4m"></div></div>'.$e[20].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто видит комментарии к записям</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[13].'<div class="__4m"></div></div>'.$e[20].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может комментировать мои записи</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[14].'<div class="__4m"></div></div>'.$e[20].'</div></div></div></div></div><div class="__3z __6t" onclick="return go.viewB(this)">Связь со мной<div class="__6v"></div></div><div class="__4i"><div class="__6w"><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может писать мне личные сообщения</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[15].'<div class="__4m"></div></div>'.$e[20].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может вызывать меня в приложениях</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[16].'<div class="__4m"></div></div>'.$e[20].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может приглашать меня в приложениях</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[17].'<div class="__4m"></div></div>'.$e[20].'</div></div></div><div class="__4c"><div class="__6m"><div class="__6n __6s">Кто может приглашать меня в сообщества</div><div class="__6o"><div class="__4j __6q" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$e[18].'<div class="__4m"></div></div>'.$e[20].'</div></div></div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.privacy(this,event)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',2];
					} else if (findURLV([$a['q'],'section','notifications'])) {
						notifications();
						$c = ['<div class="__3z">Notifications</div><div class="__4a">Change your notification settings.</div><div class="__4i"><div class="__4c"><div class="__4d">Электронной почта</div><button class="__4e" onclick="return go.profileSettings()">Настроить</button></div><div class="__4c"><div class="__4d">Телефон</div><button class="__4e" onclick="return go.menuIt()">Настроить</button></div><div class="__4c"><div id="_v"><div class="__4d">Виды событий</div><button class="__4e" onclick="return go.eventType()">Настроить</button></div></div></div><div class="__4i"><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Показывать мгновенные уведомления</div><div class="__6o">'.($GLOBALS['info'][26][0]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-tn><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-tn><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username. If you have a phone number on your account, you may be asked to verify that phone number before you can request a password reset with just your email address.</div></div></div><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Включить звуковые оповещения</div><div class="__6o">'.($GLOBALS['info'][26][1]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-tn><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-tn><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username.</div></div></div><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Показывать текст сообщений</div><div class="__6o">'.($GLOBALS['info'][26][2]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-tn><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-tn><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username.</div></div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.notifications(this,event)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div></div>',3];
					} else if (findURLV([$a['q'],'section','blacklist'])) {
						$c = ['<div class="__3z">Blacklist</div><div class="__4a">Accounts you\'re blocking</div><div class="__4i"></div>',4];
					} else if (findURLV([$a['q'],'section','services'])) {
						$c = ['<div class="__3z">Services</div><div class="__4a">Configure additional services to your account.</div><div class="__4i"><div class="__7d"><div class="__7e"><div class="__7h"></div><div class="__7i"></div></div><div class="__7f"><div class="__7g">Get updates about Infalike.</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div><div class="__7d"><div class="__7e"><div class="__7j"></div></div><div class="__7f"><div class="__7g">Get updates about Infalike Music.</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div><div class="__7d"><div class="__7e"><div class="__8i"></div><div class="__8j"></div><div class="__8k"></div></div><div class="__7f"><div class="__7g">Get updates about Infalike Books.</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div><div class="__7d"><div class="__7e"><div class="__7k"><div class="__7l"></div></div></div><div class="__7f"><div class="__7g">Get updates about Infalike Games.</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div></div><div class="__4i"><div class="__6u">Вы можете обезопасить измение настроек подтверждением паролем в разделе Безопасность.</div></div>',5];
					} else if (findURLV([$a['q'],'section','mobile'])) {
						$c = ['<div class="__3z">Mobile services</div><div class="__4a">Expand your experience, get closer, and stay current.</div><div class="__4i"><div class="__7d"><div class="__7e __7r"><div class="__7o"></div></div><div class="__7f"><div class="__7g __7r1">IOS</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">2 device</button></div><div class="__7d"><div class="__7e __7s"><div class="__7p"></div></div><div class="__7f"><div class="__7g __7s1">Android</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">0 device</button></div><div class="__7d"><div class="__7e __7t"><div class="__7q"></div></div><div class="__7f"><div class="__7g __7t1">Windows Phone</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">0 device</button></div></div><div class="__4i"><div class="__6u">Чтобы получить доступ к мобильным сервисам (например, получать сообщения от друзей через SMS), Вам необходимо привязать к Вашему аккаунту номер телефона. Это также обезопасит учётную запись от взлома.</div></div>',6];
					} else if (findURLV([$a['q'],'section','payments'])) {
						$c = ['<div class="__3z">Payments</div><div class="__4a">Configure additional services to your account.</div><div class="__4i"><div class="__4c"><div class="__4d">На Вашем счёте</div><div class="__7z">959559559 монет</div><div class="__4g">Голоса — универсальная условная единица для приобретения платных возможностей приложений ВКонтакте, а также подарков и стикеров. Голосами нельзя оплатить рекламу.</div></div></div><div class="__4i"><div class="__7d"><div class="__7e"><div class="__7u"></div></div><div class="__7f"><div class="__7g">Банковская карта</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Select</button></div><div class="__7d"><div class="__7e"><div class="__7u __7v"></div></div><div class="__7f"><div class="__7g">Электронные деньги</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Select</button></div><div class="__7d"><div class="__7e"><div class="__7u __7w"></div></div><div class="__7f"><div class="__7g">Мобильный телефон</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Select</button></div><div class="__7d"><div class="__7e"><div class="__7u __7x"></div></div><div class="__7f"><div class="__7g">Терминал оплаты</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Select</button></div><div class="__7d"><div class="__7e"><div class="__7u __7y"></div></div><div class="__7f"><div class="__7g">Специальные предложения</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Select</button></div></div><div class="__4i"><div class="__6u">Вы можете обезопасить измение настроек подтверждением паролем в разделе Security • Password request.</div></div>',7];
					} else if (findURLV([$a['q'],'section','access'])) {
						accessibility();
						$c = ['<div class="__3z">Accessibility</div><div class="__4a">Configure additional services to your account.</div><div class="__4i"><div class="__4c"><div class="__4d">Security questions</div><button class="__4e" onclick="return go.secureQ()">Configure</button></div></div><div class="__4i"><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Request security question when you reset your password.</div><div class="__6o">'.($GLOBALS['info'][28][0]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-t="0"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-t="0"><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username.</div></div></div><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Request security question when you reset your payments and transfers.</div><div class="__6o">'.($GLOBALS['info'][28][1]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-t="1"><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-t="1"><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">When you check this box, you will be required to verify additional information before you can request a password reset with just your @username.</div></div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.accessibility(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',8];
					} else if (findURLV([$a['q'],'section','statistics'])) {
						$c = ['<div class="__3z">Statistics</div><div class="__4a">Configure additional services to your account.</div><div class="__4i"></div>',9];
					} else if (findURLV([$a['q'],'section','apps'])) {
						$c = ['<div class="__3z">Applications and Games</div><div class="__4a __8b">Configure additional services to your account.</div>
						<div class="__8c"><div class="__8d">All applications</div><div class="__8d __8e">Infalike applications</div><div class="__8d">My applications</div></div>
						<div class="__4i">
						<div class="__7d"><div class="__8a"><img src="/trash/unnamed.png" width="50" height="50" class="photo"></div><div class="__7f"><div class="__7g">Clash Royale</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div>
						<div class="__7d"><div class="__8a"><img src="/trash/2.png" width="50" height="50" class="photo"></div><div class="__7f"><div class="__7g">Adobe Reader</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div>
						<div class="__7d"><div class="__8a"><img src="/trash/3.png" width="50" height="50" class="photo"></div><div class="__7f"><div class="__7g">Garena</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div>
						<div class="__7d"><div class="__8a"><img src="/trash/4.png" width="50" height="50" class="photo"></div><div class="__7f"><div class="__7g">Instagram</div><div class="__7m">Get updates about Infalike.</div></div><button class="__4e __7n">Configure</button></div>
						</div><div class="__4i"><div class="__6u">Вы можете обезопасить измение настроек подтверждением паролем в разделе Security • Password request.</div></div>',10];
					} else if (findURLV([$a['q'],'section','history'])) {
						$c = ['<div class="__3z">History</div><div class="__4a">Your main actions will be shown here</div><div class="__4i"></div>',11];
					} else if (findURLV([$a['q'],'section','calendar'])) {
						$c = ['<div class="__3z">Calendar</div><div class="__4a">All celebrates, events, birthdays will be shown here.</div><div class="__4i"></div>',12];
					} else {
						$e = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][9][2]."`,`".$GLOBALS['info'][2][9][3]."`,`".$GLOBALS['info'][2][9][4]."` FROM `".$GLOBALS['info'][2][9][0]."` WHERE `".$GLOBALS['info'][2][9][1]."`='".$_SESSION['id']."' LIMIT 1")];
							if ($GLOBALS['DB']->n($e[0])!=0) {
								$e[1] = $GLOBALS['DB']->f($e[0]);
								$GLOBALS['info'][21] = [$e[1][0],$e[1][1],$e[1][2]];
							}
							$d = ['<div class="__4k" style="background-color: '.$GLOBALS['info'][17][$GLOBALS['info'][21][0]][1].';"></div><div class="__4l" id="d1" data-id="'.$GLOBALS['info'][21][0].'">'.$GLOBALS['info'][17][$GLOBALS['info'][21][0]][0].'</div>','<div class="__4n" data-id="'.$GLOBALS['info'][1]['lang'].'" id="d2">'.$GLOBALS['info'][3][$GLOBALS['info'][1]['lang']].'</div>','<div class="__4n" id="d3" data-id="'.$GLOBALS['info'][21][1].'">'.$GLOBALS['info'][16][$GLOBALS['info'][21][1]][2].'</div>','<div class="__4n" data-id="'.$GLOBALS['info'][21][2].'" id="d4">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$GLOBALS['info'][19][$GLOBALS['info'][1]['lang']][$GLOBALS['info'][21][2]][1]].'</div>'];
							$c =['<div class="__3z">General Account Settings</div><div class="__4a">Change your basic settings</div><div class="__4i"><div class="__4c"><div class="__4d">Profile settings</div><button class="__4e" onclick="return go.profileSettings()">Set up Profile settings</button></div><div class="__4c"><div id="_v"><div class="__4d">Menu settings</div><button class="__4e" onclick="return go.menuIt()">Set up menu items</button></div></div><div class="__4c"><div class="__4d">Profile address</div><button class="__4e" id="url" onclick="return go.profileAddress()">anonymous</button><div class="__4g __4s">Profile ID - '.$_SESSION['id'].'</div></div><div class="__4c __4h"><div class="__4d">Email</div><button class="__4e" onclick="return go.profileEmail()">Change</button><div class="__4g">Email will not be publicly displayed. Learn more.</div></div><div class="__4c __4h"><div class="__4d">Phone</div><button class="__4e">+774742119**</button><div class="__4g">Phone will not be publicly displayed. Learn more.</div></div><div class="__4c __4h"><div class="__4d">Password</div><button class="__4e" onclick="return go.passwordSettings()">Change</button></div></div><div class="__3z">Interface Settings</div><div class="__4i"><div class="__4c"><div class="__4d">Design color</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$d[0].'<div class="__4m"></div></div>'.colourSel().'<div class="__4g">Videos will automatically play in timelines across the Twitter website. Regardless of your video autoplay setting, video, GIFs, and Vines will always autoplay in Moments.</div></div><div class="__4c __4h"><div class="__4d">Language</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$d[1].'<div class="__4m"></div></div>'.langSel().'</div><div class="__4c"><div class="__4d">Time zone</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$d[2].'<div class="__4m"></div></div>'.timeZone().'</div><div class="__4c"><div class="__4d">Country</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.$d[3].'<div class="__4m"></div></div>'.countryList().'<div class="__4g">Select your country. This setting is saved to this browser.</div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveSettings(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div><div class="__4i"><div class="__4p"><span class="__4q">Deactivate my account</span></div></div>',0];
					}
			$b = ['<div class="__3g"><div class="__3h" id="__3h">'.menuLeft($c[1]).'</div><div class="__3i">'.settingsLeft($c[1]).'<div class="__3l">'.$c[0].'</div></div></div>','Мой настройки'];
		} else if ($a['f']==6) {
			$c = ['',0];
					if (findURLV([$a['q'],'section','contacts'])) {
						contacts();
						$c = ['<div class="__3z">Contact info</div><div class="__4a">Change your contact information.</div><div class="__4i"><div class="__4c"><div class="__4d">Home</div><button class="__4e" onclick="return go.profileHome()">Configure</button><div class="__4g __4g0">Videos will automatically play in timelines across the Twitter website. Regardless of your video autoplay setting, video, GIFs, and Vines will always autoplay in Moments.</div></div><div class="__4c __4h"><div class="__4d">Mobile</div><input type="text" class="__4f __4f1" placeholder="xxx-xxx-xxx" value="'.$GLOBALS['info'][33][0][1].'"><div class="__4f2" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;" data-id="'.$GLOBALS['info'][33][0][0].'" data-t="0">'.($GLOBALS['info'][33][0][0]==0?'All members':($GLOBALS['info'][33][0][0]==1?'Only friends':'Only me')).'</div><div class="__4f3" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4f4"><div class="__4f4_1"></div></div><div class="__4f5"><div class="__4f6" onclick="return go.selV({\'i\':0,\'v\':\'All members\'},this)">All members</div><div class="__4f6" onclick="return go.selV({\'i\':1,\'v\':\'Only friends\'},this)">Only friends</div><div class="__4f6" onclick="return go.selV({\'i\':2,\'v\':\'Only me\'},this)">Only me</div></div></div></div><div class="__4c"><div class="__4d">Alt. phone</div><input type="text" class="__4f __4f1" placeholder="xxx-xxx-xxx" value="'.$GLOBALS['info'][33][1][1].'"><div class="__4f2" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;" data-id="'.$GLOBALS['info'][33][1][0].'" data-t="0">'.($GLOBALS['info'][33][1][0]==0?'All members':($GLOBALS['info'][33][1][0]==1?'Only friends':'Only me')).'</div><div class="__4f3" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4f4"><div class="__4f4_1"></div></div><div class="__4f5"><div class="__4f6" onclick="return go.selV({\'i\':0,\'v\':\'All members\'},this)">All members</div><div class="__4f6" onclick="return go.selV({\'i\':1,\'v\':\'Only friends\'},this)">Only friends</div><div class="__4f6" onclick="return go.selV({\'i\':2,\'v\':\'Only me\'},this)">Only me</div></div></div></div><div class="__4c"><div class="__4d">Skype</div><input type="text" class="__4f __4f1" placeholder="skype" value="'.$GLOBALS['info'][33][2][1].'"><div class="__4f2" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;" data-id="'.$GLOBALS['info'][33][2][0].'" data-t="0">'.($GLOBALS['info'][33][2][0]==0?'All members':($GLOBALS['info'][33][2][0]==1?'Only friends':'Only me')).'</div><div class="__4f3" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4f4"><div class="__4f4_1"></div></div><div class="__4f5"><div class="__4f6" onclick="return go.selV({\'i\':0,\'v\':\'All members\'},this)">All members</div><div class="__4f6" onclick="return go.selV({\'i\':1,\'v\':\'Only friends\'},this)">Only friends</div><div class="__4f6" onclick="return go.selV({\'i\':2,\'v\':\'Only me\'},this)">Only me</div></div></div></div><div class="__4c"><div class="__4d">Website</div><input type="text" class="__4f __4f1" placeholder="www.site.com" value="'.$GLOBALS['info'][33][3][1].'"><div class="__4f2" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;" data-id="'.$GLOBALS['info'][33][3][0].'" data-t="0">'.($GLOBALS['info'][33][3][0]==0?'All members':($GLOBALS['info'][33][3][0]==1?'Only friends':'Only me')).'</div><div class="__4f3" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4f4"><div class="__4f4_1"></div></div><div class="__4f5"><div class="__4f6" onclick="return go.selV({\'i\':0,\'v\':\'All members\'},this)">All members</div><div class="__4f6" onclick="return go.selV({\'i\':1,\'v\':\'Only friends\'},this)">Only friends</div><div class="__4f6" onclick="return go.selV({\'i\':2,\'v\':\'Only me\'},this)">Only me</div></div></div></div></div><div class="__3z __6t" onclick="return go.viewB(this)"><span onclick="">Integration with other services</span><div class="__6v"></div></div><div class="__4i"><div class="__6w"><div class="__4c"><div class="__4d">Facebook</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4k __4k1"></div><div class="__4l" id="d1" data-id="1">Configure</div></div></div><div class="__4c"><div class="__4d">VK</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4k __4k2" style="background-color: #3386a8;"></div><div class="__4l" id="d1" data-id="1">Configure</div></div></div><div class="__4c"><div class="__4d">Twitter</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4k __4k3" style="background-color: #3386a8;"></div><div class="__4l" id="d1" data-id="1">Configure</div></div></div><div class="__4c"><div class="__4d">Instagram</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4k __4k4" style="background-color: #3386a8;"></div><div class="__4l" id="d1" data-id="1">Configure</div></div></div><div class="__4c"><div class="__4d">Google+</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4k __4k5" style="background-color: #3386a8;"></div><div class="__4l" id="d1" data-id="1">Configure</div></div></div><div class="__6u">Вы можете обезопасить измение настроек подтверждением паролем в разделе Security • Password request.</div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveContacts(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',1];
					} else if (findURLV([$a['q'],'section','interests'])) {
						interests();
						$c = ['<div class="__3z">Interests</div><div class="__4a __8b">Change your contact information.</div><div class="__8c" onselectstart="return false"><div class="__8d __8e" onclick="return go.viewList(this)" data-id="0">My interests</div><div class="__8d" onclick="return go.viewList(this)" data-id="1">My favorite</div><div class="__8d" onclick="return go.viewList(this)" data-id="2">Activities</div><div class="__8d" onclick="return go.viewList(this)" data-id="3">About me</div></div><div class="__4i list-h" data-id="0"><div class="__4c"><div class="__4j __4j2 __4j0"><textarea class="__9a __9a1" wrap="hard" data-t="0">'.$GLOBALS['info'][32][0].'</textarea></div></div><div><div></div><div></div></div></div><div class="__4i list-h invisible" data-id="1"><div class="__4c"><div class="__4j __4j2 __4j0"><textarea class="__9a __9a1" placeholder="Books, movies, musiks, tv-shows, games, places, quotes, citations and etc." wrap="hard" data-t="0">'.$GLOBALS['info'][32][1].'</textarea></div></div></div><div class="__4i list-h invisible" data-id="2"><div class="__4c"><div class="__4j __4j2 __4j0"><textarea class="__9a __9a1" placeholder="Organization membership, hobbies, volunteer work" wrap="hard" data-t="0">'.$GLOBALS['info'][32][2].'</textarea></div></div></div><div class="__4i list-h invisible" data-id="3"><div class="__4c"><div class="__4j __4j2 __4j0"><textarea class="__9a __9a1" placeholder="My achievements, aims, dreams and etc." wrap="hard" data-t="0">'.$GLOBALS['info'][32][3].'</textarea></div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveInterests(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',2];
					} else if (findURLV([$a['q'],'section','education'])) {
						//$info[2][22] = array(0=>'_info_school',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3',6=>'p4',7=>'p5',8=>'p6',9=>'ss',10=>'nm');//school
						$d = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][22][1]."`,`".$GLOBALS['info'][2][22][2]."`,`".$GLOBALS['info'][2][22][3]."`,`".$GLOBALS['info'][2][22][4]."`,`".$GLOBALS['info'][2][22][5]."`,`".$GLOBALS['info'][2][22][6]."`,`".$GLOBALS['info'][2][22][7]."`,`".$GLOBALS['info'][2][22][8]."` FROM `".$GLOBALS['info'][2][22][0]."` WHERE `".$GLOBALS['info'][2][22][10]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][22][9]."`='0' ORDER BY `".$GLOBALS['info'][2][22][1]."` DESC LIMIT 5"),''];
						$d[2] = $GLOBALS['DB']->n($d[0]);
						for ($d[4]=0;$d[4]<$d[2];$d[4]++) {
							$d[3] = $GLOBALS['DB']->f($d[0]);
							$d[1] .= '<div class="__9p" data-id="'.$d[3][0].'"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editEdu({\'t\':0,\'i\':'.$d[3][0].'},this,event)"></div><div class="__9o" onclick="return go.removeEdu({\'t\':0,\'i\':'.$d[3][0].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($d[3][1]).'" readonly="true"></div><div class="__4c"><div class="__4d">City</div><input type="text" class="__4f" value="'.$GLOBALS['info'][34][$d[3][1]][$d[3][2]].'" readonly="true"></div><div class="__4c"><div class="__4d">School</div><input type="text" class="__4f" value="'.$GLOBALS['info'][35][$d[3][1]][$d[3][2]][$d[3][3]].'" readonly="true"></div>'.($d[3][4]!=0?'<div class="__4c"><div class="__4d">Год начала обучения</div><input type="text" class="__4f" value="'.$d[3][4].'" readonly="true"></div>':'').($d[3][5]!=0?'<div class="__4c"><div class="__4d">Год окончания</div><input type="text" class="__4f" value="'.$d[3][5].'" readonly="true"></div>':'').($d[3][6]!=0?'<div class="__4c"><div class="__4d">Дата выпуска</div><input type="text" class="__4f" value="'.$d[3][6].'" readonly="true"></div>':'').($d[3][7]!=''?'<div class="__4c"><div class="__4d">Специализация</div><input type="text" class="__4f" value="'.$d[3][7].'" readonly="true"></div>':'').'</div>';
						}
						$d[5] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][23][1]."`,`".$GLOBALS['info'][2][23][2]."`,`".$GLOBALS['info'][2][23][3]."`,`".$GLOBALS['info'][2][23][4]."`,`".$GLOBALS['info'][2][23][5]."`,`".$GLOBALS['info'][2][23][6]."`,`".$GLOBALS['info'][2][23][7]."`,`".$GLOBALS['info'][2][23][8]."` FROM `".$GLOBALS['info'][2][23][0]."` WHERE `".$GLOBALS['info'][2][23][10]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][23][9]."`='0' ORDER BY `".$GLOBALS['info'][2][23][1]."` DESC LIMIT 5");
						$d[6] = '';
						$d[7] = $GLOBALS['DB']->n($d[5]);
						for ($d[8]=0;$d[8]<$d[7];$d[8]++) {
							$d[9] = $GLOBALS['DB']->f($d[5]);
							$d[6] .= '<div class="__9p" data-id="'.$d[9][0].'"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editEdu({\'t\':1,\'i\':'.$d[9][0].'},this,event)"></div><div class="__9o" onclick="return go.removeEdu({\'t\':1,\'i\':'.$d[9][0].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($d[9][1]).'" readonly="true"></div><div class="__4c"><div class="__4d">City</div><input type="text" class="__4f" value="'.$GLOBALS['info'][34][$d[9][1]][$d[9][2]].'" readonly="true"></div><div class="__4c"><div class="__4d">University</div><input type="text" class="__4f" value="'.$GLOBALS['info'][36][$d[9][1]][$d[9][2]][$d[9][3]].'" readonly="true"></div>'.($d[9][4]!=0?'<div class="__4c"><div class="__4d">Факультет</div><input type="text" class="__4f" value="'.$GLOBALS['info'][37][$d[9][1]][$d[9][2]][$d[9][3]][$d[9][4]].'" readonly="true"></div>':'').($d[9][5]!=0?'<div class="__4c"><div class="__4d">Форма обучения</div><input type="text" class="__4f" value="'.($d[9][5]==1?'Очная':($d[9][5]==2?'Очно-заочная':($d[9][5]==3?'Заочная':($d[9][5]==4?'Экстернат':'Дистанционная')))).'" readonly="true"></div>':'').($d[9][6]!=0?'<div class="__4c"><div class="__4d">Статус</div><input type="text" class="__4f" value="'.($d[9][6]==1?'Абитуриент':($d[9][6]==2?'Студент (специалист)':($d[9][6]==3?'Студент (бакалавр)':($d[9][6]==4?'Студент (магистр)':($d[9][6]==5?'Выпускник (специалист)':($d[9][6]==6?'Выпускник (бакалавр)':($d[9][6]==7?'Выпускник (магистр)':($d[9][6]==8?'Аспирант':($d[9][6]==9?'Кандидат наук':($d[9][6]==10?'Доктор наук':($d[9][6]==11?'Интерн':($d[9][6]==12?'Клинический ординатор':($d[9][6]==13?'Соискатель':($d[9][6]==14?'Ассистент-стажёр':($d[9][6]==15?'Докторант':'Адъюнкт'))))))))))))))).'" readonly="true"></div>':'').($d[9][7]!=0?'<div class="__4c"><div class="__4d">Дата выпуска</div><input type="text" class="__4f" value="'.$d[9][7].'" readonly="true"></div>':'').'</div>';
						}
						$d[10] = '';
						//$info[2][24] = array(0=>'_info_language',1=>'id',2=>'p0',3=>'ss',4=>'nm');//language
						$d[11] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][24][1]."`,`".$GLOBALS['info'][2][24][2]."` FROM `".$GLOBALS['info'][2][24][0]."` WHERE `".$GLOBALS['info'][2][24][4]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][24][3]."`='0' ORDER BY `".$GLOBALS['info'][2][24][1]."` DESC LIMIT 20");
						$d[12] = $GLOBALS['DB']->n($d[11]);
						for ($d[13]=0;$d[13]<$d[12];$d[13]++) {
						$d[14] = $GLOBALS['DB']->f($d[11]);
						$d[10] .= '<div class="__4c" data-id="'.$d[14][0].'"><div class="__9m"><div class="__9o" onclick="return go.removeEdu({\'t\':2,\'i\':'.$d[14][0].'},this,event)"></div></div><div class="__4d"></div><input type="text" class="__4f" value="'.$GLOBALS['info'][38][$d[14][1]][0].'" readonly="true"></div>';
						}
						$c = ['<div class="__3z">Education</div><div class="__4a __8b">Change your contact information.</div><div class="__8c" onselectstart="return false"><div class="__8d __8e" onclick="return go.viewList(this)" data-id="0">Secondary and further education</div><div class="__8d" onclick="return go.viewList(this)" data-id="1">Higher education</div><div class="__8d" onclick="return go.viewList(this)" data-id="2">Languages</div></div><div class="__4i list-h" data-id="0"><div class="__4c"><div class="__4d">Country</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-x="0">Не выбран</div><div class="__4m"></div></div>'.countryListDD(0).'</div></div><div class="education" data-edu-rdy="0" data-id="0">'.$d[1].'</div><div class="__4i list-h invisible" data-id="1"><div class="__4c"><div class="__4d">Country</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-z="0" id="uni-country">Не выбран</div><div class="__4m"></div></div>'.countryListDD(1).'</div></div><div class="education invisible" data-edu-rdy="1" data-id="1">'.$d[6].'</div><div class="__4i list-h invisible" data-id="2"><div class="__4c"><div class="__4d">Language</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-z_a="0">Не выбран</div><div class="__4m"></div></div>'.languageList().'</div></div><div class="education invisible" data-edu-rdy="2" data-id="2">'.$d[10].'</div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveEducation(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',4];
					} else if (findURLV([$a['q'],'section','career'])) {
						$c = ['<div class="__3z">Career</div><div class="__4a">Change your contact information.</div><div class="__4i">  </div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveMilitary(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',3];
					} else if (findURLV([$a['q'],'section','military'])) {
						$f = date('Y');
						$g = 1901;
						$h = '<div class="__4y cent" onclick="return go.st(this,{\'i\':0,\'v\':\'Not selected\'})">Not selected</div>';
						while ($g<$f) {
						$h .= '<div class="__4y cent" onclick="return go.st(this,{\'i\':'.$f.',\'v\':'.$f.'})">'.$f.'</div>';
						$f--;
						}
						//$info[2][25] = array(0=>'_info_military',1=>'id',2=>'ct',3=>'p0',4=>'p1',5=>'by',6=>'ey',7=>'ss',8=>'nm');
						$i = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][25][1]."`,`".$GLOBALS['info'][2][25][2]."`,`".$GLOBALS['info'][2][25][3]."`,`".$GLOBALS['info'][2][25][4]."`,`".$GLOBALS['info'][2][25][5]."`,`".$GLOBALS['info'][2][25][6]."` FROM `".$GLOBALS['info'][2][25][0]."` WHERE `".$GLOBALS['info'][2][25][7]."`='0' AND `".$GLOBALS['info'][2][25][8]."`='".$_SESSION['id']."' ORDER BY `".$GLOBALS['info'][2][25][1]."` DESC LIMIT 5"),''];
						$i[3] = $GLOBALS['DB']->n($i[0]);
							for ($i[4]=0;$i[4]<$i[3];$i[4]++) {
								$i[2] = $GLOBALS['DB']->f($i[0]);
								$i[1] .= '<div class="__9p" data-id="'.$i[2][0].'"><div class="__4c"><div class="__9m"><div class="__9n" onclick="return go.editMilitary({\'i\':'.$i[2][0].'},this,event)"></div><div class="__9o" onclick="return go.removeMilitary({\'i\':'.$i[2][0].'},this,event)"></div></div><div class="__4d">Country</div><input type="text" class="__4f" value="'.findCountry($i[2][1]).'" readonly="true"></div><div class="__4c"><div class="__4d">Войсковая часть</div><input type="text" class="__4f" value="'.$i[2][2].'" readonly="true"></div><div class="__4c"><div class="__4d">Звание</div><input type="text" class="__4f" value="'.$i[2][3].'" readonly="true"></div>'.($i[2][4]!=0?'<div class="__4c"><div class="__4d">Год начала службы</div><input type="text" class="__4f" value="'.$i[2][4].'" readonly="true"></div>':'').($i[2][5]!=0?'<div class="__4c"><div class="__4d">Год окончания службы</div><input type="text" class="__4f" value="'.$i[2][5].'" readonly="true"></div>':'').'</div>';
							}
						$c = ['<div class="__3z">Military</div><div class="__4a">Change your contact information.</div><div class="__4i"><div class="__4c"><div class="__4d">Country</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-m>Не выбран</div><div class="__4m"></div></div>'.countryDD(2).'</div><div class="__4c"><div class="__4d">Войсковая часть</div><input type="text" class="__4f" data-m></div><div class="__4c"><div class="__4d">Звание</div><input type="text" class="__4f" data-m></div><div class="__4c"><div class="__4d">Год начала службы</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-m>Не выбран</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div><div class="__4c"><div class="__4d">Год окончания службы</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" data-m>Не выбран</div><div class="__4m"></div></div><div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div></div><div class="education" id="military">'.$i[1].'</div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveMilitary(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',5];
					} else if (findURLV([$a['q'],'section','personal'])) {
						personal();
						$c[2] = '';
						$c[3] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][9][4]."` FROM `".$GLOBALS['info'][2][9][0]."` WHERE `".$GLOBALS['info'][2][9][1]."`='".$_SESSION['id']."' LIMIT 1");
						if ($GLOBALS['DB']->n($c[3])!=0) {
						$c[4] = $GLOBALS['DB']->f($c[3])[0];
						if ($c[4]!=0) {
						stat_personal();
						$c[2] = '<div class="__6u __4r">Ваши вопросы могут быть использованы в анонинмной статистике. Каждый год ваши указания будут сбрасываться, чтобы убедиться в актуальности вашей информации. Страна: <span class="__8y">'.findCountry($c[4]).'</span></div><div class="__4i"><div class="__4c"><div class="__4d">Уровень образования</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][31][0].'" data-s="0">'.($GLOBALS['info'][31][0]==0?'Not selected':($GLOBALS['info'][31][0]==1?'Высокое':($GLOBALS['info'][31][0]==2?'Среднее':'Низкое'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Высокое&quot;})">Высокое</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Среднее&quot;})">Среднее</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Низкое&quot;})">Низкое</div></div></div></div></div><div class="__4c"><div class="__4d">Уровень жизни</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][31][1].'" data-s="0">'.($GLOBALS['info'][31][1]==0?'Not selected':($GLOBALS['info'][31][1]==1?'Высокое':($GLOBALS['info'][31][1]==2?'Среднее':'Низкое'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Высокое&quot;})">Высокое</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Среднее&quot;})">Среднее</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Низкое&quot;})">Низкое</div></div></div></div></div><div class="__4c"><div class="__4d" title="Доверие к правительству">Доверие к правительству</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][31][2].'" data-s="0">'.($GLOBALS['info'][31][2]==0?'Not selected':($GLOBALS['info'][31][2]==1?'Высокое':($GLOBALS['info'][31][2]==2?'Среднее':'Низкое'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Высокое&quot;})">Высокое</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Среднее&quot;})">Среднее</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Низкое&quot;})">Низкое</div></div></div></div></div><div class="__4c"><div class="__4d" title="Доверие к правосудию">Доверие к правосудию</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][31][3].'" data-s="0">'.($GLOBALS['info'][31][3]==0?'Not selected':($GLOBALS['info'][31][3]==1?'Высокое':($GLOBALS['info'][31][3]==2?'Среднее':'Низкое'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Высокое&quot;})">Высокое</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Среднее&quot;})">Среднее</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Низкое&quot;})">Низкое</div></div></div></div></div><div class="__4c"><div class="__4d" title="Уровень здравохранения">Уровень здравохранения</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][31][4].'" data-s="0">'.($GLOBALS['info'][31][4]==0?'Not selected':($GLOBALS['info'][31][4]==1?'Высокое':($GLOBALS['info'][31][4]==2?'Среднее':'Низкое'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Высокое&quot;})">Высокое</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Среднее&quot;})">Среднее</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Низкое&quot;})">Низкое</div></div></div></div></div><div class="__4c"><div class="__4d">Уровень коррупции</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][31][5].'" data-s="0">'.($GLOBALS['info'][31][5]==0?'Not selected':($GLOBALS['info'][31][5]==1?'Высокое':($GLOBALS['info'][31][5]==2?'Среднее':'Низкое'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Высокое&quot;})">Высокое</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Среднее&quot;})">Среднее</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Низкое&quot;})">Низкое</div></div></div></div></div></div>';
						}
						}
						$c = ['<div class="__3z">Personal views</div><div class="__4a">Change your personal views.</div><div class="__6u __4r">Вы можете обезопасить измение настроек подтверждением паролем в разделе Security • Password request.</div><div class="__4i"><div class="__4c"><div class="__4d">Political views</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.($GLOBALS['info'][30][0]==0?'<div class="__4n" data-id="0" data-t="0">Not selected</div>':($GLOBALS['info'][30][0]==1?'<div class="__4n" data-id="1" data-t="0">Apathetic</div>':($GLOBALS['info'][30][0]==2?'<div class="__4n" data-id="2" data-t="0">Communist</div>':($GLOBALS['info'][30][0]==3?'<div class="__4n" data-id="3" data-t="0">Socialist</div>':($GLOBALS['info'][30][0]==4?'<div class="__4n" data-id="4" data-t="0">Moderate</div>':($GLOBALS['info'][30][0]==5?'<div class="__4n" data-id="5" data-t="0">Liberal</div>':($GLOBALS['info'][30][0]==6?'<div class="__4n" data-id="6" data-t="0">Conservative</div>':($GLOBALS['info'][30][0]==7?'<div class="__4n" data-id="7" data-t="0">Monarchist</div>':($GLOBALS['info'][30][0]==8?'<div class="__4n" data-id="8" data-t="0">Ultraconservative</div>':'<div class="__4n" data-id="9" data-t="0">Libertarian</div>'))))))))).'<div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Apathetic&quot;})">Apathetic</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Communist&quot;})">Communist</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Socialist&quot;})">Socialist</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:4,&quot;v&quot;:&quot;Moderate&quot;})">Moderate</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:5,&quot;v&quot;:&quot;Liberal&quot;})">Liberal</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:6,&quot;v&quot;:&quot;Conservative&quot;})">Conservative</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:7,&quot;v&quot;:&quot;Monarchist&quot;})">Monarchist</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:8,&quot;v&quot;:&quot;Ultraconservative&quot;})">Ultraconservative</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:9,&quot;v&quot;:&quot;Libertarian&quot;})">Libertarian</div></div></div></div></div><div class="__4c"><div class="__4d">World view</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][30][1].'" data-t="0">'.($GLOBALS['info'][30][1]==0?'Not selected':($GLOBALS['info'][30][1]==1?'Judaism':($GLOBALS['info'][30][1]==2?'Orthodoxy':($GLOBALS['info'][30][1]==3?'Catholicism':($GLOBALS['info'][30][1]==4?'Protestantism':($GLOBALS['info'][30][1]==5?'Islam':($GLOBALS['info'][30][1]==6?'Budhism':($GLOBALS['info'][30][1]==7?'Confucianism':($GLOBALS['info'][30][1]==8?'Secular Humanism':'Pastafarianism'))))))))).'</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Judaism&quot;})">Judaism</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Orthodoxy&quot;})">Orthodoxy</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Catholicism&quot;})">Catholicism</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:4,&quot;v&quot;:&quot;Protestantism&quot;})">Protestantism</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:5,&quot;v&quot;:&quot;Islam&quot;})">Islam</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:6,&quot;v&quot;:&quot;Budhism&quot;})">Budhism</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:7,&quot;v&quot;:&quot;Confucianism&quot;})">Confucianism</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:8,&quot;v&quot;:&quot;Secular Humanism&quot;})">Secular Humanism</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:9,&quot;v&quot;:&quot;Pastafarianism&quot;})">Pastafarianism</div></div></div></div></div><div class="__4c"><div class="__4d">Personal priority</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][30][2].'" data-t="0">'.($GLOBALS['info'][30][2]==0?'Not selected':($GLOBALS['info'][30][2]==1?'Family and children':($GLOBALS['info'][30][2]==2?'Career and money':($GLOBALS['info'][30][2]==3?'Entertainment and leisure':($GLOBALS['info'][30][2]==4?'Science and research':($GLOBALS['info'][30][2]==5?'Improving the world':($GLOBALS['info'][30][2]==6?'Personal develoment':($GLOBALS['info'][30][2]==7?'Beauty and art':'Fame and influence')))))))).'</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Family and children&quot;})">Family and children</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Career and money&quot;})">Career and money</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Entertainment and leisure&quot;})">Entertainment and leisure</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:4,&quot;v&quot;:&quot;Science and research&quot;})">Science and research</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:5,&quot;v&quot;:&quot;Improving the world&quot;})">Improving the world</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:6,&quot;v&quot;:&quot;Personal develoment&quot;})">Personal develoment</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:7,&quot;v&quot;:&quot;Beauty and art&quot;})">Beauty and art</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:8,&quot;v&quot;:&quot;Fame and influence&quot;})">Fame and influence</div></div></div></div></div><div class="__4c"><div class="__4d">Important in others</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][30][3].'" data-t="0">'.($GLOBALS['info'][30][3]==0?'Not selected':($GLOBALS['info'][30][3]==1?'Intellect and creativity':($GLOBALS['info'][30][3]==2?'Kidness and honesty':($GLOBALS['info'][30][3]==3?'Health and beauty':($GLOBALS['info'][30][3]==4?'Wealth and power':($GLOBALS['info'][30][3]==5?'Courage and persistence':'Humor and love for life')))))).'</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Intellect and creativity&quot;})">Intellect and creativity</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Kidness and honesty&quot;})">Kidness and honesty</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Health and beauty&quot;})">Health and beauty</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:4,&quot;v&quot;:&quot;Wealth and power&quot;})">Wealth and power</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:5,&quot;v&quot;:&quot;Courage and persistence&quot;})">Courage and persistence</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:6,&quot;v&quot;:&quot;Humor and love for life&quot;})">Humor and love for life</div></div></div></div></div><div class="__4c"><div class="__4d">Views on smoking</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][30][4].'" data-t="0">'.($GLOBALS['info'][30][4]==0?'Not selected':($GLOBALS['info'][30][4]==1?'Positive':($GLOBALS['info'][30][4]==2?'Neutral':'Negative'))).'</div><div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Positive&quot;})">Positive</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Neutral&quot;})">Neutral</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Negative&quot;})">Negative</div></div></div></div></div><div class="__4c"><div class="__4d">Views on alcohol</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][30][5].'" data-t="0">'.($GLOBALS['info'][30][5]==0?'Not selected':($GLOBALS['info'][30][5]==1?'Positive':($GLOBALS['info'][30][5]==2?'Neutral':'Negative'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Positive&quot;})">Positive</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Neutral&quot;})">Neutral</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Negative&quot;})">Negative</div></div></div></div></div><div class="__4c"><div class="__4d">Отношение к взятке</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][30][6].'" data-t="0">'.($GLOBALS['info'][30][6]==0?'Not selected':($GLOBALS['info'][30][6]==1?'Positive':($GLOBALS['info'][30][6]==2?'Neutral':'Negative'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Positive&quot;})">Positive</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Neutral&quot;})">Neutral</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Negative&quot;})">Negative</div></div></div></div></div><div class="__4c"><div class="__4d">Отношение к ЛГБТ</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="'.$GLOBALS['info'][30][7].'" data-t="0">'.($GLOBALS['info'][30][7]==0?'Not selected':($GLOBALS['info'][30][7]==1?'Positive':($GLOBALS['info'][30][7]==2?'Neutral':'Negative'))).'</div><div class="__4m"></div></div><div class="__4u __4z01" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Not selected&quot;})">Not selected</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Positive&quot;})">Positive</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Neutral&quot;})">Neutral</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:3,&quot;v&quot;:&quot;Negative&quot;})">Negative</div></div></div></div></div></div>'.$c[2].'<div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveViews(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',6];
					} else if (findURLV([$a['q'],'section','family'])) {
						$c = ['<div class="__3z">Family and Relationships</div><div class="__4a">Change your contact information.</div><div class="__4i"><div class="__4c"><div class="__4d">Country</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n" data-id="0" id="d4">Не выбран</div><div class="__4m"></div></div></div></div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveSettings(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',7];
					} else {
						$d = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][26][2]."`,`".$GLOBALS['info'][2][26][3]."`,`".$GLOBALS['info'][2][26][4]."` FROM `".$GLOBALS['info'][2][26][0]."` WHERE `".$GLOBALS['info'][2][26][1]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][26][5]."`='0' LIMIT 1"),''];
						if ($GLOBALS['DB']->n($d[0])) {
							$d[2] = $GLOBALS['DB']->f($d[0]);
							$d[1] = '<div class="__8u"><div class="__8v"><div class="__8x"></div></div><div class="__8w"><span class="__8y">We are processing your request.</span><div>Please note that it is customary to use full real names on VK. E.g.: John Smith, Jane Wu. New name (being reviewed by a moderator): <span class="__8y">'.$d[2][0].' '.$d[2][1].' '.$d[2][2].'</span></div></div><div class="__8z0"><div class="__8z" onclick="return go.cancelInfo()">Cancel request</div></div></div>';
						}
						$c = ['<div class="__3z">Basic info</div><div class="__4a">Change your basic information</div><div id="info-change">'.$d[1].'</div><div class="__4i">'.birthdayDay().'</div><div class="__4i"><button class="__4o" id="bt2" onclick="return go.saveInfo(this)" data-status="open"><div class="lg-1"></div><span>Save Changes</span></button></div>',0];
					}
						$b = ['<div class="__3g"><div class="__3h" id="__3h">'.menuLeft($c[1]).'</div><div class="__3i">'.editLeft($c[1]).'<div class="__3l">'.$c[0].'</div></div></div>','Редактирование моей страницы'];
		} else if ($a['f']==7) {
			docSett();
			$d = ['','Documents',0];
					if (findURLV([$a['q'],'section','text'])) {
						$c = [alertBox::docContinue([0,0])];
						$c[1] = sizeof($c[0][4]);
						for ($c[2]=0;$c[2]<$c[1];$c[2]++) $d[0] .= docType($c[0][4][$c[2]]);
						$d = ['<div class="__13k"><div class="__13r" style="margin-top: 0;min-height: 200px;"><div class="__13s"><div class="__13t">Text files</div><div class="__13u'.($GLOBALS['info'][40][1]==0?'':' __13u0').'" data-id="'.$GLOBALS['info'][40][1].'" onclick="return go.doc.formC(this)"></div></div><div class="__14b" id="doc-text" onselectstart="return false;" style="min-height: 200px;">'.($d[0]!=''?$d[0]:'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -50px;"></div><div class="__13w">Empty</div></div>').'</div></div><button class="__16a '.($c[1]!=30?'invisible':'').'" id="__16a" onclick="return go.doc.update();"><span>Загрузить ещё</span><div class="__16b"></div></button></div>','Документы текстовые',1];
					} else if (findURLV([$a['q'],'section','animation'])) {
						$c = [alertBox::docContinue([3,0])];
						$c[1] = sizeof($c[0][4]);
						for ($c[2]=0;$c[2]<$c[1];$c[2]++) $d[0] .= docType($c[0][4][$c[2]]);
						$d = ['<div class="__13k"><div class="__13r" style="margin-top: 0;min-height: 200px;"><div class="__13s"><div class="__13t">Картинки</div><div class="__13u'.($GLOBALS['info'][40][1]==0?'':' __13u0').'" data-id="'.$GLOBALS['info'][40][1].'"  onclick="return go.doc.formC(this)"></div></div><div class="__14b" onselectstart="return false;" id="doc-gif">'.($d[0]!=''?$d[0]:'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -250px;"></div><div class="__13w">Empty</div></div>').'</div></div><button class="__16a '.($c[1]!=30?'invisible':'').'" id="__16a" onclick="return go.doc.update();"><span>Загрузить ещё</span><div class="__16b"></div></button></div>','Документы картинки',2];
					} else if (findURLV([$a['q'],'section','folders'])) {
							if (findURL([$a['q'],0,'folder'])) {
								$c = [URLvalue([$a['q'],0,'folder'])];
								if (preg_match('/\d_\d/',$c[0])) {
									$c[1] = explode('_',$c[0]);
									$c[2] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][3]."`,`".$GLOBALS['info'][2][37][7]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$c[1][1]."' AND `".$GLOBALS['info'][2][37][2]."`='".$c[1][0]."' AND `".$GLOBALS['info'][2][37][5]."`='0' LIMIT 1");
									if ($GLOBALS['DB']->n($c[2])!=0) {
										$c[3] = $GLOBALS['DB']->f($c[2]);
										if ($c[3][1]==0) $c[4] = false; else $c[4] = true;
										if ($c[1][0]==$_SESSION['id']) $c[4] = true;
										if ($c[4]) {
											$c[4] = alertBox::docContinue([4,0,$c[1][1],$c[1][0]]);
											$c[6] = sizeof($c[4][4]);
											for ($c[5]=0;$c[5]<$c[6];$c[5]++) $d[0] .= docType($c[4][4][$c[5]]);
											$c[2] = ['<div class="__13r" style="margin: 0;"><div class="__13s"><button class="__16s" style="margin-left: 435px;width: 24px;background-position: 2px 2px;" onclick="return go.doc.editFolder('.htmlspecialchars(json_encode([$c[1][0],$c[1][1]])).')"></button><a href="/documents?section=folders" class="no-link" onclick="return go.link(this,event)"><button class="__16s"></button></a><a href="/documents?section=folders" class="no-link" onclick="return go.link(this,event)"><div class="__13t">Folders</div></a><div class="__13u invisible" data-id="'.$GLOBALS['info'][40][1].'"></div><div class="__16q"><div class="__16p"></div><div class="__16r">'.$c[3][0].'</div></div></div><div class="__14b" id="folder-list" data-s="'.($c[6]==30?0:1).'" data-id="'.htmlspecialchars(json_encode($c[1])).'">'.($d[0]!=''?$d[0]:'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -100px;"></div><div class="__13w">Folder empty</div></div>').'</div></div><button class="__16a '.($c[6]!=30?'invisible':'').'" onclick="return go.doc.folderListUp();"><span>Загрузить ещё</span><div class="__16b"></div></button>',$c[3][0]];
										} else $c[2] = ['<div class="__13r" style="margin: 0;"><div class="__13s"><a href="/documents?section=folders" class="no-link" onclick="return go.link(this,event)"><button class="__16s"></button></a><div class="__13t">Folders</div><div class="__13u invisible" data-id="'.$GLOBALS['info'][40][1].'"></div><div class="__16q"><div class="__16p"></div><div class="__16r">Restricted access</div></div></div><div class="__14b" id="folder-list"><div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -100px;"></div><div class="__13w">Folder unavailable</div></div></div></div>','Folder unavailable'];
									} else $c[2] = ['<div class="__13r" style="margin: 0;"><div class="__13s"><a href="/documents?section=folders" class="no-link" onclick="return go.link(this,event)"><button class="__16s"></button></a><div class="__13t">Folders</div><div class="__13u invisible" data-id="'.$GLOBALS['info'][40][1].'"></div><div class="__16q"><div class="__16p"></div><div class="__16r">Folder deleted</div></div></div><div class="__14b" id="folder-list"><div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -100px;"></div><div class="__13w">Folder deleted or does not exist</div></div></div></div>','Folder deleted or does not exist'];
								} else $c[2] = ['<div class="__13r" style="margin: 0;"><div class="__13s"><a href="/documents?section=folders" class="no-link" onclick="return go.link(this,event)"><button class="__16s"></button></a><div class="__13t">Folders</div><div class="__13u invisible" data-id="'.$GLOBALS['info'][40][1].'"></div><div class="__16q"><div class="__16p"></div><div class="__16r">Folder deleted</div></div></div><div class="__14b" id="folder-list"><div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -100px;"></div><div class="__13w">Folder deleted or does not exist</div></div></div></div>','Folder deleted or does not exist'];
							} else {
							$c[3] = alertBox::folderList([$_SESSION['id'],0]);
						if (sizeof($c[3])!=0) {
							$c[2] = '';
							for ($c[4]=0;$c[4]<sizeof($c[3]);$c[4]++) $c[2] .= '<a href="/folder'.$c[3][$c[4]]['own'].'_'.$c[3][$c[4]]['id'].'" data-href="/documents?section=folders&folder='.$c[3][$c[4]]['own'].'_'.$c[3][$c[4]]['id'].'" class="__16i" onclick="return go.linkOp(this,event)" data-id="'.$c[3][$c[4]]['own'].'_'.$c[3][$c[4]]['id'].'" id="folder'.$c[3][$c[4]]['own'].'_'.$c[3][$c[4]]['id'].'" oncontextmenu="return go.doc.folderOption('.htmlspecialchars(json_encode([$c[3][$c[4]]['own'],$c[3][$c[4]]['id']])).',this,event)">'.$c[3][$c[4]]['fo'].'<div class="__16j"><div class="__16l"></div></div><div class="__16k">'.$c[3][$c[4]]['nm'].'</div></a>';
							$c[2] = ['<div class="__13l" style="height: 70px;"><div class="__13o" style="margin-left: 280px;"><div class="__13o0"></div><div class="s-i"></div><div class="__13p">search for folder</div><input type="text" class="__13n" onfocus="return go.doc.frS()" oninput="return go.doc.frSearch(this)" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" style="width: 160px;"><div class="__17n" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__17v"><div class="__17w"></div></div><div class="__17x">Docs & Folders</div></div></div><div style="font-size: 18px;color: rgb(41, 124, 158);font-weight: bold;margin: 12px 0 0 15px;">Folder shelf</div><div style="color: silver;font-size: 12px;margin: 0px 0 0 15px;font-weight: bold;">Store your files in folders</div></div><div class="__13r"><div class="__13s"><div class="__13t">Folder</div><div class="__13u" style="background-position: 0 -102px;" onclick="return go.doc.newFolder()"></div></div><div class="__14b" onselectstart="return false;" style="min-height: 200px;" id="folder-main" data-s="'.(sizeof($c[3])==30?0:1).'">'.$c[2].'</div></div><button class="__16a '.(sizeof($c[3])==30?'':'invisible').'" id="folder-m" onclick="return go.doc.folderUp();"><span>Загрузить ещё</span><div class="__16b"></div></button>','Папки'];
							/*
							<div style="font-size: 18px;color: rgb(41, 124, 158);font-weight: bold;margin: 12px 0 0 15px;">Book store</div><div style="color: silver;font-size: 12px;margin: 0px 0 0 15px;font-weight: bold;">Bestsellers, popular & classics books</div></div>','Книги',4];
							*/
						} else $c[2] = ['<div class="__13l" style="height: 70px;"><div class="__13o" style="margin-left: 280px;"><div class="__13o0"></div><div class="s-i"></div><div class="__13p">search for folder</div><input type="text" class="__13n" onfocus="return go.doc.frS()" oninput="return go.doc.frSearch(this)" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" style="width: 160px;"><div class="__17n" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__17v"><div class="__17w"></div></div><div class="__17x">Docs & Folders</div></div></div><div style="font-size: 18px;color: rgb(41, 124, 158);font-weight: bold;margin: 15px 0 0 15px;">Folder shelf</div><div style="color: grey;font-size: 12px;margin: 5px 0 15px 15px;">Store your files in folders</div></div><div class="__13r" style="margin: 0;"><div class="__13s"><div class="__13t">Folder</div><div class="__13u" style="background-position: 0 -102px;" onclick="return go.doc.newFolder()"></div></div><div class="__14b" onselectstart="return false;" style="min-height: 200px;" id="folder-main" data-s="1"><div class="__16c" onclick="return go.doc.newFolder()"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g" style="background-position: 0 -100px;"></div><div class="__13w">No Folder</div></div></div></div><button class="__16a invisible" id="folder-m" onclick="return go.doc.folderUp();"><span>Загрузить ещё</span><div class="__16b"></div></button>','Папки'];
						}
						$d = ['<div class="__13k">'.$c[2][0].'</div>',$c[2][1],3];
					} else if (findURLV([$a['q'],'section','books'])) {
						$d = ['<div class="__13l" style="height: 70px;"><div class="__13o" style="margin-left: 280px;"><div class="__13o0"></div><div class="s-i"></div><div class="__13p">search by title, author or ISBN</div><input type="text" class="__13n" onfocus="return go.doc.frS()" oninput="return go.doc.frSearch(this)" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" style="width: 160px;"><div class="__17n" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__17v"><div class="__17w"></div></div><div class="__17x">Docs &amp; Folders</div></div></div><div style="font-size: 18px;color: rgb(41, 124, 158);font-weight: bold;margin: 12px 0 0 15px;">Book store</div><div style="color: silver;font-size: 12px;margin: 0px 0 0 15px;font-weight: bold;">Bestsellers, popular & classics books</div></div>','Книги',4];
					} else if (findURLV([$a['q'],'section','apps'])) {
						$d = ['<div class="__13l" style="height: 70px;"><div class="__13o" style="margin-left: 280px;"><div class="__13o0"></div><div class="s-i"></div><div class="__13p">search by title, author or ISBN</div><input type="text" class="__13n" onfocus="return go.doc.frS()" oninput="return go.doc.frSearch(this)" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" style="width: 160px;"><div class="__17n" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);"><div class="__17v"><div class="__17w"></div></div><div class="__17x">Docs &amp; Folders</div></div></div><div style="font-size: 18px;color: rgb(41, 124, 158);font-weight: bold;margin: 12px 0 0 15px;">Apps for files</div><div style="color: silver;font-size: 12px;margin: 0px 0 0 15px;font-weight: bold;">Список приложении для работы документами</div></div>','Приложения',5];
					} else if (findURLV([$a['q'],'section','deleted'])) {
						$c = [alertBox::docContinue([2,0])];
						$c[1] = sizeof($c[0][4]);
						for ($c[2]=0;$c[2]<$c[1];$c[2]++) $d[0] .= docType($c[0][4][$c[2]]);
						$d = ['<div class="__13k"><div class="__13r" style="margin-top: 0;min-height: 200px;"><div class="__13s"><div class="__13t">Deleted Documents</div><div class="__13u'.($GLOBALS['info'][40][1]==0?'':' __13u0').'" data-id="'.$GLOBALS['info'][40][1].'" onclick="return go.doc.formC(this)"></div></div><div class="__14b" id="deleted-doc" onselectstart="return false;" data-dds="0">'.($d[0]!=''?$d[0]:'<div class="__16c"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g"></div><div class="__13w">Empty Trash</div></div>').'</div></div><button class="__16a '.($c[1]!=30?'invisible':'').'" id="__16a" onclick="return go.doc.update();"><span>Загрузить ещё</span><div class="__16b"></div></button></div>','Удаленные документы',6];
					} else if (findURLV([$a['q'],'section','copyright'])) {
						$d = ['<div class="__13r" style="margin: 0;"><div class="__13s"><div class="__13t">Авторское право</div></div><div class="__14b" onselectstart="return false;"><div class="___2z" style="padding: 14px 14px 0 14px;">Авторское право на документы</div><div class="___3o" style="margin: 14px 14px 0 14px;">Компания Infalike Inc уважает права других сторон на интеллектуальную собственность и ожидает того же от пользователей. В соответствии с законом о защите авторских прав в цифровую эпоху от 1998 года, с которым можно ознакомиться на веб-сайте бюро авторских прав США here<!--http://www.copyright.gov/legislation/dmca.pdf-->, Dropbox безотлагательно отвечает на любые претензии о нарушении авторских прав в связи с использованием службы Dropbox и/или веб-сайта Dropbox («Сайт»), если такие претензии адресуются агенту по соблюдению авторских прав, который назначен Dropbox и указан в образце уведомления ниже.</div><div class="___3a" style="margin: 14px 14px 0 14px;">“Уведомление” о предполагаемых нарушениях в соответствии с законом о защите авторских прав в цифровую эпоху</div><div class="___3b" style="margin: 14px 14px 0 14px;padding: 0 0 14px 0;">Укажите объект авторского права, который, как Вы считаете, используется с его нарушением. Если в данное уведомление нужно включить несколько объектов авторского права, которые, как Вы считаете, используются с его нарушением, можно предоставить их репрезентативный список.<br/><br/>Укажите материал или ссылку на материал, к которым, как Вы считаете, нужно заблокировать доступ, поскольку они используются с нарушением авторских прав (или предмет деятельности, нарушающей авторские права). Как минимум необходимо указать, если это уместно, URL-адрес ссылки, показанной на Сайте, или точное расположение, по которому можно найти этот материал.<br/><br/>Укажите филиал компании (если уместно), почтовый адрес, номер телефона, и адрес электронной почты (при наличии).<br/><br/>В текст Уведомления включите два утверждения, которые указаны ниже.<br/><br/>«Я обоснованно предполагаю, что использование указанного мной защищенного авторским правом материала, не разрешено владельцем авторских прав, его агентом или запрещено законом (например, не разрешено его законное использование в целях обзора)».<br/><br/>«Настоящим я заявляю, под страхом наказания за лжесвидетельство, что информация, содержащаяся в настоящем Уведомлении, точна и я являюсь владельцем или имею полномочия действовать от имени владельца авторских или исключительных прав в рамках тех авторских прав, которые предположительно были нарушены».<br/><br/>Укажите Ваше полное официальное имя и предоставьте электронную или физическую подпись.</div><div class="__4i" style="border-top: 1px solid #e6ecf0;"><button class="__4o" onclick="return go.doc.support()"><div class="lg-1"></div><span>Отправить уведомление</span></button></div></div></div>','Авторские права на документы',7];
					} else if (findURLV([$a['q'],'section','terms'])) {
						$d = ['<div class="__13r" style="margin: 0;"><div class="__13s"><div class="__13t">Правила</div></div><div class="__14b" onselectstart="return false;"><div class="___2z" style="padding: 14px 14px 0 14px;">Политика конфиденциальности Dropbox</div><div class="___3o" style="margin: 14px 14px 0 14px;">Спасибо, что используете Dropbox! В этом документе описывается, как именно мы собираем, храним и обрабатываем вашу информацию, которую получаем, когда вы используете наш веб-сайт, программное обеспечение и службы (в дальнейшем именуются «Службы»).</div><div class="___3a" style="margin: 14px 14px 0 14px;">Ваши данные</div><div class="___3b" style="margin: 14px 14px 0 14px;padding: 0 0 14px 0;">Сохранение ваших данных и ответственное обращение с ними — наша основная задача, и мы осознаем связанную с этим ответственность. Мы считаем, что данным наших пользователей должна обеспечиваться одинаково надежная правовая защита, независимо от того, хранятся ли они в наших службах или же на жестких дисках дома у самих пользователей. Мы действуем в соответствии со следующими Принципами обработки правительственных запросов, когда получаем и обрабатываем такие запросы (в том числе и запросы, связанные с национальной безопасностью), касающиеся информации пользователей, и отвечаем на них:<br><br>прозрачность;<br>отклонение запросов, касающихся больших массивов данных, а не конкретных пользователей;<br>защита всех пользователей;<br>обеспечение надежных услуг.<br><br>Мы публикуем Отчет о доступе к информации, потому что всегда стремимся как можно более подробно рассказывать о том, когда и как правительства запрашивают у нас информацию наших пользователей. В отчете приводится информация о типах запросов, которые мы получаем от правоохранительных органов, и о том, сколько таких запросов было. Мы хотим, чтобы наши пользователи просматривали наши Принципы обработки правительственных запросов и Отчет о доступе к информации — там они могут найти более подробную информацию о том, как мы обрабатываем правительственные запросы и реагируем на них.</div></div></div>','Правила и условия',8];
					} else if (findURLV([$a['q'],'section','settings'])) {
						$c = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][10][3]."` FROM `".$GLOBALS['info'][2][10][0]."` WHERE `".$GLOBALS['info'][2][10][1]."`='".$_SESSION['id']."' LIMIT 1")];
						if ($GLOBALS['DB']->n($c[0])!=0) $GLOBALS['info'][22][1] = $GLOBALS['DB']->f($c[0])[0];
						$c[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][34][3]."`,`".$GLOBALS['info'][2][34][4]."` FROM `".$GLOBALS['info'][2][34][0]."` WHERE `".$GLOBALS['info'][2][34][1]."`='".$_SESSION['id']."' LIMIT 1");
						if ($GLOBALS['DB']->n($c[1])) $c[2] = $GLOBALS['DB']->f($c[1]);
						$GLOBALS['info'][40][0] = $c[2][0];
						$GLOBALS['info'][40][2] = $c[2][1];
						$d = ['<div class="__13r" style="margin-top: 0;min-height: 200px;"><div class="__13s"><div class="__13t">Document settings</div></div><div class="__14b" onselectstart="return false;" style="min-height: 200px;"><div class="__4i"><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Цветная фильтрация документа</div><div class="__6o">'.($GLOBALS['info'][40][2]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-ds><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-ds><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">Все ваши удаленные файлы, будут храниться в течении 7 дней с момента удаления. В течении этих 7 дней вы можете востановить их с помощью вашего пароля.</div></div></div><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Хранить удаленные файлы</div><div class="__6o">'.($GLOBALS['info'][40][0]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-ds><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-ds><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">Все ваши удаленные файлы, будут храниться в течении 7 дней с момента удаления. В течении этих 7 дней вы можете востановить их с помощью вашего пароля.</div></div></div><div class="__4c"><div id="_v"><div class="__6m"><div class="__6n">Запрашивать пароль при удалении данных</div><div class="__6o">'.($GLOBALS['info'][22][1]==0?'<div class="__5t" onclick="return go.init(\'\',this)" data-id="0" data-ds><div class="__5u"></div></div>':'<div class="__5t __5x" onclick="return go.init(\'\',this)" data-id="1" data-ds><div class="__5u __5y"></div></div>').'</div></div><div class="__6p">Ещё один способ обезопасить ваши данные, при попытке удаления данных будет спрашиваться ваш пароль.</div></div></div></div><div class="__4i"><button class="__4o" id="bt2" data-status="open" onclick="return go.doc.saveSett(this,event)"><div class="lg-1"></div><span>Save changes</span></button></div></div></div>','Настройки документа',9];
					} else {
					$c = [alertBox::docContinue([1,0])];
					$c[1] = sizeof($c[0][4]);
					for ($c[2]=0;$c[2]<$c[1];$c[2]++) $d[0] .= docType($c[0][4][$c[2]]);
					$d = ['<div class="__13l" style="height: 70px;"><div class="__13o"><div class="__13o0"></div><div class="s-i"></div><div class="__13p">search for document</div><input type="text" class="__13n" oninput="return go.doc.search(this,event)"></div><div class="__17j" onselectstart="return false;" onclick="return go.doc.nw()"><div class="__17k"></div></div><div style="font-size: 18px;color: rgb(41, 124, 158);font-weight: bold;margin: 13px 0 0 15px;">Document store</div><div style="color: silver;font-size: 12px;margin: 0px 0 0 15px;font-weight: bold;">Keep an unlimited number of documents</div></div><div id="doc-mn"><div class="__13r"><div class="__13s"><div class="__13t">Все документы</div><div class="__13u'.($GLOBALS['info'][40][1]==0?'':' __13u0').'" data-id="'.$GLOBALS['info'][40][1].'" onclick="return go.doc.formC(this)"></div></div><div class="__14b" id="__14b" onselectstart="return false;" data-ds="0">'.($d[0]!=''?$d[0]:'<div class="__16c" onclick="return go.doc.nw();"><div class="__16d"></div><div class="__16e"></div><div class="__16f"></div><div class="__16g __13v"></div><div class="__13w">Empty</div></div>').'</div></div><button class="__16a '.($c[1]!=30?'invisible':'').'" id="__16a" onclick="return go.doc.update();"><span>Загрузить ещё</span><div class="__16b"></div></button></div><div class="invisible" id="doc-res"><div class="__13r" id="doc-result"><div class="__13s"><div class="__13t">Поиск документа</div></div><div id="doc-search" data-ds="1"></div></div><button class="__16a0 invisible" id="__16a0" onclick="return go.doc.update();"><span>Загрузить ещё</span><div class="__16b"></div></button></div>','Мой папки',0];
					}
			$b = ['<div class="__3g"><div class="__3h" id="__3h">'.menuLeft(2).'</div><div class="__3i"><div class="__13k">'.$d[0].'</div><div class="__13f" style="margin-top: 1px; position: fixed;">'.docMenu($d[2]).menuFooter(0).'</div></div></div>',$d[1]];
		} else if ($a['f']==8) {
			$c = [];
			preg_match('/folder(\d+)_(\d+)/',$a['d'],$c[1]);
			$c[0] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][3]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$c[1][1]."' LIMIT 1");
			if ($GLOBALS['DB']->n($c[0])!=0) {
			$c[0] = $GLOBALS['DB']->f($c[0])[0];
			if ($c[0]==0||$c[0]==1) {
				$c[0] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][37][3]."`,`".$GLOBALS['info'][2][37][7]."` FROM `".$GLOBALS['info'][2][37][0]."` WHERE `".$GLOBALS['info'][2][37][1]."`='".$c[1][2]."' AND `".$GLOBALS['info'][2][37][2]."`='".$c[1][1]."' AND `".$GLOBALS['info'][2][37][5]."`='0' LIMIT 1");
			if ($GLOBALS['DB']->n($c[0])!=0) {
				$c[2] = $GLOBALS['DB']->f($c[0]);
				$c[3] = true;
				$b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Папка недоступна</div>','Папка недоступна'];
				if ($c[1][1]==$_SESSION['id']) $c[3] = true; elseif ($c[2][1]==0) $c[3] = false;
				if ($c[3]) {
					$c[5] = alertBox::docContinue([4,0,$c[1][2],$c[1][1]]);
					if (sizeof($c[5][4])!=0) $c[4] = ''; else $c[4] = '<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Папка пустая</div>';
					for ($c[6]=0;$c[6]<sizeof($c[5][4]);$c[6]++) $c[4] .= '<a class="__17e" onmouseover="return go.doc.vw(this,event)" href="/doc'.$c[5][4][$c[6]]['own'].'_'.$c[5][4][$c[6]]['id'].'" target="_blank"><div class="__14l" style="'.(isset($c[5][4][$c[6]]['src'][0])?'background-image: url('.$c[5][4][$c[6]]['src'][0].')':'background: '.$c[5][4][$c[6]]['clr']).';"><div class="__14q" style="opacity: 0;"></div>'.$c[5][4][$c[6]]['tp'].'</div><div class="__17f"><div class="__14m __17g">'.$c[5][4][$c[6]]['nm'].'</div><div class="__14o __17h" data-time="'.$c[5][4][$c[6]]['tm'].'">'.$c[5][4][$c[6]]['tm'].'</div><div class="__14n __17h">'.$c[5][4][$c[6]]['sz'].'</div></div></a>';
					if (sizeof($c[5][4])!=0) $c[4] = '<div class="__17d"><div class="__13s" style="border: none;"><div class="__13t" style="width: 490px;text-align: center;font-size: 22px;">'.$c[2][0].'</div></div><div class="__14b" id="fr-list" data-id="'.htmlspecialchars(json_encode([$c[1][1],$c[1][2]])).'">'.$c[4].'</div></div>'; 
					$b = [$c[4],$c[2][0]];
				}
			} else $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Папка удалена</div>','Папка удален'];
			} else if($c[0]==2) $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Владелец этой папки заблокирован</div>','Пользователь заблокирован']; else $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Папка не доступна</div>','Папка заблокирован'];
			} else $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Папка не существует</div>','Документ удален'];
		} else if ($a['f']==9) {
			$c = [];
			preg_match('/doc(\d+)_(\d+)/',$a['d'],$c[1]);
			$c[0] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][3]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$c[1][1]."' LIMIT 1");
			if ($GLOBALS['DB']->n($c[0])!=0) {
			$c[0] = $GLOBALS['DB']->f($c[0])[0];
			if ($c[0]==0||$c[0]==1) {
				$c[2] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][5]."` FROM `".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][35][0]."` WHERE `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."`=`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."` AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`!='1' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`='".$c[1][2]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$c[1][1]."' LIMIT 1");
				if ($GLOBALS['DB']->n($c[2])!=0) {
					$c[2] = $GLOBALS['DB']->f($c[2]);
					$c[3] = ($c[2][1]==0?true:($c[1][1]==$_SESSION['id']?true:false));
					if ($c[3]) $b = ['<div class="__17d" style="margin-top: 120px;"><div class="__14b"><div class="__16c" style="margin: 60px 0 0 158px; height: 180px;"><div class="__16d" style="background: rgb(199, 226, 244);"></div><div class="__16e" style="background: rgb(199, 226, 244);"></div><div class="__16f" style="background: rgb(199, 226, 244);"></div><div class="__16g __13v"></div><div class="__13w" style="color: rgb(116, 190, 239);">'.fileSz($c[2][2]).'</div></div><div class="__17i" style="color: rgb(116, 190, 239);">'.$c[2][0].'</div></div><div id="f-download"><script>go.doc.dl('.htmlspecialchars(json_encode([intval($c[1][1]),intval($c[1][2])])).')</script></div></div>',$c[2][0]]; else $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Документ заблокирован</div>','Документ заблокирован'];
				} else $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Владелец документа заблокирован</div>','Документ удален'];
			} else if($c[0]==2) $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Владелец документа заблокирован</div>','Документ удален']; else $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Документ не доступен</div>','Документ не достпуен'];
			} else $b = ['<div style="font-size: 38px;color: grey;text-align: center;margin: 280px auto 250px auto;font-weight: bold;">Документ не существует</div>','Документ удален'];
		} else if ($a['f']==10) {
			$c = [];
			preg_match('/fdownload(\d+)_(\d+)/',$a['d'],$c[0]);
			$c[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][4]."`,`".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][9]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][4]."`,`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][9]."` FROM `".$GLOBALS['info'][2][36][0]."`,`".$GLOBALS['info'][2][35][0]."` WHERE `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][3]."`=`".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][1]."` AND `".$GLOBALS['info'][2][35][0]."`.`".$GLOBALS['info'][2][35][8]."`='0' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][7]."`!='1' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][1]."`='".$c[0][2]."' AND `".$GLOBALS['info'][2][36][0]."`.`".$GLOBALS['info'][2][36][2]."`='".$c[0][1]."' LIMIT 1");
			if ($GLOBALS['DB']->n($c[1])!=0) {
				$c[2] = $GLOBALS['DB']->f($c[1]);
				$c[3] = ($c[2][1]==0?true:($c[0][1]==$_SESSION['id']?true:false));
				if (!$c[3]) exit();
				$c[4] = substr(strrchr($c[2][0],'.'),1)==$c[2][2]?$c[2][0]:$c[2][0].'.'.$c[2][2];
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				header("Content-Disposition: attachment; filename=".$c[4]);
				header("Content-Type: application/zip");
				header("Content-Transfer-Encoding: binary");
				readfile($c[2][3]);
			}
			exit();
		} else if ($a['f']==11) {
		$c[2] = ['','',''];
		preg_match('/audios(\d)/',$a['d'],$c[2][1]);
		$d = [($c[2][1][1]==$_SESSION['id']?0:$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][51][1]."`) FROM `".$GLOBALS['info'][2][51][0]."` WHERE `".$GLOBALS['info'][2][51][2]."`='".$c[2][1][1]."' AND `".$GLOBALS['info'][2][51][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][51][5]."`='0' LIMIT 1"))];
		if ($d[0]==0) {
			if (findURLV([$a['q'],'section','playlists'])) {
				return [alertBox::fAuP(alertBox::auP($c[2][1][1])),'Плейлисты'];
			} else if (findURLV([$a['q'],'section','recom'])) {
				$c[2] = [auBody([[3,$c[2][1][1]],$c[2][0],'<div class="__21a"></div><div class="__22o">Рекомендации</div>']),'Рекомендации',auHead([2,$c[2][1][1]])];
			} else if (findURLV([$a['q'],'section','albums'])) {
				$c[2] = [auBody([[3,$c[2][1][1]],$c[2][0],'<div class="__21b"></div><div class="__22o">У вас нет альбома</div>']),'Мой альбомы',auHead([3,$c[2][1][1]])];
			} else {
				return [alertBox::fAuP(alertBox::auM($c[2][1][1])),'Моя музыка'];
			}
		} else $c[2] = ['<div data-id="'.htmlspecialchars(json_encode([0,$c[2][1][1]])).'" data-info="'.htmlspecialchars(json_encode([0,$c[2][1][1]])).'" id="au-list"><div class="__19b">'.($c[2][0]!=''?$c[2][0]:'Пользователь ограничил вам доступ').'</div><div id="__19b0"></div></div>','Доступ ограничен',auHead([0,$c[2][1][1]])];
		$b = ['<div class="__3g"><div class="__3h" id="__3h">'.menuLeft(2).'</div><div class="__3i"><div class="__18v" id="au-con-m"><div id="au-con"><div class="__19a" style="background-image: url(/sources/def.png);"></div><div class="__19l __19m" onclick="return go.audio.play(go.stop(event));"></div><div class="__19n" onclick="return go.audio.prev(go.stop(event));"></div><div class="__19o" onclick="return go.audio.next(go.stop(event));"></div><div class="__19p"></div><div class="__19q"onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,event,0)"><div class="__23c0"></div><div class="__19r" onselectstart="return false;"><div class="__23b"></div><div class="__19r0"><div class="__19r1"></div></div></div></div><div class="__20a"></div><div class="__19t2"><div class="__19t3"><div class="__19t1"></div><div class="__19t"></div><div class="__19t0"></div></div><div id="__19t"></div></div><div class="__19s0" onclick="return go.audio.mode();"><div class="__19s1" data-id="0" id="_au_mode"></div><div class="__19s" onmouseenter="return go.audio.help(this,1,\'Normal mode\',event)"></div></div><div class="__19u0"><div class="__19u" onmouseenter="return go.audio.help(this,2,\'Показать похожие\',event)"></div></div><div class="__19v0"><div class="__19v1"></div><div class="__19v" onmouseover="return go.audio.status(this,event)"></div></div><div class="__19w" id="__19w"><div class="__19x"></div></div><div class="__19y" onmouseenter="return go.audio.volS(this,event,0)" onmousedown="return go.audio.vol(this,event,0)"><div class="__23c"><div class="__23d">12</div></div><div class="__19z"><div class="__19z0"><div class="__19z1"></div></div></div></div></div></div><div class="__13k"><div class="__13r"><div class="__19k"><div class="__19h">'.$c[2][2].'</div></div><div class="__18w"><div class="__20m"></div><input type="text" class="__18x" placeholder="Поиск по аудиозаписьям, альбомам, исполнителям" onkeyup="return go.audio.searchStart()" value="'.getURL([$a['q'],'search']).'"><div class="__18z" onclick="return go.audio.upload()"><div class="__20k"></div></div><div class="__23h"><div class="__23i" onclick="return go.audio.searchClear()"></div><div class="__23j" onclick="return go.audio.sOpV(this,event)" onmousedown="return go.stop(event);"></div></div></div>'.$c[2][0].'</div><div id="__19b1"></div></div><div class="__13f" id="audio-right"><div class="__25w"><div class="__26f"><div class="__26f0" onclick="return go.audio.prev(go.stop(event));"></div><div class="__26f1" onclick="return go.audio.next(go.stop(event));"></div><div class="__26f4" onclick="return go.audio.mode();"><div class="__26f4b" style="margin-top: -12px;"><div class="__26f4c"></div></div><div class="__26f4d"></div><div class="__26f4e"><div class="__26f4f"></div></div></div><div class="__26f4" id="__26f4"><div class="__26f4a" style="margin-top: -10px;"></div><div class="__26f4a1"></div><div class="__26f4a0"></div></div><div class="__26f3"></div><div class="__26f2" onmouseenter="return go.audio.opConV(this,event);"><div class="__26g"><div class="__7a" style="margin: -16px 0 0 76px;"><div class="__7b" style="box-shadow:0 0 1px 1px #e6ecf0;"></div></div><div class="__4y __6z" id="_au-l">Мне нравиться</div><div class="__4y __6z">Поделиться</div><div class="__4y __6z">Транслировать</div></div><div class="__26f20"></div></div></div><div class="__26d" onmouseenter="return go.audio.volS(this,event)" onmousedown="return go.audio.vol(this,event)"><div class="__23c"><div class="__23d"></div></div><div class="__26d0"><div class="__19z0"><div class="__19z1"></div></div></div></div><div class="__25x" id="__18o" onclick="return go.audio.play(go.stop(event));" onmouseenter="return go.audio.miniView(this,event)"><div class="__25x0"></div><div class="__20u"><div class="__20v"></div></div></div><div class="__25y"><div class="__25z"></div><div class="__26a"></div></div><div class="__26e">0:40</div><div class="__26b0" onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,event)"><div class="__23c0">0:00</div><div class="__26b"><div class="__26c0"></div><div class="__26c"><div class="__19r1"></div></div></div></div></div><div class="__3n"><div class="__13h" style="margin-bottom: 0;"><div class="__25t"><div class="__25u"></div><input type="text" class="__25v" placeholder="Search"></div><div class="__20d"><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/es.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Ed Sheeran</span><div class="__22i"></div><span class="__22j">sheeranoffical</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/tl.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Justin Timberlake</span><div class="__22i"></div><span class="__22j">timberlake</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/rg.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Rupert Grint</span><div class="__22i"></div><span class="__22j">grint</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div><div class="__20e"><div class="__25h"><div class="__25h1"><div class="__25s"><div class="__25s0"></div><div class="__25s1">1,5K</div></div><button class="__22l">Follow</button></div><div class="__25h0"><div class="__20f"><div class="__20t"></div><img src="/sources/b.jpg" width="38" height="38" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Jack Halib</span><div class="__22i"></div><span class="__22j">halib</span></div><div class="__22h">22 Аудиозаписей</div><div class="__20i"></div></div></div></div></div></div></div></div>'.menuFooter(0).'</div></div></div>',$c[2][1]];
		//<button class="__22h">Обновление друзей</button>
		} else if ($a['f']==12) {
			$c[2] = ['','',''];
			preg_match('/photos(\d)/',$a['d'],$c[2][1]);
			/*
			<div class="__18v" id="au-con-m"><div id="au-con"><div class="__19a" style="background-image: url(/sources/def.png);"></div><div class="__19l __19m" onclick="return go.audio.play(go.stop(event));"></div><div class="__19n" onclick="return go.audio.prev(go.stop(event));"></div><div class="__19o" onclick="return go.audio.next(go.stop(event));"></div><div class="__19p"></div><div class="__19q"onmouseenter="return go.audio.tmS(this,event)" onmousedown="return go.audio.rew(this,event,0)"><div class="__23c0"></div><div class="__19r" onselectstart="return false;"><div class="__23b"></div><div class="__19r0"><div class="__19r1"></div></div></div></div><div class="__20a"></div><div class="__19t2"><div class="__19t3"><div class="__19t1"></div><div class="__19t"></div><div class="__19t0"></div></div><div id="__19t"></div></div><div class="__19s0" onclick="return go.audio.mode();"><div class="__19s1" data-id="0" id="_au_mode"></div><div class="__19s" onmouseenter="return go.audio.help(this,1,\'Normal mode\',event)"></div></div><div class="__19u0"><div class="__19u" onmouseenter="return go.audio.help(this,2,\'Показать похожие\',event)"></div></div><div class="__19v0"><div class="__19v1"></div><div class="__19v" onmouseover="return go.audio.status(this,event)"></div></div><div class="__19w" id="__19w"><div class="__19x"></div></div><div class="__19y" onmouseenter="return go.audio.volS(this,event,0)" onmousedown="return go.audio.vol(this,event,0)"><div class="__23c"><div class="__23d">12</div></div><div class="__19z"><div class="__19z0"><div class="__19z1"></div></div></div></div></div></div><div class="__13k"><div class="__13r"><div class="__18w"><div class="__20m"></div><input type="text" class="__18x" placeholder="Поиск по аудиозаписьям, альбомам, исполнителям" onkeyup="return go.audio.searchStart()" value="'.getURL([$a['q'],'search']).'"><div class="__18z" onclick="return go.audio.upload()"><div class="__20k"></div></div><div class="__23h"><div class="__23i" onclick="return go.audio.searchClear()"></div><div class="__23j" onclick="return go.audio.sOpV(this,event)" onmousedown="return go.stop(event);"></div></div></div><div class="__19k"><div class="__19h">'.$c[2][2].'</div></div>'.$c[2][0].'</div><div id="__19b1"></div></div><div class="__13f" style="margin-top: 10px;position: absolute;" id="audio-right"><div class="__3n"><div class="__13h" style="margin-bottom: 0;"><div class="__20b"><div class="__20m"></div><input type="text" class="__20c" placeholder="Поиск друзей, подписки"></div><div class="__20d"><div class="__20e"><div class="__20f"><div class="__20t"></div><img src="/sources/es.jpg" width="34" height="34" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Ed Sheeran</span><div class="__22i"></div></div><div class="__20i"><span class="__22j">sheeranoffical</span></div></div><div class="__22l"></div></div><div class="__20e"><div class="__20f"><div class="__20t"></div><img src="/sources/tl.jpg" width="34" height="34" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Justin Timberlake</span><div class="__22i"></div></div><div class="__20i"><span class="__22j">timberlake</span></div></div><div class="__22l"></div></div><div class="__20e"><div class="__20f"><div class="__20t"></div><img src="/sources/rg.jpg" width="34" height="34" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Rupert Grint</span></div><div class="__20i"><span class="__22j">grint</span></div></div><div class="__22l"></div></div><div class="__20e"><div class="__20f"><img src="/sources/b.jpg" width="34" height="34" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Jack Halib</span><div class="__22i"></div></div><div class="__20i"><span class="__22j">halib</span></div></div><div class="__22l"></div></div><div class="__20e"><div class="__20f"><img src="/sources/b.jpg" width="34" height="34" class="photo"></div><div class="__20g"><div class="__20h"><span class="__22k">Jack Halib</span><div class="__22i"></div></div><div class="__20i"><span class="__22j">halib</span></div></div><div class="__22l"></div></div></div><button class="__22h">Обновление друзей</button></div></div>'.menuFooter(0).'</div>
			*/
			$b = ['<div class="__3g"><div class="__3h" id="__3h">'.menuLeft(2).'</div><div class="__3i"></div></div>','My photos'];
		}
		return $b;
}
function eduLSel($a) {
$b = '<div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w1"><div class="s-i __4w2"></div><input type="text" placeholder="Search" class="__4w3" oninput="return go.searchTxt(this)"></div><div class="__4w __4w0 invisible"></div><div class="__4w __4w0">';
if ($a['i']!=0) {
$d = $a['m']==0?$GLOBALS['info'][35][$a['t']][$a['i']]:$GLOBALS['info'][36][$a['t']][$a['i']];
foreach ($d as $k=>$v) {
if ($v!=1) {
$c = htmlspecialchars(json_encode(array('i'=>$k,'v'=>($v!==0?$v:'Not selected'),'m'=>$a['m'],'t'=>$a['i'])));
$b .= '<div class="__4y" onclick="'.($a['m']==0?'return go.st(this,'.$c.')':'return go.stEdu(this,'.$c.')').'" data-txt="'.($v!==0?$v:'Not selected').'">'.($v!==0?$v:'Not selected').'</div>';
}
}
} else $b .= '<div class="__4y" onclick="return go.st(this,{\'i\':0,\'v\':\'Not selected\',\'m\':'.$a['m'].',\'t\':'.$a['i'].'})">Not selected</div>';
$b .= '</div></div></div>';
return $b;
}
function cityLSel($a) {
$b = '<div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w1"><div class="s-i __4w2"></div><input type="text" placeholder="Search" class="__4w3" oninput="return go.searchTxt(this)"></div><div class="__4w __4w0 invisible"></div><div class="__4w __4w0">';
if ($a['i']!=0) {
foreach ($GLOBALS['info'][34][$a['i']] as $k=>$v) {
if ($v!=1) {
$c = htmlspecialchars(json_encode(array('i'=>$k,'v'=>($v!==0?$v:'Not selected'),'m'=>$a['m'],'t'=>$a['i'])));
$b .= '<div class="__4y" onclick="return go.citySelL(this,'.$c.')" data-txt="'.($v!==0?$v:'Not selected').'">'.($v!==0?$v:'Not selected').'</div>';
}
}
} else $b .= '<div class="__4y" onclick="return go.citySelL(this,{\'i\':0,\'v\':\'Not selected\',\'m\':'.$a['m'].',\'t\':'.$a['i'].'})">Not selected</div>';
$b .= '</div></div></div>';
return $b;
}
function cityListSel($a) {
$b = '<div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w1"><div class="s-i __4w2"></div><input type="text" placeholder="Search" class="__4w3" oninput="return go.searchTxt(this)"></div><div class="__4w __4w0 invisible"></div><div class="__4w __4w0">';
foreach ($GLOBALS['info'][34][$a['m']['i']] as $k=>$v) {
if ($v!=1) {
$c = htmlspecialchars(json_encode(array('i'=>$k,'v'=>($v!==0?$v:'Not selected'),'m'=>$a['m']['i'],'t'=>$a['i'])));
$b .= '<div class="__4y" onclick="return go.citySel(this,'.$c.')" data-txt="'.($v!==0?$v:'Not selected').'">'.($v!==0?$v:'Not selected').'</div>';
}
}
$b .= '</div></div></div>';
return $b;
}
function languageList() {
$b = '<div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">';
foreach ($GLOBALS['info'][38] as $k=>$v) {
$b .= '<div class="__4y" onclick="return go.st(this,{\'i\':'.$k.',\'v\':\''.($k!=0?$v[0]:'Not selected').'\'})">'.($k!=0?'<span class="__4x1">'.$v[0].'</span><span class="__4x">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]].'</span>':'Not selected').'</div>';
}
$b .= '</div></div></div>';
return $b;
}
function countryDD($a=0) {
$b = '<div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w1"><div class="s-i __4w2"></div><input type="text" placeholder="Search" class="__4w3" oninput="return go.searchTxt(this)"></div><div class="__4w __4w0 invisible"></div><div class="__4w __4w0">';
foreach ($GLOBALS['info'][19][$GLOBALS['info'][1]['lang']] as $k=>$v) {
$c = htmlspecialchars(json_encode(array('i'=>$v[0],'v'=>$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]])));
$b .= '<div class="__4y" onclick="return go.'.($a!=2?'countrySelOp':'st').'(this,'.$c.','.$a.')" data-txt="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]].'">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]].'</div>';
}
$b .= '</div></div></div>';
return $b;
}
function countryListDD($a=0) {
$b = '<div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w1"><div class="s-i __4w2"></div><input type="text" placeholder="Search" class="__4w3" oninput="return go.searchTxt(this)"></div><div class="__4w __4w0 invisible"></div><div class="__4w __4w0">';
foreach ($GLOBALS['info'][19][$GLOBALS['info'][1]['lang']] as $k=>$v) {
$c = htmlspecialchars(json_encode(array('i'=>$v[0],'v'=>$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]])));
$b .= '<div class="__4y" onclick="return go.countrySelectOp(this,'.$c.','.$a.')" data-txt="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]].'">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]].'</div>';
}
$b .= '</div></div></div>';
return $b;
}
function countryList($a = '') {
$b = '<div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">';
foreach ($GLOBALS['info'][19][$GLOBALS['info'][1]['lang']] as $k=>$v) {
$c = htmlspecialchars(json_encode(array('i'=>$v[0],'v'=>$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]])));
$b .= '<div class="__4y" onclick="return go.countrySelect(this,'.$c.')">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]].'</div>';
}
$b .= '</div></div></div>';
return $b;
}
function colourSel() {
$a = '<div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">';
foreach ($GLOBALS['info'][17] as $k=>$v) {
$b = htmlspecialchars(json_encode(array('i'=>$k,'v'=>$v[0],'c'=>$v[1])));
$a .= '<div class="__4y" onclick="return go.colourSel(this,'.$b.')"><div class="__5a" style="background-color: '.$v[1].';"></div><div class="__5b">'.$v[0].'</div></div>';
}
$a .= '</div></div></div>';
return $a;
}
function langSel() {
$a = '<div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">';
foreach ($GLOBALS['info'][3] as $k=>$v) {
$b = htmlspecialchars(json_encode(array('i'=>$k,'v'=>$v)));
$a .= '<div class="__4y" onclick="return go.langSelect(this,'.$b.')"><span class="__4x1">'.$v.'</span><span class="__4x">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$k].'</span></div>';
}
$a .= '</div></div></div>';
return $a;
}
function timeZone() {
$a = '<div class="__4u" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">';
foreach ($GLOBALS['info'][16] as $k=>$v) {
$b = htmlspecialchars(json_encode(array('i'=>$k,'v'=>$v[2])));
$a .= '<div class="__4y" onclick="return go.timeSel(this,'.$b.')">'.$v[2].'</div>';
}
$a .= '</div></div></div>';
return $a;
}
function leftImageBlock() {
$a = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][0]."`.`".$GLOBALS['info'][2][2][2]."`,`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][2]."`,`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][3]."` FROM `".$GLOBALS['info'][2][2][0]."`,`".$GLOBALS['info'][2][17][0]."` WHERE `".$GLOBALS['info'][2][2][0]."`.`".$GLOBALS['info'][2][2][1]."`=`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][1]."` AND `".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][1]."`='".$_SESSION['id']."' LIMIT 1")];
$a[1] = $GLOBALS['DB']->f($a[0]);
$a[2] = '<div class="__3y1"></div>';
if (is_array($GLOBALS['DB']->img)) $a[2] = '<img class="photo" src="'.$GLOBALS['DB']->img[3][2].'" width="60" height="60">';
return '<div class="__3n"><div class="__3u"><div class="__3v"></div><div class="__3x"><div class="__3y3" onclick="return go.profilePicture();"><div class="__3y2"></div></div><div class="__3y" data-qi="'.$_SESSION['id'].'" data-ti="1" data-w="60" data-h="60">'.$a[2].'</div></div><div class="__3x0"><div class="__3x1">'.$a[1][1].' '.$a[1][2].'</div><div class="__3x2">'.$a[1][0].'</div></div></div></div>';
}
function editLeft($a=0) {
return '<div class="__3m">'.leftImageBlock().'<div class="__3n"><div class="__3t"><a href="/edit" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==0?'__4b1':'').'"><div class="__3w '.($a==0?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][151].'</div></a></div><div class="__3t"><a href="/edit?section=contacts" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==1?'__4b1':'').'"><div class="__3w '.($a==1?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][152].'</div></a></div><div class="__3t"><a href="/edit?section=interests" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==2?'__4b1':'').'"><div class="__3w '.($a==2?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][153].'</div></a></div><div class="__3t"><a href="/edit?section=career" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==3?'__4b1':'').'"><div class="__3w '.($a==3?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][154].'</div></a></div><div class="__3t"><a href="/edit?section=education" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==4?'__4b1':'').'"><div class="__3w '.($a==4?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][156].'</div></a></div><div class="__3t"><a href="/edit?section=military" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==5?'__4b1':'').'"><div class="__3w '.($a==5?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][155].'</div></a></div><div class="__3t"><a href="/edit?section=personal" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==6?'__4b1':'').'"><div class="__3w '.($a==6?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][157].'</div></a></div><div class="__3t"><a href="/edit?section=family" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==7?'__4b1':'').'"><div class="__3w '.($a==7?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][158].'</div></a></div><div class="__3t"><a href="/settings?section=access" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==8?'__4b1':'').'"><div class="__3w '.($a==8?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][159].'</div></a></div></div>'.menuFooter(0).'</div>';
}
function settingsLeft($a=0) {
$a = '<div class="__3m">'.leftImageBlock().'<div class="__3n"><div class="__3t"><a href="/settings" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==0?'__4b1':'').'"><div class="__3w '.($a==0?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][116].'</div></a></div><div class="__3t"><a href="/settings?section=security" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==1?'__4b1':'').'"><div class="__3w '.($a==1?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][117].'</div></a></div><div class="__3t"><a href="/settings?section=privacy" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==2?'__4b1':'').'"><div class="__3w '.($a==2?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][43].'</div></a></div><div class="__3t"><a href="/settings?section=notifications" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==3?'__4b1':'').'"><div class="__3w '.($a==3?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][118].'</div></a></div><div class="__3t"><a href="/settings?section=blacklist" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==4?'__4b1':'').'"><div class="__3w '.($a==4?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][119].'</div></a></div><div class="__3t"><a href="/settings?section=services" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==5?'__4b1':'').'"><div class="__3w '.($a==5?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][120].'</div></a></div><div class="__3t"><a href="/settings?section=mobile" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==6?'__4b1':'').'"><div class="__3w '.($a==6?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][121].'</div></a></div><div class="__3t"><a href="/settings?section=payments" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==7?'__4b1':'').'"><div class="__3w '.($a==7?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][122].'</div></a></div><div class="__3t"><a href="/settings?section=access" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==8?'__4b1':'').'"><div class="__3w '.($a==8?'__3w1':'').'"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][123].'</div></a></div><div class="__3t"><a href="/settings?section=statistics" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==9?'__4b1':'').'"><div class="__3w '.($a==9?'__3w1':'').'"></div>Statistics</div></a></div></div><div class="__3n"><div class="__3t"><a href="/settings?section=apps" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==10?'__4b1':'').'"><div class="__3w '.($a==10?'__3w1':'').'"></div>Applications</div></a></div><div class="__3t"><a href="/settings?section=history" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==11?'__4b1':'').'"><div class="__3w '.($a==11?'__3w1':'').'"></div>History</div></a></div><div class="__3t"><a href="/settings?section=calendar" class="no-link" onclick="return go.link(this,event)"><div class="__4b '.($a==12?'__4b1':'').'"><div class="__3w '.($a==12?'__3w1':'').'"></div>Calendar</div></a></div></div>'.menuFooter(0).'</div>';
return $a;
}
function menuFooter($a) {
	if ($a==0) {
		$b = $GLOBALS['info'][15];
		$c = '';
		foreach ($b as $k=>$v) {
			$c .= '<a href="/'.$GLOBALS['info'][11][$k].'" class="no-link" onclick="return go.link(this,event)"><span class="__3p">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v].'</span></a>';
		}
		return '<div class="__3n"><div class="__3q"><span class="__3p __3r">© 2017 Infalike</span>'.$c.'</div></div>';
	}
}
function accessibility() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][16][2]."`,`".$GLOBALS['info'][2][16][3]."` FROM `".$GLOBALS['info'][2][16][0]."` WHERE `".$GLOBALS['info'][2][16][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][28][0] = $b[1][0];
$GLOBALS['info'][28][1] = $b[1][1];
}
}
function contacts() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][21][2]."`,`".$GLOBALS['info'][2][21][3]."`,`".$GLOBALS['info'][2][21][4]."`,`".$GLOBALS['info'][2][21][5]."` FROM `".$GLOBALS['info'][2][21][0]."` WHERE `".$GLOBALS['info'][2][21][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][33][0] = json_decode($b[1][0]);
$GLOBALS['info'][33][1] = json_decode($b[1][1]);
$GLOBALS['info'][33][2] = json_decode($b[1][2]);
$GLOBALS['info'][33][3] = json_decode($b[1][3]);
}
}
function interests() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][20][2]."`,`".$GLOBALS['info'][2][20][3]."`,`".$GLOBALS['info'][2][20][4]."`,`".$GLOBALS['info'][2][20][5]."` FROM `".$GLOBALS['info'][2][20][0]."` WHERE `".$GLOBALS['info'][2][20][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][32][0] = $b[1][0];
$GLOBALS['info'][32][1] = $b[1][1];
$GLOBALS['info'][32][2] = $b[1][2];
$GLOBALS['info'][32][3] = $b[1][3];
}
}
function findFaculty($a) {
$b = '';
foreach ($GLOBALS['info'][37][$a[0]][$a[1]][$a[2]] as $k=>$v) {
$b .= '<div class="__4y" onclick="return go.st(this,{\'i\':'.$k.',\'v\':\''.($v!==0?$v:'Not selected').'\'})">'.($v!==0?$v:'Not selected').'</div>';
}
return $b;
}
function findCountry($a) {
$b = '';
foreach ($GLOBALS['info'][19][$GLOBALS['info'][1]['lang']] as $k=>$v) {
if ($v[0]!=$a) continue;
$b = $GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$v[1]];
break;
}
return $b;
}
function stat_personal() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][19][2]."`,`".$GLOBALS['info'][2][19][3]."`,`".$GLOBALS['info'][2][19][4]."`,`".$GLOBALS['info'][2][19][5]."`,`".$GLOBALS['info'][2][19][6]."`,`".$GLOBALS['info'][2][19][7]."`,`".$GLOBALS['info'][2][19][8]."` FROM `".$GLOBALS['info'][2][19][0]."` WHERE `".$GLOBALS['info'][2][19][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][31][0] = $b[1][0];
$GLOBALS['info'][31][1] = $b[1][1];
$GLOBALS['info'][31][2] = $b[1][2];
$GLOBALS['info'][31][3] = $b[1][3];
$GLOBALS['info'][31][4] = $b[1][4];
$GLOBALS['info'][31][5] = $b[1][5];
}
}
function personal() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][18][2]."`,`".$GLOBALS['info'][2][18][3]."`,`".$GLOBALS['info'][2][18][4]."`,`".$GLOBALS['info'][2][18][5]."`,`".$GLOBALS['info'][2][18][6]."`,`".$GLOBALS['info'][2][18][7]."`,`".$GLOBALS['info'][2][18][8]."`,`".$GLOBALS['info'][2][18][9]."` FROM `".$GLOBALS['info'][2][18][0]."` WHERE `".$GLOBALS['info'][2][18][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][30][0] = $b[1][0];
$GLOBALS['info'][30][1] = $b[1][1];
$GLOBALS['info'][30][2] = $b[1][2];
$GLOBALS['info'][30][3] = $b[1][3];
$GLOBALS['info'][30][4] = $b[1][4];
$GLOBALS['info'][30][5] = $b[1][5];
$GLOBALS['info'][30][6] = $b[1][6];
$GLOBALS['info'][30][7] = $b[1][7];
}
}
function notifications() {
$b = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][14][2]."`,`".$GLOBALS['info'][2][14][3]."`,`".$GLOBALS['info'][2][14][4]."` FROM `".$GLOBALS['info'][2][14][0]."` WHERE `".$GLOBALS['info'][2][14][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
$GLOBALS['info'][26][0] = $b[1][0];
$GLOBALS['info'][26][1] = $b[1][1];
$GLOBALS['info'][26][2] = $b[1][2];
}
}
function privacy() {
//$info[2][12] = array(0=>'_privacy',1=>'id',2=>'_p0',3=>'_p1',4=>'_p2',5=>'_p3',6=>'_p4',7=>'_p5',8=>'_p6',9=>'_p7',10=>'_p8',11=>'_p9',12=>'_p10',13=>'_p11',14=>'_p12',15=>'_p13',16=>'_p14',17=>'_p15',18=>'_p16',19=>'_p17',20=>'_p18');//privacy
$a = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][12][2]."`,`".$GLOBALS['info'][2][12][3]."`,`".$GLOBALS['info'][2][12][4]."`,`".$GLOBALS['info'][2][12][5]."`,`".$GLOBALS['info'][2][12][6]."`,`".$GLOBALS['info'][2][12][7]."`,`".$GLOBALS['info'][2][12][8]."`,`".$GLOBALS['info'][2][12][9]."`,`".$GLOBALS['info'][2][12][10]."`,`".$GLOBALS['info'][2][12][11]."`,`".$GLOBALS['info'][2][12][12]."`,`".$GLOBALS['info'][2][12][13]."`,`".$GLOBALS['info'][2][12][14]."`,`".$GLOBALS['info'][2][12][15]."`,`".$GLOBALS['info'][2][12][16]."`,`".$GLOBALS['info'][2][12][17]."`,`".$GLOBALS['info'][2][12][18]."`,`".$GLOBALS['info'][2][12][19]."`,`".$GLOBALS['info'][2][12][20]."` FROM `".$GLOBALS['info'][2][12][0]."` WHERE `".$GLOBALS['info'][2][12][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($a[0])!=0) {
$a[1] = $GLOBALS['DB']->f($a[0]);
$GLOBALS['info'][24][0] = $a[1][0];
$GLOBALS['info'][24][1] = $a[1][1];
$GLOBALS['info'][24][2] = $a[1][2];
$GLOBALS['info'][24][3] = $a[1][3];
$GLOBALS['info'][24][4] = $a[1][4];
$GLOBALS['info'][24][5] = $a[1][5];
$GLOBALS['info'][24][6] = $a[1][6];
$GLOBALS['info'][24][7] = $a[1][7];
$GLOBALS['info'][24][8] = $a[1][8];
$GLOBALS['info'][24][9] = $a[1][9];
$GLOBALS['info'][24][10] = $a[1][10];
$GLOBALS['info'][24][11] = $a[1][11];
$GLOBALS['info'][24][12] = $a[1][12];
$GLOBALS['info'][24][13] = $a[1][13];
$GLOBALS['info'][24][14] = $a[1][14];
$GLOBALS['info'][24][15] = $a[1][15];
$GLOBALS['info'][24][16] = $a[1][16];
$GLOBALS['info'][24][17] = $a[1][17];
$GLOBALS['info'][24][18] = $a[1][18];
}
}
function security() {
$a = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][11][2]."`,`".$GLOBALS['info'][2][11][3]."`,`".$GLOBALS['info'][2][11][4]."` FROM `".$GLOBALS['info'][2][11][0]."` WHERE `".$GLOBALS['info'][2][11][1]."`='".$_SESSION['id']."' LIMIT 1"));
if ($GLOBALS['DB']->n($a[0])!=0) {
$a[1] = $GLOBALS['DB']->f($a[0]);
$GLOBALS['info'][23][0] = $a[1][0];
$GLOBALS['info'][23][1] = $a[1][1];
$GLOBALS['info'][23][2] = $a[1][2];
}
}
function monthDayList($a) {
$b = array(0=>strtotime($a.'-01-01'),1=>strtotime($a.'-12-31'),2=>array(0=>0,1=>''),3=>'');
do {
$b[5] = explode('-',date('Y-n-j',$b[0]));
$b[4] = substr($GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][($GLOBALS['info'][29][$b[5][1]-1])],0,3);
$b[3] .= '<div class="__4y cent" onclick="return go.st(this,{\'i\':\''.$b[5][2].'-'.$b[5][1].'\',\'v\':\''.$b[5][2].' '.$b[4].'\'})">'.$b[5][2].' '.$b[4].'</div>';
$b[0] = strtotime("+ 1 day",$b[0]);
} while ($b[0]<=$b[1]);
$b[2][1] = '<div class="__4u __4z3" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;" id="month-list"><div class="__4v"><div class="__4w">'.$b[3].'</div></div></div>';
echo json_encode($b[2]);
}
function birthDaySel($a) {
$b = '';
    $c = strtotime($a[2].'-01-01'); 
    $d = strtotime($a[2].'-12-31'); 
	//$info[29] = array(0=>160,1=>161,2=>162,3=>163,4=>164,5=>165,6=>166,7=>167,8=>168,9=>169,10=>170,11=>171);//month name
	//$i = substr($GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][($GLOBALS['info'][29][$e[1]-1])],0,3);
do {
	$e = explode('-',date('Y-n-j',$c));
    $b .= '<div class="__4y cent" onclick="return go.st(this,{\'i\':\''.$e[2].'-'.$e[1].'\',\'v\':\''.$e[2].' '.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][($GLOBALS['info'][29][$e[1]-1])].'\'})">'.$e[2].' '.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][($GLOBALS['info'][29][$e[1]-1])].'</div>'; 
    $c = strtotime("+ 1 day",$c);
} while ($c<=$d);
$f = date('Y');
$g = 1901;
$h = '';
while ($g<$f) {
$h .= '<div class="__4y cent" onclick="return go.yst(this,{\'i\':'.$f.',\'v\':'.$f.'})">'.$f.'</div>';
$f--;
}
return '<div class="__4c"><div class="__4d">Birhtday</div><div class="__4j __4j1" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n __4n1" data-id="'.$a[0].'-'.$a[1].'" data-edit id="month-data">'.$a[0].' '.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][($GLOBALS['info'][29][$a[1]-1])].'</div><div class="__4m"></div>
<div class="__6f __6f1 __6f2" id="help-date"><div class="__6g"></div>Не правильная дата. Возможно в выбранном месяце нету этого числа или вы выбрали <b>високосный год</b>.</div>
</div><div class="__4u __4z3" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;" id="month-list"><div class="__4v"><div class="__4w">'.$b.'</div></div></div><div class="__4j __4j1" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4n __4n1" data-id="'.$a[2].'" data-edit>'.$a[2].'</div><div class="__4m"></div></div><div class="__4u __4z4" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w">'.$h.'</div></div></div></div>';
}
function birthdayDay() {
//$info[2][17] = array(0=>'_info',1=>'id',2=>'nm',3=>'ln',4=>'mn',5=>'s',6=>'bd_d',7=>'bd_m',8=>'bd_y',9=>'bd_s');//access settings
$a = array(0=>$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][17][2]."`,`".$GLOBALS['info'][2][17][3]."`,`".$GLOBALS['info'][2][17][4]."`,`".$GLOBALS['info'][2][17][5]."`,`".$GLOBALS['info'][2][17][6]."`,`".$GLOBALS['info'][2][17][7]."`,`".$GLOBALS['info'][2][17][8]."`,`".$GLOBALS['info'][2][17][9]."` FROM `".$GLOBALS['info'][2][17][0]."` WHERE `".$GLOBALS['info'][2][17][1]."`='".$_SESSION['id']."' LIMIT 1"));
$a[1] = $GLOBALS['DB']->f($a[0]);
return '<div class="__4c"><div class="__4d">First name</div><input type="text" class="__4f" value="'.$a[1][0].'" data-edit onfocus="return go.viewInfo()" onblur="return go.hideInfo()" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" maxlength="31"></div><div class="__4c"><div class="__4d">Last name</div><input type="text" class="__4f" value="'.$a[1][1].'" data-edit onfocus="return go.viewInfo()" onblur="return go.hideInfo()" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" maxlength="31"><div class="__6f __6f1" id="help-info"><div class="__6g"></div>Вы можете использовать только ваше <b>настоящее имя</b> в полной форме, написанное буквами на одном языке.</div></div><div class="__4c '.($a[1][3]=='0'?'__4c1':'').'" id="info-sex"><div class="__4d">Девичья фамилия</div><input type="text" class="__4f" value="'.$a[1][2].'" data-edit onfocus="return go.viewInfo()" onblur="return go.hideInfo()" onmousedown="event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);" maxlength="31"></div><div class="__4c"><div class="__4d">Sex</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.($a[1][3]=='0'?'<div class="__4n" data-id="0" data-edit>Male</div>':'<div class="__4n" data-id="1" data-edit>Female</div>').'<div class="__4m"></div></div><div class="__4u __4z" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.sst(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Male&quot;})">Male</div><div class="__4y" onclick="return go.sst(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Female&quot;})">Female</div></div></div></div></div>'.birthDaySel(array(0=>$a[1][4],1=>$a[1][5],2=>$a[1][6])).'<div class="__4c"><div class="__4d">Birthday Settings</div><div class="__4j" onclick="return dom.dd(this)" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;">'.($a[1][7]==0?'<div class="__4n" data-id="0" data-edit>Show my birthday</div>':($a[1][7]==1?'<div class="__4n" data-id="1" data-edit>Show only the month and day</div>':'<div class="__4n" data-id="2" data-edit>Do not show my birthday</div>')).'<div class="__4m"></div></div><div class="__4u __4z0" onmousedown="if (event.stopPropagation) event.stopPropagation(); else event.cancelBubble = true;"><div class="__4v"><div class="__4w"><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:0,&quot;v&quot;:&quot;Show my birthday&quot;})">Show my birthday</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:1,&quot;v&quot;:&quot;Show only the month and day&quot;})">Show only the month and day</div><div class="__4y" onclick="return go.st(this,{&quot;i&quot;:2,&quot;v&quot;:&quot;Do not show my birthday&quot;})">Do not show my birthday</div></div></div></div></div>';
}
function menuLeft() {
$b = $GLOBALS['info'][18][1];
$c = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][8][0]."`.`".$GLOBALS['info'][2][8][3]."`,`".$GLOBALS['info'][2][2][0]."`.`".$GLOBALS['info'][2][2][2]."` FROM `".$GLOBALS['info'][2][8][0]."`,`".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][8][0]."`.`".$GLOBALS['info'][2][8][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][2][0]."`.`".$GLOBALS['info'][2][2][1]."`='".$_SESSION['id']."' LIMIT 1");
$j = '';
if ($GLOBALS['DB']->n($c)!=0) {
$d = $GLOBALS['DB']->f($c);
$b = json_decode($d[0],true);
}
$i = true;
foreach ($b as $e=>$f) {
foreach ($f as $g=>$h) {
if ($h[0]!=1) {
if (($e==1)&&$i) {
$j .= '<div class="__3k"></div>';
$i = false;
}
$j .= '<a href="'.menuIdCheck($h[3],$d[1]).'" class="no-link" onclick="return go.link(this,event)"><div class="__3j">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][$h[2]].'</div></a>';
}
}
}

return $j;
}
function docColor($a,$c) {
$b = '#96c0d6';
if ($c!=1) {
$b = '#ff8c00';
if ($a=='doc'||$a=='docx'||$a=='docm'||$a=='dotx'||$a=='dotm'||$a=='dot'||$a=='rtf'||$a=='pdf'||$a=='xps'||$a=='mht'||$a=='mhtml'||$a=='html'||$a=='htm'||$a=='txt'||$a=='xml'||$a=='odt') {
$b = '#197398';//skyblue
//krasniy #d60a0a
//green #03b903
} else if ($a=='jpg'||$a=='jpeg'||$a=='png'||$a=='gif'||$a=='ani'||$a=='bmp'||$a=='cal'||$a=='fax'||$a=='img'||$a=='jbg'||$a=='jbe'||$a=='mac'||$a=='pbm'||$a=='pcd'||$a=='pcx'||$a=='pct'||$a=='pgm'||$a=='ppm'||$a=='psd'||$a=='ras'||$a=='tga'||$a=='tiff'||$a=='wmf') {
$b = '#e63150';//pink
} else if ($a=='zip'||$a=='a'||$a=='ar'||$a=='cpio'||$a=='shar'||$a=='LBR'||$a=='iso'||$a=='lbr'||$a=='mar'||$a=='sbx'||$a=='tar'||$a=='bz2'||$a=='F'||$a=='?XF'||$a=='gz'||$a=='lz'||$a=='lzo'||$a=='rz'||$a=='sfark'||$a=='sz'||$a=='?Q?'||$a=='?Z?'||$a=='xz'||$a=='z'||$a=='Z'||$a=='??_'||$a=='7z'||$a=='s7z'||$a=='ace'||$a=='afa'||$a=='alz'||$a=='apk'||$a=='arc'||$a=='arj'||$a=='b1'||$a=='ba'||$a=='bh'||$a=='cab'||$a=='car'||$a=='cfs'||$a=='cpt'||$a=='dar'||$a=='dd'||$a=='dgc'||$a=='dmg'||$a=='ear'||$a=='gca'||$a=='ha'||$a=='hki'||$a=='ice'||$a=='jar'||$a=='kgb'||$a=='lzh'||$a=='lha'||$a=='lzx'||$a=='pak'||$a=='partimg'||$a=='paq6'||$a=='paq7'||$a=='paq8'||$a=='pea'||$a=='pim'||$a=='pit'||$a=='qda'||$a=='rar'||$a=='rk'||$a=='sda'||$a=='sea'||$a=='sen'||$a=='sfx'||$a=='shk'||$a=='sit'||$a=='sitx'||$a=='sqx'||$a=='tar.gz'||$a=='tgz'||$a=='tar.Z'||$a=='tar.bz2'||$a=='tbz2'||$a=='tar.lzma'||$a=='tlz'||$a=='uc'||$a=='uc0'||$a=='uc2'||$a=='ucn'||$a=='ur2'||$a=='ue2'||$a=='uca'||$a=='war'||$a=='wim'||$a=='xar'||$a=='xp3'||$a=='yz1'||$a=='zip'||$a=='zipx'||$a=='zoo'||$a=='zpaq'||$a=='zz'||$a=='ecc'||$a=='par'||$a=='par2'||$a=='rev') {
$b = '#7d0101';//green
} else if ($a=='pptx'||$a=='ppt'||$a=='potx'||$a=='ppsx'||$a=='pps'||$a=='pptm'||$a=='potm'||$a=='ppsm'||$a=='ppam'||$a=='ppa') {
$b = '#e4169a';//green	
} else if ($a=='xlsx'||$a=='xlsm'||$a=='xlsb'||$a=='xltx'||$a=='xltm'||$a=='xls'||$a=='xlt'||$a=='xlam'||$a=='xla'||$a=='xlw'||$a=='xlr') {
$b = '#047d04';//green	
}
}
return $b;
}
function docType($a) {
$b = '';
if ($GLOBALS['info'][40][1]==0) $b .= '<a href="/doc'.$a['own'].'_'.$a['id'].'" class="__14c" onmouseover="return go.doc.vw(this,event)" target="_blank" data-doct="'.htmlspecialchars(json_encode(array(0=>$a['own'],1=>$a['id']))).'" data-id="'.$a['own'].'-'.$a['id'].'" id="doc'.$a['own'].'_'.$a['id'].'"><div class="__14d0"><div class="__14j"></div><div class="__14d" style="'.($a['src']!=''?'background-image: url('.$a['src'][0].')':'background-color: '.$a['clr']).'">'.$a['tp'].'</div></div><div class="__14e">'.$a['nm'].'</div><div class="__14f">'.$a['tm'].'</div><div class="__14g">'.$a['sz'].'</div><div class="__14h __14h1 '.($a['lck']==0?'__14h0':'__14p').'" data-doc-l="'.$a['own'].'-'.$a['id'].'" data-id="'.$a['lck'].'" onclick="return go.doc.l(this,go.p(event))" onmouseover="go.audio.help1(this,\''.($a['lck']==0?'Разблокировать документ':'Заблокировать документ').'\',event)"></div><div class="__14i" onclick="return '.($a['dl']==0?'go.doc.viewOp':($a['dl']==1?'go.doc.viewDOp':'go.doc.viewFOp')).'('.htmlspecialchars(json_encode(array(0=>$a['own'],1=>$a['id']))).',this,go.p(event))"></div></a>'; else $b .= '<a class="__14k" href="/doc'.$a['own'].'_'.$a['id'].'" onmouseover="return go.doc.vw(this,event)" target="_blank" data-doct="'.htmlspecialchars(json_encode([$a['own'],$a['id']])).'" data-id="'.$a['own'].'-'.$a['id'].'" id="doc'.$a['own'].'_'.$a['id'].'"><div class="__14l" style="'.($a['src']!=''?'background-image: url('.$a['src'][0].')':'background-color: '.$a['clr']).'"><div class="__14q"></div>'.$a['tp'].'</div><div class="__14m">'.$a['nm'].'</div><div class="__14o">'.$a['tm'].'</div><div class="__14n">'.$a['sz'].'</div><div class="__14h '.($a['lck']==0?'__14h0':'__14p').'" data-doc-l="'.$a['own'].'-'.$a['id'].'" data-id="'.$a['lck'].'" onclick="return go.doc.l(this,go.p(event))"  onmouseover="return go.audio.help1(this,\''.($a['lck']==0?'Разблокировать документ':'Заблокировать документ').'\',event)"></div><div class="__15q" onclick="return '.($a['dl']==0?'go.doc.viewOp':($a['dl']==1?'go.doc.viewDOp':'go.doc.viewFOp')).'('.htmlspecialchars(json_encode(array(0=>$a['own'],1=>$a['id']))).',this,go.p(event))"></div></a>';
return $b;
}
function fileSz($a) {
if ($a==0) return '0Byte'; else $base = log($a) / log(1024);
$suffix = array("Byte", "KB", "MB", "GB", "TB");
$f_base = floor($base);
 return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
}
function docMenu($a) {
$b = alertBox::CNT();
return '<div class="__3n" style="margin-top: 0;"><div class="__13i" '.($a==0?'':($a==1?'style="margin-top: 40px;"':($a==2?'style="margin-top: 74px;"':($a==3?'style="margin-top: 108px;"':($a==4?'style="margin-top: 142px;"':($a==5?'style="margin-top: 176px;"':($a==6?'style="margin-top: 210px;"':($a==7?'style="margin-top: 244px;"':($a==8?'style="margin-top: 278px;"':'style="margin-top: 312px;"'))))))))).'></div><div class="__13h"><a href="/documents" class="no-link" onclick="return go.link(this,event)"><div class="__13g __13g0" '.($a==0?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Все документы<span class="__13q'.($b==0?' invisible':'').'" '.($a==0?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>'.$b.'</span></div></a><a href="/documents?section=text" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==1?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Текстовые</div></a><a href="/documents?section=animation" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==2?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Картинки</div></a><a href="/documents?section=folders" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==3?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Папки</div></a><a href="/documents?section=books" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==4?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Книги</div></a><a href="/documents?section=apps" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==5?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Приложения</div></a><a href="/documents?section=deleted" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==6?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Удаленные файлы</div></a><a href="/documents?section=copyright" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==7?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Авторское право</div></a><a href="/documents?section=terms" class="no-link" onclick="return go.link(this,event)"><div class="__13g" '.($a==8?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Правила</div></a><a href="/documents?section=settings" class="no-link" onclick="return go.link(this,event)"><div class="__13g __13g1" '.($a==9?'style="background-color: #f8fafb;color: rgb(31, 114, 148);"':'').'>Settings</div></a></div></div>';
}










function menu($a) {
if ($a==0) {
return 'About Us | Infalike';
} else if ($a==1) {
return 'Help Center | Infalike';
} else if ($a==2) {
return 'Careers | Infalike';
} else if ($a==3) {
return 'Terms | Infalike';
} else if ($a==4) {
return 'Privacy Policy | Infalike';
} else if ($a==5) {
return 'Cookies | Infalike';
} else if ($a==6) {
return 'Developers | Infalike';
} else if ($a==7) {
return 'Mobile | Infalike';
} else if ($a==8) {
return 'Mobile / Infalike';
} else if ($a==9) {
return 'Mobile / Infalike';
} else if ($a==10) {
return 'My settings';
} else if ($a==11) {
return 'Edit';
} else if ($a==12) {
return 'Documents';
}
}


function parseQ($a) {

$b = '';
if ($a!='') {
$c = explode('&',$a);
$d = sizeof($c);
$b = array();
for ($e=0;$e<$d;$e++) {
$b[] = explode('=',$c[$e]);
}
}
return $b;
}
function stickerList($a) {
$a = '';
$b = $GLOBALS['info'][39];
$c = sizeof($b);
for ($d=0;$d<30;$d++) {
$a .= '<div class="__11q" style="background-image: url('.$b[$d][1].')" onclick="return go.cv.sticker(this,event,[\''.$b[$d][0].'\',\''.$b[$d][1].'\',100,100])"></div>';
}
return $a;
}
function menuTool($a) {
$b = '';
if ($a==1) {
$b = 'style="margin-top: 90px;"';
} elseif ($a==2) {
$b = 'style="margin-top: 129px;"';
} elseif ($a==3) {
$b = 'style="margin-top: 168px;"';
} else if ($a==4) {
$b = 'style="margin-top: 207px;"';
} else if ($a==5) {
$b = 'style="margin-top: 246px;"';
} else if ($a==6) {
$b = 'style="margin-top: 285px;"';
} else if ($a==7) {
$b = 'style="margin-top: 324px;"';
} else if ($a==8) {
$b = 'style="margin-top: 363px;"';
} else if ($a==9) {
$b = 'style="margin-top: 402px;"';
}
return '<div class="___2q" onselectstart="return false"><div class="___2w" '.$b.'><div class="___2x"></div></div><div class="___2u"><input type="text" class="___2v" placeholder="'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][82].'"></div><a href="/about" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][39].'</div></a><a href="/help" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][40].'</div></a><a href="/jobs" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][41].'</div></a><a href="/terms" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][42].'</div></a><a href="/privacy" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][43].'</div></a><a href="/cookies" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][44].'</div></a><a href="/developers" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][45].'</div></a><a href="/mobile" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][46].'</div></a><a href="/advertise" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][47].'</div></a><a href="/media" class="no-link" onclick="return go.link(this,event)"><div class="___2t"><div class="___2y"></div>'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][81].'</div></a></div>';
}
function menuBody($a) {
$b = '';
if ($a['p']==0) {
$b = '<div class="___2z">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][83].'</div><div class="___3a">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][84].'</div><div class="___3b">ВКонтакте — это социальная сеть для быстрой и удобной коммуникации между людьми по всему миру. Задача ВКонтакте — в каждый отдельно взятый момент оставаться наиболее современным, быстрым и эстетичным способом общения в сети. Since the beginning, Kevin has focused on simplicity and inspiring creativity through solving problems with thoughtful product design. As a result, Instagram has become the home for visual storytelling for everyone from celebrities, newsrooms and brands, to teens, musicians and anyone with a creative passion.</div><div class="___3a">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][85].'</div><div class="___3b">Prior to founding Instagram, Kevin was part of the startup Odeo, which later became Twitter, and spent two years at Google working on products like Gmail and Google Reader. He graduated from Stanford University with a BS in Management Science & Engineering and serves on the boards of Walmart and KCRW.</div><div class="___3a">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][86].'</div><div class="___3b">Mike Krieger (@mikeyk) is the CTO and co-founder of Instagram, a global community that shares more than 95 million photos every day. As the head of engineering, Mike focuses on building products that bring out the creativity in all of us. A native of São Paulo, Brazil, Mike holds an MS in Symbolic Systems from Stanford University. Prior to founding Instagram, he worked at Meebo as a user experience designer and front-end engineer.
 
Mike Krieger (@mikeyk) is the CTO and co-founder of Instagram, a global community that shares more than 95 million photos every day. As the head of engineering, Mike focuses on building products that bring out the creativity in all of us. A native of São Paulo, Brazil, Mike holds an MS in Symbolic Systems from Stanford University. Prior to founding Instagram, he worked at Meebo as a user experience designer and front-end engineer.

Mike Krieger (@mikeyk) is the CTO and co-founder of Instagram, a global community that shares more than 95 million photos every day. As the head of engineering, Mike focuses on building products that bring out the creativity in all of us. A native of São Paulo, Brazil, Mike holds an MS in Symbolic Systems from Stanford University. Prior to founding Instagram, he worked at Meebo as a user experience designer and front-end engineer.</div>';
} else if ($a['p']==1) {
$c = $a['q'];
$e = topics(1);
$d = '<div class="___3i"><div class="___3j "><div class="___3l ___3m ___3k">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][87].'</div></div><div class="___3j"><a href="/help?section=faq" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][91].'</div></a></div><div class="___3j"><a href="/help?section=news" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][92].'</div></a></div><div class="___3j"><a href="/help?section=follow_questions" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][93].'</div></a></div></div>'.topics(0);
if (isset($c['section'])) {
if ($c['section'][0]=='faq') {
$d = '<div class="___3i"><div class="___3j "><a href="/help" class="no-link" onclick="return go.link(this,event)"><div class="___3l ___3m">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][87].'</div></a></div><div class="___3j"><div class="___3l ___3k">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][91].'</div></div><div class="___3j"><a href="/help?section=news" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][92].'</div></a></div><div class="___3j"><a href="/help?section=follow_questions" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][93].'</div></a></div></div><div class="___3c"><ul class="___3c"><li class="___3d"><a href="/topic-1" onclick="return go.link(this,event)" class="no-link"><span class="___3e">I can\'t log in</span></a></li><li class="___3d"><a href="/topic-2" onclick="return go.link(this,event)" class="no-link"><span class="___3e">How to block a user?</span></a></li><li class="___3d"><a href="/topic-3" onclick="return go.link(this,event)" class="no-link"><span class="___3e">My page has been blocked!</span></a></li><li class="___3d"><a href="/topic-4" onclick="return go.link(this,event)" class="no-link"><span class="___3e">How to delete my account?</span></a></li><li class="___3d"><a href="/topic-5" onclick="return go.link(this,event)" class="no-link"><span class="___3e">Where is the calendar of events and birthdays?</span></a></li><li class="___3d"><a href="/topic-6" onclick="return go.link(this,event)" class="no-link"><span class="___3e">How to register on the site Infalike?</span></a></li><li class="___3d"><a href="/topic-7" onclick="return go.link(this,event)" class="no-link"><span class="___3e">Information for law enforcement</span></a></li><li class="___3d"><a href="/topic-8" onclick="return go.link(this,event)" class="no-link"><span class="___3e">How can I advertise my business</span></a></li><li class="___3d"><a href="/topic-9" onclick="return go.link(this,event)" class="no-link"><span class="_
">How do I upload music?</span></a></li><li class="___3d"><a href="/topic-10" onclick="return go.link(this,event)" class="no-link"><span class="___3e">How to delete all my private messages?</span></a></li><li class="___3d"><a href="/topic-11" onclick="return go.link(this,event)" class="no-link"><span class="___3e">Cannot send an SMS to confirm the payment.</span></a></li></ul></div>';
} elseif ($c['section'][0]=='news') {
$d = '<div class="___3i"><div class="___3j "><a href="/help" class="no-link" onclick="return go.link(this,event)"><div class="___3l ___3m">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][87].'</div></a></div><div class="___3j"><a href="/help?section=faq" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][91].'</div></a></div><div class="___3j"><div class="___3l ___3k">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][92].'</div></div><div class="___3j"><a href="/help?section=follow_questions" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][93].'</div></a></div></div>';
} elseif ($c['section'][0]=='follow_questions') {
$d = '<div class="___3i"><div class="___3j "><a href="/help" class="no-link" onclick="return go.link(this,event)"><div class="___3l ___3m">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][87].'</div></a></div><div class="___3j"><a href="/help?section=faq" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][91].'</div></a></div><div class="___3j"><a href="/help?section=news" class="no-link" onclick="return go.link(this,event)"><div class="___3l">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][92].'</div></a></div><div class="___3j"><div class="___3l ___3k">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][93].'</div></div></div>';
}
}
$b = '<div class="___2z">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][88].'<div class="___3n">Last update 17 sep 2016</div></div>'.$d.'<div class="___3b">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][89].'</div><button class="___3f">'.$GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][90].'</button>';
} else if ($a['p']==2) {
$b = '<div class="___3g"><div class="___3h"><div class="___2z white">Career in Infalike</div><div class="___3b white">At Facebook, we build products to connect the world, and this means we need a team that understands and reflects a broad range of experience, thought, geography, age, background, gender, sexual orientation, language, culture and many other characteristics. To achieve our mission of making the world more open and connected, diversity is a must-have, not an option. One way we support and strengthen diversity at Facebook is through Employee Resource Groups, they are influential networks of people who share similar values of supporting and encouraging diversity.</div></div><img src="/sources/p-1.jpg" width="650" class="photo"></div><div class="___3b">Positions we are hiring for involve working in VK\'s main office in Saint Petersburg. It\'s located in a historical building by the Nevsky Prospect subway station.</div>';

} else if ($a['p']==3) {
$b = '<div class="___2z">Infalike Terms</div><div class="___3o">Настоящие Условия использования вступают в силу с 19 января 2013 года. Предыдущие Условия использования можно найти здесь. 

Посещая или используя веб-сайт Instagram, сервис Instagram или любые приложения (в том числе мобильные), предоставляемые Instagram (общее название «Сервис»), с помощью любого устройства, вы принимаете настоящие условия использования («Условия использования»). Сервис принадлежит или управляется Instagram, LLC («Instagram»). В настоящих Условиях использования описаны ваши законные права и обязанности. Если вы не принимаете настоящие Условия использования, не посещайте и не используйте Сервис.
</div><div class="___3a">Основные условаия</div><div class="___3b">1. Вы можете использовать Сервис, если вам не менее 13 лет.

2. Вы не можете публиковать с помощью Сервиса фото или иные материалы, содержащие насилие, полное или частичное обнажение, а также противозаконные, нарушающие чьи-либо права, агрессивные, порнографические или непристойные материалы.

3. Вы несете ответственность за любые действия, совершаемые через ваш аккаунт, и выражаете согласие на то, что не будете продавать, передавать, предоставлять по лицензии или уступать свой аккаунт, подписчиков, имя пользователя или иные права на ваш аккаунт. За исключением людей или компаний, имеющих специальное разрешение на создание аккаунта от имени своих работодателей или клиентов, Instagram запрещает создание аккаунта для другого человека, и вы выражаете согласие с тем, что создаете аккаунт Instagram только для себя. Вы также подтверждаете, что вся информация, предоставляемая или предоставленная вами Instagram при регистрации и во всех других случаях является верной, точной, актуальной и полной, и выражаете согласие на соответствующее обновление своей информации с тем, чтобы она оставалась верной и точной.

4. Вы обязуетесь не требовать, не собирать и не использовать информацию для входа на Сервис других пользователей Instagram.

5. Вы несете ответственность за сохранность и неразглашение своего пароля.

6. Вы обязуетесь не клеветать, не преследовать, не досаждать, не оскорблять, не угрожать, не выдавать себя за других физических или юридических лиц или не запугивать таких лиц, а также обязуетесь не публиковать личную или конфиденциальную информацию с помощью Сервиса, в том числе, без исключений, информацию о кредитных картах, номере социального страхования или другого национального удостоверения личности, личном номере телефона или личном эл. адресе, принадлежащих вам или другому человеку.

7. Вы не можете использовать Сервис в каких-либо незаконных или несанкционированных целях. Вы соглашаетесь на соблюдение всех законов, правил и норм (например, федеральных законов, законов штата, региональных и местных законов), применимых к использованию Сервиса и ваших Материалов (определение приводится ниже), включая, но не ограничиваясь авторскими правами.

8. Вы несете единоличную ответственность за свое поведение и любые данные, тексты, файлы, информацию, имена пользователя, изображения, графику, фото, профили, аудио- и видеозаписи, звуки, музыкальные произведения, авторские произведения, приложения, ссылки и иное содержимое или материалы (общий термин «Материалы»), которые вы загружаете, публикуете или демонстрируете на Сервисе или с помощью Сервиса.

9. Вы обязуетесь не изменять, не редактировать, не адаптировать или не переделывать Сервис и не изменять, не редактировать и не переделывать иной веб-сайт таким образом, чтобы он создавал обманчивое впечатление связи с Сервисом или Instagram.

10. Вы обязуетесь использовать личный интерфейс API Instagram только в рамках правил, установленных Instagram. Использование интерфейса API Instagram регламентируется отдельными условиями, приведенными здесь: http://instagram.com/about/legal/terms/api/ («Условия API»).

11. Вы не должны создавать или отправлять нежелательные эл. письма, комментарии, отметки «Нравится» или иные формы коммерческих или причиняющих беспокойство сообщений (также известных как «спам») любым пользователям Instagram.

12. Вы не должны использовать доменные имена или веб-адреса в вашем имени пользователя без предварительного письменного согласия Instagram.

13. Вы не должны вмешиваться или создавать помехи в работе Сервиса или серверов или сетей, связанных с Сервером, в том числе путем передачи сетевых червей, вирусов, шпионских и вредоносных программ или любых других разрушительных или вредоносных кодов. Вы не можете вносить материалы или коды или иным образом изменять или вмешиваться в отображение любой страницы Instagram в браузере или в устройстве пользователя.
Вы должны соблюдать Руководство сообщества Instagram, приведенное здесь: https://help.instagram.com/customer/portal/articles/262387-community-guidelines.
Вы не должны создавать аккаунты на Сервисе с помощью несанкционированных средств, включая, но не ограничиваясь использованием автоматизированных устройств, скриптов, ботов, веб-пауков, краулеров или скраперов.
Вы не должны предпринимать попытки ограничить другого пользователя в использовании Сервиса и не должны потворствовать или способствовать нарушениям настоящих Условий использования или любых других условий Instagram.
Нарушение настоящих Условий использования может привести к удалению вашего аккаунта Instagram на основе одностороннего решения Instagram. Вы выражаете понимание и согласие с тем, что Instagram не может и не несет ответственность за Материалы, опубликованные на Сервисе, и вы пользуетесь Сервисом на свой собственный риск. Если вы нарушаете букву или дух настоящих Условий использования или создаете другой риск или возможность для юридического преследования Instagram, мы вправе полностью или частично ограничить предоставление вам Сервиса.
Общие положения

Мы оставляем за собой право изменять или прекращать действие Сервиса или ограничивать ваш доступ к Сервису по любым причинам, без предупреждения, в любое время и не неся обязательств перед вами. Вы можете деактивировать свой аккаунт Instagram, войдя на Сервис и заполнив следующую форму: https://instagram.com/accounts/remove/request/. Если мы запрещаем вам доступ на Сервис или вы используете вышеприведенную форму для деактивации своего аккаунта, то вы утратите доступ ко всем своим фото, комментариям, отметкам «Нравится», друзьям и всем иным данным через свой аккаунт (например, пользователи не смогут переходить на вашу страницу по имени пользователя и просматривать ваши фото), но эти материалы и данные могут сохраняться и быть доступными через Сервис (например, если другие пользователи опубликовали у себя ваши Материалы).
После удаления аккаунта все лицензии и иные права, предоставленные вам настоящими Условиями использования, немедленно прекращают свое действие.
Мы оставляем за собой право время от времени в одностороннем порядке изменять настоящие Условия пользования («Обновленные Условия»). За исключением тех ситуаций, когда мы вносим изменения по юридическим или административным причинам, мы заранее в разумные сроки уведомим вас о дате вступления в силу Обновленных Условий. Вы соглашаетесь с тем, что мы можем уведомить вас об Обновленных Условиях, опубликовав их на Сервисе, и что использование вами Сервиса после вступления в силу Обновленных Условий (или иная ваша подобная деятельность, которую мы можем уточнить в разумных рамках) означает ваше согласие с Обновленными Условиями. Следовательно, мы рекомендуем вам ознакомиться с настоящими Условиями использования или любыми Обновленными Условиями до использования Сервиса. Обновленные Условия вступят в силу с момента их опубликования или с более поздней даты, которая может быть указана в Обновленных Условиях, и с этого момента будут применимы к использованию вами Сервиса. При решении спорных вопросов, возникших до момента вступления в силу Обновленных Условий, мы будем руководствоваться настоящими Условиями использования.
Мы оставляем за собой право отказать в доступе к Сервису любому человеку по любой причине в любое время.
Мы оставляем за собой право изъять любое имя пользователя по любой причине.
Мы можем, но не обязаны, удалять, редактировать, блокировать и (или) отслеживать Материалы или аккаунты, содержащие Материалы, которые в соответствии с нашим односторонним решением нарушают настоящие Условия использования.
Вы несете единоличную ответственность за ваше взаимодействие с другими пользователями Сервиса, как в сети Интернет, так и вне ее. Вы соглашаетесь с тем, что Instagram не несет ответственности за поведение любого пользователя. Instagram оставляет за собой право, но не обязан, отслеживать споры между вами и другими пользователями или вмешиваться в них. Полагайтесь на здравый смысл и рассудок при взаимодействии с другими людьми, в том числе при загрузке или публикации Материалов или любой другой личной или иной информации.
На нашем Сервисе или в сообщениях, полученных от Сервиса, могут содержаться ссылки на сторонние веб-сайты или функции. В изображениях или комментариях на Сервисе также могут содержаться ссылки на сторонние веб-сайты или функции. Сервис также включает в себя стороннее содержимое, которое мы не контролируем, не обслуживаем и не поддерживаем. Функциональность Сервиса также допускает взаимодействие между Сервисом и сторонними веб-сайтами или функциями, в том числе с приложениями, связывающими Сервис или ваш профиль на Сервисе со сторонними веб-сайтами или функциями. Например, Сервис может включать в себя функцию, позволяющую вам передавать Материалы с Сервиса или ваши Материалы третьей стороне, и они могут быть опубликованы в общем доступе на этом стороннем сервисе или в стороннем приложении. Для использования этой функции вам, как правило, необходимо войти в ваш аккаунт на этом стороннем сервисе, и вы делаете это на свой собственный риск. Instagram не контролирует какие-либо сторонние сервисы или их материалы. Вы выражаете понимание и согласие с тем, что Instagram не несет никакой ответственности за любые подобные сторонние сервисы или функции. ВАШЕ ВЗАИМОДЕЙСТВИЕ И ДЕЛОВЫЕ ОТНОШЕНИЯ С ТРЕТЬИМИ ЛИЦАМИ, НАЙДЕННЫМИ С ПОМОЩЬЮ СЕРВИСА, КАСАЮТСЯ ТОЛЬКО ВАС И ДАННОГО ТРЕТЬЕГО ЛИЦА. Вы можете на свой собственный риск и исключительно по своему решению использовать приложения, связывающие Сервис или ваш профиль на Сервисе со сторонним сервисом («Приложением»), и такое Приложение может взаимодействовать с вашим профилем на Сервисе, устанавливать с ним связь или собирать и (или) передавать информацию из него и в него. Используя подобные Приложения, вы принимаете следующие положения: (i) если вы используете Приложение для передачи информации, вы соглашаетесь на передачу информации о вашем профиле на Сервисе; (ii) использование вами Приложения может повлечь за собой публичное раскрытие личной информации и (или) установление связи между этой информацией и вами, даже если она не была предоставлена самим Instagram; и (iii) вы используете Приложение добровольно и на свой собственный риск и соглашаетесь с тем, что Стороны Instagram (определение см. ниже) не несут ответственности за деятельность, связанную с данным Приложением.
Вы соглашаетесь с тем, что несете ответственность за все расходы, которые может повлечь за собой использование Сервиса.
Мы запрещаем использование краулеров и скраперов, кэширование или иные способы получения доступа к любым материалам Сервиса с помощью автоматизированных инструментов, включая, среди прочего, профили пользователей и фото (за исключением результатов использования протоколов стандартных поисковых систем или технологий, применяемых этими поисковыми системами с согласия Instagram).</div><div class="___3a">Права</div><div class="___3b">Instagram не требует прав на любые Материалы, публикуемые вами на Сервисе или с его помощью. Но вы предоставляете Instagram неисключительное, полностью оплаченное и не подразумевающее выплату авторского гонорара, допускающее передачу и сублицензирование, действительное во всех странах разрешение на использование Материалов, опубликованных вами на Сервисе или с его помощью, в соответствии с Политикой конфиденциальности Сервиса, доступной по ссылке http://instagram.com/legal/privacy/, включая, но не ограничиваясь разделами 3 («Передача вашей информации»), 4 («Как мы храним вашу информацию»), и 5 («Персональные настройки, касающиеся вашей информации»). Вы можете решать, кому будут доступны ваши Материалы и действия, в том числе ваши фото, как описано в Политике конфиденциальности.
Часть доходов Сервиса поступает от рекламных объявлений, и на Сервисе могут демонстрироваться рекламные объявления и акции. Вы соглашаетесь с тем, что Instagram может размещать подобные рекламные объявления и акции на Сервисе или в ваших Материалах, в их описании или в связи с ними. Способ, тон и масштаб демонстрации подобных рекламных объявлений и акций может меняться без уведомления.
Вы признаете, что мы не всегда можем распознать платные услуги, рекламные материалы или коммерческое взаимодействие.
Вы подтверждаете и гарантируете, что: (i) обладаете Материалами, опубликованными вами на Сервисе или с его помощью, или иными способами обладаете правом передавать права и лицензии, установленные настоящими Условиями использования; (ii) публикация и использование ваших Материалов на Сервисе или с его помощью не нарушает и не присваивает права любой третьей стороны, включая, помимо прочего, право на неприкосновенность личной жизни, право на публичное использование, авторские права, товарные знаки и (или) иные права на интеллектуальную собственность; (iii) вы соглашаетесь на выплату всех авторских гонораров, вознаграждений и любых других сумм, подлежащих выплате в результате публикации вами Материалов на Сервисе или с его помощью; и (iv) у вас есть законное право и правоспособность принять настоящие Условия использования в пределах вашей юрисдикции.
На Сервисе содержатся материалы, которыми Instagram владеет или на которые имеет лицензию («Материалы Instagram»). Материалы Instagram защищены авторским правом, правом на товарные знаки, патентом, коммерческой тайной и иными законами, и в отношениях между вами и Instagram последний обладает и сохраняет все права на Материалы Instagram и Сервис. Вы не можете удалять, изменять или скрывать любую отметку об авторском праве, товарный знак, знак обслуживания или иные отметки о правообладании, сопровождающие или встроенные в Материалы Instagram, и вы не можете воспроизводить, изменять, адаптировать, создавать свои материалы на основе, исполнять, демонстрировать, публиковать, распространять, передавать, транслировать, продавать, давать разрешение или иными способами использовать в своих интересах Материалы Instagram.
Название и логотип Instagram являются товарными знаками Instagram и не могут копироваться, имитироваться или использоваться, частично или полностью, без предварительного письменного разрешения от Instagram, кроме случаев, оговоренных в руководстве по бренду, доступном по ссылке: https://www.instagram-brand.com/. Кроме того, все заголовки страниц, специальная графика, значки кнопок и шрифты являются знаками обслуживания, товарными знаками и (или) фирменным стилем товара Instagram и не могут копироваться, имитироваться или использоваться, частично или полностью, без предварительного письменного разрешения от Instagram.
Хотя Instagram стремится к максимальной доступности Сервиса, в некоторых случаях работа Сервиса может быть приостановлена, включая, но не ограничиваясь плановым техническим обслуживанием или обновлением, экстренным ремонтом или сбоями в работе телекоммуникационных сетей и (или) оборудования. Кроме того, Instagram оставляет за собой право удалять любые Материалы с Сервиса по любой причине без предварительного уведомления. Материалы, удаленные с Сервиса, могут по-прежнему храниться Instagram в целях, включающих, но не ограничивающихся соблюдением некоторых юридических обязательств, но к этим Материалам нельзя будет получить доступ без действительного решения суда. Поэтому Instagram рекомендует вам сохранять копию ваших Материалов. Иными словами, Instagram не является сервисом резервного хранения данных, и вы соглашаетесь с тем, что не будете полагаться на Сервис как на способ хранения или резервного копирования Материалов. Instagram не несет перед вами ответственность за любые изменения, приостановление или прекращение работы Сервиса или за утрату любых Материалов. Вы также признаете, что Интернет может быть подвержен нарушениям безопасности, и загрузка Материалов или другой информации может не быть безопасной.
Вы соглашаетесь с тем, что Instagram не несет ответственность за Материалы, опубликованные на Сервисе, и не поддерживает их. Instagram не обязан предварительно просматривать, отслеживать, редактировать или удалять любые Материалы. Если ваши Материалы нарушают настоящие Условия использования, вы можете понести юридическую ответственность за размещение таких Материалов.
За исключением случаев, оговоренных в Политике конфиденциальности Сервиса, приведенной по ссылке http://instagram.com/legal/privacy/, в отношениях между вами и Instagram любые Материалы не являются конфиденциальными и имущественными, и мы не несем ответственности за любое использование или обнародование Материалов. Вы признаете и соглашаетесь с тем, что ваши отношения с Instagram не являются конфиденциальными и основанными на доверии и не относятся к иному типу особых отношений, и ваше решение разместить любые Материалы не ставит Instagram в позицию, которая чем-либо отличается от позиции представителей широкой публики, в том числе в отношении ваших Материалов. Instagram не несет никаких обязательств в отношении конфиденциальности ваших Материалов и никакой ответственности за использование или обнародование любых загружаемых вами материалов.
В соответствии со своей политикой Instagram не принимает и не рассматривает материалы, информацию, идеи, рекомендации или иные материалы, кроме тех, которые были отдельно запрошены нами и к которым могут применяться отдельные условия, правила и требования. Это необходимо, чтобы избежать любых недоразумений в случае, если ваши идеи схожи с уже разработанными или разрабатываемыми нами независимо от вас. Соответственно, Instagram не принимает незатребованные материалы или идеи и не несет ответственность за любые переданные таким образом материалы или идеи. Если, несмотря на наши правила, вы решили отправить нам материалы, информацию, идеи, рекомендации или иные материалы, вы соглашаетесь с тем, что Instagram может использовать любые подобные материалы, информацию, идеи, рекомендации или иные материалы в любых целях, включая, но не ограничиваясь разработкой и продвижением продуктов и услуг, не неся никакой ответственности перед вами и не производя никаких выплат в вашу пользу.</div><div class="___3a">Нарушении авторских и других прав на интеллектуальную собственность</div><div class="___3b">Мы относимся с уважением к правам других лиц и ожидаем этого от вас.
Мы предоставляем вам инструменты для помощи в защите ваших прав на интеллектуальную собственность. Чтобы подробнее узнать о том, как сообщить о нарушении прав на интеллектуальную собственность, обратитесь к следующему разделу: https://help.instagram.com/customer/portal/articles/270501.
В случае неоднократного нарушения прав на интеллектуальную собственность других лиц мы заблокируем ваш аккаунт, если посчитаем это целесообразным.</div><div class="___3a">Ограничение</div><div class="___3b">НИ ПРИ КАКИХ ОБСТОЯТЕЛЬСТВАХ СТОРОНЫ INSTAGRAM НЕ НЕСУТ ОТВЕТСТВЕННОСТЬ ЗА ЛЮБЫЕ УТРАТЫ ИЛИ ПОВРЕЖДЕНИЯ ЛЮБОГО РОДА (ВКЛЮЧАЯ, НО НЕ ОГРАНИЧИВАЯСЬ ЛЮБЫМИ ПРЯМЫМИ, КОСВЕННЫМИ, ЭКОНОМИЧЕСКИМИ, КАРАТЕЛЬНЫМИ, ОСОБЫМИ, СВЯЗАННЫМИ С ПРИМЕНЕНИЕМ НАКАЗАНИЯ, СЛУЧАЙНЫМИ ИЛИ ПОБОЧНЫМИ УТРАТАМИ ИЛИ ПОВРЕЖДЕНИЯМИ), ПРЯМО ИЛИ КОСВЕННО СВЯЗАННЫЕ С: (A) СЕРВИСОМ; (Б) МАТЕРИАЛАМИ INSTAGRAM; (В) МАТЕРИАЛАМИ ПОЛЬЗОВАТЕЛЯ; (Г) ИСПОЛЬЗОВАНИЕМ ИЛИ НЕВОЗМОЖНОСТЬЮ ИСПОЛЬЗОВАНИЯ ВАМИ СЕРВИСА ИЛИ ФУНКЦИОНИРОВАНИЕМ СЕРВИСА; (Д) ЛЮБЫМИ ДЕЙСТВИЯМИ, ПРЕДПРИНИМАЕМЫМИ В СВЯЗИ С РАССЛЕДОВАНИЕМ, ПРОВОДИМЫМ СТОРОНАМИ INSTAGRAM ИЛИ ПРАВООХРАНИТЕЛЬНЫМИ ОРГАНАМИ В ОТНОШЕНИИ ИСПОЛЬЗОВАНИЯ СЕРВИСА ВАМИ ИЛИ ДРУГИМИ СТОРОНАМИ; (Е) ЛЮБЫМИ ДЕЙСТВИЯМИ, ПРЕДПРИНИМАЕМЫМИ В СВЯЗИ С ВЛАДЕЛЬЦАМИ АВТОРСКИХ ПРАВ ИЛИ ДРУГОЙ ИНТЕЛЛЕКТУАЛЬНОЙ СОБСТВЕННОСТИ; (Ж) ЛЮБЫМИ ОШИБКАМИ ИЛИ УПУЩЕНИЯМИ В РАБОТЕ СЕРВИСА; ИЛИ (З) ЛЮБЫМ УЩЕРБОМ, НАНЕСЕННЫМ КОМПЬЮТЕРУ, МОБИЛЬНОМУ УСТРОЙСТВУ ИЛИ ИНОМУ УСТРОЙСТВУ ИЛИ ТЕХНОЛОГИИ ЛЮБОГО ПОЛЬЗОВАТЕЛЯ, ВКЛЮЧАЯ, НО НЕ ОГРАНИЧИВАЯСЬ УЩЕРБОМ, ВЫЗВАННЫМ ЛЮБЫМИ НАРУШЕНИЯМИ БЕЗОПАСНОСТИ ВСЛЕДСТВИЕ ЛЮБОГО ВИРУСА, СБОЯ, ПРЕСТУПНОГО ИСПОЛЬЗОВАНИЯ, МОШЕННИЧЕСТВА, ОШИБКИ, УПУЩЕНИЯ, РАЗЪЕДИНЕНИЯ, ДЕФЕКТА, ЗАДЕРЖКИ РАБОТЫ ИЛИ ПЕРЕДАЧИ, НАРУШЕНИЯ РАБОТЫ КОМПЬЮТЕРНОЙ ЛИНИИ ИЛИ СЕТИ ИЛИ ЛЮБОГО ДРУГОГО ТЕХНИЧЕСКОГО ИЛИ ИНОГО НАРУШЕНИЯ РАБОТОСПОСОБНОСТИ, ВКЛЮЧАЯ, НО НЕ ОГРАНИЧИВАЯСЬ УЩЕРБОМ В РЕЗУЛЬТАТЕ УПУЩЕННОЙ ВЫГОДЫ, ПОТЕРИ ДЕЛОВОЙ РЕПУТАЦИИ, УТРАТЫ ДАННЫХ, ПРИОСТАНОВЛЕНИЯ РАБОТЫ, НЕТОЧНОСТИ РЕЗУЛЬТАТОВ ИЛИ КОМПЬЮТЕРНОГО СБОЯ ИЛИ НЕИСПРАВНОСТИ, ДАЖЕ ЕСЛИ ЭТОТ УЩЕРБ БЫЛ ОЖИДАЕМ ИЛИ ДАЖЕ ЕСЛИ СТОРОНЫ INSTAGRAM БЫЛИ ПРЕДУПРЕЖДЕНЫ ИЛИ ДОЛЖНЫ БЫЛИ ЗНАТЬ О ВОЗМОЖНОСТИ ПОДОБНОГО УЩЕРБА, В СИТУАЦИИ ДЕЙСТВИЯ СОГЛАШЕНИЯ, НЕБРЕЖНОСТИ, СТРОГИХ ОБЯЗАТЕЛЬСТВ ИЛИ ПРАВОНАРУШЕНИЯ (ВКЛЮЧАЯ, НО НЕ ОГРАНИЧИВАЯСЬ ПРИЧИНЕНИЕМ УЩЕРБА ЧАСТИЧНО ИЛИ ПОЛНОСТЬЮ В РЕЗУЛЬТАТЕ НЕБРЕЖНОСТИ, ФОРС-МАЖОРНЫХ ОБСТОЯТЕЛЬСТВ, СБОЯ В РАБОТЕ ТЕЛЕКОММУНИКАЦИЙ ИЛИ КРАЖИ ИЛИ РАЗРУШЕНИЯ СЕРВИСА). НИ ПРИ КАКИХ ОБСТОЯТЕЛЬСТВАХ СТОРОНЫ INSTAGRAM НЕ НЕСУТ ОТВЕТСТВЕННОСТИ ПЕРЕД ВАМИ ИЛИ ЛЮБЫМИ ДРУГИМИ ЛИЦАМИ ЗА УЩЕРБ ИЛИ ТЕЛЕСНЫЕ И ИНЫЕ ПОВРЕЖДЕНИЯ, ВКЛЮЧАЯ, НО НЕ ОГРАНИЧИВАЯСЬ СМЕРТЬЮ ИЛИ ЛИЧНЫМ ВРЕДОМ. ЗАКОНЫ НЕКОТОРЫХ СТРАН НЕ ДОПУСКАЮТ ИСКЛЮЧЕНИЕ ИЛИ ОГРАНИЧЕНИЕ СЛУЧАЙНОГО ИЛИ ПОБОЧНОГО УЩЕРБА, ПОЭТОМУ ВЫШЕПЕРЕЧИСЛЕННЫЕ ОГРАНИЧЕНИЯ ИЛИ ИСКЛЮЧЕНИЯ МОГУТ НЕ РАСПРОСТРАНЯТЬСЯ НА ВАС. НИ ПРИ КАКИХ ОБСТОЯТЕЛЬСТВАХ КОМПЕНСАЦИЯ, ВЫПЛАЧИВАЕМАЯ СТОРОНАМИ INSTAGRAM, ЗА ВСЮ СОВОКУПНОСТЬ УЩЕРБА, УТРАТ ИЛИ ПРИЧИН ИЛИ ДЕЙСТВИЙ НЕ МОЖЕТ ПРЕВЫШАТЬ СТО ДОЛЛАРОВ США (100,00 долл. США). 

ВЫ СОГЛАШАЕТЕСЬ С ТЕМ, ЧТО В СЛУЧАЕ ПРИЧИНЕНИЯ ЛЮБОГО УЩЕРБА, УТРАТ ИЛИ ТРАВМ В РЕЗУЛЬТАТЕ ДЕЙСТВИЙ ИЛИ УПУЩЕНИЙ СО СТОРОНЫ INSTAGRAM УЩЕРБ, ЕСЛИ ТАКОВОЙ ИМЕЕТСЯ, ПРИЧИНЕННЫЙ ВАМ, НЕ ЯВЛЯЕТСЯ НЕПОПРАВИМЫМ ИЛИ ДОСТАТОЧНЫМ ДЛЯ ПОЛУЧЕНИЯ СУДЕБНОГО ЗАПРЕТА, ПРЕПЯТСТВУЮЩЕГО ЛЮБОЙ ЭКСПЛУАТАЦИИ ЛЮБОГО ВЕБ-САЙТА, СЕРВИСА, СОБСТВЕННОСТИ, ПРОДУКТА ИЛИ ИНОГО СОДЕРЖИМОГО, КОТОРЫЕ ПРИНАДЛЕЖАТ ИЛИ УПРАВЛЯЮТСЯ СТОРОНАМИ INSTAGRAM, И ВЫ НЕ СМОЖЕТЕ ПОЛУЧИТЬ ПРАВО ЗАПРЕТИТЬ ИЛИ ОГРАНИЧИТЬ РАЗВИТИЕ, ПРОИЗВОДСТВО, РАСПРОСТРАНЕНИЕ, РЕКЛАМИРОВАНИЕ, ДЕМОНСТРАЦИЮ ИЛИ ЭКСПЛУАТАЦИЮ ЛЮБОГО ВЕБ-САЙТА, СЕРВИСА, СОБСТВЕННОСТИ, ПРОДУКТА ИЛИ ДРУГИХ МАТЕРИАЛОВ, ПРИНАДЛЕЖАЩИХ СТОРОНАМИ INSTAGRAM ИЛИ УПРАВЛЯЕМЫХ ИМИ. 

ПОСЕЩАЯ СЕРВИС, ВЫ ОСОЗНАЕТЕ, ЧТО МОЖЕТЕ ОТКАЗЫВАТЬСЯ ОТ ПРАВ В ОТНОШЕНИИ ПРЕТЕНЗИЙ, НЕИЗВЕСТНЫХ ИЛИ НЕПРЕДВИДЕННЫХ В НАСТОЯЩЕЕ ВРЕМЯ, И В СООТВЕТСТВИИ С ЭТИМ ОТКАЗОМ, ВЫ ПРИЗНАЕТЕ, ЧТО ПРОЧИТАЛИ И ПОНЯЛИ УСЛОВИЯ И НАСТОЯЩИМ ПРЯМО ВЫРАЖАЕТЕ ОТКАЗ ОТ ПРЕИМУЩЕСТВ, ПРЕДОСТАВЛЯЕМЫХ РАЗДЕЛОМ 1542 ГРАЖДАНСКОГО КОДЕКСА КАЛИФОРНИИ И ЛЮБОГО АНАЛОГИЧНОГО ЗАКОНА ЛЮБОГО ГОСУДАРСТВА ИЛИ ТЕРРИТОРИИ, КОТОРЫЙ ОГОВАРИВАЕТ СЛЕДУЮЩЕЕ: «ОБЩИЙ ОТКАЗ ОТ ПРАВ НЕ РАСПРОСТРАНЯЕТСЯ НА ПРЕТЕНЗИИ, О СУЩЕСТВОВАНИИ КОТОРЫХ В ЕГО ПОЛЬЗУ КРЕДИТОР НЕ ЗНАЕТ И НЕ ПОДОЗРЕВАЕТ В МОМЕНТ ОТКАЗА, И КОТОРЫЕ, БУДУЧИ ИЗВЕСТНЫМИ ЕМУ, ДОЛЖНЫ БЫЛИ СУЩЕСТВЕННО ПОВЛИЯТЬ НА ЕГО СОГЛАШЕНИЕ С ДЕБИТОРОМ». 

INSTAGRAM НЕ НЕСЕТ ОТВЕТСТВЕННОСТЬ ЗА ДЕЙСТВИЯ, МАТЕРИАЛЫ, ИНФОРМАЦИЮ ИЛИ ДАННЫЕ ТРЕТЬИХ ЛИЦ, И ВЫ ОСВОБОЖДАЕТЕ НАС, НАШИХ ДИРЕКТОРОВ, ДОЛЖНОСТНЫХ ЛИЦ, РАБОТНИКОВ И АГЕНТОВ ОТ ЛЮБОЙ ОТВЕТСТВЕННОСТИ ЗА ЛЮБОЙ УЩЕРБ, ЯВНЫЙ И СКРЫТЫЙ, ВОЗНИКАЮЩИЙ В РЕЗУЛЬТАТЕ ЛЮБЫХ ВАШИХ ПРЕТЕНЗИЙ ПРОТИВ ЛЮБЫХ ТРЕТЬИХ ЛИЦ ИЛИ СВЯЗАННЫЙ С ЛЮБЫМИ ВАШИМИ ПРЕТЕНЗИЯМИ ПРОТИВ НИХ.</div><div class="___3a">Территориальные ограничения</div><div class="___3b">Информация, предоставляемая на Сервисе, не предназначена для передачи или использования любым физическим или юридическим лицом, находящимся в пределах любой юрисдикции или страны, где подобная передача или использование противоречат законам и нормам или потребуют от Instagram любой формы регистрации на территории данной страны или в пределах этой юрисдикции. Мы оставляем за собой право ограничивать доступ к Сервису, полностью или частично, любому лицу, территории или юрисдикции в любое время и в одностороннем порядке, а также ограничивать количество любых предоставляемых Instagram материалов, программ, продуктов, функций или иных услуг. 

Программное обеспечение, связанное с Сервисом или доступное на Сервисе, может регулироваться экспортными ограничениями США. Таким образом, никакое программное обеспечение Сервиса не может быть загружено, экспортировано или реэкспортировано: (a) в любую страну, для которой в США существует запрет на экспорт товаров, или резидентом этой страны; или (b) любым членом списка нежелательных лиц, составленного Министерством финансов США, или упомянутым в таблице отказа в заказах, составленной Министерством торговли США. Загружая любое программное обеспечение, связанное с Сервисом, вы подтверждаете и гарантируете, что не располагаетесь на территории, не находитесь под юрисдикцией и не являетесь резидентом такой страны и не входите в такие списки. 

Дата вступления в силу настоящих Условий использования: 19 января 2013 г. Исходным языком настоящих Условий использования признается английский язык (США). В случае возникновения противоречий между переведенным вариантом настоящих Условий использования и их вариантом на английском языке, следует руководствоваться английским вариантом.</div>';
} else if ($a['p']==4) {
$b = '<div class="___2z">Privacy policy</div><div class="___3o">Наши Сервисы позволяют мгновенно соединять людей с тем, что для них наиболее важно. Например, каждый зарегистрированный пользователь Твиттера может отправлять Твит, т.е. сообщение длиной не более 140 символов, которое по умолчанию становится открытым широкой публике и может включать в себя дополнительный контент, например, фотографии, видеофайлы или ссылки на сторонние веб-сайты.</div><div class="___3a">Политика конфиденциальности Твиттера</div><div class="___3b">В настоящей Политике конфиденциальности описывается, как и когда мы собираем, используем и публикуем вашу информацию, собираемую при помощи наших веб-сайтов, СМС-сообщений, интерфейсов прикладных программ, уведомлений электронной почты, приложений, экранных кнопок, виджетов, рекламных объявлений, коммерческих сервисов и наших прочих оговоренных сервисов, связанных с настоящей Политикой (совместно именуются «Сервисы»), а также информацию от наших партнеров и прочих третьих сторон. Например, вы отправляете нам информацию, когда используете наши Сервисы в сети Интернет, через СМС, или из приложений, таких как Твиттер для Mac, Твиттер для Android или TweetDeck. Пользуясь любым из наших Сервисов, вы даете согласие на сбор, передачу, хранение, раскрытие и использование вашей информации согласно условиям, изложенным в настоящей Политике конфиденциальности. Сюда относится любая информация, которую вы решите предоставить и которая считается конфиденциальной в соответствии с применимым законодательством.

Когда в настоящей Политике упоминаются понятия «мы» или «нас», они обозначают компанию, контролирующую вашу информацию в соответствии с настоящей Политикой. Если вы живете в США, вашу информацию контролирует компания Twitter, Inc., расположенная по адресу: 1355 Market Street, Suite 900, Сан-Франциско, Калифорния, индекс 94103, США. Если вы живете за пределами США, то ответственность за контроль вашей информации несет компания Twitter International Company (Ирландия), имеющей юридический адрес: The Academy, 42 Pearse Street, Дублин 2, Ирландия. Несмотря на это, вы единолично управляете и несете ответственность за содержание своих Твитов и прочий контент, опубликованный с использованием Сервисов, как оговорено в Условиях предоставления Сервисов и Правилах Твиттера.</div>';
} else if ($a['p']==5) {
$b = '<div class="___2z">Cookies and Storage</div><div class="___3o">Настоящие Условия использования вступают в силу с 19 января 2013 года. Предыдущие Условия использования можно найти здесь. 

Посещая или используя веб-сайт Instagram, сервис Instagram или любые приложения (в том числе мобильные), предоставляемые Instagram (общее название «Сервис»), с помощью любого устройства, вы принимаете настоящие условия использования («Условия использования»). Сервис принадлежит или управляется Instagram, LLC («Instagram»). В настоящих Условиях использования описаны ваши законные права и обязанности. Если вы не принимаете настоящие Условия использования, не посещайте и не используйте Сервис.
</div><div class="___3p"><div class="___3u"><div class="___3t" onclick="return dom.vw(this)"><div class="___3q"></div><div class="___3r">Что такое файлы cookie, пиксели и локальное хранилище?</div></div><div class="___3s">Например, с помощью cookie мы запоминаем предпочитаемый вами язык или страну, в которой вы находитесь. Так мы можем показывать контент на нужном языке, не спрашивая вас об этом каждый раз, когда вы посещаете Твиттер. Мы также можем адаптировать контент в зависимости от страны, например показывать актуальные для страны темы или закрывать доступ к определенному контенту на основе местных законов. Дополнительные сведения об актуальных темах и контенте, к которому закрыт доступ в определенной стране.</div></div><div class="___3u"><div class="___3t" onclick="return dom.vw(this)"><div class="___3q"></div><div class="___3r">Почему Твиттер использует эти технологии?</div></div><div class="___3s">Например, с помощью cookie мы запоминаем предпочитаемый вами язык или страну, в которой вы находитесь. Так мы можем показывать контент на нужном языке, не спрашивая вас об этом каждый раз, когда вы посещаете Твиттер. Мы также можем адаптировать контент в зависимости от страны, например показывать актуальные для страны темы или закрывать доступ к определенному контенту на основе местных законов. Дополнительные сведения об актуальных темах и контенте, к которому закрыт доступ в определенной стране.</div></div><div class="___3u"><div class="___3t" onclick="return dom.vw(this)"><div class="___3q"></div><div class="___3r">Почему Твиттер использует эти технологии?</div></div><div class="___3s">Например, с помощью cookie мы запоминаем предпочитаемый вами язык или страну, в которой вы находитесь. Так мы можем показывать контент на нужном языке, не спрашивая вас об этом каждый раз, когда вы посещаете Твиттер. Мы также можем адаптировать контент в зависимости от страны, например показывать актуальные для страны темы или закрывать доступ к определенному контенту на основе местных законов. Дополнительные сведения об актуальных темах и контенте, к которому закрыт доступ в определенной стране.</div></div></div><div class="___3b">Positions we are hiring for involve working in VK\'s main office in Saint Petersburg. It\'s located in a historical building by the Nevsky Prospect subway station.</div>';
} else if ($a['p']==6) {
$b = '<div class="___2z">Infalike for Developers</div><div class="___3v"><div class="___3w"></div><div class="___3w"></div><div class="___3w"></div><div class="___3w"></div><div class="___3w"></div><div class="___3w"></div></div>';
} else if ($a['p']==7) {
$b = '<div class="___2z">Infalike for Mobile Phones</div><div class="___3b">Stay online with your friends anytime and anywhere.</div>';
} else if ($a['p']==8) {
$b = 'advertise';
} else if ($a['p']==9) {
$b = 'Media';
}
return $b;
}
function topics($a = 0) {
$b = '';
if ($a==0) {
$c = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][7]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][2]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][3]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][4]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][5]."` FROM `".$GLOBALS['info'][2][4][0]."`,`".$GLOBALS['info'][2][5][0]."` WHERE `".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][6]."`='".$GLOBALS['info'][1]['lang']."' AND `".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][7]."`=`".$GLOBALS['info'][2][5][0]."`.`".$GLOBALS['info'][2][5][2]."` AND `".$GLOBALS['info'][2][5][0]."`.`".$GLOBALS['info'][2][5][3]."`='0' ORDER BY `".$GLOBALS['info'][2][5][0]."`.`".$GLOBALS['info'][2][5][1]."`");
$d = $GLOBALS['DB']->n($c);
if ($d==0) {
$c = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][7]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][2]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][3]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][4]."`,`".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][5]."` FROM `".$GLOBALS['info'][2][4][0]."`,`".$GLOBALS['info'][2][5][0]."` WHERE `".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][6]."`='0' AND `".$GLOBALS['info'][2][4][0]."`.`".$GLOBALS['info'][2][4][7]."`=`".$GLOBALS['info'][2][5][0]."`.`".$GLOBALS['info'][2][5][2]."` AND `".$GLOBALS['info'][2][5][0]."`.`".$GLOBALS['info'][2][5][3]."`='0' ORDER BY `".$GLOBALS['info'][2][5][0]."`.`".$GLOBALS['info'][2][5][1]."`");
$d = $GLOBALS['DB']->n($c);
}
$b = '<div class="___3c">';
for ($e=0;$e<$d;$e++) {
$f = $GLOBALS['DB']->f($c);
$b .= '<a href="/topic-'.$f[0].'" onclick="return go.link(this,event)" class="no-link"><div class="___3d"><span class="___3e">'.$f[1].'</span></div></a>';
}
$b .= '</div>';
} else if ($a==1) {

} else if ($a==2) {

} else if ($a==3) {

}
return $b;
}
function docSett() {
$a = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][34][2]."`,`".$GLOBALS['info'][2][34][3]."`,`".$GLOBALS['info'][2][34][4]."` FROM `".$GLOBALS['info'][2][34][0]."` WHERE `".$GLOBALS['info'][2][34][1]."`='".$_SESSION['id']."' LIMIT 1");
if ($GLOBALS['DB']->n($a)!=0) {
$b = $GLOBALS['DB']->f($a);
$GLOBALS['info'][40][0] = $b[1];
$GLOBALS['info'][40][1] = $b[0];
$GLOBALS['info'][40][2] = $b[2];
}
}
function follCount($a) {
//$info[2][54] = ['_follow','id','own','fl','ss','tm','ct'];//follow
$b = [$GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][54][1]."`) FROM `".$GLOBALS['info'][2][54][0]."` WHERE `".$GLOBALS['info'][2][54][3]."`='".$a."' AND `".$GLOBALS['info'][2][54][4]."`='0'")];
return $b[0];
}
function info($a) {
//$info[2][2] = array(0=>'_login',1=>'id',2=>'alias',3=>'st');//login
//$info[2][17] = array(0=>'_info',1=>'id',2=>'nm',3=>'ln',4=>'mn',5=>'s',6=>'bd_d',7=>'bd_m',8=>'bd_y',9=>'bd_s');//info
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][0]."`.`".$GLOBALS['info'][2][2][2]."`,`".$GLOBALS['info'][2][2][0]."`.`".$GLOBALS['info'][2][2][3]."`,`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][2]."`,`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][3]."`,`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][4]."`,`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][5]."` FROM `".$GLOBALS['info'][2][2][0]."`,`".$GLOBALS['info'][2][17][0]."` WHERE `".$GLOBALS['info'][2][2][0]."`.`".$GLOBALS['info'][2][2][1]."`=`".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][1]."` AND `".$GLOBALS['info'][2][17][0]."`.`".$GLOBALS['info'][2][17][1]."`='".$a."' LIMIT 1"),[$a]];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[2] = $GLOBALS['DB']->f($b[0]);
$b[1] = [$a,$b[2][0],$b[2][1],$b[2][2],$b[2][3],$b[2][4],$b[2][5]];
}
return $b[1];
}
function edit($a) {
if ($a==$_SESSION['id']) return 0; else return 1;
}
function music($a,$z=0) {
if ($z==0) {
$b = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` `a`,`".$GLOBALS['info'][2][43][0]."` `b` WHERE `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[0]."' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT ".$a[1].",30"),[]];
$b[2] = $GLOBALS['DB']->n($b[0]);
for ($b[3]=0;$b[3]<$b[2];$b[3]++) {
$b[4] = $GLOBALS['DB']->f($b[0]);
$b[4][7] = json_decode($b[4][7],true);
$b[4][8] = musicIcon($b[4][0]);
$b[4][9] = edit($b[4][1]);
array_push($b[1],$b[4]);
}
return $b[1];
} else {
$c = $GLOBALS['info'][41];
$b = [[],$a[1]];
foreach($c as &$v) {
$b[2] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][42][1]."`,`a`.`".$GLOBALS['info'][2][42][2]."`,`a`.`".$GLOBALS['info'][2][42][4]."`,`a`.`".$GLOBALS['info'][2][42][5]."`,`a`.`".$GLOBALS['info'][2][42][6]."`,`a`.`".$GLOBALS['info'][2][42][7]."`,`a`.`".$GLOBALS['info'][2][42][8]."`,`a`.`".$GLOBALS['info'][2][42][9]."` FROM `".$GLOBALS['info'][2][42][0]."` `a`,`".$GLOBALS['info'][2][43][0]."` `b` WHERE `a`.`".$GLOBALS['info'][2][42][1]."`=`b`.`".$GLOBALS['info'][2][43][3]."` AND `a`.`".$GLOBALS['info'][2][42][3]."`='0' AND `b`.`".$GLOBALS['info'][2][43][5]."`='0' AND `b`.`".$GLOBALS['info'][2][43][2]."`='".$a[0]."' AND `a`.`".$GLOBALS['info'][2][42][5]."` COLLATE UTF8_GENERAL_CI LIKE '".$v."%' ORDER BY `b`.`".$GLOBALS['info'][2][43][4]."` DESC LIMIT ".$a[1].",".(30-$a[1]));
$b[3] = $GLOBALS['DB']->n($b[2]);
for ($b[4]=0;$b[4]<$b[3];$b[4]++) {
$b[5] = $GLOBALS['DB']->f($b[2]);
$b[5][7] = json_decode($b[5][7],true);
$b[5][8] = musicIcon($b[5][0]);
$b[5][9] = edit($b[5][1]);
$b[0][] = [$v,$b[5]];
}
$b[1] = $b[1]+$b[3];
if ($b[1]==30) break;
}
return $b[0];
}
}
function auC($a) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][43][1]."`) FROM `".$GLOBALS['info'][2][43][0]."` WHERE `".$GLOBALS['info'][2][43][2]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][43][3]."`='".$a."' AND `".$GLOBALS['info'][2][43][5]."`='0' LIMIT 1");
return $b;
/*
$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
$info[2][43] = ['_audio_u','id','own','au','ct','ss','dt'];//audio user
*/
}
function musicIcon($a) {
return '/sources/def.png';
}
function getURL($a) {
$b = [sizeof($a[0]),''];
for ($b[2]=0;$b[2]<$b[0];$b[2]++) if ($a[0][$b[2]][0]==$a[1]) $b[1] = $a[0][$b[2]][1];
return $b[1];
}
function findURLV($a) {
//findURLV([$a['q'],'section','playlists'])$a['q'][0][1]=='playlists'
$b = [sizeof($a[0]),false];
for ($b[2]=0;$b[2]<$b[0];$b[2]++) if ($a[0][$b[2]][0]==$a[1]&&$a[0][$b[2]][1]==$a[2]) $b[1] = true;
return $b[1];
}
function URLvalue($a) {//[arr,0,'section']
	$b = [sizeof($a[0]),''];
	for ($b[2]=0;$b[2]<$b[0];$b[2]++) if ($a[0][$b[2]][$a[1]]==$a[2]) $b[1] = $a[0][$b[2]][1];
	return $b[1];
}
function findURL($a) {//[arr,0,'section']
	$b = [sizeof($a[0]),false];
	for ($b[2]=0;$b[2]<$b[0];$b[2]++) if ($a[0][$b[2]][$a[1]]==$a[2]) $b[1] = true;
	return $b[1];
}
function profile($a) {
$c = [];
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][31][4]."` FROM `".$GLOBALS['info'][2][31][0]."` WHERE `".$GLOBALS['info'][2][31][2]."`='".$a."' AND `".$GLOBALS['info'][2][31][5]."`='0' ORDER BY `".$GLOBALS['info'][2][31][1]."` DESC LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) $c = json_decode($GLOBALS['DB']->f($b[0])[0]);
return $c;
}
function aucon($a) {
if ($a[1]==0) return '<div class="__19c" id="audio'.$a[0][0].'" onmouseenter="return go.audio.view(this)" onclick="return go.audio.sel('.htmlspecialchars(json_encode([[$a[0][0],$a[0][2],$a[0][3],$a[0][4],$a[0][5],$a[0][7]['bt'],$a[0][8]],$a[2]])).')" data-id="'.$a[0][0].'" data-t="0"><div class="__20p"><div class="__20s" onmouseover="return go.audio.opView(this,'.htmlspecialchars(json_encode([$a[0][0]])).',event)"></div>'.($a[0][1]==$_SESSION['id']?'<div class="__20n" onmouseover="return go.audio.help1(this,\'Удалить аудиозапись\',event)" onclick="return go.audio.del('.htmlspecialchars(json_encode([$a[0][0]])).')"></div><div class="__20o" onmouseover="return go.audio.help1(this,\'Редактировать\',event)" onclick="return go.audio.edit('.htmlspecialchars(json_encode([$a[0][0]])).',go.stop(event))"></div>':'<div class="__20n __20n0" onmouseover="return go.audio.help1(this,\'Убрать аудиозапись\',event)" onclick="return go.audio.rem('.htmlspecialchars(json_encode([$a[0][0]])).',go.stop(event))"></div>').'</div><div class="__20q">'.$a[0][4].'</div><div class="__19d" style="background-image: url('.$a[0][8].');">'.($a[0][7]['bt']==0?'<div class="__20j"></div>':'').'<div class="__20u"><div class="__20v"></div></div></div><div class="__19e"><div '.($a[0][6]!=''?'class="__19f __19f0" onclick="return go.audio.txt(this,'.htmlspecialchars(json_encode([$a[0][0]])).',go.stop(event));"':'class="__19f"').'>'.$a[0][2].'</div><div class="__19g" onclick="return go.audio.authorS(this,'.htmlspecialchars(json_encode([$a[0][0],$a[0][3]])).')">'.$a[0][3].'</div></div><div class="__19f1"><div class="__19f2"></div></div></div>';
}
function audioS($a) {
$b = [0];
//$info[2][55] = ['_audio_sort','id','t'];//sorting audio
$b[1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][55][2]."` FROM `".$GLOBALS['info'][2][55][0]."` WHERE `".$GLOBALS['info'][2][55][1]."`='".$a."' LIMIT 1");
if ($GLOBALS['DB']->n($b[1])!=0) $b[0] = $GLOBALS['DB']->f($b[1])[0];
return $b[0];
}
function audioC($a) {
return $GLOBALS['DB']->c("SELECT COUNT(`a`.`".$GLOBALS['info'][2][43][1]."`) FROM `".$GLOBALS['info'][2][43][0]."` AS `a`,`".$GLOBALS['info'][2][42][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][43][2]."`=`b`.`".$GLOBALS['info'][2][42][1]."` AND `a`.`".$GLOBALS['info'][2][43][5]."`='0' AND `b`.`".$GLOBALS['info'][2][42][3]."` AND `a`.`".$GLOBALS['info'][2][43][2]."`='".$a."'");
}
function plistC($a) {
return $GLOBALS['DB']->c("SELECT COUNT(`a`.`".$GLOBALS['info'][2][49][1]."`) FROM `".$GLOBALS['info'][2][49][0]."` AS `a`,`".$GLOBALS['info'][2][48][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][49][3]."`='".$a."' AND `a`.`".$GLOBALS['info'][2][49][4]."`='0' AND `b`.`".$GLOBALS['info'][2][48][1]."`=`a`.`".$GLOBALS['info'][2][49][2]."` AND `b`.`".$GLOBALS['info'][2][48][5]."`='0'");
}
function auBody($a,$b=0) {
return '<div data-id="'.htmlspecialchars(json_encode($a[0])).'" data-info="'.htmlspecialchars(json_encode($a[0])).'" id="au-list">'.(isset($a[3])?$a[3]:'').'<div class="'.($b!=0?($b==1?'__19ba':''):'__19b').'">'.($a[1]!=''?$a[1]:$a[2]).'</div><div id="__19b0"></div></div>';
}
function auHead($a) {
return '<a href="/audios'.$a[1].'" class="no-link" onclick="return go.linkM(this,event)"'.($a[0]==0?' data-au-p="0"':'').'><button class="__19i'.($a[0]==0?' __19j':'').'">Моя музыка</button></a><a class="no-link" href="/audios'.$a[1].'?section=playlists" onclick="return go.linkM(this,event)"'.($a[0]==1?' data-au-p="1"':'').'><button class="__19i'.($a[0]==1?' __19j':'').'">Плейлисты</button></a><a href="/audios'.$a[1].'?section=recom" class="no-link" onclick="return go.linkM(this,event)"'.($a[0]==2?' data-au-p="2"':'').'><button class="__19i'.($a[0]==2?' __19j':'').'">Рекомендации</button></a><a href="/audios'.$a[1].'?section=albums" class="no-link" onclick="return go.linkM(this,event)"'.($a[0]==3?' data-au-p="3"':'').'><button class="__19i'.($a[0]==3?' __19j':'').'" style="margin: 0;">Альбомы</button></a>';
}
function szPL($a) {
$b = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][50][1]."`) FROM `".$GLOBALS['info'][2][50][0]."` WHERE `".$GLOBALS['info'][2][50][2]."`='".$a."' AND `".$GLOBALS['info'][2][50][4]."`='0'");
return $b;
}
function plChk($a) {
/*
$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
$info[2][49] = ['_audio_playlist_add','id','plst','own','ss','ct'];//audio playlist add
*/
$b = ['',$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][48][2]."` FROM `".$GLOBALS['info'][2][48][0]."` WHERE `".$GLOBALS['info'][2][48][1]."`='".$a."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[1])!=0) if ($GLOBALS['DB']->f($b[1])[0]!=$_SESSION['id']) $b[0] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][49][1]."`) FROM `".$GLOBALS['info'][2][49][0]."` WHERE `".$GLOBALS['info'][2][49][2]."`='".$a."' AND `".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][49][4]."`='0' LIMIT 1");
return $b[0];
}
function plist($a) {
	$b = plChk($a[0][0]);
	return '<div class="__23x playlist-'.$a[0][0].' '.($a[1]==0?'ui-sortable-handle':'').'" data-id="'.$a[0][0].'"><div class="__23y" onclick="return go.audio.selPt('.htmlspecialchars(json_encode([$a[0][0],$a[1]])).')">'.($a[0][3]!=''?'<img class="photo" width="130" height="130" src="'.$a[0][3].'">':'<div class="__24m"><div class="__24n"></div><div class="__24o"></div></div>').'<div class="__24g"><div class="__24f"></div><div class="__24h _'.$a[0][0].'">'.szPL($a[0][0]).'</div></div><div class="__24d __24e plM-'.$a[0][0].'" data-id="'.$a[0][0].'" onclick="return go.audio.plistPLAY(this,'.htmlspecialchars(json_encode([$a[0][0]])).',go.stop(event))"></div></div>'.($a[1]==0?'<div class="__24c"><div class="__24j"></div></div><div class="__24c0" onmouseenter="return '.($a[2]!=1?'go.audio.vPO':'go.audio.vPO2').'('.htmlspecialchars(json_encode([$a[0][0]])).',event,this)"></div>':($b==0?'<div class="__27j __27j'.$a[0][0].'" onclick="return go.audio.plList('.htmlspecialchars(json_encode([$a[0][0]])).',this)" data-id="1"><div class="__27k"></div><div class="__27l"></div></div>':($b==1?'<div class="__27j __27j'.$a[0][0].'" onclick="return go.audio.plList('.htmlspecialchars(json_encode([$a[0][0]])).',this)" data-id="0"><div class="__27k" style="margin-top: -16px;"></div><div class="__27l"></div></div>':''))).'<div class="__23z" onclick="return go.audio.selPt('.htmlspecialchars(json_encode([$a[0][0],$a[1]])).')">'.$a[0][2].'</div><div class="__24a">'.alertBox::auPlistOwner($a[0][1],1).'</div></div>';
}
function uname($a) {
$b = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][17][2]."`,`".$GLOBALS['info'][2][17][3]."`,`".$GLOBALS['info'][2][17][4]."` FROM `".$GLOBALS['info'][2][17][0]."` WHERE `".$GLOBALS['info'][2][17][1]."`='".$a[0]."' LIMIT 1")];
if ($GLOBALS['DB']->n($b[0])!=0) {
$b[1] = $GLOBALS['DB']->f($b[0]);
return $a[1]==0?$b[1][0].' '.$b[1][1].' '.$b[1][2]:[$b[1][0],$b[1][1],$b[1][2]];
} else return '';
}
?>