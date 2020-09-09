<html>
    <head>
        <title>register here !</title>
		<script src="jquery-3.5.1.js"></script>
    </head>

    <body>
        
        <form id="registerform" method="POST">
            username : <input type="text" name="username" id="username"><br>
            password : <input type="password" name="password" id="password" minlength="8"><br>
            confirm password : <input type="password" name="password_repeat" id="password_repeat"><br>
            display name : <input type="text" name="dname" id="dname"><br>
            <input type="submit" value="submit" id="submit"><br>
        </form>

		<p id="error"></p>

		<a href="index.php">return to login</a>

    </body>

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
						const hiddenField = document.createElement('input');
						hiddenField.type = 'hidden';
						hiddenField.name = 'sender';
						hiddenField.value = data;
						form.appendChild(hiddenField);
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