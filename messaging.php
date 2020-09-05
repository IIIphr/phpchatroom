<html>
	<head>
		<title>My temp title :)</title>
	</head>

	<body>

		<p id="messages">messages goes here :<br></p>

		<textarea name="message" id="message" cols="30" rows="10">Type your message here</textarea>
		<br>
		<p id="status"></p>

		<button onclick="submit()">submit</button>
		<button onclick="refresh()">refresh</button>


	</body>

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
			xhttp.send("message="+document.getElementById("message").value+"&sender="+"<?php echo $_POST['user']; ?>");
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


</html>