<?php
 
class ValidationException extends Exception 
{
	private $nombre;
	private $password;
	
	public function __construct( $message , $error = 0 , Exception $previous = null)
	{
		parent::__construct($message,$error,$previous);
	}
}

?>