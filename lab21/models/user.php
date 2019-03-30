<?php
 $username = $email = $password1 = $password2 = " ";
 $usernameErr = $emailErr = $passwordErr = " ";
 $error =0;
 if($_POST['action']=='form_cuentas'){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $error =1;
  } else {
    $email = test_input($_POST["email"]);
    if(checkEmail($email)) {

    }
    else {
      $emailErr = "Please insert a valid email";
      $error = 1;
    }
  }

  if (empty($_POST["password1"]) or empty($_POST["password2"])) {
    $passwordErr = "Please fill out the requiered forms";
    $error = 1;
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
        else{
          $passwordErr ="Password must contain at least 1 special character";
          $error = 1;
        } 
        
      }
      else {
          $passwordErr ="Password must be longer than 6 characters";
          $error = 1;
      }
    }
    else {
        $passwordErr = "Passwords do not match";
        $error = 1;
    }
  }

}
//echo '<script type="text/javascript">','alert("'.$nombre,$email,$password1,$password2.'");','</script>';
if($error) {} //echo json_encode(array($usernameErr,$emailErr,$passwordErr));
else {
    //echo json_encode(array("Success"));
 //echo '<script type="text/javascript">','alert("'.$nombre,$email,$password1,$password2.'");','</script>';
       
 if(creaCuenta($username,$email,$password1)){
    //echo json_encode(array("Success"));
    echo '<script type="text/javascript">','alert("'.'success'.'");','</script>';
    }
 //else echo json_encode(array("Error: En insercion de base de datos!"));
}
}
else{
  

  if (empty($_POST["usernameQ"])) {
  } else {
    $usernameQ = test_input($_POST["usernameQ"]);
    $Query = consultaCuenta($usernameQ);
    echo "<script>window.onload = function what(){
document.getElementById('resultado').innerHTML=".'"'.$Query.'"'.";}</script>";
  }




}


?>