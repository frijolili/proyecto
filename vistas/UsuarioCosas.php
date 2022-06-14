<?php    
require_once "./../models/usuario.php";
require_once "./../models/cristiano.php";   
require_once "./../models/clasico.php";   
require_once "./../models/busqueda.php";
require_once "./../models/favorito.php";
session_start(); 

//$gen = new generico();
$cris = new cristiano();
$busqueda = new busqueda();
$bus = $busqueda->mostrarbusqueda($_SESSION['usuario']['ID']);

$favorito = new favorito();
$favCris = $favorito->mostarfavCris($_SESSION['usuario']['ID']);
$favClas = $favorito->mostarfavClas($_SESSION['usuario']['ID']);

//$yo = new usuario();

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>Document</title>
    
</head>
<body style="font-family: 'Cinzel', serif;">
        <!--inicio DE NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary mx-auto">
        <div class="container-fluid mx-4">              
            <div class="row">
                <ul class=" col navbar-nav me-auto mb-2 mb-lg-0">                   
                    <li class=" nav-item dropdown"><a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-card-list"  style="font-size: 2em;"></i></a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">    
                            <li><a class="dropdown-item" href="listarGriegos.php">mitología griega</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="ListarCristianos.php">santuario</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="diccionario.php">diccionario</a></li> 
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="registro.php">regístrese</a></li>                                 
                        </ul>
                    </li>                    
                </ul> 
                
                <a class="col navbar-brand text-white align-middle" style="font-size: 2.2em;"  href="index.php">meraki</a>            
            </div> 

            <div class="row">    
                <a class="col p-3 navbar-brand text-black align-middle" style="font-size: 1.5em;" href="UsuarioCosas.php">
                    <?php 
                if(isset($_SESSION['usuario'])){
                  echo ($_SESSION['usuario']['nombre']);
                 // echo('ey');
                }                      
                ?></a>         
              <a class="col navbar-brand text-black align-middle" href="login.php"><i class="bi bi-person-fill dropdown" style="font-size: 2em;"> </i> </a>
              </div>  
                                                                                  
    </nav>  
      
       <!--FIN DE NAVBAR-->     
       <div class="container-fluid position-relative row">
           
           <div id="nombre" class="position-relative top-0 start-0 ms-5 col" style="font-size: 4em;">favoritos </i></div>      
                
                       
           <br> <br> <br>
           <hr>   
           <i id="heart" class="bi bi-x-circle col position-relative top-0 start-0 ms-5" style="font-size: 2em; color:black;" onclick="clickMe()"><span class="align-middle" style="font-size: 0.5em!important; ">cerrar sesión</span></i>

                   
           <br> <br> <br> <br>  
           
           <div class="container-fluid position-relative row mb-4">
               <div class="col-1"></div>
               <div class="col-10" style="font-size: 1.2em;">                    
                   <div class="row text-start fw-bolder" style="font-size: 1.4em;">
                      favoritos griegos
                   </div>
                   <div class="row" style="text-align: justify; font-family:  'Raleway', sans-serif;">
                       &nbsp;&nbsp;&nbsp;
                       <?php 
                        for($i = 0; $i<$favClas->num_rows;$i++){
                            $fila = $favClas->fetch_assoc();                            
                        
                        ?>
                             <span> <a href="clasico.php?id=<?php echo $fila['ID'];?>" style="color: black; text-decoration:none;">
                                         <?php
                                                echo $fila['nombre'];                           
                                                     
                                    ?> </a></span>
                        <?php 
                         }
                         ?> 
                   </div>
                   <br> <br>

                   <div class="row text-start fw-bolder" style="font-size: 1.4em;">
                      favoritos iconografía
                   </div>
                   <div class="row" style="text-align: justify; font-family:  'Raleway', sans-serif;">
                       &nbsp;&nbsp;&nbsp;
                       <?php 
                        for($i = 0; $i<$favCris->num_rows;$i++){
                            $fila = $favCris->fetch_assoc();                            
                        
                        ?>
                             <span> <a href="cristiano.php?id=<?php echo $fila['ID'];?>" style="color: black; text-decoration:none;">
                                         <?php
                                                echo $fila['nombre'];                           
                                                     
                                    ?> </a></span>
                        <?php 
                         }
                         ?>  
                                        
                   </div>
                   <br> <br> 
                   <div class="row text-start fw-bolder" style="font-size: 1.4em;">
                      busquedas recientes 
                   </div>
                   <div class="row" style="text-align: justify; font-family:  'Raleway', sans-serif;">
                       &nbsp;&nbsp;&nbsp;                       
                            <?php 
                                                             
                                for($i = 0; $i<$bus->num_rows;$i++){
                                    $fila = $bus->fetch_assoc();                                                      
                                   
                                    if($fila['rol'] == 2){
                                        ?>   
                                        <span> <a href="cristiano.php?id=<?php echo $fila['ID'];?>" style="color: black; text-decoration:none;">
                                         <?php
                                                echo $fila['nombre'];                           
                                                     
                                    ?> </a></span>
                                       <?php 
                                    }else{
                                        ?>
                                         <span><a href="clasico.php?id=<?php echo $fila['ID'];?>" style="color: black; text-decoration:none;">
                                        <?php
                                            echo $fila['nombre'];                    
                                                     
                                        ?> 
                                     </a></span>
                                    <?php
                                    }
                                }
                            ?>                     
                      
                   </div>
                   
                   <br> <br>                       
                    
                    
                                                    
                 
                  
              
           
           
          
      </div>

      <script>
       function clickMe(){
        //aqui lo que estoy haciendo es redireccionar a una página que solo contendrá codigo PHP ejecutándo funciones 

        location.href = "logout.php"     
}
      </script>             
</body>
</html>

