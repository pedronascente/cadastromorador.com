<?php 
//namespace C:\wamp\www\cadastro\application\views\funcionario\form_edit.php
$sessao_usuario  = @$_SESSION['usuario'];
if($sessao_usuario){
    if( $sessao_usuario->grupo_descricao=='administrador' || $sessao_usuario->grupo_descricao=='vendedor'){  $contexto = 'admin';  }else{  $contexto = 'site'; }
}else{
    $contexto = 'site';
}
if($contexto=='admin'){
    $this->load->view('layout/admin/header',['_active'=>'d']);   
    $_rota = 'admin';
    echo '<div id="content-header"><div id="breadcrumb"> <a href=" '.base_url("/dashboard").' " title="Ir para Home" class="tip-bottom"><i class="icon-home">  </i> Home</a> <a href="javascript:void(0)" class="current">Editar Funcionário</a></div></div>';   
}else{
    $this->load->view('layout/site/header');
    $_rota = 'site';
    echo '<div id="content-header-cliente"><div id="breadcrumb"> <a href="'.base_url("/site").'" title="Cancelar Cadastro" class="tip-bottom"><i class="icon-chevron-left"></i>  Voltar </a> <a href="javascript:void(0)" class="current">Editar Funcionáriio</a></div></div>';  
    echo '<div class="container-fluid"><div class="row-fluid"><div class="span12"><h1><img src="'. base_url('assets/img/logo2.png').'" alt="img::Logo marca"></h1></div></div></div>';
}
?>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title">
            <h5>Editar  Funcionário</h5>
        </div>
        <div class="widget-content">
            <form   name="FORM_EDITAR_FUNCIONARIO"  action="<?=base_url('funcionario/update'); ?>" id="basic_validate_funcionario" novalidate="novalidate"  method="post" >                
                <div class="row-fluid">
                    <div class="span12" >
                        <div class="control-group _control-group-right">
                            <label class="control-label">Nome:</label>
                            <div class="controls">
                                <input type="text" name="array_funcionario[nome]" class="span12" value="<?=$objetc_funcionario->nome;?>" required="">
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="row-fluid">
                    <div class="span6 _hideInputFuncionario">
                        <div class="control-group _control-group-right">
                            <label class="control-label">CPF:</label>
                            <div class="controls">
                                <input type="text" name="array_funcionario[cpf_funcionario]" class="span12 _cpf  _validar_cpf"  value="<?=$objetc_funcionario->cpf_funcionario;?>"  required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span6" >
                        <div class="control-group _control-group-right">
                            <label class="control-label">RG:</label>
                            <div class="controls">
                                <input type="text" name="array_funcionario[rg_funcionario]"  class="span12"  value="<?=$objetc_funcionario->rg_funcionario;?>" maxlength="30" >
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span8">
                        <div class="control-group _control-group-right">
                            <label class="control-label">Tipo de Serviço:</label>
                            <div class="controls">
                                <input type="text" name="array_funcionario[tipo_servico]" value="<?=$objetc_funcionario->tipo_servico;?>" class="span12"  required="">
                            </div>
                        </div> 
                    </div>
                    <div class="span4 ">
                        <div class="control-group _control-group-right ">
                            <label class="control-label">Telefone :</label>
                            <div class="controls">
                                <input type="text" name="array_funcionario[telefone]" class="span12 _mask_telefone"  value="<?=$objetc_funcionario->telefone;?>"  required="">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid ">
                    <div class="span12">
                        <div class="control-group _control-group-right">
                            <label class="control-label">Observação:</label>
                            <div class="controls">
                                <textarea class="span12"  name="array_funcionario[obs]"  rows="5" ><?=$objetc_funcionario->obs;?></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="row-fluid ">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label"><b>Liberar  Acesso:</b></label>
                            <div class="controls">
                                <?php if ($_arrayCheckBoxDiaSemana) { ?>
                                    <?php foreach ($_arrayCheckBoxDiaSemana as $k => $v) { ?>
                                        <div class="row-fluid _arrayCheckBoxDiaSemana  " >
                                            <div class="span3">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <label>
                                                            <input type="checkbox" class="_select1" id="<?= $k; ?>_dia_semana" name="array_dia_semana[<?=$k?>][dia_semana_id_dia_semana]" 
                                                                <?php
                                                                     foreach ($_arrayDiaAcesso as $a=> $b){
                                                                         if($v['id_dia_semana']==$b['dia_semana_id_dia_semana']){
                                                                               echo 'checked';
                                                                          }
                                                                     }
                                                                 ?>
                                                            value=<?= $v['id_dia_semana']; ?> /><?= $v['extenso']; ?>
                                                        </label>
                                                    </div>
                                                </div> 
                                            </div>
                                           <div class="span2" >
                                               <div class="control-group success">      
                                                    <div class="controls">          
                                                        <select class="span12" name="array_dia_semana[<?=$k?>][horario]" >              
                                                            <option value="07-19H"  <?php  foreach ($_arrayDiaAcesso as $ah=> $bh  ){  echo ($bh['horario']=='07-19H' && $v['id_dia_semana']==$bh['dia_semana_id_dia_semana']  )?'selected' :''; } ?>> 07-19H</option>         
                                                            <option value="07-13H"  <?php  foreach ($_arrayDiaAcesso as $ah=> $bh  ){  echo ($bh['horario']=='07-13H' && $v['id_dia_semana']==$bh['dia_semana_id_dia_semana']  )?'selected' :''; } ?>> 07-13H</option>              
                                                            <option value="13-19H"  <?php  foreach ($_arrayDiaAcesso as $ah=> $bh  ){  echo ($bh['horario']=='13-19H' && $v['id_dia_semana']==$bh['dia_semana_id_dia_semana']  )?'selected' :''; } ?>> 13-19H</option>              
                                                        </select>     
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="array_funcionario[id_funcionario]" value="<?=$objetc_funcionario->id_funcionario; ?>">
                <input type="hidden" name="array_funcionario[imovel_id_imovel]" value="<?=$_SESSION['DADOS']['imovel']->id_imovel; ?>">
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
<?php  if($contexto == 'admin'){  $this->load->view('layout/admin/footer'); }else{  $this->load->view('layout/site/footer'); }  ?>