<?php
///Usuario: @admin
///Contraseña: Quepaso112
    if(isset($_POST['Enviar'])){
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=paginatienda','root','');
        $enunciado=$conexion->prepare("SELECT usuario,contrasena FROM usuario");
        
        $enunciado->setFetchMode(PDO::FETCH_ASSOC);
        $enunciado->execute();

        while($row= $enunciado->fetch()){
            $usuario=$row["usuario"];
            $contra=$row["contrasena"];
        } 
        $usuario2=$_POST['Nombre'];
        $usuario2=filter_var($usuario2, FILTER_SANITIZE_STRING);
        $contraseña=$_POST['Contrasena'];
        $contraseña=filter_var($contraseña, FILTER_SANITIZE_STRING);
        if($usuario==$usuario2 && $contra==$contraseña){
            session_start();       //Antes de iniciar que vamos a usar varibales de sesion. Si no se pone no te deja usar variables de sesion  
           
            header("Location: AgregarProducto.php");
            exit();
        }else{
            echo'<div class="alert alert-danger alert-dismissible alerta">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Inicio de Sesion Denegada </strong> La contraseña y el nombre del usuario no coinciden, intentalo de nuevo 
            </div>';
        }
            
        
    }catch(PDOException $e){
        echo "error".$e->getMessage();
    }
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="Fondo">
         <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                     <img src="fodos_inicioSe/img (1).png " class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="fodos_inicioSe/img (2).png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="fodos_inicioSe/img (3).png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="fodos_inicioSe/img (4).png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="fodos_inicioSe/img (5).png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="fodos_inicioSe/img (6).png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="fodos_inicioSe/img (8).png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>

    <div class="Sesion">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <h1>INICIA SESION</h1>
        <p>Ingresa tu nombre de usuario y contraseña para acceder a la pagina</p>
        <br>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label">NOMBRE DE USUARIO</label>
            <div class="col-sm-7 entrada">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre" name="Nombre">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">CONTRASEÑA</label>
            <div class="col-sm-7 entrada">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" name="Contrasena"> 
            </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-dark btS" name="Enviar">INICIAR SESION</button>
        </div>
        </div>
        
    </form>
    </div>
</body>
</html>