<?php
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['password_repeat'];
$display=$_POST['dname'];
$mysql=new mysqli("localhost","root","","php_chatroom");
$qry="SELECT * FROM users WHERE username='". $username ."';";
$res=$mysql->query($qry);
if ($res->num_rows == 0) {
    if($password==$confirm){
        $req="INSERT INTO users (username,password,display_name) VALUES ('". $username ."','". $password ."','". $display_name ."');";
        if($mysql->query($qry)==TRUE){
            echo $display;
        }
    }
}
?>