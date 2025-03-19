<?php
//Utilizando interrogantes para los valores 
//Pagina para encontrar las fotos de albumns de bts: https://ibighit.com/bts/eng/discography/
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=paginatienda','root','');
        $enunciado=$conexion->prepare("INSERT INTO albumns(nombre_album,autor_album,img_album,precioA_album,precioB_album) values (?,?,?,?,?)");
        if(isset($_POST['Enviar'])){
            $Producto=$_POST['Nombre'];
            $Producto=filter_var($Producto, FILTER_SANITIZE_STRING);
            $Autor=$_POST['Autor'];
            $Autor=filter_var($Autor, FILTER_SANITIZE_STRING);
            $Link=$_POST['Img'];
            $Link=filter_var($Link, FILTER_SANITIZE_STRING);
            $PrecioA=$_POST['PrecioA'];
            $PrecioA=filter_var($PrecioA, FILTER_SANITIZE_STRING);
            $PrecioB=$_POST['PrecioB'];
            $PrecioB=filter_var($PrecioB, FILTER_SANITIZE_STRING);
            $enunciado->bindParam(1,$Producto);
            $enunciado->bindParam(2,$Autor);
            $enunciado->bindParam(3,$Link);
            $enunciado->bindParam(4,$PrecioA);
            $enunciado->bindParam(5,$PrecioB);
            $enunciado->execute();
            header("Location: http://localhost/php/PracticaFinal/TiendaAlbumns.php");
            exit();
    }catch(PDOException $e){
        echo "error".$e->getMessage();
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
        <h1>AGREGA UN PRODUCTO</h1>
        <p>Ingresa los datos del producto para agregarlo a la pagina </p>
        <br>
        <div class="form-group row">
            <label for="Nombre" class="col-sm-4 col-form-label">NOMBRE DEL PRODUCTO</label>
            <div class="col-sm-7 entrada">
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="Autor" class="col-sm-4 col-form-label">AUTOR</label>
            <div class="col-sm-7 entrada">
                <input type="text" class="form-control" id="Autor" placeholder="Autor" name="Autor">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="Img" class="col-sm-4 col-form-label">LINK DE LA IMAGEN</label>
            <div class="col-sm-7 entrada">
                <input type="text" class="form-control" id="Img" placeholder="Link" name="Img">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="PrecioA" class="col-sm-4 col-form-label">PRECIO ANTERIOR</label>
            <div class="col-sm-7 entrada">
                <input type="text" class="form-control" id="PrecioA" placeholder="Precio Anterior" name="PrecioA">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="PrecioB" class="col-sm-4 col-form-label">PRECIO ACTUAL</label>
            <div class="col-sm-7 entrada">
                <input type="text" class="form-control" id="PrecioB" placeholder="Precio Actual" name="PrecioB">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-sm-4">
                <input type="submit" class="btn btn-dark btS" name="Enviar" id="Enviar" value="AGREGAR">
        </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-sm-4">
                <input type="submit" class="btn btn-dark" name="IrPp" id="IrPp" value="Ir a la página principal">
        </div>
        </div>
    </form>
    </div>
</body>
</html>