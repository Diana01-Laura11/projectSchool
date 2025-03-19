
<?php
    $dataIDs=array();
    $nombres=array();
    $autores=array();
    $links=array();
    $preciosA=array();
    $preciosB=array();
    try{
        $conexion=new PDO('mysql:host=localhost;dbname=paginatienda','root','');
        $enunciado=$conexion->prepare("SELECT * FROM albumns");
        
        $enunciado->setFetchMode(PDO::FETCH_ASSOC);
        $enunciado->execute();
        $p=0;
        
        while($row= $enunciado->fetch()){
            
            $dataIDs[$p]=$row["id_album"];
            $nombres[$p]=$row["nombre_album"];
            $autores[$p]=$row["autor_album"];
            $links[$p]=$row["img_album"];
            $preciosA[$p]='$'.$row["precioA_album"];
            $preciosB[$p]='$'.$row["precioB_album"];
            $p=$p+1;
            
        }
        }catch(PDOException $e){
        echo "error".$e->getMessage();
        }
        
        function tarjetas($dataIDs,$nombres,$autores,$preciosA,$preciosB,$links){
            $i=0;
            for($i=0;$i<sizeof($dataIDs);$i=$i+1){
                    
                if(($i+1)==1){
                    echo '<div class="row"> <div class="four columns">
                        <div class="card">
                            <img src="'.$links[$i].'" class="imagen-curso u-full-width">
                            <div class="info-card">
                                <h2 class="titulo">'.$nombres[$i].'</h2>
                                <p>'.$autores[$i].'</p>
                                <p class="precio">'.$preciosA[$i].' <span class="u-pull-right ">'.$preciosB[$i].'</span></p>
                                <a href="#" class="u-full-width button input agregar-carrito" data-id="'.$dataIDs[$i].'">Agregar Al Carrito</a>
                            </div>
                        </div>
                        </div>
                    '; 
                    
                }
                else if($i%3==0){
                    echo '</div>';
                    echo '<div class="row"> <div class="four columns">
                        <div class="card">
                            <img src="'.$links[$i].'" class="imagen-curso u-full-width">
                            <div class="info-card">
                                <h2 class="titulo">'.$nombres[$i].'</h2>
                                <p>'.$autores[$i].'</p>
                                <p class="precio">'.$preciosA[$i].' <span class="u-pull-right ">'.$preciosB[$i].'</span></p>
                                <a href="#" class="u-full-width button input agregar-carrito" data-id="'.$dataIDs[$i].'">Agregar Al Carrito</a>
                            </div>
                        </div>
                        </div>
                    ';
                }else{
                    echo '<div class="four columns">
                        <div class="card">
                            <img src="'.$links[$i].'" class="imagen-curso u-full-width">
                            <div class="info-card">
                                <h2 class="titulo">'.$nombres[$i].'</h2>
                                <p>'.$autores[$i].'</p>
                                <p class="precio">'.$preciosA[$i].' <span class="u-pull-right ">'.$preciosB[$i].'</span></p>
                                <a href="#" class="u-full-width button input agregar-carrito" data-id="'.$dataIDs[$i].'">Agregar Al Carrito</a>
                            </div>
                        </div>
                        </div>';
                    
                
                }
                }
        }
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="estilo.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="two columns ">
                <h1>|MAGIC |SHOP</h1>
            </div>
            
            <?php
                session_start();
                 if($_SESSION){
                    echo '
                    <div class="two columns  u-pull-right margen-boton">
                    <center>
                        <a href="cerrasesion.php" class="boton1">CERRAR SESION 
                        </a>
                    </center>
                 </div>
                        <div class="two columns  u-pull-right margen-boton">
                        <center>
                            <a href="AgregarProducto.php" class="boton1">AGREGAR UN PRODUCTO
                            </a>
                        </center>
                     </div>';
                    }else{
                        echo '
                        <div class="two columns  u-pull-right margen-boton">
                        <center>
                            <a href="inicioSesion.php" class="boton1">INICIAR SESION
                            </a>
                        </center>
                        </div>';
                    }
            ?>
            
            <div class="two columns u-pull-right">
                <ul>
                    <li class="submenu ">
                            <img src="img/carrito.jpg" id="img-carrito" width="50px">
                            <div id="carrito">
                                    
                                    <table id="lista-carrito" class="u-full-width">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="datos">
                                        </tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                            </div>
                    </li>
                </ul>
            </div>
            
        </div> 
    </div>
    </header>


    <div id="hero">
        <div class="container">
            <div class="row">
                    <div class="six columns">
                        <div class="contenido-hero">
                                <h2 id="colornegro"> Albumnes de Bangtan</h2>
                                <p id="colornegro">Busca en nuestra Magic Shop cualquier album</p>
                                <form action="#" id="busqueda" method="post" class="formulario">
                                    <input class="u-full-width" type="text" placeholder="Buscar albumn..." id="buscador">
                                    <input type="submit" id="submit-buscador" class="submit-buscador">
                                </form>
                        </div>
                    </div>
            </div> 
        </div>
    </div>


    </div>

    <div class="lista-cursos" class="container">
        <h1 id="encabezado" class="encabezado">/ALBUMNES</h1>
            <?php
                tarjetas($dataIDs,$nombres,$autores,$preciosA,$preciosB,$links);
            ?>
    </div>  

    <footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                    <div class="four columns">
                            <nav id="principal" class="menu">
                                <a class="enlace" href="#">______ENVIOS</a>
                                <a class="enlace" href="#">MÉXICO</a>
                                <a class="enlace" href="#">ARGENTINA</a>
                                <a class="enlace" href="#">COLOMBIA</a>
                                <a class="enlace" href="#">CHILE</a>
                            </nav>
                    </div>
                    <div class="four columns">
                            <nav id="secundaria" class="menu">
                                <a class="enlace" href="#">¿QUIENES SOMOS?</a>
                                <a class="enlace" href="#">EQUIPO</a>
                                <a class="enlace" href="#">BLOG</a>
                            </nav>
                    </div>
            </div>
        </div>
    </footer>

    <script src="js/app1.js"></script>

</body>
</html>