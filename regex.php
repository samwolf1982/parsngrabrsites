<?php 
 //help fun
 //preg_match("шаблон_поиска", "строка_в_которой_проводится_поиск", массив_с_результами_поиска)
//preg_replace - заменить
//preg_match - найти соответствие
//preg_split - разбить
// образец
/*$str="Сегодня,eefew 10:59  e wв";
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');*/

$str="26000руб.";
///$str="dewef";
$str=str_replace(' ', '', $str);
//echo "$str";
$ctime="0001";
  preg_replace_callback("/^([0-9]*)[a-zA-ZА-Яа-я,.:;\sруб.]*$/", function ($match) use (&$ctime) {
   $ctime =$match[1];
//  return var_dump( $ctime);
}, $str);


var_dump( $ctime);

// выведет helloWor

$dataPatern=function ($str){

preg_match($pattern, $str,$out);;
   //return $out[1] ;
};


$str="Сегодня,eefew 10:59  e wв";
$pattern="/^[a-zA-ZА-Яа-я,.:;\s]*([0-9]{2}[:][0-9]{2})[a-zA-ZА-Яа-я,.:;\s]*$/";
 //preg_match($pattern, $str); 
 if (preg_match($pattern, $str,$out)){
 	# code...
 	//print_r("OK<br>");

 	//print_r($out);

 }
 else{
 	 //	print_r("NOT");

 }
//print_r();
function test($value='')
{
	# code...
	echo "test";
}

$t='test';
//$t();
?>