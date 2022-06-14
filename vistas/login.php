<?php    
require_once "./../models/usuario.php";
    session_start();
   
        $user = new usuario();          
      
        //$info = $infoUsuario->fetch_assoc();     
    
    
   
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <script src="sweetalert2.all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Document</title>

    <style>
      .b{
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 20px 20px 20px 20px;
        -webkit-box-shadow: -1px 7px 44px 14px rgba(31,124,159,0.64);
        -moz-box-shadow: -1px 7px 44px 14px rgba(31,124,159,0.64);
        box-shadow: -1px 7px 44px 14px rgba(31,124,159,0.64);  
        

      } 

      .c{
        border-radius: 0px 20px 20px 0px;
        background: rgb(31,124,159);
        background: linear-gradient(0deg, rgba(31,124,159,1) 0%, rgba(34,193,195,1) 100%);
        color: white;        
        font-family: 'Cinzel', serif;
        text-align: center;       
      }

      .d{
        border-radius: 200px 0px 0px 20px; 
      }
      .e{
        align-items: center;
        margin-top: 15%;
       
      }

      .p{
        white-space: pre-line;
        margin-top: 35%;
        font-size: 2.5em;
      }

      .p2{
       font-size: 1em !important;
      }
      .body{
     
        background-size: cover;
        background-image: url('resources/fondo.png');       
      }
      
    </style>

</head>

<body class="body" style="font-family: 'Cinzel', serif;">
  <!--inicio navbar-->
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

            <<div class="row">    
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
    <!--fin navbar-->
 
    
    <div class="b row" style=" height: 60vh; width: 90vh; background-color: white;">
      <!--color blanco-->
      <div class="col e" style=""> 
        <form class="p-4" method="post" action="login.php">
            <input type="hidden" value="1" name="registro">
          <div class="mb-3">
            <label for="exampleDropdownFormEmail2" class="form-label">correo electronico</label>
            <input required type="text" class="form-control" name="mail" placeholder="email@example.com">
          </div>
         
          <div class="mb-3">
            <label for="exampleDropdownFormPassword2" class="form-label">contraseña</label>
            <input required type="password" class="form-control" name="password" placeholder="Password">
          </div>         
          
          <button type="submit" class="btn btn-primary" style="margin-left: 30%;">login</button>
                                     
                  <?php 
                  if(isset($_POST['mail'])){
                     $user->login($_POST['mail'], $_POST['password']);
                  }
                ?> 
        </form>
      </div>
      

      <!--color azul-->
      <div class="col c" style="background-color: #1f7c9f;">
        <p class="p">
          bienvenido a         
            MERAKI          
        </p>
        <p class="p2">indica tu correo y contraseña</p>
        
      </div>
    
    </div>

  
    
  

  
</body>
</html>