<?php 
include_once 'clearfield.php';
include_once 'writetodb.php';
include_once 'is_present_in_db.php';
$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['total_room']=0; 
$GLOBALS['filter']=false;

include_once 'setting.php';

//define($rent_living, "rent_living");
//include_once 'lib/library/vendor/jquery-1.7.2.min.js';

//названия бд
// rent_living rentsale_business  sale_living
//$$typebd="rent_living";



function parse($document)
{
	# code...
  $document = phpQuery::newDocument($document);
    //$document1 = phpQuery::newDocument($document);
     // $document2 = phpQuery::newDocument($document);


$a3del1="tr.detailed-advert:nth-child(1)";
$a3del="tr.detailed-advert:nth-child()";
//$ddd=$document->find($str=str_replace('>', '', $a3del) );

$filter=$GLOBALS['filter'];
//------------------------------LOOP  begin
$GLOBALS['total_room']=$main_count=$document->find($str=str_replace('>', '', $a3del) )->count();
for ($i=0; $i <$main_count ; $i++) { 
	# code...
 // to do

//------------------------------LOOP  begin
  $arrElement=array();

$a1='.detailed-advert .skip-export >div:first >';
$a2='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1)';
// addres link
$a3 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) > span:nth-child(2)';

// district
// search b and remove
$a4fordelete ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) b';
$a4 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1)';



//foto  ???  сейчас показать   взять все сссилки. 
//tr.detailed-advert:nth-child(1)   менять 1 для подбора
$a6='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(2) > a:attr("href")';


$a7_8_9_10_11_12='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(2)';

$a9='tr.detailed-advert:nth-child(1) > td:nth-child(3)';
//tel
$a13 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(1)';
//name   many info
 $a14 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(2)';

 // own
  $a15 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(4)';
//$a ='';


$type=null;
$description=null;
$price='-999'; 
$region=$region='Москва';// регион москва 
  $punct=$punct='****';  // населний пункт
   $street=null;
    $bild=null; 
    $metro=null;
     $tometrowalk='****'; 
     $tometrocar='****';
      $square=null; 
      $floar=null; 
      $floars=null; 
       $totalroom=null; 
       $rooms=null;
        $name=null;
         $fhone='****'; 
  $foto=null;
   $linke=null;
$time_publish='00:00:59';  // если ето значение значить ошибка в регулярке
$date_publish='1900-12-31';       // заполнять во время виборочного парсинга по одному дню можно дать в функцию

    $maya=null; $mayb=null; $mayc=null; $mayd=null; $maye=null; $mayf=null; $mayg=null; 

//1  время публикации + дата публикации
$str=str_replace('>', '', $a1) ;
$p_titleInfo = $document->find($str);

//$p_titleInfo->text();
//Debuger::dumper($p_titleInfo->text());
 //  дaтa публикации  
$r= preg_split("/,/", $p_titleInfo->text());

