<html>
	<head>
		<title>Wlecome !</title>
		<script src="jquery-3.5.1.js"></script>
		<script src="node_modules/pristinejs/src/pristine.js"></script>
		<script>
			function getCookie(cname) {
				var name = cname + "=";
				var ca = document.cookie.split(';');
				for(var i = 0; i < ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') {
						c = c.substring(1);
					}
					if (c.indexOf(name) == 0) {
						return c.substring(name.length, c.length);
					}
				}
				return "";
			}
			function setCookie(cname, cvalue, exdays) {
				var d = new Date();
				d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				var expires = "expires="+d.toUTCString();
				document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}
		</script>
		<script>
			$(function(){
				var username = getCookie("username");
				var password = getCookie("password");
				if (username != "") {
					$.post("logincheck.php",
					{ username: username , password: password},
					function(data,status,jqXHR){
						if(data!=""){
							const form = document.createElement('form');
							form.method = "POST";
							form.action = "messaging.php";
							document.body.appendChild(form);
							form.submit();
						}
					});
				}
			})
		</script>
	</head>

	<body>

		<form method="POST" id="loginform">
			username : <input type="text" name="username" id="username" required autofocus autocomplete="on"><br>
			password : <input type="password" name="password" id="password" required><br>
			<input type="submit" value="login" id="submit"><br>
		</form>

		<p id="error"></p>

		<a href="register.php">No account ? register here</a>

	</body>

	<script>
		$(function(){
			$("#loginform").submit(function(e){
				e.preventDefault();
				$.post("logincheck.php",
				$("#loginform").serialize(),
				function(data,status,jqXHR){
					if(data!=""){
						const form = document.createElement('form');
						form.method = "POST";
						form.action = "messaging.php";
						document.body.appendChild(form);
						setCookie("username",$("#username").val(),20);
						setCookie("sender",data,20);
						setCookie("password",$("#password").val(),20);
  						form.submit();
					}
					else{
						$("#error").text("username or password is incorrect !");
					}
				});
			})
		})
	</script>

</html>