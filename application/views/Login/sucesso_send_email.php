<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login::Portaria Virtual </title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-responsive.min.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/matrix-login.css'); ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/padrao-volpato.css'); ?>" />
        <link href="<?= base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    </head>
    <body style="margin: 0; padding: 0">
        <div id="loginbox">  
            <div class="row-fluid text-center">
                <div class="span12"> <h1><img src="<?= base_url('assets/img/logo.png'); ?>"></h1></div>
            </div>
            <?php if ($_SESSION['SEND_EMAIL'] == true) { ?>
                <h1 class="normal_text">Sua solicitação foi recebida e processada com sussesso!</h1>
                <p class="normal_text">Você receberá um Email com as informações necessarias, para efetuar as alterações no seu cadastro morador.</p>
                <p class="normal_text">Atenção: Verifique seu Email.</a></p>
            <?php } else { ?>
                <p class="normal_text">Não Foi possivel processar sua requisição, Tente novamente mais Tarde!</p>
            <?php } ?>            
        </div>
    </body>
</html>

