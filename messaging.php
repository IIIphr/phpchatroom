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
		<link rel="stylesheet" href="style.css">
	</head>

	<body>

		<div class="container">
			<div class="leftcontainer" id="leftpanel">left panel</div>

			<div class="maincontainer" id="mainpanel">
				<p id="messages">messages goes here :<br></p>

				<textarea name="message" id="message" cols="30" rows="10">Type your message here</textarea>
				<br>
				<p id="status"></p>

				<button onclick="submit()">submit</button>
				<button onclick="refresh()">refresh</button>
				<button onclick="logout()">logout</button>
			</div>

			<div class="rightcontainer" id="rightpanel">right panel</div>
		</div>

	</body>

	<script>
		function logout(){
			document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
			document.cookie = "password=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
			document.cookie = "sender=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
			const form = document.createElement('form');
			form.method = "POST";
			form.action = "index.php";
			document.body.appendChild(form);
			form.submit();
		}
	</script>

	<script>
		function submit(){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var res="submitted <br>"+this.responseText;
					document.getElementById("status").innerHTML = res;
				}
			};
			xhttp.open("POST", "store_message.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("message="+document.getElementById("message").value+"&sender="+"<?php echo $_SESSION['sender'] ?>"+
			"&time="+ new Date() );
		}
	</script>

	<script>
		function refresh(){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var res="refreshed ! <br>";
					document.getElementById("status").innerHTML = res;
					document.getElementById("messages").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "get_messages.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send();
		}
	</script>

	<script>
		setInterval(function(){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var res="refreshed ! <br>";
					document.getElementById("status").innerHTML = res;
					document.getElementById("messages").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "get_messages.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send();
		},1000);
	</script>


</html>