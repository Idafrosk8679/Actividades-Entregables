<?php
require './../src/Jugador.php';

  $j=new Jugador();
  $j2=new Jugador();
  $error=$j->comprobarCampos($_POST);
  $j->setCodigo(-3.5);
  if(isset($_POST["Codigo"])) { 
       $j->conexion();
       $codigo=$_POST["Codigo"];
      $nombre=$_POST["Nombre"];
      $peso=$_POST["Peso"];
    $j->insertarJugador($codigo,$nombre,$peso);
    
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
    <h1><p>Nuevo Jugador</p></h1>
  <!-- Formulario de insercion -->
    <h2><form class="formNBA" action="nuevojugador.php" method="post">
      <div class="grupoForItem">
        <label for="codigo">Codigo</label>
        <br>
        <input type="text" name="Codigo" value="">
      </div>
      <div class="grupoForItem">
        <label for="nombre">Nombre</label>
        <br>
        <input type="text" name="Nombre" value="">
      </div>
      <div class="grupoForItem">
        <label for="peso">Peso</label>
        <br>
        <input type="text" name="Peso" value="">
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
