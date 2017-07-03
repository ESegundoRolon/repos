<?php

// conexion mysql
/*Script php 
*/
$conexion = mysqli_connect("localhost","root","","base1");
mysqli_set_charset($conexion,"utf8");
$nombreCurso = $_POST["nombreCurso"];
$resultado_insert = mysqli_query($conexion,"insert into cursos(codigo,nombreCurso) values (null,'$nombreCurso')");

if(!$resultado_insert)
	echo "ERROR on insert";
else
	echo "Se ha insertado el curso: $nombreCurso";

mysqli_close($conexion);
?>