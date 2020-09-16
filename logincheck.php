<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$mysql=new mysqli("localhost","root","","php_chatroom");
$qry="SELECT * FROM users WHERE username='". $username ."';";
$res=$mysql->query($qry);
if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        fwrite($file,password_verify($password,$row['password']));
        if(password_verify($password,$row['password'])){
            echo $row['display_name'];
            $_SESSION['username']=$username;
            $_SESSION['sender']=$row['display_name'];
        }
    }
}
$mysql->close();
?>