<?php
require_once "generico.php";  
require_once "./../db/db.php";
class cristiano extends generico{
    
    protected static $tabla = 'cristiano';
    protected static $columnasDB = ['idpropio', 'categoria', 'historia', 'nacimiento', 'idgen', 'rasgo', 'santoral'];

    public $idpropio;
    public $categoria;
    public $historia;
    public $nacimiento;
    public $idgen;
    public $rasgo;
    public $santoral;


    function mostrarSantos(){        
        //con esto creo un objeto database, con sus parámetros y lo conecto, es un 
        //objeto conexión. 
        $db = new Database();
        $dbconection = $db->connect();

        /*aqui estoy guardando todo lo que se recoge de la consulta y luego 
        yo ya veré que es lo que me quiero quedar */
        $query = "select * from cristiano c, sergenerico g where c.idgen = g.ID order by g.nombre ASC;";
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;  
                     
    }

    function mostrarSanto($id){
        $db = new Database();
        $dbconection = $db->connect();

        $query='select * from cristiano c, sergenerico g where c.idgen = g.ID and c.idgen ='.$id.';';
        
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;  
    }

    function comprobar($String){
        $db = new Database();
        $dbconection = $db->connect();
        $coincidencia = array();

        $array= explode(", ", $String);
       // var_dump($array);
        $numatributos = count($array);
       
        $query='select * from cristiano c, sergenerico g where c.idgen = g.ID and g.rol = 2';   
        
        $resultado = $db->querySelect($dbconection, $query); 
            
        for($i=0; $i<$resultado->num_rows; $i++){
            $fila = $resultado->fetch_assoc();            
            $atributos = json_decode($fila['atributos']);           
            $num =0;       

            foreach ($atributos as $k => $v) {
                for($j=0; $j<count($array); $j++){
                    if(str_contains($v, $array[$j])){
                        $num++;
                    }
                }         
               
            }
                if($num>=$numatributos){
                  array_push($coincidencia, $fila);
              }
                
            
        }

          //  var_dump($coincidencia);
           // var_dump($nummatributos);
          //  var_dump($num);
          
           return $coincidencia;
    }   

   

}

?>