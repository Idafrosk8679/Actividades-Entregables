<?php
//Incluimos todas las clases y funciones del proyecto
require_once 'inc/functions.php';

	$conexion = new Tools;
	$conexion -> registro($conexion)

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="./css/maininicio.css"><link/>
</head>
<body>
  		<?php if(!empty($message)): ?>
		  <p><?php $message ?></p>
<?php endif; ?>
		<div>
			<form class="box" method="post" required>
				<h1>Registrarse</h1>
				<p>
					<h3>Username</h3>
					<input class="w3-input w3-border" type="text" name="username" >

					<h3>Contraseña</h3>
					<input class="w3-input w3-border" type="text" name="password" >

					<h3>Confirmar contraseña</h3>
					<input class="w3-input w3-border" type="text" name="confirm_password" >
				</p>
				<p>
					<h3>Nombre</h3>
					<input class="w3-input w3-border" type="text" name="nombre" >

					<h3>Apellido</h3>
					<input class="w3-input w3-border" type="text" name="apellido" >

					<h3>Edad</h3>
					<input class="w3-input w3-border" type="text" name="edad" >

					<h3>Curso</h3>
					<input class="w3-input w3-border" type="text" name="curso" >
				</p>
				<p>
					<input type="submit" name="" value="Registrarse">
				</p>
				<p><a href="login.php">Ahora no</a></p>
			</form>
		</div>
</body>
</html>