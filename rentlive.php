<?php
include_once 'lib/setting.php';


$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword =$GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных


$sql="select `day` as `День` , `time` as `Время` from `rent_living` WHERE 1";
$sql="select `day` as `День` , `time` as `Время`,`price` as `Цена`,`street` as `Улица`, `totalroom` as `Комнат` ,`floar` as `Этаж`,`fhone` as `Телефон`, `name` as `Имя` from `rent_living` WHERE 1";
$sql = "select `day`,`time`, `type`,`price`,`street`,`square`,`totalroom`,`metro`,`fhone`,`name`,`description` from `rent_living` ORDER BY `id` DESC";
$v='[';

$link = mysqli_connect($dbhost , $dbuser, $dbpassword , $dbname);
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
//print_r( mysqli_character_set_name ( $link ));
mysqli_set_charset($link, "utf8");

/* Select запросы возвращают результирующий набор */
if ($result = mysqli_query($link, $sql)) {
    //printf("Select вернул %d строк.\n", mysqli_num_rows($result));
while ($row = $result->fetch_row()) {

//echo $row[5]."<br>";

  $temp='{"Дата": "'.$row[0].'","Время": "'.$row[1].'","Тип": "'.$row[2].'","Цена": "'.$row[3].'","Адрес": "'.$row[4].'","Площадь": "'.(string)$row[5].'","Комнат": "'.$row[6].'","Метро": "'.$row[7].'","Телефон": "'.$row[8].'","Имя": "'.$row[9].'"},';
$v.=$temp;

  


      // $row[0] $row[1]
    }
    $v=substr($v, 0, -1);
   $v.=']';
    /* очищаем результирующий набор */
    mysqli_free_result($result);
}

echo "$v";






/*$link = mysqli_connect($dbhost, $dbuser, $dbpassword,$dbname );

// * проверка соединения */
// if (mysqli_connect_errno()) {
//     printf("Не удалось подключиться: %s\n", mysqli_connect_error());
//     exit();
// }
// //print_r( mysqli_character_set_name ( $link ));
// mysqli_set_charset($link, "utf8");


// $sql=" insert into `".$GLOBALS['type_base']."`(`day`, `time`, `type`, `description`, `price`, `region`, `punct`, `street`,`bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`, `foto`,`link`,`maya`, `mayb`, `mayc`, `mayd`, `maye`, `mayf`, `mayg` ) value ('$dayer', '$timerest', '$typeqwer', '$description', '$price', '$region', '$punct', '$street', '$bild', '$metro', '$tometrowalk', '$tometrocar', '$square', '$floar', '$floars' , '$totalroom', '$rooms', '$name', '$fhone', '$foto', '$linke', '$maya', '$mayb', '$mayc', '$mayd', '$maye', '$mayf', '$mayg')";

// mysqli_query($link,$sql)or die (mysql_error());
// //mysql_query($sql, $link)  

// // Закрываем соединение
// mysqli_close($link);

//echo "<br>TEL: ".$fhone."  NAME: ".$name  ;
//$GLOBALS['write_room']=$GLOBALS['write_room']+1;    //++ ???





$v='[
  {
    "Дата": "Weezer",
    "Время": "El Scorcho"
  },
  {
    "Дата": "Chevelle",
    "Вемя": "Family System"
  }
]';
//echo "$v";
  ?>