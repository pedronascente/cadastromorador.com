<div class="widget-box">
    <div class="widget-title"> 
        <span class="icon">
            <a href="<?= base_url('cadastrar-morador'); ?>"  title="Clique aqui para cadastrar moradores."  class="btn btn-mini btn-danger ">
                Cadastrar 
            </a> 
        </span>
        <h5>MORADOR</h5>
    </div>
    <?php
    if ($_dados['usuario']) { ?>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
                <tbody>
                    <?php
                    foreach ($_dados['usuario'] as $k => $usuario) {
                        $responsavel = ($usuario['responsavel'] == 'n') ? 'Não' : 'Sim';
                        $dataNascimento = isset($usuario['data_nascimento']) ? date('d/m/Y', strtotime($usuario['data_nascimento'])) : '';
                        ?>
                        <tr>
                            <td colspan="3"><b><?=($k+1);?> ) Usuário : </b><br><?= $usuario['nome_usuario']; ?></td>
                            <td><b>Data Nascimento : </b><br><?= $dataNascimento; ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>Email : </b><br><?= $usuario['email']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tipo Usuário : </b><br><?= $usuario['tipo_usuario']; ?> </td>
                            <td><b>Responsável pelo Imóvel ? : </b><br><?= $responsavel; ?></td>
                            <td><b>Relação Responsavel :</b><br><?= $usuario['relacao_responsavel']; ?></td>
                            <td><b>Tipo  Responsavel:</b><br>
                                <?php
                                    if($usuario['departamento']=='1'){
                                        $p = "PROPRIETÁRIO";
                                    }else if($usuario['departamento']=='2'){
                                        $p = "INQUILINO";
                                    }else{
                                        $p = "";
                                    }
                                    echo $p;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Telefone 1 : </b><br><?= $usuario['telefone']; ?></td>
                            <td><b>Telefone 2 : </b><br><?= $usuario['celular']; ?></td>
                            <td><b>CPF:</b><br><?= $usuario['cpf_usuario']; ?></td>
                            <td><b>RG:</b><br><?= $usuario['rg_usuario']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Tag Eclusa : </b><br><?= $usuario['tag_eclusa']; ?></td>
                            <td colspan="2"><b>Controle Portão : </b><br> <?= $usuario['controle_portao']; ?></td>
                        </tr>
                        <tr><td colspan="4"><b>Acesso:</b></td></tr>
                        <tr>
                            <td colspan="4">
                                <ul>
                                    <?php foreach ($this->UsuarioModel->getAcesso($usuario['id_usuario']) as $k => $acesso) { ?>
                                        <li><?= $acesso['acesso']; ?></li>
                                    <?php } ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>Observações : </b> <br><?= $usuario['obs']; ?> </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <a href="<?=base_url("morador/{$usuario['id_usuario']}"); ?>"  title="Editar Morador."  class="btn  btn-mini   btn-primary"> <i class="icon-edit"></i> Editar</a>
                                <?php if($_SERVER['REQUEST_URI']== "site"||  $_SERVER['REDIRECT_URL'] =="site" || $_SERVER['REDIRECT_URL']=="recuperar-cadastro/"){ ?>
                                        <a href="<?=base_url("usuario/{$usuario['id_usuario']}/delete_site"); ?>"   title="Deletar Morador."  class="btn  btn-mini    btn-danger"> <i class=" icon-remove"></i> Excluir</a>
                                <?php  }else{ ?>
                                        <a href="<?=base_url("usuario/{$usuario['id_usuario']}/delete_admin"); ?>"   title="Deletar Morador."  class="btn  btn-mini    btn-danger"> <i class=" icon-remove"></i> Excluir</a>
                                <?php  } ?>
                                
                            </td>
                        </tr>
                <?php } ?>  
                         <tr>    
                            <td colspan="4"  style="background: #efefef">  
                                <a href="<?= base_url('cadastrar-morador'); ?>"  title="Clique aqui para adicionar mais Moradores."  class="btn  btn-primary ">
                                      <i class="icon-plus-sign"></i> Mais Morador 
                                </a> 
                            </td>
                        </tr>     
                </tbody>
            </table>
        </div>   
    <?php } ?>
</div>