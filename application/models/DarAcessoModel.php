<?php
//namespace C:\wamp\www\cadastro\application\models\DarAcessoModel.php
defined('BASEPATH') OR exit('No direct script access allowed');

class DarAcessoModel extends Crud_m {

    public $table = 'dar_acesso';

    public function __construct() {
        parent::__construct();
    }

    public function save($data) {
        $data_dar_acesso = null;
        $n_registro_data = count($data);
        for ($i = 0; $i < $n_registro_data; $i++) {
            foreach ($data[$i]['acesso'] as $k => $v) {
                $data_dar_acesso[$i][$k]['acesso_id_acesso'] = $v;
                $data_dar_acesso[$i][$k]['usuario_id_usuario'] = $data[$i]['usuario_id_usuario'];
            }
        }
        for ($o = 0; $o < count($data_dar_acesso); $o++) {
            foreach ($data_dar_acesso[$o] as $k => $v) {
                $aaaaaaaa[] = $v;
            }
        }
        foreach ($aaaaaaaa as $acesso) {
            parent::save($acesso);
        }
    }

    public function get_join_acesso_usuario($arrayColunaValor) {
        $this->db->select('_a.id_acesso,_a.descricao')
                ->from("{$this->table} AS _dar")
                ->join("usuario AS _u", " ON _u.id_usuario = _dar.usuario_id_usuario")
                ->join("acesso AS _a", "_a.id_acesso = _dar.acesso_id_acesso")
                ->where($arrayColunaValor);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function update_acesso($array_acesso) {
        $this->delete(['usuario_id_usuario' => $array_acesso[0]['usuario_id_usuario']]);
        $this->save($array_acesso);
    }

}