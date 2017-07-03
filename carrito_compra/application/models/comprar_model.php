<?php
class comprar_model extends CI_Model  {

   function __construct(){
      parent::__construct();
   }
   
   function comprar($producto,$total){
        //Inserta datos en la tabla compras
        $data = array(
           'importe_total' => $total
        );
        $this->db->insert('compras', $data);
        //Obtiene el ultimo id agregado en compras
        $compras_id = $this->db->insert_id();
        //Agrega compras productos
        if(!empty($producto)){
            foreach($producto as $k=>$v){
                $data = array(
                   'compras_id' => $compras_id,
                   'productos_id'=>$v["id"],
                   'precio'=>$v["precio"]
                );
                $this->db->insert('compras_productos', $data);
            }
        }
        //Eliminar session
        $this->session->unset_userdata('carrito');
   }
    
   
}
?>