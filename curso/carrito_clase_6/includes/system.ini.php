<?php
	//iniciamos la session, esto nos sirve para almacenar datos (como una cookie) pero del lado del servidor
    //Accedemos a la session de la siguiente forma $_SESSION
    session_name("web");
    session_save_path();
    session_start();

    //FPDF
    //require("fpdf/fpdf.php");

	//PHP Mailer
	include("PHPMailer/PHPMailerAutoload.php");
    //Incluimos un archivo por cada clase, esto sera reemplazado por el autoload
   /*  include("includes/clases/Mysql_i.php");
    include("includes/clases/Productos.php");
    include("includes/clases/Carrito.php");
    include("includes/clases/Compras.php");
    include("includes/clases/Paginador.php");
    include("includes/clases/Usuarios.php"); */
	
	
	//Auto load	
	spl_autoload_register ( function ($className) {
		require_once "includes/clases/".$className.'.php';
	});



?>
