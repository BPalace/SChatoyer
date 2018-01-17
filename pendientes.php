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
			$('table.display').DataTable();
	});
	</script>
</head>
<body>
	<div class="container">
	<div class="row">

	<h2 style="text-align :center">EXAMENES PENDIENTES</h2>

	</div>
	
	<br>
	<div class="row table-responsive" id="Varios" >
		<h3 style="text-align: center">QUIMICOS E INMUNOLOGICOS</h3>

		<table class="display dataTable" id="tabla">
		<thead>
		<tr>
		<th>N#ORDEN</th>
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
				<input type="hidden" id="id2" name="id" value="<?php echo $row['IdExamen']; ?>"/>
				<td><?php echo $row['PACIENTE']; ?></td>
				<td><?php echo $row['Nombre']; ?></td>
				<td><?php echo $row['Validado']; ?></td>
				<td><a href="reportar.php?id=<?php echo $row['IdOrden']; ?>&&id2=<?php echo $row['IdExamen']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a href="#" data-href="eliminar.php?id=<?php echo $row['IdOrden']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
				<td></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
	<div class="row table-responsive" id="Uroanalisis" >
		<h3 style="text-align: center">UROANALISIS</h3>
		<table class="display dataTable" id="utabla">
		<thead>
		<tr>
		<th>N#ORDEN</th>
		<th>N#ANALISIS</th>
		<th>PACIENTE</th>
		<th>VALIDADO</th>
		<th></th>
		<th></th>
		</tr>
		</thead>
		<tbody>
			<?php $consulta=uroPendientes()?>
			<?php while($row = $consulta->fetch_array(MYSQLI_ASSOC)) {  ?>
			<tr>
				<td><?php echo $row['tbl_Orden_IdOrden']; ?></td>
				<td><?php echo $row['IdUroanalisis']; ?></td>
				<td><?php echo $row['PACIENTE']; ?></td>
				<td><?php echo $row['Validado']; ?></td>
				<td><a href="reportarUroanalisis.php?id=<?php echo $row['IdUroanalisis']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a href="#" data-href="eliminar.php?id=<?php echo $row['IdUroanalisis']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
				<td></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>

	<div class="row table-responsive" id="Parasitologia" >
		<h3 style="text-align: center">Parasitologia</h3>
		<table class="display dataTable" id="ptabla">
		<thead>
		<tr>
		<th>N#ORDEN</th>
		<th>N#ANALISIS</th>
		<th>PACIENTE</th>
		<th>VALIDADO</th>
		<th></th>
		<th></th>
		</tr>
		</thead>
		<tbody>
			<?php $consulta=parasitoPendientes()?>
			<?php while($row = $consulta->fetch_array(MYSQLI_ASSOC)) {  ?>
			<tr>
				<td><?php echo $row['tbl_Orden_IdOrden']; ?></td>
				<td><?php echo $row['IdParasitologia']; ?></td>
				<td><?php echo $row['PACIENTE']; ?></td>
				<td><?php echo $row['Validado']; ?></td>
				<td><a href="reportarParasitologia.php?id=<?php echo $row['IdParasitologia']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a href="#" data-href="eliminar.php?id=<?php echo $row['IdParasitologia']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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
				
	<div class="container">
		<div class="row" align="center">
			
			<a href="index.php" class="btn btn-primary">REGRESAR</a>

		</div>
	</div>
</body>
</html>
