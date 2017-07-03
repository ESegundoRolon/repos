<?php
class Motor
{
	private $estaPrendido;
	
	public function __construct ()
	{
		$this->estaPrendido = false;
	}
	
	public function prenderMotor()
	{
		if($this->estaPrendido)
		{
			echo "<br> El motor ya está prendido";
		}else
		{
			echo "<br> Prendiendo motor...";
			$this->estaPrendido = true;
		}
	}
	
	public function apagarMotor()
	{
		if($this->estaPrendido)
		{
			echo "<br> Apagando motor...";
			$this->estaPrendido = false;
		}else
		{
			echo "<br> El motor no esta prendido, no se puede apagar";
		}
	}
} 
?>