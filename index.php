<?php session_start(); ?>
<html>
	<head>
		<title>Wlecome !</title>
		<script src="jquery-3.5.1.js"></script>
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
				var username = "<?php if( isset($_SESSION['username']) ) { echo $_SESSION['username'] ;} ?>";
				if (username != "") {
					const form = document.createElement('form');
					form.method = "POST";
					form.action = "messaging.php";
					document.body.appendChild(form);
					form.submit();
				}
			})
		</script>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>

		<div class="container">
			<div class="leftcontainer" id="leftpanel">left panel</div>

			<div class="maincontainer" id="mainpanel">
				<form method="POST" id="loginform">
					username : <input type="text" name="username" id="username" required autofocus autocomplete="on"><br>
					password : <input type="password" name="password" id="password" required><br>
					<input type="submit" value="login" id="submit"><br>
				</form>

				<p id="error"></p>

				<a href="register.php">No account ? register here</a>
			</div>

			<div class="rightcontainer" id="rightpanel">right panel</div>
		</div>

	</body>

	<script>
		$(function(){
			var loginform=document.getElementById("loginform");
			var pristine=new Pristine(loginform);
			$("#loginform").submit(function(e){
				e.preventDefault();
				if(pristine.validate()){
					$.post("logincheck.php",
					$("#loginform").serialize(),
					function(data,status,jqXHR){
						if(data!=""){
							const form = document.createElement('form');
							form.method = "POST";
							form.action = "messaging.php";
							document.body.appendChild(form);
							form.submit();
						}
						else{
							$("#error").text("username or password is incorrect !");
						}
					});
				}
			})
		})
	</script>

</html>