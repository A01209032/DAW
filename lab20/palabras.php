<?php
require_once('util.php');
$pattern=strtolower($_GET['pattern']);
$error =creaPalabra($pattern);
if(!$error){
    echo 'Error';
}
else{
    require_once('controller.php');
    
}

?>