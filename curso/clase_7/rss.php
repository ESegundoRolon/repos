<?php
 
include("includes/system.ini.php");
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" version="2.0">
        
    </rss>
XML;

$sxe = new SimpleXMLElement($xmlstr);
$sxe->addChild('channel');
$sxe->addChild('title', "Diario UTN");
$sxe->addChild('description', "Diario UTN");
$sxe->addChild('link', "Diario UTN");
$sxe->addChild('lastBuildDate', date("Y-m-d")."T".date("H:i:s")."-03:00");
$sxe->addChild('sy:updatePeriod', "hourly");
$sxe->addChild('sy:updateFrequency', "1");
$sxe->addChild('generator', "localhost/clase_6/rss.php");
$sxe->addChild('copyright', "Copyright (c) ".date("Y"));

$noticias = new Noticias();
$listaNoticias = $noticias -> noticias();
/* var_dump();
exit; */
foreach($listaNoticias as $k=>$v)
{
	$producto = $sxe->addChild('Item');
    $producto->addChild('title', $v["titulo"]);
    $producto->addChild('description', $v["copete"]);
    $producto->addChild('content:encoded', $v["contenido"]);
	
}
echo $sxe->asXML("file.xml");
?>