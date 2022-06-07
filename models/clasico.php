<?php

namespace App;

class clasico extends generico{
    
    protected static $tabla = 'clasico';
    protected static $columnasDB = ['id', 'atribuciones', 'aventuras', 'genealogia', 'idgen', 'leyendas', 'veanse'];

    public $idpropio;
    public $atribuciones;
    public $aventuras;
    public $genealogia;
    public $idgen;
    public $leyendas;
    public $veanse;


    public function __construct($args = []){
        $this->idpropio = $args['idpropio'] ?? null;
        $this->atribuciones = $args['atribuciones'] ?? '';
        $this->aventuras = $args['aventuras'] ?? '';
        $this->genealogia = $args['genealogia'] ?? '';
        $this->idgen = $args['idgen'] ?? '';
        $this->leyendas = $args['leyendas'] ?? '';
        $this->veanse = $args['veanse'] ?? '';
    }
}
?>