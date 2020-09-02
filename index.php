<html>
	<head>
		<title>My temp title :)</title>
	</head>

	<body>
		<p>My temp body :)</p>

		<?php echo '<p>Hello !</p>'; ?>

		<?php

		$mysql = new mysqli("localhost", "root", "", "php_chatroom");
		if($mysql === false){
			die("ERROR: Could not connect. " . $mysql->connect_error);
		}
		 
		// Print host information
		echo "Connect Successfully. Host info: " . $mysql->host_info;

		?>
	</body>
</html>