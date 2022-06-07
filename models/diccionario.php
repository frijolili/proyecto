<?php

class diccionario{

    protected static $tabla = 'diccionario';
    protected static $columnasDB = ['id', 'nombre', 'definicion'];

    public $id;
    public $nombre;
    public $definicion;
  


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->definicion = $args['definicion'] ?? '';
       
    }
}