<?php
 // help fun
 //echo htmlentities($value1);   show tag    
//   strip_tags       delete tag
 


$GLOBALS['counter']=0;
//подгружаем библиотеку
require_once 'library/simple_html_dom.php';
   // возврат[] списка домов примерно 20 шт.  (adress, host[])

$res=array();
start();

function stage1($url='',$host){

     # code...
  

//создаём новый объект
$html = new simple_html_dom();
//загружаем в него данные
//$html = file_get_html('http://habrahabr.ru/');
$html = file_get_html($url);
if($html==null){
   echo "DONT Open";
  return false;
   
  }
//находим все ссылки на странице и...


// поиск по ид потом перебор детей  id ==ListingResults   доделать
//$result=$html->find('div[id=ListingResults]');

// поиск по классу
$result=$html->find('div[class=df_panelHighlight]');

//->class = 'df_panelHighlight';
  // $result=  $html-> getElementsByTagName ('df_panelHighlight' );
//print_r (res);
$arr=array();
foreach ($result as $key => $value) {
  # code...
  //echo $key;
  $hrefs=$value->find('a');
        foreach ($hrefs as $key1 => $value1) {
   
              $hrefs2=$value1->find('href');

             // echo $host.$value1->href.'<br>';
             array_push($arr, $host.$value1->href);
              break;
                                 
        }
  //echo $value;

}



//освобождаем ресурсы
$html->clear(); 
unset($html);
  echo "Будет обработано ".count($arr)." объектов <br>";
  return $arr;
}













    //  good
 //$res=stage1("http://www.domofond.ru/prodazha-doma-moskva-c3584",'http://www.domofond.ru/');
  
  function start(){
        $GLOBALS['counter']=0;

       $res= stage1("http://www.domofond.ru/prodazha-doma-moskva-c3584",'http://www.domofond.ru/');
//var_dump($tempValue);
      // if(count($tempValue)>0) {
        echo "add to res count: ".count($res)."<br>";

       // $res=$tempValue;
      //}


        $arrAll=array();
// echo  "open res count".count($res)."<br>";    
//print_r($res);
for ($i=0; $i <count($res) ; $i++) { 
  # code...
//if($i==2) break;
if(isset($res[$i])){
   $tempValue=null;   
   $tempValue=stage2($res[$i]);
     //echo "Обработано результат";
     //var_dump($tempValue);
    // echo "<br>";
$arrAll[]=$tempValue;
  // if($tempValue!=false) { }

}


}

 
//print_r($res);
   if(count($arrAll)>0){
    $resultJsonFile=json_encode($arrAll, JSON_UNESCAPED_UNICODE);
var_dump($resultJsonFile);
echo "Colect ".count($arrAll)." elements";

}else{
  echo "This in empty";
}

  }


// part 2
//   class df_listingDetails
// 









function stage2($value='')
{
  # code...
//создаём новый объект
$html = new simple_html_dom();
//загружаем в него данные
//$html = file_get_html('http://habrahabr.ru/');
$html = file_get_html($value);
if($html==null){
   echo "DONT Open";
  return false;
   
  }

$arr=array();
$result=null;
 
 $z=$html->find('div[class=df_listingDetails] h5',0);

//echo  trim( htmlentities($z));
//echo "<br>";
//echo $html->find('div[class=df_listingDetails] h5',1);
$arr['zagolovok']=trim( strip_tags($z));

//    fill table
$result=$html->find('div[class=df_detailsTable] li');
foreach ($result as $key => $value) {
  # code...
   // echo $value;
    //$resText= $value->find('text');
  $arr[trim( $value->find('text',1))]=trim($value->find('text',2)) ;

}
 $arrfoto=array();
//   fill foto --  js_mediaContainer 
$result=$html->find('div[class=js_mediaContainer] li a img');
foreach ($result as $key => $value) {
  # code...
//echo "<br>";
$temp=null;
  // $t =htmlentities($value);
  // echo $t;
preg_match( "|data-original=(.*)w|is", $value, $temp);


$arrfoto[]=trim($temp[1],'", ');

}

$arr['fotos']=$arrfoto;


$html->clear(); 
unset($html);
       echo "обработано ".($GLOBALS['counter']++)."  объектов <br>";

  return $arr;
}

