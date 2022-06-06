<?php

class generico{

    protected static $tabla = 'sergenerico';
    protected static $columnasDB = ['id', 'nombre', 'rol', 'atributos', 'variantes'];

    public $id;
    public $nombre;
    public $rol;
    public $atributos;
    public $variantes;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->rol = $args['rol'] ?? '';
        $this->atributos = $args['atributos'] ?? '';
        $this->variantes = $args['variantes'] ?? '';
    }
}