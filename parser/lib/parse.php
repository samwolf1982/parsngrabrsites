<?php 
include_once 'clearfield.php';
include_once 'writetodb.php';
include_once 'is_present_in_db.php';
//include_once 'lib/library/vendor/jquery-1.7.2.min.js';





function parse($document)
{
	# code...
  $document = phpQuery::newDocument($document);
    //$document1 = phpQuery::newDocument($document);
     // $document2 = phpQuery::newDocument($document);
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

               echo "   $date_publish"; 
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

 if( is_present_in_db($date_publish,$time_publish,$street)==true){
 	echo "PRESENT ";
 	//return;
 }




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
print_r($arrfoto);
$foto= implode('  |  ',  $arrfoto);


  # code...
$dbarr['host']="127.0.0.1"; // Хост
$dbarr['user']="root"; // Имя пользователя
$dbarr['pass']=""; // Пароль
$dbarr['dbname']="testwp"; // Имя базы данных





writetodb2((string)$date_publish,(string)$time_publish, (string)$type,(string) $description,(string) $price, $region, (string)$punct, (string)$street,(string) $bild,(string) $metro,(string) $tometrowalk, (string)$tometrocar, (string)$square, (string)$floar,(string) $floars, (string)$totalroom, (string)$rooms,(string) $name,(string) $fhone, 
  (string)$foto,(string) $linke, (string)$maya,(string) $mayb,(string) $mayc, (string)$mayd, (string)$maye, (string)$mayf, (string)$mayg );
echo 'after db';
/*writetodb((string)$dater_publish,(string)$time_publish, (string)$type,(string) $description,(string) $price, $region, (string)$punct, (string)$street,(string) $bild,(string) $metro,(string) $tometrowalk, (string)$tometrocar, (string)$square, (string)$floar,(string) $floars, (string)$totalroom, (string)$rooms,(string) $name,(string) $fhone, 
  (string)$foto,(string) $linke, (string)$maya,(string) $mayb,(string) $mayc, (string)$mayd, (string)$maye, (string)$mayf, (string)$mayg );*/


//cho "FGHJKLGHJEEEEEEEEEEEEEEEEEEEEEE";
// street bild
  //tr.detailed-advert:nth-child(1)


$a3del1="tr.detailed-advert:nth-child(1)";
$a3del="tr.detailed-advert:nth-child()";
//$ddd=$document->find($str=str_replace('>', '', $a3del) );


$main_count=$document->find($str=str_replace('>', '', $a3del) )->count();
for ($i=0; $i <$main_count ; $i++) { 
	# code...
 // to do



	//remove
$str=null;
$str=str_replace('>', '', $a3del1) ;
$p_titleInfo=null;
$ddd=$document->find($str);
$ddd->remove();
//$p_titleInfo = $document->find($str);


}




//Debuger::dumper($p_titleInfo->text());
//$street=$p_titleInfo->text();
//echo "<br>$street<br>";
// echo "$document";







echo $document;
}


function stage1($value='',$datelook,$region,$punct)
{
  # code...
//phpQuery::plugin('example')
  $habrablog = file_get_contents($value);
  
  $document = phpQuery::newDocument($habrablog);
/*  $document->WebBrowser('callback')->find('body');
  function callback($value='')
  {
    # code...
    echo "DFGHJKL";
  }
*/
 $arrElement=array();
 

   //  title  $document->find('');
//1
  //$p_titleInfo = $document->find('.detailed-advert .skip-export div:first');
//tr.detailed-advert:nth-child(2) > td:nth-child(2) > div:nth-child(1)

    // $p_titleInfo = $document->find('tr.detailed-advert:nth-child(1)   td:nth-child(2)   div:nth-child(2)   div:nth-child(1)   div:nth-child(1)   div:nth-child(1)   div:nth-child(1)');
  //print_r($p_titleInfo);




$a1='.detailed-advert .skip-export >div:first >';
$a2='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1)';
// addres link
$a3 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) > span:nth-child(2)';

// district
// search b and remove
$a4fordelete ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) b';
$a4 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1)';

// search b and remove
//$a345 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1)';


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
$region=$region;// регион москва 
  $punct=$punct;  // населний пункт
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
         $fhone=null; 
  $foto=null;
   $linke=null;
$time_publish='00:00:59';  // если ето значение значить ошибка в регулярке
$dater_publish=$datelook;       // заполнять во время виборочного парсинга по одному дню можно дать в функцию

    $maya=null; $mayb=null; $mayc=null; $mayd=null; $maye=null; $mayf=null; $mayg=null; 






//1  время публикации
$str=str_replace('>', '', $a1) ;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());

//$arrElement['Время']= date("H:i:s");

/*$str="Сегодня,eefew 10:59  e wв";
 preg_replace_callback("/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]{2}[:][0-9]{2})[a-zA-ZА-Яа-я,.:;\s]*$/", function ($match) {
   // return var_dump( $match);
}, $str);
*/

 // дата публикации
$arrElement['Дата публикации']=$dater_publish;
 //  время публикации
  preg_replace_callback("/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]{2}[:][0-9]{2})[a-zA-ZА-Яа-я,.:;\s]*$/", function ($match) use (&$time_publish) {
   $time_publish =$match[1].':00';

}, $p_titleInfo->text());
$arrElement['Время публикации']=$time_publish;


// тип
// type 

$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$type=$arrElement['Тип']=$pq->text();
 //echo "$pq";


//2 
$str=null;
$str=str_replace('>', '', $a2) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//$arrElement['Описание']=$p_titleInfo->text();


