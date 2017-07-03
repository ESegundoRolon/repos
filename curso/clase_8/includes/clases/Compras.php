<?php 
class Compras {
    private $mysql;
    public function __construct(){
        
        $this->mysql = new Mysql_i();
    }   
    public function comprar($carrito){
        $productos = $carrito->productos();
        
        $importe_total = $carrito->getTotalCarrito();

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