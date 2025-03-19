<?php
    session_start();
    session_destroy();
    $CerroSesion=1;
    header("Location: TiendaAlbumns.php");
    exit();
?>