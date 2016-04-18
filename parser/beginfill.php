<?php
include_once 'lib/loadfileGET.php';
  require_once ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
   include_once 'lib/loaddocget.php';
     include_once 'lib/loaddocpost.php';
   include_once 'lib/generator_form_data.php';
 set_time_limit ( 180 );
 //echo "gogo";
$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['write_room']=0;
$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=false;

//loadfileGET('http://rent-scaner.ru/estate?per-page=250',generator_form_data("507","1","1/04/2016","17/04/2016"),'rent-scaner.ru');



loaddocpost('http://rent-scaner.ru/estate?per-page=250',generator_form_data("507","1","16/04/2016","17/04/2016"),'rent-scaner.ru');
sleep(7);
echo "<br>sleep<br>";
for ($i=2; $i <3 ; $i++) { 
	# code...

	http://rent-scaner.ru/estate?per-page=50&page=2
	loaddocpost('http://rent-scaner.ru/estate?per-page=250&page='.$i.'',generator_form_data("507","1","1/04/2016","17/04/2016"),'rent-scaner.ru');
	echo "<br>sleep<br>";
	echo "<br>Detect ".$GLOBALS['total_room'].' rooms<br>';
echo "Write ".$GLOBALS['write_room'].' rooms<br>';
$GLOBALS['total_room']=0;
$GLOBALS['write_room']=0;
sleep(7);
echo "<br>sleep<br>";


}




//loadfileGET('http://rent-scaner.ru/estate?per-page=250&page=2',generator_form_data("507","1","1/04/2016","17/04/2016"),'rent-scaner.ru');

//echo "<br>Detect ".$GLOBALS['total_room'].' rooms<br>';
//echo "Write ".$GLOBALS['write_room'].' rooms<br>';


?>