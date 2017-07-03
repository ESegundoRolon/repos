<?php 
require_once('Motor.php');
require_once('Puerta.php');
require_once('Rueda.php');
require_once('Ventana.php');

class Coche
{
	private $motor;
	private $ruedas = array();
	private $puerta_izq;
	private $puerta_der;
	
	public function __construct()
	{
		$this->motor = new Motor();
		$this->puerta_izq = new Puerta();
		$this->puerta_der = new Puerta();
		for ($i=0 ; $i<4 ; $i++)
		{
			$this->ruedas[$i] = new Rueda();
		}
	}
	
	public function prenderMotor()
	{
		$this->motor->prenderMotor();
	}
	
	public function apagarMotor()
	{
		$this->motor->apagarMotor();
	}
	public function abrirPuertaIzq()
	{
		$this->puerta_izq->abrir();		
	}
	
	public function cerrarPuertaIzq()
	{
		$this->puerta_Izq->cerrar();
	}
	
	public function abrirPuertaDer()
	{
		$this->puerta_der->abrir();		
	}
	
	public function cerrarPuertaDer()
	{
		$this->puerta_der->cerrar();
	}
	public function abrirPuertas()
	{
		$this->puerta_izq->abrir();
		$this->puerta_der->abrir();
	}
	
	public function cerrarPuertas()
	{
		$this->puerta_izq->cerrar();
		$this->puerta_der->cerrar();
	}
	
	public function inflarRuedas()
	{
		for ($i = 0 ; $i<4 ; $i++)
		{
			$this->ruedas[$i]->inflarRueda();
		}
	}
	
	public function desinflarRuedas()
	{
		for ($i = 0 ; $i<4 ; $i++)
		{
			$this->ruedas[$i]->desinflarRueda();
		}
	}
}

$coche = new Coche();
$coche->prenderMotor();
$coche->prenderMotor();
$coche->apagarMotor();
$coche->apagarMotor();
$coche->prenderMotor();
$coche->abrirPuertas();
$coche->cerrarPuertas();
$coche->abrirPuertaIzq();
$coche->inflarRuedas();
$coche->desinflarRuedas();
?>