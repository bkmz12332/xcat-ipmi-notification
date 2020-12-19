<?php 
//последние сообшения от серверов
function users(){
  echo "<h2>Последние 20 сообщений от серверов</h2>";
  $db = new SQLite3('test.db');
  $results = $db->query("SELECT * FROM test ORDER BY dat DESC LIMIT 20");
  while ($row = $results->fetchArray()) {
	  echo "{$row['node']} {$row['dat']} {$row['taim']} {$row['event']} \n </br>";
  }
    $db->close();
}

//список узлов 

  function dropdown(){
	  $db = new SQLite3('test.db');
	  $results = $db->query("SELECT DISTINCT node FROM test");
	  while ($row = $results->fetchArray()) {
		  echo "<option value={$row['node']}>" . $row['node'] . "</option>";

	  }  

	  $db->close();
  }

  function show_node(){
          $db = new SQLite3('test.db');
          $results = $db->query("SELECT * FROM test");
          while ($row = $results->fetchArray()) {
//		echo "<div id={$row['node']} 'style="display: none"'>" . $row['event'] . "</div>"; 


          }

          $db->close();
  }


 ?>
