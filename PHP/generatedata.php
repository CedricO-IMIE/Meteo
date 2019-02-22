<?php
if (!function_exists("mysqli_connect"))
    die("Le support MySql n'est pas disponible.");
if (!@mysqli_connect("localhost", "root", "", "jsdigi"))
    die('Base de donnée - mysql_connect: ' . mysqli_error());
 
$conn = mysqli_connect("localhost", "root", "", "jsdigi"); // new mysqli($host, $login, $pass, $db);
 
function insertOrUpdate($conn,$temprt,$lieu,$lat,$lon,$Humidite,$Pression,$Temps,$ventv,$ventd){

$tableau = array( "lat" => 42, "lon" => -1, "Lieu" => "Nantes");
$json = json_encode($tableau);

function getInfosMeteo($lat,$lon) 
//TODO : modifier le where de la requet pour filtrer par lat/lon 20km près
 
    $result = mysqli_query($conn,"select * from meteo where Lieu like '$lieu';");
    var_dump(mysqli_error($conn));
 
if ( mysqli_num_rows($result) > 0){
//recupérer les données de la requete plus haut
//Construire un Json avec
$sql = "update meteo set Temperature = $temprt , Humidite = $Humidite , Pression =  $Pression
                 where Lieu like '$lieu' ;";
                 var_dump($sql);
                //echo($sql);
} else { //insert


 include 'API.php'
//reutiliser le code ci dessous pour stocker les info en base
//executer la requete
//construire un json avec
        $sql = "INSERT INTO meteo (Lieu, Temperature, Lat, Lon, Humidite, Pression, Temps, VentV, VentDir) values ('$lieu', $temprt, $lat, $lon, $Humidite, $Pression,'$Temps', $ventv, $ventd);";
        var_dump($sql);
        //echo($sql);
    }
mysqli_query($conn,$sql);
var_dump("erreur:".mysqli_error($conn));
//TODE : Renvoyer le JSON
//return $json;
}

 
insertOrUpdate($conn,30, 'nantes',45,2,43,1020,'beau',12,1);

   

$conn->close();


?>
