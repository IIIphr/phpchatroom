<?php
$mysql = new mysqli("localhost", "root","", "php_chatroom");
$req="SELECT * FROM messages";
$res=$mysql->query($req);
if ($res->num_rows > 0) {
  while($row = $res->fetch_assoc()) {
    $msg="<div class=\"msg\" ><div class=\"sender\" >".$row['sender']."</div><div class=\"txt\" >".$row['message']."</div><div class=\"time\" >".$row['time']."</div></div>";
    echo $msg;
  }
}
$mysql->close();
?>