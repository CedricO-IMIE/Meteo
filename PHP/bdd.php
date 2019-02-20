<?php


$conn = new msqli($host, $login, $pass, $db);



function insertOrUpdateMeteo($lieu, $temprt, $lat, $lon, $humidite,
								 $pression, $ventv, $ventd, $temps) {

		$conn->mysqli_query("select * id from meteo where lieu like".$lieu.";");

		if ( mysqli_num_rows($result) > 0 ) { // update
				$sql = "update meteo set temp = ".$temprt.", humidite = ". $humidite .
					", pression = ". $pression .
					"where lieu like ".$lieu.";";
		}
		else { // insert
				$insert = "INSERT INTO meteo (Lieu,Temperature,Lat,Lon,Humidite,Pression,Temps,VentV,VentDir) VALUES ('Nantes',10,12,12,12,10,'bo',10,10)";
		}
}

?>