<?php

$GLOBALS['u_host'] = "127.0.0.1"; // Хост
$GLOBALS['u_user'] = "root"; // Имя пользователя
$GLOBALS['u_pass'] = ""; // Пароль
$GLOBALS['u_dbname'] = "testwp1"; // Имя базы данных
$GLOBALS['total_room'] = 0;
$GLOBALS['filter'] = true; // если false  тогда записивает дубли
$GLOBALS['maxcount'] = 30000; // количество первих записей для проверки можно //ставить 5000     для хостинка 5
$GLOBALS['totalparts'] = null; // rколичество частей
$GLOBALS['per_page'] = 50; // количество елементов на странице 50 250 500 !!!
$GLOBALS['next_if_present'] = false; // true проверять дальше если есть false не проверять дальше если есть
$GLOBALS['write_room'] = 0; // cчетчик

set_time_limit(1000);

?>