<?php
function CallAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}




function getMeteoAPosition($lat, $lon) {
	$openweathermap = 
		CallAPI("GET",
			"http://api.openweathermap.org/data/2.5/weather",
			Array( "lat" => $lat, "lon" => $lon, "appid" => "4eaa7b283b9483a6f77010be5a747175") 
		);
	//echo($openweathermap);
	$raw = json_decode($openweathermap);


	return Array($raw->{'weather'}[0]->main, $raw->{'main'}->temp, $raw->{'main'}->pressure,
		$raw->{'main'}->humidity, $raw->{'wind'}->speed, $raw->{'wind'}->deg,
		$raw->{'name'}
	      );
	
}

var_dump(getMeteoAPosition(47.26,-1.58));


?>
