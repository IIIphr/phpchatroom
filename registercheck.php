<?php
session_start();
$username=$_POST['username'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT,['cost' => 12]);
$confirm=$_POST['password_repeat'];
$display=$_POST['dname'];
$mysql=new mysqli("localhost","root","","php_chatroom");
$qry="SELECT * FROM users WHERE username='". $username ."';";
$res=$mysql->query($qry);
if ($res->num_rows == 0) {
    if($_POST['password']==$confirm){
        $qry="INSERT INTO users (username,password,display_name) VALUES ('". $username ."','". $password ."','". $display ."')";
        if($mysql->query($qry)===TRUE){
            echo $display;
            $_SESSION['username']=$username;
            $_SESSION['sender']=$display;
        }
    }
}
$mysql->close();
?>