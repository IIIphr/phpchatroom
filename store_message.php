<?php 
$message=$_GET['message'];
$mysql = new mysqli("localhost", "root","", "php_chatroom");
$req="INSERT INTO messages ('message') VALUES (". $message .")";
$mysql->request($req);
echo $_GET . $message . $_GET['message'];
?>