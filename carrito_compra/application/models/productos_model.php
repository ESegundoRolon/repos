<?php
class productos_model extends CI_Model  {

   function __construct(){
      parent::__construct();
   }
   
   function productos(){
      //Obtiene el listado de productos 
      $this->db->select('id, denominacion, codigo,  precio');
      $this->db->from('productos');
      $consulta = $this->db->get();
      $resultado = $consulta->result_array();
      return $resultado;
   }
   function producto($id){
      //obtiene los datos de un producto
      $this->db->select('id, denominacion, codigo,  precio');
      $this->db->from('productos');
      $this->db->where('id = '.$id);
      $consulta = $this->db->get();
      $resultado = $consulta->row_array();
      return $resultado;
   
   }
   
   
}
?>