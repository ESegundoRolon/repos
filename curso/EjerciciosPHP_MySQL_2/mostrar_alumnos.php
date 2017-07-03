<?php 
$conexion = mysqli_connect("localhost","root","","base1");
mysqli_set_charset($conexion,"utf8");
$nombre = $_POST["nombreAlumno"];
$resultado_consulta = mysqli_query($conexion,"select * from alumnos where nombre='$nombre'");

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
?>