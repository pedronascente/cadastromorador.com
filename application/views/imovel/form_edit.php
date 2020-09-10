<?php 
//namespace  C:\wamp\www\cadastro\application\views\imovel\form_edit.php
$sessao_usuario  = @$_SESSION['usuario'];
if($sessao_usuario){
    if( $sessao_usuario->grupo_descricao=='administrador' || $sessao_usuario->grupo_descricao=='vendedor'){
        $contexto = 'admin';
    }else{
        $contexto = 'site';
    }
}
else{
    $contexto = 'site';
}
if($contexto=='admin'){
    $this->load->view('layout/admin/header');   
    $_rota = 'admin';
    echo '<div id="content-header">
            <div id="breadcrumb"> 
                <a href=" '.base_url("/dashboard").' " title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
                <a href="javascript:void(0)"  class="tip-bottom">Cadastro</a> 
                <a href="javascript:void(0)" class="current">Condominio</a>
            </div>
         </div>';   
}else{
    $this->load->view('layout/site/header');
    $_rota = 'site';
    echo '<div id="content-header-cliente">
            <div id="breadcrumb"> 
                <a href="'.base_url("/site").'" title="Cancelar Cadastro" class="tip-bottom"><i class="icon-chevron-left"></i>  Voltar </a> 
                <a href="javascript:void(0)" class="current">Editar Imóvel</a>
            </div>
        </div>';  
    echo '<div class="container-fluid">
            <div class="row-fluid">
                <div class="span12"> <h1><img src="'.base_url("assets/img/logo2.png").'" alt="img::Logo Marca"></h1></div>
            </div>
        </div>';
}
?>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Editar  Imóvel</h5>
        </div>
        <div class="widget-content ">
            <form  action="<?=base_url('imovel/update') ?>" method="post"  id="basic_validate_imovel" novalidate="novalidate" name="FORMULARIO_EDITAR_IMOVEL">        
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group ">
                            <label class="control-label"><b>Tipo Imóvel:</b></label>
                            <div class="controls">
                                <select  name="array_imovel[tipo_imovel_id_tipo_imovel]"  class="span12"   required=""  >
                                    <?php
                                        if (!empty($_arraySelectTipoImovel)) {
                                            for ($i = 0; $i < count($_arraySelectTipoImovel); $i++) {
                                                $_select = ($_arraySelectTipoImovel[$i]['id_tipo_imovel']==$object_imovel->tipo_imovel_id_tipo_imovel)?'selected':'';
                                                echo '<option  value="' . $_arraySelectTipoImovel[$i]['id_tipo_imovel'] . '"   '.$_select.'   >' . $_arraySelectTipoImovel[$i]['descricao'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="control-group _control-group-right ">
                            <label class="control-label"><b>Número:</b></label>
                            <div class="controls">
                                <input type="text" name="array_imovel[numero]"  class="span12"  maxlength="5"  value="<?php echo $object_imovel->numero_imovel;?>" required=""  >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Senha:</b></label>
                            <div class="controls">
                                <input type="text" name="array_imovel[senha]"  maxlength="200"   class="span12"  value="<?php echo $object_imovel->senha;?>" required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="control-group ">
                            <label class="control-label"><b>Contra Senha:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_imovel[contra_senha]"   maxlength="200"   class="span12"  value="<?php echo $object_imovel->contra_senha;?>"  required="">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="alert">
                            <button class="close" data-dismiss="alert">×</button>
                            <strong>Atenção!</strong> Preencha abaixo os dados referente ao Responsável por efetuar este cadastro. 
                        </div>
                    </div> 
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Nome:</b></label>
                            <div class="controls">
                                <input type="text" name="array_imovel[nome_responsavelCadastro]"  maxlength="200"   class="span12" value="<?php echo $object_imovel->nome_responsavelCadastro;?>" required="" >
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Email:</b> </label>
                            <div class="controls">
                                <input type="email" name="array_imovel[email_responsavelCadastro]"  maxlength="200"   class="span12"   value="<?php echo $object_imovel->email_responsavelCadastro;?>" required="" >
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label"><b>CPF:</b> </label>
                            <div class="controls">
                                <input type="text" name="array_imovel[cpf_responsavelCadastro]"  maxlength="20"   class="span12 _cpf  _validar_cpf"  value="<?php echo $object_imovel->cpf_responsavelCadastro;?>" required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone:</b> </label>
                            <div class="controls">
                                <input type="text" name="array_imovel[telefone_responsavelCadastro]"  maxlength="20"   class="span12 _mask_telefone"  value="<?php echo $object_imovel->telefone_responsavelCadastro;?>" required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label"><b>Situação:</b> </label>
                            <div class="controls">
                                <select  name="array_imovel[situacao_responsavelCadastro]"  class="span12"  id="_situacao_responsavelCadastro" required=""  >
                                    <option value="1" <?php echo ( $object_imovel->situacao_responsavelCadastro=='1')?'selected' :'' ;?> >Inquilino</option>
                                    <option value="2" <?php echo ( $object_imovel->situacao_responsavelCadastro=='2')?'selected' :'' ;?> >Proprietário</option>
                                </select>
                            </div>
                        </div> 
                    </div>   
                </div>            
                <input type="hidden"  name="array_imovel[id_imovel]" class="span12"  value="<?=$object_imovel->id_imovel;?>" >
                <input type="hidden"  name="_rota" class="span12"  value="<?=$_rota;?>" >
                <div class="row-fluid">
                    <div class="span6">
                        <input type="submit" value="Salvar" class="btn  btn-danger ">
                    </div>
                </div>
            </form>     
        </div>
    </div>
</div>
<?php  
$this->load->view('layout/site/footer');