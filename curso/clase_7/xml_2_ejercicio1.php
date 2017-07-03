<?php

include("includes/system.ini.php");
$xmlstr = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE Edit_Mensaje SYSTEM "Edit_Mensaje.dtd">
<Productos>
     <Producto>
          <Nombre>
               Producto numero 1
          </Nombre>
          <Descripcion>
               Descripcion 1
          </Descripcion>
          <Codigo>
               SKU 000001
          </Codigo>
          <Precio>
              100
          </Precio>
          
     </Producto>
     <Producto>
          
          <Nombre>
               Producto numero 2
          </Nombre>
          <Descripcion>
               Descripcion 2
          </Descripcion>
          <Codigo>
               SKU 000002
          </Codigo>
          <Precio>
              50
          </Precio>
          
     </Producto>
     <Producto>
          
          <Nombre>
               Producto numero 3
          </Nombre>
          <Descripcion>
               Descripcion 3
          </Descripcion>
          <Codigo>
               SKU 000003 
          </Codigo>
          <Precio>
              25
          </Precio>
          
     </Producto>
</Productos>
XML;

$productos = (array) new SimpleXMLElement($xmlstr);
//var_dump($productos);
foreach($productos as $k=>$v )
{
	//var_dump($v);
	
	foreach($v as $atribute=>$value)
	{
		$value = (array)$value;
		var_dump($atribute);
		var_dump($value);
		//exit;
		$producto = new Productos();
		//var_dump($atributos);
		echo "<br>".$value["Nombre"];
		echo "<br>".$value["Descripcion"];
		echo "<br>".$value["Codigo"];
		echo "<br>".$value["Precio"];
		if($producto->crear($value["Nombre"],$value["Descripcion"],$value["Codigo"],$value["Precio"]))
		{
			echo "<br>Insersion exitosa";
		}else
		{
			echo "<br>Algo fallo";
		}
		
	}
}

?>
