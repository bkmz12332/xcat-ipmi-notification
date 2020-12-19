<?php
echo $_POST['Count']."<br>"; //выводим запрос из html
 $post = $_POST['Count']; // записываем запрос из HTML в переменную
	  $db = new SQLite3('..\telega.db');
	  $results = $db->query("SELECT * FROM `test` WHERE `node` ='".$post."' ORDER BY `dat` DESC"); // запрос с переменной
	  while ($row = $results->fetchArray()) {
		 echo "{$row['node']} {$row['dat']} {$row['event']} {$row['taim']} \n </br>";

	  }

	  $db->close();
?>
