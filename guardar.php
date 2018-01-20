<?php

	require 'DB/conexion.php';

	$nombres= $_POST['nombres'];
	$apellidos= $_POST['apellidos'];
	$fnac= $_POST['nacimiento'];
	$sexo= isset($_POST['sexo']) ? $_POST['sexo'] : null ;
	$telefono= $_POST['telefono'];
	$email= $_POST['email'];
	$direccion= $_POST['direccion'];

	$sql= "INSERT INTO tbl_Paciente(Nombres, Apellidos, FechaNac, Sexo, Celular, Correo, Direccion) values ('$nombres','$apellidos','$fnac','$sexo','$telefono','$email','$direccion')";

	$resultado=$mysqli->query($sql);



?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
<body>
	<div class="container">
		<div class="row">
			<div class="row" style="text-align:center">
			<?php if($resultado) { ?>
			<h3>REGISTRO GUARDADO</h3>
			<?php } else { ?>
			<h3>ERROR AL GUARDAR</h3>
			<?php } ?>

			<a href="index.php" class="btn btn-primary">REGRESAR</a>

			</div>
		</div>

	</div>

</body>
</html>	

