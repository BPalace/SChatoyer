<?php

	require 'DB/conexion.php';

	$ido= $_POST['ido'];
	$ide= $_POST['ide'];
	$result= $_POST['result'];
	$valido= isset($_POST['valid']) ? $_POST['valid'] : null ;

	$sql="UPDATE examenes SET Resultado='$result',Validado='$valido' WHERE IdOrden='$ido' and IdExamen='$ide';";

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
			<h3>REGISTRO MODIFICADO</h3>
			<?php } else { ?>
			<h3>ERROR AL MODIFICAR</h3>
			<?php } ?>

			<a href="index.php" class="btn btn-primary">REGRESAR</a>

			</div>
		</div>

	</div>

</body>
</html>	

