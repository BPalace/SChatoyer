<?php
	require 'DB/conexion.php';
	
	$id = $_GET['id'];

	$intereses = isset($_POST['intereses']) ? $_POST['intereses'] : null;
	
	$arrayIntereses = null;
	
	$num_array = count($intereses);
	$contador = 0;
	
	if($num_array>0){
		foreach ($intereses as $key => $value) {
			if ($contador != $num_array-1){
			$arrayIntereses .= $value.' ';
			$contador++;
			} else {
			$arrayIntereses .= $value;
			}
		}
	}
	$consulta=pacienteOrden($id);

	$row= $consulta->fetch_array(MYSQL_ASSOC);
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/jquery.dataTables.min.js" ></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
		$(document).ready(function(){
			$('table.display').DataTable();
		});
	</script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">GENERAR ORDEN DE EXAMENES</h3>
			</div>
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
					
			<div class="form-group">
				<table class="table table-striped">
					<?php
					$consulta=pruebas();
					while($row = $consulta->fetch_array(MYSQLI_ASSOC)) {  
					?>
					<tr>
						<td><?php echo $row['IdExamen']; ?></td>
						<td><?php echo $row['Nombre']; ?></td>
						<td><?php echo $row['tbl_TipoExamen_IdTipo']; ?></td>
						<td><label class="radio radio-inline">
							<input type="radio" id="add" name="add" value="M"> Agregar
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="add" name="add" value="F" checked> Quitar
						</label></td>
						<td></td>
					</tr>
					<?php } ?>
					<tr>
						<td>
							<div class="list-group">
							  <a href="#" id= class="list-group-item"><?php echo $row['Nombre']; ?></a>
							  <a href="#" class="list-group-item" >Second item</a>
							  <a href="#" class="list-group-item">Third item</a>
							</div>
						</td>
					</tr>
				</table>
					<label for="intereses" class="col-sm-2 control-label">Generales</label>
					
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Libros"> Libros
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Musica"> Musica
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes"> Deportes
						</label>
						
						<label class="checkbox-inline">
							<input type="checkbox" id="intereses[]" name="intereses[]" value="Otros"> Otros
						</label>
					</div>
			
			<div class="row table-responsive" id="Uroanalisis" >
				<h3 style="text-align: center">Examenes</h3>
				<table class="display dataTable" id="utabla">
				<thead>
				<tr>
				<th>Id Examne</th>
				<th>Nombre Examen</th>
				<th>Tipo Examen/th>
				<th>Agregar</th>
				<th></th>
				</tr>
				</thead>
				<tbody>
					<?php while($row = $consulta->fetch_array(MYSQLI_ASSOC)) {  ?>
					<tr>
						<td><?php echo $row['IdExamen']; ?></td>
						<td><?php echo $row['Nombre']; ?></td>
						<td><?php echo $row['tbl_TipoExamen_IdTipo']; ?></td>
						<td><label class="radio-inline">
							<input type="radio" id="add" name="add" value="M"> Agregar
						</label>
						
						<label class="radio-inline">
							<input type="radio" id="add" name="add" value="F" checked> Quitar
						</label></td>
						<td></td>
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

