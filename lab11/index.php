<?php

  $usernameErr = $emailErr = $passwordErr = "";
  $username = $email = $password1 = $password2 = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if(checkEmail($email)) {

    }
    else {
      $emailErr = "Please insert a valid email";
    }
  }

  if (empty($_POST["password1"]) or empty($_POST["password2"])) {
    $passwordErr = "Please fill out the requiered forms";
  } else {
    $password1 = test_input($_POST["password1"]);
    $password2 = test_input($_POST["password2"]);
    if($password1==$password2){
      if(strlen($password1)>6){
        $containsLetter  = preg_match('/[a-zA-Z]/',    $password1);
        $containsDigit   = preg_match('/\d/',          $password1);
        $containsSpecial = preg_match('/[^a-zA-Z\d]/', $password1);
        $containsAll = $containsLetter && $containsDigit && $containsSpecial;
        if($containsAll>0){

        }
        else $passwordErr ="Password must contain at least 1 special character";
      }
      else $passwordErr ="Password must be longer than 6 characters";

    }
    else $passwordErr = "Passwords do not match";
  }

}

  function checkPassword($p1,$p2){
    if(strcmp($p1,$p2)==0){
      return 1;
    }
    else return 0;
  }

  function checkEmail($email) {
     $find1 = strpos($email, '@');
     $find2 = strpos($email, '.');
     if($find2==0){
       return 0;
     }
     else return ($find1 !== false && $find2 !== false && $find2 > $find1);
  }


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  include("views/main.html");

?>
