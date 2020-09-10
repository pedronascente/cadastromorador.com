<?php  // namespace C:\wamp\www\cadastro\application\views\cliente\edit.php ?>
<?php $this->load->view('layout/admin/header') ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard') ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)"  class="tip-bottom">Visualizar Cliente</a> 
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
                        <td><b>Condominio : </b> <?= @$_condominio->nome; ?></td>
                        <td><b>Token : </b> <?= @$_condominio->token; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>   
    <?php
        if (@$_condominio) { 
            $this->load->view('imovel/view_imovel'); 
            $this->load->view('usuario/view_usuario'); 
            $this->load->view('funcionario/view_funcionario'); 
            $this->load->view('veiculo/view_veiculo');
            ?>
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <div class="form-actions">
                            <a href="<?= base_url('cliente/gerenciar');?>" class="btn btn-danger">Voltar </a>                 
                            <a style="background: #3d8c14 !important" href="javascript:void(0)" class="btn btn-primary"  title="Aprovar Cadastro"   data-cpf_responsavelCadastro="<?=$_SESSION['DADOS']['imovel']->cpf_responsavelCadastro?>"  id="btn-aprovar-cadstro" >Aprovar</a>                 
                            <a href="javascript:void(0)" class="btn btn-primary"  title="Reprovar Cadastro"   data-cpf_responsavelCadastro="<?=$_SESSION['DADOS']['imovel']->cpf_responsavelCadastro?>"   data-email_responsavelCadastro="<?=$_SESSION['DADOS']['imovel']->email_responsavelCadastro?>" id="btn-reprovar-cadstro" >Reprovar</a>                 
                        </div>
                    </div>
                </div>
            <?php 
        } ?>   
</div>
<script type="text/javascript">
$(function(){
    $('#btn-reprovar-cadstro').click(function(){
        if(confirm("Deseja,Reprovar este cadastro ?")){
            var cpf_responsavelCadastro = $(this).attr('data-cpf_responsavelCadastro');
            var email_responsavelCadastro = $(this).attr('data-email_responsavelCadastro');
            $.ajax({
                url: "https://cadastromorador.com.br/reprovar_cadastro",
                type: 'POST',
                dataType: 'json',
                data: {
                    cpf_responsavelCadastro: cpf_responsavelCadastro,
                    email_responsavelCadastro: email_responsavelCadastro
                },
                success: function (resposta) {
                   alert(resposta.type);
                }
            });
        }
    });
    $('#btn-aprovar-cadstro').click(function(){
        var cpf_responsavelCadastro = $(this).attr('data-cpf_responsavelCadastro');
        $.ajax({
            url: "https://cadastromorador.com.br/aprovar_cadastro",
            type: 'POST',
            dataType: 'json',
            data: {
                cpf_responsavelCadastro: cpf_responsavelCadastro,
            },
            success: function (resposta) {
              if(resposta.type=='true'){
                  alert('Cadastro aprovado com Sucesso!');
                  location.href="https://cadastromorador.com.br/cliente/gerenciar";
              }else{
                   alert('Não foi posssivel  aprovar cadastro!');
              }
              
            }
        });
    });
})
</script>
<?php  $this->load->view('layout/admin/footer');