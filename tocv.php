<?php 

// help fun 
          // избавление от кроказябр
//$link = mysqli_connect($dbhost , $dbuser, $dbpassword);
//mysqli_set_charset($link, "utf8");                //  
// 
include_once 'lib/setting.php';
//f(isset($_GET) && !empty($_GET['data'])) {

   //$res=json_decode($_GET['data']);


//echo "OL";
parse_str($_SERVER['QUERY_STRING'], $output);
//echo var_dump($output);

$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword =$GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename=data.csv');
mb_internal_encoding("UTF-8");
mysql_query("SET NAMES 'utf-8");
mysql_query("SET CHARACTER SET 'utf-8'");

 $curdate=date('Y-m-d',time());
$datefrom=date('Y-m-d', strtotime($curdate .' - '.($output['day']-1).' day'));
$dateto=date('Y-m-d',time()); 
$sql="select `day`,`time`, `type`,`price`,`street`,`square`,`totalroom`,`metro`,`fhone`,`name`,`description` FROM `rent_living` WHERE `day` BETWEEN '".$datefrom."' AND '".$dateto."'";

//$sql="select `day`, `time`, `name`, `fhone` from `rent_living` where 1";

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings


//fputcsv($output, array('Column 1'));
// output the column headings
fputcsv($output, array('Дата','Время','Тип','Цена','Адрес','Площадь','Всего_комнат','Метро','Телефон','Имя','Описание'));
//fputcsv($output, array('День'));

// fetch the data
//mysql_connect('localhost', 'username', 'password');

$link = mysqli_connect($dbhost , $dbuser, $dbpassword);

//print_r( mysqli_character_set_name ( $link ));
//mysql_set_charset($link, "utf8");


    //printf("Select вернул %d строк.\n", mysqli_num_rows($result));
mysqli_set_charset($link, "utf8");                //  
mysqli_select_db($link, $dbname);  //,'testwp1'
$rows = mysqli_query($link,$sql);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) {

	fputcsv($output, $row);
         //var_dump($row);
}
 // mysql_free_result($result);

//}
?>