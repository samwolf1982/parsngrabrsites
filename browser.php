<?php


   require_once ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
      include_once 'db.php';

/*phpQuery::$ajaxAllowedHosts[] = "rent-scaner.ru" ;
phpQuery::$ajaxAllowedHosts[] ='google.com';

phpQuery::ajaxAllowHost('google.com'); 
//phpQuery::get('http://google.com/ua');
phpQuery::browserGet('http://google.com/ua', 'success1'); function success1($browser) { $browser ->WebBrowser('success2') ->find('input[name=q]') ->val('search phrase') ->parents('form') ->submit(); } function success2($browser) { print $browser; }
*/

/*phpQuery::ajaxAllowHost('www.google.com'); 
$d= phpQuery::post('http://www.google.com/ua');

print_r($d);*/
/*phpQuery::ajaxAllowHost('rent-scaner.ru'); 
phpQuery::browserGet('http://rent-scaner.ru/estate', 'success1'); 
function success1($browser) 
    { 

 
$document = phpQuery::newDocument($browser);
   	$browser ->WebBrowser('success2') ->find('.btn')->submit();
   		$r= $document->find("div:first-child");

	 echo "$r";
     }
  function success2($browser) {
 echo "string";
   print $browser;
    
    }
*/


phpQuery::ajaxAllowHost('rent-scaner.ru'); 
/*$datapost['_csrf']=['eGxjSW1wUFofLgUMBEUjYi8fEgUOGT8WAj8pDAUEYh4OKDQYXCllGQ=='];
_csrf:eGxjSW1wUFofLgUMBEUjYi8fEgUOGT8WAj8pDAUEYh4OKDQYXCllGQ==
'city]:1628
'section]:2
'source]:
'dateFrom]:15/04/2016
'dateTo]:16/04/2016
'type]:
'district]:
'metro]:
'latitudeFrom]:
'latitudeTo]:
'longitudeFrom]:
'longitudeTo]:
'roomsFrom]:
'roomsTo]:
'squareFrom]:
'squareTo]:
'floorFrom]:
'floorTo]:
'floorsFrom]:
'floorsTo]:
'priceFrom]:
'priceTo]:
'description]:
'address]:

}
';

*/
$d=array();

$b=["_csrf"=>"TUdydWt1cHcZNjdCGgUUGCMGBD1bGTEkLzAKPDkSAkEPFCQXMz9IMg=="
,"searchFilter[city]"=>"1628"
,"searchFilter[section]"=>"1"
,"searchFilter[source]"=>""
,"searchFilter[dateFrom]"=>"15/04/2016"
,"searchFilter[dateTo]"=>"16/04/2016"
,"searchFilter[type]"=>""
,"searchFilter[district]"=>""
,"searchFilter[metro]"=>""
,"searchFilter[latitudeFrom]"=>""
,"searchFilter[latitudeTo]"=>""
,"searchFilter[longitudeFrom]"=>""
,"searchFilter[longitudeTo]"=>""
,"searchFilter[roomsFrom]"=>""
,"searchFilter[roomsTo]"=>""
,"searchFilter[squareFrom]"=>""
,"searchFilter[squareTo]"=>""
,"searchFilter[floorFrom]"=>""
,"searchFilter[floorTo]"=>""
,"searchFilter[floorsFrom]"=>""
,"searchFilter[floorsTo]"=>""
,"searchFilter[priceFrom]"=>""
,"searchFilter[priceTo]"=>""
,"searchFilter[description]"=>""
,"searchFilter[address]"=>""];

$b1=[
"searchFilter[city]"=>"1628"
,"searchFilter[section]"=>"1"
,"searchFilter[source]"=>""
,"searchFilter[dateFrom]"=>"15/04/2016"
,"searchFilter[dateTo]"=>"16/04/2016"
,"searchFilter[type]"=>""
,"searchFilter[district]"=>""
,"searchFilter[metro]"=>""
,"searchFilter[latitudeFrom]"=>""
,"searchFilter[latitudeTo]"=>""
,"searchFilter[longitudeFrom]"=>""
,"searchFilter[longitudeTo]"=>""
,"searchFilter[roomsFrom]"=>""
,"searchFilter[roomsTo]"=>""
,"searchFilter[squareFrom]"=>""
,"searchFilter[squareTo]"=>""
,"searchFilter[floorFrom]"=>""
,"searchFilter[floorTo]"=>""
,"searchFilter[floorsFrom]"=>""
,"searchFilter[floorsTo]"=>""
,"searchFilter[priceFrom]"=>""
,"searchFilter[priceTo]"=>""
,"searchFilter[description]"=>""
,"searchFilter[address]"=>""];



//$d['']['city']=1629;
$d= phpQuery::post('http://rent-scaner.ru/estate',$b,'success1','POST');
//print_r($d);
function success1($value='')
{
	# code...
//	echo "string";
	//echo  $value->find('div');
	 $document = phpQuery::newDocument($value);
	 $a1='.detailed-advert .skip-export >div:first >';
	 //1  время публикации
$str=str_replace('>', '', $a1) ;
$p_titleInfo = $document->find($str);


echo  ($p_titleInfo->text());



	//$r= $document->find("div");
	 //echo "$r";
}







//echo($d->find('div'));

//phpQuery::browserGet('http://www.rent-scaner.ru/estate', 'success1');
//function success3($browser) {
  //$handle = $browser->WebBrowser($browser,'success2')->find('div');
   // echo "ok1";
  //$handle 
    //->find('div');
  //$handle 
   // ->find('input[name=password]')
    // ->val('123456');
      //parents('form')
      //  ->submit();
//}
/*function success4($browser) {
	echo "ok2";
  print $browser;
}*/

//phpQuery::get('http://rent-scaner.ru/estateg'); // or using same string $url = 'http://google.com/ig'; phpQuery::ajaxAllowURL($url); phpQuery::get($url);




  //phpQuery::$ajaxAllowedHosts = "rent-scaner.ru; 
    /*phpQuery::browserGet('http://www.godaddy.com/', 'myCallback');

    function myCallback($browser) {
        echo "myCallback" . PHP_EOL;
        $browser=$browser;
          $document = phpQuery::newDocument($browser);
      // var_dump ($browser->WebBrowser('myCallback2')->find('#searchDomainName')->val("mydomain")->end()->find('#searchButton')->click());
          echo "$document";
    }
    function myCallback2($browser) {
        echo "myCallback2" . PHP_EOL;
        print $browser;
    }*/
//phpQuery::$ajaxAllowedHosts = 'www.rent-scaner.ru'; 
/*phpQuery::browserGet('http://rent-scaner.ru/estate', 'success1'); 

function success1($browser) {
 echo "OK";
 //var_dump
  $o=$browser[0]->find('.btn');
  echo ($browser['document']['xhr']['headers:protected']['user-agent'][0]);
foreach ($browser as $key => $value) {
	# code...
	// Debuger::dumper($value);
echo "$key";

}



 $browser ->WebBrowser('success2')->find('.btn'); } 


 function success2($browser) { 
 echo "OK1";
	print $browser;

	 }
*/


  ?>