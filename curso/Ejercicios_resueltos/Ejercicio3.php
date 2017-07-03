<html>
<head>
	<title>Cabecera de pagina</title>
</head>
<body>
<?php 
class CabeceraPagina
{
	private $titulo;
	private $alineacion;
	
	public function __construct( $titulo , $alineacion )
	{
		$this->titulo = $titulo;
		$this->alineacion = $alineacion;
	}
	
	public function graficar()
	{
		echo '<div style="font-size:40px;text-align:'.$this->alineacion.'">';
		echo $this->titulo;
		echo '</div>';
	}
}

$cabecera = new CabeceraPagina("Titulo1","center");
$cabecera->graficar();
?>
</body>
</html>