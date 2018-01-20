<?php

	require 'DB/conexion.php';

	$id= $_POST['id'];
	$color= $_POST['color'];
	$Olor= $_POST['olor'];
	$Aspecto= $_POST['Asp'];
	$Densidad= $_POST['den'];
	$Ph= $_POST['phh'];
	$Glucosa= $_POST['glu'];
	$Proteinas= $_POST['pro'];
	$Sangre= $_POST['sang'];
	$Cetonas= $_POST['cet'];
	$Urobili= $_POST['urob'];
	$Bili= $_POST['bili'];
	$Nitri= $_POST['nitri'];
	$LeuQ= $_POST['leuQ'];
	$CelEp= $_POST['celEp'];
	$Eri= $_POST['Eri'];
	$Leu= $_POST['LeuM'];
	$Bac= $_POST['Bac'];
	$Leva= $_POST['lev'];
	$Moco= $_POST['moc'];
	$Cili= $_POST['cil'];
	$Cri= $_POST['cri'];
	$Para= $_POST['para'];
	$Ob1= $_POST['ob1'];
	$Ob2= $_POST['ob2'];
	$Ob3= $_POST['ob3'];
	$valido= isset($_POST['valid']) ? $_POST['valid'] : null ;

	$sql="UPDATE tbl_uroanalisis SET Color='$color',Olor='$Olor',Aspecto='$Aspecto',Densidad='$Densidad',PH='$Ph',Glucosa='$Glucosa',Proteinas='$Proteinas',Sangre='$Sangre',Cetonas='$Cetonas',Urobilinogeno='$Urobili',Bilirrubina='$Bili',Nitritos='$Nitri',LeucocitosQ='$LeuQ',CelulasEpiteliales='$CelEp',Eritrocitos='$Eri', Leucocitos='$Leu', Bacterias='$Bac', Levaduras='$Leva', Moco='$Moco', Cilindros='$Cili', Cristales='$Cri', Parasitos='$Para', Observacion_1='$Ob1', Observacion_2='$Ob2', Observacion_3='$Ob3', Validado='$valido' WHERE IdUroanalisis='$id'";

	$resultado=$mysqli->query($sql);



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
			<div class="row" style="text-align:center">
			<?php if($resultado) { ?>
			<h3>REGISTRO MODIFICADO</h3>
			<?php } else { ?>
			<h3>ERROR AL MODIFICAR</h3>
			<?php } ?>

			<a href="pendientes.php" class="btn btn-primary">REGRESAR</a>

			</div>
		</div>

	</div>

</body>
</html>	

