<?php
header("Access-Control-Allow-Origin: http://infalike.com");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT"); 
header('Access-Control-Allow-Credentials: true');
session_start();
require 'data.php';
require 'class.php';
if (isset($_POST['package'])) {
$a = json_decode($_POST['package'],true);
$e = new html;
if ($a['t']==0) {
if ($a['p']==0) {
$b = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][1][1]."` FROM `".$GLOBALS['info'][2][1][0]."` WHERE `".$GLOBALS['info'][2][1][4]."`='".$GLOBALS['DB']->p($a['v']['pw'])."' AND (`".$GLOBALS['info'][2][1][2]."`='".$GLOBALS['DB']->s($a['v']['lg'])."' OR `".$GLOBALS['info'][2][1][3]."`='".$GLOBALS['DB']->s($a['v']['lg'])."') LIMIT 1");
$c = $GLOBALS['DB']->n($b);
$a['f'] = 0;
$_SESSION['lg'] = $a['v']['lg'];
$a['tt'] = $GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][79];
$a['u'] = '/login';
if ($c!=0) {
$d = $GLOBALS['DB']->f($b);
$_SESSION['id'] = $d[0];
$a['f'] = 20;
$a['tt'] = 'Новости';
$a['u'] = '/feed';
}
echo $e->view($a);
} else {

}
} else if ($a['t']==1) {
$b = parse_url($a['u']);
if ($b['path']=='/') {
checkSession();
$a['f'] = 1;
$a['tt'] = $GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][80];
echo $e->view($a);
} else if ($b['path']=='/login') {
checkSession();
$a['f'] = 0;
$a['tt'] = $GLOBALS['info'][5][$GLOBALS['info'][1]['lang']][79];
echo $e->view($a);
} else if ($b['path']=='/restore') {
checkSession();
$a['f'] = 2;
$a['tt'] = 'Востановление пароля';
echo $e->view($a);
} else if ($b['path']=='/about') {
$a['f'] = 3;
$a['tt'] = menu(0);
$a['p'] = 0;
echo $e->view($a);
} else if ($b['path']=='/help') {
$a['q'] = parseQ($b['query']);
$a['f'] = 3;
$a['tt'] = menu(1);
$a['p'] = 1;
echo $e->view($a);
} else if ($b['path']=='/jobs') {
$a['f'] = 3;
$a['tt'] = menu(2);
$a['p'] = 2;
echo $e->view($a);
} else if ($b['path']=='/terms') {
$a['f'] = 3;
$a['tt'] = menu(3);
$a['p'] = 3;
echo $e->view($a);
} else if ($b['path']=='/privacy') {
$a['f'] = 3;
$a['tt'] = menu(4);
$a['p'] = 4;
echo $e->view($a);
} else if ($b['path']=='/cookies') {
$a['f'] = 3;
$a['tt'] = menu(5);
$a['p'] = 5;
echo $e->view($a);
} else if ($b['path']=='/developers') {
$a['f'] = 3;
$a['tt'] = menu(6);
$a['p'] = 6;
echo $e->view($a);
} else if ($b['path']=='/mobile') {
$a['f'] = 3;
$a['tt'] = menu(7);
$a['p'] = 7;
echo $e->view($a);
} else if ($b['path']=='/advertise') {
$a['f'] = 3;
$a['tt'] = menu(8);
$a['p'] = 8;
echo $e->view($a);
} else if ($b['path']=='/media') {
$a['f'] = 3;
$a['tt'] = menu(9);
$a['p'] = 9;
echo $e->view($a);
} else if ($b['path']=='/settings') {
$a['f'] = 5;
$a['tt'] = menu(10);
$a['q'] = parseQ($b['query']);
echo $e->view($a);
} else if ($b['path']=='/edit') {
$a['f'] = 6;
$a['tt'] = menu(11);
$a['q'] = parseQ($b['query']);
echo $e->view($a);
} else if ($b['path']=='documents'||$b['path']=='/documents') {
$a['f'] = 7;
$a['q'] = parseQ($b['query']);
$a['tt'] = menu(12);
echo $e->view($a);
} else if (preg_match('/audios\d+/',$b['path'])) {
$a['f'] = 11;
$a['d'] = $b['path'];
$a['q'] = parseQ($b['query']);
$a['tt'] = $b['path'];
echo $e->view($a);
} else if (preg_match('/photos\d+/',$b['path'])) {
$a['f'] = 12;
$a['d'] = $b['path'];
$a['q'] = parseQ($b['query']);
$a['tt'] = $b['path'];
echo $e->view($a);
}
}


}
function checkSession() {
	if (isset($_SESSION['id'])) {
		header('Location: /settings');
		exit();
	}
}
?>