<?php session_start(); ?>
<html>
    <head>
        <title>register here !</title>
		<script src="jquery-3.5.1.js"></script>
		<script>
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
					<form id="registerform" method="POST">
						<table>
							<tbody>
								<tr>
									<td class="label">username : </td>
									<td class="input"><input type="text" name="username" id="username"
									required autofocus maxlength="30"></td>
								</tr>
								<tr>
									<td class="label">password : </td>
									<td class="input"><input type="password" name="password" id="password"
									minlength="8" required></td>
								</tr>
								<tr>
									<td class="label">confirm password : </td>
									<td class="input"><input type="password" name="password_repeat"
									id="password_repeat" minlength="8"></td>
								</tr>
								<tr>
									<td class="label">display name : </td>
									<td class="input"><input type="text" name="dname" id="dname"required
									maxlength="30"></td>
								</tr>
							</tbody>
						</table>
						<br><input type="submit" value="register" id="submit"><br>
					</form>

					<div id="error"></div>

					<form action="index.php">
						<input type="submit" value="return to login" id="submit">
					</form>

				</div>
			</div>

			<div class="rightcontainer" id="rightpanel">right panel</div>
		</div>

	</body>

    <script>
		$(function(){
			$("#registerform").submit(function(e){
				e.preventDefault();
				var inputs=""+$("#username").val()+$("#password").val()+$("#password_repeat").val()+$("#dname").val();
				var password_check=validator.equals(""+$("#password").val(),""+$("#password_repeat").val());
				if(validator.isAlphanumeric(inputs) && password_check){
					$.post("registercheck.php",
					$("#registerform").serialize(),
					function(data,status,jqXHR){
						if(data!=""){
							const form = document.createElement('form');
							form.method = "POST";
							form.action = "messaging.php";
							document.body.appendChild(form);
							form.submit();
						}
						else{
							$("#error").text("the username already exists");
						}
					});
				}
				else{
					var errors="";
					if(!validator.isAlphanumeric(""+$("#username").val())){
						errors=errors+"<p>use only alphabets and numbers for username</p>";
					}
					if(!validator.isAlphanumeric(""+$("#password").val())){
						errors=errors+"<p>use only alphabets and numbers for password <br>";
					}
					if(!validator.isAlphanumeric(""+$("#password_repeat").val())){
						errors=errors+"<p>use only alphabets and numbers for password confirmation</p>";
					}
					if(!validator.isAlphanumeric(""+$("#dname").val())){
						errors=errors+"<p>use only alphabets and numbers for display name</p>";
					}
					if(!validator.equals(""+$("#password").val(),""+$("#password_repeat").val())){
						errors=errors+"<p>the password and the confirmation must match</p>";
					}
					document.getElementById("error").innerHTML=errors;
				}
			})
		})
	</script>

</html>