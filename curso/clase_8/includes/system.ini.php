<?php
	spl_autoload_register(function ($className) {
        require_once "includes/clases/".$className . '.php'; 
    });
	//PHPMailer
    include("PHPMailer/PHPMailerAutoload.php"); 
//FPDF
    require("fpdf/fpdf.php");

    //iniciamos la session, esto nos sirve para almacenar datos (como una cookie) pero del lado del servidor
    //Accedemos a la session de la siguiente forma $_SESSION
    session_name("web");
    session_save_path();
    session_start();

    function rewriteURL($url) {
           // Tranformamos todo a minusculas
          $url = strtolower($url);
          //Rememplazamos caracteres especiales latinos
          $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
          $repl = array('a', 'e', 'i', 'o', 'u', 'n');
          $url = str_replace ($find, $repl, $url);
          // Añadimos los guiones
          $find = array(' ', '&', '\r\n', '\n', '+');
          $url = str_replace ($find, '-', $url);
          // Eliminamos y Reemplazamos otros carácteres especiales
          $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
          $repl = array('', '-', '');
          $url = preg_replace ($find, $repl, $url);
		  
          return $url;
    }
    
?>
