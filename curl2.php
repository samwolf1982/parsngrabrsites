<?PHP
$curl = curl_init(); // инициализируем cURL
/*Дальше устанавливаем опции запроса в любом порядке*/
//Здесь устанавливаем URL к которому нужно обращаться
curl_setopt($curl, CURLOPT_URL, 'https://www.olark.com/login/');
//Настойка опций cookie
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cook.txt');//сохранить куки в файл
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cook.txt');//считать куки из файла
//устанавливаем наш вариат клиента (браузера) и вид ОС
curl_setopt($curl, CURLOPT_USERAGENT, "Opera/10.00 (Windows NT 5.1; U; ru) Presto/2.2.0");
//Установите эту опцию в ненулевое значение, если вы хотите, чтобы PHP завершал работу скрыто, если возвращаемый HTTP-код имеет значение выше 300. По умолчанию страница возвращается нормально с игнорированием кода.
curl_setopt($curl, CURLOPT_FAILONERROR, 1);
//Устанавливаем значение referer - адрес последней активной страницы
curl_setopt($curl, CURLOPT_REFERER, 'http://www.olark.com/');
//Максимальное время в секундах, которое вы отводите для работы CURL-функций.
curl_setopt($curl, CURLOPT_TIMEOUT, 3);
curl_setopt($curl, CURLOPT_POST, 1); // устанавливаем метод POST
//ответственный момент здесь мы передаем наши переменные
curl_setopt($curl, CURLOPT_POSTFIELDS, 'http://www.olark.com/login/');
//Установите эту опцию в ненулевое значение, если вы хотите, чтобы шапка/header ответа включалась в вывод.
curl_setopt($curl, CURLOPT_HEADER, 1);
//Внимание, важный момент, сертификатов, естественно, у нас нет, так что все отключаем
curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);// разрешаем редиректы
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($curl); // выполняем запрос и записываем в переменную
curl_close($curl); // заканчиваем работу curl
 
//подключаем PHP Simple HTML DOM Parser с сайта http://simplehtmldom.sourceforge.net
include_once('library/simple/simple.php');
 
$html = str_get_html($html);
 echo $html;
//ищем в странице некий authenticity_token и записываем его в переменную $token
$inputs = $html->find("input[name=authenticity_token]");
$input = $inputs[0];
$token = $input->value;
echo $token;
 
// ниже авторизуемся на сайте со значением authenticity_token в переменной $token
$curl = curl_init(); // инициализируем cURL
/*Дальше устанавливаем опции запроса в любом порядке*/
//Здесь устанавливаем URL к которому нужно обращаться
curl_setopt($curl, CURLOPT_URL, 'https://www.olark.com/login/');
//Настойка опций cookie
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cook.txt');//сохранить куки в файл
curl_setopt($curl, CURLOPT_COOKIEFILE, 'cook.txt');//считать куки из файла
//устанавливаем наш вариат клиента (браузера) и вид ОС
curl_setopt($curl, CURLOPT_USERAGENT, "Opera/10.00 (Windows NT 5.1; U; ru) Presto/2.2.0");
//Установите эту опцию в ненулевое значение, если вы хотите, чтобы PHP завершал работу скрыто, если возвращаемый HTTP-код имеет значение выше 300. По умолчанию страница возвращается нормально с игнорированием кода.
curl_setopt($curl, CURLOPT_FAILONERROR, 1);
//Устанавливаем значение referer - адрес последней активной страницы
curl_setopt($curl, CURLOPT_REFERER, 'http://www.olark.com/');
//Максимальное время в секундах, которое вы отводите для работы CURL-функций.
curl_setopt($curl, CURLOPT_TIMEOUT, 3);
curl_setopt($curl, CURLOPT_POST, 1); // устанавливаем метод POST
//ответственный момент здесь мы передаем наши переменные
//замените значения your_name и your_pass на соответственные значения Вашей учетной записи
curl_setopt($curl, CURLOPT_POSTFIELDS, 'http://www.olark.com/login/&authenticity_token='.$token.'&username=Oboronitel&password=Vladislavrkfc');
//Установите эту опцию в ненулевое значение, если вы хотите, чтобы шапка/header ответа включалась в вывод.
curl_setopt($curl, CURLOPT_HEADER, 1);
//Внимание, важный момент, сертификатов, естественно, у нас нет, так что все отключаем
curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);// разрешаем редиректы
$result = curl_exec($curl); // выполняем запрос и записываем в переменную
curl_close($curl); // заканчиваем работу curl
 
echo $result; // Выводим на экран результат выполнения
 