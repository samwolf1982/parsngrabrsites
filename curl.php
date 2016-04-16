<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>KOZ1024 Site Parser</title>
<script>
var xmlHttp = false;

function start(){
	//"включаем" картинку загрузки
	document.getElementById('progressbar').innerHTML = '<img src="/images/ajax-loader.gif" border="0" alt="Loading, please wait..." />';
	//инициализация ajax
	try{
		xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch (e){
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch (e2) {
			xmlHttp = false;
		}
	}
	if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
		xmlHttp = new XMLHttpRequest();
	}
	//открываем страницу parser.php
	xmlHttp.open("POST", 'parser.php', true);
	//Устанавливаем заголовок - говорим, что это форма
	xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//задаём функцию-обработчик результата
	xmlHttp.onreadystatechange = parseResult;
	//отправляем запрос
	xmlHttp.send('url='+document.getElementById('url').value+'&types='+document.getElementById('types').value+'&max='+document.getElementById('max').value);
}

function parseResult(){
	//функция-обработчик: если состояние = 4 ("полностью загружено"), то вставляем результат работы скрипта вместо картинки
	xmlHttp.onreadystatechange = function(){
		if (xmlHttp.readyState==4){
			document.getElementById('progressbar').innerHTML	=	'Завершено.<br />'+xmlHttp.responseText;
		}
	}
}

</script>
<style>
	/* Немного украшательств */
	td{
		font-family:	Tahoma;
		font-size:		11pt;
		color:			#185;
		text-align:		left;
	}
</style>
</head>
<body>
<center>
<div id="progressbar"></div>
<!-- Кстати, форму можно не делать, т.к. при отправке мы обращаемся к инпутам с помощью getElementById и отправляем с помощью аякс -->
<table>
	<tr>
		<td>Адрес начальной страницы:</td>
		<td><input type="text" size="40" id="url" value="http://rent-scaner.ru/estate" /></td>
	</tr>
	<tr>
		<td>Типы файлов:</td>
		<td><input type="text" size="10" id="types" value="doc" /></td>
	</tr>
	<tr>
		<td>Максимальное количество файлов</td>
		<td><input type="text" size="5" id="max" value="0" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button" value="Начать" onclick="start()" /></td>
	</tr>
</table>
</center>
</body>
</html>