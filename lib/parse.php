<?php 
header('Content-Type: text/html; charset=utf-8');
/* Установка внутренней кодировки в UTF-8 */
mb_internal_encoding("UTF-8");

/* Вывод на экран текущей внутренней кодировки */
//echo mb_internal_encoding();
include_once 'clearfield.php';
include_once 'writetodb.php';
include_once 'is_present_in_db.php';
include_once 'setting.php';
//$GLOBALS['type_base']='rent_living'; //  'rent_business'  'sale_business'  'sale_living'
$GLOBALS['date_publish_state']=false;
$GLOBALS['telcolect']=array();










  // регулярки для старой версии пхп
// today
function my_replace_function1($match){
    global $data;
    $value = date('Y-m-d',time()); 
    $GLOBALS['date_publish_state']=true;
    return $value;
}

//yesterday
function my_replace_function2($match){
global $data;
        $curdate=date('Y-m-d',time());
    $GLOBALS['date_publish_state']=true;
return date('Y-m-d', strtotime($curdate .' -1 day'));

}




// april
function my_replace_function3($match){

 global $data;
            //echo "April";
            if(isset($match[1])){
               // $date_publish=date('Y',time())."-"."04-".($match[1]);
               //echo "$date_publish"; 
      if(strlen($match[1])==1){ 
         $GLOBALS['date_publish_state']=true;
                              return date('Y',time())."-"."04-0".($match[1]);
                            }
                              else{
                                 $GLOBALS['date_publish_state']=true;
                                                    return date('Y',time())."-"."04-".($match[1]);
                              }


            
}
}
// march
function my_replace_function4($match){

 global $data;


            if(isset($match[1])){
                           // echo "len: ".strlen($match[1]);
                         if(strlen($match[1])==1){ 
                                $GLOBALS['date_publish_state']=true;
                             return date('Y',time())."-"."03-0".($match[1]);
                            }
                              else{
                                      $GLOBALS['date_publish_state']=true;
                                                   return date('Y',time())."-"."03-".($match[1]);
                              }

            //   echo "   $date_publish"; 
            }


            
}
//   february
function my_replace_function5($match){

 global $data;

            //echo "April";
            if(isset($match[1])){
                           // echo "len: ".strlen($match[1]);
                         if(strlen($match[1])==1){ 
                               $GLOBALS['date_publish_state']=true;
                             return date('Y',time())."-"."02-0".($match[1]);
                            }
                              else{
                                     $GLOBALS['date_publish_state']=true;
                                                   return date('Y',time())."-"."02-".($match[1]);
                              }

            //   echo "   $date_publish"; 
            }

    

            
}
// january
function my_replace_function6($match){

 global $data;

            //echo "April";
            if(isset($match[1])){
                           // echo "len: ".strlen($match[1]);
                         if(strlen($match[1])==1){ 
                                $GLOBALS['date_publish_state']=true;
                             return date('Y',time())."-"."01-0".($match[1]);
                            }
                              else{
                                      $GLOBALS['date_publish_state']=true;
                                                   return date('Y',time())."-"."01-".($match[1]);
                              }

            //   echo "   $date_publish"; 
            }

    

            
}
function pregreplace8($match)
{
  # code...
 global $data;

 echo '<br>REG:'.  $match[1].'<br>';
return   $time_publish =$match[1].':00';
//echo "in $time_publish<br>";

}

// fhone
 function pregreplase9($match) {
 global $data;
//Debuger::dumper($match[0]);
// var_dump($match[0]);
 $GLOBALS['telcolect'][]=$match[0];
     return $match[0];

}

 function pregreplase10 ($match)  {
   
    global $data;
     return $match[1];

}






function parse($document)
{
	# code...
  $document = phpQuery::newDocument($document);
    //$document1 = phpQuery::newDocument($document);
     // $document2 = phpQuery::newDocument($document);

// количество вкладок
 
 if($GLOBALS['totalparts']== null){



  $a12='div.text-center:nth-child(2) > div:nth-child(2) > b:nth-child(2)';
//$a12='div.text-center:nth-child(2) > div:nth-child(2)';
$str=null;
$str=str_replace('>', '', $a12) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a12);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);
if (preg_match ("/^([0-9]+)$/",$pq->text())) {
    $GLOBALS['totalparts']=(int)$pq->text();
} else {
     $GLOBALS['totalparts']=(int)0;
}

 }




