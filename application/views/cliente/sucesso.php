<?php
// namespace C:\wamp\www\cadastro\application\views\cliente\sucesso.php
$this->load->view('layout/site/header')?>
<div id="<?=@$_active?'content-header':'content-header-cliente';?>">
    <div id="breadcrumb">         
        <?php  if($_SERVER['PATH_INFO']=='/cliente/sucesso'){?>
            <a href="<?= base_url('admin'); ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
        <?php }else{ ?>
            <a href="<?= base_url('/logoff');?>" title="Cadastro de  Cliente" class="tip-bottom"><i class="icon-home"></i> Sair</a> 
        <?php }?>
        <a href="javascript:void(0)" class="current"> Cadastro finalizado com sucesso.</a>
    </div>
</div>
<div class="container text-center" style=" margin-top: 10% ;">
    <div class="row-fluid">
        <div class="span12"> <h1><img src="<?=base_url("assets/img/logo2.png")?>" alt="img::Logo Marca"></h1></div>
    </div>
    <div class="row-fluid " style=" margin: 30px 0 0 0">
        <div class="span12">
            <h1>Seu Cadastro foi Finalizado com Sucesso!</h1>
            <p>Obrigado por efetuar seu cadastro .<br> Você receberá um e-mail com uma cópia em Anexo de seus dados .</p>
            <i class=" icon-thumbs-up  icon-4x"></i>
        </div>
    </div>
<?php
$error = !empty($_SESSION['ERROR']['SENDMAIL']) ? $_SESSION['ERROR']['SENDMAIL'] :'';
if($error){
    echo '<b>'.$_SESSION['ERROR']['SENDMAIL'].'</b>';
}else{
    ECHO'Sessão destruida.';
    @session_start();
    unset($_SESSION);
}
?>
</div>
<?php  $this->load->view('layout/site/footer')?>