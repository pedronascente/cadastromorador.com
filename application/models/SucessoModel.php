<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SucessoModel {
    /**
     * This is a Summary.
     * 
     * This is a Description.  Responsavel por enviar email resposta para o 
     * cliente , e seu Vendedor.
     * @Param  String  $email_destino 
     * @param  String  $anexo 
     * @return   boolean
     */
      public function sendEmail($dataEmail){
        $this->email->from("rastreadorvolpato@rastreadorvolpato.com", 'Portaria Virtual');
        $this->email->to($dataEmail['email_destino'],$dataEmail['email_nome']);
        $this->email->bcc($dataEmail['email_vendedor']);
        $this->email->bcc('desenvolvimento@grupovolpato.com');

        $this->email->subject("Grupo Volpato : Ficha Cadastral de Portaria Virtual");
        $this->email->message(''
            . '<p><b>Prezado (a)</b> '. ucfirst($dataEmail['email_nome']).', <br>Recebemos seu cadastro e desde já agradecemos o breve retorno.</p>'
            . '<p>Sua ficha cadastral passará por um processo de validação e atendendo aos nossos critérios, estaremos inserindo estas informações em nosso sistema, para prosseguirmos com a confecção de seus dispositivos. </p>'
            . '<p>As informações poderão ser conferidas e alteradas na data da validação do cadastro, aonde nosso consultor irá ate o condomínio para tiragem de duvidas bem como conferencia e consolidação do cadastro das unidades.</p>'
            . '<br><br><p>Atenciosamente, <br>'. ucfirst($dataEmail['vendedor']).'</p>'
            . '<p><b>Esta é uma mensagem gerada automaticamente, portanto não pode ser respondida.</b></p>'
        );
        
        $this->email->attach($dataEmail['anexo']); //anexar arquivo.
        if($this->email->send()){
            return true;
        }else{
           return false;
        }
    }
    
    /**
     * This is a Summary.
     * 
     * This is a Description.  Responsavel por gerar o  Arquivo PDF.
     * @paramn Object Mpdf
     * @return   .pdf  
     */
    public function GerarPDF($destino_arquivo){
        require_once  '/vendor/autoload.php';
        $mpdf = new Mpdf\Mpdf(['utf-8',]); 
        $mpdf->WriteHTML($this->GerarHtml());
        //$mpdf->AddPage();
        $mpdf->Output($destino_arquivo, \Mpdf\Output\Destination::FILE);
    }
    
    /**
     * This is a Summary.
     * 
     * This is a Description.  Responsavel por gerar o HTML do corpo do Arquivo PDF.
     * @paramn Session  $_SESSION 
     * @return   String  de html
     */
    public function GerarHtml($dados_session){
        $html ='';
        $_br_down ='';
        $_br_up ='';
        $_dados = $dados_session;        
        $total_usuario = count($_dados['DADOS']['usuario']) ;
        $total_funcioanrio = count($_dados['DADOS']['funcionario']);
        $total_veiculo = count($_dados['DADOS']['veiculo']);
        $total_dados =  ($total_usuario + $total_funcioanrio +$total_veiculo);
        $t_u_f =  $total_usuario + $total_funcioanrio;
        if( ($t_u_f === 4 && $total_veiculo===0)){
            $_br_up = '<br><br><br><br><br><br><br><br><br><br><br><br>';
            $_br_down = '<br><br><br><br>';
        }  
        if(
            ($t_u_f === 3 && $total_veiculo===2) || 
            ($t_u_f === 2 && $total_veiculo===2) || 
            ($t_u_f === 1 && $total_veiculo===2) ||
            ($t_u_f === 3 && $total_veiculo===1) ||
            ($t_u_f === 1 && $total_veiculo===1) ||
            ($t_u_f === 2 && $total_veiculo===1) ||
            ($t_u_f >4 && $total_veiculo===0) ||
            ($t_u_f === 2 && $total_veiculo===0) ||
            ($t_u_f === 1 && $total_veiculo===0) ||
            ($t_u_f === 2 && $total_veiculo >=3) || 
            ($t_u_f >= 3 && $total_veiculo >=1)  || 
            ($t_u_f >= 3 && $total_veiculo >=0) 
                    
        ){
            $_br_down = '<br><br><br><br>';
        }  
        
        if(($t_u_f === 3 && $total_veiculo>=3)){
            $_br_up = '<br><br><br><br><br><br><br><br><br><br><br><br>';
            $_br_down = '<br><br><br><br>';
        }  
        
        $html.='<style>
                    ._text_center{text-align:center}
                    ._text_right{text-align:right}
                    ._table{width:710px; border:0px solid; margin-bottom:5px; margin-left:30px } 
                    ._td_border{border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
                    #title{ width:100%;background:#033060; padding: 10px  0 10px 30px; font-size:12px;font-weight: lighter;font-family:Arial,sans-serif; color:#fff; margin-bottom:10px}
                    table{font-size:11px;font-family:Arial,sans-serif; font-weight: lighter;}
                    td{padding:2px}
                </style>';
        /*
         * CADASTRO DE CONDOMINO :
         */
        $html .='<h1 id="title"> FICHA CADASTRAL DE CLIENTE PORTARIA VIRTUAL </h1>';             
        $html .='<table class="_table">
                    <tr>
                        <td width="70" class="" ><b>CONDOMÍNIO:</b></td>
                        <td width="420" class="_td_border">'.strtoupper($_dados['CONDOMINIO']->nome).'</td>	
                        <td width="60" class="_text_center"><b>'.strtoupper($_dados['DADOS']['imovel']->descricao).':</b></td>
                        <td width="110" class="_td_border _text_center">'.$_dados['DADOS']['imovel']->numero.'</td>
                    </tr>
                </table>    
                <table class="_table">
                   <tr>
                       <td width="60"><b>INQUILINO:</b></td>
                       <td width="25"  class="_td_border _text_center">';if($_dados['DADOS']['imovel']->situacao_responsavelCadastro=='1'){$html.='X'; }$html.='</td>	
                       <td width="120" style="text-align:right"><b>PROPRIETÁRIO:</b></td>
                       <td width="25"  class="_td_border _text_center">';if($_dados['DADOS']['imovel']->situacao_responsavelCadastro=='2'){$html.='X'; }$html.='</td>
                       <td width="120" style="text-align:right"><b>DATA CADASTRO:</b></td>
                       <td width="90" class="_td_border">'.date('d/m/Y', strtotime($_dados['CONDOMINIO']->dataCriacao)).'</td>
                       <td width="230"> </td>
                   </tr>
                </table>
                <table class="_table">
                    <tr>
                        <td width="110"><b>SENHA(PERGUNTA):</b></td>
                        <td width="180" class="_td_border">'. strtoupper($_dados['DADOS']['imovel']->senha).'</td>	
                        <td width="160" style="text-align:right"><b>CONTRA-SENHA(RESPOSTA):</b></td>
                        <td width="200" class="_td_border">'. strtoupper($_dados['DADOS']['imovel']->senha).'</td>
                    </tr>
                </table>';
            /*
             * CADASTRO DE USUARIO :
             */
            foreach($_dados['DADOS']['usuario'] as $K=> $USUARIO){
                $dataNascimento = date('d/m/Y', strtotime($USUARIO['data_nascimento']));  
                $relacao_responsavel = ($USUARIO['relacao_responsavel'])? $USUARIO['relacao_responsavel']:'';  
                $responsavel = ($USUARIO['responsavel']=='n')?'NÃO':'SIM';
                $html .='
                <table class="_table">
                    <tr>
                        <td style="font-size:12px"><b>CADASTRO DE USUÁRIO '.($K+1).'</b></td>
                    </tr>
                </table>
                <table cellspacing="2" style="width:700px; border:1px solid; margin:0 0 8px 34px;font-family:Arial,sans-serif; font-weight: lighter;">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="100">NOME COMPLETO:</td>
                                    <td width="362"  class="_td_border">'.strtoupper($USUARIO['nome']).'</td>	
                                    <td width="130" class="_text_center">DATA NASCIMENTO:</td>
                                    <td width="100"  class="_td_border">'.$dataNascimento.'</td>
                                </tr> 
                            </table> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="170">RESPONSÁVEL PELO IMÓVEL ?:</td>
                                    <td width="50" class="_td_border _text_center">'.$responsavel.'</td>
                                    <td width="170" class=" _text_center">RELAÇÃO COM RESPONSÁVEL:</td>
                                    <td width="300" class="_td_border">'.$relacao_responsavel.'</td>	
                                </tr> 
                            </table> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="40">EMAIL:</td>
                                    <td width="270" class="_td_border">'.$USUARIO['email'].'</td>	
                                    <td width="94" class="_text_center">CONTATO 01:</td>
                                    <td width="104" class="_td_border">'.$USUARIO['telefone'].'</td>	
                                    <td width="80" class="_text_center">CONTATO 02:</td>
                                    <td width="104" class="_td_border">'.$USUARIO['celular'].'</td>	
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <table>
                                <tr>
                                    <td width="130">TAG ECLUSA PEDESTRE:</td>
                                    <td width="40" class="_td_border _text_center">'.$USUARIO['tag_eclusa'].'</td>	
                                    <td>UNIDADES</td>	
                                    <td width="250" class="_text_right">CONTROLE PORTÃO VEÍCULOS:</td>
                                    <td width="40" class="_td_border _text_center">'.$USUARIO['controle_portao'].'</td>	
                                    <td>UNIDADES</td>	
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <table>
                                <tr>
                                    <td width="60">ACESSO:</td>';
                                    foreach ($this->UsuarioModel->getAcesso($USUARIO['id_usuario']) as $k => $acesso) {
                                        $html.='<td width="22" class="_td_border _text_center">X</td><td width="90" >'.$acesso['acesso'].'</td>';
                                    }$html.=' 
                                </tr>
                            </table>   
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <table>
                                <tr>
                                    <td>OBSERVAÇÃO:</td>
                                </tr>
                                <tr>
                                    <td class="_td_border" style="width:692; height:30px ;">'.$USUARIO['obs'].'</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>';
            }
        
            /*
             * CADASTRO DE FUNCIONARIO :
             */        
            
            
             $html .= $_br_up;
            foreach($_dados['DADOS']['funcionario'] as $K=> $FUNCIONARIO){
                $html .='
                <table class="_table">
                    <tr>
                        <td style="font-size:12px"><b>CADASTRO DE FUNCIONÁRIO ' .($K+1). '</b></td>
                    </tr>
                </table>
                <table cellspacing="2" style="width:700px; border:1px solid; margin:0 0 8px 34px;font-family:Arial,sans-serif; font-weight: lighter;">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="100">NOME COMPLETO:</td>
                                    <td width="402"  class="_td_border">'.strtoupper($FUNCIONARIO['nome']).'</td>	
                                    <td width="70" style="text-align:center">RG/CPF:</td>
                                    <td  width="120"  class="_td_border">'.strtoupper($FUNCIONARIO['rg_cpf']).'</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="110">TIPO DE SERVOÇO:</td>
                                    <td width="402"  class="_td_border">'.strtoupper($FUNCIONARIO['tipo_servico']).'</td>
                                    <td width="70" class="_text_center">CONTATO:</td>
                                    <td width="110"  class="_td_border">'.$FUNCIONARIO['telefone'].'</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="120">DIA / HORÁRIO:</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <table>
                                <tr>';
                                    foreach($this->FuncionarioModel->getAgenda($FUNCIONARIO['id_funcionario']) as $k =>$diaAcesso) {
                                        $html.='<td width="20" class="_td_border _text_center">X</td><td width="75">'.$diaAcesso['abreviado'].'/' .$diaAcesso['horario'].'</td>';
                                    }$html.='
                                </tr>
                            </table>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <table>
                                <tr>
                                    <td>OBSERVAÇÃO:</td>
                                </tr>
                                <tr>
                                    <td class="_td_border" style="width:692px; height:30px ;">'.$FUNCIONARIO['obs'].'</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>';
           }
           
            /*
             * CADASTRO DE VEICULO :
             */
             if($_dados['DADOS']['veiculo']){ 
                $html .= $_br_up;
                $html .='
                <table class="_table">
                    <tr>
                        <td style="font-size:12px"><b>CADASTRO DE VEÍCULO </b></td>
                    </tr>
                </table>';
                foreach($_dados['DADOS']['veiculo'] as $K=> $VEICULO){      
                    $html.='
                    <table cellspacing="2" style="width:700px; border:1px solid; margin:0 0 8px 34px;font-family:Arial,sans-serif; font-weight: lighter;">
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td width="40">PLACA:</td>
                                        <td width="80" class="_td_border">'.$VEICULO['placa'].'</td>	
                                        <td width="100" class="_text_center">MARCA/MODELO:</td>
                                        <td width="210" class="_td_border">'.$VEICULO['marca'].'-'.$VEICULO['modelo'].'</td>	
                                        <td width="42" class="_text_center">ANO:</td>
                                        <td width="60" class="_td_border">'.$VEICULO['ano'].'</td>	
                                        <td width="40" class="_text_center">COR:</td>
                                        <td width="120" class="_td_border">'.$VEICULO['cor'].'</td>	
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>';
                }
            }
            /*
             * ASSINATURA :
             */ 
            
            $html .= $_br_down;
            $html .='
            <table width="700" style="margin-left:35px">
                <tr>
                    <td width="240" class="_text_center" style="border-top:1px solid; font-size:12px; padding-top:10px"><b>VENDEDOR:</b> 2342343243223 23423432</td>	
                    <td width="80"></td>	
                    <td width="240" class="_text_center" style="border-top:1px solid;font-size:12px; padding-top:10px"><b>RESPONSÁVEL:</b>'. strtoupper($_dados['DADOS']['imovel']->nome_responsavelCadastro).'<br> <b>CPF:</b> '.$_dados['DADOS']['imovel']->cpf_responsavelCadastro.'</td>	
                </tr>
            </table>';
       return $html;
            
    }//EndGerarHtml.   
}
