<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  
      <!-- Menu Navegacion -->
    <?php include "./mod/navSup.php"?>
    <?php if (isset($error)) {
    echo $error;
}
?>

  <div>
    <p class="textodadosI">Dado Inicial</p>
    <button type="submit" name="Inicio" id="inum" disabled ></button>
    <p class="textodadosF">Dado Final</p>
    <button type="submit" name="Final" id="fnum" disabled ></button>
  </div>
  <div>
    <button type="submit" onclick="nuevo()"name="Nuevo Juego" id="Nuevo_Juego" value="Nuevo Juego" class="enlace">Nuevo Juego</button>
  
    <button type="submit" onclick="reset()" name="Reset" id="Reset" value="Reset" class="enlace">Reset </button>
  </div>


  <div></div>
  <div id="NumeroM">
    <p id="movimientos"></p>
  </div>
</div>
  <script src="js/main.js" charset="utf-8"></script>
</body>

</html>
