<?php 
//namespace C:\wamp\www\cadastro\application\views\fichaCadastral\sucesso.php 
$this->load->view('layout/site/header')?>
<div id="<?=@$_active?'content-header':'content-header-cliente';?>">
    <div id="breadcrumb">         
         <a href="javascript:void(0)"class="tip-bottom"><i class="icon-home"></i> Situação</a> 
        <a href="javascript:void(0)" class="current"> Cadastro finalizado com sucesso.</a>
    </div>
</div>
<div class="container text-center" style=" margin-top: 10% ;">
    <div class="span12"> 
        <h1>
            <img src="<?= base_url('assets/img/logo2.png') ?>" alt="img::Logo marca">
        </h1>
    </div>
    <div class="row-fluid " style=" margin: 30px 0 0 0">
        <div class="span12">
            <h1>Seu Cadastro foi Finalizado com Sucesso!</h1>
            <p>Obrigado por efetuar seu cadastro .<br> Você receberá um e-mail com uma cópia em Anexo de seus dados .</p>
            <i class=" icon-thumbs-up  icon-4x"></i>
        </div>
    </div>
    <br>
    <div class="row-fluid " style="">
        <div class="span12 text-center">
            <a href="<?= base_url('/logoff')?>" class="btn btn-danger">Clique aqui para Sair</a>
        </div>
    </div>
</div>
<?php  $this->load->view('layout/site/footer')?>