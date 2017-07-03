<?php

// conexion mysql
/*Script php 
1- consulta tabla de alumnos y mostrar resultados en pantallas (SELECT * FROM alumnos)
2- inserta nuevo alumno
3- Update
4- Delete
5- hacer un array auxiliar y array asociativo donde cada registo sea una fila de la base de datos
*/
$conexion = mysqli_connect("localhost","root","","curso");
mysqli_set_charset($conexion,"utf8");
$resultado_consulta = mysqli_query($conexion,"select * from alumnos");

//1-Select
if(mysqli_num_rows($resultado_consulta)>0)
{
	while($vector_fila = mysqli_fetch_array($resultado_consulta))
	{
		//($vector_fila);
		echo "id: ".$vector_fila["id"]." Nombre: ".$vector_fila["nombre"]." Apellido: ".$vector_fila["apellido"]." curso_id: ".$vector_fila["curso_id"];
		echo "<br>";
	}
}else
	echo "No hay resultados";

//2-Insert
$resultado_insert = mysqli_query($conexion,"insert into alumnos(nombre,apellido,curso_id) values ('nombre_desdephp','apellido_desdephp',1)");
if(!$resultado_insert)
	echo "ERROR on insert";
//3-Update
$resultado_update = mysqli_query($conexion,"update alumnos set nombre='Enrique' where nombre='nombre_desdephp'");
if(!$resultado_insert)
	echo "ERROR on update";
//4-Delete
$resultado_delete = mysqli_query($conexion,"delete from alumnos where apellido='nombre_desdephp'");
if(!$resultado_insert)
	echo "ERROR on delete";
mysqli_close($conexion);
?>