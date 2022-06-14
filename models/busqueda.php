<?php
require_once "generico.php";  
require_once "./../db/db.php";
require_once "clasico.php";
require_once "cristiano.php";  

class busqueda{

    protected static $tabla = 'busqueda';
    protected static $columnasDB = ['id_ser', 'id_usuario'];

    public $id_ser;
    public $id_usuario;


    function añadirBusqueda($Iduser, $idgen){

        $db = new Database();
        $dbconection = $db->connect();

        $query = "insert into busqueda (id_usuario, Id_ser) values ('$Iduser', '$idgen')";
        
        $resultado = $db->querySelect($dbconection, $query);     
           
    }

    function mostrarbusqueda($user){
        $db = new Database();
        $dbconection = $db->connect();
                    
        $query = 'select distinct g.nombre, g.ID, g.rol from busqueda b, sergenerico g, usuario u  where b.id_usuario = u.ID and b.id_ser = g.ID and id_usuario ='.$user.';';
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;
    }


    
    
}