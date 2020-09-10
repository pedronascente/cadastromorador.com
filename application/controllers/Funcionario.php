<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//namespace Application\Modules\Funcionario\Controlles\Funcionario;
//use Application\Models\Crud_m;
//use Application\Modules\DiaAcesso\Models\DiaAcessoModel;
//use Models\FuncionarioModel;

class Funcionario extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function form_funcionario() {
        $this->load->view('funcionario/form_novo', array(
            '_arrayCheckBoxDiaSemana' => $this->DiaSemanaModel->findAll(),
            //'_arrayCheckBoxDiaSemana' => $this->DiaSemanaModel->findAll(),
        ));
    }
    
    public function delete_site($id) {
        $this->FuncionarioModel->deleteFuncionarioEdependentes($id, $this->DiaAcessoModel);
        redirect("/site", 'location', 301);
    }
    
    public function delete_admin($id) {
        $sessao_DADOS = @$_SESSION['DADOS']; 
        $this->FuncionarioModel->deleteFuncionarioEdependentes($id, $this->DiaAcessoModel);
        redirect("/cliente/".$sessao_DADOS['imovel']->id_imovel."/edit", 'location', 301);
    }

    public function edit($id) {
        $this->load->view('funcionario/form_edit', array(
            '_arrayCheckBoxDiaSemana' => $this->DiaSemanaModel->findAll(),
            '_arrayDiaAcesso' => $this->DiaAcessoModel->getAgenda($id),
            'objetc_funcionario' => $this->FuncionarioModel->findById(['id_funcionario' => $id]),
        ));
    }

    public function save() {
        $array_funcionario = $this->input->post('array_funcionario');
        $array_dia_semana = $this->input->post('array_dia_semana');
        $_rota = $this->input->post('_rota');
        $ultimo_id_funcionario = $this->FuncionarioModel->save($array_funcionario);
        $this->DiaAcessoModel->updateDiaAcesso($array_dia_semana, $ultimo_id_funcionario);        
        if($_rota=='admin'){
                $_rota = "cliente/{$array_funcionario['imovel_id_imovel']}/edit";
        }
        redirect("/{$_rota}", 'location', 301);
    }

    public function update() {
        $array_funcionario = $this->input->post('array_funcionario');
        $array_dia_semana = $this->input->post('array_dia_semana');
        $id_funcionario = $array_funcionario['id_funcionario'];
        $_rota = $this->input->post('_rota');
        $this->FuncionarioModel->update($array_funcionario, "id_funcionario={$id_funcionario}");
        $this->DiaAcessoModel->updateDiaAcesso($array_dia_semana, $id_funcionario);
        if($_rota=='admin'){
                $_rota = "cliente/{$array_funcionario['imovel_id_imovel']}/edit";
        }
        redirect("/{$_rota}", 'location', 301);
    }

}
