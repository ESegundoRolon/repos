<?php
//error_reporting(E_ERROR );    
include("includes/system.ini.php");
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

</urlset>
XML;
/* $xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<Productos>
 
</Productos>
XML; */
$sxe = new SimpleXMLElement($xmlstr);
$categorias = new Categorias();
$listaCategorias = $categorias -> getAllCategorias();

foreach($listaCategorias as $categoria)
{
	$categoriaNodo = $sxe->addChild('url');
	$url = 'localhost/curso/curso_8/c';
	
	//var_dump($producto);
	foreach($categoria as $k=>$v)
	{
		if($k=='id')
		{
			$url .=$v;
		}
		if($k=='Descripcion')
		{
			$url .='-'.$v;
		}
		
	}
	$categoriaNodo->addChild('loc',$url);
	$categoriaNodo->addChild('priority','1');
	$categoriaNodo->addChild('lastmod',date('Y-m-d H:i:s'));
}
echo $sxe->asXML("sitemap.xml");

?>