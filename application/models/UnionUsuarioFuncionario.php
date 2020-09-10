<?php
//use Application\Models\Crud_m;
defined('BASEPATH') OR exit('No direct script access allowed');

class UnionUsuarioFuncionario extends Crud_m {

    public $table = 'union_usuario_funcionario';
   
    public function __construct() {
        parent::__construct();
    }
    
    public function get_union_usuario_funcionario($id_condominio) {
        $ret = $result = $this->db->query("SELECT  
        Nome, 
        Cpf,
        Documento,
        Tipo ,
        Email ,
        Telefone1, 
        Telefone2,
        Telefone3 ,
        Departamento, 
        Apartamento,
        Bloco ,
        Observacoes, 
        Pin,
        Cartao1Numero, 
        Cartao1Formato, 
        Cartao1Codigo,
        Cartao2Numero, 
        Cartao2Formato,
        Cartao2Codigo,
        Cartao3Numero,
        Cartao3Formato, 
        Cartao3Codigo 
        FROM union_usuario_funcionario as _uuf  WHERE  _uuf.id_condominio ={$id_condominio}");
        return $ret;
    }
    
    public function delete($arrayColunaValor){
        
      return   parent::delete($arrayColunaValor);
        
    }
    
    public function save_union_usuario_funcionario($unir_array) {
        for ($i = 0; $i < count($unir_array); $i++) {
            $this->db->insert('union_usuario_funcionario', $unir_array[$i]);
        }
    }
    
}
