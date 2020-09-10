<div class="widget-box">
    <div class="widget-title"> 
        <span class="icon">
            <a href="<?= base_url('cadastra-veiculo');?>" title="Clique aqui para adicionar mais Veículo."  class="btn btn-mini btn-success ">
               Cadastrar  
            </a>
        </span>
        <h5>VEÍCULO</h5>
    </div>
    <?php if ($_dados['veiculo']) { ?>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php if ($_dados['veiculo']){ ?>   
                        <?php for ($i = 0; $i < count($_dados['veiculo']); $i++) { ?>
                            <tr>
                                <td><b><?=($i+1);?> ) Placa: </b> <br><?= @$_dados['veiculo'][$i]['placa']; ?></td>
                                <td><b>Ano: </b> <br> <?= @$_dados['veiculo'][$i]['ano']; ?></td>
                                <td>&zwj;</td>
                            </tr>
                            <tr>
                                <td><b>Marca: </b> <br><?= @$_dados['veiculo'][$i]['marca']; ?></td>
                                <td><b>Modelo: </b> <br><?= @$_dados['veiculo'][$i]['modelo']; ?></td>
                                <td><b>Cor: </b> <br><?= @$_dados['veiculo'][$i]['cor']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">  
                                    <a href="<?=base_url("veiculo/{$_dados['veiculo'][$i]['id_veiculo']}");?>"  title="Clique aqui para editar este Veículo."  class="btn  btn-mini btn-primary"> <i class="icon-edit"></i> Editar</a>
                                    <?php if($_SERVER['REQUEST_URI']== "/cadastro/site"||  $_SERVER['REDIRECT_URL'] =="/cadastro/site"   || $_SERVER['REDIRECT_URL']=="/cadastro/recuperar-cadastro/"){ ?>
                                           <a href="<?=base_url("veiculo/{$_dados['veiculo'][$i]['id_veiculo']}/delete");?>" title="Clique aqui para excluir este Veículo."  class="btn  btn-mini btn-danger"> <i class=" icon-remove"></i> Excluir</a>
                                    <?php  }else{ ?>
                                            <a href="<?=base_url("delete/{$_dados['veiculo'][$i]['id_veiculo']}");?>" title="Clique aqui para excluir este Veículo."  class="btn  btn-mini btn-danger"> <i class=" icon-remove"></i> Excluir</a>
                                    <?php  }?>
                                </td>
                            </tr>
                            
                        <?php } ?>
                    <?php } ?>
                    <tr>
                         <td colspan="3"  style="background: #efefef">                          
                            <a href="<?= base_url('cadastra-veiculo'); ?>"  title="Clique aqui para adicionar mais Veículos."  class="btn  btn-primary ">
                                <i class="icon-plus-sign"></i> Mais Veículo
                            </a> 
                        </td>
                    </tr>            
                </tbody>
            </table>
        </div>
    <?php } ?>
</div> 