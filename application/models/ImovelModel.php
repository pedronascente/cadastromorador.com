<?php
//namespace C:\wamp\www\cadastro\application\models\ImovelModel.php
class ImovelModel extends Crud_m {

    public $table = 'imovel';

    public function __construct() {
        parent::__construct();
    }

    public function findByIdJoinTipoImovel($data) {
        if(isset($data['id_imovel'])){
            return $this->db->select('*')
                        ->from("{$this->table} as _i")
                        ->join("tipo_imovel as _ti", '_ti.id_tipo_imovel = _i.tipo_imovel_id_tipo_imovel')
                        
                        ->where('_i.id_imovel', $data['id_imovel'])
                        ->get()
                        ->row_object();
        }
        
        return $this->db->select('*')
                        ->from("{$this->table} as _i")
                        ->join("tipo_imovel as _ti", '_ti.id_tipo_imovel = _i.tipo_imovel_id_tipo_imovel')
                        ->where('_i.condominio_id_condominio', $data['id_condominio'])
                        ->where('_i.chave', $data['chave'])
                        ->get()
                        ->row_object();
    }

    public function verificarExistenciaImovel($ArrayParam) {
        return $this->db->select('id_imovel')
                        ->from($this->table)
                        ->where('cpf_responsavelCadastro',$ArrayParam['cpf_responsavelCadastro'])
                        ->where('tipo_imovel_id_tipo_imovel',$ArrayParam['tipo_imovel_id_tipo_imovel'])
                        ->where('numero',$ArrayParam['numero'])
                        ->get()->row_object();
    }
    
    public function getJoinImovelTipoImovel($id) {
        return $this->db->select('_i.id_imovel,
        _i.condominio_id_condominio,
        _i.tipo_imovel_id_tipo_imovel,
        _i.numero as numero_imovel,
        _i.senha,
        _i.contra_senha,
        _i.chave,
        _i.cpf_responsavelCadastro,
        _i.email_responsavelCadastro,
        _i.nome_responsavelCadastro,
        _i.situacao_responsavelCadastro,
        _i.telefone_responsavelCadastro,
        _i.dataCriacao,_c.*')
        ->from("{$this->table} as _i")
        ->join("tipo_imovel as _ti", '_ti.id_tipo_imovel = _i.tipo_imovel_id_tipo_imovel')
        ->join("condominio as _c", '_c.id_condominio = _i.condominio_id_condominio')
        ->where('_i.id_imovel', $id)
        ->get()
        ->row_object();
    }
    
    public function get_responsavel_cadastro($data) {

        $_return = $this->db->select('_i.chave, _i.email_responsavelCadastro, _i.nome_responsavelCadastro, _c.token')
        ->from("{$this->table} as _i")
        ->join("condominio as _c", '_c.id_condominio = _i.condominio_id_condominio')
        ->where('_i.email_responsavelCadastro', $data['email'])
        ->where('_i.cpf_responsavelCadastro', $data['cpf'])
        ->get()
        ->row_object();
        
        return $_return;


        //var_dump($_return);
    }


    public function getByIdImovel_responsavel_cadastro($id) {
        $_return = $this->db->select('_i.chave, _i.email_responsavelCadastro, _i.nome_responsavelCadastro, _c.token')
        ->from("{$this->table} as _i")
        ->join("condominio as _c", '_c.id_condominio = _i.condominio_id_condominio')
        ->where('_i.id_imovel', $id)
        ->get()
        ->row_object();
        
        return $_return;
    }




    
    public function validar_token_chave($data) {


        return $this->db->select('_c.*')
        ->from("{$this->table} as _i")
        ->join("condominio as _c", '_c.id_condominio = _i.condominio_id_condominio')
        ->where('_i.chave',$data["chave"])
        ->where('_c.token',$data["token"])
        ->get()
        ->row_object();
    }
}