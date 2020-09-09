<html>
	<head>
		<title>Wlecome !</title>
		<script src="jquery-3.5.1.js"></script>
	</head>

	<body>

		<form method="POST" id="loginform">
			username : <input type="text" name="username" id="username"><br>
			password : <input type="password" name="password" id="password"><br>
			<input type="submit" value="login" id="submit"><br>
		</form>

		<p id="error"></p>

		<a href="register.php">No account ? register here</a>

		<button id="b">button</button>

	</body>

	<script>
		$(function(){
			$("#loginform").submit(function(e){
				e.preventDefault();
				$.post("logincheck.php",
				$("#loginform").serialize(),
				function(data,status,jqXHR){
					$("#error").text("success !");
				});
			})
		})
	</script>

</html>