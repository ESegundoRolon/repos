<?php 
class Carrito {
    private $mysql;
    private $total;
    public function __construct(){
        
        $this->mysql = new Mysql_i();
        $this->total = 0;
    }   
    //getter, devuelve el valor de una variable
    public function getTotalCarrito(){
        return $this->total;
    }
    private function calcularTotalCarrito(){
        $total = 0;
        foreach($_SESSION["carrito"]["productos"] as $k => $v){
            $total += $v["precio"];
        }
        $this->total = $total;
    }
    //Metodos agregar y devolver productoss
    public function agregar($producto){
        $_SESSION["carrito"]["productos"][$producto->getId()]["id"] = $producto->getId();
        $_SESSION["carrito"]["productos"][$producto->getId()]["precio"] = $producto->getPrecio();
        $_SESSION["carrito"]["productos"][$producto->getId()]["denominacion"] = $producto->getDenominacion();
        $_SESSION["carrito"]["productos"][$producto->getId()]["descripcion"] = $producto->getDescripcion();
        $_SESSION["carrito"]["productos"][$producto->getId()]["codigo"] = $producto->getCodigo();

    }
    public function productos(){
        $this->calcularTotalCarrito();
        return $_SESSION["carrito"]["productos"];      
    }
}
?>