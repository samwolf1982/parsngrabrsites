<?php 
include_once 'library/includes/html_table.class.php';
include_once 'lib.php';
?>
<link href="library/css/ex.css" rel="stylesheet">
<script src="library/vendor/jquery-1.7.2.min.js"></script>
<script src="library/jquery.dynatable.js"></script>


  <button  onclick="addrentscanerRow()" ><img height="100"  width="120"  src="/img/dollar.png" alt="click me"  
          style="vertical-align: middle" > Rent scaner</button>


       <script type="text/javascript">
       	

       	function addrentscanerRow(argument) {
       		// body...



       		//console.log("FGHJK");
       		var table = $('#rentabid ');    
       var r='<tr> <td>999 April 2016</td> <td>03:08:33</td> <td> Сегодня, 9:55 </td> <td>Авто</td> <td>******</td> <td>3 500 руб.</td> <td>******</td> <td>******</td> <td>ул.Костромская,д.6</td> <td>Бибирево</td> <td>Бибирево</td> <td>—</td> <td>—</td> <td>—</td> <td> Сдам машиноместо на длительный срок .Автостоянка,расположена между домом 6 и домом 10 по Костромской ул. </td> <td> Сдам машиноместо на длительный срок .Автостоянка,расположена между домом 6 и домом 10 по Костромской ул. </td> <td>Мария</td> <td>(905) 518-**-**</td> <td>********</td> <td>http://83.img.avito.st/1280x960/2554247283.jpg | http://02.img.avito.st/1280x960/2554247302.jpg | http://35.img.avito.st/1280x960/2554247335.jpg</td> <td>******</td> <td>******</td> <td>******</td> <td>******</td> <td>******</td> <td>******</td> <td>******</td> <td>******</td> <td>lorem lorem lorem | —</td> <td>—</td> <td>—</td> <td>Собственник</td> </tr>';
      // table.insertAfter(r, table.firstChild());
    //  $('#rentabid tr:first-child').after(r);
      // table.prepend(r);
$.ajax({
  type: "POST", //метод запроса, можно POST можно GET (если опустить, то по умолчанию GET)
  url: "gogo2.php",
 
  success: function(data) {     

 //функция выполняется при удачном заверщение
  //  console.log($.parseJSON(data));        //выведем в консоль содержимое test1
  //console.log($.parseJSON(data).test2.test2_in); //выведем в консоль содержимое test2_in
    //myRecords = (data);
    var s='<tr>'
    console.log("OK");
        console.log(data);

    var obj = jQuery.parseJSON(data);
    //alert(data);
   // console.log(obj);
    //console.log(obj[0].own);
      //  $('#rentabid tr:first-child').after(data);
for (property in obj[0]){
   s+=('<td>'+   obj[0][property].toString().substr(0,200)+'</td>');

}
  s+='</tr>';
  //console.log(s );
  $('#rentabid tr:first-child').after(s);

  }

});





       	}
       </script>   
<?php

$arr ='[{"Дата":"14 April 2016","Время":"03:08:33","Время публикации":"\n  Сегодня, 9:55 \n","Тип":"Авто","Комнат в сделке":"******","Цена":"3 500 руб.","Регион":"******","Район":"******","Улица":"ул.Костромская,д.6","Метро":"Бибирево","До метро пешком":"Бибирево","Этаж":"—","Этажность":"—","Площадь":"—","Описание":"\n                    Сдам машиноместо на длительный срок .Автостоянка,расположена между домом 6 и домом 10 по Костромской ул.\n                ","Доп. Описания":"\n                    Сдам машиноместо на длительный срок .Автостоянка,расположена между домом 6 и домом 10 по Костромской ул.\n                ","Имя":"Мария","Телефон":"(905) 518-**-**","Ссылка":"********","Фото_ссылка":["http:\/\/83.img.avito.st\/1280x960\/2554247283.jpg","http:\/\/02.img.avito.st\/1280x960\/2554247302.jpg","http:\/\/35.img.avito.st\/1280x960\/2554247335.jpg"],"Источник":"******","ID":"******","Количество повторений":"******","Базы с повторением":"******","1\/0":"******","Нас. Пункт":"******","Дом №":"******","Всего комнат":"******","distric":{"location":"lorem lorem lorem","link_adress":"—"},"room":"—","square":"—","own":"Собственник"}]';


