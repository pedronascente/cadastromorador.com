<?php 
$this->load->view('layout/admin/header') ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?= base_url('/dashboard') ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)"  class="tip-bottom">Gerenciar Condomínio</a> 
    </div>
</div>
<div class="container-fluid"> 
    <div class="widget-box">
        <div class="row">
            <div class="span10">
             <a href="<?= base_url('/condominio/novo'); ?>"  title="Clique aqui para registra um Condomínio." class="btn  btn-danger "> Novo</a>       
             <a href="<?= base_url('cliente/gerenciar') ; ?>" class="btn  btn-primary">Visualizar Clientes</a>
            </div>
        </div>
    </div>
    <div class="widget-box">
        <div class="widget-title">
            <h5>Lista dos Condomínios</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table  ">
                <thead>
                    <tr>
                        <th>Token</th>
                        <th>Data Cadastro</th>
                        <th>Condomínio</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($arrayListCondominio as $row){
                        $dataCadastro = date('d-m-Y', strtotime($row['dataCriacao'])); ?>
                        <tr class="text-center "  id="_tr<?= $row['id_condominio'];?>" >
                            <td width="180"> 
                                <a href="javascript:void(0)"   id="atualizarToken"  date-type="<?= $row['id_condominio'];?>"    title="Atualizar Token">
                                    [ <i class="icon-refresh"></i> ]   <span  id="novoToken"><?= $row['token'] ?></span> 
                                </a> </td>
                            <td width="180"  style="text-align:center " ><?=$dataCadastro ?></td>
                            <td><?= $row['nome'] ?></td>
                             <td class="" width="130" style="text-align:center ">
                                 <a href="<?=base_url("/condominio/{$row["id_condominio"]}/edit")?>"  title="Clique aqui para editar este Condomínio." class="btn  btn-mini  btn-primary  "><i class="icon-edit"></i></a>
                                <?php
                                    if(!empty($morador)){ 
                                      echo '<a href="'.base_url("/exportar_arquivo_csv/{$row['id_condominio']}").'"  title="Exportar CSV" class="btn  btn-mini  btn-danger  "> CSV  <i class="icon-download-alt"></i></a>';
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('layout/admin/footer'); ?>
<script type="text/javascript">
$(function(){
   $('#atualizarToken').click(function(){
        var id_condominio = $(this).attr('date-type');
     
        var url ="https://cadastromorador.com.br/condominio/atualizarToken/"+id_condominio;
     
        $.getJSON( url, function( json ) {            
            $("#novoToken").text(json.token);
        });
    
   });    
});
</script>
<script src="<?= base_url('assets/js/matrix.tables.js') ; ?>"></script>