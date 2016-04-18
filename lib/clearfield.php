<?php
// удаляет специфические пробели
function removewhitespace($value='')
{
  # code...
$a = htmlentities($value);

//$d = trim($a, "\xC2\xA0");

$d=preg_replace("/&#?[a-z0-9]{2,8};/i","",$a);
//$d=preg_replace('/(?:&(?:zwn?j|r(?:[sd]quo|lm)|hellip|ndash|frac12|shy|ldquo);|%end%)/','',$a);

//$d=filter_var($a, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$_array = str_split($d);
$maynumber=array();

$state=false;
foreach ($_array as $key => $value) {
  # code...
//  echo "$value ";
  if($state==false){
   // $maynumber[]='2';  
$state=true;
  }
  $maynumber[]= chr( ord($value));
  //echo("ord=".ord($value).  '   chr='.chr( ord($value)).'<br>');

}

$d= implode('', $maynumber);
//echo "$d<br>";
return $d;
}


  ?>