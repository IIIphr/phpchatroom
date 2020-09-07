<?php
$mysql = new mysqli("localhost", "root","", "php_chatroom");
$req="SELECT * FROM messages";
$res=$mysql->query($req);
if ($res->num_rows > 0) {
  while($row = $res->fetch_assoc()) {
    echo $row['sender']." : ". $row['message'] . "   : " . $row['time'] ."<br>";
  }
}
?>