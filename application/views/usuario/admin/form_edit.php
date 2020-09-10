<?php  //namespace C:\wamp\www\cadastro\application\views\usuario\admin\form_edit.php ?>
<?php $this->load->view('layout/admin/header');?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard') ; ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)" class="current">Editar Usuário</a>
    </div>
</div>
<?php  if(isset($ERROR['ERROR']['error'])):?>
    <div class="alert">
        <button class="close" data-dismiss="alert">×</button>
        <strong>Atenção!</strong>  Seus dados foram alterados com sucesso,  Menos sua Imagem. <?=$ERROR['ERROR']['error'];?> 
    </div>
<?php endif; ?>
<?php  if(isset($ERROR['ERROR']['sucess'])):?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">×</button>
        <strong>Success!</strong> <?=$ERROR['ERROR']['sucess'];?>
    </div>  
<?php endif;?>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Editar Usuário</h5>
        </div>
        <div class="widget-content ">
            <form  name="FORM_ADMIN_EDIT_USUARIO"  action="<?=base_url('/usuario/'.$object_usuario->id_usuario.'/edit_admin'); ?>"  method="post"  id="basic_validate_usuario" novalidate="novalidate" enctype="multipart/form-data"  >       
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Nome:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[nome_usuario]"  class="span12" value="<?=$object_usuario->nome_usuario; ?>" required="" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12" >
                        <div class="control-group">
                            <label class="control-label"><b>E-mail:</b></label>
                            <div class="controls">
                                <input type="email" name="array_usuario[email]"  class="span12"    value="<?=$object_usuario->email ;?>"  required="">
                            </div> 
                        </div> 
                    </div>
                </div> 
                <div class="row-fluid">
                    <div class="span8">
                        <div class="control-group">
                            <label class="control-label"><b>Data Nascimento:</b></label>
                            <div class="controls">
                                <div  data-date="12-12-2012" class="input-append " >
                                    <input type="text" name="array_usuario[data_nascimento]"   id="mask-date"  data-dataNascimento="data_nascimento"     data-date-format="dd-mm-yyyy" class="span12 mask"  value="<?php echo  date('d/m/Y', strtotime($object_usuario->data_nascimento)); ?>"   required="" >
                                    <span class="add-on"><i class="icon-th"></i></span> 
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Ativo</label>
                            <div class="controls">
                                <label>
                                    <input type="checkbox" name="array_usuario[ativo]" <?=($object_usuario->ativo=='on')?'checked':''; ?>   value="on" />
                                </label>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Usuário:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[usuario]"  class="span12"  value="<?=$object_usuario->usuario; ?>"   id="usuario_usuario"  required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Senha:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[senha]"  class="span12"    value="" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 1:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[telefone]"  class="span12 _mask_telefone"   value="<?=$object_usuario->telefone; ?>"   required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 2:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[celular]"  class="span12 _mask_telefone"    value="<?=$object_usuario->celular ;?>"  >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>CPF:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[cpf_usuario]"  class="span12 _cpf _validar_cpf"  value="<?=$object_usuario->cpf_usuario; ?>"   required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>RG:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[rg_usuario]"  class="span12 " value="<?=$object_usuario->rg_usuario ;?>"  >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6" >
                        <div class="control-group">
                           <label class="control-label"><b>Grupo Usuário: </b></label>
                            <div class="controls">
                                <select name="array_grupo_usuario[id_grupo]"   id="usuario_grupo" class="span12">
                                    <option value="">-- Clique aqui pra alterar Grupo --</option>
                                    <option value="1" <?=($object_usuario->id_grupo=='1') ?'selected':'';?> >Administrador</option>
                                    <option value="2" <?=($object_usuario->id_grupo=='2') ?'selected':'';?> >Vendedor</option>
                                </select>
                            </div> 
                        </div> 
                    </div>   
                </div> 
                 <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label">
                                <img src="<?=  base_url($object_usuario->url_image);?>"  width="140" alt="<?=$object_usuario->url_image;?>">
                            </label>
                        </div> 
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><b>Selecione sua Foto no formato:( jpg, png).</b></label>
                    <div class="controls">
                       <input type="file" name="arquivo" size="16" />
                    </div>
                </div>
                <br>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Observações:</b></label>
                            <div class="controls">
                                <textarea class="span12" name="array_usuario[obs]" id="usuario_obs"  rows="5" ><?=$object_usuario->obs ;?></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="array_usuario[tipo_usuario_id_tipo_usuario]" value="1">
                <input type="hidden" name="array_usuario[id_usuario]" value="<?=$object_usuario->id_usuario;?>">
                <div class="row-fluid ">
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
<?php  $this->load->view('layout/admin/footer');