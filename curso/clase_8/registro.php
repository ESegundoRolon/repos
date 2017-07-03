<?php
error_reporting(E_ERROR );
include("includes/system.ini.php");

if($_POST["registrar"]){
	//sanear datos XSS inyection
	$nombre = strip_tags($_POST["nombre"]);
	$password = strip_tags($_POST["password"]);
	$usuario = new Usuarios($nombre,$password);
	try{
		$usuario->validar();
		//enviar email de confirmacion
		$usuario->enviarEmail();
	
	}catch(ValidationException $e){
		echo $e->getMessage();
	}catch(Exception $e){
		echo $e->getMessage();
	}
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTN Programación avanzada</title>

    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">


    
</head>

<body>
	<div class="container main-container headerOffset">

	    <div class="row">
	        <div class="breadcrumbDiv col-lg-12">
	            <ul class="breadcrumb">
	                <li><a href="/clase_7/">Home</a></li>
	                <li class="active"> Authentication</li>
	            </ul>
	        </div>
	    </div>

	    <div class="row">

	        <div class="col-lg-9 col-md-9 col-sm-7">
	            <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Authentication</span></h1>

	            <div class="row userInfo">

	                <div class="col-xs-12 col-sm-6">
	                    <h2 class="block-title-2"> Create an account </h2>

	                    <form method="POST" name="form_registrar" class="regForm" >
	                        <div class="form-group">
	                            <label>Name</label>
	                            <input name="nombre" type="text" class="form-control" aria-required="true">
	                        </div>
	                        
	                        <div class="form-group">
	                            <label>Password</label>
	                            <input name="password" type="password" class="form-control" aria-required="true">
	                        </div>
	                        <div class="error">
	                        </div>

	                        <input name="registrar" type="submit" value="Registrar"/>
	                    </form>
	                </div>
	                
	            </div>
	            <!--/row end-->

	        </div>

	        <div class="col-lg-3 col-md-3 col-sm-5"></div>
	    </div>
	    <!--/row-->

	    <div style="clear:both"></div>
	</div>
</body>
