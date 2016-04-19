#!/usr/bin/php
#!/usr/bin/env  php
#!/usr/bin/php -n
#!/usr/bin/php -ddisplay_errors=E_ALL
#!/usr/bin/php -n -ddisplay_errors=E_ALL
<?php
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass
//a1100551_testwp1   a1100551_root
 /* Установка внутренней кодировки в UTF-8 */
mb_internal_encoding("UTF-8");

/* Вывод на экран текущей внутренней кодировки */
//echo mb_internal_encoding();
//echo "string";
include_once 'lib/setting.php';
  require_once ('phpQuery/phpQuery/phpQuery.php');
  require_once  'debug/debug.php';
  require_once  'lib/loaddocget.php';
  require_once  'lib/loaddocpost.php';
     include_once 'lib/generator_form_data.php';
   //require_once 'lib/generator_form_data.php';


//     get OK
//loaddocget('http://rent-scaner.ru/estate');

//echo "OK";

 //set_time_limit ( 180 );
 //echo "gogo";



$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter



$datefrom="17/04/2016";  //17/04/2016
$dateto="18/04/2016";   //18/04/2016
 $curdate=date('d-m-Y',time());
$datefrom=date('d/m/Y', strtotime($curdate .' -1 day'));
$dateto=date('d/m/Y',time()); 

echo "$datefrom <br>";
echo "$dateto <br>";

$GLOBALS['type_base']='rent_living'; 
loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","1",$datefrom,$dateto),'rent-scaner.ru');

/*sleep(7);


$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='sale_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter

loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","2",$datefrom,$dateto),'rent-scaner.ru');
sleep(7);


$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='rent_business'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter

loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","3",$datefrom,$dateto),'rent-scaner.ru');
sleep(7);



$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='sale_business'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter

loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","4",$datefrom,$dateto),'rent-scaner.ru');
sleep(7);
*/








   // post   OK  
//loaddocpost('http://rent-scaner.ru/estate',generator_form_data(),'rent-scaner.ru');

  ?>