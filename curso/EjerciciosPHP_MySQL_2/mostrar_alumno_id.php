<?php
$codigoAlumno= $_POST["idAlumno"];
// conexion mysql
/*Script php 
1- consulta tabla de alumnos y mostrar resultados en pantallas (SELECT * FROM alumnos)
2- inserta nuevo alumno
3- Update
4- Delete
5- hacer un array auxiliar y array asociativo donde cada registo sea una fila de la base de datos
*/
$conexion = mysqli_connect("localhost","root","","base1");
mysqli_set_charset($conexion,"utf8");
$resultado_consulta = mysqli_query($conexion,"select a.nombre,a.email,c.nombrecurso from alumnos a inner join cursos c on c.codigo = a.curso_id where a.id = $codigoAlumno");

//1-Select
if(mysqli_num_rows($resultado_consulta)>0)
{
	while($vector_fila = mysqli_fetch_array($resultado_consulta))
	{
		//($vector_fila);
		echo "nombre: ".$vector_fila["nombre"]." email: ".$vector_fila["email"]." curso: ".$vector_fila["nombrecurso"];
		echo "<br>";
	}
}else
	echo "No hay resultados";
?>