<?php
class Noticias {
    private $mysql;
    private $noticias_id;
    private $titulo;
    private $volanta;
    private $copete;
    private $contenido;

    public function __construct(){

        $this->mysql = new Mysql_i();
                
    }   
    //getters de las propiedades del producto
    public function getId(){
        return $this->noticias_id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getVolanta(){
        return $this->volanta;
    }
    public function getCopete(){
        return $this->copete;
    }
    public function getContenido(){
        return $this->contenido;
    }
    //Retorna un array con los productos destacados de la base de datos
    public function noticias(){
        $datos = $this->mysql->consulta("SELECT SQL_CALC_FOUND_ROWS * FROM noticias");
        return $datos;
    }
    
}
?>