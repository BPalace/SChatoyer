<?php
	require 'DB/conexion.php';
	
	$id = $_GET['id'];

	$sql= "SELECT t1.IdUroanalisis, t3.Nombres, t3.Apellidos, (YEAR(CURRENT_DATE)-YEAR(t3.FechaNac))as Edad, t3.Sexo, t3.Celular, t1.Color, t1.Olor, t1.Aspecto, t1.Densidad, t1.PH, t1.Glucosa, t1.Proteinas, t1.Sangre, t1.Cetonas, t1.Urobilinogeno, t1.Bilirrubina, t1.Nitritos, t1.LeucocitosQ, t1.CelulasEpiteliales, t1.Eritrocitos, t1.Leucocitos, t1.Bacterias, t1.Levaduras, t1.Moco, t1.Cilindros, t1.Cristales, t1.Parasitos, t1.Observacion_1, t1.Observacion_2, t1.Observacion_3, t1.Validado FROM tbl_uroanalisis t1 INNER JOIN tbl_orden t2 on t1.IdOrden=t2.IdOrden INNER JOIN tbl_paciente t3 on t2.IdPaciente=t3.IdPaciente WHERE t1.IdOrden='$id' ";
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
				<h3 style="text-align:center">Reporteria de Uroanalisis</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="actualizarUroanalisis.php" autocomplete="off">
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
				<input type="hidden" id="id" name="id" value="<?php echo $row['IdUroanalisis']; ?>"/>
				

				<div>
					<fieldset>
						<legend>Resultados</legend>
						<table class="table table-striped" id="mitabla">
									<th colspan="2" style="text-align: center;">EXAMEN FISICO</th>
									<th colspan="2" style="text-align: center;">EXAMEN MICROSCOPICO</th>
									<tr>
										<td>Color: </td>
										<td>
											<select class="form-control" id="color" name="color">
												<option value="AMARILLO" <?php if($row['Color']=='AMARILLO') echo 'selected'; ?>>AMARILLO</option>
												<option value="AMBAR" <?php if($row['Color']=='AMBAR') echo 'selected'; ?>>AMBAR</option>
												<option value="OTRO" <?php if($row['Color']=='OTRO') echo 'selected'; ?>>OTRO</option>
											</select>
										</td>
										<td>Celular Epiteliales: </td>
										<td>
											<select class="form-control" id="celEp" name="celEp">
												<option value="ABUNDANTES" <?php if($row['CelulasEpiteliales']=='ABUNDANTES') echo 'selected'; ?>>ABUNDANTES</option>
												<option value="MODERADAS" <?php if($row['CelulasEpiteliales']=='MODERADAS') echo 'selected'; ?>>MODERADAS</option>
												<option value="ESCASAS" <?php if($row['CelulasEpiteliales']=='ESCASAS') echo 'selected'; ?>>ESCASAS</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Olor: </td>
										<td><input type="text" id="olor" name="olor" placeholder="Olor" value="<?php echo $row['Olor']; ?>"  required></td>
										<td>Eritrocitos: </td>
										<td><input type="text" id="Eri" name="Eri" placeholder="Eritrocitos" value="<?php echo $row['Eritrocitos']; ?>"  required></td>
									</tr>
									<tr>
										<td>Aspecto: </td>
										<td>
											<select class="form-control" id="Asp" name="Asp">
												<option value="TURBIO" <?php if($row['Aspecto']=='TURBIO') echo 'selected'; ?>>TURBIO</option>
												<option value="LIG.TURBIO" <?php if($row['Aspecto']=='LIG.TURBIO') echo 'selected'; ?>>LIG.TURBIO</option>
												<option value="TRANSPARENTE" <?php if($row['Aspecto']=='TRANSPARENTE') echo 'selected'; ?>>TRANSPARENTE</option>
											</select>
										</td>
										<td>Leucocitos: </td>
										<td><input type="text" id="LeuM" name="LeuM" placeholder="Leucocitos" value="<?php echo $row['Leucocitos']; ?>"  required></td>
									</tr>
									<tr>
										<td>Densidad: </td>
										<td><input type="text" id="den" name="den" placeholder="Densidad" value="<?php echo $row['Densidad']; ?>"  required></td>
										<td>Bacterias: </td>
										<td><input type="text" id="Bac" name="Bac" placeholder="Bacterias" value="<?php echo $row['Bacterias']; ?>"  required></td>
									</tr>
									<tr>
										<th colspan="2" style="text-align: center;">EXAMEN QUIMICO</th>
										<td>Levaduras: </td>
										<td><input type="text" id="lev" name="lev" placeholder="Levaduras" value="<?php echo $row['Levaduras']; ?>"  required></td>
									</tr>
									<tr>
										<td>Ph: </td>
										<td><input type="text" id="phh" name="phh" placeholder="Ph" value="<?php echo $row['PH']; ?>"  required></td>
										<td>Moco: </td>
										<td><input type="text" id="moc" name="moc" placeholder="Moco" value="<?php echo $row['Moco']; ?>"  required></td>
									</tr>
									<tr>
										<td>Glucosa: </td>
										<td><input type="text" id="glu" name="glu" placeholder="Glucosa" value="<?php echo $row['Glucosa']; ?>"  required></td>
										<td>Cilindros: </td>
										<td><input type="text" id="cil" name="cil" placeholder="Cilindros" value="<?php echo $row['Cilindros']; ?>"  required></td>
									</tr>
									<tr>
										<td>Proteinas: </td>
										<td><input type="text" id="pro" name="pro" placeholder="Proteinas" value="<?php echo $row['Proteinas']; ?>"  required></td>
										<td>Cristales: </td>
										<td><input type="text" id="cri" name="cri" placeholder="Cristales" value="<?php echo $row['Cristales']; ?>"  required></td>
									</tr>
									<tr>
										<td>Sangre: </td>
										<td><input type="text" id="sang" name="sang" placeholder="Sangre" value="<?php echo $row['Sangre']; ?>"  required></td>
										<td>Parasitos: </td>
										<td><input type="text" id="para" name="para" placeholder="Parasitos" value="<?php echo $row['Parasitos']; ?>"  required></td>
									</tr>
									<tr>
										<td>Cetonas: </td>
										<td><input type="text" id="cet" name="cet" placeholder="Cetonas" value="<?php echo $row['Cetonas']; ?>"  required></td>
									</tr>
									<tr>
										<td>Urobilinogeno: </td>
										<td><input type="text" id="urob" name="urob" placeholder="Urobilinogeno" value="<?php echo $row['Urobilinogeno']; ?>"  required></td>
									</tr>
									<tr>
										<td>Bilirrubina: </td>
										<td><input type="text" id="bili" name="bili" placeholder="Bilirrubina" value="<?php echo $row['Bilirrubina']; ?>"  required></td>
									</tr>
									<tr>
										<td>Nitritos: </td>
										<td><input type="text" id="nitri" name="nitri" placeholder="Nitritos" value="<?php echo $row['Nitritos']; ?>"  required></td>
									</tr>
									<tr>
										<td>Leucocitos: </td>
										<td><input type="text" id="leuQ" name="leuQ" placeholder="Leucocitos" value="<?php echo $row['LeucocitosQ']; ?>"  required></td>
									</tr>
						</table>
					</fieldset>
				</div>
				
				
				<div class="form-group">
					<label for="observacion1" class="col-sm-2 control-label">Observacion 1</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="ob1" name="ob1" placeholder="Observacion 1" value="<?php echo $row['Observacion_1']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="observacion2" class="col-sm-2 control-label">Observacion 2</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="ob2" name="ob2" placeholder="Observacion 2" value="<?php echo $row['Observacion_2']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="observacion3" class="col-sm-2 control-label">Observacion 3</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="ob3" name="ob3" placeholder="Observacion 3" value="<?php echo $row['Observacion_3']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="validacion" class="col-sm-2 control-label">Validacion</label>
					
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
						<a href="pendientes.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar e Imprimir</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
