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
echo "string";
  require_once ('phpQuery/phpQuery/phpQuery.php');
  require_once  'debug/debug.php';
  require_once  'lib/loaddocget.php';
  require_once  'lib/loaddocpost.php';
     include_once 'lib/generator_form_data.php';
   //require_once 'lib/generator_form_data.php';


//     get OK
//loaddocget('http://rent-scaner.ru/estate');

echo "OK";

 //set_time_limit ( 180 );
 //echo "gogo";
$GLOBALS['u_host']="127.0.0.1"; // Хост
$GLOBALS['u_user']="root"; // Имя пользователя
$GLOBALS['u_pass']=""; // Пароль
$GLOBALS['u_dbname']="testwp1"; // Имя базы данных
$GLOBALS['total_room']=0; 
$GLOBALS['filter']=false;
$GLOBALS['maxcount']=5;

/*
$GLOBALS['u_host']="mysql12.000webhost.com"; // Хост
$GLOBALS['u_user']="a1100551_root"; // Имя пользователя
$GLOBALS['u_pass']="Dublianu1982"; // Пароль
$GLOBALS['u_dbname']="a1100551_testwp1"; // Имя базы данных
*/

$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter



$datefrom="13/02/2016";  //17/04/2016
$dateto="14/02/2016";   //18/04/2016

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