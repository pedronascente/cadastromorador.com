<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//namespace Application\Modules\DiaAcesso\Models\DiaAcesso;
//use Application\Modules\Funcionario\Models\FuncionarioModel;
//use Application\Models\Crud_m;
//use Models\DiaAcessoModel;

class DiaAcesso extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function save() {
        $dataArray = $this->input->post('array_funcionario');
        if (!$dataArray) {
            die("<b>Error: Nenhum registro foi enviado .</b>");
        }
        $_rota_redirecionar = isset($dataArray[0]['_rota']) ? $dataArray[0]['_rota'] : NULL;
        if ($dataArray){
            unset($dataArray[0]['_rota']);
        }
        $this->DiaAcessoModel->save($dataArray);
        redirect("{$_rota_redirecionar}", 'location', 301);
    }

    public function delete($id) {
        if ($this->DiaAcessoModel->delete(['id' => $id])) {
            $_return = true;
        } else {
            $_return = false;
        }
        die(
            json_encode(
                    ['type' => $_return]
            )
        );
    }

}
