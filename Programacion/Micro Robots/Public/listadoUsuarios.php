<?php

require "./../src/Conexion.php";
require "./../src/Usuario.php";

$user = new Usuario();
$user->conectar();
$resultado=$user->listarUsuario();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/user.css">
  </head>
  <body>
    <?php
    include "assets/navSup.php"
     ?>
    <table border="1" width="70%">
      <br>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Edad</th>
      <th>Curso</th>

      <?php
      foreach ($resultado as $usuario) {
        echo "<tr>";
        echo "<td><a href=juego.php?usuario=".$usuario['nombre'].">".$usuario['nombre']."</td>";
        echo "<td>".$usuario['apellidos']."</td>";
        echo "<td>".$usuario['edad']."</td>";
        echo "<td>".$usuario['curso']."</td>";
        echo "</tr>";
      }
      // var_dump($_POST);
       ?>
    </table>
    <?php
    include "assets/footer.php"
     ?>
  </body>
</html>
