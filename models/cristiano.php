<?php

namespace App;

class clasico extends generico{
    
    protected static $tabla = 'cristiano';
    protected static $columnasDB = ['idpropio', 'categoria', 'historia', 'nacimiento', 'idgen', 'rasgo', 'santoral'];

    public $idpropio;
    public $categoria;
    public $historia;
    public $nacimiento;
    public $idgen;
    public $rasgo;
    public $santoral;


    public function __construct($args = []){
        $this->idpropio = $args['idpropio'] ?? null;
        $this->categoria = $args['categoria'] ?? '';
        $this->historia = $args['historia'] ?? '';
        $this->nacimiento = $args['nacimiento'] ?? '';
        $this->idgen = $args['idgen'] ?? '';
        $this->rasgo = $args['rasgo'] ?? '';
        $this->santoral = $args['santoral'] ?? '';
    }
}
?>