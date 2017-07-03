<?php
error_reporting(E_ERROR );  
include("includes/system.ini.php");

$metodo="curl";

if($metodo=="curl"){
	$url = "http://localhost/curso/clase_7/ws_json_server.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	$data = curl_exec($ch);
	curl_close($ch);
}else{
	//Sirve para simular la peticion a un WS en caso de que el CURL este desactivado
	$productos = new Productos();
	$productos_json = $productos->productosJson();
}





?>
