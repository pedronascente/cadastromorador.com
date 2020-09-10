<?php  $this->load->view('layout/admin/header')?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard')?>" title="Ir para Home" class="tip-bottom"><i class="icon-home"> </i> Home </a> 
        <a href="javascript:void(0)" class="current">Dashboard</a> 
    </div>
    <h1>Dashboard</h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="quick-actions_homepage">
        <ul class="quick-actions">            
            <?php 
                if($ArrayListUusuario){
                    foreach ($ArrayListUusuario as $k=> $v){
                        echo '<li class="bg_lb"> 
                                <a href="'.base_url('condominio/gerenciar/').$v['id_usuario'].'"> 
                                    <i class=" icon-reorder"></i> 
                                    <span class="label label-important">'.$v['total_condomino'].'</span>
                                    Condomínio <br>'.$v['nome_usuario'].'
                                </a> 
                            </li>';
                    }
                }
            ?>
        </ul>
    </div>
</div>
        </div>
        <!--Footer-part-->
        <div class="row-fluid">
            <div id="footer" class="span12"> <?= date('Y') ?> &copy; Portaria Virtual Admin. Desenvolvido por <a href="http://www.grupovolpato.com/" target="_blank"> Volpato Segurança</a> </div>
        </div>
    </body>
</html>
