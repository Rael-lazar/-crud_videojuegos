<?php
include_once 'clases\AccesoDatos.php';

function BorrarJuego($id){
$db = AccesoDatos::getmodelo();
$db->borrarjuego($id);
}

function DetallesJuego($id){
    $db = AccesoDatos::getmodelo();
    $juego  = $db->obtenerjuego($id);
    include_once 'vistas\Detalles.php';
}

function AñadirJuego($titulo,$año,$genero,$consola,$desarrolladora){
    $db = AccesoDatos::getmodelo();
    if ($db->añadirjuego($titulo,$año,$genero,$consola,$desarrolladora)) {
        $msg = "juego añadido correctamente"; 
    }
    else{
        $msg = "error al añadir el juego";
    } 
    include_once 'vistas\principal.php';

}