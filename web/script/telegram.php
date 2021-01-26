
<?php

// токен бота
 define('TELEGRAM_TOKEN', '1239131409:AAFBLja_1LMUGwt8VXQ59yMb45EoRqAGGSc');
 // ваш внутренний ID
 define('TELEGRAM_CHATID', '880667221');
$message = 'Сообщение';
$ch = curl_init('https://api.telegram.org/bot'.TELEGRAM_TOKEN.'/sendMessage?chat_id='.TELEGRAM_CHATID.'&text='.$message); // URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Не возвращать ответ
curl_exec($ch); // Делаем запрос
curl_close($ch); // Завершаем сеанс cURL

?>
