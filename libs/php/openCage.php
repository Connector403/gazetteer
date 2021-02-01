<?php 

	// this api return contry code for a lat/lng
	$ch = curl_init();
	$apikey = "ab082527cf014e18a9995ef318a15ecd";
	$url = "https://api.opencagedata.com/geocode/v1/json?key=" .$apikey . "&q=" .$_REQUEST['lat']. "%2C" . $_REQUEST['lng']. "pretty=1";



	curl_setopt_array($ch, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	));

	$resp = curl_exec($ch);

	$error = curl_error($ch);



	curl_close($ch);

	if($error) {
		echo $error;
	}else {
		echo $resp;
	}