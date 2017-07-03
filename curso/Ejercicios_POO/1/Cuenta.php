<html>
<head>
<title>Cuenta Bancaria</title>
</head>
<body>
<?php 
class Cuenta{
	private $numero_cuenta;
	private $dni;
	private $saldo_actual;
	private $interes_anual;
	
	public function __construct ($dni,$numero_cuenta,$saldo,$interes)
	{
		$this->numero_cuenta = $numero_cuenta;
		$this->dni = $dni;
		$this->saldo_actual = $saldo;
		$this->interes_anual = $interes;
	}
	
	public function actualizarSaldo()
	{
		echo "<br> Actualizacion anual. Saldo antes: ".$this->saldo_actual." , ";
		$this->saldo_actual += ($this->interes_anual*$this->saldo_actual/100);
		echo "y luego: ".$this->saldo_actual;
	}
	
	public function ingresar($cantidad)
	{
		if($cantidad>0)
		{
			echo "<br> Ingresando a la cuenta: $cantidad";
			$this->saldo_actual+=$cantidad;
		}else
			echo "<br> El monto a ingresar debe ser mayor a cero";
	}
	
	public function retirar ($cantidad)
	{
		if($cantidad>0)
		{
			echo "<br> Retirardo de la cuenta: $cantidad";
			$this->saldo_actual-=$cantidad;
		}else
			echo "<br> El monto a retirar debe ser mayor a cero";
	}
	
	public function mostrarDatos()
	{
		echo "<br> La cuenta numero $this->numero_cuenta, del dni $this->dni tiene un saldo actual de $this->saldo_actual a un interes anual de $this->interes_anual %";
	}
}

$cuenta_bancaria = new Cuenta(35888057,1234,15000,5.00);
$cuenta_bancaria->ingresar(1000);
$cuenta_bancaria->retirar(1000);
$cuenta_bancaria->actualizarSaldo();
$cuenta_bancaria->mostrarDatos();
?>
</body>
</html>