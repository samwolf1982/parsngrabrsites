<?php
       
   require_once ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
   include_once 'library/sjontocv.php';
   include_once 'library/includes/html_table.class.php';
include_once 'lib.php';




$res=stage1('http://rent-scaner.ru/estate');
echo ( $res );

?>

