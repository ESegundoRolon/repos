<?php
error_reporting(E_ERROR );    
include("includes/system.ini.php");
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<peliculas>
 
</peliculas>
XML;
$sxe = new SimpleXMLElement($xmlstr);
$sxe->addAttribute('tipo', 'documental');

$pelicula = $sxe->addChild('pelicula');
$pelicula->addChild('titulo', 'PHP2: Más historias sobre Parser');
$pelicula->addChild('argumento', 'Todo sobre las personas que hacen que funcione.');

$personajes = $pelicula->addChild('personajes');
$personaje  = $personajes->addChild('personaje');
$personaje->addChild('nombre', 'Sr. Parser');
$personaje->addChild('actor', 'John Doe');

$puntuacion = $pelicula->addChild('puntuacion', '5');
$puntuacion->addAttribute('tipo', 'estrellas');
 
echo $sxe->asXML();
?>
