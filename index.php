<html>
	<head>
		<title>My temp title :)</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>

	<body>
		<p>My temp body :)</p>

		<?php echo '<p>Hello !</p>'; ?>

		<?php

		$mysql = new mysqli("localhost", "root","", "php_chatroom");
		if($mysql === false){
			die("<p>ERROR: Could not connect. " . $mysql->connect_error . "</p>");
		}
		else{
			// Print host information
			echo "<p>Connect Successfully. Host info: " . $mysql->host_info . "</p>";
		}

		?>

	</body>
</html>