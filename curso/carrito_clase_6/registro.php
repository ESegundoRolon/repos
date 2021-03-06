<?php
error_reporting(E_ERROR );
include("includes/system.ini.php");


if($_POST["registrar"]){

	$usuario = new Usuarios($_POST["nombre"],$_POST["apellido"],$_POST["telefono"],$_POST["password"],$_POST["confirmarPassword"],$_POST["email"]);
	try
	{
		$usuario->validar();
		$usuario->agregar();
		if($usuario->enviarEmail())
		{
			$usuario->emailVerificado();
			
		}
	}catch(ValidationException $ve)
	{
		//echo $ve->getMessage();
		$ValidationException = $ve->getMessage();
	}catch(GenericException $ge)
	{
		//Nothing to do
	}finally
	{
		echo"Redirecting";
		header("location:login.php");
		exit;
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
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
  


    <div class="container">
        

        <div class="navbar-collapse collapse">
            <a href="index.php">Home</a>

            
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu ">
                       
                        

                    </div>
                    
                </div>
                

                
            </div>
            <!--/.navbar-nav hidden-xs-->
        </div>
        <!--/.nav-collapse -->

    </div>
    <!--/.container -->

    

</div>
<!-- /.Fixed navbar  -->
	<div class="container main-container headerOffset">

	    <div class="row">
	        <div class="breadcrumbDiv col-lg-12">
	            <ul class="breadcrumb">
	                <li><a href="index.html">Home</a></li>
	                <li class="active"> Authentication</li>
	            </ul>
	        </div>
	    </div>

	    <div class="row">

	        <div class="col-lg-9 col-md-9 col-sm-7">
	            <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> Authentication</span></h1>

	            <div class="row userInfo">

	                <div class="col-xs-12 col-sm-6">
	                    <h2 class="block-title-2"> Registrar Usuario </h2>

	                    <form method="POST" name="form_registrar" class="regForm" >
										<?php 
							if($ValidationException)
							{
							?>
								<div class ="exception">
								 <font color="red">
								<label><?php echo "*".$ValidationException ?><label>
								</font>
								</div>
							<?php
								$ValidationException = null;
							}
							?>
	                        
	                    	<!-- CAMPOS A EDITAR -->
	                        <div class="form-group">
	                            <label>Name</label>
	                            <input name="nombre" type="text" class="form-control" aria-required="true">
	                        </div>
	                        <div class="form-group">
	                            <label>Apellido</label>
	                            <input name="apellido" type="text" class="form-control" aria-required="true">
	                        </div>
														<?php 
							if($ValidationException)
							{
							?>
								<div class ="exception">
								 <font color="red">
								<label><?php echo "*".$ValidationException ?><label>
								</font>
								</div>
							<?php
							$ValidationException = null;
							}
							?>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <input name="password" type="password" class="form-control" aria-required="true">
	                        </div>
														<?php 
							if($ValidationException)
							{
							?>
								<div class ="exception">
								 <font color="red">
								<label><?php echo "*".$ValidationException ?><label>
								</font>
								</div>
							<?php
							$ValidationException = null;
							}
							?>
							<div class="form-group">
	                            <label>Confirmar Password</label>
	                            <input name="confirmarPassword" type="password" class="form-control" aria-required="true">
	                        </div>
														<?php 
							if($ValidationException)
							{
							?>
								<div class ="exception">
								 <font color="red">
								<label><?php echo "*".$ValidationException ?><label>
								</font>
								</div>
							<?php
							}
							?>
							<div class="form-group">
	                            <label>Telefono</label>
	                            <input name="telefono" type="text" class="form-control" aria-required="true">
	                        </div>
														<?php 
							if($ValidationException)
							{
							?>
								<div class ="exception">
								 <font color="red">
								<label><?php echo "*".$ValidationException ?><label>
								</font>
								</div>
							<?php
							}
							$ValidationException = null;
							?>
							<div class="form-group">
	                            <label>E-mail</label>
	                            <input name="email" type="email" class="form-control" aria-required="true">
	                        </div>
														<?php 
							if($ValidationException)
							{
							?>
								<div class ="exception">
								 <font color="red">
								<label><?php echo "*".$ValidationException ?><label>
								</font>
								</div>
							<?php
							$ValidationException = null;
							}
							?>
	                        <!-- FIN CAMPOS A EDITAR -->

	                        


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
