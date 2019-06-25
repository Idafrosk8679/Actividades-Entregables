<?php
//Incluimos todas las clases y funciones del proyecto
require_once 'inc/functions.php';

$u = new usuarios();
$u->getAllInfo();

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
    include "mod/navSup.php"
     ?>
    <table border="1" width="70%">
      <br>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Edad</th>
      <th>Curso</th>

      <?php
      foreach ($u as $username) {
        echo "<tr>";
        echo "<td><a href=juego.php?username=".$username['nombre'].">".$username['nombre']."</td>";
        echo "<td>".$username['apellidos']."</td>";
        echo "<td>".$username['edad']."</td>";
        echo "<td>".$username['curso']."</td>";
        echo "</tr>";
      }
      var_dump($u);
       ?>
    </table>
    <?php
    include "mod/footer.php"
     ?>
  </body>
</html>
