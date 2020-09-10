<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends MY_Controller {
    private $_arrayCheckBoxAcesso;
    private $_arraySelectRelacaoResponsavel;
    public function __construct() {
        parent::__construct();
        $this->_arrayCheckBoxAcesso = $this->AcessoModel->findAll();
        $this->_arraySelectRelacaoResponsavel = $this->RelacaoResponsavelModel->findAll();
        /*if(!isset($_SESSION['usuario'])||empty($_SESSION['usuario'])){
            redirect("/logoff", 301);
        }*/
    }
  
    public function index() {
        if ($_SESSION['usuario']->grupo_id != '1') {
            redirect("/dashboard", 301);
        }
        $this->load->view('usuario/index', array(
            '_active' => 'sub-menu-2',
            '_arraySelectTipoUsuario' => $this->TipoUsuarioModel->findAll(),
            'arrayListUsers' => $this->UsuarioModel->getListById("tipo_usuario_id_tipo_usuario in(1,2)"),
        ));
    }
   
    public function form_novo_admin() {
        $this->load->view('usuario/admin/form_novo', array(
            '_active' => 'sub-menu-2',
        ));
    }
  
    public function create_a() {
        $array_usuario[] = $this->input->post('array_usuario');
        $array_grupo_usuario = $this->input->post('array_grupo_usuario');
        $array_grupo_usuario['id_usuario'] = $this->UsuarioModel->save($array_usuario);
        $this->GrupoUsuario->save($array_grupo_usuario);
        redirect("/usuario/gerenciar", 'location', 301);
    }
   
    
  
    public function update_site() {
        $array_usuario = $this->input->post('array_usuario')[0];
        $array_acesso[] = $this->input->post('array_usuario')[1];
        $_rota = $this->input->post('_rota');
        $id_usuario = $array_usuario['id_usuario'];
        $array_usuario['data_nascimento'] = $this->formatarParaDataAmericana($array_usuario['data_nascimento']);
        if ($array_usuario['responsavel'] == 's') {
            $array_usuario['relacao_responsavel_id_relacao_responsavel'] = 0;
        }
        if ($array_usuario['responsavel'] == 'n') {
            $array_usuario['departamento']='';
        }
        $this->UsuarioModel->update($array_usuario, "id_usuario = {$id_usuario}");
        $array_acesso[0]['usuario_id_usuario'] = $id_usuario;
        $this->DarAcessoModel->update_acesso($array_acesso);
        if ($_rota == 'admin') {
            $_rota = "cliente/{$array_usuario['imovel_id_imovel']}/edit";
        }
        redirect("/{$_rota}", 'location', 301);
    }
  
    public function delete_admin($id) {
        $sessao_DADOS = @$_SESSION['DADOS'];
        $this->UsuarioModel->deleteUsuarioDarAcesso($id, $this->DarAcessoModel);
        redirect("/cliente/" . $sessao_DADOS['imovel']->id_imovel . "/edit", 'location', 301);
    }
  
    public function delete_site($id) {
        $this->UsuarioModel->deleteUsuarioDarAcesso($id, $this->DarAcessoModel);
        redirect("/site", 'location', 301);
    }
   
    //Rotas referente ao Perfil do Usuário :
    public function meuPerfil($id) {
        if (!$id) {
            $id = $_SESSION['usuario']->id_usuario;
        }
        $this->load->view('usuario/meuPerfil/index', array(
            '_active' => 'sub-menu-1',
            'object_usuario' => $this->UsuarioModel->get_join_usuario_grupo_usuario($id),
        ));
    }
  
    public function editMeuPerfil($id) {
        $this->load->view('usuario/meuPerfil/form_edit', array(
            '_active' => 'sub-menu-2',
            'object_usuario' => $this->UsuarioModel->get_join_usuario_grupo_usuario($id),
        ));
    }
   
    public function updateMeuPerfil() {
        $dados = $this->input->post();
        $id_usuario = $dados['id_usuario'];
        if (!empty($dados['senha'])) {
            $dados['senha_usuario_descriptografada'] = trim($dados['senha']);
            $dados['senha'] = trim(sha1($dados['senha']));
            $this->UsuarioModel->update($dados, "id_usuario = {$id_usuario}");
            redirect("/logoff", 'location', 301);
        } else {
            unset($dados['senha']);
            $this->UsuarioModel->update($dados, "id_usuario = {$id_usuario}");
            redirect("usuario/meu-perfil", 'location', 301);
        }
    }
   
    // Metodos : Auxiliares a classe. 
    private function VerificaSeEresponsavelPeloImovel($responsavel) {
        if ($responsavel === 's') {
            return true;
        }
        return false;
    }
   
    private function formatarParaDataAmericana($_data) {
        $data_american = date("Y-m-d", strtotime(str_replace('/', '-', $_data)));
        return $data_american;
    }
    
    public function edit_admin($id) {
        $array_usuario=$this->input->post('array_usuario');
        $array_grupo_usuario=$this->input->post('array_grupo_usuario');
        $ERROR = '';
        if(isset($array_usuario)){
            $id_usuario=$array_usuario['id_usuario'];
            $cpf=$array_usuario['cpf_usuario'];
            $array_grupo_usuario['id_usuario']=$id_usuario;
            $array_usuario['data_nascimento']=$this->formatarParaDataAmericana($array_usuario['data_nascimento']);
            if(!empty($array_usuario['senha'])){
                $array_usuario['senha_usuario_descriptografada'] = trim($array_usuario['senha']);
                $array_usuario['senha'] = trim(sha1($array_usuario['senha']));
            }else{
                unset($array_usuario['senha']);
            }
            if(!empty($_FILES['arquivo']['name'])){
                $ERROR =  $this->do_upload($id_usuario,$cpf);
                if(isset($ERROR['THUMB'])){
                    $array_usuario['url_image'] = $ERROR['THUMB'];
                }
            }
            $this->UsuarioModel->update($array_usuario,"id_usuario={$id_usuario}");
            $this->GrupoUsuario->delete(["id_usuario"=>$id_usuario]);
            $this->GrupoUsuario->save($array_grupo_usuario);
        }
        $this->load->view('usuario/admin/form_edit', array(
            '_active' => 'sub-menu-2',
            'object_usuario' => $this->UsuarioModel->get_join_usuario_grupo_usuario($id),
            'ERROR' => $ERROR,
        ));
    }
    
    private  function do_upload($id_usuario){
        $pasta_destino_foto_gg = "assets/uploads/foto/gg/";
        
        if (!is_dir($pasta_destino_foto_gg)) {
            mkdir($pasta_destino_foto_gg, 0777, TRUE);
        }
        $config['upload_path']=$pasta_destino_foto_gg;
        //$config['allowed_types']="jpg";
        $config['max_size']=0;
        $config['file_name']=$id_usuario;   
        $config['overwrite']=true;
        
        $this->load->library('upload', $config);
        //UPLOAD DA IMAGEM:
        if(!$this->upload->do_upload('arquivo')){
            $TYPE['ERROR']=array('error' => $this->upload->display_errors());
        }else{
            $TYPE['ERROR']=array('sucess' => "Seus dados Foram alterados com sucesso");      
            $this->image_lib->resize();   
        }
         return $TYPE;
    }
    
    /*Lado Cliente*/
    
     public function form_morador() {
        $this->load->view('usuario/site/form_novo', array(
            '_active' => 'sub-menu-2',
            '_arrayCheckBoxAcesso' => $this->_arrayCheckBoxAcesso,
            '_arraySelectRelacaoResponsavel' => $this->_arraySelectRelacaoResponsavel,
        ));
    }
    
    public function create_site() {
        $array_usuario = $this->input->post('array_usuario');
        $_rota = $this->input->post('_rota');
        if (isset($array_usuario[0]['imovel_id_imovel'])) {
            if ($this->VerificaSeEresponsavelPeloImovel($array_usuario[0]['responsavel'])) {
                $array_usuario[0]['relacao_responsavel_id_relacao_responsavel'] = 0;
            }
        }
        $array_acesso[] = $array_usuario[1];
        unset($array_usuario[1]);
        $ultimo_id_usuario = $this->UsuarioModel->save($array_usuario);
        //salvar Salvar Grupo de Usuário:
        $this->GrupoUsuario->save(['id_grupo' => 3, 'id_usuario' => $ultimo_id_usuario]);
        //dar acesso
        $array_acesso[0]['usuario_id_usuario'] = $ultimo_id_usuario;
        $this->DarAcessoModel->save($array_acesso);
        if ($_rota == 'admin') {
            $_rota = "cliente/{$array_usuario[0]['imovel_id_imovel']}/edit";
        }
        
        redirect("/{$_rota}", 'location', 301);
    }
    
    public function editar_morador($id){
        $this->load->view('usuario/site/form_edit', array(
            '_active' => 'sub-menu-2',
            '_arrayCheckBoxAcesso' => $this->_arrayCheckBoxAcesso,
            '_arraySelectRelacaoResponsavel' => $this->_arraySelectRelacaoResponsavel,
            '_arrayAcessoUsuario' => $this->DarAcessoModel->get_join_acesso_usuario(['id_usuario' => $id]),
            'object_usuario' => $this->UsuarioModel->get_join_usuario_grupo_usuario($id),
        ));
    }
    
    
}