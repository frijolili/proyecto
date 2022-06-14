<?php

require_once "generico.php";  
require_once "./../db/db.php";

class clasico extends generico{
    
    protected static $tabla = 'clasico';
    protected static $columnasDB = ['id', 'atribuciones', 'aventuras', 'genealogia', 'idgen', 'leyendas', 'veanse'];

    public $idpropio;
    public $atribuciones;
    public $aventuras;
    public $genealogia;
    public $idgen;
    public $leyendas;
    public $veanse;


   
    function mostrardioses(){        
        //con esto creo un objeto database, con sus parámetros y lo conecto, es un 
        //objeto conexión. 
        $db = new Database();
        $dbconection = $db->connect();

        /*aqui estoy guardando todo lo que se recoge de la consulta y luego 
        yo ya veré que es lo que me quiero quedar */
        $query = "select * from clasico c, sergenerico g where c.idgen = g.ID order by g.nombre ASC;";
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;  
                     
    }

    function mostrardios($id){
        $db = new Database();
        $dbconection = $db->connect();

        $query='select * from clasico c, sergenerico g where c.idgen = g.ID and c.idgen ='.$id.';';
        
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;  
    }

    function comprobar($String){
        $db = new Database();
        $dbconection = $db->connect();
        $coincidencia = array();

        $array= explode(", ", $String);
       
        $numatributos = count($array);

        $query='select * from clasico c, sergenerico g where c.idgen = g.ID';   
        
        $resultado = $db->querySelect($dbconection, $query); 

        for($i=0; $i<$resultado->num_rows; $i++){
            $fila = $resultado->fetch_assoc(); 
            $atributos = json_decode($fila['atributos']);
            $num =0;
           
            foreach ($atributos as $k => $v) {
                for($j=0; $j<count($array); $j++){
                    //str_contains($v, $array[$j]
                    if(str_contains($v, $array[$j])){
                        $num++;
                    }
                }
            }
                if($num >= $numatributos){
                  array_push($coincidencia, $fila);
                }
        }
           // echo($numatributos);
            //echo($coincidencia);
           return $coincidencia;
    }   

}
?>