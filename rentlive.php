<?php
include_once 'lib/setting.php';
if(isset($_POST) && !empty($_POST['data'])) {
   //echo var_dump(json_decode($_POST['data']));
   $res=json_decode($_POST['data']);
  // echo $res[0];


$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword =$GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных


 $curdate=date('Y-m-d',time());
$datefrom=date('Y-m-d', strtotime($curdate .' - '.($res[0]-1).' day'));
$dateto=date('Y-m-d',time()); 
//echo "$curdate";


//echo "$sql";

$sql = "select `day`,`time`, `type`,`price`,`street`,`square`,`totalroom`,`metro`,`fhone`,`name`,`description` from `rent_living` ORDER BY `id` DESC";
$sql="select `day`,`time`, `type`,`price`,`street`,`square`,`totalroom`,`metro`,`fhone`,`name`,`description` FROM `rent_living` WHERE `day` BETWEEN '".$datefrom."' AND '".$dateto."'";

//echo " $sql";
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

    die();
}
  ?>