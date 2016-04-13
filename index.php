   <?php 
   require ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
   include_once 'library/sjontocv.php';



$mainArr[]=array();  



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
$a345 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1)';


//foto  ???  сейчас показать   взять все сссилки. 
//tr.detailed-advert:nth-child(1)   менять 1 для подбора
$a6 ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(2)';
$a7_8_9_10_11_12='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(2)';
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




$a4fordelete ='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1) b';

$a4  ='tr.detailed-advert:nth-child(1)  td:nth-child(2) div:nth-child(2)  div:nth-child(1)  div:nth-child(1)  div:nth-child(3)  div:nth-child(1):nth-child(1)';

//4 dearch b and remove
//distrit
$str=null;
$str=str_replace('>', '', $a4fordelete) ;
$document->find($str)->remove();      // remove b
$str=null;
$str=str_replace('>', '', $a4) ; 
$str=$a4;       
$p_titleInfo=null;
$p_titleInfo = $document->find($str);// find element

//Debuger::dumper($p_titleInfo);
//var_dump($p_titleInfo);
//echo "$p_titleInfo->data";




foreach ($p_titleInfo as $key => $value) {

  //echo 'count ' . $value->data;
/*  foreach ($value->childNodes as $key1 => $value1) {
    # code...
    echo $value1;
  var_dump($value1);
  echo "<br><br>";
    //echo $value1->text();
  }*/
      //echo  $key;
 // var_dump($value);

 
  
}
// echo "$p_titleInfo";*/


//$p_titleInfo = $document->find('tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1)');
//$s=str_replace('<div class="col-md-6">', '', $s);

$s=null;
//$s=htmlspecialchars( $p_titleInfo);
$s=htmlentities ($p_titleInfo,true);
$s=htmlentities($p_titleInfo, ENT_QUOTES | ENT_IGNORE, "UTF-8",false);
$s= str_replace('<br />\r<br />', ";", $s);
//$t="<++>";
//$s= strtr($s, "<++>", "    ");
  //$s=explode("<br>",$s); 
//var_dump( strip_tags ($s));
//Debuger::dumper($s);
//$s=str_replace(['<div', 'class="col-md-6">'],' ', $s);
// $s=strip_tags($s);
//$pos = strpos($s, ">");
//substr_replace();
//$s.chop('<div class="col-md-6">');
echo $s;
//echo $pos;
//echo substr_replace($s,"",0,38);

$arrElement['adress_district_metro_']=$p_titleInfo->text();


//6
$str=null;
$str=str_replace('>', '', $a6) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->elements);
//print_r($p_titleInfo->elements);
$arrElement['foto_links']=$p_titleInfo;


//789101012
$str=null;
$str=str_replace('>', '', $a7_8_9_10_11_12 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->elements);
//print_r($p_titleInfo->elements);
$arrElement['price_type_room_sqare_floor_floors']=$p_titleInfo;

//13
$str=null;
$str=str_replace('>', '', $a13 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//print_r($p_titleInfo->elements);
$arrElement['tel']=$p_titleInfo->text();

//14 name many info
$str=null;
$str=str_replace('>', '', $a14 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//print_r($p_titleInfo->elements);
$arrElement['name']=$p_titleInfo->text();

//15  own
$str=null;
$str=str_replace('>', '', $a15 ) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
//print_r($p_titleInfo->elements);
$arrElement['name']=$p_titleInfo->text();



$mainArr[]=$arrElement;



$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);

//jsontotable($resultJsonFile);
//print_r($resultJsonFile);
//Debuger::dumper($mainArr);
//print_r($resultJsonFile);
//print_r( jsontocv($resultJsonFile));

return;









//$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);


//$myFile = "resJsonFile.txt";
//$fh = fopen($myFile, 'w') or die("can't open file");

//fwrite($fh, $resultJsonFile);
//fclose($fh);
//print_r($mainArr[1]);
}



stage1('http://rent-scaner.ru/estate');

//print_r($hentry);

/*  foreach ($hentry as $el) {
    $pq = pq($el); // Это аналог $ в jQuery
    $pq->find('h2.entry-title > a.blog')->attr('href', 'http://%username%.habrahabr.ru/blog/')->html('%username%'); // меняем атрибуты найденого элемента
    $pq->find('div.entry-info')->remove(); // удаляем ненужный элемент
    $tags = $pq->find('ul.tags > li > a');
    $tags->append(': ')->prepend(' :'); // добавляем двоеточия по бокам
    $pq->find('div.content')->prepend('<br />')->prepend($tags); // добавляем контент в начало найденого элемента
  }
  
  echo $hentry;*/

    ?>