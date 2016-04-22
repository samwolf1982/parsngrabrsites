<?php
include_once 'lib/setting.php';
if(isset($_POST) && !empty($_POST['data'])) {
   //echo var_dump(json_decode($_POST['data']));
   $res=json_decode($_POST['data']);
   $tablestate=json_decode($_POST['globalstate']);
  


  // body...
   $type='rent_living';
  if ($tablestate==1) { $type='rent_living';} 
  else if($tablestate==2) {$type='rent_business';}
     else if($tablestate==3) {$type='sale_living';}
       else if($tablestate==4) {$type='sale_business';}



   //echo $tablestate;


$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword =$GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных


 $curdate=date('Y-m-d',time());
$datefrom=date('Y-m-d', strtotime($curdate .' - '.($res[0]-1).' day'));
$dateto=date('Y-m-d',time()); 
//echo "$curdate";
//      take table





	$sql="select `day`, `time`, `type`, substring(`description`,1,100), `price`, `region`, `punct`, `street`, `bild`, `metro`, `tometrowalk`, `tometrocar`, `square`, `floar`, `floars`, `totalroom`, `rooms`, `name`, `fhone`,substring(`foto`,1,30), `link` FROM `".$type."` WHERE `day` BETWEEN '".$datefrom."' AND '".$dateto."'  ";

  //error_log($sql."\n" ,3, 'log.txt');

$arr=[];
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




$arr[]=array( "Дата"=>$row[0],
	         "Время"=>$row[1],
	           "Тип"=>$row[2],
	      "Описание"=>$row[3],
	          "Цена"=>$row[4],
	        "Регион"=>$row[5],
	     "Нас_пункт"=>$row[6],
	         "Улица"=>$row[7],
			   "Дом"=>$row[8],
 			 "Метро"=>$row[9],
   "До_метро_пешком"=>$row[10],
     "До_метро_авто"=>$row[11],
           "Площадь"=>$row[12],
              "Этаж"=>$row[13],
         "Этажность"=>$row[14],
      "Всего_комнат"=>$row[15],
   "Комнат_в_сделке"=>$row[16],
               "Имя"=>$row[17],
           "Телефон"=>$row[18],
              "Фото"=>$row[19],
	      "Источник"=>$row[20]	         
	        
	        
	         );


    }

    /* очищаем результирующий набор */
    mysqli_free_result($result);
}
echo json_encode($arr);
//echo   ($v);

    die();
}
  ?>