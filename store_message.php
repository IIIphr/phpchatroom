<?php 
$message=$_REQUEST['message'];
$mysql = new mysqli("localhost", "root","", "php_chatroom");
$req="INSERT INTO messages ('message') VALUES (". $message .")";
$mysql->request($req);
echo $_REQUEST . $_POST . $_GET . $message . $_REQUEST['message'];
?>