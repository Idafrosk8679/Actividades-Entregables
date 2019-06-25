<?php
//Incluimos todas las clases y funciones del proyecto
require_once 'inc/functions.php';

/**
 * Mostramos todos los datos de la usuarios
 * Usado para desarrollo 

$table1 = new usuarios();
print_r($table1->getAllInfo());
*/
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="./css/maininicio.css"><link/>

	</head>
	
	<body>
		<div>
		<form class="box" id="loginForm" action="inc/login.php" method="post">
			<h1>Login</h1>
				<input type="text" name="txtUsername" placeholder="Username" autofocus >
				<input type="password" name="txtPassword" placeholder="******" >
				<input type="submit" name="login" value="Login">

				<a href="registrarse.php" class='pregunta'>No estas registrado? Registrate</a>
				
				<a href="juego.php" class='pregunta'>Accede sin registro</a></i>
		</form>
	</div>
	</body>
</html>