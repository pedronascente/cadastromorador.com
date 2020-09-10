<?php  
//namespace C:\wamp\www\cadastro\application\views\usuario\site\form_edit.php
$sessao_usuario = @$_SESSION['usuario'];
if($sessao_usuario){
    if( $sessao_usuario->grupo_descricao=='administrador' || $sessao_usuario->grupo_descricao=='vendedor'){
        $contexto = 'admin';
    }else{
        $contexto = 'site';
    }
}else{
    $contexto = 'site';
}
if($contexto=='admin'){
    $this->load->view('layout/admin/header');   
    $_rota = 'admin';
    echo '<div id="content-header"> <div id="breadcrumb">  <a href=" '.base_url("/dashboard").' " title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a>  <a href="javascript:void(0)"  class="tip-bottom">Editar</a>  <a href="javascript:void(0)" class="current">Usuário</a> </div> </div> ';
}else{
    $this->load->view('layout/site/header');
    $_rota = 'site';
    echo '<div id="content-header-cliente"><div id="breadcrumb"> <a href="'.base_url("/site").'" title="Cancelar Cadastro" class="tip-bottom"><i class="icon-chevron-left"></i>  Voltar </a> <a href="javascript:void(0)" class="current">Editar Usuário</a></div></div>';   
    echo '<div class="container-fluid"><div class="row-fluid"><div class="span12"> <h1><img src="'.base_url("assets/img/logo2.png").'" alt="img::Logo Marca"></h1></div></div></div>';    
}
?>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Editar Usuário</h5>
        </div>
        <div class="widget-content ">
            <form   name="FORM_SITE_EDITAR_USUARIO"   id="basic_validate_usuario"  action="<?=base_url('/usuario/update_site'); ?>" novalidate="novalidate" method="post" >         
                <div class="row-fluid">
                    <div class="span9">
                        <div class="control-group">
                            <label class="control-label"><b>Nome:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[0][nome_usuario]"  class="span12" value="<?=$object_usuario->nome_usuario;?>" required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>Data Nascimento</b></label>
                            <div class="controls">
                                <div  data-date="12-12-2012" class="input-append date" > 
                                    <input type="text" name="array_usuario[0][data_nascimento]"   id="mask-date"  data-date-format="dd-mm-yyyy" class="span12 mask"  value="<?= date('d/m/Y', strtotime($object_usuario->data_nascimento))?>"   required="" >
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
                                <input type="email" name="array_usuario[0][email]"  class="span12"   value="<?=$object_usuario->email;?>"  required="">
                            </div> 
                        </div> 
                    </div>
                </div>    
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>Respossável pelo Imóvel?</b></label>
                            <div class="controls">
                                <select name="array_usuario[0][responsavel]" class="text-center span12  _selectResponsavelPeloImovel"  required="">
                                    <option value="s" <?=($object_usuario->responsavel == 's')?'selected':'';?>>Sim</option>
                                    <option value="n" <?=($object_usuario->responsavel=='n')?'selected':'';?>>Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5 selectRelacaoResponsavel" <?=($object_usuario->responsavel=='n')?'style="display:block"':'style="display:none"';?> >
                        <div class="control-group">
                            <label class="control-label"><b>Relação Responsável</b></label>
                            <div class="controls">
                                <select name="array_usuario[0][relacao_responsavel_id_relacao_responsavel]" id="_selectRelacaoComResponsavel" required="" >
                                    <?php
                                        if (!empty($_arraySelectRelacaoResponsavel)) {
                                            for ($i = 0; $i < count($_arraySelectRelacaoResponsavel); $i++) {
                                                $value = ( $_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel']=='1'|| $_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel']=='10')?'':$_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel'];
                                                $selected_relacao_responsavel = ($object_usuario->relacao_responsavel_id_relacao_responsavel == $_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel'])?'selected':'';
                                                echo ' <option  value="' . $value . '" '.$selected_relacao_responsavel.'  >' . $_arraySelectRelacaoResponsavel[$i]['descricao'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>   
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span5  _select_tipo_responsavel" <?=($object_usuario->responsavel=='s')?'style="display:block"':'style="display:none"';?>  >
                        <div class="control-group">
                            <label class="control-label"><b>Tipo de Responsável</b></label>
                            <div class="controls">
                                <select name="array_usuario[0][departamento]" id="" required="" >
                                    <option value="1" <?=($object_usuario->departamento=='1')?'selected':'';?> >PROPRIETÁRIO</option>
                                    <option value="2" <?=($object_usuario->departamento=='2')?'selected':'';?> >INQUILINO</option>
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
                                    for ($i = 0; $i <= 10; $i++) {
                                        $_select_tag_eclusa  =($object_usuario->tag_eclusa == $i)?'selected':''; 
                                        echo "<option value=\"{$i}\"    {$_select_tag_eclusa}   >{$i}</option>";
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
                                            $_select_controle_portao  =($object_usuario->controle_portao == $i)?'selected':''; 
                                            echo "<option value=\"{$i}\"   {$_select_controle_portao}    >{$i}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
                <br>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 1:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[0][telefone]"    class="span12 _mask_telefone"  id="usuario_telefone"  value="<?=$object_usuario->telefone;?>"  required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 2:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[0][celular]"  class="span12 _mask_telefone"  id="usuario_celular"   value="<?=$object_usuario->celular;?>" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>CPF:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[0][cpf_usuario]"  class="span12 _cpf _validar_cpf"  value="<?=$object_usuario->cpf_usuario; ?>"   required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>RG:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[0][rg_usuario]"  class="span12 " value="<?=$object_usuario->rg_usuario ;?>"  >
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
                                        for($i=0;$i<count($_arrayCheckBoxAcesso);$i++){?>
                                            <label style="display:inline; margin:20px 25px 0 0">
                                                <input type="checkbox"  name="array_usuario[1][acesso][]"      
                                                   <?php
                                                        foreach ($_arrayAcessoUsuario as $k=> $v){
                                                            if($_arrayCheckBoxAcesso[$i]['id_acesso']==$v['id_acesso']){
                                                                  echo 'checked';
                                                             }
                                                         }
                                                   ?>
                                                value="<?=$_arrayCheckBoxAcesso[$i]['id_acesso']?>" required=""  /> <?=$_arrayCheckBoxAcesso[$i]['descricao'];?>
                                            </label>
                                            <?php    
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
                                <textarea class="span12"  name="array_usuario[0][obs]" id="usuario_obs"  rows="5" ><?php echo  $object_usuario->obs;?></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="array_usuario[0][id_usuario]" value="<?= $object_usuario->id_usuario; ?>">
                <input type="hidden" name="array_usuario[0][imovel_id_imovel]" value="<?= @$_SESSION['DADOS']['imovel']->id_imovel; ?>">
                <input type="hidden" name="array_usuario[0][tipo_usuario_id_tipo_usuario]" value="3">
                <input type="hidden" name="_rota" class="span12"  value="<?=$_rota;?>" >
                <div class="row-fluid  ">
                    <div class="span12">
                        <div class="control-group ">
                            <input type="submit"    value="Salvar" class="btn  btn-danger ">
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