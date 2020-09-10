<?php 
//namespace C:\wamp\www\cadastro\application\views\usuario\site\form_novo.php
$sessao_usuario=@$_SESSION['usuario'];
if($sessao_usuario){
    if( $sessao_usuario->grupo_descricao=='administrador' || $sessao_usuario->grupo_descricao=='vendedor'){
        $contexto="admin";
    }else{
        $contexto="site";
    }
}
else{
    $contexto="site";
}
if($contexto=='admin'){
    $this->load->view('layout/admin/header');   
    $_rota="admin";
    echo '<div id="content-header"> <div id="breadcrumb"> <a href="'.base_url("/dashboard").'" title="Ir para Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="javascript:void(0)"  class="tip-bottom">Cadastro</a> <a href="javascript:void(0)" class="current">Cadastrar Morador</a> </div> </div>';   
}else{
    $this->load->view('layout/site/header');
    $_rota="site";
    echo '<div id="content-header-cliente"> <div id="breadcrumb"><a href="'.base_url("/site").'" title="Cancelar Cadastro" class="tip-bottom"><i class="icon-chevron-left"></i> Voltar </a><a href="javascript:void(0)" class="current">Cadastrar Morador</a></div></div>';  
    echo '<div class="container-fluid"><div class="row-fluid"><div class="span12"> <h1><img src="'.base_url("assets/img/logo2.png").'" alt="img::Logo Marca"></h1></div> </div> </div>';
}
?>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Cadastrar Morador</h5>
        </div>
        <div class="widget-content ">
            <form   name="FORM_SITE_NOVO_USUARIO"  action="<?= base_url('/usuario/create_site'); ?>" id="basic_validate_usuario" novalidate="novalidate" method="post" >         
                <div class="row-fluid">
                    <div class="span9">
                        <div class="control-group">
                            <label class="control-label"><b>Nome:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[0][nome_usuario]" class="span12" value="" required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>Data Nascimento</b></label>
                            <div class="controls">
                                <div  data-date="12-12-2012" class="input-append date  " > 
                                    <input type="text" name="array_usuario[0][data_nascimento]" id="mask-date"  data-dataNascimento="usuario_data_nascimento" data-date-format="dd-mm-yyyy" class="span12 mask"  value=""   required="" >
                                    <!--span class="add-on"><i class="icon-th"></i></span--> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>E-mail:</b></label>
                            <div class="controls">
                                <input type="email" name="array_usuario[0][email]"  class="span12"  value=""  required="">
                            </div> 
                        </div> 
                    </div>
                </div>    
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>Responssável pelo Imóvel?</b></label>
                            <div class="controls">
                                 <select name="array_usuario[0][responsavel]" class="text-center span12  _selectResponsavelPeloImovel"  required="">
                                    <option value="" selected="">-- Selecione --</option>
                                    <option value="s">Sim</option>
                                    <option value="n">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5 selectRelacaoResponsavel" style="display:none" >
                        <div class="control-group">
                            <label class="control-label"><b>Relação com Responsável</b></label>
                            <div class="controls">
                                <select name="array_usuario[0][relacao_responsavel_id_relacao_responsavel]" id="_selectRelacaoComResponsavel" required="" >
                                    <?php
                                        if (!empty($_arraySelectRelacaoResponsavel)) {
                                            for ($i = 0; $i < count($_arraySelectRelacaoResponsavel); $i++) {
                                                $value = ( $_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel']=='1'|| $_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel']=='10')?'':$_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel'];
                                                echo ' <option  value="' . $value . '" >' . $_arraySelectRelacaoResponsavel[$i]['descricao'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>                    
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5  _select_tipo_responsavel"   style="display:none" >
                        <div class="control-group">
                            <label class="control-label"><b>Tipo de Responsável</b></label>
                            <div class="controls">
                                <select name="array_usuario[0][departamento]" id="_selectRelacaoComResponsavel" required="" >
                                    <option value="1">PROPRIETÁRIO</option>
                                    <option value="2">INQUILINO</option>
                                </select>                    
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>Tag Eclusa:</b></label>
                            <div class="controls">
                                <select class="span12 text-center" name="array_usuario[0][tag_eclusa]" id="_selectTagEclusa"  required="">
                                    <?php
                                        for ($i = 0; $i <= 10; $i++){
                                            echo "<option value=\"{$i}\">{$i}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>Controle Portão:</b></label>
                            <div class="controls">
                                <select class="span12 text-center" name="array_usuario[0][controle_portao]"  id="_selectControlePortao"   required="">
                                    <?php
                                    for ($i = 0; $i <= 10; $i++) {
                                        echo "<option value=\"{$i}\">{$i}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 1:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[0][telefone]"    class="span12 _mask_telefone"  required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 2:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[0][celular]"  class="span12 _mask_telefone"  id="usuario_celular" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>CPF:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[0][cpf_usuario]"  class="span12 _cpf _validar_cpf"  value=""   required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>RG:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[0][rg_usuario]"  class="span12 " value="">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Acesso:</b></label>
                            <div class="controls">
                               <?php               
                                    if(!empty($_arrayCheckBoxAcesso)){
                                        for($i=0;$i<count($_arrayCheckBoxAcesso);$i++){
                                            echo '<label style="display:inline; margin:20px 25px 0 0"><input type="checkbox" name="array_usuario[1][acesso][]" value="'.$_arrayCheckBoxAcesso[$i]['id_acesso'].'"   />'.$_arrayCheckBoxAcesso[$i]['descricao'].'</label>';
                                        }
                                    }       
                                ?>
                            </div>
                        </div> 
                    </div>
                </div>
                <br>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Observações:</b></label>
                            <div class="controls">
                                <textarea class="span12"  name="array_usuario[0][obs]" id="usuario_obs"  rows="5" ></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="array_usuario[0][imovel_id_imovel]" value="<?= @$_SESSION['DADOS']['imovel']->id_imovel; ?>">
                <input type="hidden" name="array_usuario[0][tipo_usuario_id_tipo_usuario]" value="3">
                <input type="hidden" name="_rota" class="span12"  value="<?=$_rota;?>" >
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group ">
                            <input type="submit"  value="Salvar" class="btn  btn-danger ">
                        </div> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  
<?php 
if($contexto=='site'){ 
    $this->load->view('layout/site/footer');
}else{
    $this->load->view('layout/admin/footer');
}        