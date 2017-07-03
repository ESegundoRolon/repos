<?php 
require_once('IMovil.php');
require_once('Ventana.php');

class Puerta implements IMovil
{
	private $ventana;
	private $estaAbierta;
	
	public function __construct()
	{
		$this->estaAbierta = false;
		$this->ventana = new Ventana();
	}
	
	public function abrir()
	{
		if($this->estaAbierta)
		{
			echo "<br> La puerta ya esta abierta, no se puede abrir";
		}else
		{
			$this->estaAbierta = true;
			echo "<br> Abriendo Puerta...";
		}
	}
	
	public function cerrar()
	{
		if($this->estaAbierta)
		{
			echo "<br> Cerrando puerta...";
			$this->estaAbierta = false;
		}else
		{
			echo "<br> La puerta ya esta cerrada, no se puede cerrar";
		}
	}
	
	public function getVentana()
	{
		return $this->ventana;
	}
}
?>