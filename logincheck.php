<?php
$username=$_POST['username'];
$password=$_POST['password'];
$mysql=new mysqli("localhost","root","","php_chatroom");
$qry="SELECT * FROM users WHERE username="+$username+";";
$res=$mysql->query($req);
$log = fopen("log.txt", "w");
fwrite($log,$_POST);
fwrite($log,"Posted");
fwrite($log,$res);
if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        if($row['password']==$password){
            echo "OK";
        }
    }
}
fclose($log);
?>