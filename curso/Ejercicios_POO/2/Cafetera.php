<html>
<head>
	<title> Ejercicio 2-Cafetera</title>
</head>
<body>
<?php

class Cafetera
{
	private $_capacidadMaxima;
	private $_cantidadActual;
	
	public function __construct($_capacidadMaxima=1000)
	{
		$this->_capacidadMaxima =$_capacidadMaxima;
		$this->_cantidadActual = 0;
	}
	
	public function llenarCafetera()
	{
		$this->_cantidadActual = $this->_capacidadMaxima;
		echo "<br> La cafetera esta llena con $this->_cantidadActual cc de cafe";
	}
	
	public function servirTaza ($cantidad)
	{
		if($cantidad <0 )
		{
			echo "<br> La cantidad a servir debe ser positiva";
			return;
		}
		if($this->_cantidadActual<$cantidad)
		{
			echo "<br> La cafetera no posee la cantidad de $cantidad cc de cafe, se servira lo que quede que es $this->_cantidadActual";
			$this->_cantidadActual = 0;
		}else if($this->_cantidadActual>0)
		{
			echo "<br> Se servira $cantidad cc de cafe, ";
			$this->_cantidadActual -= $cantidad;
			echo "la cafetera tiene ahora $this->_cantidadActual cc de cafe";
		}else
			echo "<br> La cafetera no posee nada de cafe disponible: $this->_cantidadActual cc";
		
	}
	
	public function vaciarCafetera()
	{
		$this->_cantidadActual = 0;
		echo "<br> La cafetera se ha vaciado";
	}
	
	public function agregarCafe($cantidad)
	{
		if($cantidad<0)
		{
			echo "<br> La cantidad a agregar debe ser positiva";
			return;
		}
		if($this->_cantidadActual<$this->_capacidadMaxima)
		{
			echo "<br> La cafetera pasa de tener $this->_cantidadActual cc de cafe a";
			$this->_cantidadActual +=$cantidad;
			echo " $this->_cantidadActual cc de cafe, aumentando $cantidad cc";
		}else{
			echo "<br> La cafetera esta llena, no se puede agregar mas cafe";
		}
	}
}

$cafetera = new Cafetera();
$cafetera->llenarCafetera();
$cafetera->agregarCafe(10);
$cafetera->servirTaza(15);
$cafetera->vaciarCafetera();
?>
</body>
</html>