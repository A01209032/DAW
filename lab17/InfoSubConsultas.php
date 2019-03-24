<?php

session_start();

require_once('util.php');

if (isset($_POST['consulta'])) {
    
    $cons = $_POST['consulta'];
    /*$params = array();
    $keys = array_keys($_POST);
    for ($i=0; $i < count($keys); $i++) {
        if ($keys[$i] != 'consulta')
            array_push($params, $key[$i]);
    }*/
    
    $res = "Invalid Case!";
    if ($cons == "monto-trans") {
        $res = consultaMonto($_POST['min'], $_POST['max']);
    } else if ($cons == "transaccion-nombre") {
        $res = consultaTransaccionesNombre($_POST['nombre'], $_POST['apellido']);
    } else if ($cons == "personal-habilitado") {
        $res = consultaPersonalHabilitado($_POST['fecha1'], $_POST['fecha2']);
    } else if ($cons == "areas-trabajo") {
        $res = consultaAreasTrabajo($_POST['nombre'], $_POST['apellido']);
    } else if ($cons == "transaccion-tipo") {
        $res = consultaTransaccionesTipo($_POST['tipo']);
    } else if ($cons == "cuenta-info") {
        $res = consultaCuenta($_POST['nombre'], $_POST['apellido']);
    }
    
    echo json_encode(array("consulta"=> $cons, "msg"=>$res ));
    
    
    
}

?>