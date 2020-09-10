<?php
//namespace C:\wamp\www\cadastro\application\models\GrupoUsuario.php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoUsuario extends Crud_m {

    public $table = 'grupo_usuario';

    public function __construct() {
        parent::__construct();
    }    
}