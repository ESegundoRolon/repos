<?php
namespace App\Model;

use App\Lib\Database;

class ProductModel
{
    private $db;
    private $table = 'productos';
    private $response;
    
    public function __CONSTRUCT()
    {
        $this->db = Database::StartUp();
    }
    
    public function GetAll()
    {
		
			$result = array();

			$stm = $this->db->prepare("SELECT * FROM $this->table");
			$stm->execute();
            return $stm->fetchAll();
		
  
		
    }
    
    public function Get($id)
    {
			$result = array();

			$stm = $this->db->prepare("SELECT * FROM $this->table WHERE id = ?");
			$stm->execute(array($id));

		    return $stm->fetch();
		  
    }
    
    public function InsertOrUpdate($data)
    {
        
        if(isset($data['id']))
            {
                $sql = "UPDATE $this->table SET 
                            denominacion          = ?, 
                            precio        = ?,
                            codigo          = ?,
                            descripcion            = ?
                        WHERE id = ?";
                
                $this->db->prepare($sql)
                     ->execute(
                        array(
                            $data['denominacion'], 
                            $data['precio'],
                            $data['codigo'],
                            $data['descripcion'],
                            $data["id"]
                        )
                    );
            }
            else
            {
                $sql = "INSERT INTO $this->table
                            (denominacion, precio, codigo, descripcion)
                            VALUES (?,?,?,?)";
                
                $this->db->prepare($sql)
                     ->execute(
                        array(
                            $data['denominacion'], 
                            $data['precio'],
                            $data['codigo'],
                            $data['descripcion']
                        )
                    ); 
                    //var_dump($data['denominacion']); exit;
            }
            
		return true;
		
    }
    
    public function Delete($id)
    {
			$stm = $this->db
			            ->prepare("DELETE FROM $this->table WHERE id = ?");			          

			$stm->execute(array($id));
            
			return true;
    }
}