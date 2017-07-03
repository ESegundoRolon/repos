<?php 
class Vehiculo
{
	
	protected $combustible;
	protected $marca;
	protected $modelo;
	protected $cantidadRuedas;
	protected $color;
	protected $M;
	//PDF adicional, parametros comerciales
	protected $utilizaDiesel;
	protected $estaPatentado;
	protected $vendeTitular;
	protected $papelesActualizados;
	protected $año;
	//PDF adicional, parametros mecanicos
	protected $motorEstaBien;
	protected $cubiertasEstanBien;
	protected $ValorBase;
	protected $estadoMecanicoInitializado;
	protected $comprador;
	protected $titular;
	public function __construct($utilizaDiesel = false,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año)
	{
		$this->combustible = $combustible;
		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->cantidadRuedas = $cantidadRuedas;
		$this->color = $color;
		$this->M=$M;
		$this->utilizaDiesel = $utilizaDiesel;
		$this->estaPatentado=$estaPatentado;
		$this->vendeTitular = $vendeTitular;
		$this->papelesActualizados = $papelesActualizados;
		$this->año = $año;
		$this->ValorBase = 50000;
		$this->estadoMecanicoInitializado = false;
		$this->titular ='';
		echo "<br>Se ha creado un vehiculo con $combustible combustible, $marca marca, $modelo modelo, $cantidadRuedas cantidadRuedas";
	}
	public function inicializarEstadoMecanico($motorEstaBien,$cubiertasEstanBien)
	{
		$this->motorEstaBien = $motorEstaBien;
		$this->cubiertasEstanBien = $cubiertasEstanBien;
		$this->estadoMecanicoInitializado = true;
	}
	public function setComprador($comprador)
	{
		$this->comprador = $comprador;
		$this->IdentificarComprador();
	}
	public function getComprador()
	{
		return $this->comprador;
	}
	private function IdentificarComprador()
	{
		echo "<br>El posible comprador identificado se llama ".$this->comprador->getNombre().", ".$this->comprador->getApellido();
	}
	
	public function verificarComprador()
	{
		if($this->comprador->getDineroCuenta() > ($this->ValorBase+(30/100 * $this->ValorBase)) )
		{
		echo "<br> El comprador tiene $".$this->comprador->getDineroCuenta()." y le alcanza para comprar vehiculo (30%) de ".($this->ValorBase+(30/100 * $this->ValorBase));
		}else{
			echo "<br> El comprador tiene $".$this->comprador->getDineroCuenta()." y NO le alcanza para comprar vehiculo (30%) de ".($this->ValorBase+(30/100 * $this->ValorBase));
			$this->comprador = null;
		}
	}
	public function venderVechiculo($perfil)
	{
		if($this->comprador==null)
		{
			echo "<br>Es necesario encontrar un comprador adecuado";
		}else
		{
			if($perfil =='vendedor')
			{
				echo "<br>El vendedor ha vendido el vehiculo al comprador".$this->comprador->getNombre().", ".$this->comprador->getApellido();
				$this->comprador->comproAuto();
			}else{
				echo "<br>El auto debe ser vendido por un vendedor";
			}
		}
	}
	public function autoVendido($perfil)
	{
		if( $perfil != 'gestor')
		{
			echo "<br>El tramite de actualizacion de titular solo lo realiza un gestor";
			
		}else if ($this->comprador != null ){
			$this->titular = $this->comprador->getNombre();
		}else{
			echo "Antes de actualizar el titular se debe encontrar un comprador";
		}
	}
	private function verificarAño()
	{
		return $this->año >= 2013 ? true : false;
	}
	private function getAñosAntiguedad()
	{
		return $this->año - 2013;
	}
	public function verificarEsVendible()
	{
		return ( $this->estaPatentado && $this->vendeTitular && $this->papelesActualizados && $this->verificarAño() ) ? true : false; 
	}
	
	public function getValorFinal()
	{
		if($this->estadoMecanicoInitializado)
		{
			$valorFinal = $this->ValorBase;
			if(!$this->motorEstaBien)
			{
				echo "<br>El motor no esta bien, dosminuyendo 5%";
				$valorFinal -= ($this->ValorBase*5/100);
			}
			if(!$this->cubiertasEstanBien)
			{
				echo "<br>Las cubiertas no estan bien, dosminuyendo 3%";
				$valorFinal -= ($this->ValorBase*3/100);
			}
			return $valorFinal;
		}
		else{
			return -1;
		}
	}
	public function encender()
	{
		if($this->combustible<($this->M))
		{
			echo "<br>No hay suficiente combustible para encender el vehiculo";
		}else
		{
			echo "<br>Se ha encendido, se disminuye el combustible de ".$this->combustible;
			$this->combustible-=$this->M;
			echo " a ".$this->combustible;
		}
	}
	public function andar($km)
	{
		if($this->combustible<($this->M*$km))
		{
			echo "<br>No hay suficiente combustible para andar $km km";
		}else
		{
			echo "<br>Se ha andado, se disminuye el combustible de ".$this->combustible;
			$this->combustible-=($this->M*$km);
			echo " a ".$this->combustible;
		}
	}
	public function cargar($N)
	{
		echo "<br>Se ha cargado combustible, de ".$this->combustible;
		$this->combustible+=$N;
		echo " a ".$this->combustible;
	}
	public function pintar($color)
	{
		$this->color = $color;
		echo "<br>Se ha cambiado al color $color";
	}
}
class Auto extends Vehiculo{
	private $esTaxi;
	private $chasisEstaBien;

