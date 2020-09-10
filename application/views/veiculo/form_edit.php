<?php 
//namespace C:\wamp\www\cadastro\application\views\veiculo\form_edit.php
$sessao_usuario  = @$_SESSION['usuario'];
if($sessao_usuario){
    if( $sessao_usuario->grupo_descricao=='administrador' || $sessao_usuario->grupo_descricao=='vendedor'){  $contexto = 'admin';  }else{  $contexto = 'site'; }
}else{
    $contexto = 'site';
}
if($contexto=='admin'){
    $this->load->view('layout/admin/header',['_active'=>'d']);   
    $_rota = 'admin';
    echo '<div id="content-header"><div id="breadcrumb"> <a href=" '.base_url("/dashboard").' " title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> <a href="javascript:void(0)"  class="tip-bottom">Cadastro</a> <a href="javascript:void(0)" class="current">Editar Veículo</a></div></div>';   
}else{
    $this->load->view('layout/site/header');
    $_rota = 'site';
    echo '<div id="content-header-cliente"><div id="breadcrumb"> <a href="'.base_url("/site").'" title="Cancelar Cadastro" class="tip-bottom"><i class="icon-chevron-left"></i>  Voltar </a> <a href="javascript:void(0)" class="current">Editar Veículo</a></div></div>';  
    echo '<div class="container-fluid"><div class="row-fluid"><div class="span12"> <h1><img src="'.base_url("assets/img/logo2.png").'" alt="img::Logo Marca"></h1></div></div></div>';
}
?>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Editar de Veículo</h5>
        </div>
        <div class="widget-content">
            <form  action="<?=base_url('veiculo/update');?>" data-action-form="modalFormVeiculo" method="post"  id="basic_validate_veiculo" novalidate="novalidate"> 
                <div class="row-fluid">
                    <div class="span2">
                        <div class="control-group">
                            <label class="control-label">Placa</label>
                            <div class="controls">
                               <!-- <input type="text" name="array_veiculo[placa]" class="span12  _mask_placa"   value="<?=$objetc_veiculo->placa;?>"  required="" >-->
                                <input type="text" name="array_veiculo[placa]" class="span12  "   value="<?=$objetc_veiculo->placa;?>"  required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span2 ">
                        <div class="control-group">
                            <label class="control-label">Ano</label>
                            <div class="controls">
                                <input type="text" name="array_veiculo[ano]"  class="span12 _mask_ano"   value="<?=$objetc_veiculo->ano;?>"  required="" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid " >
                    <div class="span4">
                        <div class="control-group _control-group-right">
                            <label class="control-label">Marca</label>
                            <div class="controls">
                                <input type="text" name="array_veiculo[marca]" class="span12"    value="<?=$objetc_veiculo->marca;?>"  required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span4">
                        <div class="control-group _control-group-right">
                            <label class="control-label">Modelo</label>
                            <div class="controls">
                                <input type="text" name="array_veiculo[modelo]"  class="span12"  value="<?=$objetc_veiculo->modelo;?>"   required="" >
                            </div>
                        </div> 
                    </div>
                    <div class="span4">
                        <div class="control-group _control-group-right">
                            <label class="control-label">Cor</label>
                            <div class="controls">
                                <input type="text" name="array_veiculo[cor]" class="span12"    value="<?=$objetc_veiculo->cor;?>"  required="" >
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="array_veiculo[id_veiculo]" value="<?=$objetc_veiculo->id_veiculo;?>">
                <input type="hidden" name="array_veiculo[imovel_id_imovel]" value="<?=$_SESSION['DADOS']['imovel']->id_imovel; ?>">
                <input type="hidden"  name="_rota" class="span12"  value="<?=$_rota;?>" >
                <div class="row-fluid">
                    <div class="span6">
                        <input type="submit" value="Salvar" class="btn btn-danger">
                    </div>
                </div>     
            </form>     
        </div>
    </div>
</div>  
<?php $this->load->view('layout/site/footer'); ?>