$a3del1="tr.detailed-advert:nth-child(1)";
$a3del="tr.detailed-advert:nth-child()";
//$ddd=$document->find($str=str_replace('>', '', $a3del) );

$filter=$GLOBALS['filter'];
//------------------------------LOOP  begin
$GLOBALS['total_room']=$main_count=$document->find($str=str_replace('>', '', $a3del) )->count();
for ($i=0; $i <$main_count ; $i++) { 
	# code...
 // to do
 //  sleep(1);
  if($i==$GLOBALS['maxcount']) break;
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
     
 
$GLOBALS['date_publish_state']=false;


     $date_publish= preg_replace_callback("/Сегодня/", 'my_replace_function1', $r[0]);

          
 if($GLOBALS['date_publish_state']==false){
    $date_publish= preg_replace_callback("/Вчера/",'my_replace_function2' , $r[0]);
 }

//echo "<br>---$date_publish";
 //    доделать на все месяци  апреля см на сайте   
  if($GLOBALS['date_publish_state']==false){
 
       $date_publish=   preg_replace_callback("/([0-9]{1,2})\s*апреля/", 'my_replace_function3', $r[0]);
     }

   if($GLOBALS['date_publish_state']==false){
   
           //    доделать на все месяци  апреля см на сайте    
     $date_publish=     preg_replace_callback("/([0-9]{1,2})\s*марта/",'my_replace_function4' , $r[0]);  
   }

           if($GLOBALS['date_publish_state']==false){

                     //    доделать на все месяци  февраля см на сайте    
        $date_publish=   preg_replace_callback("/([0-9]{1,2})\s*февраля/",'my_replace_function5' , $r[0]); }

         if($GLOBALS['date_publish_state']==false){

          // января
                               //    доделать на все месяци  zydfhm см на сайте    
        $date_publish=   preg_replace_callback("/([0-9]{1,2})\s*января/",'my_replace_function6', $r[0]); 
      }

}




if(is_array($r) && isset($r[1]) ){
 //  время публикации   ok
//echo "before $p_titleInfo->text()<br>";
$r= preg_split("/ /", $r[1]);

$time_publish = preg_replace_callback("/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]{1,2}[:][0-9]{2})[a-zA-ZА-Яа-я,.-:;\(\)\s]*$/",'pregreplace8' , $r[1]);

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
    $r[]=  preg_replace_callback("/\d/", 'pregreplase9' , $pq->text());
//Debuger::dumper( $GLOBALS['telcolect']);
//print_r( $GLOBALS['telcolect']);
$fhone=implode('',  $GLOBALS['telcolect']);
//    print_r($r);
//$fhone=$r[0];
 $GLOBALS['telcolect']=null;
  $GLOBALS['telcolect']=array();
     //print_r( );
//  --------------ok





 if( is_present_in_db($date_publish,$time_publish,$street,$name,$fhone,$filter)==true){
 //	echo "PRESENT ";
    //echo "<br> Совпадение TEL: ".$fhone."  NAME: ".$name  ;
  //remove
$str=null;
$str=str_replace('>', '', $a3del1) ;
$p_titleInfo=null;
$ddd=$document->find($str);
$ddd->remove();
 

if($GLOBALS['next_if_present']==true)
{ continue;}
else {$GLOBALS['totalparts']=0;  break;}



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


 $price= preg_replace_callback("/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]*)[a-zA-ZА-Яа-я,.:;\sруб.]*$/", 'pregreplase10' ,$d);
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
/*$dbarr['host']="127.0.0.1"; // Хост
$dbarr['user']="root"; // Имя пользователя
$dbarr['pass']=""; // Пароль
$dbarr['dbname']="testwp"; // Имя базы данных



*/

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




$document=null;


//echo $document;
echo "I'm finish";
}