<?php
       
   require_once ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
   include_once 'library/sjontocv.php';
//var_dump($_POST);
//$data = json_decode($_POST['request']);

//echo  json_encode($j);
//echo  json_encode( [{"name":"Adam","age":"25","surname":"charles"}]);
//echo $data->test1;              // параметр test1
//echo $data->test2->test2_in;  // параметр test2_in вложенный в test2

   //cho json_encode(  [{"band": "Weezer", "song": "El Scorcho"}, {"band": "Chevelle", "song": "Family System"} ]);


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
//
//$a ='';
//1 
$str=str_replace('>', '', $a1) ;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$arrElement['curent_time']= date("d F Y"). "  ".date("H:i:s");;
$arrElement['time_publish']=$p_titleInfo->text();


//2 
$str=null;
$str=str_replace('>', '', $a2) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$arrElement['description']=$p_titleInfo->text();

//3
$str=null;
$str=str_replace('>', '', $a3) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$arrElement['link_at_map_adress']=$p_titleInfo->text();




//$a4fordelete ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) b';

//$a4  ='tr.detailed-advert:nth-child(1)  td:nth-child(2) div:nth-child(2)  div:nth-child(1)  div:nth-child(1)  div:nth-child(3)  div:nth-child(1):nth-child(1)';

//4 dearch b and remove
//distrit
$str=null;
$str=str_replace('>', '', $a4fordelete) ;
$document->find($str)->remove();      // remove b
$str=null;
//$str=str_replace('>', '', $a4) ; 
$str=$a4;       
$p_titleInfo=null;
$p_titleInfo = $document->find($str);// find element



 
  
//      distric metro old

/*$s=null;

$s=htmlspecialchars_decode( htmlentities ($p_titleInfo));

$s= str_replace('<div class="col-md-6">',' ' , $s);


$strarr=explode('<br>',$s);

try {

  if(htmlentities ($strarr[1])==' &mdash;'){
    $arrElement['district']='-----';
  }else
  $arrElement['district']=htmlentities ($strarr[1]);
$arrElement['metro']=htmlspecialchars( htmlentities ($strarr[2]));



} catch (Exception $e) {
  echo "Error 345 ".e;
}

*/




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

// metro  tr.detailed-advert:nth-child(1) > td:nth-child(13)
$a5='tr.detailed-advert:nth-child(1) > td:nth-child(13)';
$str=null;
$str=str_replace('>', '', $a5) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a5);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['metro']=$pq->text();;

// metro





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
$arrElement['foto']=$arrfoto;
//print_r($p_titleInfo);



//$arrElement['foto_links']=$p_titleInfo;


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
//$s=htmlentities($p_titleInfo, ENT_QUOTES | ENT_IGNORE, "UTF-8",false);
//$delimetr="::::::";
//echo $s;
//echo $s;
//$s= str_replace('<div class="col-md-6">',' ' , $s);
//$s= str_replace('<br>',$delimetr , $s);

 //   echo "$s";
$strarr=null;
$strarr=explode('<br>',trim($s));

foreach ($strarr as $key => $value) {
  # code...
  //echo "$value";
}

// type 

$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['type']=$pq->text();
 //echo "$pq";



//price
$a12='tr.detailed-advert:nth-child(1) > td:nth-child(4)';
$str=null;
$str=str_replace('>', '', $a12) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a12);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['price']=$pq->text();


//10 room  tr.detailed-advert:nth-child(1) > td:nth-child(5)

$a10='tr.detailed-advert:nth-child(1) > td:nth-child(5)';
$str=null;
$str=str_replace('>', '', $a10) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a10);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['room']=$pq->text();


//11 floars етажность   tr.detailed-advert:nth-child(1) > td:nth-child(7)
$a11='tr.detailed-advert:nth-child(1) > td:nth-child(7)';
$str=null;
$str=str_replace('>', '', $a11) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a11);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['floars']=$pq->text();

// 7 floar етажн  tr.detailed-advert:nth-child(1) > td:nth-child(6)
$a7='tr.detailed-advert:nth-child(1) > td:nth-child(6)';
$str=null;
$str=str_replace('>', '', $a7) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a7);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['floar']=$pq->text();

// 9 suare   tr.detailed-advert:nth-child(1) > td:nth-child(8) 
$a9='tr.detailed-advert:nth-child(1) > td:nth-child(8)';
$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['square']=$pq->text();


//14 name tr.detailed-advert:nth-child(1) > td:nth-child(10)
$a14='tr.detailed-advert:nth-child(1) > td:nth-child(10)';
$str=null;
$str=str_replace('>', '', $a14) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a14);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['name']=$pq->text();

//13  tel tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(1)

$a13='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(1)';
$str=null;
$str=str_replace('>', '', $a13) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a13);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

echo $pq;
$arrElement['tel']=$pq->text();




//15 own   tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(4)

$a15='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(4)
';
$str=null;
$str=str_replace('>', '', $a15) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a15);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

echo $pq;
$arrElement['own']=$pq->text();

//$price[]=htmlentities ( $strarr[2]);
//$arrElement['price']= htmlentities ( $strarr[2]);;

//$arrElement['price']= isset( $strarr[2])?  $strarr[2]  :'---';
//$arrElement['price']=htmlspecialchars( htmlentities ($strarr[2]));
//$arrElement['price']=htmlspecialchars($strarr[2]);
//var_dump($strarr);




//Debuger::dumper($p_titleInfo->elements);
//print_r($p_titleInfo->elements);
//$arrElement['price_type_room_sqare_floor_floors']=$p_titleInfo;
//echo $p_titleInfo;//
//echo $pq;





//13
$str=null;
$str=str_replace('>', '', $a13 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//print_r($p_titleInfo->elements);
//$arrElement['tel']=$p_titleInfo->text();

//14 name many info
$str=null;
$str=str_replace('>', '', $a14 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//print_r($p_titleInfo->elements);
//$arrElement['name']=$p_titleInfo->text();

//15  own
$str=null;
$str=str_replace('>', '', $a15 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//print_r($p_titleInfo->elements);
//$arrElement['name']=$p_titleInfo->text();



$mainArr[]=$arrElement;



$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);

//jsontotable($resultJsonFile);
//print_r($resultJsonFile);
//Debuger::dumper($mainArr);

//print_r($resultJsonFile);

return $resultJsonFile;









//$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);


//$myFile = "resJsonFile.txt";
//$fh = fopen($myFile, 'w') or die("can't open file");

//fwrite($fh, $resultJsonFile);
//fclose($fh);
//print_r($mainArr[1]);
}

$res=stage1('http://rent-scaner.ru/estate');
   echo ( $res );
?>

