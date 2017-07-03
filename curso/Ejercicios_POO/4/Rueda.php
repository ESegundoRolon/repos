<?php 
class Rueda
{
	private $estaInflada;
	
	public function __construct()
	{
		$this->estaInflada = false;
	}
	
	public function inflarRueda()
	{
		if($this->estaInflada)
		{
			echo "<br> La rueda ya esta inflada, no se puede inflar mas";
		}else
		{
			echo "<br> Inflando rueda ...";
			$this->estaInflada = true;
		}
	}
	
	public function desinflarRueda()
	{
		if ( $this->estaInflada)
		{
			echo "<br> Desinflando rueda...";
			$this->estaInflada = false;
		}else{
			echo "<br> La rueda ya esta desinflada, no se puede desinflar";
		}
		
	}
}
?>