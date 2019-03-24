<?php
    
    function conectDb(){
      	$conexion=mysqli_connect("localhost","root","","rbac");
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
    
    function encabezado() {
        include("partials/_head.html");
    }

    function titulo($titulo) {
        echo "<h1>$titulo</h1>";
    }
    function getrol($usuario){
        $conn= conectDb();
        $query="SELECT Id_Rol FROM roles_usuario WHERE Id_Usuario='$usuario'";
        $res= mysqli_query($conn,$query);
        if(mysqli_num_rows($res)>0){
            $rol=mysqli_fetch_assoc($res);
            $rolusuario=$rol["Id_Rol"];
             closeDB($conn);
            return $rolusuario;
        }else{
             closeDB($conn);
            echo "No existe el rol o el usuario";
        }
        
    }
    function imprime_opciones($rol){
        $conn=conectDb();
        $query="SELECT Id_Privilegio FROM roles_privilegios WHERE Id_Rol = '$rol'";
        $res=mysqli_query($conn,$query);
         if(mysqli_num_rows($res)>0){
    echo ' <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">Opciones por Rol</a>';
    echo'<div class="dropdown-menu"> ';
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($res)){
    $terminal='.php';
    $temp='';
    $temp .=$row["Id_Privilegio"];
    $temp .=$terminal;
      echo '<a class="dropdown-item" href="'.$temp.'" >'.$row["Id_Privilegio"].'</a>';
    }
  }
    echo ' </div>';
    
    mysqli_free_result($res);
    closeDb($conn);
 
        
    }
    function validarUsuario($usuario,$contrasena){
        $conn=conectDb();
        $query = "SELECT * FROM usuario WHERE Id_Usuario='$usuario' AND Contrasena='$contrasena'";
        $res = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($res) > 0){//If there are actually results
            closeDB($conn);
            return true;
        }else{
            closeDB($conn);
            return false;
        }
        /*
        $conn = conectDB();
        $sql = "SELECT * FROM usuario WHERE Id_Usuario='$usuario' AND Contrasena='$contrasena'";    
        $result = mysqli_query($conn,$sql);
        
        $row = mysqli_fetch_assoc($result);
        echo $row;
        closeDB($conn);
        return $row;*/
    }
    
     function consultaMonto($min,$max){
        $conn=conectDb();
        $query = "SELECT id_Usuario,Monto,Fecha,Tipo FROM usuario_transaccion WHERE Monto between $min and $max";
        $res = mysqli_query($conn, $query);
        $resultado;
        if(mysqli_num_rows($res) > 0){//If there are actually results
            $resultado="<table>"."<tr>"."<th>Usuario</th>"."<th>Monto</th>"."<th>Fecha</th>"."<th>Tipo</th>"."</tr>";
        while($row = mysqli_fetch_array($res)){
            $resultado=$resultado."<tr>"."<td>" . $row['id_Usuario'] . "</td>"."<td>" . $row['Monto'] . "</td>"."<td>" . $row['Fecha'] . "</td>"."<td>" . $row['Tipo'] . "</td>"."</tr>";
        }
        $resultado=$resultado."</table>";
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado="No results";
        }
        return $resultado;
    }
    
    
    
    
      function consultaTransaccionesNombre($nombre,$apellidos){
        $conn=conectDb();
        $query = "SELECT ut.id_Usuario,Monto,Fecha,Tipo FROM usuario_transaccion ut, usuario u WHERE ut.id_Usuario=u.id_Usuario and u.Nombre like '%$Nombre%' and u.Apellidos like '%$apellidos%'";
        $res = mysqli_query($conn, $query);
        $resultado;
        if(mysqli_num_rows($res) > 0){//If there are actually results
            $resultado= "<table><tr><th>Usuario</th><th>Monto</th><th>Fecha</th><th>Tipo</th></tr>";
        while($row = mysqli_fetch_array($res)){
            $resultado =$resultado."<tr><td>". $row['id_Usuario'] . "</td><td>". $row['Monto'] . "</td><td>". $row['Fecha'] . "</td><td>". $row['Tipo'] . "</td></tr>";
        }
        $resultado=$resultado."</table>";
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado= "No results";
        }
        return $resultado;
    }


    function consultaPersonalHabilitado($fecha1,$fecha2){
        $conn=conectDb();
        $query = "SELECT u.Nombre,u.Apellidos,a.Fecha FROM usuario u ,trabajadores_areatrabajo a WHERE u.id_Usuario = a.id_Usuario and Fecha between $fecha1 and $fecha2";
        $res = mysqli_query($conn, $query);
        $resultado;
        if(mysqli_num_rows($res) > 0){//If there are actually results
            $resultado="<table>"."<tr>"."<th>Nombre</th>"."<th>Apellidos</th>"."<th>Fecha</th>"."</tr>";
        while($row = mysqli_fetch_array($res)){
            $resultado=$resultado."<tr>"."<td>" . $row['Nombre'] . "</td>"."<td>" . $row['Apellidos'] . "</td>"."<td>" . $row['Fecha'] . "</td>"."</tr>";
        }
        $resultado=$resultado."</table>";
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado="No results";
        }
        return $resultado;
    }
    
    function consultaAreasTrabajo($nombre,$apellidos){
        $conn=conectDb();
        $query = "SELECT a.Id_AreaTrabajo,Descripcion_AreaTrabajo FROM trabajadores_areatrabajo ta,usuario u,areatrabajo a WHERE u.Nombre like '%$nombre%' and u.Apellidos like '%$apellidos%' and u.id_Usuario = ta.id_Usuario and ta.id_AreaTrabajo = a.id_AreaTrabajo ";
        $res = mysqli_query($conn, $query);
        $resultado;
        if(mysqli_num_rows($res) > 0){//If there are actually results
            $resultado="<table>"."<tr>"."<th>Usuario</th>"."<th>Monto</th>"."</tr>";
        while($row = mysqli_fetch_array($res)){
            $resultado=$resultado."<tr>"."<td>" . $row['Id_AreaTrabajo'] . "</td>"."<td>" . $row['Descripcion_AreaTrabajo'] . "</td>"."</tr>";
        }
        $resultado=$resultado."</table>";
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado="No results";
        }
        return $resultado;
    }
    
    function consultaTransaccionesTipo($tipo){
        $conn=conectDb();
        $query = "SELECT Monto,Fecha,Tipo FROM usuario_transaccion  WHERE Tipo like '%$tipo%'";
        $res = mysqli_query($conn, $query);
        $resultado;
        if(mysqli_num_rows($res) > 0){//If there are actually results
            $resultado= "<table><tr><th>Monto</th><th>Fecha</th><th>Tipo</th></tr>";
        while($row = mysqli_fetch_array($res)){
            $resultado =$resultado."<tr><td>". $row['Monto'] . "</td><td>". $row['Fecha'] . "</td><td>". $row['Tipo'] . "</td></tr>";
        }
        $resultado=$resultado."</table>";
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado= "No results";
        }
        return $resultado;
    }
    
    function consultaCuenta($nombre,$apellidos){
        $conn=conectDb();
        $query = "SELECT id_Usuario,Nombre,Apellidos,Fecha_Creacion,Fecha_Nacimiento,Balance FROM usuario WHERE Nombre like '%$nombre%' and Apellidos like '%$apellidos%'";
        $res = mysqli_query($conn, $query);
        $resultado;
        if(mysqli_num_rows($res) > 0){//If there are actually results
            $resultado="<table>"."<tr>"."<th>Usuario</th>"."<th>Nombre</th>"."<th>Apellidos</th>"."<th>Fecha_Creacion</th>"."<th>Fecha_Nacimiento</th>"."<th>Balance</th>"."</tr>";
        while($row = mysqli_fetch_array($res)){
            $resultado=$resultado."<tr>"."<td>" . $row['id_Usuario'] . "</td>"."<td>" . $row['Nombre'] . "</td>"."<td>" . $row['Apellidos'] . "</td>"."<td>" . $row['Fecha_Creacion'] . "</td>"."<td>" . $row['Fecha_Nacimiento'] . "</td>"."<td>" . $row['Balance'] . "</td>"."</tr>";
        }
        $resultado=$resultado."</table>";
            closeDB($conn);
            
        }else{
            closeDB($conn);
            $resultado="No results";
        }
        return $resultado;
    }
    
    




    function regresarPagina() {
        echo "<a href='index.php'>Volver al index</a>";
    }

    function indice() {
        include("partials/_index.html");
    }
    
     function footer() {
        include("partials/_footer.html");
    }
    function inicio_de_sesion(){
        include("partials/_login.html");
    }
    
    

?>