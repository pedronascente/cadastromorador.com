<?php  $this->load->view('layout/site/header')?>
<div id="content-header-cliente">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/logoff') ?>" title="Cancelar Cadastro" class="tip-bottom"><i class="icon-home"></i> Sair</a> 
        <a href="javascript:void(0)" class="current">Cadastrar Cliente</a>
    </div>
</div>
<div class="container">
    <div class="row-fluid">
        <div class="span12"> <h4><a href="<?= base_url('/site') ?>"><img src="<?= base_url('assets/img/logo.png') ?>"></a></h4></div>
    </div>
    <div class="widget-box">
        <div class="widget-title"> 
            <span class="icon"> <i class="icon-th"></i> </span>
            <h5>CONDOMINIO</h5>
            <span class="label label-info"> FICHA CADASTRAL PORTARIA VIRTUAL</span> 
        </div>
        <?php if ($_condominio) { ?>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td><b>Condominio : </b> <?= @$_condominio->nome; ?></td>
                            <td><b>Token : </b> <?= @$_condominio->token; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>   
    
    <?php
        $this->load->view('imovel/view_imovel'); 
        
        if (isset($_imovel['objetoImovel'])) { 
            $this->load->view('usuario/view_usuario'); 
            $this->load->view('funcionario/view_funcionario'); 
            $this->load->view('veiculo/view_veiculo');
            
            if ($_dados['usuario']) { ?>
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="form-actions text-center">
                                <a href="javascript:void(0)" data-toggle="modal" data-idParametro=""  id="#modalGenerico"   data-form="_visualizar_dados"   class="btn btn-success  _myModal">Finalizar </a>                      
                            </div>
                        </div>
                    </div><?php 
            } 
        }
    ?>   
</div>

<div id="modalGenerico" class="modal hide" >
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3 class="_title_modal"></h3>
    </div>
    <div class="modal-body _modal-body">
        <div id="form_modal_veiculo" style="display: none"><?php $this->load->view('veiculo/form_modal_veiculo',['_rota'=>'site']) ?></div>
        <div id="form_modal_funcionario" style="display: none"><?php $this->load->view('funcionario/form_modal_funcionario',['_rota'=>'site']); ?></div>
        <div id="form_modal_diaAcesso" style="display: none"><?php $this->load->view('funcionario/form_modal_diaAcesso',['_rota'=>'site']); ?></div>
        <div id="form_modal_usuario" style="display: none"><?php $this->load->view('usuario/form_modal_usuario',['_rota'=>'site']); ?></div>
        <div id="form_modal_acesso" style="display: none"><?php $this->load->view('usuario/form_modal_acesso',['_rota'=>'site']); ?></div>
        <div id="form_modal_imovel" style="display: none"><?php //$this->load->view('imovel/form_modal_imovel',['_rota'=>'site']); ?></div>
        <div id="form_modal_visualizar_dados" style="display: none"><?php $this->load->view('fichaCadastral/visualizar-dados',['_rota'=>'site']); ?></div>
    </div>
    <br> 
</div>
<link rel="stylesheet" href="<?= base_url() . 'assets/'; ?>css/uniform.css" />
<link rel="stylesheet" href="<?= base_url() . 'assets/'; ?>css/select2.css" />
<script src="<?= base_url() . 'assets/'; ?>js/bootstrap-datepicker.js"></script> 
<script src="<?= base_url() . 'assets/'; ?>js/jquery.uniform.js"></script> 
<script src="<?= base_url() . 'assets/'; ?>js/select2.min.js"></script> 
<script src="<?= base_url() . 'assets/'; ?>js/jquery.validate.js"></script>
<script src="<?= base_url() . 'assets/'; ?>js/matrix.form_validation.js"></script>
<script src="<?= base_url() . 'assets/'; ?>js/masked.js"></script> 
<script src="<?= base_url() . 'assets/'; ?>js/matrix.form_common.js"></script> 
<script src="<?= base_url() . 'assets/'; ?>js/addFormsDinamicos.js"></script> 
<script src="<?= base_url() . 'assets/'; ?>js/sucesso_fichaCadastral.js"></script> 

<?php  $this->load->view('layout/site/footer')?>
