<?php
    session_start();
    require_once("util.php");
    if(empty ($_SESSION["username"]))
    {
        if(empty($_POST["username"]))
        {
            header('Location: index.php');
        }
        else
        {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
        }
    }
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    if(validarUsuario($_SESSION["username"],$_SESSION["password"])){
          encabezado();
          include("partials/_panelControl.html");
	      footer();
    }else {
        $error = "Datos incorrectos";
        include("index.php");
    }
?>
