<?php 
include_once 'lib/setting.php';

$dbhost = $GLOBALS['u_host']; // Хост
$dbuser = $GLOBALS['u_user']; // Имя пользователя
$dbpassword =$GLOBALS['u_pass']; // Пароль
$dbname = $GLOBALS['u_dbname']; // Имя базы данных
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

//$sql="select `day` as `День` , `time` as `Время`,`price` as `Цена`,`street` as `Улица`, `totalroom` as `Комнат` ,`floar` as `Этаж`,`fhone` as `Телефон`, `name` as `Имя` from `rent_living` WHERE 1";
//$sql="select `day` from `rent_living` where 1";
$sql="select `day`, `time`, `name`, `fhone` from `rent_living` where 1";
// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings


//fputcsv($output, array('Column 1'));
// output the column headings
fputcsv($output, array('День','Время','Имя','Телефон'));
//fputcsv($output, array('День'));

// fetch the data
//mysql_connect('localhost', 'username', 'password');

$link = mysql_connect($dbhost , $dbuser, $dbpassword);

//print_r( mysqli_character_set_name ( $link ));
//mysqli_set_charset($link, "utf8");


    //printf("Select вернул %d строк.\n", mysqli_num_rows($result));

mysql_select_db($dbname);
$rows = mysql_query($sql);

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) {fputcsv($output, $row);}
 // mysql_free_result($result);

?>