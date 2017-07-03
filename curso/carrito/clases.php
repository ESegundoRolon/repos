<?php
define('_DB_CLASS_','MySqli'); // MySql or MySqli
define('_DB_PARAMETER_HOST_','localhost');
define('_DB_PARAMETER_NAME_','php_carrito');
define('_DB_PARAMETER_USER_','root');
define('_DB_PARAMETER_PASSWORD_','');

class MySql_i{
	public function __construct(){
   	    $this->link = new mysqli( _DB_PARAMETER_HOST_, _DB_PARAMETER_USER_, _DB_PARAMETER_PASSWORD_, _DB_PARAMETER_NAME_ );
  
	}
	public function consulta( $query ){
        $row = array();
        if($this->link){
            $qry = $this->link->query( $query );
            while( $r = mysqli_fetch_array( $qry, MYSQLI_ASSOC ) )
            {
                $row[] = $r;
            }
            mysqli_free_result( $qry );
            return $row; 
        }
       
    }
    
}
class Productos {
    private $mysql;
    private $productos_id;
    private $precio;
    private $denominacion;
    private $descripcion;
    private $codigo;

    public function __construct($productos_id=null){

        $this->mysql = new Mysql_i();
        //Si recibe productos_id consulta a la base de datos y setea las propiedades del productos
        if($productos_id){
            $datos = $this->mysql->consulta("SELECT * FROM productos WHERE id = '$productos_id'");
            $this->precio = $datos[0]["precio"];
            $this->denominacion = $datos[0]["denominacion"];
            $this->descripcion = $datos[0]["descripcion"];
            $this->codigo = $datos[0]["codigo"];
            $this->productos_id = $productos_id;
        }
        
    }   
    //getters de las propiedades del producto
    public function getId(){
        return $this->productos_id;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    //Retorna un array con los productos destacados de la base de datos
    public function productosDestacados(){
        $datos = $this->mysql->consulta("SELECT * FROM productos");
        return $datos;
    }
}
class Carrito {
    private $mysql;
    private $total;
    public function __construct(){
        
        $this->mysql = new Mysql_i();
        $this->total = 0;
    }   
	public function borrarProducto($producto_id)
	{
		unset($_SESSION["carrito"]["productos"]["$producto_id"]);
	}
    //getter, devuelve el valor de una variable
    public function getTotalCarrito(){
        return $this->total;
    }
    private function calcularTotalCarrito(){
        $total = 0;
        foreach($_SESSION["carrito"]["productos"] as $k => $v){
            $total += ($v["precio"]*$v["cantidad"]);
        }
        $this->total = $total;
    }
    //Metodos agregar y devolver productoss
    public function agregar($producto,$cantidad_productos){
        $_SESSION["carrito"]["productos"][$producto->getId()]["id"] = $producto->getId();
        $_SESSION["carrito"]["productos"][$producto->getId()]["precio"] = $producto->getPrecio();
        $_SESSION["carrito"]["productos"][$producto->getId()]["denominacion"] = $producto->getDenominacion();
        $_SESSION["carrito"]["productos"][$producto->getId()]["descripcion"] = $producto->getDescripcion();
        $_SESSION["carrito"]["productos"][$producto->getId()]["codigo"] = $producto->getCodigo();
		$_SESSION["carrito"]["productos"][$producto->getId()]["cantidad"] = $cantidad_productos;

    }
    public function productos(){
		//no hay cohesion al llamar calcularTotalCarrito()
        $this->calcularTotalCarrito();
        return $_SESSION["carrito"]["productos"];      
    }
}
class Compras {
    private $mysql;
	private $carrito;
    public function __construct($carrito){
        $this->carrito = $carrito;
        $this->mysql = new Mysql_i();
    }   

	public function getCarrito()
	{
		return $this->carrito;
	}
    public function comprar(){
        $productos = $this->carrito->productos();
        
        $importe_total = $this->carrito->getTotalCarrito();

        $query = "INSERT INTO compras (falta,habilitado,importe_total) VALUES (now(),1,$importe_total) ";
        $qry = mysqli_query( $this->mysql->link, $query );
        if(mysqli_affected_rows($this->mysql->link) >= 1) {
            $compras_id = mysqli_insert_id($this->mysql->link);
            foreach($productos as $k => $v){
                $query = "INSERT INTO compras_productos (falta,habilitado,compras_id,productos_id,precio) VALUES (now(),1,$compras_id,$v[id],$v[precio]) "; 
                $qry = mysqli_query( $this->mysql->link, $query );
            }
            echo "Compra exitosa"; 
            $_SESSION["carrito"] = array();
            exit;
        }
        echo "Error al realizar la compra";
        exit;
        

        
    }
    
}
?>
