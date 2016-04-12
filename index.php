   <?php 
   require ('phpQuery/phpQuery/phpQuery.php');
   // заметка вторую позицию обработать ссилку и спан отдельно.
  
  //moreInfoFlat
  //$hentry = $document->find('div.hentry');

function stage1($value='')
{
  # code...

  $habrablog = file_get_contents($value);
  
  $document = phpQuery::newDocument($habrablog);



   //  title  $document->find('');
//1
  $p_titleInfo = $document->find('p.titleInfo');

echo "<br>p_titleInfo :".count($p_titleInfo);
//2
  $p_titleInfo_span= $document->find('.deteiledInfoFlat span a');

  //.priceInfo
echo "<br>$p_titleInfo_span :".count($p_titleInfo_span);

//3
  $priceInfo=$document->find('.priceInfo');
    //.description

echo "<br> priceInfo :".count( $priceInfo);
  
//4
  $description=$document->find('.description');
   //.bgWhite   table

echo "<br> description :".count( $description);
//5
   // $bgWhite_td_div_dateAndAutor=$document->find('.bgWhite td div.dateAndAutor');
 $bgWhite_td_div_dateAndAutor=$document->find('.dateAndAutor span');
//infRoom


echo "<br>bgWhite_td_div_dateAndAutor :".count($bgWhite_td_div_dateAndAutor);

//6
    $bgWhite_td_div_infRoom=$document->find('.bgWhite td div.infRoom p');
//location


echo "<br> bgWhite_td_div_infRoom :".count( $bgWhite_td_div_infRoom);

//7
        $bgWhite_td_div_location=$document->find('td div.location');

 //infoHome

echo "<br>bgWhite_td_div_location :".count($bgWhite_td_div_location);
//8 
         $bgWhite_td_div_infoHome=$document->find('td div.infoHome');
 //listTable   

echo "<br>bgWhite_td_div_infoHome :".count($bgWhite_td_div_infoHome);

//9
     $bgWhite_td_ul_listTable=$document->find('.bgWhite td ul.listTable ');
//moreInfoAutor собствение суборенда ...


echo "<br>bgWhite_td_ul_listTable :".count( $bgWhite_td_ul_listTable);
// 10
      $bgWhite_td_div_moreInfoAutor_strong=$document->find('td div.moreInfoAutor strong ');

echo "<br>bgWhite_td_div_moreInfoAutor_strong :".count($bgWhite_td_div_moreInfoAutor_strong);




    //echo  $bgWhite_td_div_moreInfoAutor_strong;



echo "-------------------<br>";
//.listFlat tr  count el      divide 2  !!!!!
 
  $listFlat_tbody_tr = $document->find('.listFlat tr');
  echo count($listFlat_tbody_tr);

$mainArr=array();

//1
$arrtitleInfo=array();
foreach ($p_titleInfo  as $key => $value) {

  # code...nodeValue
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
}

$mainArr[]=$arrtitleInfo;    

//2
$arrtitleInfo=null;
$arrtitleInfo=array();

/*for ($i=0; $i < count($p_titleInfo_span) ; $i=$i+2) { 
  # code...
    //  $arrtitleInfo['nodeValue_'.$key]=;
      $arrtitleInfo['textContent_'.$i]= $p_titleInfo_span[$i];
      $arrtitleInfo['nodeValue_'.$i+1]=$p_titleInfo_span[$i+1];
      break;

}*/


foreach ($p_titleInfo_span  as $key => $value) {

  # code...nodeValue
      // $arrtitleInfo['nodeValue_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
     // break;
}


$mainArr[]=$arrtitleInfo;   

//3
//$priceInfo
//2
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($priceInfo as $key => $value) {

  # code...nodeValue
     //  $arrtitleInfo['someKey_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
       //break;
}
$mainArr[]=$arrtitleInfo;   

//4
//$priceInfo
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($description as $key => $value) {

  # code...nodeValue
      // $arrtitleInfo['someKey_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
       //break;
}


$mainArr[]=$arrtitleInfo;  


//5
//$priceInfo
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($bgWhite_td_div_dateAndAutor as $key => $value) {

  # code...nodeValue
      // $arrtitleInfo['someKey_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
       //break;
}
$mainArr[]=$arrtitleInfo;  
//6
// bgWhite_td_div_infRoom
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($bgWhite_td_div_infRoom as $key => $value) {

  # code...nodeValue
      // $arrtitleInfo['someKey_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
      // break;
}



$mainArr[]=$arrtitleInfo;  
//7
// bgWhite_td_div_location
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($bgWhite_td_div_location as $key => $value) {

  # code...nodeValue
      // $arrtitleInfo['someKey_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
      // break;
}



$mainArr[]=$arrtitleInfo;  
// 8
// bgWhite_td_div_infoHome
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($bgWhite_td_div_infoHome as $key => $value) {

  # code...nodeValue
     //  $arrtitleInfo['someKey_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
      // break;
}



$mainArr[]=$arrtitleInfo; 

//9
// bgWhite_td_ul_listTable
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($bgWhite_td_ul_listTable as $key => $value) {

  # code...nodeValue
       //$arrtitleInfo['someKey_'.$key]=$value;
     $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
      // break;
}



$mainArr[]=$arrtitleInfo; 

//10
// bgWhite_td_div_moreInfoAutor_strong
$arrtitleInfo=null;
$arrtitleInfo=array();
foreach ($bgWhite_td_div_moreInfoAutor_strong as $key => $value) {

  # code...nodeValue
       //$arrtitleInfo['someKey_'.$key]=$value;
      $arrtitleInfo['textContent_'.$key]=$value->textContent;
      $arrtitleInfo['nodeValue_'.$key]=$value->nodeValue;
      // break;
}



$mainArr[]=$arrtitleInfo; 







$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);


$myFile = "resJsonFile.txt";
$fh = fopen($myFile, 'w') or die("can't open file");

fwrite($fh, $resultJsonFile);
fclose($fh);
//print_r($mainArr[1]);
}



stage1('https://pyxi.ru/base.php');

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