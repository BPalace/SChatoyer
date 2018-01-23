<?php
	require 'DB/conexion.php';
	
	$id = $_GET['id'];

	$consulta=pacienteOrden($id);

	$row= $consulta->fetch_array(MYSQL_ASSOC);
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
		$(document).ready(function(){
			$('#extabla').DataTable(

				);
		});
		</script>
		
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">GENERAR ORDEN DE EXAMENES</h3>
			</div>
			<form class="form-horizontal" method="POST" action="guardarOrden.php" autocomplete="off">
			<fieldset>
				<legend>Datos del Paciente</legend>
					<div class="row table-responsive">
						<input type="hidden" id="id" name="id" value="<?php echo $row['IdPaciente']; ?>"/>
						<table class="table table-striped" id="mitabla">
							<thead>
							<tr>
							<th>NOMBRES</th>
							<th>APELLIDOS</th>
							<th>Edad</th>
							<th>SEXO</th>
							<th>CELULAR</th>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $row['Nombres']; ?></td>
									<td><?php echo $row['Apellidos']; ?></td>
									<td><?php echo $row['Edad']; ?></td>
									<td><?php echo $row['Sexo']; ?></td>
									<td><?php echo $row['Celular']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
			</fieldset>
			
			<div class="row table-responsive">
				<h3 style="text-align: center">Examenes</h3>
				<table id="extabla" class="display DataTable">
				<thead>
				<tr>
				<th>Nombre Examen</th>
				<th>Tipo Examen</th>
				<th>Agregar</th>
				</tr>
				</thead>
				<tbody>
					<?php
							$consulta=pruebas();
							while($row = $consulta->fetch_array(MYSQLI_ASSOC)) {  
					?>
					<tr>
						<td><?php echo $row['Nombre']; ?></td>
						<td><?php echo $row['NombreTipo']; ?></td>
						<td>
							<label class="checkbox-inline">
								<input type="checkbox" id="pruebas[]" name="pruebas[]" value="<?php echo $row['IdExamen']; ?>">Agregar
							</label>
						</td>
					</tr>
				<?php } ?>
				</tbody>
				</table>
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

