<?php

  session_start();

  require_once("php/util.php");

  $usernameErr= $passwordErr = "";
  $username  = $password  = "";
  $error = 1;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["password"])) {
    $passwordErr = "Incomplete data";
    $error = 1;
  } else {
    $password1 = test_input($_POST["password"]);
    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
      $error = 1;
    } else {
      $username = test_input($_POST["username"]);
      $_SESSION["username"] = "$username";
      $error=0;

    }
  }

}else $error=1;


  if($error) include("views/login.html");
  else{
    header("Location: /menu.php");
  }

?>
