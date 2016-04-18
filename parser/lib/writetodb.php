<?php


function writetodb2($dayer,$timerest,$typeqwer, $description, $price, $region, $punct, $street, $bild, $metro, $tometrowalk, $tometrocar, $square, $floar, $floars, $totalroom, $rooms, $name, $fhone, 
  $foto, $linke, $maya, $mayb, $mayc, $mayd, $maye, $mayf, $mayg  )
{
  # code...
  // Данные для mysql сервера
/*$dbhost = "127.0.0.1"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "testwp1"; // Имя базы данных
*/
$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword =$GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных
//$dbhost = "127.0.0.1"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "testwp1"; // Имя базы данных
  // Данные для mysql сервера
//$dbhost = $dbarr['host']; // Хост
//$dbuser = $dbarr['user'] ;// Имя пользователя
//$dbpassword =$dbarr['pass']; // Пароль
//$dbname = $dbarr['dbname']; // Имя базы данных

// Подключаемся к mysql серверу
$link = mysql_connect($dbhost, $dbuser, $dbpassword);

/* Открыть соединение */
$link = mysqli_connect("127.0.0.1", "root", "",$dbname );

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
//print_r( mysqli_character_set_name ( $link ));
mysqli_set_charset($link, "utf8");

//print_r( mysqli_character_set_name ( $link ));


//mysql_query("SET character_set_connection='cp1251_general_ci'");
//mysql_query("SET character_set_database='cp1251_general_ci'");
//mysql_query("SET character_set_results='cp1251_general_ci'");
#	 mysql_query("SET character_set_server='utf8'");
#	 mysql_query("SET character_set_system='utf8'");
#	 mysql_query("SET character_set_client='utf8'");
// Выбираем нашу базу данных
//mysqli_select_db($dbname, $link);

    //mysql_query('SET NAMES cp1251', $link);          
    //mysql_query('SET CHARACTER SET cp1251', $link);  
  //  mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"', $link);

//mysql_query('SET NAMES utf8');
$sql=" insert into `".$GLOBALS['type_base']."`(`day`, `time`, `type`, `description`, `price`, `region`, `punct`, `street`,`bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`, `foto`,`link`,`maya`, `mayb`, `mayc`, `mayd`, `maye`, `mayf`, `mayg` ) value ('$dayer', '$timerest', '$typeqwer', '$description', '$price', '$region', '$punct', '$street', '$bild', '$metro', '$tometrowalk', '$tometrocar', '$square', '$floar', '$floars' , '$totalroom', '$rooms', '$name', '$fhone', '$foto', '$linke', '$maya', '$mayb', '$mayc', '$mayd', '$maye', '$mayf', '$mayg')";

//INSERT INTO `main`(`day`) VALUES ('1985-12-12')

//$s="rtyui";
//$sql=" insert into `main`( `type` ) values ('$s')";
//$sql="insert into `main`( `type`) values (56)";
//echo "DB $type";
//$sql=" insert into `main`( `type` ) value ($type)";
//$sql="insert into `main`('type') values ('edfkerjkfkwe')";

//$sql="insert into `main`(`link`) values ('cfguy')";
//$query = "create table customer (id int(2) primary key
//auto_increment, name varchar(100), tel varchar(20))";
 mysqli_query($link,$sql)or die (mysql_error());
//mysql_query($sql, $link)  

// Закрываем соединение
mysqli_close($link);

//echo "<br>TEL: ".$fhone."  NAME: ".$name  ;
$GLOBALS['write_room']=$GLOBALS['write_room']+1;    //++ ???
// Подключаемся к mysql серверу
//$link = mysql_connect($dbhost, $dbuser, $dbpassword);

// Выбираем нашу базу данных
//mysql_select_db($dbname, $link);

// Добавляем запись в нашу таблицу customer
// т.е. делаем sql запрос
//$query = "insert into customer '123','Иванов Иван Иванович',
//'(095) 555-55-55')";

//mysql_query($query, $link);

// Закрываем соединение
//mysql_close($link);
//echo "Add";
}


function cleardata($var){
    $var = stripcslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    $var = mysql_real_escape_string($var);
    return $var;
}


  ?>