<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
   /** 
    * Função responsavel por instanciar no tempo de execussão 
    * @access public 
    * @param String $imagem_nome 
    * @param String $diretorio 
    * @return void 
    */ 
    public function __construct() {
        parent::__construct();
        @session_start();
    }
        
   /** 
    * Função para mostrar  
    * @access public 
    * @param String  
    * @return void 
    */ 
    public function index() {
        $this->load->view('Login/index');
    }
    
   /** 
    * Função para  
    * @access public 
    * @param String $imagem_nome 
    * @param String $diretorio 
    * @return void 
    */ 
    
    //CLIENTE :
    public function auth() {
        $token = trim($this->input->post('token'));
        $condominio = $this->CondominioModel->findByIdJoin(['token'=>$token],'id_condominio,nome,token,dataCriacao,imovel_id_imovel,nome_usuario,email');
        if (!empty($condominio->id_condominio)) {
            $_SESSION['CONDOMINIO'] = $condominio;
            $_SESSION['CHAVEIMOVEL'] = trim(password_hash("IMOVEL", PASSWORD_DEFAULT));
            redirect("/site", 'location', 301);
        } else {
            $_SESSION['error_login_cliente'] = true;
            unset($_SESSION['CONDOMINIO'],$_SESSION['CHAVEIMOVEL'],$_SESSION['usuario']);
            redirect("/login", 'location', 301);
            die('nao autenticado!');
        }
    }
    
    public function auth_QrCode($token) {
        $condominio = $this->CondominioModel->findByIdJoin(['token'=>$token],'id_condominio,nome,token,dataCriacao,imovel_id_imovel,nome_usuario,email');
        if ($condominio) {
            $_SESSION['CONDOMINIO'] = $condominio;
            $_SESSION['CHAVEIMOVEL'] = trim(password_hash("IMOVEL", PASSWORD_DEFAULT));
            redirect("/site", 'location', 301);
        } else {
            @session_destroy();
            unset($_SESSION);
            redirect("/login", 'location', 301);
            die('nao autenticado!');
        }
    }
    
    public function auth2(){
        $usuario = trim($this->input->post('usuario'));
        $senha = trim(sha1($this->input->post('senha')));
        $db_usuario =  $this->UsuarioModel->getAuth(['usuario'=>$usuario,'senha'=>$senha]);
        if(  empty($db_usuario) || !is_object($db_usuario)){
            $isValid = false;
        }else{
            $isValid = true;
        }
        if($isValid && $db_usuario->ativo=="on"){
            $_SESSION['usuario'] = $db_usuario;
            redirect("/dashboard", 'location', 301);
        }else{
            unset($_SESSION);
            $this->load->view('Login/login_vendedor',['error_login_vendedor'=>'fail']);
        }
    }
  
    public function formulario_login_vendedor(){
        $this->load->view('Login/login_vendedor',['error_login_vendedor'=>'']);
    }
	
   /** 
    * Função para 
    * @access public 
    * @param String $imagem_nome 
    * @param String $diretorio 
    * @return void 
    */ 
    public function logoff() {
        @session_destroy();
        unset($_SESSION);
        redirect("/login", 'location', 301);
    }
    
    public function frm_recuperar_cadastro_morador() {      
        $this->load->view('Login/frm_recuperar_cadastro');
    }
    
    public function sucesso_send_email() {
        $this->load->view('Login/sucesso_send_email');
    }
    

    public function enviar_solicitacao_recuperar_cadastro() {   
        # Verificar se existe cliente :
        $morador = $this->ImovelModel->get_responsavel_cadastro([
            'email'=>$this->input->post('email'),
            'cpf'=>$this->input->post('cpf'),
        ]);
        if(!empty($morador)){
            unset($_SESSION['erro_recuperar_cadastro']);
            # Gerar link :
            $link = "/recuperar-cadastro/?token={$morador->token}&chave={$morador->chave}";
            redirect($link, 'location', 301);
            exit();
        }else{
          $_SESSION['erro_recuperar_cadastro'] = 'Registro não encontrado, Por favor informe o CPF, e o E-MAIL do Responsavel pelo cadastro <br>ou Entre em contato com seu Gestor.';           
         redirect("/recuperarar-cadastro-morador", 'location', 301);  
        }
    }
    
    private  function gerar_HTML($array_data){
        $html='<table align="center" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#eaeaea">
                <tbody>
                    <tr>
                        <td width="10">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>
                        <table class="x_width" style="max-width:600px; border:1px solid #d1d1d1; margin:0 auto" align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                            <tbody>
                                <tr height="70">
                                    <td width="20px"></td>
                                    <td>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td><img data-imagetype="External" src="https://volpatorastreamento.com.br/assets/img/logo-volpato.jpg" alt="Portaria Virtual" style="display:block" height="30"> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="20px"></td>
                                </tr>
                                <tr height="3">
                                    <td colspan="3" bgcolor="#f5c527"></td>
                                </tr>
                                <tr height="35">
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="width:20px; min-width:20px" width="20px">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td style="width:560px">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td><font face="Arial, Helvetica, sans-serif" color="#474747" size="4"><strong>' . ucfirst($array_data['morador']->nome_responsavelCadastro) .', você pediu para <span class="currentHitHighlight" id="0.24018348826150993" name="searchHitInReadingPane">recuperar</span> seu cadastro morador, siga as instruções abaixo.</strong> </font></td>
                                                </tr>
                                                <tr height="35">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><font face="Arial, Helvetica, sans-serif" color="#787878" size="3"> Acesse abaixo e siga os passos para concluir o processo. </font></td>
                                                </tr>
                                                <tr height="40">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="max-width:220px" align="center">
                                                        <div style="margin-left:15px"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="max-width:220px" align="center"><a href="'.$array_data['link'].'" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable" style="background-color:#c13216; border-radius:2px; color:#ffffff; display:inline-block; line-height:44px; text-align:center; text-decoration:none; width:240px"><font face="Arial, Helvetica, sans-serif" color="#FFFFFF" size="3">Recuperar Cadastro Morador</font></a></td>
                                                </tr>
                                                <tr height="50">
                                                    <td></td>
                                                </tr>
                                                
                                                      
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="color: rgb(29, 62, 105); font-size: 16px; font-family: Arial, Helvetica, sans-serif, serif, &quot;EmojiFont&quot;">Atenciosamente,<br> Grupo Volpato</td>
                                                </tr>
                                                <tr height="10">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                
                                                <tr height="25">
                                                    <td></td>
                                                </tr>
                                                <tr height="15">
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="width:20px; min-width:20px" width="20px">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="x_width" style="max-width:600px; margin:0 auto" align="center" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td style="width:600px">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr height="30">
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><font style="font-size: 11px; font-family: &quot;Verdana&quot;, serif, &quot;EmojiFont&quot;; text-align: right; color: rgb(20, 20, 20);">Essa é uma mensagem automática. Por favor, não responda a esse e-mail. <br> ©'.date('Y').' Portaria Virtual . Todos os direitos reservados. </font></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="10">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr height="10">
                    <td></td>
                </tr>
            </tbody>
        </table>';
        return $html;
    }
    
    private function sendEmail($array_data) {

        $this->email->from("rastreadorvolpato@rastreadorvolpato.com", 'Portaria Virtual');
        $this->email->to($array_data['morador']->email_responsavelCadastro, $array_data['morador']->nome_responsavelCadastro);
        $this->email->bcc('desenvolvimento@grupovolpato.com');
        $this->email->subject("Grupo Volpato : Ficha Cadastral de Portaria Virtual");
        $this->email->message($array_data['mensagem']);
        

        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
        }


       DIE; 

    }
    
    public function reprovar_cadastro(){
        $cpf_responsavelCadastro=$this->input->post('cpf_responsavelCadastro');
        $morador = $this->ImovelModel->get_responsavel_cadastro([
            'email'=>$this->input->post('email_responsavelCadastro'),
            'cpf'=>$cpf_responsavelCadastro,
        ]);

        $this->ImovelModel->update(['status'=>'reprovado'], "cpf_responsavelCadastro='".$cpf_responsavelCadastro."'");     
        $link = "https://".$_SERVER['SERVER_NAME']."/recuperar-cadastro/?token={$morador->token}&chave={$morador->chave}";
        
        $array_data = ['morador'=>$morador,'link'=>$link];
        $array_data['mensagem'] = $this->gerar_HTML($array_data);
        if($this->sendEmail($array_data)){
            $type = "Cadastro Reprovado! \n O mesmo foi encaminhado para o Morador Responsavel!";
        }else{
            $type = "Não foi possivel encaminhar  Responsavel!";
        }
        die(json_encode(['type'=>$type]));
    }
    
    public function aprovar_cadastro(){
        $cpf_responsavelCadastro=$this->input->post('cpf_responsavelCadastro');
        $this->ImovelModel->update(['status'=>'aprovado'], "cpf_responsavelCadastro='".$cpf_responsavelCadastro."'"); 
        die(json_encode(['type'=>'true']));
    }
}