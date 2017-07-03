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
?>
