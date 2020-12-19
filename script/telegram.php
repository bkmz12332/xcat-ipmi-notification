
<?php


	$db = new SQLite3('test.db');
	$results = $db->query("SELECT * FROM test ORDER BY dat DESC LIMIT 1"); // запрос с переменной
	while ($row = $results->fetchArray()) {

		 $message = "{$row['node']} {$row['dat']} {$row['event']} {$row['taim']}";
	  }

	  $db->close();



// сюда нужно вписать токен вашего бота
<<<<<<< HEAD
define('TELEGRAM_TOKEN', '12391314asdasd09:AAFBLja_1LMUGwt8VXQ59yMb45EoRqAGGSc');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '880667adasd221');
=======
define('TELEGRAM_TOKEN', '');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '');
>>>>>>> 0457394fa19e17032e8995aa269909f47d7a591a

//$message = $message1;

$ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL

// echo $message ;

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Не возвращать ответ

curl_exec($ch); // Делаем запрос

curl_close($ch); // Завершаем сеанс cURL

?>
