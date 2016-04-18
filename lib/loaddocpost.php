<?php
include_once 'parse.php';

// обязательно ввести все
function loaddocpost($url, $data,$host, $calback='parse', $type='POST')
{
	phpQuery::ajaxAllowHost($host); 
	# code...
phpQuery::post($url, $data, $calback, $type); 



}

  ?>