	public function __construct($utilizaDiesel,$esTaxi=FALSE,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año)
	{
		parent::__construct($utilizaDiesel,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año);
		$this->esTaxi = $esTaxi;
		//auto valor base 100000
		$this->ValorBase *= 2;
	}
	
	public function getIsTaxi()
	{
		return $this->esTaxi;
	}
	
	public function inicializarEstadoMecanico($motorEstaBien,$cubiertasEstanBien,$chasisEstaBien=null)
	{
		parent::inicializarEstadoMecanico($motorEstaBien , $cubiertasEstanBien);
		$this->chasisEstaBien = $chasisEstaBien;
		$this->estadoMecanicoInitializado = true;
	}
	
	public function getValorFinal()
	{
		if($this->estadoMecanicoInitializado)
		{
			$valorFinal = parent::getValorFinal();
			if(!$this->chasisEstaBien)
			{
				echo "<br>El chasis no esta bien, disminuyendo  5%";
				$valorFinal -= ($this->ValorBase*5/100);
			}
			return $valorFinal;
		}else
			return -1;
	}
}
class Moto extends Vehiculo{
	
	public function __construct($utilizaDiesel,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año)
	{
		if($utilizaDiesel)
		{
			echo "<br>Las motos solo utilizan nafta, forzando Nafta :D";
			parent::__construct(false,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año);
		
		}else
			parent::__construct($utilizaDiesel,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año);
		
	}
	
	public function wheelie()
	{
		echo "<br>Haciendo wheelie, el combustible disminuto de ".$this->combustible;
		$this->combustible-=5;
		echo " a ".$this->combustible;
	}
}
class Camioneta extends Vehiculo{
	
	private $cilindros;
	private $tieneTurbo;
	private $chasisEstaBien;
	private $carroceriaEstaBien;
	
	public function __construct($utilizaDiesel,$cilindros,$tieneTurbo=false,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año)
	{
		parent::__construct($utilizaDiesel,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año);
		$this->cilindros = $cilindros;
		$this->tieneTurbo = $tieneTurbo;
		//moto valor base 400000
		$this->ValorBase *= 8;
	}
	public function getCilindros()
	{
		return $this->cilindros;
	}
	public function getTieneTurbo()
	{
		return $this->tieneTurbo;
	}
	public function inicializarEstadoMecanico($motorEstaBien,$cubiertasEstanBien,$chasisEstaBien=null,$carroceriaEstaBien=null)
	{
		parent::inicializarEstadoMecanico($motorEstaBien,$cubiertasEstanBien,$chasisEstaBien);
		$this->carroceriaEstaBien = $carroceriaEstaBien;
		$this->estadoMecanicoInitializado = true;
	}
	
	public function getValorFinal()
	{
		if($this->estadoMecanicoInitializado)
		{
			$valorFinal = parent::getValorFinal();
			if(!$this->carroceriaEstaBien)
			{
				echo "<br>La carroceria no esta bien, disminuyendo  5%";
				$valorFinal -= ($this->ValorBase*5/100);
			}	
			
			return $valorFinal;
		}
		else{
			return -1;
		}
	}
}
class Utilitarios extends Vehiculo
{
	private $chasisEstaBien;
	private $carroceriaEstaBien;
	public function __construct($utilizaDiesel,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año)
	{
		parent::__construct($utilizaDiesel,$combustible,$marca,$modelo,$cantidadRuedas,$color,$M,$estaPatentado,$papelesActualizados,$vendeTitular,$año);
		//utilitarios valor 200000
		$this->ValorBase *= 4;
	}
	
		
	public function inicializarEstadoMecanico($motorEstaBien,$cubiertasEstanBien,$chasisEstaBien=null,$carroceriaEstaBien=null)
	{
		parent::inicializarEstadoMecanico($motorEstaBien,$cubiertasEstanBien,$chasisEstaBien  );
		$this->carroceriaEstaBien = $carroceriaEstaBien;
		$this->estadoMecanicoInitializado = true;
	}
	public function getValorFinal()
	{
		if($this->estadoMecanicoInitializado)
		{
			$valorFinal = parent::getValorFinal();
			if(!$this->carroceriaEstaBien)
			{
				echo "<br>La carroceria no esta bien, disminuyendo  5%";
				$valorFinal -= ($this->ValorBase*5/100);
			}	
			
			return $valorFinal;
		}
		else{
			return -1;
		}
	}
	
	
}

