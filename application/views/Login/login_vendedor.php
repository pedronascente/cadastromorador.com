<?php  $MSGVENDEDOR =  (isset($error_login_vendedor) && $error_login_vendedor=='fail')?"Informe Usuário e Senha válido!":"Entre com seus dados de  acesso, caso seja um Vendedor.";?>
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
            <form  class="form-vertical" action="<?= base_url('login/adm'); ?>" method="post">
                <div class="control-group normal_text"><h3>Portaria Virtual</h3></div>
                <p class="normal_text"><?=$MSGVENDEDOR;?></p>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="usuario"  placeholder="Username"  required="" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="senha" placeholder="Password" required="" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="<?=  base_url('/login');?>" class="flip-link btn btn-info" id="to-login">Área do Morador </a></span>
                    <span class="pull-right"><input type="submit"  class="btn btn-success" value="Entrar"  /> </span>
                </div>
            </form>
        </div>
        <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>  
        <script src="<?= base_url('assets/js/matrix.login.js');?>"></script> 
    </body>
</html>