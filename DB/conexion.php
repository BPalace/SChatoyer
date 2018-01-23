<?php

require('parametros.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
$consulta="";

if($mysqli->connect_error){

	die('Error en la conexion ' . $mysqli->connect_error );

}
printf("Servidor Information: %s\n ", $mysqli->server_info);

function pendientes(){
	global $mysqli, $consulta;
	$sql="SELECT 
		t1.IdOrden,
		t1.IdExamen,  
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
function pruebas(){
	global $mysqli, $consulta;
	$sql="SELECT t1.IdExamen, t1.Nombre, t2.NombreTipo  
FROM tbl_examenes t1 INNER JOIN tbl_tipoexamen t2 ON t1.tbl_TipoExamen_IdTipo=t2.IdTipo";
	return $mysqli->query($sql);
}
function pacienteOrden($id){
	global $mysqli, $consulta;
	$sql= "SELECT IdPaciente, Nombres, Apellidos, Sexo, Celular, (YEAR(CURRENT_DATE)-YEAR(FechaNac))as Edad 
	FROM tbl_paciente WHERE IdPaciente='$id'";
	return $mysqli->query($sql);
}
function pacientes(){
	global $mysqli, $consulta;
	$sql="SELECT * FROM tbl_Paciente";
	return $mysqli->query($sql);
}
function uroPendientes(){
	global $mysqli, $consulta;
	$sql="SELECT t1.IdOrden, t1.IdUroanalisis, CONCAT(t3.Nombres,' ',t3.Apellidos) as PACIENTE, t1.Validado FROM tbl_uroanalisis t1 
	INNER JOIN tbl_orden t2 on t1.IdOrden=t2.IdOrden
	INNER JOIN tbl_paciente t3 on t2.IdPaciente=t3.IdPaciente WHERE Validado=0;";
	return $mysqli->query($sql);
}
function parasitoPendientes(){
	global $mysqli, $consulta;
	$sql="SELECT t1.tbl_Orden_IdOrden, t1.IdParasitologia, CONCAT(t3.Nombres,' ',t3.Apellidos) as PACIENTE, t1.Validado FROM tbl_parasitologia t1 
	INNER JOIN tbl_orden t2 on t1.tbl_Orden_IdOrden=t2.IdOrden
	INNER JOIN tbl_paciente t3 on t2.IdPaciente=t3.IdPaciente WHERE Validado=0;";
	return $mysqli->query($sql);
}
?>
