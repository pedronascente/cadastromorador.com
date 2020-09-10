<?php $this->load->view('layout/admin/header'); ?>
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?=base_url('/dashboard'); ?>" title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> 
        <a href="javascript:void(0)"  class="tip-bottom"> Gerenciar Usuário</a> 
    </div>
</div>
<div class="container-fluid">
     <div class="widget-box">
        <div class="row">
            <div class="span10">
              <a href="<?= base_url('/usuario/novo_admin'); ?>"  title="Clique aqui para registra um Usuário." class="btn  btn-primary "> Novo</a> 
            </div>
        </div>
    </div>
    <div class="widget-box">
        <div class="widget-title">
            <h5>Listar Usuáio</h5>
        </div>
        <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>FOTO</th>
                        <th>NOME</th>
                        <th>USUÁRIO</th>
                        <th>ATIVO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($arrayListUsers){ 
                        foreach ($arrayListUsers as $row) {
                            $ativo = ($row['ativo'] === 'on') ? 'Sim' : 'Não';
                            $imagem = $row["url_image"];
                            ?>
                            <tr class="gradeC"  id="_tr<?= $row['id_usuario'] ?>">
                                <td width="5%">  
                                    <?='<img src="'.base_url($imagem).'"  width="65" alt="'.$imagem.'">';?>
                                </td>
                                <td width="30%"><?=$row['nome_usuario'];?></td>
                                <td width="30%"><?=$row['usuario'];?></td>
                                <td width="5%" style="text-align:center"><?=$ativo;?></td>
                                <td width="5%" style="text-align:center ">
                                    <a href="<?= base_url("/usuario/{$row['id_usuario']}/edit_admin");?>"  title="Clique aqui para editar este Usuário." class="btn  btn-mini  btn-primary  "><i class="icon-edit"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('layout/admin/footer') ;