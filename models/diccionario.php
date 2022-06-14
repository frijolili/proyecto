<?php
require_once "./../db/db.php";
class diccionario{

    protected static $tabla = 'diccionario';
    protected static $columnasDB = ['id', 'nombre', 'definicion'];

    public $id;
    public $nombre;
    public $definicion;
  

    function mostrarpalabra(){
        
        //con esto creo un objeto database, con sus parámetros y lo conecto, es un 
        //objeto conexión. 
        $db = new Database();
        $dbconection = $db->connect();

        /*aqui estoy guardando todo lo que se recoge de la consulta y luego 
        yo ya veré que es lo que me quiero quedar */
        $query = "select * from diccionario order by nombre asc";
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;  
                     
    }
    
}