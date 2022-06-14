<?php 
require_once "./../db/db.php";
class usuario{

    protected static $tabla = 'usuario';
    protected static $columnasDB = ['correo', 'nombre', 'contraseña'];

    public $correo;
    public $nombre;
    public $contraseña;
  

    function cerrarsesion(){
        
        session_start();
        session_destroy(); // destruyo la sesión 
        echo'
        <script type="text/javascript">
            location.href = "index.php"
        </script>';      
       

    }

    function añadir($correo, $nombre, $contraseña){
        $db = new Database();
        $dbconection = $db->connect();

        $query = "insert into usuario (correo, nombre, contraseña) values ( '$correo', '$nombre', '$contraseña')";

        try{
            $resultado = $dbconection->query($query);
            echo '<script language="javascript">alert("se ha registrado correctamente");</script>';
            echo '
            <script type="text/javascript">
                location.href = "index.php"
            </script>'; 
            return $resultado;  
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            echo '<script language="javascript">alert("el correo ya existe");</script>';
            echo '
            <script type="text/javascript">
                location.href = "registro.php"
            </script>'; 
        }
    }


    function login($correo, $contraseña){
        $db = new Database();
        $dbconection = $db->connect();

        $query="SELECT * FROM usuario where correo='".$correo."'";        
        
        $resultado = $db->querySelect($dbconection, $query); 
        $info = $resultado->fetch_assoc();            
       
        if($info == null){
            echo '<script language="javascript">alert("el usuario no existe");</script>';

        }else{
            if( $contraseña == $info['contraseña']){                
                $_SESSION['usuario'] = $info;
                echo '
            <script type="text/javascript">
                location.href = "index.php"
            </script>';
            }else{
                echo '<script language="javascript">alert("contraseña incorrecta");</script>'; 
            }
        }


               
    }

    


}