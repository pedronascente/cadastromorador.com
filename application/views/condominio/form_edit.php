<?php $this->load->view('layout/admin/header') ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard') ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)"  class="tip-bottom">Editar Condomínio</a> 
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Editar Condomínio</h5>
        </div>
        <div class="widget-content ">
            <form  action="<?= base_url('/condominio/update'); ?>" data-action-form="modalFormCondominio" method="post"  name="" id="basic_validate_condominio" novalidate="novalidate">     
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group ">
                            <label class="control-label"><b>Condomínio:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[nome]" class="span12"  maxlength="250" id="condominio_nome" value="<?php echo $object_condominio->nome;?>" required="" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group ">
                            <label class="control-label"><b>CEP:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[cep]" class="span12" maxlength="14"  id="condominio_cep" value="<?php echo $object_condominio->cep;?>">
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group ">
                            <label class="control-label"><b>UF:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[uf]" class="span12"  id="condominio_uf" maxlength="2" value="<?php echo $object_condominio->uf;?>">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span9">
                        <div class="control-group ">
                            <label class="control-label"><b>Logradouro:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[logradouro]" class="span12"  maxlength="200" id="condominio_logradouro"  value="<?php echo $object_condominio->logradouro;?>" >
                            </div>
                        </div> 
                    </div>
                    <div class="span3">
                        <div class="control-group ">
                            <label class="control-label"><b>Número:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[numero]" class="span12"   maxlength="11" id="condominio_numero" value="<?php echo $object_condominio->numero;?>" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group ">
                            <label class="control-label"><b>Cidade:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[cidade]" class="span12"  maxlength="200" id="condominio_cidade"  value="<?php echo $object_condominio->cidade;?>" >
                            </div>
                        </div> 
                    </div>
                    <div class="span6">
                        <div class="control-group ">
                            <label class="control-label"><b>Bairro:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[bairro]" class="span12" maxlength="200" id="condominio_bairro" value="<?php echo $object_condominio->bairro;?>" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group ">
                            <label class="control-label"><b>Complemento:</b></label>
                            <div class="controls">
                                <input type="text" name="array_condominio[complemento]" class="span12" maxlength="200"   id="condominio_complemento"  value="<?php echo $object_condominio->complemento;?>" >
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="array_condominio[id_condominio]" maxlength="11" value="<?php echo $object_condominio->id_condominio;?>">
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
</div>
<div class="row-fluid">
    <div id="footer" class="span12"> <?= date('Y') ?> &copy; Portaria Virtual Admin. Desenvolvido por <a href="#">Grupo Volpato</a> </div>
</div>
<script src="<?= base_url('assets/js/jquery.uniform.js'); ?>"></script> 
<script src="<?= base_url('assets/js/select2.min.js'); ?>"></script> 
</body>
</html>

