<html>
	<head>
		<title>My temp title :)</title>
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


		<p id="p">a simple text , using for javascript things</p>

		<button onclick="change()">change</button>

		<button onclick="revert()">revert</button>


		<p id="messages">messages goes here :<br></p>

		<textarea name="message" id="message" cols="30" rows="10">Type your message here</textarea>

		<button onclick="submit()">submit</button>
		<button onclick="refresh()">refresh</button>


	</body>

	<script>
		function change(){
			document.getElementById("p").innerHTML="js is working !"
		}
	</script>

	<script>
		function revert(){
			document.getElementById("p").innerHTML="a simple text , using for javascript things"
		}
	</script>

	<script>
		function submit(){
			var message=document.getElementById("messages").innerHTML;
			"<?php 
			$req="INSERT INTO messages ('message') VALUES ("+message+")";

			$mysql->request($req);
			?>"
		}
	</script>

	<script>
		function refresh(){
			document.getElementById("messages").innerHTML="<?php 
			$req="SELECT * FROM messages";

			echo $mysql->request($req);
			?>"
		}
	</script>


</html>