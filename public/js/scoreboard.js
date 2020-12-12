(function() {
    var ws = new WebSocket('ws://localhost:8080', 'json');
    var score = 0;
    var timer = 50;
    var bestScore = 0;
    ws.onopen = function () {
        console.log('Websocket is open');
        document.getElementById('score').innerHTML = score;
    };

    ws.onmessage = function (event) {
        if (event.data.indexOf('SCORE:') != -1) {
            score++;
            document.getElementById('score').innerHTML = score;
        }
	if (event.data.indexOf('BEST:') != -1)
	{
	    bestScore = event.data.split(':')[1];
	    document.getElementById('bestScore').innerHTML = bestScore;
	}
        console.log('Message was ', event.data);
    };

    ws.onerror = function(error) {
       console.log('Error detected: ' + error.data);
    }

    var interval = setInterval(timerFunction,1000);

    function timerFunction(){
        timer--;
	document.getElementById("timer").innerHTML = timer;
	if(timer ==0)
	{
		if(score > bestScore)
		{
			ws.send(score);
			document.getElementById("bestScore").innerHTML = score;
		}
		ws.close();
		clearInterval(interval);
	}
    }
}());
