<?php
session_start();




//$sql = "INSERT INTO valeurs (temperature,lieu,latitude,longitude,humidite,pression,temps,vitesse_vent,direction_vent) VALUES (20,'nantes',12,12,25,18,'beau',120,1)";

function insertOrUpdateMeteo($lieu, $temperature, $lat, $lon, $humidite, $pression, $temps, $ventv, $ventdir) {

        $database = mysqli_connect('localhost', 'root', '', 'jsdigi');

    if (!$database) {
        die("Connection échouée: " . mysqli_connect_error());
    } else {
        echo "Connecté à la base de données. <br>";
    }

    $query = mysqli_query($database, "SELECT * FROM meteo WHERE Lieu like '".$lieu."'");

    if (!$query) {
        die('Error: ' . mysqli_error($database));
    }

    if (mysqli_num_rows($query) > 0) {

        echo "La ville existe déjà !";
        $sql = "UPDATE meteo SET Temperature='".$temperature."' , Lat ='".$lat."' , Lon ='".$lon."' , Humidite='".$humidite."' , Pression='".$pression."' , Temps='".$temps."' , VentV='".$ventv.
        "' , VentDir= '".$ventdir."'
        WHERE lieu like'".$lieu."';";
        var_dump($sql);
        $database->query($sql);
    } else {

        echo "La ville à été créee";
        $sql = "INSERT INTO meteo (Lieu,Temperature,Lat,Lon,Humidite,Pression,Temps,VentV,VentDir) VALUES ($lieu,$temperature,$lat,$lon,$humidite,$pression,$temps,$ventv,$ventdir)";
        var_dump($sql);
        mysqli_query($database,$sql);
    }
    
}

insertOrUpdateMeteo('lemans',45,42,43,48,56,'beau',124,1);

  /*  if ($database->query($sql) === true) {
        echo "Query executed without issue.";
        //header('location:index.php');
    } else {
        echo "Erreur: " . $sql . "<br>" . $database->error;
    } */


Session_destroy();


?>