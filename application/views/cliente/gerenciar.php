<?php 
//namespace C:\wamp\www\cadastro\application\views\cliente\gerenciar.php
$this->load->view('layout/admin/header'); ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard') ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="<?= base_url('condominio/gerenciar/') . $_SESSION['usuario']->id_usuario ?>"  class="tip-bottom">Gerenciar Condomínio </a> 
        <a href="javascript:void(0)" class="current">Buscar Cliente</a>
    </div>
</div>

<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>   <i class="icon-search"></i>  Buscar por Cliente</h5>
        </div>
        <div class="widget-content ">
             <form  action="" data-action-form="" method="GET"  name="" id="" novalidate="">                
            <?php 
            if($_SESSION['usuario']->grupo_id ==1){?>
                <div class="row-fluid">
                    <div class="span5" >
                        <div class="control-group">
                            <label class="control-label"><b>Vendedor:</b></label>
                            <div class="controls">
                                <select name="id_usuario" class="span12" id="_arrayListUsuarios">
                                    <?php 
                                        if($_arrayListUsuarios): 
                                            echo '<option value="">-- Selecione --</option>';
                                            foreach ($_arrayListUsuarios as $usuario){  
                                                echo '<option value="'.$usuario['id_usuario'].'">'.$usuario['nome_usuario'].'</option>';
                                            }   
                                        else:
                                            echo '<option value="">Nenhum registro retornado!</option>';
                                        endif
                                    ?>
                                </select>
                            </div> 
                        </div> 
                    </div>
                </div> 
                <div class="row-fluid" id="_box-selectCondomino" style="display: none; margin-top: 10px">
                    <div class="span5">
                        <div class="control-group">
                            <label class="control-label"><b>Condominio:</b></label>
                            <div class="controls">
                                <select name="id_condominio" class="span12" id="_selectCondomino" >
                                    <option value="">-- Selecione --</option>
                                </select>
                            </div> 
                        </div> 
                    </div>
                </div> 
            <?php }else{?>
                <div class="row-fluid">
                    <div class="span5">
                        <div class="control-group">
                            <label class="control-label"><b>Condomínio:</b></label>
                            <div class="controls">
                                <select name="id_condominio" class="span12" id="_selectCondomino" >
                                    <option value="">-- Selecione --</option>
                                    <?php
                                        if($_arrayListCondominio){
                                            foreach ($_arrayListCondominio as $condominio){  
                                                echo '<option value="'.$condominio['id_condominio'].'">'.$condominio['nome'].'</option>';
                                            }   
                                        }   
                                    ?>
                                </select>
                            </div> 
                        </div> 
                    </div>
                </div> 
                <input type="hidden" name="id_usuario" class="span12" value="<?=$_SESSION['usuario']->id_usuario;?>">
            <?php }?>    
            <div class="row-fluid" id="_box-selectImovel" style="display: none; margin-top: 10px">
                <div class="span12" >
                    <div class="control-group">
                        <label class="control-label"><b>Imóvel:</b></label>
                        <div class="controls">
                            <select name="tipo_imovel_id_tipo_imovel" class="span12" id="_selectImovel">
                                 <option value="">-- Selecione --</option>
                            </select>
                        </div> 
                    </div> 
                </div>
            </div> 
            <br>            
            <div class="row-fluid">
                <div class="span12" >
                    <div class="control-group">
                        <label class="control-label"><b>Responsável pelo Cadastro:</b></label>
                        <div class="controls">
                            <input type="text" name="nome_responsavelCadastro"  class="span12"  id=""   value=""  >
                        </div> 
                    </div> 
                </div>
            </div>            
            <div class="row-fluid">
                <div class="span6"><input type="submit" value="Buscar" class="btn  btn-danger "></div>
            </div>
        </form>   
        </div>
    </div>
</div>  
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>IMÓVEL</th>
                        <th>RESPONSAVEL PELO CADASTRO</th>
                        <th>CPF</th>
                        <th>CONTATO</th>
                        <th>CONDOMíNIO</th>
                        <th>STATUS</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($_arrayListCliente) { ?>
                        <?php foreach ($_arrayListCliente as $k => $v) { ?>
                            <tr>
                                <td><?= $v['IMOVEL']; ?></td>
                                <td><?= $v['REPONSAVEL_PELO_CADASTRO']; ?></td>
                                <td><?= $v['CPF']; ?></td>
                                <td><?= $v['CONTATO']; ?></td>
                                <td><?= $v['CONDOMINIO']; ?></td>
                                <td><?= $v['STATUS']; ?></td>
                                <td>
                                    <a href="<?= base_url("cliente/{$v['id_imovel']}/edit"); ?>" title="Editar" class="btn btn btn-primary">
                                        <i class="icon-edit"></i>
                                    </a> 
                                    <a href="<?= base_url("cliente/{$v['id_imovel']}/imprimir"); ?>" title="Imprimir" class="btn btn btn-danger">
                                        <i class="icon-print"></i>
                                    </a> 
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="widget-content nopadding"  style="border-bottom: 0">
        <a href="<?= base_url('condominio/gerenciar/') . $_SESSION['usuario']->id_usuario ?>" class="btn btn-danger">Voltar </a>
    </div>
</div>
<script src="<?= base_url('assets/js/show_gerenciar_relatorio.js'); ?>"></script>
<?php $this->load->view('layout/admin/footer')?>