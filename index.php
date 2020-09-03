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
		<br>
		<p id="status"></p>

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
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("status").innerHTML = "submitted <br>"+
					" the message was : "+ this.responseXML +
					"<br> "+document.getElementById('message').innerHTML +
					"<br> "+"store_message.php?message="+document.getElementById('message').innerHTML;
				}
			};
			xhttp.open("GET", "store_message.php?message=temp", true);
			//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send();
		}
	</script>

	<script>
		function refresh(){
		}
	</script>


</html>