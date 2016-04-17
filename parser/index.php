<?php
  require_once ('phpQuery/phpQuery/phpQuery.php');
   include_once 'debug/debug.php';
   include_once 'lib/loaddocget.php';
     include_once 'lib/loaddocpost.php';
   include_once 'lib/generator_form_data.php';


   //     get OK
loaddocget('http://rent-scaner.ru/estate');

   // post   OK  
//loaddocpost('http://rent-scaner.ru/estate',generator_form_data(),'rent-scaner.ru');

  ?>