class Comprador
{
	private $dinero_cuenta;
	private $nombre;
	private $apellido;
	private $nbVehiculosPropiedad;
	
	public function __construct($dinero_cuenta,$nombre,$apellido,$nbVehiculosPropiedad)
	{
		$this->dinero_cuenta = $dinero_cuenta ;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->nbVehiculosPropiedad = $nbVehiculosPropiedad ;
	}
	
	public function getDineroCuenta()
	{
		return $this->dinero_cuenta;
	}
	
	public function getNombre()
	{
		return $this->nombre;
	}
	
	public function getApellido()
	{
		return $this->apellido;
	}
	
	public function getNbVehiculos()
	{
		return $this->nbVehiculosPropiedad;
	}
	
	public function comproAuto()
	{
		$this->nbVehiculosPropiedad++;
	}
	
	public function vendioAuto()
	{
		$this->nbVehiculosPropiedad--;
	}
}
/* $vehiculo = new Vehiculo(100,"Ford","K",4,"Rojo",5);
$vehiculo->encender();
$vehiculo->andar(200);
$vehiculo->cargar(5);
$vehiculo->pintar("amarillo");

$auto = new Auto(false,100,"Ford","K",4,"Rojo",5);
echo "<br>El auto es taxi: ";
echo $auto->getIsTaxi() ? 'true' : 'false ';
$taxi = new Auto(true,100,"Mecedez Benz","Focus",4,"Verde",5);
echo "<br>El auto es taxi: ";
echo $taxi->getIsTaxi() ? 'true' : 'false ';
$moto = new Moto(100,"Yamaha","tc2000",4,"Naranja",5);
$moto->wheelie();
$camioneta = new Camioneta(8,TRUE,100,"Ford","F100",2,"Gris",5);
echo "<br>Cantidad de cilindros: ".$camioneta->getCilindros();
echo "<br>Tiene turbo: ";
echo $camioneta->getTieneTurbo() ? 'true' : 'false' ; */
$motoRobada = new Moto(false,100,"Yamaha","tc2000",4,"Naranja",5,false,false,false,2017);
echo "<br> Es vendible: ";
echo $motoRobada->verificarEsVendible() ? 'Si' : 'No';
$motoCristiana = new Moto(false,100,"Yamaha","tc2000",4,"Naranja",5,true,true,true,2011);
echo "<br> Es vendible: ";
echo $motoCristiana->verificarEsVendible() ? 'Si' : 'No';
$moto = new Moto(false,100,"Yamaha","tc2000",4,"Naranja",5,true,true,true,2017);
echo "<br> Es vendible: ";
echo $moto->verificarEsVendible() ? 'Si' : 'No';
echo "<br>Valor final: ";
echo $moto->getValorFinal()==-1 ? 'Hay que inicializarEstadoMecanico' : "<br>".$moto->getValorFinal();
$moto->inicializarEstadoMecanico(false,false);
echo "<br>Valor final: ";
echo $moto->getValorFinal()==-1 ? 'Hay que inicializarEstadoMecanico' : "<br>".$moto->getValorFinal();
$moto->inicializarEstadoMecanico(true,true);
echo "<br>Valor final: ";
echo $moto->getValorFinal()==-1 ? 'Hay que inicializarEstadoMecanico' : "<br>".$moto->getValorFinal();
$auto = new Auto(true,false,100,"Yamaha","tc2000",4,"Naranja",5,true,true,true,2011);
echo "<br> Es vendible: ";
echo $auto->verificarEsVendible() ? 'Si' : 'No';
$autoNuevo = new Auto(true,false,100,"Yamaha","tc2000",4,"Naranja",5,true,true,true,2017);
echo "<br> Es vendible: ";
echo $autoNuevo->verificarEsVendible() ? 'Si' : 'No';
$autoNuevo->inicializarEstadoMecanico(false,true,false);
echo "<br>Valor final: ";
echo "<br>".$autoNuevo->getValorFinal();

$comprador = new Comprador(100000,'Enrique', 'Rolon' ,1);
echo "br>Identificando comprador:";
$moto->setComprador($comprador);
$moto->verificarComprador();
$moto->venderVechiculo('vendedor');
$moto->autoVendido('gestor');
//CHEQUEAR CONSTRUCTORES PARA CADA CLASE Y VALIDAR SI FUERON INITIALIZADOS PARAMETROS
?>