<?php 

function loaddocget($url)
{
  # code...
  $habrablog = file_get_contents($url);
  //get
  //$document = phpQuery::newDocument($habrablog);
 
 parse($habrablog);


 //echo "";
 //return $document;

 }





 ?>