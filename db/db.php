<?php
class Database{
    private $localhost;
    private $username;
    private $password;
    private $bdname;

    

    //esto lo que hace es crear un objeto conexión, esto hay que hacerlo siempre que vaya a 
    //operar en una base de datos. SIEMPRE. 
    function connect(){
        $mysqli = new mysqli("localhost", "root", "", "proyecto"); //quitar el segundo root para quitar la contraseña
        if($mysqli->connect_error){
            die('Error de Conexión (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
        }else{
            return $mysqli;
        }
    }

     /*esta función solo, con hacerla una vez estaría, ya que dentro puedo modificar el tipo de
    de consulta, ya que por parametros le estoy pasando la base de datos con el objeto 
    connection y en $query la consulta */
    function querySelect($bbdd, $query){
        $consulta = $bbdd->query($query);
        //$resultado = $consulta->fetch_assoc();
        //var_dump($consulta);
        //var_dump($resultado);

        //return $resultado;
        return $consulta;
    }  
      

}
  //iniciar session
  session_start();


?>