<?php
class Ave
{
	protected $energiaAcumulada;
	protected $diasDeVida;
	protected $km;
	
	public function __construct()
	{
		$this->energiaAcumulada = 10;
		$this->diasDeVida = 0;
		$this->km = 1;
	}
	public function __destruct()
	{
		echo "<br>Adios Paloma";
	}
	public function comer($comida)
	{
		$this->energiaAcumulada += 5*$comida;
		echo "<br>Energia Acumulada al comer: ".$this->energiaAcumulada;
	}
	public function volar($km)
	{
		$this->km +=$km;
		$this->energiaAcumulada -=(2*$km);
		echo "<br>Energia Acumulada al volar: ".$this->energiaAcumulada;
		echo "<br>KM al volar: ".$this->km;
	}
	public function dormir()
	{
		$this->energiaAcumulada +=2;
		$this->diasDeVida ++;
		echo "<br>Energia Acumulada al dormir: ".$this->energiaAcumulada;
		echo "<br>Dias de vida al dormir: ".$this->km;
	}
}

class Paloma extends Ave
{
	public function __construct()
	{
		parent::__construct();
	}
		public function __destruct()
	{
		echo "<br>Adios Paloma";
	}
	

}
class Gorrion extends Ave
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function __destruct()
	{
		echo "<br>Adios Gorrion";
	}
	
	public function volar($km)
	{
		$this->km +=$km;
		$this->energiaAcumulada -=(3*$km);
		echo "<br>Energia Acumulada al volar: ".$this->energiaAcumulada;
		echo "<br>KM al volar: ".$this->km;
	}
	
}
class Canario extends Ave
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function __destruct()
	{
		echo "<br>Adios Canario";
	}
	
	public function cantar()
	{
		echo "<br>El canario canta...";
	}
	
}

echo "Objeto Paloma";
$paloma = new Paloma();
$paloma->comer(1);
$paloma->volar(1);
$paloma->dormir();
echo "<br>=======================";
echo "<br>Objeto Canario:";
$canario = new Canario();
$canario->comer(1);
$canario->cantar();
$canario->volar(1);
$canario->dormir();
echo "<br>=======================";
echo "<br>Objeto Gorrion:";
$gorrion = new Gorrion();
$gorrion->comer(1);
$gorrion->volar(1);
$gorrion->dormir();
echo "<br>=======================";
?>

