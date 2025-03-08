<?php 
 include_once 'configuraciones\config.php';
class AccesoDatos{

private static $modelo = null; 

private $dbh  = null; 

private $num_videojuegos;

private $stmt_obtener_juegos;

private $stmt_obtener_juego;

private $stmt_borrar_juego;

private $stmt_editar_juego;

private $stmt_añadir_juego;

public static function getmodelo(){

    if (self::$modelo ==null) {
        self::$modelo = new AccesoDatos();
    }
    return self::$modelo;
}

public function __construct(){
try {
    $dsn  = "mysql:host=".SERVER_DB.";dbname=".DATABASE."" ;
    $this->dbh = new PDO($dsn,DB_USER,DB_PASSWD);
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $this->dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
} catch (\Throwable $th) {
    echo "error al acceder a la base de datos".$th->getMessage();
}
$this->dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
try {
   $this->stmt_obtener_juegos = $this->dbh->prepare("SELECT * FROM videojuegos");
   $this->stmt_obtener_juego = $this->dbh->prepare("SELECT * FROm videojuegos where id = ? ");
   $this->stmt_borrar_juego = $this->dbh->prepare("DELETE FROM videojuegos where id = ? ");
   $this->stmt_editar_juego = $this->dbh->prepare("UPDATE videojuegos SET titulo = ?, año = ?, genero = ?, consola = ?, desarrolladora = ? where id = ? ");
   $this->stmt_añadir_juego = $this->dbh->prepare("INSERT INTO videojuegos (titulo, año, genero, consola, desarrolladora) VALUES (?,?,?,?,?)");
   $this->num_videojuegos = $this->dbh->prepare("SELECT COUNT(id) FROM videojuegos");
   
} catch (\Throwable $th) {
    echo "error al montar las sentencias fck".$th->getMessage();
}
}

function nvideojuegos(){
    $numero = $this->num_videojuegos->execute();
    return $numero;
}

function obtenerjuegos(){
    $videojuegos = [];
    $this->stmt_obtener_juegos->setFetchMode(PDO::FETCH_ASSOC);
    $this->stmt_obtener_juegos->execute();
    $videojuegos = $this->stmt_obtener_juegos->fetchAll();
    return $videojuegos;
}

function obtenerjuego($id){
    $videojuego = "" ;
    $this->stmt_obtener_juego->bindParam(1,$id);
    $this->stmt_obtener_juego->setFetchMode(PDO::FETCH_ASSOC);
    $this->stmt_obtener_juego->execute();
    $videojuego = $this->stmt_obtener_juego->fetch();
    return $videojuego;
}

function borrarjuego($id){
   $this->stmt_borrar_juego->bindParam(1,$id);
   if ( $this->stmt_borrar_juego->execute()) {
    return true;
   }
   return false;


}

function editarjuego($id,$titulo,$año,$genero,$consola,$desarrolladora){
    $this->stmt_editar_juego->bindParam(1,$titulo);
    $this->stmt_editar_juego->bindParam(2,$año);
    $this->stmt_editar_juego->bindParam(3,$genero);
    $this->stmt_editar_juego->bindParam(4,$consola);
    $this->stmt_editar_juego->bindParam(5,$desarrolladora);
    $this->stmt_editar_juego->bindParam(6,$id);
    if ( $this->stmt_editar_juego->execute()) {
     return true;
    }
    return false;
 
 
 }

 function añadirjuego($titulo,$año,$genero,$consola,$desarrolladora){
    $this->stmt_editar_juego->bindParam(1,$titulo);
    $this->stmt_editar_juego->bindParam(2,$año);
    $this->stmt_editar_juego->bindParam(3,$genero);
    $this->stmt_editar_juego->bindParam(4,$consola);
    $this->stmt_editar_juego->bindParam(5,$desarrolladora);
    if ( $this->stmt_editar_juego->execute()) {
     return true;
    }
    return false;
 
 
 }





}

