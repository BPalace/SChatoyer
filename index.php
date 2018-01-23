<?php

	require 'DB/conexion.php';

	
	$consulta= pacientes();



?>
<html lang="es">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="js/jquery-3.2.1.min.js" ></script>
	<script src="js/jquery.dataTables.min.js" ></script>
	<script src="js/bootstrap.min.js" ></script>

	<script>
		$(document).ready(function(){
			$('#mitabla').DataTable({
				

			});
		});
	</script>
</head>
<body>
	<div class="container">
	<div class="row">

	<h2 style="text-align :center">LABORATORIO Y CENTRO MEDICO CHATOYER</h2>

	</div>
	<div style="row">
	<a href="nuevo.php" class="btn btn-primary" >Nuevo Registro</a>
	<a href="pendientes.php" class="btn btn-primary" >Examenes Pendientes</a>
	</div>
	<br>
	<div class="row table-responsive">
		<table class="display" id="mitabla">
		<thead>
		<tr>
		<th>ID</th>
		<th>NOMBRES</th>
		<th>APELLIDOS</th>
		<th>Fecha Nacimiento</th>
		<th>Fecha Ingreso</th>
		<th>SEXO</th>
		<th>CELULAR</th>
		<th>CORREO</th>
		<th>DIRECCION</th>
		<th></th>
		<th></th>
		</tr>
		</thead>
		<tbody>
			<?php while($row = $consulta->fetch_array(MYSQLI_ASSOC)) {  ?>
			<tr>
				<td><?php echo $row['IdPaciente']; ?></td>
				<td><?php echo $row['Nombres']; ?></td>
				<td><?php echo $row['Apellidos']; ?></td>
				<td><?php echo $row['FechaNac']; ?></td>
				<td><?php echo $row['FechaIn']; ?></td>
				<td><?php echo $row['Sexo']; ?></td>
				<td><?php echo $row['Celular']; ?></td>
				<td><?php echo $row['Correo']; ?></td>
				<td><?php echo $row['Direccion']; ?></td>
				<td><a href="generaorden.php?id=<?php echo $row['IdPaciente']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a href="#" data-href="eliminar.php?id=<?php echo $row['IdPaciente']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
	</div>

		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>
				
	
</body>
</html>
