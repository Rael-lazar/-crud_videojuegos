<?php 

class videojuegos{

    private $id;

    private $titulo;

    private $año; 
    private $genero;
    private $consola; 
    private $desarrolladora;
    
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
   
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }

}