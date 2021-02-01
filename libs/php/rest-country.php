<?php 
	// Get information about countries via a RESTful API
	$ch = curl_init();
	$url = "https://restcountries.eu/rest/v2/name/". $_REQUEST['countryName'];



	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CUSTOMREQUEST => "GET",

	));

	$resp = curl_exec($ch);
	$error = curl_error($ch);

	curl_close($ch);

	if($error) {
		echo "ERROR  cURL : " . $error;
	}else {
		echo $resp;
		
	}

