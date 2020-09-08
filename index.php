<html>
	<head>
		<title>Wlecome !</title>
		<script src="jquery-3.5.1.js"></script>
	</head>

	<body>

		<form method="POST" id="loginform">
			username : <input type="text" name="username" id="username"><br>
			password : <input type="password" name="password" id="password"><br>
			<input type="submit" value="login"><br>
		</form>

		<p id="error"></p>

		<a href="register.php">No account ? register here</a>

	</body>

<!--	<script>
		$(function(event){
			console.log("func");
			$("#loginform").submit(function( event ){
				console.log("form");
				var formvals=$(this).serialize();
				$.post("logincheck.php",
				{
					formvals
				},
				function(data,status){
					console.log(data);
					console.log(status);
					if(data=="OK"){
						var form=document.createElement('form');
						form.method="POST";
						form.action="logincheck.php";
						var userfield=document.createElement('input');
						userfield.type = 'hidden';
						userfield.name = 'username';
						userfield.value = formvals['username'];
						form.appendChild(userfield);
						var passfield=document.createElement('input');
						passfield.type = 'hidden';
						passfield.name = 'password';
						passfield.value = formvals['password'];
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
-->

<!--		<script>
			$(function(event){
				$("#loginform").submit(function( event ){
					var values = $(this).serialize();
					$.ajax({
						url: "loginchek.php",
						type: "post",
						data: values ,
						success: function (response) {
							document.getElementById("error").ineerHTML=response;
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
				})
			})
		</script>
-->

</html>