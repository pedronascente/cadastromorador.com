<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//namespace Application\Modules\Veiculo\Controlles\Veiculo;
//use Application\Modules\Veiculo\Models\VeiculoModel;
//use Models\Crud_m;

class Veiculo extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function form_veiculo() {
        $this->load->view('veiculo/form_novo', array(
        ));
    }

    public function save() {
        $array_veiculo = $this->input->post('array_veiculo');
        $array_veiculo['placa'] = strtoupper($array_veiculo['placa']);
        $_rota = $this->input->post('_rota');
        $this->VeiculoModel->save($array_veiculo);
        if ($_rota == 'admin') {
            $_rota = "cliente/{$array_veiculo['imovel_id_imovel']}/edit";
        }
        redirect("/{$_rota}", 'location', 301);
    }

    public function edit($id) {
        if (!$id) {
            redirect("/logoff", 'location', 301);
        }
        $this->load->view('veiculo/form_edit', array(
            'objetc_veiculo' => $this->VeiculoModel->findById(['id_veiculo' => $id]),
        ));
    }

    public function update() {
        $array_veiculo = $this->input->post('array_veiculo');
        $array_veiculo['placa'] = strtoupper($array_veiculo['placa']);
        $id_veiculo = $array_veiculo['id_veiculo'];
        $_rota = $this->input->post('_rota');
        $this->VeiculoModel->update($array_veiculo, ['id_veiculo' => $id_veiculo]);
        if ($_rota == 'admin') {
            $_rota = "cliente/{$array_veiculo['imovel_id_imovel']}/edit";
        }
        redirect("/{$_rota}", 'location', 301);
    }

    public function delete_site($id) {
        $this->VeiculoModel->delete(['id_veiculo' => $id]);
        redirect("/site", 'location', 301);
    }

    public function delete_admin($id) {
        if (!$id) {
            redirect("/logoff", 'location', 301);
        }

        $sessao_DADOS = @$_SESSION['DADOS'];
        $this->VeiculoModel->delete(['id_veiculo' => $id]);
        redirect("/cliente/" . $sessao_DADOS['imovel']->id_imovel . "/edit", 'location', 301);
    }

}
