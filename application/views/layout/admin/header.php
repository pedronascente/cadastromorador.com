
<!DOCTYPE html><html lang="pt-br">
    <head>
        <title>Portaria Virtual </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ; ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-responsive.min.css') ; ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/matrix-style.css') ; ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/matrix-media.css') ; ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/padrao-volpato-dashboard.css'); ?>" />
        <link rel="stylesheet" href="<?=base_url('assets/font-awesome/css/font-awesome.css'); ?>"  />        
        <script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js'); ?>"></script> 
        <script type="text/javascript" src="<?=base_url('assets/js/jquery.ui.custom.js'); ?>"></script> 
        <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js'); ?>"></script> 
        <script type="text/javascript" src="<?=base_url('assets/js/matrix.js'); ?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/jquery.validate.js'); ?>"></script>
        <script type="text/javascript" src="<?=base_url('assets/js/matrix.form_validation.js'); ?>"></script>
    </head>
    <body>
        <!--Header-part-->
        <a href="<?= base_url('/dashboard'); ?>">
            <div id="header"><h1></h1></div>
        </a>
        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bem vindo ,  <?= ucfirst($_SESSION['usuario']->nome_usuario) ?> </span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url("/usuario/{$_SESSION['usuario']->id_usuario}/meu-perfil"); ?>"><i class="icon-user"></i> Meu Perfil</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> mensagen nova</a></li>
                    <li class="divider"></li>
                    <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                    <li class="divider"></li>
                    <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                    <li class="divider"></li>
                    <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
                </ul>
                </li>
                <li class=""><a title="" href="<?= base_url('logoff') ?>"><i class="icon icon-share-alt"></i> <span class="text">Sair</span></a></li>
            </ul>
        </div>
        <div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-fullscreen"></i>Full width</a>
            <ul>
                <?php if ($_SESSION['usuario']->grupo_id == '1') { ?>
                    <li class="<?= ($_active == 'sub-menu-1') ? 'active' : ''; ?>">
                        <a href="<?= base_url('/dashboard'); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> 
                    </li>
                <?php } ?>
                <li class="submenu <?= ($_active == 'sub-menu-2') ? 'active' : ''; ?>"> <a href="javascript:void(0)"><i class="icon icon-th-list"></i> <span>Cadastros</span></a>
                    <ul>
                        <li class=""><a href="<?= base_url('condominio/gerenciar/') . $_SESSION['usuario']->id_usuario; ?>">Condomínio</a></li>
                        <?php if ($_SESSION['usuario']->grupo_descricao === 'administrador') { ?>
                            <li class=""><a href="<?= base_url('usuario/gerenciar'); ?>">Usuário</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="">
                    <a href="<?= base_url('cliente/gerenciar'); ?>"><i class="icon icon-eye-open"></i> <span>Visualizar Morador</span></a> 
                </li>
            </ul>
        </div>
        <div id="content"> 