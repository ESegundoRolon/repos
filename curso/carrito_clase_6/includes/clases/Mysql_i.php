<?php
define('_DB_CLASS_','MySqli'); // MySql or MySqli
define('_DB_PARAMETER_HOST_','localhost');
define('_DB_PARAMETER_NAME_','php_carrito');
define('_DB_PARAMETER_USER_','root');
define('_DB_PARAMETER_PASSWORD_','');

class Mysql_i{
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
?>