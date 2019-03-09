<?php
  function promedio($arreglo){
    $res=0;
    foreach ($arreglo as $value ) {
      $res = $res + $value;
    }
    $length = count($arreglo);
    $res = $res / $length;
    return $res;
  }

  function pruebaPromedio(){
    $prueba= array(array(1,3,5,7,8,0),array(0,3,6,7,8,1,-3,0),array(-2,-9,-8,8,0,0,0,0));
    echo "<table ><thead><tr><th>Matriz</th><th>Resultado</th></tr></thead><tbody>";
    for($i = 0; $i<3;$i++){
      echo "<tr><td>";


        echo "[";
        foreach ($prueba[$i] as $value) {
          echo $value;
          echo ",";
        }
        echo "]";

      echo "</td>";
      echo "<td>".promedio($prueba[$i])."</td></tr>";
    }
      echo "</tbody></table>";
  }

  function mediana($arreglo){
    sort($arreglo);
    $length = count($arreglo);
    $res=0;
    $mid = floor(($length-1)/2);
    if($length % 2) {
        $res = $arreglo[$mid];
    } else {
        $low = $arreglo[$mid];
        $high = $arreglo[$mid+1];
        $res = (($low+$high)/2);
    }
    return $res;
  }

  function pruebaMediana(){
    $prueba= array(array(1,3,5,7,8,0),array(0,3,6,7,8,1,-3,0),array(-2,-9,-8,8,0,0,0,0));
    echo "<table ><thead><tr><th>Matriz</th><th>Resultado</th></tr></thead><tbody>";
    for($i = 0; $i<3;$i++){
      echo "<tr><td>";
        echo "[";
        foreach ($prueba[$i] as $value) {
          echo $value;
          echo ",";
        }
        echo "]";

      echo "</td>";
      echo "<td>".mediana($prueba[$i])."</td></tr>";
    }
      echo "</tbody></table>";
  }

  function PML($arreglo){
    echo "<table ><thead><tr><th>Arreglo</th><th>Promedio</th><th>Mediana</th><th>Menor a mayor</th><th>Mayor a menor</th></tr></thead><tbody>";
      echo "<tr><td>";
      echo "[";
      foreach ($arreglo as $value) {
        echo $value;
        echo ",";
      }
      echo "]";
      echo "</td>";
      echo "<td>".promedio($arreglo)."</td>";
      echo "<td>".mediana($arreglo)."</td>";
      echo "<td>";
      echo "[";
      sort($arreglo);
      foreach ($arreglo as $value) {
        echo $value;
        echo ",";
      }
      echo "]";
      echo "</td>";
      echo "<td>";
      echo "[";
      rsort($arreglo);
      foreach ($arreglo as $value) {
        echo $value;
        echo ",";
      }
      echo "]";
      echo "</td></tr>";
      echo "</tbody></table>";
  }

  function pruebaPML(){
    $prueba= array(array(1,3,5,7,8,0),array(0,3,6,7,8,1,-3,0),array(-2,-9,-8,8,0,0,0,0));
    for($i = 0; $i<3;$i++){
      echo "Prueba:\n";
      echo "[";
      foreach ($prueba[$i] as $value) {
        echo $value;
        echo ",";
      }
      echo "]<br><br>";
      echo "Resultado: ";
      echo PML($prueba[$i])."<br>";
    }
  }

    function lista($number){
      echo "<table ><thead><tr><th>n</th><th>n²</th><th>n³</th></tr></thead><tbody>";
      for($i = 0; $number>=$i;$i++){
        echo "<tr><td>".$i."</td>";
        echo "<td>".($i*$i)."</td>";
        echo "<td>".($i*$i*$i)."</td></tr>";
      }
        echo "</tbody></table>";

    }

    function pruebaLista(){
      $prueba= array(2,6,8);
      for($i = 0; $i<3;$i++){
        echo "Prueba:   ";
        echo $prueba[$i];
        echo "<br><br>";
        echo "Resultado: ";
        echo lista($prueba[$i])."<br>";
      }

  }

  function ACM($input){
    $x1=$input[0];
    $y1=$input[1];
    $x2=$input[2];
    $y2=$input[3];
    if($x1==$x2){
      $resX = 0;
    }
    else if($x1>$x2){
      $resX = $x1-$x2;
    }
    else if($x2>$x1){
      $resX = $x2-$x1;
    }
    if($y1==$y2){
      $resY= 0;
    }
    else if($y1>$y2){
      $resY = $y1-$y2;
    }
    else if($y2>$y1){
      $resY = $y2-$y1;
    }

    

    if($resY>$resX) return $resY;
    else return $resX ;

  }

  function pruebaACM(){
    $prueba= array(array(0,0,4,5),array(3,4,6,1),array(5,8,3,7));
    echo "<table ><thead><tr><th>Matriz</th><th>Resultado</th></tr></thead><tbody>";
    for($i = 0; $i<3;$i++){
      echo "<tr><td>";
        echo "[";
        foreach ($prueba[$i] as $value) {
          echo $value;
          echo ",";
        }
        echo "]";

      echo "</td>";
      echo "<td>".ACM($prueba[$i])."</td></tr>";
    }
      echo "</tbody></table>";
  }


 ?>
