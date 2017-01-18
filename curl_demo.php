<?php
$ch=curl_init();

curl_setopt_array(
    $ch, array( 
    CURLOPT_URL => 'http://192.168.200.53/demophp/getdatabase.php', // Set the url
    CURLOPT_RETURNTRANSFER => true, // Will return the response, if false it print the response
    CURLOPT_SSL_VERIFYPEER=> false  // Disable SSL verification

));

$result = curl_exec($ch); // Execute

//echo $result;
// Closing
curl_close($ch);

$a=json_decode($result);
for ($i=0; $i < count($a); $i++) { 
	echo $a[$i]."<br/>";
}

?>