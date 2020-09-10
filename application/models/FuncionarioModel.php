<?php
//use Application\Models\Crud_m;
//use Models\FuncionarioModel;
defined('BASEPATH') OR exit('No direct script access allowed');

class FuncionarioModel extends Crud_m {

    public $table = 'funcionario';
    public $_arrayAgendar;
    public $_arrayFuncionario;
    public $_uIdImovel;
    public $_DiaAcessoModel;

    public function __construct() {
        parent::__construct();
    }

    public function deleteFuncionarioEdependentes($id, $DiaAcessoModel) {
        $this->_DiaAcessoModel = $DiaAcessoModel;
        parent::delete(['id_funcionario' => $id]);
        $this->_DiaAcessoModel->delete(['funcionario_id_funcionario' => $id]);
    }

    public function getJoinFuncionarioImovel($id) {
        return $this->db->select('
            _f.tipo_servico,
            _f.id_funcionario,
            _f.imovel_id_imovel,  
            _f.nome, 
            _f.telefone, 
            _f.rg_cpf,
            _f.obs,
            _f.rg_funcionario,
            _f.cpf_funcionario'
        )
        ->from("{$this->table} as _f")
        ->join("imovel as _i", '_i.id_imovel = _f.imovel_id_imovel')
        ->where('_f.imovel_id_imovel', $id)
        ->get()->result_array();
    }
    
    public function get_funcionario($id_condominio) {
        $funcionario = "SELECT 
        _f.`nome` AS 'Nome',
        _f.`cpf_funcionario`,
        _f.`rg_funcionario`,
        _f.`telefone` AS 'Telefone1',
        _i.`numero`AS 'Apartamento',
        _f.`obs` AS 'Observacoes',
        _f.`tipo_servico` AS 'Departamento',
        _f.rg_funcionario,
        _f.cpf_funcionario
        FROM funcionario AS _f
        INNER JOIN `imovel`AS _i ON _i.`id_imovel` = _f.`imovel_id_imovel`
        INNER JOIN condominio AS _c ON _c.`id_condominio` = _i.`condominio_id_condominio` 
        WHERE _c.`id_condominio` ={$id_condominio}";
        $query = $this->db->query($funcionario);
        $ret = $query->result_array();
        for ($i = 0; $i < count($ret); $i++):
            $ret[$i]['Tipo'] = 1;
        endfor;
        return $ret;
    }
}