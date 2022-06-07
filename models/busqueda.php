<?php

class busqueda{

    protected static $tabla = 'busqueda';
    protected static $columnasDB = ['id_ser', 'id_usuario'];

    public $id_ser;
    public $id_usuario;
    


    public function __construct($args = []){
        $this->id_ser = $args['id_ser'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? '';        
    }
}