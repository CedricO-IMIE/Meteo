<!DOCTYPE html>
<html>


	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="leaflet.css" />
		<link rel="stylesheet" href="CSS/style.css" />
		<script src="leaflet.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	</head>


	<body>
		<div id="maCarte" style="height: 700px ; width:1400px">
		</div>
		 
		<div class="bloc">
			<div id="temps">
				<span> Temps </span> <br>
				<span id="temp"> Neigeux </span>
			</div>
			 
			<hr>
			 
			<div id="temperature">
				<span> Temperature </span> <br>
				<span id="degre"> 19 </span> °C
			</div>
		 
			<hr>
		 
			<div id="humidite">
				<span> Humidite </span> <br>
				<span id="humi"> 0 </span> %
			</div>
		 
			<hr>

			<div id="direction">
				<span> Direction vent </span> <br>
				<span id="dir"> Vers içi </span>
			</div>
		 
		</div>

		<script>

			function main() {

			var maCarte = L.map('maCarte').setView([46.5, 2], 6.1);
			 
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: ' <a href="http://www.openstreetmap.org/copyright%22%3EOpenStreetMap</a>'
			}).addTo(maCarte);

			maCarte.on('click', 
                    function(e){
                        var coord = e.latlng.toString().split(',');
                        var lat = coord[0].split('(');
                        var lng = coord[1].split(')');
                        console.log("Latitude: " + lat[1] + " Longitude:" + lng[0]);
                    });
            }
                    window.onload = main;
			 
			function changetemps(t) {
				$('#temp').text(t);
			};
			 
			function changetemperature(te) {
				$('#degre').text(te);
			};
			 
			function changehumi(h) {
				$('#humi').text(h);
			};
			 
			function changedir(d) {
				$('#dir').text(d);
			};
			 
			$(function appel() {
				changetemps('yo');
				changetemperature(50);
				changehumi(20);
				changedir('Sud/Sud-Est');
			});
			

			var meteovar = {
				Temperature: 30,
				Temps: 'Beau',
				Humidite: 50,
				Direction: 'Nord',
				Pression: 1050,
				Vitesse: 5,
				Lieu: 'Nantes'
			};

			function ChangeMeteo(jsonMeteo){
			    changetemps(jsonMeteo.Temps);
			    changetemperature(jsonMeteo.Temperature);
			    changehumi(jsonMeteo.Humidite);
			    changedir(jsonMeteo.vent_dir);
			}

			$(function () {
				ChangeMeteo(meteovar);
				ChangeMeteo(42);
			});
 
		 </script>
		</body>


</html>