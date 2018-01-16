<?php
	require 'conexion.php';
	
	$id = $_GET['id'];

	$sql= "SELECT * FROM tbl_Paciente WHERE IdPaciente= '$id'";
	$resultado = $mysqli->query($sql);
	$row= $resultado->fetch_array(MYSQL_ASSOC);
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
				<h3 style="text-align:center">Reportar Examen</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="upExamen.php" autocomplete="off">
				<div class="form-group">   
					<label for="nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" value="<?php echo $row['Nombres']; ?>"  required>
					</div>
				</div>

				<input type="hidden" id="id" name="id" value="<?php echo $row['IdPaciente']; ?>"/>
				
				<div class="form-group">
					<label for="apellido" class="col-sm-2 control-label">Apellidos</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $row['Apellidos']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="Nacimiento" class="col-sm-2 control-label">Fecha de Nacimiento</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="nacimiento" name="nacimiento" placeholder="Nacimietno" value="<?php echo $row['FechaNac']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="sexo" class="col-sm-2 control-label">Sexo</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="sexo" name="sexo" value="M" <?php if ($row['Sexo'] == 'M') echo 'checked'?>> MAsculino
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="sexo" name="sexo" value="F" <?php if ($row['Sexo'] == 'F') echo 'checked'?>> Femenino
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['Celular']; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['Correo']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Direccion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $row['Direccion']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>


