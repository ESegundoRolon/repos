<?php
error_reporting(E_ERROR );  
include("includes/system.ini.php");

$productos = new Productos();
$productos_listado = $productos->productosDestacados();

$json_productos = json_encode($productos_listado);

echo $json_productos;



?>
