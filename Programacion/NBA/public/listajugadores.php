<?php
require './../src/jugador.php';

if (isset($error)){
  if($error==false){
    // No hey error
    $jugador-> listarJugadores();
echo $jugador; 
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/index.css" type="text/css"/>
</head>
<body>
     <!-- Menu Navegacion -->
    <?php include "./assets/navSup.php";?>
    <?php 
    if (isset($error)) {
    echo $error;
    }
    ?>
    <!-- Pie de pagina -->
<?php include "./assets/footer.php";?>
</body>
</html>