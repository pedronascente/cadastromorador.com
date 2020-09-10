<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Condominio extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }

    //rota : /condominio/gerenciar/1
    public function index($id) {
        $morador = null;
        $this->load->model('UsuarioModel');
        if ($_SESSION['usuario']->id_usuario != '1') {
            if ($_SESSION['usuario']->id_usuario == $id) {
                $arrayListCondominio = $this->CondominioModel->getCondominioByIdUser($id);
            } else {
                redirect('/cliente');
            }
        } else {
            $arrayListCondominio = $this->CondominioModel->getCondominioByIdUser($id);
        }
        if($arrayListCondominio){
          $morador = $this->UsuarioModel->get_morador($arrayListCondominio[0]['id_condominio']);
        }
        $this->load->view('condominio/index', array(
            '_active' => 'sub-menu-2',
            'arrayListCondominio' => $arrayListCondominio,
            'morador' => $morador,
        ));
    }

    public function create() {
        $array_condominio = $this->input->post('array_condominio');
        //gearar token:
        $_token = $this->gerarToken('c');
        $este_token_existe_base = count($this->CondominioModel->findById(['token' => $_token]));
        if ($este_token_existe_base > 0) {
            $_token = $this->gerarToken('c');
        }
        $array_condominio['token'] = $_token;
        if ($this->CondominioModel->save($array_condominio)) {
            redirect("condominio/gerenciar/" . $_SESSION['usuario']->id_usuario, 'location', 301);
        } else {
            die('Não foi possivel registrar seus dados.');
        }
    }

    public function associarCondominio() {
        $condominio = $this->CondominioModel->findById("id_condominio='{$this->input->post('id_condominio')}'");
        if ($condominio) {
            if ($_SESSION['CONDOMINIO'] || $_SESSION['CHAVEIMOVEL']) {
                unset($_SESSION['CONDOMINIO'], $_SESSION['CHAVEIMOVEL']);
            }
            $_SESSION['CONDOMINIO'] = $condominio;
            $_SESSION['CHAVEIMOVEL'] = trim(password_hash("IMOVEL", PASSWORD_DEFAULT));
        } else {
            die('Error: condominio/associarCondominio');
        }
        redirect("cliente/create", 'location', 301);
    }

    public function edit($id) {
        $this->load->view('condominio/form_edit', array(
            '_active' => 'sub-menu-2',
            'object_condominio' => $this->CondominioModel->findById(['id_condominio' => $id]),
        ));
    }

    public function view_ajax($id) {
        $objectData = $this->CondominioModel->findById(['id_condominio' => $id]);
        die(json_encode($objectData));
    }

    public function update() {
        $this->CondominioModel->update(
                $this->input->post('array_condominio'), "id_condominio={$this->input->post('array_condominio')['id_condominio']}"
        );
        redirect("condominio/gerenciar/" . $_SESSION['usuario']->id_usuario, 'location', 301);
    }

    public function getCondominioByIdUsuario($id) {
        $objectData = $this->CondominioModel->getCondominioByIdUser($id);
        die(json_encode($objectData));
    }

    public function form_novo() {
        $this->load->view('condominio/form_novo', array(
            '_active' => 'sub-menu-2',
        ));
    }

    public function atualizarToken($id){
        $novoToken = $this->gerarToken($ajax = 'c');
        $array_condominio = ['id_condominio'=>$id,'token'=>$novoToken];
        $this->CondominioModel->update($array_condominio, "id_condominio={$id}");
        die(
                json_encode(['token' => $novoToken])
        );
    }

    /**
     * Função para gerar senhas aleatórias
     *
     * @param integer $tamanho Tamanho da senha a ser gerada
     * @param boolean $maiusculas Se terá letras maiúsculas
     * @param boolean $numeros Se terá números
     * @param boolean $simbolos Se terá símbolos
     *
     * @return string A senha gerada
     */
    private function gerarToken($ajax = '') {
        $tamanho = 8;
        $maiusculas = true;
        $numeros = true;
        $simbolos = false;
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
        if ($maiusculas)
            $caracteres .= $lmai;
        if ($numeros)
            $caracteres .= $num;
        if ($simbolos)
            $caracteres .= $simb;
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        if ($ajax == 'c') {
            return $retorno;
        } else {
            die(
                json_encode(['token' => $retorno])
            );
        }
    }
}