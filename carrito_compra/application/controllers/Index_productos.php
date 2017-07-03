<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_productos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
        $this->load->model('productos_model');
        //Obtiene los productos de la base de datos
        $productos = $this->productos_model->productos();
        //Carga vista del head html
        $vistas["head"] = $this->load->view('layout/head',array(),true);
        //Carga productos agregados al carrito
        $carrito = $this->carrito_productos();
        //Llama a la vista del carrito de compra
        $parametros["productos_carrito"] = $carrito["productos"];
        $parametros["total_carrito"] = $carrito["total"];
        $vistas["menu"] = $this->load->view('layout/menu',$parametros,true);
        //Llama a la vista que genera el listado de productos
        $parametros = array();
        $parametros["productos_destacados"] = $productos;
        $vistas["contenido"] = $this->load->view('productos_destacados',$parametros,true);
        $vistas["footer"] = $this->load->view('layout/footer',array(),true);
        //Llama a la plantilla (layout) y le pasa como parametro el head, menu, listado de prodictos y footer
        $this->load->view('layout/layout',$vistas);
        
	}
    public function carrito_agregar(){
        //Obtiene el id de producto para agregar
        $producto_id = $this->input->post("producto_id");
        //Carga los modelos de productos y carrito
        $this->load->model('productos_model');
        $this->load->model('carrito_model');
        //Consultar datos del producto
        $prodcuto = $this->productos_model->producto($producto_id);
        //Agregar al carrito
        $this->carrito_model->agregar($prodcuto);
        header("Location: /carrito_compra//index.php/index_productos/"); exit;
        
    }
    public function carrito_productos(){
        //Carga modelo de carrito
        $this->load->model('carrito_model');
        //Consultar datos del producto
        $prodcutos = $this->carrito_model->productos();
        //Calcula total de los productos agregados
        if(!empty($prodcutos)){
            $total = 0;
            foreach($prodcutos as $k => $v){
                $total += $v["precio"];
            }
            
        }
        $return = array("productos"=>array(),"total"=>0);
        if(!empty($prodcutos)){
            $return["productos"] = $prodcutos;
        }
        
        if(!empty($total)){
            $return["total"] = $total;
        }
        //Agregar al carrito
        return $return;
    }
    public function comprar_carrito(){
        //Carga modelo de compra
        $this->load->model('comprar_model');
        //Consultar datos del producto
        $productos_carrito = $this->carrito_productos();
        //Realiza la compra del producto
        $prodcutos = $this->comprar_model->comprar($productos_carrito["productos"],$productos_carrito["total"]);
        header("Location: /carrito_compra//index.php/index_productos/"); exit;
        
    }
}
