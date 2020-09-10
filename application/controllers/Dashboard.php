<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function __construct() {
        parent::__construct();
        if (empty($_SESSION['usuario'])) {
            redirect('/login');
        }
    }
    public function index() {
        if ($_SESSION['usuario']->grupo_id == 1) {
            $ArrayListUusuario = $this->UsuarioModel->get_total_condominio_inner_usuario_condomino();
        } else {
            $ArrayListUusuario = $this->UsuarioModel->get_total_condominio_inner_usuario_condomino($_SESSION['usuario']->id_usuario);
        }
        $this->load->view('dashboard/index', array(
            '_active' => 'sub-menu-1',
            'ArrayListUusuario' => $ArrayListUusuario,
        ));
    }
}