<?php
require './../src/jugador.php';

$jugador=new Jugador();
$error = $jugador-> comprobarCampos($_POST);
if (isset($error)){
  if($error==false){
    // No hey error
    $jugador-> conexion();
    $jugador-> insertarJugador();
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/index.css" type="text/css"></link>
  </head>
  <body>
    <!-- Menu Navegacion -->
    <?php include "./assets/navSup.php"?>
    <?php include "./assets/footer.php"?>
    <?php if (isset($error)) {
    echo $error;
} ?>
  <!-- Formulario de insercion -->
    <form class="formNBA" action="nuevojugador.php" method="post">
      <h2><p>Nuevo Jugador</p>
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
  </form>
  </body>
</html>
