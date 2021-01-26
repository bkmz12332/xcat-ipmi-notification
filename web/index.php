<meta charset="utf-8">
<?php include_once('func.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>последние сообщения от серверов</title>
</head>
<form method="POST" action="action.php">

<select name='Count' onchange="document.getElementById(this.value).style.display='block';">
<option>список узлов</option>
<?php
{
	echo dropdown(); 
	  }
?>
</select>

<!--           <input type="text" name="first" placeholder="node name"> -->
<!--	    <button type="submit" >Send information</button> -->
<input type="submit" value="Отправить!" />
</form>



<body>
<?php
{
//Вывод списка пользователей
	echo users();
 //удаление пользователей
}
?>


<?php
{

echo show_node();
}
?>

<body>
    <button onclick="window.location.href = 'http://127.0.0.1:/telega.php';">Alert Settings</button>
</body>
	
</body>

</html>
