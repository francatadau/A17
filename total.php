<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conexion a la base de datos</title>
  </head>
  <body>
    <?php
    //Creamos el objeto de conexión.
    $mysqli = new mysqli("localhost","root","","beneficios");
    if ($mysqli->connect_errno) {
      //Ha habido error
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno .")" . $mysqli->connect_error;
    }else {
      //No ha habido error
      echo "Conexion realizada<hr>";
      //Hacemos una consulta
      $resultado1 = $mysqli->query(" SELECT * FROM gastos");

      $resultado2 = $mysqli->query(" SELECT * FROM ventas");
      //Cuantas filas nos devuelve
     ?>
     <table border="1">
      <tr>
        <th><a href="index.php">INICIO</a></th>
        <th><a href="total.php">Total</a></th>
        <th><a href="ben_1.php">Beneficios semana 1</a></th>
        <th><a href="ben_2.php">Beneficios semana 2</a></th>
      </tr>
    </table>
    <br>

     <?php

     $totalgasto=0;
     while ($fila1=$resultado1->fetch_assoc()) {
       $totalgasto=$totalgasto+$fila1["gasto"];

     }
     echo "total gasto: ".$totalgasto."<br>";

     $totalventa=0;
     while ($fila2=$resultado2->fetch_assoc()) {
       $totalventa=$totalventa+$fila2["venta"];

     }
     echo "total venta: ".$totalventa."<br>";

    }

?>

  </body>
</html>
