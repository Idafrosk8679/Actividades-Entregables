<?php
require './../src/Equipo.php';

$e=new Equipo();
$error=$e->comprobarCampos($_POST);
  if(isset($_POST["Nombre"])) { 
       $e->conexion();
       $nombre=$_POST["Nombre"];
      $ciudad=$_POST["Ciudad"];
      $conferencia=$_POST["Conferencia"];
      $division=$_POST["Division"];
      $e->insertarEquipo($nombre,$ciudad,$conferencia,$division);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/index.css" type="text/css"/>
  </head>
  <body>
    <!-- Menu Navegacion -->
    <?php include "./assets/navSup.php"?>
    <?php if (isset($error)) {
    echo $error;
    }
  ?> 

<div class="formulario">
    <h1><p>Nuevo Equipo</p></h1>
  <!-- Formulario de insercion -->
    <h2><form class="formNBA" action="nuevoequipo.php" method="post">
      <div class="grupoForItem">
        <label for="nombre">Nombre</label>
        <br>
        <input type="text" name="Nombre" value="">
      </div>
      <div class="grupoForItem">
        <label for="ciudad">Ciudad</label>
        <br>
        <input type="text" name="Ciudad" value="">
      </div>
      <div class="grupoForItem">
        <label for="conferencia">Conferencia</label>
        <br>
        <input type="text" name="Conferencia" value="">
      </div>
      <div class="grupoForItem">
        <label for="division">Division</label>
        <br>
        <input type="text" name="Division" value="">
      </div>
      <div class="grupoForItem">
        <input type="submit" name="Enviar" value="Insert">
      </div>
    </div>
  </form>
  <!-- Pie de pagina -->
  <?php include "./assets/footer.php"?>
  </body>
</html>
<!-- $nombre,$ciudad,$conferencia,$division -->