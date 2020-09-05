<?php 
$message=$_POST['message'];
$mysql = new mysqli("localhost", "root","", "php_chatroom");
// Check connection
if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}
$req="INSERT INTO messages (message) VALUES ('". $message ."');";
if ($mysql->query($req) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $req . "<br>" . $mysql->error;
}
?>