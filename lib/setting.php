<?php  
$GLOBALS['u_host']="127.0.0.1"; // Хост
$GLOBALS['u_user']="root"; // Имя пользователя
$GLOBALS['u_pass']=""; // Пароль
$GLOBALS['u_dbname']="testwp1"; // Имя базы данных
$GLOBALS['total_room']=0; 
$GLOBALS['filter']=true;  // если false  тогда записивает дубли
$GLOBALS['maxcount']=30000;    // количество первих записей для проверки можно //ставить 5000     для хостинка 5  
$GLOBALS['totalparts']= null;
$GLOBALS['per_page']=50; // количество елементов на странице
$GLOBALS['next_if_present']=true; // true проверять дальше если есть false не проверять дальше если есть
 
set_time_limit ( 360 );
/*$GLOBALS['u_host']="mysql12.000webhost.com"; // Хост
$GLOBALS['u_user']="a1100551_root"; // Имя пользователя
$GLOBALS['u_pass']="Dublianu1982"; // Пароль
$GLOBALS['u_dbname']="a1100551_testwp1"; // Имя базы данных
$GLOBALS['maxcount']=5;
*/
//$GLOBALS['maxcount']=10;
?>