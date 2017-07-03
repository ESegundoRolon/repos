//Item1
<html>
<form action ="insert_cursos.php" method ="POST">
	Ingrese Nombre de curso:<input type ="text" name ="nombreCurso" />
	<br>
	<input type ="submit" name="Insertar" value ="Insertar"/>
</form>
</html>
<?php 

//Item 2
$conexion = mysqli_connect("localhost","root","","base1");
mysqli_set_charset($conexion,"utf8");
$resultado_consulta = mysqli_query($conexion,"select * from cursos");


if(mysqli_num_rows($resultado_consulta)>0)
{
	while($vector_fila = mysqli_fetch_array($resultado_consulta))
	{
		echo "codigo: ".$vector_fila["codigo"]." Nombre de curso: ".$vector_fila["nombrecurso"];
		echo "<br>";
	}
}else
	echo "No hay resultados";
?>
//item 3
<form action ="mostrar_alumnos.php" method ="POST">
	Ingrese Nombre de alumno:<input type ="text" name ="nombreAlumno" />
	<br>
	<input type ="submit" name="Ver Info" value ="Ver Info"/>
</form>
<br>
//item 4
<form action ="borrar_curso.php" method ="POST">
	Ingrese Nombre de curso:<input type ="text" name ="borrarCurso" />
	<br>
	<input type ="submit" name="Borrar" value ="Borrar"/>
</form>	
<br>
//item 5
<form action ="editar_curso.php" method ="POST">
	Ingrese codigo curso:<input type ="text" name ="idCurso" />
	<br>
	Ingrese nuevo nombre de curso:<input type ="text" name ="nuevoNombreCurso" />
	<br>
	<input type ="submit" name="Editar" value ="Editar"/>
</form>	
<br>
//item 6
<form action ="mostrar_alumno_id.php" method ="POST">
	Ingrese codigo de alumno:<input type ="text" name ="idAlumno" />
	<br>
	<input type ="submit" name="Mostrar" value ="Mostrar"/>
</form>
//Item 7
<form action ="mostrar_alumno_email.php" method ="POST">
	Ingrese email alumno:<input type ="text" name ="emailAlumno" />
	<br>
	<input type ="submit" name="Mostrar" value ="Mostrar"/>
</form>		
