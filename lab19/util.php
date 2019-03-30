<?php
    
    function conectDb(){
      	$conexion=mysqli_connect("localhost","root","","labAjax");
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
    
    function creaPalabra($nombre){
        $conn= conectDb();
        $query="INSERT INTO `palabras`( `palabra`) VALUES ('$palabra')";
        $res= mysqli_query($conn,$query);
        if($res){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    function consultaPalabras(){
        $conn=conectDb();
        $query = "SELECT palabra FROM palabras";
        $res = mysqli_query($conn, $query);
        $resultado=array();
        if(mysqli_num_rows($res) > 0){//If there are actually results
        while($row = mysqli_fetch_array($res)){
            $resultado[]=$row['palabra'];
        }
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado[]="No results";
        }
        return $resultado;
    }
    


    


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    

?>