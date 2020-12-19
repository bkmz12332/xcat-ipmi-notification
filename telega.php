<?php include_once('func.php'); ?>
<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
  <title>Настройки телеги</title>
</head>
<form action="app/telega_settings.php" method="post">

<p>Chat ID: <input name="chat_id" type="text"></p>

<p>BOT API Token: <input name="bot_api_token" type="text"></p>

<p><input type='submit' value='Отправить'></p>

<?php
{

echo show_telega_credentials();
}
?>


</form>
</html>
