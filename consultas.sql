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

		busca examenes pendientes
		recorre cada orden del dia
		por cada orden busca en las siguientes tablas, si esta la orden, busca si tiene un bool 0
		si lo encuentra, crea un tabla que diga lo siguiente idorden, nombre, tipo

		condicional, si hay valores, que lance la tabla, sino no...

		muestra condicional

		//Código HTML y de mas para mostrar el 1er formulario
 
//Verifico que se alla hecho una petición desde el formulario
if (isset($_POST)) {
     //Código para verificar en tu DB
     $sql = 'select.....';
     $result = mysql_query($sql,$conexion) or die (mysql_error());
 
     //Verificamos si hay registros
     if (mysql_num_rows($result) != 0) {
          require_once 'formulario2.php';
          //O mostramos el código directamente
          //<form .....>
          //</form>
     }
}