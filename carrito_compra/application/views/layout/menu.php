<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
  


    <div class="container">
        

        <div class="navbar-collapse collapse">
            

            
            <div class="nav navbar-nav navbar-right hidden-xs">
                <div class="dropdown  cartMenu ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="fa fa-shopping-cart"> </i> 
                            <span class="cartRespons"> Carrito (<span class="subtotal"><?php echo $total_carrito;  ?></span>) </span> <b
                                class="caret"> </b> 
                            
                            
                        </a>

                    <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
                        <div class="w100 miniCartTable scroll-pane carrito_productos">
                            <table>
                                <tbody>
                                <?php 
                                    //Si el carrito tiene productos agregados se itera para mostrar los productos que tiene el carrito
                                    if(!empty($productos_carrito)){
                                        foreach($productos_carrito as $k => $v){
                                ?>

                                    <!-- PRODUCTOS AGREGADOS AL CARRITO -->
                                    <tr class="miniCartProduct">
                                        <td style="width:20%" class="miniCartProductThumb">
                                            <div>
                                                <a href="product-details.html"> 
                                                    <img src="<?php echo base_url()?>/images/product/3.jpg" alt="img">
                                                </a>
                                            </div>
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
                            <h3 class="text-right subtotal"> Subtotal: <?php echo $total_carrito; ?> </h3>
                            <form name="comprar" method="POST" action="<?php echo base_url()?>index_productos/comprar_carrito/">
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