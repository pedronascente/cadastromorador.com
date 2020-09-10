<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CondominioModel extends Crud_m {

    public $table = 'condominio';

    public function __construct() {
        parent::__construct();
    }

    public function findByIdJoin($where, $campos) {
        $this->db->select("{$campos}")
                ->from($this->table)
                ->join('usuario', 'usuario.id_usuario = condominio.id_usuario', 'left')
                ->where($where);
        $query = $this->db->get()->row_object();
        return $query;
    }

    public function findByIdJoinImovel($where, $campos) {
        $this->db->select("{$campos}")
                ->from($this->table)
                ->join('imovel', 'imovel.condominio_id_condominio = condominio.id_condominio')
                ->join('tipo_imovel', 'tipo_imovel.id_tipo_imovel = imovel.tipo_imovel_id_tipo_imovel')
                ->where($where)
                ->group_by('tipo_imovel.descricao')
                ->order_by('tipo_imovel.descricao', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getCondominioByIdUser($id) {
        $this->db->select('*')
                ->from($this->table)
                ->where(array('id_usuario' => $id));
        $query = $this->db->get()->result_array();
        return $query;
    }

    /**
     * 
     * @description:
     * @param array $filtro_get 
     * @return array()
     */
    public function getComFiltro($filtro_get) {
        $this->db->select("
        condominio.id_condominio,	
        imovel.id_imovel,
        imovel.status AS STATUS,
        condominio.nome AS 'CONDOMINIO',
        CONCAT(tipo_imovel.descricao, ',N°', imovel.numero) AS 'IMOVEL',
        imovel.nome_responsavelCadastro AS 'REPONSAVEL_PELO_CADASTRO',
        imovel.cpf_responsavelCadastro AS 'CPF',
        imovel.telefone_responsavelCadastro AS 'CONTATO'");

        $this->db->from($this->table);
        $this->db->join('imovel', 'imovel.condominio_id_condominio = condominio.id_condominio');
        $this->db->join('tipo_imovel', 'tipo_imovel.id_tipo_imovel = imovel.tipo_imovel_id_tipo_imovel');


        if ($filtro_get['id_usuario']) {
            $this->db->where("id_usuario = {$filtro_get['id_usuario']}");
        }

        if ($filtro_get['id_condominio']) {
            $this->db->where("id_condominio = {$filtro_get['id_condominio']}");
        }

        if ($filtro_get['tipo_imovel_id_tipo_imovel']) {
            $this->db->where("tipo_imovel_id_tipo_imovel = {$filtro_get['tipo_imovel_id_tipo_imovel']}");
        }

        if ($filtro_get['nome_responsavelCadastro']) {
            $this->db->like("nome_responsavelCadastro", $filtro_get['nome_responsavelCadastro']);
        }

        $query = $this->db->get()->result_array();
        return $query;
    }
    
    public function get_nome_condominio($id_condominio) {
        $query = $this->db->query("SELECT id_condominio,nome from condominio where id_condominio={$id_condominio}");
        return $query->result()[0];
    }
    
    
}