<?php
class carrito_model extends CI_Model  {

   function __construct(){
      parent::__construct();
   }
   
   function agregar($producto){
      $producto_agregar = $this->session->userdata["carrito"];
      $producto_agregar["productos"][$producto["id"]]["id"] =  $producto["id"]; 
      $producto_agregar["productos"][$producto["id"]]["precio"] =  $producto["precio"];
      $producto_agregar["productos"][$producto["id"]]["denominacion"] =  $producto["denominacion"];
      $producto_agregar["productos"][$producto["id"]]["codigo"] =  $producto["codigo"];
      
      $produdctos_carrito["carrito"] = $producto_agregar; 
      //Agrega el array de productos a la session
      $this->session->set_userdata($produdctos_carrito);
   }
   function productos(){
        //Retorna el listado de productos agregados al carrito (que estan en session)
        if(!empty($this->session->userdata["carrito"]["productos"])){
            return $this->session->userdata["carrito"]["productos"];
        }
        return array();
   }   
   
}
?>