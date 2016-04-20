#!/usr/bin/php
#!/usr/bin/env  php
#!/usr/bin/php -n
#!/usr/bin/php -ddisplay_errors=E_ALL
#!/usr/bin/php -n -ddisplay_errors=E_ALL
<?php
header('Content-Type: text/html; charset=utf-8');
//                 caci@leeching.net   mail
//    db                us                 pass
//a1100551_testwp1   a1100551_root
 /* Установка внутренней кодировки в UTF-8 */
mb_internal_encoding("UTF-8");

/* Вывод на экран текущей внутренней кодировки */
//echo mb_internal_encoding();
//echo "string";
include_once 'lib/setting.php';
  require_once ('phpQuery/phpQuery/phpQuery.php');
  require_once  'debug/debug.php';
  require_once  'lib/loaddocget.php';
  require_once  'lib/loaddocpost.php';
     include_once 'lib/generator_form_data.php';
   //require_once 'lib/generator_form_data.php';


//     get OK
//loaddocget('http://rent-scaner.ru/estate');

//echo "OK";

 
 //echo "gogo";



$GLOBALS['write_room']=0;  // count write
$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['filter']=true;   // false all write  truu filter



$datefrom="17/04/2016";  //17/04/2016
$dateto="18/04/2016";   //18/04/2016
 $curdate=date('d-m-Y',time());
$datefrom=date('d/m/Y', strtotime($curdate .' -1 day'));
$dateto=date('d/m/Y',time()); 




$GLOBALS['type_base']='rent_living'; 
$GLOBALS['totalparts']=null;
//div.text-center:nth-child(2) > div:nth-child(2) > b:nth-child(2)

loaddocpost('http://rent-scaner.ru/estate?per-page='.$GLOBALS['per_page'],generator_form_data("507","1",$datefrom,$dateto),'rent-scaner.ru');




if($GLOBALS['totalparts']>$GLOBALS['per_page']){
$r=(int)($GLOBALS['totalparts']/$GLOBALS['per_page']);

 if( ($GLOBALS['totalparts']%(int)$GLOBALS['per_page'])!=0){
 $r++;
 $GLOBALS['totalparts']=$r;
 }


}else
{
	# code...
	$GLOBALS['totalparts']=0;
}
//http://rent-scaner.ru/estate?page=11&per-page=50
for ($i=2; $i <=$GLOBALS['totalparts'] ; $i++) { 
	# code...
loaddocpost('http://rent-scaner.ru/estate?page='.$i.'&per-page='.$GLOBALS['per_page'],generator_form_data("507","1",$datefrom,$dateto),'rent-scaner.ru');
sleep(5);

}

//-----------------  sale_living

$GLOBALS['type_base']='sale_living'; 
$GLOBALS['totalparts']=null;
//div.text-center:nth-child(2) > div:nth-child(2) > b:nth-child(2)

loaddocpost('http://rent-scaner.ru/estate?per-page='.$GLOBALS['per_page'],generator_form_data("507","2",$datefrom,$dateto),'rent-scaner.ru');


;

if($GLOBALS['totalparts']>$GLOBALS['per_page']){
$r=(int)($GLOBALS['totalparts']/$GLOBALS['per_page']);
 if( ($GLOBALS['totalparts']%(int)$GLOBALS['per_page'])!=0){
 $r++;
 $GLOBALS['totalparts']=$r;
 }


}else
{
	# code...
	$GLOBALS['totalparts']=0;
}
//http://rent-scaner.ru/estate?page=11&per-page=50
for ($i=2; $i <=$GLOBALS['totalparts'] ; $i++) { 
	# code...
loaddocpost('http://rent-scaner.ru/estate?page='.$i.'&per-page='.$GLOBALS['per_page'],generator_form_data("507","2",$datefrom,$dateto),'rent-scaner.ru');
sleep(5);

}


//-----------------  rent_business

/*$GLOBALS['type_base']='rent_business'; 
$GLOBALS['totalparts']=null;
//div.text-center:nth-child(2) > div:nth-child(2) > b:nth-child(2)

loaddocpost('http://rent-scaner.ru/estate?per-page='.$GLOBALS['per_page'],generator_form_data("507","3",$datefrom,$dateto),'rent-scaner.ru');



if($GLOBALS['totalparts']>$GLOBALS['per_page']){
$r=(int)($GLOBALS['totalparts']/$GLOBALS['per_page']);
 if( ($GLOBALS['totalparts']%(int)$GLOBALS['per_page'])!=0){
 $r++;
 $GLOBALS['totalparts']=$r;
 }


}else
{
	# code...
	$GLOBALS['totalparts']=0;
}
//http://rent-scaner.ru/estate?page=11&per-page=50
for ($i=2; $i <=$GLOBALS['totalparts'] ; $i++) { 
	# code...
loaddocpost('http://rent-scaner.ru/estate?page='.$i.'&per-page='.$GLOBALS['per_page'],generator_form_data("507","3",$datefrom,$dateto),'rent-scaner.ru');
sleep(5);
}

//-----------------  sale_business
$GLOBALS['totalparts']=null;
$GLOBALS['type_base']='sale_business'; 

//div.text-center:nth-child(2) > div:nth-child(2) > b:nth-child(2)

loaddocpost('http://rent-scaner.ru/estate?per-page='.$GLOBALS['per_page'],generator_form_data("507","4",$datefrom,$dateto),'rent-scaner.ru');



if($GLOBALS['totalparts']>$GLOBALS['per_page']){
$r=(int)($GLOBALS['totalparts']/$GLOBALS['per_page']);
 if( ($GLOBALS['totalparts']%(int)$GLOBALS['per_page'])!=0){
 $r++;
 $GLOBALS['totalparts']=$r;
 }


}else
{
	# code...
	$GLOBALS['totalparts']=0;
}
//http://rent-scaner.ru/estate?page=11&per-page=50
for ($i=2; $i <=$GLOBALS['totalparts'] ; $i++) { 
	# code...
loaddocpost('http://rent-scaner.ru/estate?page='.$i.'&per-page='.$GLOBALS['per_page'],generator_form_data("507","4",$datefrom,$dateto),'rent-scaner.ru');
sleep(5);
}
*/



  ?>