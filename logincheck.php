<?php
$username=$_POST['username'];
$password=$_POST['password'];
$mysql=new mysqli("localhost","root","","php_chatroom");
$qry="SELECT * FROM users WHERE username='". $username ."';";
$res=$mysql->query($qry);
if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        if($row['password']==$password){
            echo $row['display_name'];
        }
    }
}
$mysql->close();
?>