<?php

	require ('DB/conexion.php');

	
	$consulta= pendientes();

	
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

	<h2 style="text-align :center">EXAMENES PENDIENTES</h2>

	</div>
	
	<br>
	<div class="row table-responsive" id="tabla1" >
		<table class="display" id="mitabla">
		<thead>
		<tr>
		<th>ID_ORDEN</th>
		<th>PACIENTE</th>
		<th>EXAMEN</th>
		<th>VALIDADO</th>
		<th></th>
		<th></th>
		</tr>
		</thead>
		<tbody>
			<?php while($row = $consulta->fetch_array(MYSQLI_ASSOC)) {  ?>
			<tr>
				<td><?php echo $row['IdOrden']; ?></td>
				<td><?php echo $row['PACIENTE']; ?></td>
				<td><?php echo $row['Nombre']; ?></td>
				<td><?php echo $row['Validado']; ?></td>
				<td><a href="reportar.php?id=<?php echo $row['IdOrden']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a href="#" data-href="eliminar.php?id=<?php echo $row['IdOrden']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
				<td></td>
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
		<!--Mostrar y ocultar tablas-->
		<script>
		function mostrarOcultarTablas(id){
		mostrado=0;
		elem = document.getElementById(id);
		if(elem.style.display=='block')mostrado=1;
		elem.style.display='none';
		if(mostrado!=1)elem.style.display='block';
		}
		</script>

		<a href="javascript:mostrarOcultarTablas('tabla1')">Mostrar tabla 1</a>
		<a href="javascript:mostrarOcultarTablas('tabla2')">Mostrar tabla 2</a>
				
	<div class="container">
		<div class="row" align="center">
			
			<a href="index.php" class="btn btn-primary">REGRESAR</a>

		</div>
	</div>
</body>
</html>
