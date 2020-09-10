<?php
if(!empty($_SESSION['erro_recuperar_cadastro'])){
    $error_msg = $_SESSION['erro_recuperar_cadastro'];
    echo '<div class="alert alert-danger text-center" role="alert">';
         echo $error_msg ;
    echo '</div>';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
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
            <form  class="form-vertical" action="<?=base_url('Login/enviar_solicitacao_recuperar_cadastro'); ?>" method="post" id="enviar_solicitacao_recuperar_cadastro" >
                <div class="control-group normal_text"><h3>Portaria Virtual</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="email" name="email"  placeholder="Digite seu Email"  required="" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="text" name="cpf" placeholder="Digite seu CPF"  class="_cpf"   id="cpf"  required="" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                           <input type="submit"  class="btn btn-success" value="Recuperar Cadatro"  />
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>  
        <script src="<?= base_url('assets/js/masked.js'); ?>"></script> 
        <script src="<?= base_url('assets/js/validarCPF.js'); ?>"></script> 
        <script type="text/javascript">
            $(function() { 	
                $("._cpf").mask("999.999.999-99");
                $('#enviar_solicitacao_recuperar_cadastro').submit(function(){
                      var cpf = $('#cpf').val();
                      if(!validarCPF(cpf)){
                           alert("Digite um cpf válido.");
                           return false;
                      }                   
                });
            });                    
        </script> 
    </body>
</html>