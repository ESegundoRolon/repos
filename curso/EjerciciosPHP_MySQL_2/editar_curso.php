<?php
$conexion = mysqli_connect("localhost","root","","base1");
mysqli_set_charset($conexion,"utf8");
$idCurso = $_POST["idCurso"];
$nuevoNombreCurso = $_POST["nuevoNombreCurso"];
echo "update cursos set nombrecurso='$nuevoNombreCurso' where codigo=$idCurso";
echo "<br>";
$resultado_update = mysqli_query($conexion,"update cursos set nombrecurso='$nuevoNombreCurso' where codigo=$idCurso");
if(!$resultado_update)
	echo "ERROR on update";
else
{
	if(mysqli_affected_rows($conexion)==0)
	{
		echo "El curso $idCurso no existe";
	}else
	{
		echo "Se ha actualizado el curso ".$idCurso;
	}
}
mysqli_close($conexion);
?>