<?php

require('parametros.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
//$mysqli2 = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
$consulta="";
//$consulta2="";

if($mysqli->connect_error){

	die('Error en la conexion ' . $mysqli->connect_error );

}
printf("Servidor Information: %s\n ", $mysqli->server_info);

function pendientes(){
	global $mysqli, $consulta;
	$sql="SELECT 
		t1.IdOrden, 
		CONCAT(t3.Nombres,' ',t3.Apellidos)AS PACIENTE, 
		t4.Nombre, 
		t1.Validado  
		FROM 
		examenes t1 
		INNER JOIN tbl_orden t2 ON t1.IdOrden=t2.IdOrden
		INNER JOIN tbl_paciente t3 on t2.IdPaciente=t3.IdPaciente
		INNER JOIN tbl_examenes t4 on t1.IdExamen=t4.IdExamen where Validado=0";
	return $mysqli->query($sql);
}
/*function uroanalisis(){
	global $mysqli, $sconsulta;
	$sql="SELECT t1.tbl_Orden_IdOrden, t1.IdUroanalisis, CONCAT(t3.Nombres,' ',t3.Apellidos) AS Paciente, Validado 
	FROM tbl_uroanalisis t1 
	INNER JOIN tbl_orden t2 on t1.tbl_Orden_IdOrden=t2.IdOrden 
	INNER JOIN tbl_paciente t3 on t2.IdPaciente=t3.IdPaciente 
	WHERE t1.Validado=0";
	return $mysqli->query($sql);
}*/
function pacientes(){
	global $mysqli, $consulta;
	$sql="SELECT * FROM tbl_Paciente";
	return $mysqli->query($sql);
}

?>