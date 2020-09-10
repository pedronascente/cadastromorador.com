<div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url() ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">
        </i>Home</a> <a href="#" class="current">Cadastros / Morador</a>
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
            <form class="form-horizontal" method="post" action="<?=base_url('cadastrar-funcionario')?>" name="basic_validate" id="basic_validate" novalidate="novalidate"> 
                <div class="accordion" id="collapse-group">
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-info-sign"></i></span>
                                    <h5>FUNCIONÁRIO : </h5>
                                </a> 
                            </div>
                        </div>
                        <div class="collapse in accordion-body" id="collapseGOne">
                            <div class="widget-content">
                                 <div id="_boxFormFuncionario">
                                 </div>
                                 <?=$this->load->view('form_funcionario'); ?>                                    
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <div class="form-actions">
                            <input type="submit" value="Finalizar Cadastro" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </form>     
        </div>
    </div>
    <!--style-->
    <link rel="stylesheet" href="<?= base_url() . 'assets/'; ?>css/select2.css" />
    <link rel="stylesheet" href="<?= base_url() . 'assets/'; ?>css/datepicker.css" />
    <link rel="stylesheet" href="<?= base_url() . 'assets/'; ?>css/uniform.css" /> 
    <!--script-->
    <script src="<?= base_url() . 'assets/'; ?>js/select2.min.js"></script>
    <script src="<?= base_url() . 'assets/'; ?>js/jquery.validate.js"></script>
    <script src="<?= base_url() . 'assets/'; ?>js/matrix.form_validation.js"></script>
    <script src="<?= base_url() . 'assets/'; ?>js/bootstrap-datepicker.js"></script> 
    <script src="<?= base_url() . 'assets/'; ?>js/masked.js"></script> 
    <script src="<?= base_url() . 'assets/'; ?>js/jquery.uniform.js"></script> 
    <script src="<?= base_url() . 'assets/'; ?>js/select2.min.js"></script> 
    <script src="<?= base_url() . 'assets/'; ?>js/matrix.form_common.js"></script> 
    <script src="<?= base_url() . 'assets/'; ?>js/addFormsDinamicos.js"></script> 
</div>