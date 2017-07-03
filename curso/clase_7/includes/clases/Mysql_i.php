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
    public function insertar($tabla,&$datos){
       // Obtengo las claves y valores del array y los separo
        if($datos)foreach($datos as $clave => $valor) {
            if(($clave != "" AND isset($valor)) OR $valor===null ) {
                $campos[] = "`".mysqli_real_escape_string($this->link,$clave)."`";
                $d =  $this->sentencia_campos_query($valor,$clave,false);
                $valores[] = $d;
               
                $duplicate[] = $this->sentencia_campos_query($valor,$clave);
            }
        }
        // Armo un string con valores y otros con las claves.
        $qCampos = join(",",$campos);
        $qValores = join(",",$valores);
       
        // Creo la consulta SQL
        
        $query= "INSERT  INTO `".$tabla."`";
        $query.= "(".$qCampos.")";
        $query.= "values(".$qValores.")";

        
        $qry = mysqli_query( $this->link, $query );
  
        if( mysqli_error( $this->link ) ){
            //return false; 
        }
        // Chequeo si el insert fue exitoso
        if(mysqli_affected_rows($this->link) >= 1) {
            
            return mysqli_insert_id($this->link);
        } else {
            return false;
        } 
    }
    public function sentencia_campos_query(&$valor,&$clave,$update=true){
        
        switch($valor){
            
            case "":
            case null:
          
                if($valor===null){
                     // Valor null
                    if($update){
                        return "`".mysqli_real_escape_string($this->link,$clave)."`"." = NULL";
                    }else{
                        return "null";
                    }
                }elseif($valor===""){
                      // Vacio
                    if($update){
                        return  "`".mysqli_real_escape_string($this->link,$clave)."`"." = ''";
                    }else{
                        return "''";
                    }
                }elseif($valor===0){
                    // Cero (0)
                    if($update){
                        return  "`".mysqli_real_escape_string($this->link,$clave)."`"." = 0";
                    }else{
                        return 0;
                    }
                }
             break;  
            default:
                
                switch(strtolower($valor)){
                    
                    case "_autoincrement":
                    
                        if($update){
                            return  "`".mysqli_real_escape_string($this->link,$clave)."`"." = (".mysqli_real_escape_string($this->link,$clave)."+1)";
                        }else{
                            return "1";
                        }
                        
                        break;
                    
                     case "curdate()":
                     
                        if($update){
                            return  "`".mysqli_real_escape_string($this->link,$clave)."`"." = (CURDATE())";
                        }else{
                            return "CURDATE()";
                        }
                       
                        break;
                        
                     case "now()":
                     
                        if($update){
                             return  "`".mysqli_real_escape_string($this->link,$clave)."`"." = (NOW())";
                        }else{
                            return "NOW()";
                        }
                       
                        break;
                    
                    default:
                        // Con datos
                        if($update){
                            return "`".mysqli_real_escape_string($this->link,$clave)."`"." = '".mysqli_real_escape_string($this->link,$valor)."'";
                        }else{
                            return "'".mysqli_real_escape_string($this->link,$valor)."'";
                        }
                        
                     break;        
                }
                
        }    
    }



    
    
    
    
}
?>