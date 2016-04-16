<?php
   include_once 'debug/debug.php';
//Ставим время выполнения 10 минут
//ini_set('max_execution_time', 600);
//замеряем время начала работы скрипта
$st_time	=	microtime(true);

//устанавливаем переменные...
$url		=	$_POST['url'];
$types		=	$_POST['types'];
$maxPages	=	(int)$_POST['max'];
$host		=	explode('/', substr($url, 7));
$host		=	substr($url, 0, 7).$host[0].'/';
//про последние 2 строчки подробней: таким вот образом получаем Адрес сайта (на случай, если ввели
//адрес странички сайта) - разбиваем на массив по слешу и берём первую часть...

//для удобства работы с КУРЛом, напишем простенькую функцию
//параметры: $host - адрес, $referer - откуда пришли (можно подделать, в статистике парсимого сайта будет отображаться, что мы пришли, например, с Яндекса :))
//$file	- идентификатор файла (если мы хотим скачать файл, то передаём его идентификатор)
function curl_get($host, $referer = null, $file = null){
	//инициализация curl и задание основных параметров
	$ch = curl_init($host);
	//curl_setopt($ch, CURLOPT_USERAGENT, 'KOZ1024');
	curl_setopt($ch, CURLOPT_USERAGENT, "Opera/10.00 (Windows NT 5.1; U; ru) Presto/2.2.0");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_REFERER, $referer);
	//если дали ссылку на файл
	if (!is_null($file)){
		//то устанавливаем опцию записи в файл,
		curl_setopt($ch, CURLOPT_FILE, $file);
		//и выполняем
		curl_exec($ch);
		//не забываем закрыть соединение
		curl_close($ch);
	}else{
		//если же ссылку на файл не дали, то возвращаем страничку
		ob_start();
		curl_exec($ch);
		print(curl_error($ch));
		curl_close($ch);
		return ob_get_clean();
	}
}
//получаем html-код исходной страницы
$page	=	curl_get($url);
//регулярным выражением ищем вхождение ссылок
echo "$page";
preg_match_all('#href="([A-z0-9.-]+)"#', $page, $matches);
//получаем массив всех-всех ссылок с этой старницы
$links		=	$matches[1];
Debuger::dumper($links);
$cnt		=	0;
//цикл: пока не прошли весь массив ссылок, либо пока не скачали макс. количество файлов (не действет в случае 0)
for($i=0; ($i<sizeof($links)&&($cnt<$maxPages||$maxPages==0)); $i++){
	//если в ссылке есть нужное нам расширение
	if (strpos($links[$i], $types)!==false){
		//то открываем файл, "курлим" в него содержимое файла на сервере, закрываем, увеличиваем счётчик
		$fp		=	fopen($links[$i], 'w');
		curl_get($host.$links[$i], $url, $fp);
		fclose($fp);
		$cnt++;
	}else{
		//иначе это ещё одна ссылка, перейдём по ней, найдём все ссылки и занесём их в массив
		$page	=	curl_get($links[$i], $url);
		preg_match_all('#href="([A-z0-9.-]+)"#', $page, $matches);
		$links	=	array_merge($links, $matches[1]);		
	}
}
//замеряем время окончания работы и выводим...
$en_time	=	microtime(true);
print 'Скачано файлов: '.$cnt.'<br />Время выполнения: '.($en_time-$st_time);