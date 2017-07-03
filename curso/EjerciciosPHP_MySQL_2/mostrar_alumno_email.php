<?php
session_start();
$emailAlumno= $_POST["emailAlumno"];
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
$resultado_consulta = mysqli_query($conexion,"select * from alumnos a where a.email = '$emailAlumno'");

//1-Select
if(mysqli_num_rows($resultado_consulta)>0)
{
	while($vector_fila = mysqli_fetch_array($resultado_consulta))
	{
		//($vector_fila);
		echo "nombre: ".$vector_fila["nombre"]." email: ".$vector_fila["email"];
		echo "<br>";
		$_SESSION["email"]=$vector_fila["email"];
		$_SESSION["nombre"]=$vector_fila["nombre"];
	}
}else
{
	echo "No hay resultados";
}
mysqli_close($conexion);
?>
<form action ="show_session.php" method ="POST">
Mostrar variable sesion: <input type ="submit" value="Mostrar" name ="Mostrar"/>
<br>
</form>
