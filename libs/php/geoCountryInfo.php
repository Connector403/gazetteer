<?php 
	// return country information: Capital, Population, Area in square km, Bounding Box of mainland (excluding offshore islands)
	$url = 'http://api.geonames.org/countryInfoJSON?formatted=true&lang=&country=' . $_REQUEST['countryCode'] . '&username=sherazzi403&style=full';


	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);


	$result=curl_exec($ch);

	curl_close($ch);

	$decode = json_decode($result,true);

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "Success";
	
	$output['data'] = $decode['geonames'];

	header('Content-Type: application/json; charset=UTF-8');

	echo json_encode($output);


