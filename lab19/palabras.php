<?php
require_once('util.php');
$pattern=strtolower($_GET['pattern']);
$error =creaPalabra($pattern);
if(!$error){
    echo '<script>alert("Error");</script>';
}
else{
    require_once('controller.php');
}

?>