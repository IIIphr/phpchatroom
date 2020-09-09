<?php 
$message=$_POST['message'];
$sender=$_POST['sender'];
$time=$_POST['time'];
$mysql = new mysqli("localhost", "root","", "php_chatroom");
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
$req="INSERT INTO messages (message,sender,time) VALUES ('". $message ."','". $sender ."','". $time ."');";
if ($mysql->query($req) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $req . "<br>" . $mysql->error;
}
$mysql->close();
?>