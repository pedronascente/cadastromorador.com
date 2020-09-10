<?php
//namespace\Application\Modules\DiaAcesso\Models\DiaAcessoModel;
//use Application\Models\Crud_m;

defined('BASEPATH') OR exit('No direct script access allowed');

class DiaAcessoModel extends Crud_m {

    public $table = 'dia_acesso';

    public function __construct() {
        parent::__construct();
    }
    
    public function save($data_dia_semana) {
        foreach ($data_dia_semana as $dia_semana) {
            parent::save($dia_semana);
        }
    }
    
    public function getAgenda($id) {
        return $this->db->select('_ds.extenso,_ds.abreviado,_ad.dia_semana_id_dia_semana,_ad.horario')
        ->from("$this->table as _ad")
        ->join('funcionario as _f ', ' _ad.funcionario_id_funcionario = _f.id_funcionario')
        ->join('dia_semana as _ds', ' _ad.dia_semana_id_dia_semana =_ds.id_dia_semana ')
        ->where("_f.id_funcionario = {$id}")
        ->get()->result_array();
    }
    
    public function updateDiaAcesso($array_dia_semana, $id_funcionario){
        $data_dia_semana =[];
        foreach ($array_dia_semana as $k => $v){
            if(isset($v['dia_semana_id_dia_semana'])){
                $data_dia_semana[$k]['funcionario_id_funcionario'] = $id_funcionario;
                $data_dia_semana[$k]['dia_semana_id_dia_semana'] = $v['dia_semana_id_dia_semana'];
                $data_dia_semana[$k]['horario'] = $v['horario'];
            }
        }
        $this->delete(['funcionario_id_funcionario'=>$id_funcionario]);
        $this->save($data_dia_semana);
    }
}

