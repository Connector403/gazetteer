<?php 
	$ch = curl_init();
	$url  = "https://api.opencagedata.com/geocode/v1/json?q=" . $_REQUEST['countryISO']. "&key=ab082527cf014e18a9995ef318a15ecd";


	curl_setopt_array($ch , array(
		CURLOPT_URL => "https://api.opencagedata.com/geocode/v1/json?q=" . $_REQUEST['countryISO']. "&key=ab082527cf014e18a9995ef318a15ecd",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET"
	));


	$resp = curl_exec($ch);
	$error = curl_error($ch);
	curl_close($ch);

	if($error) {
		echo $error;
	}else {
		echo $resp;
	}

