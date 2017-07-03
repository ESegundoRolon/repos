<html>
<head>
<title>Ejercicio 6</title>
</head>
<body>
<?php 
class Operacion
{
	private $valor1;
	private $valor2;
	protected $resultado;
	
	public function cargar1($valor)
	{
		$this->valor1 = $valor;
	}
	
	public function cargar2($valor)
	{
		$this->valor2 = $valor;
	}
	
	public function mostrarResultado()
	{
		return "<br>Resultado:".$this->resultado;
	}
	
}

class Suma extends Operacion{
	
	public function sumar($valor1,$valor2)
	{
		$this->cargar1($valor1);
		$this->cargar2($valor2);
		$this->resultado=( $valor1 + $valor2) ;
		echo $this->mostrarResultado();
	}
}
class Resta extends Operacion{
		
	public function restar($valor1,$valor2)
	{
		$this->cargar1($valor1);
		$this->cargar2($valor2);
		$this->resultado=($valor1 - $valor2 );
		echo $this->mostrarResultado();
	} 
}

$suma = new Suma();
$suma->sumar(1,1);
$resta = new Resta();
$resta->restar( 2, 1);
?>
</body>
</html>