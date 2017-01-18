<?php
 
$ch = curl_init();
 
$customer = array(
	'firstname' => 'Branko',
	'lastname' => 'Ajzele',
	'username' => 'ajzele',
	'email' => 'branko.ajzele@example.com',
	'pass' => md5('myPass123')
);
 
$payload = json_encode($customer);
 
curl_setopt($ch, CURLOPT_URL, 'http://192.168.200.53/demophp/MainSite/insdata.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); /* or PUT */
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-type: application/json',
	'Accept: */*'
));
 
//curl_setopt($ch, CURLOPT_USERPWD, 'myDBusername:myDBpass');
 
$response = curl_exec($ch);
//echo $response;
var_dump(json_decode($response));
 
curl_close($ch);
?>