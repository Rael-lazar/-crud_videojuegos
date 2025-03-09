<?php 
include_once 'clases\AccesoDatos.php';
include_once 'clases\videojuegos.php';
$conec = AccesoDatos::getModelo();
$datos = $conec->obtenerjuegos();

















