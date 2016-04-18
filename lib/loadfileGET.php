<?php
include_once 'parse.php';

// обязательно ввести все
function loadfileGET($url, $data,$host, $calback='parse', $type='GET')
{
	phpQuery::ajaxAllowHost($host); 
	# code...
phpQuery::get($url, $data, $calback, $type); 



}

  ?>