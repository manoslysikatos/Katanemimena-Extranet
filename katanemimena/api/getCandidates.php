<?php
    session_start();
    $ch = curl_init();
 
//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8080/spring-mvc-demo-2020/api/supervisor/candidates?id=1');
 
//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');

//Execute the request.
$data = curl_exec($ch);
 
//Close the cURL handle.
curl_close($ch);
 
//Print the data out onto the page.
echo $data;

?>
