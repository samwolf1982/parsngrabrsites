<?php
//include_once 'beginfill.php';

function is_present_in_db($day,$time,$street,$name,$tel,$filter)
{
	if($filter==false) return false;
	# code...

$sql="select count(*) from `".$GLOBALS['type_base']."` where `day`='".$day."' and `time`='".$time."' and `street`='".$street."' and `name`='".$name."' and `fhone`='".$tel."'";

//echo "<br>$sql<br>";
/*$dbarr['host']="127.0.0.1"; // Хост
$dbarr['user']="root"; // Имя пользователя
$dbarr['pass']=""; // Пароль
$dbarr['dbname']="testwp"; // Имя базы данных
$GLOBALS[$dbarr['host']]="127.0.0.1"; // Хост
$GLOBALS[$dbarr['user']]="root"; // Имя пользователя
$GLOBALS[$dbarr['pass']]=""; // Пароль
$GLOBALS[$dbarr['dbname']]="testwp"; // Имя базы данных
*/
$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword = $GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных

// Подключаемся к mysql серверу
//$link = mysql_connect($dbhost, $dbuser, $dbpassword);

/* Открыть соединение */
//$link = mysqli_connect("127.0.0.1", "root", "", "testwp1");
//echo "$dbhost<br>";
//echo "$dbuser<br>";
//echo "$dbpassword<br>";
//echo "$dbname<br>";

$link = mysqli_connect($dbhost , $dbuser, $dbpassword , $dbname);
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
//print_r( mysqli_character_set_name ( $link ));
mysqli_set_charset($link, "utf8");
  $stateresult=false;
if( $res = mysqli_query($link,$sql)){
$row = $res->fetch_row();


if($row[0]>0)$stateresult= true;
else  $stateresult= false;
}
else {
	//echo "NOT Present<br>";
$stateresult= false;	
}
//echo $stateresult==true?"IS":"NO";

$res->close();
mysqli_close($link);
return $stateresult;

//mysql_query($sql, $link)  

// Закрываем соединение
}

?>