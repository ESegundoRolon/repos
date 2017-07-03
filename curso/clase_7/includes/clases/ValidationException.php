<?php
class ValidationException extends Exception {

    private $nombre;
    private $password;

    public function __construct($message,$code=0,Exception $previous=null){
        parent::__construct($message,$code,$previous);
              
    }   
    
    
}
?>