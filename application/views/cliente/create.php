<?php  //namespace C:\wamp\www\cadastro\application\views\cliente\create.php ?>
<?php $this->load->view('layout/admin/header');?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard'); ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)"  class="tip-bottom">Cadastro</a> 
        <a href="javascript:void(0)" class="current">Cadastrar Cliente</a>
    </div>
</div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title"> 
            <span class="label label-info"> FICHA CADASTRAL PORTARIA VIRTUAL </span> 
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td colspan="2"><?php $this->load->view('condominio/form_buscar_condominio'); ?></td>
                    </tr>
                    <tr>
                        <td><b>Condominio : </b> <?= @$_condominio->nome; ?></td>
                        <td><b>Token : </b> <?= @$_condominio->token; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>   
    <?php 
        if ($_condominio) { 
            $this->load->view('imovel/view_imovel');
            if (isset($_imovel['objetoImovel'])){ 
                if ($_dados['usuario']) { ?>
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="form-actions text-center">
                                <a href="javascript:void(0)" data-toggle="modal" data-idParametro=""  id="#modalGenerico"   data-form="_visualizar_dados"   class="btn btn-success  _myModal">Finalizar </a>                      
                            </div>
                        </div>
                    </div>
                    <?php 
                }    
            }    
         }
    ?>   
</div>
<?php  $this->load->view('layout/admin/footer');