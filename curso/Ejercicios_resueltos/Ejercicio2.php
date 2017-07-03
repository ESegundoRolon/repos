<html>
<head>
	<title>Cabecera de pagina</title>
</head>
<body>
<?php 
if($_POST){
	 $titulo = $_POST['titulo'];
	 $alineacion = $_POST['alineacion'];
	
	
		echo '<div style="font-size:40px;text-align:'.$alineacion.'">';
		echo $titulo;
		echo '</div>';
}
?>
<form action ='Ejercicio2.php' method ='post'>
	<label for ="">
	Ingrese el titulo de cabecera:
	</label>
	<input type ="text" name ="titulo">
	<br>
	<label for="">
	Indique la alineación:
	</label>
	<select name ="alineacion" id="">
	<option value="center">center</option>
	<option value="left">left</option>
	<option value="right">right</option>
	</select>
	<br>
	<input type ='submit' value ='Graficar' title ='Graficar'>
</form>
</body>
</html>