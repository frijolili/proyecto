<?php
require_once "./../db/db.php";
class favorito{

    protected static $tabla = 'busqueda';
    protected static $columnasDB = ['id_ser', 'id_usuario'];

    public $id_ser;
    public $id_usuario;
    

    function cambiarFav($Iduser, $idgen){

        $db = new Database();        
        $dbconection = $db->connect();

        $query ='select * from favorito where id_usuario ='.$Iduser.';';
        $resultado = $db->querySelect($dbconection, $query); 
       
        if($resultado->num_rows == 0){
            $query1 = "insert into favorito (id_usuario, Id_ser) values ('.$Iduser.', '.$idgen.')";
            $resultado1 = $db->querySelect($dbconection, $query1);
            return true;
        }else{

        for($i = 0; $i<$resultado->num_rows;$i++){
            $fila = $resultado->fetch_assoc();  
                if($fila['id_ser'] == $idgen){
                $query2 = 'DELETE FROM favorito where id_ser ='. $idgen.';';
                $resultado1 = $db->querySelect($dbconection, $query2);               
                 return true;  
                }          
        } 
            $query1 = "insert into favorito (id_usuario, Id_ser) values ('.$Iduser.', '.$idgen.')";
            $resultado1 = $db->querySelect($dbconection, $query1);
            return true;      
    }
    }

    

    function mostarfavCris($user){
        $db = new Database();
        $dbconection = $db->connect();       
        $query =  'select distinct g.nombre, g.ID, g.rol from favorito f, sergenerico g, usuario u  where f.id_usuario = u.ID and f.id_ser = g.ID and id_usuario ='.$user.' and g.rol = 2';
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;
    }
    function mostarfavClas($user){
        $db = new Database();
        $dbconection = $db->connect();       
        $query =  'select distinct g.nombre, g.ID, g.rol from favorito f, sergenerico g, usuario u  where f.id_usuario = u.ID and f.id_ser = g.ID and id_usuario ='.$user.' and g.rol = 1';
        $resultado = $db->querySelect($dbconection, $query);     
                return $resultado;
    }

    function GetFavorito($user, $ser){
        $db = new Database();
        $dbconection = $db->connect(); 

        $query = 'select * from favorito where id_ser ='.$ser.' and id_usuario = '.$user.';';        
        $resultado = $db->querySelect($dbconection, $query);     
        return $resultado;


    }

    
  
}