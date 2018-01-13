<html>
<head>
<title>hola</title>
<style type="text/css">
<!--
BODY      
{
 scrollbar-base-color: #999999;
 scrollbar-arrow-color: #00FFFF;
}
-->
</style>
</head>
<body>
<?php

if (!$datos)

{
?>
<form name="form1" method="POST" action="caca.php">
<center><b>Eleige si quieres que se vea los bordes de la tabla o no</b></center><br>
<table align="center" border="0">
<tr><td><center><select size="1" name="eleccion"><option value="si">Si</option><option value="no">No</option></select></center></td></tr>
<tr><td><input name="datos" type="submit" value="Ver resultados"></td></tr>
</table>
</form>
<?php
}
else 
{

switch($eleccion)

{
    case si:
        echo' 
        <table align=center border=1>
        <tr>
            <td><b>Elegiste que el borde se vea</b></td>
        </tr>
        </table>';
        break;
        
    case no:
        echo '
        <table align=center border=0>
        <tr>
            <td><b>Elegiste que el borde no se vea</b></td>
        </tr>
        </table>';
        break; 
}

}
?>
</body>
</html>