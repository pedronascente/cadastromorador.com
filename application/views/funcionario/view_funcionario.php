<?php  //namespace C:\wamp\www\cadastro\application\views\funcionario\view_funcionario.php ?>
<div class="widget-box">
    <div class="widget-title"> 
        <span class="icon">
            <a href="<?= base_url('cadastrar-funcionario'); ?>" title="Clique aqui para adicionar mais Funcionário."  class="btn btn-mini btn-success ">
                 Cadastrar
            </a> 
        </span>
        <h5>FUNCIONÁRIO</h5>
    </div>
    <?php if ($_dados['funcionario']) { ?>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php foreach ($_dados['funcionario'] as $k => $funcionario) { ?>
                        <tr>
                            <td colspan="2"><b><?=($k+1) ?> )  Funcionario :</b><br><?= $funcionario['nome']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tipo de Srviço: </b><br><?= $funcionario['tipo_servico']; ?></td>
                            <td><b>Telefone:</b><br><?= $funcionario['telefone']; ?></td> 
                        </tr>
                        <tr>
                            <td><b>CPF : </b><br><?=$funcionario['cpf_funcionario']; ?></td>
                            <td><b>RG : </b><br><?=$funcionario['rg_funcionario']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Observação:</b><br><?=$funcionario['obs']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Acesso(s) Liberado: </b></td> 
                        </tr>
                        <tr>
                            <td colspan="2">
                                <ul>
                                    <?php 
                                        if($this->DiaAcessoModel->getAgenda($funcionario['id_funcionario'])){
                                            foreach ($this->DiaAcessoModel->getAgenda($funcionario['id_funcionario']) as $k => $diaAcesso) { ?>
                                               <li><?= $diaAcesso['horario']; ?>  -  <?= $diaAcesso['extenso']; ?> </li> <?php 
                                            }
                                        }else{
                                            echo 'Funcionário não possui Permissão de Acesso .';
                                        }
                                    ?>                                       
                                </ul> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="<?= base_url("funcionario/{$funcionario['id_funcionario']}");?>"  title="Clique aqui para editar este Funcionário."  class="btn btn-mini  btn-primary"> <i class="icon-edit"></i> Editar</a>
                                <?php if($_SERVER['REQUEST_URI']== "site"||  $_SERVER['REDIRECT_URL'] =="site" || $_SERVER['REDIRECT_URL']=="recuperar-cadastro/"){ ?>
                                       <a href="<?= base_url("funcionario/{$funcionario['id_funcionario']}/delete_site");?>" title="Editar Funcioário."  class="btn  btn-mini  btn-danger"> <i class=" icon-remove"></i> Excluir</a>
                                <?php }else{?>
                                        <a href="<?= base_url("funcionario/{$funcionario['id_funcionario']}/delete_admin");?>" title="Delete Funcioário."  class="btn  btn-mini  btn-danger"> <i class=" icon-remove"></i> Excluir</a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php } ?>  
                    <tr>
                        <td colspan="2"  style="background: #efefef">                             
                            <a href="<?= base_url('cadastrar-funcionario'); ?>"  title="Clique aqui para adicionar mais Funcionários."  class="btn  btn-primary ">
                                <i class="icon-plus-sign"></i> Mais Funcionário
                            </a> 
                        </td>
                    </tr>    
                </tbody>
            </table>
        </div>   
    <?php } ?>
</div>   