function stage21($value='')
{
  # code...
  
     # code...

//создаём новый объект
$html = new simple_html_dom();
//загружаем в него данные
//$html = file_get_html('http://habrahabr.ru/');
$html = file_get_html($value);
//находим все ссылки на странице и...
if($html==null){
   echo "DONT Open";
  return false;
   
  }

// поиск по ид потом перебор детей  id ==ListingResults   доделать
//$result=$html->find('div[id=ListingResults]');

// поиск по классу
/*$result=$html->find('div[class=df_listingDetails]');

//var_dump($result);
$arr=array();
foreach ($result as $key => $value) {
  # code...
//          H5
  $hrefs=$value->find('h5');
  foreach ($hrefs as $key => $value) {
    # code...
    array_push($arr, $value);
  //  echo $value;
    break;
  }


}
$result=null;
//    fill table
$result=$html->find('div[class=df_detailsTable]');
foreach ($result as $key => $value) {
  # code...
   $tempresA;
      $tempresB;  
  //   echo $value;
     //   Key
        foreach (    $value->find('strong') as $key2 => $value2) {
          # code...
preg_match("|<strong>(.*)</strong>|is", $value2, $tempresA);
//var_dump($tempres);
$tempresA=$tempresA[1];
 //echo "str: ".$tempresA."<br>";

                foreach (    $value2->find('text') as $key3 => $value3) {
          # code...
//preg_match("|<strong>(.*)</strong>|is", $value2, $tempresA);
//var_dump($tempres);
//$tempresA=$tempresA[1];
 //echo "val: ".$value3."<br>";
 break;
     
        }
     
        }

//              value
      $tempresB= strip_tags($value); 

//echo "val ". $tempresB."<br>";
//var_dump ($tempresB);



     array_push($arr, $value);

$tempresA=null;
$tempresB=null;
}*/
//     find corect
$arr=array();
$result=null;
//    fill table
$result=$html->find('div[class=df_detailsTable] li');
foreach ($result as $key => $value) {
  # code...
   // echo $value;
    //$resText= $value->find('text');
  $arr[trim( $value->find('text',1))]=trim( $value->find('text',2)) ;
//echo ($value->find('text',1) )."   ".$value->find('text',2); 

//echo "<br>";
   /*   foreach (    $value->find('text',0) as $key3 => $value3) {
              //  if(!empty($value3))
                //  echo gettype($value3);
   echo $value3."<br>";
 
      }*/
   //var_dump ($resText);

}


//освобождаем ресурсы
$html->clear(); 
unset($html);

  return $arr;

}

//print_r($res);



// own cod
   function  getpagesimpleelement ($url='',$host)
   {
     # code...

//создаём новый объект
$html = new simple_html_dom();
//загружаем в него данные
//$html = file_get_html('http://habrahabr.ru/');
$html = file_get_html($url);
//находим все ссылки на странице и...
if($html==null){
   echo "DONT Open";
  return false;
   
  }

// поиск по ид потом перебор детей  id ==ListingResults   доделать
//$result=$html->find('div[id=ListingResults]');

// поиск по классу
$result=$html->find('div[class=df_panelHighlight]');

//->class = 'df_panelHighlight';
  // $result=  $html-> getElementsByTagName ('df_panelHighlight' );
//print_r (res);

foreach ($result as $key => $value) {
  # code...
  //echo $key;
  $hrefs=$value->find('a');
        foreach ($hrefs as $key1 => $value1) {
   
              $hrefs2=$value1->find('href');

              //echo $host.$value1->href.'<br>';
              break;
                                 
        }
  //echo $value;

}


//echo "string";

if($html->innertext!='' and count($html->find('a'))) {
 foreach($html->find('a') as $a){
 //... что то с ними делаем
 }
}
//освобождаем ресурсы
$html->clear(); 
unset($html);

   }


  function getPage( $url )
  {
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL,$url);
  curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); //агент которым мы представимся
  curl_setopt ($ch, CURLOPT_TIMEOUT, 15 ); // таймаут
  curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec ($ch);
  curl_close($ch);
  //$result = iconv("Windows-1251", "UTF-8", $result); // в случае если кодировка отличается то перекодируем результат.
  //$result = convTegs( $result );
  return $result; //возвращаем  полученную страницу
  }


   
  ?>