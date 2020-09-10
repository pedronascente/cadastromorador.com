<?php $this->load->view('layout/admin/header');?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard') ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)"  class="tip-bottom">Editar Meu Perfil</a> 
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Editar Meu Perfil</h5>
        </div>
        <div class="widget-content ">
           <form  action="<?=base_url('usuario/updateMeuPerfil'); ?>" method="post"  id="basic_validate_usuario" novalidate="novalidate">                
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <label class="control-label"><b>Nome:</b></label>
                                <div class="controls">
                                    <input type="text" name="nome_usuario"  class="span12" value="<?=$object_usuario->nome_usuario; ?>" required="" >
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12" >
                            <div class="control-group">
                                <label class="control-label"><b>E-mail:</b></label>
                                <div class="controls">
                                    <input type="email" name="email"  class="span12"  value="<?=$object_usuario->email; ?>"  required="">
                                </div> 
                            </div> 
                        </div>
                    </div>    
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label"><b>Telefone 1:</b></label>
                                <div class="controls">
                                    <input type="text"  name="telefone" class="span12 _mask_telefone"   value="<?=$object_usuario->telefone; ?>" required="">
                                </div>
                            </div> 
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label"><b>Telefone 2:</b></label>
                                <div class="controls">
                                    <input type="text"  name="celular" class="span12 _mask_telefone"   value="<?=$object_usuario->celular; ?>"  required="">
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12" >
                            <div class="control-group">
                                <label class="control-label"><b>Usuário:</b></label>
                                <div class="controls">
                                    <input type="text" name="usuario" class="span12"  value="<?=$object_usuario->usuario; ?>"   required="">
                                </div> 
                            </div> 
                        </div>
                    </div>   
                    <div class="row-fluid">
                        <div class="span12" >
                            <div class="alert alert-warning">
                                <button class="close" data-dismiss="alert">×</button>
                                <strong>Atenção!</strong> Caso você  deixar o campo Senha em Branco, ela permanecerá a mesma.
                           </div>
                        </div>
                    </div>   
                    <div class="row-fluid">
                        <div class="span12" >
                            <div class="control-group">
                                <label class="control-label"><b>Senha:</b></label>
                                <div class="controls">
                                    <input type="text" name="senha"  class="span12"  value="" >
                                </div> 
                            </div> 
                        </div>
                    </div>   
                    <div class="row-fluid">
                        <div class="span12">
                            <input type="hidden" name="id_usuario"   value="<?=$object_usuario->id_usuario; ?>" >
                            <input type="submit" value="Salvar" class="btn btn-success">
                        </div>
                    </div>
                </form>  
        </div>
    </div>
</div>  
<?php  $this->load->view('layout/admin/footer')?>
