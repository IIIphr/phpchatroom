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
		<script type="text/javascript" src="node_modules/validator/validator.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>

		<div class="container">
				<div class="leftcontainer" id="leftpanel">left panel</div>

				<div class="maincontainer" id="mainpanel">
					<div class="fholder">
						<form method="POST" id="loginform">
							<table>
								<tbody>
									<tr>
										<td class="label"><label for="username">username : </label></td>
										<td class="input"><input type="text" name="username" id="username" required autofocus autocomplete="on"></td>
									</tr>
									<tr>
										<td class="label"><label for="username">password : </label></td>
										<td class="input"><input type="password" name="password" id="password" required></td>
									</tr>
								</tbody>
							</table>
							<br><input type="submit" value="login" id="submit"><br>
						</form>

						<div id="error"></div>

						<form action="register.php">
							<input type="submit" value="No account ? register here" id="submit">
						</form>

					</div>
				</div>

				<div class="rightcontainer" id="rightpanel">right panel</div>
		</div>

	</body>

	<script>
		$(function(){
			$("#loginform").submit(function(e){
				e.preventDefault();
				if(validator.isAlphanumeric($("#username").val()+"") && validator.isAlphanumeric($("#password").val()+"")){
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
							$("#error").text("wrong username or password");
						}
					});
				}
				else{
					var errors="";
					if(!validator.isAlphanumeric($("#username").val()+"")){
						errors=errors+"<p>use only alphabets and numbers in username !</p>";
					}
					if(!validator.isAlphanumeric($("#password").val()+"")){
						errors=errors+"<p>use only alphabets and numbers in password !</p>";
					}
					document.getElementById("error").innerHTML=errors;
				}
			})
		})
	</script>

</html>