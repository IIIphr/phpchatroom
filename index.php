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
			$("#loginform").submit(function(){
				$.post("logincheck.php",
				{
					username: document.getElementById("username").value,
					password: document.getElementById("password").value
				},
				function(data,status){
					if(data=="OK"){
						form=document.createElement('form');
						form.method="POST";
						form.action="messaging.php";
						userfield=document.createElement('input');
						userfield.type = 'hidden';
						userfield.name = 'username';
						userfield.value = document.getElementById("username").value;
						form.appendChild(userfield);
						passfield=document.createElement('input');
						passfield.type = 'hidden';
						passfield.name = 'password';
						passfield.value = document.getElementById("password").value;
						form.appendChild(passfield);
						document.body.appendChild(form);
  						form.submit();
					}
					else{
						document.getElementById("error").innerHTML="Can't login";
					}
				})
			})
		})
	</script>

</html>