if(is_array($r) && isset($r[0]) ){
     
      preg_replace_callback("/Сегодня/", function ($match) use (&$date_publish) {
$date_publish=date('Y-m-d',time()); 

//$date_publish="1999-12-31";
}, $r[0]);
     preg_replace_callback("/Вчера/", function ($match) use (&$date_publish) {
      	$curdate=date('Y-m-d',time());
$date_publish=date('Y-m-d', strtotime($curdate .' -1 day')); 
}, $r[0]);

 //    доделать на все месяци  апреля см на сайте    
          preg_replace_callback("/([0-9]{1,2})\s*апреля/", function ($match) use (&$date_publish) {
          	//echo "April";
           	if(isset($match[1])){
               // $date_publish=date('Y',time())."-"."04-".($match[1]);
               //echo "$date_publish"; 
      if(strlen($match[1])==1){ 
                            	$date_publish=date('Y',time())."-"."04-0".($match[1]);
                            }
                            	else{
                                                    $date_publish=date('Y',time())."-"."04-".($match[1]);
                            	}


          	}
}, $r[0]);
           //    доделать на все месяци  апреля см на сайте    
          preg_replace_callback("/([0-9]{1,2})\s*марта/", function ($match) use (&$date_publish) {
          	//echo "April";
           	if(isset($match[1])){
                           // echo "len: ".strlen($match[1]);
                         if(strlen($match[1])==1){ 
                            	$date_publish=date('Y',time())."-"."03-0".($match[1]);
                            }
                            	else{
                                                    $date_publish=date('Y',time())."-"."03-".($match[1]);
                            	}

            //   echo "   $date_publish"; 
          	}
}, $r[0]);  

                     //    доделать на все месяци  февраля см на сайте    
          preg_replace_callback("/([0-9]{1,2})\s*февраля/", function ($match) use (&$date_publish) {
          	//echo "April";
           	if(isset($match[1])){
                           // echo "len: ".strlen($match[1]);
                         if(strlen($match[1])==1){ 
                            	$date_publish=date('Y',time())."-"."02-0".($match[1]);
                            }
                            	else{
                                                    $date_publish=date('Y',time())."-"."02-".($match[1]);
                            	}

              //echo "   $date_publish"; 
          	}
}, $r[0]); 
          // января
                               //    доделать на все месяци  февраля см на сайте    
          preg_replace_callback("/([0-9]{1,2})\s*января/", function ($match) use (&$date_publish) {
          	//echo "April";
           	if(isset($match[1])){
                           // echo "len: ".strlen($match[1]);
                         if(strlen($match[1])==1){ 
                            	$date_publish=date('Y',time())."-"."01-0".($match[1]);
                            }
                            	else{
                                                    $date_publish=date('Y',time())."-"."01-".($match[1]);
                            	}

              //echo "   $date_publish"; 
          	}
}, $r[0]); 

}



//echo "before $p_titleInfo->text()<br>";
if(is_array($r) && isset($r[1]) ){
 //  время публикации   ok
  preg_replace_callback("/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]{1,2}[:][0-9]{2})[a-zA-ZА-Яа-я,.:;\s]*$/", function ($match) use (&$time_publish) {
   $time_publish =$match[1].':00';
//echo "in $time_publish<br>";
}, $r[1]);
//echo "after $time_publish<br>";
}


// street bild
$a3='tr.detailed-advert:nth-child(1) > td:nth-child(11)';
$str=null;
$str=str_replace('>', '', $a3) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$street=$bild=$p_titleInfo->text();

 //    ----- ок  50%


//14 name tr.detailed-advert:nth-child(1) > td:nth-child(10)
$a14='tr.detailed-advert:nth-child(1) > td:nth-child(10)';
$str=null;
$str=str_replace('>', '', $a14) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a14);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$name=$pq->text();

$a13='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(1)';
$str=null;
$str=str_replace('>', '', $a13) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a13);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

//echo $pq;
  $r=array();
      preg_replace_callback("/\d/", function ($match) use (&$r) {

      $r[]=$match[0];

}, $pq->text());
//Debuger::dumper($r);
$fhone=implode('', $r);
     //print_r( );
//  --------------ok





 if( is_present_in_db($date_publish,$time_publish,$street,$name,$fhone,$filter)==true){
 //	echo "PRESENT ";
  echo "<br> Совпадение TEL: ".$fhone."  NAME: ".$name  ;
  //remove
$str=null;
$str=str_replace('>', '', $a3del1) ;
$p_titleInfo=null;
$ddd=$document->find($str);
$ddd->remove();
 

 	//return;
 	continue;
 	// break;


 }
 //	echo "after PRESENT<br> ";




//            -------------------- ok

// тип
// type 

$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$type=$pq->text();
 //echo "$pq";
//echo "T: ".$type."<br>";

//2 
$str=null;
$str=str_replace('>', '', $a2) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//$arrElement['Описание']=$p_titleInfo->text();


$description=$p_titleInfo->text();
//echo "$description";
//     -----------------ok


//     price
$a12='tr.detailed-advert:nth-child(1) > td:nth-child(4)';
$str=null;
$str=str_replace('>', '', $a12) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a12);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);


