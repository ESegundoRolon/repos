<?php 
require_once('IMovil.php');
class Ventana implements IMovil
{
	private $estaAbierta;

	public function __construct()
	{
		$this->estaAbierta = false;
	}
	
	public function abrir()
	{
		if($this->estaAbierta)
		{
			echo "<br> La ventana ya esta abierta, no se puede abrir";
		}else
		{
			$this->estaAbierta = true;
			echo "<br> Abriendo ventana...";
		}
	}
	
	public function cerrar()
	{
		if($this->estaAbierta)
		{
			echo "<br> Cerrando ventana...";
			$this->estaAbierta = false;
		}else
		{
			echo "<br> La ventana ya esta cerrada, no se puede cerrar";
		}
	}
}
?>