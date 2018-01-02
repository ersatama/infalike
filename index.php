<?php
//starting session
session_start();
/*

$ch = curl_init();
curl_setopt_array($ch,array(CURLOPT_CERTINFO=>false,CURLOPT_SSL_VERIFYHOST=>false,CURLOPT_SSL_VERIFYPEER=>false));
curl_exec($ch);
curl_close($ch);
*/
require 'data.php';
require 'class.php';
new browser();//browser check
new start();//start class, check for ip block
$a = new view();
$a->start();

?>