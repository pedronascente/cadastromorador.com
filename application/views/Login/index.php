<?php
//namespace C:\wamp\www\cadastro\application\views\Login\index.php
@session_start();
$MSG = (isset($_SESSION['error_login_cliente']) && $_SESSION['error_login_cliente']==true)?"Informe um Token Válido!":"Entre com seu Token de acesso, caso seja um Morador.";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login::Portaria Virtual </title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-responsive.min.css') ; ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/matrix-login.css') ; ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/padrao-volpato.css') ; ?>" />
        <link href="<?= base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    </head>
    <body style="margin: 0; padding: 0">
        <div id="loginbox">  
            <div class="row-fluid text-center">
                <div class="span12"> <h1><img src="<?= base_url('assets/img/logo.png'); ?>"></h1></div>
            </div>
            <form id="loginform" class="form-vertical" action="<?= base_url('_auth'); ?>" method="post">
                 <p class="normal_text"><?=$MSG;?></p>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-lock"></i></span><input type="password" name="token" value=""   required=""  placeholder="Digite seu Token de acesso." />
                    </div>
                </div>
                <div class="form-actions">
                      <span class="pull-left"><a href="<?=  base_url('/recuperarar-cadastro-morador');?>" class="flip-link btn btn-info">Recuperar Cadastro</a></span>
                    <span class="pull-right"><input type="submit"  class="btn btn-success" value="Cadastrar" /></span>
                </div>
            </form>
        </div>
        <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>  
        <script src="<?= base_url('assets/js/matrix.login.js');?>"></script> 
    </body>
</html>