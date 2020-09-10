<?php

//namespace Application\Modules\Veiculo\Models\VeiculoModel;
//use Models\Crud_m ;

class VeiculoModel extends Crud_m {

    public $table = 'veiculo';
    private $_arrayVeiculo;

    public function __construct() {
        parent::__construct();
    }

    public function saveMultiplos($ArrayDados) {
        $this->_arrayVeiculo = $ArrayDados['arrayVeiculo'];
        $this->_uIdImovel = $ArrayDados['uIdImovel'];
        if ($this->_arrayVeiculo) {
            foreach ($this->_arrayVeiculo as $k => $v) {
                $v['imovel_id_imovel'] = $this->_uIdImovel;
                $uId = parent::save($v);
            }
        }
    }

    public function saveSimples($ArrayDados) {
        $uId = parent::save($ArrayDados);
        return $uId;
    }

    public function getJoinVeiculoImovel($id_imovel) {
        return $this->db->select('_v.id_veiculo, _v.placa,_v.modelo,_v.marca,_v.ano,_v.cor')
                        ->from("{$this->table} as _v")
                        ->join("imovel as _i", '_i.id_imovel = _v.imovel_id_imovel')
                        ->where('_v.imovel_id_imovel', $id_imovel)
                        ->get()->result_array();
    }

}
