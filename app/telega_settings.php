<?php

$chat_id = $_POST['chat_id']; // записывает запрос из веб формы в переменную
//$bot_api_token =$_POST['bot_api_token'] // записываем запрос из веб формы в переменную 


$db = new SQLite3('telega.db' );

$db->query("BEGIN;
        CREATE TABLE telega(id INTEGER PRIMARY KEY, chat_id CHAR(255), bot_api_token);
	INSERT INTO telega (chat_id) VALUES('$chat_id');
/   	COMMIT;");
echo $_POST['chat_id']."<br>";
?>
