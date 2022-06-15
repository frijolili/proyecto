<?php    
require_once "./../models/cristiano.php";
require_once "./../models/generico.php"; 
    session_start();  
    $gen = new generico();
    $cris = new cristiano();
    $santos = $cris->mostrarSantos();

   
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <p class="col p-3 align-middle" style="font-size: 1.5em;">
                    <?php 
                if(isset($_SESSION['usuario'])){
                  echo ($_SESSION['usuario']['nombre']);
                 // echo('ey');
                }

                      
                ?></p>         
              <a class="col navbar-brand text-black align-middle" href="login.php"><i class="bi bi-person-fill dropdown" style="font-size: 2em;"> </i> </a>
              </div>  
                                                                                  
    </nav>    
       <!--FIN DE NAVBAR-->

       <div class="container-fluid position-relative">
        <div class="position-absolute top-0 start-50 translate-middle-x" style="font-size: 4em;"> santuario</div>
       
        <br> <br> <br> <br>
        <hr>
           <div class="position-absolute mt-1 start-50 translate-middle-x">
            <ul class="list-group list-group-flush">                              
                    <?php  
                        for($i = 0; $i<$santos->num_rows;$i++){
                            $fila = $santos->fetch_assoc();  
                          //  var_dump($fila) 
                                                 
                    ?>
                    <li id="<?php echo $fila['idgen'];?>" class="list-group-item">  
                    
                    <h1>
                        <a href="cristiano.php?id=<?php echo $fila['idgen'];?>" style="color: black; text-decoration:none;"> 
                            <?php
                                 echo $fila['nombre'];                        
                                                     
                            ?> 
                        </a>                                     
                                         
                    </h1>
                    <?php                                
                    }
                    ?>                   
                </li>           
                  
              </ul>
           </div>
       </div>
       

      

      
    <!--  
     <dropdown del icono 

    <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
    Dropdown form
  </button>
  <form class="dropdown-menu p-4">
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
    </div>
    <div class="mb-3">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dropdownCheck2">
        <label class="form-check-label" for="dropdownCheck2">
          Remember me
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
</div>

        
<script type="text/javascript">
    
    function def(){
        Swal.fire('?php                        
                        echo $fila['definicion']
                    ?>')
        
   if(document.getElementById('definicion').style.display =='none'){
            document.getElementById('definicion').style.display = 'block';
        }else{
            document.getElementById('definicion').style.display = 'none';  
        }
    
    }

</script>-->
</body>
</html>