//$v=jsontocsv($arr,' | ' );

$v= jsontocsv(  stage1('http://rent-scaner.ru/estate','1900-12-31','Москва подмосков','Москва'),' | ');
 //echo "$res";     
//$v=jsontocsv($v,' | ' );


$tbl = new HTML_Table('rentabid', 'demoTbl');
//$tbl->addCaption('Отчет', 'cap', array('id'=> 'tblCap') );

$tbl->addRow();
    // arguments: cell content, class, type (default is 'data' for td, pass 'header' for th)
    // can include associative array of optional additional attributes
foreach ($v['tabnames'] as $key => $value) {
	# code...
	    $tbl->addCell($value, '', 'header');
}
 /*   $tbl->addCell('Product', 'first', 'header');
    $tbl->addCell('Single Item', '', 'header');
    $tbl->addCell('1 Dozen', '', 'header');
    */
	 $tbl->addRow();
     	foreach ($v['content'] as $key => $value) {
    		# code...
        try {
          if (is_array($value)) {

            var_dump($key);
            var_dump($value);
     $tbl->addCell('my value array');
                        # code...
          }else{
              $v=strip_tags($value);
              $v=substr($v,0,100);
              $tbl->addCell($v);
            }
        } catch (Exception $e) {
          echo "Error 98   strip_tags";
            print_r($value);
        }
    
    	}
 /*   	$tbl->addRow();
     	foreach ($v['content'] as $key => $value) {
    		# code...
    		  $tbl->addCell($value);
    	}*/

    
$tbl->addRow();
  //  $tbl->addCell('All so very yummy!', 'foot', 'data', array('colspan'=>3) );
    
echo $tbl->display();






//foreach (jsontocsv($arr,' | ' ) as $key => $value) {
	# code...

	      //print_r($value) ;
	      //echo "<br>";
// echo  implode( $value);
//}



function jsontocsv($value='',$separator)
{
  # code...
/*
* Convert JSON file to CSV and output it.
*
* JSON should be an array of objects, dictionaries with simple data structure
* and the same keys in each object.
* The order of keys it took from the first element.
*
* Example:
* json:
* [
*  { "key1": "value", "kye2": "value", "key3": "value" },
*  { "key1": "value", "kye2": "value", "key3": "value" },
*  { "key1": "value", "kye2": "value", "key3": "value" }
* ]
*
* The csv output: (keys will be used for first row):
* 1. key1, key2, key3
* 2. value, value, value
* 3. value, value, value
* 4. value, value, value
*
* Uses:
* json-to-csv.php file.json > file.csv
*/
//if (empty($value) die("The json file name or URL is missed\n");
//$jsonFilename = $value;
//$json = file_get_contents($jsonFilename);
$array = json_decode($value, true);
//$f = fopen('php://output', 'w');
$firstLineKeys = false;
$resultarr=array();

foreach ($array as $key => $value) {
	# code...
     foreach ($value as $key => $value) {
     
     $resultarr['tabnames'][]= $key;
     
     }
      break;       
	
}


foreach ($array as $line)
{


	foreach ($line as $key => $value) {
		# code...
    // echo "$value .<br>";           
            
	 if(	is_array($value)) {
	 	$a=array();
			 foreach ($value as $key1 => $value1) {
			 	# code...
			 	  $a[]=$value1;
			 	 // echo "$key $key1  :   $value1   <br>";
	    $value= implode($separator, $a);		  
			 }
		}

 $resultarr['content'][]=$value;
	    //echo "$key  :   $value   <br>";
	}



  {
    //$firstLineKeys = array_keys($line);
    //fputcsv($f, $firstLineKeys);
  //  $firstLineKeys = array_flip($firstLineKeys);
  }
  // Using array_merge is important to maintain the order of keys acording to the first element
//  fputcsv($f, array_merge($firstLineKeys, $line));
}

return $resultarr;
}







 ?>