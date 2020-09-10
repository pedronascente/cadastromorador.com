<?php  //namespace C:\wamp\www\cadastro\application\views\fichaCadastral\form_fichaCadastral.php ?>
<div class="widget-content nopadding">
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <label class="control-label">Tipo de Usuário</label>
                <div class="controls">
                    <select name="array_usuario[0][tipo_usuario_id_tipo_usuario]">
                        <?php
                        if (!empty($_arraySelectTipoUsuario)) {
                            for ($i = 0; $i < count($_arraySelectTipoUsuario); $i++) {
                                echo ' <option  value="' . $_arraySelectTipoUsuario[$i]['id_tipo_usuario'] . '" >' . $_arraySelectTipoUsuario[$i]['descricao'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">Respossável pelo Imóvel?</label>
                <div class="controls">
                    <select name="array_usuario[0][responsavel]" class="text-center"  id="selectResponsavelPeloImovel" required="">
                        <option value="s" selected="">Sim</option>
                        <option value="n">Não</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6"  id="selectRelacaoResponsavel" style="display:none">
            <div class="control-group _control-group-right">
                <label class="control-label">Relação Responsável</label>
                <div class="controls">
                    <select name="array_usuario[0][relacao_responsavel_id_relacao_responsavel]" id="_selectRelacaoComResponsavel" required="" >
                        <?php
                            if (!empty($_arraySelectRelacaoResponsavel)) {
                                for ($i = 0; $i < count($_arraySelectRelacaoResponsavel); $i++) {
                                    $value = ( $_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel']=='1'|| $_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel']=='10')?'':$_arraySelectRelacaoResponsavel[$i]['id_relacao_responsavel'];
                                    echo ' <option  value="' . $value . '" >' . $_arraySelectRelacaoResponsavel[$i]['descricao'] . '</option>';
                                }
                            }
                        ?>
                    </select>   
                </div>
            </div> 
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="control-group _control-group-right">
                <label class="control-label">Nome</label>
                <div class="controls">
                    <input type="text" name="array_usuario[0][nome]"  class="span12" value="" required="" >
                </div>
            </div> 
        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group _control-group-right">
                <label class="control-label">Data Nascimento</label>
                <div class="controls">
                    <div  data-date="12-12-2012" class="input-append date datepicker "  style="padding: 0" >
                        <input type="text" name="array_usuario[0][data_nascimento]"   id="mask-date" data-date-format="dd-mm-yyyy" class="span12 mask"  value=""   required="" >
                        <span class="add-on"><i class="icon-th"></i></span> 
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <label class="control-label">Tag Eclusa</label>
                <div class="controls">
                    <select class="span12 text-center" name="array_usuario[0][tag_eclusa]" required="">
                        <?php
                        for ($i = 0; $i <= 10; $i++) {
                            echo "<option value=\"{$i}\">{$i}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div> 
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">Controle Portão</label>
                <div class="controls">
                    <select class="span12 text-center" name="array_usuario[0][controle_portao]" required="">
                        <?php
                        for ($i = 0; $i <= 10; $i++) {
                            echo "<option value=\"{$i}\">{$i}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div> 
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12" >
            <div class="control-group _control-group-right">
                <label class="control-label">E-mail</label>
                <div class="controls">
                    <input type="email" name="array_usuario[0][email]"  class="span12" value=""  required="">
                </div> 
            </div> 
        </div>
    </div>    
    <div class="row-fluid">
        <div class="span6">
            <div class="control-group">
                <label class="control-label">Telefone</label>
                <div class="controls">
                    <input type="text"  name="array_usuario[0][telefone]"  class="span12 _mask_telefone" required="">
                </div>
            </div> 
        </div>
        <div class="span6">
            <div class="control-group _control-group-right">
                <label class="control-label">Celular</label>
                <div class="controls">
                    <input type="text"  name="array_usuario[0][celular]"  class="span12 _mask_telefone" required="">
                </div>
            </div> 
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="control-group _control-group-right">
                <label class="control-label">Observações</label>
                <div class="controls">
                    <textarea class="span12"  name="array_usuario[0][obs]"  rows="5" ></textarea>
                </div>
            </div> 
        </div>
    </div>
    <div class="row-fluid">
        <div class="span8">
            <div class="control-group">
                <label class="control-label">Acesso</label>
                <div class="controls">
                    <?php
                    if (!empty($_arrayCheckBoxAcesso)) {
                        for ($i = 0; $i < count($_arrayCheckBoxAcesso); $i++) {
                            echo '<label ><input type="checkbox" name="array_usuario[0][acesso][]" value="' . $_arrayCheckBoxAcesso[$i]['id_acesso'] . '"   required=""  />' . $_arrayCheckBoxAcesso[$i]['descricao'] . '</label>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content nopadding">
        <div class="form-actions">
            <a href="javascript:void(0)" id="btnAddFormUsuario" class="btn btn-success"><i class="icon-plus"></i> Usuário</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#selectResponsavelPeloImovel').change(function () {
        var _valor = $(this).val();
        if (_valor == 's') {
            $('#selectRelacaoResponsavel').hide();
        } else if (_valor == 'n') {
            $('#selectRelacaoResponsavel').fadeIn();
        }
    });
</script>