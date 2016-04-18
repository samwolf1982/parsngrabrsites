

<?php
//                 caci@leeching.net   mail
//    db                us                 pass
//a1100551_testwp1   a1100551_root
 
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

 set_time_limit ( 180 );
 //echo "gogo";
$GLOBALS['u_host']="127.0.0.1"; // Хост
$GLOBALS['u_user']="root"; // Имя пользователя
$GLOBALS['u_pass']=""; // Пароль
$GLOBALS['u_dbname']="testwp"; // Имя базы данных


$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter





$GLOBALS['type_base']='rent_living'; 
loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","1","16/04/2016","17/04/2016"),'rent-scaner.ru');
sleep(7);


$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='sale_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter

loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","2","16/04/2016","17/04/2016"),'rent-scaner.ru');
sleep(7);


$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='rent_business'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter

loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","3","16/04/2016","17/04/2016"),'rent-scaner.ru');
sleep(7);



$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='sale_business'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter

loaddocpost('http://rent-scaner.ru/estate?per-page=50',generator_form_data("507","4","16/04/2016","17/04/2016"),'rent-scaner.ru');
sleep(7);









   // post   OK  
//loaddocpost('http://rent-scaner.ru/estate',generator_form_data(),'rent-scaner.ru');

  ?>