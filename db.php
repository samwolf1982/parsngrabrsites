<?php

workwithDB('123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123');

function workwithDB($type, $description, $price, $region, $punct, $street, $bild, $metro, $tometrowalk, $tometrocar, $square, $floar, $floars, $totalroom, $rooms, $name, $fhone, 
	$foto, $linke, $maya, $mayb, $mayc, $mayd, $maye, $mayf, $mayg )
{
  # code...
  // Данные для mysql сервера
$dbhost = "localhost"; // Хост
$dbuser = "root"; // Имя пользователя
$dbpassword = ""; // Пароль
$dbname = "testwp1"; // Имя базы данных

// Подключаемся к mysql серверу
$link = mysql_connect($dbhost, $dbuser, $dbpassword);

// Выбираем нашу базу данных
mysql_select_db($dbname, $link);

// Создаём таблицу customer
// т.е. делаем sql запрос
/*$sql=" insert into `main`( `type`, `description`, `price`, `region`, `punct`, `street`, `bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`, `foto`, `link`, `maya`, `mayb`, `mayc`, `mayd`, `maye`, `mayf`, `mayg`) value ($type, $description, $price, $region, $punct, $street, $bild, $metro, $tometrowalk, $tometrocar, $square, $floar, $floars, $totalroom, $rooms, $name, $fhone, $foto, $link, $maya, $mayb, $mayc, $mayd, $maye, $mayf, $mayg)";*/



/*$sql=" insert into `main`( `type`, `description`, `price`, `region`, `punct`, `street`, `bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`, `foto`, `link`, `maya`, `mayb`, `mayc`, `mayd`, `maye`, `mayf`, `mayg`) values (".$type."," .$description.",". $price.",". $region.",". $punct.",". $street."," .
$bild.",". $metro.",". $tometrowalk.",". $tometrocar.",". $square.",". $floar.",". $floars.",". $totalroom.",". $rooms.",". $name.",". $fhone.",". $foto.",". $link.",". $maya.",". $mayb.",". $mayc.",". $mayd.",". $maye.",". $mayf.",". $mayg.")";*/

//$sql=" insert into `main`( `type`) values (".$type."," .$description.",". $price.",". $region.",". $punct.",". $street.")";

$sql=" insert into `main`( `type`, `description`, `price`, `region`, `punct`, `street`,`bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`, `foto`,`link`,`maya`, `mayb`, `mayc`, `mayd`, `maye`, `mayf`, `mayg` ) value ($type, $description, $price, $region, $punct, $street, $bild, $metro, $tometrowalk, $tometrocar, $square, $floar, $floars , $totalroom, $rooms, $name, $fhone, $foto, $linke, $maya, $mayb, $mayc, $mayd, $maye, $mayf, $mayg)";


//$sql="insert into `main`(`link`) values ('cfguy')";
//$query = "create table customer (id int(2) primary key
//auto_increment, name varchar(100), tel varchar(20))";
mysql_query($sql, $link);

// Закрываем соединение
mysql_close($link);


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




  ?>