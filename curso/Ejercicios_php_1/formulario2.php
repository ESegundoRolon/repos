<?php 
$usuario = $_POST["usuario"];
$contrase�a1 = $_POST["psw1"];
$contrase�a2 = $_POST["psw2"];

if($contrase�a1 != $contrase�a2)
{
	echo "Las contrase�as deben coincidir";
	echo "<br>";
}else
{
	echo "Usuario registrado";
}
?>