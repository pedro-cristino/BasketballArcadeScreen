<?php ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Basketball arcade by Pedro Cristino</title>
  </head>
  <body style="background:black;color:red;font-size: 5em;">
  
  <script>
	let pid = 0;
	function loadDoc() {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  const rep = this.responseText;
		  document.getElementById("currentScore").innerHTML = rep.split(",")[0];
		  pid = rep.split(",")[1];
		}
	  };
	  xhttp.open("GET", "readfile.php", true);
	  xhttp.send();
	}
  </script>
    <table style="width:100%;border:1px solid white">
		<tr>
			<th>Best Score</th>
			<th>Your Score</th>
			<th>Time Left</th>
		</tr>
		<tr>
			<th id="bestScore">250</th>
			<th id="currentScore">224</th>
			<th id="remainingTime">50s</th>
		</tr>
	</table>
  </body>
  
  
</html>