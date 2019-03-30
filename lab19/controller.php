<?php
require_once('util.php');
$words=consultaPalabras();
$response="";
$size=0;
for($i=0; $i<count($words); $i++){
     $word=$words[$i];
     $response.="<select value=\"$word\">$word</select>";
}
if($size>0)
  echo $response;
?>