$d=removewhitespace($pq->text());


  preg_replace_callback("/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]*)[a-zA-ZА-Яа-я,.:;\sруб.]*$/", function ($match) use (&$price) {
   $price =$match[1];

},$d);
//------------ ok





// metro  to metro walk car
$a5='tr.detailed-advert:nth-child(1) > td:nth-child(13)';
$str=null;
$str=str_replace('>', '', $a5) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a5);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$metro=$pq->text();;

//$tometrowalk=$pq->text();
//$tometrocar=$pq->text();

//      ok

// 9 suare   tr.detailed-advert:nth-child(1) > td:nth-child(8) 
$a9='tr.detailed-advert:nth-child(1) > td:nth-child(8)';
$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$square=$pq->text();





// 7 floar етажн  tr.detailed-advert:nth-child(1) > td:nth-child(6)
$a7='tr.detailed-advert:nth-child(1) > td:nth-child(6)';
$str=null;
$str=str_replace('>', '', $a7) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a7);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$floar=$pq->text();

//11 floars етажность   tr.detailed-advert:nth-child(1) > td:nth-child(7)
$a11='tr.detailed-advert:nth-child(1) > td:nth-child(7)';
$str=null;
$str=str_replace('>', '', $a11) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a11);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$floars=$pq->text();


//10 room  tr.detailed-advert:nth-child(1) > td:nth-child(5)

$a10='tr.detailed-advert:nth-child(1) > td:nth-child(5)';
$str=null;
$str=str_replace('>', '', $a10) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a10);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

//$arrElement['room']=$pq->text();


$totalroom=$pq->text();;


$rooms='******';




//6 foto

$str=null;
$str=str_replace('>', '', $a6) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->elements);
//echo $p_titleInfo;
$arrfoto=array();
//  echo "$p_titleInfo";
foreach ($p_titleInfo as $key => $value) {
      $pq = pq($value);
      $arrfoto[]=  $pq->attr('href');
  # code...
//  echo "$p_titleInfo";
//echo $value;
  //var_dump ($value);
}
//print_r($arrfoto);
$foto= implode('  |  ',  $arrfoto);


  # code...
$dbarr['host']="127.0.0.1"; // Хост
$dbarr['user']="root"; // Имя пользователя
$dbarr['pass']=""; // Пароль
$dbarr['dbname']="testwp"; // Имя базы данных





writetodb2((string)$date_publish,(string)$time_publish, (string)$type,(string) $description,(string) $price, $region, (string)$punct, (string)$street,(string) $bild,(string) $metro,(string) $tometrowalk, (string)$tometrocar, (string)$square, (string)$floar,(string) $floars, (string)$totalroom, (string)$rooms,(string) $name,(string) $fhone, 
  (string)$foto,(string) $linke, (string)$maya,(string) $mayb,(string) $mayc, (string)$mayd, (string)$maye, (string)$mayf, (string)$mayg );
//echo 'after db';
/*writetodb((string)$dater_publish,(string)$time_publish, (string)$type,(string) $description,(string) $price, $region, (string)$punct, (string)$street,(string) $bild,(string) $metro,(string) $tometrowalk, (string)$tometrocar, (string)$square, (string)$floar,(string) $floars, (string)$totalroom, (string)$rooms,(string) $name,(string) $fhone, 
  (string)$foto,(string) $linke, (string)$maya,(string) $mayb,(string) $mayc, (string)$mayd, (string)$maye, (string)$mayf, (string)$mayg );*/


//cho "FGHJKLGHJEEEEEEEEEEEEEEEEEEEEEE";
// street bild
  //tr.detailed-advert:nth-child(1)


//------------------------------LOOP  end

	//remove
$str=null;
$str=str_replace('>', '', $a3del1) ;
$p_titleInfo=null;
$ddd=$document->find($str);
$ddd->remove();
//$p_titleInfo = $document->find($str);


}


//------------------------------LOOP  end







//echo $document;
echo "I'm finish";
}







 ?>