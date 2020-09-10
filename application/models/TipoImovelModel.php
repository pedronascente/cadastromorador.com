<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoImovelModel extends Crud_m {

    public $table = 'tipo_imovel';

    public function __construct() {
        parent::__construct();
    }
    
}