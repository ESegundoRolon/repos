<html>
<head>
	<title>Ejercicio 3-Cancion</title>
</head>
<body>
<?php

class Cancion{
	
	private $titulo;
	private $autor;
	
	public function __construct ($titulo , $autor )
	{
		$this->titulo = $titulo;
		$this->autor = $autor;
		echo "Creando cancion con titulo: $titulo y autor: $autor";
	}
	
	public function dameTitulo()
	{
		return $this->titulo;
	}
	
	public function dameAutor()
	{
		return $this->autor;
	}
	
	public function ponTitulo($titulo)
	{
		echo "<br> El titulo ha cambiado de $this->titulo a ";
		$this->titulo = $titulo;
		echo "$this->titulo";
	}
	
	public function ponAutor($autor)
	{
		echo "<br> El autor ha cambiado de $this->autor a ";
		$this->autor = $autor;
		echo "$this->autor";
	}
}

$cancion = new Cancion ("Para todas las wachas", "Damas Gratis");
echo "<br> La cancion posee el titulo: ".$cancion->dameTitulo()." y el autor ".$cancion->dameAutor();
$cancion->ponTitulo("Nothing else matters");
$cancion->ponAutor("Metalica");
echo "<br> La cancion posee el titulo: ".$cancion->dameTitulo()." y el autor ".$cancion->dameAutor();

?>
</body>
</html>