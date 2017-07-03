<?php
include("includes/system.ini.php");
if(isset($_GET['id']))
{
	//var_dump($_GET['id']);
	$producto = new Productos($_GET['id']);
	
	/* echo "<br> Denominacion: ".$producto->getDenominacion();
	echo "<br> Descripcion: ".$producto->getDescripcion();
	echo "<br> Codigo: ".$producto->getCodigo();
	echo "<br> Precio: ".$producto->getPrecio(); */
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
	 <div class="container">
            <div class="row xsResponse categoryProduct">
	          <div class="item itemauto col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>


	<div class="imageHover">

	<div class="promotion"><span class="discount">15% OFF</span></div>

	<div id="carousel-id-1" class="carousel slide" data-ride="carousel" data-interval="0">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-id-1" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-id-1" data-slide-to="1"></li>
			<li data-target="#carousel-id-1" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active"><a href="product-details.html"> <img
					src="images/product/5.jpg" alt="img" class="img-responsive "></a></div>
			<div class="item"><a href="product-details.html"> <img src="images/product/21.jpg"
																   alt="img"
																   class="img-responsive "></a>
			</div>
			<div class="item"><a href="product-details.html"> <img src="images/product/30.jpg"
																   alt="img"
																   class="img-responsive "></a>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-id-1" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-id-1" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


</div>


<div class="description">
	<h4><a href="product-details.html"><?php echo $producto->getDenominacion()?></a></h4>

	<div class="grid-description">
		<p><?php echo $producto->getDescripcion()?> </p>
	</div>
	<div class="list-description">
		<?php echo $producto->getCodigo()?>
	</div>
	</div>
<div class="price"><span><?php echo $producto->getPrecio()?></span></div>
                 </div>
                </div>
				                 </div>
                </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>


<script src="includes/script.js"></script>
				
</body>
</html>
	<?php
}

?>