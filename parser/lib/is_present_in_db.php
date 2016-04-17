<?php


function is_present_in_db($day,$time,$street)
{
	# code...
//SELECT `day`, `time`, `street`, `bild`, `name`, `fhone` FROM `main` WHERE 1
	//SELECT `description` FROM `main` WHERE `day`='2016-04-17' AND `time`='07:12:00' AND `street`='Новочерёмушкинская улица, 21к1'
$sql="select `description` from `main` where `day`='".$day."' and `time`='".$time."' and `street`='".$street."'";
echo "<br>$sql<br>";
$dbarr['host']="127.0.0.1"; // Хост
$dbarr['user']="root"; // Имя пользователя
$dbarr['pass']=""; // Пароль
$dbarr['dbname']="testwp"; // Имя базы данных


$dbhost = $dbarr['host']; // Хост
$dbuser = $dbarr['user']; // Имя пользователя
$dbpassword = $dbarr['pass'];; // Пароль
$dbname = $dbarr['dbname']; // Имя базы данных

// Подключаемся к mysql серверу
//$link = mysql_connect($dbhost, $dbuser, $dbpassword);

/* Открыть соединение */
$link = mysqli_connect("127.0.0.1", "root", "", "testwp1");

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
//print_r( mysqli_character_set_name ( $link ));
mysqli_set_charset($link, "utf8");
  $stateresult=false;
if( $res = mysqli_query($link,$sql)){
if($res->num_rows>0)$stateresult= true;
else  $stateresult= false;
}
else {
	//echo "NOT Present<br>";
$stateresult= false;	
}
echo $stateresult==true?"IS":"NO";

$res->close();
mysqli_close($link);
return $stateresult;

//mysql_query($sql, $link)  

// Закрываем соединение
}

?>