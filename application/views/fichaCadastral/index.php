<?php
// namespace C:\wamp\www\cadastro\application\views\fichaCadastral\index.php
$this->load->view('layout/site/header') ?>
<div id="content-header-cliente">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/logoff') ?>" title="Cancelar Cadastro" class="tip-bottom"><i class="icon-home"></i> Sair</a> 
        <a href="javascript:void(0)" class="current">Cadastrar Cliente</a>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12"> 
            <h1>
                <img src="<?= base_url('assets/img/logo2.png') ?>" alt="img::Logo marca">
            </h1>
        </div>
    </div>
    <div class="widget-box">
        <div class="widget-title"> 
            <span class="icon"> <i class="icon-th"></i> </span>
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
    if ($_imovel['objetoImovel']!==null) {
        $this->load->view('usuario/view_usuario');
        $this->load->view('funcionario/view_funcionario');
        $this->load->view('veiculo/view_veiculo');
        if ($_dados['usuario']) {
            ?>
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <div class="form-actions text-center">
                        <a href="javascript:void(0)" data-toggle="modal" data-idParametro=""  id="#modalGenerico"   data-form="_visualizar_dados"   class="btn btn-danger  _myModal">Finalizar Cadastro</a>                      
                    </div>
                </div>
            </div><?php
        }
    }
    ?>   
</div>
<div id="modalGenerico" class="modal hide">
    <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3 class="_title_modal"></h3>
    </div>
    <div class="modal-body _modal-body">
        <div id="form_modal_visualizar_dados" style="display: none"><?php $this->load->view('fichaCadastral/visualizar-dados',['_rota'=>'site']); ?></div>
    </div>
</div>
<script src="<?= base_url('assets/js/sucesso_fichaCadastral.js'); ?>"></script> 
<?php $this->load->view('layout/site/footer') ?>
