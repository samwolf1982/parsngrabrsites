   <?php 
   require_once ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
   include_once 'library/sjontocv.php';


?>
<script src="library/vendor/jquery-1.7.2.min.js"></script>
<link href="library/css/ex.css" rel="stylesheet">
<script src="library/jquery.dynatable.js"></script>
<script type='text/javascript'>
//формируем JSON

//отправляем JSON, используем технологию JSONP для кроссдоменной передачи данн                               
</script>

  <script type="text/javascript">

  var JsonData = {
  "test1":"value1",
  "test2":{
          "test2_in":"internal value test2"
  }
}; 
      //  var e = document.getElementById('testForm'); e.action='test.php'; e.submit();
function go2(argument) {



$.ajax({
  type: "POST", //метод запроса, можно POST можно GET (если опустить, то по умолчанию GET)
  url: "gogo.php",
 
  success: function(data) {     

                  //функция выполняется при удачном заверщение
  //  console.log($.parseJSON(data));        //выведем в консоль содержимое test1
  //console.log($.parseJSON(data).test2.test2_in); //выведем в консоль содержимое test2_in

    myRecords = (data);
$('#my-final-table').dynatable({
  dataset: {
    records: myRecords
  }
});


//console.log(data);



console.log("load");

  }




//console.log("GHJKL");


});
}
      </script>
      


  <p style="text-align: center"><button>Кнопка с текстом</button>
  <button><img src="" alt="click me"  
          style="vertical-align: middle" onclick="go2()"> click me</button></p>
<table id="my-final-table">
  <thead>
    <th>Band</th>
    <th>Song</th>
    <th>Band</th>
    <th>Song</th>
    <th>Band</th>
    <th>Song</th>
    <th>Band</th>
    <th>Song</th>
    <th>Band</th>
    <th>Song</th>
    <th>Band</th>
    <th>Song</th>
    <th>Band</th>
    <th>Song</th>
    <th>Band</th>
    <th>Song</th>
  </thead>
  <tbody>
  </tbody>
</table>


<?php





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

$arrElement['Тип']=$pq->text();
 //echo "$pq";



$arrElement['Комнат в сделке']='******';




//price
$a12='tr.detailed-advert:nth-child(1) > td:nth-child(4)';
$str=null;
$str=str_replace('>', '', $a12) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a12);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['Цена']=$pq->text();


$arrElement['Регион']='******';
$arrElement['Район']='******';



//3
$str=null;
$str=str_replace('>', '', $a3) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$arrElement['Улица']=$p_titleInfo->text();




// metro  tr.detailed-advert:nth-child(1) > td:nth-child(13)
$a5='tr.detailed-advert:nth-child(1) > td:nth-child(13)';
$str=null;
$str=str_replace('>', '', $a5) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a5);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['Метро']=$pq->text();;

$arrElement['До метро пешком']=$pq->text();






// 7 floar етажн  tr.detailed-advert:nth-child(1) > td:nth-child(6)
$a7='tr.detailed-advert:nth-child(1) > td:nth-child(6)';
$str=null;
$str=str_replace('>', '', $a7) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a7);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['Этаж']=$pq->text();



//11 floars етажность   tr.detailed-advert:nth-child(1) > td:nth-child(7)
$a11='tr.detailed-advert:nth-child(1) > td:nth-child(7)';
$str=null;
$str=str_replace('>', '', $a11) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a11);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['Этажность']=$pq->text();




// 9 suare   tr.detailed-advert:nth-child(1) > td:nth-child(8) 
$a9='tr.detailed-advert:nth-child(1) > td:nth-child(8)';
$str=null;
$str=str_replace('>', '', $a9) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a9);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['Площадь']=$pq->text();




//2 
$str=null;
$str=str_replace('>', '', $a2) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($str);

//Debuger::dumper($p_titleInfo->text());
$arrElement['Описание']=$p_titleInfo->text();


$arrElement['Доп. Описания']=$p_titleInfo->text();




//14 name tr.detailed-advert:nth-child(1) > td:nth-child(10)
$a14='tr.detailed-advert:nth-child(1) > td:nth-child(10)';
$str=null;
$str=str_replace('>', '', $a14) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a14);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

$arrElement['Имя']=$pq->text();





//13  tel tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(1)

$a13='tr.detailed-advert:nth-child(1) > td:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > span:nth-child(1)';
$str=null;
$str=str_replace('>', '', $a13) ;
$p_titleInfo=null;
$p_titleInfo = $document->find($a13);
 // clear all  class="col-md-6"
 $pq = pq($p_titleInfo);

echo $pq;
$arrElement['Телефон']=$pq->text();





$arrElement['Ссылка']='********';





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
$arrElement['Фото_ссылка']=$arrfoto;




$arrElement['Источник']='******';

$arrElement['ID']='******';  
$arrElement['Количество повторений']='******';

$arrElement['Базы с повторением']='******';

$arrElement['1/0']='******';

$arrElement['Нас. Пункт']='******';

$arrElement['Дом №']='******';
$arrElement['Всего комнат']='******';
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



// metro






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

print_r($resultJsonFile);

return $resultJsonFile;









//$resultJsonFile=json_encode($mainArr, JSON_UNESCAPED_UNICODE);


//$myFile = "resJsonFile.txt";
//$fh = fopen($myFile, 'w') or die("can't open file");

//fwrite($fh, $resultJsonFile);
//fclose($fh);
//print_r($mainArr[1]);
}





              stage1('http://rent-scaner.ru/estate');



    ?>