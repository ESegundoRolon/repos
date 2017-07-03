
<?php
//var_dump($_GET['id']);
if(isset($_GET['id']))
{
	var_dump($_GET['id']);
}
class Categorias{
	private $mysql;
    private $categorias_id;
    private $descripcion;
	
	 public function __construct($categorias_id=null){

        $this->mysql = new Mysql_i();
        //Si recibe productos_id consulta a la base de datos y setea las propiedades del productos
        if($categorias_id){
            $datos = $this->mysql->consulta("SELECT * FROM categorias WHERE id = '$categorias_id'");
            $this->descripcion = $datos[0]["Descripcion"];
            $this->categorias_id = $categorias_id;
        }
        
    }
		public function getId()
		{
			return $this->categorias_id;
		}
		public function getDescription()
		{
			return $this->descripcion;
		}
		
		public function getAllCategorias()
		{
			return $this->mysql->consulta("SELECT * FROM categorias");
		}
}
 
?>