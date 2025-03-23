<?php 
include_once 'clases\AccesoDatos.php';
include_once 'clases\videojuegos.php';
include_once 'acciones\funciones.php';
$conec = AccesoDatos::getModelo();
session_start();
define('FPAG',10); 
$totaljuegos = $conec->nvideojuegos();

if ($totaljuegos % FPAG == 0 ) {
  $posfin = $totaljuegos - FPAG;
}
else{
    $posfin = $totaljuegos - ($totaljuegos % FPAG);
}

if (!isset($_SESSION["posini"])) {
    $_SESSION["posini"] = 0; 
}
$posaux  = $_SESSION["posini"];





ob_start();
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    
    if (isset($_GET["nav"])) {
        switch ($_GET["nav"]) {

            case 'Primero':
                $posaux = 0;
                break;
            
            case 'Siguiente':
                $posaux += FPAG;
                if ($posaux > $posfin) {
                    $posaux = $posfin; 
                }
                break;
            case 'Anterior':
                $posaux -= FPAG;
                if ($posaux < 0) {
                    $posaux = 0;
                }
                break;
            case 'Ultimo':
                $posaux = $posfin;
                break;
        }
        $_SESSION["posini"] = $posaux;
    }


if (isset($_GET["orden"])) {
    switch ($_GET["orden"]) {
        case 'detalles':
            ob_clean();
           DetallesJuego($_GET["id"]);
            break;
        
        default:
            # code...
            break;
    }
}

    if (ob_get_length()== 0) {    
        $posini = $_SESSION["posini"];
        $juegos  = $conec->obtenerjuegos(FPAG,$posini);
        include_once 'vistas\principal.php';
    }


}














