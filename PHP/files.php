<?
    function connect()
    {
        $mysql = mysqli_connect("localhost","a01029032","","test");
        if($conexion == NULL){
            die("404")
        }
        return $conexion;
    }
    
    function close($conexion){
        mysqli_close($conexion);
    }
    
    close(connect());
?php>