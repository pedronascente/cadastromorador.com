<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoUsuarioModel extends Crud_m {

    public $table = 'tipo_usuario';

    public function __construct() {
        parent::__construct();
    }    
}