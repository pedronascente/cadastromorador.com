<?php  //namespace C:\wamp\www\cadastro\application\views\usuario\admin\form_novo.php  ?>
<?php $this->load->view('layout/admin/header'); ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard') ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)" class="current">Cadastrar Usuário</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Cadastrar  Usuário</h5>
        </div>
        <div class="widget-content ">
            <div id="debug"></div>
            <form  name="FORM_ADMIN_NOVO_USUARIO" id="basic_validate_usuario"  action="<?= base_url('/usuario/create_a'); ?>"  novalidate="novalidate" method="post" >       
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Nome:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[nome_usuario]" id="usuario_nome_usuario"   class="span12" value="" required="" >
                            </div>
                        </div> 
                    </div>
                </div>
                 <div class="row-fluid">
                    <div class="span12" >
                        <div class="control-group">
                            <label class="control-label"><b>E-mail:</b></label>
                            <div class="controls">
                                <input type="email" name="array_usuario[email]"  class="span12"   value=""  required="">
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
                                    <input type="text" name="array_usuario[data_nascimento]"   id="mask-date"   data-date-format="dd-mm-yyyy" class="span12 mask"  value=""   required="" >
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
                                    <input type="checkbox" name="array_usuario[ativo]"   id="checkboxAtivo" value="on" >
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
                                <input type="text"  name="array_usuario[usuario]"  class="span12 "  value=""   id="usuario_usuario"  required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Senha:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[senha]"  class="span12"  value="" id="usuario_senha"  required="">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 1:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[telefone]"  class="span12 _mask_telefone"   value=""  required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="control-group">
                            <label class="control-label"><b>Telefone 2:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[celular]"  class="span12 _mask_telefone"  value="" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>CPF:</b></label>
                            <div class="controls">
                                <input type="text" name="array_usuario[cpf_usuario]"  class="span12 _cpf _validar_cpf"  value=""   required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label"><b>RG:</b></label>
                            <div class="controls">
                                <input type="text"  name="array_usuario[rg_usuario]"  class="span12 " value=""  >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6" >
                        <div class="control-group">
                            <label class="control-label"><b>Grupo Usuário:</b></label>
                            <div class="controls">
                                <select name="array_grupo_usuario[id_grupo]" class="span12" >
                                    <option value="1">Administrador</option>
                                    <option value="2" selected="">Vendedor</option>
                                </select>
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
                                <textarea class="span12"  name="array_usuario[obs]" rows="5" ></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden"  name="array_usuario[tipo_usuario_id_tipo_usuario]" value="1">
                <div class="row-fluid">
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
<?php  $this->load->view('layout/admin/footer');
