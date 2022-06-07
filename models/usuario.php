<?php

class usuario{

    protected static $tabla = 'usuario';
    protected static $columnasDB = ['correo', 'nombre', 'contraseña'];

    public $correo;
    public $nombre;
    public $contraseña;
  


    public function __construct($args = []){
        $this->correo = $args['correo'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->definicion = $args['contraseña'] ?? '';
       
    }
}