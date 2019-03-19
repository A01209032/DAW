<?php

  function connectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbname";

    $con = mysqli_connect($servername,$username,$password,$dbname);

    //Check check cnnection

    if(!$con){
      die("Connection failed: " . mysqli_connect_error());
    }

    return $con;
  }

  //variable mysql es una conexion establecida anteriormente
  function closeDb($mysql){
    mysqli_close($mysql);
  }

  function getFruits(){
    $conn = connectDb();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit";
    closeDb($conn);
    return $result;
  }

  function getFruitsByCountry($country){
    $conn = connectDb();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE country = '".$country."'";
    closeDb($conn);
    return $result;
  }

  function getFruitsByQuantity($quantity){
    $conn = connectDb();
    $sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE quantity > '".$quantity."'";
    closeDb($conn);
    return $result;
  }



  function imprimir(){
    $result = getFruits();
    if(mysqli_num_rows($result)>0){
      while($row - msqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["units"]."</td>";
        echo "<td>".$row["quantity"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td>".$row["country"]."</td>";
        echo "</tr>";
      }
    }

    $result = getFruitsByCountry("Mexico");
    if(mysqli_num_rows($result)>0){
      while($row - msqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["units"]."</td>";
        echo "<td>".$row["quantity"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td>".$row["country"]."</td>";
        echo "</tr>";
      }
    }

    $result = getFruitsByQuantity("100");
    if(mysqli_num_rows($result)>0){
      while($row - msqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["units"]."</td>";
        echo "<td>".$row["quantity"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td>".$row["country"]."</td>";
        echo "</tr>";
      }
    }
  }


 ?>
