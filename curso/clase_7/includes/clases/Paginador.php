<?php
class Paginador {

    public function __construct(){
    
    }   
    
    public function paginas($total_resultados,$pagina_actual = 1,$resultados_x_pagina=1){
        $resultados_x_pagina = $resultados_x_pagina; 
        
        
        if(!$total_resultados or $total_resultados<=$resultados_x_pagina){
            /** NO MUESTRO PAGINAS **/
            return null;
        }
        $paginador_ventada = 1;
        /** DEFINIENDO EL PAGINADOR **/
        $total_paginas = ceil($total_resultados / $resultados_x_pagina); /** PAGINAS A MOSTRAR **/
        $primera = $pagina_actual;
        $ultima = $total_paginas;
        
        if($primera==1){
            $primera = 2;
        }
        

        /** MUESTRO LA PRIMER PAGINA SIEMPRE **/    
        $paginas[1]="<a href='?pagina=1'>1</a>"; 
        
        
           
        /** MUESTRO LAS PAGINAS INTERMEDIAS **/ 
        for($i=$primera;($i<=$total_paginas);$i++){

           $paginas[$i]="<a href='?pagina=".$i."'>".$i."</a>"; 
        }
        return $paginas;        
  

    }
    
}
?>