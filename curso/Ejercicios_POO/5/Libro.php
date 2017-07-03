<html>
<head>
	<title>Ejercicio 5</title>
</head>
<body>
<?php
class Libro
{
	private $titulo;
	private $autor;
	private $ISBN;
	private $paginas;
	private $edicion;
	private $editorial;
	//lugar
	private $ciudad;
	private $pais;
	
	public function __construct($titulo,$autor,$ISBN,$paginas,$edicion,$editorial,$ciudad,$pais)
	{
		$this->titulo = $titulo;
		$this->autor = $autor;
		$this->ISBN = $ISBN;
		$this->paginas = $paginas;
		$this->edicion = $edicion;
		$this->editorial = $editorial;
		$this->ciudad = $ciudad;
		$this->pais = $pais;
	}
	
	public function mostrarInfo($style)
	{
		switch($style)
		{
			case 'tableRow':
				return $this->mostrarInfoTabla();
				break;
			case 'simple':			
				return $this->mostrarInfoSimple();
				break;
			default:
				return $this->mostrarInfoDefault();
		}
	}
	
	private function mostrarInfoTabla()
	{
		
		echo "<tr>";
		echo "<td>";
		echo $this->titulo;
		echo "</td>";		
		echo "<td>";
		echo $this->autor->getNombre();
		echo "</td>";
		echo "<td>";
		echo $this->autor->getApellido();
		echo "</td>";		
		echo "<td>";
		echo $this->ISBN;
		echo "</td>";
		echo "<td>";
		echo $this->paginas;
		echo "</td>";
		echo "<td>";
		echo $this->edicion;
		echo "</td>";
		echo "<td>";
		echo $this->editorial;
		echo "</td>";
		echo "<td>";
		echo $this->ciudad;
		echo "</td>";
		echo "<td>";
		echo $this->pais;
		echo "</td>";		
		echo "</tr>";

	}
	private function mostrarInfoSimple()
	{
		$string = "<artitle>";
		$string .= "<h1>".$this->titulo."</h1>";
		$string .= "<p>Autor: ".$this->autor->getNombre().", ".$this->autor->getApellido()." ISBN: ".$this->ISBN." Paginas: ".$this->paginas." Edicion: ".$this->edicion." Editorial: ".$this->editorial." Ciudad: ".$this->ciudad." Pais: ".$this->pais."</p>";
		$string .= "</article>";
		return $string;
	}	
	
	private function mostrarInfoDefault()
	{
		return "Titulo: ".$this->titulo."Autor: ".$this->autor->getNombre().", ".$this->autor->getApellido()." ISBN: ".$this->ISBN." Paginas: ".$this->paginas." Edicion: ".$this->edicion." Editorial: ".$this->editorial." Ciudad: ".$this->ciudad." Pais: ".$this->pais;
		
	}
}

class Persona
{
	private $nombre;
	private $apellido;
	//formato yyyy-mm-dd
	private $fechaNacimiento;
	private $DNI;
	
	public function __construct($nombre , $apellido , $fechaNacimiento , $DNI)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->DNI = $DNI;
	}
	
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getApellido()
	{
		return $this->apellido;
	}
	public function getEdad()
	{
		$desde = new Datetime($this->fechaNacimiento);
		$hasta = new DateTime('today');
		//devuelve años
		return $desde->diff($hasta)->y;
	}
	public function getFechaNacimiento()
	{
		return $this->fechaNacimiento;
	}
}

$autor1 = new Persona ('Rafael','Nadal','1970-02-01', 35888057);
$libro = new Libro('Como jugar al tenis', $autor1 , 'ISBN1' , 300 , 2017 , 'Editorial del tenis pro' , 'Madrid', 'España');

//en tabla
echo '<table border="1">';
echo '<tr>';
echo $libro->mostrarInfo('tableRow');
echo '</tr>';
echo '</table>';
echo "<br>";
//Simple
echo $libro->mostrarInfo('simple');
echo "<br>";
//Defualt
echo $libro->mostrarInfo('default');

?>
</body>
</html>