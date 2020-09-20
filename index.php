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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>

	<body>

		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-3" id="leftpanel">left panel</div>

				<div class="col-6" id="mainpanel">
					<form method="POST" id="loginform">
						username : <input type="text" name="username" id="username" required autofocus autocomplete="on"><br>
						password : <input type="password" name="password" id="password" required><br>
						<input type="submit" value="login" id="submit"><br>
					</form>

					<div id="error"></div>

					<a href="register.php">No account ? register here</a>
				</div>

				<div class="col-3" id="rightpanel">right panel</div>
			</div>
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