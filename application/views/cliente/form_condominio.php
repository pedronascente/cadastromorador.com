<?php  //namespace C:\wamp\www\cadastro\application\views\cliente\form_condominio.php ?>
<div id="content-header-cliente">
    <div id="breadcrumb"> <a href="<?= base_url('/dashboard'); ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">
            </i> Home</a> <a href="#" class="current">Cadastros / <?=$title?></a>
    </div>
    <h1><?=$title?></h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <?php
            if (isset($_result)) {
                echo $_result;
            }
            ?>
            <form class="form-horizontal" method="post" action="<?= base_url() ?>condominio/<?= ($acao == 'update') ? "update" : "novo"; ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>CONDOMINIO</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Token</label>
                                    <div class="controls">
                                        <input type="text" name="array_condominio[token]" id="required"    class="span12" value="<?= @$objectData->token; ?>" required="" > 
                                    </div>
                                </div> 
                            </div>
                            <div class="span5">
                                <div class="control-group _control-group-right">
                                    <div class="controls">
                                        <a href="#" class="btn btn-danger">Gerar Token   <i class="icon-refresh"></i></a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group _control-group-right">
                                    <label class="control-label">Condominio</label>
                                    <div class="controls">
                                        <input type="text" name="array_condominio[nome]" class="span12"  value="<?= @$objectData->nome; ?>" required="" >
                                    </div>
                                </div> 
                            </div>

                        </div>
                    </div>
                </div>

                <?php $this->load->view('endereco/form_endereco') ?>

                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <div class="form-actions">
                            <?php if ($acao == 'update') { ?><input type="hidden"  name="id_condominio" value="<?= @$objectData->id_condominio ?>" ><?php } ?>
                            <input type="submit" value="<?php echo ($acao == 'update') ? "Atualizar " : "Finalizar "; ?>" class="btn btn-success">                            
                        </div>
                    </div>
                </div>
            </form>     
        </div>
    </div>
    <link rel="stylesheet" href="<?= base_url('assets/')  ; ?>css/uniform.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ; ?>css/select2.css" />
    <script src="<?= base_url('assets/'); ?>js/jquery.uniform.js"></script>
    <script src="<?= base_url('assets/'); ?>js/select2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.validate.js"></script>
    <script src="<?= base_url('assets/'); ?>js/matrix.form_validation.js"></script>
</div>