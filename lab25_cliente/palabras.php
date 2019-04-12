<?php
$pattern=strtolower($_GET['pattern']);
    $url = "https://laboratorios-a01209032.c9users.io/lab25/public/palabra/$pattern"; //Route to the REST web service
    $c = curl_init($url);
    $response = curl_exec($c);
    curl_close($c);
    
    //var_dump($response); */
     $url = "https://laboratorios-a01209032.c9users.io/lab25/public/palabraQ/"; //Route to the REST web service
    $c = curl_init($url);
    $response = curl_exec($c);
    curl_close($c);
    
    //var_dump($response); */
?>