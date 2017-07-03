<?php
session_start();

if (isset($_SESSION["nombre"]))
{
	echo "Bienvenido ".$_SESSION["nombre"];
}else
{
	echo "<script text=text/javascript'>
	alert('El email ".$_SESSION["email"]." no existe, usted no puede ingresar a esta página')
	window.location = 'EjerciciosPHP_MySQL_2.php';
	</script>";
}
?>