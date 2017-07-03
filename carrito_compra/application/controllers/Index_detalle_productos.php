<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_detalle_productos extends CI_Controller {

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
		
       
		
        
	}
	
	public function detalle()
	{
		$this->load->model('productos_model');
        //Obtiene los productos de la base de datos
        $productos = $this->productos_model->producto(1);
        //Carga vista del head html
       /*  echo $productos["id"];
		echo "<br>";
		echo $productos["denominacion"];  */
		//var_dump($productos);
		$this->load->view('detalle_producto',$productos);
	}
  
}
