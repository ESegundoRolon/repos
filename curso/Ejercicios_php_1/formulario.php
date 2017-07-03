<?php
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];

if($edad<18 && $edad>0)
{
	echo "Bienvenido $nombre, usted es menor de edad";
}else if ($edad>=18)
{
	echo "Bienvenido $nombre, usted es mayor de edad";
}else
	echo "Bienvenido $nombre, su edad es invalida";
?>