$description=$arrElement['Дополнительно']=$p_titleInfo->text();








//price
$a12='tr.detailed-advert:nth-child(1) > td:nth-child(4)';
$str=null;
$str=str_replace('>', '', $a12) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a12);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

//$price=$pq->text();
//$str="wer50 000 dsw";
///$str="dewef";
//$price=str_replace(' ', '', $price);
//Debuger::dumper($pq->text());
//echo "$str";
 //$v=htmlspecialchars_decode(   $pq->text());
 //$d= str_replace('$nbsp;', '',(string)$v );
$d=removewhitespace($pq->text());

//$a = htmlentities($pq->text());

//$d = trim($a, "\xC2\xA0");

//d=preg_replace("/&#?[a-z0-9]{2,8};/i","",$a);
//$d=preg_replace('/(?:&(?:zwn?j|r(?:[sd]quo|lm)|hellip|ndash|frac12|shy|ldquo);|%end%)/','',$a);

//$d=filter_var($a, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
/*$_array = str_split($d);
$maynumber=array();

$state=false;
foreach ($_array as $key => $value) {
  # code...
//  echo "$value ";
  if($state==false){
   // $maynumber[]='2';  
$state=true;
  }
  $maynumber[]= chr( ord($value));
  echo("ord=".ord($value).  '   chr='.chr( ord($value)).'<br>');

}

$d= implode('', $maynumber);
echo "$d<br>";
*/
//echo ord("34");

 //echo $d;
  preg_replace_callback("/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]*)[a-zA-ZА-Яа-я,.:;\sруб.]*$/", function ($match) use (&$price) {
   $price =$match[1];
   //echo "OK";
  //return var_dump( $match);
},$d);

//echo "$price";
//var_dump( $ctime);



//$price=$arrElement['Цена']=$pq->text();

//$price=$arrElement['Цена']='100000007';

$arrElement['Цена']=$price;
//Debuger::dumper($pq->text());






$arrElement['Регион']=$region;
$arrElement['Нас. Пункт']=$punct;

//3
$str=null;
$str=str_replace('>', '', $a3) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$street=$arrElement['Улица']=$p_titleInfo->text();

$bild= $arrElement['Дом №']=$p_titleInfo->text();


// metro  tr.detailed-advert:nth-child(1) > td:nth-child(13)
$a5='tr.detailed-advert:nth-child(1) > td:nth-child(13)';
$str=null;
$str=str_replace('>', '', $a5) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a5);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$metro= $arrElement['Метро']=$pq->text();;

$tometrowalk=$arrElement['До метро пешком']=$pq->text();
$tometrocar=$arrElement['До метро трансп']=$pq->text();

// 9 suare   tr.detailed-advert:nth-child(1) > td:nth-child(8) 
$a9='tr.detailed-advert:nth-child(1) > td:nth-child(8)';
$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$square=$arrElement['Площадь']=$pq->text();





// 7 floar етажн  tr.detailed-advert:nth-child(1) > td:nth-child(6)
$a7='tr.detailed-advert:nth-child(1) > td:nth-child(6)';
$str=null;
$str=str_replace('>', '', $a7) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a7);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$floar=$arrElement['Этаж']=$pq->text();

//11 floars етажность   tr.detailed-advert:nth-child(1) > td:nth-child(7)
$a11='tr.detailed-advert:nth-child(1) > td:nth-child(7)';
$str=null;
$str=str_replace('>', '', $a11) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a11);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$floars=$arrElement['Этажность']=$pq->text();


//10 room  tr.detailed-advert:nth-child(1) > td:nth-child(5)

$a10='tr.detailed-advert:nth-child(1) > td:nth-child(5)';
$str=null;
$str=str_replace('>', '', $a10) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a10);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

//$arrElement['room']=$pq->text();


$totalroom=$arrElement['Всего комнат']=$pq->text();;


$rooms=$arrElement['Комнат в сделке']='******';


//14 name tr.detailed-advert:nth-child(1) > td:nth-child(10)
$a14='tr.detailed-advert:nth-child(1) > td:nth-child(10)';
$str=null;
$str=str_replace('>', '', $a14) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a14);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$name=$arrElement['ФИО собственника']=$pq->text();


$a13='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(1)';
$str=null;
$str=str_replace('>', '', $a13) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a13);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

//echo $pq;
$fhone=$arrElement['Телефон']=$pq->text();



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
$foto=$arrElement['Фото_ссылка']=$arrfoto;



$linke=$arrElement['Источник']='******';



 $maya='*******'; $mayb='*******'; $mayc='*******'; $mayd='*******'; $maye='*******'; $mayf='*******'; $mayg='*******'; 
   $foto="Array here !!!!";

 //echo "$type";
writetodb((string)$dater_publish,(string)$time_publish, (string)$type,(string) $description,(string) $price, $region, (string)$punct, (string)$street,(string) $bild,(string) $metro,(string) $tometrowalk, (string)$tometrocar, (string)$square, (string)$floar,(string) $floars, (string)$totalroom, (string)$rooms,(string) $name,(string) $fhone, 
  (string)$foto,(string) $linke, (string)$maya,(string) $mayb,(string) $mayc, (string)$mayd, (string)$maye, (string)$mayf, (string)$mayg );





//  test
//$nextchild="tr.detailed-advert:nth-child(1)";
//$document->find($nextchild)->remove();




//$d=cleardata("lorte");

//writetodb($d ,'123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123');

//writetodb( cleardata('lorem'),'123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123');


//$mainArr[]=$arrElement;



//$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);



//return $resultJsonFile;









//print_r($mainArr[1]);
}



 ?>