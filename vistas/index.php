<?php    
require_once "./../models/usuario.php";
//require_once "./../models/usuario.php";
    session_start();   
   
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
    
    <style>
      .imagen{
        width: 100%;
        height: auto;
      }
      @supports(object-fit: cover){
    .box img{
      height: auto;
      object-fit: cover;
      object-position: center center;
    }
}
    .texto{
    font-size: xx-large;
    }
    
    </style>

</head>
<body style="font-family: 'Cinzel', serif; overflow: hidden">
<?php        

                    if(isset($_POST['cristiano'])){
                        require_once "./../models/cristiano.php";
                        $cristiano = new cristiano();
                        $cristiano->comprobar($_POST['atri']);
                        echo("estoy dentro");
                    }                    
                    if(isset($_POST['griego'])){
                        require_once "./../models/clasico.php";
                        $clasico = new clasico();
                        $clasico->comprobar($_POST['atr']);
                        echo("estoy dentro");
                    }
                    
                    
                    ?>

                    
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
       
       <div class="container-fluid position-absolute row">
            <div class="col">
                <img id="griego" class="imagen" src="./../resources/griegoP.PNG" alt="imagen">
                <form action="encontradosjesus.php" style="margin-top: 40%; text-align:center;" method="post">
                    <span class="fs-2">introduce los atributos separados con comas</span>
                    <input type="hidden" name="cristiano" value="1">
                    <input name="atri" type="text">
                    <button type="submit">buscar</button>
                    <i class="bi bi-arrow-left-right"onclick="volver()">volver</i>
                </form>
                <?php 

                ?>
            </div>
            <div id="botones" class="col-2" style="display: block;"> 
                <div class="row align-middle" style="margin-top: 100%; text-align:center;">
                    <span class="fs-2">escoge el tipo de búsqueda</span>
                    <div class="col"><button type="button" class="btn btn-outline-secondary" onclick="griego()">mitología griega</button></div>
                    <div class="col"><button type="button" class="btn btn-outline-secondary" onclick="jesus()">iconografía cristiana</button></div>
                </div>
            </div>
            <div class="col">
                <img id="jesus" class="imagen" src="./../resources/jesusP.PNG" alt="imagen" style="float: right; display: block;">
                <form action="encontradosgriego.php" style="margin-top: 40%; text-align:center;"  method="post">
                    <span class="fs-2">introduce los atributos separados con comas</span>
                    <input type="hidden" name="griego" value="2">
                    <input name="atr" type="text">
                    <button type="submit">buscar</button>
                    <i class="bi bi-arrow-left-right"onclick="volver()">volver</i>
                </form>                
            </div>
        
       </div>
       <script>
            function griego(){
                document.getElementById('jesus').style.display ='none';
                document.getElementById('botones').style.display ='none';
                this.style.display = 'none'
            }
            function jesus(){
                document.getElementById('griego').style.display ='none';
                document.getElementById('botones').style.display ='none';
            }
            function volver(){
                document.getElementById('griego').style.display ='block';
                document.getElementById('botones').style.display ='block';
                document.getElementById('jesus').style.display ='block';
            }
       </script>            
</body>
</html>
 <!--
    <div class="dropdown">
  <button type="button" class="btn  btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
  <i class="bi bi-person-fill dropdown" style="font-size: 1em;"> </i>
                        

                       
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
</div>->
