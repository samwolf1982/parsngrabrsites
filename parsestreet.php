<?php

// help fun
// избавление от кроказябр
//$link = mysqli_connect($dbhost , $dbuser, $dbpassword);
//mysqli_set_charset($link, "utf8");                //
//
include_once 'lib/setting.php';
require_once 'debug/debug.php';
include_once 'lib/Parse_Street.php';

//f(isset($_GET) && !empty($_GET['data'])) {

//$res=json_decode($_GET['data']);

/*//echo "OL";
parse_str($_SERVER['QUERY_STRING'], $output);
//echo var_dump($output);

$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword =$GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных
// output headers so that the file is downloaded rather than displayed*/

$sql = "select `street` from `rent_living` where 1 LIMIT 500";

$obj = new Parse_Street($sql, $GLOBALS['u_host'], $GLOBALS['u_user'], $GLOBALS['u_pass'], $GLOBALS['u_dbname']);

$obj->conect();
$obj->parse_Bulvar_Pereulok_street();

?>