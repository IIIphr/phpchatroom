<?php session_start(); ?>
<html>
	<head>
		<title>My temp title :)</title>
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
		</script>
		<link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
		<script type="text/javascript" src="node_modules/validator/validator.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>

		<div class="container">
			<div class="leftcontainer" id="leftpanel">left panel</div>

			<div class="maincontainer" id="mainpanel">
				<div id="messages">messages goes here :<br></div>

				<textarea name="message" wrap="hard" id="message" cols="100" rows="2">Type your message here</textarea>

				<button onclick="submit()">submit</button>
				<button onclick="logout()">logout</button>
			</div>

			<div class="rightcontainer" id="rightpanel">right panel</div>
		</div>

	</body>

	<script>
		function logout(){
			const form = document.createElement('form');
			form.method = "POST";
			form.action = "logout.php";
			document.body.appendChild(form);
			form.submit();
		}
	</script>

	<script>
		function submit(){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				document.getElementById("messages").scrollTop = document.getElementById("messages").scrollHeight;
			};
			xhttp.open("POST", "store_message.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("message="+document.getElementById("message").value+"&sender="+"<?php echo $_SESSION['sender'] ?>"+
			"&time="+ new Date() );
		}
	</script>

	<script>
		setInterval(function temp(){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("messages").innerHTML = this.responseText;
					if(typeof temp.counter=='undefined'){
						document.getElementById("messages").scrollTop = document.getElementById("messages").scrollHeight;
						temp.counter=1;
					}
				}
			};
			xhttp.open("POST", "get_messages.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send();
		},1000);
	</script>


</html>