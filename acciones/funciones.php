<?
include_once 'clases\AccesoDatos.php';





function obtenerlista(){
$conec = $conec = AccesoDatos::getmodelo();
$lista=[];
$lista = $conec->obtenerjuegos();

}

