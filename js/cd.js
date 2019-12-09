 		var clocks = [20];
		clocks.fill(1);
		
		function initializeClock(Time, ind, tool){ 
		  var buttonid = 'start' + ind;
		  var team = document.getElementById('TeamSelect'+ind).value;
		  var d = new Date();
		  var endtime = new Date(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes()+Time, d.getSeconds());
		  var clock = document.getElementById('clock' + ind);
		  console.log(team + ' needs to return the ' + tool + ' at ' + endtime);
		  
		  
		  document.getElementById(buttonid).disabled = true; 
		  document.getElementById('Add'+ind).disabled = true;
		  clocks[ind]=1;
		  var timeinterval = setInterval(function(){
			var t = getTimeRemaining(endtime);
			if(t.seconds>9){
				clock.innerHTML = + t.minutes + ':' +
								  + t.seconds;
			} else {
				clock.innerHTML = + t.minutes + ':0' +
								  + t.seconds;		
			}
			if(t.minutes==1 && t.seconds==0 && clocks[ind]==1){
				spawnNotification(' only has one minute left with the ','One minute left!', tool, team, 'notifications/minute.mp3');
				clocks[ind]==2;
			}
			if(t.total<=0){
				clock.innerHTML = + Time + ':' + '00';
				spawnNotification(" time is up! Go get the ", "Time's up!", tool, team, 'notifications/finished.mp3');
				document.getElementById(buttonid).disabled = false; 
				document.getElementById('Add'+ind).disabled = false;
				clearInterval(timeinterval);
			} else if(clocks[ind]==0){
				clock.innerHTML = + Time + ':' + '00';
				document.getElementById(buttonid).disabled = false; 
				document.getElementById('Add'+ind).disabled = false;
				clearInterval(timeinterval);	
			}
			
		  },1000);
		}
		   
	    function getTimeRemaining(endtime){
		  var t = Date.parse(endtime) - Date.parse(new Date());
		  var seconds = Math.floor( (t/1000) % 60 );
		  var minutes = Math.floor( (t/1000/60) % 60 );
		  var hours = Math.floor( (t/(1000*60*60)) % 24 );
		  var days = Math.floor( t/(1000*60*60*24) );
		  return {
			'total': t,
			'days': days,
			'hours': hours,
			'minutes': minutes,
			'seconds': seconds
		  };
		}
		
		//Aqui lida com as notificações. Primeiro pede permissão
		Notification.requestPermission().then(function(result) {
		  console.log(result);
		});
		
		function spawnNotification(theBody,theTitle, tool, team, audio) {
		  var text = 'Team ' + team + theBody + tool;
		  var options = {
			  body: text + '.',
			  icon: "img/monkey.png"
		  }
		  var audio = new Audio(audio);
		  audio.play();
		  var n = new Notification(theTitle,options);
		}1