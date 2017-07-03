<?php
$conexion = mysqli_connect("localhost","root","","base1");
mysqli_set_charset($conexion,"utf8");
$nombreCurso = $_POST["borrarCurso"];
echo "delete from cursos where nombrecurso='$nombreCurso'";
//primero
$resultado_delete = mysqli_query($conexion,"delete from cursos where nombrecurso='$nombreCurso'");
if(!$resultado_delete)
	echo "ERROR on delete";
else
{
	if(mysqli_affected_rows($conexion)==0)
	{
		echo "El curso $nombreCurso no existe";
	}else
	{
		echo "Se han borrado ".mysqli_affected_rows($conexion)." cursos";
	}
}
mysqli_close($conexion);
?>