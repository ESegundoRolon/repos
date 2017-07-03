<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <!-- this div is for demo || Please remove it when use this page -->

        <h3 class="section-title style2 text-center"><span>DESTACADOS</span></h3>

        <div class="container">
            <div class="row xsResponse categoryProduct">
                <?php 
                    //Iteramos los productos destacados para mostrarlos en la home del sitio
                    foreach($productos_destacados as $k => $v){
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
                                    <div class="item active">
                                        <a href="product-details.html"> 
                                            <img src="<?php echo base_url()?>/images/product/5.jpg" alt="img" class="img-responsive ">
                                        </a>
                                    </div>
                                    <div class="item"><a href="product-details.html"> 
                                    
                                        <img src="<?php echo base_url()?>/images/product/21.jpg" alt="img" class="img-responsive "></a>
                                    </div>
                                    <div class="item">
                                        <a href="product-details.html"> 
                                            <img src="<?php echo base_url()?>/images/product/30.jpg" alt="img" class="img-responsive ">
                                        </a>
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
                                <p><?php// echo $v["descripcion"]?> </p>
                            </div>
                            <div class="list-description">
                                <?php echo $v["codigo"]?>
                            </div>
                            </div>
                        <div class="price"><span><?php echo $v["precio"]?></span></div>
                        

                        <!-- Incluimos un formulario, para que cuando se hace click en agregar al carrito nos envie el id del producto por POST -->
                        <form name="agregar_producto_<?php echo $v["id"]?>" method="POST" action="<?php echo base_url()?>index_productos/carrito_agregar/">
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

    </div>
    

    

    <hr class="no-margin-top">