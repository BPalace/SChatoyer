<?php
	require 'DB/conexion.php';
	
	$id = $_GET['id'];
	$id2 = $_GET['id2'];

	$sql= "SELECT t1.IdOrden, t1.IdExamen, t3.Nombres, t3.Apellidos, t3.Sexo, t3.Celular, (YEAR(CURRENT_DATE)-YEAR(t3.FechaNac))as Edad, t4.Nombre, t1.Resultado, t4.Unidades, t4.ValRef, t1.Validado FROM examenes t1 
INNER JOIN tbl_orden t2 on t1.IdOrden=t2.IdOrden
INNER JOIN tbl_paciente t3 on t2.IdPaciente=t3.IdPaciente
INNER join tbl_examenes t4 on t1.IdExamen=t4.IdExamen WHERE t1.IdOrden='$id' and t1.IdExamen= '$id2' ";
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
				<h3 style="text-align:center">MODIFICAR RESULTADO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="actualizarResultados.php" autocomplete="off">
				<input type="hidden" id="ido" name="ido" value="<?php echo $row['IdOrden']; ?>"/>
				<input type="hidden" id="ide" name="ide" value="<?php echo $row['IdExamen']; ?>"/>
				<div>
					<fieldset>
						<legend>Datos del Paciente</legend>
					
						<div class="row table-responsive">
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
					
				</div>
				<div>
					<fieldset>
						<legend>Resultado</legend>
					
						<div class="row table-responsive">
							<table class="table table-striped" id="mitabla">
								<thead>
								<tr>
								<th>EXAMEN</th>
								<th>RESULTADDO</th>
								<th>UNIDADES</th>
								<th>VALORES DE REFERENCIA</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $row['Nombre']; ?></td>
										<td><input type="text" id="result" name="result" placeholder="Resultado" value="<?php echo $row['Resultado']; ?>"  required></td>
										<td><?php echo $row['Unidades']; ?></td>
										<td><?php echo $row['ValRef']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</fieldset>
				</div>
				
				<div class="form-group">
					<label for="sexo" class="col-sm-2 control-label">Validacion</label>
					
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" id="valid" name="valid" value="1" <?php if ($row['Validado'] == '1') echo 'checked'?>> Si
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="valid" name="valid" value="0" <?php if ($row['Validado'] == '0') echo 'checked'?>> NO
						</label>
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


