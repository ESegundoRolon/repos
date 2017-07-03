<html>
<head>
	<title>Hipervinculos</title>
</head>
<body>

<?php
class MenuOpciones
{
	private $enlaces;
	private $titulos;
	
	public function __construct()
	{
		$this->enlaces = array();
		$this->titulos = array();
	}
	
	public function agregarHipervinculo($url,$titulo)
	{
		array_push($this->enlaces,$url);
		array_push($this->titulos,$titulo);
	}
	
	public function mostrar()
	{
		for($i=0 ; $i<sizeof($this->enlaces) ; $i++)
		{
			echo '<a href="'.$this->enlaces[$i].'">'.$this->titulos[$i].'</a>';
			echo "-";
		}
	}
}
$menu1=new MenuOpciones();
$menu1->agregarHipervinculo('http://www.google.com','Google');
$menu1->agregarHipervinculo('http://www.yahoo.com','Yahoo');
$menu1->agregarHipervinculo('http://www.msn.com','MSN');
$menu1->mostrar();
?>
</body>
</html>