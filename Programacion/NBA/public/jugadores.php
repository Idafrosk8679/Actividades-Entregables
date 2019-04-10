<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JUGADORES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/index.css">
    <script src="main.js"></script>
</head>
<body>
    <!-- Menu de navegacion. -->
    <?php include "./assets/navSup.php" ?>
    <?php
    //Me conecto a la base de datos.
    $conector=new mysqli ("localhost","root","","nba");
    if ($conector-> connect_errno) {
        echo "fallo al conectar con sql:" .$conector->conect_errno;
    } 
    else {
        $resultado=$conector->query("SELECT * FROM jugadores");
        //Sale por pantalla la consulta.
        foreach ($resultado as $jugadores) {
            echo"<br>Codigo:".$jugadores["codigo"];
            echo"<br>Nombre:".$jugadores["Nombre"];
            echo"<br>Procedencia:".$jugadores["Procedencia"];
            echo"<br>Altura:".$jugadores["Altura"];
            echo"<br>Peso:".$jugadores["Peso"];
            echo"<br>Posicion:".$jugadores["Posicion"];
            echo"<br>Nombre EQUIPO:".$jugadores["Nombre_equipo"];
            echo"<br>";
        }
    }
    ?>
      <!-- Pie de pagina -->
  <?php include "./assets/footer.php"?>
</body>
</html>