<?php
	
	require 'DB//conexion.php';
	
	$id = $_POST['id'];
	$examenes = isset($_POST['pruebas']) ? $_POST['pruebas'] : null;

	echo json_encode($examenes);
	
	$arraypruebas = null;
	
	$num_array = count($examenes);
	$contador = 0;
	
	if($num_array>0){
		foreach ($examenes as $key => $value) {
			if ($contador != $num_array-1){
			$arraypruebas .= $value.' ';
			$contador++;
			} else {
			$arraypruebas .= $value.' ';
			}
		}
	}
	
	$sql = "INSERT INTO tbl_orden(IdPaciente, IdRemitente, IdEmpleado, EXAMENES) VALUES ('$id',1,1,'$arraypruebas')";
	$resultado = $mysqli->query($sql);
	
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
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
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>