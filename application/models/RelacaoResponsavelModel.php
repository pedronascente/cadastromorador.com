<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RelacaoResponsavelModel extends Crud_m {

    public $table = 'relacao_responsavel';

    public function __construct() {
        parent::__construct();
    }    
}