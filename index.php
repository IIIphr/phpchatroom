<html>
	<head>
		<title>Wlecome !</title>
		<script src="jquery-3.5.1.js"></script>
	</head>

	<body>

		<form action="" method="POST" id="loginform">
			username : <input type="text" name="username" id="username"><br>
			password : <input type="password" name="password" id="password"><br>
			<input type="submit" value="login"><br>
		</form>

		<p id="error"></p>

		<a href="register.php">No account ? register here</a>

	</body>

	<script>
		$(function(){
			console.log("func");
			$("#loginform").submit(function(){
				console.log("form");
				var formvals=$("#loginform").serializeArray();
				console.log(formvals['username']);
				console.log(formvals['password']);
				$.post("logincheck.php",
				{
					username: document.getElementById("username").value,
					password: document.getElementById("password").value
				},
				function(data,status){
					console.log(data);
					console.log(status);
					if(data=="OK"){
						var form=document.createElement('form');
						form.method="POST";
						form.action="messaging.php";
						var userfield=document.createElement('input');
						userfield.type = 'hidden';
						userfield.name = 'username';
						userfield.value = document.getElementById("username").value;
						form.appendChild(userfield);
						var passfield=document.createElement('input');
						passfield.type = 'hidden';
						passfield.name = 'password';
						passfield.value = document.getElementById("password").value;
						form.appendChild(passfield);
						document.body.appendChild(form);
						form.submit();
						console.log("if");
					}
					else{
						document.getElementById("error").innerHTML="Can't login";
						console.log("else");
					}
				})
			})
		})
	</script>

</html>