<?php 

// help fun 
          // избавление от кроказябр
//$link = mysqli_connect($dbhost , $dbuser, $dbpassword);
//mysqli_set_charset($link, "utf8");                //  
// 
include_once 'lib/setting.php';
  require_once  'debug/debug.php';
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






$sql="select `street` from `rent_living` where 1 LIMIT 500";

//error_log($sql,3,'log.txt');



//$sql="select `day`, `time`, `name`, `fhone` from `rent_living` where 1";

// create a file pointer connected to the output stream
//$output = fopen('php://output', 'w');

// output the column headings


//fputcsv($output, array('Column 1'));
// output the column headings
/*fputcsv($output, array(
              "Дата",
	         "Время",
	           "Тип",
	      "Описание",
	          "Цена",
	        "Регион",
	     "Нас_пункт",
	         "Улица",
			   "Дом",
 			 "Метро",
   "До_метро_пешком",
     "До_метро_авто",
           "Площадь",
              "Этаж",
         "Этажность",
      "Всего_комнат",
   "Комнат_в_сделке",
               "Имя",
           "Телефон",
              "Фото",
	      "Источник"	

	));*/
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

//    1)  поиск ул ./;.,  возможно бульвар.

      $house=null;

       $arr=  preg_split("/[(Бульвар)|(б)]ульвар/", $row['street']);
          //echo $row['street']."<br>";
    if(count($arr)>1){
    	    echo "<br>";
       //print_r($arr);
        // echo '<br>Result: '. $row['street'].':    ';
         //.    print_r($arr);
      $adress= $arr[0];
     //   echo "Adress:  $adress <br>";
        $t=$arr[1];
        $matches=array();
     $colect=array();
$line = preg_replace_callback(
        '|\d{1,3}|',
        function ($matches) use (&$colect) {

                  $colect[]=$matches[0];
            return ($matches[0]);
        },
       trim(  $arr[1])
    );
   // echo $line;
if(count($colect)>0){
   //echo "<br><br>--------UP<br>";
         	//   echo Debuger::dumper($matches[0]);
         	//echo print_r($matches);
   $house=$colect[0];
           //   echo $row['street'] ."  :::::: ".$colect[0];
             //     echo "<br>-------DOWN";

     }

    }
//      доделать 
if($house==null)
{
    $arr=  preg_split("/(ул.)|(у,)|(ул:)/", $row['street']);
          //echo $row['street']."<br>";
    if(count($arr)>1){
         
    }
 echo "house ".$house ;
}


// end while
}

 // mysql_free_result($result);

//}
?>