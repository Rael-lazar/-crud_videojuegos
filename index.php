<?php 
include_once 'clases\AccesoDatos.php';
include_once 'clases\videojuegos.php';
$conec = AccesoDatos::getModelo();
$datos = $conec->obtenerjuegos();


if ($_SERVER["REQUEST_METHOD"]=="GET") {
    include_once 'vistas/principal.php';
}














