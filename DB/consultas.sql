SELECT 
		t1.IdOrden, 
		CONCAT(t3.Nombres,"",t3.Apellidos)AS PACIENTE, 
		t4.Nombre, 
		t1.Validado  
		FROM 
		examenes t1 
		INNER JOIN tbl_orden t2 ON t1.IdOrden=t2.IdOrden
		INNER JOIN tbl_paciente t3 on t2.IdPaciente=t3.IdPaciente
		INNER JOIN tbl_examenes t4 on t1.IdExamen=t4.IdExamen where Validado=0;


		<!--tabla de uroanalisis

	<div class="row table-responsive" id="tabla2" style="display: none;">
		<table class="display" id="mitabla">
		<thead>
		<tr>
		<th>ID_ORDEN</th>
		<th>PACIENTE</th>
		<th>VALIDADO</th>
		<th></th>
		<th></th>
		</tr>
		</thead>
		<tbody>
			<?php while($srow = $sconsulta->fetch_array(MYSQLI_ASSOC)) {  ?>
			<tr>
				<td><?php echo $srow['IdOrden']; ?></td>
				<td><?php echo $srow['PACIENTE']; ?></td>
				<td><?php echo $srow['Nombre']; ?></td>
				<td><?php echo $srow['Validado']; ?></td>
				<td><a href="reportar.php?id=<?php echo $srow['IdOrden']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a href="#" data-href="eliminar.php?id=<?php echo $row['IdOrden']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
				<td></td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>-->