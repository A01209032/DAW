<!DOCTYPE html>
<html lang="es">
  <head>
      <script src="entrada.js" charset="utf-8"></script>
      <link rel="stylesheet" href="main.css">
      <title>Laboratorio 9</title>
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  </head>
<body>
  <div class="row">
    <div class="col s12 light-blue lighten-2">
      <h1>Laboratorio 9</h1>
    </div>
        <div class="col s0 m2">

        </div>
        <div class="col s12 m8">
          <br>

          <h4>Script 1:</h4>
          <h5>Una función que reciba un arreglo de números y devuelva su promedio
          </h5>
          <br>
          <div class="center-align">
            <a class="waves-effect waves-light btn" onclick="prueba('tabla')">Promedio</a>
          </div>
          <div id="tabla">
            <?php
              require_once("php/util.php");
              pruebaPromedio();
            ?>
          </div>

          <h4>Script 2:</h4>
          <h5>Una función que reciba un arreglo de números y devuelva su mediana
          </h5>
          <br>
          <div class="center-align">
            <a class="waves-effect waves-light btn" onclick="prueba('tabla2')">Mediana</a>
          </div>
          <div id="tabla2">
            <?php
              require_once("php/util.php");
              pruebaMediana();
            ?>
          </div>

          <h4>Script 3:</h4>
          <h5>Una función que reciba un arreglo de números y muestre la lista de números, y como ítems de una lista html muestre el promedio, la media, y el arreglo ordenado de menor a mayor, y posteriormente de mayor a menor
          <br>
          <div class="center-align">
            <a class="waves-effect waves-light btn"  onclick="prueba('tabla3')">Excute</a>
          </div>
          <div id="tabla3">
            <?php
              require_once("php/util.php");
              pruebaPML();
            ?>
          </div>


          <h4>Script 4:</h4>
          <h5>Una función que imprima una tabla html, que muestre los cuadrados y cubos de 1 hasta un número n
          </h5>
          <br>
          <div class="center-align">
            <a class="waves-effect waves-light btn"  onclick="prueba('tabla4')">Lista de numeros</a>
          </div>
          <div id="tabla4">
            <?php
              require_once("php/util.php");
              pruebaLista();
            ?>
          </div>


          <h4>Script 5:</h4>
          <h5>Escoge algún problema que hayas implementado en otro lenguaje de programación, y dale una solución en php, en una vista agradable para el usuario.
          </h5>
          <br>
          <div class="center-align">
            <img src="images/ACM.png" alt="image">
            <a class="waves-effect waves-light btn"  onclick="prueba('tabla5')">Ejecutar</a>
          </div>
          <div id="tabla5">
            <?php
              require_once("php/util.php");
              pruebaACM();
            ?>
          </div>
          <h4>Reporte:</h4>

          <h5>¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.</h5>
          <p>Muestra informacion sobre la configuracion de php. <br>Me llama la atencion que a traves de una funcion se pueda mostrar tanta informacion del sistema <br>Me llama la atencion que tambien puedas ver las variables <br>No se que tan seguro pueda ser que desde php se pueda mostrar tanta informacion del sistema </p>
          <h5>¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción?</h5>
          <p>Se tendria que abrir a la red</p>
          <h5>¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? Explica.</h5>
          <p>EL html y css se interpretan en el lado del cliente, pero php se ejecuta en el servidor</p>

        </div>
        <div class="col s0 m2">



        </div>



          </div>

         <script type="text/javascript" src="js/materialize.min.js"></script>
         <script src="entrada.js" charset="utf-8"></script>
</body>

</html>
