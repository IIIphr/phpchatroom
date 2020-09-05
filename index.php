<html>
	<head>
		<title>Wlecome !</title>
	</head>

	<body>
		<p>please enter your username : </p>

		<textarea name="user" id="user" cols="30" rows="1" onkeyup="update()"></textarea>

		<br>

		<a id="rd" href="index.php">submit and go</a>
	</body>

	<script>
		function update(){
			document.getElementById("rd").href="messaging.php?user="+document.getElementById("user").value;
		}
	</script>
</html>