<?php  //namespace C:\wamp\www\cadastro\application\views\fichaCadastral\visualizar-dados.php ?>
<div class="widget-box">
    <div class="widget-title"> 
        <span class="icon"> <i class="icon-th"></i> </span>
        <span class="label label-info  text-left"> FICHA CADASTRAL PORTARIA VIRTUAL</span> 
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr><td><b>Condomínio : </b> <?=$_condominio->nome; ?></td><td><b>Token : </b>   <?=$_condominio->token; ?></td></tr>
            </tbody>
        </table>
    </div>
</div>   
<div class="widget-box">
    <div class="widget-title"> 
        <h5>IMÓVEL</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td><b>Tipo Imóvel:</b>  <br><?=$_imovel['objetoImovel']->descricao; ?></td>
                    <td colspan="2"><b>Número:</b>  <br><?=$_imovel['objetoImovel']->numero; ?></td>
                </tr>
                <tr>
                    <td><b>Senha:</b>  <br><?=$_imovel['objetoImovel']->senha; ?> </td>
                    <td colspan="2"><b>Contra - Senha :</b> <br> <?=$_imovel['objetoImovel']->contra_senha; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><b>Responsável:</b> <br><?= $_imovel['objetoImovel']->nome_responsavelCadastro; ?></td>
                </tr>
                <tr>
                     <td colspan="3"><b>Email: </b> <br><?= $_imovel['objetoImovel']->email_responsavelCadastro; ?></td>
                </tr>
                <tr>
                    <td><b>Situação: </b><br><?= ($_imovel['objetoImovel']->situacao_responsavelCadastro == '1') ? 'Inquilino' : 'Proprietario'; ?></td>
                    <td><b>CPF: </b><br><?= $_imovel['objetoImovel']->cpf_responsavelCadastro; ?></td>
                    <td><b>Telefone: </b><br><?= $_imovel['objetoImovel']->telefone_responsavelCadastro; ?></td>
                </tr>
            </tbody>
        </table>
    </div>   
</div>
<?php if (NULL != $_dados['usuario']) { ?>
    <div class="widget-box">
        <div class="widget-title"> 
            <h5>USUÁRIO</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php
                    foreach ($_dados['usuario'] as $k => $usuario) {
                        $responsavel = ($usuario['responsavel'] == 'n') ? 'Não' : 'Sim';
                        $dataNascimento = isset($usuario['data_nascimento']) ? date('d/m/Y', strtotime($usuario['data_nascimento'])) : '';
                        ?>
                        <tr>
                            <td><b><?=($k+1)?> ) Usuário:</b><br><?=$usuario['nome_usuario']; ?></td>
                            <td><b>Data Nascimento:</b><br><?=$dataNascimento; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tipo Usuário:</b><br><?=$usuario['tipo_usuario']; ?> </td>
                            <td><b>Responsável pelo Imóvel ? :</b><br><?=$responsavel; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Relação Responsavel:</b><br><?= $usuario['relacao_responsavel']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Email:</b><br><?=$usuario['email']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Telefone 1:</b><br><?=$usuario['telefone']; ?></td>
                            <td><b>Telefone 2:</b><br><?=$usuario['celular']; ?></td>
                        </tr>
                        <tr>
                            <td><b>CPF :</b><br><?=$usuario['cpf_usuario']; ?></td>
                            <td><b>RG :</b><br><?=$usuario['rg_usuario']; ?></td>
                        </tr>
                        
                        <tr>
                            <td><b>Tag Eclusa:</b><br><?=$usuario['tag_eclusa']; ?></td>
                            <td><b>Controle Portão:</b><br><?=$usuario['controle_portao']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Observações:</b><br><?=$usuario['obs']; ?> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Lista de Acesso:</b><br></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <ul>
                                    <?php foreach ($this->UsuarioModel->getAcesso($usuario['id_usuario']) as $k => $acesso) { ?>
                                        <li><?=$acesso['acesso'] ?></li>
                                    <?php } ?>
                                </ul>  
                            </td>   
                        </tr>       
                        <tr>
                            <td colspan="2" style="background:#efefef">&zwj;</td> 
                        </tr>
                    <?php } ?>
                </tbody>    
            </table>
        </div>   
    </div>
<?php } ?>
<?php if (NULL != $_dados['funcionario']) { ?>
    <div class="widget-box">
        <div class="widget-title"> 
            <h5>FUNCIONÁRIO</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php foreach ($_dados['funcionario'] as $k => $funcionario) { ?>
                        <tr>
                            <td colspan="2"><b><?=($k+1)?> ) Funcionário:</b><br><?= $funcionario['nome']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tipo de Serviço:</b><br><?=$funcionario['tipo_servico']; ?></td>
                            <td><b>Telefone:</b><br><?=$funcionario['telefone']; ?></td>
                        </tr>                           
                        <tr>
                            <td><b>CPF:</b><br><?=$funcionario['cpf_funcionario']; ?></td>
                            <td><b>RG:</b><br><?=$funcionario['rg_funcionario']; ?></td>
                        </tr>                           
                        <tr>
                            <td colspan="2"><b>Observação:</b><br><?=$funcionario['obs']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Acesso(s) Liberado: </b></td> 
                        </tr>
                        <tr>
                            <td colspan="2">
                                <ul>
                                    <?php 
                                        if($this->DiaAcessoModel->getAgenda($funcionario['id_funcionario'])){
                                            foreach ($this->DiaAcessoModel->getAgenda($funcionario['id_funcionario']) as $k => $diaAcesso) { ?>
                                               <li><?= $diaAcesso['horario']; ?>  -  <?= $diaAcesso['extenso']; ?> </li> <?php 
                                            }
                                        }else{
                                            echo 'Funcionário não possui Permissão de Acesso .';
                                        }
                                    ?>                                       
                                </ul> 
                            </td>
                        </tr>
                        <tr><td colspan="3"  style="background: #efefef"> &zwj;</td></tr>
                    <?php } ?>    
                </tbody>
            </table>
        </div>   
    </div>   
<?php } ?>
<?php if (NULL != $_dados['veiculo']) { ?>
    <div class="widget-box">
        <div class="widget-title"> 
            <h5>VEÍCULO</h5>
        </div>
        <div class="widget-content nopadding  " >
            <table class="table table-bordered table-striped"  >
                <tbody>
                    <?php for ($i = 0; $i < count($_dados['veiculo']); $i++) { ?>
                        <tr>
                            <td colspan="2"><b>Placa:</b><br><?=$_dados['veiculo'][$i]['placa']; ?></td>
                            <td colspan="1"><b>Ano:</b><br><?=$_dados['veiculo'][$i]['ano']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Marca:</b><br><?=$_dados['veiculo'][$i]['marca']; ?> </td>
                            <td><b>Modelo:</b><br><?=$_dados['veiculo'][$i]['modelo']; ?> </td>
                            <td><b>Cor:</b><br><?=$_dados['veiculo'][$i]['cor']; ?></td>
                        </tr>                           
                        <tr><td colspan="3"  style="background: #efefef"> &zwj;</td> </tr>                         
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
<?php } ?>
<div class="widget-box">
    <div class="widget-content ">
        <div class="form-actions text-center">
            <a href="<?= base_url('finalizar-cadastro') ?>" class="btn btn-primary" >Sim, Desejo Finalizar</a>
            <a href="<?= base_url() . $_rota; ?>" class="btn btn-danger" > Não. Quero Editar</a>
        </div>
    </div>
</div>
