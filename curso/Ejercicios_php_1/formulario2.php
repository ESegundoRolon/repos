<?php 
$usuario = $_POST["usuario"];
$contraseña1 = $_POST["psw1"];
$contraseña2 = $_POST["psw2"];

if($contraseña1 != $contraseña2)
{
	echo "Las contraseñas deben coincidir";
	echo "<br>";
}else
{
	echo "Usuario registrado";
}
?>