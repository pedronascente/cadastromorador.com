<?php  $this->load->view('layout/admin/header');?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard'); ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home"> </i>Home</a> 
        <a href="<?= base_url('/usuario/meu-perfil'); ?>" class="current">Meu Perfil</a>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td colspan="2"><b>Nome :</b><br><?=$object_usuario->nome_usuario; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>E-mail :</b><br><?=$object_usuario->email; ?></td>
                        </tr>
                        <tr>
                            <td><b>Telefone1 :</b><br><?= $object_usuario->telefone; ?></td>
                             <td><b>Telefone2 :</b><br><?=$object_usuario->celular; ?></td>
                        </tr>
                       
                        <tr>
                            <td><b>Usuário :</b><br><?=$object_usuario->usuario; ?></td>
                             <td><b>Senha :</b><br><?=$object_usuario->senha_usuario_descriptografada; ?></td>
                        </tr>
                        <tr>
                           
                        </tr>
                        <tr>
                            <td colspan="2"><b>Grupo de Usuário :</b><br><?=$object_usuario->grupo_descricao; ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td  colspan="2">
                                <a href="<?= base_url("usuario/{$object_usuario->id_usuario}/edit_meu_perfil");?>"   title="Clique aqui para editar Seu perfil." class="btn   btn-primary "><i class="icon-edit"></i> Editar </a>                       
                            </td>
                        </tr>
                    <tfoot>
                </table>
            </div>   
        </div>
    </div>
</div>
 
<?php  $this->load->view('layout/admin/footer')?>