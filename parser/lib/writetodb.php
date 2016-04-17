<?php
function writetodb2($dayer,$timerest,$typeqwer='123', $description='123', $price='123', $region='123', $punct='123', $street='123', $bild='123', $metro='123', $tometrowalk='123', $tometrocar='123', $square='123', $floar='123', $floars='123', $totalroom='123', $rooms='123', $name='123', $fhone='123', 
	$foto='123', $linke='123', $maya='123', $mayb='123', $mayc='123', $mayd='123', $maye='123', $mayf='123', $mayg='123' )
{
  # code...
  // Данные для mysql сервера
$dbhost = "127.0.0.1"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "testwp1"; // Имя базы данных

// Подключаемся к mysql серверу
$link = mysql_connect($dbhost, $dbuser, $dbpassword);

/* Открыть соединение */
$link = mysqli_connect("127.0.0.1", "root", "", "testwp1");

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
$sql=" insert into `main`(`day`, `time`, `type`, `description`, `price`, `region`, `punct`, `street`,`bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`, `foto`,`link`,`maya`, `mayb`, `mayc`, `mayd`, `maye`, `mayf`, `mayg` ) value ('$dayer', '$timerest', '$typeqwer', '$description', '$price', '$region', '$punct', '$street', '$bild', '$metro', '$tometrowalk', '$tometrocar', '$square', '$floar', '$floars' , '$totalroom', '$rooms', '$name', '$fhone', '$foto', '$linke', '$maya', '$mayb', '$mayc', '$mayd', '$maye', '$mayf', '$mayg')";

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
}
function writetodb($dayer,$timerest,$typeqwer, $description, $price, $region, $punct, $street, $bild, $metro, $tometrowalk, $tometrocar, $square, $floar, $floars, $totalroom, $rooms, $name, $fhone, 
	$foto, $linke, $maya, $mayb, $mayc, $mayd, $maye, $mayf, $mayg )
{
  # code...
  // Данные для mysql сервера
$dbhost = "127.0.0.1"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "testwp1"; // Имя базы данных

// Подключаемся к mysql серверу
$link = mysql_connect($dbhost, $dbuser, $dbpassword);

/* Открыть соединение */
$link = mysqli_connect("127.0.0.1", "root", "", "testwp1");

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
$sql=" insert into `main`(`day`, `time`, `type`, `description`, `price`, `region`, `punct`, `street`,`bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`, `foto`,`link`,`maya`, `mayb`, `mayc`, `mayd`, `maye`, `mayf`, `mayg` ) value ('$dayer', '$timerest', '$typeqwer', '$description', '$price', '$region', '$punct', '$street', '$bild', '$metro', '$tometrowalk', '$tometrocar', '$square', '$floar', '$floars' , '$totalroom', '$rooms', '$name', '$fhone', '$foto', '$linke', '$maya', '$mayb', '$mayc', '$mayd', '$maye', '$mayf', '$mayg')";

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
}

function cleardata($var){
    $var = stripcslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    $var = mysql_real_escape_string($var);
    return $var;
}


  ?>