<?php
class Productos {
    private $mysql;
    private $productos_id;
    private $precio;
    private $denominacion;
    private $descripcion;
    private $codigo;
    public $total_resultados;

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
            $this->total_resultados = 0;
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
    public function productosDestacados($pagina,$resultados_x_pagina){
        if(!$pagina){
            $pagina = 1;
        }
        $limit_inicio = $pagina-1;
        $limit_fin = $resultados_x_pagina;
		$limit = " LIMIT $limit_inicio,$limit_fin";
        
		//Cuando se usa limit, se usa SQL_CALC_FOUND_ROWS para guardar en memoria el total si no se hubiera aplicado el limit
        $datos = $this->mysql->consulta("SELECT SQL_CALC_FOUND_ROWS * FROM productos $limit");
		//para saber el total del query de arriba aplicamos Found_Rows
        $total = $this->mysql->consulta("SELECT FOUND_ROWS() total");
        $this->total_resultados = $total[0]["total"];
        return $datos;
    }
}
?>