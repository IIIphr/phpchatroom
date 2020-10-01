<?php
session_start();
$mysql = new mysqli("localhost", "root","", "php_chatroom");
$req="SELECT * FROM messages";
$res=$mysql->query($req);
if ($res->num_rows > 0) {
  while($row = $res->fetch_assoc()) {
    $div;$sender;$msg;$time;
    if($row['sender']==$_SESSION['sender']){
      $div="messageself";
      $sender="senderself";
      $msg="msgself";
      $time="timeself";
    }
    else{
      $div="messageother";
      $sender="sender";
      $msg="msg";
      $time="time";
    }
    $msg="<div class=\"".$div."\"><div class=\"".$msg."\" ><div class=\"".$sender."\" >".$row['sender']."</div><br><p class=\"txt\" >".$row['message']."</p><br><div class=\"".$time."\" >".$row['time']."</div></div></div>";
    echo $msg;
  }
}
echo "<div id=\"endscroll\"></div>";
$mysql->close();
?>