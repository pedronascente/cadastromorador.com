<?php  //namespace C:\wamp\www\cadastro\application\views\imovel\view_imovel.php ?>
<div class="widget-box">
    <div class="widget-title"> 
        <span class="icon">
            <?php
                if (empty($_imovel['objetoImovel']->id_imovel)) { ?> 
                    <a href="<?php echo base_url('imovel/novo');?>" title="Clique aqui para adicionar um Imóvel."  class="btn btn-mini btn-success"> Cadastrar</a> <?php 
                } else {
                    $id_imovel= (!empty($_imovel['objetoImovel']->id_imovel))?$_imovel['objetoImovel']->id_imovel:''; ?>
                    <a href="<?php echo base_url("imovel/{$id_imovel}/edit");?>"  title="Clique aqui para editar  Imóvel."  class="btn btn-mini btn-primary"><i class="icon-edit"></i> Editar</a> <?php 
                } 
            ?>
        </span>
        <h5>IMÓVEL</h5>
    </div>
    <?php 
    if (is_object($_imovel['objetoImovel'])) {
        $DESCRICAO = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->descricao:'';
        $NUMERO = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->numero:'';
        $SENHA = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->senha:'';
        $CONTRA_SENHA  = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->contra_senha:'';
        $NOME_RESPONSAVEL_CADASTRO  = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->nome_responsavelCadastro:'';
        $EMAIL = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->email_responsavelCadastro:'';
        $SITUACAO = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->situacao_responsavelCadastro:'';
        $CPF = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->cpf_responsavelCadastro:'';
        $TELEFONE = is_object($_imovel['objetoImovel'])?$_imovel['objetoImovel']->telefone_responsavelCadastro:'';
        ?> 
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td><b>Tipo Imóvel :</b> <br> <?=$DESCRICAO;?></td>
                        <td colspan="2"><b>Número :</b> <br> <?=$NUMERO;?></td>
                    </tr>
                    <tr>
                        <td><b>Senha :</b> <br> <?=$SENHA; ?></td>
                        <td colspan="2"><b>Contra - Senha :</b> <br><?=$CONTRA_SENHA; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Responsável pelo cadastro: </b><br> <?=$NOME_RESPONSAVEL_CADASTRO; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Email: </b> <br><?=$EMAIL; ?></td>
                    </tr>
                    <tr>
                        <td><b>Situação: </b> <br><?= ($SITUACAO == '1') ? 'Inquilino' : 'Proprietario'; ?></td>
                        <td><b>CPF: </b><br><?=$CPF; ?></td>
                        <td><b>Telefone: </b><br> <?=$TELEFONE; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>   
    <?php } ?>
</div>