<?php 

   require_once ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
      include_once 'db.php';

function stage1($value='')
{
  # code...

  $habrablog = file_get_contents($value);
  
  $document = phpQuery::newDocument($habrablog);

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
  $price=null; 
  $region=null; 
  $punct=null;  // населний пункт
   $street=null;
    $bild=null; 
    $metro=null;
     $tometrowalk=null; 
     $tometrocar=null;
      $square=null; 
      $floar=null; 
      $floars=null; 
       $totalroom=null; 
       $rooms=null;
        $name=null;
         $fhone=null; 
  $foto=null;
   $linke=null;
    $maya=null; $mayb=null; $mayc=null; $mayd=null; $maye=null; $mayf=null; $mayg=null; 





//$a ='';
//1 
$str=str_replace('>', '', $a1) ;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$arrElement['Дата']= date("d F Y");
$arrElement['Время']= date("H:i:s");
$arrElement['Время публикации']= $p_titleInfo->text();
//$arrElement['time_publish']=$p_titleInfo->text();

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

$price=$arrElement['Цена']=$pq->text();







$region=$arrElement['Регион']='******';
$punct=$arrElement['Нас. Пункт']='******';

//3
$str=null;
$str=str_replace('>', '', $a3) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$street=$arrElement['Улица']=$p_titleInfo->text();
$bild= $arrElement['Дом №']='******';


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


$totalroom=$arrElement['Всего комнат']='******';


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
writetodb('1985-12-12', (string)$type,(string) $description,(string) $price, $region, (string)$punct, (string)$street,(string) $bild,(string) $metro,(string) $tometrowalk, (string)$tometrocar, (string)$square, (string)$floar,(string) $floars, (string)$totalroom, (string)$rooms,(string) $name,(string) $fhone, 
  (string)$foto,(string) $linke, (string)$maya,(string) $mayb,(string) $mayc, (string)$mayd, (string)$maye, (string)$mayf, (string)$mayg );
//$d=cleardata("lorte");

//writetodb($d ,'123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123');

//writetodb( cleardata('lorem'),'123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123','123');
/*












$arrElement['Район']='******';










































$arrElement['Ссылка']='********';











$arrElement['ID']='******';  
$arrElement['Количество повторений']='******';

$arrElement['Базы с повторением']='******';

$arrElement['1/0']='******';




//distrit
$str=null;
$str=str_replace('>', '', $a4fordelete) ;
$document->find($str)->remove();      // remove b
$str=null;
//$str=str_replace('>', '', $a4) ; 
$str=$a4;       
$p_titleInfo=null;
$p_titleInfo = $document->find($str);// find element



 
  





// 4 distric   tr.detailed-advert:nth-child(1) > td:nth-child(12)

$a4='tr.detailed-advert:nth-child(1) > td:nth-child(12)';
$str=null;
$str=str_replace('>', '', $a4) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a4);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);
 
$arrDistric=array();
$arrDistric['location']="lorem lorem lorem"; //    later
$arrDistric['link_adress']=$pq->text();
//$arrDistric['link_adress']="loremem";
//echo "pq->text()";
$arrElement['distric']=$arrDistric;






//789101012
$a7_8_9_10_11_12='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(2) ';
$str=null;
$str=str_replace('>', '', $a7_8_9_10_11_12 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);
 $pq->find('.col-md-6')->remove();
 $pq->find('b')->remove();
  $pq->find('span')->remove();
    $pq->find('hr')->remove();
      $pq->find('a')->remove();


$strarr=null;
$strarr=array();
$s=htmlspecialchars_decode( htmlentities ($p_titleInfo));


 //   echo "$s";
$strarr=null;
$strarr=explode('<br>',trim($s));

foreach ($strarr as $key => $value) {
  # code...
  //echo "$value";
}








//10 room  tr.detailed-advert:nth-child(1) > td:nth-child(5)

$a10='tr.detailed-advert:nth-child(1) > td:nth-child(5)';
$str=null;
$str=str_replace('>', '', $a10) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a10);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['room']=$pq->text();






// 9 suare   tr.detailed-advert:nth-child(1) > td:nth-child(8) 
$a9='tr.detailed-advert:nth-child(1) > td:nth-child(8)';
$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['square']=$pq->text();






$a15='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(4)
';
$str=null;
$str=str_replace('>', '', $a15) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a15);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

//echo $pq;
$arrElement['own']=$pq->text();










//13
$str=null;
$str=str_replace('>', '', $a13 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);



//14 name many info
$str=null;
$str=str_replace('>', '', $a14 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);



//15  own
$str=null;
$str=str_replace('>', '', $a15 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);


*/

$mainArr[]=$arrElement;



$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);



return $resultJsonFile;









//print_r($mainArr[1]);
}



 ?>