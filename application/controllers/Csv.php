<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Csv extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        if (!$_SESSION) {
            redirect('/logoff');
        }
    }

    /*
     * @param   int $id_condominio 
     * @return  
     */

    function ExportCSV($id_condominio){
     
        if (empty($id_condominio)) {  die('Atenção : falta o ID do condominio, entre em contato com o Suporte.'); }        
               
        $result_unir_array = $this->unir_array([
            'morador' => $this->UsuarioModel->get_morador($id_condominio),
            'funcionario' =>(!empty($this->FuncionarioModel->get_funcionario($id_condominio)))? $this->FuncionarioModel->get_funcionario($id_condominio):null ,
            ], $id_condominio
        );
        $ja_foi_exportado = count($this->UnionUsuarioFuncionario->get_union_usuario_funcionario($id_condominio)) ;
        if ($ja_foi_exportado == 1){
            $this->UnionUsuarioFuncionario->delete(['id_condominio' => $id_condominio]);
        }
        $this->UnionUsuarioFuncionario->save_union_usuario_funcionario($result_unir_array);
        $result = $this->UnionUsuarioFuncionario->get_union_usuario_funcionario($id_condominio);        
        $data = $this->dbutil->csv_from_result(
            $result, 
            ",", 
            "\r\n", 
            null
        );
        
        $nome_arquivo_csv = $this->CondominioModel->get_nome_condominio($id_condominio)->nome . ".csv";
        
        //force_download($nome_arquivo_csv, $data);
        
        //$path = '/assets/csv/';
        $this->ExportZip($nome_arquivo_csv,$data);
        
    }

    function ExportZip($nome_arquivo, $data){
        /*
         * ESTE EXEMPLO LÊ UM ARQUIVO E EFETUA O DOWNLOAD NO FORMATO .ZIP
            $files = get_filenames($path);
            foreach($files as $f){
                $this->zip->read_file($path.$f, true);
            }
            $this->zip->download('Download_all_files');
        */                         
        //$this->zip->read_file($path, true);
        //$this->zip->download($path);
        
        // $path = base_url('assets/'.$nome_arquivo);
        // $this->zip->add_data($nome_arquivo, $data);       
        
        $this->zip->add_data($nome_arquivo, $data);
        $this->zip->download($nome_arquivo);
     }
    
    private function unir_array($array_lis, $id_condominio) {
        $array_morador = '';
        $join_cpf_rg='';
        foreach ($array_lis['morador'] as $k => $v) {
            $observacao = str_replace(".","",str_replace(",","",$v['Observacoes']));
            if(!empty($v['cpf_usuario'])){ 
                $observacao .= " ::CPF:{$v['cpf_usuario']} ";                
            }
            if(!empty($v['rg_usuario'])){  
                $observacao .= " ::RG:{$v['rg_usuario']}";
            }
            if($v['departamento']=='1'){
                $departamento = "PROPRIETÁRIO";
            }else if($v['departamento']=='2'){
                $departamento = "INQUILINO";
            }else{
                $departamento = $v['Departamento'];
            }
            $array_morador[$k]['Nome']            = $this->converter_utf_8($v['Nome']);
            $array_morador[$k]['Cpf']             = "";
            $array_morador[$k]['Documento']       = "";
            $array_morador[$k]['Tipo']            = $v['Tipo'];
            $array_morador[$k]['Email']           = $v['Email'];
            $array_morador[$k]['Telefone1']       = $v['Telefone1'];
            $array_morador[$k]['Telefone2']       = $v['Telefone2'];
            $array_morador[$k]['Telefone3']       = "";
            $array_morador[$k]['Departamento']    = $this->converter_utf_8($departamento);
            $array_morador[$k]['Apartamento']     = (int) $v['Apartamento'];
            $array_morador[$k]['Bloco']           = "";
            $array_morador[$k]['Observacoes']     = $this->converter_utf_8($observacao);
            $array_morador[$k]['Pin']             = "";
            $array_morador[$k]['Cartao1Numero']   = "";
            $array_morador[$k]['Cartao1Formato']  = "";
            $array_morador[$k]['Cartao1Codigo']   = "";
            $array_morador[$k]['Cartao2Numero']   = "";
            $array_morador[$k]['Cartao2Formato']  = "";
            $array_morador[$k]['Cartao2Codigo']   = "";
            $array_morador[$k]['Cartao3Numero']   = "";
            $array_morador[$k]['Cartao3Formato']  = "";
            $array_morador[$k]['Cartao3Codigo']   = "";
            $array_morador[$k]['id_condominio']   = $id_condominio;
        }
        if($array_lis['funcionario']){
            foreach ($array_lis['funcionario'] as $k => $v) {           
                $observacao = str_replace(".","",str_replace(",","",$v['Observacoes']));
                if(!empty($v['cpf_funcionario'])){ 
                    $observacao .= " ::CPF:{$v['cpf_funcionario']} ";                
                }
                if(!empty($v['rg_funcionario'])){  
                    $observacao .= " ::RG:{$v['rg_funcionario']}";
                }  
                $array_funcionario[$k]['Nome']            = $this->converter_utf_8($v['Nome']);
                $array_funcionario[$k]['Cpf']             = "";
                $array_funcionario[$k]['Documento']       = "";
                $array_funcionario[$k]['Tipo']            = $v['Tipo'];
                $array_funcionario[$k]['Email']           = "";
                $array_funcionario[$k]['Telefone1']       = $v['Telefone1'];
                $array_funcionario[$k]['Telefone2']       = "";
                $array_funcionario[$k]['Telefone3']       = "";
                $array_funcionario[$k]['Departamento']    = $this->converter_utf_8($v['Departamento']);      
                $array_funcionario[$k]['Apartamento']     = (int) $v['Apartamento'];
                $array_funcionario[$k]['Bloco']           = "";
                $array_funcionario[$k]['Observacoes']     = $this->converter_utf_8($observacao);
                $array_funcionario[$k]['Pin']             = "";
                $array_funcionario[$k]['Cartao1Numero']   = "";
                $array_funcionario[$k]['Cartao1Formato']  = "";
                $array_funcionario[$k]['Cartao1Codigo']   = "";
                $array_funcionario[$k]['Cartao2Numero']   = "";
                $array_funcionario[$k]['Cartao2Formato']  = "";
                $array_funcionario[$k]['Cartao2Codigo']   = "";
                $array_funcionario[$k]['Cartao3Numero']   = "";
                $array_funcionario[$k]['Cartao3Formato']  = "";
                $array_funcionario[$k]['Cartao3Codigo']   = "";
                $array_funcionario[$k]['id_condominio']   = $id_condominio;
            }  
        }
        if($array_lis['funcionario']){
            $array_resultado = json_decode(json_encode(array_merge($array_morador, $array_funcionario)), FALSE);
        }else{
            $array_resultado = json_decode(json_encode($array_morador), FALSE);
        }        
        return $array_resultado;
    }
    
    private  function converter_utf_8($paramentro){
       if(!empty($paramentro)){
           $retornar  = mb_strtoupper($paramentro, 'UTF-8');
           //$retornar = mb_strtoupper($paramentro, 'ISO-8859-1');
       } else{
           $retornar = '';
       } 
       return  $retornar;
    }
}