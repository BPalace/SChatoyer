<?php
$mysqli = new mysqli('localhost','root','hola123','Laboratorio');
$consulta="";

if($mysqli->connect_error){

	die('Error en la conexion ' . $mysqli->connect_error );

}
printf("Servidor Information: %s\n ", $mysqli->server_info);

function pendientes(){
	global $mysqli, $consulta;
	$sql="SELECT * FROM tbl_Paciente";
	return $mysqli->query($sql);
}
function pacientes(){
	global $mysqli, $consulta;
	$sql="SELECT * FROM tbl_Paciente";
	return $mysqli->query($sql);
}

?>
