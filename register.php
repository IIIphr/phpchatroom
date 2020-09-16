<html>
    <head>
        <title>register here !</title>
		<script src="jquery-3.5.1.js"></script>
		<script src="node_modules/pristinejs/src/pristine.js"></script>
		<script>
			function setCookie(cname, cvalue, exdays) {
				var d = new Date();
				d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
				var expires = "expires="+d.toUTCString();
				document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}
		</script>
		<link rel="stylesheet" href="style.css">
    </head>

    <body>

		<div class="container">
			<div class="leftcontainer" id="leftpanel">left panel</div>

			<div class="maincontainer" id="mainpanel">
				<form id="registerform" method="POST">
					username : <input type="text" name="username" id="username"
								required autofocus><br>
					password : <input type="password" name="password" id="password" minlength="8"
								required><br>
					confirm password : <input type="password" name="password_repeat" id="password_repeat"
										minlength="8" required data-pristine-equals="#password" class="form-control"><br>
					display name : <input type="text" name="dname" id="dname"
									required><br>
					<input type="submit" value="submit" id="submit"><br>
				</form>

				<p id="error"></p>

				<a href="index.php">return to login</a>
			</div>

			<div class="rightcontainer" id="rightpanel">right panel</div>
		</div>

	</body>

	<script>
		$(function(){
			var pristine = new Pristine(document.getElementById("registerform"));
			form.addEventListener('submit', function (e) {
				e.preventDefault();
				var valid = pristine.validate();
			});
		})
	</script>

    <script>
		$(function(){
			$("#registerform").submit(function(e){
				e.preventDefault();
				$.post("registercheck.php",
				$("#registerform").serialize(),
				function(data,status,jqXHR){
					if(data!=""){
						const form = document.createElement('form');
						form.method = "POST";
						form.action = "messaging.php";
						setCookie("username",$("#username").val(),20);
						setCookie("sender",data,20);
						setCookie("password",$("#password").val(),20);
						document.body.appendChild(form);
  						form.submit();
					}
					else{
						$("#error").text("one the fields are not correct");
					}
				});
			})
		})
	</script>

</html>