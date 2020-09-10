<?php
// namespace C:\wamp\www\cadastro\application\models\UsuarioModel.php
//use  C:\wamp\www\cadastro\application\models\Crud_m.php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends Crud_m {

    public $table = 'usuario';
    private $_arrayUsuario;
    private $_DarAcessoModel;

    public function __construct() {
        parent::__construct();
    }

    public function save($ArrayDados) {
        $this->_arrayUsuario = $ArrayDados;
        if ($this->_arrayUsuario) {
            foreach ($this->_arrayUsuario as $k => $usuario) {
                if (!empty($usuario['data_nascimento'])) {
                    $DATA = DateTime::createFromFormat('d/m/Y', $usuario['data_nascimento']);
                    $usuario['data_nascimento'] = $DATA->format('Y-m-d');
                    if (isset($usuario['senha'])) {
                        $usuario['senha_usuario_descriptografada'] = trim($usuario['senha']);
                        $usuario['senha'] = trim(sha1($usuario['senha']));
                    }
                }
                $uIdIusuario = parent::save($usuario); //SAVE USUARIO .
            }
        }
        return $uIdIusuario;
    }

    public function deleteUsuarioDarAcesso($id, $DarAcessoModel) {
        $this->_DarAcessoModel = $DarAcessoModel;
        parent::delete(['id_usuario' => $id]);
        $this->_DarAcessoModel->delete(['usuario_id_usuario' => $id]);
    }

    public function getJoinUsuarioImovelTipoUsuarioRelacaoResponsavel($id) {
        return $this->db->select('
        _i.id_imovel,
        _tu.descricao as tipo_usuario,
        _u.nome_usuario,
        _u.responsavel,
        _u.data_nascimento,
        _u.tag_eclusa,
        _u.controle_portao,
        _u.telefone,
        _u.celular,
        _u.email,
        _u.obs,
        _u.id_usuario,
        _u.cpf_usuario,
        _u.rg_usuario,
        _u.departamento,
        _rr.descricao as relacao_responsavel
        ')
        ->from("{$this->table} as _u")
        ->join("imovel as _i", '_i.id_imovel = _u.imovel_id_imovel', 'left')
        ->join("tipo_usuario as _tu", ' _tu.id_tipo_usuario = _u.tipo_usuario_id_tipo_usuario', 'left')
        ->join("relacao_responsavel as _rr", ' _rr.id_relacao_responsavel = _u.relacao_responsavel_id_relacao_responsavel', 'left')
        ->where('_i.id_imovel', $id)
        ->get()->result_array();
    }

    public function get_join_usuario_grupo_usuario($id) {
        return $this->db->select('
        _u.id_usuario,
        _u.nome_usuario,        
        _u.data_nascimento,
        _u.ativo,
        _u.usuario,
        _u.telefone,
        _u.celular,
        _u.email,
        _u.obs,
        _u.responsavel,
        _u.relacao_responsavel_id_relacao_responsavel,
        _u.tag_eclusa,
        _u.controle_portao,
        _u.senha_usuario_descriptografada,        
        _u.rg_usuario,
        _u.departamento,
        _u.cpf_usuario,        
        _u.url_image,        
        _gu.id_grupo,
        _g.grupo_descricao
        ')
        ->from("{$this->table} as _u")
        ->join("grupo_usuario as _gu", '_gu.id_usuario = _u.id_usuario', 'left')
        ->join("grupo as _g", '_g.grupo_id = _gu.id_grupo', 'left')
        ->where('_u.id_usuario', $id)
        ->get()->row_object();
    }

    private function formataDados($dados) {
        $html = '';
        for ($i = 0; $i < count($dados); $i++) {
            $responsavel = ($dados[$i]['responsavel'] == 'n') ? 'Não' : 'Sim';
            $dataNascimento = isset($dados[$i]['data_nascimento']) ? date('d/m/Y', strtotime($dados[$i]['data_nascimento'])) : '';
            $html .= '<tr>';
            $html .= '	<td><b>Nome : </b>' . $dados[$i]['nome'] . '</td>';
            $html .= '	<td><b>Data Nascimento : </b> ' . $dataNascimento . '  </td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '	<td><b>Tipo Usuário : </b>' . $dados[$i]['tipo_usuario'] . '</td>';
            $html .= '	<td><b>Responsável pelo Imóvel ? : </b> ' . $responsavel . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '	<td colspan="2"><b>Relação Responsavel :  </b>' . $dados[$i]['relacao_responsavel'] . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '	<td colspan="2"><b>Email : </b>' . $dados[$i]['email'] . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '	<td><b>Telefone 1 : </b>' . $dados[$i]['telefone'] . '</td>';
            $html .= '	<td><b>Telefone 2 : </b>' . $dados[$i]['celular'] . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '	<td><b>Tag Eclusa : </b>' . $dados[$i]['tag_eclusa'] . '</td>';
            $html .= '	<td><b>Controle Portão : </b>' . $dados[$i]['controle_portao'] . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '	<td colspan="2"><b>Observações : </b>' . $dados[$i]['obs'] . '</td>';
            $html .= '</tr>';
            $html .= '<tr  >';
            $html .= '	<td colspan="2"><b>Relação de Acesso: </b></td>';
            $html .= '</tr>';
            $html .= $this->getAcesso($dados[$i]['id_usuario']);
            $html .= '<tr>';
            $html .= '	<td colspan="2"><a href="javascript:void(0)" data-toggle="modal"  data-idParametro="' . $dados[$i]['id_usuario'] . '"  id="#modalGenerico"   data-form="_novoAcesso"  title="Adicionar Acesso."  class="btn btn-mini btn-success  _myModal"> <i class="icon-plus-sign-alt"></i> Acesso </a> <b>Clique aqui para liberar  Acesso(s).</b></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '  <td colspan="3">';
            $html .= '      <a href="javascript:void(0)"  id="#modalGenerico"   data-idParametro="' . $dados[$i]['id_usuario'] . '" data-toggle="modal"  data-form="_editarUsuario"   title="Clique aqui para editar este Usuaário."  class="btn  btn-mini   btn-primary _myModal"> <i class="icon-edit"></i> Editar</a>';
            $html .= '      <a href="javascript:void(0)"  id="#modalGenerico"   data-idParametro="' . $dados[$i]['id_usuario'] . '" data-toggle="modal"  data-form="_excluirUsuario"   title="Clique aqui para excluir este Usuaário."  class="btn  btn-mini    btn-danger _myModal"> <i class=" icon-remove"></i> Excluir</a>';
            $html .= '  </td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '	<td colspan="2"  style="background: #efefef"></td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function getAcesso($id) {
        return $this->db->select(' _a.id_acesso,_a.descricao as acesso, _u.id_usuario')
                        ->from("dar_acesso as _da")
                        ->join("usuario as _u", '_da.usuario_id_usuario = _u.id_usuario')
                        ->join("acesso  as _a", ' _da.acesso_id_acesso = _a.id_acesso')
                        ->where('_u.id_usuario', $id)
                        ->get()->result_array();
    }

    public function getAuth($data) {
        return $this->db->select('_u.*,_g.*,_gu.*')
                        ->from("{$this->table} as _u")
                        ->join("grupo_usuario as _gu", '_gu.id_usuario = _u.id_usuario')
                        ->join("grupo as _g", '_g.grupo_id = _gu.id_grupo')
                        ->where('_u.usuario', $data['usuario'])
                        ->where('_u.senha', $data['senha'])
                        ->get()->row_object();
    }

    public function getTotalUusuario() {
        return $this->db->select('*')
                        ->from($this->table)
                        ->get()
                        ->num_rows();
    }

    public function get_total_condominio_inner_usuario_condomino($id = '') {
        if (!$id) {
            $r = $this->db->select('COUNT(_c.id_usuario) AS total_condomino, _u.nome_usuario ,_u.id_usuario')
                            ->from("{$this->table} as _u")
                            ->join("condominio  as _c", ' _c.id_usuario = _u.id_usuario')
                            ->group_by("_c.id_usuario")
                            ->get()->result_array();
        } else {
            $r = $this->db->select('COUNT(_c.id_usuario) AS total_condomino, _u.nome_usuario ,_u.id_usuario')
                            ->from("{$this->table} as _u")
                            ->join("condominio  as _c", ' _c.id_usuario = _u.id_usuario')
                            ->where('_u.id_usuario', $id)
                            ->group_by("_c.id_usuario")
                            ->get()->result_array();
        }
        return $r;
    }

    public function get_morador($id_condominio) {
        $morador = "SELECT 
        _u.`nome_usuario`  AS Nome,  
        _u.`tipo_usuario_id_tipo_usuario` AS Tipo ,
        _u.`Email`,
        _u.`telefone` AS Telefone1,
        _u.`celular` AS Telefone2,
        _u.`obs` AS Observacoes,
        _u.`cpf_usuario`,
        _u.`rg_usuario`,
        _u.`departamento`,
        _i.`numero` AS Apartamento,
        _rr.`descricao` AS Departamento
        FROM `usuario`  AS _u
        INNER JOIN imovel AS _i ON _u.`imovel_id_imovel`= _i.`id_imovel`
        INNER JOIN `condominio` AS _c ON _c.`id_condominio` = _i.`condominio_id_condominio`
        LEFT JOIN `relacao_responsavel` AS _rr ON  _u.`relacao_responsavel_id_relacao_responsavel`  =_rr.`id_relacao_responsavel` 
        WHERE _c.`id_condominio` ={$id_condominio}";
        $query = $this->db->query($morador);
        $ret = $query->result_array();
        for ($i = 0; $i < count($ret); $i++):
            if ($ret[$i]['Tipo'] == '3'):
                $ret[$i]['Tipo'] = 2;
            endif;
        endfor;
        return $ret;
    }
}