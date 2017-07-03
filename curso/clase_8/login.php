<?php
error_reporting(E_ERROR );
include("includes/system.ini.php");


if(isset($_POST["login"]))
{
	
	if(Usuarios::buscarUsuario($_POST["email"],$_POST["clave"]))
	{
		$_SESSION["usuario"] = $_POST["email"];
	    header("location:index.php");
	}else
	{
		$ValidationException = new ValidationException("Datos incorrectos o usuario no existe");
	}
}else if((isset($_POST["logup"])))
{
	header("location:registro.php");
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
	                    <h2 class="block-title-2"> Login </h2>

	                    <form method="POST" name="form_login" class="regForm" >
										
	                        <?php 
							if($ValidationException)
							{
							?>
								<div class ="exception">
								 <font color="red">
								<label><?php echo "*".$ValidationException->getMessage() ?><label>
								</font>
								</div>
							<?php
								$ValidationException = null;
							}
							?>
	                    	<!-- CAMPOS A EDITAR -->
	                        <div class="form-group">
	                            <label>E-mail</label>
	                            <input name="email" type="text" class="form-control" aria-required="true">
	                        </div>
	                        <div class="form-group">
	                            <label>Contraseña</label>
	                            <input name="clave" type="password" class="form-control" aria-required="true">
	                        </div>
														
	                        <!-- FIN CAMPOS A EDITAR -->

	                        


	                        <input name="login" type="submit" value="Login"/>
							<input name="logup" type="submit" value="Nuevo Usuario"/>
	                    


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
