
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <script src="db.js"></script>
    <title>Document</title>

    <?php 
    require_once "./../models/cristiano.php";
    require_once "./../models/generico.php";  
    require_once "./../models/busqueda.php"; 
    require_once "./../models/favorito.php";

    $santo = new cristiano(); 
    session_start();
    $favorito = new favorito();
    $fav = $favorito->GetFavorito($_SESSION['usuario']['ID'], $_GET['id']);
    
    $id = $_GET['id'];
    //$idUser = $_SESSION['idUser'];
    $infoSanto = $santo->mostrarSanto($id);   
    $info = $infoSanto->fetch_assoc();
   //var_dump($info);
    $busqueda =new busqueda();
    $bus = $busqueda->añadirBusqueda($_SESSION['usuario']['ID'], $_GET['id']);
    
    $color = false;

    //REQUIRED DB

  ?>
</head>
<body class="fw-bolder" style="font-family: 'Cinzel', serif;">
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
            <div id="nombre" class="position-relative top-0 start-0 ms-5" style="font-size: 4em;"><?php echo $info['nombre'];?></div> 
            <div class="row">
                <div class="col top-0 start-0 ms-5" style="font-size: 2em;"><?php echo $info['rasgo'];?></div> 
                <div class="col-md-1 .offset-md-4" style="font-size: 1.5em;"><?php echo $info['santoral'];?></div>
            </div>                
            <br> <br> <br>
            <hr>
            <div class="col">
                <div class="col top-0 start-0 ms-5" style="font-size: 1.5em;"><?php echo $info['nacimiento'];?></div> 
                <div class="col top-0 start-0 ms-5" style="font-size: 1.5em;"><?php echo $info['categoría'];?></div>
                <i id="heart" class="bi bi-heart col position-relative top-0 start-0 ms-5" style="font-size: 2em; color:<?php 
                            if($fav->num_rows >0){
                                echo('red');
                            }else{
                                echo('black');
                            }
                
                ?>;" onclick="fav()"></i>
            </div> 
            <br> <br> <br> <br>  

            <div class="container-fluid position-relative row mb-4">
                <div class="col-1"></div>
                <div class="col-10" style="font-size: 1.2em;">
                    <div class="row" style="text-align: justify; font-family:  'Raleway', sans-serif;">
                        &nbsp;&nbsp;&nbsp;
                        <?php echo $info['historia'];?>
                    </div>
                    <br> <br>
                    <div class="row bg-primary p-2 text-dark bg-opacity-10" >
                        <div class="col" >
                            <ol type=”A”>atributos posibles
                                <hr>
                                <?php  
                                   $array = json_decode($info['atributos']);  
                                   // var_dump($array);
                                    foreach ($array as $k => $v) {                                   
                
                                ?>
                                <li> 
                                    <?php
                                                                                    
                                               echo $v;                                               
                                           }                                   
                                    ?>
                                 </li>
                                                              
                              </ol>
                        </div> 
                        <div class="col" >
                            <ol type=”A”>variantes iconográficas
                            <hr>
                                <?php  
                                   $array = json_decode($info['variantes']);  
                                   // var_dump($array);
                                    foreach ($array as $k => $v) {                                   
                
                                ?>
                                <li> 
                                    <?php
                                                                                    
                                               echo $v;                                               
                                           }                                   
                                    ?>
                                 </li>
                                                              
                              </ol>
                        </div>                        
                    </div>                    
                </div>
            
                <div class="col-1"></div>
            </div>
               
            
            
           
       </div>
        
<script type="text/javascript">   

   
       function fav(){

        //aqui lo que estoy haciendo es redireccionar a una página que solo contendrá codigo PHP ejecutándo funciones 

         location.href = "fav.php?id=<?php echo $_GET['id'];?>"   
        }
      

</script>
</body>
</html>