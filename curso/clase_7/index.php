<?php 
error_reporting(E_ERROR );    
include("includes/system.ini.php");
    $resultados_x_pagina = 1;
  
    //Instanciamos la clase Productos
    $productos = new Productos();
    
    $carrito = new Carrito();
    
    /** MOSTRAR PRODUCTOS AGREGADOS **/
    //Consultamos los productos destacados de la base de datos
    $productos_destacados = $productos->productosDestacados($_GET["pagina"],$resultados_x_pagina);
    
    //Paginador
    if(!$_GET["pagina"]){
        $pagina_actual = 1;
    }

    $paginas = Paginador::paginas($productos->total_resultados,$pagina_actual,$resultados_x_pagina); 

    /** AGREGAR AL CARRITO **/
    //Si me llego producto_id por POST significa que voy agregar este producto al carrito
    if($_POST["producto_id"]){
        $producto_agregar = new Productos($_POST["producto_id"]);
        $carrito->agregar($producto_agregar);
        

    }


    /** COMPRAR **/
    //Si recibe comprar por POST significa que el usuario quiere finalizar la compra.
    if($_POST["comprar"]){
        $compras = new Compras();
        $compras->comprar($carrito);
    }


    //Se llama al metodo producutos de la clase carrito que me devolvera los productos que el carrito tiene agregados
    $productos_carrito = $carrito->productos();


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
            

            
            <div class="nav navbar-nav navbar-right hidden-xs">
                <a href="registro.php">Registro</a>
                <div class="dropdown  cartMenu ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="fa fa-shopping-cart"> </i> 
                            <span class="cartRespons"> Carrito (<span class="subtotal"><?php echo $carrito->getTotalCarrito();  ?></span>) </span> <b
                                class="caret"> </b> 
                            
                            
                        </a>

                    <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
                        <div class="w100 miniCartTable scroll-pane carrito_productos">
                            <table>
                                <tbody>
                                <?php 
                                    //Si el carrito tiene productos agregados se itera para mostrar los productos que tiene el carrito
                                    if($productos_carrito){
                                        foreach($productos_carrito as $k => $v){
                                ?>

                                    <!-- PRODUCTOS AGREGADOS AL CARRITO -->
                                    <tr class="miniCartProduct">
                                        <td style="width:20%" class="miniCartProductThumb">
                                            <div><a href="product-details.html"> <img src="images/product/3.jpg" alt="img">
                                            </a></div>
                                        </td>
                                        <td style="width:40%">
                                            <div class="miniCartDescription">
                                                <h4><a href="product-details.html"><?php  echo $v["denominacion"]; ?></a></h4>
                                                

                                                <div class="price"><span> <?php echo $v["precio"]; ?> </span></div>
                                            </div>
                                        </td>
                                        
                                        <td style="width:15%" class="miniCartSubtotal"><span> <?php echo $v["precio"]; ?> </span></td>
                                        

                                        
                                        <td style="width:5%" class="delete"><a> x </a></td>
                                    </tr>
                                    <!-- FIN PRODUCTOS AGREGADOS AL CARRITO -->
                                <?php 
                                    }

                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        

                        <div class="miniCartFooter text-right">
                            <h3 class="text-right subtotal"> Subtotal: <?php echo $carrito->getTotalCarrito(); ?> </h3>
                            <form name="comprar" method="POST">
                                <input name="comprar" type="submit" value="Comprar">
                            </form>
                        </div>
                        

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





<div class="container main-container">


    

    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <!-- this div is for demo || Please remove it when use this page -->

        <h3 class="section-title style2 text-center"><span>DESTACADOS</span></h3>

        <div class="container">
            <div class="row xsResponse categoryProduct">
                <?php 
                    $i = 0;
                    //Iteramos los productos destacados para mostrarlos en la home del sitio
                    foreach($productos_destacados as $k => $v){
                        if($i++>($resultados_x_pagina-1)){
                            break;
                        }
                ?>
                <!-- LISTADO DE PRODUCTOS DESTACADOS -->
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
                            <h4><a href="product-details.html"><?php echo $v["denominacion"]?></a></h4>

                            <div class="grid-description">
                                <p><?php echo $v["descripcion"]?> </p>
                            </div>
                            <div class="list-description">
                                <?php echo $v["codigo"]?>
                            </div>
                            </div>
                        <div class="price"><span><?php echo $v["precio"]?></span></div>
                        

                        <!-- Incluimos un formulario, para que cuando se hace click en agregar al carrito nos envie el id del producto por POST -->
                        <form name="agregar_producto_<?php echo $v["id"]?>" method="POST">
                            <!-- El input hidden sera enviado por POST pero no sera visible por el usuario -->
                            <input type="hidden" name="producto_id" value="<?php echo $v["id"]?>">
                            <div class="action-control">
                                <input type="submit" name="agregar_carrito" value="Agregar al carrito">   
                            </div>
                        </form>
                    </div>
                </div>
                <!-- FIN  LISTADO DE PRODUCTOS DESTACADOS-->
                <?php }?>

                
                </div>
            </div>
            <!-- PAGINADOR -->
                <div class="row">
                <?php

                    foreach($paginas as $k => $v){
                        
                        echo $v;
                    }
                ?>
		 </div>
        </div>

    </div>
    

    

    <hr class="no-margin-top">

   

</div>





<footer>
    <div class="footer">
        <div class="container">
            
        </div>
    </div>
</footer>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>


<script src="includes/script.js"></script>

</body>
</html>
<?php 
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>
