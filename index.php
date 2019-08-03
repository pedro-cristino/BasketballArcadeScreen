<?php 
	//We launch the scoreboard:
	//$command = escapeshellcmd('python /var/html/www/BasketballArcadeScreen/scoreboard.py');
	exec('sudo -u root python scoreboard.py');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Basketball arcade by Pedro Cristino</title>
  </head>
  <body style="background:black;color:red;font-size: 5em;">
  
  <script>
	let pid = 0;
	let timeLeft = 50;
	let gameOver = false;
	function loadCurrentScore() {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  const rep = this.responseText;
		  document.getElementById("currentScore").innerHTML = rep.split(";")[0];
		  pid = rep.split(";")[1];
		  if(!gameOver)
		  {
			  loadCurrentScore();
		  }
		  else{
			  gameOverFunc();
		  }
		}
	  };
	  xhttp.open("GET", "readfile.php", true);
	  xhttp.send();
	}
	function stopPythonScript(){var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		console.log("script stopped");
	  };
	  xhttp.open("GET", "stopscript.php?pid="+pid, true);
	  xhttp.send();
	}
	function gameOverFunc(){
		clearInterval(timeLoop);
		stopPythonScript();
	}
	function timer(){
		timeLeft--;
		document.getElementById("timer").innerHTML = timeLeft;
		if(timeLeft <= 0)
		{
			gameOver =true;
		}
	}
	let timeLoop = setInterval(timer,1000);
	loadCurrentScore();
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
			<th id="timer">50</th>
		</tr>
	</table>
  </body>
  
  
</html>
