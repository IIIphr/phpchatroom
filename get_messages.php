<?php
session_start();
$mysql = new mysqli("localhost", "root","", "php_chatroom");
$req="SELECT * FROM messages";
$res=$mysql->query($req);
if ($res->num_rows > 0) {
  while($row = $res->fetch_assoc()) {
    $msg="";
    if($row['sender']==$_SESSION['sender']){
      $msg=$msg . "<div class=\"messageself\"><div class=\"msgself";
    }
    else{
      $msg=$msg . "<div class=\"messageother\"><div class=\"msg";
    }
    $msg=$msg . "\" ><div class=\"sender\" >".$row['sender']."</div><br><div class=\"txt\" >".$row['message']."</div><br><div class=\"time\" >".$row['time']."</div></div></div>";
    echo $msg;
  }
}
$mysql->close();
?>