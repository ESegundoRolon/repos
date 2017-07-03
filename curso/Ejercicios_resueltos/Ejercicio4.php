<html>
<head>
	<title>Ejercicio 4</title>
</head>
<body>
<?php 
class Tabla
{
	private $matrix =array();
	private $filas;
	private $columnas;
	
	public function __construct($nbFilas,$nbColumnas)
	{
		$this->filas = $nbFilas;
		$this->columnas = $nbColumnas;
		echo "Creando tabla con $nbFilas filas y $nbColumnas columnas";
	}
	
	public function insertarDato($indexFila,$indexColumna,$dato)
	{
		$this->matrix[$indexFila-1][$indexColumna-1] = $dato;
	}
	
	public function mostrarTabla()
	{
		//echo '<table style="width:100%">';
		echo '<table border="2">';
		for ($i = 0 ; $i<$this->filas ; $i++)
		{
			echo "<tr>";
			for ($j = 0 ; $j < $this->columnas ; $j++ )
			{
				echo "<td>";
				echo $this->matrix[$i][$j];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
}
$tabla1=new Tabla(2,3);
$tabla1->insertarDato(1,1,"1");
$tabla1->insertarDato(1,2,"2");
$tabla1->insertarDato(1,3,"3");
$tabla1->insertarDato(2,1,"4");
$tabla1->insertarDato(2,2,"5");
$tabla1->insertarDato(2,3,"6");
$tabla1->mostrarTabla();
?>
</body>
</html>