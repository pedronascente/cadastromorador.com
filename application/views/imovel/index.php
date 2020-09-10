<div id="content-header">
    <div id="breadcrumb"> <a href="<?= base_url() ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">
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
            <form class="form-horizontal" method="post" action="<?= base_url();?>imovel/<?= ($acao == 'update') ? "update" : "novo"; ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
                <?php $this->load->view('form_imovel') ?>
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <div class="form-actions">
                            <?php if ($acao == 'update') { ?><input type="hidden"  name="id_condominio" value="<?= @$_condominio->id_condominio ?>" ><?php } ?>
                            <input type="submit" value="<?php echo ($acao == 'update') ? "Editar" : "Finalizar"; ?>" class="btn btn-success">                            
                        </div>
                    </div>
                </div>
            </form>     
        </div>
    </div>
    <link rel="stylesheet" href="<?= base_url('assets/css/uniform.css') ; ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/select2.css'); ?>" />
    <script src="<?= base_url('assets/js/jquery.uniform.js'); ?>"></script>
    <script src="<?= base_url('assets/js/select2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.validate.js'); ?>"></script>
    <script src="<?= base_url('assets/js/matrix.form_validation.js'); ?>"></script>
</div>
