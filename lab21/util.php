<?php
    
    function conectDb(){
      	$conexion=mysqli_connect("localhost","root","","lab16");
      	//Validar la conexion
      	if($conexion==NULL){
      		die("Error en la conexión");
      	}
      	$conexion->set_charset("utf8");
    
      	return $conexion;
      }

  //Cierra la base de datos
  function closeDb ($conexion){
  	mysqli_close($conexion);
  }
    
    function creaCuenta($usuario,$email,$password){
        $conn= conectDb();
        $query="call creaCuenta('$usuario','$email','$password')";
        $res= mysqli_query($conn,$query);
        if($res){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    function consultaCuenta($username){
        $conn=conectDb();
        $query = "SELECT * FROM usuarios WHERE username like '%$username%'";
        $res = mysqli_query($conn, $query);
        $resultado;
        if(mysqli_num_rows($res) > 0){//If there are actually results
            $resultado="<table>"."<tr>"."<th>id</th><th>Usuario</th>"."<th>Email</th>"."<th>Contraseña</th>"."</tr>";
        while($row = mysqli_fetch_array($res)){
            $resultado=$resultado."<tr>"."<td>" . $row['id'] . "</td>"."<td>" . $row['username'] . "</td>"."<td>" . $row['email'] . "</td>"."<td>" . $row['password'] . "</td>"."</tr>";
        }
        $resultado=$resultado."</table>";
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado="No results";
        }
        return $resultado;
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
    

?>