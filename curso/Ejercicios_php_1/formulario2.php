<?php 
$usuario = $_POST["usuario"];
$contraseņa1 = $_POST["psw1"];
$contraseņa2 = $_POST["psw2"];

if($contraseņa1 != $contraseņa2)
{
	echo "Las contraseņas deben coincidir";
	echo "<br>";
}else
{
	echo "Usuario registrado";
}
?>