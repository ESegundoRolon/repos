<?php
//error_reporting(E_ERROR );    
include("includes/system.ini.php");
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<Productos>
 
</Productos>
XML;
$sxe = new SimpleXMLElement($xmlstr);
$productos = new Productos();
$listaProductos = $productos -> productosDestacados();
/* var_dump();
exit; */
foreach($listaProductos as $producto)
{
	$productoNode = $sxe->addChild('Producto');
	//var_dump($producto);
	foreach($producto as $k=>$v)
	{
		$productoNode->addChild($k,$v);
	}
	
}
echo $sxe->asXML("file.xml");

?>