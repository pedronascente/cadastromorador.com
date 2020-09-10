<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Imovel extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function save() {
        $array_imovel = $this->input->post('array_imovel');
        $_rota = $this->input->post('_rota');
        //Verificar se já existe imovel registrado com o cpf
        $verificar = $this->ImovelModel->verificarExistenciaImovel([
            'cpf_responsavelCadastro' => $array_imovel['cpf_responsavelCadastro'],
            'tipo_imovel_id_tipo_imovel' => $array_imovel['tipo_imovel_id_tipo_imovel'],
            'numero' => $array_imovel['numero'],
        ]);
        if (!empty($verificar)) {
            die('este imovel já consta registrado em nosso Sistema');
        }
        $this->ImovelModel->save($array_imovel);
        if($_rota=='admin'){
            $_rota = "cliente/create";
        }
        redirect("/{$_rota}", 'location', 301);    
    }

    public function edit($id) {
        $this->load->view('imovel/form_edit', array(
            '_active' => 'sub-menu-2',
            '_arraySelectTipoImovel' => $this->TipoImovelModel->findAll(),
            'object_imovel' => $this->ImovelModel->getJoinImovelTipoImovel($id),
        ));
    }

    public function update() {
        $array_imovel = $this->input->post('array_imovel');
        $_rota = $this->input->post('_rota');
        $this->ImovelModel->update($array_imovel, "id_imovel={$array_imovel['id_imovel']}");
        if($_rota=='admin'){
            $_rota = "cliente/{$array_imovel['id_imovel']}/edit";
        }
        redirect("/{$_rota}", 'location', 301);
    }

    public function form_novo() {
        //Recuperar dados do condominio vindo da sessão:
        $token = trim($_SESSION['CONDOMINIO']->token);
        $chave = trim($_SESSION['CHAVEIMOVEL']);
        //Recuperar imovel com o id do condmonio ea chave do imovel
        $objimovel = $this->ImovelModel->findByIdJoinTipoImovel([
            'id_condominio' => $_SESSION['CONDOMINIO']->id_condominio,
            'chave' => $chave
        ]);
        if ($objimovel) {
            $dadosImovel = ['objetoImovel' => $objimovel];
            //Recuperar dados do cliente passando o id do imovel:  
            // $_SESSION['DADOS'] = $this->getTabelasDependentes($objimovel->id_imovel, $objimovel);
        } else {
            $dadosImovel = ['chaveimovel' => $chave];
        }
        $this->load->view('imovel/form_novo', array(
            '_active' => 'sub-menu-2',
            '_arraySelectTipoImovel' => $this->TipoImovelModel->findAll(),
            '_condominio' => $_SESSION['CONDOMINIO'],
            '_imovel' => $dadosImovel,
        ));
    }
}